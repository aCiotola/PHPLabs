<?php
    session_start();
    if (isset($_SESSION) && !empty($_SESSION['userId']))
    {
        if(isset($_GET['amount']))
        {
            $server = 'localhost';
            $user = 'homestead';
            $pwd = 'secret';
            $dbname = 'homestead';
            $dsn = "pgsql:dbname = $dbname; host = $server";
            $pdo = new PDO($dsn, $user, $pwd);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "INSERT INTO DONATIONS(SERIAL, DONATIONS, USERID) VALUES(?, ?, ?);";
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(1, 2);
            $stmt->bindValue(2, $_GET['amount']);
            $stmt->bindValue(3, $_SESSION['userId']);
            $stmt->execute();

            echo 'The amount of money '.$_SESSION['userId'].' donated is: '.$_GET['amount'];
        }
        else
        {
            echo "<form action = '' method = 'GET'>
                    <label>How much money will you donate to the African prince:
                        <input type = 'text' name = 'amount'/>
                    </label> 
                    <br/><br />
                        <input type = 'submit' name = 'submit' value = 'Submit'/>
                    </form>";
        }
    }
    else
        header('location: /lab8/login.php');
?>