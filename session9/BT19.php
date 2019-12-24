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
	<?php include 'database.php';
	// get category
		$sqlCate = "SELECT * FROM school";
		$categories = mysqli_query($connect, $sqlCate);

	// end get category
	$arrGender = array('Male' => 'Male' , 'Female' => 'Female' );
	
	$errNameOfStudent = $errGender = $errImage = '';

	$name_of_student = $gender = $image ='';

	$checkValidate = true;

	if (isset($_POST['add'])) {
		$name_of_student = $_POST['name_of_student'];
		$gender = $_POST['gender'];
		$image = $_FILES['image'];
		$imageName = 'default.png';
		$school_category_id = $_POST['school_category_id'];

		if ($image['error'] == 0) {
			$imageName = $image['name'];
			move_uploaded_file($image['tmp_name'], 'uploads/'.$imageName);
		}
		if ($name_of_student == '') {
			$checkValidate = false;
			$errNameOfStudent = '<br> Please input student name ';
		}
		if ($gender == '') {
			$checkValidate = false;
			$errGender = '<br> Please input student gender';
		}
		if ($checkValidate) {
			echo "<h2>Student</h2>";
			echo "Student Name: $name_of_student <br>";
			echo "<img src='uploads/$imageName'> <br>";
			$sqlSave = "INSERT INTO student (school_category_id, student_name, gender, image) 
			VALUES ($school_category_id, '$name_of_student', '$gender','$imageName')";
			if (mysqli_query($connect, $sqlSave) === TRUE) {
				header('Location: list_students.php');
			}
		}
	}
	?>
	<h1>Form</h1>
	<div class="input-form">
		<form action="#" name="inputForm" id="inputForm" method="POST" enctype="multipart/form-data" style="margin-left: 30%;">
			<div class="label">Name</div>
			<div class="input">
				<input type="text" name="name_of_student" id="name_of_student" value="<?php echo$name_of_student?>">
				<span class="error"> <?php echo $errNameOfStudent; ?></span>
			</div>
			<div class="label">Gender</div>
			<select name="gender">
				<option value="">--CHOOSE--</option>
				<option value="Male" <?php echo ($gender == 'Male')?>>Male</option>
				<option value="Female" <?php echo ($gender == 'Female')?'selected':''?>>Female</option>
			</select>
			<span class="error"> <?php echo $errGender;?></span>
			<p>School
			<select name="school_category_id">
				<?php 
						while ($row = $categories->fetch_assoc()) {
							echo "<option value='".$row['id']."'>".$row['school_name']."</option>";
						}
				?>
			</select>
			</p>
			<div class="label">Image</div>
			<div class="input">
				<input type="file" name="image" id="image">
			</div><br>
			<p>
				<input type="submit" name="add">
			</p>
		</form>
	</div>
</body>
</html>