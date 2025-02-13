let edita=0;

function habilitarCampos(a,b) {

    $('#rut').prop('disabled', a);
    $('#nombre').prop('disabled', a);
    $('#apellidos').prop('disabled', a);
    $('#fecha_nacimiento').prop('disabled', a);
    $('#contacto').prop('disabled', a);
    $('#email').prop('disabled', a);
    $('#tipo').prop('disabled', a);
    $('#estado').prop('disabled', a);
    $('#btn_nuevo').prop('disabled', b);
    $('#btn_guardar').prop('disabled', a);
    $('#btn_cancelar').prop('disabled', a);
    $('#fecha_creacion').prop('disabled', a);
    
}

function grabarFormulario() {
   
        var rut = $('#rut').val();
        var nombre = $('#nombre').val();
        var apellidos = $('#apellidos').val();
        var fecha_nacimiento = $('#fecha_nacimiento').val();
        var contacto = $('#contacto').val();
        var email = $('#email').val();
        var tipo = $('#tipo').val();
        var estado = $('#estado').val();
        var btn_nuevo = $('#btn_nuevo').val();
        var btn_guardar = $('#btn_guardar').val();
        var btn_cancelar = $('#btn_cancelar').val();
        var fecha_creacion = $('#fecha_creacion').val();


        var data = {
            'rut': rut,
            'nombre': nombre,
            'apellidos': apellidos,
            'fecha_nacimiento': fecha_nacimiento,
            'contacto': contacto,
            'email': email,
            'tipo': tipo,
            'estado': estado,
            'btn_nuevo': btn_nuevo,
            'btn_guardar': btn_guardar,
            'btn_cancelar': btn_cancelar,
            'fecha_creacion': fecha_creacion,
            'edita':edita,
            'id_usuario': $('#id_usuario').val()
        };

        $.ajax({
            type: 'POST',
            url: '../usuarios/crea_usuarios.php',
            data: data,
            dataType: 'json',
            success: function (data) {
                console.log(data.codigo);

                if (data.codigo == 2) {
                    Swal.fire({
                        title: 'Ha ocurrido un error',
                        text: data.mensaje,
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                    });
                } else {
                    Swal.fire({
                        title: 'Usuario guardado correctamente',
                        icon: 'success',
                        text: data.mensaje,
                        confirmButtonText: 'Aceptar'
                    });
                    habilitarCampos(true, false);
                    $('#usuariosForm')[0].reset();
                    $("#grid_usuarios").dataTable().fnReloadAjax("../usuarios/views/data_usuarios.php");
                    edita = 0;
                    $("#datosUsuario").collapse("hide");
                }
            }
        });


    
}

function cargar_datos_formulario(data){
    // console.log(data);
        $('#id_usuario').val(data.id);
        $('#rut').val(data.rut);
        $('#nombre').val(data.nombre);
        $('#apellidos').val(data.apellidos);
        $('#fecha_nacimiento').val(data.fecha_nacimiento);
        $('#contacto').val(data.contacto);
        $('#email').val(data.email);
        $('#tipo').val(data.tipo);
        $('#estado').val(data.estado);
        $('#fecha_creacion').val(data.fecha_creacion);

        habilitarCampos(false, true);
        edita = 1;


}

