<?php
require 'config.php';
// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_barang = $_POST['nama_barang'];
    $sisa_akhir_tahun_2023_jumlah = $_POST['sisa_akhir_tahun_2023_jumlah'];
    $sisa_akhir_tahun_2023_nilai = $_POST['sisa_akhir_tahun_2023_nilai'];
    $pengadaan_ta_2024_i_jumlah = $_POST['pengadaan_ta_2024_i_jumlah'];
    $pengadaan_ta_2024_i_nilai = $_POST['pengadaan_ta_2024_i_nilai'];
    $pengadaan_ta_2024_ii_jumlah = $_POST['pengadaan_ta_2024_ii_jumlah'];
    $pengadaan_ta_2024_ii_nilai = $_POST['pengadaan_ta_2024_ii_nilai'];
    $pengadaan_ta_2024_iii_jumlah = $_POST['pengadaan_ta_2024_iii_jumlah'];
    $pengadaan_ta_2024_iii_nilai = $_POST['pengadaan_ta_2024_iii_nilai'];
    $penerimaan_luar_pengadaan_jumlah = $_POST['penerimaan_luar_pengadaan_jumlah'];
    $penerimaan_luar_pengadaan_nilai = $_POST['penerimaan_luar_pengadaan_nilai'];
    $jumlah_pengeluaran_2024_jumlah = $_POST['jumlah_pengeluaran_2024_jumlah'];
    $jumlah_rusak_kadaluwarsa_2024 = $_POST['jumlah_rusak_kadaluwarsa_2024'];
    $sisa_jumlah = $_POST['sisa_jumlah'];
    $sisa_nilai = $_POST['sisa_nilai'];
    $harga_satuan = $_POST['harga_satuan'];
    $kategori_unit = $_POST['kategori_unit'];
    $keterangan = $_POST['keterangan'];
    $tahun = $_POST['tahun'];

    // Query untuk menyimpan data ke dalam database
    $query = "INSERT INTO inventory (nama_barang, sisa_akhir_tahun_2023_jumlah, sisa_akhir_tahun_2023_nilai, 
              pengadaan_ta_2024_i_jumlah, pengadaan_ta_2024_i_nilai, pengadaan_ta_2024_ii_jumlah, 
              pengadaan_ta_2024_ii_nilai, pengadaan_ta_2024_iii_jumlah, pengadaan_ta_2024_iii_nilai, 
              penerimaan_luar_pengadaan_jumlah, penerimaan_luar_pengadaan_nilai, jumlah_pengeluaran_2024_jumlah, 
              jumlah_rusak_kadaluwarsa_2024, sisa_jumlah, sisa_nilai, harga_satuan, kategori_unit, keterangan, tahun) 
              VALUES ('$nama_barang', $sisa_akhir_tahun_2023_jumlah, $sisa_akhir_tahun_2023_nilai, 
              $pengadaan_ta_2024_i_jumlah, $pengadaan_ta_2024_i_nilai, $pengadaan_ta_2024_ii_jumlah, 
              $pengadaan_ta_2024_ii_nilai, $pengadaan_ta_2024_iii_jumlah, $pengadaan_ta_2024_iii_nilai, 
              $penerimaan_luar_pengadaan_jumlah, $penerimaan_luar_pengadaan_nilai, $jumlah_pengeluaran_2024_jumlah, 
              $jumlah_rusak_kadaluwarsa_2024, $sisa_jumlah, $sisa_nilai, $harga_satuan, '$kategori_unit', '$keterangan', $tahun)";

    if ($conn->query($query) === TRUE) {
        echo "Data berhasil ditambahkan!";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
    
    // Redirect ke halaman utama
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'templates/header.php'; ?>
    <h1>Tambah Data Inventory</h1>
    <form action="insert.php" method="POST">
        <!-- Input untuk Nama Barang -->
        <label for="nama_barang">Nama Barang:</label>
        <input type="text" id="nama_barang" name="nama_barang" required>

        <!-- Input untuk Sisa Akhir Tahun 2023 -->
        <label for="sisa_akhir_tahun_2023_jumlah">Sisa Akhir Tahun 2023 (Jumlah):</label>
        <input type="number" id="sisa_akhir_tahun_2023_jumlah" name="sisa_akhir_tahun_2023_jumlah" required>

        <label for="sisa_akhir_tahun_2023_nilai">Sisa Akhir Tahun 2023 (Nilai):</label>
        <input type="number" id="sisa_akhir_tahun_2023_nilai" name="sisa_akhir_tahun_2023_nilai" required>

        <!-- Input untuk Pengadaan TA 2024 (I) -->
        <label for="pengadaan_ta_2024_i_jumlah">Pengadaan TA 2024 (I) (Jumlah):</label>
        <input type="number" id="pengadaan_ta_2024_i_jumlah" name="pengadaan_ta_2024_i_jumlah" required>

        <label for="pengadaan_ta_2024_i_nilai">Pengadaan TA 2024 (I) (Nilai):</label>
        <input type="number" id="pengadaan_ta_2024_i_nilai" name="pengadaan_ta_2024_i_nilai" required>

        <!-- Input untuk Pengadaan TA 2024 (II) -->
        <label for="pengadaan_ta_2024_ii_jumlah">Pengadaan TA 2024 (II) (Jumlah):</label>
        <input type="number" id="pengadaan_ta_2024_ii_jumlah" name="pengadaan_ta_2024_ii_jumlah" required>

        <label for="pengadaan_ta_2024_ii_nilai">Pengadaan TA 2024 (II) (Nilai):</label>
        <input type="number" id="pengadaan_ta_2024_ii_nilai" name="pengadaan_ta_2024_ii_nilai" required>

        <!-- Input untuk Pengadaan TA 2024 (III) -->
        <label for="pengadaan_ta_2024_iii_jumlah">Pengadaan TA 2024 (III) (Jumlah):</label>
        <input type="number" id="pengadaan_ta_2024_iii_jumlah" name="pengadaan_ta_2024_iii_jumlah" required>

        <label for="pengadaan_ta_2024_iii_nilai">Pengadaan TA 2024 (III) (Nilai):</label>
        <input type="number" id="pengadaan_ta_2024_iii_nilai" name="pengadaan_ta_2024_iii_nilai" required>

        <!-- Input untuk Penerimaan di Luar Pengadaan -->
        <label for="penerimaan_luar_pengadaan_jumlah">Penerimaan di Luar Pengadaan (Jumlah):</label>
        <input type="number" id="penerimaan_luar_pengadaan_jumlah" name="penerimaan_luar_pengadaan_jumlah" required>

        <label for="penerimaan_luar_pengadaan_nilai">Penerimaan di Luar Pengadaan (Nilai):</label>
        <input type="number" id="penerimaan_luar_pengadaan_nilai" name="penerimaan_luar_pengadaan_nilai" required>

        <!-- Input untuk Jumlah Pengeluaran 2024 -->
        <label for="jumlah_pengeluaran_2024_jumlah">Jumlah Pengeluaran 2024 (Jumlah):</label>
        <input type="number" id="jumlah_pengeluaran_2024_jumlah" name="jumlah_pengeluaran_2024_jumlah" required>

        <label for="jumlah_rusak_kadaluwarsa_2024">Jumlah Rusak/Kadaluwarsa 2024:</label>
        <input type="number" id="jumlah_rusak_kadaluwarsa_2024" name="jumlah_rusak_kadaluwarsa_2024" required>

        <!-- Input untuk Sisa Jumlah dan Nilai -->
        <label for="sisa_jumlah">Sisa Jumlah:</label>
        <input type="number" id="sisa_jumlah" name="sisa_jumlah" required>

        <label for="sisa_nilai">Sisa Nilai:</label>
        <input type="number" id="sisa_nilai" name="sisa_nilai" required>

        <!-- Input untuk Harga Satuan -->
        <label for="harga_satuan">Harga Satuan:</label>
        <input type="number" id="harga_satuan" name="harga_satuan" required>

        <!-- Input untuk Kategori Unit -->
        <label for="kategori_unit">Kategori Unit:</label>
        <select id="kategori_unit" name="kategori_unit" required>
            <option value="">Pilih Kategori</option>
            <option value="pack">Pack</option>
            <option value="buah">Buah</option>
            <option value="dus">Dus</option>
            <option value="tube">Tube</option>
            <option value="rim">Rim</option>
            <option value="btl">Btl</option>
            <option value="lbr">Lbr</option>
            <option value="set">Set</option>
            <option value="ltr">Ltr</option>
            <option value="kg">Kg</option>
            <option value="ons">Ons</option>
            <option value="unit">Unit</option>
            <option value="bks">Bks</option>
        </select>

        <!-- Input untuk Keterangan -->
        <label for="keterangan">Keterangan:</label>
        <textarea id="keterangan" name="keterangan"></textarea>

        <!-- Input untuk Tahun -->
        <label for="tahun">Tahun:</label>
        <input type="number" id="tahun" name="tahun" required>

        <!-- Tombol Submit -->
        <input type="submit" value="Tambah Data">
    </form>
    <?php include 'templates/footer.php'; ?>
</body>
</html>
