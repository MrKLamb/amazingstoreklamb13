<?php
namespace classes\view;
require_once '../..' . '/AutoLoader.php';
?>

<!DOCTYPE html>

<!--
 * ---------------------------------------------------------------
 * Name      : Kelly E. Lamb
 * Date      : 2022-03-28
 * Class     : CST-323 Cloud Computing
 * Professor : Bradley Mauger PhD
 * Assignment: Activity Application
 * Disclaimer: This is my own work
 * ---------------------------------------------------------------
 * Description:
 * 1. Login Form (login.html)
 * 2. Calls loginHandler.php
 * 3. Added Main Menu requirement
 * ---------------------------------------------------------------
 -->

<html lang='en'>
 <head>
    <!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <!-- Bootstrap CSS -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
	<link rel=stylesheet href="css/post_entries.css" />
	<title>Amazing Store</title>
</head>
<body>

<?php
require_once '../../_main_menu.php';
?>

<div class="container">
		<form action="../controller/loginHandler.php" method="POST">
			<div align="center">
    		    <h1>Login Form</h1>
    		    <p>Please fill in this form to login to the application.</p>
    		    <hr>
			</div>
			<div class="row">
				<div class="col"></div>
				<div class="col-3">
					<div class="form-floating mb-3 mt-3">
        			    <input type="email" class="form-control" placeholder="Enter email address" name="Email" id="Email" required>
        			    <label for="Email" class="form-label">Email:</label>
					</div>
				</div>
				<div class="col"></div>
			</div>
			<div class="row">
				<div class="col"></div>
				<div class="col-3">
					<div class="form-floating mb-3 mt-3">
					    <input type="password" class="form-control" placeholder="Password Length 8 minimum" name="Password" id="Password" pattern=".{8,}" required>
		    			<label for="Password" class="form-label">Password:</label>
					</div>
				</div>
				<div class="col"></div>
			</div>
    		<div align='center'>
    			<button type="submit" class="btn btn-primary">Login</button>
    		</div>
		</form>
	</div>

</body>
</html>