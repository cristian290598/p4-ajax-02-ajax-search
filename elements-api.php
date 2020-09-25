<?php 
        //1. Data base connection data
        $dbhost 	= "localhost";
	    $dbname		= "deportes";
	    $dbuser		= "root";   
	    $dbpass		= "";

        //2. Get REQUEST data
        $name = $_GET{"name"}
        //3. Connect to database
        $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);

        //4. Prepare SQL INSERT statement
        $sql = "SELECT id, nombre, precio, idCategoria FROM elementos WHERE nombre LIKE :name%";

        //5. Execute SQL statement
        $q = $conn->prepare($sql);
        $q->excute();
        
        $elementslist = $q->fethAll( PDO::FETCH_ASSSOC);
        //6 verificacion

        echo json_encode($elementslist);
  
    ?>