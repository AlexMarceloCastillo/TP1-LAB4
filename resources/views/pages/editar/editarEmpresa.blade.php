@extends('layout.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/empresa.css') }}">
@endpush

@section('title','Editar Empresa')

@section('content')
  <div class="editar-form-empresa">
    <form class="" action="/actualizar/empresa" method="post">
        @csrf
        <h1>Editar Empresa</h1>
        <input type="hidden" name="id" value="{{$empresa->id}}">
        <label for="denominacion">Denominacion de la empresa</label>
        <div class="input-group mb-3">
            <input type="text" name="denominacion" class="form-control" placeholder=""
                required value="{{$empresa->denominacion}}">
        </div>
        <hr>
        <label for="telefono">Telefono</label>
        <div class="input-group mb-3">
            <input type="number" name="telefono" class="form-control" placeholder=""
                required maxlength="9" minlength="9" value="{{$empresa->telefono}}">
        </div>
        <hr>
        <label for="horario">Horarios de Atencion</label>
        <div class="input-group mb-3">
            <input type="text" name="horario" class="form-control" placeholder=""
                required value="{{$empresa->hs_atencion}}">
        </div>
        <hr>
        <label for="quienes_somos">¿Quienes Somos?</label>
        <div class="input-group mb-3">
            <textarea name="quienes_somos" rows="8" cols="80" required>{{$empresa->q_somos}}</textarea>
        </div>
        <hr>
        <label for="latitud">Latitud</label>
        <div class="input-group mb-3">
            <input type="number" name="latitud" class="form-control" placeholder=""
                required value="{{$empresa->latitud}}">
        </div>
        <label for="longitud">Longitud</label>
        <div class="input-group mb-3">
            <input type="number" name="longitud" class="form-control" placeholder=""
                required value="{{$empresa->longitud}}">
        </div>
        <hr>
        <label for="domicilio">Domicilio</label>
        <div class="input-group mb-3">
            <input type="text" name="domicilio" class="form-control" placeholder=""
                required value="{{$empresa->domicilio}}">
        </div>
        <hr>
        <label for="email">Email</label>
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder=""
                required value="{{$empresa->email}}">
        </div>
        <hr>
        <button type="submit" class="btn btn-reg btn-lg btn-block my-3 ">Actualizar Empresa</button>
    </form>
  </div>
@endsection
