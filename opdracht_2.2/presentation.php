<?php
    function showResponsePage($data) 
    {

        beginDocument(); 
        showHeadSection(); 
        showBodySection($data); 
        endDocument(); 
    }     
    
    function beginDocument() 
    { 
       echo '<!doctype html> 
    <html>'; 
    } 
    
    function showHeadSection() 
    { 
      echo '<head>
                <title>Opdracht 2.2</title>
                <link rel="stylesheet" href="css/styles.css">
            </head>';
    } 
    
    function showBodySection($data) 
    { 
       echo '    <body>' . PHP_EOL;
       debugData($data);
       showHeader($data['page']);
       showMenu(); 
       showContent($data); 
       showFooter(); 
       echo '    </body>' . PHP_EOL; 
    } 
    
    function endDocument() 
    { 
       echo  '</html>'; 
    } 
    
    function showHeader($page) 
    { 
        echo '<header>
                <h1>' . ucfirst($page) . '</h1>
            </header>';
    } 
    
    function showMenu() 
    { 
      echo '<div class="menus">
            <nav class="nav_menu">
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
            </nav>
            <nav class="session_menu">
                <ul>
                    <li>
                        <a href="index.php?page=login">Login</a>
                    </li>
                    <li>
                        <a href="index.php?page=logout">Logout</a>
                    </li>
                    <li>
                        <a href="index.php?page=registration">Register</a>
                    </li>
                </ul>
            </nav>
            </div>';
    } 
    
    function showContent($data) 
    { 
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
    
    function showFooter() 
    { 
      echo '<footer>
                <p>
                    &copy; Matthijs van Dijk, 2021
                </p>
            </footer>';
    } 

    function debugData($data) {

        echo '<div>
                <p>$_GET: '; var_dump($_GET); echo '</p>
                <p>$_POST: '; var_dump($_POST); echo '</p>
                <p>$data: '; var_dump($data); echo '</p>
            </div>';
    }
?>