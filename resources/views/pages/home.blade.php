@extends('layout.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<style>
  	  #map {
        height: 100%;
      }

	</style>
@endpush

@section('title','HOME')
 <link rel="shortcut icon" href="/img/favicon.ico" />
@section('content')
<div class="body">
  <header>
    <div class="contenido-header">
      <div class="denominacion">
        <h1>{{$empresa->denominacion}}</h1>
      </div>
      <div class="contact-box">
          <p>Telefono:</p>
          <ion-icon name="phone-portrait-outline"></ion-icon>
          <a href="callto:#">{{$empresa->telefono}}</a>
          <hr>
          <small><span> <strong>Horario:</strong> </span>{{$empresa->hs_atencion}}</small>
      </div>
    </div>
  </header>
  <div class="contenido-search">
    <form class="" action="/busqueda" method="GET">
      <input type="text" name="" value="">
      <button type="submit" name="button"> <ion-icon name="search-outline"></ion-icon></button>
    </form>
  </div>
  <main>
    <section>
      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/img/page-1_slide1.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
        <a href="#"><ion-icon name="chevron-forward-outline"></ion-icon></a>
      </div>
        <div class="caption-mobile">
          <h5>First slide label</h5>
          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
          <a href="#"><ion-icon name="chevron-forward-outline"></ion-icon></a>
        </div>
    </div>
    <div class="carousel-item">
      <img src="/img/page-1_slide2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <a href="#"><ion-icon name="chevron-forward-outline"></ion-icon></a>
      </div>
    </div>
    <div class="carousel-item">
      <img src="/img/page-1_slide3.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
        <a href="#"><ion-icon name="chevron-forward-outline"></ion-icon></a>
      </div>
    </div>
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
    <section>
      <div class="q_somos">
        <h2>Quienes Somos</h2>
        <p>{{$empresa->q_somos}}.</p>
      </div>

    </section>
  </main>
  <footer>
    <h2>Donde Estamos</h2>

    <div id="map">
    </div>
          <p class="rights">
            Denominación Empresa  &#169; <span id="copyright-year"></span>
            <a href="index-5.html">Privacy Policy</a>
            <!-- {%FOOTER_LINK} -->
          </p>
  </footer>

    <style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>
<script>
// Initialize and add the map
function initMap() {
// The location of Uluru
var uluru = {lat: {{$empresa->latitud}}, lng: {{$empresa->longitud}}};
// The map, centered at Uluru
var map = new google.maps.Map(
  document.getElementById('map'), {zoom: 16, center: uluru});
// The marker, positioned at Uluru
var marker = new google.maps.Marker({position: uluru, map: map});
var contentString ='<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h4 id="firstHeading" class="firstHeading">{{$empresa->denominacion}}</h4>'+
      '<div id="bodyContent">'+
      '<ul class"ulPopup"><li>Telefono: {{$empresa->telefono}}</li><li>Domicilio: {{$empresa->domicilio}}</li><li>E-Mail: {{$empresa->email}}</li></ul>'+
      '</div>'+
      '</div>';
var popup = new google.maps.InfoWindow({
	content: contentString});
	popup.open(map, marker);
}
</script>
<!--Load the API from the specified URL
* The async attribute allows the browser to render the page while the API loads
* The key parameter will contain your own API key (which is not needed for this tutorial)
* The callback parameter executes the initMap() function
-->
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWDWxeewwyzEH_V_Fsk64WCetmnTodlEI&callback=initMap">
</script>
</div>


@endsection
