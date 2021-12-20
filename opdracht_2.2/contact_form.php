<?php

    define('GENDERS', array("dhr" => "Dhr.", "mvr" => "Mvr.", "anders/geen" => ""));
    define('COM_PREFS', array("email" => "Email", "phone" => "Telefoon"));
    
    function generateOptions($array) {
        foreach($array as $value => $option) {
            echo '<option value="'.$value.'">'.$option.'</option><br>'; 
        }
    }

    function showContactForm($data) {
        echo '<div class="contact_form">
        <form action= "index.php?page=contact" method="post">
            <div>
                <label for="gender">
                    <select id="gender" name="gender">'; 
                      generateOptions(GENDERS);
                echo '</select>
                </label><br>
            </div>

            <div>
                <label for="name">Naam:
                    <input type="text" id="name" name="name" value="'.$data["name"].'"><span class="error">'.$data["nameError"].'</span>
                </label><br>
            
                <label for="email">Email:
                    <input type="text" id="email" name="email" value="'.$data["email"].'"><span class="error">'.$data["emailError"].'</span>
                </label><br>
            
                <label for="phone">Telefoon:
                    <input type="text" id="phone" name="phone" value="'.$data["phone"].'"><span class="error">'.$data["phoneError"].'</span>
                </label><br>
            </div>

            <div class="radiobuttons">
                <div>
                    Heeft email of telefoon je voorkeur?
                </div>

                <label for="radio_email">
                    Email<input type="radio" id="radio_email" name="compref" value="email"';
                    if(isset($data['compref']) && $data['compref']=="email") {echo "checked";}
                    echo '>
                </label>

                <label for="radio_phone">
                    Phone<input type="radio" id="radio_phone" name="compref" value="phone"';
                    if(isset($data['compref']) && $data['compref']=="phone") {echo "checked";}
                    echo '> '.$data['comprefError'].'
                </label><br>
            </div>
            
            <label for="message">
                <?=$data[messageError];?><br>
                <textarea id="message" name="message" rows="10" cols="57" placeholder="Typ hier je bericht...">';
                if (isset($data['message'])) echo $data['message'];
                echo '</textarea>
            </label><br>
            
            <input type="hidden" id="page" name="page" value="contact">
            
            <label for="submit">
                <button type="submit" id="submit">Submit</button>
            </label><br>
        </form>
    </div>';        
    }

?>
