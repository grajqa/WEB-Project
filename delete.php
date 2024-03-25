<?php
include_once('dbcon.php');

if (!isset($_GET['id'])) {
    echo 'error';
    exit;
}
$userId = $_GET['id'];

$sql = "DELETE FROM products WHERE id = ?";
$stmt = $db->prepare($sql);

$result = $stmt->execute([$userId]);

if ($result) {
    header("Location: dashProducts.php");
    exit;
} else {
    echo "Error deleting product";
}
?>

