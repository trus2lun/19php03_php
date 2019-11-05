<!DOCTYPE html>
<html>
<head>
	<title>Form Register</title>
	<meta charset="utf-8">
	<meta name="keywords" content="PHP, mysql, SDC">
	<meta name="description" content="This is register form">
	<link rel="stylesheet" href="css/form.css">
</head>
<body>
	<?php

	$servername = "localhost";
	$database = "root";
	$username = "trus2lun";
	$password = "";
	// Create connection
	$conn = new mysql($servername, $username, $password, $database);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	echo "Connected successfully";
	mysqli_close($conn);


	$arrType = array('fd' => 'food' , 'ty' => 'technology' );
	$errName = $errDescribe = $errAvatar = $errNew = $errOld = $errDate = $errType = '';
	$name = $describe = $avatar = $new = $old = $type = '';
	$checkValidate = true;

	if (isset($_POST['register'])) {
		$name = $_POST['name'];
		$describe = $_POST['describe'];
		$new = $_POST['new'];
		$old = $_POST['old'];
		$type = $_POST['type'];
		$avatar = $_FILES['avatar']; 
		$avatarName = 'default.png';

		if ($avatar['error'] == 0) {
			$avatarName = $avatar['name'];
			move_uploaded_file($avatar['tmp_name'], 'uploads/'.$avatarName);
		}
		if ($name == '') {
			$checkValidate = false;
			$errName = ' Please input your name of product';
		}
		if ($describe == '') {
			$checkValidate = false;
			$errDescribe = ' Please descirbe your product';
		}
		if ($new == '') {
			$checkValidate = false;
			$errNew = ' Please input your posted date';
		}
		if ($old == '') {
			$checkValidate = false;
			$errOld = ' Please input your expiration date';
		}
		if ($type == '') {
			$checkValidate = false;
			$errType = ' Please input your type of product';
		}
		if ($old < $new) {
			$errDate = 'Wrong Day, Please input again';
			$checkValidate = false;
		}
		if ($checkValidate) {
			echo "<h2>Thông tin sản phẩm</h2>";
			echo "Name Of Product: $name <br>";
			echo "Describe: $describe <br>";
			echo "Posted date: $new <br>";
			echo "Expiration date: $old <br>";
			echo "Type Of Product: $type <br>";
			echo "<img src='uploads/$avatarName'> <br>";
		}
	}
	?>
	<h1>Register</h1>
	<div class="register-form">
		<form action="#" name="registerForm" id="registerForm"
		method="POST" enctype="multipart/form-data">
			<div class="form-control">
				<div class="label">Tên sản phẩm</div>
				<div class="input">
					<input type="text" name="name" id="name" value="<?php echo $name?>">
					<span class="error"> <?php echo $errName; ?></span>
				</div>
			</div>
			<div class="form-control">
				<div class="label">Mô tả</div>
				<div class="input">
					<input type="textarea" name="describe" id="describe" value="<?php echo $describe?>">
					<span class="error"> <?php echo $errDescribe; ?></span>
				</div>
			</div>
			<div class="form-control">
				<div class="label">avatar</div>
				<div class="input">
					<input type="file" name="avatar" id="avatar">
				</div>
			</div>
			<div class="form-control">
				<div class="label">Ngày đăng </div>
				<div class="input">
					<input type="date" name="new" id="new" value="<?php echo $new?>">
					<span class="error"> <?php echo $errNew; ?></span>
				</div>
			</div>
			<div class="form-control">
				<div class="label">Ngày hết hạn</div>
				<div class="input">
					<input type="date" name="old" id="old" value="<?php echo $old?>">
					<span class="error"> <?php echo $errOld; ?></span>
				</div>
			</div>
			<span class="error"> <?php echo $errDate; ?></span>
			<div class="form-control">
				<div class="label">Danh mục sản phẩm</div>
				<div class="input">
					<select name="type">
						<option value="">Choose type of product</option>
						<option value="fd" <?php echo ($type == 'fd')?'selected':''?>>food</option>
						<option value="ty" <?php echo ($type == 'ty')?'selected':''?>>technology</option>
					</select>
					<span class="error"> <?php echo $errType;?></span>
				</div>
			</div>
			<div class="form-control">
				<div class="input">
					<input type="submit" name="register" value="Reigster">
				</div>
			</div>
		</form>
	</div>
</body>
</html>