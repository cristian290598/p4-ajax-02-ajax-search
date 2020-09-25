<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPORTS</title>
    <link rel="stylesheet" href="styles.css">
    |<style> body{background:url(imagenes/fondo4.png ) no-repeat fixed center #333;
    background-size: cover;}  </style>
</head>
<body>
    <?php 
        //1. Data base connection data
        $dbhost 	= "localhost";
	    $dbname		= "deportes";
	    $dbuser		= "root";
	    $dbpass		= "";

        //2. Get REQUEST data

        //3. Connect to database
        $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);

        //4. Prepare SQL INSERT statement
        $sql = "SELECT id, nombre FROM categoria";

        //5. Execute SQL statement
        $q = $conn->prepare($sql);
        $result = $q->execute();
        
        //6. Load database results in memory
        $categories = $q->fetchAll();  
        
        if($result){
            ?>
                <div>Element <?php echo $name; ?> has been created succesfully</div>
            <?php
        }
        else {
            ?>
                <div style="color:red">An error has ocurred creating element: <?php echo $name; ?></div>
            <?php
        }
        
    ?>

    <form action="services.php" method="POST">
        <center>  <font color= "red">NAME OF ELEMENT </font><input type="text" name="name" /> <br><br/>
        <font color= "red">SPORT CATEGORY</font> <br><br/>
            <select name="categoryId" >
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
        <br><br/> 
        <br/>

        <font color= "red"> PRICE</font> <input type="text" name="price" />
        <br/><br/>
        <input type="submit" value="Save product" /></center>
    </form>
    <br/><br/>
    <form action="services.php" method="POST">
        <center><input type="submit" value="back to main"></center>
    
    </form>
    
</body>
</html>