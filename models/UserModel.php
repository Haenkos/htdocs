<?php
require 'PageModel.php';

class UserModel extends PageModel
{
    public $email = '';
    public $name = '';
    public $password = '';
    private $userID = '';
    public $valid = '';
    public $contact = array();
}