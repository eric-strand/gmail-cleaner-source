<?php
// BUG FIX --------> Error array on everything here!! 
session_start();
require 'classes/Accounts.php';
require __DIR__ .  '/lib/password.php';
require ('conn.php');
 
 
if(isset($_POST['registerBtn'])){
    
    
    $success = false;
    
    $max_file_size = 1048576;
    $file_types = array('gif', 'jpg', 'png');
    
    $upload_dir = realpath(dirname(__FILE__)) . '../../img/client_uploads/';
    
    $file_tmp = $_FILES['photo'] ['tmp_name'];
    $file_name = $_FILES['photo'] ['name'];
    $file_size = $_FILES['photo'] ['size'];
    $file_uniq = uniqid();
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
        
    $file = $upload_dir . $file_uniq . '.' . $file_ext;
        
        $error = '';
        
        if(!is_uploaded_file($file_tmp)) {
            $error = 'Ingen fil har valts';
            header('Location: templates/register.html.php');
        }
            
        if(!getimagesize($file_tmp)) {
            $error = 'Uppladdad fil är inte en bild';
            header('Location: templates/register.html.php');
        }
            
        if($file_size > $max_file_size) {
            $error = 'Filstorlek över 1 MG';
            header('Location: templates/register.html.php');
        }
            
        if(!in_array($file_ext, $file_types)) {
                $error = 'Ej gitlig filtyp';
                header('Location: templates/register.html.php');
        }
            
        if(file_exists($file)) {
            $error = 'Fil existerar redan';
            header('Location: templates/register.html.php');
        }
            
        if($error == '') {
            if(move_uploaded_file($file_tmp, $file)) {
                $success = true;
            }
            else {
                $error = 'Fel inträffade vid sparande av fil';
                header('Location: templates/register.html.php');
            }
        }
        
        
    $gmail = !empty($_POST['inputGmail']) ? $_POST['inputGmail'] : null;
    $name = !empty($_POST['inputName']) ? $_POST['inputName'] : null;
    $pass = !empty($_POST['inputPassword']) ? trim($_POST['inputPassword']) : null;
    $img = $file_uniq;
    $imgType = $file_ext;
    
    
    $sql = "SELECT COUNT(gmail) AS num FROM accounts WHERE gmail = :gmail";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':gmail', $gmail);
    
    $stmt->execute();
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Add error display - for now it just dies
    if($row['num'] > 0){
        die('That gmail has already been registerd!');
    }
    
    $passwordHash = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));
    
    
    $sql = "INSERT INTO accounts (gmail, name, password, img, img_type) VALUES (:gmail, :name, :password, :img, :img_type)";
    $stmt = $pdo->prepare($sql);
    
    
    $stmt->bindValue(':gmail', $gmail);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':password', $passwordHash);
    $stmt->bindValue(':img', $img);
    $stmt->bindValue(':img_type', $imgType);
 
    $result = $stmt->execute();
    

        
    
    if($result && $success) {
        
        $account->createCookie($gmail);
        $account->createSession(true);
        header('Location: templates/platform.html.php');
        
    }
    
}