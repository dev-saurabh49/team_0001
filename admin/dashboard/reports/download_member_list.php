<?php
require '../../fpdf/fpdf.php'; // Path to FPDF library
include "../../code/db_connection.php";

class PDF extends FPDF
{
    function header()
    {
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, 'Members List Report', 0, 1, 'C');
        $this->Ln(5);
    }

    function footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    function memberTable($header, $data)
    {
        $w = [10, 50, 60, 40, 20]; // Column widths
        // Header
        $this->SetFont('Arial', 'B', 12);
        foreach ($header as $i)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
        $this->Ln();

        // Data
        $this->SetFont('Arial', '', 10);
        foreach ($data as $row) {
            $this->Cell($w[0], 6, $row['id'], 1);
            $this->Cell($w[1], 6, $row['name'], 1);
            $this->Cell($w[2], 6, $row['email'], 1);
            $this->Cell($w[3], 6, $row['phone'], 1);
            $this->Cell($w[4], 6, $row['status'], 1, 0, 'C');
            $this->Ln();
        }
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Fetch members
$result = $conn->query("SELECT id, name, email, phone, status FROM members ORDER BY name");
$members = [];
while ($row = $result->fetch_assoc()) {
    $members[] = $row;
}

$header = ['ID', 'Name', 'Email', 'Phone', 'Status'];

$pdf->memberTable($header, $members);
$pdf->Output('D', 'Members_List.pdf');
exit;
