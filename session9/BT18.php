<!DOCTYPE html>
<html>
<head>
	<title>News</title>
	<meta charset="utf-8">
	<meta name="keyword" content="PHP, mysql, SDC">
	<meta name="decription" content="This is News">
</head>
<body>
	<?php include 'database.php';?>
	<?php  
		$errTitleName = $errDescription = '';

		$title_name = $description = '';

		$checkValidate = true;

		if (isset($_POST['input'])) {
			$title_name = $_POST['title_name'];
			$description = $_POST['description'];

			if ($title_name == '') {
				$checkValidate = false;
				$errTitleName = '<br> Please input your title name';
			}
			if ($description == '') {
				$checkValidate = false;
				$errDescription = '<br> Please input your description';
			}
			if ($checkValidate) {
				echo "<h2>Input</h2>";
				echo "Label: $title_name <br>";
				echo "Description: $description <br>";
				$sql = "INSERT INTO news (Title, Description) VALUES ('$title_name', '$description')";
				if ($connect->query($sql) === TRUE) {
					header('Loaction: List_users.php');
					echo "Thêm dữ liệu thành công";
				} else {
					echo "Error: " . $sql . "<br>" . $connect->error;
				}
			}
		}
	?>
	<h1>News</h1>
	<form action="#" name="inputForm" method="POST" enctype="multipart/form-data">
		<div class="label">Title Name</div>
		<div class="input">
			<input type="text" name="title_name" id="title_name" value="<?php echo$title_name?>">
			<span class="error"></span>
		</div>
		<div class="label">Description</div>
		<div class="input">
			<input type="text" name="description" id="description">
		</div>
		<div class="form-control">
			<div class="input">
				<input type="submit" name="input" value="Post">
			</div>
		</div>
	</form>
</body>
</html>