$(document).ready(function(){

	// EFECTOS DEL MENÚ

	$('.abrir_menu').on( 'click', function() {
    	$('.nav_principal').css("left", "0%");
	});
    $('.cerrar_menu').on('click', function(){
    	$('.nav_principal').css("left", "-100%");
    });

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

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    // Crear funcion que se encargue de enviar la confirmacion a CrearPedidoController para que cree el pedido cuando el usuario de click en el boton pagar con payu, este pedido se creará antes de enviar los datos a payu.

    // Configurar las cabeceras para que el controlador de laravel CrearPedidoController acepte la petición ajax.
    // Aquí envío el token csrf de laravel
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }        
    });

    $('#crearPedido').on('click', function(e){
        
        e.preventDefault();
        alertify.confirm('Comfirma tu pedido', 'Al confirmar tu pedido seras llevado a Payu para finalizar el pago', 
            function() { 
                $.ajax({
                    url: '/checkout/buying/payment/crearpedido',
                    type: 'POST',
                    data: {crear : true},
                    dataType: 'json',
                    success: function(data){
                        if (data.status == 'Success') {
                            // alert(data.message);
                            alertify.notify(data.message, 'success', 10);
                            alertify.notify('Será redireccionado a Payu', 'success', 10);
                            // Despues de que se crea el pedido y sus detalles, se obtiene el id que returna crearPedidoController.php de ese pedido se añade a la descripcion que se envía a payu

                            document.getElementById('pedido_id').value = data.pedido_id;
                            
                            // Enviar formulario despues de añadir el id a la descrición
                            $('#enviar-formulario-payu').submit();

                        }
                        else {
                            e.preventDefault();
                            alertify.alert(data.status + ': ' + data.message, function() {
                                window.location.href = '/cart';
                            });
                        }
                    },
                    error: function(data){
                        if(data.status == 500){
                            e.preventDefault();
                            alertify.alert("Ha ocurrido un error, recarga la página o contácta a soporte técnico", function() {
                                window.location.reload();                 
                            });
                        }
                    }
                });
            }, 
            function() { 
                alertify.error('Pedido cancelado', 10);
            }
        );
    });

    // OCULTAR O MOSTRAR LA SECCION DE INFORMACION DEL PEDIDO
    $('#btn-toggle-detalles').on('click', function(){
        let display = $('#info_pedido').css('display');
        if (display == 'flex') {
            $('#info_pedido').fadeOut(200);
            $('#texto-toggle').text('Mostrar detalles');
            $('#icono-toggle').css('transform', 'rotate(-90deg)')
        }
        else {
            $('#info_pedido').fadeIn(200);
            $('#texto-toggle').text('Ocultar detalles');
            $('#icono-toggle').css('transform', 'rotate(-0deg)')
        }

    });
});

