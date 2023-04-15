<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    
    <!-- JQuery 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
    <script src="/js/jquery-min-3-6-3.js"></script>

    <!-- Css -->
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('inicio') }}">sebastião</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('inicio') }}">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Acessar
                </a>
                <ul class="dropdown-menu">
                  @guest
                    <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                    <li><a class="dropdown-item" href="{{ route('pagina.cadastra') }}">Cadastrar</a></li>
                  @endguest
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="{{ route('view.revista') }}" class="nav-link">Revista</a>
              </li>
            </ul>
            <form action="{{ route('search') }}" class="d-flex col-lg-4 col-md-12" role="search" method="post">
              <input class="form-control me-2" type="search" placeholder="pesquisar revista..." name="search" id="search" aria-label="Search">
              <button class="px-2 py-1" type="submit">Pesquisar</button>
              <div class="mt-2" id="out-searchmenu">
                
              </div>
            </form>
          </div>
        </div>
      </nav>
  @auth
    <div class="container-fluid p-4" id="logMsg">
      <div class="container p-2">
        <div class="d-flex flex-row justify-content-between">
          <div class="row">
            <p class="">Seja bem vindo, <a href="{{ route('profil.user') }}"><i id="nome-user">{{ Auth::user()->nome }}</i></a></p>
          </div>
          <div class="logout">
            @if (Auth::user()->admin == true)
              <a href="{{ route('pagina.publicar') }}" class="fs-5 border-bottom px-2">
                Publicar
              </a>
            @endif
              <a href="{{ route('sair') }}" class="fs-5 border-bottom">
             <i>Sair</i>
            </a>
          </div>
        </div>
      </div>  
    </div>
  @endauth
  @yield('content')



  @yield('footer-content')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="/js/script.js"></script>
</body>
</html>