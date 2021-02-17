@extends('template')
 
@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Tambah Kontrak Matakuliah</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('kontrakmks.index') }}"> Back</a>
        </div>
    </div>
</div>
 
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Oops!</strong> Anda salah menginputkan data kontrak matakuliah.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 
<form action="{{ route('kontrakmks.store') }}" method="POST">
    @csrf
 
     <div class="row">
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Semester Id:</strong>
                <input type="integer" name="semester_id" class="form-control" placeholder="Semester Id">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
 
</form>
@endsection
