<?php
$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "sephora";

try {
    $db = new PDO("mysql:host=$db_server;dbname=$db_name;charset=utf8", $db_username, $db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: ";
}

?>
