<html>
    <head>
        <title> Insert </title>
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

    function printQuery($result,$table) {
        if ($table == "MeioCombate"  || $table == "MeioApoio" || $table == "MeioSocorro"){
            echo("<div id='div_50_percent'><div id='div_table_edit_meios'>");
        }

        echo("<table border='1'>");
        if ($table == "MeioCombate"  || $table == "MeioApoio" || $table == "MeioSocorro"){
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
        include "../connect.php";

        if ($table == "MeioCombate"  || $table == "MeioApoio" || $table == "MeioSocorro") {

            $numMeio = $_REQUEST['numMeio'];
            $nomeEntidade = $_REQUEST['nomeEntidade'];

            echo("<div id='div_50_percent'><div id='div_update_meios'><form id='form_style' action='runUpdate.php?table=$table&numMeio=$numMeio&nomeEntidade=$nomeEntidade' method='post'><p><input type='hidden' name='table' value='$table'/></p>");
            if ($table == "MeioCombate"){
                echo("<p id='form_title'>Editar Meio de Combate</p>");
            }else if ($table == "MeioApoio"){
                echo("<p id='form_title'>Editar Meio de Apoio</p>");
            }else if($table == "MeioSocorro"){
                echo("<p id='form_title'>Editar Meio de Socorro</p>");
            }
            echo("<p><b>Número do Meio:</b></p> <input id='input_style' type='text' name='newNumMeio' value='$numMeio'/>
            <p><b>Nome Entidade:</b></p> <input id='input_style' type='text' name='newNomeEntidade' value='$nomeEntidade'/>
            <br>
            <input id='button_style' type='submit' value='Submeter'/>
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

    



