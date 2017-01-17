<!DOCTYPE  HTML>
<html lang="en">
<html>
  <head>
    <meta  http-equiv="Content-Type" content="text/html;  charset=iso-8859-1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>NBA Stats</title>
  </head>
    <body>
        <?php
        require_once('player.php');
        $dbhost = 'dbattempt3.c6o9zqheurnv.us-west-2.rds.amazonaws.com';
        $dbport = '3306';
        $dbname = 'mybballdb';
        $dsn = "mysql:host={$dbhost};port={$dbport};dbname={$dbname}";
        $username = "info344user";
        $password = "password";
        try {
            $conn = new PDO($dsn, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $name = $_POST['name'];
            $sql = 'SELECT * FROM ' . $dbname . '.Players WHERE Name LIKE \'%' . $name . '%\'';
            $stmt = $conn->prepare($sql);
            $stmt->execute(array($var));
            //$data = $conn->query($sql);
            $playerData = array();
            foreach ($stmt as $row) {
                //print_r($row);
                $temp = new Player($row['Name'], $row['Team'], $row['GP'], $row['Min'], $row['FGM'], $row['FGA'], 
                $row['FGPct'], $row['3PTM'], $row['3PTA'], $row['3PTPct'], $row['FTM'], $row['FTA'], $row['FTPct'], 
                $row['Roff'], $row['Rdef'], $row['Rtot'], $row['Ast'], $row['TO'], $row['Stl'], $row['Blk'], $row['PF'], $row['PPG']);
                $playerData[] = $temp;        
            }
            if (empty($playerData)) {
                echo("no results");
            } else {
                
                foreach ($playerData as $player) {
                    echo("<div class=\"container\">");
                    echo("<h2>" . $player->getName() . "</h2>");
                    echo("<dl class=\"dl-horizontal\">");
                    echo("<dt>Team</dt><dd>".$player->getTeam()."</dd>");
                    echo("<dt>GP</dt><dd>".$player->getGp()."</dd>");
                    echo("<dt>Min</dt><dd>".$player->getMin()."</dd>");
                    echo("<dt>FGM</dt><dd>".$player->getFgm()."</dd>");
                    echo("<dt>FGA</dt><dd>".$player->getFga()."</dd>");
                    echo("<dt>FG%</dt><dd>".$player->getFgpct()."</dd>");
                    echo("<dt>3FGM</dt><dd>".$player->getThreeptm()."</dd>");
                    echo("<dt>3FGA</dt><dd>".$player->getThreepta()."</dd>");
                    echo("<dt>3FG%</dt><dd>".$player->getThreeptpct()."</dd>");
                    echo("<dt>FTM</dt><dd>".$player->getFtm()."</dd>");
                    echo("<dt>FTA</dt><dd>".$player->getFta()."</dd>");
                    echo("<dt>FT%</dt><dd>".$player->getFtpct()."</dd>");
                    echo("<dt>OREB</dt><dd>".$player->getRoff()."</dd>");
                    echo("<dt>DREB</dt><dd>".$player->getRdef()."</dd>");
                    echo("<dt>REB</dt><dd>".$player->getRtot()."</dd>");
                    echo("<dt>AST</dt><dd>".$player->getAst()."</dd>");
                    echo("<dt>TO</dt><dd>".$player->getTo()."</dd>");
                    echo("<dt>STL</dt><dd>".$player->getStl()."</dd>");
                    echo("<dt>BLK</dt><dd>".$player->getBlk()."</dd>");
                    echo("<dt>PF</dt><dd>".$player->getPf()."</dd>");
                    echo("<dt>PPG</dt><dd>".$player->getPpg()."</dd>");
                    echo("</dl>");
                    echo("</div>");
                }
                
            }
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }  
    ?>
</body>
</html>