<html>
    <head>
        <title> Gestão Emergências </title>
    </head>
    <body>
<?php

    $insertLocal = "insert into Local(moradaLocal) values(:moradaLocal)";
    $insertEvento = "insert into EventoEmergencia(numTelefone, instanteChamada, nomePessoa, 
moradaLocal, numProcessoSocorro) values(:numTelefone, :instanteChamada, :nomePessoa, 
:moradaLocal, :numProcessoSocorro)"
    $insertProcesso = "insert into ProcessoSocorro(numProcessoSocorro) values(:numProcessoSocorro)";
    $insertMeio = "insert into Meio(numMeio, nomeMeio, nomeEntidade) values(:numMeio, :nomeMeio, 
:nomeEntidade)";
    $insertEntidade = "insert into EntidadeMeio(nomeEntidade) values(:nomeEntidade=?)";

    $removeLocal = "delete from Local where moradaLocal= :moradaLocal";
    $removeEvento = "delete from EventoEmergencia where numTelefone = :numTelefone and 
instanteChamada = :instanteChamada";
    $removeProcesso = "delete from ProcessoSocorro where numProcessoSocorro = :numProcessoSocorro";
    $removeMeio = "delete from Meio where numMeio = :numMeio and nomeEntidade = :nomeEntidade";
    $removeEntidade = "delete from EntidadeMeio where nomeEntidade = :nomeEntidade";


    try 
    {
        $user="ist186426";		// -> replace by the user name
        $host="db.ist.utl.pt";	        // -> server where postgres is running
        $port=5432;			// -> default port where Postgres is installed
        $password="ytub0362";	        // -> replace with the password
        $dbname = $user;		// -> by default the name of the database is the name of the user
        
        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $db = null;
    } 
    catch (PDOException $e)
    {
        echo("<p>ERROR: {$e->getMessage()}</p>");
    }

