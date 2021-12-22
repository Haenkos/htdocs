<?php
    function getUser($email) {
        //$file = fopen("users\users.txt", "r") or die ("File not found/unable to open file!");
        $usersDataArray = file("users\users.txt");
        echo '<pre> UsersdataArray:'.PHP_EOL; print_r($usersDataArray); echo '</pre>';

        for ($i=1; $i<=count($usersDataArray); $i+=1) {
            $userEntry = explode(",", $usersDataArray[$i]);
            echo '<pre>UserEntry:'.PHP_EOL; print_r($userEntry); echo '</pre>';

            if (strcmp($userEntry[1], $email) == 0) {
                return $userEntry; //TODO: make this a associative array
                break;
            } else {
                continue;
            }
        }
        
        return NULL;
    }

    function storeUser($userName, $userEmail, $userPassword) {

        $userdataString = implode(",", array($userName, $userEmail, $userPassword));

        if (!file_exists("users\users.txt")) {

            $file = fopen("users\users.txt", "w");
            fwrite($file, "[email][username][password]".PHP_EOL);
            fwrite($file, $userdataString.PHP_EOL);
            fclose($file);

        } else {

            $file = fopen("users\users.txt", "a");
            fwrite($file, $userdataString.PHP_EOL);
            fclose($file);
        }
    }
?>