@extends('layout.app')

@push('styles')
{{-- <link rel="stylesheet" href="{{ asset('css/home.css') }}"> --}}
@endpush

@section('title','ABM-Empresa')

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
        <th scope="col">Denominacion</th>
        <th scope="col">Telefono</th>
        <th scope="col">Horas de Atencion</th>
        <th scope="col">¿Quienes somos?</th>
        <th scope="col">Latitud</th>
        <th scope="col">Longitud</th>
        <th scope="col">Domicilio</th>
        <th scope="col">Email</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($empresas as $key => $empresa)
        <tr>
          <th scope="row">{{$empresa->id}}</th>
          <td>{{$empresa->denominacion}}</td>
          <td>{{$empresa->telefono}}</td>
          <td>{{$empresa->hs_atencion}}</td>
          <td>{{$empresa->q_somos}}</td>
          <td>{{$empresa->latitud}}</td>
          <td>{{$empresa->longitud}}</td>
          <td>{{$empresa->domicilio}}</td>
          <td>{{$empresa->email}}</td>
            <td>
              <div class="row">
                <form method="POST" action="/borrar/empresa/{{$empresa->id}}" onsubmit="return confirmar()">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                    <button type="submit" name="button" class="btn btn-danger">Eliminar</button>
                </form>
                <hr>
                      <a href="/editar/empresa/{{$empresa->id}}" style="color:white">
                        <button class="btn btn-primary" name="button">Editar
                  </button></a>
              </div>
          </td>
        </tr>
      @empty
        <h1>No hay empresas</h1>
      @endforelse
    </tbody>
  </table>
  <button type="button" class="btn btn-success mb-3" name="button" data-toggle="modal"
      data-target="#modalEmpresa">Agregar</button>

  </div>



<!-- Modal Crear Empresa-->
<div class="modal fade" id="modalEmpresa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" action="/crear/empresa" method="post">
                  @csrf
                  <label for="denominacion">Denominacion de la empresa</label>
                  <div class="input-group mb-3">
                      <input type="text" name="denominacion" class="form-control" placeholder=""
                          required>
                  </div>
                  <hr>
                  <label for="telefono">Telefono</label>
                  <div class="input-group mb-3">
                      <input type="number" name="telefono" class="form-control" placeholder=""
                          required maxlength="9" minlength="9">
                  </div>
                  <hr>
                  <label for="horario">Horarios de Atencion</label>
                  <div class="input-group mb-3">
                      <input type="text" name="horario" class="form-control" placeholder=""
                          required>
                  </div>
                  <hr>
                  <label for="quienes_somos">¿Quienes Somos?</label>
                  <div class="input-group mb-3">
                      <textarea name="quienes_somos" rows="8" cols="80" required></textarea>
                  </div>
                  <hr>
                  <label for="latitud">Latitud</label>
                  <div class="input-group mb-3">
                      <input type="number" name="latitud" class="form-control" placeholder=""
                          required>
                  </div>
                  <label for="longitud">Longitud</label>
                  <div class="input-group mb-3">
                      <input type="number" name="longitud" class="form-control" placeholder=""
                          required>
                  </div>
                  <hr>
                  <label for="domicilio">Domicilio</label>
                  <div class="input-group mb-3">
                      <input type="text" name="domicilio" class="form-control" placeholder=""
                          required>
                  </div>
                  <hr>
                  <label for="email">Email</label>
                  <div class="input-group mb-3">
                      <input type="email" name="email" class="form-control" placeholder=""
                          required>
                  </div>
                  <hr>
                  <button type="submit" class="btn btn-reg btn-lg btn-block my-3 ">Crear Empresa</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- -->

@endsection
