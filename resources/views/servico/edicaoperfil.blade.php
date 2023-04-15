@extends('layouts.main')

@section('title', 'edição usuario')

@section('content')
    <div class="container-fluid mt-4" id="cadastra">
        <div class="row text-center">
            <h3>Editar perfil</h3>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 m-auto text-center p-2">
                <p class="fs-5">
                    
                </p>
            </div>
        </div>
        <div class="container">
            @if (session('success'))
                <p class="col-lg-6 col-md-12 alert alert-success">{{ session('success') }} </p>
            @endif

            @if (session('err'))
                <p class="col-lg-6 col-md-12 alert alert-danger">{{ session('err') }} </p>
            @endif
            <form action="{{ route('update') }} " class="p-4 img-thumbnail">
                <div class="row mt-2">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <label for="" class="fw-bold">Novo e-mail: </label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="servidor@servidor.com" value="{{ Auth::user()->email }}">
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <label for="" class="fw-bold">Telefone: </label>
                        <input type="text" name="telefone" id="telefone" class="form-control" placeholder="00 00000-0000" value="{{ Auth::user()->telefone }}">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <label for="" class="fw-bold">Nome da intistução: </label>
                        <input type="text" name="institucao" id="institucao" class="form-control" placeholder="nome da institução" value="{{ Auth::user()->institucao }}">
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <label for="" class="fw-bold">Nova titulação: </label>
                        <input type="text" name="titulacao" id="titulacao" class="form-control" placeholder="titulacao" value="{{ Auth::user()->titulacao }}">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <label for="" class="fw-bold">Novo endreço postal: </label>
                        <input type="text" name="enderecopostal" id="enderecopostal" class="form-control" placeholder="codigo postal" value="{{ Auth::user()->enderecopostal }}">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <label for="password" class="fw-bold">Nova senha: </label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Senha">
                        <span class="d-flex flex-row justify-content-end eye-senha">
                            <i class="fa-solid fa-eye"></i>
                        </span>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <label for="confirm-password" class="fw-bold">Confirme a senha: </label>
                        <input type="password" name="confirmpassword" id="edit-confirmpassword" class="form-control" placeholder="Confirma senha">
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