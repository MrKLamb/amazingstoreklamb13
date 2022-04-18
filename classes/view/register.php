<?php
namespace classes\view;
require_once $_SERVER['DOCUMENT_ROOT'] . '/AutoLoader.php';
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
 * 1. Registration Form (register.html)
 * 2. Calls registerHandler.php
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
    <title>Amazing Store</title>
</head>
<body>

<?php
require_once '../../_main_menu.php';
?>

	<div class="container">

		<form action="../controller/registerHandler.php" method="POST">
			<div align="center">
    		    <h1>Registration Form</h1>
    		    <p>Please fill in this form to create an account.</p>
    		    <hr>
			</div>

        	<h3>Name:</h3>
			<div class="row">
				<div class="col-1"></div>
				<div class="col-5">
					<div class="form-floating mb-3 mt-3">
            		    <input type="text" class="form-control"  placeholder="Enter first name" name="FirstName" id="FirstName" required>
            		    <label for="FirstName" class="form-label">First Name:</label>
					</div>
				</div>
				<div class="col-5">
					<div class="form-floating mb-3 mt-3">
            		    <input type="text" class="form-control"  placeholder="Enter last name" name="LastName" id="LastName" required>
            		    <label for="LastName" class="form-label">Last Name:</label>
					</div>
				</div>
				<div class="col-1"></div>
			</div>

		<hr>
        <h3>Contact Information:</h3>
			<div class="row">
				<div class="col-1"></div>
				<div class="col-5">
					<div class="form-floating mb-3 mt-3">
            		    <input type="email" class="form-control" placeholder="Enter email address" name="Email" id="Email" required>
            		    <label for="Email" class="form-label">Email:</label>
					</div>
				</div>
				<div class="col-5">
					<div class="form-floating mb-3 mt-3">
            		    <input type="tel" class="form-control" placeholder="(999) 999-9999" name="Mobile" id="Mobile" pattern="\([0-9]{3}\) [0-9]{3}-[0-9]{4}" required>
            		    <label for="Mobile" class="form-label">Mobile:</label>
					</div>
				</div>
				<div class="col-1"></div>
			</div>
		<hr>

        <h3>Identification:</h3>
			<div class="row">
				<div class="col-1"></div>
				<div class="col-5">
					<div class="form-floating mb-3 mt-3">
            		    <input type="password" class="form-control" placeholder="Password Length 8 minimum" name="Password" id="Password" pattern=".{8,}" required>
            		    <label for="Password" class="form-label">Password:</label>
					</div>
				</div>
				<div class="col-3">
					<div class="form-floating mb-3 mt-3">
            		    <input type="date" class="form-control" placeholder="Enter birthdate" name="Birthdate" id="Birthdate" required>
            		    <label for="Birthdate" class="form-label">Birth Date:</label>
					</div>
				</div>
				<div class="col-2">
					<div class="form-floating mb-3 mt-3">
						<select class="form-select" aria-label="Default select example" name="Gender" id="Gender" required>
            				<option value="0">Male</option>
            				<option value="1">Female</option>
            			</select>
            		    <label for="Gender" class="form-label">Sex:</label>
					</div>
				</div>
				<div class="col-1"></div>
			</div>

    		<div align='center'>
    			<button type="submit" class="btn btn-primary">Register</button>
    		</div>
		    <hr>
		</form>
	</div>

</body>
</html>