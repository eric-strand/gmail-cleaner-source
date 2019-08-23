<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign up page - Gmail Subscription Cleaner</title>
    
    <!-- CSS LINKS -->
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap-reboot.min.css" type="text/css" />
    <link rel="stylesheet" href="../../css/register.css" type="text/css" />
    <link rel="stylesheet" href="../../css/index.css" type="text/css" />
    
    <!-- JS validator script. Should stay in head tag -->
    <script src="../../js/gen_validatorv4.js" type="text/javascript"></script>
</head>

<body>
  
  <header>
      <div class="overlay"></div>
      <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
        <source src="../../video/gmail-scroll.mp4" type="video/mp4">
      </video>
      <div class="container h-100">
        <div class="d-flex text-center h-100">
          <div class="my-auto w-100 text-white">
            <h1 class="display-4 video-title video-register-title">Please sign up to contiue..</h1>
          </div>
        </div>
      </div>
    </header>


    <section class="my-5">
      <div class="container">
        <div class="row">
          <div class="col-md-8 mx-auto main">
            <h1>Sign up now!</h1>
            
                <form id="register" action="../register.php" method="post" enctype="multipart/form-data">
                  
                  <div class="form-group">
                    <label for="inputGmail">Gmail address</label>
                    <input name="inputGmail" type="email" class="form-control" id="inputGmail" aria-describedby="emailHelp" placeholder="Enter Gmail">
                    <small id="emailHelp" class="form-text text-muted">Make sure you input a Gmail adress..</small>
                  </div>
                  
                   <div class="form-group">
                    <label for="inputName">Full name</label>
                    <input name="inputName" type="text" class="form-control" id="inputName" placeholder="Name">
                  </div>
                  
                  <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input name="inputPassword" type="password" class="form-control" id="inputPassword" placeholder="Password">
                  </div>
                  
                  <label for="inputGroupFile">Upload profile picture</label> 
                  <div class="input-group mb-3">
                    <div class="custom-file">
                      <input name="photo" type="file" class="custom-file-input" id="inputGroupFile" aria-describedby="inputGroupFile">
                      <label class="custom-file-label" for="inputGroupFile">Choose file</label>
                    </div>
                  </div>
                  
                  <button name="registerBtn" type="submit" class="btn btn-outline-primary">Sign up</button>
                </form>
                
          </div>
        </div>
      </div>
    </section>


<!-- JS LINKS -->
<script type="text/javascript" src="../../../node_modules/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="../../../node_modules/popper.js/dist/umd/popper.min.js"></script>
<script type="text/javascript" src="../../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="../../js/register.js"></script>
</body>
</html>