// Call the dataTables jQuery plugin
var table = null;
$(document).ready(function() {
  table = mostrarTabla();

  $("#dataTable tbody").on("click", "button.editar", function(){
    var data = table.row($(this).parents("tr")).data();
    console.log(data);
    var idUsuario = $('#idUsuario').val(data.idUsuario),
        cedula = $("#cedula").val( data.nroCedula),
        nombre = $("#nombres").val( data.nombres),
        apellido = $("#apellidos").val( data.apellidos),
        correo = $("#correo").val( data.correo),
        direccion = $("#direccion").val( data.direccion),
        telefono = $("#telefono").val( data.telefono),
        rol = $("#rol").val( data.rol);
  });
  $('#nuevoUserform').submit(function(e) {
    e.preventDefault();
    if(ValidateForm()){
          $.ajax({
              type: "POST",
              url: '../../controller/action/act_registrarUsuario.php',
              data: $(this).serialize(),
              success: function(response)
              {
                  var jsonData = JSON.parse(response);
  
                  // user is successfully register in the back-end
                  if (jsonData.success == "1")
                  {
                      MensajeConfirm('success','Registro exitoso!',jsonData.message,'login.php');
                  }
                  else
                  {
                      Mensaje('error','Oops...',jsonData.message);
                  }
            }
          });
      }
    });

    $('#nuevanombres').keyup(function(){
        if(!LettersValidation($(this).val()) && $(this).val() != ''){
            Mensaje('error','Oops...','Ingresó un caracter invalido en el campo '+ $(this).attr('placeholder'));
            $(this).val('');
        }
    });

    $('#nuevaapellidos').keyup(function(){
        if(!LettersValidation($(this).val()) && $(this).val() != ''){
            Mensaje('error','Oops...','Ingresó un caracter invalido en el campo '+ $(this).attr('placeholder'));
            $(this).val('');
        }
    });

    $('#nuevacedula').keyup(function(){
        if(!CedulaValidation($(this).val()) && $(this).val() != ''){
            Mensaje('error','Oops...','Ingresó un caracter invalido en el campo '+ $(this).attr('placeholder'));
            $(this).val('');
        }
    });

  
  obtener_id_eliminar("#dataTable tbody", table);
  editarAdminUser();
});

function mostrarTabla(){
  return $('#dataTable').DataTable({
    destroy: "true",
    ajax: "../../controller/action/act_verUsuarios.php",
    columns: [
            { data: "idUsuario", "visible" : false },
            { data: "nroCedula" },
            { data: "nombres" },
            { data: "apellidos" },
            { data: "correo" },
            { data: "direccion" },
            { data: "telefono" },
            { data: "rol" },
            {"defaultContent": "<button type='button' class='editar btn btn-primary' data-toggle='modal' href = '#modal'><i class='fas fa-edit'></i></button>	<button type='button' class='eliminar btn btn-danger' data-toggle='modal'  ><i class='far fa-trash-alt'></i></button>"}
    ]
  });
  
}

var obtener_id_eliminar = function(tbody, table){
  $(tbody).on("click","button.eliminar", function(evt){
    evt.preventDefault();
    var data1 = table.row($(this).parents("tr")).data();
    console.log(data1.idUsuario);
    $.ajax({
          type : "POST",
          url : '../../controller/action/act_eliminaAdmAUser.php',
          data: {idUsuario: data1.idUsuario},
          dataType : 'json',
          success : function(response){
            console.log(response);
            if(response.success == 1){
              Mensaje('success', 'Usuario eliminado', response.message);
              table=mostrarTabla();
              
            }else {
              Mensaje('error', 'Oops...', response.message);
            }
          },
            error: function (response) {
             console.log(response);
         }
        })
  })
}

function editarAdminUser(){
    
    $('#guardar').on('click', function(evt){
      evt.preventDefault();
      var id = $('#idUsuario').val();
          cedula = $('#cedula').val(),
          nombre = $('#nombres').val(),
          apellido = $('#apellidos').val(),
          correo = $('#correo').val(),
          direccion = $('#direccion').val(),
          telefono = $('#telefono').val(),
          rol = $('#rol').val();
      $.ajax({
        type : "POST",
        url : '../../controller/action/act_admPorUser.php',
        data: {idUsuario: id , nroCedula : cedula, names: nombre, last_names : apellido, email : correo, address : direccion, cellphone : telefono, aux : 1, rol : rol},
        dataType : 'json',
        success : function(response){
          if(response.success == "1"){
            Mensaje('success', 'Usuario modificado', response.message);
            table = mostrarTabla();
            //obtener_data_editar("#dataTable tbody", table);
            $('#modalconfi').modal('hide');
            $('#modal').modal('hide');
          }else {
            Mensaje('error', 'No puede quedar espacion en blanco', response.message);
          }
        },
          error: function (response) {
           console.log(response);
       }
      })
    })
}

function ValidateForm() {
  var cedula = $('#nuevacedula').val(),
      nombres = $('#nuevanombres').val(),
      apellidos = $('#nuevaapellidos').val(),
      correo = $('#nuevacorreo').val(),
      contrasena = $('#nuevacontrasena').val(),
      rol = $('#nuevarol').val();
  if(cedula == '' || nombres == '' || apellidos == '' || correo == '' || rol == '' || contrasena == '' ){
        Mensaje('error','Oops...','Hay campos vacios. LLene todos los campos',);
        return false;
    }else{
        if(!EmailValidation(correo)){
            Mensaje('error','Oops...','El email no cumple con la estructura');
            return false;
        }
    }
  
}