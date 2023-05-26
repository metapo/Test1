@extends('layout')

@section('livewireStyle')
    @livewireStyles
@endsection


@section('content')
    {{ $slot }}
@endsection


@section('livewireScripts')
    @livewireScripts
@endsection
