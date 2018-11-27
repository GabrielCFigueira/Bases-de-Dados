<html>
    <head>
        <title> Associar </title>
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
    <center>
<?php

function printQuery($result,$name) {
    if ($name == "MeioProcesso"){
        echo("<div id='div_table_assoc_meio_proc'>");
    }else if ($name == "EventoProcesso"){
        echo("<div id='div_table_assoc_evento_proc'>");
    }

    echo("<table border='1'>");
    if ($name == "MeioProcesso") {
        echo("<tr><th>Numero Meio</th><th>Nome Meio</th><th>Nome Entidade</th><th>Número de Processo do Socorro</th></tr>\n");
    }else if ($name == "EventoProcesso"){
        echo("<tr><th>Numero Telefone</th><th>Instante Chamada</th><th>Nome Pessoa</th><th>Morada Local</th><th>Numero Processo Socorro</th></tr>\n");
    }

    $result->setFetchMode(PDO::FETCH_ASSOC);   
    while($row = $result->fetch()){ 
        echo("<tr>"); 
        foreach($row as $key=>$val) { 
            echo("<td> $val </td>\n"); 
        }
        echo("</tr>");
    }
    echo("</table></div>");
}

$table = $_REQUEST['table'];


try 
{
    include "connect.php";
    
    $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



    if ($table == "MeioProcesso") {

        $sql = "select m.numMeio, m.nomeMeio, m.nomeEntidade, numProcessoSocorro from Meio m left outer join acciona a 
on m.nomeEntidade = a.nomeEntidade and m.numMeio = a.numMeio order by nomeEntidade, numMeio;";
        $result = $db->prepare($sql);

        $result->execute();

        echo("<div id='div_input_assoc'><form id='form_style' action='InsertQueries/runInsertion.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p id='form_title'>Associar Meio a Processo de Socorro</p>
        <p>Número do Meio:</p> <input id='input_style' type='text' name='numMeio'/>
        <p>Nome da Entidade Detentora do Meio:</p> <input id='input_style' type='text' name='nomeEntidade'/>
        <p>Número de Processo de Socorro:</p> <input id='input_style' type='text' name='numProcessoSocorro'/>
        <br>
        <input id='button_style' type='submit' value='Submit'/>
        </form></div>");

        printQuery($result, $table);
    }
    else if ($table == "EventoProcesso") {

        $sql = "select numTelefone, instanteChamada, nomePessoa, moradaLocal, e.numProcessoSocorro from EventoEmergencia e 
left outer join ProcessoSocorro p on e.numProcessoSocorro=p.numProcessoSocorro order by e.numTelefone, e.instanteChamada;";
        $result = $db->prepare($sql);

        $result->execute();

        echo("<div id='div_input_assoc_evento_proc'><form id='form_style_evento_proc' action='UpdateQueries/runUpdate.php' method='post'>
        <p><input type='hidden' name='table' value='$table'/></p>
        <p id='form_title'>Associar Evento de Emergência a Processo de Socorro</p>
        <p>Número de Telefone:</p> <input id='input_style' type='text' name='numTelefone'/>
        <p>Instante da Chamada:</p> <input id='input_style' type='text' name='instanteChamada'/>
        <p>Número de Processo de Socorro:</p> <input id='input_style' type='text' name='numProcessoSocorro'/>
        <br>
        <input id='button_style' type='submit' value='Submit'/>
        </form></div>");

        printQuery($result, $table);
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
</center>
    </body>
</html>