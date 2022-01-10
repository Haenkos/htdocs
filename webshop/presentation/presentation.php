<?php
    function showResponsePage($data) {
        beginDocument(); 
        showHeadSection(); 
        showBodySection($data); 
        endDocument(); 
    }     
    
    function beginDocument() { 
        echo '<!DOCTYPE html> 
            <html>'; 
    } 
    
    function showHeadSection() { 
      echo '<head>
                <title>Webshop</title>
                <link rel="stylesheet" type="text/css" href="/webshop/css/styles.css">
            </head>';
    } 
    
    function showBodySection($data) { 
       echo '    <body>' . PHP_EOL;
       debugData($data);
       showHeader($data['page']);
       showMenu(); 
       showContent($data);
       showFooter(); 
       echo '    </body>' . PHP_EOL; 
    } 
    
    function endDocument() { 
       echo  '</html>'; 
    } 
    
    function showHeader($page) { 
        echo '<header>';
        echo '<h1>' . ucfirst($page) . '</h1>';
        echo '</header>';
    } 
    
    function showMenu() { 
      echo '<div class="menus">';
      echo '<nav class="nav_menu">
                <ul>
                    <li>
                        <a href="/webshop/index.php">Home</a>
                    </li>
                    <li>
                        <a href="/webshop/index.php?page=about">About</a>
                    </li>
                    <li>
                        <a href="/webshop/index.php?page=contact">Contact</a>
                    </li>
                </ul>
            </nav>';

            if (empty($_SESSION)) {
                echo '<nav class="session_menu">
                    <ul>
                        <li>
                            <a href="/webshop/index.php?page=login">Login</a>
                        </li>
                        <li>
                            <a href="/webshop/index.php?page=registration">Register</a>
                        </li>
                    </ul>
                </nav>';
            } else {
                echo '<nav class="session_menu">
                <ul>
                    <li>
                        <a href="/webshop/index.php?page=logout">Logout ' .$_SESSION['userName'].'</a>
                    </li>
                </ul>
            </nav>';
            }
        echo '</div>';
    } 
    
    function showContent($data) { 
       switch ($data['page']) 
       { 
            case 'home':
                require_once('home.php');
                showHomeContent();
                break;
            case 'about':
                require_once('about.php');
                showAboutContent();
                break;
            case 'contact':
                require_once('contact.php');
                showContactForm($data);
                break;
            case 'thanks':
                showContactThanks($data);
                break;
            case 'login':
                require_once('login.php');
                showLoginForm($data);
                break;
            case 'registration':
                require_once('registration.php');
                showRegistrationForm($data);
                break;
            case 'webshop':
                require_once('webshop.php');
                /*
                $productList = array(
                        array(
                            "productID" => 10,
                            "productImg" => "/webshop/img/sl_ring_goud.jpg",
                            "productName" => "Sleutelbosring Goud",
                            "productColour" => "Goud",
                            "productPrice" => 1000
                        ),
                        array(
                            "productID" => 11,
                            "productImg" => "/webshop/img/sl_ring_messing.jpg",
                            "productName" => "Sleutelbosring Octarine",
                            "productColour" => "Octarine",
                            "productPrice" => "1 million cabbages"
                        ),
                        array(
                            "productID" => 12,
                            "productImg" => "/webshop/img/sl_ring_zwart.jpg",
                            "productName" => "Sleutelbosring Bruin",
                            "productColour" => "Bruin",
                            "productPrice" => -10
                        ),
                        array(
                            "productID" => 13,
                            "productImg" => "/webshop/img/sl_ring_zwart.jpg",
                            "productName" => "Sleutelbosring Bruin",
                            "productColour" => "Bruin",
                            "productPrice" => -10
                        ),
                        array(
                            "productID" => 14,
                            "productImg" => "/webshop/img/sl_ring_zwart.jpg",
                            "productName" => "Sleutelbosring Bruin",
                            "productColour" => "Bruin",
                            "productPrice" => -10
                        )
                    );*/
                showWebshopContent($data['productsList']); //hier straks $data['productList'] meegeven
                break;
       }     
    } 
    
    function showFooter() { 
      echo '<footer>
                <p>
                    &copy; Matthijs van Dijk, 2021
                </p>
            </footer>';
    } 

    function debugData($data) {

        echo '<div>
                <pre>$_GET: '; var_dump($_GET); echo '</pre>
                <pre>$_POST: '; var_dump($_POST); echo '</pre>
                <pre>$data: '; var_dump($data); echo '</pre>';
                if (isset($_SESSION)) {echo '<pre>$_SESSION: '; var_dump($_SESSION);}
            echo '</div>';
    }
?>