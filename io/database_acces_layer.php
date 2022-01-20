<?php

    require_once 'C:\Bitnami\wampstack-8.0.13-0\apache2\htdocs\tools\debug.php';

    function getUser($email) {
        $link = openDatabase();

        try {
            $query = "SELECT userName, userEmail, userPassword FROM users WHERE userEmail='$email'";

            $queryResult = mysqli_query($link, $query);

            if(mysqli_num_rows($queryResult) > 0) {
                return mysqli_fetch_assoc($queryResult);
            } else {
                return NULL;
            }
        } finally {
            closeDatabase($link);
        }
    }

    function storeUser($userName, $userEmail, $userPassword) {
        $link = openDatabase();

        try {
            $query = "INSERT INTO users (userName, userEmail, userPassword) VALUES ('$userName', '$userEmail', '$userPassword')";
        
            if (mysqli_query($link, $query)) {
                console_log('User stored succesfully');
            } else {
                throw new Exception('Error storing data in database' . PHP_EOL);
            }
        } finally {
            closeDatabase($link);
        }
    }

    function getUserID($userName) {
        $link = openDatabase();

        $query = "SELECT userID FROM users WHERE userName='$userName'";

        try {
            $queryResult = mysqli_query($link, $query);


            if(!empty($queryResult)) {
                $queryResult = mysqli_fetch_row($queryResult);
                $queryResult = implode($queryResult);
                console_log('getUserID queryresult: '.$queryResult);
                return $queryResult;
            } else {
                console_log('getUserID returns Null');
                return NULL;
            }
        } finally {
            closeDatabase($link);
        }
    }

    function openDatabase () {
        $connection = mysqli_connect('127.0.0.1', 'haenkos', 'haenkos', 'haenkos_database');

        if (!$connection) {
            throw new Exception("Database connection failed: " . PHP_EOL . mysqli_connect_error());
        } else {
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