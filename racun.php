<?php
session_start();
include 'database.php';
require('fpdf181/fpdf.php');
require('tfpdf/tfpdf.php');

define('EURO',chr(128));
//utf8_decode();

$pdf = new FPDF();
$pdf->AddPage();


$time = date("d/m/y : H:i:s", strtotime('0 hour',time()));
$pdf->SetTitle ("Racun");
$pdf->SetFont("Times","","16");
$pdf->Cell(70,10,"".$time,0,0,"L");

$pdf->Cell(70,30,"Racun turisticke organizacije",0,1,"L");
$pdf->SetFont("Arial","B","25");
$pdf->Cell(140,5,"Turisticka organizacija",0,0,"L");

$pdf->SetFont("Times","B","14");
$pdf->Cell(20,5,"Telefon:",0,0,"L");
$pdf->SetFont("Times","","14");
$pdf->Cell(35,5,"069-123-456",0,1,"L");


$pdf->SetFont("Arial","B","14");
$pdf->Cell(140,25,"Podgorica",0,0,"L");



$pdf->SetFont("Times","B","14");
$pdf->Cell(20,5,"Fax:",0,0,"R");
$pdf->SetFont("Times","","14");
$pdf->Cell(35,5,"020-123-456",0,1,"L");

$pdf->SetFont("Arial","B","14");
$pdf->Cell(140,5,"Vojvode Stanka Radonjica 63",0,0,"L");

$pdf->SetFont("Times","B","14");
$pdf->Cell(20,5,"Email:",0,0,"R");

$pdf->SetFont("Times","","14");
$pdf->Cell(35,5,"ito@t-com.me",0,1,"L");

$pdf->SetFont("Arial","B","14");
$pdf->Cell(55,25,"Detalji o registraciji",0,0,"L");
$pdf->Cell(70,25,"",0,0,"L");

$presql = 'SELECT korisnik.ime,korisnik.prezime
            FROM   iznajmljivanje, stanodavac, korisnik
           WHERE   iznajmljivanje.idiz = '.$_SESSION['sky2'].' AND iznajmljivanje.idk = korisnik.idk ';
$preresult = $conn->query($presql);
$prerow = $preresult-> fetch_assoc();
$str = utf8_decode($prerow['prezime']);

$pdf->Cell(55,25,"Informator:". $prerow['ime'] ." ".mb_convert_encoding($str, 'UTF-8', 'iso-8859-2'),0,1,"L");

$pdf->Line(10, 75, 220-20, 75);
$pdf->Line(130, 280,220-20, 280);
$pdf->setFillColor(230,230,230);

$pdf->Cell(65,10,"Datum prijave gosta",0,0,"C",True);

$pdf->Cell(55,10,"Datum odjave gosta",0,0,"C",True);

$pdf->Cell(70,10,"Ukupno trajanje (u danima)",0,1,"C",True);

$sql ='SELECT i.ukupnaCijena,s.adresa,gr.naziv, s.ime as sime, s.prezime as sprezime,g.ime,g.prezime,g.brojPutneIsprave,g.vrstaPutneIsprave,i.datumPrijave, i.datumOdjave
       FROM iznajmljivanje i, gost g, stanodavac s, grad gr
       WHERE  i.idiz = '.$_SESSION['sky2'].' AND g.idg = i.idg AND s.ids = i.ids AND gr.gid =s.grad';
$result = $conn -> query($sql);
$row = $result -> fetch_assoc();


$datetime1 = strtotime($row['datumPrijave']);
$datetime2 = strtotime($row['datumOdjave']);

$secs = $datetime2 - $datetime1;
$days = $secs / 86400;
/*$total=$days * $row['Cijena'];
$temp="";*/



$pdf->SetFont("Arial","B","15");
$pdf->Cell(65,12,$row['datumPrijave'],0,0,"C");
$pdf->Cell(55,12,$row['datumOdjave'],0,0,"C");

if($days > 1){
  $temp ="dana";
}else{
  $temp ="dan";
}

if($row['vrstaPutneIsprave']==1){
  $isprava ="Licna karta";
}
if($row['vrstaPutneIsprave']==2){
  $isprava ="Pasos";
}

$pdf->Cell(70,12,$days." ".$temp,0,1,"C");
$pdf->Cell(50,10,"",0,1,"C");





$pdf->Cell(50,10,"Detalji o Gostu",0,1,"C");
$pdf->Cell(45,10,"Ime",0,0,"C",True);
$pdf->Cell(40,10,"Prezime",0,0,"C",True);
$pdf->Cell(50,10,"Broj putne isprave",0,0,"C",True);
$pdf->Cell(56,10,"Vrsta isprave",0,1,"C",True);

$pdf->Cell(50,10,$row['ime'],0,0,"C");
$pdf->Cell(35,10,$row['prezime'],0,0,"C");
$pdf->Cell(50,10,$row['brojPutneIsprave'],0,0,"C");
$pdf->Cell(50,10, $isprava,0,0,"C");
$pdf->Cell(50,10,"",0,1,"C");
$pdf->Cell(68,10,"",0,1,"C");
$pdf->Cell(68,10,"Detalji o Stanodavcu",0,1,"C");
$pdf->Cell(45,10,"Ime",0,0,"C",True);
$pdf->Cell(40,10,"Prezime",0,0,"C",True);
$pdf->Cell(50,10,"Grad",0,0,"C",True);
$pdf->Cell(50,10,"Adresa",0,0,"C",True);
$pdf->Cell(56,10,"",0,1,"C",True);
$pdf->Cell(50,10,$row['sime'],0,0,"C");
$pdf->Cell(35,10,$row['sprezime'],0,0,"C");
$pdf->Cell(50,10,$row['naziv'],0,0,"C");
$pdf->Cell(50,10,$row['adresa'],0,0,"C");
$pdf->Cell(68,10,"",0,1,"C");
$pdf->Cell(68,10,"",0,1,"C");
$pdf->Cell(50,10,"Ukupna cijena",0,0,"C",True);
$pdf->Cell(68,10,"",0,1,"C");
$pdf->Cell(50,10,$row['ukupnaCijena']." (".EURO.")",0,0,"C");
$pdf->Cell(68,10,"",0,1,"C");
$pdf->Cell(68,10,"",0,1,"C");
$pdf->Cell(135,10,"",0,0,"C");
$pdf->Cell(20,10,$pdf->Image("img/pecat.jpg"),0,1,"C");
$pdf->Output();





 ?>
