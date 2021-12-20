<?php

function showResponsePage($page) 
{ 
   beginDocument(); 
   showHeadSection(); 
   showBodySection($page); 
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
            <title>Opdracht 2.1</title>
            <link rel="stylesheet" href="css/styles.css">
        </head>';
} 
//============================================== 
function showBodySection($page) 
{ 
   echo '    <body>' . PHP_EOL; 
   showHeader($page);
   showMenu(); 
   showContent($page); 
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
        </nav>';
} 
//============================================== 
function showContent($page) 
{ 
   switch ($page) 
   { 
        case 'home':
            require('home.php');
            showHomeContent();
            break;
        case 'about':
            require('about.php');
            showAboutContent();
            break;
        case 'contact':
            require('contact.php');
            showContactcontent();
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