<?php 
    session_start();

    require_once (__DIR__.'/../../lib/fpdf/fpdf.php');
    require_once (__DIR__.'/../mdb/mdbReservaBici.php');

    $idUsuario = $_SESSION['ID_USUARIO'];

    class PDF extends FPDF{
        // Cabecera de página
        function Header(){
            // Logo
            $this->Image('../../view/assets/img/WeBici.png',10,8,33);
            // Arial bold 15
            $this->SetFont('Arial','B',15);
            // Movernos a la derecha
            $this->Cell(80);
            // Título
            $this->Cell(30,10,'Bicicletas reservadas',0,0,'C');
            // Salto de línea
            $this->Ln(20);
            $this->Cell(30,10,'Fecha',1,0,'C');
            $this->Cell(40,10,'H. contratadas',1,0,'C');
            $this->Cell(40,10,'H. entrega',1,0,'C');
            $this->Cell(40,10,'H. devolucion',1,0,'C');
            $this->Cell(20,10,'Estado',1,1,'C');
            
        }

        // Pie de página
        function Footer(){
            // Posición: a 1,5 cm del final
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Número de página
            $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
        }
    }

    $reserva = verReservaPorIdUsuario($idUsuario);

    // Creación del objeto de la clase heredada
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','',12);
    foreach($reserva as $indice => $valor){
        $pdf->Cell(30,10,$reserva[$indice]->fecha,1,0,'C');
        $pdf->Cell(40,10,$reserva[$indice]->horasContratadas,1,0,'C');
        $pdf->Cell(40,10,$reserva[$indice]->horaEntrega,1,0,'C');
        $pdf->Cell(40,10,$reserva[$indice]->horaDevolucion,1,0,'C');
        $pdf->Cell(20,10,$reserva[$indice]->estado,1,1,'C');
    }
    $pdf->Output();
        




