<?php
namespace classes\database;
require_once $_SERVER['DOCUMENT_ROOT'] . '/AutoLoader.php';
?>

<!DOCTYPE html>
<html>
	<!--  the head section -->
	<head>
		<title>Database Error</title>
	</head>

	<!-- the body section -->
	<body>
	<main>
		<h1>Database Error</h1>
		<p>There as an error connecting to the database.</p>
		<p>The database must be installed and running.</p>
		<p>Contact Administrator for assistance.</p>
		<p>Error message: <?php echo $error_message; ?></p>
	</main>
	</body>


</html>