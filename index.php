<?php
require_once 'AutoLoader.php';
?>

<!DOCTYPE html>

<!--
 * ---------------------------------------------------------------
 * Name      : Kelly E. Lamb
 * Date      : 2022-03-28
 * Class     : CST-323 Cloud Computing
 * Professor : Bradley Mauger PhD
 * Assignment: Activity Application
 * Disclaimer: This is my own work - KLamb
 * ---------------------------------------------------------------
 * Description:
 * 1. Welcome / Default Page (index.html)
 * 2. Initial Menu Options for home, login, register
 * 3.
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

<?php require_once 'util_funcs.php' ?>
<?php require_once '_main_menu.php';?>

<?php
    // Check if user is logged in - display blogs
    $user_info = getUserInfo();

    if (isset($user_info))
    {
        echo "        <div align=\"center\">\n";
        echo "                <h3>Login Successful</h3><br />\n";
        echo "                <hr>\n";
        echo "                Welcome: " .  $user_info[0]["FIRST_NAME"] . " " . $user_info[0]["LAST_NAME"] . "\n";
        echo "        </div>\n";
    }
?>

<div align='center'>
<img src="/images/logo.jpg">
</div>

</body>
</html>