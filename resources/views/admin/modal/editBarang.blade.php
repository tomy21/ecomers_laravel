<div class="modal fade editModalBarang" id="editModalBarang" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data Barang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger d-none"></div>
                <div class="mb-3 row">
                    <label for="sku" class="col-sm-4 col-form-label">No SKU</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control sku_up" id="sku_up">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nama_barang" class="col-sm-4 col-form-label">Nama Barang</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control nama_barang_up" id="nama_barang_up">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="stock_bagus" class="col-sm-4 col-form-label">Stock Bagus</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control stock_bagus_up" id="stock_bagus_up">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="stock_rusak" class="col-sm-4 col-form-label">Stock Rusak</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control stock_rusak_up" id="stock_rusak_up">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="qty_keluar" class="col-sm-4 col-form-label">Quntity Keluar</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control qty_keluar_up" id="qty_keluar_up">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="harga_barang" class="col-sm-4 col-form-label">Harga Barang</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control harga_barang_up" id="harga_barang_up">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="file" class="col-sm-4 col-form-label">Upload Gambar</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control file_up" id="file_up" value="">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success updateData" id="updateData">Simpan</button>
            </div>
        </div>
    </div>
</div>
