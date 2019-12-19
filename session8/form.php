<!DOCTYPE html>
<html>
<head>
	<title>INPUT</title>
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
			height: 200px;
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
	
	$errLabel = $errDescribe = $errImage = $errDayUp = '';

	$label = $describe = $image = $DayUp = '';

	$checkValidate = true;

	if (isset($_POST['input'])) {
		$label = $_POST['label'];
		$describe = $_POST['describe'];
		$DayUp = $_POST['DayUp'];
		$image = $_FILES['image'];
		$imageName = 'default.png';

		if ($image['error'] == 0) {
			$imageName = $image['name'];
			move_uploaded_file($image['tmp_name'], 'uploads/'.$imageName);
		}
		if ($label == '') {
			$checkValidate = false;
			$errLabel = '<br> Please input your label ';
		}
		if ($describe == '') {
			$checkValidate = false;
			$errDescribe = '<br> Please input your describe ';
		}
		if ($DayUp == '') {
			$checkValidate = false;
			$errDayUp = '<br> Please input your day which you up this ';
		}
		if ($checkValidate) {
			echo "<h2>Input</h2>";
			echo "Label: $label <br>";
			echo "Describe: $describe <br>";
			echo "Day Up: $DayUp <br>";
			echo "<img src='uploads/$imageName'> <br>";
			$sql = "INSERT INTO input (label, DescribeD, image, DayUp) 
			VALUES ('$label' , '$describe' , '$imageName' , '$DayUp' )";
			if ($connect->query($sql) === TRUE) {
				header('Location: list_users.php');
		        echo "Thêm dữ liệu thành công";
		    } else {
		        echo "Error: " . $sql . "<br>" . $connect->error;
		    }
		}
	}
	?>
	<h1>Form</h1>
	<div class="input-form">
		<form action="#" name="inputForm" id="inputForm" method="POST" enctype="multipart/form-data" style="margin-left: 30%;">
			<div class="label">Label</div>
			<div class="input">
				<input type="text" name="label" id="label" value="<?php echo$label?>">
				<span class="error"> <?php echo $errLabel; ?></span>
			</div>
			<div class="label">Describe</div>
			<div class="input">
				<input type="text" name="describe" id="describe" value="<?php echo$describe?>">
				<span class="error"> <?php echo $errDescribe; ?></span> 
			</div>
			<div class="label">Day Up</div>
			<div class="input">
				<input type="date" name="DayUp" id="DayUp" value="<?php echo$DayUp?>">
				<span class="error"> <?php echo $errDayUp; ?></span>
			</div>
			<div class="label">Image</div>
			<div class="input">
				<input type="file" name="image" id="image">
			</div>
			<div class="form-control">
				<div class="input">
					<input type="submit" name="input" value="Input">
				</div>
			</div>
		</form>
	</div>
</body>
</html>