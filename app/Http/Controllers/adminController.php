<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\User;
use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class adminController extends Controller
{
    public function index()
    {
        return view('admin.beranda', [
            'title' => 'Dashboard',
            'name'  => 'Dashboard',
        ]);
    }
    public function dataBarang()
    {
        $dataBarang = DataBarang::all();
        return view('admin.masterData', [
            'title' => 'Data Barang',
            'name'  => 'Data Barang',
            'barang' => $dataBarang,
        ]);
    }
    public function laporan()
    {
        $dataPelanggan = User::where('is_mamber', 1)->get();
        return view('admin.laporan', [
            'title' => 'Data Pelanggan',
            'name'  => 'Data Pelanggan Mamber',
            'user'  => $dataPelanggan,
        ]);
    }
    public function user()
    {
        $userMamber = User::where('is_admin', 1)->get();
        return view('admin.user', [
            'title' => 'User Management',
            'name'  => 'User Management',
            'data'  => $userMamber,
        ]);
    }

    public function tambahBarang()
    {
        $json = [
            'data'  => view('admin.modal.tambahBarang', [
                'namaHeader'    => "Tambah Data Barang",
            ]),
        ];

        // echo json_encode($json);
        return view('admin.modal.tambahBarang', [
            'namaHeader'    => "Tambah Data Barang",
        ]);
    }

    public function tambahKaryawanModal()
    {
        return view('admin.modal.tambahKaryawan', [
            'namaHeader'    => "Tambah Data Karyawan",
        ]);
    }
    public function tambahKaryawan(Request $request)
    {
        $data = new User;
        $request->validate([
            'name'          => 'required',
            'email'         => 'required|unique',
            'password'      => 'required',
            'tlp'           => 'required',
            'jenisKelamin'  => 'required',
            'status'        => 'required',
            'wilayah'       => 'required',
            'tgl_lahir'     => 'required',
            'image'         => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

            if ($request->level == 1) {
                $c = "admin - " . sprintf('%05d', random_int(0, 99999));
            } else if ($request->level == 2) {
                $c = "officer - " . sprintf('%05d', random_int(0, 99999));
            } else {
                $c = "manager - " . sprintf('%05d', random_int(0, 99999));
            }
            $data->id_mamber        = $c;
            $data->name             = $request->name;
            $data->email            = $request->email;
            $data->password         = bcrypt($request->password);
            $data->tlp              = $request->tlp;
            $data->jenis_kelamin    = $request->jenisKelamin;
            $data->status           = $request->status;
            $data->wilayah          = $request->wilayah;
            $data->tgl_lahir        = $request->tgl_lahir;
            $data->is_admin         = 1;
            $data->is_mamber        = false;
            $data->role             = $request->level;
            if ($request->hasFile('image')) {
                $photo = $request->file('image');
                $filename = time() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('assets/images/user'), $filename);
                $data->images = $filename;
            }
            $data->save();
            Alert::toast('Data berhasil diinput !', 'success');
            return redirect()->route('admin.user');
        
    }
    public function editKaryawanModal($id)
    {
        $data = new User;
        $dataBarang = $data::where('id', $id)->first();

        return response()->json(
            [
                'result'    => [
                    'id'        => $id,
                    'name'      => $dataBarang->name,
                    'email'     => $dataBarang->email,
                    'password'  => Hash::make($dataBarang->password),
                    'tlp'       => $dataBarang->tlp,
                    'status'    => $dataBarang->status,
                    'wilayah'   => $dataBarang->wilayah,
                    'is_active' => $dataBarang->is_active,
                    'level'     => $dataBarang->role,
                    'images'    => $dataBarang->images,
                ]

            ],
            200
        );
    }

    public function updateKaryawan(Request $request, $id)
    {
        $user = new User;
        $field = [
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => $request->password,
            'tlp'       => $request->tlp,
            'status'    => $request->status,
            'wilayah'   => $request->wilayah,
            'is_active' => $request->is_active,
            'role'      => $request->level,
            'images'    => $request->file,

        ];

        $user->where('id', $id)->update($field);
        return response()->json(['success' => "Data berhasil diupdate"]);
    }

    public function deleteKaryawan($id)
    {
        $data = new User;
        // dd($data);
        $data->find($id)->delete();
        return response()->json(['success' => 'Data berhasil dihapus']);
    }

    public function editMamberModal($id)
    {
        $data = new User;
        $dataUser = $data::where('id', $id)->first();

        return response()->json(
            [
                'result'    => [
                    'id'        => $id,
                    'name'      => $dataUser->name,
                    'email'     => $dataUser->email,
                    'password'  => $dataUser->password,
                    'tlp'       => $dataUser->tlp,
                    'status'    => $dataUser->status,
                    'wilayah'   => $dataUser->wilayah,
                    'is_active' => $dataUser->is_active,
                    'images'    => $dataUser->images,
                ]

            ],
            200
        );
    }

    public function updateMamber(Request $request, $id)
    {
        $user = new User;
        $field = [
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => $request->password,
            'tlp'       => $request->tlp,
            'status'    => $request->status,
            'wilayah'   => $request->wilayah,
            'is_active' => $request->is_active,
            'images'    => $request->file,

        ];

        $user->where('id', $id)->update($field);
        return response()->json(['success' => "Data berhasil diupdate"]);
    }

    public function loginAdmin()
    {
        return view('admin.login', [
            'title' => 'Login Admin',
            'name'  => 'Login Admin',
        ]);
    }

    public function loginAdminProses(Request $request)
    {
        Session::flash('email', $request->email);
        $infoLogin  = [
            'email'     => $request->email,
            'password'  => $request->pass,
        ];

        if (Auth::attempt($infoLogin)) {
            Session::flash('success', 'Login berhasil');
            $request->session()->regenerate();
            return redirect()->intended('admin/dashboard');
        } else {
            Session::flash('error', 'Email dan Password salah');
            return back();
        }
    }

    public function logoutAdmin()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/admin');
    }
}
