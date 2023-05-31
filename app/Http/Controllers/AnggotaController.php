<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Anggota;
class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_anggota = DB:: table ('anggota')-> get ();
        return view ('anggota.index', compact ('ar_anggota'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anggota.form');    
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!empty ($request -> foto)){
            $request->validate([
                'file' => 'image|mimes:jpg, jpeg, png|max:2048',
            ]);
            $fileName = $request -> nama.'.'.$request->foto->extension();  
            $request->foto->move(public_path('img/anggota'), $fileName);
    }
    else { // tidak ada upload file
        $fileName = '';
    }

    DB::table('anggota')->insert(
        [ 
            'no_anggota'=>$request->no_anggota,
            'nama'=>$request->nama,
            'gender'=>$request->gender,
            'tempat_lahir'=>$request->tempat_lahir,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'alamat'=>$request->alamat,
            'email'=>$request->email,
            'hp'=>$request->hp,
            'foto'=>$fileName,
        ]);
        //landing page
        return redirect('/anggota');
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
