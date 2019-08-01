$(document).ready(function(){

    // EFECTOS DE PAGINA DESTALLES.PHP, DETALLE_VISUALIZADOR

    // Poner la primera imagen de la lista en el visualizador 
    $('.lista_img:first-child').css('filter', 'opacity(1)');
    const url_img = $('.lista_img:first-child').attr('src');
    $("#detalle_visualizador").append("<img src=' " + url_img + "'>");

    $('.lista_img').on('click', function () {

        // Obtengo la url de la imagen clickeada
        const url_img = $(this).attr('src');
        // Elimino los filtros de las imagenes clickeadas anteriormente
        $('.lista_img').css('filter', 'opacity(.5)');
        $(this).css('border', 'none');
        // Le asigno filter a la imagen clickeada actualmente
        $(this).css('filter', 'opacity(1)');
        // Remuevo la imagen que esta actualmente
        $("#detalle_visualizador img").remove();

        $("#detalle_visualizador").append("<img src=' " + url_img + "'>");
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

    $('.menu_opcion_logo').on('click', function(e){
        let ele = e.target.id;
        $('#' + ele + ' + .menu_opcion_items').toggleClass('menu_visible');        
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    // Crear funcion que se encargue de enviar la confirmacion a CrearPedidoController para que cree el pedido cuando el usuario de click en el boton pagar con payu, este pedido se creará antes de enviar los datos a payu.

    // CONFIGURACION DE CABECERAS CON EL TOKEN CSRF DE LARAVEL PARA PETICIONES AJAX A LOS CONTROLADORES
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }        
    });
    // CREAR UN PEDIDO
    $('#crearPedido').on('click', function(e) {
        
        e.preventDefault();
        alertify.confirm('Comfirma tu pedido', 'Pagar pedido con Payú', 
            function() { 
                $.ajax({
                    url: '/checkout/buying/payment/crearpedido',
                    type: 'POST',
                    data: {crear : true},
                    dataType: 'json',
                    beforeSend: function() {
                        $('.tarjeta_direccion_envio_cargador').css('display', 'flex');
                    },
                    // complete: function(){
                    //     $('.tarjeta_direccion_envio_cargador').css('display', 'none');
                    // },
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
                            $('.tarjeta_direccion_envio_cargador').css('display', 'none');
                            e.preventDefault();
                            alertify.alert(data.status + ': ' + data.message, function() {
                                window.location.href = '/cart';
                            });
                        }
                    },
                    error: function(data) {
                        $('.tarjeta_direccion_envio_cargador').css('display', 'none');
                        if(data.status == 500) {
                            // console.log(data.responseText);
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

    $('.btn-mostrar-form-cambio-direccion').on('click', function(e){
        e.preventDefault();
        let display = $('.contenedor-form-cambiar-direccion').css('display');
        if (display == 'none') {
            $('.contenedor-form-cambiar-direccion').slideDown(200);
        }
        else {
            $('.contenedor-form-cambiar-direccion').slideUp(200);;            
        }
    });

    // $('#btn_cambiar_direccion').on('click', function(e){
    //     e.preventDefault();
    //     const frm = $('#form_cambiar_direccion');
    //     let datos_direccion = $('#form_cambiar_direccion').serialize();
    //     // console.log(datos_direccion);
    //     $.ajax({
    //         url: frm.attr('action'),
    //         type: 'POST',
    //         data: datos_direccion,
    //         dataType: 'json',
    //         success: function(data){
    //             if (data.status == 'Errors') {
    //                 console.log(data);
    //             }
    //             if (data.status == 'Success') {
    //                 console.log(data);
    //                 window.location.reload();
    //             }
    //         },
    //         error: function(data){
    //             console.log(data);
    //         }
    //     });
    // });

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

    // EDITOR DE TEXTO DE PAGINA CREAR PRODUCTOS (CAMPO DESCRIPCION)
    CKEDITOR.replace( 'producto_descripcion', {
        customConfig: '/js/editor_config.js',
        language: 'es',
        width: '100%',
        height: 300
    });

    // CONFIRMACION DE ELIMINAR PRODUCTO
    $('.btnEliminarProducto').on('click', function(e) {
        $eliminar = confirm('¿Desea eliminar este producto?');
        if (!$eliminar) {
            e.preventDefault();
        }
    });

    // AGREGAR DIRECCION DE USUARIO
    $('#btn_agregar_direccion').on('click', function(e){
        e.preventDefault();
        const frm = $('#form_agregar_direccion');
        let datos_direccion = $('#form_agregar_direccion').serialize();

        $.ajax({
            url: frm.attr('action'),
            type: 'POST',
            data: datos_direccion,
            dataType: 'json',
            beforeSend: function() {
                $('.tarjeta_direccion_envio_cargador').css('display', 'flex');
            },
            complete: function(){
                $('.tarjeta_direccion_envio_cargador').css('display', 'none');
                // window.location.reload();
            },
            success: function(data) {
                // si hay errores, limipiar los mensajes de error mostrados anteriormente
                $('.form-cambiar-direccion-error').css('display', 'none');
                if (data.status == 'Errors') {
                    for(const e in data.data) {
                        let spanError = $('#'+e+'_error');
                        spanError.text(data.data[e][0]).css('display', 'block');
                    }
                }
                if (data.status == 'Success') {
                    console.log(data.message);
                    // frm[0].reset();
                    // $('.contenedor-form-cambiar-direccion').css('display', 'none');
                    window.location.reload();
                }
            },
            error: function(data){
                console.log(data);
            }
        });
    });

    // ASIGNAR DIRECCION POR DEFECTO
    $('.direccion_envio_texto').on('click', function() {
        let direccion = $(this).data('defecto');

        if(direccion != 'defecto') {
            let direccion_id = $(this).data('direccion-id');
            $.ajax({
                url: '/establecer-direccion-defecto',
                type: 'POST',
                data: { id:direccion_id },
                dataType: 'json',
                beforeSend: function() {
                    $('.tarjeta_direccion_envio_cargador').css('display', 'flex');
                },
                complete: function(){
                    window.location.reload();
                },
                success: function(data){
                },
                error: function(data){
                    console.log(data);
                }
            });            
        }
    });

    // MOSTRAR PAISES
    $.ajax({
        url: '/paises',
        type: 'POST',
        dataType: 'json',
        success: function(data){
            // console.log(data);
            if(data.status = 'Success') {
                $('#lista_paises').append("<option value=''>Pais</option>");
                // Recorrer los paises
                data.paises.forEach( pais => { 
                    $('#lista_paises').append("<option value='" + pais.id + "'>" + pais.pais_nombre + "</option>");
                });

                // Agregar evento onChange
                $('#lista_paises').on('change', function() {
                    // const estado_pais = $('.estado_pais');
                    $('.estado_pais').remove();
                    const pais_id = $('#lista_paises').val();

                    // Obtener estados segun el pais                
                    $.ajax({
                        url: '/estados',
                        type: 'POST',
                        data: { pais_id : pais_id },
                        dataType: 'json',
                        success: function(data){
                            // Recorrer los paises
                            data.estados.forEach( estado => { 
                                $('#lista_estados').append("<option class='estado_pais' value='" + estado.id + "'>" + estado.estado_nombre + "</option>");
                            });
                        },
                        error: function(data){
                            console.log(data);
                        }
                    });
                });

            }
        },
        error: function(data){
            console.log(data);
        }
    });

    // MOSTRAR TARJETA DE DETALLE DE ENVIO DE PEDIDO
    $('.direccion_envio_texto').hover( 
        function() {
            $(this).siblings('.direccion_envio_tarjeta_flotante').fadeIn();
        },
        function() {
            $('.direccion_envio_tarjeta_flotante').css('display','none');
        }
    );

    // ELIMINAR DIRECCION
    $('.direccion_envio_opciones_eliminar').on('click', function() {
        const direccion_id = $(this).data('direccion-id');
        console.log(direccion_id);
        $.ajax({
            url: '/eliminar-direccion',
            type: 'POST',
            data: { id:direccion_id },
            dataType: 'json',
            beforeSend: function() {
                $('.tarjeta_direccion_envio_cargador').css('display', 'flex');
            },
            success: function(data){
                console.log(data);
                window.location.reload();
            },
            error: function(data){
                // console.log(data);
            }
        }); 
    });

    // OCULTAR SECCION TIPO DE ENVIO SI NO HAY DIRECCIONES EN LA SECCION (#seccionDirecciones)
    if( $('.direccion_envio').length > 0 ) {
        console.log( 'Existe' );
        $('.tarjeta_tipo_envio').css('display', 'block');
    }
    else {
        console.log('No existe');
    }


});