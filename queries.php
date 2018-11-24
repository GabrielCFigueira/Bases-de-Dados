<html>
    <head>
        <title> Gestão Florestal </title>
    </head>
    <body>
<?php

    function printQuery($result) {
        echo("<table border='5'>"); 
        $result->setFetchMode(PDO::FETCH_ASSOC);   
        while($row = $result->fetch()){ 
            echo("<tr>"); 
            foreach($row as $key=>$val) { 
                echo("<td> $key : $val </td>\n"); 
            }
            echo("</tr>");
        }
        echo("</table>");
    }

    //insert queries
    $insertLocal = "insert into Local(moradaLocal) values(:moradaLocal)";
    $insertEvento = "insert into EventoEmergencia(numTelefone, instanteChamada, nomePessoa, 
moradaLocal, numProcessoSocorro) values(:numTelefone, :instanteChamada, :nomePessoa, 
:moradaLocal, :numProcessoSocorro)"
    $insertProcesso = "insert into ProcessoSocorro(numProcessoSocorro) values(:numProcessoSocorro)";
    $insertMeio = "insert into Meio(numMeio, nomeMeio, nomeEntidade) values(:numMeio, :nomeMeio, 
:nomeEntidade)";
    $insertEntidade = "insert into EntidadeMeio(nomeEntidade) values(:nomeEntidade)";
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


    echo("<table border=\"0\" cellspacing=\"5\">\n");

    echo("<tr>\n");
    echo("<td><a href=\"balance.php\">Listar Processos Socorro</a></td>\n");
    echo("</tr>\n");

    echo("<tr>\n");
    echo("<td><a href=\"balance.php\">Listar Meios</a></td>\n");
    echo("</tr>\n");

    echo("<tr>\n");
    echo("<td><a href=\"balance.php\">Associar Processos de Socorro a Meios</a></td>\n");
    echo("</tr>\n");

    echo("<tr>\n");
    echo("<td><a href=\"balance.php\">Associar Processos de Socorro a Eventos de Emergência</a></td>\n");
    echo("</tr>\n");

    echo("<tr>\n");
    echo("<td><form action='listMeiosProc.php' method='post'>
    <p>Listar Meios accionados num Processo de Socorro</p>
    <p>Número de Processo de Socorro: <input type='text' name='numProcessoSocorro'/>
    <input type='submit' value='Submit'/></p>
    </form></td>");
    echo("</tr>\n");

    echo("<tr>\n");
    echo("<td><form action='listMeiosLocal.php' method='post'>
    <p>Listar Meios accionados em Processos de Socorro num dado local de incendio</p>
    <p>Morada do Local: <input type='text' name='moradaLocal'/>
    <input type='submit' value='Submit'/></p>
    </form></td>")
    echo("</tr>\n");

    echo("</table>\n");


    try 
    {
        $user="istxxxxxx";		// -> replace by the user name
        $host="db.ist.utl.pt";	        // -> server where postgres is running
        $port=5432;			// -> default port where Postgres is installed
        $password="pass";	        // -> replace with the password
        $dbname = $user;		// -> by default the name of the database is the name of the user
        
        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $db = null;
    } 
    catch (PDOException $e)
    {
        echo("<p>ERROR: {$e->getMessage()}</p>");
    }


    ?>
    </body>
</html>

