@extends('layouts.main')

@section('title', 'Revistas')

@section('content')

	@livewireStyles
        <livewire:public-artigos />
    @livewireScripts

@endsection