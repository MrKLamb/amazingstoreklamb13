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
 * 1. Create Products
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
    <link rel=stylesheet href="css/post_entries.css" />
    <title>Amazing Store</title>
</head>
<body>

<?php require_once('../../util_funcs.php');?>
<?php require_once '../../_main_menu.php';?>

	<div class="container">
		<form action="../controller/ProductCreateHandler.php" method="POST" enctype="multipart/form-data">
			<div align="center">
				<h1>Create Product</h1>
				<p>Please fill in this form to create a product.</p>
				<hr>
			</div>
			<div class="row">
				<div class="col-1"></div>
				<div class="col-5">

					<div class="row">
						<div class="col-10">
							<div class="form-floating mb-3 mt-3">
								<input type="file" class="form-control"
									placeholder="Select Images (JPG Only)" name="files[]" id="files"
									required multiple>
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
									required >
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
									required >
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
									required >
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
									required >
								<label for="Price" class="form-label">Price:</label>
							</div>
						</div>
						<div class="col-2"></div>
					</div>
				</div>
			</div>

			<div align='center'>
				<button type="submit" class="btn btn-primary">Create</button>
			</div>

			<hr>
		</form>
	</div>

</body>
</html>
