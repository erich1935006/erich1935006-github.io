<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,7,'PRODI INFORMATIKA UNIVERSITAS BATURAJA ',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'DAFTAR MAHASISWA INFORMATIKA',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,6,'NIM',1,0);
$pdf->Cell(40,6,'NAMA MAHASISWA',1,0);
$pdf->Cell(40,6,'JENIS KELAMIN',1,0);
$pdf->Cell(40,6,'ANGKATAN',1,0);
$pdf->Cell(40,6,'TELP',1,1);

$pdf->SetFont('Arial','',10);

include 'koneksi.php';
$mahasiswa = mysqli_query($connect, "select * from siswa");
while ($row = mysqli_fetch_array($mahasiswa)){
    $pdf->Cell(20,6,$row['nim'],1,0);
    $pdf->Cell(40,6,$row['nama'],1,0);
    $pdf->Cell(40,6,$row['jenis_kelamin'],1,0);
    $pdf->Cell(40,6,$row['angkatan'],1,0); 
    $pdf->Cell(40,6,$row['telp'],1,1); 
}

$pdf->Output();
?>
