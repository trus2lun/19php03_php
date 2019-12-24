<?php  
	include 'user.php';

	$user = new User();
	//$user->add();
	//echo "<br>";
	$user->edit();
	echo "<br>";
	$user->register();
	echo "<br>";
	$user->login();
	echo "<br>";
	$user->view();
	echo "<br>";
	$user->list();
	echo "<br>";
	echo $user->username;
	echo "<br>";
	echo $user->email;
	echo "<br>";
	echo $user->password;
	echo "<br>";
	echo $user->phone;
	echo "<br>";
	echo $user->address;
	echo "<br>";
?>