<?php


define ('FPDF_FONTPATH', 'font/');
require('fpdf/fpdf.php');
if(!empty($_POST)){

$pdf = new FPDF("P","pt","A4");
$pdf->AddPage();

//Titulo do relatório
if(isset($_POST['codigo'])){
  $pdf->SetFont('Arial','B','18');
  $pdf->Cell(140,10,('PEDIDO - '.$_POST['codigo']),0,0,"c");
  $pdf->ln(40);
}
if(isset($_POST['nome'])){
  $pdf->SetFont('Arial','B','16');
  $pdf->Cell(140,10,$_POST['nome'],0,0,"c");
  $pdf->ln(100);
  }

//Cabeçalho tabela
$pdf->SetFont('Arial','B','12');
$pdf->Cell(50,7,'Sabor',0,0,"C");
$pdf->Cell(100,7,'Tamanho',0,0,"C");
$pdf->Cell(140,7,'Bairro',0,0,"C");
$pdf->Cell(140,7,'Rua',0,0,"C");
$pdf->Cell(150,7,'Status',0,0,"C");
$pdf->ln(50);


// informações do pedido
  if(isset($_POST['sabor'])){

    $pdf->SetFont('Arial','B','8');
    $pdf->Cell(70,10,$_POST['sabor'],1,0,"C");
    
  }
  if(isset($_POST['tamanho'])){    
    $pdf->SetFont('Arial','B','8');
    $pdf->Cell(70,10,$_POST['tamanho'],1,0,"C");
    
  }
  if(isset($_POST['bairro'])){
    $pdf->SetFont('Arial','B','8');
    $pdf->Cell(160,10,$_POST['bairro'],1,0,"C");
  }

  if(isset($_POST['endereco'])){
    $pdf->SetFont('Arial','B','8');
    $pdf->Cell(170,10,$_POST['endereco'],1,0,"C");
  }
  if(isset($_POST['andamento'])){
    $pdf->SetFont('Arial','B','8');
    $pdf->Cell(80,10,$_POST['andamento'],1,0,"C");
  }
  if(isset($_POST['valor'])){
    $pdf->ln(100);
    $pdf->SetFont('Arial','B','16');
    $pdf->Cell(140,10,'TOTAL: ',0,0,"c");
    $pdf->Cell(140,10,$_POST['valor'],0,0,"c");
    
  }
  

}
$pdf->Output();

 ?>