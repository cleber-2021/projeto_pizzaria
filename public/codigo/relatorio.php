<?php
define ('FPDF_FONTPATH', 'font/');
require('../.././fpdf/fpdf.php');
$servidor = 'localhost';
      $usuario = 'root';
      $senha = 'voale@123';
      $banco = 'projeto_pizzaria';
      $conn = new mysqli($servidor, $usuario, $senha, $banco, "3306");
?>
<table class="table table-dark"><!-- Tabela com registros inseridos -->
<thead>
  <tr>
    <th>Pedido</th>
    <th>Sabor</th>
    <th>Tamanho</th>
    <th>Cliente</th>
    <th>Endereço</th>
    <th>Bairro</th>
    <th>Valor total</th>
     <th colspan="2">Andamento</th>
     <th colspan="1">Ação</th>
  </tr>
</thead>    
<?php

 

$consulta = mysqli_query($conn, "select p.id_pedido, p.tamanho,s.nome_sabor, c.nome, c.endereco,
                                           c.bairro,concat('R$ ',p.valor_total) as valor, s.tipo_sabor,
                                           p.andamento
                                           from pedido p, cliente c, sabor s
                                           where p.id_cli = c.id_cli
                                           and p.id_sabor = s.id_sabor");


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B','16');
$pdf->Cell(140,10,('Relatório de pedidos'),0,0,"c");
$pdf->ln(15);//espaçamento entre linhas 15mm

$pdf->SetFont('Arial','B','12');
$pdf->Cell(70,7,'Pedido',1,0,"C");
$pdf->Cell(70,7,'Sabor',1,0,"C");
$pdf->Cell(70,7,'Cliente',1,0,"C");
$pdf->Cell(70,7,'Bairro',1,0,"C");
$pdf->Cell(70,7,'Rua',1,0,"C");
$pdf->Cell(70,7,'Valor total',1,0,"C");
$pdf->Cell(70,7,'Status',1,0,"C");
$pdf->ln();//sem espaçamento entre as linhas


while ($registro = mysqli_fetch_array($consulta)){ 

  $pdf->Cell(70,7,$registro['id_pedido'],1,0,"C");
  $pdf->Cell(70,7,$registro['nome_sabor'],1,0,"C");
  $pdf->Cell(70,7,$registro['tamanho'],1,0,"C");
  $pdf->Cell(70,7,$registro['nome'],1,0,"C");
  $pdf->Cell(70,7,$registro['bairro'],1,0,"C");
  $pdf->Cell(70,7,$registro['endereco'],1,0,"C");
  $pdf->Cell(70,7,$registro['valor'],1,0,"C");
  $pdf->Cell(70,7,$registro['andamento'],1,0,"C");

}


?> $pdf->output();