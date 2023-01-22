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
</head>
<body class="fundo">

    <!--NAVBAR-->
    <div class="navbar">
        <img src="../img/Frame.svg" width="30px">
        <ul>
            <li><a href="#">Início</a></li>
            <li><a href="#">Sobre nós</a></li>
            <li><a href="#">Contato</a></li>
            @if (Route::has('login'))
                @auth
                    <li><a href="{{ url('/dashboard') }}" class="botao-entrar">Perfil</a></li>
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <a href="/logout" 
                                class="botao-entrar"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
                                Sair
                            </a>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" class="botao-entrar">Entrar</a></li>

                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}" class="botao-entrar">Cadastrar</a></li>
                    @endif
                @endauth
            @endif
        </ul>
    </div>

    <!--BANNER-->
    <div class="banner">
        <!--ESQUERDA-->
        <div class="coluna-esquerda">
            <h1>
                Encontre um <br>
                alojamento ou um <br> 
                colega de quarto aqui!
            </h1>
            <div class="input-pesquisar">
                <input type="text" placeholder="Ex: Apartamento 2 quartos">
                <!--<img src="../public/img/Group.png">-->
            </div>
            <div class="botao-buscar">
                <button type="button">Buscar</button>
            </div>
        </div>
        <!--DIREITO-->
        <div class="coluna-direita">
            <img src="../img/Vector.png">
        </div>
    </div>
    
    <!--SEÇÃO 1-->
    <div class="secao-1">
        <h1 class="titulo-cards-1">Adicionados recentes</h1>
        <!--CARD 1-->
        <div class="card card-1">
            <!--HEADER-->
            <div class="card-header-1">
                <img src="../img/image 1.png" class="card-img-1">
            </div>
            <!--BODY-->
            <div class="card-body-1">
                <div class="card-info-1">
                    <i class="fa-solid fa-users"></i>
                    <h4>R$136</h4>
                </div>
                <div class="descricao-1">
                    <h2 class="card-titulo-1">Apartamento simples</h2>
                    <h3 class="card-texto-1">Bairro Fátima</h3>
                </div>
            </div>
            <!--FOOTER-->
            <div class="botao-entrar-contato-1">
                <button>Entre em contato</button>
            </div>
        </div>
    </div>

    <!--SEÇÃO 2-->
    <div class="secao-2">
        <h1 class="titulo-cards-2">Encontre colegas de quarto</h1>
        <!--CARD 1-->
        <div class="card card-2">
            <!--HEADER-->
            <div class="card-header-2">
                <img src="../img/pessoa-1.png" class="card-img-2">
            </div>
            <!--BODY-->
            <div class="card-body-2">
                <div class="descricao-2">
                    <h2 class="card-titulo-2">Bianca Almeida</h2>
                    <h5 class="card-texto-2">Procurando apartamento próximo a UESPI, no Campus de Piripiri - Piauí.</h5>
                </div>
            </div>
            <!--FOOTER-->
            <div class="botao-entrar-contato-2">
                <button>Entre em contato</button>
            </div>
        </div>
    </div>
</body>
</html>