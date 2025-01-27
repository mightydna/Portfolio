<?php
session_start();

$_SESSION = [];
header("Location: ../public/cockpit.php");
exit;
?>