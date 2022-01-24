<?php

require_once 'Basic_Doc.php';

class ProductPageDoc extends BasicDoc
{
    public function __construct($data)
    {
        parent::__construct($data);
    }

    protected function mainContent()
    {
        $this->showProductPage($this->data['product']);
    }

    function showProductPage($product) {
        echo '<div class="productpage">
            <ul>
                <li><img src="/img/'.$product["imageID"].'.jpg" alt="'.$product["productName"].'" height="300"></li>
                <li>
                <li>prijs: '.$product["productPrice"].'</li>
                <div>
                    <form action="/index.php" method="GET">
                        <input type="hidden" name="page" value="productPage">
                        <input type="hidden" name="ID" value="'.$product["productID"].'">
                        <input type="hidden" name="action" value="addToCart">
                        <input type="hidden" name="cartItemID" value="'.$product["productID"].'">
                        <button type=submit>Add to cart</button>
                    </form>
                </div>
                </li>
                <li><b>'.$product["productName"].'</b></li>
                <li>'.$product["productCopy"].'</li>
            </ul>
            <ul>
            </ul>
            </div>';
    }
}