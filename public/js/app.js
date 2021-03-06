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
        $('html, body').css('overflow','hidden');
	});
    $('#cerrar_menu, #nav_principal').on('click', function(e){
        if(e.target.id == 'nav_principal' || e.target.id == 'cerrar_menu') {
    	   $('.nav_principal').css("left", "-100%");
            $('html, body').css('overflow','visible');
        }
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
    // DINAMISMO PRECIO DEL PRODUCTO
    $("#precio").on({
        "focus": function(event) {
            $(event.target).select();
        },
        "keyup": function(event) {
            $(event.target).val(function(index, value) {
                // Texto devuelto para el span precioPreview
                let newValue = value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
                $('#precioPreview').text(newValue);

                // Texto devuelto para el input
                return value.replace(/\D/g, "");
            });
        }
    });

    // DINAMISMO ETIQUETAS DEL PRODUCTO
    let tags = [];
    $('#tagsInput').on('keypress', function (e) {
        if (e.which == 13) {
            return false;
        }
        if(e.which == 32) {
            // Obtener el input #tagsInput y limpiar de espacios en blanco
            const value = $(this).val().trim();

            if(value.length > 1) {
                // Almacenar tags en un array
                tags.push(value);
                // Limpiar el input #tagsInput
                $(this).val('');
            }
            // Limpiar tags-preview y input tags de valores antiguos
            $('#tags-preview').html('');
            $('#tags').val('');
            for(let tag in tags) {
                // Mostrar los tags en el tags-preview y en el input tags
                $('#tags-preview').append(`<div class="tags-preview-item" data-index-tags="${tag}">${tags[tag]}</div>`);
                
                // Concatenar en el input #tags
                let oldValue = $('#tags').val();
                $('#tags').val(oldValue + tags[tag] + '-');
            }
        }
    });

    // Quitar tags del tags-view
    $('#tags-preview').on('click', 'div.tags-preview-item',  function() {
        let index = $(this).data('index-tags');
        tags.splice(index, 1);
        for(let tag in tags) {
            console.log(tag);
        }

        // Limpiar denuevo tags-preview y input tags de valores antiguos
        $('#tags-preview').html('');
        $('#tags').val('');

        for(let tag in tags) {
            // Mostrar denuevo los tags en el tags-preview y en el input tags
             $('#tags-preview').append(`<div class="tags-preview-item" data-index-tags="${tag}">${tags[tag]}</div>`);
            
            // Concatenar denuevo en el input #tags
            let oldValue = $('#tags').val();
            $('#tags').val(oldValue + tags[tag] + '-');
        }
    });

    // DINAMISNMO COSTO DE ENVIO DEL PRODUCTO
    $("#costo_envio").on({
        "keyup": function(event) {
            $(event.target).val(function(index, value) {
                // Texto devuelto para el span precioPreview
                let newValue = value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
                $('#costo_envioPreview').text(newValue);

                // Texto devuelto para el input
                return value.replace(/\D/g, "");
            });
        }
    });




    // CONFIRMACION DE ELIMINAR PRODUCTO
    $('.btnEliminarProducto').on('click', function(e) {
        $eliminar = confirm('¿Desea eliminar este producto?');
        if (!$eliminar) {
            e.preventDefault();
        }
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    // EDITOR DE TEXTO DE PAGINA CREAR PRODUCTOS (CAMPO DESCRIPCION)
    CKEDITOR.replace( 'descripcion', {
        customConfig: '/js/editor_config.js',
        language: 'es',
        width: '100%',
        height: 300
    });

    // Crear funcion que se encargue de enviar la confirmacion a CrearPedidoController para que cree el pedido cuando el usuario de click en el boton pagar con payu, este pedido se creará antes de enviar los datos a payu.

    // CONFIGURACION DE CABECERAS CON EL TOKEN CSRF DE LARAVEL PARA PETICIONES AJAX A LOS CONTROLADORES
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    // CREAR UN PEDIDO
    $('#crearPedidoPayu').on('click', function(e) {        
        e.preventDefault();
        const route = $(this).data('route-crearpedido');

        $.ajax({
            url: route,
            type: 'POST',
            data: {crear : true},
            dataType: 'json',
            beforeSend: function() {
                $('#cargador_formulario_payu').css('display', 'flex');
            },
            success: function(data){
                if (data.status == 'Success') {
                    alertify.notify(data.message, 'success', 10);
                    alertify.notify('Será redireccionado a Payu', 'success', 10);

                    // Despues de que se crea el pedido y sus detalles, se obtiene el id que returna crearPedidoController.php de ese pedido se añade a la descripcion que se envía a payu

                    document.getElementById('pedido_id').value = data.pedido_id;
                    
                    // Enviar formulario despues de añadir el id a la descrición
                    $('#enviar-formulario-payu').submit();
                }
                else {
                    $('#cargador_formulario_payu').css('display', 'none');
                    e.preventDefault();
                    alertify.alert(data.status + ': ' + data.message, function() {
                        window.location.href = '/cart';
                    });
                }
            },
            error: function(data) {
                // console.log(data.responseJSON);
                $('#cargador_formulario_payu').css('display', 'none');
                if(data.status == 500) {
                    // console.log(data.responseText);
                    e.preventDefault();
                    alertify.alert(`Ha ocurrido un error, recarga la página o contácta a <a href="/soporte-tecnico">soporte técnico</a>`, function() {
                        // window.location.reload();                 
                    });
                }
            }
        });
    });

    // MOSTRAR FORMULARIO PARA AGREGAR DIRECCIONES
    $('.btn-mostrar-form-cambio-direccion').on('click', function(e){
        e.preventDefault();

        $('html, body').animate({
            scrollTop: $(this).offset().top - 70
        }, 500);

        let display = $('.contenedor-form-cambiar-direccion').css('display');
        if (display == 'none') {
            $('.contenedor-form-cambiar-direccion').slideDown(200);
        }
        else {
            $('.contenedor-form-cambiar-direccion').slideUp(200);;            
        }
    });
    // OCULTAR FORMULARIO PARA AGREGAR DIRECCIONES
    $('.btn-cerrar-form-cambio-direccion').on('click', function(e){
        e.preventDefault();

        let display = $('.contenedor-form-cambiar-direccion').css('display');
        if (display == 'none') {
            $('.contenedor-form-cambiar-direccion').slideDown(200);
        }
        else {
            $('.contenedor-form-cambiar-direccion').slideUp(200);;            
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
                $('#cargador_agregar_direccion').css('display', 'flex');
            },
            success: function(data) {
                // Mostrar los nuevos errores
                if (data.status == 'Errors') {
                    // si hay errores, limipiar los mensajes de error mostrados anteriormente
                    $('.form-cambiar-direccion-error').css('display', 'none');
                    // Quitar cargador si hay errores
                    $('#cargador_agregar_direccion').css('display', 'none');
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

    

    // ASIGNAR DIRECCION POR DEFECTO
    $('.direccion_envio_texto').on('click', function() {
        let direccion = $(this).data('defecto');
        let route = $(this).data('href');

        if(direccion != 'defecto') {
            let direccion_id = $(this).data('direccion-id');
            $.ajax({
                url: route,
                type: 'POST',
                data: { id:direccion_id },
                dataType: 'json',
                beforeSend: function() {
                    $('#cargador_direccion_defecto').css('display', 'flex');
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

    // ELIMINAR DIRECCION
    $('.direccion_envio_opciones_eliminar').on('click', function() {
        const direccion_id = $(this).data('direccion-id');
        const route = $(this).data('href');
        console.log(direccion_id);
        $.ajax({
            url: route,
            type: 'POST',
            data: { id:direccion_id },
            dataType: 'json',
            beforeSend: function() {
                $('#cargador_direccion_defecto').css('display', 'flex');
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

    // MOSTRAR PAISES
    $('#lista_paises').append("<option value=''>Pais</option>");
    $.ajax({
        url: '/paises',
        type: 'POST',
        dataType: 'json',
        success: function(data){
            // console.log(data);
            $('#lista_paises').append("<option value=''>Ej</option>");
            if(data.status = 'Success') {
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

    // OCULTAR SECCION TIPO DE ENVIO SI NO HAY DIRECCIONES EN LA SECCION (#seccionDirecciones)
    if( $('.direccion_envio').length > 0 ) {
        console.log( 'Existe' );
        $('.tarjeta_tipo_envio').css('display', 'block');
    }

    $('.btn_opcion_envio').on('click', function(e) {
        // e.preventDefault();
        $('#cargador_tipo_envio').css('display', 'flex');
        
    });

});