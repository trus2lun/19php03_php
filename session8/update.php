<!DOCTYPE html>
<html>
<head>
	<title>UPDATE</title>
	<meta charset="utf-8">
	<style type="text/css">
		span {
			color: red;
		}
		h1 {
			text-align: center;
		}
		.input-form {
			width: 60%;
			margin: 0 auto;
			border: 1px solid black;
			height: 350px;
		}
		.form-control {
			margin: 20px;
			height: 30px;
		}
		.label {
			width: 20%;
			float: left;
		}
		.input {
			width: 70%;
			float: left;
		}
		.error {
			color: red;
		}
		img {
			width: 150px;
		}
	</style>
	<meta name="keywords" content="PHP, mysql, SDC">
	<meta name="decription" content="This is register form">
</head>
<body>
	<?php include 'database.php';?>
	<?php
	//get old user to edit
	$idUpdate = $_GET['ID'];

	$sqlUpdate = "SELECT * FROM input WHERE ID = $idUpdate";
	$dataUpdate = mysqli_query($connect, $sqlUpdate);
	$update = $dataUpdate->fetch_assoc();
	//end get old
	if (isset($_POST['update'])) {
		$label = $_POST['label'];
		$DescribeD = $_POST['describe'];
		$image = $update['image'];
		$DayUp = $_POST['DayUp'];
		if ($_FILES['image']['error'] == 0) {
			$image = $_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],'uploads/'.$image);
		}

		$sqlUpdateData = "UPDATE input SET label = '$label', DescribeD = '$DescribeD', image = '$image', DayUp = '$DayUp' WHERE ID = $idUpdate";

		if ($connect->query($sqlUpdateData) === TRUE) {
			header('Location: list_users.php');
		}
	}
	?>
	<h1>Update</h1>
	<div class="input-form">
		<form action="#" name="inputForm" id="inputForm" method="POST" enctype="multipart/form-data" style="margin-left: 30%;">
			<div class="label">Label</div>
			<div class="input">
				<input type="text" name="label" id="label" value="<?php echo $update['label'];?>">
			</div>
			<div class="label">Describe</div>
			<div class="input">
				<input type="text" name="describe" id="describe" value="<?php echo $update['DescribeD'];?>"> 
			</div>
			<div class="label">Day Up</div>
			<div class="input">
				<input type="date" name="DayUp" id="DayUp" value="<?php echo $update['DayUp'];?>">
			</div>
			<div class="label">Image</div>
			<div class="input">
				<input type="file" name="image" id="image"><br>
				<img src="uploads/<?php echo $update['image'];?>">
			</div>
			<div class="form-control">
				<div class="input">
					<input type="submit" name="update" value="Update">
				</div>
			</div>
		</form>
	</div>
</body>
</html>