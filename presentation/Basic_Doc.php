<?php
require_once 'Html_Doc.php';

class BasicDoc extends HtmlDoc
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    protected function title()
    {
        echo "<title>Welkom op: " . $this->data['page'] . "</title>";
    }

    private function metaAuthor()
    {
        echo "<meta name='author' content='Matthijs van Dijk'>";
    }

    private function cssLinks()
    {
        echo "<link rel='stylesheet' type='text/css' href='/css/styles.css'>";
    }

    private function bodyHeader()
    {
        echo "<header>\n";
        echo "<h1>".ucfirst($this->data['page'])."</h1>";
        echo "</header>";
    }

    private function mainMenu()
    {
        require_once "presentation.php";

        showMenu(); //TODO: make menu in this class using menuItemsArray
    }

    protected function mainContent()
    {
        echo "<p>Main content placeholder, page = " . $this->data['page']."</p>";
    }

    private function bodyFooter()
    {
        echo "<footer>";
        echo "<p>&copy; Matthijs van Dijk, 2021</p>";
        echo "</footer>";
    }

    protected function headContent()
    {
        $this->title();
        $this->metaAuthor();
        $this->cssLinks();
    }

    protected function bodyContent()
    {
        $this->bodyHeader();
        $this->mainMenu();
        $this->mainContent();
        $this->bodyFooter();
    }
}