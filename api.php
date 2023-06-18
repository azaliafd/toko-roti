<?php
  require_once 'koneksi.php';

  function getProductDetails($productId) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM menu WHERE id = :id");
    $stmt->bindParam(':id', $productId);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
?>