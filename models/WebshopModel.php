<?php
require_once 'PageModel.php';
require_once 'io/database_acces_layer.php';

class WebshopModel extends PageModel
{
    public $productList;
    public $productID;
    public $product;
    public $cart;
    public $cartItem;
    public $cartTotal;

    public function __construct($model)
    {
        PARENT::__construct($model);
    }

    public function handleCartActions()
    {
        if (array_key_exists('action', $_GET))
        {
            $this->action = $_GET['action'];
        }

        switch ($this->action)
        {
            case 'addToCart':
                $this->productID = $_GET['cartItemID'];
                $this->sessionManager->updateCart($this->productID);
                break;
            case 'checkout':
                $this->storeOrder();
                break;
            default:
                return;

        }
    }

    public function getCart()
    {
            $cart = $this->sessionManager->getCart();

            if (!$cart)
            {
                throw new Exception("Winkelwagen is leeg!");
            }
            else
            {
                $this->cart = $cart;
            }
        
    }

    public function getProduct()
    {
        $this->getProductID();

        $link = openDatabase();

        $query = "SELECT * FROM products WHERE productID='$this->productID'";

        if($link) 
        {
            $queryResult = mysqli_query($link, $query);
        } 
        else 
        {
            throw new Exception('Error retrieving data from Database' . PHP_EOL);
        }

        if(mysqli_num_rows($queryResult) > 0) 
        {
            $this->product = mysqli_fetch_assoc($queryResult);
        } 
        else 
        {
            return NULL;
        }
    }

    private function getProductID()
    {
        $this->productID = $_GET['ID'];
    }

    public function getProductList()
    {
        $link = openDatabase();

        $query = "SELECT * FROM products;";

        if($link) 
        {
            $queryResult = mysqli_query($link, $query);
        } 
        else 
        {
            throw new Exception('Error retrieving data from Database' . PHP_EOL);
        }

        if(mysqli_num_rows($queryResult) > 0) 
        {
            $i = 0;
            while ($i < mysqli_num_rows($queryResult)) 
            {
                $productList[$i] = mysqli_fetch_assoc($queryResult);
                $i++;
            }
            $this->productList = $productList;
        } 
        else 
        {
            return NULL;
        }
    }

    private function storeOrder() {
        $link = openDatabase();
    
        //$productsList = getAllProducts();
        $userID = $this->sessionManager->getUserID();
    
        $date = date('Y/m/d');
    
        $query = "INSERT INTO orders (userID, orderDate) VALUES ('$userID', '$date')";
        
        if (mysqli_query($link, $query)) {
            console_log('order created succesfully');
        } else {
            throw new Exception('Error storing order data in database ' . mysqli_error($link));
        }
    
        $lastID = mysqli_insert_id($link);
    
        foreach ($this->cart as $itemID => $amount) {
            $query = "INSERT INTO ordersproducts (orderID, productID, amount) VALUES ('$lastID', '$itemID', '$amount')";
            
            if (mysqli_query($link, $query)) {
                console_log('order filled up succesfully');
            } else {
                throw new Exception('Error storing product ID\'s in database' . mysqli_error($link));
            }
        }
    }
}