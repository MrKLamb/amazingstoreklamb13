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
 * 1. AmazingStoreKLamb13 (_displayAllUsers.php) display table of users for edit
 * 2. Reusable functions
 * ---------------------------------------------------------------
 -->

<table id="post_entries">
  <thead>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Password</th>
        <th>Birthdate</th>
        <th>Gender</th>
        <th>Role</th>
        <th>Action</th>
    </tr>
  </thead>
  <tbody>

<?php
    $gender = array();
    $gender[0] = "Male";
    $gender[1] = "Female";

    foreach ($users as $u)
    {
        echo "  <tr>\n";
        echo "      <td>" . $u[0] . "</td>\n";
        echo "      <td>" . $u[1] . "</td>\n";
        echo "      <td>" . $u[2] . "</td>\n";
        echo "      <td>" . $u[3] . "</td>\n";
        echo "      <td>" . $u[4] . "</td>\n";
        echo "      <td>" . $u[5] . "</td>\n";
        echo "      <td>" . $u[6] . "</td>\n";
        echo "      <td>" . $gender[$u[7]] . "</td>\n";
        echo "      <td>" . $u[9] . "</td>\n";
        echo "      <td>" . "<a href='../controller/UserChangeHandler.php?id=" . $u[0] . "&mode=0'>Edit<a>" .
             "&nbsp;|&nbsp;<a href='../controller/UserChangeHandler.php?id=" . $u[0] . "&mode=1'>Delete<a></td>\n";

        echo "  </tr>\n";
	}
 ?>
</tbody>
</table>
