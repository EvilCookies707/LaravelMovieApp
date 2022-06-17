@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="main-row">
            @livewire('movie-card',['movies'=>$movies, 'page'=>$page])
        </div>
    </div>
@endsection