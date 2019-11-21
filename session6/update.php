<?php include 'database.php';?>
<?php
	$id = $_GET['ID'];
	$sqlUpdate = "UPDATE input SET label ='Hồ Gươm' WHERE ID = 5";
	if (mysqli_query($connect, $sqlUpdate) === TRUE) {
		// chuyển trang
		header('Location: list_users.php');
?>