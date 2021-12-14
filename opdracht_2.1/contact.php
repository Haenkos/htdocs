<?php
    function showContactcontent() {
        $gender = $name = $email = $phone = $compref = $message = $page = "";
        $nameError = $emailError = $phoneError = $comprefError = $messageError = "";
        $valid = false;

        function formatInput($input) {
            $input = trim($input);
            $input = stripslashes($input);
            $input = htmlspecialchars($input);
            return $input;
        }

        //validate POST data
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($_POST["gender"] == "Anders/geen") {
                $gender = "";
            } else {
                $gender = formatInput($_POST["gender"]); //waarom formatten als vaste keuzeopties? ==> mogelijk dat hackers keuzes via lokale html aanpassen is mijn gok.
            }

            if (empty($_POST["name"])) {
                $nameError = "Naam invullen a.u.b.";
            } else {
                $name = formatInput($_POST["name"]);

                if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                    $nameError = "Alleen letters en spaties a.u.b.";
                }
            }

            if (empty($_POST["email"])) {
                $emailError = "Email invullen a.u.b.";
            } else {
                $email = formatInput($_POST["email"]);

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailError = "Geen valide e-mail adres";
                }
            }

            if (empty($_POST["phone"])) {
                $phoneError = "Telefoonnummer invullen a.u.b.";
            } else {
                $phone = formatInput($_POST["phone"]);

                if (!preg_match("/^[0-9--]*$/",$phone)) {
                    $phoneError = "alleen cijfers en '-' gebruiken a.u.b.";
                }
            }

            if (empty($_POST["compref"])) {
                $comprefError = "Geef a.u.b. aan of u liever gebeld of gemaild wil worden.";
            } else {
                $compref = formatInput($_POST["compref"]); //waarom formatten als vaste keuzeopties? ==> mogelijk dat hackers keuzes via lokale html aanpassen is mijn gok.
            }

            if (empty($_POST["message"])) {
                $messageError = "Typ a.u.b. een bericht, lege berichten worden genegeerd.";
            } else {
                $message = formatInput($_POST["message"]);
            }

            if ($nameError == "" &&
                $emailError == "" &&
                $phoneError == "" &&
                $comprefError == "" &&
                $messageError == "") {

                $valid = true;
            }
        }

        //onderstaande code is slecht leesbaar en kan wss beter in functies worden opgedeeld. vooralsnog is het eventjes zo.
        if (!$valid) {
            echo '<div class="contact_form">
                    <form action= "index.php?page=contact" method="post">

                        <label for="gender">
                            <select id="gender" name="gender">
                                <option>Dhr.</option>
                                <option>Mvr.</option>
                                <option>Anders/geen</option>
                            </select>
                        </label><br>

                        <label for="name">Naam:
                            <input type="text" id="name" name="name" value="'.$name.'"> '.$nameError.'
                        </label><br>
                        <label for="email">Email:
                            <input type="text" id="email" name="email" value="'.$email.'"> '.$emailError.'
                        </label><br>
                        <label for="phone">Telefoon:
                            <input type="text" id="phone" name="phone" value="'.$phone.'"> '.$phoneError.'
                        </label><br>

                        <div class="radiobuttons">
                            <div>Heeft email of telefoon je voorkeur?</div>
                            <label for="radio_email">
                                Email<input type="radio" id="radio_email" name="compref" value="email"';
                                if(isset($compref) && $compref=="email") echo "checked";
                                echo '>
                            </label>
                            <label for="radio_phone">
                                Phone<input type="radio" id="radio_phone" name="compref" value="phone"';
                                if(isset($compref) && $compref=="phone") echo "checked";
                                echo '> '.$comprefError.'
                            </label><br>
                        </div>
                        
                        <label for="message">
                            <?=$messageError;?><br>
                            <textarea id="message" name="message" rows="10" cols="57" placeholder="Typ hier je bericht...">';
                            if (isset($message)) echo $message;
                            echo '</textarea>
                        </label><br>
                        
                        <input type="hidden" id="page" name="page" value="contact">
                        
                        <label for="submit">
                            <button type="submit" id="submit">Submit</button>
                        </label><br>
                    </form>
                </div>';
        } else {
            echo '<p>Bedankt voor uw reactie!</p>

            <div>Naam: '.$name.'</div>
            <div>Email: '.$email.'</div>
            <div>Nummer: '.$phone.'</div>
            <div>Bericht: '.$message.'</div>';
        };
    }
?>