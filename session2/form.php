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
	$name = $email = $birth = '';
	$errName = $errEmail = $errBirth = '';
	if (isset($_POST['register'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$birth = $_POST['birth'];
		if ($name == '') {
		$errName = ' Please input your name';
		}
		if ($email == '') {
			$errEmail = ' Please input your email';
		}
		if ($birth == '') {
			$errBirth = ' Please input your birth';
		}
	}
?>
<div class="form_register">
	<h2>Form</h2>
	<form action="success_register.php" method="POST">
		<p class="name">
			Họ và tên:
			<input type="text" name="name" value="<?php echo $name?>">
			<span class="error"><?php echo $errName;?></span>
		</p>
		<p class="gender">
			Giới tính: <br>
			<input type="radio" name="gender" value="Nam" checked> Nam <br>
			<input type="radio" name="gender" value="Nữ"> Nữ <br>
			<input type="radio" name="gender" value="Khác"> Khác
		</p>
		<p class="country">
			Quê quán: 
			<select name="country">
				<option value="Đà Nẵng">Đà Nẵng</option>
				<option value="Quảng Nam">Quảng Nam</option>
				<option value="Hà Nội">Hà Nội</option>
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