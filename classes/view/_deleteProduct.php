<?php
namespace classes\view;
require_once '../..' . '/AutoLoader.php';
session_start();
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
 * 1. Delete Products
 * 2. Simple place holder
 * 3. TO DO: Add card/image/detail
 * ---------------------------------------------------------------
 -->

<html lang='en'>
<head>
    <!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <!-- Bootstrap CSS -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>
    $(document).ready(function(){
		$(".img-thumbnail").hover(function(){
			var src = $(this).attr("src");
		    $("#ProductImage").attr("src",src);
		});
    });
	</script>
    <title>Amazing Store</title>
</head>
<body>

<?php
require_once('../../util_funcs.php');
require_once '../../_main_menu.php';
$pModel = $product;
$images = $pModel->getImage_array();
?>

	<div class="container">
    	<form action="../controller/ProductDeleteHandler.php" method="POST">
     		<div align="center">
    		    <h1>Delete Product</h1>
    		    <p>Confirm Delete.</p>
    		    <hr>
    		</div>

			<div class="row">
				<div class="col-1"></div>
				<div class="col-5">
			    <?php
                    if (count($images) == 0)
                    {
                        echo "<div class='row'>\n";
                        echo "    <div class='col-1'></div>\n";
                        echo "    <div class='col-8'>\n";
                        echo "        <img name='ProductImage' id='ProductImage' width='340px' height='340px' " .
                             " src='../../images/product_default.jpg'" .
                    		 " value='product_default.jpg'>\n";
                        echo "    </div>\n";
                        echo "    <div class='col-3'></div>\n";
                        echo "</div>\n";
                    }
                    else
                    {
                        $i1 = $images[0];

                        echo "<div class='row'>\n";
                        echo "    <div class='col-1'></div>\n";
                        echo "    <div class='col-8'>\n";
                        echo "        <img name='ProductImage' id='ProductImage' width='340px' height='340px' " .
                             " src='../../images/item/" . $i1->getProduct_id() . "/" . $i1->getFilename() ."'" .
                             " value='" . $i1->getFilename() ."'>\n";
                        echo "    </div>\n";
                        echo "    <div class='col-3'></div>\n";
                        echo "</div>\n";

                        echo "<div class='row'>\n";
                        echo "    <div class='col-1'></div>\n";
                        foreach ($images as $i)
                        {
                            echo "    <div class='col-2'> " .
                                 "        <img class='img-thumbnail' name='thumbnail' id='thumbnail' width='75px' height='75px' " .
                                 " src='../../images/item/" . $i->getProduct_id() . "/" . $i->getFilename() ."'" .
                                 " value='" . $i->getId() ."'>\n" .
                                 "    </div>\n";
                        }
                        echo "    <div class='col-3'></div>\n";
                        echo "</div>\n";
                    }
			    ?>
				</div>
				<div class="col-6">
					<div class="row">
						<div class="col-10">
							<div class="form-floating mb-3 mt-3">
								<input type="text" class="form-control"
									placeholder="Enter scan code" name="ScanCode" id="ScanCode"
									disabled
									<?php echo 'value="' . $pModel->getScancode() . '"'; ?>>
								<label for="ScanCode" class="form-label">Scan Code:</label>
							</div>
						</div>
						<div class="col-2"></div>
					</div>
					<div class="row">
						<div class="col-10">
							<div class="form-floating mb-3 mt-3">
								<input type="text" class="form-control"
									placeholder="Enter product name" name="Name" id="Name"
									disabled
									<?php echo 'value="' . $pModel->getName() . '"'; ?>>
								<label for="Name" class="form-label">Name:</label>
							</div>
						</div>
						<div class="col-2"></div>
					</div>
					<div class="row">
						<div class="col-10">
							<div class="form-floating mb-3 mt-3">
								<input type="text" class="form-control"
									placeholder="Enter description" name="Description" id="Description"
									disabled
									<?php echo 'value="' . $pModel->getDescription() . '"'; ?>>
								<label for="Description" class="form-label">Description:</label>
							</div>
						</div>
						<div class="col-2"></div>
					</div>
					<div class="row">
						<div class="col-10">
							<div class="form-floating mb-3 mt-3">
								<input type="text" class="form-control"
									placeholder="Enter price" name="Price" id="Price"
									disabled
									<?php echo 'value="' . "$" . number_format($pModel->getPrice(), 2) . '"'; ?>>
								<label for="Price" class="form-label">Price:</label>
							</div>
						</div>
						<div class="col-2"></div>
					</div>
				</div>
			</div>
			<div align='center'>
				<button type="submit" class="btn btn-primary">Confirm Delete</button>
			</div>
			<hr>
    		<input type="hidden"  name="ProductID" id="ProductID" <?php echo 'value="' . $pModel->getId() . '"'; ?> >
    	</form>
    </div>

</body>
</html>
