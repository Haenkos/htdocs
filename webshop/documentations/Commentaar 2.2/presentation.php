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
                <title>Opdracht 2.2</title>
                <link rel="stylesheet" href="css/styles.css">
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
        echo '<h1>' . ucfirst($page) /* JH: Omdat in page_request_handler de pagina niet wordt gefilterd (met formatInput) kan hier potentieel een XSS (Cross side scripting) aanval worden gedaan */ . '</h1>';
        echo '</header>';
    } 
    
    function showMenu() { 
       /* JH Extra: Maak in processRequest achter $data['page'] = $page; een array van menu items $data['menu'] = array ('home' => 'Home', ...); if (isLoggedIn()) { $data['menu']['Logout'] = 'Log out '.getLoggedInUserName(); } else { ...} etc. 
                dan kan je hier een simpel: foreach($data['menu'] as $link => $menuText) { showMenuItem($link, $menuText); } doen */
      echo '<div class="menus">';
      echo '<nav class="nav_menu">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="index.php?page=about">About</a>
                    </li>
                    <li>
                        <a href="index.php?page=contact">Contact</a>
                    </li>
                </ul>
            </nav>';

            if (empty($_SESSION)) {
                echo '<nav class="session_menu">
                    <ul>
                        <li>
                            <a href="index.php?page=login">Login</a>
                        </li>
                        <li>
                            <a href="index.php?page=registration">Register</a>
                        </li>
                    </ul>
                </nav>';
            } else {
                echo '<nav class="session_menu">
                <ul>
                    <li>
                        <a href="index.php?page=logout">Logout '.$_SESSION['userName'].'</a>
                    </li>
                </ul>
            </nav>';
            }
        /* JH TIP: Maak een showMenuItem($link, $text) functie die het <li> ...</li> deel neerzet */
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