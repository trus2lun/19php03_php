<!DOCTYPE html>
<html>
<head>
	<title>List users</title>
	<style type="text/css">
		table {
			border-collapse: collapse;
			width: 800px;
		}
		table, tr, th, td {
			border: 1px solid black;
		}
		img {
			width: 150px;
		}
	</style>
</head>
<body>
	<h1>List users</h1>
	<a href="form.php">Input</a>
	<form action="#" method="POST">
		<p>Search
			<input type="text" name="keyword" placeholder="Please input keyword">
			<input type="submit" name="search" value="Search">
		</p>
	</form>
	<?php include 'database.php';?>
	<?php 
		$sqlSelect = "SELECT * FROM input";
		$result = mysqli_query($connect, $sqlSelect);
	?>
	<table>
		<tr>
			<th>No.</th>
			<th>label</th>
			<th>describe</th>
			<th>image</th>
			<th>delete</th>
			<th>update</th>
		</tr>
	
	<?php 
		while ($row = $result->fetch_assoc()) {
			// khai bao id de de su dung khi edit va delete
			$id = $row['ID'];
			echo "<tr>";
			echo "<td>".$row['ID']."</td>";
			echo "<td>".$row['label']."</td>";
			echo "<td>".$row['DescribeD']."</td>";
			echo "<td><img src='uploads/".$row['image']."'></td>";
			echo "<td><a href='delete.php?ID=".$id."''>Delete</a></td>";
			echo "<td><a href='update.php?ID=".$id."''>Update</a></td>";
			echo "</tr>";
		}
	?>
	</table>
</body>
</html>