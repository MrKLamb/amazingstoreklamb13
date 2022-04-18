<?php
namespace classes\view;
require_once $_SERVER['DOCUMENT_ROOT'] . '/AutoLoader.php';
?>

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
 * 1. AmazingStoreKLamb13 (_displayProductSalesReport.php) display report
 * 2. Reusable functions
 * ---------------------------------------------------------------
 -->


<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel=stylesheet href="../../css/main_nav.css" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel=stylesheet href="../../css/post_entries.css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
	<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
	<title>Amazing Store</title>
</head>
<body>

<?php require_once '../../_main_menu.php';?>

<script>
$(document).ready( function () {
	$('#post_entries').DataTable( {
        "order": [[ 5, "desc" ]]
    } );
} );
</script>

<div class="container">

<div align="center">
    <h1>Product Sales Report By Date Range</h1>
    <p>Date Range: <?php echo $start_date . " to " . $end_date; ?></p>
    <hr><br />
</div>

<table id="post_entries" class="display">
  <thead>
    <tr>
        <th>Name</th>
        <th>Address</th>
        <th>Date</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Ext. Total</th>
    </tr>
  </thead>
  <tbody>
<?php

if (isset($report))
{
    foreach($report as $p)
    {
        echo "  <tr>\n";
        echo "      <td>" . $p[0] . "</td>\n";
        echo "      <td>" . $p[1] . "</td>\n";
        echo "      <td>" . $p[2] . "</td>\n";
        echo "      <td>" . $p[3] . "</td>\n";
        echo "      <td align='right'>" . "$" . number_format($p[4], 2) . "</td>\n";
        echo "      <td align='right'>" . $p[5] . "</td>\n";
        echo "      <td align='right'>" . "$" . number_format($p[6], 2) . "</td>\n";
        echo "  </tr>\n";
	}
}


?>

  </tbody>
</table>
</div>
</body>
</html>
