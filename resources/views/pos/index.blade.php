@extends('layouts.template')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="input-group">
                    <input type="search" id="search-bar" class="form-control form-control-lg" placeholder="Cari Barang">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-lg btn-default" id="search-button">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <ul id="search-results" class="list-group" style="display: none;"></ul>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-sm table-striped table-hover" id="table-pos">
                    <thead>
                        <tr>
                            <th>Qty</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="pos-items"></tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Total:</th>
                            <td id="total">0</td>
                        </tr>
                        <tr>
                            <th>Discount</th>
                            <td><input type="number" id="discount" name="discount" value="0"></td>
                        </tr>
                        <tr>
                            <th>Grand Total:</th>
                            <td id="grand-total">0</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12">
            <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit Payment</button>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    const searchBar = document.getElementById('search-bar');
    const searchResults = document.getElementById('search-results');
    const tableBody = document.querySelector('#table-pos tbody');
    let total = 0;

    // searchBar.addEventListener('input', function() {
    //     const query = searchBar.value;

    //     if (query.length > 0) {
    //         fetch(`/search-items?query=${query}`)
    //             .then(response => response.json())
    //             .then(data => {
    //                 searchResults.innerHTML = '';
    //                 if (data.length > 0) {
    //                     data.forEach(item => {
    //                         const li = document.createElement('li');
    //                         li.className = 'list-group-item';
    //                         li.innerHTML = `${item.barang_kode} - ${item.barang_nama} - ${item.harga_jual}`;
    //                         li.onclick = () => addItemToTable(item);
    //                         searchResults.appendChild(li);
    //                     });
    //                     searchResults.style.display = 'block';
    //                 } else {
    //                     const li = document.createElement('li');
    //                     li.className = 'list-group-item';
    //                     li.innerHTML = 'No items found';
    //                     searchResults.appendChild(li);
    //                     searchResults.style.display = 'block';
    //                 }
    //             });
    //     } else {
    //         searchResults.style.display = 'none';
    //     }
    // });
    searchBar.addEventListener('input', function() {
    const query = searchBar.value.trim(); // Menghapus spasi di awal/akhir query

    if (query.length > 0) {
        fetch(`/pos/search-items?query=${query}`)
            .then(response => {
                if (response.status === 404 || response.status === 500) {
                    return [];  // Jika tidak ada data atau terjadi error
                }
                return response.json();
            })
            .then(data => {
                searchResults.innerHTML = '';  // Kosongkan hasil sebelumnya
                if (data.length === 0) {
                    const li = document.createElement('li');
                    li.className = 'list-group-item';
                    li.innerText = 'Tidak ada barang yang ditemukan';
                    searchResults.appendChild(li);
                } else {
                    data.forEach(item => {
                        const li = document.createElement('li');
                        li.className = 'list-group-item';
                        li.innerHTML = `${item.barang_kode} - ${item.barang_nama} - Rp. ${item.harga_jual}`;
                        li.onclick = () => addItemToTable(item);  // Tambahkan barang ke tabel jika diklik
                        searchResults.appendChild(li);
                    });
                }
                searchResults.style.display = 'block';  // Tampilkan hasil pencarian
            })
            .catch(error => {
                console.error('Error:', error);
                searchResults.innerHTML = '<li class="list-group-item">Terjadi kesalahan</li>';
                searchResults.style.display = 'block';
            });
    } else {
        searchResults.style.display = 'none';  // Sembunyikan hasil pencarian jika input kosong
    }
});

    // searchBar.addEventListener('input', function() {
    //     const query = searchBar.value;

    //     if (query.length > 0) {
    //         fetch(`/search-items?query=${query}`)
    //             .then(response => {
    //                 if (response.status === 404) {
    //                     return [];  // Jika tidak ada data
    //                 }
    //                 return response.json();
    //             })
    //             .then(data => {
    //                 searchResults.innerHTML = '';  // Kosongkan hasil sebelumnya
    //                 if (data.length === 0) {
    //                     const li = document.createElement('li');
    //                     li.className = 'list-group-item';
    //                     li.innerText = 'Tidak ada data';
    //                     searchResults.appendChild(li);
    //                 } else {
    //                     data.forEach(item => {
    //                         const li = document.createElement('li');
    //                         li.className = 'list-group-item';
    //                         li.innerHTML = `${item.barang_kode} - ${item.barang_nama} - ${item.harga_jual}`;
    //                         li.onclick = () => addItemToTable(item);
    //                         searchResults.appendChild(li);
    //                     });
    //                 }
    //                 searchResults.style.display = 'block';
    //             })
    //             .catch(error => {
    //                 console.error('Error:', error);
    //             });
    //     } else {
    //         searchResults.style.display = 'none';
    //     }
    // });

    function addItemToTable(item) {
        const qtyInput = `<input type="number" value="1" min="1" onchange="updateSubtotal(this, ${item.harga_jual})" />`;
        const subtotal = item.harga_jual; // Initial subtotal
        const row = `
            <tr>
                <td>${qtyInput}</td>
                <td>${item.barang_kode}</td>
                <td>${item.barang_nama}</td>
                <td>${item.harga_jual}</td>
                <td class="subtotal">${subtotal}</td>
            </tr>
        `;
        tableBody.insertAdjacentHTML('beforeend', row);
        total += subtotal;
        updateTotalDisplay();
        searchResults.style.display = 'none'; // Hide results after adding
    }

    function updateSubtotal(qtyInput, price) {
        const row = qtyInput.closest('tr');
        const qty = qtyInput.value;
        const subtotal = qty * price;
        row.querySelector('.subtotal').innerText = subtotal;
        calculateTotal();
    }

    function calculateTotal() {
        total = Array.from(tableBody.querySelectorAll('.subtotal')).reduce((sum, td) => sum + parseFloat(td.innerText), 0);
        updateTotalDisplay();
    }

    function updateTotalDisplay() {
        document.getElementById('total').innerText = total;
        calculateGrandTotal();
    }

    function calculateGrandTotal() {
        const discount = parseFloat(document.getElementById('discount').value) || 0;
        const grandTotal = total - discount;
        document.getElementById('grand-total').innerText = grandTotal >= 0 ? grandTotal : 0;
    }
</script>
@endpush
