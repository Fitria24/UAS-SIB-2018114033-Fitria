@extends('template')
@section('title','absensis')
@section('content')
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
<i class="fas fa-plus fa-sm text-white-50"></i>
Tambah Absensi</button>
<div class="card shadow mb-4">
        <div class="card-header py-3">
          <h5 class="m-0 font-weight-bold text">DATA ABSENSI</h5>
        </div>
        <div class="card-body">
          <div class="table-responsive"> 
    <table class="table table-boarded" id="dataTable" width="100%" cellspacing="0">
    <thead>
    <tr>
      <th scope="col">Waktu Absen</th>
      <th scope="col">ID Mahasiswa </th>
      <th scope="col">ID Matakuliah</th>
      <th scope="col">Kehadiran</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>  
  <tbody>
  @foreach ($absensis as $post)
    <tr>
    <td>{{$post->waktu_absen}}</td>
    <td>{!!$post->mahasiswa_id !!}</td>
    <td>{!!$post->matakuliah_id !!}</td>
    <td>{!!$post->keterangan !!}</td>
 </form>
    </tr>
    @endforeach
  </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masukkan Data </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/absensis" method="POST">

          @csrf

  <div class="modal-body">   
  <div class="form-group">
    <label for="exampleInputNama">Waktu</label>
    <input type="time" class="form-control" id="exampleInputwaktu" name="waktu_absen" aria-describedby="emailHelp" >
    @error('waktu_absen')
    <div class="alert alert-denger">{{$message}}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputNotlp">ID Mahasiswa</label>
    <input type="integer" class="form-control" name="mahasiswa_id" id="exampleInputmahasiswa_id" >
    @error('mahasiswa_id')
    <div class="alert alert-denger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputAlamat">ID Mata Kuliah</label>
    <input type="string" class="form-control" name="mahasiswa_id" id="exampleInputmatakuliah_id" >
    @error('matakuliah_id')
    <div class="alert alert-denger">{{$message}}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputAlamat">Kehadiran</label>
    <input type="text" class="form-control" name="keterangan" id="exampleketerangan" >
    @error('keterangan')
    <div class="alert alert-denger">{{$message}}</div>
    @enderror
  </div>
  </div>
    
      <div class="modal-footer">
        <button type ="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type ="submit" class="btn btn-primary">Input</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection

