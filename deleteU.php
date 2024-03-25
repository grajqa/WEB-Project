<?php
include_once "dbcon.php";

if (!isset($_GET['id'])) {
    echo 'error';
    exit;
}
$userId = $_GET['id'];

$sql = "DELETE FROM users WHERE id = ?";
$stmt = $db->prepare($sql);

$result = $stmt->execute([$userId]);

if ($result) {
    header("Location: dashUser.php");
    exit;
} else {
    echo "Error deleting user";
}
?>
