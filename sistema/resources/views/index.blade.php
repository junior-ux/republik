<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <!--CSS-->
    <link rel="stylesheet" href="/css/style.css">
    <!--FONT GOOGLE-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi+Ink&display=swap" rel="stylesheet">
    <!--FONTAWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    
    <!--SLICK CSS-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
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
                Encontre uma vaga ou um
                colega de quarto de forma
                rápida e fácil usando nosso
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
        <!--CARROSEL-->
        <div class="galeria">
            
            @foreach ($vagas as $vaga)
            <!--CARD 1-->
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
                        <h2 class="titulo-vaga">{{ $vaga->descricao }}</h2>
                        <h3 class="local-vaga">{{ $vaga->cidade }} - {{ $vaga->estado }}</h3>
                    </div>
                </div>
                <!--FOOTER-->
                <div class="ver-mais-vaga">
                    <button>Ver mais</button>
                </div>
            </div>
            @endforeach
            
            <!--CARD 2--
            <div class="card-vaga">
                <!--HEADER--
                <div class="foto-vaga">
                    <img src="../img/lugar-2.png" class="tamanho-vaga">
                </div>
                <!--BODY--
                <div class="sobre-vaga">
                    <div class="informacao-vaga">
                        <i class="fa-solid fa-person tam-vaga"> 0 </i>
                        <i class="fa-solid fa-person-dress tam-vaga"> 2</i>
                        <h4 class="valor-vaga">R$ 100</h4>
                    </div>
                    <div class="descricao-vaga">
                        <h2 class="titulo-vaga">Casa pequena</h2>
                        <h3 class="local-vaga">Bairro Floresta</h3>
                    </div>
                </div>
                <!--FOOTER--
                <div class="ver-mais-vaga">
                    <button>Ver mais</button>
                </div>
            </div>
            <!--CARD 3--
            <div class="card-vaga">
                <!--HEADER--
                <div class="foto-vaga">
                    <img src="../img/lugar-3.png" class="tamanho-vaga">
                </div>
                <!--BODY--
                <div class="sobre-vaga">
                    <div class="informacao-vaga">
                        <i class="fa-solid fa-person tam-vaga"> 5 </i>
                        <i class="fa-solid fa-person-dress tam-vaga"> 2</i>
                        <h4 class="valor-vaga">R$ 300</h4>
                    </div>
                    <div class="descricao-vaga">
                        <h2 class="titulo-vaga">Local elegante</h2>
                        <h3 class="local-vaga">Bairro Prado</h3>
                    </div>
                </div>
                <!--FOOTER-
                <div class="ver-mais-vaga">
                    <button>Ver mais</button>
                </div>
            </div>
            <!--CARD 4
            <div class="card-vaga">
                <!--HEADER--
                <div class="foto-vaga">
                    <img src="../img/lugar-3.png" class="tamanho-vaga">
                </div>
                <!--BODY--
                <div class="sobre-vaga">
                    <div class="informacao-vaga">
                        <i class="fa-solid fa-person tam-vaga"> 5 </i>
                        <i class="fa-solid fa-person-dress tam-vaga"> 2</i>
                        <h4 class="valor-vaga">R$ 300</h4>
                    </div>
                    <div class="descricao-vaga">
                        <h2 class="titulo-vaga">Local elegante</h2>
                        <h3 class="local-vaga">Bairro Prado</h3>
                    </div>
                </div>
                <!--FOOTER
                <div class="ver-mais-vaga">
                    <button>Ver mais</button>
                </div>
            </div>
            -->
            
        </div>
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

    <!--SCRIPT-->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script type="text/javascript">
        $('.galeria').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1
        });
    </script>

</body>
</html>