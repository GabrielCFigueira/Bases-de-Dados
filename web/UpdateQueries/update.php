<html>
    <head>
        <title> Actualizar </title>
        <link rel="stylesheet" href="../css/style.css"/>
        <link rel="icon" type="image/png" href="../img/database.png"/>
    </head>
    <body>
<?php
    
    include "../menu/submenu.html";

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

    



