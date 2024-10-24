@extends('layouts.template')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Laporan Penjualan</h3>
        <div class="card-tools">
            <a href="{{ url('/sales/export_pdf') }}" class="btn btn-warning"><i class="fa fa-file-pdf"></i> Export Penjualan</a>
        </div>
    </div>
    <div class="card-body">
        <!-- Filter Data -->
        <div id="filter" class="form-horizontal filter-date p-2 border-bottom mb-2">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-group-sm row text-sm mb-0">
                        <label for="filter_date" class="col-md-1 col-form-label">Filter</label>
                        <div class="col-md-3">
                            <input type="date" name="filter_date" class="form-control form-control-sm filter_date">
                            <small class="form-text text-muted">Tanggal Penjualan</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <table class="table table-bordered table-sm table-striped table-hover" id="table-sales">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Penjualan</th>
                    <th>Pembeli</th>
                    <th>Tanggal Penjualan</th>
                    <th>Total Pembelanjaan</th>
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

    var tableSales;
    $(document).ready(function(){
        tableSales = $('#table-sales').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": "{{ url('sales/list') }}",
                "dataType": "json",
                "type": "GET",
                "data": function (d) {
                    d.filter_date = $('.filter_date').val();
                }
            },
            columns: [
                { data: "DT_RowIndex", className: "text-center", width: "5%", orderable: false, searchable: false },
                { data: "penjualan_kode", className: "", width: "15%", orderable: true, searchable: true },
                { data: "pembeli", className: "", width: "20%", orderable: true, searchable: true },
                { data: "penjualan_tanggal", className: "", width: "15%", orderable: true, searchable: true },
                { data: "total_pembelanjaan", className: "", width: "20%", orderable: true, searchable: false,
                    render: function(data) {
                        return new Intl.NumberFormat('id-ID').format(data);
                    }
                },
                { data: "aksi", className: "text-center", width: "15%", orderable: false, searchable: false }
            ]
        });

        $('#table-sales_filter input').unbind().bind('keyup', function(e){
            if(e.keyCode == 13){
                tableSales.search(this.value).draw();
            }
        });

        $('.filter_date').change(function(){
            tableSales.draw();
        });
    });
</script>
@endpush
