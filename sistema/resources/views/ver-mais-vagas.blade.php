<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todas as Vagas</title>
    <!--CSS-->
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!--FONT GOOGLE-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi+Ink&display=swap" rel="stylesheet">
    <!-- FAVICON -->
    <link rel="icon" href="/img/logo.png">
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
    <div class="secao-vaga">
        @if (Route::has('login'))
            @auth
                <div class="inicio-vaga">
                    <div class="cadastrar-vaga">
                        <a type="button" class="btn-cadastrar-vaga" data-bs-toggle="modal" data-bs-target="#vagasModal">Cadastrar vaga</a>
                    </div>
                </div>
            @endauth
        @endif

        <div class="inicio-vaga text-center">
            @if(!$pesquisa)
            <h1 class="titulo-pagina">Todas as vagas</h1>
            @endif
            <div class="container d-flex justify-content-center text-center mb-4">
                <form action="/vagas" method="GET" class="d-flex w-75" role="search">
                    <input id="pesquisa" name="pesquisa" class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search">
                    <button class="btn btn-dark" type="submit">Pesquisar</button>
                </form>
            </div>
            @if($pesquisa)
            <h2>Resultado da pesquisa por "{{ $pesquisa }}"</h2>
            @endif
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
                <div class="ver-mais-vaga">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#verMaisDaVaga{{$vaga->id}}">Ver mais</button>
                </div>
            </div>
            <!-- MODAL VER MAIS DA VAGA -->
            <div class="modal fade" id="verMaisDaVaga{{$vaga->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="foto-ver-mais">
                                    <img src="../img/vagas/{{ $vaga->image }}" class="tamanho-foto-ver-mais">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8 texto-cidade">
                                    {{$vaga->cidade}}
                                </div>
                                <div class="col-4 texto-valor">
                                    R$ {{$vaga->valor}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8 texto-estado">
                                    {{$vaga->bairro}} - {{$vaga->estado}}
                                </div>
                                <div class="col texto-qnt">
                                    <i class="fa-solid fa-person tam-vaga"> {{ $vaga->qtd_homem }}</i>
                                    <i class="fa-solid fa-person-dress tam-vaga"> {{ $vaga->qtd_mulher }}</i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col texto-descricao">
                                    {{$vaga->descricao}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col btn-contato">
                                    <a type="button" class="btn-entrar-contato" >Entre em contato</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @if(count($vagas) == 0)
            <div>
                <h2>Nenhuma vaga encontrada</h2>
            </div>
            <div class="w-100 text-center">
                <a href="/vagas" type="button" class="btn-entrar-contato">Ver todas as vagas</a>
            </div>
        @endif
        
    </div>

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