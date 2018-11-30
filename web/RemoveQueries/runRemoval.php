<html>
    <head>
        <title> Remover </title>
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

        if ($table == "Local") {

            $moradaLocal = $_REQUEST['moradaLocal'];


            $sql = "delete from Local where moradaLocal= :moradaLocal;";
            $result = $db->prepare($sql);
            $result->execute([':moradaLocal' => $moradaLocal]);


        } else  if ($table == "Evento") {

            $numTelefone = $_REQUEST['numTelefone'];
            $instanteChamada = $_REQUEST['instanteChamada'];

            $sql = "select numprocessosocorro from EventoEmergencia where numTelefone = :numTelefone and instanteChamada = :instanteChamada;";
            $result = $db->prepare($sql);
            $result->execute([':numTelefone' => $numTelefone, ':instanteChamada' => $instanteChamada]);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $numProcessoSocorro = $result->fetch()["numprocessosocorro"];

            $sql = "select 1 from EventoEmergencia where numProcessoSocorro=:numProcessoSocorro;";
            $result = $db->prepare($sql);
            $result->execute([':numProcessoSocorro' => $numProcessoSocorro]);
            $count = $result->rowCount();

            if($count==1){
                $sql = "delete from ProcessoSocorro where numProcessoSocorro = :numProcessoSocorro;";
                $result = $db->prepare($sql);
                $result->execute([':numProcessoSocorro' => $numProcessoSocorro]);
                echo("<p id='list_name_success'>O processo número $numProcessoSocorro foi eliminado!</p>");
            }else{
                $sql = "delete from EventoEmergencia where numTelefone = :numTelefone and instanteChamada = :instanteChamada;";
                $result = $db->prepare($sql);   
                $result->execute([':numTelefone' => $numTelefone, ':instanteChamada' => $instanteChamada]);
            }

            $table = "Evento de Emergência";


        } else  if ($table == "Processo") {

            $numProcessoSocorro = $_REQUEST['numProcessoSocorro'];


            $sql = "delete from ProcessoSocorro where numProcessoSocorro = :numProcessoSocorro;";
            $result = $db->prepare($sql);
            $result->execute([':numProcessoSocorro' => $numProcessoSocorro]);

            $table = "Processo de Socorro";


        } else  if ($table == "Meio") {

            $numMeio = $_REQUEST['numMeio'];
            $nomeEntidade = $_REQUEST['nomeEntidade'];


            $sql = "delete from Meio where numMeio = :numMeio and nomeEntidade = :nomeEntidade";
            $result = $db->prepare($sql);
            $result->execute([':numMeio' => $numMeio, ':nomeEntidade' => $nomeEntidade]);



        } else  if ($table == "Entidade") {

            $nomeEntidade = $_REQUEST['nomeEntidade'];

            $sql = "delete from EntidadeMeio where nomeEntidade = :nomeEntidade";
            $result = $db->prepare($sql);
            $result->execute([':nomeEntidade' => $nomeEntidade]);



        } else  if ($table == "MeioCombate") {

            $numMeio = $_REQUEST['numMeio'];
            $nomeEntidade = $_REQUEST['nomeEntidade'];


            $sql = "delete from MeioCombate where numMeio = :numMeio and nomeEntidade = :nomeEntidade";
            $result = $db->prepare($sql);
            $result->execute([':numMeio' => $numMeio, ':nomeEntidade' => $nomeEntidade]);

            $table = "Meio de Combate";


        } else  if ($table == "MeioApoio") {

            $numMeio = $_REQUEST['numMeio'];
            $nomeEntidade = $_REQUEST['nomeEntidade'];


            $sql = "delete from MeioApoio where numMeio = :numMeio and nomeEntidade = :nomeEntidade";
            $result = $db->prepare($sql);
            $result->execute([':numMeio' => $numMeio, ':nomeEntidade' => $nomeEntidade]);

            $table = "Meio de Apoio";


        } else  if ($table == "MeioSocorro") {

            $numMeio = $_REQUEST['numMeio'];
            $nomeEntidade = $_REQUEST['nomeEntidade'];


            $sql = "delete from MeioSocorro where numMeio = :numMeio and nomeEntidade = :nomeEntidade";
            $result = $db->prepare($sql);
            $result->execute([':numMeio' => $numMeio, ':nomeEntidade' => $nomeEntidade]);

            $table = "Meio de Socorro";


        } else {
            echo("<script>console.log(\"Unexpected table name\");</script>");
        }
        if($result->rowCount()==0)
            echo("<p id='error'>".$table." não foi removido porque não existe.");
        else
            echo("<p id='list_name_success'>".$table." removido com sucesso!</p>");
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
    </body>
</html>