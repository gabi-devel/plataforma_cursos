@extends('layouts.app')

@section('estilos')
  @vite(['resources/css/unidades.css'])
@endsection

@section('content')
<link href="{{ asset('css/unidades.css') }}" rel="stylesheet">
    <div class="page row" style="margin: 0">

      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse bg-secondary">
        <div class="position-sticky pt-3 sidebar-sticky">
          <ul class="nav flex-column">
            @php
                $usuarioCurso = auth()->user()->cursos()->where('curso_id', $curso->id)->first();
                $ultimaUnidadLeida = optional($usuarioCurso?->pivot)->unidad_leida ?? 0;
            @endphp

            @foreach ($unidades as $unidad)
              @php
                  // Verificar si la unidad está habilitada
                  $habilitada = $unidad->orden <= ($ultimaUnidadLeida) + 1;
                    $disabled = $habilitada ? '' : 'disabled';
              @endphp
              <li class="nav-item">
                <a class="nav-link item-unidades {{ $disabled }}"
                  href="{{ $disabled ? '#' : route('unidades.index', ['curso_id' => $curso->id, 'unidad_id' => $unidad->orden]) }}">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text align-text-bottom" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                  Unidad {{ $unidad->orden }}
                </a>
              </li>
            @endforeach
          </ul>
          @if ($unidad->orden == $ultimaUnidadLeida)
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link link-examen"  href="{{ route('ver_multiple_choice', 1) }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file align-text-bottom" aria-hidden="true"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                Examen
              </a>
            </li>
          </ul>
            
          @endif
        </div>
      </nav>

      <section class="section section-sm section-first bg-light col-md-9 col-lg-10">
        <div class="container">
            <div class="row row-50">
                <div class="col-12">
                    <div class="conte mt-3 me-5" id="contenido">
                        <h1 id="titulo">{{ $unidadActual['titulo'] }} </h1>
                        <h3 id="subtitulo"></h3> <br>
                        <h5 id="texto">{{ $unidadActual['contenido'] }}</h5>
                        
                        <div class="mt-4">
                          <form id="form-unidad-leida" action="{{ route('marcar.unidad.leida') }}" method="POST">
                            @csrf
                            <input type="hidden" name="curso_id" value="{{ $curso->id }}">
                            <input type="hidden" name="unidad_id" value="{{ $unidadActual['orden'] }}">
                            <label>
                              <input type="checkbox" id="checkbox-leido" onclick="habilitarSiguiente()"> Ya he leído esta unidad
                            </label>
                          </form>
                        </div>
                        @php
                            // Buscar la siguiente unidad
                            $siguienteUnidad = $unidades->firstWhere('orden', $unidadActual['orden'] + 1);
                        @endphp
                        <h4 class="text-end">
                          @if($siguienteUnidad)
                            <a href="{{ route('unidades.index', ['curso_id' => $curso->id, 'unidad_id' => ($unidadActual['orden']+1)]) }}" id="link-siguiente" class="link-sig disabled" style="pointer-events:none;opacity:0.5;">
                                Clase Siguiente
                            </a>
                          @else
                            <a class="link-sig disabled" id="link-siguiente" style="pointer-events:none;opacity:0.5;" href="{{ route('ver_multiple_choice', 1) }}" >
                                Ir al Examen
                            </a>
                          @endif
                        </h4>
                        <script>
                          document.getElementById('checkbox-leido').addEventListener('change', function() {
                              if (this.checked) {
                                  enviarFormulario();
                              }
                          });

                          function enviarFormulario() {
                              const form = document.getElementById('form-unidad-leida');
                              const formData = new FormData(form);

                              fetch(form.action, {
                                  method: 'POST',
                                  headers: {
                                      'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                                  },
                                  body: formData
                              })
                              .then(response => {
                                  if (response.ok) {
                                      // Habilitar enlace "Clase Siguiente"
                                      const linkSiguiente = document.getElementById('link-siguiente');
                                      linkSiguiente.classList.remove('disabled');
                                      linkSiguiente.style.pointerEvents = 'auto';
                                      linkSiguiente.style.opacity = '1';
                                  } else {
                                      throw new Error('Error al marcar la unidad como leída.');
                                  }
                              })
                              .catch(error => {
                                  console.error('Error:', error);  // Mostrar error en la consola
                                  alert('Hubo un problema al enviar la solicitud.');
                              });
                          }
                        </script>
                    </div>
                </div>
            </div>
        </div> <br><br><br><br>
    </section> 

    </div>

@endsection