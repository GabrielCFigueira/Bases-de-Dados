<html>
    <head>
        <title> Listar </title>
        <link rel="stylesheet" href="style.css"/>
        <link rel="icon" type="image/png" href="Postgresql.png"/>
    </head>
    <body>
        <center>
            <h1 id="sgbd"><a id="link_sgbd" href="index.html">Sistema de Gestão de Incêndios Florestais</a></h1>
        </center>
        <ul id="menu">
            <li><a href="#">Locais</a>
                <ul>
                    <li><a href="InsertQueries/insert.php?table=Local">Inserir</a></li>
                    <li><a href="RemoveQueries/remove.php?table=Local">Remover</a></li>
                    <li><a href="list.php?table=Local">Listar</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Eventos de Emergência</a>
                <ul>
                    <li><a href="InsertQueries/insert.php?table=Evento">Inserir</a></li>
                    <li><a href="RemoveQueries/remove.php?table=Evento">Remover</a></li>
                    <li><a href="list.php?table=Evento">Listar</a></li>
                    <li><a href="assoc.php?table=EventoProcesso">Associar Processo</a></li>
                </ul>
            </li>
            <li><a href="#">Processos de Socorro</a>
                <ul>
                    <li><a href="InsertQueries/insert.php?table=Processo">Inserir</a></li>
                    <li><a href="RemoveQueries/remove.php?table=Processo">Remover</a></li>
                    <li><a href="list.php?table=Processo">Listar</a></li>
                </ul>
            </li>
            <li><a href="#">Meios</a>
                <ul>
                    <li><a href="InsertQueries/insert.php?table=Meio">Inserir</a></li>
                    <li><a href="RemoveQueries/remove.php?table=Meio">Remover</a></li>
                    <li><a href="list.php?table=Meio">Listar</a></li>
                    <li><a href="#">Combate</a>
                        <ul>
                            <li><a href="InsertQueries/insert.php?table=MeioCombate">Inserir</a></li>
                            <li><a href="list.php?table=EditarMeioCombate">Editar</a></li>
                            <li><a href="RemoveQueries/remove.php?table=MeioCombate">Remover</a></li>
                            <li><a href="list.php?table=MeioCombate">Listar</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Apoio</a>
                        <ul>
                            <li><a href="InsertQueries/insert.php?table=MeioApoio">Inserir</a></li>
                            <li><a href="list.php?table=EditarMeioApoio">Editar</a></li>
                            <li><a href="RemoveQueries/remove.php?table=MeioApoio">Remover</a></li>
                            <li><a href="list.php?table=MeioApoio">Listar</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Socorro</a>
                        <ul>
                            <li><a href="InsertQueries/insert.php?table=MeioSocorro">Inserir</a></li>
                            <li><a href="list.php?table=EditarMeioSocorro">Editar</a></li>
                            <li><a href="RemoveQueries/remove.php?table=MeioSocorro">Remover</a></li>
                            <li><a href="list.php?table=MeioSocorro">Listar</a></li>
                        </ul>
                    </li>
                    <li><a href="assoc.php?table=MeioProcesso">Associar Processo</a></li>
                </ul>
            </li>
            <li><a href="#">Entidades</a>
                <ul>
                    <li><a href="InsertQueries/insert.php?table=Entidade">Inserir</a></li>
                    <li><a href="RemoveQueries/remove.php?table=Entidade">Remover</a></li>
                    <li><a href="list.php?table=Entidade">Listar</a></li>
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
                <tr><th>Numero Processo Socorro</th></tr>\n");
        }
        else if ($name == "Local") {
            echo("<p id='list_name'>Locais</p><div id='div_list_table'><table border='1'>
                <tr><th>Morada Local</th></tr>\n");
        }
        else if ($name == "Evento") {
            echo("<p id='list_name'>Eventos de Emergência</p><div id='div_list_table'><table border='1'><tr><th>Numero Telefone</th><th>Instante Chamada</th><th>Nome Pessoa</th><th>Morada Local</th><th>Numero Processo Socorro</th></tr>\n");
        }
        else if ($name == "Meio") {
            echo("<p id='list_name'>Meios</p><div id='div_list_table'><table border='1'><tr><th>Numero Meio</th><th>Nome Meio</th><th>Nome Entidade</th></tr>\n");
        }
        else if ($name == "MeioCombate") {
            echo("<p id='list_name'>Meios de Combate</p><div id='div_list_table'><table border='1'><tr><th>Numero Meio</th><th>Nome Meio</th><th>Nome Entidade</th></tr>\n");
        }
        else if ($name == "MeioApoio"){
            echo("<p id='list_name'>Meios de Apoio</p><div id='div_list_table'><table border='1'><tr><th>Numero Meio</th><th>Nome Meio</th><th>Nome Entidade</th></tr>\n");
        }
        else if ($name == "MeioSocorro"){
            echo("<p id='list_name'>Meios de Socorro</p><div id='div_list_table'><table border='1'><tr><th>Numero Meio</th><th>Nome Meio</th><th>Nome Entidade</th></tr>\n");
        }
        else if ($name == "Entidade") {
            echo("<p id='list_name'>Entidades</p><div id='div_list_table'><table border='1'><tr><th>Nome Entidade</th></tr>\n");
        }
        else if ($name == "MeioAccProc") {
            echo("<div id='div_list_w_input'><table border='1' width='490'><tr><th>Numero Meio</th><th>Nome Entidade</th><th>Numero Processo Socorro</th></tr>\n");
        }
        else if ($name == "MeioSocorroProcLocal") {
            echo("<div id='div_list_w_input_soc'><table border='1' width='1030'><tr><th>Numero Telefone</th><th>Instante de chamada</th><th>Nome Pessoa</th><th>Morada Local</th><th>Numero Processo Socorro</th><th>Numero de Meio</th><th>Nome Entidade</th></tr>\n");
        }
        else if ($name == "EditarMeioCombate"){
            echo("<p id='list_name'>Meios de Combate</p><div id='div_list_table'><table border='1'><tr><th>Numero Meio</th><th>Nome Meio</th><th>Nome Entidade</th><th>Opção</th></tr>\n");
        }
        else if ($name == "EditarMeioApoio"){
            echo("<p id='list_name'>Meios de Apoio</p><div id='div_list_table'><table border='1'><tr><th>Numero Meio</th><th>Nome Meio</th><th>Nome Entidade</th><th>Opção</th></tr>\n");
        }
        else if($name == "EditarMeioSocorro"){
            echo("<p id='list_name'>Meios de Socorro</p><div id='div_list_table'><table border='1'><tr><th>Numero Meio</th><th>Nome Meio</th><th>Nome Entidade</th><th>Opção</th></tr>\n");
        }
        

        $result->setFetchMode(PDO::FETCH_ASSOC);
        while($row = $result->fetch()){ 
            echo("<tr>"); 
            foreach($row as $key=>$val) { 
                echo("<td> $val </td>\n"); 
            }

            if ($name == "EditarMeioCombate" || $name == "EditarMeioApoio" || $name == "EditarMeioSocorro"){
                echo("<td><a id='edit' href='UpdateQueries/update.php?table=$name&numMeio=".$row["nummeio"]."&nomeEntidade=".$row["nomeentidade"]."'>Editar</a></td>");
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
          Numero Processo Socorro:  <input id="input_style_list" type="text" name="numprocessosocorro"/>
          <br>
          <input id="button_style" type="submit" name="submit" value="Submit">
        </form>
    <?php
    }

    else if ($table == "MeioSocorroProcLocal"){ ?>
        <form id="form_style_soc" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); echo "?table=MeioSocorroProcLocal";?>">
          Morada:  <input id="input_style_soc" type="text" name="moradalocal"/>
          <br>
          <input id="button_style_soc" type="submit" name="submit" value="Submit">
        </form>
    <?php
    }


    try 
    {
        include "connect.php";
        
        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($table == "MeioAccProc"){
        if ($numProcesso == ""){
            $sql = "select * from Acciona;";
        }
        else{
            $sql = "select * from Acciona where numProcessoSocorro='$numProcesso';";
        }
        $result = $db->prepare($sql);
        $result->execute();

        printQuery($result, $table);

    }else if ($table == "MeioSocorroProcLocal"){
        if ($moradaLocal == ""){
            $sql = "select numTelefone,instanteChamada,nomePessoa,moradaLocal,numProcessoSocorro,numMeio,nomeEntidade from Acciona natural join EventoEmergencia natural join MeioSocorro;";
        }
        else{
            $sql = "select numTelefone,instanteChamada,nomePessoa,moradaLocal,numProcessoSocorro,numMeio,nomeEntidade from EventoEmergencia natural join Acciona natural join MeioSocorro where moradaLocal='$moradaLocal';";
        }
        $result = $db->prepare($sql);
        $result->execute();

        printQuery($result, $table);

    }else if ($table == "Processo") {

        $sql = "select * from ProcessoSocorro;";
        $result = $db->prepare($sql);

        $result->execute();

        printQuery($result,$table);
    }
    else if ($table == "Local") {

        $sql = "select * from Local;";
        $result = $db->prepare($sql);

        $result->execute();

        printQuery($result,$table);
    }
    else if ($table == "Evento") {

        $sql = "select * from EventoEmergencia;";
        $result = $db->prepare($sql);

        $result->execute();

        printQuery($result,$table);
    }
    else if ($table == "Meio") {

        $sql = "select numMeio, nomeMeio, nomeEntidade from Meio order by nomeEntidade;";
        $result = $db->prepare($sql);

        $result->execute();

        printQuery($result,$table);
    }
    else if ($table == "MeioCombate" || $table == "EditarMeioCombate") {

        $sql = "select numMeio, nomeMeio, nomeEntidade from MeioCombate natural join Meio order by nomeEntidade;";
        $result = $db->prepare($sql);

        $result->execute();

        printQuery($result,$table);
    }

    else if ($table == "MeioApoio" || $table == "EditarMeioApoio") {

        $sql = "select numMeio, nomeMeio, nomeEntidade from MeioApoio natural join Meio order by nomeEntidade;";
        $result = $db->prepare($sql);

        $result->execute();

        printQuery($result,$table);
    }

    else if ($table == "MeioSocorro" || $table == "EditarMeioSocorro") {

        $sql = "select numMeio, nomeMeio, nomeEntidade from MeioSocorro natural join Meio order by nomeEntidade;";
        $result = $db->prepare($sql);

        $result->execute();

        printQuery($result,$table);
    }

    else if ($table == "Entidade") {

        $sql = "select * from EntidadeMeio;";
        $result = $db->prepare($sql);

        $result->execute();

        printQuery($result,$table);
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