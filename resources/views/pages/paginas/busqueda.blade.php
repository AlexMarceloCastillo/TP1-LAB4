@extends('layout.app')
@push('styles')
<link rel="stylesheet" href="{{asset('css/search.css')}}">
@endpush

@section('title','Buscador')
@section('content')

<div class="page">
  <!--========================================================
                            HEADER
  =========================================================-->
    <header>
      <div class="container top-sect">
        <div class="navbar-header">
          <h1 class="navbar-brand">
            <a data-type='rd-navbar-brand'  href="/{{$empresa->id}}/home"><small>{{$empresa->denominacion}}</small></a>
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

      <section class="well well4">

        <div class="container">

          <h2>
            {{$busqueda}}
          </h2>
          <div class="row offs2">
              @forelse($noticias as $noticia)

            <table width="90%" align="center">
				<tbody>
					<tr>
						<td>
							<a href="/detalle/{{$noticia->id}}">
								<img width="250px" height="50px" class="imgNoticia" src="/storage/img/noticias/{{$noticia->img}}" alt="img">
							</a>
						</td>
						<td width="25"></td>
						<td style="text-align:justify;" valign="top">
							<a style="text-align:justify; font-size:20px" href="/detalle/{{$noticia->id}}" class="banner">
								{{$noticia->titulo}}									</a>
							<div class="verOcultar">
								{{$noticia->resumen}}<a href="/detalle/{{$noticia->id}}" style="color:blue"> Leer Mas - 2020-02-14</a>
							</div>
						</td>
					</tr>
				</tbody>
            </table>
            <hr>
            @empty
            <div>
                NO HAY RESULTADOS
            </div>
            @endforelse



          </div>
        </div>
      </section>
      {{$noticias->links()}}



    </main>

    <!--========================================================
                            FOOTER
  =========================================================-->
  <footer>
   <section class="well">
      <div class="container">
            <p class="rights">
              {{$empresa->denominacion}} &#169; <span id="copyright-year"></span>
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

<!-- coded by vitlex -->
@endsection
