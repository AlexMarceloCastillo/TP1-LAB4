@extends('layout.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/detalle.css') }}">
@endpush

@section('title','DETALLE')
 <link rel="shortcut icon" href="/img/favicon.ico" />
@section('content')
<!--========================================================
                          CONTENT
=========================================================-->

  <main>
    <section class="">
      <div class="container">
    <center>
      <div id="imagenPrincipal" style="height: 450px; background-image: url('http://localhost:8000/storage/noticias/{{$noticia->img}}'); background-repeat: no-repeat;background-size: cover;">
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
        <div class="">

          <div class="">
            <dl class="">
              <dt>
                {{$noticia->resumen}}
              </dt>
              <hr>
              <div class="contenido-html">
                @php
                  echo $noticia->contenido_html;
                @endphp
              </div>
            </dl>
          </div>
        </div>
      </div>
    </section>


  </main>

@endsection
