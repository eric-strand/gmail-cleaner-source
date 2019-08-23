<?php
require('conn.php');
require('classes/Accounts.php');

if(isset($_POST['loginBtn'])){
    
    $gmail = $_POST['inputGmail'];
    $passwordAttempt = $_POST['inputPassword'];
    
    $sql = "SELECT id, gmail, password FROM accounts WHERE gmail = :gmail";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':gmail', $gmail);
    
    $stmt->execute();
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //If $row is FALSE.
    if($user === false){
        die('Incorrect username / password combination!');
    } else{
       
        $validPassword = password_verify($passwordAttempt, $user['password']);

        if($validPassword){
            
            $account->createCookie($gmail);
            $account->createSession(true);
            header('Location: templates/platform.html.php');
            exit;
            
        } else{
            die('Incorrect username / password combination!');
        }
    }
    
}
