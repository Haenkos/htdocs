<?php

class MenuItem 
{
    public $menuItem;

    public function __construct($page, $label, $loggedInUser = '')
    {
        /* JH: Het idee van een menuItem als class hebben, is dat je later nog kan bepalen hoe je deze renderd, dus als HTML of als XML, of als JSON, daarvoor worden alle losse onderdelen in de class opgeslagen en pas bij het showMenuItem() omgezet in een HTML string */
        $this->menuItem = "<li><a href='/index.php?page=".$page."'>".$label." ". $loggedInUser."</a></li>"; //TODO: figure out how to handle the space when notLoggedIn /* JH TIP: Gebruik (empty($loggedInUser) ? '' : ' ' . $logggedInUser) */
    }

    public function showMenuItem()
    {
        echo $this->menuItem;
    }
}