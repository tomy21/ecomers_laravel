@extends('admin.layout.index')

@section('content')
    <h4 class="mt-3">{{ $name }}</h4>

    <div class="card">
        <div class="card-header">Tabel {{ $name }}</div>
        <div class="card-body table-responsive">
            <button class="btn btn-info mb-2" id="tambahKaryawan">
                <i class="fa fa-plus"></i>
                Tambah Data
            </button>
            <table class="table w-100 table-bordered table-striped" id="example">
                <thead>
                    <tr style="font-weight: 700;" >
                        <td>No</td>
                        <td>Foto</td>
                        <td>Id Karyawan</td>
                        <td>Nama Karyawan</td>
                        <td>Email</td>
                        <td>Level</td>
                        <td>Status</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $y => $x)
                        <tr class="align-middle text-center">
                            <td>{{ ++$y }}</td>
                            <td>
                                <img src="{{ asset('assets/images/user/' . $x->images . '') }}"
                                    style="width:50px;border-radius:50%;" alt="">
                            </td>
                            <td>{{ $x->id_mamber }}</td>
                            <td>{{ $x->name }}</td>
                            <td>{{ $x->email }}</td>
                            <td>
                                @if ($x->role == 1)
                                    Admin
                                @elseif($x->role == 2)
                                    Officer
                                @else
                                    Manager
                                @endif
                            </td>
                            <td>
                                @if ($x->is_active == 1)
                                    Active
                                @else
                                    Non Active
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-info editDataKaryawan" id="editDataKaryawan"
                                    data-id="{{ $x->id }}">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button class="btn btn-danger" onclick="deleteDataKaryawan({{ $x->id }})">
                                    <i class="fa fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @if (Session::has('success'))
        Swal.fire({
        icon: 'success',
        title: 'Great!',
        text: '{{ Session::get('success') }}'
        })
    @endif


    <div class="tambahKaryawan"></div>
    @include('admin.modal.editKaryawan')
@endsection
