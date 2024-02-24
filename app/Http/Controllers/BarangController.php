<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class BarangController extends Controller
{
    //
    public function index()
    {
        //
        $title = 'Data Barang';
        $barangs = Barang::where('barang_is_deleted', false)
            ->when(request('nama'), function ($query, $nama) {
                $query->where('barang_nama', 'like', '%' . $nama . '%');
                return $query;
            })
            ->paginate(6)
            ->withQueryString();
        $total = DB::select('CALL totalBarang()');
        return view('barang', compact('barangs', 'title', 'total'));
    }
    public function create()
    {
        return view('create-barang', [
            'title' => 'Create Barang',
            'active' => 'barang'
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'barang_nama' => 'required|max:255',
            'barang_harga' => 'required',
            'barang_stok' => 'required',
        ]);
        $validatedData['barang_id'] = Str::uuid();

        Barang::create($validatedData);
        // Ambil data log terbaru berdasarkan log_created_at
        $latestLog = Log::latest('log_created_at')->first();

        // Lakukan sesuatu dengan $latestLog, misalnya:
        $logData = auth()->user()->username;

        // Update data log
        // Pastikan menyesuaikan kolom dan nilai yang ingin diupdate
        Log::where('log_created_at', $latestLog->log_created_at)->update([
            'log_username' => $logData,
            // Kolom dan nilai lainnya yang ingin diupdate
        ]);
        return redirect('/barang')->with('success', 'Data Barang baru telah di tambahkan!');
    }
    public function edit($uuid)
    {
        $barang = Barang::find($uuid);
        return view('edit-barang', [
            'title' => 'Edit Barang',
            'active' => 'barang',
            'barang' => $barang
        ]);
    }
    public function update(Request $request, $uuid)
    {
        $validatedData = $request->validate([
            'barang_nama' => 'required|max:255',
            'barang_harga' => 'required',
            'barang_stok' => 'required',
        ]);
        Barang::where('barang_id', $uuid)->update($validatedData);

        // Ambil data log terbaru berdasarkan log_created_at
        $latestLog = Log::latest('log_created_at')->first();

        // Lakukan sesuatu dengan $latestLog, misalnya:
        $logData = auth()->user()->username;

        // Update data log
        // Pastikan menyesuaikan kolom dan nilai yang ingin diupdate
        Log::where('log_created_at', $latestLog->log_created_at)->update([
            'log_username' => $logData,
            // Kolom dan nilai lainnya yang ingin diupdate
        ]);
        return redirect('/barang')->with('success', 'Data Barang telah di perbaharui!');
    }
    public function destroy(Barang $barang)
    {
        $validatedData['barang_is_deleted'] = true;
        Barang::find($barang)->update($validatedData);
        return redirect('/barang')->with('success', 'Data Barang telah di Hapus     !');
    }
}
