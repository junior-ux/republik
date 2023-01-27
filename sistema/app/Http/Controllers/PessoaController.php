<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;

class PessoaController extends Controller
{
    public function store(Request $request) {
        $pessoa = new Pessoa;
        
        $pessoa->nome = $request->nome;
        $pessoa->telefone = $request->telefone;
        $pessoa->email = $request->email;
        $pessoa->sobre = $request->sobre;
        $pessoa->nascimento = $request->nascimento;
        $pessoa->instagram = $request->instagram;

        $pessoa->save();

        return redirect('/pessoas');
    }

    public function pessoas() {
        $pessoas = Pessoa::all();

        return view('ver-mais-pessoas', ['pessoas' => $pessoas]);
    }
}
