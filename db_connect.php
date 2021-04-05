<?php 
	$conn = mysqli_connect('localhost', 'adam', 'test123', 'youtube');
	// check connection
	if(!$conn){
		echo 'Connection error: '.mysqli_connect_error();
	}
	else{
		echo 'Connected';
	}
 ?>