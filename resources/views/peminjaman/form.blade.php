@extends('layouts.index')
@section('content')
@php
$rs1 = App\Anggota::all();
$rs2 = App\Buku::all();
@endphp
<h3>Form Peminjaman Buku</h3>
<form class="user" method="POST" action="{{route('peminjaman.store')}}" >
@csrf 
<div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
      <label>Nama Anggota</label>
      <select name="anggota" class="form-control @error('anggota') is-invalid @enderror">
          <option value="">--Pilih Anggota--</option>
          @foreach ($rs1 as $got)
          @php
              $sel =(old('anggota')== $got->id) ? 'selected' : '' ;
          @endphp
          <option value="{{$got['id'] }}" {{$sel}}>{{$got['nama'] }}</option>
          
          @endforeach
      </select>
      @error('anggota')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-sm-6">
      <label>Judul Buku</label>
      <select name="buku" class="form-control  @error('buku') is-invalid @enderror">
          <option value="">--Pilih Buku--</option>
          @foreach ($rs2 as $buku)
          @php
              $sel =(old('buku')== $buku->id) ? 'selected' : '' ;
          @endphp
          <option value="{{$buku['id'] }}"  {{$sel}} >{{$buku['judul'] }}</option>
          @endforeach
      </select>
      @error('buku')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
  </div>
    <div class="form-group row">
      <div class="col-sm-6 mb-3 mb-sm-0">
        <label>Tanggal Pinjam</label>
        <input type="date" value="{{old('pinjam')}} " class="form-control form-control-user @error('pinjam') is-invalid @enderror" name="pinjam" placeholder="Tgl Pinjam">
        @error('pinjam')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
      <div class="col-sm-6">
        <label>Tanggal Kembali</label>
        <input type="date" value="{{old('kembali')}} "  class="form-control form-control-user @error('kembali') is-invalid @enderror" name="kembali" placeholder="Tgl Kembali">
        @error('kembali')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
    </div>
    <div class="form-group">
        <input type="text" name="jmlh"  class="form-control form-control-user @error('jmlh') is-invalid @enderror" placeholder="Jumlah Buku">
        @error('jmlh')<div class="invalid-feedback">{{ $message }}</div> @enderror
     </div>
     <div class="form-group">
        <input type="text"  name="ket"  class="form-control form-control-user @error('ket') is-invalid @enderror" placeholder="Keterangan">
        @error('ket')<div class="invalid-feedback">{{ $message }}</div> @enderror
     </div>
 
    <button type="submit" name="proses" value="simpan" class="btn btn-primary btn-user btn-block">
      Simpan
    </button> 
  </form>
@endsection