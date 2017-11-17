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
			$todo->setData('','mjlee@njit.edu',1,'2017-11-15 12:34:45','2017-11-25 12:34:45','Test ToDo',0);
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
		
			
			
		?>
	</body>
</html>