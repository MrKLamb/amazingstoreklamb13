<?php
namespace classes\view;
require_once '../..' . '/AutoLoader.php';

/*
<!----------------------------------------------------------------
 * Name      : Kelly E. Lamb
 * Date      : 2022-03-28
 * Class     : CST-323 Cloud Computing
 * Professor : Bradley Mauger PhD
 * Assignment: Activity Application
 * Disclaimer: This is my own work
 * ---------------------------------------------------------------
 * Description:
 * 1. Login Failure form
 * 2. Obtain form data
 * 3. Handle Login Validation
 * 4. Transistion from procedural connection to PDO object
 * ---------------------------------------------------------------
 */

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
    <title>Amazing Store</title>
</head>
<body>

<?php require_once '../../util_funcs.php' ?>
<?php require_once '../../_main_menu.php';?>

<?php
        echo "        <div align=\"center\">\n";
        echo "                <h3>Login Was Not Successful</h3><br />\n";
        echo "                <hr>\n";
        echo "                Login not successful - please try again\n";
        echo "        </div>\n";
?>

</body>
</html>