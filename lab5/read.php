
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
    <?php 
        $server = 'localhost';
        $user = 'homestead';
        $pwd = 'secret';
        $dbname = 'homestead';
        $dsn = "pgsql:dbname = $dbname; host = $server";

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $food = $_POST['food'];
            try
            {
                $pdo = new PDO($dsn, $user, $pwd);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query = "SELECT * FROM ITEMS WHERE NAME LIKE ?;";
                $stmt = $pdo->prepare($query);
                $stmt->bindValue(1, "%".$food."%");
                if($stmt->execute())
                {
                    $results = $stmt->fetchAll();
                     foreach($results as $row)
                     {  
                         echo $row[0]."\r";
                         echo $row[1]."\r";
                         echo $row[2]."<br />";
                     }                
                }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
            finally
            {
                unset($pdo);
            }
        }
        else
        {
            echo "<form action = '' method = 'POST'>
                <label>Enter the name of the food:
                    <input type = 'text' name = 'food'/>
                </label> 
                <br/>
                    <input type = 'submit' name = 'submit' value = 'Submit'/>
                </form>";        
        }
    ?>
    </body>
</html>