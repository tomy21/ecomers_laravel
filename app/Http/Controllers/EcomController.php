<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Milon\Barcode\DNS1D;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class EcomController extends Controller
{
    public function index()
    {
        return view('ecommers.beranda', [
            'title' => 'Beranda',
        ]);
    }
    public function galery()
    {
        return view('ecommers.galery', [
            'title' => 'Galery',
            'name'  => 'Galery'
        ]);
    }
    public function kontakKami()
    {
        return view('ecommers.kontakKami', [
            'title' => 'Kontak Kami',
            'name'  => 'Kontak Kami'
        ]);
    }
    public function karir()
    {
        return view('ecommers.karir', [
            'title' => 'Karir',
            'name'  => 'Karir'
        ]);
    }
    public function store(Request $request)
    {
        $data['name']           = $request->name;
        $data['email']          = $request->email;
        $data['password']       = $request->password;
        $data['tlp']            = $request->tlp;
        $data['status']         = $request->status;
        $data['jenis_kelamin']  = $request->jeniskelamin;
        $data['wilayah']        = $request->wilayah;
        $data['date']           = $request->date;

        User::insert();
    }
    public function mamber(Request $request){
        // $id = $request->session()->all();
        $id = Auth::id();
        $users = User::where('id', $id)->first();

        $barcode = new DNS1D();
        $barcodeImage = $barcode->getBarcodeHTML($users['id_mamber'], 'C39');
        $qrCode = QrCode::size(90)->generate($users['id_mamber']);

        return view('ecommers.kartuMamber', [
            'title' => 'Kartu Mamber',
            'id_mamber' => $users['id_mamber'],
            'imgMamber' => $barcodeImage,
            'expaired'  => Carbon::parse($users['created_at']->addDays(360))->format('d-m-Y'),
            'qr_Code'   => $qrCode,
        ]);
    }
    public function printKartu()
    {
        $id = Auth::id();
        $users = User::where('id', $id)->first();

        $barcode = new DNS1D();
        $barcodeImage = $barcode->getBarcodeHTML($users['id_mamber'], 'C39');
        $qrCode = QrCode::generate($users['id_mamber']);

        return view('ecommers.printKartu', [
            'title' => 'Print Kartu',
            'id_mamber' => $users['id_mamber'],
            'imgMamber' => $barcodeImage,
            'expaired'  => Carbon::parse($users['created_at']->addDays(360))->format('d-m-Y'),
            'qr_Code'   => $qrCode,
        ]);
        // return view('ecommers.printKartu');
    }
}
