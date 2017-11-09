<!DOCTYPE html>
<html>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            try
            {
                $server = 'localhost';
                $user = 'homestead';
                $pwd = 'secret';
                $dbname = 'homestead';
                $dsn = "pgsql:dbname = $dbname; host = $server";
                $pdo = new PDO($dsn, $user, $pwd);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query = "DELETE FROM ITEMS WHERE ID = ?";
                $stmt = $pdo->prepare($query);
                $stmt->bindValue(1, $_POST['foodid']);
                if($stmt->execute())
                {
                    header("location: /lab5/index.php?task=delete");
                    exit;
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
                <label>Enter the id of the item you wish to delete:
                    <input type = 'text' name = 'foodid'/>
                </label> 
                <br/>
                    <input type = 'submit' name = 'submit' value = 'Submit'/>
                </form>";        
        }
    ?>
</html>