@extends('dashboard.index')

@section('conten')
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="border-bottom">Tambah Siswa</h1>
        </div>
    </div>
    <form action="/siswa" method="POST">
        @csrf
        <div class="col-6 ms-3 mt-4">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Siswa</label>
                <input type="text" name="name" class="form-control" id="nama" placeholder="Masukan nama siswa">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Siswa</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Masukan Email : exemple@gmail.com">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Masukan Password">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Pangkat Siswa / Semester</label>
                <input type="text" name="pangkat" class="form-control" id="nama" placeholder="Masukan Semester : 1">
            </div>
            <div class="d-grid">
                <button class="btn btn-dark" type="submit">Tambah User</button>
            </div>
        </div>
    </form>
</div>
@endsection