@extends('templete.html')

@section('conten')
    <div class="row justify-content-center">
        <div class="col-5 ">
            <div class="mb-3 text-center border-bottom">
                <h2>Selamat datang disekolah</h2>
            </div>
            @if (session('failed'))
                <div class="alert alert-danger" role="alert">
                    {{session('failed')}}
                </div>
            @endif
            
            <form action="/login" method="POST">
                @csrf
                <div class="mb-1">
                    <label for="exampleInputName" class="form-label"><i class="bi bi-person-circle pe-3"></i>Email</label>
                    <input name="email" type="email" class="form-control" id="exampleInputName" aria-describedby="emailHelp">
                </div>
                <div class="mb-2">
                    <label for="exampleInputPassword1" class="form-label"><i class="bi bi-key-fill pe-3"></i>Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="d-grid mb-2">
                    <button type="submit" class="btn btn-dark">Login</button>
                </div>
               
            </form>
        </div>
    </div>
@endsection