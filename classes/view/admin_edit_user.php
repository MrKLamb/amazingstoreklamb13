<?php
namespace classes\view;
use classes;
require_once $_SERVER['DOCUMENT_ROOT'] . '/AutoLoader.php';
session_start();
require_once '../../util_funcs.php';
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
 * 1. Admin User Maintenance Listing
 * 2.
 * 3.
 * ---------------------------------------------------------------
 -->

<html lang='en'>
<head>
    <!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <!-- Bootstrap CSS -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
    <link rel=stylesheet href="../../css/post_entries.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <title>Amazing Store</title>
</head>
<body>

<?php require_once '../../_main_menu.php';?>

<div class="container">

	<div align="center">
    	<h1>User Administration</h1>
		<form action="../view/register.php" method="GET">
    		<div align='center'>
    			<button type="submit" class="btn btn-primary">Create New User</button>
    		</div>
		</form>
		<hr>
	</div>

<script>
$(document).ready( function () {
	$('#post_entries').DataTable();
} );
</script>

<?php
    $service = new classes\business\UserBusinessService();
 	$users = $service->getAllUsers();
    include('_displayAllUsers.php');
?>

</div>

</body>
</html>
