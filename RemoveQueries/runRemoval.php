<html>
    <head>
        <title> Remove </title>
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

        $db->beginTransaction(); 

        if ($table == "Local") {

            $moradaLocal = $_POST['moradaLocal'];


            $sql = "delete from Local where moradaLocal= :moradaLocal;";
            $result = $db->prepare($sql);
            $result->execute([':moradaLocal' => $moradaLocal]);


        } else  if ($table == "Evento") {

            $numTelefone = $_REQUEST['numTelefone'];
            $instanteChamada = $_REQUEST['instanteChamada'];


            $sql = "delete from EventoEmergencia where numTelefone = :numTelefone and 
            instanteChamada = :instanteChamada;";
            $result = $db->prepare($sql);   
            $result->execute([':numTelefone' => $numTelefone, ':instanteChamada' => $instanteChamada]);


        } else  if ($table == "Processo") {

            $numProcessoSocorro = $_REQUEST['numProcessoSocorro'];


            $sql = "delete from ProcessoSocorro where numProcessoSocorro = :numProcessoSocorro;";
            $result = $db->prepare($sql);
            $result->execute([':numProcessoSocorro' => $numProcessoSocorro]);


        } else  if ($table == "Meio") {

            $numMeio = $_REQUEST['numMeio'];
            $nomeEntidade = $_REQUEST['nomeEntidade'];


            $sql = "delete from Meio where numMeio = :numMeio and nomeEntidade = :nomeEntidade";
            $result = $db->prepare($sql);
            $result->execute([':numMeio' => $numMeio, ':nomeEntidade' => $nomeEntidade]);


        } else  if ($table == "Entidade") {

            $nomeEntidade = $_REQUEST['nomeEntidade'];

            $sql = "delete from EntidadeMeio where nomeEntidade = :nomeEntidade";
            $result = $db->prepare($insertEntidade);
            $result->execute([':nomeEntidade' => $nomeEntidade]);


        } else  if ($table == "MeioCombate") {

            $numMeio = $_REQUEST['numMeio'];
            $nomeEntidade = $_REQUEST['nomeEntidade'];


            $sql = "delete from MeioCombate where numMeio = :numMeio and nomeEntidade = :nomeEntidade";
            $result = $db->prepare($insertMeioCombate);
            $result->execute([':numMeio' => $numMeio, ':nomeMeio' => $nomeMeio]);


        } else  if ($table == "MeioApoio") {

            $numMeio = $_REQUEST['numMeio'];
            $nomeEntidade = $_REQUEST['nomeEntidade'];


            $sql = "delete from MeioApoio where numMeio = :numMeio and nomeEntidade = :nomeEntidade";
            $result = $db->prepare($insertMeioCombate);
            $result->execute([':numMeio' => $numMeio, ':nomeMeio' => $nomeMeio]);


        } else  if ($table == "MeioSocorro") {

            $numMeio = $_REQUEST['numMeio'];
            $nomeEntidade = $_REQUEST['nomeEntidade'];


            $sql = "delete from MeioSocorro where numMeio = :numMeio and nomeEntidade = :nomeEntidade";
            $result = $db->prepare($insertMeioCombate);
            $result->execute([':numMeio' => $numMeio, ':nomeMeio' => $nomeMeio]);


        } else {
            #error message
        }

        $db->commit();
        $db = null;

    }
    catch (PDOException $e)
    {

        $db->rollBack();
        echo("<p>ERROR: {$e->getMessage()}</p>");

    }

?>
    </body>
</html>