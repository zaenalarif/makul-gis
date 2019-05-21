<?php
require_once('init/init.php');
$id = $_GET['id'];

deleteTempat($id);
header('Location: list.php ');

?>