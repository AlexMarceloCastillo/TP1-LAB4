@extends('layout.app')

@push('styles')
<link rel="stylesheet" href="{{asset('css/camera.css')}}">
    <link rel="stylesheet" href="{{asset('css/search.css')}}">
    <link rel="stylesheet" href="{{asset('css/google-map.css')}}">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
<style>
    #map {
        height: 100%;
    }
</style>
@endpush
@section('scripts')



@endsection



@section('title','HOME')
<link rel="shortcut icon" href="/img/favicon.ico" />
<script>
jjQuery('#camera').camera();
            </script>

@section('content')

<div class="page">
  <!--========================================================
                            HEADER
  =========================================================-->
    <header>
      <div class="container top-sect">
        <div class="navbar-header">
          <h1 class="navbar-brand">
            <a data-type='rd-navbar-brand'  href="./"><small>{{$empresa->denominacion}}</small></a>
          </h1>
          <a class="search-form_toggle" href="#"></a>
        </div>

        <div class="help-box text-right">
          <p>Telefono</p>
          <a href="callto:#">{{$empresa->telefono}}</a>
          <small><span>Horario:</span>{{$empresa->hs_atencion}}</small>
        </div>
      </div>

	  <div id="stuck_container" class="stuck_container">
        <div class="container">

        <form class="search-form" action="/busqueda" method="GET" accept-charset="utf-8">
          <label class="search-form_label">
            <input class="search-form_input" type="text" name="busqueda" autocomplete="off" placeholder=""/>
            <span class="search-form_liveout"></span>
          </label>
          <button class="search-form_submit fa-search" type="submit"></button>
        </form>

        </div>

      </div>

    </header>

  <!--========================================================
                            CONTENT
  =========================================================-->

    <main>
        <!--carrousel-->
    <section>
      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach($noticias as $noticia)
             @if($loop->first)

            <div class="carousel-item active">

                <img src="/images/page-1_slide1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{$noticia->titulo}}</h5>
                    <p>{{$noticia->descripcion}}</p>
                    <a href="/detalle/{{$noticia->id}}"><ion-icon name="chevron-forward-outline"></ion-icon></a>
                </div>
                <div class="caption-mobile">
                    <h5>{{$noticia->titulo}}</h5>
                    <p>{{$noticia->descripcion}}</p>
                    <a href="/detalle/{{$noticia->id}}"><ion-icon name="chevron-forward-outline"></ion-icon></a>
                </div>
            </div>
            @else
            <div class="carousel-item">
                <img src="/images/page-1_slide2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{$noticia->titulo}}</h5>
                    <p>{{$noticia->descripcion}}</p>
                    <a href="/detalle/{{$noticia->id}}"><ion-icon name="chevron-forward-outline"></ion-icon></a>
                </div>

                <div class="caption-mobile">
                    <h5>{{$noticia->titulo}}</h5>
                    <p>{{$noticia->descripcion}}</p>
                    <a href="/detalle/{{$noticia->id}}"><ion-icon name="chevron-forward-outline"></ion-icon></a>
                </div>
            </div>
            @endif
            @endforeach
        </div>


  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

    </section>
    <!--fin carrousel-->
      <section class="well well2 wow fadeIn  bg1" data-wow-duration='3s'>
        <div class="container">
        <h2 class="txt-pr">
        Quienes Somos
        </h2>
          <div class="row">
            <div class="col">
              <p style="text-align:justify">
                {{$empresa->q_somos}}
              </p>
            </div>
          </div>
        </div>
      </section>

    </main>

    <!--========================================================
                            FOOTER
  =========================================================-->
  <footer class="top-border">
	<section class="well well2 wow fadeIn  bg1" data-wow-duration='3s'>
        <div class="container">
        <h2 class="txt-pr">
        Donde estamos
        </h2>
        </div>
    </section>
	<div class="map">
      <div id="google-map" class="map_model" data-zoom="11"></div>
      <ul class="map_locations">
        <li data-x="-73.9874068" data-y="40.643180" data-basic="images/gmap_marker.png" data-active="images/gmap_marker_active.png">
          <div class="location">
            <h3 class="txt-clr1" style="color:black">
              <small>
                {{$empresa->denominacion}}
              </small>
            </h3>
              <address>
                <dl>
                  <dt>Telefono: </dt>
                  <dd class="phone" style="color:black"><a href="callto:#"> {{$empresa->telefono}}</a></dd>
                </dl>
                <dl>
                  <dt>Domicilio: </dt>
                  <dd style="color:black">{{$empresa->domicilio}}</dd>
                </dl>
                <dl>
                  <dt> E-mail: </dt>
                  <dd style="color:black"><a href="mailto:#">{{$empresa->email}}</a></dd>
                </dl>
              </address>

          </div>
        </li>
      </ul>
    </div>

    <section class="well1">
      <div class="container">
            <p class="rights">
              {{$empresa->denominacion}}  &#169; <span id="copyright-year"></span>
              <a href="index-5.html">Privacy Policy</a>
              <!-- {%FOOTER_LINK} -->
            </p>
      </div>
    </section>
  </footer>
  </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/tm-scripts.js"></script>
  <!-- </script> -->



@endsection
