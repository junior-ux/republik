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
        <h3 class="logo">RepuBlikANS</h3>
        <ul>
            <li><a href="/" class="botao-navbar">Início</a></li>
            <li><a href="/vagas" class="botao-navbar">Vagas</a></li>
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
            <h2>
                Encontre uma vaga ou um <br>
                colega de quarto de forma <br>
                rápida e fácil usando nosso <br>
                sistema.
            </h2>
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
                                    <h2 class="titulo-vaga">{{ $vaga->titulo }}</h2>
                                    <h3 class="local-vaga">{{ $vaga->cidade }} - {{ $vaga->estado }}</h3>
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
                                    {{$vaga->titulo}}
                                </div>
                                <div class="col-4 texto-valor">
                                    R$ {{$vaga->valor}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8 texto-estado">
                                    {{$vaga->cidade}} - {{$vaga->estado}}
                                </div>
                                <div class="col texto-qnt">
                                    <i class="fa-solid fa-person tam-vaga"> {{ $vaga->qtd_homem }}</i>
                                    @if($vaga->mobiliado)
                                        <i class="fa-solid fa-couch"></i>
                                    @endif
                                </div>
                                <div class="col texto-qnt">
                                    <i class="fa-solid fa-person-dress tam-vaga"> {{ $vaga->qtd_mulher }}</i>
                                    @if($vaga->animal)
                                    <i class="fa-solid fa-paw tam-vaga"></i>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col texto-descricao">
                                    {{$vaga->descricao}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col btn-contato">
                                    <a href="https://wa.me/+55{{ $vaga->telefone }}?text=Olá%2C+vim+pelo+RepuBlikANS+e+tenho+interesse+na+vaga+anunciada.+Podemos+conversar%3F" target="_blank" type="button" class="btn-entrar-contato" >Entre em contato</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="ver-todas">
            <a href="/vagas" class="btn-ver-todas">VER TODAS</a>
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