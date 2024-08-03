<?php
require 'vendor/autoload.php';
require 'config.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$query = "SELECT * FROM inventory";
$result = $conn->query($query);

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set header
$sheet->setCellValue('A1', 'ID')
      ->setCellValue('B1', 'Nama Barang')
      ->setCellValue('C1', 'Sisa Akhir Tahun 2023 (Jumlah)')
      ->setCellValue('D1', 'Sisa Akhir Tahun 2023 (Nilai)')
      ->setCellValue('E1', 'Pengadaan TA 2024 (I) (Jumlah)')
      ->setCellValue('F1', 'Pengadaan TA 2024 (I) (Nilai)')
      ->setCellValue('G1', 'Pengadaan TA 2024 (II) (Jumlah)')
      ->setCellValue('H1', 'Pengadaan TA 2024 (II) (Nilai)')
      ->setCellValue('I1', 'Pengadaan TA 2024 (III) (Jumlah)')
      ->setCellValue('J1', 'Pengadaan TA 2024 (III) (Nilai)')
      ->setCellValue('K1', 'Penerimaan di Luar Pengadaan (Jumlah)')
      ->setCellValue('L1', 'Penerimaan di Luar Pengadaan (Nilai)')
      ->setCellValue('M1', 'Jumlah Pengeluaran 2024 (Jumlah)')
      ->setCellValue('N1', 'Jumlah Rusak/Kadaluwarsa 2024')
      ->setCellValue('O1', 'Sisa (Jumlah)')
      ->setCellValue('P1', 'Sisa (Nilai)')
      ->setCellValue('Q1', 'Harga Satuan')
      ->setCellValue('R1', 'Kategori Unit')
      ->setCellValue('S1', 'Keterangan')
      ->setCellValue('T1', 'Tahun');

$row = 2;
if ($result->num_rows > 0) {
    while ($data = $result->fetch_assoc()) {
        $sheet->setCellValue('A' . $row, $data['id'])
              ->setCellValue('B' . $row, $data['nama_barang'])
              ->setCellValue('C' . $row, $data['sisa_akhir_tahun_2023_jumlah'])
              ->setCellValue('D' . $row, $data['sisa_akhir_tahun_2023_nilai'])
              ->setCellValue('E' . $row, $data['pengadaan_ta_2024_i_jumlah'])
              ->setCellValue('F' . $row, $data['pengadaan_ta_2024_i_nilai'])
              ->setCellValue('G' . $row, $data['pengadaan_ta_2024_ii_jumlah'])
              ->setCellValue('H' . $row, $data['pengadaan_ta_2024_ii_nilai'])
              ->setCellValue('I' . $row, $data['pengadaan_ta_2024_iii_jumlah'])
              ->setCellValue('J' . $row, $data['pengadaan_ta_2024_iii_nilai'])
              ->setCellValue('K' . $row, $data['penerimaan_luar_pengadaan_jumlah'])
              ->setCellValue('L' . $row, $data['penerimaan_luar_pengadaan_nilai'])
              ->setCellValue('M' . $row, $data['jumlah_pengeluaran_2024_jumlah'])
              ->setCellValue('N' . $row, $data['jumlah_rusak_kadaluwarsa_2024'])
              ->setCellValue('O' . $row, $data['sisa_jumlah'])
              ->setCellValue('P' . $row, $data['sisa_nilai'])
              ->setCellValue('Q' . $row, $data['harga_satuan'])
              ->setCellValue('R' . $row, $data['kategori_unit'])
              ->setCellValue('S' . $row, $data['keterangan'])
              ->setCellValue('T' . $row, $data['tahun']);
        $row++;
    }
}

$writer = new Xlsx($spreadsheet);
$filename = 'data_inventory_' . date('Y-m-d') . '.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
exit;
