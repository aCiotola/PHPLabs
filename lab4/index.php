    <?php
        $url = 'https://www.dawsoncollege.qc.ca';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        $page = curl_exec($ch); 
        curl_close($ch);
        
        $html = new DOMDocument();
        @$html->loadHTML($page);
        $xpath = new DOMXpath($html);
        $elements = $xpath->query('//*[@id="content"]/section[2]/div/div/a[2]');
        foreach($elements as $value)
            echo $value->getAttribute('href').PHP_EOL;
    ?>