@extends('layouts.main')
@section('title', 'Profil')

@section('content')
<div class="container p-2" id="user-detail">
    <div class="row">
      <div class="col-10 m-auto">
        <ul class="navbar-nav d-flex flex-lg-row col-md-column justify-content-lg-between text-center">
          <li class="nav-item col-lg-4 col-md-12">
          @if (Auth::user()->admin == true)
            <a href="" class="nav-link">
                Artigo não publicado ({{ $ncount }})
                <i class="fa-sharp fa-regular fa-newspaper"></i>
            </a>
          </li>
          <li class="nav-item col-lg-4 col-md-12">
            <a href="" class="nav-link">
                Artigo publicado ({{ $scount }})
                <i class="fa-sharp fa-regular fa-newspaper"></i>
            </a>
          </li>
        @endif
          <li class="nav-item">
            <a href="{{ route('edit.user') }}" class="nav-link">
              editar perfil
              <i class="fa-sharp fa-solid fa-pen-to-square"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  @if (Auth::user()->admin == false)
     <div class="container p-4 mt-4" id="artigos">
        <h3 class="border-bottom">Seu(s) artigo(s)</h3>
        <div class="row">
            @foreach ($revistauser as $revista)

            <div class="col-10 d-flex flex-row justify-content-between mb-3 border-bottom p-2" id="artigo-conteudo">
                <div class="titulo">
                    <h6>{{ $revista->titulo }}</h6>
                    <a class="nav-link" href="/nrevista/{{ $revista->revista }}">
                        {{ $revista->resumo }}
                    </a>
                    <h6 class="mt-2">Data submetido : <span class="fw-bold">{{ date('d/m/Y', strtotime($revista->created_at)) }}</span></h6>
                </div>
                <div class="d-flex flex-row artigos-icon">
                    <a href="">
                        Ver
                    </a> 
                    <a class="ml-2" href="">
                        Excluir
                    </a> 
                </div>
            </div>
            @endforeach
        </div>
    </div>
  @endif
@livewireStyles
    @if (Auth::user()->admin == true)
      <livewire:show-article />
    @endif
@livewireScripts
@include('layouts.footer')
@endsection