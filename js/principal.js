
$(document).ready(function () {

    $('#principal').attr('src', '../modulos/panel.php');
    

    $('#ocultarBarraLateral').click(function() {
        $('nav').toggleClass('d-none');
    });

    $('#cerrarSesion').click(function() {
        location.href = "../logout.php";
    });

    $('#miPerfil').click(function () {
        $('#principal').attr('src','../modulos/perfil/mi_perfil.php');
    })

    $('#menu_inicio').click(function () {
        $('#principal').attr('src', '../modulos/panel.php');
    })    
    
    $('#menu_usuarios').click(function () {
        $('#principal').attr('src', '../modulos/usuarios/usuarios.php');
    })
    
    $('#menu_materiales').click(function () {
        $('#principal').attr('src', '../modulos/mantenedores/materiales.php');
    })
    

    $('#menu_proyectos').click(function () {
        $('#principal').attr('src', '../modulos/proyectos/proyectos.php');
    })

    

    

    
    

});