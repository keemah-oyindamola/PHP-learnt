<?php
    date_default_timezone_set("Africa/Lagos");
    echo date("l") . "<br/>"; //Returns the day of the week
    echo date("j") . "<br/>"; //Returns the date of the month (1-31)
    echo date("S \of") . "<br/>"; //Returns the prefix behind the date (rd, th, st, nd), \of is an escape character
    echo date("F")  . "<br/>"; //Returns the month of the year
    echo date("Y")  . "<br/>"; //Returns the year
    echo date("h:i:s")  . "<br/>"; //Returns the hour, minute and seconds (hr:min:s)
    echo date("A")  . "<br/>"; //Returns AM/PM

    echo date("h:i A") . "<br/>"; 

    $str = "I am Billie Elish";
    $hashed = bin2hex($str);
    echo($hashed) . "<br/>";
    
    $reversed = hex2bin($hashed);
    echo($reversed) . "<br/>";

    echo rand(1, 100) . "<br/>";

    echo random_bytes(8)

?>