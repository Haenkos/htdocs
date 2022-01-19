<?php
require_once 'Basic_Doc.php';

class WebshopDoc extends BasicDoc
{
    public function __construct($data)
    {
        parent::__construct($data);
    }

    protected function mainContent()
    {
        $this->showWebshopContent($this->data['productsList']);
    }

    private function showWebshopContent($productList) {
        echo '<div class="webshop">';

        foreach ($productList as $product) {
            echo '<div class="productcard">';
            $this->showProductCard($product);
            echo '</div>';
        }

        echo '</div>';
    }

    private function showProductCard($product) {
        echo '<a href=/index.php?page=productPage&ID='.$product['productID'].'>
            <ul>
                <li><img src="/img/'.$product["imageID"].'.jpg" alt="'.$product["productName"].'" height="100"></li>
                <li><b>'.$product["productName"].'</b></li>
                <li>kleur: '.$product["productColour"].'</li>
                <li>prijs: '.$product["productPrice"].'</li>
            </ul>
            </a>
            <ul>
                <li>
                    <form action="index.php" method="GET">
                        <input type="hidden" name="page" value="webshop">
                        <input type="hidden" name="action" value="addToCart">
                        <input type="hidden" name="cartItemID" value="'.$product["productID"].'">
                        <button type=submit>Add to cart</button>
                    </form>
                </li>
            </ul>';
    }
}