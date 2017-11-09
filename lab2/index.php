<!DOCTYPE html>
<html>
    <head>
        <title>Event calendar</title>
        <style>
            table {border-collapse:collapse; table-layout:fixed; width:600px;}
            table td {border:solid 1px #fab; width:100px; height:100px; word-wrap:break-word;}
            table th {border:solid 2px #fab; width:100px; word-wrap:break-word;}
        </style>
    </head>
    <body>        
        <table border = 1>
        <?php
            $fileName = "events.txt";
            $file = fopen($fileName, "r");
            $line = fgets($file);
            $monthDate = date("F Y", strtotime($line));
            $totalDays = date("t", strtotime($line));
            $dayOfWeek = date("N", strtotime($line));
            
            echo "<h2>".$monthDate."</h2>";            
        
            while(!feof($file))
            {
                $fileLine[] = fgetcsv($file);
            }
            
            
            foreach($fileLine as $key => $value)
            {     
                    $arr[$value[0]] = $value[1];
            }
            fclose($file);
            
            echo "<tr><th>Sunday</th>
                  <th>Monday</th>
                  <th>Tuesday</th>
                  <th>Wednesday</th>
                  <th>Thursday</th>
                  <th>Friday</th>
                  <th>Saturday</th></tr>";
            
            $days = 0;
            echo "<tr>";
            $j = 1;
            $isBeginning = false;
            for($k = 0 ; $k < $dayOfWeek; $k++)
            {                
                if($dayOfWeek != 7)
                    echo "<td></td>";
            }
            for($i = 1 ; $i < 6 ; $i++)
            {                
                for($j = 1 ; $j < 8 ; $j++)
                {          
                    if($days < $totalDays)
                    {
                        if($isBeginning === false)
                        {
                            $j = $j + $dayOfWeek;
                            if($j > 7)
                            {
                                $j = 1;
                            }
                            
                            $isBeginning = true;
                        }
                        
                        $days++;
                        if(isset($arr[$days]))
                        {
                            echo "<td>".$days." ".$arr[$days]."</td>";
                        }
                        else
                            echo "<td>".$days."</td>";
                    }
                    else
                        echo "<td></td>";
                }
                echo "</tr>";
            }
            
        ?>
        </table>
    </body>
</html>