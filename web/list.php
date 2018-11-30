<html>
    <head>
        <title> Listar </title>
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

    function printQuery($result,$name) {

        if ($name == "Processo") {
            echo("<p id='list_name'>Processos de Socorro</p><div id='div_list_table'><table border='1'>
                <tr><th>Numero Processo Socorro</th><th>Opção</th></tr>\n");
        }
        else if ($name == "Local") {
            echo("<p id='list_name'>Locais</p><div id='div_list_table'><table border='1'>
                <tr><th>Morada Local</th><th>Opção</th></tr>\n");
        }
        else if ($name == "Evento") {
            echo("<p id='list_name'>Eventos de Emergência</p><div id='div_list_table'><table border='1'><tr><th>Número Telefone</th><th>Instante Chamada</th><th>Nome Pessoa</th><th>Morada Local</th><th>Numero Processo Socorro</th><th>Opção</th></tr>\n");
        }
        else if ($name == "Meio") {
            echo("<p id='list_name'>Meios</p><div id='div_list_table'><table border='1'><tr><th>Numero Meio</th><th>Nome Meio</th><th>Nome Entidade</th><th>Opção</th></tr>\n");
        }
        else if ($name == "MeioCombate") {
            echo("<p id='list_name'>Meios de Combate</p><div id='div_list_table'><table border='1'><tr><th>Número Meio</th><th>Nome Meio</th><th>Nome Entidade</th><th colspan=2>Opção</th></tr>\n");
        }
        else if ($name == "MeioApoio"){
            echo("<p id='list_name'>Meios de Apoio</p><div id='div_list_table'><table border='1'><tr><th>Número Meio</th><th>Nome Meio</th><th>Nome Entidade</th><th colspan=2>Opção</th></tr>\n");
        }
        else if ($name == "MeioSocorro"){
            echo("<p id='list_name'>Meios de Socorro</p><div id='div_list_table'><table border='1'><tr><th>Número Meio</th><th>Nome Meio</th><th>Nome Entidade</th><th colspan=2>Opção</th></tr>\n");
        }
        else if ($name == "Entidade") {
            echo("<p id='list_name'>Entidades</p><div id='div_list_table'><table border='1'><tr><th>Nome Entidade</th><th>Opção</th></tr>\n");
        }
        else if ($name == "MeioAccProc") {
            echo("<div id='div_list_w_input'><table border='1' width='490'><tr><th>Número Meio</th><th>Nome Entidade</th><th>Numero Processo Socorro</th></tr>\n");
        }
        else if ($name == "MeioSocorroProcLocal") {
            echo("<div id='div_list_w_input_soc'><table border='1' width='1030'><tr><th>Numero Telefone</th><th>Instante de chamada</th><th>Nome Pessoa</th><th>Morada Local</th><th>Numero Processo Socorro</th><th>Numero de Meio</th><th>Nome Entidade</th></tr>\n");
        }
        else if ($name == "EventoProcesso"){
            echo("<p id='list_name'>Associar Processo a Evento</p><div id='div_list_table'><table border='1'>
            	<tr><th>Número Telefone</th><th>Instante Chamada</th><th>Nome Pessoa</th><th>Morada Local</th><th>Número Processo Socorro</th><th>Opção</th></tr>\n");
	    }
	    else if ($name == "MeioProcesso"){
	    	echo("<p id='list_name'>Associar Processo a Meio</p><div id='div_list_table'><table border='1'>
            	<tr><th>Número Meio</th><th>Nome Meio</th><th>Nome Entidade</th><th>Número Processo Socorro</th><th>Opção</th></tr>\n");
	    }
        

        $result->setFetchMode(PDO::FETCH_ASSOC);
        while($row = $result->fetch()){ 
            echo("<tr>"); 
            foreach($row as $key=>$val) { 
                echo("<td> $val </td>\n"); 
            }

            if ($name == "Processo") {
                echo("<td><a id='remove' href='RemoveQueries/runRemoval.php?table=$name&numProcessoSocorro=".$row["numprocessosocorro"]."'>Remover</a></td>");
            }
            else if ($name == "Local") {
               echo("<td><a id='remove' href='RemoveQueries/runRemoval.php?table=$name&moradaLocal=".$row["moradalocal"]."'>Remover</a></td>");
            }
            else if ($name == "Evento") {
                echo("<td><a id='remove' href='RemoveQueries/runRemoval.php?table=$name&numTelefone=".$row["numtelefone"]."&instanteChamada=".$row["instantechamada"]."'>Remover</a></td>");
            }
            else if ($name == "Meio") {
                echo("<td><a id='remove' href='RemoveQueries/runRemoval.php?table=$name&numMeio=".$row["nummeio"]."&nomeEntidade=".$row["nomeentidade"]."'>Remover</a></td>");
            }
            else if ($name == "Entidade") {
                echo("<td><a id='remove' href='RemoveQueries/runRemoval.php?table=$name&nomeEntidade=".$row["nomeentidade"]."'>Remover</a></td>");
            }
            else if ($name == "MeioCombate" || $name == "MeioApoio" || $name == "MeioSocorro"){
                echo("<td><a id='edit' href='UpdateQueries/update.php?table=$name&numMeio=".$row["nummeio"]."&nomeEntidade=".$row["nomeentidade"]."'>Editar</a></td><td><a id='remove' href='RemoveQueries/runRemoval.php?table=$name&numMeio=".$row["nummeio"]."&nomeEntidade=".$row["nomeentidade"]."'>Remover</a></td>");
            }
            else if ($name == "EventoProcesso"){
            	echo("<td><a id='edit' href='assoc.php?table=$name&numTelefone=".$row["numtelefone"]."&instanteChamada=".$row["instantechamada"]."&numProcessoSocorro=".$row["numprocessosocorro"]."&nomePessoa=".$row["nomepessoa"]."&moradaLocal=".$row["moradalocal"]."'>Associar</a></td>");
		    }
		    else if ($name == "MeioProcesso"){
		    	if(empty($row["numprocessosocorro"]))
		    		echo("<td align=center><a id='edit' href='assoc.php?table=$name&numMeio=".$row["nummeio"]."&nomeEntidade=".$row["nomeentidade"]."'>Associar</a></td>");
		    	else
		    		echo("<td><b style='color: #006600'>Associado</b></td>");
		    }
            echo("</tr>");
        }
        echo("</table></div>");
    }

    $table = $_REQUEST['table'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($table == "MeioAccProc"){
            $numProcesso = input($_POST["numprocessosocorro"]);
        }

        else if ($table == "MeioSocorroProcLocal"){
            $moradaLocal = input($_POST["moradalocal"]);
        }
    }

    function input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    if ($table == "MeioAccProc"){ ?>
        <form id="form_style_acc" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); echo "?table=MeioAccProc";?>">
          Número Processo Socorro:  <input id="input_style_list" type="text" name="numprocessosocorro"/>
          <br>
          <input id="button_style" type="submit" name="submit" value="Submeter">
        </form>
    <?php
    }

    else if ($table == "MeioSocorroProcLocal"){ ?>
        <form id="form_style_soc" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); echo "?table=MeioSocorroProcLocal";?>">
          Morada:  <input id="input_style_soc" type="text" name="moradalocal"/>
          <br>
          <input id="button_style_soc" type="submit" name="submit" value="Submeter">
        </form>
    <?php
    }


    try 
    {
        include "connect.php";

    if ($table == "MeioAccProc"){
        if ($numProcesso == "")
            $sql = "select * from Acciona order by numMeio, nomeEntidade;";
        else
            $sql = "select * from Acciona where numProcessoSocorro='$numProcesso' order by numMeio, nomeEntidade;";        

    }else if ($table == "MeioSocorroProcLocal"){
        if ($moradaLocal == "")
            $sql = "select numTelefone,instanteChamada,nomePessoa,moradaLocal,numProcessoSocorro,numMeio,nomeEntidade from Acciona natural join EventoEmergencia natural join MeioSocorro;";
        else
            $sql = "select numTelefone,instanteChamada,nomePessoa,moradaLocal,numProcessoSocorro,numMeio,nomeEntidade from EventoEmergencia natural join Acciona natural join MeioSocorro where moradaLocal='$moradaLocal';";

    }
    else if ($table == "Processo") {

        $sql = "select * from ProcessoSocorro;";

    }
    else if ($table == "Local") {

        $sql = "select * from Local order by moradaLocal;";

    }
    else if ($table == "Evento") {

        $sql = "select * from EventoEmergencia order by numTelefone, instanteChamada;";

    }
    else if ($table == "Meio") {

        $sql = "select numMeio, nomeMeio, nomeEntidade from Meio order by numMeio, nomeEntidade;";

    }
    else if ($table == "MeioCombate") {

        $sql = "select numMeio, nomeMeio, nomeEntidade from MeioCombate natural join Meio order by numMeio, nomeEntidade;";

    }
    else if ($table == "MeioApoio") {

        $sql = "select numMeio, nomeMeio, nomeEntidade from MeioApoio natural join Meio order by numMeio, nomeEntidade;";

    }
    else if ($table == "MeioSocorro") {

        $sql = "select numMeio, nomeMeio, nomeEntidade from MeioSocorro natural join Meio order by numMeio, nomeEntidade;";

    }
    else if ($table == "Entidade") {

        $sql = "select * from EntidadeMeio;";

    }
    else if ($table == "EventoProcesso"){

    	$sql = "select numTelefone, instanteChamada, nomePessoa, moradaLocal, e.numProcessoSocorro from EventoEmergencia e left outer join ProcessoSocorro p on e.numProcessoSocorro=p.numProcessoSocorro order by e.numTelefone, e.instanteChamada;";

    }
    else if ($table == "MeioProcesso"){

    	$sql = "select m.numMeio, m.nomeMeio, m.nomeEntidade, numProcessoSocorro from Meio m left outer join acciona a on m.nomeEntidade = a.nomeEntidade and m.numMeio = a.numMeio order by numMeio, nomeEntidade;";


    } else {
        echo("<script>console.log(\"Unexpected table name\");</script>");
    }

    $result = $db->prepare($sql);
    $result->execute();

    printQuery($result, $table);

    $db = null;
} 
catch (PDOException $e)
{
    echo("<p>ERROR: {$e->getMessage()}</p>");
}


?>
    </body>
</html>