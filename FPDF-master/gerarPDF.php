<?php
/* 
 * Autor: Jairo dos Santos
 * Estudante do 4º ano de Engenharia Informática
 * Todos os direitos reservados rsrsrs
 */
include './fpdf/fpdf.php';
include './conexao.php';

$pessoas = selectAllPessoa();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,10,utf8_decode('Relatório de cadastros'),0,0,"C");
$pdf->Ln(15);

$pdf->SetFont("Arial","I",10);
#O método cel recebe o seguintes parâmetros(1-Tamanho de linha que vai ocupar,2-Nº de linhas de Altura que vai utilizar,3-Nome da celula )
$pdf->Cell(50,7,"Nome",1,0,"C");
$pdf->Cell(40,7,"Data de Nasc.",1,0,"C");
$pdf->Cell(40,7,"Telefone",1,0,"C");
$pdf->Cell(60,7,  utf8_decode("Endereço"),1,0,"C");
$pdf->Ln();

foreach ($pessoas as $pessoa){
    $pdf->Cell(50,7,utf8_decode($pessoa["nome"]),1,0,"C");
    $pdf->Cell(40,7,  formatoData($pessoa["nascimento"]),1,0,"C");
    $pdf->Cell(40,7,$pessoa["telefone"],1,0,"C");
    $pdf->Cell(60,7,  utf8_decode($pessoa["endereco"]),1,0,"C");
    $pdf->Ln();# este método Indica fim de uma Celula, ou linha
}

$pdf->Output();
