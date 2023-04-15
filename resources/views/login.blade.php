@extends('layouts.main')
@section('title', 'login')

@section('content')

    <div class="container" id="login">
        
        <form action="{{ route('logged') }}" method="post" class="row img-thumbnail mt-4 p-4">
            @csrf
            @if(session("err"))
                <p class="alert alert-danger col-lg-6 col-md-12 m-auto mb-2">*{{ session("err") }}</p>
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
            <div class="col-lg-10 col-md-12 col-sm-12 m-auto">
                <div class="col-lg-4 m-auto p-2">
                    <label for="" class="fw-bold">E-mail: </label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="servidor@servidor.com">
                </div>
                <div class="col-lg-4 m-auto mt-4 p-2">
                    <label for="" class="fw-bold">Senha: </label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="senha">
                    <span class="d-flex flex-row justify-content-end eye-confirm">
                        <i class="fa-solid fa-eye"></i>
                    </span>
                </div>
                <div class="col-lg-10 m-auto text-center">

                    <a class="text-secondary" href="{{ route('reset.form') }} ">Esqueceu a senha?</a>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-1 m-auto">
                    <input type="submit" value="Conectar-se" class="py-1 px-2 fw-bold">
                </div>
            </div>
        </form>
    </div>
    
    @include('layouts.footer')
@endsection