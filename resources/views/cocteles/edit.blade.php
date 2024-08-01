@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
<style>
        body {
            background-image: url('{{ asset('images/bar-background.jpg') }}');
            background-size: cover;
            background-position: center;
       
            margin: 0;
            height: 100vh;
        }

        .content-wrapper {
            backdrop-filter: blur(0px); /* Remueve el desenfoque en el contenido */
            background-color: rgba(255, 255, 255, 0.9); /* Fondo blanco semitransparente */
            border-radius: 10px;
            padding: 20px;
            margin: 20px auto;
            max-width: 90%; /* Ajusta el ancho máximo del contenido */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Añade sombra al contenido */
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Editar Coctel</title>
</head>
<body>
    <div class="container">
        <form action="{{ url('/cocteles/' . $coctel->idCoctel) }}" method="post" enctype="multipart/form-data">
            @csrf 
            {{ method_field('PATCH') }}

            @include('cocteles.form', ['modo'=>'Editar'])
        </form>
    </div>
    
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        @if ($errors->any())
            Swal.fire({
                title: 'Errores de Validación',
                html: `<ul style="text-align: left;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>`,
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        @endif

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
</body>
</html>
@endsection
