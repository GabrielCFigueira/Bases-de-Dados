<html>
    <head>
        <title> Gestão Emergências </title>
    </head>
    <body>
<?php

    //insert queries
    $insertLocal = "insert into Local(moradaLocal) values(:moradaLocal)";
    $insertEvento = "insert into EventoEmergencia(numTelefone, instanteChamada, nomePessoa, 
moradaLocal, numProcessoSocorro) values(:numTelefone, :instanteChamada, :nomePessoa, 
:moradaLocal, :numProcessoSocorro)"
    $insertProcesso = "insert into ProcessoSocorro(numProcessoSocorro) values(:numProcessoSocorro)";
    $insertMeio = "insert into Meio(numMeio, nomeMeio, nomeEntidade) values(:numMeio, :nomeMeio, 
:nomeEntidade)";
    $insertEntidade = "insert into EntidadeMeio(nomeEntidade) values(:nomeEntidade=?)";
    $insertMeioCombate = "insert into MeioCombate(numMeio, nomeEntidade) values(:numMeio, :nomeEntidade);"
    $insertMeioApoio = "insert into MeioApoio(numMeio, nomeEntidade) values(:numMeio, :nomeEntidade);"
    $insertMeioSocorro = "insert into MeioSocorro(numMeio, nomeEntidade) values(:numMeio, :nomeEntidade);"


    
    //remove queries
    $removeLocal = "delete from Local where moradaLocal= :moradaLocal";
    $removeEvento = "delete from EventoEmergencia where numTelefone = :numTelefone and 
instanteChamada = :instanteChamada";
    $removeProcesso = "delete from ProcessoSocorro where numProcessoSocorro = :numProcessoSocorro";
    $removeMeio = "delete from Meio where numMeio = :numMeio and nomeEntidade = :nomeEntidade";
    $removeEntidade = "delete from EntidadeMeio where nomeEntidade = :nomeEntidade";
    $removeMeioCombate = "delete from MeioCombate where numMeio = :numMeio and nomeEntidade = :nomeEntidade"
    $removeMeioApoio = "delete from MeioApoio where numMeio = :numMeio and nomeEntidade = :nomeEntidade"
    $removeMeioSocorro = "delete from MeioSocorro where numMeio = :numMeio and nomeEntidade = :nomeEntidade"



    //update queries
    $updateMeioCombate = "update MeioCombate set numMeio = :newnumMeio and nomeEntidade = :newnomeEntidade
where numMeio = :oldnumMeio and nomeEntidade = :oldnomeEntidade"
    $updateMeioApoio = "update MeioApoio set numMeio = :newnumMeio and nomeEntidade = :newnomeEntidade
where numMeio = :oldnumMeio and nomeEntidade = :oldnomeEntidade"
    $updateMeioSocorro = "update MeioSocorro set numMeio = :newnumMeio and nomeEntidade = :newnomeEntidade
where numMeio = :oldnumMeio and nomeEntidade = :oldnomeEntidade"



    //listar Processos de Socorro
    $listProcessoSocorro = "select * from ProcessoSocorro";

    //listar Meios
    $listMeio = "select * from Meio";

    //associar Processos de Socorro a Meios
    $assocProcessoMeio = null;

    //associar Processos de Socorro a Eventos de Emergência
    $assocProcessoEvento = null;

    //listar os Meios accionados num Processo de Socorro
    $accioProcessoMeio = null;

    //listar os Meios de Socorro accionados em processos de Socorros originados num dado local de incendio
    $accioMeioSocorroLocal = null;

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

