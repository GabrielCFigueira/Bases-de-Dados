<html>
    <head>
        <title> Insert </title>
        <link rel="stylesheet" href="../style.css"/>
        <link rel="icon" type="image/png" href="../Postgresql.png"/>
    </head>
    <body>
        <center>
            <h1 id="sgbd"><a id="link_sgbd" href="../index.html">Sistema de Gestão de Incêndios Florestais</a></h1>
        </center>
        <ul id="menu">
            <li><a href="#">Locais</a>
                <ul>
                    <li><a href="../InsertQueries/insert.php?table=Local">Inserir</a></li>
                    <li><a href="../RemoveQueries/remove.php?table=Local">Remover</a></li>
                    <li><a href="../list.php?table=Local">Listar</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Eventos de Emergência</a>
                <ul>
                    <li><a href="../InsertQueries/insert.php?table=Evento">Inserir</a></li>
                    <li><a href="../RemoveQueries/remove.php?table=Evento">Remover</a></li>
                    <li><a href="../list.php?table=Evento">Listar</a></li>
                    <li><a href="../assoc.php?table=EventoProcesso">Associar Processo</a></li>
                </ul>
            </li>
            <li><a href="#">Processos de Socorro</a>
                <ul>
                    <li><a href="../InsertQueries/insert.php?table=Processo">Inserir</a></li>
                    <li><a href="../RemoveQueries/remove.php?table=Processo">Remover</a></li>
                    <li><a href="../list.php?table=Processo">Listar</a></li>
                </ul>
            </li>
            <li><a href="#">Meios</a>
                <ul>
                    <li><a href="../InsertQueries/insert.php?table=Meio">Inserir</a></li>
                    <li><a href="../RemoveQueries/remove.php?table=Meio">Remover</a></li>
                    <li><a href="../list.php?table=Meio">Listar</a></li>
                    <li><a href="#">Combate</a>
                        <ul>
                            <li><a href="../InsertQueries/insert.php?table=MeioCombate">Inserir</a></li>
                            <li><a href="../list.php?table=EditarMeioCombate">Editar</a></li>
                            <li><a href="../RemoveQueries/remove.php?table=MeioCombate">Remover</a></li>
                            <li><a href="../list.php?table=MeioCombate">Listar</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Apoio</a>
                        <ul>
                            <li><a href="../InsertQueries/insert.php?table=MeioApoio">Inserir</a></li>
                            <li><a href="../list.php?table=EditarMeioApoio">Editar</a></li>
                            <li><a href="../RemoveQueries/remove.php?table=MeioApoio">Remover</a></li>
                            <li><a href="../list.php?table=MeioApoio">Listar</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Socorro</a>
                        <ul>
                            <li><a href="../InsertQueries/insert.php?table=MeioSocorro">Inserir</a></li>
                            <li><a href="../list.php?table=EditarMeioSocorro">Editar</a></li>
                            <li><a href="../RemoveQueries/remove.php?table=MeioSocorro">Remover</a></li>
                            <li><a href="../list.php?table=MeioSocorro">Listar</a></li>
                        </ul>
                    </li>
                    <li><a href="../assoc.php?table=MeioProcesso">Associar Processo</a></li>
                </ul>
            </li>
            <li><a href="#">Entidades</a>
                <ul>
                    <li><a href="../InsertQueries/insert.php?table=Entidade">Inserir</a></li>
                    <li><a href="../RemoveQueries/remove.php?table=Entidade">Remover</a></li>
                    <li><a href="../list.php?table=Entidade">Listar</a></li>
                </ul>
            </li>
            <li><a href="#">Listagens</a>
                <ul>
                    <li><a href="../list.php?table=MeioAccProc">Meios acionados num processo de socorro</a></li>
                    <li><a href="../list.php?table=MeioSocorroProcLocal">
                    Meios de socorro em processos de socorro originados num dado local de incêndio</a>
                    </li>
                </ul>
            </li>
        </ul>
<?php

$table = $_REQUEST['table'];


