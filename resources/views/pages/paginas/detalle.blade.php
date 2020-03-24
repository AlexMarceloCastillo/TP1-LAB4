@extends('layout.app')
@push('styles')
<link rel="stylesheet" href="{{asset('css/search.css')}}">
@endpush
@section('title','Detalle')



@section('content')
<div class="page">
  <!--========================================================
                            HEADER
  =========================================================-->
    <header>
      <div class="container top-sect">
        <div class="navbar-header">
          <h1 class="navbar-brand">
            <a data-type='rd-navbar-brand'  href="/{{$noticia->empresa->id}}/home"><small>{{$noticia->empresa->denominacion}}</small></a>
          </h1>
          <a class="search-form_toggle" href="#"></a>
        </div>

        <div class="help-box text-right">
          <p>Telefono</p>
          <a href="callto:#">{{$noticia->empresa->telefono}}</a>
          <small><span>Horario:</span> {{$noticia->empresa->hs_atencion}}</small>
        </div>
      </div>

	  <div id="stuck_container" class="stuck_container">
        <div class="container">

        <form class="search-form" action="/busqueda" method="GET" accept-charset="utf-8">
           @csrf
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

      <section class="well well4">

        <div class="container">
			<center>
				<div id="imagenPrincipal" style="height: 450px; background-image: url('http://localhost:82/template_html/images/page-1_slide1.jpg?1583775512626'); background-repeat: no-repeat;background-size: cover;">
					<div style="text-align:left; background-color: rgba(1,1,1,0.5);color: #ffffff;font-size: 16px;line-height: 50px;">
					 {{$noticia->titulo}}
					</div>
				</div>
			</center>
		  <h2>
            {{$noticia->titulo}}
          </h2>
		  {{$noticia->fecha_publicacion}}
		  <hr>
          <div class="row offs2">

            <div class="col-lg-12">
              <dl class="terms-list">
                <dt>
					{{$noticia->resumen}}
                </dt>
				<hr>
                <dd>
					{{$noticia->contenido_html}}
				</dd>
              </dl>
            </div>
          </div>
        </div>
      </section>


    </main>

    <!--========================================================
                            FOOTER
  =========================================================-->
  <footer>
   <section class="well">
      <div class="container">
            <p class="rights">
              {{$noticia->empresa->denominacion}} &#169; <span id="copyright-year"></span>
              <a href="index-5.html">Privacy Policy</a>
              <!-- {%FOOTER_LINK} -->
            </p>
      </div>
    </section>
  </footer>
  </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/tm-scripts.js')}}"></script>
  <!-- </script> -->

<!-- coded by vitlex -->






@endsection
