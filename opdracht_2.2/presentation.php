<?php

function showResponsePage($page, $data) 
{ 
   beginDocument(); 
   showHeadSection(); 
   showBodySection($page, $data); 
   endDocument(); 
}     
//============================================== 

//============================================== 
function beginDocument() 
{ 
   echo '<!doctype html> 
<html>'; 
} 
//============================================== 
function showHeadSection() 
{ 
  echo '<head>
            <title>Opdracht 2.2</title>
            <link rel="stylesheet" href="css/styles.css">
        </head>';
} 
//============================================== 
function showBodySection($page, $data) 
{ 
   echo '    <body>' . PHP_EOL; 
   showHeader($page);
   showMenu(); 
   showContent($page, $data); 
   showFooter(); 
   echo '    </body>' . PHP_EOL; 
} 
//============================================== 
function endDocument() 
{ 
   echo  '</html>'; 
} 
//============================================== 
function showHeader($page) 
{ 
    echo '<header>
            <h1>' . ucfirst($page) . '</h1>
        </header>';
    echo print_r($_POST);
} 
//============================================== 
function showMenu() 
{ 
  echo '<nav>
            <ul>
                <li>
                    <a href="index.php">home</a>
                </li>
                <li>
                    <a href="index.php?page=about">About</a>
                </li>
                <li>
                    <a href="index.php?page=contact">Contact</a>
                </li>
            </ul>

            <div class="loginmenu">
                <ul>
                    <li>
                        <a href="index.php?page=login">login</a>
                    </li>
                    <li>
                        <a href="index.php?page=register">register</a>
                    </li>
                </ul>
            </div>
        </nav>';
} 
//============================================== 
function showContent($page, $data) 
{ 
   switch ($page) 
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
            require_once('contact_form.php');
            showContactForm($data);
            break;
        case 'thanks':
            require_once('contact_thanks.php');
            showThanksMessage($data);
        //TODO: update this function
        case 'login':
            require_once('login.php');
            showLoginContent();
            break;
        case 'register':
            require_once('register.php');
            showRegisterContent($data);
            break;

   }     
} 
//============================================== 
function showFooter() 
{ 
  echo '<footer>
            <p>
                &copy; Matthijs van Dijk, 2021
            </p>
        </footer>';
} 

?>