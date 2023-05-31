<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Penerbit;
class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_penerbit = DB:: table ('penerbit')-> get ();
        return view ('penerbit.index', compact ('ar_penerbit'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penerbit.form');    
    
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
            $request->foto->move(public_path('img/penerbit'), $fileName);
    }
    else { // tidak ada upload file
        $fileName = '';
    }

    DB::table('penerbit')->insert(
        [ 
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'email'=>$request->email,
            'website'=>$request->website,
            'telp'=>$request->telp,
            'cp'=>$request->cp,
             ]);
        //landing page
        return redirect('/penerbit');
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
