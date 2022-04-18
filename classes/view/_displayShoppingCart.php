<?php
namespace classes\view;
use classes;

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
 * 1. AmazingStoreKLamb13 (_displayProduct.php) display table of products
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
        <th>Qty</th>
        <th>Ext. Cost</th>
    </tr>
  </thead>
  <tbody>
<?php

require_once '../../util_funcs.php';

foreach($cart_list as $p)
{

   // $p = new classes\model\ShoppingCart($id, $user_id, $product_id, $qty, $scancode, $name, $description, $price);
    echo "  <tr>\n";
    echo "<td><div style='display:flex;'><form style='display:inline-block; flex:1;' action='../controller/ShoppingCartChangeHandler.php' method='POST'>" .
         "<input type='hidden' name='ProductID' id='ProductID' value='" . $p->getProduct_id() . "'>" .
         "<input type='hidden' name='Mode' id='Mode' value='1'>" .
         "<input type='hidden' name='Qty' id='Qty' value='" . ($p->getQty()+1) . "'>" .
         "<button type='submit'>+</button></form>" .
         "<form style='display:inline-block; flex:1;' action='../controller/ShoppingCartChangeHandler.php' method='POST'>" .
         "<input type='hidden' name='ProductID' id='ProductID' value='" . $p->getProduct_id() . "'>" .
         "<input type='hidden' name='Mode' id='Mode' value='1'>" .
         "<input type='hidden' name='Qty' id='Qty' value='" . ($p->getQty()-1) . "'>" .
         "<button type='submit'>-</button></form>" .
         "<form style='display:inline-block; flex:1;' action='../controller/ShoppingCartChangeHandler.php' method='POST'>" .
         "<input type='hidden' name='ProductID' id='ProductID' value='" . $p->getProduct_id() . "'>" .
         "<input type='hidden' name='Mode' id='Mode' value='2'>" .
         "<input type='hidden' name='Qty' id='Qty' value='0'>" .
         "<button type='submit'>x</button></form></div></td>\n";
    echo "      <td>" . $p->getProduct_id() . "</td>\n";
    echo "      <td>" . $p->getScancode() . "</td>\n";
    echo "      <td>" . $p->getName() . "</td>\n";
    echo "      <td>" . $p->getDescription() . "</td>\n";
    echo "      <td align='right'>" . "$" . number_format($p->getPrice(), 2) . "</td>\n";
    echo "      <td align='right'>" . $p->getQty() . "</td>\n";
    echo "      <td align='right'>" . "$" . number_format($p->getExtended_cost(), 2) . "</td>\n";
    echo "  </tr>\n";
}

 ?>

  </tbody>
</table>

<?php
echo "<hr><br><div align='center'><h3>Grand Total: $" . number_format($cart_cost, 2) . "</h3></div><br><hr><br>";
?>
