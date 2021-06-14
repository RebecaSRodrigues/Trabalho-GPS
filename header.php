<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="\trabalho-gps\assets\css\style.css">
    <title>Trabalho GPS</title>
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>    
<body>
    <header>
        <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/Trabalho-GPS">Boocket</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCadastrar" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Cadastrar
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownCadastrar">
                        <li><a class="dropdown-item" href="/Trabalho-GPS/servidor/cadastroServidor.php">Cadastro de Servidor</a></li>
                        <li><a class="dropdown-item" href="/Trabalho-GPS/cliente/cadastroCliente.php">Cadastro de Clientes</a></li>
                        <li><a class="dropdown-item" href="/Trabalho-GPS/servico/cadastroServico.php">Cadastro de Serviço</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownGerenciar" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Gerenciamento de Cadastros
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownGerenciar">
                        <li><a class="dropdown-item" href="/Trabalho-GPS/servidor/gerenciamentoServidor.php">Gerenciamento de Servidores</a></li>
                        <li><a class="dropdown-item" href="/Trabalho-GPS/cliente/gerenciamentoCliente.php">Gerenciamento de Clientes</a></li>
                        <li><a class="dropdown-item" href="/Trabalho-GPS/servico/gerenciamentoServico.php">Gerenciamento de Serviços</a></li>
                    </ul>
                </li>
                <a class="nav-link" href="#">Porcentagem de lucro do administrador</a>
            </div>
            </div>
        </div>
        </nav>
    </header>
