<html>
    <head>
        <title> Inserir </title>
        <link rel="stylesheet" href="../css/style.css"/>
        <link rel="icon" type="image/png" href="../img/database.png"/>
    </head>
    <body>
<?php

    include "../menu/submenu.html";

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
            default:
                echo("<p id='error'>Campo inválido.</p>");
                break;
        }
    }

?>
    </body>
</html>