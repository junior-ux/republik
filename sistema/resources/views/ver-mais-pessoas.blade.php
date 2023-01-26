<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todas as Pessoas</title>
    <!--CSS-->
    <link rel="stylesheet" href="/css/style.css">
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
        <h1 class="logo">RepuBlikANS</h1>
        <ul>
            <li><a href="/" class="botao-navbar">Início</a></li>
            <li><a href="/vagas" class="botao-navbar">Vagas</a></li>
            <li><a href="/pessoas" class="botao-navbar">Pessoas</a></li>
        </ul>
    </div>

    <!--CONTAINER-->
    <div class="secao-pessoa">
        <div class="inicio-pessoa">
            <div class="cadastrar-pessoa">
                <!--<a href="" class="btn-cadastrar-pessoa">Cadastrar pessoas</a>-->
                <button type="button" class="btn-cadastrar-vaga" data-bs-toggle="modal" data-bs-target="#pessoaModal">
                    Cadastrar pessoa
                </button>
            </div>
            <h1 class="titulo-pagina">Todas as pessoas</h1>
        </div>
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
                    <h2 class="nome-pessoa">Gustavo Silva</h2>
                    <h5 class="descricao-pessoa">Busco vaga por 3 meses próximo a UFPI.</h5>
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
                    <h2 class="nome-pessoa">Hugo Andrade</h2>
                    <h5 class="descricao-pessoa">Alguém anima alugar um apartamento com 3 quartos perto do centro de Piripiri?</h5>
                </div>
            </div>
            <!--FOOTER-->
            <div class="ver-mais-pessoa">
                <button>Ver mais</button>
            </div>
        </div>
    </div>

    <!-- Modal cadastrar pessoa -->
    <div class="modal fade" id="pessoaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar pessoa</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/pessoa" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" required placeholder="Nome do proprietário">
                    </div>
                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone:</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail:</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="E-mail">
                    </div>
                    <div class="mb-3">
                        <label for="sobre" class="form-label">Sobre:</label>
                        <input type="text" class="form-control" id="sobre" name="sobre" placeholder="fale um pouco sobre você">
                    </div>
                    <div class="mb-3">
                        <label for="nascimento" class="form-label">Data de nascimento:</label>
                        <input type="date" class="form-control" id="nascimento" name="nascimento">
                    </div>
                    <div class="mb-3">
                        <label for="instagram" class="form-label">Instagram:</label>
                        <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Instagram">
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