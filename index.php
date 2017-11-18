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
			
			$todoDel = new todo();
			$todoDel->id = 7;
			echo '<h2>Delete Existing Record</h2>';
			$todoDel->delete();
			echo '<p>Deleted Record data id: '.$todoDel->id.'</p>';
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
			$todoUpdate = new todo();
			$todoUpdate->setData(5,'mjlee@njit.edu',1,'2017-11-20 02:14:45','2017-11-30 02:14:45','Test ToDo Updated',0);
			$todoUpdate->save();
		
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
			
			echo '<h2>Insert New Record</h2>';
			$todoInsert = new todo();
			$todoInsert->setData('','mjlee@njit.edu',1,'2017-10-25 10:14:45','2017-11-25 10:14:45','Test ToDo Added',0);
			$todoInsert->save();
			echo '<p>New Record data: Title = '.$todoInsert->message.', Status = '.$todoInsert->isdone.'</p>';
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
							<th>Birthday</th>
						</tr>
					</thead>";
				echo '<tbody>';
				foreach ($records as $row) {
					echo "<tr>
							<td>".$row->id."</td>
							<td>".$row->email."</td>
							<td>".$row->fname."</td>
							<td>".$row->lname."</td>
							<td>".$row->birthday."</td>
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
						<th>Birthday</th>
					</tr>
				</thead>";
			echo "<tbody>
					<tr>
						<td>".$record->id."</td>
						<td>".$record->email."</td>
						<td>".$record->fname."</td>
						<td>".$record->lname."</td>
						<td>".$record->birthday."</td>
					</tr>";
			echo "</tbody></table><hr>";
			
			echo '<h2>Delete Existing Record</h2>';
			$accDelete = new account();
			$accDelete->id = 9;
			$accDelete->delete();
			echo '<p>Deleted Record data id: '.$accDelete->id.'</p>';
			echo "<table class=\"table table-hover\">";
			$records = accounts::findAll();
			if (count($records) > 0) {
				echo "<thead class=\"thead-dark\">
					<tr>
						<th>User ID</th>
						<th>Email</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Birthday</th>
					</tr>
				</thead>";
				foreach ($records as $row) {
					echo "<tr>
							<td>".$row->id."</td>
							<td>".$row->email."</td>
							<td>".$row->fname."</td>
							<td>".$row->lname."</td>
							<td>".$record->birthday."</td>
						</tr>";
				}
			}
			echo '</table><br><hr>';
			
			echo '<h2>Update Existing Record</h2>';
			$account2 = new account();
			$account2->setData(11,'demo@njit.edu','Steve','Jobs','999-888-2244','2000-09-30','','test123');
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
						<th>Birthday</th>
					</tr>
				</thead>";
				foreach ($records2 as $row) {
					echo "<tr>
							<td>".$row->id."</td>
							<td>".$row->email."</td>
							<td>".$row->fname."</td>
							<td>".$row->lname."</td>
							<td>".$row->birthday."</td>
						</tr>";
				}
			}
			echo '</table><br><hr>';
			
			echo '<h2>Insert New Record</h2>';
			$accInsert = new account();
			$accInsert->setData('','demo@gmail.com','Peter','Parker','999-888-2244','2000-09-30','','test123');
			$accInsert->save();
			echo '<p>New Record data: Name = '.$accInsert->fname.' '.$accInsert->lname.'</p>';
			echo "<table class=\"table table-hover\">";
			$records = accounts::findAll();
			if (count($records) > 0) {
				echo "<thead class=\"thead-dark\">
					<tr>
						<th>User ID</th>
						<th>Email</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Birthday</th>
					</tr>
				</thead>";
				foreach ($records as $row) {
					echo "<tr>
							<td>".$row->id."</td>
							<td>".$row->email."</td>
							<td>".$row->fname."</td>
							<td>".$row->lname."</td>
							<td>".$row->birthday."</td>
						</tr>";
				}
			}
			echo '</table><br><hr>';
			
		?>
	</body>
</html>