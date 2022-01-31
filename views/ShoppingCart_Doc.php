<?php

require_once 'Basic_Doc.php';

class ShoppingCartDoc extends BasicDoc
{
    public function __construct($model)
    {
        parent::__construct($model);
    }

    protected function mainContent()
    {
        $this->showShoppingCart();
    }

    function showShoppingCart() {
        try
        {
            $this->model->getCart();
        }
        catch (Exception $e)
        {
            echo '<div>
                    <p>'.$e->getMessage().'</p>
                </div>';
            return;
        }


        echo '<div class="shoppingcart">';

        foreach ($this->model->productList as $product) {
            if (array_key_exists($product['productID'], $this->model->cart)) {
                echo '<div class="productcard">';
                $this->showCartCard($product);
                echo 'aantal: '.$this->model->cart[$product['productID']];
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

    function showCartCard($product) {
        echo    '<ul>
                <li><img src="../img/'.$product["imageID"].'.jpg" alt="'.$product["productName"].'" height="100"></li>
                <li><b>'.$product["productName"].'</b></li>
                <li>kleur: '.$product["productColour"].'</li>
                <li>prijs: '.$product["productPrice"].'</li>
            </ul>';
    }
}