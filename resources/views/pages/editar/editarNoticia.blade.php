@extends('layout.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/noticias.css') }}">
@endpush

@section('title','Editar Noticia')

@section('content')
<div class="editar-form-noticia">
  <form class="" action="/actualizar/noticia" method="POST">
    @csrf
    <h1>Editar Noticia</h1>
    <input type="hidden" name="id" value="{{$noticia->id}}">
    <label for="titulo">Nuevo titulo</label>
    <div class="input-group mb-3">
        <input type="text" name="titulo" class="form-control" placeholder="Titulo de la noticia"
            required value="{{$noticia->titulo}}">
    </div>
    <hr>
    <label for="resumen">Resumen</label>
    <div class="input-group mb-3">
        <textarea name="resumen" rows="8" cols="80" required>{{$noticia->resumen}}</textarea>
    </div>
    <hr>
    <label for="imagen_noticia">Foto de la noticia</label>
    <div class="input-group mb-3">
        <input id="seleccionImagen" type="file" name="imagen_noticia" value="" accept="image/*">
        <img src="/storage/img/noticias/{{$noticia->img}}" alt="" id="imgInput" rows="2">
        <script type="text/javascript">
        const $seleccionArchivos = document.querySelector("#seleccionImagen"),
        $imagenPrevisualizacion = document.querySelector("#imgInput");
        // Escuchar cuando cambie
        $seleccionArchivos.addEventListener("change", () => {
          // Los archivos seleccionados, pueden ser muchos o uno
          const archivos = $seleccionArchivos.files;
          // Si no hay archivos salimos de la función y quitamos la imagen
          if (!archivos || !archivos.length) {
            $imagenPrevisualizacion.src = "/storage/img/noticias/{{$noticia->img}}";
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
        <textarea name="contenido_html" rows="8" cols="80" value=""></textarea>
    </div>
    <hr>
    <p>Empresa Actual: {{$noticia->empresa->denominacion}}</p>
    <div class="input-group mb-3">
        <select name="empresa" required>
              <option value="{{$noticia->empresa}}">{{$noticia->empresa->denominacion}}</option>
          @forelse ($empresas as $key => $empresa)
              <option value={{$empresa->id}}>{{$empresa->denominacion}}</option>
          @empty
            <h2>No hay empresas</h2>
          @endforelse
        </select>
    </div>
    <hr>
    <div class="form-check">
      @if ($noticia->publicada == 'Y')
      <input class="form-check-input" type="radio" name="publicar" id="exampleRadios1" value="Y" checked>
      @else
      <input class="form-check-input" type="radio" name="publicar" id="exampleRadios1" value="Y">
      @endif
      <label class="form-check-label" for="exampleRadios1">
        Publicar
      </label>
    </div>
    <div class="form-check">
      @if ($noticia->publicada == 'N')
      <input class="form-check-input" type="radio" name="publicar" id="exampleRadios2" value="N" checked>
      @else
      <input class="form-check-input" type="radio" name="publicar" id="exampleRadios2" value="N">
      @endif
      <label class="form-check-label" for="exampleRadios2">
        No publicar
      </label>
    </div>
    <hr>

    <div class="input-group mb-3">
        <input type="datetime-local" name="fecha_publicacion" class="form-control"
            required value="{{$noticia->fecha_publicacion}}">
    </div>
    <button type="submit" class="btn btn-reg btn-lg btn-block my-3 ">Actualizar Noticia</button>
  </form>
</div>
@endsection
