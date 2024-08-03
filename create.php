<?php
require 'config.php';

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
    $tahun = $_POST['tahun'];

    // Insert data baru
    $query = "INSERT INTO inventory 
        (nama_barang, sisa_akhir_tahun_jumlah, sisa_akhir_tahun_nilai, pengadaan_ta_i_jumlah, pengadaan_ta_i_nilai, pengadaan_ta_ii_jumlah, pengadaan_ta_ii_nilai, pengadaan_ta_iii_jumlah, pengadaan_ta_iii_nilai, penerimaan_luar_pengadaan_jumlah, penerimaan_luar_pengadaan_nilai, jumlah_pengeluaran_jumlah, jumlah_rusak_kadaluwarsa, harga_satuan, kategori_unit, keterangan, tahun) 
        VALUES 
        ('$namaBarang', $sisaAkhirJumlah, $sisaAkhirNilai, $pengadaanIJumlah, $pengadaanINilai, $pengadaanIIJumlah, $pengadaanIINilai, $pengadaanIIIJumlah, $pengadaanIIINilai, $penerimaanJumlah, $penerimaanNilai, $pengeluaranJumlah, $rusakJumlah, $hargaSatuan, '$kategoriUnit', '$keterangan', $tahun)";
    
    if ($conn->query($query)) {
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
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Tambah Barang</h1>
    <form method="post" action="">
        <label>Nama Barang:</label>
        <input type="text" name="nama_barang" required>
        
        <label>Sisa Akhir Tahun (Jumlah):</label>
        <input type="number" name="sisa_akhir_jumlah" required>

        <label>Sisa Akhir Tahun (Nilai):</label>
        <input type="number" name="sisa_akhir_nilai" required>

        <label>Pengadaan TA I (Jumlah):</label>
        <input type="number" name="pengadaan_ta_i_jumlah" required>

        <label>Pengadaan TA I (Nilai):</label>
        <input type="number" name="pengadaan_ta_i_nilai" required>

        <label>Pengadaan TA II (Jumlah):</label>
        <input type="number" name="pengadaan_ta_ii_jumlah" required>

        <label>Pengadaan TA II (Nilai):</label>
        <input type="number" name="pengadaan_ta_ii_nilai" required>

        <label>Pengadaan TA III (Jumlah):</label>
        <input type="number" name="pengadaan_ta_iii_jumlah" required>

        <label>Pengadaan TA III (Nilai):</label>
        <input type="number" name="pengadaan_ta_iii_nilai" required>

        <label>Penerimaan di Luar Pengadaan (Jumlah):</label>
        <input type="number" name="penerimaan_luar_pengadaan_jumlah" required>

        <label>Penerimaan di Luar Pengadaan (Nilai):</label>
        <input type="number" name="penerimaan_luar_pengadaan_nilai" required>

        <label>Jumlah Pengeluaran (Jumlah):</label>
        <input type="number" name="jumlah_pengeluaran_jumlah" required>

        <label>Jumlah Rusak/Kadaluwarsa:</label>
        <input type="number" name="jumlah_rusak_kadaluwarsa" required>

        <label>Harga Satuan:</label>
        <input type="number" name="harga_satuan" required>

        <label>Kategori Unit:</label>
        <input type="text" name="kategori_unit" required>

        <label>Keterangan:</label>
        <input type="text" name="keterangan" required>

        <label>Tahun:</label>
        <input type="number" name="tahun" value="<?php echo date('Y'); ?>" required>

        <button type="submit">Tambah</button>
    </form>
</body>
</html>
