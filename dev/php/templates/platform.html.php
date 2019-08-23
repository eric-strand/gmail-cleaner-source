<?php 
require('../conn.php');
session_start();
        
        $cookie = $_COOKIE['user'];
        // Av nån anledning var ja tvungen sätta den här, fixa sen.
        $query = "SELECT * FROM accounts";
        $query .= " WHERE gmail = $cookie ";
        
        try {
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $results = $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        
      
        
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Platform</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
        <link rel="stylesheet" href="https://rawgit.com/creativetimofficial/material-kit/master/assets/css/material-kit.css">
        
        <link rel="stylesheet" href="../../css/platform.css" type="text/css" />
</head>
<?php
foreach($results as $result){
?>
<body class="profile-page">
    <nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg "  color-on-scroll="100"  id="sectionsNav">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand">Gmail Cleaner Tool - User Platform</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="dropdown nav-item">
                      <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
                          <i class="material-icons">apps</i> Components
                      </a>
                      <div class="dropdown-menu dropdown-with-icons">
                        <a href="../index.html" class="dropdown-item">
                            <i class="material-icons">face</i> About Eric Strand
                        </a>
                        
                        <a href="#" class="dropdown-item">
                            <i class="material-icons">code</i> Source code 
                        </a>
                      </div>
                    </li>
      				<li class="nav-item">
      					<a class="nav-link" href="../logout.php">
      						<i class="material-icons">power_settings_new</i> Sign out
      					</a>
      				</li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="page-header header-filter" data-parallax="true"></div>
    <div class="main main-raised">
		<div class="profile-content">
            <div class="container">
                <div class="row">
	                <div class="col-md-6 ml-auto mr-auto">
        	           <div class="profile">
	                        <div class="avatar">
	                            <img src="<?php echo '../../img/client_uploads/'; echo $result['img'] . '.' . $result['img_type']; ?>" alt="Circle Image" class="img-raised rounded-circle img-fluid img-avatar">
	                        </div>
	                        <div class="name">
	                            <h3 class="title"><?php echo $result['name']; ?></h3>
						        <h6>Joined: <?php echo $result['registration_date']; ?></h6>
	                        </div>
	                    </div>
    	            </div>
                </div>
                <div class="description text-center">
                    <p><strong>En text som beskriver hur man använder tjänsten</strong> adipiscing elit. Ut nec sapien semper, euismod velit id, aliquet nisi. Donec id suscipit libero. Curabitur lectus nunc, vestibulum vitae massa at, tincidunt efficitur velit. Nunc tempor eros sit amet mi semper aliquam. Donec aliquam neque eget felis varius, id lobortis quam gravida. Morbi ac felis magna. Sed sollicitudin enim et ex ultricies porta. Quisque suscipit ultrices metus, semper semper erat luctus id. Aliquam sed porta arcu.</p>
                    <a href="../../../app.php" class="btn btn-success">Sign in to gmail</a>
                    <a href="" class="btn btn-danger ">Sign out of gmail</a>
                </div>
				<div class="row">
					<div class="col-md-6 ml-auto mr-auto">
                        <div class="profile-tabs">
                          <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#studio" role="tab" data-toggle="tab">
                                  <i class="material-icons">timeline</i>
                                   Graph
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#works" role="tab" data-toggle="tab">
                                  <i class="material-icons">inbox</i>
                                   Cleaner
                                </a>
                            </li>
                          </ul>
                        </div>
    	    	</div>
            </div>
        
          <div class="tab-content tab-space">
            <div class="tab-pane active text-center gallery" id="studio">
  				<div class="column">
  					<div class="d-flex justify-content-center">
                       <a class="nav-link" href="#works" role="tab" data-toggle="tab"><i class="material-icons">sentiment_dissatisfied</i></a>
                       <h5>Graph functionality will be implemented soon!</h5>
  					</div>
  					<div class="col-md-3 mr-auto">
  						
  					</div>
  				</div>
  			</div>
            <div style="border:1px solid #00bcd4; border-top:none;" class="tab-pane text-center gallery" id="works">
      			<div class="column">
      			    <a style="text-align:center;" href="../../../refresh.php" class="btn btn-info">Refresh Subscription list</a>
      				<div class="d-flex flex-column justify-content-center">
                      <table class="table table-condensed">
    <thead>
      <tr>
        <th>From (email deliverd by)</th>
        <th>Subject</th>
        <th>Quick remove</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $_SESSION["subject"][0]; ?></td>
        <td><?php echo $_SESSION["from"][0]; ?></td>
        <td><a href="" class="btn btn-danger">Unsubscribe</a></td>
      </tr>
      <tr>
        <td><?php echo $_SESSION["subject"][1]; ?></td>
        <td><?php echo $_SESSION["from"][1]; ?></td>
        <td><a href="" class="btn btn-danger">Unsubscribe</a></td>
      </tr>
      <tr>
        <td><?php echo $_SESSION["subject"][2]; ?></td>
        <td><?php echo $_SESSION["from"][2]; ?></td>
        <td><a href="" class="btn btn-danger">Unsubscribe</a></td>
      </tr>
      <tr>
        <td><?php echo $_SESSION["subject"][3]; ?></td>
        <td><?php echo $_SESSION["from"][3]; ?></td>
        <td><a href="" class="btn btn-danger">Unsubscribe</a></td> 
      </tr>
      <tr>
        <td><?php echo $_SESSION["subject"][4]; ?></td>
        <td><?php echo $_SESSION["from"][4]; ?></td>
        <td><a href="" class="btn btn-danger">Unsubscribe</a></td> 
      </tr>
      <tr>
        <td><?php echo $_SESSION["subject"][5]; ?></td>
        <td><?php echo $_SESSION["from"][5]; ?></td>
        <td><a href="" class="btn btn-danger">Unsubscribe</a></td> 
      </tr>
      <tr>
        <td><?php echo $_SESSION["subject"][6]; ?></td>
        <td><?php echo $_SESSION["from"][6]; ?></td>
        <td><a href="" class="btn btn-danger">Unsubscribe</a></td> 
      </tr>
      <tr>
        <td><?php echo $_SESSION["subject"][7]; ?></td>
        <td><?php echo $_SESSION["from"][7]; ?></td>
        <td><a href="" class="btn btn-danger">Unsubscribe</a></td> 
      </tr>
    </tbody>
  </table>
      			    </div>
  			</div>
            <div class="tab-pane text-center gallery" id="favorite">
      			<div class="column">
      				<div class="col-md-3 ml-auto">
      	
      				<div class="col-md-3 mr-auto">
      				 
      			    </div>
      			</div>
      		</div>
          </div>

        
            </div>
        </div>
	</div>
	
	<footer class="footer">
        <p>Made by <a href="#" target="_blank">Eric Strand TE16E</a></p>
    </footer> 
    
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../js/platform.js"></script> 

</body>
<?php } ?>
</html>