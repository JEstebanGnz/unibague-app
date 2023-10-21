<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class QrCodeController extends Controller
{
    public function show()
    {
        $qrCode = QrCode::format('png')->generate('Hello, World!');
        return Inertia::render('NombreDeTuVista', ['qrCode' => $qrCode]);
    }
}
