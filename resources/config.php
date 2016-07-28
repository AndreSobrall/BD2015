<?php
 
/*
    The important thing to realize is that the config file should be included in every
    page of your project, or at least any page you want access to these settings.
    This allows you to confidently use these settings throughout a project because
    if something changes such as your database credentials, or a path to a specific resource,
    you'll only need to update it here.
*/

// Credenciais da base de dados
$dbname = "bd2015";
$username = "root";
$password = "root";
$host = "localhost";

// Ligacao a base de dados
try {
    $connection = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Assegura que dados de texto da base de dados, sao codificados em utf-8.
$sql = "SET NAMES 'utf8'";
$connection->query($sql);


// Funcao de impressao de resultados
function printQueryResults($info, $result) {
    echo("<table border=\"1\">\n");
    echo("<tr>");
    for($i = 0; $i < sizeof($info); $i++) {
        echo("<th>" . $info[$i] . "</th>");
    }
    echo("</tr>\n");

    foreach($result as $row)
    {   
        echo("<tr>");
        for($i = 0; $i < sizeof($info); $i++) {
            echo("<td>" . $row[$info[$i]] . "</td>");
        }
        echo("</tr>");
    }

    echo("</table>\n");
}

/*  how to print results:
    $num = $result->rowCount();
    echo("<p>$num records retrieved:</p>\n");
    $info=array("email","password");
    printQueryResults($info,$result); */

// Array que guarda urls e paths 
$config = array(
    "urls" => array(
        "baseUrl" => "http://localhost:8888"
    ),

    "paths" => array(
        "resources" => "/Users/Andre/dev/repos/ist/BD2015/resources",
        "images" => array(
            "content" => $_SERVER["DOCUMENT_ROOT"] . "/images/content",
            "layout" => $_SERVER["DOCUMENT_ROOT"] . "/images/layout"
        )
    )
);

/*
    Error reporting.
*/
ini_set("error_reporting", "true");
error_reporting(E_ALL|E_STRCT);

?>
