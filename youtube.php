
<!DOCTYPE html>
 <html>
 	<head>
 		<style>
			<?php include 'style.css'; ?>
		</style>
 		<link rel="stylesheet" href="style.css">
 	</head>
 	<body>
	 	<section class="container grey-text">
	 		<h4 class="center">Rejestracja</h4>
	 		<form class="white" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
	 			<label>Imie:</label>
	 			<input type="text" name="imie">
	 			<label>Nazwisko:</label>
	 			<input type="text" name="nazwisko">
	 			<label>Email:</label>
	 			<input type="text" name="email">
	 			<label>Numer karty:</label>
	 			<input type="text" name="nrkarty">
	 			<div class="center">
	 				<input type="submit" name="submit" value="Zarejestruj" class="btn brand z-depth-0">
	 			</div>
	 			<button class="button"><a href="select.php" class="button" target="_blank">Znajdz uzytkownika</a></button>
	 		</form>
	 	</section>

	 	<?php

			include('config/db_connect.php');

			

		 	$imie = mysqli_real_escape_string($conn, $_POST['imie']);
			$nazwisko = mysqli_real_escape_string($conn, $_POST['nazwisko']);
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$numer = mysqli_real_escape_string($conn, $_POST['nrkarty']);

				// create sql
			$sql1 = "INSERT INTO uzytkownicy(Imie, Nazwisko, Email, Numer_karty) VALUES('$imie', '$nazwisko', '$email', '$numer')";
			
				// save to db and check
			if(mysqli_query($conn, $sql1)){
				// success
				echo "Done";
				
			} else{
				echo 'query error'.mysqli_error($conn);
			}

			mysqli_close($conn);

		?>
 	</body>

 </html>

 