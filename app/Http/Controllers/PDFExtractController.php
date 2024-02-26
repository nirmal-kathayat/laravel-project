<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PDFExtractController extends Controller
{
    public function extractPDF()
    {
        $parser = new \Smalot\PdfParser\Parser();
        $pdf = $parser->parseFile(public_path('sample.pdf'));
        $text = $pdf->getText();
        dd($text);
    }
}
