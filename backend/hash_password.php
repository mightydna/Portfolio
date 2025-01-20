<?php
$password = "test12";
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

echo "Gehashtes Passwort: " . $hashed_password;
?>