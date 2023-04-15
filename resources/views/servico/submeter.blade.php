@extends('layouts.main')
@section('title', 'submeter-revista')

@section('content')
    <div id="submeter">
        <div class="container  d-flex flex-row justify-content-center">
            <div class="row d-flex flex-row">
                <form action="{{ route('submetendo') }}" method="post" class="p-4 img-thumbnail" enctype="multipart/form-data">
                    @csrf
                    @if(session("err"))
                        <p class="alert alert-danger col-lg-6 col-md-12 m-auto mb-2">*{{ session("err") }}</p>
                    @endif
                    @if(session("success"))
                        <p class="alert alert-success col-lg-6 col-md-12 m-auto mb-2">{{ session("success") }}</p>
                    @endif
                    <div class="row">
                        <div class="col-12">
                            <label for="" class="fw-bold">Titulo: </label>
                            <input type="text" name="titulo" id="titulo" placeholder="titulo da revista" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <label for="" class="fw-bold">Area de comhecimento: </label>
                            <input type="text" name="area" id="area" placeholder="Area de conhecimento" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <label for="" class="fw-bold">Resumo: </label>
                            <textarea name="resumo" id="resumo" cols="30" rows="10" class="form-control" placeholder="resumo da revista..."></textarea>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <label for="" class="fw-bold">Arquivo: </label>
                            <input type="file" name="revista" id="revista" class="form-control">
                        </div>
                    </div>
                    <div class="row p-2">
                        <input class="col-3 py-1 fw-bold" type="submit" value="Submeter">
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('layouts.footer')
@endsection