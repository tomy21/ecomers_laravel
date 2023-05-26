<div class="modal fade" id="modalKaryawan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $namaHeader }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formTambahKaryawan" action="{{ route('admin.galeryAdd') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="kegiatan" class="col-sm-4 col-form-label">Kegiatan atau Loker</label>
                        <div class="col-sm-8">
                            <select class="form-select @error('kegiatan') is-invalid @enderror" name="kegiatan"
                            id="kegiatan">
                            <option value="">Pilih </option>
                            <option value="Loker"> Loker </option>
                            <option value="Galery"> Galery </option>
                        </select>
                    </div>
                    @error('kegiatan')
                    <div class="is-invalid">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <div class="mb-3 row">
                    <label for="desc" class="col-sm-4 col-form-label">Deskripsi</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control @error('desc') is-invalid @enderror"
                            name="desc" id="desc" required>
                    </div>
                    @error('desc')
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
