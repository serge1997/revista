@extends('layouts.main')

@section('title', 'Redefinição de senha')


@section('content')
	<div class="container p-4 mt-4">
		<div class="row">
			<div class="col-lg-6 col-md-10 m-auto">
				<div>
					@if ($errors->any())
						<ul class="navbar-nav alert alert-danger">
							@foreach ($errors->all() as $error)
								<li class="nav-item">{{ $error }}</li>
							@endforeach
						</ul>
					@endif
					@if(session("err"))
                		<p class="alert alert-danger col-lg-6 col-md-12 m-auto mb-2">*{{ session("err") }}</p>
            		@endif
				</div>
				<form method="post" action="{{ route('password.reseted') }}">
					@csrf
					<input type="hidden" name="token" value="{{ $token }}">
					<label>Digite seu e-mail: </label>
					<div class="mt-1 col-lg-9 col-md-11">
						<input class="form-control" type="text" name="email" id="email" value="{{ old('email') }}" placeholder="seu e-mail" />
					</div>
					<div class="mt-1 col-lg-9 col-md-11">
						<label class="p-1">Senha: </label>
						<div class="mt-1 p-1">
							<input class="form-control" type="password" name="password" id="reset-password" value="{{ old('password') }}" placeholder="senha" />
						</div>
					</div>
					<div class="mt-1 col-lg-9 col-md-11">
						<label class="p-1">Confirme a senha: </label>
						<div class="mt-1 p-1">
							<input class="form-control" type="password" name="confirmpassword" id="resetconfrim-password" value="{{ old('confirmpassword') }}" placeholder="confirme a senha">
						</div>
					</div>
					<div class="mt-4">
						<input class="receber-sunmit py-1 px-2" type="submit" value="Redefinir senha">
						<div class="mt-2 p-1">
							<p>
								<small>Informe seu e-email para receber o link de<br>redefinição de senha.</small>
							</p>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection