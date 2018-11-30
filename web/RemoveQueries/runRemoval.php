<html>
    <head>
        <title> Remover </title>
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
            default:
                echo("<p id='error'>Campo inválido.</p>");
                break;
        }
    }

?>
    </body>
</html>