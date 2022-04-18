<?php
namespace classes\view;
require_once $_SERVER['DOCUMENT_ROOT'] . '/AutoLoader.php';
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
 * 1. Edit Products
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
    <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Amazing Store</title>

<style>
.nopad {
	padding-left: 0 !important;
	padding-right: 0 !important;
}
/*image gallery*/
.image-checkbox {
	cursor: pointer;
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	-webkit-box-sizing: border-box;
	border: 4px solid transparent;
	margin-bottom: 0;
	outline: 0;
}
.image-checkbox input[type="checkbox"] {
	display: none;
}

.image-checkbox-checked {
	border-color: #4783B0;
}
.image-checkbox .fa {
  position: absolute;
  color: #4A79A3;
  background-color: #fff;
  padding: 10px;
  top: 0;
  right: 0;
}
.image-checkbox-checked .fa {
  display: block !important;
}

</style>

</head>
<body>

<?php
require_once('../../util_funcs.php');
require_once '../../_main_menu.php';
$pModel = $product;
$images = $pModel->getImage_array();
?>

	<div class="container">
		<form action="../controller/ProductEditHandler.php" method="POST" enctype="multipart/form-data">
     		<div align="center">
    		    <h1>Edit Product</h1>
    		    <p>Please fill in this form to update the product.</p>
    		    <hr>
    		</div>

			<div class="row">
				<div class="col-1"></div>
				<div class="col-5">
			    <?php
			    echo "<div class='row'>\n";

			    if (count($images) > 0)
			    {
			        echo "  <h3>Select images to delete.</h3>\n";
			        foreach ($images as $i)
			        {

        			    echo "  <div class='col'>\n";
        			    echo "    <label class='image-checkbox'>\n";
        			    echo "      <img class='img-responsive' width='100px' height='100px' src='../../images/item/" . $i->getProduct_id() . "/" . $i->getFilename() . "' />\n";
        			    echo "      <input type='checkbox' name='image[]' value='" . $i->getId() . ":" . $i->getFilename() . "' />\n";
        			    echo "      <i class='fa fa-check hidden'></i>\n";
        			    echo "    </label>\n";
        			    echo "  </div>\n";
			        }
			    }

			    echo "</div>\n";

			    ?>

					<div class="row">
						<div class="col-10">
							<div class="form-floating mb-3 mt-3">
								<input type="file" class="form-control"
									placeholder="Select Images (JPG Only)" name="files[]" id="files"
									multiple>
								<label for="files" class="form-label">Select Image(s) JPG Only:</label>
							</div>
						</div>
						<div class="col-2"></div>
					</div>
				</div>
				<div class="col-6">
					<div class="row">
						<div class="col-10">
							<div class="form-floating mb-3 mt-3">
								<input type="text" class="form-control"
									placeholder="Enter scan code" name="ScanCode" id="ScanCode"
									required
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
									required
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
									required
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
									required
									<?php echo 'value="' . $pModel->getPrice() . '"'; ?>>
								<label for="Price" class="form-label">Price:</label>
							</div>
						</div>
						<div class="col-2"></div>
					</div>
				</div>
			</div>
			<div align='center'>
				<button type="submit" class="btn btn-primary">Update</button>
			</div>

			<hr>
			<input type="hidden" name="ProductID" id="ProductID" <?php echo 'value="' . $pModel->getId() . '"'; ?> >
		</form>
	</div>

	<script>
$(".image-checkbox").each(function () {
  if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
    $(this).addClass('image-checkbox-checked');
  }
  else {
    $(this).removeClass('image-checkbox-checked');
  }
});

// sync the state to the input
$(".image-checkbox").on("click", function (e) {
  $(this).toggleClass('image-checkbox-checked');
  var $checkbox = $(this).find('input[type="checkbox"]');
  $checkbox.prop("checked",!$checkbox.prop("checked"))

  e.preventDefault();
});
	</script>


</body>
</html>
