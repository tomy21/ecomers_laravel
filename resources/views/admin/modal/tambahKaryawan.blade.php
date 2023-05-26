<div class="modal fade" id="modalKaryawan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $namaHeader }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formTambahKaryawan" action="{{ route('admin.tambahKaryawan') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="alert alert-danger d-none"></div>
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-4 col-form-label">Nama Karyawan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" id="name" required>
                        </div>
                        @error('name')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" id="email" autocomplete="off" required>
                        </div>
                        @error('email')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3 row">
                        <label for="password" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" id="password" required>
                        </div>
                        @error('password')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3 row">
                        <label for="tlp" class="col-sm-4 col-form-label">No Tlp</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('tlp') is-invalid @enderror" name="tlp"
                                id="tlp" required>
                        </div>
                        @error('tlp')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3 row">
                        <label for="tgl_lahir" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror"
                                name="tgl_lahir" id="tgl_lahir" required>
                        </div>
                        @error('tgl_lahir')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jenisKelamin" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input @error('jenisKelamin') is-invalid @enderror" type="radio"
                                name="jenisKelamin" id="jenisKelamin" value="Laki-laki" checked>
                            <label class="form-check-label" for="jenisKelamin">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input @error('jenisKelamin') is-invalid @enderror" type="radio"
                                name="jenisKelamin" id="jenisKelamin" value="Perempuan">
                            <label class="form-check-label" for="jenisKelamin">Perempuan</label>
                        </div>
                        @error('jenisKelamin')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="col-sm-4 col-form-label">Status</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input @error('status') is-invalid @enderror" type="radio"
                                name="status" id="status" value="Sudah Menikah" checked>
                            <label class="form-check-label" for="status">Sudah Menikah</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input @error('status') is-invalid @enderror" type="radio"
                                name="status" id="status" value="Belum Menikah">
                            <label class="form-check-label" for="status">Belum Menikah</label>
                        </div>
                        @error('status')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3 row">
                        <label for="wilayah" class="col-sm-4 col-form-label">Wilayah</label>
                        <div class="col-sm-8 ">
                            <select class="form-select @error('wilayah') is-invalid @enderror" name="wilayah"
                                id="wilayah">
                                <option value="">Pilih Wilayah</option>
                                <option value="Tangerang"> Tangerang </option>
                                <option value="Jakarta"> Jakarta </option>
                                <option value="Bogor"> Bogor </option>
                                <option value="Bekasi"> Bekasi </option>
                                <option value="Depok"> Depok </option>
                            </select>
                        </div>
                        @error('wilayah')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3 row">
                        <label for="level" class="col-sm-4 col-form-label">Level</label>
                        <div class="col-sm-8">
                            <select class="form-select @error('level') is-invalid @enderror" name="level"
                                id="level">
                                <option selected>Pilih Level Karyawan</option>
                                <option value="1"> Admin </option>
                                <option value="2"> Officer </option>
                                <option value="3"> Manager </option>
                            </select>
                        </div>
                        @error('level')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3 row">
                        <label for="image" class="col-sm-4 col-form-label">Photo</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                name="image" id="image" required>
                        </div>
                        @error('image')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="simpanDataKaryawan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
