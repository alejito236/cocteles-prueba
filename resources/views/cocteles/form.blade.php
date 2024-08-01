<div class="container d-flex justify-content-center">
    <div class="card" style="width: 70%; border-radius: 15px;">
        <div class="card-body">
            <h1 class="card-title text-center">{{ $modo }} Cóctel</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ url('/cocteles') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $coctel->nombre ?? old('nombre') }}">
                        </div>
                        <div class="form-group">
                            <label for="categoria">Categoría:</label>
                            <input type="text" class="form-control" id="categoria" name="categoria" value="{{ $coctel->categoria ?? old('categoria') }}">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="esAlcoholico" name="esAlcoholico" value="1" {{ (isset($coctel) && $coctel->esAlcoholico) || old('esAlcoholico') ? 'checked' : '' }}>
                            <label class="form-check-label" for="esAlcoholico">¿Es alcohólico?</label>
                        </div>
                        <div class="form-group">
                            <label for="vaso">Vaso:</label>
                            <input type="text" class="form-control" id="vaso" name="vaso" value="{{ $coctel->vaso ?? old('vaso') }}">
                        </div>
                        <div class="form-group">
                            <label for="instrucciones">Instrucciones:</label>
                            <textarea class="form-control" id="instrucciones" name="instrucciones" rows="4">{{ $coctel->instrucciones ?? old('instrucciones') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="imagenURL">URL de la imagen:</label>
                            <input type="text" class="form-control" id="imagenURL" name="imagenURL" value="{{ $coctel->imagenURL ?? old('imagenURL') }}">
                        </div>
                        <div class="form-group">
                            <label for="ingrediente1">Ingrediente 1:</label>
                            <input type="text" class="form-control" id="ingrediente1" name="ingrediente1" value="{{ $coctel->ingrediente1 ?? old('ingrediente1') }}">
                        </div>
                        <div class="form-group">
                            <label for="ingrediente2">Ingrediente 2:</label>
                            <input type="text" class="form-control" id="ingrediente2" name="ingrediente2" value="{{ $coctel->ingrediente2 ?? old('ingrediente2') }}">
                        </div>
                        <div class="form-group">
                            <label for="ingrediente3">Ingrediente 3:</label>
                            <input type="text" class="form-control" id="ingrediente3" name="ingrediente3" value="{{ $coctel->ingrediente3 ?? old('ingrediente3') }}">
                        </div>
                        <div class="form-group">
                            <label for="ingrediente4">Ingrediente 4:</label>
                            <input type="text" class="form-control" id="ingrediente4" name="ingrediente4" value="{{ $coctel->ingrediente4 ?? old('ingrediente4') }}">
                        </div>
                        <div class="form-group">
                            <label for="ingrediente5">Ingrediente 5:</label>
                            <input type="text" class="form-control" id="ingrediente5" name="ingrediente5" value="{{ $coctel->ingrediente5 ?? old('ingrediente5') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h4 class="text-center">Medidas</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="medida1">Medida 1:</label>
                            <input type="text" class="form-control" id="medida1" name="medida1" value="{{ $coctel->medida1 ?? old('medida1') }}">
                        </div>
                        <div class="form-group">
                            <label for="medida2">Medida 2:</label>
                            <input type="text" class="form-control" id="medida2" name="medida2" value="{{ $coctel->medida2 ?? old('medida2') }}">
                        </div>
                        <div class="form-group">
                            <label for="medida3">Medida 3:</label>
                            <input type="text" class="form-control" id="medida3" name="medida3" value="{{ $coctel->medida3 ?? old('medida3') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="medida4">Medida 4:</label>
                            <input type="text" class="form-control" id="medida4" name="medida4" value="{{ $coctel->medida4 ?? old('medida4') }}">
                        </div>
                        <div class="form-group">
                            <label for="medida5">Medida 5:</label>
                            <input type="text" class="form-control" id="medida5" name="medida5" value="{{ $coctel->medida5 ?? old('medida5') }}">
                        </div>
                    </div>
                </div>
                <br>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" value="{{ $modo }} Cóctel">
                    <a href="{{ url('/cocteles/') }}" class="btn btn-secondary">Atrás</a>
                </div>
            </form>
        </div>
    </div>
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
