<html>
    <head>
        <title> Insert </title>
    </head>
    <body>
<?php

$table = $_REQUEST['table'];


try 
{
    $user="istxxxxxx";		// -> replace by the user name
    $host="db.ist.utl.pt";	        // -> server where postgres is running
    $port=5432;			// -> default port where Postgres is installed
    $password="pass";	        // -> replace with the password
    $dbname = $user;		// -> by default the name of the database is the name of the user
    
    $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



    if ($table == "EditarMeioCombate") {

        $newNumMeio = $_POST['newNumMeio'];
        $newNomeEntidade = $_POST['newNomeEntidade'];
        $oldNumMeio = $_REQUEST['numMeio'];
        $oldNomeEntidade = $_REQUEST['nomeEntidade'];

        $sql = "update MeioCombate set numMeio = :newNumMeio, nomeEntidade = :newNomeEntidade where numMeio = :oldNumMeio and nomeEntidade = :oldNomeEntidade;";
        $result = $db->prepare($sql);
        $result->execute([':newNumMeio' => $newNumMeio, ':newNomeEntidade' =>
$newNomeEntidade, ':oldNumMeio' => $oldNumMeio, ':oldNomeEntidade' => $oldNomeEntidade]);


    } else  if ($table == "EditarMeioApoio") {

        $newNumMeio = $_POST['newNumMeio'];
        $newNomeEntidade = $_POST['newNomeEntidade'];
        $oldNumMeio = $_REQUEST['numMeio'];
        $oldNomeEntidade = $_REQUEST['nomeEntidade'];

        $sql = "update MeioApoio set numMeio = :newNumMeio, nomeEntidade = :newNomeEntidade where numMeio = :oldNumMeio and nomeEntidade = :oldNomeEntidade;";
        $result = $db->prepare($sql);
        $result->execute([':newNumMeio' => $newNumMeio, ':newNomeEntidade' =>
$newNomeEntidade, ':oldNumMeio' => $oldNumMeio, ':oldNomeEntidade' => $oldNomeEntidade]);


    } else  if ($table == "EditarMeioSocorro") {

        $newNumMeio = $_POST['newNumMeio'];
        $newNomeEntidade = $_POST['newNomeEntidade'];
        $oldNumMeio = $_REQUEST['numMeio'];
        $oldNomeEntidade = $_REQUEST['nomeEntidade'];

        $sql = "update MeioSocorro set numMeio = :newNumMeio, nomeEntidade = :newNomeEntidade where numMeio = :oldNumMeio and nomeEntidade = :oldNomeEntidade;";
        $result = $db->prepare($sql);
        $result->execute([':newNumMeio' => $newNumMeio, ':newNomeEntidade' =>
$newNomeEntidade, ':oldNumMeio' => $oldNumMeio, ':oldNomeEntidade' => $oldNomeEntidade]);


    }
    
    else {
        echo("<script>console.log(\"Unexpected table name\");</script>");
    }

    $db = null;
} 
catch (PDOException $e)
{
    echo("<p>ERROR: {$e->getMessage()}</p>");
}


?>
</center>
    </body>
</html>