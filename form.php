<!doctype html>
<html lang="en">
    <head><title>XSS test</title></head>
    <body>
        <form>
        	<input type="text" name="xss">
        	<input type="submit">
        </form>
        <p>Witaj: <?php echo $_GET['xss']; ?></p>
    </body>
</html>