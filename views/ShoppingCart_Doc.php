<?php

require_once 'Basic_Doc.php';
require_once 'C:\Bitnami\wampstack-8.0.13-0\apache2\htdocs\services\sessionManager.php';

class ShoppingCartDoc extends BasicDoc
{
    public function __construct($data)
    {
        parent::__construct($data);
    }

    protected function mainContent()
    {
        $this->showShoppingCart($this->data['productsList']);
    }

    function showShoppingCart($productList) {
        $cart = getCart();

        if (!$cart) {
            echo '<div>
            <p>Shopping cart is empty!</p>
        </div>';
        } else {
            echo '<div class="shoppingcart">';

            foreach ($productList as $product) {
                if (array_key_exists($product['productID'], $cart)) {
                    echo '<div class="productcard">';
                    $this->showCartCard($product);
                    echo 'aantal: '.$cart[$product['productID']];
                    echo '</div>';
                }
            }

            echo '</div>';

            echo '<br><div>
                <form action="/index.php" method="GET">
                    <input type="hidden" name="page" value="cart">
                    <input type="hidden" name="action" value="checkout">
                    <button type=submit>Checkout</button>
                </form>
            </div>';
        }
    }

    function showCartCard($product) {
        echo    '<ul>
                <li><img src="../img/'.$product["imageID"].'.jpg" alt="'.$product["productName"].'" height="100"></li>
                <li><b>'.$product["productName"].'</b></li>
                <li>kleur: '.$product["productColour"].'</li>
                <li>prijs: '.$product["productPrice"].'</li>
            </ul>';
    }
}