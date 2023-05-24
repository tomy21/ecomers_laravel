<div class="modal fade" id="modalBarang" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Barang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger d-none"></div>
                <div class="mb-3 row">
                    <label for="sku" class="col-sm-4 col-form-label">No SKU</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control sku" id="sku">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nama_barang" class="col-sm-4 col-form-label">Nama Barang</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control nama_barang" id="nama_barang">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="stock_bagus" class="col-sm-4 col-form-label">Stock Bagus</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control stock_bagus" id="stock_bagus">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="stock_rusak" class="col-sm-4 col-form-label">Stock Rusak</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control stock_rusak" id="stock_rusak">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="qty_keluar" class="col-sm-4 col-form-label">Quntity Keluar</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control qty_keluar" id="qty_keluar">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="harga_barang" class="col-sm-4 col-form-label">Harga Barang</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control harga_barang" id="harga_barang">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="simpanBarang">Simpan</button>
            </div>
        </div>
    </div>
</div>

