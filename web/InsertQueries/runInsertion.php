<html>
    <head>
        <title> Inserir </title>
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

            $moradaLocal = $_POST['moradaLocal'];


            $sql = "insert into Local(moradaLocal) values(:moradaLocal);";
            $result = $db->prepare($sql);
            $result->execute([':moradaLocal' => $moradaLocal]);

            echo("<p id='list_name_success'>Local inserido com sucesso!</p>");


        } else  if ($table == "Processo") {

            $numTelefone = $_POST['numTelefone'];
            $instanteChamada = $_POST['instanteChamada'];
            $nomePessoa = $_POST['nomePessoa'];
            $moradaLocal = $_POST['moradaLocal'];
            $numProcessoSocorro = $_POST['numProcessoSocorro'];

            $sql = "insert into ProcessoSocorro(numProcessoSocorro) values(:numProcessoSocorro);";
            $result = $db->prepare($sql);
            $result->execute([':numProcessoSocorro' => $numProcessoSocorro]);

            echo("<p id='list_name_success'>Processo de Socorro inserido com sucesso!</p>");

            $sql = "insert into EventoEmergencia(numTelefone, instanteChamada, nomePessoa, moradaLocal, numProcessoSocorro) values(:numTelefone, :instanteChamada, :nomePessoa, :moradaLocal, :numProcessoSocorro);";
            $result = $db->prepare($sql);   
            $result->execute([':moradaLocal' => $moradaLocal, ':numTelefone' => $numTelefone, ':instanteChamada' => $instanteChamada, ':nomePessoa' => $nomePessoa, ':numProcessoSocorro' => $numProcessoSocorro]);

            echo("<p id='list_name_success'>Evento de Emergência inserido com sucesso!</p>");


        } else  if ($table == "Evento"){

            $numTelefone = $_POST['numTelefone'];
            $instanteChamada = $_POST['instanteChamada'];
            $nomePessoa = $_POST['nomePessoa'];
            $moradaLocal = $_POST['moradaLocal'];
            $numProcessoSocorro = $_POST['numProcessoSocorro'];

            $sql = "insert into EventoEmergencia(numTelefone, instanteChamada, nomePessoa, moradaLocal, numProcessoSocorro) values(:numTelefone, :instanteChamada, :nomePessoa, :moradaLocal, :numProcessoSocorro);";
            $result = $db->prepare($sql);   
            $result->execute([':moradaLocal' => $moradaLocal, ':numTelefone' => $numTelefone, ':instanteChamada' => $instanteChamada, ':nomePessoa' => $nomePessoa, ':numProcessoSocorro' => $numProcessoSocorro]);

            echo("<p id='list_name_success'>Evento de Emergência inserido com sucesso!</p>");

        } else  if ($table == "Meio") {

            $numMeio = $_POST['numMeio'];
            $nomeMeio = $_POST['nomeMeio'];
            $nomeEntidade = $_POST['nomeEntidade'];


            $sql = "insert into Meio(numMeio, nomeMeio, nomeEntidade) values(:numMeio, :nomeMeio, :nomeEntidade);";
            $result = $db->prepare($sql);
            $result->execute([':numMeio' => $numMeio, ':nomeMeio' => $nomeMeio, ':nomeEntidade' => $nomeEntidade]);

            echo("<p id='list_name_success'>Meio inserido com sucesso!</p>");


        } else  if ($table == "Entidade") {

            $nomeEntidade = $_POST['nomeEntidade'];

            $sql = "insert into EntidadeMeio(nomeEntidade) values(:nomeEntidade);";
            $result = $db->prepare($sql);
            $result->execute([':nomeEntidade' => $nomeEntidade]);

            echo("<p id='list_name_success'>Entidade inserida com sucesso!</p>");


        } else  if ($table == "MeioCombate") {

            $numMeio = $_POST['numMeio'];
            $nomeEntidade = $_POST['nomeEntidade'];


            $sql = "insert into MeioCombate(numMeio, nomeEntidade) values(:numMeio, :nomeEntidade);";
            $result = $db->prepare($sql);
            $result->execute([':numMeio' => $numMeio, ':nomeEntidade' => $nomeEntidade]);

            echo("<p id='list_name_success'>Meio de Combate inserido com sucesso!</p>");


        } else  if ($table == "MeioApoio") {

            $numMeio = $_POST['numMeio'];
            $nomeEntidade = $_POST['nomeEntidade'];


            $sql = "insert into MeioApoio(numMeio, nomeEntidade) values(:numMeio, :nomeEntidade);";
            $result = $db->prepare($sql);
            $result->execute([':numMeio' => $numMeio, ':nomeEntidade' => $nomeEntidade]);

            echo("<p id='list_name_success'>Meio de Apoio inserido com sucesso!</p>");


        } else  if ($table == "MeioSocorro") {

            $numMeio = $_POST['numMeio'];
            $nomeEntidade = $_POST['nomeEntidade'];


            $sql = "insert into MeioSocorro(numMeio, nomeEntidade) values(:numMeio, :nomeEntidade);";
            $result = $db->prepare($sql);
            $result->execute([':numMeio' => $numMeio, ':nomeEntidade' => $nomeEntidade]);

            echo("<p id='list_name_success'>Meio de Socorro inserido com sucesso!</p>");


        } else  if ($table == "MeioProcesso") {

            $numMeio = $_POST['numMeio'];
            $nomeEntidade = $_POST['nomeEntidade'];
            $numProcessoSocorro = $_REQUEST['numProcessoSocorro'];

            $sql = "insert into Acciona(numMeio,nomeEntidade,numProcessoSocorro) values(:numMeio,:nomeEntidade,:numProcessoSocorro)";
            $result = $db->prepare($sql);
            $result->execute([':numMeio' => $numMeio, ':nomeEntidade' => $nomeEntidade, ':numProcessoSocorro' => $numProcessoSocorro]);

            echo("<p id='list_name_success'>Processo associado com sucesso!</p>");


        } else {
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
    </body>
</html>