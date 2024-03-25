<?php
include_once "dbcon.php";

try {
   
    $sql = "SELECT * FROM users";
    $stmt = $db->query($sql);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$db = null;
?>
