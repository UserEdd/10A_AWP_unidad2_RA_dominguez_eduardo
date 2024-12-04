@extends('layouts.menu')

@section('title', 'SOCIALERT - Inicio')

@section('content')
<div class="container">
    <!-- Encabezado con imagen y título -->
    <div class="hero-section" style="text-align: center; margin-bottom: 40px;">
        <img src="{{ asset('img/logo.png') }}" alt="SOCIALERT" class="hero-image" style="width: 40px; margin-bottom: 20px;">
        <h1 class="titulo-idea">Bienvenido a SOCIALERT</h1>
        <p class="descripcion-idea" style="text-align: center; font-size: 18px;">
            La solución progresiva para gestionar alertas, contenido y usuarios en cualquier situación. 
            ¡Descubre cómo SOCIALERT puede transformar tu experiencia!
        </p>
        <a href="#about" class="cta-button" style="display: inline-block; background-color: #2b5fa9; color: #fff; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-size: 18px; font-weight: bold; margin-top: 20px;">
            Más información
        </a>
    </div>

    <!-- Sección de información destacada -->
    <div id="about" class="info-section" style="margin-top: 40px;">
        <h2 class="section-title" style="text-align: center; color: #2b5fa9; font-size: 28px; margin-bottom: 20px;">
            ¿Qué es SOCIALERT?
        </h2>
        <p class="descripcion-idea" style="text-align: justify; font-size: 18px; color: #333;">
            SOCIALERT es una aplicación web interactiva y progresiva, proporcionando una experiencia fluida y accesible para todos los usuarios.
        </p>
        <ul class="feature-list" style="list-style: disc; margin: 20px 0 0 20px; font-size: 18px; color: #333;">
            <li><strong>Funcionalidades progresivas:</strong> Acceso a contenido offline.</li>
            <li><strong>Gestión de catálogos:</strong> Busca y encuentra información de forma intuitiva.</li>
            <li><strong>Gestión de usuarios:</strong> Manejo seguro de perfiles y sesiones.</li>
        </ul>
    </div>
</div>
@endsection
