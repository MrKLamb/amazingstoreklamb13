<?php
namespace classes\view;
use classes;

require_once $_SERVER['DOCUMENT_ROOT'] . '/AutoLoader.php';

/*
 * ---------------------------------------------------------------
 * Name      : Kelly E. Lamb
 * Date      : 2022-03-28
 * Class     : CST-323 Cloud Computing
 * Professor : Bradley Mauger PhD
 * Assignment: Activity Application
 * Disclaimer: This is my own work
 * ---------------------------------------------------------------
 * Description:
 * 1. AmazingStoreKLamb13 - Handle Check Out Process
 * 2. Obtain form data
 * 3. Handle Data / Display
 * ---------------------------------------------------------------
 */

include_once '../../header.php';
include_once '../../securePage.php';
require_once '../../util_funcs.php';
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <!-- Bootstrap CSS -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
	<link rel=stylesheet href="../../css/post_entries.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
    $(document).ready(function(){
      $("#copyAddressButton").click(function(){

        var firstAddress = $('#addressOneA').find('input');
        var secondAddress = $('#addressTwoA').find('input');
		$(secondAddress[0]).val($(firstAddress[0]).val());

        var firstAddress = $('#addressOneB').find('input');
        var secondAddress = $('#addressTwoB').find('input');
        for (i = 0; i < 2; i++)
        {
			$(secondAddress[i]).val($(firstAddress[i]).val());
        }

        var firstAddress = $('#addressOneB').find('select');
        var secondAddress = $('#addressTwoB').find('select');
		$(secondAddress[0]).val($(firstAddress[0]).val());

      });
    });
	</script>
	<title>Amazing Store</title>
</head>
<body>

<?php require_once '../../_main_menu.php';?>

<div class="container">

	<form action="../controller/CheckOutHandler.php" method="POST">
		<div align="center">
			<h1>Order Check Out</h1>
			<hr>
		</div>
        <h3>Step 1. Shipping Address</h3>
        <div class="row"  id="addressOneA">
        	<div class="col"></div>
        	<div class="col-9">
        		<div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" placeholder="123 Some St. Apt. 1" name="S_Street" id="S_Street" required>
                    <label for="S_Street" class="form-label">Street Address:</label>
        		</div>
        	</div>
        </div>
        <div class="row"  id="addressOneB">
        	<div class="col"></div>
        	<div class="col-3">
        		<div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" placeholder="City" name="S_City" id="S_City" required>
                    <label for="S_City" class="form-label">City:</label>
        		</div>
        	</div>
        	<div class="col-3">
        		<div class="form-floating mb-3 mt-3">
					<select class="form-select" aria-label="Default select example" name="S_State" id="S_State" required>
						<option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="DC">District Of Columbia</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
					</select>
                    <label for="S_State" class="form-label">State:</label>
         		</div>
        	</div>
        	<div class="col-3">
        		<div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" placeholder="99999" name="S_Postal" id="S_Postal" required>
                    <label for="S_Postal" class="form-label">Zip Code:</label>
         		</div>
        	</div>
        </div>
		<hr>
        <h3>Step 2. Billing Address</h3>
        <div class="row" id="addressTwoA">
        	<div class="col"></div>
        	<div class="col-9">
        		<div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" placeholder="123 Some St. Apt. 1" name="B_Street" id="B_Street" required>
                    <label for="B_Street" class="form-label">Street Address:</label>
        		</div>
        	</div>
        </div>
        <div class="row" id="addressTwoB">
        	<div class="col"></div>
        	<div class="col-3">
        		<div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" placeholder="City" name="B_City" id="B_City" required>
                    <label for="B_City" class="form-label">City:</label>
        		</div>
        	</div>
			<div class="col-3">
				<div class="form-floating mb-3 mt-3">
					<select class="form-select" aria-label="Default select example" name="B_State" id="B_State" required>
						<option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="DC">District Of Columbia</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
					</select>
                    <label for="B_State" class="form-label">State:</label>
         		</div>
        	</div>
        	<div class="col-3">
        		<div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" placeholder="99999" name="B_Postal" id="B_Postal" required>
                    <label for="B_Postal" class="form-label">Zip Code:</label>
         		</div>
        	</div>
        </div>

       	<div align='center'>
	        <br />
			<input id="copyAddressButton"  class="btn btn-secondary" type="button" value="Copy Shipping Address into Billing">
        </div>
        <br />

		<hr>
		<h3>Step 3. Credit Card Information</h3>
		<div class="row">
        	<div class="col-3"></div>
        	<div class="col-3">
        		<div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" placeholder="Name on credit card" name="CC_Name" id="CC_Name" required>
                    <label for="CC_Name" class="form-label">Name on Card:</label>
         		</div>
        	</div>
        	<div class="col-3">
        		<div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" placeholder="9999 9999 9999 9999" name="CC_Number" id="CC_Number" pattern="[0-9][0-9][0-9][0-9] [0-9][0-9][0-9][0-9] [0-9][0-9][0-9][0-9] [0-9][0-9][0-9][0-9]" required>
                    <label for="CC_Number" class="form-label">Number:</label>
         		</div>
        	</div>
        	<div class="col-2">
        		<div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" placeholder="MM/DD" name="CC_Expiration" id="CC_Expiration" pattern="[0-9][0-9]/[0-9][0-9]" required>
                    <label for="CC_Expiration" class="form-label">Expiration:</label>
         		</div>
        	</div>
        	<div class="col-1">
        		<div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" placeholder="Security Code" name="CC_Security" id="CC_Security" pattern="[0-9][0-9][0-9]" required>
                    <label for="CC_Security" class="form-label">CVV:</label>
         		</div>
        	</div>
        </div>
        <hr>
        <h3>Step 4. Review Order</h3>

        <table id="post_entries">
			<thead>
				<tr>
					<th>Name</th>
					<th>Price</th>
					<th>Qty</th>
					<th>Ext. Cost</th>
				</tr>
			</thead>
			<tbody>

        <?php
        // Get Logged in user information to display cart summary
        $user_info = getUserInfo();
        $user_id = $user_info[0]["ID"];
        $scService = new classes\business\ShoppingCartBusinessService();
        $cart_list = $scService->getCart($user_id);
        $cart_cost = $scService->getCartTotalCost($user_id);

        foreach($cart_list as $item)
        {
            echo "  <tr>\n";
            echo "      <td>" .$item->getName() . "</td>\n";
            echo "      <td align='right'>" . "$" . number_format($item->getPrice(), 2) . "</td>\n";
            echo "      <td align='right'>" . $item->getQty() . "</td>\n";
            echo "      <td align='right'>" . "$" . number_format($item->getExtended_cost(), 2) . "</td>\n";
            echo "  </tr>\n";
        }

        ?>

          </tbody>
        </table>

        <?php
        echo "<hr><br><div align='center'><h3>Total: $" . number_format($cart_cost, 2) . "</h3></div>";
        ?>

        <br /><hr>
        <h3>Step 5. Confirm Order</h3>

        <div align='center'>
            <label for="Confirm" class="form-label">Confirm that you have entered correct information above</label>
            <input type="checkbox" class="form-checkbox" id="Confirm" name="Confirm" required ><br><br>
        	<button type="submit" class="btn btn-primary">Submit Order</button>
        </div>
        <br /><hr>
	</form>
</div>
</body>
</html>