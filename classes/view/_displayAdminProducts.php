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
 * 1. AmazingStoreKLamb13
 * 2. Display table of products for edit
 * 2. Reusable functions
 * ---------------------------------------------------------------
 -->

<table id="post_entries">
  <thead>
    <tr>
        <th>ID</th>
        <th>Scan Code</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
  </thead>
  <tbody>

<?php
    foreach ($products as $p)
    {
        echo "  <tr>\n";
        echo "      <td>" . $p[0] . "</td>\n";
        echo "      <td>" . $p[1] . "</td>\n";
        echo "      <td>" . $p[2] . "</td>\n";
        echo "      <td>" . $p[3] . "</td>\n";
        echo "      <td align='right'>" . "$" . number_format($p[4], 2) . "</td>\n";
        echo "      <td>" . "<a href='../controller/ProductChangeHandler.php?id=" . $p[0] . "&mode=0'>Edit<a>" .
             "&nbsp;|&nbsp;<a href='../controller/ProductChangeHandler.php?id=" . $p[0] . "&mode=1'>Delete<a></td>\n";

        echo "  </tr>\n";
	}
 ?>
</tbody>
</table>
