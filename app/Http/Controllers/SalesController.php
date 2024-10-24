<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Facades\DataTables;
use App\Models\BarangModel;
use App\Models\SalesModel;
use App\Models\DetailSalesModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;




use Illuminate\Http\Request;

class SalesController extends Controller
{

    public function index()
    {
        $activeMenu = 'sales';
        $breadcrumb = (object)[
            'title' => 'Data Penjualan',
            'list' => ['Home', 'Sales']
        ];
        
        return view('sales.index', [
            'activeMenu' => $activeMenu,
            'breadcrumb' => $breadcrumb,
        ]);
    }

    public function list(Request $request)
    {
        $sales = SalesModel::with(['details'])
            ->select('penjualan_id', 'user_id', 'pembeli', 'penjualan_kode', 'penjualan_tanggal');

        if ($request->has('filter_date') && !empty($request->filter_date)) {
            $sales->whereDate('penjualan_tanggal', $request->filter_date);
        }

        return DataTables::of($sales)
            ->addIndexColumn()
            ->addColumn('total_pembelanjaan', function ($sales) {
                // Calculate the total amount by summing over the related details
                return $sales->details->sum(function ($detail) {
                    return $detail->harga * $detail->jumlah;
                });
            })
            ->addColumn('aksi', function ($sales) {
                $btn = '<button onclick="modalAction(\''.url('/sales/' . $sales->penjualan_id . '/show_ajax').'\')" class="btn btn-info btn-sm">Detail</button> ';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function show_ajax(string $id)
    {
        $sales = SalesModel::with(['details', 'details.barang', 'user'])->findOrFail($id);

        $breadcrumb = (object)[
            'title' => 'Detail Penjualan',
            'list' => ['Home', 'Sales', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Penjualan'
        ];

        $activeMenu = 'sales';

        return view('sales.show_ajax', [
            'breadcrumb' => $breadcrumb, 
            'page' => $page, 
            'sales' => $sales, 
            'activeMenu' => $activeMenu
        ]);
    }

    public function export_pdf()
    {
        $sales = SalesModel::with(['details', 'details.barang'])
            ->orderBy('penjualan_tanggal')
            ->get();
 
        $pdf = Pdf::loadView('sales.export_pdf', ['sales' => $sales]);
        $pdf->setPaper('a4', 'portrait');
        $pdf->setOption("isRemoteEnabled", true);
        $pdf->render();
 
        return $pdf->stream('Data Penjualan ' . date('Y-m-d H:i:s') . '.pdf');
    } 
}
