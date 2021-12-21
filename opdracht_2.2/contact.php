<?php
    
    define('GENDERS', array("dhr" => "Dhr.", "mvr" => "Mvr.", "anders/geen" => "Anders/geen"));
    define('COM_PREFS', array("email" => "email", "phone" => "phone"));

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
                echo '</select> <span class="error">'.$data["genderError"].'</span>
                </label><br>
            </div>

            <div>
                <label for="name">Naam:
                    <input type="text" id="name" name="name" value="'.$data["name"].'"> <span class="error">'.$data["nameError"].'</span>
                </label><br>
            
                <label for="email">Email:
                    <input type="text" id="email" name="email" value="'.$data["email"].'"> <span class="error">'.$data["emailError"].'</span>
                </label><br>
            
                <label for="phone">Telefoon:
                    <input type="text" id="phone" name="phone" value="'.$data["phone"].'"> <span class="error">'.$data["phoneError"].'</span>
                </label><br>
            </div>

            <div class="radiobuttons">
                <div>
                    Heeft email of telefoon je voorkeur?
                </div>

                <label for="radio_email">
                    Email<input type="radio" id="radio_email" name="compref" value="'.COM_PREFS["email"].'"';
                    if(isset($data['compref']) && $data['compref']==COM_PREFS["email"]) echo "checked";
                    echo '>
                </label>

                <label for="radio_phone">
                    Phone<input type="radio" id="radio_phone" name="compref" value="'.COM_PREFS["phone"].'"';
                    if(isset($data['compref']) && $data['compref']==COM_PREFS["phone"]) echo "checked";
                    echo '> <span class="error">'.$data['comprefError'].'</span>
                </label><br>
            </div>
            
            <label for="message">
                <textarea id="message" name="message" rows="10" cols="57" placeholder="Typ hier je bericht...">';
                if (isset($data['message'])) echo $data['message'];
                echo '</textarea><br>
                <span class="error">'.$data["messageError"].'</span>
            </label><br>
            
            <input type="hidden" id="page" name="page" value="contact">
            
            <label for="submit">
                <button type="submit" id="submit">Submit</button>
            </label><br>
        </form>
    </div>';        
    }
    
    function showContactThanks($data) {
        echo '<p>Bedankt voor uw reactie!</p>
        

        <div>Naam: '.$data['name'].'</div>
        <div>Email: '.$data['email'].'</div>
        <div>Nummer: '.$data['phone'].'</div>
        <div>Bericht: '.$data['message'].'</div>';
    }
?>
