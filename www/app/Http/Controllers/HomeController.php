<?php

namespace App\Http\Controllers;
use SimpleSoftwareIO\QrCode\BaconQrCodeGenerator;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qrcode = new BaconQrCodeGenerator;
        $qrcode->size(500)->generate('Make a qrcode without Laravel!');
        return view('home', compact('qrcode'));
    }
}
