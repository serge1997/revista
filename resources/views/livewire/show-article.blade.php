
    <div class="container p-4 mt-4" id="artigos">
        <h3 class="border-bottom">Artigos</h3>
        <div class="row">
            @foreach ($nrevista as $revista)

            <div class="col-10 d-flex flex-row justify-content-between mb-3 border-bottom p-2" id="artigo-conteudo">
                <div class="titulo">
                    <h6>{{ $revista->titulo }}</h6>
                    <a class="nav-link" href="/nrevista/{{ $revista->revista }}">
                        {{ $revista->resumo }}
                    </a>
                    <h6 class="mt-2">Nome do autor : <span class="fw-bold">{{ $revista->nome }}</span></h6>
                    <h6 class="mt-2">Data submetido : <span class="fw-bold">{{ date('d/m/Y', strtotime($revista->created_at)) }}</span></h6>
                    <h6 class="mt-2">titulação : <span class="fw-bold">{{ $revista->titulacao }} </span></h6>
                    <h6 class="mt-2">E-mail : <span class="fw-bold">{{ $revista->email }}</span></h6>
                    <h6 class="mt-2">Artigos já publicado : <span class="fw-bold">{{ $revista->nartigos }} </span></h6>
                </div>
                <div class="d-flex flex-row artigos-icon">
                    <a href="/nrevista/{{ $revista->revista }}">
                       <i class="fa-sharp fa-solid fa-download"></i>
                    </a> 
                    <a href="">
                        <i class="fa-solid fa-trash"></i>
                    </a> 
                </div>
            </div>
            @endforeach
        </div>
    </div>
