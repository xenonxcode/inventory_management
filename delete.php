<?php
require 'config.php';

// Mengambil ID barang yang akan dihapus
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Menghapus data barang
$query = "DELETE FROM inventory WHERE id = $id";
if ($conn->query($query)) {
    header('Location: index.php');
    exit;
} else {
    echo "Error: " . $conn->error;
}
?>
