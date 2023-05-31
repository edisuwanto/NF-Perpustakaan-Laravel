@extends('layouts.index')
@section('content')

@php
$no = 1;
$ar_judul = ['No', 'No anggota', 'Nama','Gender','Tempat lahir','Tanggal lahir','Alamat', 'E-mail', 'No. HP', 'Foto', 'Action'];        
@endphp
<a href = "{{ route('anggota.create') }}" class="btn btn-primary">
  Tambah
</a>
<a href="{{ url('anggotapdf') }}" class="btn btn-info">
<i class = "fas fa-file-pdf">  Unduh anggota (PDF)</i></a>
<a href="{{ url('exportanggota') }}" class="btn btn-success">
<i class = "fas fa-file-excel">  Unduh anggota (Excel)</i></a>

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Anggota Perpustakaan</h6>
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
          @foreach($ar_anggota as $ang)  
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $ang->no_anggota }}</td>              
              <td>{{ $ang->nama }}</td>
              <td>{{ $ang->gender }}</td>
              <td>{{ $ang->tempat_lahir }}</td>
              <td>{{ $ang->tanggal_lahir }}</td>
              <td>{{ $ang->alamat }}</td>
              <td>{{ $ang->email }}</td>
            <td>{{ $ang->hp }}</td>
            @if(!empty($ang->foto))
              <td><img src="{{asset('img/anggota')}}/{{ $ang->foto }}" width="18%" /></td>
              @else
              <td><img src="{{asset('img')}}/nophoto.png" width="18%" /></td>
              @endif
            <td>
            <form method = "POST" action = "{{ route('anggota.destroy', $ang -> id )}}"> 
              @csrf 
              @method ('DELETE')
            <a href="{{ route('anggota.show', $ang -> id) }}" ><i class="fas fa-eye"></i></a>&nbsp;
            <a href="{{ route('anggota.edit', $ang -> id) }}" ><i class="fas fa-edit"></i></a>&nbsp;
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