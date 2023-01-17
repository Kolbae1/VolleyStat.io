<?php
   
   $db = new SQLite3("C:\Users\kolby\OneDrive\Desktop\Code\VolleyStat\playersdb.db");
   $sql = "select * from Players;";
   $results = $db->query($sql);

   while($rows = $results->fetchArray(1)) {
      $records[] = $rows;
   }

   if(isset($_POST['home'])){
    header("Location: players.php");
   }


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

    <h1 class = 'passerName'> Team Passing Scores</h1>

    <table class = "styled-table"> 

    <thead><tr> <th>Name</th> <th>Score</th> </tr></thead>
    <body>
    <?php for($i = 0; $i < sizeof($records); $i++){
        $name = $records[$i]['name'];
        $score = $records[$i]['score'];
        echo "<tr class = 'active-row'> <td>$name</td> <td>$score</td> </tr>";
        
    }
    $total = ($records[0]['score'] + $records[1]['score'] + $records[2]['score'] + $records[3]['score'] + $records[4]['score'] + 
        $records[5]['score'] + $records[6]['score'] + $records[8]['score'] + $records[9]['score']) / 10; 
    
    echo "<tr class = 'active-row'> <td>Total:</td>  <td> $total </td></tr>";
    ?>
    </body>

    </table>

    <form method = "POST">
    <button class = 'home' name = 'home' type = 'submit'>Back</button>
    </form>
    

</body>
</html>