<?php 
defined("CONTROL") or die("Access denied!");
// log out
session_destroy();

header("Location: index.php?route=login");
?>