<!DOCTYPE html>
<html>
<head>
	<title>List student</title>
	<style type="text/css">
		table {
			border-collapse: collapse;
			width: 800px;
		}
		table, tr, th, td {
			border: 1px solid black;
		}
		img {
			width: 150px;
		}
		.a {
			height: 100px;
		}
	</style>
</head>
<body>
	<?php 
	include 'database.php';
	// get category
		$sqlCate = "SELECT * FROM school";
		$categories = mysqli_query($connect, $sqlCate);
	// end get category
	$sqlSelect = "SELECT  student.id, student.student_name, student.gender, student.image, school.school_name
					FROM student
					INNER JOIN school ON student.school_category_id = school.id";
	// Thuc hien chuc nang tim kiem
	$keyword = '';
	if (isset($_POST['search'])) {
		$keyword = $_POST['keyword'];
		// search keyword
		if ($keyword != '') {
			$product_category_id = $_POST['school_category_id'];
			$sqlSelect = "SELECT student.id, student.name, student.image, school.school_name
			 FROM student
			INNER JOIN school ON student.school_category_id = school.id WHERE (student_name LIKE '%$keyword%' OR gender LIKE '%$keyword%') AND school_category_id = $school_category_id";
		}

	}

	$result = mysqli_query($connect, $sqlSelect);

?>
	<h1>List product</h1>
	<a href="BT19.php">Back To Input Area</a>
	<form action="#" method="POST" name="search-product">
		<p>
			Keywords
			<input type="text" name="keyword" value="<?php echo $keyword;?>">
			<input type="submit" name="search" id="search" value="Search">
		</p>
		<p>
			Category
			<select name="school_category_id">
				<?php 
						while ($row = $categories->fetch_assoc()) {
							echo "<option value='".$row['id']."'>".$row['school_name']."</option>";
						}
				?>
			</select>
		</p>
	</form>
	<table>
		<tr>
			<th>No.</th>
			<th>Student name</th>
			<th>Gender</th>
			<th>School</th>
			<th>Image</th>
			<th>Action</th>
		</tr>
		<?php 
			while ($row = $result->fetch_assoc()) {
				$id = $row['id'];
				//var_dump($row);
				//exit();
				echo "<tr>";
				echo "<td>".$row['id']."</td>";
				echo "<td>".$row['student_name']."</td>";
				echo "<td>".$row['gender']."</td>";
				echo "<td>".$row['school_name']."</td>";
				echo "<td><img src='uploads/".$row['image']."'></td>";
				echo "<td><a href='delete.php?id=".$id."''>Delete</a> ";
				echo "</tr>";
			}
		?>
	</table>

</body>