$(document).ready(function(){

	// EFECTOS DEL MENÚ

	$('.abrir_menu').on( 'click', function() {
    	$('.nav_principal').css("left", "0%");
	});
    $('.cerrar_menu').on('click', function(){
    	$('.nav_principal').css("left", "-100%");
    });

    // EFECTOS DEL CARRITO DESPLEGABLE 

    $('#carrito_icono').on( 'click', function() {
    	$( document ).scrollTop( 0 );
    	$('.carrito_desplegable').toggleClass("carrito_desplegable_visible");    		
    });

    // EFECTOS DE SECCIONES DE PAYMENT


    $('#indicador_detalle').on('click', function(){
        $('#indicador_detalle').addClass('active');
        $('#indicador_envio').removeClass('active');
        $('#indicador_pagar').removeClass('active');
        $( "#detalles" ).addClass('payment_activo');
        $( "#datos_envio" ).removeClass('payment_activo');
        $( "#datos_pagar" ).removeClass('payment_activo');
    });
    
     $('#indicador_envio').on('click', function(){
        $('#indicador_detalle').removeClass('active');
        $('#indicador_envio').addClass('active');
        $('#indicador_pagar').removeClass('active');
        $('#detalles').removeClass('payment_activo');
        $('#datos_envio').addClass('payment_activo');
        $('#datos_pagar').removeClass('payment_activo');
    });

    //BOTON SIGUIENTE DE DETALLES

    $('#btn_siguiente').on('click', function(e){
        e.preventDefault();

        $('#indicador_detalle').removeClass('active');
        $('#indicador_envio').addClass('active');
        $('#indicador_pagar').removeClass('active');
        $('#detalles').removeClass('payment_activo');
        $('#datos_envio').addClass('payment_activo');
        $('#datos_pagar').removeClass('payment_activo');
    });

    //BOTON REGRESAR A VER DETALLES 
    $('#btn_ver_detalles').on('click', function(e){
        e.preventDefault();

        $('#indicador_detalle').addClass('active');
        $('#indicador_envio').removeClass('active');
        $('#indicador_pagar').removeClass('active');
        $( "#detalles" ).addClass('payment_activo');
        $( "#datos_envio" ).removeClass('payment_activo');
        $( "#datos_pagar" ).removeClass('payment_activo');
    });
})
