<?php include 'database.php';?>
<?php 
	$id = $_GET['ID'];
	$sqlDelete = "DELETE FROM input WHERE ID = $id";
	if (mysqli_query($connect, $sqlDelete) === TRUE) {
		// chuyen trang
		header('Location: list_users.php');
	}
?>