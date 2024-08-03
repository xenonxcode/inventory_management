<?php
require 'config.php';

// Mengambil ID barang yang akan diedit
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Mendapatkan data barang yang akan diedit
$query = "SELECT * FROM inventory WHERE id = $id";
$result = $conn->query($query);
$data = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namaBarang = $_POST['nama_barang'];
    $sisaAkhirJumlah = $_POST['sisa_akhir_jumlah'];
    $sisaAkhirNilai = $_POST['sisa_akhir_nilai'];
    $pengadaanIJumlah = $_POST['pengadaan_ta_i_jumlah'];
    $pengadaanINilai = $_POST['pengadaan_ta_i_nilai'];
    $pengadaanIIJumlah = $_POST['pengadaan_ta_ii_jumlah'];
    $pengadaanIINilai = $_POST['pengadaan_ta_ii_nilai'];
    $pengadaanIIIJumlah = $_POST['pengadaan_ta_iii_jumlah'];
    $pengadaanIIINilai = $_POST['pengadaan_ta_iii_nilai'];
    $penerimaanJumlah = $_POST['penerimaan_luar_pengadaan_jumlah'];
    $penerimaanNilai = $_POST['penerimaan_luar_pengadaan_nilai'];
    $pengeluaranJumlah = $_POST['jumlah_pengeluaran_jumlah'];
    $rusakJumlah = $_POST['jumlah_rusak_kadaluwarsa'];
    $hargaSatuan = $_POST['harga_satuan'];
    $kategoriUnit = $_POST['kategori_unit'];
    $keterangan = $_POST['keterangan'];

    // Update data barang
    $updateQuery = "UPDATE inventory SET 
        nama_barang = '$namaBarang', 
        sisa_akhir_tahun_jumlah = $sisaAkhirJumlah, 
        sisa_akhir_tahun_nilai = $sisaAkhirNilai, 
        pengadaan_ta_i_jumlah = $pengadaanIJumlah, 
        pengadaan_ta_i_nilai = $pengadaanINilai, 
        pengadaan_ta_ii_jumlah = $pengadaanIIJumlah, 
        pengadaan_ta_ii_nilai = $pengadaanIINilai, 
        pengadaan_ta_iii_jumlah = $pengadaanIIIJumlah, 
        pengadaan_ta_iii_nilai = $pengadaanIIINilai, 
        penerimaan_luar_pengadaan_jumlah = $penerimaanJumlah, 
        penerimaan_luar_pengadaan_nilai = $penerimaanNilai, 
        jumlah_pengeluaran_jumlah = $pengeluaranJumlah, 
        jumlah_rusak_kadaluwarsa = $rusakJumlah, 
        harga_satuan = $hargaSatuan, 
        kategori_unit = '$kategoriUnit', 
        keterangan = '$keterangan' 
        WHERE id = $id";
    
    if ($conn->query($updateQuery)) {
        header('Location: index.php');
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Edit Barang</h1>
    <form method="post" action="">
        <label>Nama Barang:</label>
        <input type="text" name="nama_barang" value="<?php echo $data['nama_barang']; ?>" required>
        
        <label>Sisa Akhir Tahun (Jumlah):</label>
        <input type="number" name="sisa_akhir_jumlah" value="<?php echo $data['sisa_akhir_tahun_jumlah']; ?>" required>

        <label>Sisa Akhir Tahun (Nilai):</label>
        <input type="number" name="sisa_akhir_nilai" value="<?php echo $data['sisa_akhir_tahun_nilai']; ?>" required>

        <label>Pengadaan TA I (Jumlah):</label>
        <input type="number" name="pengadaan_ta_i_jumlah" value="<?php echo $data['pengadaan_ta_i_jumlah']; ?>" required>

        <label>Pengadaan TA I (Nilai):</label>
        <input type="number" name="pengadaan_ta_i_nilai" value="<?php echo $data['pengadaan_ta_i_nilai']; ?>" required>

        <label>Pengadaan TA II (Jumlah):</label>
        <input type="number" name="pengadaan_ta_ii_jumlah" value="<?php echo $data['pengadaan_ta_ii_jumlah']; ?>" required>

        <label>Pengadaan TA II (Nilai):</label>
        <input type="number" name="pengadaan_ta_ii_nilai" value="<?php echo $data['pengadaan_ta_ii_nilai']; ?>" required>

        <label>Pengadaan TA III (Jumlah):</label>
        <input type="number" name="pengadaan_ta_iii_jumlah" value="<?php echo $data['pengadaan_ta_iii_jumlah']; ?>" required>

        <label>Pengadaan TA III (Nilai):</label>
        <input type="number" name="pengadaan_ta_iii_nilai" value="<?php echo $data['pengadaan_ta_iii_nilai']; ?>" required>

        <label>Penerimaan di Luar Pengadaan (Jumlah):</label>
        <input type="number" name="penerimaan_luar_pengadaan_jumlah" value="<?php echo $data['penerimaan_luar_pengadaan_jumlah']; ?>" required>

        <label>Penerimaan di Luar Pengadaan (Nilai):</label>
        <input type="number" name="penerimaan_luar_pengadaan_nilai" value="<?php echo $data['penerimaan_luar_pengadaan_nilai']; ?>" required>

        <label>Jumlah Pengeluaran (Jumlah):</label>
        <input type="number" name="jumlah_pengeluaran_jumlah" value="<?php echo $data['jumlah_pengeluaran_jumlah']; ?>" required>

        <label>Jumlah Rusak/Kadaluwarsa:</label>
        <input type="number" name="jumlah_rusak_kadaluwarsa" value="<?php echo $data['jumlah_rusak_kadaluwarsa']; ?>" required>

        <label>Harga Satuan:</label>
        <input type="number" name="harga_satuan" value="<?php echo $data['harga_satuan']; ?>" required>

        <label>Kategori Unit:</label>
        <input type="text" name="kategori_unit" value="<?php echo $data['kategori_unit']; ?>" required>

        <label>Keterangan:</label>
        <input type="text" name="keterangan" value="<?php echo $data['keterangan']; ?>" required>

        <button type="submit">Update</button>
    </form>
</body>
</html>
