$(document).ready(function(){

	// EFECTOS DEL MENÚ

	$('.abrir_menu').on( 'click', function() {
    	$('.nav_principal').css("left", "0%");
	});
    $('.cerrar_menu').on('click', function(){
    	$('.nav_principal').css("left", "-100%");
    });
    
    // EFECTOS DE SECCIONES DE PAYMENT

    // $('#indicador_detalle').on('click', function(){
    //     $('#indicador_detalle').addClass('active');
    //     $('#indicador_envio').removeClass('active');
    //     $('#indicador_pagar').removeClass('active');
    //     $('#detalles').addClass('payment_activo');
    //     $('#datos_envio').removeClass('payment_activo');
    //     $('#datos_pagar').removeClass('payment_activo');
    // });
    
    //  $('#indicador_envio').on('click', function(){
    //     $('#indicador_detalle').removeClass('active');
    //     $('#indicador_envio').addClass('active');
    //     $('#indicador_pagar').removeClass('active');
    //     $('#detalles').removeClass('payment_activo');
    //     $('#datos_envio').addClass('payment_activo');
    //     $('#datos_pagar').removeClass('payment_activo');
    // });

    //BOTON SIGUIENTE DE DETALLES

    $('#btn_siguiente').on('click', function(e){
        e.preventDefault();
        $(document).scrollTop(0);
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
        $(document).scrollTop(0);
        $('#indicador_detalle').addClass('active');
        $('#indicador_envio').removeClass('active');
        $('#indicador_pagar').removeClass('active');
        $( "#detalles" ).addClass('payment_activo');
        $( "#datos_envio" ).removeClass('payment_activo');
        $( "#datos_pagar" ).removeClass('payment_activo');

    });

    // EFECTOS DE PAGINA DESTALLES.PHP, DETALLE_VISUALIZADOR

    // Poner la primera imagen de la lista en el visualizador 
    // $('.lista_img:first-child').css('border', '2px solid #333');
    // const url_img = $('.lista_img:first-child').attr('src');
    // $("#detalle_visualizador").append("<img src=' " + url_img + "'>");

    // $('.lista_img').on('click', function () {

        // Obtengo la url de la imagen clickeada
        // const url_img = $(this).attr('src');

        // Elimino los bordes de las imagenes clickeadas anteriormente
        // $('.lista_img').css('border', 'none');

        // Le asigno bordes a la imagen clickeada actualmente
        // $(this).css('border', '2px solid #333');

        // Remuevo la imagen que esta actualmente
        // $("#detalle_visualizador img").remove();

        // Asigno la nueva imagen clickeada
        // $("#detalle_visualizador").append("<img src=' " + url_img + "'>");
    // });

    // ACTUALIZAR CANTIDAD DE PRODUCTOS DEL CARRITO
    $('.btn_actualizar_carrito').on('click', function(e){
        e.preventDefault();

        const id   = $(this).data('id'); 
        const href = $(this).data('href'); 
        const cantidad = $('#producto_' + id).val();
        window.location.href = href + '/' + cantidad;
    });


    // ADMIN - PRODUCTOS

    // $('.producto_menu_logo').on('click', function(e){
    //     let ele = e.target.id;
    //     $('#' + ele + ' + .producto_menu_accion').toggleClass('menu_visible');        
    // });

    $('.menu_opcion_logo').on('click', function(e){
        let ele = e.target.id;
        $('#' + ele + ' + .menu_opcion_items').toggleClass('menu_visible');        
    });


    // function confirmar() {
    //     const res = confirm('Seguro desea abrir esto?');
    //     if (res == true) {
    //        $('.producto_menu_accion').toggleClass('menu_visible');        
    //     }
    // }

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    // Configurar las cabeceras para que el controlador de laravel PaymentController acepte la petición, aqui envio el token csrf
    // $.ajaxSetup({
    //     headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }        
    // });
    // Eliminar carrito de compra antes de enviar los datos a PayU
    // $('#eliminarCarrito').on('click', function(){

        // e.preventDefault();
            
        // fetch('/checkout/buying/payment/eliminarcarrito')
        // .then(function(response){
        //     if(response.ok){
        //         return response.text();                
        //     }
        //     else {
        //         throw "Error en la llamada";
        //     }
        // })
        // .then(function(data){
        //     console.log(data)
        // })
        // .catch(function(error){
        //     console.log(error);
        // });

        // Otra forma de eliminar el carrito desde ajax

    //     $.ajax({
    //         url: '/checkout/buying/payment/eliminarcarrito',
    //         type: 'post',
    //         success: function(result){
    //             console.log(result);
    //         },
    //         error: function(){
    //             console.log('Error');
    //         }
    //     });
    // });

    // Crear funcion que se encargue de enviar la confirmacion a CrearPedidoController para que cree el pedido cuando el usuario de click en el boton pagar con payu, este pedido se creará antes de enviar los datos a payu.

    // Configurar las cabeceras para que el controlador de laravel CrearPedidoController acepte la petición ajax.
    // Aquí envío el token csrf de laravel
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }        
    });

    $('#crearPedido').on('click', function(e){

        e.preventDefault();

        $.ajax({
            url: '/checkout/buying/payment/crearpedido',
            type: 'POST',
            data: {crear : true},
            success: function(result){
                console.log(result);
            },
            error: function(){
                console.log('Error');
            }
        });
    });

});

