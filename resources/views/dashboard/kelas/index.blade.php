@extends('dashboard.index')

@section('conten')
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="border-bottom">Kelas</h1>
        </div>
    </div>
    <div class="col-6 ms-3 mt-4">
      <a class="btn btn-dark" href="/">Keluar</a>
      <a class="btn btn-success" href="/">Tambah</a>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">kelas</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>xmipa5</td>
                <td><a class="btn btn-danger" href="/delete">delete</a> </td>
              </tr>
            </tbody>
          </table>
    </div>
</div>
@endsection