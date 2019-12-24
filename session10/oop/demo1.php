<?php
	include 'user.php';

	$customer = new Customer();
	$customer->pay();
	echo "<br>";
	$customer->history();
	echo "<br>"; 
	$customer->register();
	$customer->test();
?>