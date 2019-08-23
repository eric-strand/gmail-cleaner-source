<?php
/*
    OBS: denna kod är lite messy och konstig pga att gmail api PHP är i beta. Fråga mig för mer info
*/

require_once __DIR__.'/vendor/autoload.php';

session_start();

$client = new Google_Client();
$client->setAuthConfig('client_secret.json');
$client->addScope(Google_Service_Gmail::MAIL_GOOGLE_COM);
$client->addScope(Google_Service_Gmail::GMAIL_MODIFY);
$client->addScope(Google_Service_Gmail::GMAIL_LABELS);
$client->addScope(Google_Service_Gmail::GMAIL_SETTINGS_BASIC);
$client->addScope(Google_Service_Gmail::GMAIL_READONLY);
$client->addScope(Google_Service_Gmail::GMAIL_METADATA);

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
  $gmail = new Google_Service_Gmail($client);


  
    function createLabel($service, $user, $new_label_name) {
    $label = new Google_Service_Gmail_Label();
    $label->setName($new_label_name);
      try {
        
        // Create label
        $label = $service->users_labels->create($user, $label);
        
        // Create filter
        $criteria = new Google_Service_Gmail_FilterCriteria();
        $criteria->setQuery("unsubscribe");
        
        $action = new Google_Service_Gmail_FilterAction();
        $action->setAddLabelIds(array($label->getId()));
        
        $filter = new Google_Service_Gmail_Filter();
        $filter->setCriteria($criteria);
        $filter->setAction($action);
        
        $result = $service->users_settings_filters->create($user,$filter);
        
        // List label messages
        
        
      } catch (Exception $e) {
          print 'An error occurred: ' . $e->getMessage();
    }
    return $label;
  }

  // Create label
  createLabel($gmail,"me", "Gmail Cleaner");

  
  
  
  
  function listLabels($_service, $_userId) {
  $labels = array();

  try {
    $labelsResponse = $_service->users_labels->listUsersLabels($_userId);

    if ($labelsResponse->getLabels()) {
      $labels = array_merge($labels, $labelsResponse->getLabels());
    }

    foreach ($labels as $_label) {
      if($_label->getName() == "Gmail Cleaner") {
          $_SESSION["tester"] = $_label->getId();
      }
    }
  } catch (Excetion $e) {
    print 'An error occurred: ' . $e->getMessage();
  }
  return $labels;
}

  listLabels($gmail, "me");
  
  
  $_SESSION["gmail_logged_in"] = true;
  header("Location: dev/php/templates/platform.html.php");
  
  
} else {
  $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php';
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}






// -----------------------------------------------------------------------------------------------------------------------------------





// Inte bekväm att radera ännu
/*function createFilter($_service, $_user) {
    
        $criteria = new Google_Service_Gmail_FilterCriteria();
        $criteria->setQuery("unsubscribe");
        
        $action = new Google_Service_Gmail_FilterAction();
        $action->setAddLabelIds(array('Label_80'));
        
        $filter = new Google_Service_Gmail_Filter();
        $filter->setCriteria($criteria);
        $filter->setAction($action);
        
        try{
          $result = $_service->users_settings_filters->create($_user,$filter);
        } catch (Exception $d) {
          print 'An error occurred: ' . $d->getMessage();
        }
    return filter;
        
  }
  
  createFilter($gmail, "me");  */
