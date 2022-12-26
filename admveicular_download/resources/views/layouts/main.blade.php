<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <!-- Fonte do Google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
        <!-- CSS da bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <!-- CSS da aplicação -->
        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/scripts.js"></script>    
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbarlight">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/dashboard" class="navbar brand">
                        <img src="/img/logo.jpg" alt="admveicular">
                    </a>
                    <ul class="navbar-nav">
                        @auth
                        <li class="nav-item">
                            <span class="navbar-menu"> <a href="/veiculos/home">Veículos</a></span>
                                <ul>
                                    <li><a href="/veiculos/cadastrar" class="nav-link">Cadastrar</a></li>
                                </ul>
                                <ul>
                                    <li><a href="/veiculos/consultar" class="nav-link">Editar</a></li>
                                </ul>
                                <ul>
                                    <li><a href="/veiculos/deletar" class="nav-link">Apagar</a></li>
                                </ul>
                        </li>                       
                        <li class="nav-item">
                            <span class="nav-link"><a href="/veiculos/home">Manutenção</a></span>
                            <ul>
                                <li><a href="/veiculos/manutencao/cadastrar" class="nav-link">Cadastrar</a></li>
                            </ul>
                            <ul>
                                <li><a href="/veiculos/manutencao/buscaveiculo" class="nav-link">Administrar</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <form action="/logout" method="POST">
                                @csrf
                                <a href="/logout" 
                                class="nav-link" 
                                onclick="event.preventDefault();this.closest('form').submit();">Sair</a>
                            </form>
                        </li>
                        @endauth
                        @guest
                        <li class="nav-item">
                            <a href="/login" class="nav-link">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="/register" class="nav-link">Cadastrar</a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>    
        <main>
            <div class="container-fluid">
                <div class="row">
                    @if(session('msg'))
                        <p class="msg">{{ session('msg') }}</div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </main>
        <footer>
            <p>admveicular &copy;2022
        </footer>
        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    </body>   
</html>