<?php
    session_start();    
    session_regenerate_id();  
    date_default_timezone_set('America/Montreal');
    if (!isset($_SESSION['count'])) 
    {
        $_SESSION['count'] = 1;
        $_SESSION['creationTime'] = date('D M d H:i:s e Y'); 
        $_SESSION['lastAccess'] = date('D M d H:i:s e Y'); 
        echo '<h1>Welcome new visitor!</h1>';
        echo '<h2>Information on your session:</h2>';
        echo '<h4>Info type:                   value:</h4>';
        echo 'Session ID '.session_id().'<br />';
        echo 'count '.$_SESSION['count'].'<br />';
        echo $_SESSION['creationTime'].'<br />'; 
        echo $_SESSION['lastAccess'].'<br />'; 
        
    }
    else
    {
        $_SESSION['count']++;
        $_SESSION['lastAccess'] = date('D M d H:i:s e Y'); 
        echo '<h1>Welcome back!</h1>';
        echo '<h2>Information on your session:</h2>';
        echo '<h4>Info type:                   value:</h4>';
        echo 'Session ID '.session_id().'<br />';
        echo 'count '.$_SESSION['count'].'<br />';
        echo $_SESSION['creationTime'].'<br />'; 
        echo $_SESSION['lastAccess'].'<br />'; 
    }
?>