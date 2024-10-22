<div id="modal-master" class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Data Barang</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Kategori Barang</label>
                <p>{{ $barang->kategori->kategori_nama }}</p>
            </div>
            <div class="form-group">
                <label>Kode Barang</label>
                <p>{{ $barang->barang_kode }}</p>
            </div>
            <div class="form-group">
                <label>Nama Barang</label>
                <p>{{ $barang->barang_nama }}</p>
            </div>
            <div class="form-group">
                <label>Harga Beli</label>
                <p>{{ number_format($barang->harga_beli, 0, ',', '.') }}</p>
            </div>
            <div class="form-group">
                <label>Harga Jual</label>
                <p>{{ number_format($barang->harga_jual, 0, ',', '.') }}</p>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-warning">Tutup</button>
        </div>
    </div>
</div>
