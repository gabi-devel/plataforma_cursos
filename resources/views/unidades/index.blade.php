@extends('layouts.app')

@section('content')
    <div class="page row" style="margin: 0">
      <!-- Page Header-->
      {{--<header class="section page-header">
        <!-- RD Navbar-->
         <div class="rd-navbar-wrap" style="height: unset;">
          <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-main-outer">
              <div class="rd-navbar-main">
                <!-- RD Navbar Panel-->
                <div class="rd-navbar-panel">
                  <!-- RD Navbar Toggle-->
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                  <!-- RD Navbar Brand-->
                  <div class="rd-navbar-brand"><a class="brand" href="./"><img src="hxh.png" alt="" width="161" height="49"/></a></div>
                </div>
                <div class="rd-navbar-main-element">
                  <div class="rd-navbar-nav-wrap">
                    <!-- RD Navbar Basket-->
                    <div class="rd-navbar-basket-wrap">
                      <button class="rd-navbar-basket fl-bigmug-line-shopping198" data-rd-navbar-toggle=".cart-inline"><span>2</span></button>
                      <div class="cart-inline">
                        <div class="cart-inline-header">
                          <h5 class="cart-inline-title">In cart:<span> 2</span> Products</h5>
                          <h6 class="cart-inline-title">Total price:<span> $800</span></h6>
                        </div>
                        <div class="cart-inline-body">
                          <div class="cart-inline-item">
                            <div class="unit align-items-center">
                              <div class="unit-left"><a class="cart-inline-figure" href="single-course.html"><img src="images/product-mini-9-100x100.jpg" alt="" width="100" height="100"/></a></div>
                              <div class="unit-body">
                                <h6 class="cart-inline-name"><a href="single-course.html">Business Finance: Solving Key Financial Problems</a></h6>
                                <div>
                                  <div class="group-xs">
                                    <div class="table-cart-stepper">
                                      <input class="form-input" type="number" data-zeros="true" value="1" min="1" max="1000"/>
                                    </div>
                                    <h6 class="cart-inline-title">$550</h6>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="cart-inline-item">
                            <div class="unit align-items-center">
                              <div class="unit-left"><a class="cart-inline-figure" href="single-course.html"><img src="images/product-mini-10-100x100.jpg" alt="" width="100" height="100"/></a></div>
                              <div class="unit-body">
                                <h6 class="cart-inline-name"><a href="single-course.html">Employee Behavior Management Essentials</a></h6>
                                <div>
                                  <div class="group-xs">
                                    <div class="table-cart-stepper">
                                      <input class="form-input" type="number" data-zeros="true" value="1" min="1" max="1000"/>
                                    </div>
                                    <h6 class="cart-inline-title">$250</h6>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="cart-inline-footer">
                          <div class="group-sm"><a class="button button-md button-default-outline-2 button-wapasha" href="#">Go to cart</a><a class="button button-md button-primary button-pipaluk" href="#">Checkout</a></div>
                        </div>
                      </div>
                    </div>
                    <!-- RD Navbar Search-->
                    <div class="rd-navbar-search">
                      <button class="rd-navbar-search-toggle" data-rd-navbar-toggle=".rd-navbar-search"><span></span></button>
                      <form class="rd-search" action="search-results.html" data-search-live="rd-search-results-live" method="GET">
                        <div class="form-wrap">
                          <label class="form-label" for="rd-navbar-search-form-input">Search...</label>
                          <input class="rd-navbar-search-form-input form-input" id="rd-navbar-search-form-input" type="text" name="s" autocomplete="off"/>
                          <div class="rd-search-results-live" id="rd-search-results-live"></div>
                        </div>
                        <button class="rd-search-form-submit fl-bigmug-line-search74" type="submit"></button>
                      </form>
                    </div>
                    <!-- RD Navbar Nav-->
                    <ul class="rd-navbar-nav">
                      <li class="rd-nav-item"><a class="rd-nav-link" href="./">Home</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="about-us.html">About</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="courses.html">Courses</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="events.html">Events</a>
                      </li>
                      <li class="rd-nav-item active"><a class="rd-nav-link" href="#">Pages</a>
                        <!-- RD Navbar Megamenu-->
                        <ul class="rd-menu rd-navbar-megamenu">
                          <li class="rd-megamenu-item">
                            <div>
                              <h5 class="rd-megamenu-title">Elements</h5>
                              <ul class="rd-megamenu-list">
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="typography.html">Typography</a></li>
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="buttons.html">Buttons</a></li>
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="forms.html">Forms</a></li>
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="tabs-and-accordions.html">Tabs and Accordions</a></li>
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="counters.html">Counters</a></li>
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="icons-with-text.html">Icons with Text</a></li>
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="progress-bars.html">Progress Bars</a></li>
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="calls-to-action.html">Calls to Action</a></li>
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="grid-system.html">Grid System</a></li>
                              </ul>
                            </div>
                          </li>
                          <li class="rd-megamenu-item">
                            <div>
                              <h5 class="rd-megamenu-title">Additional pages</h5>
                              <ul class="rd-megamenu-list">
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="services.html">Services</a></li>
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="services-2.html">Services 2</a></li>
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="single-course.html">Single Course</a></li>
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="single-service.html">Single Service</a></li>
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="our-team.html">Our Team</a></li>
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="testimonials.html">Testimonials</a></li>
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="404-page.html">404 Page</a></li>
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="503-page.html">503 Page</a></li>
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="pricing.html">Pricing</a></li>
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="single-event.html">Single Event</a></li>
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="coming-soon.html">Coming Soon</a></li>
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="contact-us-2.html">Contact Us 2</a></li>
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="faq.html">FAQ</a></li>
                                <li class="rd-megamenu-list-item"><a class="rd-megamenu-list-link" href="search-results.html">Search results</a></li>
                              </ul>
                            </div>
                          </li>
                          <li class="rd-megamenu-item rd-megamenu-carousel">
                            <div>
                              <h5 class="rd-megamenu-title">Recent courses</h5>
                              <!-- Owl Carousel-->
                              <div class="owl-carousel owl-navbar" data-items="1" data-xl-items="2" data-xxl-items="3" data-margin="16" data-dots="true" data-loop="false" data-autoplay="false">
                                <!-- Thumbnail Classic-->
                                <article class="thumbnail thumbnail-mary thumbnail-xxs">
                                  <div class="thumbnail-mary-figure"><img src="images/navbar-1-272x288.jpg" alt="" width="272" height="288"/>
                                  </div>
                                  <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/navbar-1-1200x800-original.jpg" data-lightgallery="item"><img src="images/navbar-1-272x288.jpg" alt="" width="272" height="288"/></a>
                                    <h6 class="thumbnail-mary-title"><a href="#">Course #1</a></h6>
                                  </div>
                                </article>
                                <!-- Thumbnail Classic-->
                                <article class="thumbnail thumbnail-mary thumbnail-xxs">
                                  <div class="thumbnail-mary-figure"><img src="images/navbar-2-272x288.jpg" alt="" width="272" height="288"/>
                                  </div>
                                  <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/navbar-2-1200x800-original.jpg" data-lightgallery="item"><img src="images/navbar-2-272x288.jpg" alt="" width="272" height="288"/></a>
                                    <h6 class="thumbnail-mary-title"><a href="#">Course #2</a></h6>
                                  </div>
                                </article>
                                <!-- Thumbnail Classic-->
                                <article class="thumbnail thumbnail-mary thumbnail-xxs">
                                  <div class="thumbnail-mary-figure"><img src="images/navbar-3-272x288.jpg" alt="" width="272" height="288"/>
                                  </div>
                                  <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/navbar-3-1200x800-original.jpg" data-lightgallery="item"><img src="images/navbar-3-272x288.jpg" alt="" width="272" height="288"/></a>
                                    <h6 class="thumbnail-mary-title"><a href="#">Course #3</a></h6>
                                  </div>
                                </article>
                                <!-- Thumbnail Classic-->
                                <article class="thumbnail thumbnail-mary thumbnail-xxs">
                                  <div class="thumbnail-mary-figure"><img src="images/navbar-4-272x288.jpg" alt="" width="272" height="288"/>
                                  </div>
                                  <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/navbar-4-1200x800-original.jpg" data-lightgallery="item"><img src="images/navbar-4-272x288.jpg" alt="" width="272" height="288"/></a>
                                    <h6 class="thumbnail-mary-title"><a href="#">Course #4</a></h6>
                                  </div>
                                </article>
                                <!-- Thumbnail Classic-->
                                <article class="thumbnail thumbnail-mary thumbnail-xxs">
                                  <div class="thumbnail-mary-figure"><img src="images/navbar-5-272x288.jpg" alt="" width="272" height="288"/>
                                  </div>
                                  <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/navbar-5-1200x800-original.jpg" data-lightgallery="item"><img src="images/navbar-5-272x288.jpg" alt="" width="272" height="288"/></a>
                                    <h6 class="thumbnail-mary-title"><a href="#">Course #5</a></h6>
                                  </div>
                                </article>
                                <!-- Thumbnail Classic-->
                                <article class="thumbnail thumbnail-mary thumbnail-xxs">
                                  <div class="thumbnail-mary-figure"><img src="images/navbar-6-272x288.jpg" alt="" width="272" height="288"/>
                                  </div>
                                  <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/navbar-6-1200x800-original.jpg" data-lightgallery="item"><img src="images/navbar-6-272x288.jpg" alt="" width="272" height="288"/></a>
                                    <h6 class="thumbnail-mary-title"><a href="#">Course #6</a></h6>
                                  </div>
                                </article>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="contact-us.html">Contacts</a>
                      </li>
                    </ul>
                  </div>
                  <div class="rd-navbar-project-hamburger" data-rd-navbar-toggle=".rd-navbar-main">
                    <div class="project-hamburger"><span class="project-hamburger-arrow-top"></span><span class="project-hamburger-arrow-center"></span><span class="project-hamburger-arrow-bottom"></span></div>
                    <div class="project-close"><span></span><span></span></div>
                  </div>
                  <div class="rd-navbar-project rd-navbar-classic-project">
                    <h4 class="text-spacing-50">Our Works</h4>
                    <div class="rd-navbar-project-content rd-navbar-classic-project-content">
                      <div class="row" data-lightgallery="group">
                        <div class="col-12">
                          <!-- Thumbnail Classic-->
                          <article class="thumbnail thumbnail-mary">
                            <div class="thumbnail-mary-figure"><img src="images/gallery-image-1-330x240.jpg" alt="" width="330" height="240"/>
                            </div>
                            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/grid-gallery-4-1200x800-original.jpg" data-lightgallery="item"><img src="images/gallery-image-1-330x240.jpg" alt="" width="330" height="240"/></a>
                            </div>
                          </article>
                        </div>
                        <div class="col-12">
                          <!-- Thumbnail Classic-->
                          <article class="thumbnail thumbnail-mary">
                            <div class="thumbnail-mary-figure"><img src="images/gallery-image-2-330x240.jpg" alt="" width="330" height="240"/>
                            </div>
                            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/fullwidth-masonry-gallery-10-1200x800-original.jpg" data-lightgallery="item"><img src="images/gallery-image-2-330x240.jpg" alt="" width="330" height="240"/></a>
                            </div>
                          </article>
                        </div>
                        <div class="col-12">
                          <!-- Thumbnail Classic-->
                          <article class="thumbnail thumbnail-mary">
                            <div class="thumbnail-mary-figure"><img src="images/gallery-image-3-330x240.jpg" alt="" width="330" height="240"/>
                            </div>
                            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/fullwidth-gallery-4-1200x800-original.jpg" data-lightgallery="item"><img src="images/gallery-image-3-330x240.jpg" alt="" width="330" height="240"/></a>
                            </div>
                          </article>
                        </div>
                        <div class="col-12">
                          <!-- Thumbnail Classic-->
                          <article class="thumbnail thumbnail-mary">
                            <div class="thumbnail-mary-figure"><img src="images/gallery-image-4-330x240.jpg" alt="" width="330" height="240"/>
                            </div>
                            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/masonry-gallery-4-1200x800-original.jpg" data-lightgallery="item"><img src="images/gallery-image-4-330x240.jpg" alt="" width="330" height="240"/></a>
                            </div>
                          </article>
                        </div>
                        <div class="col-12">
                          <!-- Thumbnail Classic-->
                          <article class="thumbnail thumbnail-mary">
                            <div class="thumbnail-mary-figure"><img src="images/gallery-image-5-330x240.jpg" alt="" width="330" height="240"/>
                            </div>
                            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/fullwidth-masonry-gallery-6-1200x800-original.jpg" data-lightgallery="item"><img src="images/gallery-image-5-330x240.jpg" alt="" width="330" height="240"/></a>
                            </div>
                          </article>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div> 
      </header>--}}

      <!-- Breadcrumbs -->
      {{-- <section class="breadcrumbs-custom-inset">
        <div class="breadcrumbs-custom context-dark bg-overlay-40">
          <div class="container">
            <h3 class="breadcrumbs-custom-title">Business Analytics for IT Leaders</h3>
            <ul class="breadcrumbs-custom-path">
              <li><a href="index.html">Home</a></li>
              <li><a href="#">Pages</a></li>
              <li class="active">Single Course</li>
            </ul>
          </div>
          <div class="box-position" style="background-image: url(images/bg-about.jpg);"></div>
        </div>
      </section> --}}

      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse bg-secondary">
        <div class="position-sticky pt-3 sidebar-sticky">
          <ul class="nav flex-column">
            {{-- <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home align-text-bottom" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                Unidad 1
              </a>
            </li> --}}
            @foreach ($unidades as $unidad)
              <li class="nav-item" style="
                          border-bottom: 1px solid #83a7f3;">
                <a class="nav-link" href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file align-text-bottom" aria-hidden="true"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                  Unidad {{ $unidad->orden }}
                </a>
              </li>
            @endforeach
            {{-- <li class="nav-item">
              <a class="nav-link" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart align-text-bottom" aria-hidden="true"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                Products
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users align-text-bottom" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                Customers
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2 align-text-bottom" aria-hidden="true"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                Reports
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers align-text-bottom" aria-hidden="true"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                Integrations
              </a>
            </li> --}}
          </ul>
  
          {{-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>Saved reports</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle align-text-bottom" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
            </a>
          </h6> --}}
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text align-text-bottom" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                Examen
              </a>
            </li>
          </ul>
        </div>
      </nav>
      
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
      // Pasar los datos de las unidades a JavaScript
      const unidades = @json($unidades);
      function cargarContenido(unidadId) {
        // Encontrar la unidad actual
        const unidad = unidades.find(u => u.id == unidadId);
        if (!unidad) return;

        // Actualizar el título
        document.getElementById('titulo').innerText = unidad.titulo;

        // Actualizar el subtítulo, o ocultarlo si no existe
        const subtituloElement = document.getElementById('subtitulo');
        if (unidad.subtitulo) {
            subtituloElement.innerText = unidad.subtitulo;
            subtituloElement.style.display = ''; // Mostrar el subtítulo
        } else {
            subtituloElement.style.display = 'none'; // Ocultar si no hay subtítulo
        }

        // Actualizar el contenido
        document.getElementById('texto').innerHTML = unidad.contenido;

        // Obtener la siguiente unidad
        const indiceActual = unidades.findIndex(u => u.id == unidadId);
        const siguienteUnidad = unidades[indiceActual + 1];

        // Actualizar el enlace "Clase Siguiente"
        const linkSiguiente = document.getElementById('link-siguiente');
        if (siguienteUnidad) {
            linkSiguiente.innerText = 'Clase Siguiente';
            linkSiguiente.href = `#`; // Usar # ya que la ruta no cambia
            linkSiguiente.onclick = function (event) {
                event.preventDefault(); // Evitar recargar la página
                cargarContenido(siguienteUnidad.id); // Cargar el contenido de la siguiente unidad
            };
        } else {
            linkSiguiente.innerText = '';
            linkSiguiente.href = '#';
            linkSiguiente.onclick = null; // No hacer nada si no hay más unidades
        }
      }

      // Llamar a la función con la primera unidad al cargar la página
      if (unidades.length > 0) {
          cargarContenido(unidades[0].id);
      }
    </script>
      
    </div>

@endsection