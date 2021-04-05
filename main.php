<!doctype html>
<html lang="en">
    <head><title>XSS test</title></head>
    <body>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        	<label>Login: </label>
        	<input type="text" name="xss"><br />
        	<label>Password: </label>
        	<input type="text" name="mess"><br />
        	<input type="submit">
        </form>


        <?php
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
  			// collect value of input field
  			$name = htmlspecialchars($_POST['xss']);
  			$mess = htmlspecialchars($_POST['mess']);
  			if (empty($name)) {
   				echo "Name is empty";
  			} else if (empty($mess)) {
  				echo "Brak wiadomosci";
  			} else {
    			echo $name;
    			echo $mess;
  			}
			}
		?>
    </body>
</html>

