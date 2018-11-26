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



    if ($table == "MeioCombate") {

        $newNumMeio = $_POST['newNumMeio'];
        $newNomeMeio = $_POST['newNomeMeio'];
        $newNomeEntidade = $_POST['newNomeEntidade'];
        $oldNumMeio = $_POST['oldNumMeio'];
        $oldNomeEntidade = $_POST['oldNomeEntidade'];

        $sql = "update MeioCombate set numMeio = :newnumMeio and nomeEntidade = :newnomeEntidade
and nomeMeio = :newNomeMeio where numMeio = :oldnumMeio and nomeEntidade = :oldnomeEntidade;";
        $result = $db->prepare($sql);
        $result->execute([':newNumMeio' => $newNumMeio, ':newNomeMeio' => $newNomeMeio, ':newNomeEntidade' =>
$newNomeEntidade, ':oldNumMeio' => $oldNumMeio, ':oldNomeEntidade' => $oldNomeEntidade]);


    } else  if ($table == "MeioApoio") {

        $newNumMeio = $_POST['newNumMeio'];
        $newNomeMeio = $_POST['newNomeMeio'];
        $newNomeEntidade = $_POST['newNomeEntidade'];
        $oldNumMeio = $_POST['oldNumMeio'];
        $oldNomeEntidade = $_POST['oldNomeEntidade'];

        $sql = "update MeioApoio set numMeio = :newnumMeio and nomeEntidade = :newnomeEntidade
and nomeMeio = :newNomeMeio where numMeio = :oldnumMeio and nomeEntidade = :oldnomeEntidade;";
        $result = $db->prepare($sql);
        $result->execute([':newNumMeio' => $newNumMeio, ':newNomeMeio' => $newNomeMeio, ':newNomeEntidade' =>
$newNomeEntidade, ':oldNumMeio' => $oldNumMeio, ':oldNomeEntidade' => $oldNomeEntidade]);


    } else  if ($table == "MeioSocorro") {

        $newNumMeio = $_POST['newNumMeio'];
        $newNomeMeio = $_POST['newNomeMeio'];
        $newNomeEntidade = $_POST['newNomeEntidade'];
        $oldNumMeio = $_POST['oldNumMeio'];
        $oldNomeEntidade = $_POST['oldNomeEntidade'];

        $sql = "update MeioSocorro set numMeio = :newnumMeio and nomeEntidade = :newnomeEntidade
and nomeMeio = :newNomeMeio where numMeio = :oldnumMeio and nomeEntidade = :oldnomeEntidade;";
        $result = $db->prepare($sql);
        $result->execute([':newNumMeio' => $newNumMeio, ':newNomeMeio' => $newNomeMeio, ':newNomeEntidade' =>
$newNomeEntidade, ':oldNumMeio' => $oldNumMeio, ':oldNomeEntidade' => $oldNomeEntidade]);


    }
    else  if ($table == "EventoProcesso") {
        $instanteChamada = $_POST['instanteChamada'];
        $numTelefone = $_POST['numTelefone'];
        $numProcessoSocorro = $_POST['numProcessoSocorro'];


        $sql = "update EventoEmergencia set numProcessoSocorro = :numProcessoSocorro 
where numTelefone = :numTelefone and instanteChamada = :instanteChamada;";
        $result = $db->prepare($sql);
        $result->execute([':instanteChamada' => $instanteChamada, ':numTelefone' => $numTelefone, ':numProcessoSocorro' => $numProcessoSocorro]);


    }
    
    else {
        #error message
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