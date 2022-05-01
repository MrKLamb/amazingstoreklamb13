<?php
namespace classes\view;
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
 * 1. AmazingStoreKLamb13 (_displayAllProduct.php) display table of products
 * 2. Reusable functions
 * ---------------------------------------------------------------
 -->

<table id="post_entries" class="display">
  <thead>
    <tr>
        <th>Action</th>
        <th>ID</th>
        <th>Scan Code</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
    </tr>
  </thead>
  <tbody>
<?php

require_once '../../util_funcs.php';

$products = getSearchInfo();

if (isset($products))
{
    foreach($products as $p)
    {
        echo "  <tr>\n";
        echo "       <td>\n";
        echo "          <form action='../controller/ShoppingCartChangeHandler.php' method='POST'>\n" .
             "             <input type='hidden' name='ProductID' id='ProductID' value='" . $p[0] . "'>\n" .
             "             <input type='hidden' name='Mode' id='Mode' value='0'>\n" .
             "             <input type='hidden' name='Qty' id='Qty' value='1'>\n" .
             "             <button class='btn btn-secondary btn-sm' type='submit'>cart +</button>\n" .
             "          </form>\n";
        echo "      </td>\n";
        echo "      <td>" . $p[0] . "</td>\n";
        echo "      <td><a href='../controller/ProductDisplayHandler.php?id=" . $p[0] . "'>" . $p[1] . "</a></td>\n";
        echo "      <td>" . $p[2] . "</td>\n";
        echo "      <td>" . $p[3] . "</td>\n";
        echo "      <td align='right'>" . "$" . number_format($p[4], 2) . "</td>\n";
        echo "  </tr>\n";
	}
}


 ?>

  </tbody>
</table>
