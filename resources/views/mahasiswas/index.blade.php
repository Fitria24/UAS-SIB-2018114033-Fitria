@extends('template')
 
@section('content')
<!-- Button trigger modal -->

<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-plus fa-sm text-white-50"></i>
              Tambah Data Mahasiswa
            </button> 
          </div>
          <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Mahasiswa</h2>
            </div>


<table class="table">
  <thead>
    <tr>
    <th scope="col">Id</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
      <th scope="col">No.Telepon</th>
      <th scope="col">Email</th>
      <th scope="col">Aksi</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
        @foreach ($mahasiswas as $post)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $post->nama_mahasiswa}}</td>
            <td>{{ $post->alamat }}</td>
            <td>{{ $post->no_tlp }}</td>
            <td>{{ $post->email }}</td>
            <td class="text-center">
                <form action="{{ route('mahasiswas.destroy',$post->id) }}" method="POST">
 
                    <a class="btn btn-info btn-sm" href="{{ route('mahasiswas.show',$post->id) }}">Tampil Data</a>
 
                    <a class="btn btn-primary btn-sm" href="{{ route('mahasiswas.edit',$post->id) }}">Edit</a>
 
                    @csrf
                    @method('DELETE')
 
                    <td><button class="btn btn-outline-danger">Delete</button></td>
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
        <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/mahasiswas" method="POST">

          @csrf

      <div class="modal-body">
          <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Mahasiswa</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Alamat</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputtext3" class="col-sm-3 col-form-label">No Telepon</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="no_tlp" name="no_tlp">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="email" name="email">
            </div>
          </div>
        
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Input</button>
      </div>
    </form>
    </div>
  </div>
</div>
    {{ $mahasiswas -> links() }}
    </div>
@endsection