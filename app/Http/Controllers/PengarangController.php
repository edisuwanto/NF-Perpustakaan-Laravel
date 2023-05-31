<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// tambahn untuk menggunakan database dan model
use DB;
use App\Pengarang;

class PengarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_pengarang = DB:: table ('pengarang')-> get ();
        return view ('pengarang.index', compact ('ar_pengarang'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    //hanya untuk tampilkan form insert data
    return view('pengarang.form');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //proses upload file
        if (!empty ($request -> foto)){
            $request->validate([
                'file' => 'image|mimes:jpg, jpeg, png|max:2048',
            ]);
            $fileName = $request -> nama.'.'.$request->foto->extension();  
            $request->foto->move(public_path('img/pengarang'), $fileName);

        }
        else { // tidak ada upload file
            $fileName = '';
        }


        DB::table('pengarang')->insert(
            [ 
                'nama'=>$request->nama,
                'email'=>$request->email,
                'hp'=>$request->hp,
                'foto'=>$fileName,
            ]);
            //landing page
            return redirect('/pengarang');
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
