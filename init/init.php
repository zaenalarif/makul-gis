<?php require_once('function/db.php');?>
<?php require_once('function/function.php');?>

<?php 
session_start();

if( !isset($_SESSION["nama"])){    
    header("Location: login.php");
}
?>