<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
    	
    	<form class="shadow w-450 p-3" 
    	      action="php/signup.php" 
    	      method="post">

    		<h4 class="display-4  fs-1">CREATE ACCOUNT</h4><br>
    		<?php if(isset($_GET['error'])){ ?>
    		<div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
			</div>
		    <?php } ?>

		    <?php if(isset($_GET['success'])){ ?>
    		<div class="alert alert-success" role="alert">
			  <?php echo $_GET['success']; ?>
			</div>
		    <?php } ?>
		  <div class="mb-3">
		    <label class="form-label">First Name:</label><br>
		    <input type="text" 
		           class="form-control"
		           name="fname">
		  </div>

          <div class="mb-3">
		    <label class="form-label">Last Name:</label><br>
		    <input type="text" 
		           class="form-control"
		           name="lname">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Email:</label><br>
		    <input type="email" 
		           class="form-control"
		           name="email">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Mobile Number:</label><br>
		    <input type="text" 
		           class="form-control"
		           name="mobile_num">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Password:</label><br>
		    <input type="password" 
		           class="form-control"
		           name="pass">
		  </div>
		  
		  <button type="submit" class="btn btn-primary">Sign Up</button>
		  <p>Already have an account? <a href="login.php" class="link-secondary">Login</a></p>
		</form>
    </div>
</body>
</html>
