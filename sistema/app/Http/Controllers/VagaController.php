<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaga;

class VagaController extends Controller
{
    public function store(Request $request) {
        $vaga = new Vaga;
        
        $vaga->nome = $request->nome;
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

        //salvar image
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/vagas'), $imageName);

            $vaga->image = $imageName;
        }

        $vaga->save();

        return redirect('/vagas');
    }

    public function vagas() {
        $vagas = Vaga::all();

        return view('ver-mais-vagas', ['vagas' => $vagas]);
    }
}
