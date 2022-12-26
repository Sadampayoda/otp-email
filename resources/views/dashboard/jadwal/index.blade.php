@extends('dashboard.index')

@section('conten')
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="border-bottom">Jadwal Kelas</h1>
        </div>
    </div>
    <div class="col-6 ms-3 mt-4">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">hari</th>
                <th scope="col">detail</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Senen</td>
                <td> <a class="btn btn-warning" href="/view">view</a> </td>
              </tr>
            </tbody>
          </table>
    </div>
</div>
@endsection