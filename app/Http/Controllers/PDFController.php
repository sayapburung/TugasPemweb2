<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\simpanan;
use PDF;
class PDFController extends Controller
{
    //
    public function pdf()
    {
    	$simpanan = simpanan::all();
        $pdf = PDF::loadView('pdf', ['simpanan' => $simpanan]);
        return $pdf -> download('simpanan.pdf');
    }
}
