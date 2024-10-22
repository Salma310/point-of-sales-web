@extends('layouts.template')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Barang</h3>
        <div class="card-tools">
            {{-- <button onclick="modalAction('{{ url('/stok/import') }}')" class="btn btn-info">Import Barang</button>
            <a href="{{ url('/stok/export_excel') }}" class="btn btn-primary"><i class="fa fa-file-excel"></i> Export Barang</a>
            <a href="{{ url('/stok/export_pdf') }}" class="btn btn-warning"><i class="fa fa-file pdf"></i> Export Barang</a> --}}
            <button onclick="modalAction('{{ url('/stok/create_ajax') }}')" class="btn btn-success">Add New Stock</button>
        </div>
    </div>
    <div class="card-body">
        <!-- Filter Data -->
        {{-- <div id="filter" class="form-horizontal filter-date p-2 border-bottom mb-2">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-group-sm row text-sm mb-0">
                        <label for="filter_date" class="col-md-1 col-form-label">Filter</label>
                        <div class="col-md-3">
                            <select name="filter_kategori" class="form-control form-control-sm filter_kategori">
                                <option value="">- Semua -</option>
                                @foreach($kategori as $l)
                                    <option value="{{ $l->kategori_id }}">{{ $l->kategori_nama }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Kategori Barang</small>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <table class="table table-bordered table-sm table-striped table-hover" id="table-stok">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Tanggal</th>
                    <th>Supplier</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<div id="myModal" class="modal fade animate shake" tabindex="-1" data-backdrop="static" data-keyboard="false" data-width="75%"></div>
@endsection

@push('js')
<script>
    function modalAction(url = ''){
        $('#myModal').load(url, function(){
            $('#myModal').modal('show');
        });
    }

    var tableStok;
    $(document).ready(function(){
        tableStok = $('#table-stok').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": "{{ url('stok/list') }}",
                "dataType": "json",
                "type": "POST",
                "data": function (d) {
                    d.filter_kategori = $('.filter_kategori').val();
                }
            },
            columns: [
                { data: "DT_RowIndex", className: "text-center", width: "5%", orderable: false, searchable: false },
                { data: "barang.barang_kode", className: "", width: "10%", orderable: true, searchable: true },
                { data: "barang.barang_nama", className: "", width: "37%", orderable: true, searchable: true },
                { data: "stok_jumlah", className: "", width: "12%", orderable: true, searchable: true },
                { data: "stok_tanggal", className: "", width: "12%", orderable: true, searchable: false },
                { data: "supplier.supplier_nama", className: "", width: "12%", orderable: true, searchable: false },
                { data: "aksi", className: "text-center", width: "24%", orderable: false, searchable: false }
            ]
        });

        $('#table-barang_filter input').unbind().bind('keyup', function(e){
            if(e.keyCode == 13){ // Enter key
                tableBarang.search(this.value).draw();
            }
        });

        $('.filter_kategori').change(function(){
            tableBarang.draw();
        });
    });
</script>
@endpush
