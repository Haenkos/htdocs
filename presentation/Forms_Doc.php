<?php
require_once 'Basic_Doc.php';
require_once 'C:\Bitnami\wampstack-8.0.13-0\apache2\htdocs\io\page_request_handler.php';

abstract class FormsDoc extends BasicDoc
{
    public function __construct($data)
    {
        parent::__construct($data);
    }

    protected function hiddenInput($name, $value)
    {
        $this->inputField('hidden', $name, $value);
    }

    protected function dropDownMenu($name, $optionsArray, $errorMessage = '') // gebruik voor genders define('GENDERS', array("dhr" => "Dhr.", "mvr" => "Mvr.", "geen" => "Anders/geen"));
    {
        $this->labelOpen($name);
        echo "<select id='$name' name='$name'>";
        $this->generateOptions($optionsArray);
        echo "</select>";
        $this->errorField($errorMessage);
        $this->labelClose();

    }

    protected function textInput($name, $value, $errorMessage = '')
    {
        $this->labelOpen($name);
        $this->inputField('text', $name, $value);
        $this->errorField($errorMessage);
        $this->labelClose();
    }

    protected function radioButtonGroup($name, $valuesArray, $errorMessage = '')
    {
        $class = $name."_radioButtons";

        echo "<div class='$class'>";

        foreach($valuesArray as $value)
        {
            $this->radioButton($name, $value);
        }

        $this->errorField($errorMessage);

        echo "</div>";
    }

    private function radioButton($name, $value)
    {
        $id = "radio_".$value;

        if ($this->data[$name] == $value)
        {
            $checked = true;
        }
        else
        {
            $checked = false;
        }

        $this->labelOpen($id);
        $this->inputField('radio', $name, $value, $id, $checked);
        echo ucfirst($value);
        $this->labelClose();
    }

    protected function textArea($name, $content, $errorMessage = '', $placeholder = '', $rows = 10, $cols = 57)
    {
        $this->labelOpen($name);
        echo "<textarea id='$name' name='$name' rows='$rows' cols='$cols' placeholder='$placeholder'>";
        echo $content;
        echo "</textarea><br>";
        $this->errorField($errorMessage);
        $this->labelClose();
    }


    protected function submitButton($buttonLabel = 'Submit')
    {
        echo "<div>";
        $this->labelOpen($buttonLabel);
        echo "<button type='submit' id='$buttonLabel'>";
        echo "$buttonLabel";
        echo "</button>";
        $this->labelClose();
        echo "</div>";
    }

    protected function formStart ($action, $method)
    {
        echo "<form action='$action' method='$method'>";
    }

    protected function formEnd()
    {
        echo "</form>";
    }

    private function labelOpen($for)
    {
        echo "<div id='$for'>";
        echo "<label for='$for'>";
    }

    private function labelClose()
    {
        echo "</label>";
        echo "</div>";
    }

    private function inputField($type, $name, $value, $id = Null, $checked = false)
    {
        if(is_null($id))
        {
            $id = $name;
        }

        echo "<input type='$type' id='$id' name='$name' value='$value' ";
        if ($checked)
        {
            echo "checked";
        }

        echo ">";
    }

    private function errorField($errorMessage)
    {
        echo "<span class='error'>$errorMessage</span>";
    }

    private function generateOptions($array) { // gebruik voor genders define('GENDERS', array("dhr" => "Dhr.", "mvr" => "Mvr.", "anders/geen" => "Anders/geen"));
        foreach($array as $value => $option) {
            echo "<option value='".$value."'>".$option."</option><br>";
        }
    }


}