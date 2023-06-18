<?php

$host = "localhost";
$user = "root";
$pw = "";
$database = "toko_roti";

$db = new PDO('mysql:host='.$host.';dbname='.$database, $user, $pw);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaRoti = $_POST['nama_roti'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $tanggalKadaluarsa = $_POST['tanggal_kadaluarsa'];
    $tanggalProduksi = $_POST['tanggal_produksi'];
    $gambarRoti = file_get_contents($_FILES['img']['tmp_name']);
    $deskripsi = $_POST['deskripsi'];
    $rating = $_POST['rating'];

    $stmt = $db->prepare("INSERT INTO menu (nama_roti, harga, stok, tanggal_kadaluarsa, tanggal_produksi, img, deskripsi, rating) VALUES (:nama_roti, :harga, :stok, :tanggal_kadaluarsa, :tanggal_produksi, :img, :deskripsi, :rating)");
    $stmt->bindParam(':nama_roti', $namaRoti);
    $stmt->bindParam(':harga', $harga);
    $stmt->bindParam(':stok', $stok);
    $stmt->bindParam(':tanggal_kadaluarsa', $tanggalKadaluarsa);
    $stmt->bindParam(':tanggal_produksi', $tanggalProduksi);
    $stmt->bindParam(':img', $gambarRoti, PDO::PARAM_LOB);
    $stmt->bindParam(':deskripsi', $deskripsi);
    $stmt->bindParam(':rating', $rating);

    try {
        $stmt->execute();
        echo "Data roti berhasil disimpan ke database.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
