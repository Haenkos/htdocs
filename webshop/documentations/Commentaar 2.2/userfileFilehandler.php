<?php

    require_once 'debug.php';

    function getUser($email) {
        //$file = fopen("users\users.txt", "r") or die ("File not found/unable to open file!");
        if (file_exists("users\users.txt")) { /* JH TIP: de test "users/users.txt" komt vaak terug, maak hier een define van, of maak een functie doesUserFileExists(); en openUserFile($mode); */
            $usersDataArray = file("users\users.txt");
            //echo '<pre> UsersdataArray:'.PHP_EOL; print_r($usersDataArray); echo '</pre>';

            for ($i = 1; $i < count($usersDataArray); $i += 1) {
                $userEntry = explode("," /* JH: De opdracht is om te scheiden met een | symbool */, $usersDataArray[$i]); /* JH TIP: Deze code gaat fout als iemand een , in zijn/haar password gebruikt, kijk eens naar de derde parmeter van deze explode functie */
                //echo '<pre>UserEntry: '.$i.PHP_EOL; print_r($userEntry); echo '</pre>';

                if (strcmp($userEntry[1], $email) == 0) {
                    $userEntry = makeAssociative($userEntry); /* JH TIP: De naam makeAssociative is heel generiek, maar de implementatie is dat niet, ik zou hem convertToUser of convertToUserArray van maken */
                    $userEntry['userPassword'] = trim($userEntry['userPassword']); /* JH TIP: Ik zou dit al in de makeAssociative functie doen */

                    //console_log($userEntry);

                    return $userEntry;
                    break;
                } else { /* JH TIP: Omdat dit de laatste actie in de for is, hoef je hier geen continue; aan te roepen, dat is al impliciet */
                    continue;
                }
            }
    }
        
        return NULL;
    }

    function storeUser($userName, $userEmail, $userPassword) {

        $userdataString = implode("," /* JH: De opdracht is om te scheiden met een | symbool */, array($userName, $userEmail, $userPassword));

        if (!file_exists("users\users.txt")) { /* JH TIP: de test "users/users.txt" komt vaak terug, maak hier een define van, of maak een functie doesUserFileExists(); en openUserFile($mode); */

            mkdir('users');
            $file = fopen("users\users.txt", "w");
            fwrite($file, "[email][username][password]".PHP_EOL); /* JH: Mis de | tussen de ] [ symbolen */
            fwrite($file, $userdataString.PHP_EOL); /* JH: Deze laatste twee stappen zijn het zelfde als in de else situatie, deze kan je ook buiten de if zetten */
            fclose($file);

        } else {

            $file = fopen("users\users.txt", "a");
            fwrite($file, $userdataString.PHP_EOL);
            fclose($file);
        }
    }

    function makeAssociative($entry) { /* JH TIP: De naam makeAssociative is heel generiek, maar de implementatie is dat niet, ik zou hem convertToUser of convertToUserArray van maken */
        $assocArray = array (
            "userName" => $entry[0], /* JH TIP: Ik zou hier nog trim() omheen zetten */
            "userEmail" => $entry[1], /* JH TIP: Ik zou hier nog trim() omheen zetten */
            "userPassword" => $entry[2], /* JH TIP: Ik zou hier nog trim() omheen zetten */
        );

        return $assocArray;
    }
?>