try 
{
    include "../connect.php";
    
    $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($table == "MeioProcesso") {

        $numMeio = $_POST['numMeio'];
        $nomeEntidade = $_POST['nomeEntidade'];
        $numProcessoSocorro = $_REQUEST['numProcessoSocorro'];

        $sql = "insert into Acciona(numMeio,nomeEntidade,numProcessoSocorro) values(:numMeio,:nomeEntidade,:numProcessoSocorro)";
        $result = $db->prepare($sql);
        $result->execute([':numMeio' =>
$numMeio, ':nomeEntidade' => $nomeEntidade, ':numProcessoSocorro' => $numProcessoSocorro]);

        echo("<p id='list_name_success'>Processo associado com sucesso!</p>");


    }else if ($table == "EventoProcesso") {

        $numTelefone = $_POST['numTelefone'];
        $instanteChamada = $_POST['instanteChamada'];
        $numProcessoSocorro = $_REQUEST['numProcessoSocorro'];

        $sql = "update EventoEmergencia set numProcessoSocorro = :numProcessoSocorro where numTelefone = :numTelefone and instanteChamada = :instanteChamada;";
        $result = $db->prepare($sql);
        $result->execute([':numProcessoSocorro' => $numProcessoSocorro, ':numTelefone' =>
$numTelefone, ':instanteChamada' => $instanteChamada]);

        echo("<p id='list_name_success'>Processo associado com sucesso!</p>");


    }else if ($table == "EditarMeioCombate") {

        $newNumMeio = $_POST['newNumMeio'];
        $newNomeEntidade = $_POST['newNomeEntidade'];
        $oldNumMeio = $_REQUEST['numMeio'];
        $oldNomeEntidade = $_REQUEST['nomeEntidade'];

        $sql = "update MeioCombate set numMeio = :newNumMeio, nomeEntidade = :newNomeEntidade where numMeio = :oldNumMeio and nomeEntidade = :oldNomeEntidade;";
        $result = $db->prepare($sql);
        $result->execute([':newNumMeio' => $newNumMeio, ':newNomeEntidade' =>
$newNomeEntidade, ':oldNumMeio' => $oldNumMeio, ':oldNomeEntidade' => $oldNomeEntidade]);

        echo("<p id='list_name_success'>Meio de Combate actualizado com sucesso!</p>");


    } else  if ($table == "EditarMeioApoio") {

        $newNumMeio = $_POST['newNumMeio'];
        $newNomeEntidade = $_POST['newNomeEntidade'];
        $oldNumMeio = $_REQUEST['numMeio'];
        $oldNomeEntidade = $_REQUEST['nomeEntidade'];

        $sql = "update MeioApoio set numMeio = :newNumMeio, nomeEntidade = :newNomeEntidade where numMeio = :oldNumMeio and nomeEntidade = :oldNomeEntidade;";
        $result = $db->prepare($sql);
        $result->execute([':newNumMeio' => $newNumMeio, ':newNomeEntidade' =>
$newNomeEntidade, ':oldNumMeio' => $oldNumMeio, ':oldNomeEntidade' => $oldNomeEntidade]);

        echo("<p id='list_name_success'>Meio de Apoio actualizado com sucesso!</p>");


    } else  if ($table == "EditarMeioSocorro") {

        $newNumMeio = $_POST['newNumMeio'];
        $newNomeEntidade = $_POST['newNomeEntidade'];
        $oldNumMeio = $_REQUEST['numMeio'];
        $oldNomeEntidade = $_REQUEST['nomeEntidade'];

        $sql = "update MeioSocorro set numMeio = :newNumMeio, nomeEntidade = :newNomeEntidade where numMeio = :oldNumMeio and nomeEntidade = :oldNomeEntidade;";
        $result = $db->prepare($sql);
        $result->execute([':newNumMeio' => $newNumMeio, ':newNomeEntidade' =>
$newNomeEntidade, ':oldNumMeio' => $oldNumMeio, ':oldNomeEntidade' => $oldNomeEntidade]);

        echo("<p id='list_name_success'>Meio de Socorro actualizado com sucesso!</p>");

    }
    
    else {
        echo("<script>console.log(\"Unexpected table name\");</script>");
    }

    $db = null;
} 
catch (PDOException $e)
{    
    switch($e->getCode()){
    case 23505:
        echo("Chave duplicada. O elemento nao foi inserido");
        break;
    case 23503:
        echo("Chave estrangeira inexistente");
        break;
    case 22P02:
        echo("Campo inválido");
        break;
}
    //echo("<p>ERROR: {$e->getMessage()}</p>");
}


?>
</center>
    </body>
</html>