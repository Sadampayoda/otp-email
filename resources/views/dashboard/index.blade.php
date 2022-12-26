@extends('templete.sidebar')

@section('dashboard')
    <div class="row">
        <div class="col-2 shadow border-end " style="background: #eee; height: 100vh">
            @include('templete.list')
        </div>
        <div class="col-10 mt-5 pt-3 ">
            @yield('conten')
        </div>
    </div>
@endsection


