<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaga;
use App\Models\User;

class VagaController extends Controller
{
    
    public function ultimasVagas() {
        $vagas = Vaga::orderByDesc('id')->limit(6)->get();   

        return view('index', ['vagas' => $vagas]);
    }
    
    public function store(Request $request) {
        $vaga = new Vaga;
        
        $vaga->titulo = $request->titulo;
        $vaga->endereco = $request->endereco;
        $vaga->numero = $request->numero;
        $vaga->bairro = $request->bairro;
        $vaga->cidade = $request->cidade;
        $vaga->estado = $request->estado;

        $vaga->referencia = $request->referencia;
        $vaga->descricao = $request->descricao;
        $vaga->telefone = $request->telefone;
        $vaga->email = $request->email;
        $vaga->valor = $request->valor;

        $vaga->qtd_homem = $request->qtd_homem;
        $vaga->qtd_mulher = $request->qtd_mulher;
        $vaga->mobiliado = $request->mobiliado;
        $vaga->animal = $request->animal;

        //salvar image
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/vagas'), $imageName);

            $vaga->image = $imageName;
        }

        $user = auth()->user();
        $vaga->user_id = $user->id;

        $vaga->save();

        return redirect('/vagas');
    }

    public function vagas() {

        $pesquisa = request('pesquisa');

        if ($pesquisa) {
            /*$vagas = Vaga::Where([
                ['cidade', 'like', '%'.$pesquisa.'%']
            ])->get();*/

            $vagas = Vaga::where('cidade', 'like', '%'.$pesquisa.'%')
                        ->orWhere('estado', 'like', '%'.$pesquisa.'%')
                        ->orWhere('endereco', 'like', '%'.$pesquisa.'%')
                        ->orWhere('bairro', 'like', '%'.$pesquisa.'%')
                        ->orWhere('descricao', 'like', '%'.$pesquisa.'%')
                        ->orWhere('titulo', 'like', '%'.$pesquisa.'%')
                        ->get();

        }else {
            $vagas = Vaga::all();
        }


        return view('ver-mais-vagas', ['vagas' => $vagas, 'pesquisa' => $pesquisa]);
    }

    public function perfil() {

        $user = auth()->user();
        $vagas = $user->vagas;

        return view('perfil', ['vagas' => $vagas, 'user' => $user]);
    }

    public function destroy($id) {
        Vaga::findOrFail($id)->delete();

        return redirect('/perfil');
    }

    public function update(Request $request){
        $vaga = Vaga::findOrFail($request->id);
        echo $vaga;

        $vaga->titulo = $request->titulo;
        $vaga->endereco = $request->endereco;
        $vaga->numero = $request->numero;
        $vaga->bairro = $request->bairro;
        $vaga->cidade = $request->cidade;
        $vaga->estado = $request->estado;

        $vaga->referencia = $request->referencia;
        $vaga->descricao = $request->descricao;
        $vaga->telefone = $request->telefone;
        $vaga->email = $request->email;
        $vaga->valor = $request->valor;

        $vaga->qtd_homem = $request->qtd_homem;
        $vaga->qtd_mulher = $request->qtd_mulher;
        $vaga->mobiliado = $request->mobiliado;
        $vaga->animal = $request->animal;

        //salvar image
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/vagas'), $imageName);

            $vaga->image = $imageName;
        }

        $vaga->save();

        return redirect('/perfil');
    }

    public function vaga($id) {
        $vaga = Vaga::findOrFail($id);
        $user = User::findOrFail($vaga->user_id);

        return view('vaga', ['vaga' => $vaga, 'user' => $user]);
    }

}
