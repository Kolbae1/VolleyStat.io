<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    

        <header class = 'header'>";
            <img class = 'logo' src = 'https://upload.wikimedia.org/wikipedia/en/thumb/a/a1/RMCYellowJackets.png/175px-RMCYellowJackets.png' >
            <h1 class='mainTitle'> RMC Men's Volleyball Serve Recieve </h1>
        </header>

        
       <p class = "p1">Choose a passer to begin scoring</p>

        <form method = "POST" action = "passer.php">      
            <button class = "submit" type="submit" value="Andrew" name = "passer" action = "passer.php">Andrew</button>       
            <button class = "submit" type="submit" value="Brooks" name = "passer" action = "passes.php">Brooks</button>
            <button class = "submit" type="submit" value="Daniel" name = "passer" action = "passer.php" >Daniel</button>
            <button class = "submit" type="submit" value="Drew" name = "passer" action = "passer.php">Drew</button>
            <button class = "submit" type="submit" value="Ian" name = "passer" action = "passer.php">Ian</button>
            <button class = "submit" type="submit" value="Jarrett" name = "passer" action = "passer.php"> Jarrett</button>
            <button class = "submit" type="submit" value="John" name = "passer" action = "passer.php">John</button>
            <button class = "submit" type="submit" value="Kolby" name = "passer" action = "passer.php">Kolby</button>
            <button class = "submit" type="submit" value="Matteo" name = "passer" action = "passer.php">Matteo</button>
            <button class = "submit" type="submit" value="Mitchell" name = "passer" action = "passer.php">Mitchell</button> 
            <button class = "tableButton" type = "submit" name = "table" action = "paser.php">See all scores</button>
        </form>

        
           
        
</body>
</html>