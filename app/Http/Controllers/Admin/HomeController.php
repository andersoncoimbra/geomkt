<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Cooperativa;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('home');
    }

    public function adduser(){
        $prod = User::whereIn('tipo', [1,2])->get();
        $dados = array(
            'tipocomprador' => 0,
            'nomePagina'=> 'Comprador',
            'nomePaginapl'=> 'Compradores',
        );
        return view('admin.adduser', ['user' => $prod, 'dados'=> $dados]);
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

        $prod = User::whereIn('tipo', [1,2])->get();
        $dados = array(
            //tipo comprado 
            'tipocomprador' => 0,
            'nomePagina'=> 'Produtor',
            'nomePaginapl'=> 'Produtores'
        );
        return view('admin.adduser', ['user' => $prod, 'dados'=> $dados]);
    }

    public function addcomprador(){
        $comprador = User::whereIn('tipo', [3])->get();
        $dados = array(
            'tipocomprador' => 1,
            'nomePagina'=> 'Comprador',
            'nomePaginapl'=> 'Compradores'
        );
        return view('admin.adduser', ['user' => $comprador, 'dados'=> $dados]);
    }

    public function addcompradorpost(Request $request){
        //dd($request);
        $user =  new User();
        $user->name = $request->name;
        $user->cpf = $request->cpf;
        $user->cnpj = $request->cnpj;
        $user->cep = $request->cep;
        $user->endereco = $request->end;
        $user->cidade = $request->cidade;
        $user->tipo = 3;
        $user->email = $request->email;
        $user->password =  Hash::make($request->password);
        $user->save();

        $comprador = User::whereIn('tipo', [3])->get();
        $dados = array(
            //tipo comprado 
            'tipocomprador' => 1,
            'nomePagina'=> 'Comprador',
            'nomePaginapl'=> 'Compradores'
        );
        return view('admin.adduser', ['user' => $comprador, 'dados'=> $dados]);
    }

    public function map(){
        $cooperativas = Cooperativa::all();
        return view('admin.map', ['cooperativas'=> $cooperativas]);
    }

    public function mapapost(Request $request){
        //dd($request);
        $coop = new Cooperativa();
        $coop->nome = $request->nomecooperativa;
        $coop->descricao = $request->desccooperativa;
        $coop->latitude = $request->latitude;
        $coop->longitude = $request->longitude;
        $coop->save();
        return redirect()->route('admin.mapa');
    }
}
