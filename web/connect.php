<?php
$user="ist186461";		//ist186426 -> replace by the user name
$host="db.ist.utl.pt";	        // -> server where postgres is running
$port=5432;			// -> default port where Postgres is installed
$password="bvbc0935";	        //gqck3074 -> replace with the password
$dbname = $user;		// -> by default the name of the database is the name of the user

$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>