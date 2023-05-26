<?php

namespace App\Http\Controllers;

use App\Models\dataBarang;
use App\Http\Requests\StoredataBarangRequest;
use App\Http\Requests\UpdatedataBarangRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Alert;

class DataBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoredataBarangRequest $request)
    {
        $validasi           = Validator::make($request->all(), [
            'sku'           => 'required',
            'nama_barang'   => 'required',
            'stock_bagus'   => 'required',
            'stock_rusak'   => 'required',
            'harga_barang'  => 'required',
            'qty_keluar'    => 'required',
            'image'          => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validasi->fails()) {
            // dd($validasi->errors());die;
            Alert::toast('Data tidak sesuai, periksa kembali inputannya', 'error');
            return redirect()->route('admin.dataBarang');
        } else {
            $data = new DataBarang;
            
            $data->sku            = $request->sku;
            $data->nama_barang    = $request->nama_barang;
            $data->stock_bagus    = $request->stock_bagus;
            $data->stock_rusak    = $request->stock_rusak;
            $data->harga_barang   = $request->harga_barang;
            $data->qty_keluar     = $request->qty_keluar;
            if ($request->hasFile('image')) {
                $photo = $request->file('image');
                $filename = time() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('assets/images/product'), $filename);
                $data->images = $filename;
            }

            $data->save();
            Alert::toast('Data berhasil diinput !', 'success');
            return redirect()->route('admin.dataBarang');
            // return response()->json(['success' => "Data berhasil diinput"], 200);
                        
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DataBarang $dataBarang)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = new DataBarang;
        $dataBarang = $data::where('id', $id)->first();

        return response()->json(
            [
                'result'    => [
                    'id'            => $id,
                    'sku'           => $dataBarang->sku,
                    'nama_barang'   => $dataBarang->nama_barang,
                    'stock_bagus'   => $dataBarang->stock_bagus,
                    'stock_rusak'   => $dataBarang->stock_rusak,
                    'qty_keluar'    => $dataBarang->qty_keluar,
                    'harga_barang'  => $dataBarang->harga_barang,
                    'file'          => $dataBarang->images,
                ]

            ],
            200
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatedataBarangRequest $request, $id)
    {
        $validasi               = Validator::make($request->all(), [
            'sku_up'           => 'required',
            'nama_barang_up'   => 'required',
            'stock_bagus_up'   => 'required',
            'stock_rusak_up'   => 'required',
            'harga_barang_up'  => 'required',
            'qty_keluar_up'    => 'required',
        ], [
            'sku_up.required'           => 'SKU wajib diisi',
            'nama_barang_up.required'   => 'Nama Barang wajib diisi',
            'stock_bagus_up.required'   => 'Stock Bagus wajib diisi',
            'stock_rusak_up.required'   => 'Stock Rusak wajib diisi',
            'harga_barang_up.required'  => 'Harga Barang wajib diisi',
            'qty_keluar_up.required'    => 'Qty Keluar wajib diisi',
        ]);

        if ($validasi->fails()) {
            return response()->json(['errors' => $validasi->errors()]);
        } else {
            $data = new DataBarang;
            $field = [
                'sku'            => $request->sku_up,
                'nama_barang'    => $request->nama_barang_up,
                'stock_bagus'    => $request->stock_bagus_up,
                'stock_rusak'    => $request->stock_rusak_up,
                'harga_barang'   => $request->harga_barang_up,
                'qty_keluar'     => $request->qty_keluar_up,
            ];
            $data->where('id', $id)->update($field);
            return response()->json(['success' => "Data berhasil diupdate"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = new DataBarang;
        // dd($data);
        $data->where('id',$id)->delete();

        return response()->json(['success' => 'Data berhasil dihapus']);

    }
}
