<?php
require_once 'PageModel.php';
require_once 'io/database_acces_layer.php';

class WebshopModel extends PageModel
{
    public $productList;
    public $productID;
    public $product;
    public $cartItem;
    public $cartTotal;

    public function __construct($model)
    {
        PARENT::__construct($model);
    }

    public function getProductList()
    {
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
            $this->productList = $productList;
        } else {
            return NULL;
        }
    }

    public function handleCartActions()
    {
        if (array_key_exists('action', $_GET))
        {
            //Do actions
        }
    }

    public function getProduct()
    {
        $this->getProductID();

        $link = openDatabase();

        $query = "SELECT * FROM products WHERE productID='$this->productID'";

        if($link) {
            $queryResult = mysqli_query($link, $query);
        } else {
            throw new Exception('Error retrieving data from Database' . PHP_EOL);
        }

        if(mysqli_num_rows($queryResult) > 0) {
            $this->product = mysqli_fetch_assoc($queryResult);
        } else {
            return NULL;
        }
    }

    private function getProductID()
    {
        $this->productID = $_GET['ID'];
    }

     
    
}