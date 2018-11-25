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

        $db->beginTransaction(); 

        if ($table == "Local") {

            $moradaLocal = $_POST['moradaLocal'];


            $sql = "insert into Local(moradaLocal) values(:moradaLocal);";
            $result = $db->prepare($sql);
            $result->execute([':moradaLocal' => $moradaLocal]);


        } else  if ($table == "Evento") {

            $numTelefone = $_POST['numTelefone'];
            $instanteChamada = $_POST['instanteChamada'];
            $nomePessoa = $_POST['nomePessoa'];
            $moradaLocal = $_POST['moradaLocal'];
            $numProcessoSocorro = $_POST['numProcessoSocorro'];


            $sql = "insert into EventoEmergencia(numTelefone, instanteChamada, nomePessoa, moradaLocal, numProcessoSocorro) 
values(:numTelefone, :instanteChamada, :nomePessoa, :moradaLocal, :numProcessoSocorro);";
            $result = $db->prepare($sql);   
            $result->execute([':moradaLocal' => $moradaLocal, ':numTelefone' => $numTelefone, ':instanteChamada' => $instanteChamada,
':nomePessoa' => $nomePessoa, ':numProcessoSocorro' => $numProcessoSocorro]);


        } else  if ($table == "Processo") {

            $numProcessoSocorro = $_POST['numProcessoSocorro'];


            $sql = "insert into ProcessoSocorro(numProcessoSocorro) values(:numProcessoSocorro);";
            $result = $db->prepare($sql);
            $result->execute([':numProcessoSocorro' => $numProcessoSocorro]);


        } else  if ($table == "Meio") {

            $numMeio = $_POST['numMeio'];
            $nomeMeio = $_POST['nomeMeio'];
            $nomeEntidade = $_POST['nomeEntidade'];


            $sql = "insert into Meio(numMeio, nomeMeio, nomeEntidade) values(:numMeio, :nomeMeio, :nomeEntidade);";
            $result = $db->prepare($sql);
            $result->execute([':numMeio' => $numMeio, ':nomeMeio' => $nomeMeio, ':nomeEntidade' => $nomeEntidade]);


        } else  if ($table == "Entidade") {

            $nomeEntidade = $_POST['nomeEntidade'];

            $sql = "insert into EntidadeMeio(nomeEntidade) values(:nomeEntidade);";
            $result = $db->prepare($insertEntidade);
            $result->execute([':nomeEntidade' => $nomeEntidade]);


        } else  if ($table == "MeioCombate") {

            $numMeio = $_POST['numMeio'];
            $nomeEntidade = $_POST['nomeEntidade'];


            $sql = "insert into MeioCombate(numMeio, nomeEntidade) values(:numMeio, :nomeEntidade);";
            $result = $db->prepare($insertMeioCombate);
            $result->execute([':numMeio' => $numMeio, ':nomeMeio' => $nomeMeio]);


        } else  if ($table == "MeioApoio") {

            $numMeio = $_POST['numMeio'];
            $nomeEntidade = $_POST['nomeEntidade'];


            $sql = "insert into MeioApoio(numMeio, nomeEntidade) values(:numMeio, :nomeEntidade);";
            $result = $db->prepare($insertMeioCombate);
            $result->execute([':numMeio' => $numMeio, ':nomeMeio' => $nomeMeio]);


        } else  if ($table == "MeioSocorro") {

            $numMeio = $_POST['numMeio'];
            $nomeEntidade = $_POST['nomeEntidade'];


            $sql = "insert into MeioSocorro(numMeio, nomeEntidade) values(:numMeio, :nomeEntidade);";
            $result = $db->prepare($insertMeioCombate);
            $result->execute([':numMeio' => $numMeio, ':nomeMeio' => $nomeMeio]);


        } else  if ($table == "MeioProcesso") {

            $numMeio = $_POST['numMeio'];
            $nomeEntidade = $_POST['nomeEntidade'];
            $numProcessoSocorro = $_POST['numProcessoSocorro'];


            $sql = "insert into Acciona(numMeio, nomeEntidade, numProcessoSocorro) values(:numMeio, :nomeEntidade, :numProcessoSocorro);";
            $result = $db->prepare($insertMeioCombate);
            $result->execute([':numMeio' => $numMeio, ':nomeMeio' => $nomeMeio, ':numProcessoSocorro' => $numProcessoSocorro]);


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