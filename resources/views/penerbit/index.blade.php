@extends('layouts.index')
@section('content')

@php
$no = 1;
$ar_judul = ['No','Nama','Alamat', 'E-mail','Website', 'Telp', 'Cp', 'Action'];        
@endphp
<a href = "{{ route('penerbit.create') }}" class="btn btn-primary">
  Tambah
</a>
<a href="{{ url('penerbitpdf') }}" class="btn btn-info">
<i class = "fas fa-file-pdf">  Unduh Penerbit (PDF)</i></a>
<a href="{{ url('exportpenerbit') }}" class="btn btn-success">
<i class = "fas fa-file-excel">  Unduh Penerbit (Excel)</i></a>

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Peberbit Buku</h6>
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
          @foreach($ar_penerbit as $pen)  
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $pen->nama }}</td>
              <td>{{ $pen->alamat }}</td>
              <td>{{ $pen->email }}</td>
              <td>{{ $pen->website }}</td>
            <td>{{ $pen->telp }}</td>
            <td>{{ $pen->cp }}</td>
            <td>
            <form method = "POST" action = "{{ route('penerbit.destroy', $pen -> id )}}"> 
              @csrf 
              @method ('DELETE')
            <a href="{{ route('penerbit.show', $pen -> id) }}" ><i class="fas fa-eye"></i></a>&nbsp;
            <a href="{{ route('penerbit.edit', $pen -> id) }}" ><i class="fas fa-edit"></i></a>&nbsp;
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