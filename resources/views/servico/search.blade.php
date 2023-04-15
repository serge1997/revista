<div class="container p-4 mt-4" id="public-artigos">
    <h3 class="border-bottom text-center">Resultado pesquisa:</h3>
    <div class="row">
    @if(isset($srevista))
        @foreach ($srevista as $revista)

            <div class="row d-flex flex-row mb-3 border-bottom p-2" id="artigo-conteudo">
                <div class="titulo col-lg-9 col-md-12">
                    <h6>{{ $revista->titulo }}</h6>
                    <a class="nav-link fst-italic text-secondary text-decoration-underline" href="/nrevista/{{ $revista->revista }}">
                        {{ $revista->resumo }}
                    </a>
                    <h6 class="mt-2">{{ $revista->nomeautor }}</h6>
                    <h6 class="mt-2">Data publicação : <span class="fw-bold">{{ date('d/m/Y', strtotime($revista->created_at)) }}</span></h6>
                </div>
                <div class="col-lg-3 col-md-12 artigos-icon d-flex flex-wrap justify-content-md-start justify-content-lg-end">
                    <a href="/nrevista/{{ $revista->revista }}" class="text-center text-decoration-none text-secondary">
                        {{ $revista->volume }}
                    </a>
                    <a class="text-decoration-none text-secondary" href="/nrevista/{{ $revista->revista }}">
                        Ver
                    </a>
                </div>
            </div>
        @endforeach
    @endif
    </div>
</div>