@extends('layouts.index')
@section('content')

<h3>Form Input Pengarang</h3>
<form class="user" method="POST" action="{{ route('pengarang.store')}}"
enctype = "multipart/form-data">
    @csrf
    <div class="form-group row">
      <div class="col-sm-6 mb-3 mb-sm-0">
        <input type="text" class="form-control form-control-user @error('nama') is-invalid @enderror"
         name="nama" placeholder="Nama" value = "{{ old('nama')}}">
         @error('nama')
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
      <label> Foto</label><br/>
          <input type="file" class="form-control @error ('foto') is-invalid @enderror" 
                  name="foto" value = "{{ old('foto')}}"/> 
        @error ('cover') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>
    </div>
    <button type="submit" name="proses" value="simpan" class="btn btn-primary">
      Simpan
    </button>
  </form>
  
@endsection