<?php
session_start();        
if(!isset($_SESSION['user'])){header("location:http://localhost/HASHTAG_HOSTEL/index.php");}
if(!isset($_POST['datefrom']))
{header("location:http://localhost/HASHTAG_HOSTEL/gatepass.php");}
$today= date("m/d/Y");
if(date('d', strtotime($today))>date('d', strtotime($_POST['datefrom'])) ||
    date('m', strtotime($today))>date('m', strtotime($_POST['datefrom'])) ||
    date('Y', strtotime($today))>date('Y', strtotime($_POST['datefrom'])) || 
    date('d', strtotime($_POST['datefrom']))>date('d', strtotime($_POST['dateto'])) ||
    date('m', strtotime($_POST['datefrom']))>date('m', strtotime($_POST['dateto'])) ||
    date('Y', strtotime($_POST['datefrom']))>date('Y', strtotime($_POST['dateto'])))
{   
header("location:http://localhost/HASHTAG_HOSTEL/gatepass.php?msg=INVALID INPUT");
}
else{
    
    try{$conn = new PDO('mysql:host=127.0.0.1;dbname=data_hostel',"root","");}   
    catch (Exception $e){die("error connection to database");}
    $stm=$conn->prepare("select * from students_data where email_id=?");
    $stm->execute(array($_SESSION['user']));
    $result=$stm->fetch();
    
    $datefrom=date('d', strtotime($_POST['datefrom'])).'-'.
            date('m', strtotime($_POST['datefrom'])).'-'.
            date('Y', strtotime($_POST['datefrom']));
    $dateto=date('d', strtotime($_POST['dateto'])).'-'.
            date('m', strtotime($_POST['dateto'])).'-'.
            date('Y', strtotime($_POST['dateto']));
    require 'config/fpdf.php';
    $pdf=new FPDF();
    $pdf->SetTitle('Gatepass.pdf');
    $pdf->AddPage();
    $pdf->SetMargins(15.5,20);
    $pdf->SetFont('Arial','','20');
    $width_cell=array(180,50,130);
    $pdf->Cell($width_cell[0],10,'',0,1,'C');
    $pdf->Cell($width_cell[0],15,'HASHTAG HOSTEL - GATEPASS',1,1,'C'); //set hostel name
     $pdf->SetFont('Arial','','16');
    $pdf->Cell($width_cell[1],10,'Name:',1,0,'C');
    $pdf->Cell($width_cell[2],10,$result['name'],1,1,'C');
    $pdf->Cell($width_cell[1],10,'Room No:',1,0,'C');
    $pdf->Cell($width_cell[2],10,$result['room_no'],1,1,'C');
    
    $pdf->Cell($width_cell[1],10,'Date:',1,0,'C');
    $pdf->Cell(65,10,'From: '.$datefrom,1,0,'C');
    $pdf->Cell(65,10,'To: '.$dateto,1,1,'C');
    
    $pdf->Cell($width_cell[1],10,'Contact NO:',1,0,'C');
    $pdf->Cell($width_cell[2],10,$result['contact_no'],1,1,'C');
    $pdf->Cell($width_cell[1],10,'Place:',1,0,'C');
    $pdf->Cell($width_cell[2],10,$_POST['place'],1,1,'C');
    $pdf->Cell($width_cell[1],10,'Reason to leave:',1,0,'C');
    $pdf->Cell($width_cell[2],10,$_POST['reason'],1,1,'C');
    $pdf->Cell($width_cell[0],25,'',0,1); 
    $pdf->SetFont('Arial','','12');
    $pdf->Cell(87,10,'sign of student',0,0,'C');
    $pdf->Cell(68,10,'sign of Authority',0,0,'R');
    $pdf->Line(15.5,130,15.5,90);
    $pdf->Line(195.5,130,195.5,90);
    $pdf->Line(15.5,130,195.5,130);
    $pdf->Cell($width_cell[0],20,'',0,1); 
    $pdf->Cell(180,10,'NOTE: Dont forget to take grant from authority',0,1,'C');

    $pdf->Output('','Gatepass'.$result['reg_no'].'.pdf');

}

