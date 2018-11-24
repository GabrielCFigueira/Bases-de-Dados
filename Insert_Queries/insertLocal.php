<html>
    <head>
        <title> Update </title>
    </head>
    <body>
<?php

    $table = $_REQUEST['table'];

    try 
    {
        $user="ist186426";		// -> replace by the user name
        $host="db.ist.utl.pt";	        // -> server where postgres is running
        $port=5432;			// -> default port where Postgres is installed
        $password="gqck3074";	        // -> replace with the password
        $dbname = $user;		// -> by default the name of the database is the name of the user
        
        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $db->beginTransaction(); 


        if ($table == "Local") {

            echo("<p> funcionou</p>");

            $moradaLocal = $_REQUEST['moradaLocal'];


            $sql = "insert into Local(moradaLocal) values(:moradaLocal);";
            $result = $db->prepare($sql);
            $result->execute([':moradaLocal' => $moradaLocal]);


        } else  if ($table == "Evento") {

            $numTelefone = $_REQUEST['numTelefone'];
            $instanteChamada = $_REQUEST['instanteChamada'];
            $nomePessoa = $_REQUEST['nomePessoa'];
            $moradaLocal = $_REQUEST['moradaLocal'];
            $numProcessoSocorro = $_REQUEST['numProcessoSocorro'];


            $sql = "insert into EventoEmergencia(numTelefone, instanteChamada, nomePessoa, moradaLocal, numProcessoSocorro) 
values(:numTelefone, :instanteChamada, :nomePessoa, :moradaLocal, :numProcessoSocorro);";
            $result = $db->prepare($sql);   
            $result->execute([':moradaLocal' => $moradaLocal, ':numTelefone' => $numTelefone, ':instanteChamada' => $instanteChamada,
':nomePessoa' => $nomePessoa, ':numProcessoSocorro' => $numProcessoSocorro]);


        } else  if ($table == "Processo") {

            $numProcessoSocorro = $_REQUEST['numProcessoSocorro'];


            $sql = "insert into ProcessoSocorro(numProcessoSocorro) values(:numProcessoSocorro);";
            $result = $db->prepare($sql);
            $result->execute([':numProcessoSocorro' => $numProcessoSocorro]);


        } else  if ($table == "Meio") {

            $numMeio = $_REQUEST['numMeio'];
            $nomeMeio = $_REQUEST['nomeMeio'];
            $nomeEntidade = $_REQUEST['nomeEntidade'];


            $sql = "insert into Meio(numMeio, nomeMeio, nomeEntidade) values(:numMeio, :nomeMeio, :nomeEntidade);";
            $result = $db->prepare($sql);
            $result->execute([':numMeio' => $numMeio, ':nomeMeio' => $nomeMeio, ':nomeEntidade' => $nomeEntidade]);


        } else  if ($table == "Entidade") {

            $nomeEntidade = $_REQUEST['nomeEntidade'];

            $sql = "insert into EntidadeMeio(nomeEntidade) values(:nomeEntidade);";
            $result = $db->prepare($insertEntidade);
            $result->execute([':nomeEntidade' => $nomeEntidade]);


        } else  if ($table == "MeioCombate") {

            $numMeio = $_REQUEST['numMeio'];
            $nomeEntidade = $_REQUEST['nomeEntidade'];


            $sql = "insert into MeioCombate(numMeio, nomeEntidade) values(:numMeio, :nomeEntidade);";
            $result = $db->prepare($insertMeioCombate);
            $result->execute([':numMeio' => $numMeio, ':nomeMeio' => $nomeMeio]);


        } else  if ($table == "MeioApoio") {

            $numMeio = $_REQUEST['numMeio'];
            $nomeEntidade = $_REQUEST['nomeEntidade'];


            $sql = "insert into MeioApoio(numMeio, nomeEntidade) values(:numMeio, :nomeEntidade);";
            $result = $db->prepare($insertMeioCombate);
            $result->execute([':numMeio' => $numMeio, ':nomeMeio' => $nomeMeio]);


        } else  if ($table == "MeioSocorro") {

            $numMeio = $_REQUEST['numMeio'];
            $nomeEntidade = $_REQUEST['nomeEntidade'];


            $sql = "insert into MeioSocorro(numMeio, nomeEntidade) values(:numMeio, :nomeEntidade);";
            $result = $db->prepare($insertMeioCombate);
            $result->execute([':numMeio' => $numMeio, ':nomeMeio' => $nomeMeio]);


        } else {
            #error message
        }

        $db->commit();

    }
    catch (PDOException $e)
    {

        $db->rollBack();
        echo("<p>ERROR: {$e->getMessage()}</p>");

    }

?>
    </body>
</html>