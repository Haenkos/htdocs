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
        /* JH: Ik zou hier van maken $this->action = Util::getUrlVar('action'); */
        if (array_key_exists('action', $_GET))
        {
            $this->action = $_GET['action'];
        }

        switch ($this->action)
        {
            case 'addToCart':
                /* JH TIP, ik zou dit ook niet toestaan als er niemand is ingelogged, dus de if (isUserLoggedIn) voor de switch zetten */
                $this->productID = $_GET['cartItemID'];
                $this->sessionManager->updateCart($this->productID);
                break;
            case 'checkout':
                if ($this->sessionManager->isUserLoggedIn())
                {
                    if($this->sessionManager->getCart())
                    {
                        console_log('somehow this still runs');
                        $this->storeOrder();
                        $this->sessionManager->emptyCart();
                        console_log('order stored');
                        break;
                    }
                    else
                    {
                        break;
                    }
                }
                else
                {
                    throw new Exception("noLoggedInUser"); /* JH: In plaats van een specifieke message is het gebruikelijk om een custom Exception class (bijv. NotLoggedInException of SecurityException) te maken (zie https://www.w3schools.com/php/php_exception.asp) */
                } 
        }
    }

    public function getCart()
    {
            $cart = $this->sessionManager->getCart();

            if (!$cart)
            {
                throw new Exception("Winkelwagen is leeg!"); /* JH: Dit zou ik niet met een exceptie doen, dit is een normale foutsituatie, ik zou hier een isCartEmpty functie hebben */
            }
            else
            {
                $this->cart = $cart;
            }
        
    }

    public function getProduct() /* JH: Waarom staat dit niet in de database_access_layer of produtctIO ? m.u.v. getProductID */
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

    public function getProductList() /* JH: Waarom staat dit niet in de database_access_layer of produtctIO ? */
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

    private function storeOrder() { /* JH: Waarom staat dit niet in de database_access_layer of ordersIO ? */
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
    
        foreach ($this->cart /* JH: DEZE IS LEEG */ as $itemID => $amount) {
            $query = "INSERT INTO ordersproducts (orderID, productID, amount) VALUES ('$lastID', '$itemID', '$amount')";
            
            if (mysqli_query($link, $query)) {
                console_log('order filled up succesfully');
            } else {
                throw new Exception('Error storing product ID\'s in database' . mysqli_error($link));
            }
        }
    }
}