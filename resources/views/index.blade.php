@extends('layouts.main')

@section('title', 'inicio')


@section('content')
    <div class="container-fluid p-4">
        <div class="container">
           <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 p-2 mt-4">
                <div>
                    <h2>Simplifique a submissão das revistas</h2>
                </div>
                <div>
                    <p class="fs-5">
                        Conheça a plataforma que vai te ao tratamento de seus artigos
                        acompanhamento, correção até a apresentação.<br>
                        envie seu artigo agora mesmo. <br>
                        <div class="mt-5">
                            <a href="{{ route('pagina.submeter') }}" class="px-4 py-2 mt-2" id="btn-submeter">
                                Submeter
                            </a>
                        </div>
                    </p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 p-2">

            </div>
           </div>
        </div>
    </div>
    <div class="container" id="outsearch">
        @livewireStyles
            <livewire:public-artigos />
        @livewireScripts

    </div>
    <div class="container-fluid p-4 mt-2" id="mkt-container">
       <div class="row text-center">
            <h3>Porque ter um artigo publicado?</h3>
       </div>
       <div class="row p-2 mt-2">
            <img src="/img/img1.png" class="img-thumbnail m-auto" id="mkt-img" alt="">
       </div>
       <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 m-auto p-4 mt-2 img-thumbnail">
                <p class="fs-5">
                    A publicação de artigos científicos pode oferecer ao autor um diferencial em contratações
                    de emprego, concursos públicos, seleção para bolsas de estudo como mestrado e doutorados entre outros.
                    Também pode servir como alternativa da apresentação do TCC.
                </p>
            </div>
       </div>
    </div>
    @livewireStyles
        
    @livewireScripts

    @include('layouts.footer')
@endsection


