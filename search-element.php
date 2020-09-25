<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPORTS</title>
    <link rel="stylesheet" href="styles.css">
    <style> body{background:url(imagenes/fondo3.png ) no-repeat fixed center #333;
    background-size: cover;}  </style>
    
</head>
<body>  
    <?php 
        //1. Data base connection data
        $dbhost 	= "localhost";
	    $dbname		= "deportes";
	    $dbuser		= "root";
	    $dbpass		= "";
        
              
        $parameters = array();

        $name = null;
        $price = null;
        $categoryId = null;

        //2. Get REQUEST data
        $where = "";  
        if(isset($_POST["search"]) && $_POST["search"] == "Search all" ){            
            
            $where = " WHERE ";

        }
        foreach ($_POST as $key => $value) {            
            if($_POST[$key] && $key !== "search"){
                $parameters[":$key"] = "%$value%";
                $where = $where . "$key LIKE :$key OR ";
            }
        }   


        $where = substr($where, 0, strlen($where) -3);

         
        //3. Connect to database
        $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);

        //4. Prepare SQL INSERT statement
        $sql = "SELECT id, nombre FROM categoria";
        
        //5. Execute SQL statement
        $q = $conn->prepare($sql);
        $result = $q->execute();

        //6. Load database results in memory
        $categories = $q->fetchAll();
        
        //take the suppled data
        $sqlelements = "SELECT nombre, precio FROM elementos $where"; 
        $qelements = $conn->prepare($sqlelements);
        $resultelements = $qelements->execute($parameters);        
        $elements = $qelements->fetchAll();        
    ?>

    <form method="POST">
        <center><b>¿WHAT'S THE ITEM YOU WANT TO SEARCH FOR?</b><input type="text" name="nombre" /> <br/>
        <b>WHICH THE CATEGORY WILL YOU SELECT?</b>
        
        <select name="idCategoria" >
            <option value=""></option>
            <?php
                for($i=0; $i < count($categories); $i++){
            ?>

                <option 
                    
                    value="<?php echo $categories[$i]["id"];  ?>">
                    <?php echo $categories[$i]["nombre"];  ?>
                </option>
            <?php
                }
            ?>
        </select> 
        <br/>

        <b>WHAT IS THE PRICE YOU WANT TO SEARCH FOR?</b> <input type="text" name="precio" value="<?= (isset($_POST["precio"])) ? $_POST["precio"] : "" ?>" />
        <br/><br/></center>

        <center>
        <input type="submit" name="search" value="Show all" />
        </center>
    </form>

    <div class="datos">
       <center>   
        <?php
            for($i=0; $i < count($elements); $i++){
        ?>
            <div>
                <span><?php echo $elements[$i]["nombre"];  ?></span>
                <span><?php echo $elements[$i]["precio"];  ?></span>
            </div>
        <?php
            }
        ?>    
        </center>   
    </div>

    <form action="services.php" method="POST">
        <center><input type="submit" value="back to main"></center>
    
    </form>
  
</body>
</html>