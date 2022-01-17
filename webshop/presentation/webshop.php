<?php
function showWebshopContent($productList) { 
    echo '<div class="webshop">';

    foreach ($productList as $product) {
        echo '<div class="productcard">';
            showProductCard($product);
        echo '</div>';
    }
    
    echo '</div>';
}

function showProductCard($product) {
    echo    '<a href=/webshop/index.php?page=productPage&ID='.$product['productID'].'>
            <ul>
                <li><img src="/webshop/img/'.$product["imageID"].'.jpg" alt="'.$product["productName"].'" height="100"></li>
                <li><b>'.$product["productName"].'</b></li>
                <li>kleur: '.$product["productColour"].'</li>
                <li>prijs: '.$product["productPrice"].'</li>
            </ul>
            </a>
            <ul>
                <li>
                    <form action="/webshop/index.php" method="GET">
                        <input type="hidden" name="page" value="webshop">
                        <input type="hidden" name="action" value="addToCart">
                        <input type="hidden" name="cartItemID" value="'.$product["productID"].'">
                        <button type=submit>Add to cart</button>
                    </form>
                </li>
            </ul>';
}

function showCartCard($product) {
    echo    '<ul>
                <li><img src="/webshop/img/'.$product["imageID"].'.jpg" alt="'.$product["productName"].'" height="100"></li>
                <li><b>'.$product["productName"].'</b></li>
                <li>kleur: '.$product["productColour"].'</li>
                <li>prijs: '.$product["productPrice"].'</li>
            </ul>';
}

function showProductPage($product) {
    echo    '<div class="productpage">
            <ul>
                <li><img src="/webshop/img/'.$product["imageID"].'.jpg" alt="'.$product["productName"].'" height="300"></li>
                <li>
                <li>prijs: '.$product["productPrice"].'</li>
                <div>
                    <form action="/webshop/index.php" method="GET">
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
                showCartCard($product);
            echo 'aantal: '.$cart[$product['productID']];
            echo '</div>';
            }
        }

        echo '</div>';

        echo '<br><div>
                <form action="/webshop/index.php" method="GET">
                    <input type="hidden" name="page" value="cart">
                    <input type="hidden" name="action" value="checkout">
                    <button type=submit>Checkout</button>
                </form>
            </div>';
    }
}
?>