<html>
    <head>
        <title> Update </title>
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



    if ($table == "MeioProcesso") {

        $sql = "select * from ProcessoSocorro;";
        $result = $db->prepare($sql);

        $result->execute();

        printQuery($result);
    }
    else if ($table == "EventoProcesso") {

        $sql = "select * from Local;";
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