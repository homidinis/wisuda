<?php
include 'conn.php';
require('fpdf/fpdf.php');

$sesi = $_GET['s'];



$sql = "SELECT * FROM ".$prefix."t_wisudawan AS wisudawan LEFT JOIN ".$prefix."t_sesi AS sesi ON wisudawan.sesi = sesi.id WHERE wisudawan.sesi = '$sesi'";
// var_dump($conn);
// die();
$query = mysqli_query($conn, $sql);
$border = 1;
$pdf = new FPDF();
$pdf->SetFont('Arial','B',8);
$i = 0;
while ($row = mysqli_fetch_array($query)) {
    $i++;
    if($i % 12 == 1)
    {
        $pdf->AddPage();
        // warna merah
        if($sesi == 1)
            $pdf->SetFillColor(255,100,100);
        // warna hijau
        else if($sesi == 2) 
            $pdf->SetFillColor(100,255,100);
        // warna biru
    	else if($sesi == 3)
        	$pdf->SetFillColor(200,150,255);
        else if($sesi == 4)
            $pdf->SetFillColor(0,255,255);


    }

    if($i == 13)
        $i = 1;

    $nama_array = explode(" ", $row['nama']);
    if(count($nama_array) <= 2)
        $nama_display = $nama_array[0]." ".$nama_array[1];
    else
        $nama_display = $nama_array[0]." ".$nama_array[1]. " ".$nama_array[2];

    $pdf->Cell(18,10,$row['nim'],$border,0,"C", true);
    $pdf->Cell(60,10,ucwords(strtolower($nama_display)),$border,0,"L", true);
    $pdf->Cell(20,10,'','TLR',0,"L", true);
    $pdf->Cell(20,10,'',$border,0,"L", true);
    $pdf->MultiCell(0,5,'Pengambilan konsumsi oleh 1 orang perwakilan. Setiap wisudawan mendapat 1 paket konsumsi.','TLR',1, true);
    $pdf->Cell(18,10,$row['nomorkursi'],$border,0,"C", true);
    $pdf->Cell(60,10,'Sesi '. $row['sesi']. " - " . $row['display'],$border,0,"L", true);
    $pdf->Cell(20,10,'','LRB',0,"L", true);
    $pdf->Cell(20,10,'',$border,0,"L", true);
    $pdf->MultiCell(0,5,'Panduan lengkap wisuda dapat diakses di wisuda.unika.ac.id/?i='.$row['kodeunik'],'LBR',1, true);

    $pdf->Cell(0,2,'',0,1,"L");
    $posY = 10.5 + (($i-1) * 22);
    $pdf->Image('https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl='.$row['kodeunik'].'&choe=UTF-8',88.5,$posY,19,0,'PNG'); 
    $pdf->Image('img/LogoSCU.png',108.5,$posY,19,0,'PNG');      

}



$pdf->Output();
?>