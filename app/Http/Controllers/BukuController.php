<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\buku;
class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_buku = DB:: table ('buku')-> get ();
        return view ('buku.index', compact ('ar_buku'));
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku.form');    
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!empty ($request -> cover)){
            $fileName = $request -> isbn.'.'.$request->cover->extension();  
            $request->cover->move(public_path('img/buku'), $fileName);

        }
        else { // tidak ada upload file
            $fileName = '';
        }

        DB::table('buku')->insert(
            [ 
                'isbn'=>$request->isbn,
                'judul'=>$request->judul,
                'tahun_cetak'=>$request->tahun_cetak,
                'stok'=>$request->stok,
                'idpenerbit'=>$request->penerbit,
                'idpengarang'=>$request->pengarang,
                'kategori_id'=>$request->kategori,
                'cover'=>$fileName,
            ]);
            //landing page
            return redirect('/buku');
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
