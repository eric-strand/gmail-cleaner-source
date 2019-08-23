<?php 
//session_start();
require('php/classes/Accounts.php');

$account->checkExistingUser();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gmail Subscription Cleaner</title>
    
    <!-- CSS LINKS -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap-reboot.min.css" type="text/css" />
    <link rel="stylesheet" href="css/index.css" type="text/css" />
</head>
<body>
  
    <header>
      <div class="overlay"></div>
      <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
        <source src="video/gmail-scroll.mp4" type="video/mp4">
      </video>
      <div class="container h-100">
        <div class="d-flex text-center h-100">
          <div class="my-auto w-100 text-white">
            <h1 class="display-4 video-title"><strong>Free</strong> Gmail Cleaner Tool</h1>
            <h2 class="video-subtitle">Get rid of those anoying subscription emails!</h2>
            <div>
                <a href="php/templates/register.html.php" class="btn btn-outline-success btn-lg video-btn" role="button" aria-pressed="true">Try it now!</a>
            </div>
            <div>
                <a href="php/templates/login.html.php" class="already-account">Already have an account?</a>
            </div>
          </div>
        </div>
      </div>
    </header>
    
    <section class="my-5">
      <div class="container">
        <div class="row">
          <div class="col-md-8 mx-auto">
            <p><strong>(En text som beskriver tjänsten)</strong> consectetur adipiscing elit. Nunc dictum tempus hendrerit. Sed aliquam justo eget porta tempor. Quisque tincidunt nunc eros, id malesuada dolor molestie ac.</p>
            <p>sit amet, consectetur adipiscing elit. Nunc dictum tempus hendrerit. Sed aliquam justo eget porta tempor. Quisque tincidunt nunc eros, id malesuada dolor molestie ac.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dictum tempus hendrerit. Sed aliquam justo eget porta tempor. Quisque tincidunt nunc eros, id malesuada dolor molestie ac.</p> 
              Created by <a href="#">Eric Strand</a>
            </p>
          </div>
        </div>
      </div>
    </section>



<!-- JS LINKS -->
<script type="text/javascript" src="../node_modules/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
<script type="text/javascript" src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>