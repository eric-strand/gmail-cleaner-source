<?php
session_start();

class Accounts 
{
    public function createCookie($gmail)
    {
        $userInfo = $gmail;
        setcookie('user', json_encode($userInfo), time()+3600,"/");
        
    }
    
    public function unsetCookie()
    {
        unset($_COOKIE['user']);
    }
    
    public function createSession($bool = false)
    {
        $_SESSION['loggedin'] = $bool;
    }
    
    public function unsetSession() 
    {
        $_SESSION['loggedin'] = false;
    }
    
    public function checkExistingUser() 
    {
        $cookieData = json_decode($_COOKIE['user'], true);
        
        if($_SESSION['loggedin'] && isset($_COOKIE['user']) ) {
            
            header('Location: php/templates/platform.html.php');
        }
        
        if(isset($_COOKIE['user']) && !isset($_SESSION['loggedin'])) {
        
            $this->createSession(true);
            header('Location: php/templates/platform.html.php');
        }
        
        if(isset($_SESSION['loggedin']) && !isset($_COOKIE['user'])) {
            session_destroy();
            header('Location: index.php');
        }
    }
}

$account = new Accounts;
