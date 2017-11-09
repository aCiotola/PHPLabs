<?php
    if(isset($_COOKIE['name']) && isset($_COOKIE['language']) && isset($_COOKIE['hobby']))
    {
        foreach ($_COOKIE as $key=>$value)
        {
            echo $key.' -> '.$value."<br>\n";
        }
    }
?>