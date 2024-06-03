<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pembeli;
use App\Models\PemesananMobil;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PreorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PemesananMobil::all();
        return view('pre-order.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $preOrderData = $request->all();
            PemesananMobil::create($preOrderData);
            DB::commit();
            return redirect("pre-order")->with('success', 'Sukses Menambahkan Data');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $preOrder = PemesananMobil::findOrFail($id);
        $data = PemesananMobil::all();
        return view('pre-order.index', compact('preOrder', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $preOrder = PemesananMobil::findOrFail($id);
            $preOrder->nama = $request->input('nama');
            $preOrder->email = $request->input('email');
            $preOrder->telepon = $request->input('telepon');
            $preOrder->jenis_mobil = $request->input('jenis_mobil');
            $preOrder->tanggal_pesan = $request->input('tanggal_pesan');
            $preOrder->save();
            DB::commit();
            return redirect("pre-order")->with('success', 'Sukses Edit Data');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data.')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $preOrder = PemesananMobil::findOrFail($id);
        $preOrder->delete();
        return redirect()->route('pre-order')->with('success', 'Sukses Hapus Data');
    }

    public function export()
    {
        $preorder = PemesananMobil::all();
        $pdf = Pdf::loadview('pre-order.export_pdf', ['data' => $preorder]);
        return $pdf->download('laporan-preorder.pdf');
    }
}
