<?php

namespace App\Http\Controllers;

use App\Mail\TokenLagi;
use App\Models\App_log;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class TokenController extends Controller
{

    


    public function index(Request $request)
    {
        return view('login.token',[
            'page' => 'token',
            'TitlePage' => 'Token',
            'icon' => 'unlock-fill',
            'data' => User::Firstwhere('email',$request->email)
        ]);
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    


    public function authenticate(Request $request)
    {
    

        $data = DB::table('users')
        ->where('email','=',$request->email)
        ->get();
        // $credentials = $request->validate([
        //     'email' => ['required', 'email'],
        //     'password' => ['required']
        // ]);
        // $dataAttempt = array(
        //     'email' => $request->email,
        //     'password' => $request->password
        // );
        

        //MELAKUKAN


        // $val = $request->only(['email', 'password']);
        if($request->token == $data[0]->otp){
            if(strtotime($data[0]->tanggal_otp) >= strtotime(date('d-m-y')) && strtotime($data[0]->waktu_otp) >= strtotime(date('H:i:s'))){
                Auth::loginUsingId($data[0]->id);
                App_log::create([
                    'user_id' => $data[0]->id,
                    'otp' => $data[0]->otp,
                    'waktu_otp' => $data[0]->waktu_otp,
                    'tanggal_otp' => $data[0]->tanggal_otp,
                    'tanggal_verify' => date('Y-m-d'),
                    'waktu_verify' => date('H:i:s'),
                    'status' => 'Verify terpenuhi'
                ]);

                $request->session()->regenerate();
        
     
                return redirect('/');
            }
            App_log::create([
                'user_id' => $data[0]->id,
                'otp' => $data[0]->otp,
                'waktu_otp' => $data[0]->waktu_otp,
                'tanggal_otp' => $data[0]->tanggal_otp,
                'tanggal_verify' => date('Y-m-d'),
                'waktu_verify' => date('H:i:s'),
                'status' => 'Verify tidak terpenuhi'
            ]);
            return redirect()->route('token',['email' => $data[0]->email])->with('habis','Token Otp Sudah habis !'); 
            // return Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        }

        return redirect()->route('token',['email' => $data[0]->email])->with('fail','Token Otp Salah !');

    }


    public function Tokenfail(Request $request)
    {
        $dataUser = DB::table('users')
        ->where('email','=',$request->email)
        ->get();

        $kirimDataUserEmail = [
            'otp' => $dataUser[0]->otp,
            'nama' => $dataUser[0]->name
        ];

        Mail::to($request->email)->send(new TokenLagi($kirimDataUserEmail));

        return redirect()->route('token',[
            'email' => $request->email
        ])->with('kirim','Otp sudah dikirim lagi ke email anda');
    }
}
