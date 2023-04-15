@extends('layouts.main')

@section('title', 'link-reset')


@section('content')

	<div class="container p-4 mt-4">
		<div class="row">
			<div class="col-lg-6 col-md-10 m-auto">
				<div class="col-lg-8 col-md-11 m-auto">
					@if ($errors->any())
						@foreach ($errors->all() as $error)
							<p class="alert alert-danger col-lg-12 col-md-12 m-auto mb-2">{{ $error }}</p>
						@endforeach		
					@endif

					@if (session('err'))
						<p class="alert alert-danger col-lg-12 col-md-12 m-auto mb-2"> {{ session('err') }} </p>
					@endif
					@if (session('success'))
						<p class="alert alert-success col-12 m-auto mb-2"> {{ session('success') }} </p>
					@endif
				</div>
				<form action="{{ route('submit.reset.link') }}" method="post">
					@csrf
					<label>Digite seu e-mail: </label>
					<div class="mt-2 col-lg-9 col-md-11">
						<input class="form-control" type="text" name="email" id="email" placeholder="seu e-mail" value="{{ old('email') }}" />
					</div>
					<div class="mt-4">
						<input class="receber-sunmit py-1 px-2" type="submit" value="Receber link">
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