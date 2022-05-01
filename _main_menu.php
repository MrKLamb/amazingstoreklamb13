<?php
require_once 'AutoLoader.php';
require_once 'util_funcs.php'
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
 * 1. Main Menu (_main_menu.php)
 * 2.
 * 3.
 * ---------------------------------------------------------------
 -->


<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);">
  <div class="container-fluid">
    <a class="navbar-brand" href="/index.php">Store</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

<?php
$user_info = getUserInfo();

if (isset($user_info))
{
    $menu_name = "(" . $user_info[0]["FIRST_NAME"] . " " . $user_info[0]["LAST_NAME"] . ")";

    $role_id = $user_info[0]["ROLE_ID"];

    //
    // User is logged into the application
    //
    echo "  <ul class='navbar-nav me-auto mb-2 mb-lg-0'>\r\n";
    echo "      <li class='nav-item'><a class='nav-link active' aria-current='page' href='/index.php\'>Home</a></li>\r\n";
    echo "      <li class='nav-item'><a class='nav-link active' aria-current='page' href='/classes/view/productCatalog.php'>Products</a></li>\r\n";
    echo "      <li class='nav-item dropdown'>\r\n";
    echo "          <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Account $menu_name</a>\r\n";
    echo "          <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>\r\n";
    echo "              <li><a class='dropdown-item' href=\"/classes/view/register.php\">Registration...</a></li>\r\n";
    echo "              <li><hr class='dropdown-divider'></li>\r\n";
    echo "              <li><a class='dropdown-item' href=\"/classes/controller/logoutHandler.php\">Log Out</a></li>\r\n";
    echo "          </ul>\r\n";
    echo "      </li>\r\n";

    // ADMINISTRATOR MENU Role ID = (Basic = 1,  User Maint = 2, Product Maint = 3, Admin (Both) = 4)
    if ($role_id > 1)
    {
        echo "      <li class='nav-item dropdown'>\r\n";
        echo "          <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Administrator</a>\r\n";
        echo "          <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>\r\n";

        if ($role_id == 2 || $role_id == 4)
        {
            echo "              <li><a class='dropdown-item' href=\"/classes/view/admin_edit_user.php\">User Admin...</a></li>\r\n";
        }

        if ($role_id == 3 || $role_id == 4)
        {
            echo "              <li><a class='dropdown-item' href=\"/classes/view/admin_edit_product.php\">Product Admin...</a></li>\r\n";
            echo "              <li><hr class='dropdown-divider'></li>\r\n";
            echo "              <li><a class='dropdown-item' href=\"/classes/view/productSalesForm.php\">Product Sales Report...</a></li>\r\n";
        }

        echo "          </ul>\r\n";
        echo "      </li>\r\n";
    }

    echo "  </ul>\r\n";
    echo "  <ul class='navbar-nav d-flex'>\r\n";
    echo "    <li class='nav-item'>\r\n";
    echo "      <a class='nav-link btn btn-outline-success' href='/classes/view/shopping_cart.php'>Cart</a>\r\n";
    echo "    </li>\r\n";
    echo "  </ul>\r\n";
}
else
{
    //
    // User is NOT logged into the application
    //
    echo "  <ul class='navbar-nav me-auto mb-2 mb-lg-0'>\r\n";
    echo "      <li class='nav-item'><a class='nav-link active' aria-current='page' href='/index.php'>Home</a></li>\r\n";
    echo "      <li class='nav-item dropdown'>\r\n";
    echo "          <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Account</a>\r\n";
    echo "          <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>\r\n";
    echo "              <li><a class='dropdown-item' href='/classes/view/register.php'>Registration...</a></li>\r\n";
    echo "              <li><hr class='dropdown-divider'></li>\r\n";
    echo "              <li><a class='dropdown-item' href='/classes/view/login.php'>Login...</a></li>\r\n";
    echo "          </ul>\r\n";
    echo "      </li>\r\n";
    echo "  </ul>\r\n";
}
?>
    </div>
  </div>
</nav>

<!-- Put the Store Name / Title Here -->
<div align="center">
	<br /><h1>Amazing Store</h1>
	<hr>
</div>

<style>
.form-floating > .form-control::placeholder {
    color: revert;
}

.form-floating > .form-control:not(:focus)::placeholder {
    color: transparent;
}
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
