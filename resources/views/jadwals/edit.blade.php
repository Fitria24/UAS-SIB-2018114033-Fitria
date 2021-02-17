@extends('template')
    
@section('content')
<form action="/jadwals/{{ $jadwal['id'] }}" method="POST">
    @csrf
    @method('PUT')

  <div class="form-group">
    <label for="exampleInputNama">Jadwal</label>
    <input type="string" class="form-control" id="exampleInputwaktu" name="jadwal" value="{{ old('jadwal') ? old('jadwal') : $jadwal['jadwal'] }}">
    @error('jadwal')
    <div class="alert alert-denger">{{$message}}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputAlamat">ID Mata Kuliah</label>
    <input type="integer" class="form-control" name="matakuliah_id" id="exampleInputmk" value="{{ old('matakuliah_id') ? old('matakuliah_id') : $jadwal['matakuliah_id'] }}">
    @error('matakuliah_id')
    <div class="alert alert-denger">{{$message}}</div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection
