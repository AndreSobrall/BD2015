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
			<form>
				Username: <input type="text" name="username"><br>
				Password :  <input type="text" name="password"><br><br><br>
			</form>
			<form action="http://localhost:8888/Registar.php">
				<button type="submit"> Registar </button>
			</form>


	<?php
		// load config file
	    require_once($_SERVER["DOCUMENT_ROOT"] . "/resources/config.php");
 
	    // build query
	    $sql = "SELECT * FROM utilizador";

	    // run query on db
	  	echo("<p>Query: " . $sql . "</p>\n");
		$result = $connection->query($sql);
		
		// print result
		$num = $result->rowCount();
		echo("<p>$num records retrieved:</p>\n");
		echo("<table border=\"1\">\n");
		echo("<tr><th>userid</th><th>email</th><th>nome</th><th>password</th></tr>\n");
		
		foreach($result as $row)
		{
			echo("<tr><td>");
			echo($row["userid"]);
			echo("</td><td>");
			echo($row["email"]);
			echo("</td><td>");
			echo($row["nome"]);
			echo("</td><td>");
			echo($row["password"]);
			echo("</td></tr>\n");
		}
		echo("</table>\n");
		
		// close connection. 	
	    $connection = null;
		echo("<p>Connection closed.</p>\n");
	?>
	</div>


</body>
</html>

