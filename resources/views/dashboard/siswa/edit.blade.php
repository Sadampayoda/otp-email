@extends('dashboard.index')

@section('conten')
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="border-bottom">Edit Siswa</h1>
        </div>
    </div>
    <form action="/siswa/{{$data->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-6 ms-3 mt-4">
            <div class="mb-3">
                <label for="nama" class="form-label">Pangkat Siswa / Semester</label>
                <input type="text" value="{{$data->pangkat}}" name="pangkat" class="form-control" id="nama" placeholder="Masukan Semester : 1">
            </div>
            <div class="d-grid">
                <button class="btn btn-dark" type="submit">Edit User</button>
            </div>
        </div>
    </form>
</div>
@endsection