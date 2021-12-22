<?php
    require("userfileFilehandler.php");

    if(is_writable("users\users.txt")){
        //Delete the file
        $deleted = unlink("users\users.txt");
    }

    storeUser("Fred", "fred@email.com", "123");
    storeUser("Hans", "hans@worst.nl", "456");
    storeUser("Flip", "flip@po.nl", "789");

    $gottenUser = getUser("hans@worst.nl");
    if (!isset($gottenUser)) {
        echo "Danger, danger!";
    } else {
    echo '<pre>gottenUser:'.PHP_EOL; var_dump($gottenUser); echo '</pre>';
    }
?>