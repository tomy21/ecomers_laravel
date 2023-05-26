@extends('admin.layout.index')

@section('content')
    <h4 class="mt-3">{{ $name }}</h4>
    <div class="card">
        <div class="card-header">
            <span>Table Data Barang</span>
        </div>
        <div class="card-body table-responsive">
            <button class="btn btn-info mb-2 " id="tambahData" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <i class="fas fa-plus"></i>
                <span>Tambah Barang</span>
            </button>
            <table class="table w-100 table-bordered table-striped" id="example">
                <thead>
                    <tr style="font-weight: 700;">
                        <td>No</td>
                        <td>Foto Product</td>
                        <td>Code Barang</td>
                        <td>Nama Barang</td>
                        <td>Qty Barang</td>
                        <td>Qty Keluar</td>
                        <td>Tanggal Masuk</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barang as $y => $x)
                        <tr class="align-middle">
                            <td>{{ ++$y }}</td>
                            <td class="text-center">
                                <img src="{{ asset('assets/images/product/' . $x->images . '') }}"
                                    style="width:50px;border-radius:50%;" class="text-center" alt="" srcset="">
                            </td>
                            <td>{{ $x->sku }}</td>
                            <td>{{ $x->nama_barang }}</td>
                            <td>{{ $x->stock_bagus }}</td>
                            <td>{{ $x->qty_keluar }}</td>
                            <td>{{ $x->created_at }}</td>
                            <td>
                                <button class="btn btn-info editData" data-id="{{ $x->id }}">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button class="btn btn-danger" onclick="deleteData({{ $x->id }})">
                                    <i class="fa fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('admin.modal.tambahBarang')
    @include('admin.modal.editBarang')
@endsection
