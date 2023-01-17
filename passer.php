<?php
    //error_reporting(E_ALL ^ E_WARNING); 



    session_start();
   
    // logic for calculating the score
    function passScore(){ 
        
        if(isset($_POST['3pass'])) { 
            $_SESSION['sum'] = intval($_SESSION['sum']) + 3;
            $_SESSION['count'] = intval($_SESSION['count']);
            $_SESSION['count'] +=1;
            $_SESSION['score'] = $_SESSION['sum'] / $_SESSION['count'];
        }

        elseif(isset($_POST['2pass'])) { 
            $_SESSION['sum'] = intval($_SESSION['sum']) + 2;
            $_SESSION['count'] = intval($_SESSION['count']);
            $_SESSION['count'] +=1;
            $_SESSION['score'] = $_SESSION['sum'] / $_SESSION['count'];
        }

        elseif(isset($_POST['1pass'])) { 
            $_SESSION['sum'] = intval($_SESSION['sum']) + 1;
            $_SESSION['count'] = intval($_SESSION['count']);
            $_SESSION['count'] +=1;  
            $_SESSION['score'] = $_SESSION['sum'] / $_SESSION['count'];   
        }

        elseif(isset($_POST['0pass'])) { 
            $_SESSION['sum'] = intval($_SESSION['sum']) + 0;
            $_SESSION['count'] = intval($_SESSION['count']);
            $_SESSION['count'] +=1;
            $_SESSION['score'] = $_SESSION['sum'] / $_SESSION['count']; 
        }

        elseif(isset($_POST['overpass'])) { 
            $_SESSION['sum'] = intval($_SESSION['sum']) + 0;
            $_SESSION['count'] = intval($_SESSION['count']);
            $_SESSION['count'] +=1;
            $_SESSION['score'] = $_SESSION['sum'] / $_SESSION['count'];
        }

        // resets the score 
        if(isset($_POST['reset'])) { 
            $_SESSION['count'] = 0;
            $_SESSION['sum'] = 0;
            $_SESSION['score'] = 0;
        }
    }
    

    // saves data and redirects to players page
    function saveData($db){

        if(isset($_POST['back'])){ 
            
            $name = $_SESSION['name'];
            $score = $_SESSION['score'];
            $count = $_SESSION['count'];
            $sum = $_SESSION['sum']; 

            //$query = "insert into Players values('$name', $score, $count, $sum);";
            $query = "update Players set score = $score, count = $count, sum = $sum where name = '$name';";

            $db->exec($query);
            $db-> close();

            session_destroy();

            header('Location: players.php');
        }
        
    }

     // Set db values to passers if the session is 0 
     function reloadValues($records){

        if(!isset($_SESSION['score']) && !isset($_SESSION['count']) && !isset($_SESSION['sum'])){
    
            //print_r($records);
            
            if($_SESSION['name'] == "Andrew"){ 
                $_SESSION['score'] = $records[0]['score'];
                $_SESSION['count'] = $records[0]['count'];
                $_SESSION['sum'] = $records[0]['sum'];
            }
            elseif($_SESSION['name'] == "Brooks"){ 
                $_SESSION['score'] = $records[1]['score'];
                $_SESSION['count'] = $records[1]['count'];
                $_SESSION['sum'] = $records[1]['sum'];
            }
            elseif($_SESSION['name'] == "Daniel"){ 
                $_SESSION['score'] = $records[2]['score'];
                $_SESSION['count'] = $records[2]['count'];
                $_SESSION['sum'] = $records[2]['sum'];
            }
            elseif($_SESSION['name'] == "Drew"){ 
                $_SESSION['score'] = $records[3]['score'];
                $_SESSION['count'] = $records[3]['count'];
                $_SESSION['sum'] = $records[3]['sum'];
            }
            elseif($_SESSION['name'] == "Ian"){ 
                $_SESSION['score'] = $records[4]['score'];
                $_SESSION['count'] = $records[4]['count'];
                $_SESSION['sum'] = $records[4]['sum'];
            }
            elseif($_SESSION['name'] == "Jarrett"){ 
                $_SESSION['score'] = $records[5]['score'];
                $_SESSION['count'] = $records[5]['count'];
                $_SESSION['sum'] = $records[5]['sum'];
            }
            elseif($_SESSION['name'] == "John"){ 
                $_SESSION['score'] = $records[6]['score'];
                $_SESSION['count'] = $records[6]['count'];
                $_SESSION['sum'] = $records[6]['sum'];
            }
            elseif($_SESSION['name'] == "Kolby"){ 
                $_SESSION['score'] = $records[7]['score'];
                $_SESSION['count'] = $records[7]['count'];
                $_SESSION['sum'] = $records[7]['sum'];
            }
            elseif($_SESSION['name'] == "Matteo"){ 
                $_SESSION['score'] = $records[8]['score'];
                $_SESSION['count'] = $records[8]['count'];
                $_SESSION['sum'] = $records[8]['sum'];
            }
            elseif($_SESSION['name'] == "Mitchell"){ 
                $_SESSION['score'] = $records[9]['score'];
                $_SESSION['count'] = $records[9]['count'];
                $_SESSION['sum'] = $records[9]['sum'];
            }
        }
    }


    // MAIN 

    $db = new SQLite3("C:\Users\kolby\OneDrive\Desktop\Code\VolleyStat\playersdb.db");

    // Sets the passer in the session 
    if(isset($_POST['passer'])){
        $_SESSION['name'] = $_POST['passer'];
    }

    // store db values in variables
    $sql = "select * from Players;";
    $results = $db->query($sql);

    while($rows = $results->fetchArray(1)) {
       $records[] = $rows;
    }

    passScore();
    $action = saveData($db);
    reloadValues($records);
    
    if(isset($_POST['table'])){ 
        header("Location: table.php");
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

    <h1 class = 'passerName'><?php echo $_SESSION['name']; ?></h1>
    <h2 class = 'passScore'>Score: <?php echo $_SESSION['score']; ?></h2>

    <form method = 'POST' action = "">
        <input type = 'hidden' name = 'name' value = '<?php echo $_SESSION['name']; ?>'/>
        <input type = 'hidden' name = 'sum' value = '<?php echo $_SESSION['sum']; ?>' />
        <input type = 'hidden' name = 'counter' value = '<?php echo $_SESSION['count']; ?>' />
        <input type = 'hidden' name = 'score' value = '<?php echo $_SESSION['score']; ?>' />

        <button class = 'passNum' name='3pass' type='submit' value='3'>3</button>
        <button class = 'passNum' name='2pass' type='submit' value='2'>2</button>
        <button class = 'passNum' name='1pass' type='submit' value= '1'>1</button>
        <button class = 'passNum' name='0pass' type='submit' value= '0'>0</button>
        <button class = 'passNum' name='overpass' type='submit' value='0'>Overpass</button>
        <button class = 'reset' name='reset' type='submit' value='reset'>Reset Score</button>
        <button class = 'backPlayers' name = 'back' type = 'submit' >Back</button>
    </form>

</body>
</html>