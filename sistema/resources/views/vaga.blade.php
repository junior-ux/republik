<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaga</title>
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

    <!--CONTAINER-->
    <div class="secao-vaga w-100">

        <div class="container">
            <div class="row">
                <!-- MODAL VER MAIS DA VAGA -->
                <div class="">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="foto-ver-mais">
                                        <img src="../img/vagas/{{ $vaga->image }}" class="tamanho-foto-ver-mais h-100">
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
                                        <i class="fa-solid fa-person-dress tam-vaga"> {{ $vaga->qtd_mulher }}</i>
                                    </div>
                                    <div class="col texto-qnt">
                                        @if($vaga->mobiliado)
                                            <i class="fa-solid fa-couch"></i>
                                        @endif
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
                                <div class="mt-4 secao-contatos">
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="card card-contato text-bg-light p-3">
                                                <div class="texto-contato">
                                                    {{$user->name}}<br>
                                                    {{$vaga->telefone}}<br>
                                                    {{$vaga->email}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="card card-contato text-bg-light p-3">
                                                <div class="texto-contato">
                                                    {{$user->name}}<br>
                                                    {{$vaga->telefone}}<br>
                                                    {{$vaga->email}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="card card-contato text-bg-light p-3">
                                                <div class="texto-contato">
                                                    {{$user->name}}<br>
                                                    {{$vaga->telefone}}<br>
                                                    {{$vaga->email}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="card card-contato text-bg-light p-3">
                                                <div class="texto-contato">
                                                    {{$user->name}}<br>
                                                    {{$vaga->telefone}}<br>
                                                    {{$vaga->email}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="card card-contato text-bg-light p-3">
                                                <div class="texto-contato">
                                                    {{$user->name}}<br>
                                                    {{$vaga->telefone}}<br>
                                                    {{$vaga->email}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="card card-contato text-bg-light p-3">
                                                <div class="texto-contato">
                                                    {{$user->name}}<br>
                                                    {{$vaga->telefone}}<br>
                                                    {{$vaga->email}}
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>