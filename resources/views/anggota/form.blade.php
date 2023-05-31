@extends('layouts.index')
@section('content')
@php 
$ar_gender = ['Laki-Laki'=>'L','Perempuan'=>'P'];
@endphp
<h3>Form Input Anggota</h3>
{{--
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
--}}

<form class="user" method="POST" action="{{ route('anggota.store')}}"
enctype = "multipart/form-data">
    @csrf
    <div class="form-group">
        <input type="text" name="no_anggota" class="form-control form-control-user @error('no_anggota') is-invalid @enderror"
         placeholder="No Anggota" value = "{{ old('no_anggota')}}">
         @error('no_anggota')
    <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
    <div class="form-group row">
      <div class="col-sm-6 mb-3 mb-sm-0">
        <input type="text" class="form-control form-control-user @error('nama') is-invalid @enderror"
         name="nama" placeholder="Nama" value = "{{ old('nama')}}">
         @error('nama')
    <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>
      <div class="col-sm-6">
      <label>Jenis Kelamin</label> <br/>
      @foreach ($ar_gender as $label => $jk)
        @php 
        $cek = (old ('gender')== $jk ) ? 'checked' : '';
        @endphp
        <div class="form-check form-check-inline">
          <input name="gender" type="radio" class="form-check-input @error ('jk') is-invalid @enderror" value="<?= $jk ?>"> 
          <label class="form-check-label"> <?= $label ?> </label>
        </div>
        @endforeach
        @error ('gender') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-6 mb-3 mb-sm-0">
        <input type="text" class="form-control form-control-user @error('tempat_lahir') is-invalid @enderror"
         name="tempat_lahir" placeholder="Tempat Lahir" value = "{{ old('tempat_lahir')}}">
         @error('tempat_lahir')
    <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-sm-6">
        <input type="date" class="form-control form-control-user @error('tanggal_lahir') is-invalid @enderror"
         name="tanggal_lahir" placeholder="Tanggal Lahir" value = "{{ old('tanggal_lahir')}}">
         @error('tanggal_lahir')
    <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-6 mb-3 mb-sm-0">
      <label>Alamat</label>
      <textarea name="alamat" cols="40" rows="5" class="form-control form-control-user @error('alamat') is-invalid @enderror"> {{ old('alamat')}}</textarea>
      @error('alamat')
    <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control form-control-user @error('email') is-invalid @enderror"
         name="email" placeholder="E-mail" value = "{{ old('email')}}">
         @error('email')
    <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-6 mb-3 mb-sm-0">
        <input type="text" class="form-control form-control-user @error('hp') is-invalid @enderror"
         name="hp" placeholder="No. HP" value = "{{ old('hp')}}">
         @error('hp')
    <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-sm-6">
      <label>Foto</label>
        <input type="file" name="foto" class = "form-control @error ('foto') is-invalid @enderror" value = "{{ old('foto')}}"/>
        @error ('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>
    <button type="submit" name="proses" value="simpan" class="btn btn-primary">
      Simpan
    </button>
  </form>
    
@endsection