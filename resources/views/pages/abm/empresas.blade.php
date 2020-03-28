@extends('layout.admin')

@push('styles')
@endpush

@section('title','ABM-Empresa')

@section('content')
  <div class="container">
    {{$empresas->links()}}
    <table class="table table-empresa">
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
          <td scope="row">{{$empresa->id}}</td>
          <td><a href="/{{$empresa->id}}/home">{{$empresa->denominacion}}</a></td>
          <td>{{$empresa->telefono}}</td>
          <td>{{$empresa->hs_atencion}}</td>
          <td><button type="button" class="btn btn-info" name="button" data-toggle="modal" data-target="#q_Somos"  onclick='mostrarQuienesSomos({{$empresa}})'>Ver</button></td>
          <td>{{$empresa->latitud}}</td>
          <td>{{$empresa->longitud}}</td>
          <td>{{$empresa->domicilio}}</td>
          <td>{{$empresa->email}}</td>
            <td>
              <div class="row">
                    <button type="button" name="button" class="btn btn-danger mb-3" onclick="borrarRegistro({{$empresa->id}},this,2)">Eliminar</button>
                    <hr>
                    <button type="button" class="btn btn-primary mb-3" name="button" data-toggle="modal" data-target="#modalEmpresa" onclick="editarEmpresa({{$empresa}},this)">Editar</button>
              </div>
          </td>
        </tr>
      @empty
        <h1>No hay empresas</h1>
      @endforelse
    </tbody>
  </table>
  {{$empresas->links()}}
  <button type="button" class="btn btn-success mb-3" name="button" data-toggle="modal"
      data-target="#modalEmpresa">Agregar</button>

  </div>



<!-- Modal Quienes Somos-->
<div class="modal fade" id="q_Somos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">¿QUIENES SOMOS?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body quienes_somos">
        <p>

        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function mostrarQuienesSomos(empresa){
    $('.quienes_somos p').html(empresa.q_somos);
    $("#q_Somos").on('hidden.bs.modal', function () {
    $('#q_Somos p').html("");
    });
  }
</script>
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
                <form class="empresa-form" action="" method="post">
                  @csrf
                  <label for="denominacion">Denominacion de la empresa</label>
                  <div class="input-group mb-3">
                      <input type="text" name="denominacion" class="form-control name" placeholder=""
                          required>
                  </div>
                  <hr>
                  <label for="telefono">Telefono</label>
                  <div class="input-group mb-3">
                      <input type="number" name="telefono" class="form-control telefono" placeholder=""
                          required maxlength="9" minlength="9">
                  </div>
                  <hr>
                  <label for="horario">Horarios de Atencion</label>
                  <div class="input-group mb-3">
                      <input type="text" name="horario" class="form-control horario" placeholder=""
                          required>
                  </div>
                  <hr>
                  <label for="quienes_somos">¿Quienes Somos?</label>
                  <div class="input-group mb-3">
                      <textarea name="quienes_somos" rows="8" cols="80" required class="who"></textarea>
                  </div>
                  <hr>
                  <label for="latitud">Latitud</label>
                  <div class="input-group mb-3">
                      <input type="number" name="latitud" class="form-control lat" placeholder=""
                          required>
                  </div>
                  <label for="longitud">Longitud</label>
                  <div class="input-group mb-3">
                      <input type="number" name="longitud" class="form-control long" placeholder=""
                          required>
                  </div>
                  <hr>
                  <label for="domicilio">Domicilio</label>
                  <div class="input-group mb-3">
                      <input type="text" name="domicilio" class="form-control dom" placeholder=""
                          required>
                  </div>
                  <hr>
                  <label for="email">Email</label>
                  <div class="input-group mb-3">
                      <input type="email" name="email" class="form-control email" placeholder=""
                          required>
                  </div>
                  <hr>
                  <button id="submitModal" type="submit" class="btn btn-reg btn-lg btn-block my-3 btn-submit-empresa">Crear Empresa</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- -->
@endsection
