@extends('layout.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endpush

@section('title','Index')

@section('content')
<div class="container">
    @if($empresas)
    <div class="table-content table-responsive">
        <h1 id="full">Lista de empresas</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Empresa</th>
                    <th scope="col">Denominación</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($empresas as $empresa)
                    <td>{{$empresa->denominacion}}</td>
                    <td><a href="/{{$empresa->id}}/home">Ver Url de {{$empresa->denominacion}}</a></td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
    @else
    <div id="empty">
        <h1 id="ind-title">No hay empresas en la Base de datos lab_TPN</h1>
    </div>
    @endif
    <div class="abm-content">
        <p>Acceder al ABM de <a href="/abm/empresa">Empresa</a></p>
        <p>Acceder al ABM de <a href="/abm/noticia">Noticia</a></p>
    </div>
</div>
@endsection
