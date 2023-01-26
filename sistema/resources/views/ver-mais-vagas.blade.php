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
    <div class="secao-vaga">
        <div class="inicio-vaga">
            <div class="cadastrar-vaga">
                <!--<a href="" class="btn-cadastrar-vaga">Cadastrar vagas</a>-->
                <button type="button" class="btn-cadastrar-vaga" data-bs-toggle="modal" data-bs-target="#vagasModal">
                    Cadastrar vaga
                </button>
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

    <!-- Modal cadastrar vaga -->
    <div class="modal fade" id="vagasModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar vaga</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/vaga" method="POST">
                    @csrf
                    <div class="mb-3">
                    <label for="nome" class="form-label">Nome do proprietário:</label>
                    <input type="text" class="form-control" id="nome" name="nome" required placeholder="Nome do proprietário">
                    </div>
                    <div class="mb-3">
                        <label for="endereco" class="form-label">Endereço:</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" required placeholder="Endereço">
                    </div>
                    <div class="mb-3">
                        <label for="numero" class="form-label">Número:</label>
                        <input type="number" class="form-control" id="numero" name="numero" required placeholder="Número">
                    </div>
                    <div class="mb-3">
                        <label for="bairro" class="form-label">Bairro:</label>
                        <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro">
                    </div>
                    <div class="mb-3">
                        <label for="cidade" class="form-label">Cidade:</label>
                        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade">
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado:</label>
                        <input type="text" class="form-control" id="estado" name="estado" placeholder="estado">
                    </div>
                    <div class="mb-3">
                        <label for="referencia" class="form-label">Referência:</label>
                        <input type="text" class="form-control" id="referencia" name="referencia" placeholder="Referência">
                    </div>
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição:</label>
                        <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição">
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
                        <label for="valor" class="form-label">Valor:</label>
                        <input type="number" class="form-control" id="valor" name="valor" placeholder="Valor">
                    </div>
                    <div class="mb-3">
                        <label for="qtd_homem" class="form-label">Quantidade de homens:</label>
                        <input type="number" class="form-control" id="qtd_homem" name="qtd_homem" placeholder="Quantidade de homens">
                    </div>
                    <div class="mb-3">
                        <label for="qtd_mulher" class="form-label">Quantidade de mulheres:</label>
                        <input type="number" class="form-control" id="qtd_mulher" name="qtd_mulher" placeholder="Quantidade de mulheres">
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