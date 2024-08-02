@extends('layouts.app')

@section('content')
<div class="container content-wrapper">
    <h1>Cócteles API</h1>
    <table id="coctelesTable" class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Vaso</th>
                <th>Instrucciones</th>
                <th>Primer Ingrediente</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($estadisticas as $index => $estadistica)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $estadistica['strDrink'] }}</td>
                <td>{{ $estadistica['strCategory'] }}</td>
                <td>{{ $estadistica['strGlass'] }}</td>
                <td>{{ $estadistica['strInstructions'] }}</td>
                <td>{{ $estadistica['strIngredient1'] }}</td>
                <td>
                    <a href="{{ route('api.show', $estadistica['idDrink']) }}" class="btn btn-info">Ver</a>
                    
                    <!-- Formulario para exportar el cóctel -->
                    <form action="{{ route('cocteles.export', $estadistica['idDrink']) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-warning">Exportar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">No se encontraron cócteles.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#coctelesTable').DataTable({
            "pageLength": 10,
            "language": {
                "search": "Buscar:",
                "lengthMenu": "Mostrar _MENU_ entradas",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
                "infoFiltered": "(filtrado de _MAX_ entradas totales)",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "emptyTable": "No hay datos disponibles en la tabla",
                "zeroRecords": "No se encontraron coincidencias",
                "loadingRecords": "Cargando...",
                "processing": "Procesando..."
            }
        });

        @if (session('mensaje'))
            Swal.fire({
                title: 'Éxito',
                text: '{{ session('mensaje') }}',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        @endif
    });
</script>
@endsection
