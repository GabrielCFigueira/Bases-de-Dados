<html>
    <head>
        <title> Update </title>
        <link rel="stylesheet" href="style.css"/>
        <link rel="icon" type="image/png" href="Postgresql.png"/>
    </head>
    <body>
    <center>
        <h1 id="sgbd">Sistema de Gestão de Incêndios Florestais</h1>
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
    $user="ist186426";		// -> replace by the user name
    $host="db.ist.utl.pt";	        // -> server where postgres is running
    $port=5432;			// -> default port where Postgres is installed
    $password="gqck3074";	        // -> replace with the password
    $dbname = $user;		// -> by default the name of the database is the name of the user
    
    $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



    if ($table == "MeioProcesso") {

        $sql = "select numMeio, nomeMeio, nomeEntidade, numProcessoSocorro from Meio natural join acciona order by nomeEntidade, numMeio;";
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

        echo("<div id='div_input_assoc_evento_proc'><form id='form_style' action='InsertQueries/runInsertion.php' method='post'>
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
        #error message
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