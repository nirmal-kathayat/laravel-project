<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use thiagoalessio\TesseractOCR\TesseractOCR;

class ImageExtractController extends Controller
{
    public function extractImage()
    {
       
        // scanned image
        $imagePath = public_path('photo.jpg');

        $tesseract = new TesseractOCR($imagePath);

        // set the language
        $tesseract->lang('eng');

        // Get the text form image
        $text = $tesseract->run();

        dd($text);
    }
}
