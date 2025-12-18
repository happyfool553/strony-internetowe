<?php
require "db-connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php 
session_start();
session_unset();
session_destroy();

header("Location: logowanie.php?logout=1");
exit;
?>