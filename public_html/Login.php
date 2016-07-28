
<?php

		$printMsg=false;
		if(sizeof($_POST) > 0) {
			
			// load config file
		    require_once($_SERVER["DOCUMENT_ROOT"] . "/resources/config.php");

		    // build query
		    $sql = "SELECT * FROM utilizador WHERE email=\"" . $_POST["email"] . "\" AND password=\"" . $_POST["password"] . "\"";

		    // run query on db
		  	// echo("<p>Query: " . $sql . "</p>\n");
			$result = $connection->query($sql);
			
			if($result->rowCount() == 0)
				$printMsg = true; 
			else {
				$connection = null;
				header("Location: http://localhost:8888/public_html/Menu.html");
   				exit;
			} 
				
			
			// close connection. 	
		    $connection = null;
		    //echo("<p>Connection closed.</p>\n");
		    
		}
?>

<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" href="css/styles.css">
		<meta charset="UTF-8">
		<title> BD 2015/2016 </title> 
</head>
<body>
	<div class="div">
			<h1> Bases de Dados 2015/2016 </h1>
			<h2> Login </h2>
			<form action="http://localhost:8888/public_html/Login.php" method="post">
				Email :  <input type="text" name="email"><br>
				Password :  <input type="text" name="password"><br><br>
				<input type="submit">
				<br><br><br><br>
			</form>

			<form action="http://localhost:8888/Registar.php">
				<button type="submit"> Registar </button>
			</form>

			<?php 
				if($printMsg)
					echo("<p> Email or password are incorrect. </p>");
			?>

	</div>

</body>
</html>

