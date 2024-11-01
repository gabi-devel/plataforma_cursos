@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <h2 class="col-md-6 mx-auto mb-5 text-center">Formulario para Unidades</h2>
            <form action="{{ route('unidades.store') }}" method="POST" class="row g-3">
                @csrf
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <label for="curso" class="form-label">Curso</label>
                        <select name="curso_id" id="curso_id" class="form-control shadow-none">
                            <option value="" disabled selected>Seleccione un curso</option>
                            @foreach ($cursos as $curso)
                                <option value="{{ $curso->id }}">{{-- {{ old('curso_id') == $curso->id ? 'selected' : '' }} --}}
                                    {{ $curso->titulo }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <label for="orden">Posición de la unidad:</label>
                        <select name="orden" id="orden">
                            <option value="">Seleccione un curso primero</option>
                        </select>
                    </div>
                </div>        
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" name="titulo" id="titulo" class="form-control shadow-none" 
                        value="{{ old('titulo') }}">
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-md-6 mx-auto">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control shadow-none" 
                        value="{{ old('descripcion') }}">
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <label for="contenido" class="form-label">Contenido</label>
                        <input type="text" name="contenido" id="contenido" class="form-control shadow-none" 
                        value="{{ old('contenido') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <label for="video" class="form-label">Video</label>
                        <input type="text" name="video" id="video" class="form-control shadow-none">
                    </div>
                </div>
                <div class="col-md-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Detectar cuando cambia la selección del curso
    $('#curso_id').on('change', function() {
        var cursoId = $(this).val();

        // Si hay un curso seleccionado
        if (cursoId) {
            $.ajax({
                url: '/cursos/' + cursoId + '/unidades',
                type: 'GET',
                success: function(unidades) {
                    var $ordenSelect = $('#orden');
                    $ordenSelect.empty(); // Limpiar opciones anteriores

                    var num_orden_maximo = unidades.reduce(function(max, unidad) {
                        return unidad.orden > max ? unidad.orden : max;
                    }, 0); // console.log("Maximo: ", num_orden_maximo);

                    if (num_orden_maximo == 0) {
                        // Si no hay unidades, permitir 0 y 1
                        $ordenSelect.append('<option value="0">Unidad 0</option>');
                        $ordenSelect.append('<option value="1" selected>Unidad 1</option>');
                    } else {
                        unidades.forEach(function(unidad) {
                            if (unidad.orden > num_orden_maximo) {
                                num_orden_maximo = unidad.orden;
                            }
                        });
                        // Recorrer las unidades y agregarlas al select
                        unidades.forEach(function(unidad, index) {
                            $ordenSelect.append('<option value="' + (unidad.orden) + '">Antes de Unidad ' + (unidad.orden) + '- O sea: ' + (unidad.orden) + '</option>');
                        });

                        // Opción para agregar al final
                        $ordenSelect.append('<option value="' + (num_orden_maximo + 1) + '" selected>Al final - O sea: ' + (num_orden_maximo + 1) + '</option>');
                    }                 
                },
                error: function() {
                    alert('Error al obtener las unidades.');
                }
            });
           
        } else {
            // Si no hay curso seleccionado, limpiar el select de unidades
            $('#orden').empty();
        }
    });
});
</script>