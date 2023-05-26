<?php

namespace App\Http\Controllers;

use App\Models\galery;
use App\Http\Requests\StoregaleryRequest;
use App\Http\Requests\UpdategaleryRequest;
use Illuminate\Http\Request;
use Alert;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = new galery;
        return view('admin.galery', [
            'title' => 'Galery',
            'name'  => 'Monitoring Galery dan Loker',
            'data'  => $data::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function modalTambah()
    {
        return view('admin.modal.tambahGalery', [
            'namaHeader'    => "Tambah Data",
        ]);
    }
    public function modalEdit(Request $request)
    {
        $data = new galery;
        $id = $request->id;
        $query = $data::where('id', $id)->first();
        return view('admin.modal.editGalery', [
            'namaHeader'    => "Edit Data",
            'name_galery'   => $query->name,
            'desc'          => $query->desc,
            'image'         => $query->image,
            'id'            => $id
        ]);
    }
    public function add(Request $request)
    {
        $data = new galery;
        $request->validate([
            'kegiatan'     => 'required',
            'desc'         => 'required',
            'image'        => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data->name             = $request->kegiatan;
        $data->desc             = $request->desc;
        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('assets/images/galery'), $filename);
            $data->image = $filename;
        }
        $data->save();
        Alert::toast('Data berhasil diinput !', 'success');
        return redirect()->route('admin.galery');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoregaleryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(galery $galery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(galery $galery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdategaleryRequest $request, $id)
    {
        $data = new galery;
        $request->validate([
            'kegiatan'     => 'required',
            'desc'         => 'required',
        ]);

        $field = [
            'name'             => $request->kegiatan,
            'desc'             => $request->desc,
            'image'            => $request->image,
        ];
        $data->where('id',$id)->update($field);
        Alert::toast('Data berhasil diupdate !', 'success');
        return redirect()->route('admin.galery');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = new galery;
        $data->find($id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
