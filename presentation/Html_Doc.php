<?php

class HtmlDoc
{

    private function beginDoc()
    {
        echo "<!DOCTYPE html>\n<html lang='nl'>\n";
    }

    private function beginHead()
    {
        echo "<head>\n";
    }

    protected function headContent()
    {
        echo "<title>Title</title>\n";
    }

    private function endHead()
    {
        echo "</head>";
    }

    private function beginBody()
    {
        echo "<body>";
    }

    protected function bodyContent()
    {
        echo "<h1>Body content</h1>\n";
    }

    private function endBody()
    {
        echo "</body>";
    }

    private function endDoc()
    {
        echo "</html>";
    }

    public function show()
    {
        $this->beginDoc();
        $this->beginHead();
        $this->headContent();
        $this->endHead();
        $this->beginBody();
        $this->bodyContent();
        $this->endBody();
        $this->endDoc();
    }
}

