<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\User;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('home');
    }

    public function adduser(){
        $prod = User::whereIn('tipo', [1,2])->get();
        return view('admin.adduser', ['prod' => $prod]);
    }

    public function adduserpost(Request $request){
        //dd($request);
        $user =  new User();
        $user->name = $request->name;
        $user->cpf = $request->cpf;
        $user->cnpj = $request->cnpj;
        $user->cep = $request->cep;
        $user->endereco = $request->end;
        $user->cidade = $request->cidade;
        $user->tipo = $request->tipo;
        $user->email = $request->email;
        $user->password =  Hash::make($request->password);
        $user->save();
    }
}
