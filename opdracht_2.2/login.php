<?php
    function showLoginForm($data) {
        echo '<div>
                <form action="index.php" method="post">
                    <input type="hidden" id="page" name="page" value="login">

                    <label for="loginEmail">Email:
                        <input type="text" id="loginEmail" name="loginEmail" value="'.$data["loginEmail"].'"> <span class="error">'.$data["loginEmailError"].'</span>
                    </label><br>

                    <label for="loginPassword">Password:
                        <input type="text" id="loginPassword" name="loginPassword" value="'.$data["loginPassword"].'"> <span class="error">'.$data["loginPasswordError"].'</span>
                    </label><br>

                    <label for="submit">
                        <button type="submit" id="submit">Submit</button>
                    </label><br>
                </form>
            </div>';
    }
?>