<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST['userName']) && isset($_POST['passWord']))
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
                
                $name = $_POST['userName'];
                $pwd = password_hash($_POST['passWord'], PASSWORD_DEFAULT);

                $query = "SELECT USERID, PASSWORD FROM LABUSERS WHERE USERID = ?;";
                $stmt = $pdo->prepare($query);
                $stmt->bindValue(1, $name);
                if($stmt->execute())
                {
                    $results = $stmt->fetchAll();
                    if(sizeof($results) == 0)
                    {
                        $query = "INSERT INTO LABUSERS(USERID, PASSWORD) VALUES(?, ?);";
                        $stmt = $pdo->prepare($query);
                        $stmt->bindValue(1, $name);
                        $stmt->bindValue(2, $pwd);
                        if($stmt->execute())
                        {
                            header("location: /lab8/index.php");
                            exit;
                        }
                    }
                    else
                    {
                        foreach($results as $row)
                        {  
                            if(password_verify($_POST['passWord'], $row[1]))
                            {          
                                session_start();
                                $_SESSION['userId'] = $row[0];                                  
                                session_regenerate_id();
                                header("location: /lab8/donations.php");
                                exit;
                            }
                            else
                            {
                                header("location: /lab8/login.php");
                                exit;
                            }
                        }   
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
            header("location: /lab8/login.php");
            exit;
        }
    }
    else
    {
        echo "<form action = '' method = 'POST'>
                <label>Enter your user name:
                    <input type = 'text' name = 'userName'/>
                </label> 
                <br/><br />
                <label>Enter your password:
                    <input type = 'text' name = 'passWord'/>
                </label>                 
                <br/>
                    <input type = 'submit' name = 'submit' value = 'Submit'/>
                </form>";  
    }
?>