<html>
    <head>
        <title> Actualizar </title>
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
            default:
                echo("<p id='error'>Campo inválido.</p>");
                break;
        }
    }


?>
</center>
    </body>
</html>