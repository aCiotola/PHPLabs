<!DOCTYPE>
<html>
    <head>
        <title>Form</title>
    </head>
    <body>
        <?php
            global $genders;
            $genders = ['Male', 'Female'];

            global $interestArr;
            $interestArr = ['Poker', 'Chess', 'Checkers', 'Dominoes', 
                                        'Solitaire', 'Rummy', 'Risk', 'Settlers of Catan'];

            $fileName = 'Countries.txt';
            $file = fopen($fileName, "r");
            while(!feof($file))
            {
                global $countries;
                $countries[] = trim(fgets($file));
            }
        
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                function checkName()
                {
                    if(!empty($_POST['firstName']))
                    {
                        global $name;
                        $name = $_POST['firstName'];
                    }
                    else
                    {
                        echo "<p class = 'error'>Must provide a name</p>";
                        global $name;
                        $name = NULL;
                    }
                }

                function checkGender($genders)
                {
                    if(isset($_POST['gender']))
                    {  
                        if(in_array($_POST['gender'], $genders))
                        {
                            global $genderChoice;
                            $genderChoice = $_POST['gender'];
                        }
                        else
                        {
                            global $genderChoice;
                            $genderChoice = NULL;
                        }
                    }
                    else
                    {
                        echo "<p class = 'error'>Must select a gender</p>";
                        global $genderChoice;
                        $genderChoice = NULL;
                    }
                }

                function checkInterests($interestArr)
                {
                    if(isset($_POST['interests']))
                    {  
                        if(array_diff($_POST['interests'], $interestArr))
                        {
                            global $checkChoices;
                            $checkChoices = $_POST['interests'];
                        }
                        else
                        {
                            global $checkChoices;
                            $checkChoices = NULL;
                        }
                    }
                    else
                    {
                        echo "<p class = 'error'>Must select an interest</p>";
                        global $checkChoices;
                        $checkChoices = NULL;
                    }
                }

                function checkCountry($countries)
                {
                    if(isset($_POST['Country']))
                    {  
                        if(in_array($_POST['Country'], $countries))
                        {
                            global $countryChoice;
                            $countryChoice = $_POST['Country'];
                        }
                        else
                        {
                            echo "Hi";
                            global $countryChoice;
                            $countryChoice = NULL;                            
                        }
                    }
                    else
                    {
                        echo "<p class = 'error'>Must select a Country</p>";
                         global $countryChoice;
                        $countryChoice = NULL;
                    }
                }    
                
                checkName();
                checkGender($genders);
                checkInterests($interestArr);
                checkCountry($countries);
                
                if($name && $genderChoice && $checkChoices && $countryChoice)
                {
                    header("location: /lab3/script.php");
                    exit;
                }
                else
                    echo "<p>Error with input</p>";  
            }                 
            else
            {    
                echo "<form action = '' method = 'POST'>
                <label>Enter your first name:
                    <input type = 'text' name = 'firstName'/>
                </label>
                <br/>
                <label>Enter your gender:
                    <input type = 'radio' name = 'gender' value = 'Male'/>Male
                    <input type = 'radio' name = 'gender' value = 'Female'/>Female
                </label>
                <br/>
                <label>Choose some of your interests:";

                for($i = 0 ; $i < 6 ; $i++)
                    echo '<input type = "checkbox" name = "interests[]" value ='.$interestArr[$i].'/>'.$interestArr[$i];

                echo '<br/> Enter your location:';
                echo '<select name = "Country">';
                for($j = 0; $j < count($countries); $j++)
                    echo '<option value = '.$countries[$j].'>'.$countries[$j].'</option>';
                echo '</select>';

                echo "</label>
                    <br/>
                    <input type = 'submit' name = 'submit' value = 'Submit'/>
                </form>";
            }
        ?> 
    </body>
</html>