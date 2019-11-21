<?php include 'database.php';?>
<?php
	$id = $_GET['ID'];
	$$sqlUpdate = "UPDATE input SET label = Nguyễn Hoàng Phúc WHERE ID = 2";
	if (mysqli_query($connect, $sqlUpdate) === TRUE) {
		// chuyển trang
		header('Location: list_users.php');
	}