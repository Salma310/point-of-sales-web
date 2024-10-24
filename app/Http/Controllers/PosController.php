<?php

namespace App\Http\Controllers;
use App\Models\BarangModel;
use App\Models\KategoriModel;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function index()
    {
        $activeMenu = 'pos';
        $breadcrumb = (object)[
            'title' => 'Point of Sales',
            'list' => ['Home', 'Pos']
        ];
        $kategori = KategoriModel::select('kategori_id', 'kategori_nama')->get();
        
        return view('pos.index', [
            'activeMenu' => $activeMenu,
            'breadcrumb' => $breadcrumb,
            'kategori' => $kategori
        ]);
    }


    public function searchItems(Request $request)
    {
        $query = $request->input('query');
        
        // Jika query kosong, kembalikan array kosong
        if (empty($query)) {
            return response()->json([]);
        }

        // Log query untuk debugging
        Log::info("Search Query: " . $query);

        // Cari barang berdasarkan kode atau nama barang
        $items = BarangModel::where('barang_nama', 'LIKE', '%' . $query . '%')
                    // ->orWhere('barang_nama', 'LIKE', '%' . $query . '%')
                    ->get(['barang_kode', 'barang_nama', 'harga_jual']); // Pilih field yang relevan

        // Log hasil pencarian
        Log::info("Search Results: ", $items->toArray());

        // Kembalikan hasil pencarian sebagai response JSON
        return response()->json($items);
    }

    // public function search(Request $request)
    // {
    //     $query = $request->input('query');

    //     $items = BarangModel::where('barang_nama', 'like', "%$query%")
    //                 ->orWhere('barang_kode', 'like', "%$query%")
    //                 ->get();

    //     if ($items->isEmpty()) {
    //         return response()->json(['message' => 'Tidak ada data'], 404);
    //     }

    //     return response()->json($items);
    // }

    // public function search(Request $request)
    // {
    //     $query = $request->input('query');
    //     $items = BarangModel::where('barang_kode', 'like', "%$query%")
    //         ->orWhere('barang_nama', 'like', "%$query%")
    //         ->get();

    //     if ($items->isNotEmpty()) {
    //         return response()->json($items);
    //     } else {
    //         return response()->json(['message' => 'No items found'], 404);
    //     }
    // }

    // public function searchItems(Request $request)
    // {
    //     $query = $request->input('query');
        
    //     // Ensure the query is not empty
    //     if (empty($query)) {
    //         return response()->json([]);
    //     }
    //     // Log the search query
    //     Log::info("Search Query: " . $query);


    //     // Search for items in the 'barang' table
    //     $items = BarangModel::where('barang_kode', 'LIKE', '%' . $query . '%')
    //                 ->orWhere('barang_nama', 'LIKE', '%' . $query . '%')
    //                 ->get(['barang_kode', 'barang_nama', 'harga_jual']); // Fetch relevant fields

    //     // Log the items returned
    //     Log::info("Search Results: ", $items->toArray());

    //     return response()->json($items);
    // }
}
