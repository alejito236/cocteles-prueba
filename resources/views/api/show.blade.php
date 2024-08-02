@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card" style="width: 70%; border-radius: 15px;">
        <div class="card-body">
            <h1 class="card-title text-center">Detalles del Cóctel</h1>

            @if (!empty($cocktail))
                <div class="row justify-content-center">
                    <!-- Center Image -->
                    <div class="col-md-6 text-center">
                        <img src="{{ $cocktail['strDrinkThumb'] ?? '#' }}" alt="{{ $cocktail['strDrink'] ?? 'Imagen no disponible' }}" class="img-fluid" style="border-radius: 8px; margin-bottom: 20px; max-height: 300px;">
                    </div>
                </div>
                <div class="row">
                    <!-- Left Column for Cocktail Information -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombre"><strong>Nombre:</strong></label>
                            <p>{{ $cocktail['strDrink'] ?? 'N/A' }}</p>
                        </div>
                        <div class="form-group">
                            <label for="categoria"><strong>Categoría:</strong></label>
                            <p>{{ $cocktail['strCategory'] ?? 'N/A' }}</p>
                        </div>
                        <div class="form-group">
                            <label for="esAlcoholico"><strong>¿Es alcohólico?</strong></label>
                            <p>{{ $cocktail['strAlcoholic'] ?? 'N/A' }}</p>
                        </div>
                        <div class="form-group">
                            <label for="vaso"><strong>Vaso:</strong></label>
                            <p>{{ $cocktail['strGlass'] ?? 'N/A' }}</p>
                        </div>
                        <div class="form-group">
                            <label for="instrucciones"><strong>Instrucciones:</strong></label>
                            <p>{{ $cocktail['strInstructions'] ?? 'N/A' }}</p>
                        </div>
                    </div>

                    <!-- Right Column for Ingredients -->
                    <div class="col-md-6">
                        <h4><strong>Ingredientes:</strong></h4>
                        <ul style="padding-left: 20px;">
                            @for ($i = 1; $i <= 15; $i++)
                                @if (!empty($cocktail["strIngredient{$i}"]))
                                    <li>
                                        {{ $cocktail["strIngredient{$i}"] }} - {{ $cocktail["strMeasure{$i}"] ?? 'Al gusto' }}
                                    </li>
                                @endif
                            @endfor
                        </ul>
                    </div>
                </div>
                <br>
                <div class="text-center mt-4">
                    <a href="{{ url('/api') }}" class="btn btn-secondary">Atrás</a>
                </div>
            @else
                <div class="alert alert-warning text-center">
                    <p>No se encontraron detalles para este cóctel.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
