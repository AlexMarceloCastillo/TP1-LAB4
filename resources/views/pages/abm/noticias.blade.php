@extends('layout.app')


@push('styles')
<link rel="stylesheet" href="{{ asset('css/noticias.css') }}">
@endpush

@section('title','ABM-Noticia')
@php
@endphp

@section('content')
    @if (session('message') == 'ELIMINAR')
      <script type="text/javascript">
      window.addEventListener("load", function() {
      alert('Registro Eliminado Exitosamente')
      })
      </script>
    @endif
    <div class="container">
      <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Titulo</th>
          <th scope="col">Resumen</th>
          <th scope="col">Imagen</th>
          <th scope="col">Publicada</th>
          <th scope="col">Fecha de publicacion</th>
          <th scope="col">Creado</th>
          <th scope="col">Actualizado</th>
          <th scope="col">Empresa Asociada</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($noticias as $key => $noticia)
          <tr>
            <th scope="row">{{$noticia->id}}</th>
            <td>{{$noticia->titulo}}</td>
            <td>{{$noticia->resumen}}</td>
            <td><a href="/storage/img/noticias/{{$noticia->img}}">Ver imagen</a></td>
            <td>{{$noticia->publicada}}</td>
            <td>{{$noticia->fecha_publicacion}}</td>
            <td>{{$noticia->created_at}}</td>
            <td>{{$noticia->updated_at}}</td>
            <td>{{$noticia->empresa->denominacion}}</td>
              <td>
                <div class="row">
                    <form method="POST" action="/borrar/noticia/{{$noticia->id}}" onsubmit="return confirmar()">
                      @csrf
                      {{ method_field('DELETE') }}
                        <button type="submit" name="button" class="btn btn-danger">Eliminar</button>

                    </form>
                  <hr>
                      <button class="btn btn-primary" name="button" onclick="editar({{$noticia}})"> Editar
                      </button>
                </div>
            </td>
          </tr>
        @empty
          <h1>No hay noticias</h1>
        @endforelse
      </tbody>
    </table>
    <button type="button" class="btn btn-success mb-3" name="button" data-toggle="modal"
        data-target="#modalNoticia" onclick="agregar()">Agregar</button>
    </div>


    <!-- Modal Crear Noticia-->
    <div class="modal fade" id="modalNoticia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Noticia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="" action="/crear/noticia" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="titulo">Titulo de la noticia</label>
                        <div class="input-group mb-3">
                            <input type="text" name="titulo" class="form-control" placeholder="Titulo de la noticia"
                                required>
                        </div>
                        <hr>
                        <label for="resumen">Resumen</label>
                        <div class="input-group mb-3">
                            <textarea name="resumen" rows="8" cols="80" required></textarea>
                        </div>
                        <hr>
                        <label for="imagen_noticia">Foto de la noticia</label>
                        <div class="input-group mb-3">
                            <input id="seleccionImagen" type="file" name="imagen_noticia" value="" required accept="image/*">
                            <img src="/img/noticias.png" alt="" id="imgInput" rows="2">
                            <script type="text/javascript">

                            const $seleccionArchivos = document.querySelector("#seleccionImagen"),
                            $imagenPrevisualizacion = document.querySelector("#imgInput");

                            // Escuchar cuando cambie
                            $seleccionArchivos.addEventListener("change", () => {
                              // Los archivos seleccionados, pueden ser muchos o uno
                              const archivos = $seleccionArchivos.files;
                              // Si no hay archivos salimos de la función y quitamos la imagen
                              if (!archivos || !archivos.length) {
                                $imagenPrevisualizacion.src = "/img/noticias.png";
                                return;
                              }
                              // Ahora tomamos el primer archivo, el cual vamos a previsualizar
                              const primerArchivo = archivos[0];
                              // Lo convertimos a un objeto de tipo objectURL
                              const objectURL = URL.createObjectURL(primerArchivo);
                              // Y a la fuente de la imagen le ponemos el objectURL
                              $imagenPrevisualizacion.src = objectURL;
                            });
                            </script>
                        </div>
                        <hr>
                        <label for="contenido_html"> <a href="/contenido" target="_blank">Contenido HTML Automatico</a> </label>
                        <div class="input-group mb-3">
                            <textarea name="contenido_html" rows="8" cols="80" required></textarea>
                        </div>
                        <hr>
                        <label for="empresa">Empresa:</label>
                        <div class="input-group mb-3">
                            <select name="empresa" required>
                              @forelse ($empresas as $key => $empresa)
                                  <option value={{$empresa->id}}>{{$empresa->denominacion}}</option>
                              @empty
                                <h2>No hay empresas</h2>
                              @endforelse
                            </select>
                        </div>
                        <hr>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="publicar" id="exampleRadios1" value="Y" checked>
                          <label class="form-check-label" for="exampleRadios1">
                            Publicar
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="publicar" id="exampleRadios2" value="N">
                          <label class="form-check-label" for="exampleRadios2">
                            No publicar
                          </label>
                        </div>
                        <hr>

                        <div class="input-group mb-3">
                            <input type="datetime-local" name="fecha_publicacion" class="form-control"
                                required>
                        </div>
                        <button type="submit" class="btn btn-reg btn-lg btn-block my-3 ">Crear Noticia</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- -->


@endsection
