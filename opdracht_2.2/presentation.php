<?php
    function showResponsePage($data, $page) 
    {

        beginDocument(); 
        showHeadSection(); 
        showBodySection($page, $data); 
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
    
    function showBodySection($page, $data) 
    { 
       echo '    <body>' . PHP_EOL;
       debugData($page, $data);
       showHeader($page);
       showMenu(); 
       showContent($page, $data); 
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
    
    function showContent($page, $data) 
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
                showContactcontent($data);
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

    function debugData($page, $data) {

        echo '<div>
                <p>$_GET: '; var_dump($_GET); echo '</p>
                <p>$_POST: '; var_dump($_POST); echo '</p>
                <p>$page = '.$page.'</p>
                <p>$data: '; var_dump($data); echo '</p>
            </div>';
    }
?>