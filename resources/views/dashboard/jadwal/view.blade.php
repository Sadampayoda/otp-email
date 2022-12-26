@extends('dashboard.index')

@section('conten')
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="border-bottom">Jadwal Kelas</h1>
        </div>
    </div>
    <div class="col-6 ms-3 mt-4">
      <a class="btn btn-dark" href="/">Keluar</a>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">jadwal</th>
                <th scope="col">mata pelajaran</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>07:30:00 - 09:00:00</td>
                <td>bahasa indonesia</td>
              </tr>
            </tbody>
          </table>
    </div>
</div>
@endsection