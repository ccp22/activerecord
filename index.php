<html>
	<head>
		<title>Home | Active Records</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
	</head>
	<body>
		<?php
			include 'staticDatabase.php';
			
			echo '<h1>ToDos</h1>';
			echo '<h2>Select all Records</h2>';
			echo '<p>Select ALL records</p>';
			$records = todos::findAll();
			echo "<table class=\"table table-hover\">";
			if (count($records) > 0) {
				echo "<thead class=\"thead-dark\">
						<tr>
							<th>ToDo ID</th>
							<th>Owner Email</th>
							<th>Owner ID</th>
							<th>Created Date</th>
							<th>Due Date</th>
							<th>Message</th>
							<th>Status</th>
						</tr>
					</thead>";
				echo '<tbody>';
				foreach ($records as $row) {
					echo "<tr>
							<td>".$row->id."</td>
							<td>".$row->owneremail."</td>
							<td>".$row->ownerid."</td>
							<td>".$row->createddate."</td>
							<td>".$row->duedate."</td>
							<td>".$row->message."</td>
							<td>".$row->isdone."</td>
						</tr>";
				}
			}
			echo "</tbody></table><hr>";
			
			
			$id = 2;
			$record = todos::findOne($id);
			echo '<h2>Select One Record</h2>';
			echo '<p>Select Record ID: '.$id.'</p>';
			echo "<table class=\"table table-hover\">";
			echo "<thead class=\"thead-dark\">
					<tr>
						<th>TODO ID</th>
						<th>Owner Email</th>
						<th>Owner ID</th>
						<th>Created Date</th>
						<th>Due Date</th>
						<th>Message</th>
						<th>Status</th>
					</tr>
				</thead>";
			echo "<tbody>
					<tr>
						<td>".$record->id."</td>
						<td>".$record->owneremail."</td>
						<td>".$record->ownerid."</td>
						<td>".$record->createddate."</td>
						<td>".$record->duedate."</td>
						<td>".$record->message."</td>
						<td>".$record->isdone."</td>
					</tr>";
			echo "</tbody></table><hr>";
			
			echo '<h2>Insert New Record</h2>';
			$todo = new todo();
			$todo->setData('100','mjlee@njit.edu',1,'2017-10-25 10:14:45','2017-11-25 10:14:45','Test ToDo',0);
			$todo->save();
			echo '<p>New Record data: Title = '.$todo->message.', Status = '.$todo->isdone.'</p>';
			echo "<table class=\"table table-hover\">";
			$records = todos::findAll();
			if (count($records) > 0) {
				echo "<thead class=\"thead-dark\">
					<tr>
						<th>TODO ID</th>
						<th>Owner Email</th>
						<th>Owner ID</th>
						<th>Created Date</th>
						<th>Due Date</th>
						<th>Message</th>
						<th>Status</th>
					</tr>
				</thead>";
				foreach ($records as $row) {
					echo "<tr>
							<td>".$row->id."</td>
							<td>".$row->owneremail."</td>
							<td>".$row->ownerid."</td>
							<td>".$row->createddate."</td>
							<td>".$row->duedate."</td>
							<td>".$row->message."</td>
							<td>".$row->isdone."</td>
						</tr>";
				}
			}
			echo '</table><br><hr>';
		
			echo '<h2>Update Existing Record</h2>';
			$todo2 = new todo();
			$todo2->setData(8,'mjlee@njit.edu',1,'2017-11-20 02:14:45','2017-11-30 02:14:45','Test ToDo Updated',0);
			$todo2->save();
		
			echo "<table class=\"table table-hover\">";
			$records2 = todos::findAll();
			if (count($records2) > 0) {
				echo "<thead class=\"thead-dark\">
					<tr>
						<th>TODO ID</th>
						<th>Owner Email</th>
						<th>Owner ID</th>
						<th>Created Date</th>
						<th>Due Date</th>
						<th>Message</th>
						<th>Status</th>
					</tr>
				</thead>";
				foreach ($records2 as $row) {
					echo "<tr>
							<td>".$row->id."</td>
							<td>".$row->owneremail."</td>
							<td>".$row->ownerid."</td>
							<td>".$row->createddate."</td>
							<td>".$row->duedate."</td>
							<td>".$row->message."</td>
							<td>".$row->isdone."</td>
						</tr>";
				}
			}
			echo '</table><br><hr>';
			
			echo '<h2>Delete Existing Record</h2>';
			$todo2->delete();
			echo '<p>Deleted Record data id: '.$todo2->id.'</p>';
			echo "<table class=\"table table-hover\">";
			$records = todos::findAll();
			if (count($records) > 0) {
				echo "<thead class=\"thead-dark\">
					<tr>
						<th>TODO ID</th>
						<th>Owner Email</th>
						<th>Owner ID</th>
						<th>Created Date</th>
						<th>Due Date</th>
						<th>Message</th>
						<th>Status</th>
					</tr>
				</thead>";
				foreach ($records as $row) {
					echo "<tr>
							<td>".$row->id."</td>
							<td>".$row->owneremail."</td>
							<td>".$row->ownerid."</td>
							<td>".$row->createddate."</td>
							<td>".$row->duedate."</td>
							<td>".$row->message."</td>
							<td>".$row->isdone."</td>
						</tr>";
				}
			}
			echo '</table><br><hr>';
			
			echo '<h1>Accounts</h1>';
			echo '<h2>Select all Records</h2>';
			echo '<p>Select ALL records</p>';
			$records = accounts::findAll();
			echo "<table class=\"table table-hover\">";
			if (count($records) > 0) {
				echo "<thead class=\"thead-dark\">
						<tr>
							<th>User ID</th>
							<th>Email</th>
							<th>First Name</th>
							<th>Last Name</th>
						</tr>
					</thead>";
				echo '<tbody>';
				foreach ($records as $row) {
					echo "<tr>
							<td>".$row->id."</td>
							<td>".$row->email."</td>
							<td>".$row->fname."</td>
							<td>".$row->lname."</td>
						</tr>";
				}
			}
			echo "</tbody></table><hr>";
			
			$id = 1;
			$record = accounts::findOne($id);
			echo '<h2>Select One Record</h2>';
			echo '<p>Select Record ID: '.$id.'</p>';
			echo "<table class=\"table table-hover\">";
			echo "<thead class=\"thead-dark\">
					<tr>
						<th>User ID</th>
						<th>Email</th>
						<th>First Name</th>
						<th>Last Name</th>
					</tr>
				</thead>";
			echo "<tbody>
					<tr>
						<td>".$record->id."</td>
						<td>".$record->email."</td>
						<td>".$record->fname."</td>
						<td>".$record->lname."</td>
					</tr>";
			echo "</tbody></table><hr>";
			
			echo '<h2>Insert New Record</h2>';
			$account = new account();
			$account->setData('100','demo@gmail.com','Demo','Demo','999-888-2244','2000-09-30','','test123');
			$account->save();
			echo '<p>New Record data: ID = '.$account->id.', Name = '.$account->fname.' '.$account->lname.'</p>';
			echo "<table class=\"table table-hover\">";
			$records = accounts::findAll();
			if (count($records) > 0) {
				echo "<thead class=\"thead-dark\">
					<tr>
						<th>User ID</th>
						<th>Email</th>
						<th>First Name</th>
						<th>Last Name</th>
					</tr>
				</thead>";
				foreach ($records as $row) {
					echo "<tr>
							<td>".$row->id."</td>
							<td>".$row->email."</td>
							<td>".$row->fname."</td>
							<td>".$row->lname."</td>
						</tr>";
				}
			}
			echo '</table><br><hr>';
			
			echo '<h2>Update Existing Record</h2>';
			$account2 = new account();
			$account2->setData(13,'demo@njit.edu','Steve','Jobs','999-888-2244','2000-09-30','','test123');
			$account2->save();
		
			echo "<table class=\"table table-hover\">";
			$records2 = accounts::findAll();
			if (count($records2) > 0) {
				echo "<thead class=\"thead-dark\">
					<tr>
						<th>User ID</th>
						<th>Email</th>
						<th>First Name</th>
						<th>Last Name</th>
					</tr>
				</thead>";
				foreach ($records2 as $row) {
					echo "<tr>
							<td>".$row->id."</td>
							<td>".$row->email."</td>
							<td>".$row->fname."</td>
							<td>".$row->lname."</td>
						</tr>";
				}
			}
			echo '</table><br><hr>';
			
		?>
	</body>
</html>