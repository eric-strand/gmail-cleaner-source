<?php

require_once __DIR__.'/vendor/autoload.php';

session_start();

$client = new Google_Client();
$client->setAuthConfig('client_secret.json');
$client->addScope(Google_Service_Gmail::MAIL_GOOGLE_COM);
$client->addScope(Google_Service_Gmail::GMAIL_MODIFY);
$client->addScope(Google_Service_Gmail::GMAIL_LABELS);
$client->addScope(Google_Service_Gmail::GMAIL_SETTINGS_BASIC);
$client->addScope(Google_Service_Gmail::GMAIL_READONLY);

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
  $gmail = new Google_Service_Gmail($client);



        $optParams = [];
        $optParams['maxResults'] = 10; // Return Only 5 Messages
        $optParams['labelIds'] = $_SESSION["tester"]; // Only show messages in Inbox
        $messages = $gmail->users_messages->listUsersMessages('me',$optParams);
        
        $lists = $messages->getMessages();
        //$messageId = $lists[0]->getId(); 
        
        $title = array();
        $from = array();


        foreach($lists as $list){
            $messageId = $list->getId(); 
            
            $optParamsGet = [];
            $optParamsGet['format'] = 'full'; // Display message in payload
            $message = $gmail->users_messages->get('me',$messageId,$optParamsGet);
            $messagePayload = $message->getPayload();
            $headers = $message->getPayload()->getHeaders();
            $parts = $message->getPayload()->getParts();
            
            array_push($from, $headers[4]->value);
            array_push($title, $headers[3]->value);
          
        }
        
        
        $i=0;
        $j=0;
        foreach($from as $_from) {
          $_SESSION["subject"][$i++] = $_from;
        
        } 
        
        foreach($title as $_title) {
          $_SESSION["from"][$j++] = $_title;
        }
        
        




















/*$body = $parts[0]['body'];
        $rawData = $body->data;
        $sanitizedData = strtr($rowData,'-_', '+/');
        $decodedMessage = base64_decode($sanitizedData); */
        
        /*if($headers->name=="From") {  
          $from = $headers->value;
          var_dump($from);
        }*/




/*function listMessages($__service, $__userId) {
  $pageToken = NULL;
  $messages = array();
  $opt_param = array();
  $opt_param['labelIds'] = $_SESSION['tester'];
  try {
      $messagesResponse = $__service->users_messages->listUsersMessages($__userId, $opt_param);
      if ($messagesResponse->getMessages()) {
        $messages = array_merge($messages, $messagesResponse->getMessages());
        $pageToken = $messagesResponse->getNextPageToken();
      }
    } catch (Exception $e) {
      print 'An error occurred: ' . $e->getMessage();
    }

  return $messages;
}

listMessages($gmail, "me"); */




/*
function getMessage($service, $userId, $messageId) {
  try {
    $_message = $service->users_messages->get($userId, $messageId);
    
    $part = $_message->payload['modelData']['headers'][0]['value']; 
    print htmlentities($part);
    
    return $_message;
  } catch (Exception $e) {
    print 'An error occurred: ' . $e->getMessage();
  }
}

foreach ($messages as $__message) { 
    getMessage($gmail, "me", $__message);
}*/


} else {
  $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php';
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}
