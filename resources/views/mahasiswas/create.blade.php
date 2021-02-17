@extends('template')
 
@section('content')

<form action="/mahasiswas" method="POST">
@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">nama_mahasiswa</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_mahasiswa" aria-describedby="emailHelp" value="{{old('nama_mahasiswa')}}">
    @error('nama_mahasiswa')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">alamat</label>
    <input type="text" class="form-control" name="alamat" id="exampleInputPassword1" value="{{old('alamat')}}">
    @error('alamat')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">no_tlp</label>
    <input type="text" class="form-control" name="no_tlp" id="exampleInputPassword1" value="{{old('no_tlp')}}">
    @error('no_tlp')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">email</label>
    <input type="text" class="form-control" name="email" id="exampleInputPassword1" value="{{old('email')}}">
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
