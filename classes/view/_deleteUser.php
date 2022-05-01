<?php
namespace classes\view;
require_once '../..' . '/AutoLoader.php';
session_start();
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
 * 1. Delete User (_deleteUser.php)
 * 2. Simple place holder
 * 3. TO DO: Add card/image/detail
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

<?php require_once('../../util_funcs.php');?>
<?php require_once '../../_main_menu.php';?>
<?php
$uModel = $user;
$rArray = $roles;
$genders = array("Male", "Female");
?>

	<div class="container">
    	<form action="../controller/UserDeleteHandler.php" method="POST">
     		<div align="center">
    		    <h1>Delete User</h1>
    		    <p>Confirm Delete.</p>
    		    <hr>
    		</div>

        	<h3>Name:</h3>
			<div class="row">
				<div class="col-1"></div>
				<div class="col-5">
					<div class="form-floating mb-3 mt-3">
            		    <input type="text" class="form-control"  placeholder="Enter first name" name="FirstName" id="FirstName"
            		    disabled
            		    <?php echo 'value="' . $uModel->getFirst_name() . '"'; ?> >
            		    <label for="FirstName" class="form-label">First Name:</label>
					</div>
				</div>
				<div class="col-5">
					<div class="form-floating mb-3 mt-3">
            		    <input type="text" class="form-control"  placeholder="Enter last name" name="LastName" id="LastName"
            		    disabled
            		    <?php echo 'value="' . $uModel->getLast_name() . '"'; ?> >
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
            		    <input type="email" class="form-control" placeholder="Enter email address" name="Email" id="Email"
            		    disabled
            		    <?php echo 'value="' . $uModel->getEmail() . '"'; ?> >
            		    <label for="Email" class="form-label">Email:</label>
					</div>
				</div>
				<div class="col-5">
					<div class="form-floating mb-3 mt-3">
            		    <input type="tel" class="form-control" placeholder="Enter mobile number" name="Mobile" id="Mobile"
            		    disabled
            		    <?php echo 'value="' . $uModel->getMobile() . '"'; ?> >
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
            		    <input type="password" class="form-control" placeholder="Password Length 8 minimum" name="Password" id="Password" pattern=".{8,}"
            		    disabled
            		    <?php echo 'value="' . $uModel->getPassword() . '"'; ?> >
            		    <label for="Password" class="form-label">Password:</label>
					</div>
				</div>
				<div class="col-3">
					<div class="form-floating mb-3 mt-3">
            		    <input type="date" class="form-control" placeholder="Enter birthdate" name="Birthdate" id="Birthdate"
            		    disabled
            		    <?php echo 'value="' . $uModel->getBirthdate() . '"'; ?>>
            		    <label for="Birthdate" class="form-label">Birth Date:</label>
					</div>
				</div>
				<div class="col-2">
					<div class="form-floating mb-3 mt-3">
						<input type="text" class="form-control" name="Gender" id="Gender"
						disabled
						<?php echo 'value="' . $genders[$uModel->getGender()]  . '"'; ?> >
            		    <label for="Gender" class="form-label">Sex:</label>
					</div>
				</div>
				<div class="col-1"></div>
			</div>
			<div class="row">
				<div class="col"></div>
				<div class="col-3">
					<div class="form-floating mb-3 mt-3">
						<input type="text" class="form-control" name="UserRoleID" id="UserRoleID"
						disabled
						<?php echo 'value="' . $rArray[$uModel->getRole_id()-1]['ROLENAME']  . '"'; ?> >
            		    <label for="UserRoleID" class="form-label">Role:</label>
					</div>
				</div>
				<div class="col"></div>
			</div>
    		<div align='center'>
    			<button type="submit" class="btn btn-primary">Confirm Delete</button>
    		</div>
		    <hr>

			<input type="hidden"  name="UserID" id="UserID" <?php echo 'value="' . $uModel->getId() . '"'; ?> >
		</form>
	</div>

</body>
</html>
