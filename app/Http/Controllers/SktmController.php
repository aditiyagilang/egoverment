<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FPDF;

class SktmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(0, 6, "
P E M E R I N T A H   K A B U P A T E N  L U M A J A N G
KECAMATAN LUMAJANG
KELURAHAN KEPUHARJO
Jl. Langsep No. 18 Telp. (0334) 888243
L U M A J A N G

",
0, 'C', false, 20);
        $pdf->Output('generated_pdf.pdf', 'D');
    }
}
