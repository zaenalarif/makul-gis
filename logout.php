<?php
require_once("init/init.php");

session_destroy();
header('Location: index.php');

?>