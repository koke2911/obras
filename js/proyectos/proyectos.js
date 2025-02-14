let edita = 0;

$(document).ready(function () {

    $('#btn_nuevo').click(function () {
        habilitarCampos(false, true);
        $("#datosProyecto").collapse("show");
    });

    $('#btn_cancelar').click(function () {
        habilitarCampos(true, false);
        $('#proyectosForm')[0].reset();
        edita = 0;
        $("#datosProyecto").collapse("hide");
    });

    $('#btn_guardar').click(function () {
        if ($("#proyectosForm").valid()) {
            grabarFormulario();
        }
    });

    function habilitarCampos(a, b) {
        // $('#id_proyecto').prop('disabled', a);
        $('#txt_nombre_proyecto').prop('disabled', a);
        $('#cmb_region').prop('disabled', a);
        $('#txt_direccion').prop('disabled', a);
        $('#txt_inicio').prop('disabled', a);
        $('#txt_termino').prop('disabled', a);
        $('#txt_rut_cliente').prop('disabled', a);
        $('#txt_nombre_cliente').prop('disabled', a);
        $('#txt_presupuesto').prop('disabled', a);
        $('#cmb_tipo').prop('disabled', a);
        $('#btn_nuevo').prop('disabled', b);
        $('#btn_guardar').prop('disabled', a);
        $('#btn_cancelar').prop('disabled', a);
    }

    function grabarFormulario() {

        var id_proyecto = $('#id_proyecto').val();
        var txt_nombre_proyecto = $('#txt_nombre_proyecto').val();
        var cmb_region = $('#cmb_region').val();
        var txt_direccion = $('#txt_direccion').val();
        var txt_inicio = $('#txt_inicio').val();
        var txt_termino = $('#txt_termino').val();
        var txt_rut_cliente = $('#txt_rut_cliente').val();
        var txt_nombre_cliente = $('#txt_nombre_cliente').val();
        var txt_presupuesto = $('#txt_presupuesto').val();
        var cmb_tipo = $('#cmb_tipo').val();

        var data = {
            'id_proyecto': id_proyecto,
            'txt_nombre_proyecto': txt_nombre_proyecto,
            'cmb_region': cmb_region,
            'txt_direccion': txt_direccion,
            'txt_inicio': txt_inicio,
            'txt_termino': txt_termino,
            'txt_rut_cliente': txt_rut_cliente,
            'txt_nombre_cliente': txt_nombre_cliente,
            'txt_presupuesto': txt_presupuesto,
            'cmb_tipo': cmb_tipo,
            'edita': edita
        };

        $.ajax({
            type: 'POST',
            url: '../proyectos/crea_proyecto.php',
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
                        title: 'Proyecto guardado correctamente',
                        icon: 'success',
                        text: data.mensaje,
                        confirmButtonText: 'Aceptar'
                    });
                    habilitarCampos(true, false);
                    $('#proyectosForm')[0].reset();
                    $("#grid_proyectos").dataTable().fnReloadAjax("../proyectos/views/data_proyectos.php");
                    edita = 0;
                    $("#datosProyecto").collapse("hide");
                }
            }
        });
    }

    function cargar_datos_formulario(data) {
        $('#id_proyecto').val(data.id);
        $('#txt_nombre_proyecto').val(data.nombre);
        $('#cmb_region').val(data.region);
        $('#txt_direccion').val(data.direccion);
        $('#txt_inicio').val(data.inicio);
        $('#txt_termino').val(data.termino);
        $('#txt_rut_cliente').val(data.rut_cliente);
        $('#txt_nombre_cliente').val(data.nombre_cliente);
        $('#txt_presupuesto').val(data.presupuesto);
        $('#cmb_tipo').val(data.tipo);
        habilitarCampos(false, true);
        edita = 1;
    }

    function bloqueo_proyecto(id_proyecto, estado) {
        $.ajax({
            type: 'POST',
            url: '../mantenedores/bloqueo_proyecto.php',
            data: {
                'id_proyecto': id_proyecto,
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
                        title: 'Proyecto guardado correctamente',
                        icon: 'success',
                        text: data.mensaje,
                        confirmButtonText: 'Aceptar'
                    });
                    $("#grid_proyectos").dataTable().fnReloadAjax("../proyectos/views/data_proyectos.php");
                }
            }
        });
    }

    var grid_proyectos = $("#grid_proyectos").DataTable({
        responsive: true,
        paging: true,
        destroy: true,
        select: true,
        ajax: "../proyectos/views/data_proyectos.php",
        orderClasses: true,
        select: {
            style: 'single' // O 'multi' si quieres seleccionar m  utfilas
        },
        columns: [
            { "data": "id" },
            { "data": "nombre" },
            { "data": "inicio" },
            { "data": "termino" },
            { "data": "nombre_cliente" },
            { "data": "presupuesto" },
            { "data": "tipo" },
           
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
                "rows": "<br/>%d Proyectos Seleccionados"
            },
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Sig.",
                "previous": "Ant."
            }
        }
    });

    $("#grid_proyectos tbody").on("click", "button.estado_proy", function () {
        var tr = $(this).closest('tr');
        if ($(tr).hasClass('child')) {
            tr = $(tr).prev();
        }

        var data = grid_proyectos.row(tr).data();
        var id_proyecto = data.id;
        var estado = data.estado;

        var obs = "Desbloquear Proyecto";

        if (estado == 1) {
            obs = "Bloquear Proyecto";
        }

        Swal.fire({
            title: '¿Est  seguro?',
            text: obs,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, ' + obs,
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                bloqueo_proyecto(id_proyecto, estado);
            }
        });

    });


    $('#grid_proyectos tbody').on('dblclick', 'tr', function () {
        var data = grid_proyectos.row(this).data();

        Swal.fire({
            title: 'Editar Proyecto?',
            text: "Desea realemente editar este proyecto?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, editar!'
        }).then((result) => {
            if (result.isConfirmed) {
                cargar_datos_formulario(data);
                $("#datosProyecto").collapse("show");
            }
        });

    });

});
