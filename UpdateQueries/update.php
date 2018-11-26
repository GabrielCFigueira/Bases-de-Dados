<html>
    <head>
        <title> Insert </title>
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

    function printQuery($result,$table) {
        if ($table == "EditarMeioCombate"  || $table == "EditarMeioApoio" || $table == "EditarMeioSocorro"){
            echo("<div id='div_50_percent'><div id='div_table_edit_meios'>");
        }

        echo("<table border='1'>");
        if ($table == "EditarMeioCombate"  || $table == "EditarMeioApoio" || $table == "EditarMeioSocorro"){
            echo("<tr><th colspan=2>Correspondências</th></tr><tr><th>Numero Meio</th><th>Nome Entidade</th></tr>\n");
        }

        $result->setFetchMode(PDO::FETCH_ASSOC);   
        while($row = $result->fetch()){ 
            echo("<tr>"); 
            foreach($row as $key=>$val) { 
                echo("<td> $val </td>\n"); 
            }
            echo("</tr>");
        }
        echo("</table></div></div>");
    }

    $table = $_REQUEST['table'];

    try {
        $user="ist186426";      // -> replace by the user name
        $host="db.ist.utl.pt";          // -> server where postgres is running
        $port=5432;         // -> default port where Postgres is installed
        $password="gqck3074";           // -> replace with the password
        $dbname = $user;        // -> by default the name of the database is the name of the user
        
        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($table == "EditarMeioCombate"  || $table == "EditarMeioApoio" || $table == "EditarMeioSocorro") {

            $numMeio = $_REQUEST['numMeio'];
            $nomeEntidade = $_REQUEST['nomeEntidade'];

            echo("<div id='div_50_percent'><div id='div_update_meios'><form id='form_style' action='runUpdate.php?table=$table&numMeio=$numMeio&nomeEntidade=$nomeEntidade' method='post'><p><input type='hidden' name='table' value='$table'/></p>");
            if ($table == "EditarMeioCombate"){
                echo("<p id='form_title'>Editar Meio de Combate</p>");
            }else if ($table == "EditarMeioApoio"){
                echo("<p id='form_title'>Editar Meio de Apoio</p>");
            }else if($table == "EditarMeioSocorro"){
                echo("<p id='form_title'>Editar Meio de Socorro</p>");
            }
            echo("<p>Número do Meio:</p> <input id='input_style' type='text' name='newNumMeio' value='$numMeio'/>
            <p>Nome Entidade:</p> <input id='input_style' type='text' name='newNomeEntidade' value='$nomeEntidade'/>
            <br>
            <input id='button_style' type='submit' value='Submit'/>
            </form></div></div>");

            $sql = "select numMeio, nomeEntidade from Meio group by numMeio, nomeEntidade order by numMeio, nomeEntidade;";
            $result = $db->prepare($sql);

            $result->execute();

            printQuery($result, $table);

        } else {
            echo("<script>console.log(\"Unexpected table name\");</script>");
        }

        $db = null;
        
    } catch (Exception $e) {
        echo("<p>ERROR: {$e->getMessage()}</p>");
    }


?>
    </body>
</html>

    



