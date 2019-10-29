<style type="text/css">
	.error {
		color: red;
	}
</style>
<?php
	$number1 = $number2 = '';
	$errNum1 = $errNum2 = '';
	$checkError = true;
	if (isset($_POST['sum'])) {
		$number1 = $_POST['number1'];
		$number2 = $_POST['number2'];
		// validate form
		if ($number1 == '') {
			$errNum1 = ' Please input number 1';
			$checkError = false; 
		}
		if ($number2 == '') {
			$errNum2 = ' Please input number 2';
			$checkError = false;
		}
		if ($checkError) {
			$sum = $number1 + $number2;
			echo "Tổng 2 số là : $sum";
		}
	}
?>
<h1>Caculator</h1>
<form action="#" method="POST">
	<p>
		Number 1
		<input type="text" name="number1" value="<?php echo $number1?>">
		<span class="error"><?php echo $errNum1;?></span>
	</p>
	<p>
		Number 2
		<input type="text" name="number2" value="<?php echo $number2?>">
		<span class="error"><?php echo $errNum2;?></span>
	</p>
	<p>
		<input type="submit" name="sum" value="Sum">
	</p>
</form>
