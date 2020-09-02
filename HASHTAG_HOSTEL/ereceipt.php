<?php
session_start();
if(!isset($_SESSION['user']))
{header("location:http://localhost/HASHTAG_HOSTEL/index.php");}
else{

    try{$conn = new PDO('mysql:host=127.0.0.1;dbname=data_hostel',"root","");}   
    catch (Exception $e){die("error connection to database");}
    $stm=$conn->prepare("select * from students_data where email_id=?");
    $stm->execute(array($_SESSION['user']));
    $result=$stm->fetch();
    $room=$result['room_no'];
    $stm2=$conn->prepare("select * from room_data where room_no=?");
    $stm2->execute(array($room));
    $result2=$stm2->fetch();
    
require 'config/fpdf.php';
$pdf=new FPDF();
$pdf->SetTitle('E_RECEIPT.pdf');
$pdf->AddPage();
$pdf->SetMargins(15.5,20);

$pdf->SetFont('Arial','',20); 
$width_cell=array(180,40,100,140,65,70,90);
$pdf->Cell($width_cell[0],10,'',0,1,'C');
$pdf->Cell($width_cell[0],15,'HASHTAG HOSTEL - E RECEIPTS',1,1,'C'); //set hostel name
$pdf->SetFont('Arial','','13');

$pdf->Cell($width_cell[1],10,'Registration No:',1,0,'C');
$pdf->Cell($width_cell[2],10,$result['reg_no'],1,0,'C');

$pdf->Cell(40,50,'',1,0);
$pdf->Image('profile_pics/'.$result['image'],158,37.5,35,45);
$pdf->Cell($width_cell[1],10,'',0,1);
$pdf->Cell($width_cell[1],10,'Name:',1,0,'C');
$pdf->Cell($width_cell[2],10,$result['name'],1,1,'C');


$pdf->Cell($width_cell[1],10,'Phone No:',1,0,'C');
$pdf->Cell($width_cell[2],10,$result['contact_no'],1,1,'C');
$pdf->Cell($width_cell[5],10,"Course:       ".$result['course'],1,0,'C');
$pdf->Cell($width_cell[5],10,'Sem:       '.$result['sem'],1,1,'C');
$pdf->Cell($width_cell[5],10,"City:       ".$result['city'],1,0,'C');
$pdf->Cell($width_cell[5],10,'State:       '.$result['state'],1,1,'C');

$pdf->Cell($width_cell[6],10,"Birthdate:  ".date('d',strtotime($result['birthdate'])).'/'.date('m',strtotime($result['birthdate'])).'/'.date('Y',strtotime($result['birthdate'])),1,0,'C');
$pdf->Cell($width_cell[6],10,'Emergency Contact No: '.$result['emer_no'],1,1,'C');
$pdf->Cell($width_cell[1],10,'Room No:',1,0,'C');
$pdf->Cell($width_cell[3],10,$result['room_no'],1,1,'C');
$total=$result2['rent']+50000;
$pdf->Cell($width_cell[6],10,"Room Type: ".$result2['type'],1,0,'C');
$pdf->Cell($width_cell[6],10,'Rent: '.$result2['rent'],1,1,'C');
$pdf->Cell($width_cell[6],10,"Food Charges:  40000/-",1,0,'C');
$pdf->Cell($width_cell[6],10,'Service Charges:  10000/-',1,1,'C');
$pdf->Cell($width_cell[1],10,'Total Charges:',1,0,'C');
$pdf->Cell($width_cell[3],10,$total."/-  per year",1,1,'C');
$pdf->Cell($width_cell[1],10,'Date:',1,0,'C');
$pdf->Cell($width_cell[3],10,date('d',time()).' '.date('M',time()).' '.date('Y',time()),1,1,'C');

    $pdf->Cell($width_cell[0],25,'',0,1); 
    $pdf->SetFont('Arial','','12');
    $pdf->Cell(87,10,'sign of student',0,0,'C');
    $pdf->Cell(68,10,'sign of Authority',0,1,'R');
    $pdf->Line(15.5,145,15.5,180);
    $pdf->Line(195.5,145,195.5,180);
    $pdf->Line(15.5,180,195.5,180);

    $pdf->Cell(180,10,'*please dont forget to take grant from authority',0,1,'C');



$pdf->Output('',"E_RECEIPT_".$result['reg_no'].".pdf");
}