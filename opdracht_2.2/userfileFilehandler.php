<?php
    function getUser($email) {
        $file = fopen("users\users.txt", "r") or die ("File not found/unable to open file!");
        $usersDataArray = file($file);

        for ($i=0; $i<count($usersDataArray); $i+=1) {
            $userEntry = explode($usersDataArray[$i], ",");

            if (strcmp($userEntry[0], $email)) {
                return $userEntry;
                break;
            } else {
                continue;
            }
        }
        
        return NULL;
    }

    function storeUser($userName, $userEmail, $userPassword) {
        $userdataString = implode(array($userName, $userEmail, $userPassword));

        if (!file_exists("users\users.txt")) {
            $file = fopen("users\users.txt", "w");
            fwrite($file, "[email][username][password]");
            fwrite($file, $userdataString);
            fclose($file);
        } else {
            $file = fopen("users\users.txt", "a");
            fwrite($file, $userdataString);
            fclose($file);
        }
    }
?>