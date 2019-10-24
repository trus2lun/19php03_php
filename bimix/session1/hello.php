<?php
	echo "<h1>Hello world!</h1>";
?>
<h2>h2 tag</h2>
<?php
	$userName = 'php03' ;
	echo $userName;
	echo "<br>";
?>
<?php
	$userName = 'Nguyễn Hoàng Phúc';
	echo $userName;
	echo "<br>";
	$country = 'Đà Nẵng';
	echo $country;
	echo "<br>";
	$phone = '0903';
	echo $phone;
	echo "<br>";
?>
<?php
	$month = 12;
	if (($month<1)||($month>12)) {
		echo "Không phải tháng trong năm. ";
	}
	switch ($month) {
		case 1:
			echo " tháng 1 có 31 ngày ";
			break;
		case 2:
			echo " tháng 2 có 28 hoặc 29 ngày";
			break;
		case 3:
			echo " tháng 3 có 31 ngày ";
			break;
		case 4:
			echo " tháng 4 có 30 ngày ";
			break;
		case 5:
			echo " tháng 5 có 31 ngày ";
			break;
		case 6:
			echo " tháng 6 có 30 ngày ";
			break;
		case 7:
			echo " tháng 7 có 31 ngày ";
			break;
		case 8:
			echo " tháng 8 có 31 ngày ";
			break;
		case 9:
			echo " tháng 9 có 30 ngày ";
			break;
		case 10:
			echo " tháng 10 có 31 ngày ";
			break;
		case 11:
			echo " tháng 11 có 30 ngày ";
			break;
		case 12:
			echo " tháng 12 có 31 ngày ";
			break;
		default:
			echo " Nhập lại bạn ei";
			break;
	}
?>