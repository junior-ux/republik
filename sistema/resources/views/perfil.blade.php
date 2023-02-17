<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <!--CSS-->
    <link rel="stylesheet" href="/css/style.css">
    <!--BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!--FONT GOOGLE-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi+Ink&display=swap" rel="stylesheet">
    <!--FONTAWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body class="fundo">

    <!--NAVBAR-->
    <div class="navbar">
        <h3 class="logo">RepuBlikANS</h3>
        <ul>
            <li><a href="/" class="botao-navbar">Início</a></li>
            <li><a href="/vagas" class="botao-navbar">Vagas</a></li>
            <li><a href="/pessoas" class="botao-navbar">Pessoas</a></li>
            @if (Route::has('login'))
                @auth
                    <li><a href="/perfil" class="botao-navbar autenticacao">Perfil</a></li>
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <a href="/logout"
                                class="botao-navbar autenticacao"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
                                Sair
                            </a>
                        </form>
                    </li>
                @else
                    <li><a href="/login" class="botao-navbar autenticacao">Login</a></li>
                    <li><a href="/register" class="botao-navbar autenticacao">Registrar</a></li>
                @endauth
            @endif
        </ul>
    </div>
    
		
    <!--CONTAINER-->
    <div class="secao-pessoa">
        <div class="container">
            <h1 class="titulo-pagina">Perfil</h1>
            <div class="bg-white rounded-lg d-block d-sm-flex">
                <div class="profile-tab-nav border-right">
                    <div class="p-4">
                        <div class="img-circle text-center mb-3">
                            <img src="/img/user.png" alt="Image" class="shadow">
                        </div>
                        <h4 class="text-center">Usuário</h4>
                    </div>
                </div>
                <div class="tab-content p-4 p-md-5 d-flex align-items-center" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab" >
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="texto-perfil-info">Nome</label>
                                    <div class="info-perfil">
                                        {{ $user->name }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="texto-perfil-info">E-mail</label>
                                    <div class="info-perfil">
                                        {{ $user->email }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="inicio-vaga">
            <div class="cadastrar-vaga">
                <div class="container">
                    <a type="button" class="btn-cadastrar-vaga" data-bs-toggle="modal" data-bs-target="#vagasModal">Cadastrar vaga</a>
                </div>
            </div>
            <h1 class="titulo-pagina">Minhas vagas</h1>
        </div>
            @foreach ($vagas as $vaga)
                <div class="card-vaga">
                    <!--HEADER-->
                    <div class="foto-vaga">
                        <img src="../img/vagas/{{ $vaga->image }}" class="tamanho-vaga">
                    </div>
                    <!--BODY-->
                    <div class="sobre-vaga">
                        <div class="informacao-vaga">
                            <i class="fa-solid fa-person tam-vaga"> {{ $vaga->qtd_homem }}</i>
                            <i class="fa-solid fa-person-dress tam-vaga"> {{ $vaga->qtd_mulher }}</i>
                            <h4 class="valor-vaga">R$ {{ $vaga->valor }}</h4>
                        </div>
                        <div class="descricao-vaga">
                            <h2 class="titulo-vaga">{{ $vaga->cidade }}</h2>
                            <h3 class="local-vaga">{{ $vaga->bairro }} - {{ $vaga->estado }}</h3>
                        </div>
                    </div>
                    <!--FOOTER-->
                    <div class="ver-mais-vaga text-center">
                        <a class="btn btn-warning m-2" data-bs-toggle="modal" data-bs-target="#modalEditCamp{{$vaga->id}}">
                            <i class="fa-solid fa-pen"></i> Editar
                        </a>
                        <a class="btn btn-danger m-2" data-bs-toggle="modal" data-bs-target="#modalDeleteCamp{{$vaga->id}}">
                            <i class="fa-solid fa-trash"></i> Apagar
                        </a>
                    </div>
                </div>

                <!-- Modal Excluir Campeonato -->
                <div class="modal fade" id="modalDeleteCamp{{$vaga->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <h5>Tem certeza que deseja apagar esta vaga?</h5>
                                </div>
                                <form action="/vaga/{{$vaga->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                                        <button type="submit" class="btn btn-primary"><ion-icon name="trash-outline"></ion-icon>Sim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal editar vaga -->
                <div class="modal fade" id="modalEditCamp{{$vaga->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-centro">
                                <h1 class="titulo-modal-cadastrar-vaga" id="exampleModalLabel">Você está editando uma vaga</h1>
                            </div>
                            <div class="modal-body">
                                <form action="/update/{{ $vaga->id }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-8 mb-3">
                                            <input type="text" class="form-control" id="nome" name="nome" required placeholder="Nome do proprietário" value="{{ $vaga->nome }}">
                                        </div>
                                        <div class="col mb-3">
                                            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" value="{{ $vaga->telefone }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 mb-3">
                                            <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" value="{{ $vaga->estado }}">
                                        </div>
                                        <div class="col-4 mb-3">
                                            <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" value="{{ $vaga->cidade }}">
                                        </div>
                                        <div class="col-4 mb-3">
                                            <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" value="{{ $vaga->bairro }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <input type="text" class="form-control" id="endereco" name="endereco" required placeholder="Endereço" value="{{ $vaga->endereco }}">
                                        </div>
                                        <div class="col mb-3">
                                            <input type="text" class="form-control" id="referencia" name="referencia" placeholder="Referência" value="{{ $vaga->referencia }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 mb-3">
                                            <input type="number" class="form-control" id="numero" name="numero" required placeholder="Número" value="{{ $vaga->numero }}">
                                        </div>
                                        <div class="col mb-3">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" value="{{ $vaga->email }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8 mb-2">
                                            <textarea rows="5" style="padding: 11px;" class="form-control" id="descricao" name="descricao" placeholder="Descrição">{{ $vaga->descricao }}</textarea>
                                        </div>
                                        <div class="col-4 mb-2">
                                            <div class="mb-3">
                                                <input type="number" class="form-control" id="valor" name="valor" placeholder="Valor" value="{{ $vaga->valor }}">
                                            </div>
                                            <div class="mb-3">
                                                <input type="number" class="form-control" id="qtd_homem" name="qtd_homem" placeholder="Quant. Homens" value="{{ $vaga->qtd_homem }}">
                                            </div>
                                            <div class="mb-3">
                                                <input type="number" class="form-control" id="qtd_mulher" name="qtd_mulher" placeholder="Quant. Mulheres" value="{{ $vaga->qtd_mulher }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="teste">
                                        <input type="file" id="image" name="image" multiple>
                                        <div class="texto-arquivo">
                                            <i class="fa-solid fa-file"></i>
                                            <p>Arraste seus arquivos aqui ou clique nesta área.</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

            <!-- Modal cadastrar vaga -->
            <div class="modal fade" id="vagasModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-centro">
                            <h1 class="titulo-modal-cadastrar-vaga" id="exampleModalLabel">Você está cadastrando uma vaga</h1>
                        </div>
                        <div class="modal-body">
                            <form action="/vaga" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-8 mb-3">
                                        <input type="text" class="form-control" id="nome" name="nome" required placeholder="Nome do proprietário">
                                    </div>
                                    <div class="col mb-3">
                                        <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 mb-3">
                                        <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado">
                                    </div>
                                    <div class="col-4 mb-3">
                                        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade">
                                    </div>
                                    <div class="col-4 mb-3">
                                        <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <input type="text" class="form-control" id="endereco" name="endereco" required placeholder="Endereço">
                                    </div>
                                    <div class="col mb-3">
                                        <input type="text" class="form-control" id="referencia" name="referencia" placeholder="Referência">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 mb-3">
                                        <input type="number" class="form-control" id="numero" name="numero" required placeholder="Número">
                                    </div>
                                    <div class="col mb-3">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="E-mail">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 mb-2">
                                        <textarea rows="5" style="padding: 11px;" class="form-control" id="descricao" name="descricao" placeholder="Descrição"></textarea>
                                    </div>
                                    <div class="col-4 mb-2">
                                        <div class="mb-3">
                                            <input type="number" class="form-control" id="valor" name="valor" placeholder="Valor">
                                        </div>
                                        <div class="mb-3">
                                            <input type="number" class="form-control" id="qtd_homem" name="qtd_homem" placeholder="Quant. Homens">
                                        </div>
                                        <div class="mb-3">
                                            <input type="number" class="form-control" id="qtd_mulher" name="qtd_mulher" placeholder="Quant. Mulheres">
                                        </div>
                                    </div>
                                </div>
                                <div class="teste">
                                    <input type="file" id="image" name="image" multiple>
                                    <div class="texto-arquivo">
                                        <i class="fa-solid fa-file"></i>
                                        <p>Arraste seus arquivos aqui ou clique nesta área.</p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    
    <!--RODAPÉ-->
    <div class="rodape">
        <div class="footer-content">
            <h3>RepuBlikANS</h3>
            <hr>
            <ul class="social">
                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
               <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
            </ul>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>