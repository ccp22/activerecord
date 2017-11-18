<?php


//turn on debugging messages

ini_set('display_errors', 'On');
error_reporting(E_ALL);
define('DATABASE', 'ccp22');
define('USERNAME', 'ccp22');
define('PASSWORD', 'BxTEeds4U');
define('CONNECTION', 'sql1.njit.edu');

class dbConn{
    //variable to hold connection object.
    protected static $db;
    //private construct - class cannot be instatiated externally.
    private function __construct() {
        try {
            // assign PDO object to db variable
            self::$db = new PDO( 'mysql:host=' . CONNECTION .';dbname=' . DATABASE, USERNAME, PASSWORD );
            self::$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }
        catch (PDOException $e) {
            //Output error - would normally log this to error file rather than output to user.
            echo "Connection Error: " . $e->getMessage();
        }
    }
    // get connection function. Static method - accessible without instantiation
    public static function getConnection() {
        //Guarantees single instance, if no connection object exists then create one.
        if (!self::$db) {
            //new connection object.
            new dbConn();
        }
        //return connection.
        return self::$db;
    }
}

class collection {
    static public function create() {
      $model = new static::$modelName;
      return $model;
    }
    
    //A function to select all the records from the table.
    static public function findAll() {
        $db = dbConn::getConnection();
        $tableName = get_called_class();
        $sql = 'SELECT * FROM ' . $tableName;
        $statement = $db->prepare($sql);
        $statement->execute();
        $class = static::$modelName;
        $statement->setFetchMode(PDO::FETCH_CLASS, $class);
        $recordsSet =  $statement->fetchAll();
        return $recordsSet;
    }
    
    //A function to select specific record from the table.
    static public function findOne($id) {
        $db = dbConn::getConnection();
        $tableName = get_called_class();
        $sql = 'SELECT * FROM ' . $tableName . ' WHERE id =' . $id;
        $statement = $db->prepare($sql);
        $statement->execute();
        $class = static::$modelName;
        $statement->setFetchMode(PDO::FETCH_CLASS, $class);
        $recordsSet =  $statement->fetchAll();
        return $recordsSet[0];
    }
}

class accounts extends collection {
    protected static $modelName = 'account';
}

class todos extends collection {
    protected static $modelName = 'todo';
}

class model {
    protected $tableName;
    
    public function save()
    {
        $array = get_object_vars($this);
        $tempId = $array['id'];
        array_pop($array);
        array_shift($array);
        $columnString = implode(',', array_keys($array));
        $valueString = ":".implode(',:', array_keys($array));
        
        if ($this->id == '') {
            $sql = $this->insert($columnString, $valueString);
        } else {
            $sql = $this->update();
        }
        
        $db = dbConn::getConnection();
        $statement = $db->prepare($sql);
        
        if(get_called_class() == 'todo') {
        	$params = array('owneremail'=>$this->owneremail,
            			'ownerid'=>$this->ownerid,
            			'createddate'=>$this->createddate,
            			'duedate'=>$this->duedate,
            			'message'=>$this->message, 
            			'isdone'=>$this->isdone);
        	
        }else {
        	$params = array('email'=>$this->email,
            			'fname'=>$this->fname,
            			'lname'=>$this->lname,
            			'phone'=>$this->phone,
            			'birthday'=>$this->birthday, 
            			'gender'=>$this->gender,
            			'password'=>$this->password);
        }
        
        $statement->execute($params);
        //echo "INSERT INTO ".$this->tableName." (" . $columnString . ") VALUES (" . $valueString . ")</br>";
        echo 'Record successfully saved.<br>';
    }
    private function insert($columnString, $valueString) {
        $sql = "INSERT INTO ".$this->tableName." (" . $columnString . ") 
        		VALUES (" . $valueString . ")";
        return $sql;
    }
    private function update() {
    	if(get_called_class() == 'todo') {
    		$sql = 'UPDATE '.$this->tableName.' 
        		SET owneremail=:owneremail,
        			ownerid=:ownerid,
        			createddate=:createddate,
        			duedate=:duedate,
        			message=:message,
        			isdone=:isdone
        		WHERE id='.$this->id;
    	}else {
    		$sql = 'UPDATE '.$this->tableName.' 
        		SET email=:email,
        			fname=:fname,
        			lname=:lname,
        			phone=:phone,
        			birthday=:birthday,
        			gender=:gender,
        			password=:password
        		WHERE id='.$this->id;
    	}
    	
        echo 'Record successfully updated with id: ' . $this->id .'<br>';
        return $sql;
    }
    public function delete() {
        if($this->id != '') {
        	$db = dbConn::getConnection();
    		$sql = 'DELETE FROM '.$this->tableName.' WHERE id='.$this->id;
    		$stmt = $db->prepare($sql);
    		$stmt->execute();
        	echo 'Record successfully deleted with id: ' . $this->id .'<br>';
        }else {
        	echo 'Record ID is not valid! Cannot delete the record.';
        }
    }
}

class account extends model {
	public $id;
    public $email;
    public $fname;
    public $lname;
    public $phone;
    public $birthday;
    public $gender;
    public $password;
    
    public function setData($id, $email, $fname, $lname, $phone, $birthday, $gender, $password) {
    	$this->id = $id;
    	$this->email = $email;
    	$this->fname = $fname;
    	$this->lname = $lname;
    	$this->phone = $phone;
    	$this->birthday = $birthday;
    	$this->gender = $gender;
    	$this->password = $password;
    }
    
    public function __construct() {
        $this->tableName = 'accounts';
    }	
}

class todo extends model {
    public $id;
    public $owneremail;
    public $ownerid;
    public $createddate;
    public $duedate;
    public $message;
    public $isdone;
    
    public function setData($id, $owneremail, $ownerid, $createddate, $duedate, $message, $isdone) {
    	$this->id = $id;
    	$this->owneremail = $owneremail;
    	$this->ownerid = $ownerid;
    	$this->createddate = $createddate;
    	$this->duedate = $duedate;
    	$this->message = $message;
    	$this->isdone = $isdone;
    }
    
    public function __construct() {
        $this->tableName = 'todos';
    }
}

?>