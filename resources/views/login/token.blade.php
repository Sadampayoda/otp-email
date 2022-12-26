@extends('templete.html')

@section('conten')

    <div class="row justify-content-center">
        <div class="col-5 ">
            <div class="mb-3 text-center border-bottom">
                <h2>Selamat datang disekolah</h2>
            </div>
            @if (session('fail'))
                <div class="alert alert-danger" role="alert">
                    {{session('fail')}}
                </div>
            @endif
            @if (session('habis'))
                <div class="alert alert-danger" role="alert">
                    {{session('habis')}}
                </div>
            @endif
            <form action="/token" method="POST">
                @csrf
                <input type="hidden" name="password" value="{{$data->password}}">
                <input type="hidden" name="email" value="{{$data->email}}">
                <div class="mb-1">
                    <label for="exampleInputName" class="form-label">token akan dikirim ke email anda  </label>
                    <input name="token" type="number" class="form-control" id="exampleInputName" aria-describedby="emailHelp">
                </div>
                <div class="d-grid mb-2">
                    <button type="submit" class="btn btn-dark">Confirmasi token</button>
                </div>
            </form>
            @if (session('habis'))
                <a class="text-center" href="/login">Login kembali</a>
            @else
                <p id="detik" class="text-center">Jika tidak terkirim tunggu 30 detik lagi</p>
            @endif
        </div>
    </div>
    
    <script >
        let countDetik = document.getElementById('detik')

        let count = 30;

        let waktu = setInterval(() => {
            if(count == 0){
                clearInterval(waktu)
                countDetik.innerHTML = `<form action="/tokenlagi" method="GET"> 
                    <input type="hidden" name="email" value="{{$data->email}}">
                    <button class="btn btn-dark">Clik mendapatkan token lagi</button>
                </form>
                        `
            }else{
                countDetik.innerHTML = `Jika tidak terkirim tunggu ${count} detik lagi` 
                count--
            }
        }, 1000);
    </script>
@endsection