<html>
    <head>
        <title> Insert </title>
        <link rel="stylesheet" href="../style.css"/>
        <link rel="icon" type="image/png" href="../database.png"/>
    </head>
    <body>
        <center>
            <h1 id="sgbd"><a id="link_sgbd" href="../index.html">Sistema de Gestão de Incêndios Florestais</a></h1>
        </center>
        <ul id="menu">
            <li><a href="../list.php?table=Local">Locais</a>
                <ul>
                    <li><a href="../InsertQueries/insert.php?table=Local">Inserir</a></li>
                </ul>
            </li>
            <li>
                <a href="../list.php?table=Evento">Eventos de Emergência</a>
                <ul>
                    <li><a href="../InsertQueries/insert.php?table=Evento">Inserir</a></li>
                    <li><a href="../list.php?table=EventoProcesso">Associar Processo</a></li>
                </ul>
            </li>
            <li><a href="../list.php?table=Processo">Processos de Socorro</a>
                <ul>
                    <li><a href="../InsertQueries/insert.php?table=Processo">Inserir</a></li>
                </ul>
            </li>
            <li><a href="../list.php?table=Meio">Meios</a>
                <ul>
                    <li><a href="../InsertQueries/insert.php?table=Meio">Inserir</a></li>
                    <li><a href="../list.php?table=MeioCombate">Combate</a>
                        <ul>
                            <li><a href="../InsertQueries/insert.php?table=MeioCombate">Inserir</a></li>
                        </ul>
                    </li>
                    <li><a href="../list.php?table=MeioApoio">Apoio</a>
                        <ul>
                            <li><a href="../InsertQueries/insert.php?table=MeioApoio">Inserir</a></li>
                        </ul>
                    </li>
                    <li><a href="../list.php?table=MeioSocorro">Socorro</a>
                        <ul>
                            <li><a href="../InsertQueries/insert.php?table=MeioSocorro">Inserir</a></li>
                        </ul>
                    </li>
                    <li><a href="../list.php?table=MeioProcesso">Associar Processo</a></li>
                </ul>
            </li>
            <li><a href="../list.php?table=Entidade">Entidades</a>
                <ul>
                    <li><a href="../InsertQueries/insert.php?table=Entidade">Inserir</a></li>
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

    $db->beginTransaction();

    if ($table == "MeioProcesso") {

        $numMeio = $_POST['numMeio'];
        $nomeEntidade = $_POST['nomeEntidade'];
        $numProcessoSocorro = $_REQUEST['numProcessoSocorro'];

        $sql = "insert into Acciona(numMeio,nomeEntidade,numProcessoSocorro) values(:numMeio,:nomeEntidade,:numProcessoSocorro)";
        $result = $db->prepare($sql);
        $result->execute([':numMeio' => $numMeio, ':nomeEntidade' => $nomeEntidade, ':numProcessoSocorro' => $numProcessoSocorro]);

        echo("<p id='list_name_success'>Processo associado com sucesso!</p>");


    }else if ($table == "EventoProcesso") {

        $numTelefone = $_POST['numTelefone'];
        $instanteChamada = $_POST['instanteChamada'];
        $numProcessoSocorro = $_POST['numProcessoSocorro'];
        $oldnumProcessoSocorro = $_POST['oldNumProcessoSocorro'];

        $sql = "select 1 from EventoEmergencia where numProcessoSocorro=:numProcessoSocorro;";
        $result = $db->prepare($sql);
        $result->execute([':numProcessoSocorro' => $oldnumProcessoSocorro]);
        $count = $result->rowCount();

        $sql = "update EventoEmergencia set numProcessoSocorro = :numProcessoSocorro where numTelefone = :numTelefone and instanteChamada = :instanteChamada;";
        $result = $db->prepare($sql);
        $result->execute([':numProcessoSocorro' => $numProcessoSocorro, ':numTelefone' => $numTelefone, ':instanteChamada' => $instanteChamada]);

        if($count==1){
            $sql = "delete from ProcessoSocorro where numProcessoSocorro = :numProcessoSocorro;";
            $result = $db->prepare($sql);
            $result->execute([':numProcessoSocorro' => $oldnumProcessoSocorro]);
            echo("<p id='list_name_success'>O processo número $oldnumProcessoSocorro foi eliminado!</p>");
        }

        echo("<p id='list_name_success'>Processo associado com sucesso!</p>");


    }else if ($table == "MeioCombate") {

        $newNumMeio = $_POST['newNumMeio'];
        $newNomeEntidade = $_POST['newNomeEntidade'];
        $oldNumMeio = $_REQUEST['numMeio'];
        $oldNomeEntidade = $_REQUEST['nomeEntidade'];

        $sql = "update MeioCombate set numMeio = :newNumMeio, nomeEntidade = :newNomeEntidade where numMeio = :oldNumMeio and nomeEntidade = :oldNomeEntidade;";
        $result = $db->prepare($sql);
        $result->execute([':newNumMeio' => $newNumMeio, ':newNomeEntidade' => $newNomeEntidade, ':oldNumMeio' => $oldNumMeio, ':oldNomeEntidade' => $oldNomeEntidade]);

        echo("<p id='list_name_success'>Meio de Combate actualizado com sucesso!</p>");


    } else  if ($table == "MeioApoio") {

        $newNumMeio = $_POST['newNumMeio'];
        $newNomeEntidade = $_POST['newNomeEntidade'];
        $oldNumMeio = $_REQUEST['numMeio'];
        $oldNomeEntidade = $_REQUEST['nomeEntidade'];

        $sql = "update MeioApoio set numMeio = :newNumMeio, nomeEntidade = :newNomeEntidade where numMeio = :oldNumMeio and nomeEntidade = :oldNomeEntidade;";
        $result = $db->prepare($sql);
        $result->execute([':newNumMeio' => $newNumMeio, ':newNomeEntidade' => $newNomeEntidade, ':oldNumMeio' => $oldNumMeio, ':oldNomeEntidade' => $oldNomeEntidade]);

        echo("<p id='list_name_success'>Meio de Apoio actualizado com sucesso!</p>");


    } else  if ($table == "MeioSocorro") {

        $newNumMeio = $_POST['newNumMeio'];
        $newNomeEntidade = $_POST['newNomeEntidade'];
        $oldNumMeio = $_REQUEST['numMeio'];
        $oldNomeEntidade = $_REQUEST['nomeEntidade'];

        $sql = "update MeioSocorro set numMeio = :newNumMeio, nomeEntidade = :newNomeEntidade where numMeio = :oldNumMeio and nomeEntidade = :oldNomeEntidade;";
        $result = $db->prepare($sql);
        $result->execute([':newNumMeio' => $newNumMeio, ':newNomeEntidade' => $newNomeEntidade, ':oldNumMeio' => $oldNumMeio, ':oldNomeEntidade' => $oldNomeEntidade]);

        echo("<p id='list_name_success'>Meio de Socorro actualizado com sucesso!</p>");

    }
    
    else {
        echo("<script>console.log(\"Unexpected table name\");</script>");
    }

    $db->commit();
    $db = null;
} 
catch (PDOException $e)
{
    $db->rollBack();
    switch($e->getCode()){
    case "23505":
        echo("<p id='error'>Chave duplicada. O elemento não foi inserido.</p>");
        break;
    case "23503":
        echo("<p id='error'>Chave estrangeira inexistente.</p>");
        break;
    case "22P02":
        echo("<p id='error'>Campo inválido.</p>");
        break;
    }
}


?>
</center>
    </body>
</html>