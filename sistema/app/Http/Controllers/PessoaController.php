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

        //salvar imagem
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/pessoas'), $imageName);

            $pessoa->image = $imageName;
        }

        $pessoa->save();

        return redirect('/pessoas');
    }

    public function pessoas() {
        $pessoas = Pessoa::all();

        return view('ver-mais-pessoas', ['pessoas' => $pessoas]);
    }
}
