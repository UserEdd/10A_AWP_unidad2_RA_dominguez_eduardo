@extends('adminlte::page')
@section('title', 'Gestión de Reportes')

{{-- Encabezado de la página --}}
@section('content_header')
    <h1><b>Gestión de Reportes</b></h1>
@stop

{{-- Contenido principal --}}
@section('content')

    {{-- Tabla de reportes --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Reportes Ciudadanos (Offline)</h3>
        </div>
        <div class="card-body">
            <table id="tabla-reportes" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Descripción</th>
                        <th>Realizado El</th>
                        <th>Estatus</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tabla-reportes-body">
                    {{-- Contenido generado dinámicamente --}}
                </tbody>
            </table>
        </div>
    </div>

@stop

{{-- Scripts --}}
@section('js')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Obtener reportes desde localStorage
            let reportes = localStorage.getItem("reportes");
            const tablaBody = document.getElementById("tabla-reportes-body");

            if (reportes) {
                try {
                    reportes = JSON.parse(reportes);

                    // Generar filas dinámicamente
                    reportes.forEach((reporte) => {
                        const row = document.createElement("tr");

                        row.innerHTML = `
                            <td>${reporte.id || "N/A"}</td>
                            <td>${reporte.type || "Sin tipo"}</td>
                            <td>${reporte.description || "Sin descripción"}</td>
                            <td>${reporte.formatted_created_at || "Fecha no disponible"}</td>
                            <td>
                                <span class="badge ${
                                    reporte.status === "Pendiente"
                                        ? "badge-warning"
                                        : reporte.status === "En Proceso"
                                        ? "badge-info"
                                        : "badge-success"
                                }">
                                    ${reporte.status || "Desconocido"}
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-primary btn-sm" title="Notificar">
                                    <i class="fas fa-bell"></i>
                                </button>
                            </td>
                        `;

                        tablaBody.appendChild(row);
                    });
                } catch (error) {
                    console.error("Error procesando los reportes:", error);
                    tablaBody.innerHTML =
                        '<tr><td colspan="6" class="text-center">Error al cargar los reportes</td></tr>';
                }
            } else {
                tablaBody.innerHTML =
                    '<tr><td colspan="6" class="text-center">No hay reportes almacenados</td></tr>';
            }

            $('#tabla-reportes').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
                }
            });
        });
    </script>
@stop
