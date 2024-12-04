@extends('layouts.menu')

@section('title', 'SOCIALERT')

@section('content')
<div class="contenido">
        <h1>Equipo de desarrollo</h1>
        <div class="equipo">
            <div class="integrante">
                <img src="{{ asset('img/Eduardo.png') }}" alt="Eduardo">
                <h2>Eduardo Antonio Domínguez Santiago</h2>
            </div>
            <div class="integrante">
                <img src="{{ asset('img/Luis.png') }}" alt="Luis">
                <h2>Luis Artemio Hernández Sánchez</h2>
            </div>
            <div class="integrante">
                <img src="{{ asset('img/Josafat.png') }}" alt="Josafat">
                <h2>Josafat de Jesús López Trujillo</h2>
            </div>
            <div class="integrante">
                <img src="{{ asset('img/Johnny.png') }}" alt="Johnny">
                <h2>Johnny Morales Gómez</h2>
            </div>
            <div class="integrante">
                <img src="{{ asset('img/Francisco.png') }}" alt="Francisco">
                <h2>Francisco Eduardo Pérez Sántiz</h2>
            </div>
        </div>
    </div>
@endsection
