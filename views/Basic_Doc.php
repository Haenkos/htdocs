<?php
require_once 'Html_Doc.php';

class BasicDoc extends HtmlDoc
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    protected function title()
    {
        echo "<title>Welkom op: " . $this->model->page . "</title>";
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
        echo "<h1>".ucfirst($this->model->page)."</h1>";
        echo "</header>";
    }

    private function mainMenu()
    {
        echo '<div class="menus">';
        echo '<nav class="nav_menu">';
        echo '<ul>';
        foreach ($this->model->menu as $menuItem)
        {
            $menuItem->showMenuItem();
        }
        echo '</ul>';
        echo '</nav>';
        echo '</div>';
    }

    protected function mainContent()
    {
        echo "<p>Main content placeholder, page = " . $this->model->page."</p>";
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