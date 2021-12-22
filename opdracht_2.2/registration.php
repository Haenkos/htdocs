<?php
    function showRegistrationForm($data) {
        echo '<div>
                <form action="index.php" method="post">
                    <input type="hidden" id="page" name="page" value="login">

                    <label for="userName">Username:
                        <input type="text" id="userName" name="userName" value="'.getArrayVar($data, "userName").'"> <span class="error">'.$data["userNameError"].'</span>
                    </label><br>

                    <label for="userEmail">Email:
                        <input type="text" id="userEmail" name="userEmail" value"'.$data["userEmail"].'"> <span class="error">'.$data["userEmailError"].'</span>
                    </label><br>

                    <label for="password">Password:
                        <input type="text" id="password" name="password" value="'.$data["password"].'"> <span class="error">'.$data["passwordError"].'</span>
                    </label><br>

                    <label for="checkPassword">Password again:
                        <input type="text" id="checkPassword" name="checkPassword" value="'.$data["checkPassword"].'"> <span class="error">'.$data["checkPasswordError"].'</span>
                    </label><br>

                    <label for="submit">
                        <button type="submit" id="submit">Submit</button>
                    </label><br>
                </form>
            </div>';
    }
?>