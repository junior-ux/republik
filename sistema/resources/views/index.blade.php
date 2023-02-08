<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <!--CSS-->
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!--FONT GOOGLE-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi+Ink&display=swap" rel="stylesheet">
    <!--FONTAWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- FAVICON -->
    <link rel="icon" href="/img/logo.png">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="/css/swiper-bundle.min.css">
</head>
<body class="fundo">

    <!--NAVBAR-->
    <div class="navbar">
        <h1 class="logo">RepuBlikANS</h1>
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

    <!--BANNER-->
    <div class="banner">
        <!--ESQUERDA-->
        <div class="coluna-esquerda">
            <h1>
                Encontre uma vaga ou um <br>
                colega de quarto de forma <br>
                rápida e fácil usando nosso <br>
                sistema.
            </h1>
        </div>
        <!--DIREITO-->
        <div class="coluna-direita">
            <img src="../img/paisagem.png">
        </div>
    </div>

    <!--VAGAS-->
    <div class="container-vaga">
        <h1 class="titulo-home-vaga">Adicionados recentes</h1>
        <div class="slide-container swiper">
            <div class="slide-content">
                <div class="swiper-wrapper">
                    @foreach ($vagas as $vaga)
                        <div class="swiper-slide card-vaga-homepage">
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
                    @endforeach 
                </div>
                <div class="swiper-button-next swiper-navBtn"></div>
                <div class="swiper-button-prev swiper-navBtn"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        @foreach ($vagas as $vaga)
            <!-- MODAL VER MAIS DA VAGA -->
            <div class="modal fade" id="verMaisDaVaga{{$vaga->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"> <strong> Ver mais </strong></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-8">
                                        <label for="nome" class="form-label">Nome do proprietário:</label>
                                        <input type="text" class="form-control" value="{{ $vaga->nome }}" disabled>
                                    </div>
                                    <div class="col">
                                        <label for="cidade" class="form-label">Cidade:</label>
                                        <input type="text" class="form-control" value="{{ $vaga->cidade }}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="numero" class="form-label">Número:</label>
                                        <input type="text" class="form-control" value="{{ $vaga->numero }}" disabled>
                                    </div>
                                    <div class="col-5">
                                        <label for="bairro" class="form-label">Bairro:</label>
                                        <input type="text" class="form-control" value="{{ $vaga->bairro }}" disabled>
                                    </div>
                                    <div class="col-4">
                                        <label for="estado" class="form-label">Estado:</label>
                                        <input type="text" class="form-control" value="{{ $vaga->estado }}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="referencia" class="form-label">Referência:</label>
                                        <input type="text" class="form-control" value="{{ $vaga->referencia }}" disabled>
                                    </div>
                                    <div class="col">
                                        <label for="endereco" class="form-label">Endereço:</label>
                                        <input type="text" class="form-control" value="{{ $vaga->endereco }}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <label for="email" class="form-label">E-mail:</label>
                                        <input type="text" class="form-control" value="{{ $vaga->email }}" disabled>
                                    </div>
                                    <div class="col">
                                        <label for="telefone" class="form-label">Telefone:</label>
                                        <input type="text" class="form-control" value="{{ $vaga->telefone }}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <label for="qtd_homem" class="form-label">Quantidade de homens:</label>
                                        <input type="text" class="form-control" value="{{ $vaga->qtd_homem }}" disabled>
                                    </div>
                                    <div class="col-5">
                                        <label for="qtd_mulher" class="form-label">Quantidade de mulheres:</label>
                                        <input type="text" class="form-control" value="{{ $vaga->qtd_mulher }}" disabled>
                                    </div>
                                    <div class="col-2">
                                        <label for="valor" class="form-label">Valor:</label>
                                        <input type="text" class="form-control" value="{{ $vaga->valor }}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="descricao" class="form-label">Descrição:</label>
                                        <textarea class="form-control" cols="20" rows="10" disabled>{{ $vaga->descricao }}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="ver-todas">
            <a href="/vagas" class="btn-ver-todas">VER TODAS</a>
        </div>
    </div>
    

    <!--PESSOAS-->
    <div class="container-pessoa">
        <h1 class="titulo-home-pessoa">Encontre colegas de quarto</h1>
        
        <!--CARD 1-->
        <div class="card-pessoa">
            <!--HEADER-->
            <div class="foto-pessoa">
                <img src="../img/pessoa-1.png" class="tamanho-pessoa">
            </div>
            <!--BODY-->
            <div class="sobre-pessoa">
                <div class="informacao-pessoa">
                    <h2 class="nome-pessoa">Bianca Almeida</h2>
                    <h5 class="descricao-pessoa">Procurando apartamento próximo a UESPI no Campus de Pirajá.</h5>
                </div>
            </div>
            <!--FOOTER-->
            <div class="ver-mais-pessoa">
                <button>Ver mais</button>
            </div>
        </div>

        <!--CARD 2-->
        <div class="card-pessoa">
            <!--HEADER-->
            <div class="foto-pessoa">
                <img src="../img/pessoa-2.png" class="tamanho-pessoa">
            </div>
            <!--BODY-->
            <div class="sobre-pessoa">
                <div class="informacao-pessoa">
                    <h2 class="nome-pessoa">Bianca Almeida</h2>
                    <h5 class="descricao-pessoa">Procurando apartamento próximo a UESPI no Campus de Pirajá.</h5>
                </div>
            </div>
            <!--FOOTER-->
            <div class="ver-mais-pessoa">
                <button>Ver mais</button>
            </div>
        </div>
        <!--CARD 3-->
        <div class="card-pessoa">
            <!--HEADER-->
            <div class="foto-pessoa">
                <img src="../img/pessoa-3.png" class="tamanho-pessoa">
            </div>
            <!--BODY-->
            <div class="sobre-pessoa">
                <div class="informacao-pessoa">
                    <h2 class="nome-pessoa">Bianca Almeida</h2>
                    <h5 class="descricao-pessoa">Procurando apartamento próximo a UESPI no Campus de Pirajá.</h5>
                </div>
            </div>
            <!--FOOTER-->
            <div class="ver-mais-pessoa">
                <button>Ver mais</button>
            </div>
        </div>
        <div class="ver-todas">
            <a href="/pessoas" class="btn-ver-todas">VER TODAS</a>
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
    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    
    <!-- Swiper JS -->
    <script src="/js/swiper-bundle.min.js"></script>
    <script src="/js/script.js"></script>
</body>
</html>