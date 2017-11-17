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
		?>
	</body>
</html>