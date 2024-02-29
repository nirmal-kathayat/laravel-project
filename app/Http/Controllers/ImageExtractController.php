<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use thiagoalessio\TesseractOCR\TesseractOCR;
// use Alimranahmed\LaraOCR\Facades\OCR;

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

        // $imagePath = public_path('pass2.jpeg');
        // $ocrText = OCR::scan($imagePath);
        // // dd($ocrText);

        // $pattern = '/P[^<]NPL[^<]*<<.*?(?=PNPL|\z)/s';
        // if (preg_match($pattern, $ocrText, $matches)) {
        //     $desiredPart = $matches[0];
        //     $desiredPart = trim($desiredPart);
        //     dd($desiredPart);
        // } else {
        //     dd("Not found any desired part in  OCR text.");
        // }
        // dd($ocrText);

       $imagePath = public_path('scan2.png');
       $passText = (new TesseractOCR($imagePath))->run();
    //    dd($passText);

       $pattern = '/P[^<]NPL[^<]*<<.*?(?=PNPL|\z)/s';
       if(preg_match($pattern,$passText,$matches))
       {
        $desiredText = $matches[0];
        $desiredText = trim($desiredText);
        dd($desiredText);
       } else{
        dd('Desired text is not found');
       }
    }
}
