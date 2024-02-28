<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alimranahmed\LaraOCR\Facades\OCR;

class ImageExtractController extends Controller
{

    public function extractImage()
    {
        return view('extractImage.form');
    }

    public function storeExtractImage(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'passport-image' => 'required'
        ]);

        $imagePath = public_path('scan2.png',);
        $ocrText = OCR::scan($imagePath);
        dd($ocrText);
        $pattern = '/PBNPL[^<]*<<.*?(?=PBNPL|\z)/s';
        if (preg_match($pattern, $ocrText, $matches)) {
            $desiredPart = $matches[0];
            $desiredPart = trim($desiredPart);
            dd($desiredPart);
        } else {
            dd("Not found any desired part in  OCR text.");
        }
        dd($ocrText);
    }
}
