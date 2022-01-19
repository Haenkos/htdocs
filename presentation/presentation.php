<?php
    function showResponsePage($data)
    {
        switch ($data['page']) {
            case 'home':
                require_once('Home_Doc.php');
                $view = new HomeDoc($data);
                $view->show();
                break;
            case 'about':
                require_once('About_Doc.php');
                $view = new AboutDoc($data);
                $view->show();
                break;
            case 'thanks': //is merged with case 'contact'
            case 'contact':
                require_once('Contact_Form_Doc.php');
                $view = new ContactFormDoc($data);
                $view->show();
                break;
            case 'login':
                require_once('Login_Form_Doc.php');
                $view = new LoginFormDoc($data);
                $view->show();
                break;
            case 'registration':
                require_once('Register_Form_Doc.php');
                $view = new RegisterFormDoc($data);
                $view->show();
                break;
            case 'webshop':
                require_once('Webshop_Doc.php');
                $view = new WebshopDoc($data);
                $view->show();
                break;
            case 'productPage':
                require_once('Product_Page_Doc.php');
                $view = new ProductPageDoc($data);
                $view->show();
                break;
            case 'cart':
                require_once('ShoppingCart_Doc.php');
                $view = new ShoppingCartDoc($data);
                $view->show();
                break;
        }
    }
    
    function beginDocument() { 
        echo '<!DOCTYPE html> 
            <html lang="nl">';
    } 
    
    function showHeadSection() { 
      echo '<head>
                <title>Webshop</title>
                <link rel="stylesheet" type="text/css" href="/css/styles.css">
            </head>';
    } 
    
    function showBodySection($data) { 
       echo '    <body>' . PHP_EOL;
       //debugData($data);
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
        echo '<h1>' . ucfirst(htmlspecialchars($page)) . '</h1>';
        echo '</header>';
    } 
    
    function showMenu() { 
      echo '<div class="menus">';
      echo '<nav class="nav_menu">
                <ul>
                    <li>
                        <a href="/index.php">Home</a>
                    </li>
                    <li>
                        <a href="/index.php?page=webshop">Webshop</a>
                    </li>
                    <li>
                        <a href="/index.php?page=about">About</a>
                    </li>
                    <li>
                        <a href="/index.php?page=contact">Contact</a>
                    </li>
                </ul>
            </nav>';

            if (empty($_SESSION['userName'])) {
                echo '<nav class="session_menu">
                    <ul>
                        <li>
                            <a href="/index.php?page=login">Login</a>
                        </li>
                        <li>
                            <a href="/index.php?page=registration">Register</a>
                        </li>
                        <li>
                            <a href="/index.php?page=cart">Winkelwagen</a>
                        </li>
                    </ul>
                </nav>';
            } else {
                echo '<nav class="session_menu">
                <ul>
                    <li>
                        <a href="/index.php?page=logout">Logout ' .$_SESSION['userName'].'</a>
                    </li>
                    <li>
                        <a href="/index.php?page=cart">Winkelwagen</a>
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
                showWebshopContent($data['productsList']);
                break;
            case 'productPage':
                require_once('webshop.php');
                showProductPage($data['product']);
                break;
            case 'cart':
                require_once('webshop.php');
                showShoppingCart($data['productsList']);
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