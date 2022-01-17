<?php /* JH TIP: Noem deze file 'database_handler.php' of 'database_access_layer.php' of zoiets */

    require_once 'debug.php';

    function getUser($email) {
        $link = openDatabase();

        $query = "SELECT userName, userEmail, userPassword FROM users WHERE userEmail='$email'";

        if($link) {
            $queryResult = mysqli_query($link, $query);
        } else {
            throw new Exception('Error retrieving data from Database' . PHP_EOL);
        }

        if(mysqli_num_rows($queryResult) > 0) {
            return mysqli_fetch_assoc($queryResult);
        } else {
            return NULL;
        }
        /* JH: De database connectie wordt niet gesloten, beter is het om de code na openDatabase() in een try { } te zetten en de closeDatabase($link) in een finally {} block te zetten */
    }

    function storeUser($userName, $userEmail, $userPassword) {
        $link = openDatabase();

        $query = "INSERT INTO users (userName, userEmail, userPassword) 
        VALUES ('$userName', '$userEmail', '$userPassword')";

        if($link) { /* JH: Deze if/else is overbodig, omdat als er geen link was dan was de functie al op regel 27 er met een exceptie uitgelopen */
            if (mysqli_query($link, $query)) {
                console_log('User stored succesfully');
                closeDatabase($link); 
            } else {
                throw new Exception('Error storing data in database' . PHP_EOL);
            }
        } else {
            throw new Exception('Failed to connect to database' . PHP_EOL);
        }
        /* JH: Als er een exceptie optreedt, dan wordt de database connectie niet gesloten, beter is het om de code na openDatabase in een try { } te zetten en de closeDatabase($link) in een finally {} block te zetten, dan wordt deze in alle gevallen gesloten */
    }

    function openDatabase () {
        $connection = mysqli_connect('127.0.0.1', 'haenkos', 'haenkos', 'haenkos_database');

        if (!$connection) {
            throw new Exception("Database connection failed: " . PHP_EOL . mysqli_connect_error());
        } else { /* JH: Na een if met een throw/return hoef je geen else te gebruiken */
            console_log('Succesfuly connected to database' . PHP_EOL);
            return $connection;
        }
    }

    function closeDatabase($connection) {
        if (!mysqli_close($connection)) {
            throw new Exception('Failed to close database' . PHP_EOL);
        }
    }
?>