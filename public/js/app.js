$(document).ready(function(){

    // EFECTOS DE PAGINA DESTALLES.PHP, DETALLE_VISUALIZADOR

    // Poner la primera imagen de la lista en el visualizador 
    $('.lista_img:first-child').css('border', '2px solid #333');
    const url_img = $('.lista_img:first-child').attr('src');
    $("#detalle_visualizador").append("<img src=' " + url_img + "'>");

    $('.lista_img').on('click', function () {

        // Obtengo la url de la imagen clickeada
        const url_img = $(this).attr('src');
        // Elimino los bordes de las imagenes clickeadas anteriormente
        $('.lista_img').css('border', 'none');
        // Le asigno bordes a la imagen clickeada actualmente
        $(this).css('border', '2px solid #333');
        // Remuevo la imagen que esta actualmente
        $("#detalle_visualizador img").remove();


        $("#detalle_visualizador").append("<img src=' " + url_img + "'>");

        // let visualizador = $('#detalle_visualizador').width();
        // let img_ancho = $('#detalle_visualizador img').width();
        // let img_alto = $('#detalle_visualizador img').height();

        // if (img_ancho == img_alto) {
        //     // console.log(ancho + '>' + alto);
        //     $("#detalle_visualizador").append("<img width='" + visualizador + "' src=' " + url_img + "'>");
        // }
        // else {
        //     console.log(ancho + '<' + alto);
        //     // $("#detalle_visualizador").append("<img height='100%' width='auto' src=' " + url_img + "'>");

        // }

        // Asigno la nueva imagen clickeada
    });

	// EFECTOS DEL MENÚ

	$('.abrir_menu').on( 'click', function() {
    	$('.nav_principal').css("left", "0%");
	});
    $('.cerrar_menu').on('click', function(){
    	$('.nav_principal').css("left", "-100%");
    });

    //BOTON SIGUIENTE DE DETALLES

    // Obtener parametros de la url para poder activar las seccion de datos de envio
    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }

    function activar_seccion_datos_envio() {
        $(document).scrollTop(0);
        $('#indicador_detalle').removeClass('active');
        $('#indicador_envio').addClass('active');
        $('#indicador_pagar').removeClass('active');
        $('#detalles').removeClass('payment_activo');
        $('#datos_envio').addClass('payment_activo');
        $('#datos_pagar').removeClass('payment_activo');        
    }

    let seccion = getParameterByName('s');
    if (seccion == 'datos_envio') {
        activar_seccion_datos_envio();
    }

    $('#btn_siguiente').on('click', function(e){
        e.preventDefault();
        activar_seccion_datos_envio();
    });

    //BOTON REGRESAR A VER DETALLES 
    $('#btn_ver_detalles').on('click', function(e){
        e.preventDefault();
        history.pushState(null, "", "/verificacion");

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
    // Crear pedido
    $('#crearPedido').on('click', function(e) {
        
        e.preventDefault();
        alertify.confirm('Comfirma tu pedido', 'Seras llevado a Payu para finalizar el pago', 
            function() { 
                $.ajax({
                    url: '/checkout/buying/payment/crearpedido',
                    type: 'POST',
                    data: {crear : true},
                    dataType: 'json',
                    success: function(data){
                        if (data.status == 'Success') {
                            // console.log(data.message);
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
                            // console.log(data);
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

    $('#btn-mostrar-form-cambio-direccion').on('click', function(e){
        e.preventDefault();
        let display = $('.contenedor-form-cambiar-direccion').css('display');
        if (display == 'none') {
            $('.contenedor-form-cambiar-direccion').slideDown(200);
        }
        else {
            $('.contenedor-form-cambiar-direccion').slideUp(200);;            
        }
    });

    $('#btn_cambiar_direccion').on('click', function(e){
        e.preventDefault();
        const frm = $('#form_cambiar_direccion');
        let datos_direccion = $('#form_cambiar_direccion').serialize();
        // console.log(datos_direccion);
        $.ajax({
            url: frm.attr('action'),
            type: 'POST',
            data: datos_direccion,
            dataType: 'json',
            success: function(data){
                if (data.status == 'Errors') {
                    console.log(data);
                    // Mostrar errores en el formulario
                }
                if (data.status == 'Success') {
                    console.log(data);
                    window.location.reload();
                }
            },
            error: function(data){
                console.log(data);
                // alertify.alert("Ha ocurrido un error, recarga la página o contácta a soporte técnico", function() {
                    // window.location.reload();                 
                // });
            }
        });
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

    // EDITOR DE TEXTO DE PAGINA CREAR PRODUCTOS

    $('#producto_descripcion').Editor();

    $('#btn-crear-producto').click(function() {
        $('#producto_descripcion').text($('#producto_descripcion').Editor('getText'));
        // $('#form_crear_producto').submit();
    });

    // CONFIRMACION DE ELIMINAR PRODUCTO
    $('.btnEliminarProducto').on('click', function(e) {
        $eliminar = confirm('¿Desea eliminar este producto?');
        if (!$eliminar) {
            e.preventDefault();
        }
    });
});

