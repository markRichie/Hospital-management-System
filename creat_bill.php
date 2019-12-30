<?php

$nic = $_POST['ni'];

//call the FPDF library
require('fpdf182/fpdf.php');




//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

//create pdf object
$pdf = new FPDF('P','mm','A4');
//add new page
$pdf->AddPage();

$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130 ,5,'Asceso Hospitals pvt(ltd)',0,0);
$pdf->Cell(59 ,5,'INVOICE',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130 ,5,'hospital road',0,0);
$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->Cell(130 ,5,'colombo',0,0);
$pdf->Cell(25 ,5,'',0,0);
$pdf->Cell(34 ,5,'',0,1);//end of line

$pdf->Cell(130 ,5,'Phone 0123456789',0,0);
$pdf->Cell(25 ,5,'',0,0);
$pdf->Cell(34 ,5,'',0,1);//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Customer NIC no',0,0);
$pdf->Cell(34 ,5,'',0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//billing address
$pdf->Cell(100 ,5,'',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'',0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'',0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'',0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'',0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130 ,5,'Medicine',1,0);
$pdf->Cell(25 ,5,'qty',1,0);
$pdf->Cell(34 ,5,'Amount',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

$conn = mysqli_connect("localhost", "root", "","hospital_db");
$query = mysqli_query($conn,"select * from presciption where NIC = '$nic'");

$ttl = 0.00;
while ($row = mysqli_fetch_array($query)) {
    $med = $row['medicine'];
    $pdf->Cell(130 ,5,$med,1,0);
    $pdf->Cell(25 ,5,$row['qty'],1,0);


    $query1 = mysqli_query($conn,"select * from medicine where name = '$med'");
    $row1 = mysqli_fetch_array($query1);

    if($row['qty'] > $row1['qty']){
        echo"<script>alert('stock not available')
        window.location.href = 'http://localhost/MSS/pharmacy.php';</script>";
        
    }

    $amt = $row['qty'] * $row1['price'];
    $pdf->Cell(34 ,5,$amt,1,1,'R');

    $ttl = $ttl + $amt;
}



/*$pdf->Cell(130 ,5,'UltraCool Fridge',1,0);
$pdf->Cell(25 ,5,'-',1,0);
$pdf->Cell(34 ,5,'3,250',1,1,'R');//end of line

$pdf->Cell(130 ,5,'Supaclean Diswasher',1,0);
$pdf->Cell(25 ,5,'-',1,0);
$pdf->Cell(34 ,5,'1,200',1,1,'R');//end of line

$pdf->Cell(130 ,5,'Something Else',1,0);
$pdf->Cell(25 ,5,'-',1,0);
$pdf->Cell(34 ,5,'1,000',1,1,'R');//end of line*/

//summary
/*$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'',0,0);
$pdf->Cell(4 ,5,'',1,0);
$pdf->Cell(30 ,5,'',1,1,'');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'',0,0);
$pdf->Cell(4 ,5,'',1,0);
$pdf->Cell(30 ,5,'',1,1,'');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'',0,0);
$pdf->Cell(4 ,5,'',1,0);
$pdf->Cell(30 ,5,'',1,1,'');*///end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Total',0,0);
$pdf->Cell(4 ,5,'rs',1,0);
$pdf->Cell(30 ,5,$ttl,1,1,'R');//end of line
//output the result
$pdf->Output();
?>