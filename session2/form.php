<style type="text/css">
	.error {
		color: red;
	}
	h2 {
		text-align: center;
	}
	form {
		text-align: center;
	}
	.form_register {
		border: 1px solid black;
		width: 45%;
		border-radius: 15px;
		box-shadow: 5px 10px 18px red;
	}
</style>
<?php
	$name = $email = $birth = $gender = $country = '';
	$errName = $errEmail = $errBirth = $errGender = $errCountry = '';
	if (isset($_POST['register'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$birth = $_POST['birth'];
		$gender = isset($_POST['gender'])?$_POST['gender']:'';
		$country = $_POST['country'];
		if ($name == '') {
			$errName = ' Please input your name';
		}
		if ($email == '') {
			$errEmail = ' Please input your email';
		}
		if ($birth == '') {
			$errBirth = ' Please input your birth';
		}
		if ($gender == '') {
			$errGender = ' Please input your gender';
		}
		if ($country == '') {
			$errCountry = ' Please input your country';		
		}
	}
	echo $name;
	echo "<br>";
	echo $gender;
	echo "<br>";
	echo $country;
	echo "<br>";
	echo $email;
	echo "<br>";
	echo $birth;
	echo "<br>";
?>
<div class="form_register">
	<h2>Form</h2>
	<form action="#" method="POST">
		<p class="name">
			Họ và tên:
			<input type="text" name="name" value="<?php echo $name?>">
			<span class="error"><?php echo $errName;?></span>
		</p>
		<p class="gender">
			Giới tính: <br>
			<input type="radio" name="gender" value="Nam" <?php echo $gender?>> Nam <br>
			<input type="radio" name="gender" value="Nữ" <?php echo $gender?>> Nữ <br>
			<input type="radio" name="gender" value="Khác" <?php echo $gender?>> Khác
			<br>
			<span class="error"><?php echo $errGender;?></span>
		</p>
		<p class="country">
			Quê quán: 
			<select name="country">
				<option value=" "></option>
				<option value="Đà Nẵng" <?php echo $country?>>Đà Nẵng</option>
				<option value="Quảng Nam" <?php echo $country?>>Quảng Nam</option>
				<option value="Hà Nội" <?php echo $country?>>Hà Nội</option>
				<span class="error"><?php echo $errCountry;?></span>
			</select>
			
		</p>
		<p class="email">
			Email: 
			<input type="text" name="email" value="<?php echo $email?>">
			<span class="error"><?php echo $errEmail;?></span>
		</p>
		<p class="birth">
			Ngày sinh:
			<input type="date" name="birth"value="<?php echo $birth?>">
			<span class="error"><?php echo $errBirth;?></span>
		</p>
		<input type="submit" name="register" value="register">
	</form>
</div>