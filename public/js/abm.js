
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

/*AGREGAR EMPRESA*/

$(".btn-submit-empresa").click(function(e){
  e.preventDefault();
  var denominacion = $("input[name=denominacion]").val();
  var telefono = $("input[name=telefono]").val();
  var horario = $("input[name=horario]").val();
  var q_somos = $("textarea[name=quienes_somos]").val();
  var latitud = $("input[name=latitud]").val();
  var longitud = $("input[name=longitud]").val();
  var domicilio = $("input[name=domicilio]").val()
  var email = $("input[name=email]").val();
  var campos = validarCamposEmpresa(denominacion,telefono,horario,q_somos,latitud,longitud,domicilio,email);
  switch (campos) {
    case 1: alert('HAY CAMPOS VACIOS');break;
    case 2: alert('LOS CAMPOS NECESITAN UN MINIMO DE 5 CARACTERES');break;
    case 3: alert('EL HORARIO NECESITA UN MINIMO DE 10 CARACTERES');break;
    case 4: alert('EL EMAIL NO UTILIZA @');break;
      break;
    default:
  }
  if(campos == 0){
    $.ajax({
      type:'POST',
      url: 'http://localhost:8000/crear/empresa',
      data: {denominacion:denominacion,telefono:telefono,horario:horario,q_somos:q_somos,latitud:latitud,longitud:longitud,domicilio:domicilio,email:email},
      success:function(data){
        var tr =
        "<tr>"+
        "<td>"+data.id+"</td>"+
        "<td><a href='/"+data.id+"/home'>"+ data.denominacion +"</a></td>"+
        "<td>"+data.telefono+"</td>"+
        "<td>"+data.hs_atencion+"</td>"+
        "<td><button type='button' class='btn btn-info' name='button' data-toggle='modal' data-target='#q_Somos'  onclick='mostrarQuienesSomos("+ JSON.stringify(data)+")'>Ver</button></td>"+
        "<td>"+data.latitud+"</td>"+
        "<td>"+data.longitud+"</td>"+
        "<td>"+data.domicilio+"</td>"+
        "<td>"+data.email+"</td>"+
        "<td>"+
          "<div class='row'>"+
            "<button type='button' onclick='borrarEmpresa("+data.id+",this)' name='button' class='btn-delete btn btn-danger'>Eliminar</button>"+
            "<hr>"+
            "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modalEmpresa' onclick='editarEmpresa("+ JSON.stringify(data) +",this)'>Editar</button>"+
          "</div>"+
        "</td>"+
        "</tr>";
        $(".table-empresa tbody").append(tr);
        $("input[name=denominacion]").val("");
        $("input[name=telefono]").val("");
        $("input[name=horario]").val("");
        $("input[name=quienes_somos]").html("");
        $("input[name=latitud]").val("");
        $("input[name=longitud]").val("");
        $("input[name=domicilio]").val("");
        $("#modalEmpresa").modal('hide');
        $("div.modal-backdrop.fade.show").remove();
        alert('CREADO CORRECTAMENTE');
      },
      error:function(e){
        alert('ERROR NO SE PUDO CREAR. TIPO DE ERROR ('+e+')');
      }
    });
  }
});
/*ABM EDITAR EMPRESA*/
function editarEmpresa(empresa,boton){
   $("input[name=denominacion]").val(empresa.denominacion);
   console.log($("input[name=telefono]"));
   $("input[name=telefono]").val(empresa.telefono);
   $("input[name=horario]").val(empresa.hs_atencion);
   $("textarea[name=quienes_somos]").val(empresa.q_somos);
   $("input[name=latitud]").val(empresa.latitud);
   $("input[name=longitud]").val(empresa.longitud);
   $("input[name=domicilio]").val(empresa.domicilio);
   $("input[name=email]").val(empresa.email);
   $(".modal-title").html("Actualizar Empresa");
    $(".btn-submit-empresa").hide();
    var botonActualizar ="<button type='submit' class='btn btn-warning btn-block my-3 btn-put-empresa'>Actualizar</button>";
    $(".empresa-form").append(botonActualizar);
      $(".btn-put-empresa").click(function(e){
          e.preventDefault();
          var campos = validarCamposEmpresa($("input[name=denominacion]").val(),$("input[name=telefono]").val(),$("input[name=horario]").val(), $("textarea[name=quienes_somos]").val(),
          $("input[name=latitud]").val(),$("input[name=longitud]").val(),$("input[name=domicilio]").val(),$("input[name=email]").val());
          switch (campos) {
            case 1: alert('HAY CAMPOS VACIOS');break;
            case 2: alert('LOS CAMPOS NECESITAN UN MINIMO DE 5 CARACTERES');break;
            case 3: alert('EL HORARIO NECESITA UN MINIMO DE 10 CARACTERES');break;
            case 4: alert('EL EMAIL NO UTILIZA @');break;
          }
          if(campos == 0){
            $.ajax({
               type:'PUT',
               url:'http://localhost:8000/actualizar/empresa/'+empresa.id,
               data:{denominacion:$("input[name=denominacion]").val(),telefono:$("input[name=telefono]").val(),horario:$("input[name=horario]").val(),
               q_somos:$("textarea[name=quienes_somos]").val(),latitud: $("input[name=latitud]").val(),longitud:$("input[name=longitud]").val(),
               domicilio:$("input[name=domicilio]").val(),email:$("input[name=email]").val()},
               success:function(data){
                console.log(data);
                  var td =
                  "<td scope='row'>"+data.id+"</td>"+
                  "<td>"+data.denominacion+"</td>"+
                  "<td>"+data.telefono+"</td>"+
                  "<td>"+data.hs_atencion+"</td>"+
                  "<td><button type='button' class='btn btn-info' name='button' data-toggle='modal' data-target='#q_Somos'  onclick='mostrarQuienesSomos("+ JSON.stringify(data) +")'>Ver</button>"+
                  "<td>"+data.latitud+"</td>"+
                  "<td>"+data.longitud+"</td>"+
                  "<td>"+data.domicilio+"</td>"+
                  "<td>"+data.email+"</td>"+
                  "<td>"+
                    "<div class='row'>"+
                      "<button type='button' onclick='borrarEmpresa("+data.id+",this)' name='button' class='btn-delete btn btn-danger'>Eliminar</button>"+
                      "<hr>"+
                      "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modalEmpresa' onclick='editarEmpresa("+ JSON.stringify(data) +",this)>Editar</button>"+
                    "</div>"+
                  "</td>";
                $(boton).closest('tr').html(td);
                $("input[name=denominacion]").val("");
                $("input[name=telefono]").val("");
                $("input[name=horario]").val("");
                $("input[name=quienes_somos]").val("");
                $("input[name=latitud]").val("");
                $("input[name=longitud]").val("");
                $("input[name=domicilio]").val("");
                $("#modalEmpresa").modal('hide');
                $(".modal-title").html("Agregar Empresa");
                $("div.modal-backdrop.fade.show").remove();
                alert('ACTUALIZADO CORRECTAMENTE');
               },
               error:function(e){
                 alert('ERROR NO SE PUDO ACTUALIZAR'+e);
               }
            });
          }
      });

      $("#modalEmpresa").on('hidden.bs.modal', function () {
      $(".btn-put-empresa").remove();
      $(".btn-submit-empresa").show();
      $(".modal-title").html("Agregar Empresa");

      });

}

