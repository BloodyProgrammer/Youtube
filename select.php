<?php

	include('config/db_connect.php');
	$imie = $_POST['imie'];//mysqli_real_escape_string($conn,
	$nazwisko = $_POST['nazwisko'];//mysqli_real_escape_string($conn, 

	// $sql = "SELECT Email FROM uzytkownicy WHERE Imie = '".$imie."' AND Nazwisko = '".$nazwisko."'";
	$prepared = mysqli_prepare($conn, "SELECT Email FROM uzytkownicy WHERE Imie = ? AND Nazwisko = ?");
	mysqli_stmt_bind_param($prepared, "ss", $imie, $nazwisko);
	
	// if(mysqli_query($conn, $sql)){ //mysqli_stmt_execute($prepared);
	// 	echo "Done";	
	// 	$wynik = mysqli_query($conn, $sql);
	// 	$uzytkownicy = mysqli_fetch_all($wynik, MYSQLI_ASSOC);	
	// } else{
	// 	echo 'query error'.mysqli_error($conn);
	// }

	// if(mysqli_stmt_execute($prepared)){ //mysqli_stmt_execute($prepared);
	// 	echo "Done";	
	// 	$wynik = mysqli_stmt_execute($prepared);
	// 	mysqli_stmt_bind_result($prepared, $imie, $nazwisko);
	// $uzytkownicy = mysqli_stmt_fetch($wynik);	
		
	// } else{
	// 	echo 'query error'.mysqli_error($conn);
	// }
	$uzytkownicy = array();
	mysqli_stmt_execute($prepared);
	$wynik = $prepared->get_result(); // mysqli_stmt_get_result($prepared)
	// $wynik = mysqli_stmt_get_result($prepared)
	while ($data = $wynik->fetch_assoc()) // mysqli_fetch_assoc($wynik)
	//mysqli_fetch_assoc($wynik)
	{
    	$uzytkownicy[] = $data;
	}

	mysqli_stmt_close($prepared);
	mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<style>
			<?php include 'style.css'; ?>
	</style>
</head>
<body>
	<section class="container grey-text">
 		<h4 class="center">Wyświetl uzytkowników</h4>
 		<form class="white" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
 			<label>Imie:</label>
 			<input type="text" name="imie">
 			<label>Nazwisko:</label>
 			<input type="text" name="nazwisko">
 			<div class="center">
 				<input type="submit" name="submit" value="submit">
 			</div>
 		</form>
 	</section>
 	<div class="container">
 		<div class="row">
 			<?php foreach($uzytkownicy as $uzytkownik): ?>
 				<div>
 					<div>
 						<div>		
 							<h6><?php echo $uzytkownik['Email']; ?> </h6>		
 						</div>
 					</div>
 				</div>
 			<?php endforeach; ?>  			
 		</div>
 	</div>
 </body>
</html>

