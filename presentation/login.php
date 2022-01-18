<?php
    function showLoginForm($data) {
        echo '<div>
                <form action="/webshop/index.php" method="post">
                    <input type="hidden" id="page" name="page" value="login">

                    <label for="loginEmail">Email:
                        <input type="text" id="loginEmail" name="loginEmail" value="' .getArrayVar($data, "loginEmail").'"> <span class="error">'.getArrayVar($data['errors'], "loginEmailError").'</span>
                    </label><br>

                    <label for="loginPassword">Password:
                        <input type="text" id="loginPassword" name="loginPassword" value="'.getArrayVar($data, "loginPassword").'"> <span class="error">'.getArrayVar($data['errors'], "loginPasswordError").'</span>
                    </label><br>

                    <label for="submit">
                        <button type="submit" id="submit">Submit</button>
                    </label><br>
                </form>
            </div>';
    }
?>