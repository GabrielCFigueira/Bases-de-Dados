<html>
    <head>
        <title> Remover </title>
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

        $db->beginTransaction(); 

        if ($table == "Local") {

            $moradaLocal = $_POST['moradaLocal'];


            $sql = "delete from Local where moradaLocal= :moradaLocal;";
            $result = $db->prepare($sql);
            $result->execute([':moradaLocal' => $moradaLocal]);

            echo("<p id='list_name_success'>Local removido com sucesso!</p>");


        } else  if ($table == "Evento") {

            $numTelefone = $_POST['numTelefone'];
            $instanteChamada = $_POST['instanteChamada'];


            $sql = "delete from EventoEmergencia where numTelefone = :numTelefone and 
            instanteChamada = :instanteChamada;";
            $result = $db->prepare($sql);   
            $result->execute([':numTelefone' => $numTelefone, ':instanteChamada' => $instanteChamada]);

            echo("<p id='list_name_success'>Evento de Emergência removido com sucesso!</p>");


        } else  if ($table == "Processo") {

            $numProcessoSocorro = $_POST['numProcessoSocorro'];


            $sql = "delete from ProcessoSocorro where numProcessoSocorro = :numProcessoSocorro;";
            $result = $db->prepare($sql);
            $result->execute([':numProcessoSocorro' => $numProcessoSocorro]);

            echo("<p id='list_name_success'>Processo de Socorro removido com sucesso!</p>");


        } else  if ($table == "Meio") {

            $numMeio = $_POST['numMeio'];
            $nomeEntidade = $_POST['nomeEntidade'];


            $sql = "delete from Meio where numMeio = :numMeio and nomeEntidade = :nomeEntidade";
            $result = $db->prepare($sql);
            $result->execute([':numMeio' => $numMeio, ':nomeEntidade' => $nomeEntidade]);

            echo("<p id='list_name_success'>Meio removido com sucesso!</p>");


        } else  if ($table == "Entidade") {

            $nomeEntidade = $_POST['nomeEntidade'];

            $sql = "delete from EntidadeMeio where nomeEntidade = :nomeEntidade";
            $result = $db->prepare($sql);
            $result->execute([':nomeEntidade' => $nomeEntidade]);

            echo("<p id='list_name_success'>Entidade removida com sucesso!</p>");


        } else  if ($table == "MeioCombate") {

            $numMeio = $_POST['numMeio'];
            $nomeEntidade = $_POST['nomeEntidade'];


            $sql = "delete from MeioCombate where numMeio = :numMeio and nomeEntidade = :nomeEntidade";
            $result = $db->prepare($sql);
            $result->execute([':numMeio' => $numMeio, ':nomeEntidade' => $nomeEntidade]);

            echo("<p id='list_name_success'>Meio de Combate removido com sucesso!</p>");


        } else  if ($table == "MeioApoio") {

            $numMeio = $_POST['numMeio'];
            $nomeEntidade = $_POST['nomeEntidade'];


            $sql = "delete from MeioApoio where numMeio = :numMeio and nomeEntidade = :nomeEntidade";
            $result = $db->prepare($sql);
            $result->execute([':numMeio' => $numMeio, ':nomeEntidade' => $nomeEntidade]);

            echo("<p id='list_name_success'>Meio de Apoio removido com sucesso!</p>");


        } else  if ($table == "MeioSocorro") {

            $numMeio = $_POST['numMeio'];
            $nomeEntidade = $_POST['nomeEntidade'];


            $sql = "delete from MeioSocorro where numMeio = :numMeio and nomeEntidade = :nomeEntidade";
            $result = $db->prepare($sql);
            $result->execute([':numMeio' => $numMeio, ':nomeEntidade' => $nomeEntidade]);

            echo("<p id='list_name_success'>Meio de Socorro removido com sucesso!</p>");


        } else {
            echo("<script>console.log(\"Unexpected table name\");</script>");
        }
        if($result->rowCount()==0)
            echo($table." nao foi removido porque ja nao existe");
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