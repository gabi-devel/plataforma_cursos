@extends('layouts.app')

@section('content')
<div class="page row" style="margin: 0">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse bg-secondary">
        <div class="position-sticky pt-3 sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item" style="border-bottom: 1px solid #83a7f3;">
                    <a class="nav-link" href="#" onclick="cargarContenido('unidad1')">Unidad 1</a>
                </li>
                <li class="nav-item" style="border-bottom: 1px solid #83a7f3;">
                    <a class="nav-link" href="#" onclick="cargarContenido('unidad2')">Unidad 2</a>
                </li>
                <li class="nav-item" style="border-bottom: 1px solid #83a7f3;">
                    <a class="nav-link" href="#" onclick="cargarContenido('unidad3')">Unidad 3</a>
                </li>
                <li class="nav-item" style="border-bottom: 1px solid #83a7f3;">
                    <a class="nav-link" href="#" onclick="cargarContenido('unidad4')">Unidad 4</a>
                </li>
                <li class="nav-item" style="border-bottom: 1px solid #83a7f3;">
                    <a class="nav-link" href="#" onclick="cargarContenido('unidad5')">Unidad 5</a>
                </li>
                <li class="nav-item" style="border-bottom: 1px solid #83a7f3;">
                    <a class="nav-link" href="#" onclick="cargarContenido('examen')">Examen</a>
                </li>
            </ul>
        </div>
    </nav>

<style>
    .conte {
    padding: 20px;
}

/* Posicionar el enlace en la esquina inferior derecha de la ventana */
.link-sig {
    position: absolute;
    bottom: 40px;
    right: 35px;
}

/* Evitar que el enlace se superponga al contenido cuando el contenido es más largo que la ventana */
body {
    min-height: 100vh;
    position: relative;
}
</style>

    <section class="section section-sm section-first bg-light col-md-9 col-lg-10">
        <div class="container">
            <div class="row row-50">
                <div class="col-12">
                    <div class="mt-3" class="conte" id="contenido">
                        <h1 id="titulo">Titulo del curso</h1>
                        <h3 id="subtitulo"></h3> <br>
                        <h5 id="texto">Contenido</h5>
                        <h2></h2>
                        <h2><a href="{{ route('ver_multiple_choice', 1) }}" class="btn btn-primary mt-4">Multiple choice</a></h2>
                        <h4 class="text-end"><a href="#" id="link-siguiente" class="link-sig">Clase Siguiente</a></h4>
                    </div>
                </div>
            </div>
        </div> <br><br><br><br>
    </section> 

    <script>
        function cargarContenido(unidad) {
            const contenido = {
                unidad1: {
                    titulo: 'Unidad 1: Introducción',
                    subtitulo: 'Subtítulo de Unidad 1',
                    texto: 'Contenido de la Unidad 1: Texto específico de esta unidad.<div> <br><iframe width="560" height="315" src="https://www.youtube.com/embed/DLikpfc64cA?si=IG0kpPOAVqcM50Oh" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe></div>',
                    siguiente: 'unidad2'
                },
                unidad2: {
                    titulo: 'Unidad 2: Desarrollo',
                    subtitulo: 'Subtítulo de Unidad 2',
                    texto: 'Contenido de la Unidad 2: Aquí va el texto específico de esta unidad. Maecenas viverra bibendum elit, id ornare eros. Duis eu risus quis justo commodo cursus. Nunc imperdiet metus ut tortor volutpat sagittis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Morbi posuere, dolor sit amet vulputate sodales, dui lectus luctus erat, et ornare sapien lorem nec lorem. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean ac rutrum arcu. Duis tincidunt ultricies turpis, molestie pretium leo sodales quis. Cras sagittis aliquet felis sit amet ultrices. Praesent molestie nunc elit, rutrum porta nisi consectetur convallis. Cras nec nisl varius est ultrices tempor sit amet et nulla. Fusce eget ullamcorper arcu, ac lacinia est. Suspendisse potenti. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque suscipit, nibh in porta molestie, ligula dolor faucibus justo, eget auctor lacus orci eget magna. Curabitur in ligula dui. Ut aliquam diam non quam tincidunt laoreet. Curabitur sed enim nec turpis congue euismod sed vel felis. Nulla venenatis neque vel vehicula imperdiet. Maecenas lacinia scelerisque lobortis. Nunc id sem efficitur, imperdiet mi ac, maximus purus. Suspendisse facilisis dolor laoreet, rhoncus orci eget, molestie augue. Etiam posuere nec velit vel convallis. Fusce venenatis, augue ut molestie interdum, libero nunc sollicitudin lacus, nec dignissim justo arcu at ante. Aenean vitae justo non lacus porttitor convallis ut ac ipsum. Nunc semper malesuada rhoncus. Duis id malesuada tellus, at facilisis neque. Pellentesque quis ligula sodales, pellentesque justo vitae, lobortis ligula. Sed convallis ligula id fringilla luctus. <br> <br><br> <div><iframe width="1120" height="630" src="https://www.youtube.com/embed/1s5XhW8ND08?si=1mRqMRwor_Oy9Hy6" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe></div>',
                    siguiente: 'unidad3'
                },
                unidad3: {
                    titulo: 'Unidad 3: Aplicación Práctica',
                    subtitulo: 'Subtítulo de Unidad 3',
                    texto: 'Contenido de la Unidad 3: Aquí va el texto específico de esta unidad.',
                    siguiente: 'unidad4'
                },
                unidad4: {
                    titulo: 'Unidad 4: Teoría',
                    subtitulo: 'Subtítulo de Unidad 4',
                    texto: 'Contenido de la Unidad 4: Aquí va el texto específico de esta unidad.',
                    siguiente: 'unidad5'
                },
                unidad5: {
                    titulo: 'Unidad 5: Conclusión',
                    subtitulo: 'Subtítulo de Unidad 5',
                    texto: 'Contenido de la Unidad 5: Aquí va el texto específico de esta unidad.',
                    siguiente: 'examen'
                },
                examen: {
                    titulo: 'Examen Final',
                    subtitulo: '',
                    texto: `Instrucciones y contenido para el examen final. `,
                    siguiente: null
                }
            };

            // Actualiza el contenido en la sección
            document.getElementById('titulo').innerText = contenido[unidad].titulo;
            document.getElementById('subtitulo').innerText = contenido[unidad].subtitulo;
            document.getElementById('texto').innerHTML = contenido[unidad].texto;

            // Actualiza el link de la siguiente clase
            const linkSiguiente = document.getElementById('link-siguiente');
            if (contenido[unidad].siguiente) {
                linkSiguiente.innerText = 'Clase Siguiente';
                linkSiguiente.href = '#';
                linkSiguiente.onclick = function() {
                    cargarContenido(contenido[unidad].siguiente);
                };
            } else {
                /* linkSiguiente.innerText = 'Fin del Curso'; */
                linkSiguiente.innerText = '';
                linkSiguiente.href = '#';
                linkSiguiente.onclick = null;
            }
        }
    </script>
</div>
@endsection
