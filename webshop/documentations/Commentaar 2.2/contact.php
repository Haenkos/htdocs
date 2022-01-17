<?php
    require_once 'page_request_handler.php';

    define('GENDERS', array("dhr" => "Dhr.", "mvr" => "Mvr.", "anders/geen" /* JH TIP: Dit wordt nergens getoond, dus kan je gewoon engens houden "other", de andere worden dan ook engels "mr" en "mrs" */ => "Anders/geen"));
    define('COM_PREFS', array("email" => "email", "phone" => "phone"));

    function generateOptions($array) {
        foreach($array as $value => $option) {
            echo '<option value="'.$value.'">'.$option.'</option><br>';
        }
    }

    function showContactForm($data) {
        echo '<div class="contact_form">
        <form action= "index.php" method="post">

            <input type="hidden" id="page" name="page" value="contact">

            <div>
                <label for="gender">
                    <select id="gender" name="gender">'; 
                      generateOptions(GENDERS);
                echo '</select> <span class="error">'.getArrayVar($data['errors'], "genderError").'</span>
                </label><br>
            </div>

            <div>
                <label for="name">Naam:
                    <input type="text" id="name" name="name" value="'.getArrayVar($data, "name").'"> <span class="error">'.getArrayVar($data['errors'], "nameError").'</span>
                </label><br>
            
                <label for="email">Email:
                    <input type="text" id="email" name="email" value="'.getArrayVar($data, "email").'"> <span class="error">'.getArrayVar($data['errors'], "emailError").'</span>
                </label><br>
            
                <label for="phone">Telefoon:
                    <input type="text" id="phone" name="phone" value="'.getArrayVar($data, "phone").'"> <span class="error">'.getArrayVar($data['errors'], "phoneError").'</span>
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
                    echo '> <span class="error">'.getArrayVar($data['errors'], "comprefError").'</span>
                </label><br>
            </div>
            
            <label for="message">
                <textarea id="message" name="message" rows="10" cols="57" placeholder="Typ hier je bericht...">';
                if (isset($data['message'])) echo $data['message'];
                echo '</textarea><br>
                <span class="error">'.getArrayVar($data['errors'], "messageError").'</span>
            </label><br>
            
            
            <label for="submit">
                <button type="submit" id="submit">Submit</button>
            </label><br>
        </form>
    </div>';
    
      /* JH: de radiobuttons voor compref kloppen niet, ik had iets verwacht als: 
      echo '<label for="radio_email">'.PHP_EOL.COM_PREFS["email"];
      echo '<input type="radio" id="radio_email" name="compref" value="email"';
      if(getArrayVar($data,'compref')=="email") echo "checked";
      echo '>'.PHP_EOL.'</label>';
      */
      /* JH_Extra:
      Je kan dit nog generieker maken door bijvoorbeeld een generateRadioButtons(COM_PREF, getArrayVar($data,'compref')) aan te roepen en dan te doen: 
      foreach($options as $rKey => $label) {
        echo '<label for="compref_'.$rKey.'">' . PHP_EOL . $label;
        echo '<input type="radio" id="compref_'.$rKey.'" name="compref" value="'.$rKey.'"'.
              ($currentValue==$rKey) ? "checked" : "" . '>' . PHP_EOL;
        echo '</label>';
      }
        */
    }
    
    function showContactThanks($data) {
        echo '<p>Bedankt voor uw reactie!</p>
        

        <div>Naam: '.$data['name'].'</div>
        <div>Email: '.$data['email'].'</div>
        <div>Nummer: '.$data['phone'].'</div>
        <div>Bericht: '.$data['message'].'</div>';
    }
?>
