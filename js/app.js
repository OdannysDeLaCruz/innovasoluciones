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

})
