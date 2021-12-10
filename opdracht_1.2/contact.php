<!DOCTYPE html>
<html>
    <head>
        <title>Opdracht_1.2 - Contact</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>

    <body>
        <?php
            $name = $email = $phone = $compref = $message = "";
            $nameError = $emailError = $phoneError = $comprefError =$messageError = "";
            $valid = false;

            //validate POST data
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["name"])) {
                    $nameError = "Naam invullen a.u.b.";
                } else {
                    $name = test_input($_POST["name"]);
                    //hieronder eventueel RegEx inputvalidatie
                }
            }
        ?>

        <header>
            <h1>Contact</h1>
            <nav>
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="contact.html" class="active">Contact</a>
                    </li>
                </ul>
            </nav>
        </header>

        <?php if (!valid) { ?>

        <div class="contact_form">
            <form>
                <!-- dropdown aanhef-->
                <label for="gender">
                    <select id="gender" name="gender">
                        <option>Dhr.</option>
                        <option>Mvr.</option>
                        <option>Anders/geen</option>
                    </select>
                </label><br>

                <!--velden voor naam, email, telefon-->
                <label for="name">Naam:
                    <input type="text" id="name" name="name">
                </label><br>
                <label for="email">Email:
                    <input type="text" id="email" name="email">
                </label><br>
                <label for="phone">Telefoon:
                    <input type="text" id="phone" name="phone">
                </label><br>

                <!--radiobutton voorkeurcommuniciate-->
                <div class="radiobuttons">
                    <div>Heeft email of telefoon je voorkeur?</div>
                    <label for="radio_email">
                        Email<input type="radio" id="radio_email" name="compref" value="email">
                    </label>
                    <label for="radio_phone">
                        Phone<input type="radio" id="radio_phone" name="compref" value="phone">
                    </label><br>
                </div>
                <!--veld voor bericht-->
                <label for="message">
                    <textarea id="message" name="message" rows="10" cols="57" placeholder="Typ hier je bericht..."></textarea>
                </label><br>

                <!--verstuur knop-->
                <label for="submit">
                    <button type="submit" id="submit">Submit</button>
                </label><br>
            </form>
        </div>

        <?php } else { ?>

        <p>Bedankt voor uw reactie!</p>

        <div>Naam: <?=$name; ?></div>
        <div>Email: <?=$email; ?></div>
        <div>Nummer: <?=$phone; ?></div>
        <div>Bericht: <?=$message; ?></div>

        <footer>
            <p>
                &copy; Matthijs van Dijk, 2021
            </p>
        </footer>

    </body>
</html>
