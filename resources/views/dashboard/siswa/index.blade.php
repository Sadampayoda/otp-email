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
        @if (session('successs'))
            <div class="alert alert-success" role="alert">
                {{session('successs')}}
            </div>
        @endif
        @if (session('destroy'))
            <div class="alert alert-success" role="alert">
                {{session('destroy')}}
            </div>
        @endif
      <a class="btn btn-success" href="/siswa/create">Tambah</a>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Siswa</th>
                <th scope="col">Email</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td> <a class="btn btn-primary" href="/siswa/{{$item->id}}">View</a> <a class="btn btn-warning" href="/siswa/{{$item->id}}/edit">Update</a>
                            <form method="POST" action="/siswa/{{$item->id}}">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-danger" type="submit">delete</button>
                            </form>  
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection