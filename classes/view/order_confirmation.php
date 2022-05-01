<?php
namespace classes\view;
use classes;

require_once '../..' . '/AutoLoader.php';
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
 * 1. AmazingStoreKLamb13 display order confirmation
 * 2. Reusable functions
 * ---------------------------------------------------------------
 -->

<!DOCTYPE html>
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
	<style>
        table, td, th {
          border: 1px solid black;
        }

        table {
          width: 80%;
          border-collapse: collapse;
        }
    </style>
</head>
<body>

<?php
require_once '../../util_funcs.php';
require_once '../../_main_menu.php';
?>

<div align="center" style="background-color: white;">
<br /><br /><hr><br /><h1>Order Confirmation</h1>
<br /><hr><br /><br />

<table>
<thead>
<tr>
<th width="40%">Billing Address:</th>
<th width="40%">Shipping Address:</th>
<th width="20%">Order Information:</th>
</tr>
</thead>
<tbody>
<tr>
<?php
$ba = $billAddress;
$sa = $shipAddress;


echo "<td>\n";
echo $user_info[0]["FIRST_NAME"] . " " . $user_info[0]["LAST_NAME"] . "<br />\n";
echo $ba->getStreet() . "<br />\n";
echo $ba->getCity() . "<br />\n";
echo $ba->getState()  . "<br />\n";
echo $ba->getPostal()  . "<br />\n";
echo "</td>\n";

echo "<td>\n";
echo $user_info[0]["FIRST_NAME"] . " " . $user_info[0]["LAST_NAME"] . "<br />\n";
echo $sa->getStreet() . "<br />\n";
echo $sa->getCity() . "<br />\n";
echo $sa->getState()  . "<br />\n";
echo $sa->getPostal()  . "<br />\n";
echo "</td>\n";

echo "<td>\n";
echo "Date: " . date("Y-m-d")  . "<br />\n";
echo "Order Number: " . $order_id   . "<br />\n";
echo "Payment: Card Ending: " . substr($creditCard->getNumber(),-4) . "<br />\n";

echo "</td>\n";

?>
</tr>
</tbody>
</table>
<br /><br />

<table>
  <thead>
    <tr>
        <th>Line</th>
        <th>Product ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Ext. Cost</th>
    </tr>
  </thead>
  <tbody>
<?php

$line = 1;
foreach($cart_list as $p)
{

    echo "  <tr>\n";
    echo "      <td align='center'>" . $line . "</td>\n";
    echo "      <td>" . $p->getProduct_id() . "</td>\n";
    echo "      <td>" . $p->getName() . "</td>\n";
    echo "      <td align='right'>" . "$" . number_format($p->getPrice(),2) . "</td>\n";
    echo "      <td align='right'>" . $p->getQty() . "</td>\n";
    echo "      <td align='right'>" . "$" . number_format($p->getExtended_cost(),2) . "</td>\n";
    echo "  </tr>\n";
    $line = $line + 1;
}

 ?>
  <tr>
  <td colspan="5">Total</td>
  <?php echo "<td align='right'>" . "$" . number_format($cart_cost,2)  . "</td>\n"; ?>
  </tr>
  </tbody>
</table>
<br />
<br />
<hr>
<br />
<br />
</div>