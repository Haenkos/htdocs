<?php

    define('GENDERS', array("dhr" => "Dhr.", "mvr" => "Mvr.", "anders/geen" => "Anders/geen"));
    define('COM_PREFS', array("email" => "email", "phone" => "phone"));

    function showContactContent() {
        $data = validatePostData();

        if ($data['valid']) {
            showThanksMessage($data);
        } else {
            showFormContent($data);
        }
    }

    function generateOptions($array) {
        foreach($array as $value => $option) {
            echo '<option value="'.$value.'">'.$option.'</option><br>'; 
        }
    }

    function showFormContent($data) {
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
    
    function showThanksMessage($data) {
        echo '<p>Bedankt voor uw reactie!</p>

        <div>Naam: '.$data['name'].'</div>
        <div>Email: '.$data['email'].'</div>
        <div>Nummer: '.$data['phone'].'</div>
        <div>Bericht: '.$data['message'].'</div>';
    }
    
    function formatInput($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    function validatePostData() {

        $data = array(
            "gender" => "",
            "name" => "",
            "email" => "",
            "phone" => "",
            "compref" => "",
            "message" => "",
            "page" => "",
            "valid" => false,
            "genderError" => "",
            "nameError" => "",
            "emailError" => "",
            "phoneError" => "",
            "comprefError" => "",
            "messageError" => ""
        );

        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (array_key_exists($_POST['gender'], GENDERS)) {
                if ($_POST['gender'] == GENDERS['anders/geen']) {
                    $data['gender'] == "";
                } else {
                    $data['gender'] = $_POST['gender'];
                }
            } else {
                $data['genderError'] = "Kies aanhef"; 
            }
        
            if (isset($_POST["name"])) {
                $data['name'] = formatInput($_POST["name"]);

                if (empty($data['name'])) {
                    $data['nameError'] = "Naam invullen a.u.b."; 
                }
            } else {
                $data['nameError'] = "Naam invullen a.u.b.";
                
            }
        
            if (empty($_POST["email"])) {
                $data['emailError'] = "Email invullen a.u.b.";
            } else {
                $data['email'] = formatInput($_POST["email"]);
        
                if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['emailError'] = "Geen valide e-mail adres"; 
                }
            }
        
            if (empty($_POST["phone"])) {
                $data['phoneError'] = "Telefoonnummer invullen a.u.b.";
            } else {
                $data['phone'] = formatInput($_POST["phone"]);
        
                if (!preg_match("/^[0-9--]*$/",$data['phone'])) {
                    $data['phoneError'] = "alleen cijfers en '-' gebruiken a.u.b.";
                }
            }
        
            if (isset($_POST["compref"]) && array_key_exists($_POST["compref"], COM_PREFS)) {
                $data['compref'] = formatInput($_POST["compref"]); 
            } else {
                $data['comprefError'] = "Geef a.u.b. aan of u liever gebeld of gemaild wil worden.";
            }
        
            if (empty($_POST["message"])) {
                $data['messageError'] = "Typ a.u.b. een bericht, lege berichten worden genegeerd.";
            } else {
                $data['message'] = formatInput($_POST["message"]); 
            }
        
            if (
                empty($data['nameError']) &&
                empty($data['emailError']) &&
                empty($data['phoneError']) &&
                empty($data['comprefError']) &&
                empty($data['messageError'])
                ) {
                $data['valid'] = true;
            }
        }
        return $data;
    }
?>