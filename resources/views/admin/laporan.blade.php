@extends('admin.layout.index')

@section('content')
    <h4 class="mt-3">{{ $name }}</h4>

    <div class="card">
        <div class="card-header">Tabel {{ $name }}</div>
        <div class="card-body table-responsive">
            <table class="table w-100 table-bordered table-striped" id="example">
                <thead>
                    <tr style="font-weight: 700;">
                        <td>No</td>
                        <td>Id Mamber</td>
                        <td>Nama</td>
                        <td>Email</td>
                        <td>No Tlp</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $y => $x)
                        <tr>
                            <td>{{ ++$y }}</td>
                            <td>{{ $x->id_mamber }}</td>
                            <td>{{ $x->name }}</td>
                            <td>{{ $x->email }}</td>
                            <td>{{ $x->tlp }}</td>
                            <td>
                                <button class="btn btn-info editDataMamber" id="editDataMamber" data-id="{{$x->id}}">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button class="btn btn-danger" onclick="deleteDataKaryawan({{$x->id}})">
                                    <i class="fa fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('admin.modal.editMamber')
@endsection