<html>
    <head>
        <title> List </title>
        <link rel="stylesheet" href="style.css"/>
        <link rel="icon" type="image/png" href="Postgresql.png"/>
    </head>
    <body>
<?php

    function printQuery($result) {
        echo("<table border='5'>"); 
        $result->setFetchMode(PDO::FETCH_ASSOC);   
        while($row = $result->fetch()){ 
            echo("<tr>"); 
            foreach($row as $key=>$val) { 
                echo("<td> $key : $val </td>\n"); 
            }
            echo("</tr>");
        }
        echo("</table>");
    }

    $table = $_REQUEST['table'];


    try 
    {
        $user="istxxxxxx";		// -> replace by the user name
        $host="db.ist.utl.pt";	        // -> server where postgres is running
        $port=5432;			// -> default port where Postgres is installed
        $password="pass";	        // -> replace with the password
        $dbname = $user;		// -> by default the name of the database is the name of the user
        
        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



    if ($table == "Processo") {

        $sql = "select * from ProcessoSocorro;";
        $result = $db->prepare($sql);

        $result->execute();

        printQuery($result);
    }
    else if ($table == "Local") {

        $sql = "select * from Local;";
        $result = $db->prepare($sql);

        $result->execute();

        printQuery($result);
    }
    else if ($table == "Evento") {

        $sql = "select * from EventoEmergencia;";
        $result = $db->prepare($sql);

        $result->execute();

        printQuery($result);
    }
    else if ($table == "Meio") {

        $sql = "select numMeio, nomeMeio, nomeEntidade from Meio order by nomeEntidade;";
        $result = $db->prepare($sql);

        $result->execute();

        printQuery($result);
    }
    else if ($table == "MeioCombate") {

        $sql = "select numMeio, nomeMeio, nomeEntidade from MeioCombate natural join Meio order by nomeEntidade;";
        $result = $db->prepare($sql);

        $result->execute();

        printQuery($result);
    }

    else if ($table == "MeioApoio") {

        $sql = "select numMeio, nomeMeio, nomeEntidade from MeioApoio natural join Meio order by nomeEntidade;";
        $result = $db->prepare($sql);

        $result->execute();

        printQuery($result);
    }

    else if ($table == "MeioSocorro") {

        $sql = "select numMeio, nomeMeio, nomeEntidade from MeioSocorro natural join Meio order by nomeEntidade;";
        $result = $db->prepare($sql);

        $result->execute();

        printQuery($result);
    }

    else if ($table == "Entidade") {

        $sql = "select * from EntidadeMeio;";
        $result = $db->prepare($sql);

        $result->execute();

        printQuery($result);
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
    </body>
</html>