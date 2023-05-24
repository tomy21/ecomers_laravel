<div class="modal fade" id="modalEditKaryawan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data Karyawan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger d-none"></div>
                <div class="mb-3 row">
                    <label for="name" class="col-sm-4 col-form-label">Nama Karyawan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control name" id="name" value="">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control email" id="email" autocomplete="off" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="password" class="col-sm-4 col-form-label">Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control password" id="password" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="tlp" class="col-sm-4 col-form-label">No Tlp</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control tlp" id="tlp" required>
                    </div>
                </div>
                
                <div class="mb-3 row">
                    <label for="status" class="col-sm-4 col-form-label">Status</label>
                    <div class="col-sm-8">
                        <select class="form-select" name="status" id="status">
                            <option value="">Pilih Status</option>
                            <option value="Sudah Menikah"> Sudah Menikah </option>
                            <option value="Belum Menikah"> Belum Menikah </option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="wilayah" class="col-sm-4 col-form-label">Wilayah</label>
                    <div class="col-sm-8">
                        <select class="form-select" name="wilayah" id="wilayah">
                            <option value="">Pilih Wilayah</option>
                            <option value="Tangerang"> Tangerang </option>
                            <option value="Jakarta"> Jakarta </option>
                            <option value="Bogor"> Bogor </option>
                            <option value="Bekasi"> Bekasi </option>
                            <option value="Depok"> Depok </option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="level" class="col-sm-4 col-form-label">Level</label>
                    <div class="col-sm-8">
                        <select class="form-select" name="level" id="level">
                            <option value="">Pilih Level Karyawan</option>
                            <option value="1"> Admin </option>
                            <option value="2"> Officer </option>
                            <option value="3"> Manager </option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="is_active" class="col-sm-4 col-form-label">Status Karyawan</label>
                    <div class="col-sm-8">
                        <select class="form-select" name="is_active" id="is_active">
                            <option value="">Pilih Status Karyawan</option>
                            <option value="1"> Aktif </option>
                            <option value="0"> Tidak Aktif </option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="file" class="col-sm-4 col-form-label">Upload Gambar</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control file" id="file">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="simpanDataKaryawan">Simpan</button>
            </div>
        </div>
    </div>
</div>
