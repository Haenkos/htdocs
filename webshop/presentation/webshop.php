<?php
function showWebshopContent($productList) { //the product list should be array of array's where first index is equal to product id's
    //echo '<pre>'; var_dump($productList); echo '</pre>';
    echo '<div class="webshop">';

    foreach ($productList as $product) {
        echo '<div class="productcard">';
            showProductCard($product);
        echo '</div>';
    }
    
    echo '</div>';
}

function showProductCard($product) {
    echo    '<ul>
                <li><img src="/webshop/img/'.$product["imageID"].'.jpg" alt="'.$product["productName"].'" height="100"></li>
                <li><b>'.$product["productName"].'</b></li>
                <li>kleur: '.$product["productColour"].'</li>
                <li>prijs: '.$product["productPrice"].'</li>
                <li>
                    <form action="/webshop/index.php" method="GET">
                        <input type="hidden" name="page" value="webshop">
                        <input type="hidden" name="addItemID" value="'.$product["productID"].'">
                        <button type=submit>Add cart</button>
                    </form>
                </li>
            </ul>';
}
?>