@extends('admin.layout.index')

@section('content')
    <h4 class="mt-3">{{ $name }}</h4>
    <div class="card">
        <div class="card-header">
            <span>Table {{ $name }}</span>
        </div>
        <div class="card-body table-responsive">
            <button class="btn btn-info mb-2 " id="tambahDataGalery" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <i class="fas fa-plus"></i>
                <span>Tambah Kegiatan/Loker</span>
            </button>
            <table class="table w-100 table-bordered table-striped" id="example">
                <thead>
                    <tr style="font-weight: 700;">
                        <td>No</td>
                        <td>Foto</td>
                        <td>Kegiatan/Loker</td>
                        <td>Deskripsi</td>
                        <td>Tanggal Upload</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $x => $y)
                    <tr class="align-middle text-center">
                            <td>{{ ++$x }}</td>
                            <td>
                                <img src="{{ asset('assets/images/galery/' . $y->image . '') }}"
                                    style="width:50px;border-radius:50%;" alt="">
                            </td>
                            <td>{{ $y->name }}</td>
                            <td>{{ $y->desc }}</td>
                            <td>{{ $y->created_at }}</td>
                            <td>
                                <button class="btn btn-success" id="editGalery" onclick="editGalery({{$y->id}})">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger" onclick="deleteGalery({{$y->id}})">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div> 

    <div class="tambahGalery"></div>
    <div class="editGalery"></div>
@endsection
