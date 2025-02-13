
$(document).ready(function () {

    $('#principal').attr('src', '../modulos/panel.php');
    

    $('#ocultarBarraLateral').click(function() {
        $('nav').toggleClass('d-none');
    });

    $('#cerrarSesion').click(function() {

        // $.post('../logout.php', function() {
        //     // window.location.href = '../index.php';
        // });
        location.href = "../logout.php";
    });


    $('#miPerfil').click(function () {
        $('#principal').attr('src','../modulos/perfil/mi_perfil.php');
    })


    $('#menu_inicio').click(function () {
        $('#principal').attr('src', '../modulos/panel.php');
    })

    $('#menu_usuarios').click(function () {
        // alert('aqui');
        $('#principal').attr('src', '../modulos/usuarios/usuarios.php');
    })

    $('#menu_ssrs').click(function () {
        $('#principal').attr('src', '../modulos/ssr/ssr.php');
    })


    $('#menu_seguimiento').on('click', function () {
        $('#principal').attr('src', '../modulos/seguimiento/seguimiento.php');
    });


    $('#menu_pagos').on('click', function () {
        $('#principal').attr('src', '../modulos/pago/pago.php');
    });

    $('#menu_cituacion').on('click', function () {
        $('#principal').attr('src', '../modulos/cituacion/cituacion.php');
    });
    
    $('#menu_medidores').on('click', function () {
        // $('#principal').attr('src', '../modulos/medidores/medidores.php');
    });

    

    
    

});