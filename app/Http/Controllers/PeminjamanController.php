<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\peminjaman;
class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_peminjaman = DB:: table ('peminjaman')
        ->join('buku','buku.id','=','peminjaman.idbuku')
        ->join('anggota','anggota.id','=','peminjaman.idanggota')
        ->select('peminjaman.*','buku.judul','anggota.nama')
        -> get ();
        return view ('peminjaman.index', compact ('ar_peminjaman'));
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('peminjaman.form');    
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('peminjaman')->insert(
            [ 
                'idbuku'=>$request->buku,
                'idanggota'=>$request->anggota,
                'jml'=>$request->jmlh,
                'tgl_pinjam'=>$request->pinjam,
                'tgl_kembali'=>$request->kembali,
                'keterangan'=>$request->ket,
                ]);
            //landing page
            return redirect('/peminjaman');
        
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
