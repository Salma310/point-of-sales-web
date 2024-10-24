<div id="modal-master" class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi Penjualan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Kasir</label>
                <p>{{ $sales->user->nama }}</p>
            </div>
            <div class="form-group">
                <label>Pembeli</label>
                <p>{{ $sales->pembeli }}</p>
            </div>
            <div class="form-group">
                <label>Kode Penjualan</label>
                <p>{{ $sales->penjualan_kode }}</p>
            </div>
            <div class="form-group">
                <label>Tanggal Penjualan</label>
                <p>{{ $sales->penjualan_tanggal }}</p>
            </div>
            <hr>
            <h5>Detail Barang yang Dibeli</h5>
            <table class="table table-bordered table-sm table-striped">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Harga Satuan</th>
                        <th>Qty</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @php $grandTotal = 0; @endphp
                    @foreach($sales->details as $detail)
                        @php $totalHarga = $detail->harga * $detail->jumlah; @endphp
                        <tr>
                            <td>{{ $detail->barang->barang_nama }}</td>
                            <td>{{ number_format($detail->harga, 0, ',', '.') }}</td>
                            <td>{{ $detail->jumlah }}</td>
                            <td>{{ number_format($totalHarga, 0, ',', '.') }}</td>
                        </tr>
                        @php $grandTotal += $totalHarga; @endphp
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-right">Grand Total</th>
                        <th>{{ number_format($grandTotal, 0, ',', '.') }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-warning">Tutup</button>
        </div>
    </div>
</div>

<script>
   function modalAction(url) {
    console.log('Request URL:', url); // Memeriksa URL yang dikirim
    $.get(url, function(response) {
        console.log('Response:', response); // Memeriksa response dari server
        $('#modal-master').html(response);  // Mengganti isi modal dengan response dari server
        $('#modal-master').modal('show');   // Menampilkan modal
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log('Request failed:', textStatus, errorThrown); // Log jika terjadi error
    });
}

</script>
