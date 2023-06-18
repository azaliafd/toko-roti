<!DOCTYPE html>
<html>
<head>
    <title>Input Roti</title>
</head>
<body>
    <h2>Input Roti</h2>
    <form method="POST" action="simpan_roti.php" enctype="multipart/form-data">
        <label for="namaRoti">Nama Roti:</label>
        <input type="text" id="namaRoti" name="nama_roti" required><br>

        <label for="harga">Harga :</label>
        <input type="number" id="harga" name="harga" required><br>

        <label for="stok">Stok :</label>
        <input type="number" id="stok" name="stok" required><br>

        <label for="tanggalKadaluarsa">Tanggal Kadaluarsa:</label>
        <input type="date" id="tanggalKadaluarsa" name="tanggal_kadaluarsa" required><br>

        <label for="tanggalProduksi">Tanggal Produksi :</label>
        <input type="date" id="tanggalProduksi" name="tanggal_produksi" required><br>

        <label for="gambarRoti">Gambar Roti :</label>
        <input type="file" id="gambarRoti" name="img" accept="img/*" required><br>

        <label for="deskripsi">Deskripsi Produk :</label>
        <input type="text" id="deskripsi" name="deskripsi" required><br>

        <label for="rating">Rating :</label>
        <input type="number" id="rating" name="rating" required><br>

        <input type="submit" value="Simpan">
    </form>
</body>
</html>
