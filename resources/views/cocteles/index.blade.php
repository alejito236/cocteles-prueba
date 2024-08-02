@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Cócteles</title>
 
    <style>
        body {
            background-image: url('{{ asset('images/bar-background.jpg') }}');
            background-size: cover;
            background-position: center;
       
            margin: 0;
            height: 100vh;
        }

        .content-wrapper {
            backdrop-filter: blur(0px); 
            background-color: rgba(255, 255, 255, 0.9); 
            border-radius: 10px;
            padding: 20px;
            margin: 20px auto;
            max-width: 90%; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); 
        }
    </style>
    <link href="../../../resources/css/app.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
</head>
<body>
    <div class="container content-wrapper">
        <h1>Cócteles</h1>
        <a href="{{ url('/cocteles/create') }}" class="btn btn-success mb-3">Nuevo cóctel</a>
        <table id="coctelesTable" class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>nombre</th>
                    <th>categoria</th>
                    <th>Vaso</th>
                    <th>instrucciones</th>
                    <th>primer ingrediente</th>
                    <th>acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cocteles as $coctel)
                <tr>
                    <td>{{ $coctel->idCoctel }}</td>
                    <td>{{ $coctel->nombre }}</td>
                    <td>{{ $coctel->categoria }}</td>
                    <td>{{ $coctel->vaso }}</td>
                    <td>{{ $coctel->instrucciones }}</td>
                    <td>{{ $coctel->ingrediente1 }}</td>
                    <td>
                        <a href="{{ url('/cocteles/' . $coctel->idCoctel . '/edit') }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('cocteles.destroy', $coctel->idCoctel) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres borrar?')">Borrar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#coctelesTable').DataTable();
    });
    </script>
</body>
</html>
@endsection
