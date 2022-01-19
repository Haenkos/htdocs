<?php
require_once 'Basic_Doc.php';

class HomeDoc extends BasicDoc
{
    public function __construct($data)
    {
        parent::__construct($data);
    }

    protected function mainContent()
    {
        echo "<div>";
        echo "<p>Welkom op Haenkos' Webshop voor Sleutelbosringen!</p>";
        echo "<ul>";
        echo "<li>Gewone ringen</li>";
        echo "<li>RVS ringen</li>";
        echo "<li>Gouden ringen</li>";
        echo "<li>...en nog veel meer!</li>";
        echo "</ul>";
        echo "</div>";
    }
}