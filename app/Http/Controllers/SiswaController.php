<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.siswa.index',[        
            'page' => 'Dashboard',
            'TitlePage' => 'Dashboard',
            'icon' => 'house-door',
            'data'=> User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.siswa.tambah',[        
            'page' => 'Dashboard',
            'TitlePage' => 'Dashboard',
            'icon' => 'house-door'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ValidasiDataUser = $request->validate([
            'name' => 'unique:Users|required',
            'email' => 'unique:Users|required',
            'password' => 'required',
            'pangkat' =>'required'
        ]);
        $ValidasiDataUser['password'] = Hash::make($ValidasiDataUser['password']);
        $ValidasiDataUser['level'] = 'siswa';

        User::create($ValidasiDataUser);

        return redirect('/siswa')->with('success','Data User telah succes ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        return view('dashboard.siswa.view',[
            'data' => User::Firstwhere('id',$id),
            'page' => 'Dashboard',
            'TitlePage' => 'Dashboard',
            'icon' => 'house-door'
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.siswa.edit',[
            'page' => 'Dashboard',
            'TitlePage' => 'Dashboard',
            'icon' => 'house-door',
            'data' => User::Firstwhere('id',$id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataLama = User::Firstwhere('id',$id);
        $validasiData = $request->validate([
            'pangkat' =>'required'
        ]);

        

        DB::table('users')->where('id',$id)->update($validasiData);
        return redirect('/siswa')->with('successs','Data User telah succes di edit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect('/siswa')->with('destroy','Catatan anda berhasil di hapus');
    }
}
