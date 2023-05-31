@extends('layouts.index')
@section('content')

@php
$no = 1;
$ar_judul = ['No','Nama', 'E-mail', 'No. HP', 'Foto', 'Action'];        
@endphp
<a href = "{{ route('pengarang.create') }}" class="btn btn-primary">
  Tambah
</a>
<a href="{{ url('pengarangpdf') }}" class="btn btn-info">
<i class = "fas fa-file-pdf">  Unduh Pengarang (PDF)</i></a>
<a href="{{ url('exportpengarang') }}" class="btn btn-success">
<i class = "fas fa-file-excel">  Unduh Pengarang (Excel)</i></a>

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Pengarang Buku</h6>
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
          @foreach($ar_pengarang as $peng)  
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $peng->nama }}</td>
              <td>{{ $peng->email }}</td>
            <td>{{ $peng->hp }}</td>
            @if(!empty($peng->foto))
              <td><img src="{{asset('img/pengarang')}}/{{ $peng->foto }}" width="18%" /></td>
              @else
              <td><img src="{{asset('img')}}/nophoto.png" width="18%" /></td>
              @endif
            <td>
            <form method = "POST" action = "{{ route('pengarang.destroy', $peng -> id )}}"> 
              @csrf 
              @method ('DELETE')
            <a href="{{ route('pengarang.show', $peng -> id) }}" ><i class="fas fa-eye"></i></a>&nbsp;
            <a href="{{ route('pengarang.edit', $peng -> id) }}" ><i class="fas fa-edit"></i></a>&nbsp;
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