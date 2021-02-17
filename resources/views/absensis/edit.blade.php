@extends('layouts.app')

@section('title', 'Absensi')

@section('content')

<form action="/absensis/{{ $absensi['id'] }}" method="POST">
    @csrf
    @method('PUT')

  <div class="form-group">
    <label for="exampleInputNama">Waktu</label>
    <input type="time" class="form-control" id="exampleInputwaktu" name="waktu_absen" aria-describedby="emailHelp" value="{{ old('waktu_absen') ? old('waktu_absen') : $absensis['waktu_absen'] }}">
    @error('waktu_absen')
    <div class="alert alert-denger">{{$message}}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputNotlp">ID Mahasiswa</label>
    <input type="integer" class="form-control" name="mahasiswa_id" id="exampleInputmahasiswa_id" value="{{ old('mahasiswa_id') ? old('mahasiswa_id') : $absensis['mahasiswa_id'] }}">
    @error('mahasiswa_id')
    <div class="alert alert-denger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputAlamat">ID Mata Kuliah</label>
    <input type="string" class="form-control" name="matakuliah_id" id="exampleInputmatakuliah_id" value="{{ old('matakuliah_id') ? old('matakuliah_id') : $absensis['matakuliah_id'] }}">
    @error('matakuliah_id')
    <div class="alert alert-denger">{{$message}}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputAlamat">Kehadiran</label>
    <input type="string" class="form-control" name="keterangan" id="exampleInputmk" value="{{ old('keterangan') ? old('keterangan') : $absensis['keterangan'] }}">
    @error('keterangan')
    <div class="alert alert-denger">{{$message}}</div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection