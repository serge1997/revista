@extends('layouts.main')

@section('title', 'cadastra')


@section('content')
    <div class="container-fluid mt-4" id="cadastra">
        <div class="row text-center">
            <h3>Crie sua Conta</h3>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 m-auto text-center p-2">
                <p class="fs-5">
                    <span class="fw-bold">Voçê é autho de uma revista ?</span><br/>Sua conta vai permitir o uso do serviço da plataforma
                </p>
            </div>
        </div>
        <div class="container">
            <form action="{{ route('store.user') }}" class="p-4 img-thumbnail">
                @csrf
                @if(session("err"))
                    <p class="alert alert-danger col-lg-6 col-md-12 m-auto mb-2">*{{ session("err") }}</p>
                @endif
                @if(session("success"))
                    <p class="alert alert-success col-lg-6 col-md-12 m-auto mb-2">{{ session("success") }}</p>
                @endif

                @if($errors->any())
                    <div class=" row alert">
                        <ul class="alert alert-danger col-lg-6 col-md-12 m-auto">
                            @foreach($errors->all() as $err)

                                <li id="err-msg">*{{ $err }}</li>

                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <label for="" class="fw-bold">Nome: </label>
                        <input type="text" name="nome" id="name" class="form-control" placeholder="Sebastião Andrade" value="{{ old('nome') }}">
                    </div>
                     <div class="col-lg-4 col-md-12 col-sm-12">
                        <label for="" class="fw-bold">E-mail: </label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="servidor@servidor.com" value="{{ old('email') }}">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <label for="" class="fw-bold">Telefone: </label>
                        <input type="text" name="telefone" id="telefone" class="form-control" placeholder="00 00000-0000" value="{{ old('telefone') }}">
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <label for="" class="fw-bold">Titulação: </label>
                        <input type="text" name="titulacao" id="titulacao" class="form-control" placeholder="titulacao" value="{{ old('titulacao') }}">
                    </div>
                </div>
                <div class="row mt-2">
                     <div class="col-lg-4 col-md-12 col-sm-12">
                        <label for="" class="fw-bold">Nome da intistução: </label>
                        <input type="text" name="institucao" id="institucao" class="form-control" placeholder="nome da institução" value="{{ old('institucao') }}">
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <label for="" class="fw-bold">Quantos artigos voçê já publicou ? </label>
                        <input type="text" name="nartigos" id="nartigos" class="form-control" placeholder="00" value="{{ old('nartigos') }}">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <label for="" class="fw-bold">Endereço postal: </label>
                        <input type="text" name="enderecopostal" id="enderecopostal" class="form-control" placeholder="endereco postal" value="{{ old('enderecopostal') }}">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <label for="password" class="fw-bold">Senha: </label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Senha" value="{{ old('password') }}">
                        <span class="d-flex flex-row justify-content-end eye-senha">
                            <i class="fa-solid fa-eye"></i>
                        </span>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <label for="confirm-password" class="fw-bold">Confirme senha: </label>
                        <input type="password" name="confirmpassword" id="cad-confirmpassword" class="form-control" placeholder="Confirm senha" value="{{ old('confirmpassword') }}">
                        <span class="d-flex flex-row justify-content-end eye-confirm">
                            <i class="fa-solid fa-eye"></i>
                        </span>
                    </div>
                </div>
                <div class="row col-lg-1 col-md-3 col-sm-3 mt-4">
                    <input type="submit" class="py-1 px-2" value="Enviar">
                </div>
            </form>
        </div>
    </div>
    @include('layouts.footer')
@endsection