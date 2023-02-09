<?php
require('fpdf.php');
require_once "classes/database.php";

$databese = new DataBase();
$db = $databese->connect();
$shopId = $_POST["shop"];
$q = "SELECT * FROM `cart` LEFT JOIN `onlineshop` ON `cart`.productId = `onlineshop`.id LEFT JOIN profiles ON cart.userId = profiles.id WHERE shoppingId = '$shopId'";
$result = $db->query($q);
$row = $result->fetch_assoc();
$name_surname = $row["namee"] . " " . $row["surname"];
$dateAndTime = $row["dateAndTime"];
$date = new DateTime($dateAndTime);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);
$pdf->Cell(40,10, "Kupovina $shopId", 0, 1);
$pdf->SetFont('Arial','I',13);
$pdf->Cell(40,10, "_____________________________________________________", 0, 1);
$pdf->Cell(80,10, "Korisnik koji je obavio kupovinu: ", 0,0);
$pdf->Cell(40,10,$name_surname,0,1);
$pdf->Cell(80,10, "Datum kupovine: ", 0,0);
$pdf->Cell(40,10,$date->format('d.m.Y'),0,1);
$pdf->Cell(80,10, "Vreme kupovine: ", 0,0);
$pdf->Cell(40,10,$date->format('H:i:s'),0,1);
$pdf->Cell(80,10, "Kupljeni proizvodi: ", 0,1);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(40,10, 'Ime proizvoda',0,0,'R');
$pdf->Cell(50,10, 'Kolicina',0,1,'R');
$pdf->SetFont('Arial','I',13);
foreach($result as $rows){
    $pdf->Cell(40,10, $rows["title"],0,0,'R');
    $pdf->Cell(50,10, $rows["amount"],0,1,'R');
}

$pdf->Output();
?>
