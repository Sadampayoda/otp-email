@extends('dashboard.index')

@section('conten')
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="border-bottom">Siswa</h1>
        </div>
    </div>
    <div class="col-8 ms-3 mt-4">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        @endif
      <a class="btn btn-danger" href="/siswa">Keluar</a>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Siswa</th>
                <th scope="col">Email</th>
                <th scope="col">Semester</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->pangkat}}</td>
                </tr>
            </tbody>
          </table>
    </div>
</div>
@endsection