<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPORTS</title>
    <link rel="stylesheet" href="styles.css">

    |<style> body{background:url(imagenes/fondo2.png ) no-repeat fixed center #333;
    background-size: cover;}  </style>
</head>
<body>
        <label ><center><FONT COLOR="black"><h1>WELCOME TO THE SPORTS STORE:</h1> </FONT></center> </label>
        <br></br>
        <label ><center><FONT COLOR="RED"><h1>SPORTS OF WORLD</h1> </FONT></center> </label>
        <br></br>
        <label ><center><FONT COLOR="BLACK"><h1>IN THIS PLACE YOU WILL BE ABLE TO FIND DIFFERENT SPORTS ELEMENTS FOR MEN OR WOMEN</h1> </FONT></center> </label>
        <br></br>
        <label ><center><FONT COLOR="black"><h1>¡¡I HOPE YOU ENJOY IT!! </h1> </FONT></center> </label>

    
    <?php 
        //1. Data base connection data
        $dbhost 	= "localhost";
	    $dbname		= "deportes";
	    $dbuser		= "root";   
	    $dbpass		= "";

        //2. Get REQUEST data
        $name = $_REQUEST["name"];
        $price = $_REQUEST["price"];
        $categoryId = $_REQUEST["categoryId"];

        //3. Connect to database
        $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);

        //4. Prepare SQL INSERT statement
        $sql = "INSERT INTO elementos (id, nombre, precio, idCategoria)  VALUES (:id, :nombre, :precio, :idCategoria)";

        //5. Execute SQL statement
        $q = $conn->prepare($sql);
		$result = $q->execute(array(
            ':id'=>NULL,
			':nombre'=>$name,
			':precio'=>$price,
			':idCategoria'=>$categoryId));

        
  
    ?>
    <form action="create-element.php" method="POST">
        <center><input type="submit" value="CONTINUE TO CREATE ELEMENT" href="create-element" /></center>
    </form>
    <br></br>

    <form action="search-element.php" method="POST">
        <center><input type="submit" value="CONTINUE TO SEARCH ELEMENT" href="search-element.php" /></center>
    </form>

</body>
</html>