<?php
    function showRegistrationForm($data) {
        echo '<div>
                <form action="index.php" method="post">
                    <input type="hidden" id="page" name="page" value="registration">

                    <label for="userName">Username:
                        <input type="text" id="userName" name="userName" value="'.getArrayVar($data, "userName").'"> <span class="error">'.getArrayVar($data['errors'], "userNameError").'</span>
                    </label><br>

                    <label for="userEmail">Email:
                        <input type="text" id="userEmail" name="userEmail" value="'.getArrayVar($data, "userEmail").'"> <span class="error">'.getArrayVar($data['errors'], "userEmailError").'</span>
                    </label><br>

                    <label for="password">Password:
                        <input type="text" id="password" name="userPassword" value="'.getArrayVar($data, "userPassword").'"> <span class="error">'.getArrayVar($data['errors'], "userPasswordError").'</span>
                    </label><br>At least 8 characters<br>

                    <label for="checkPassword">Password again:
                        <input type="text" id="checkPassword" name="checkPassword" value="'.getArrayVar($data, "checkPassword").'"> <span class="error">'.getArrayVar($data['errors'], "checkPasswordError").'</span>
                    </label><br>

                    <label for="submit">
                        <button type="submit" id="submit">Submit</button>
                    </label><br>
                </form>
            </div>';
    }
?>