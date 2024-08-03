<?php
require 'config.php';

// Mengambil tahun saat ini dan sebelumnya berdasarkan input pengguna
$tahunSaatIni = isset($_GET['tahun']) ? (int)$_GET['tahun'] : (int)date('Y');
$tahunSebelumnya = $tahunSaatIni - 1;

// Query untuk mengambil data tahun sebelumnya
$querySisaSebelumnya = "SELECT id, sisa_akhir_tahun_jumlah, sisa_akhir_tahun_nilai FROM inventory WHERE tahun = $tahunSebelumnya";
$resultSisaSebelumnya = $conn->query($querySisaSebelumnya);
$sisaSebelumnyaData = [];
if ($resultSisaSebelumnya->num_rows > 0) {
    while ($rowSisa = $resultSisaSebelumnya->fetch_assoc()) {
        $sisaSebelumnyaData[$rowSisa['id']] = $rowSisa;
    }
}

// Query untuk mengambil data tahun saat ini
$querySaatIni = "SELECT * FROM inventory WHERE tahun = $tahunSaatIni";
$resultSaatIni = $conn->query($querySaatIni);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Inventory Dashboard - Tahun <?php echo $tahunSaatIni; ?></h1>
    <form method="get" action="">
        <label>Tahun Saat Ini:</label>
        <input type="number" name="tahun" value="<?php echo $tahunSaatIni; ?>" required>
        <button type="submit">Tampilkan</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Sisa Akhir Tahun <?php echo $tahunSebelumnya; ?> (Jumlah)</th>
                <th>Sisa Akhir Tahun <?php echo $tahunSebelumnya; ?> (Nilai)</th>
                <th>Pengadaan TA I (Jumlah)</th>
                <th>Pengadaan TA I (Nilai)</th>
                <th>Pengadaan TA II (Jumlah)</th>
                <th>Pengadaan TA II (Nilai)</th>
                <th>Pengadaan TA III (Jumlah)</th>
                <th>Pengadaan TA III (Nilai)</th>
                <th>Penerimaan di Luar Pengadaan (Jumlah)</th>
                <th>Penerimaan di Luar Pengadaan (Nilai)</th>
                <th>Jumlah Pengeluaran (Jumlah)</th>
                <th>Jumlah Rusak/Kadaluwarsa</th>
                <th>Harga Satuan</th>
                <th>Kategori Unit</th>
                <th>Keterangan</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($resultSaatIni->num_rows > 0): ?>
                <?php while ($row = $resultSaatIni->fetch_assoc()): ?>
                    <?php
                    $id = $row['id'];
                    $sisaJumlahSebelumnya = isset($sisaSebelumnyaData[$id]) ? $sisaSebelumnyaData[$id]['sisa_akhir_tahun_jumlah'] : 0;
                    $sisaNilaiSebelumnya = isset($sisaSebelumnyaData[$id]) ? $sisaSebelumnyaData[$id]['sisa_akhir_tahun_nilai'] : 0;

                    // Menghitung jumlah dan nilai barang yang tersisa tahun ini
                    $sisaJumlahSaatIni = $sisaJumlahSebelumnya + $row['pengadaan_ta_i_jumlah'] + $row['pengadaan_ta_ii_jumlah'] + $row['pengadaan_ta_iii_jumlah'] + $row['penerimaan_luar_pengadaan_jumlah'] - $row['jumlah_pengeluaran_jumlah'] - $row['jumlah_rusak_kadaluwarsa'];
                    $sisaNilaiSaatIni = $sisaNilaiSebelumnya + $row['pengadaan_ta_i_nilai'] + $row['pengadaan_ta_ii_nilai'] + $row['pengadaan_ta_iii_nilai'] + $row['penerimaan_luar_pengadaan_nilai'] - ($row['jumlah_pengeluaran_jumlah'] + $row['jumlah_rusak_kadaluwarsa']) * $row['harga_satuan'];
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nama_barang']; ?></td>
                        <td><?php echo $sisaJumlahSebelumnya; ?></td>
                        <td><?php echo $sisaNilaiSebelumnya; ?></td>
                        <td><?php echo $row['pengadaan_ta_i_jumlah']; ?></td>
                        <td><?php echo $row['pengadaan_ta_i_nilai']; ?></td>
                        <td><?php echo $row['pengadaan_ta_ii_jumlah']; ?></td>
                        <td><?php echo $row['pengadaan_ta_ii_nilai']; ?></td>
                        <td><?php echo $row['pengadaan_ta_iii_jumlah']; ?></td>
                        <td><?php echo $row['pengadaan_ta_iii_nilai']; ?></td>
                        <td><?php echo $row['penerimaan_luar_pengadaan_jumlah']; ?></td>
                        <td><?php echo $row['penerimaan_luar_pengadaan_nilai']; ?></td>
                        <td><?php echo $row['jumlah_pengeluaran_jumlah']; ?></td>
                        <td><?php echo $row['jumlah_rusak_kadaluwarsa']; ?></td>
                        <td><?php echo $row['harga_satuan']; ?></td>
                        <td><?php echo $row['kategori_unit']; ?></td>
                        <td><?php echo $row['keterangan']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="18">Tidak ada data untuk tahun <?php echo $tahunSaatIni; ?></td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    
</body>
</html>
