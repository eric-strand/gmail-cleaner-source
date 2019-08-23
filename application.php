<?php
require_once __DIR__.'/vendor/autoload.php';

session_start();

$client = new Google_Client();
$client->setAuthConfig('client_secret.json');
$client->addScope(Google_Service_Gmail::MAIL_GOOGLE_COM, Google_Service_Gmail::GMAIL_MODIFY, Google_Service_Gmail::GMAIL_LABELS );


if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
  
    header("Location: app.php");
  
    /*function createLabel($service, $user, $new_label_name) {
      
      $label = new Google_Service_Gmail_Label();
      $label->setLabelListVisibility("labelShow");
      $label->setMessageListVisibility("show");
      $label->setName($new_label_name);
      
    try {
      
        $label = $service->users_labels->create($user, $label);
        $labelId = $label->getId();
        print 'Label with ID: ' . $label->getId() . ' created.';
        }catch (Exception $e) {
        print 'An error occurred: ' . $e->getMessage();
      }
      return $label;
      return $labelId;
    } */
    
  /*function createFilter($filterUser, $newlabelId, $newGmail) {
      
          $filter = new Google_Service_Gmail_Filter([
          'criteria' => [
            'query' => 'unsubscribe'
            ],
            
            'action' => [
              'addLabelIds' => [$newlabelId]
            ]
            ]);
      
      try {
        
            $filter = $newGmail->users_settings_filters->create($filterUser, $filter);          
            print 'Worked';
            
            }catch (Exception $e) {
                print 'An error occurred: ' . $e->getMessage();
            }
    }

    
  
  createLabel(new Google_Service_Gmail($client), 'me', 'Gmail Cleaner Test32');
  //createFilter('me', $labelId, new Google_Service_Gmail($client)); 
*/  

} else {
  $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php';
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}