<html>
    <head>
        <title> Associar </title>
        <link rel="stylesheet" href="style.css"/>
        <link rel="icon" type="image/png" href="database.png"/>
    </head>
    <body>
    <center>
        <h1 id="sgbd"><a id="link_sgbd" href="index.html">Sistema de Gestão de Incêndios Florestais</a></h1>
    </center>
        <ul id="menu">
            <li><a href="list.php?table=Local">Locais</a>
                <ul>
                    <li><a href="InsertQueries/insert.php?table=Local">Inserir</a></li>
                </ul>
            </li>
            <li>
                <a href="list.php?table=Evento">Eventos de Emergência</a>
                <ul>
                    <li><a href="InsertQueries/insert.php?table=Evento">Inserir</a></li>
                    <li><a href="list.php?table=EventoProcesso">Associar Processo</a></li>
                </ul>
            </li>
            <li><a href="list.php?table=Processo">Processos de Socorro</a>
                <ul>
                    <li><a href="InsertQueries/insert.php?table=Processo">Inserir</a></li>
                </ul>
            </li>
            <li><a href="list.php?table=Meio">Meios</a>
                <ul>
                    <li><a href="InsertQueries/insert.php?table=Meio">Inserir</a></li>
                    <li><a href="list.php?table=MeioCombate">Combate</a>
                        <ul>
                            <li><a href="InsertQueries/insert.php?table=MeioCombate">Inserir</a></li>
                        </ul>
                    </li>
                    <li><a href="list.php?table=MeioApoio">Apoio</a>
                        <ul>
                            <li><a href="InsertQueries/insert.php?table=MeioApoio">Inserir</a></li>
                        </ul>
                    </li>
                    <li><a href="list.php?table=MeioSocorro">Socorro</a>
                        <ul>
                            <li><a href="InsertQueries/insert.php?table=MeioSocorro">Inserir</a></li>
                        </ul>
                    </li>
                    <li><a href="list.php?table=MeioProcesso">Associar Processo</a></li>
                </ul>
            </li>
            <li><a href="list.php?table=Entidade">Entidades</a>
                <ul>
                    <li><a href="InsertQueries/insert.php?table=Entidade">Inserir</a></li>
                </ul>
            </li>
            <li><a href="#">Listagens</a>
                <ul>
                    <li><a href="list.php?table=MeioAccProc">Meios acionados num processo de socorro</a></li>
                    <li><a href="list.php?table=MeioSocorroProcLocal">
                    Meios de socorro em processos de socorro originados num dado local de incêndio</a>
                    </li>
                </ul>
            </li>
        </ul>
<?php

function assocProcess($numProcessoSocorro) {

		include "connect.php";

    	echo("<select id='combo_style' name='numProcessoSocorro'>");

        $sql = "select * from ProcessoSocorro;";
        $result = $db->prepare($sql);

        $result->execute();

        $result->setFetchMode(PDO::FETCH_ASSOC);

        if (empty($numProcessoSocorro))
            echo("<option value='NULL' selected > Escolha um número </option>\n");

        while($row = $result->fetch()){ 
            foreach($row as $key=>$val) {
            	if ($val == $numProcessoSocorro)
            		echo("<option value='$val' selected > $val </option>\n");
            	else
                	echo("<option value='$val'> $val </option>\n");
            }
        }

        echo("</select>");
}

$table = $_REQUEST['table'];


try 
{
    if ($table == "MeioProcesso") {

    	$numMeio = $_REQUEST['numMeio'];
        $nomeEntidade = $_REQUEST['nomeEntidade'];

        echo("<form id='form_style' action='InsertQueries/runInsertion.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <input type='hidden' name='numMeio' value='$numMeio'/>
        <input type='hidden' name='nomeEntidade' value='$nomeEntidade'/>
        <p id='form_title'>Associar Processo de Socorro a Meio</p>
        <p><b>Número do Meio:</b> $numMeio</p>
        <p><b>Nome da Entidade Detentora do Meio:</b> $nomeEntidade</p>
        <p><b>Número de Processo de Socorro:</b></p>");

        assocProcess("");

        echo("<br>
        <input id='button_style' type='submit' value='Submeter'/>
        </form>");
    }
    else if ($table == "EventoProcesso") {

    	$numTelefone = $_REQUEST['numTelefone'];
        $instanteChamada = $_REQUEST['instanteChamada'];
        $numProcessoSocorro = $_REQUEST['numProcessoSocorro'];
        $nomePessoa = $_REQUEST['nomePessoa'];
        $moradaLocal = $_REQUEST['moradaLocal'];

        echo("<form id='form_style_evento_proc' action='UpdateQueries/runUpdate.php' method='post'>
        <input type='hidden' name='table' value='$table'/>
        <input type='hidden' name='numTelefone' value='$numTelefone'/>
        <input type='hidden' name='instanteChamada' value='$instanteChamada'/>
        <input type='hidden' name='oldNumProcessoSocorro' value='$numProcessoSocorro'/>
        <p id='form_title'>Associar Processo de Socorro a Evento de Emergência</p>
        <p><b>Número de Telefone:</b> $numTelefone</p>
        <p><b>Instante da Chamada:</b> $instanteChamada</p>
        <p><b>Nome Pessoa:</b> $nomePessoa</p>
        <p><b>Morada Local:</b> $moradaLocal</p>
        <p><b>Número de Processo de Socorro:</b></p>");

        assocProcess($numProcessoSocorro);
        
        echo("<br>
        <input id='button_style' type='submit' value='Submeter'/>
        </form>");
    }
    
    else {
        echo("<script>console.log(\"Unexpected table name\");</script>");
    }

    $db = null;
} 
catch (PDOException $e)
{
    echo("<p>ERROR: {$e->getMessage()}</p>");
}


?>
    </body>
</html>