<?php require_once('function/db.php');?>
<?php require_once('function/function.php');?>

<?php 
ini_set("display_errors", 1);
error_reporting(E_ALL);

session_start();

if( !isset($_SESSION["nama"])){    
    header("Location: login.php");
}
?>