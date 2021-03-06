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

@section('content')

<div class="page">
    <!--========================================================
                            HEADER
  =========================================================-->
    <header>
        <div class="container top-sect">
            <div class="navbar-header">
                <h1 class="navbar-brand">
                    <a data-type='rd-navbar-brand' href="./"><small>{{$empresa->denominacion}}</small></a>
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
                        <input class="search-form_input" type="text" name="busqueda" autocomplete="off"
                            placeholder="" />
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
                            <a href="/detalle/{{$noticia->id}}">
                                <ion-icon name="chevron-forward-outline"></ion-icon>
                            </a>
                        </div>
                        <div class="caption-mobile">
                            <h5>{{$noticia->titulo}}</h5>
                            <p>{{$noticia->descripcion}}</p>
                            <a href="/detalle/{{$noticia->id}}">
                                <ion-icon name="chevron-forward-outline"></ion-icon>
                            </a>
                        </div>
                    </div>
                    @else
                    <div class="carousel-item">
                        <img src="/images/page-1_slide2.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{$noticia->titulo}}</h5>
                            <p>{{$noticia->descripcion}}</p>
                            <a href="/detalle/{{$noticia->id}}">
                                <ion-icon name="chevron-forward-outline"></ion-icon>
                            </a>
                        </div>

                        <div class="caption-mobile">
                            <h5>{{$noticia->titulo}}</h5>
                            <p>{{$noticia->descripcion}}</p>
                            <a href="/detalle/{{$noticia->id}}">
                                <ion-icon name="chevron-forward-outline"></ion-icon>
                            </a>
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
    <footer>

      <div class="" id="map">

      </div>
    </footer>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/tm-scripts.js"></script>
<!-- </script> -->

<style>
    /* Set the size of the div element that contains the map */
    #map {
        height: 400px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
    }

</style>
<script>


    // Initialize and add the map
    function initMap() {
      fetch("http://localhost:8000/{{$empresa->id}}/getEmpresa")
      .then(function(response){
        return response.json();
      })
      .then(function(data){

        var contentString =
            "<div id='content'>" +
            "<div id='siteNotice'>" +
            "</div>" +
            "<h4 id='firstHeading' class='firstHeading'>"+ data.denominacion +"</h4>" +
            "<div id='bodyContent'>" +
            "<ul class='ulPopup'><li>Telefono:"+data.telefono +"</li><li>Domicilio:"+data.domicilio+ "</li><li>E-Mail:"+ data.email+"</li></ul>" +
            "</div>" +
            "</div>";
        var popup = new google.maps.InfoWindow({
            content: contentString
        });
        popup.open(map, marker);
      })
        // The location of Uluru
        var uluru = {lat:{{$empresa->latitud}},lng:{{$empresa->longitud}}};
        // The map, centered at Uluru
        var map = new google.maps.Map(
            document.getElementById('map'), {
                zoom: 16,
                center: uluru
            });
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }

</script>
<!--Load the API from the specified URL
* The async attribute allows the browser to render the page while the API loads
* The key parameter will contain your own API key (which is not needed for this tutorial)
* The callback parameter executes the initMap() function
-->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWDWxeewwyzEH_V_Fsk64WCetmnTodlEI&callback=initMap"></script>
</div>


@endsection
