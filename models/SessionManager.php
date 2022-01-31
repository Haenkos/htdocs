<?php

class SessionManager
{
    public  function loginUser($name, $userID) 
    {
        $_SESSION['userName'] = $name;
        $_SESSION['userID'] = $userID;
    }
    
    public function isUserLoggedIn() 
    {
        if (isset($_SESSION['userName'])) 
        {
            //console_log('Identified a user is logged in from checkAnyLoggedIn');
            return true;
        } 
        else 
        {
            //console_log('Identified NO user is logged in from checkAnyLoggedIn');
            return false;
        }
    }
    
    public function getLoggedInUser() 
    {
        if (isset($_SESSION['userName']))
        {
            return $_SESSION['userName'];
        }
        else
        {
            console_log('no user logged in');
            return false;
        }
    }

    public function getUserID()
    {
        return $_SESSION['userID'];
    }
    
    public function logOutUser() 
    {
        unset($_SESSION);
        session_destroy();
    }

    public function updateCart($itemID)
    {
        if(!isset($_SESSION['cart'])) 
        {
            $_SESSION['cart'] = array(
                $itemID => 1
            );
        } 
        elseif (array_key_exists($itemID, $_SESSION['cart'])) 
        {
            $_SESSION['cart'][$itemID] += 1;
        } 
        else 
        {
            $_SESSION['cart'][$itemID] = 1;
        }

        
    }

    public function getCart() 
        {
            if (!empty($_SESSION['cart'])) 
            {
                return $_SESSION['cart'];
            } 
            else 
            {
                return false;
            }
        }
        
    public function emptyCart() 
        {
            unset($_SESSION['cart']);
        }
}