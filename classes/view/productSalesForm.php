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
 * 1. Product Sales Form
 * 2. Calls productSalesHandler.php
 * 3. Admin Report Functionality
 * ---------------------------------------------------------------
 -->

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Amazing Store</title>
  </head>
  <body>

<?php
require_once '../../_main_menu.php';
?>

<div class="container">

	<form action="../controller/ProductSalesReportHandler.php" method="GET">
		<div align="center">
    	    <h1>Product Sales Report</h1>
    	    <p>Please fill in the date range for the report.</p>
    	    <hr>
	    </div>
		<div class="row">
			<div class="col"></div>
			<div class="col-3">
				<div class="form-floating mb-3 mt-3">
				  <input type="date" class="form-control" id="startDate" name="startDate">
				  <label for="startDate" class="form-label">Start Date:</label>
				</div>
			</div>
			<div class="col"></div>
		</div>
		<div class="row">
			<div class="col"></div>
			<div class="col-3">
				<div class="form-floating mb-3 mt-3">
				  <input type="date" class="form-control" id="endDate" name="endDate">
				  <label for="endDate" class="form-label">End Date:</label>
				</div>
			</div>
			<div class="col"></div>
		</div>
		<div align='center'>
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</form>

</div>

</body>
</html>
