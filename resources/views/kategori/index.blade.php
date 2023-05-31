@extends('layouts.index')
@section('content')

@php
$no = 1;
$ar_judul = ['No', 'Nama', 'Action'];        
@endphp
<a href = "{{ route('kategori.create') }}" class="btn btn-primary">
  Tambah
</a>
<a href="{{ url('kategoripdf') }}" class="btn btn-info">
<i class = "fas fa-file-pdf">  Unduh kategori (PDF)</i></a>
<a href="{{ url('exportkategori') }}" class="btn btn-success">
<i class = "fas fa-file-excel">  Unduh kategori (Excel)</i></a>

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Kategori Buku Perpustakaan</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
            @foreach( $ar_judul as $jdl )
                <th>{{ $jdl }}</th>
            @endforeach
            </tr>
          </thead>
          <tfoot>
            <tr>
            @foreach( $ar_judul as $jdl )
                <th>{{ $jdl }}</th>
            @endforeach
            </tr>
          </tfoot>
          <tbody>
          @foreach($ar_kategori as $kat)  
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $kat->nama }}</td>
              <td>
            <form method = "POST" action = "{{ route('kategori.destroy', $kat -> id )}}"> 
              @csrf 
              @method ('DELETE')
            <a href="{{ route('kategori.show', $kat -> id) }}" ><i class="fas fa-eye"></i></a>&nbsp;
            <a href="{{ route('kategori.edit', $kat -> id) }}" ><i class="fas fa-edit"></i></a>&nbsp;
          <button type = "submit" onclick = "return confirm ('Yakin dihapus?')">
           <i class = "fas fa-trash-alt"></i>  
</button>
          </form>
              </td>
          </tr>
          @endforeach  
          </tbody>
        </table>
      </div>
    </div>
  </div>    

@endsection