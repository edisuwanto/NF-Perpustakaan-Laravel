@extends('layouts.index')
@section('content')

@php
$no = 1;
$ar_judul = ['No', 'ISBN','Judul','Tahun Cetak', 'Stok','ID Penerbit', 'ID Pengarang', 'Cover', 'Kategori', 'Action'];        
@endphp
<a href = "{{ route('buku.create') }}" class="btn btn-primary">
  Tambah
</a>
<a href="{{ url('bukupdf') }}" class="btn btn-info">
<i class = "fas fa-file-pdf">  Unduh Buku (PDF)</i></a>
<a href="{{ url('exportbuku') }}" class="btn btn-success">
<i class = "fas fa-file-excel">  Unduh Buku (Excel)</i></a>

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Buku Perpustakaan</h6>
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
          @foreach($ar_buku as $buk)  
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $buk->isbn }}</td>
              <td>{{ $buk->judul }}</td>
              <td>{{ $buk->tahun_cetak }}</td>
              <td>{{ $buk->stok }}</td>
            <td>{{ $buk->idpenerbit }}</td>
            <td>{{ $buk->idpengarang }}</td>
            <td>{{ $buk->cover }}</td>
            <td>{{ $buk->kategori_id }}</td>
            <td>
            <form method = "POST" action = "{{ route('buku.destroy', $buk -> id )}}"> 
              @csrf 
              @method ('DELETE')
            <a href="{{ route('buku.show', $buk -> id) }}" ><i class="fas fa-eye"></i></a>&nbsp;
            <a href="{{ route('buku.edit', $buk -> id) }}" ><i class="fas fa-edit"></i></a>&nbsp;
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