<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todas as Vagas</title>
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
        <h1 class="logo">RepuBlikANS</h1>
        <ul>
            <li><a href="index.html" class="botao-navbar">Início</a></li>
            <li><a href="ver-mais-vagas.html" class="botao-navbar">Vagas</a></li>
            <li><a href="ver-mais-pessoas.html" class="botao-navbar">Pessoas</a></li>
        </ul>
    </div>

    <!--CONTAINER-->
    <div class="secao-vaga">
        <div class="inicio-vaga">
            <div class="cadastrar-vaga">
                <a href="" class="btn-cadastrar-vaga">Cadastrar vagas</a>
            </div>
            <h1 class="titulo-pagina">Todas as vagas</h1>
        </div>
        
        <div class="card-vaga">
            <!--HEADER-->
            <div class="foto-vaga">
                <img src="../img/lugar-1.png" class="tamanho-vaga">
            </div>
            <!--BODY-->
            <div class="sobre-vaga">
                <div class="informacao-vaga">
                    <i class="fa-solid fa-person tam-vaga"> 2</i>
                    <i class="fa-solid fa-person-dress tam-vaga"> 0</i>
                    <h4 class="valor-vaga">R$ 136</h4>
                </div>
                <div class="descricao-vaga">
                    <h2 class="titulo-vaga">Apartamento simples</h2>
                    <h3 class="local-vaga">Condomínio Jardins</h3>
                </div>
            </div>
            <!--FOOTER-->
            <div class="ver-mais-vaga">
                <button>Ver mais</button>
            </div>
        </div>
       
        <div class="card-vaga">
            <!--HEADER-->
            <div class="foto-vaga">
                <img src="../img/lugar-2.png" class="tamanho-vaga">
            </div>
            <!--BODY-->
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
            <!--FOOTER-->
            <div class="ver-mais-vaga">
                <button>Ver mais</button>
            </div>
        </div>
        
        <div class="card-vaga">
            <!--HEADER-->
            <div class="foto-vaga">
                <img src="../img/lugar-3.png" class="tamanho-vaga">
            </div>
            <!--BODY-->
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
            <!--FOOTER-->
            <div class="ver-mais-vaga">
                <button>Ver mais</button>
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

</body>
</html>