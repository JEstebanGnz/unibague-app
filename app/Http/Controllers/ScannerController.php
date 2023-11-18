<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ScannerController extends Controller
{
    public function scannerView (){
        {
            return Inertia::render('Scanner');
        }
    }
}
