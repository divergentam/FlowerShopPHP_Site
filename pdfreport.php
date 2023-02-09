<?php
require('fpdf.php');
require_once "classes/database.php";

$databese = new DataBase();
$db = $databese->connect();
$productName = $_POST["title"];
$q = "SELECT * FROM `cart` INNER JOIN `onlineshop` ON `cart`.productId = `onlineshop`.id WHERE title = '$productName'";
$result = $db->query($q);
$numProduct = 0;
if($result){
    $numProduct = $result->num_rows;
}
$price = $result->fetch_assoc()["price"]; 
$realPrice = $price * 0.8;
$total = $numProduct * $price;
$earned = $price - $realPrice; 
$totalPlus = $numProduct * $earned;


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);
$pdf->Cell(40,10, "Proizvod - $productName",0,1);
$pdf->SetFont('Arial','I',13);
$pdf->Cell(40,10, "_____________________________________________________", 0, 1);
$pdf->Cell(60, 10, 'Broj kupljenih proizvoda: ');
$pdf->Cell(20,10,$numProduct,0,1);
$pdf->Cell(60, 10, 'Cena proizvoda: ');
$pdf->Cell(20,10,"$price din",0,1);
$pdf->Cell(60, 10, 'Stvarna cena proizvoda: ');
$pdf->Cell(20,10,"$realPrice din",0,1);
$pdf->Cell(60, 10, 'Zaradjeno po proizvodu: ');
$pdf->Cell(20,10,"$earned din",0,1);
$pdf->Cell(120, 10, 'Ukupno: ',0,0,'R');
$pdf->Cell(20,10,"$total din",0,1);
$pdf->Cell(120, 10, 'Ukupno zaradjeno: ',0,0,'R');
$pdf->Cell(20,10,"$totalPlus din",0,1);
$pdf->Output();
?>
