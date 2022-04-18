<?php
namespace classes\view;
require_once $_SERVER['DOCUMENT_ROOT'] . '/AutoLoader.php';
include_once '../../header.php';
include_once '../../securePage.php';
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
 * 1. Product Catalog Page (Initial Page)
 * 2.
 * 3.
 * ---------------------------------------------------------------
 -->

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel=stylesheet href="../../css/post_entries.css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
	<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script>
$(document).ready( function () {
	$('#post_entries').DataTable();
} );
</script>

<title>Amazing Store</title>
</head>
<body>

<?php
require_once '../../util_funcs.php';
require_once '../../_main_menu.php';
?>

<div class="container">

    <form action="../controller/ProductSearchHandler.php" method="POST">
		<div align="center">
		    <h1>Product Search</h1>
		    <p>Enter Search Criteria - Leave blank for all products.</p>
		    <hr>
		</div>

        <div class="row">
        	<div class="col"></div>
        	<div class="col-4">
                <div class="input-group mb-43">
                    <div class="input-group-prepend">
                	    <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                    <input type="text" class="form-control" placeholder="Enter search criteria" name="SearchPattern" id="SearchPattern" aria-describedby="basic-addon1">
                </div>
        	</div>
        	<div class="col"></div>
        </div>
	</form>

<?php
    include ('../view/_displayAllProducts.php');
?>

</div>

</body>
</html>
