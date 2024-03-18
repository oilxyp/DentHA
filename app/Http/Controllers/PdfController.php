<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class PdfController extends Controller
{
    public function viewPdf()
    {
        return view('pdf.view');
    }
}
