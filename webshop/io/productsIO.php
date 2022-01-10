<?php
    require_once 'userfileFilehandler.php';

    function getProductsFromDb() {
        $link = openDatabase();

        $query = "SELECT * FROM products;";

        if($link) {
            $queryResult = mysqli_query($link, $query);
        } else {
            throw new Exception('Error retrieving data from Database' . PHP_EOL);
        }

        if(mysqli_num_rows($queryResult) > 0) {
            $i = 0;
            while ($i < mysqli_num_rows($queryResult)) {
                $productList[$i] = mysqli_fetch_assoc($queryResult);
                $i++;
            }
            return $productList;
        } else {
            return NULL;
        }
    }

?>