$("#modalEmpresa").on('hidden.bs.modal', function () {
  $("input[name=denominacion]").val("");
  $("input[name=telefono]").val("");
  $("input[name=horario]").val("");
  $("input[name=quienes_somos]").html("");
  $("input[name=latitud]").val("");
  $("input[name=longitud]").val("");
  $("input[name=domicilio]").val("");
});

/*ABM ELIMINAR EMPRESA*/
function borrarRegistro(id,boton,tipo){
  var url;
 switch (tipo) {
   case 1: url = 'http://localhost:8000/borrar/noticia/';break;
   case 2: url = 'http://localhost:8000/borrar/empresa/';break;
 }
 if(confirm('¿ESTA SEGURO DE BORRAR ESTE REGISTRO?')){
   $.ajax({
     type:'DELETE',
     url:url+id,
     data:{id:id},
     success:function(){
       $(boton).closest('tr').remove();
       alert('REGISTRO BORRADO CON EXITO');
     },
     error: function(e){
       alert('ERROR NO SE PUDO ELIMINAR EL REGISTRO. TIPO DE ERROR ('+e+')');
     }
   })
 }
}
/*EDITAR EMPRESA*/
/*FUNCIONES COMPLEMENTARIAS*/
function validarCamposEmpresa(denominacion,telefono,horario,q_somos,latitud,longitud,domicilio,email){
  var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._]+\.[a-zA-z]{2,6}$/;
  if(denominacion == "" || telefono == ""  || horario == "" || q_somos == "" || latitud == "" || longitud == "" || domicilio == "" || email == ""){
    return 1;
  }else if(denominacion.length <=4 || telefono.length <=4 || q_somos.length <=4 || latitud.length <=4 || longitud.length <=4 || domicilio.length <=4 || email.length <=4){
    return 2;
  }else if(horario.length <=5){
    return 3;
  }else if(regex.test(email) == false){
    return 4;
  }else{
    return 0;
  }
}
