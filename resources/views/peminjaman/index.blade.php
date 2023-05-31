@extends('layouts.index')
@section('content')

@php
$no = 1;
$ar_judul = ['No', 'ID buku', 'ID anggota', 'Jumlah', 'Tanggal Peminjaman', 'Tanggal Kembali', 'Keterangan', 'Action'];        
@endphp
<a href = "{{ route('peminjaman.create') }}" class="btn btn-primary">
  Tambah
</a>
<a href="{{ url('peminjamanpdf') }}" class="btn btn-info">
<i class = "fas fa-file-pdf">  Unduh peminjaman (PDF)</i></a>
<a href="{{ url('exportpeminjaman') }}" class="btn btn-success">
<i class = "fas fa-file-excel">  Unduh peminjaman (Excel)</i></a>

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Peminjaman Buku Perpustakaan</h6>
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
          @foreach($ar_peminjaman as $pem)  
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $pem->idbuku }}</td>
              <td>{{ $pem->idanggota }}</td>
              <td>{{ $pem->jml }}</td>
              <td>{{ $pem->tgl_pinjam }}</td>
              <td>{{ $pem->tgl_kembali }}</td>
              <td>{{ $pem->keterangan }}</td>
              <td>
            <form method = "POST" action = "{{ route('peminjaman.destroy', $pem -> id )}}"> 
              @csrf 
              @method ('DELETE')
            <a href="{{ route('peminjaman.show', $pem -> id) }}" ><i class="fas fa-eye"></i></a>&nbsp;
            <a href="{{ route('peminjaman.edit', $pem -> id) }}" ><i class="fas fa-edit"></i></a>&nbsp;
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