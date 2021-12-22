<?php
    require("userfileFilehandler.php");
    storeUser("Fred", "fred@email.com", "123");
    storeUser("Hans", "hans@worst.nl", "456");
    storeUser("Flip", "flip@po.nl", "789");

    $gottenUser = getUser("hans@worst.nl");

    echo '<pre>gottenUser:'.PHP_EOL; var_dump($gottenUser); echo '</pre>';
?>