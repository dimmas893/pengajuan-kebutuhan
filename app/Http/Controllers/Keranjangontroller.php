<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\keranjang;
use App\Models\Pengajuan;
use App\Models\Pengajuan_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Keranjangontroller extends Controller
{
    public function index()
    {
        $keranjang = keranjang::where('user_id', Auth::user()->id)->get();
        $barang = Barang::all();
        return view('keranjang.index', compact('keranjang', 'barang'));
    }

    public function store(Request $request)
    {
        $create = [
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'user_id' => Auth::user()->id 
        ];

        Keranjang::create($create);
        return back();
    }

    public function detail()
    {
        $keranjang = keranjang::with('barang')->where('user_id', Auth::user()->id)->get();
        return view('keranjang.detail' , compact('keranjang'));
    }

    public function storePengajuan(Request $request)
    {

    // foreach($keranjang as $p){
        $create = [
            'tanggal' => \Carbon\Carbon::now()->format('D MMMM Y'),
            'user_id_pengajuan' => Auth::user()->id,
        ];

        $pengajuan = Pengajuan::create($create);

        $keranjang = keranjang::where('user_id', Auth::user()->id)->get();
        
        
        $jsonNilai = array();
        foreach ($keranjang as $p) {
            $row =  $p->harga_satuan ;
            array_push($jsonNilai, $row);
            $detail = [
                'pengajuan_id' => $pengajuan->id,
                'barang_id' => $p->barang_id,
                'jumlah_barang' => $p->jumlah,
                'harga_satuan' => $p->harga_satuan,
            ];

            Pengajuan_detail::create($detail);
        }

        Pengajuan::where('id', $pengajuan->id)->update([
            'total_biaya' => array_sum($jsonNilai),
        ]);



       

        // }

        return back();
    }
}
