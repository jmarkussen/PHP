<?php
require_once __DIR__ . '/../vendor/autoload.php';

use setasign\Fpdi\Fpdi;

$pdf = new FPDI();
$pdf->AddPage();

// Fakturamal 
$template = __DIR__ . '/../maler/Innlevering9_fakturamal.pdf';
$pdf->setSourceFile($template);
$tpl = $pdf->importPage(1);
$pdf->useTemplate($tpl, 0, 0, 210);

// Logo øverst på midten
$logo = __DIR__ . '/../maler/logo.png';
$pdf->Image($logo, 80, 10, 50);

$pdf->SetFont('Arial','',12);

// Fakturautsteder 
$pdf->Text(25, 55, 'Fakturautsteder: Fiat AS');

// Kundeinfo 
$pdf->Text(25, 75, 'Kunde: Fia T');
$pdf->Text(25, 85, 'Adresse: Testveien 123, 0123 Oslo');

// Produkt og pris 
$pdf->Text(25, 115, 'Produkt: Biler');
$pdf->Text(140, 115, 'Pris: 100 NOK');

// Totalsum 
$pdf->Text(140, 135, 'Totalsum å betale: 100 NOK');

// Output til nettleser
$pdf->Output('I', 'faktura_utfylt.pdf');