function reseteo_password(id_usuario){

    $.ajax({
        type: 'POST',
        url: '../usuarios/reseteo_usuarios.php',
        data: {
            'id_usuario': id_usuario
        },
        dataType: 'json',
        success: function (data) {
            console.log(data.codigo);

            if (data.codigo == 2) {
                Swal.fire({
                    title: 'Ha ocurrido un error',
                    text: data.mensaje,
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
            } else {
                Swal.fire({
                    title: 'Contraseña generada correctamente',
                    icon: 'success',
                    text: data.mensaje,
                    confirmButtonText: 'Aceptar'
                });
                $("#grid_usuarios").dataTable().fnReloadAjax("../usuarios/views/data_usuarios.php");
            }
        }
    });
}

function bloqueo_usuario(id_usuario, estado){

    $.ajax({
        type: 'POST',
        url: '../usuarios/bloqueo_usuarios.php',
        data: {
            'id_usuario': id_usuario,
            'estado': estado
        },
        dataType: 'json',
        success: function (data) {
            console.log(data.codigo);

            if (data.codigo == 2) {
                Swal.fire({
                    title: 'Ha ocurrido un error',
                    text: data.mensaje,
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
            } else {
                Swal.fire({
                    title: 'Usuario guardado correctamente',
                    icon: 'success',
                    text: data.mensaje,
                    confirmButtonText: 'Aceptar'
                });
                $("#grid_usuarios").dataTable().fnReloadAjax("../usuarios/views/data_usuarios.php");
            }
        }
    });
}

$(document).ready(function () {

    $('#btn_nuevo').click(function () {
        habilitarCampos(false,true);
        $("#datosUsuario").collapse("show");
        // alert("hola");
    });


    $('#btn_cancelar').click(function () {
        habilitarCampos(true, false);
        $('#usuariosForm')[0].reset();
        edita = 0;
        $("#datosUsuario").collapse("hide");

    });

    $('#btn_guardar').click(function () {

        if ($("#usuariosForm").valid()) {            
            grabarFormulario();
        }

    });
    

    var Fn = {
        // Valida el rut con su cadena completa "XXXXXXXX-X"
        validaRut: function (rutCompleto) {
            var rutCompleto_ = rutCompleto.replace(/\./g, "");

            if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test(rutCompleto_))
                return false;
            var tmp = rutCompleto_.split('-');
            var digv = tmp[1];
            var rut = tmp[0];
            if (digv == 'K') digv = 'k';
            return (Fn.dv(rut) == digv);
        },
        dv: function (T) {
            var M = 0, S = 1;
            for (; T; T = Math.floor(T / 10))
                S = (S + T % 10 * (9 - M++ % 6)) % 11;
            return S ? S - 1 : 'k';
        },
        formatear: function (rut) {
            var tmp = this.quitar_formato(rut);
            var rut = tmp.substring(0, tmp.length - 1), f = "";
            while (rut.length > 3) {
                f = '.' + rut.substr(rut.length - 3) + f;
                rut = rut.substring(0, rut.length - 3);
            }
            return ($.trim(rut) == '') ? '' : rut + f + "-" + tmp.charAt(tmp.length - 1);
        },
        quitar_formato: function (rut) {
            rut = rut.split('-').join('').split('.').join('');
            return rut;
        }
    }

    function convertirMayusculas(texto) {
        var text = texto.toUpperCase().trim();
        return text;
    }


    $("#rut").on("blur", function () {
        if (this.value != "") {
            if (Fn.validaRut(Fn.formatear(this.value))) {
                this.value = convertirMayusculas(Fn.formatear(this.value));
            } else {
                swal({
                    title: "Error",
                    text: "RUT incorrecto",
                    type: "error"
                }).then(function () {
                    $("#rut").val("");
                    setTimeout(function () {
                        $("#rut").focus();
                    }, 100);
                });
            }
        }
    });


    $("#usuariosForm").validate({
        debug: true,
        errorClass: "my-error-class",
        highlight: function (element, required) {
            $(element).css('border', '2px solid #FDADAF');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).css('border', '1px solid #CCC');
        },
        rules: {
            rut: {
                required: true,
                maxlength: 12
                
            },
            nombre: {
                required: true,
                maxlength: 100
            },
            apellidos: {
                required: true,
                maxlength: 200
            },
            fecha_nacimiento: {
                required: true,
                maxlength: 200
            },
            contacto: {
                required: true,
                digits: true
            },
            email: {
                required: true
            },
            tipo: {
                required: true
            },
            estado: {
                required: true
            },
            fecha_creacion: {
                required: true,               
                maxlength: 200
            }

        },
        messages: {
            rut: {
                rut: "Solo números o k",
                required: "El RUT del usuario es obligatorio",
                maxlength: "Máximo 10 caracteres"
            },
            nombre: {
                required: "El nombre del usuario es obligatorio",
                letras: "Solo puede ingresar letras",
                maxlength: "Máximo 100 caracteres"
            },
            apellidos: {
                required: "El apellido del usuario es obligatorio",
                letras: "Solo puede ingresar letras",
                maxlength: "Máximo 200 caracteres"
            },
            fecha_nacimiento: {
                required: "La fecha de nacimiento del usuario es obligatorio",
                maxlength: "Máximo 200 caracteres"
            },
            contacto: {
                required: "El contacto del usuario es obligatorio"
            },
            email: {
                required: "El email del usuario es obligatorio"
            },
            tipo: {
                required: "El tipo de usuario es obligatorio"
            },
            estado: {
                required: "El estado del usuario es obligatorio"
            },
            fecha_creacion: {
                charspecial: "Tiene caracteres no permitidos",
                maxlength: "Máximo 200 caracteres"
            },
        }
    });


    var grid_usuarios = $("#grid_usuarios").DataTable({
        responsive: true,
        paging: true,
        destroy: true,   
        select: true,
        ajax: "../usuarios/views/data_usuarios.php",
        orderClasses: true,
        select: {
            style: 'single' // O 'multi' si quieres seleccionar múltiples filas
        },
        columns: [
            { "data": "id" },
            { "data": "rut" },
            { "data": "nombre" },
            { "data": "apellidos" },
            { "data": "email" },
            { "data": "tipo" },
            { "data": "estado",
                "render": function(data, type, row) {
                    let icono;
                    if (data == 1) {
                        icono = "<button type='button' class='estado_usu btn btn-warning' title='Traza socio'><i class='fa fa-check-circle' style='color: #1e5388; ' title='Activo'></i></button>";
                    } else {
                        icono = "<button type='button' class='estado_usu btn btn-warning' title='Traza socio'><i class='fa fa-ban' style='color: #1e5388; ' title='Bloqueado'></i></button>";
                    }
                    return icono;
                }
            },
            { "data": "id",
                "render": function(data, type, row) {
                    let icono = "<button type='button' class='reset_pass btn btn-warning' title='Resetear Contraseña'><i class='fa fa-key' style='color: blue; ' title='Resetear Contraseña'></i></button>";
                    return icono;
                }
            },
        ],        
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "select": {
                "rows": "<br/>%d Perfiles Seleccionados"
            },
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Sig.",
                "previous": "Ant."
            }
        }
    });



    $('#grid_usuarios tbody').on('dblclick', 'tr', function () {
        var data = grid_usuarios.row( this ).data();
        
        
        Swal.fire({
            title: 'Editar Usuario?',
            text: "Desea realemente editar este usuario?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, editar!'
        }).then((result) => {
            if (result.isConfirmed) {
                cargar_datos_formulario(data);
                $("#datosUsuario").collapse("show");
            }
        });

    });

    $("#grid_usuarios tbody").on("click", "button.estado_usu", function () {
        var tr = $(this).closest('tr');
        if ($(tr).hasClass('child')) {
            tr = $(tr).prev();
        }

        var data = grid_usuarios.row(tr).data();
        var id_usuario = data.id;
        var estado = data.estado;

        var obs="Desbloquear Usuario";
        
        if(estado==1){
            obs="Bloquear Usuario";
        }

        Swal.fire({
            title: '¿Está seguro?',
            text: obs,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, ' + obs,
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                bloqueo_usuario(id_usuario,estado);
            }
        });      
      
    });


    $("#grid_usuarios tbody").on("click", "button.reset_pass", function () {
        var tr = $(this).closest('tr');
        if ($(tr).hasClass('child')) {
            tr = $(tr).prev();
        }

        var data = grid_usuarios.row(tr).data();
        var id_usuario = data.id;        

        Swal.fire({
            title: '¿Está seguro?',
            text: "Resetar Pasword de este usuario",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Nueva contraseña',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                reseteo_password(id_usuario);
            }
        });



    });

});