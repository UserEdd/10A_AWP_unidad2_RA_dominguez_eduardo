@extends('adminlte::page')

@section('title', 'Reportes')

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

@section('content_header')
    <h1><b>REPORTES CIUDADANOS</b></h1>
@stop

@section('contenido')
    <div class="container">
        <h1>Reportes Ciudadanos</h1>
        <div id="lista-reportes">
            <!-- Aquí se mostrarán los reportes cargados desde localStorage -->
        </div>
    </div>

    <script>
        // Recuperar los datos desde localStorage
        let reportes = localStorage.getItem('reportes');
        if (reportes) {
            // Parsear los datos en formato JSON
            reportes = JSON.parse(reportes);

            // Seleccionar el contenedor donde se mostrarán los reportes
            const contenedor = document.getElementById('lista-reportes');

            // Iterar sobre los reportes y renderizarlos
            reportes.forEach(reporte => {
                const item = document.createElement('div');
                item.classList.add('reporte-item');
                item.style.border = '1px solid #ccc';
                item.style.padding = '10px';
                item.style.marginBottom = '10px';

                item.innerHTML = `
                    <h2>${reporte.type}</h2>
                    <p><strong>Descripción:</strong> ${reporte.description}</p>
                    <p><strong>Fecha:</strong> ${reporte.date}</p>
                    <p><strong>Estado:</strong> <span style="color: ${reporte.color};">${reporte.status}</span></p>
                `;

                contenedor.appendChild(item);
            });
        } else {
            document.getElementById('lista-reportes').innerHTML = '<p>No hay reportes almacenados en localStorage.</p>';
        }
    </script>
@endsection
