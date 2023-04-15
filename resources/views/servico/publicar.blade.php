@extends('layouts.main')
@section('title', 'Publicar')


@section('content')
    <div class="container  d-flex flex-row justify-content-center" id="submeter">
        <div class="row d-flex flex-row">
            <form action="{{ route('publicando') }}" method="post" class="p-4 img-thumbnail" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        @if (session('err'))
                            <p class="col-lg-8 col-md-12 alert alert-danger">{{ session('err') }}</p>
                        @endif

                        @if (session('success'))
                            <p class="col-lg-8 col-md-12 alert alert-success">{{ session('success') }}
                        @endif
                    </div>
                    <div class="col-12">
                        <label for="" class="fw-bold">Titulo : </label>
                        <input type="text" name="titulo" id="titulo" placeholder="titulo da revista" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="" class="fw-bold mt-2">Nome do autor : </label>
                        <input type="text" name="nomeautor" id="nomeautor" placeholder="Nome do autor" class="form-control">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <label for="" class="fw-bold">Volume : </label>
                        <input name="volume" id="volume" class="form-control" placeholder="Volume da revista">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <label for="" class="fw-bold">Resumo : </label>
                        <textarea name="resumo" id="resumo" cols="30" rows="10" class="form-control" placeholder="resumo da revista..."></textarea>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <label for="" class="fw-bold">Arquivo : </label>
                        <input type="file" name="revista" id="revista" class="form-control">
                    </div>
                </div>
                <div class="row p-2">
                    <input class="col-3 py-1 fw-bold" type="submit" value="Submeter">
                </div>
            </form>
        </div>
    </div>
    @include('layouts.footer')
@endsection