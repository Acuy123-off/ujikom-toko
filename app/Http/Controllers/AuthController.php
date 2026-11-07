<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('welcome');
    }

    public function postlogin(Request $request){
        $cek = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
    //<input name="email" type="email" class="form-control">

        if(Auth::attempt($cek)){
            $user = Auth::user();

            if($user->role == 'admin'){
                return redirect()->route('adminview');
            }
            else{
                return redirect()->route('menuview');
            }
        }
        return back()->with('error','Email atau password salah');
    }

    public function register(){
        return view('register');
    }

    public function postregister(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required'
        ]);

        //<input name="name" type="text" class="form-control">

        User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>bcrypt($request->password),
        'role'=>'customer'
        ]);

        return redirect()->route('loginview');
    }

    public function admin(){
        $produk = produk::all();
        return view('admin',compact('produk'));
    }

    public function menu()
    {
       $produk = produk::all();
        return view('menu', compact('produk'));
    }

    public function tambah(){
        $kategori = kategori::all();
        return view('tambah',compact('kategori'));
    }

    public function posttambah(Request $request){
        $request->validate([
            'name'=>'required',
            'harga'=>'required|integer',
            'foto'=>'required|image',
            'qty'=>'required|integer',
            'deskripsi'=>'required',
            'kategori_id'=>'required'
        ]);

        produk::create([
        'kategori_id'=>$request->kategori_id,
        'name'=>$request->name,
        'harga'=>$request->harga,
        'desk'=>$request->deskripsi,
        'foto'=>$request->file('foto')->store('foto','public'),
        'qty'=>$request->qty
        ]);
        return redirect()->route('adminview');
    }

    public function hapus(produk $produk){
        $produk->delete();
        return redirect()->route('adminview');
    }

    public function edit(produk $produk){

        $kategori = kategori::all();
        return view('edit',compact('produk','kategori'));
    }

    public function postedit(Request $request,produk $produk){
        $data = $request->validate([
            'name'=>'required',
            'harga'=>'required|integer',
            'foto'=>'required|image',
            'qty'=>'required|integer',
            'desk'=>'required',
            'kategori_id'=>'required'
        ]);

        // if($request->hasFile('foto')){
        //     $data['foto'] = $request->file('foto')->store('foto','public');
        // }
        // else{
        //     unset($data['foto']);
        // }

        $data['foto'] = $request->file('foto')->store('foto','public');
        $produk->update($data);
        return redirect()->route('adminview');
    }
}
