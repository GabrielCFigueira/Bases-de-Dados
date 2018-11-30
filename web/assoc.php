<html>
    <head>
        <title> Associar </title>
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="icon" type="image/png" href="img/database.png"/>
    </head>
    <body>
<?php
	
	include "menu/menu.html";

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