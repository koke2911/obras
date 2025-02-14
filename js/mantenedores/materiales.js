let edita=0;

function habilitarCampos(a,b) {

    // $('#id_material').prop('disabled', a);
    $('#txt_nombre_material').prop('disabled', a);
    $('#cmb_tipo').prop('disabled', a);
    $('#btn_nuevo').prop('disabled', b);
    $('#btn_guardar').prop('disabled', a);
    $('#btn_cancelar').prop('disabled', a);
    
}

function grabarFormulario() {
   
        var id_material = $('#id_material').val();
        var txt_nombre_material = $('#txt_nombre_material').val();
        var cmb_tipo = $('#cmb_tipo').val();


        var data = {
            'id_material': id_material,
            'txt_nombre_material': txt_nombre_material,
            'cmb_tipo': cmb_tipo,
            'edita':edita
        };

        $.ajax({
            type: 'POST',
            url: '../mantenedores/crea_material.php',
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
                        title: 'material guardado correctamente',
                        icon: 'success',
                        text: data.mensaje,
                        confirmButtonText: 'Aceptar'
                    });
                    habilitarCampos(true, false);
                    $('#materialesForm')[0].reset();
                    $("#grid_materiales").dataTable().fnReloadAjax("../mantenedores/views/data_materiales.php");
                    edita = 0;
                    $("#datosMaterial").collapse("hide");
                }
            }
        });


    
}

function cargar_datos_formulario(data){
        $('#id_material').val(data.id);
        $('#txt_nombre_material').val(data.nombre);
        $('#cmb_tipo').val(data.tipo);
        habilitarCampos(false, true);
        edita = 1;
}

function bloqueo_material(id_material, estado) {

    $.ajax({
        type: 'POST',
        url: '../mantenedores/bloqueo_material.php',
        data: {
            'id_material': id_material,
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
                    title: 'Material guardado correctamente',
                    icon: 'success',
                    text: data.mensaje,
                    confirmButtonText: 'Aceptar'
                });
                $("#grid_materiales").dataTable().fnReloadAjax("../mantenedores/views/data_materiales.php");
            }
        }
    });
}


$(document).ready(function () {

    $('#btn_nuevo').click(function () {
        habilitarCampos(false,true);
        $("#datosMaterial").collapse("show");
        // alert("hola");
    });


    $('#btn_cancelar').click(function () {
        habilitarCampos(true, false);
        $('#usuariosForm')[0].reset();
        edita = 0;
        $("#datosMaterial").collapse("hide");

    });

    $('#btn_guardar').click(function () {

        if ($("#usuariosForm").valid()) {            
            grabarFormulario();
        }

    });
    


    function convertirMayusculas(texto) {
        var text = texto.toUpperCase().trim();
        return text;
    }


    


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
            id_material: {
                required: true,
                maxlength: 10
                
            },
            txt_nombre_material: {
                required: true,
                maxlength: 100
            },
            cmb_tipo: {
                required: true
            }

        },
        messages: {
            id_material: {
                required: "El id del material es obligatorio",
                maxlength: "Máximo 10 caracteres"
            },
            txt_nombre_material: {
                required: "El nombre del material es obligatorio",
                maxlength: "Máximo 100 caracteres"
            },
            cmb_tipo: {
                required: "El tipo del material es obligatorio"
            }
        }
    });


    var grid_materiales = $("#grid_materiales").DataTable({
        responsive: true,
        paging: true,
        destroy: true,   
        select: true,
        ajax: "../mantenedores/views/data_materiales.php",
        orderClasses: true,
        select: {
            style: 'single' // O 'multi' si quieres seleccionar múltiples filas
        },
        columns: [
            { "data": "id" },
            { "data": "nombre" },
            { "data": "tipo" },
            {
                "data": "estado",
                "render": function (data, type, row) {
                    let icono;
                    if (data == 1) {
                        icono = "<button type='button' class='estado_mate btn btn-warning' ><i class='fa fa-check-circle' style='color: green; ' title='Activo'></i></button>";
                    } else {
                        icono = "<button type='button' class='estado_mate btn btn-warning' ><i class='fa fa-ban' style='color: red; ' title='Bloqueado'></i></button>";
                    }
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

    $("#grid_materiales tbody").on("click", "button.estado_mate", function () {
        var tr = $(this).closest('tr');
        if ($(tr).hasClass('child')) {
            tr = $(tr).prev();
        }

        var data = grid_materiales.row(tr).data();
        var id_material = data.id;
        var estado = data.estado;

        var obs = "Desbloquear Material";

        if (estado == 1) {
            obs = "Bloquear Material";
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
                bloqueo_material(id_material, estado);
            }
        });

    });


    $('#grid_materiales tbody').on('dblclick', 'tr', function () {
        var data = grid_materiales.row(this).data();


        Swal.fire({
            title: 'Editar Material?',
            text: "Desea realemente editar este material?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, editar!'
        }).then((result) => {
            if (result.isConfirmed) {
                cargar_datos_formulario(data);
                $("#datosMaterial").collapse("show");
            }
        });

    });

});