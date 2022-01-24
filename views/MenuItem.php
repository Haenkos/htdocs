<?php

class MenuItem 
{
    public $menuItem;

    public function __construct($page, $label, $loggedInUser = '')
    {
        $this->menuItem = "<li><a href='/index.php?page=".$page."'>".$label." ". $loggedInUser."</a></li>"; //TODO: figure out how to handle the space when notLoggedIn
    }

    public function showMenuItem()
    {
        echo $this->menuItem;
    }
}