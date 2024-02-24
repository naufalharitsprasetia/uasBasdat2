<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class TransaksiController extends Controller
{
    //
    public function index()
    {
        //
        return view('transaksi', [
            'title' => "Transaksi",
            // 'transaksis' => Transaksi::all()
        ]);
    }
    public function store(Request $request)
    {
        // PEMAKAIAN 
        // dd($request);
        $validatedData = [];
        $transaksi_id = Str::uuid();
        $validatedData['transaksi_id'] = $transaksi_id;
        $validatedData['transaksi_user_id'] = auth()->user()->user_id;
        $validatedData['transaksi_created_at'] = now();
        // Store Pemakaian
        DB::table('transaksis')->insert($validatedData);
        // --------------------------------------------------------
        // DETAIL PEMAKAIAN
        $transaksi_detail = $request->validate([
            'detail_transaksi_barang_id.*' => 'required',
            'detail_transaksi_jumlah.*' => 'required|integer',
        ]);
        // Store PemakaianDetail , perulangan
        foreach ($transaksi_detail['detail_transaksi_barang_id'] as $key => $barang) {
            $dataToInsert = [
                // 'detail_transaksi_user_id' => $superadmin->user_id,
                'detail_transaksi_id' => Str::uuid(),
                'detail_transaksi_transaksi_id' => $transaksi_id,
                'detail_transaksi_barang_id' => $barang,
                'detail_transaksi_jumlah' => $transaksi_detail['detail_transaksi_jumlah'][$key],
                'detail_transaksi_created_at' => now(),
            ];
            // Masukkan data ke dalam tabel 'pemakaian_details'
            DB::table('detail_transaksis')->insert($dataToInsert);
        }
        return redirect('/detail-transaksi' . '/' . $transaksi_id)->with('success', 'data Transaksi telah ditambahkan!');
    }
    //

}
