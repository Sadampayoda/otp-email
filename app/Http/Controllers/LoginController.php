<?php

namespace App\Http\Controllers;

use App\Mail\tokenEmail;
use App\Models\App_log;
// use App\Models\User;
// use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use function PHPSTORM_META\type;

class LoginController extends Controller
{
    public function index()
    {
         
        return view('login.index',[
            'page' => 'Login',
            'TitlePage' => 'Login',
            'icon' => 'unlock-fill',
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
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $dataUser = DB::table('users')
        ->where('email','=',$credentials['email'])
        ->get();
        // return $dataUser[0]->password;
        if(Hash::check($credentials['password'],$dataUser[0]->password)){
            $waktuToken = 05;
            $getTime = date('i');
            $result = (integer) $getTime + $waktuToken;

            $otp = mt_rand(100000, 999999);
            // DB::table('users')->where('id',$dataUser[0]->id)->update([
            //     'otp' => $otp,
            //     'waktu_otp' => date('H:'.$result.':s'),
            //     'tanggal_otp' => now() 
            // ]);
            // $this->data = $dataUser[0]->email;

            $kirimDataUserEmail = [
                'otp' => $otp,
                'nama' => $dataUser[0]->name,
                'tanggal' => date('Y-m-d'),
                'waktu' => date('H:'.$result.':s')
            ];

            // return $kirimDataUserEmail;

            // App_log::create([
            //     'user_id' => $dataUser[0]->id,
            //     'otp' => $otp,
            //     'waktu_otp' => date('H:'.$result.':s'),
            //     'tanggal_otp' => date('Y-m-d'),
            //     'waktu_verify' => NULL,
            //     'tanggal_verify' => NULL,
            //     'status' => NULL,
            // ]);

            Mail::to($request->email)->send(new tokenEmail($kirimDataUserEmail));

            return redirect()->route('token',['email' => $dataUser[0]->email]); 
        }

 
        return redirect('/login')->with('failed','Email / Password anda salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
}

