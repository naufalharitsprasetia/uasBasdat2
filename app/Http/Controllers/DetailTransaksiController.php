<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use Egulias\EmailValidator\Result\Reason\DetailedReason;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class DetailTransaksiController extends Controller
{
    //
    public function index()
    {
        //
        return view('riwayat-transaksi', [
            'title' => "Log",
            'transaksis' => Transaksi::orderBy('transaksi_created_at', 'DESC')->get()
        ]);
    }
    public function detail($uuid)
    {
        //
        $detail_transaksis = DB::table('transaksi_detail_view')->where('transaksi_id', $uuid)->get();
        $transaksi = Transaksi::where('transaksi_id', $uuid)->first();
        return view('detail-transaksi', [
            'title' => "Log",
            'transaksi' => $transaksi,
            'detail_transaksis' => $detail_transaksis
        ]);
        //     CREATE VIEW transaksi_detail_view AS
        // SELECT 
        //     dt.detail_transaksi_id,
        //     t.transaksi_id,
        //     t.transaksi_user_id,
        //     dt.detail_transaksi_barang_id,
        //     b.barang_nama,
        //     b.barang_harga,
        //     dt.detail_transaksi_jumlah,
        //     (b.barang_harga * dt.detail_transaksi_jumlah) AS total
        // FROM 
        //     detail_transaksis dt 
        // JOIN 
        //     transaksis t ON dt.detail_transaksi_transaksi_id = t.transaksi_id
        // JOIN 
        // barangs b ON dt.detail_transaksi_barang_id = b.barang_id;
    }
    public function print($uuid)
    {
        $detail_transaksis = DB::table('transaksi_detail_view')->where('transaksi_id', $uuid)->get();
        $transaksi = Transaksi::where('transaksi_id', $uuid)->first();

        $pdf = Pdf::loadView('nota', [
            "detail_transaksis" => $detail_transaksis,
            "transaksi" => $transaksi
        ]);
        return $pdf->download('notaTransaksi.pdf');
    }
}
