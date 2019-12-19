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
	$idUpdate = $_GET['id'];

	$sqlUpdate = "SELECT * FROM student WHERE id = $idUpdate";
	$dataUpdate = mysqli_query($connect, $sqlUpdate);
	$update = $dataUpdate->fetch_assoc();
	//end get old
	if (isset($_POST['update'])) {
		$student_name = $_POST['student_name'];
		$gender = $_POST['gender'];
		$image = $update['image'];
		if ($_FILES['image']['error'] == 0) {
			$image = $_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],'uploads/'.$image);
		}

		$sqlUpdateData = "UPDATE student SET student_name = '$student_name', gender = '$gender', image = '$image' WHERE id = $idUpdate";

		if ($connect->query($sqlUpdateData) === TRUE) {
			header('Location: list_students.php');
		}
	}
	?>
	<h1>Update</h1>
	<div class="input-form">
		<form action="#" name="inputForm" id="inputForm" method="POST" enctype="multipart/form-data" style="margin-left: 30%;">
			<div class="label">Name</div>
			<div class="input">
				<input type="text" name="name_of_student" id="name_of_student" value="<?php echo$update['student_name']?>">
			</div>
			<div class="label">Gender</div>
			<select name="gender">
				<option value="">--CHOOSE--</option>
				<option value="Male" <?php echo ($gender == 'M')?'selected':''?>>Male</option>
				<option value="Female" <?php echo ($gender == 'F')?'selected':''?>>Female</option>
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
			<div class="form-control">
				<div class="input">
					<input type="submit" name="update" value="Update">
				</div>
			</div>
		</form>
	</div>
</body>
</html>