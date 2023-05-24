<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ecommers.Modal.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ecommers.Modal.daftar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $dateFormat = strtotime($request->tgl_lahir);

        if (date('Y-d-m', $dateFormat) > date('Y-d-m')) {
            $json = [
                'error' => "Tanggal lahir tidak valid",
            ];
        } else {
            $user = new User;
            $user->id_mamber      = random_int(10000, 999999999999);
            $user->name           = $request->name;
            $user->email          = $request->email;
            $user->password       = bcrypt($request->password);
            $user->tlp            = $request->tlp;
            $user->status         = $request->status;
            $user->tgl_lahir      = $request->tgl_lahir;
            $user->jenis_kelamin  = $request->jeniskelamin;
            $user->wilayah        = $request->wilayah;
            $user->save();


            if ($user->save() == true) {
                $json = [
                    'success' => "Berhasil daftar mamber",
                ];
            } else {
                $json = [
                    'error' => "Gagal daftar mamber",
                ];
            }
        }


        echo json_encode($json);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function loginProses(StoreUserRequest $request)
    {
        Session::flash('email', $request->email);
        $infoLogin  = [
            'email'     => $request->email,
            'password'  => $request->password,
        ];

        if(Auth::attempt($infoLogin)){
            Session::flash('success','Login berhasil');
            $request->session()->regenerate();
            return redirect()->intended('/');
        }else{
            Session::flash('error','Email dan Password salah');
            return back();
        }

        // return back()->with('loginError','Login Gagal');

        
    }

    public function logout(){

        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->intended('/');

    }
}
