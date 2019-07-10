-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-06-2019 a las 22:32:01
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `innovasoluciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `seccion_id` int(10) UNSIGNED NOT NULL,
  `categoria_nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria_descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `seccion_id`, `categoria_nombre`, `categoria_descripcion`, `fecha_creado`, `fecha_actualizado`) VALUES
(1, 3, 'celular', 'Impedit blanditiis architecto iure sit.', '2019-05-28 20:59:43', '2019-05-28 20:59:43'),
(2, 1, 'hogar', 'Omnis architecto iusto animi omnis.', '2019-05-28 20:59:43', '2019-05-28 20:59:43'),
(3, 2, 'bicicleta', 'Ducimus in dolore atque iusto.', '2019-05-28 20:59:43', '2019-05-28 20:59:43'),
(4, 2, 'computadora', 'Sed atque rem qui corporis ut.', '2019-05-28 20:59:43', '2019-05-28 20:59:43'),
(5, 1, 'carro', 'Enim illum officia voluptatem quia aut.', '2019-05-28 20:59:43', '2019-05-28 20:59:43'),
(6, 2, 'moto', 'Ut accusamus eum doloremque quo.', '2019-05-28 20:59:43', '2019-05-28 20:59:43'),
(7, 3, 'escuela', 'Ad odit architecto optio quia sunt voluptas.', '2019-05-28 20:59:43', '2019-05-28 20:59:43'),
(8, 1, 'libro', 'Et amet cupiditate tenetur pariatur.', '2019-05-28 20:59:43', '2019-05-28 20:59:43'),
(9, 3, 'rueda', 'Ut debitis quae quo id iste et.', '2019-05-28 20:59:43', '2019-05-28 20:59:43'),
(10, 2, 'autos', 'Veniam nemo perspiciatis magni sed.', '2019-05-28 20:59:43', '2019-05-28 20:59:43'),
(16, 4, 'Monopatin', '', '2019-05-30 00:53:54', '2019-05-30 00:53:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedidos`
--

CREATE TABLE `detalle_pedidos` (
  `id` int(10) UNSIGNED NOT NULL,
  `pedido_id` int(10) UNSIGNED NOT NULL,
  `detalle_producto_ref` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detalle_nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detalle_descripcion` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `detalle_imagen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detalle_precio` decimal(10,2) NOT NULL,
  `detalle_cantidad` int(11) NOT NULL,
  `detalle_promo_info` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detalle_precio_final` decimal(10,2) NOT NULL,
  `detalle_talla` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detalle_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalle_pedidos`
--

INSERT INTO `detalle_pedidos` (`id`, `pedido_id`, `detalle_producto_ref`, `detalle_nombre`, `detalle_descripcion`, `detalle_imagen`, `detalle_precio`, `detalle_cantidad`, `detalle_promo_info`, `detalle_precio_final`, `detalle_talla`, `detalle_color`) VALUES
(1, 1, 'XIAOMIA2', 'Celular Xiaomi Mi A2 4gb De Ram 64gb Cámara Dual 4g Lte', '<section class=\"ui-view-more vip-section-specs main-section \" style=\"margin: 0px; padding: 44px 32px; border: 0px; outline: 0px; vertical-align: baseline; font-size: 14px; color: rgb(51, 51, 51); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\"><h2 class=\"main-section__title\" style=\"margin-right: 0px; margin-bottom: 32px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-size: 24px; font-weight: 600; line-height: 1;\">Características</h2><div class=\"specs-wrapper\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><section class=\"specs-container  specs-primary-specs specs-layout-default u-clearfix\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><ul class=\"specs-list specs-list-primary specs-structure-medium\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; display: flex; flex-wrap: wrap;\"><li class=\"specs-item specs-item-primary\" style=\"margin: 0px 0px 15px; padding: 0px 16px 0px 0px; border: 0px; outline: 0px; vertical-align: baseline; font-size: 16px; float: left; width: 353.594px; clear: left;\"><span style=\"margin: 0px 0px 2px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; color: rgb(153, 153, 153); line-height: 1; display: block;\">Marca</span><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-size: 20px; word-break: break-word;\">Xiaomi</span></li></ul><span style=\"font-size: 16px; margin: 0px 0px 2px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; color: rgb(153, 153, 153); line-height: 1;\">Modelo</span></section><section class=\"specs-container  specs-primary-specs specs-layout-default u-clearfix\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-size: 20px; word-break: break-word;\">A2</span><br></section></div></section><section class=\"main-section item-description \" style=\"margin: 0px; padding: 0px 32px 44px; border: 0px; outline: 0px; vertical-align: baseline; overflow: hidden;\"><h2 class=\"main-section__title item-description__title\" style=\"font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; margin-right: 0px; margin-bottom: 32px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-weight: 600; line-height: 1;\"><span style=\"font-size: large; color: rgb(0, 0, 0);\">Descripción:</span></h2><div id=\"description-includes\" class=\"item-description__content \" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><div class=\"item-description__text\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold; font-size: large; color: rgb(0, 0, 0);\">Xiaomi Mi A2&nbsp;</span><span style=\"color: rgb(102, 102, 102); font-size: small;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: small;\"><br></span></p><table class=\"table\" align=\"left\" border=\"1\" cellspacing=\"1\" cellpadding=\"1\" style=\"width: 400px;\"><tbody><tr><td>&nbsp;Pantalla</td><td>&nbsp;5.9 Pulgadas<span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: small;\">&nbsp;</span></td></tr><tr><td>&nbsp;Procesador</td><td>&nbsp;Snapdragon 660 Octa-core</td></tr><tr><td>&nbsp;Android</td><td>&nbsp;One 8.1 (Oreo)<span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: small;\">&nbsp;</span></td></tr><tr><td>&nbsp;Memoria</td><td>&nbsp;&nbsp;Interna 64Gb<span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: small;\">&nbsp;</span></td></tr><tr><td>&nbsp;Memoria</td><td>&nbsp;Ram 4Gb</td></tr><tr><td>&nbsp;Cámara Principal</td><td>&nbsp;12 mpx + 20 mpx Con Flash</td></tr><tr><td>&nbsp;Cámara&nbsp; Frontal</td><td>&nbsp;&nbsp;20 mpx<span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: small;\">&nbsp;</span></td></tr><tr><td>&nbsp;Batería</td><td>&nbsp;&nbsp;3000</td></tr><tr><td>&nbsp;Carga Rápida</td><td>&nbsp;Si<span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: small;\">&nbsp;</span></td></tr><tr><td>&nbsp;Sensores</td><td>&nbsp;Huella digital (montado en la parte posterior), acelerómetro, giroscopio, proximidad, brújula</td></tr></tbody></table><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><br><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><table class=\"table\" border=\"1\" cellspacing=\"1\" cellpadding=\"1\" style=\"width: 400px;\"><tbody><tr><td>&nbsp;Bluetooth&nbsp;</td><td>&nbsp;Si<span style=\"font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; color: rgb(102, 102, 102); font-size: small;\">&nbsp;</span></td></tr><tr><td>&nbsp;</td><td>&nbsp;</td></tr></tbody></table><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\">FORMAS DE ENTREGA</span><br><br><span style=\"color: rgb(102, 102, 102); font-size: small;\"><span style=\"font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\">Bogotá</span><br><br><span style=\"font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\">Puedes retirar tu equipo en nuestras oficinas después de dar clic en comprar y dar la opción \"retiro en domicilio del vendedor\"</span><br><span style=\"font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\">Nuestro horario de atención es de lunes a sábado de 9:00 Am a 7:00 Pm. Te esperamos</span><br><br><span style=\"font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\">Domicilios Bogotá.</span><br><br><span style=\"font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\">Obtén tu producto el mismo día en la puerta de tu casa u oficina por tan solo diez mil pesos. después de dar clic en comprar y dar la opción \"retiro en domicilio del vendedor\"</span></span><br><br><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\">OTRAS CIUDADES</span><br><br><span style=\"color: rgb(102, 102, 102); font-family: arial, helvetica, sans-serif; font-size: small;\">Envíos gratis a todo el país&nbsp;<br><br>Recibe tu producto a través de mercado envios dando clic en comprar y dar la opcion \"envio a mi domicilio\"<br><br>Cualquier inquietud, no dudes en usar la sección de preguntas, te responderemos en el menor tiempo posible.</span></p></div></div></section>', 'celular-xiaomi.png', '589900.00', 1, 'Tipo de promoción descuento%, tiene un descuento de 10', '530910.00', NULL, 'Negros'),
(2, 2, 'XIAOMIA2', 'Celular Xiaomi Mi A2 4gb De Ram 64gb Cámara Dual 4g Lte', '<section class=\"ui-view-more vip-section-specs main-section \" style=\"margin: 0px; padding: 44px 32px; border: 0px; outline: 0px; vertical-align: baseline; font-size: 14px; color: rgb(51, 51, 51); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\"><h2 class=\"main-section__title\" style=\"margin-right: 0px; margin-bottom: 32px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-size: 24px; font-weight: 600; line-height: 1;\">Características</h2><div class=\"specs-wrapper\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><section class=\"specs-container  specs-primary-specs specs-layout-default u-clearfix\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><ul class=\"specs-list specs-list-primary specs-structure-medium\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; display: flex; flex-wrap: wrap;\"><li class=\"specs-item specs-item-primary\" style=\"margin: 0px 0px 15px; padding: 0px 16px 0px 0px; border: 0px; outline: 0px; vertical-align: baseline; font-size: 16px; float: left; width: 353.594px; clear: left;\"><span style=\"margin: 0px 0px 2px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; color: rgb(153, 153, 153); line-height: 1; display: block;\">Marca</span><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-size: 20px; word-break: break-word;\">Xiaomi</span></li></ul><span style=\"font-size: 16px; margin: 0px 0px 2px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; color: rgb(153, 153, 153); line-height: 1;\">Modelo</span></section><section class=\"specs-container  specs-primary-specs specs-layout-default u-clearfix\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-size: 20px; word-break: break-word;\">A2</span><br></section></div></section><section class=\"main-section item-description \" style=\"margin: 0px; padding: 0px 32px 44px; border: 0px; outline: 0px; vertical-align: baseline; overflow: hidden;\"><h2 class=\"main-section__title item-description__title\" style=\"font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; margin-right: 0px; margin-bottom: 32px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-weight: 600; line-height: 1;\"><span style=\"font-size: large; color: rgb(0, 0, 0);\">Descripción:</span></h2><div id=\"description-includes\" class=\"item-description__content \" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><div class=\"item-description__text\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold; font-size: large; color: rgb(0, 0, 0);\">Xiaomi Mi A2&nbsp;</span><span style=\"color: rgb(102, 102, 102); font-size: small;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: small;\"><br></span></p><table class=\"table\" align=\"left\" border=\"1\" cellspacing=\"1\" cellpadding=\"1\" style=\"width: 400px;\"><tbody><tr><td>&nbsp;Pantalla</td><td>&nbsp;5.9 Pulgadas<span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: small;\">&nbsp;</span></td></tr><tr><td>&nbsp;Procesador</td><td>&nbsp;Snapdragon 660 Octa-core</td></tr><tr><td>&nbsp;Android</td><td>&nbsp;One 8.1 (Oreo)<span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: small;\">&nbsp;</span></td></tr><tr><td>&nbsp;Memoria</td><td>&nbsp;&nbsp;Interna 64Gb<span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: small;\">&nbsp;</span></td></tr><tr><td>&nbsp;Memoria</td><td>&nbsp;Ram 4Gb</td></tr><tr><td>&nbsp;Cámara Principal</td><td>&nbsp;12 mpx + 20 mpx Con Flash</td></tr><tr><td>&nbsp;Cámara&nbsp; Frontal</td><td>&nbsp;&nbsp;20 mpx<span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: small;\">&nbsp;</span></td></tr><tr><td>&nbsp;Batería</td><td>&nbsp;&nbsp;3000</td></tr><tr><td>&nbsp;Carga Rápida</td><td>&nbsp;Si<span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: small;\">&nbsp;</span></td></tr><tr><td>&nbsp;Sensores</td><td>&nbsp;Huella digital (montado en la parte posterior), acelerómetro, giroscopio, proximidad, brújula</td></tr></tbody></table><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><br><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><table class=\"table\" border=\"1\" cellspacing=\"1\" cellpadding=\"1\" style=\"width: 400px;\"><tbody><tr><td>&nbsp;Bluetooth&nbsp;</td><td>&nbsp;Si<span style=\"font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; color: rgb(102, 102, 102); font-size: small;\">&nbsp;</span></td></tr><tr><td>&nbsp;</td><td>&nbsp;</td></tr></tbody></table><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\">FORMAS DE ENTREGA</span><br><br><span style=\"color: rgb(102, 102, 102); font-size: small;\"><span style=\"font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\">Bogotá</span><br><br><span style=\"font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\">Puedes retirar tu equipo en nuestras oficinas después de dar clic en comprar y dar la opción \"retiro en domicilio del vendedor\"</span><br><span style=\"font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\">Nuestro horario de atención es de lunes a sábado de 9:00 Am a 7:00 Pm. Te esperamos</span><br><br><span style=\"font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\">Domicilios Bogotá.</span><br><br><span style=\"font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\">Obtén tu producto el mismo día en la puerta de tu casa u oficina por tan solo diez mil pesos. después de dar clic en comprar y dar la opción \"retiro en domicilio del vendedor\"</span></span><br><br><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\">OTRAS CIUDADES</span><br><br><span style=\"color: rgb(102, 102, 102); font-family: arial, helvetica, sans-serif; font-size: small;\">Envíos gratis a todo el país&nbsp;<br><br>Recibe tu producto a través de mercado envios dando clic en comprar y dar la opcion \"envio a mi domicilio\"<br><br>Cualquier inquietud, no dudes en usar la sección de preguntas, te responderemos en el menor tiempo posible.</span></p></div></div></section>', 'celular-xiaomi.png', '589900.00', 2, 'Tipo de promoción descuento%, tiene un descuento de 10', '1061820.00', NULL, 'Negros'),
(3, 3, 'UT1051', 'Nulla hic earum sit.', 'Officiis quo facere nihil aut. Est incidunt eligendi vel autem ea sint molestiae. Saepe explicabo eum ipsam dolores.', 'https://lorempixel.com/200/200/?31582', '20000.00', 1, 'Tipo de promoción 2x1, tiene un descuento de 0', '20000.00', '30', 'rojos');
INSERT INTO `detalle_pedidos` (`id`, `pedido_id`, `detalle_producto_ref`, `detalle_nombre`, `detalle_descripcion`, `detalle_imagen`, `detalle_precio`, `detalle_cantidad`, `detalle_promo_info`, `detalle_precio_final`, `detalle_talla`, `detalle_color`) VALUES
(4, 4, 'XIAOMIA2', 'Celular Xiaomi Mi A2 4gb De Ram 64gb Cámara Dual 4g Lte', '<section class=\"ui-view-more vip-section-specs main-section \" style=\"margin: 0px; padding: 44px 32px; border: 0px; outline: 0px; vertical-align: baseline; font-size: 14px; color: rgb(51, 51, 51); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\"><h2 class=\"main-section__title\" style=\"margin-right: 0px; margin-bottom: 32px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-size: 24px; font-weight: 600; line-height: 1;\">Características</h2><div class=\"specs-wrapper\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><section class=\"specs-container  specs-primary-specs specs-layout-default u-clearfix\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><ul class=\"specs-list specs-list-primary specs-structure-medium\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; display: flex; flex-wrap: wrap;\"><li class=\"specs-item specs-item-primary\" style=\"margin: 0px 0px 15px; padding: 0px 16px 0px 0px; border: 0px; outline: 0px; vertical-align: baseline; font-size: 16px; float: left; width: 353.594px; clear: left;\"><span style=\"margin: 0px 0px 2px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; color: rgb(153, 153, 153); line-height: 1; display: block;\">Marca</span><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-size: 20px; word-break: break-word;\">Xiaomi</span></li></ul><span style=\"font-size: 16px; margin: 0px 0px 2px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; color: rgb(153, 153, 153); line-height: 1;\">Modelo</span></section><section class=\"specs-container  specs-primary-specs specs-layout-default u-clearfix\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-size: 20px; word-break: break-word;\">A2</span><br></section></div></section><section class=\"main-section item-description \" style=\"margin: 0px; padding: 0px 32px 44px; border: 0px; outline: 0px; vertical-align: baseline; overflow: hidden;\"><h2 class=\"main-section__title item-description__title\" style=\"font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; margin-right: 0px; margin-bottom: 32px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-weight: 600; line-height: 1;\"><span style=\"font-size: large; color: rgb(0, 0, 0);\">Descripción:</span></h2><div id=\"description-includes\" class=\"item-description__content \" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><div class=\"item-description__text\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold; font-size: large; color: rgb(0, 0, 0);\">Xiaomi Mi A2&nbsp;</span><span style=\"color: rgb(102, 102, 102); font-size: small;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: small;\"><br></span></p><table class=\"table\" align=\"left\" border=\"1\" cellspacing=\"1\" cellpadding=\"1\" style=\"width: 400px;\"><tbody><tr><td>&nbsp;Pantalla</td><td>&nbsp;5.9 Pulgadas<span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: small;\">&nbsp;</span></td></tr><tr><td>&nbsp;Procesador</td><td>&nbsp;Snapdragon 660 Octa-core</td></tr><tr><td>&nbsp;Android</td><td>&nbsp;One 8.1 (Oreo)<span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: small;\">&nbsp;</span></td></tr><tr><td>&nbsp;Memoria</td><td>&nbsp;&nbsp;Interna 64Gb<span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: small;\">&nbsp;</span></td></tr><tr><td>&nbsp;Memoria</td><td>&nbsp;Ram 4Gb</td></tr><tr><td>&nbsp;Cámara Principal</td><td>&nbsp;12 mpx + 20 mpx Con Flash</td></tr><tr><td>&nbsp;Cámara&nbsp; Frontal</td><td>&nbsp;&nbsp;20 mpx<span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: small;\">&nbsp;</span></td></tr><tr><td>&nbsp;Batería</td><td>&nbsp;&nbsp;3000</td></tr><tr><td>&nbsp;Carga Rápida</td><td>&nbsp;Si<span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: small;\">&nbsp;</span></td></tr><tr><td>&nbsp;Sensores</td><td>&nbsp;Huella digital (montado en la parte posterior), acelerómetro, giroscopio, proximidad, brújula</td></tr></tbody></table><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><br><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><table class=\"table\" border=\"1\" cellspacing=\"1\" cellpadding=\"1\" style=\"width: 400px;\"><tbody><tr><td>&nbsp;Bluetooth&nbsp;</td><td>&nbsp;Si<span style=\"font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; color: rgb(102, 102, 102); font-size: small;\">&nbsp;</span></td></tr><tr><td>&nbsp;</td><td>&nbsp;</td></tr></tbody></table><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\">FORMAS DE ENTREGA</span><br><br><span style=\"color: rgb(102, 102, 102); font-size: small;\"><span style=\"font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\">Bogotá</span><br><br><span style=\"font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\">Puedes retirar tu equipo en nuestras oficinas después de dar clic en comprar y dar la opción \"retiro en domicilio del vendedor\"</span><br><span style=\"font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\">Nuestro horario de atención es de lunes a sábado de 9:00 Am a 7:00 Pm. Te esperamos</span><br><br><span style=\"font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\">Domicilios Bogotá.</span><br><br><span style=\"font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\">Obtén tu producto el mismo día en la puerta de tu casa u oficina por tan solo diez mil pesos. después de dar clic en comprar y dar la opción \"retiro en domicilio del vendedor\"</span></span><br><br><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\">OTRAS CIUDADES</span><br><br><span style=\"color: rgb(102, 102, 102); font-family: arial, helvetica, sans-serif; font-size: small;\">Envíos gratis a todo el país&nbsp;<br><br>Recibe tu producto a través de mercado envios dando clic en comprar y dar la opcion \"envio a mi domicilio\"<br><br>Cualquier inquietud, no dudes en usar la sección de preguntas, te responderemos en el menor tiempo posible.</span></p></div></div></section>', 'celular-xiaomi.png', '589900.00', 1, 'Tipo de promoción %, tiene un descuento de 10', '530910.00', NULL, 'Negros'),
(5, 5, 'EVENIET1802', 'Libero recusandae.', 'Voluptatem totam quo et reprehenderit tenetur. At excepturi veniam incidunt saepe.', 'https://lorempixel.com/200/200/?53763', '40000.00', 1, 'Tipo de promoción %, tiene un descuento de 10', '36000.00', '28', 'verdes'),
(6, 6, 'XIAOMIA2', 'Celular Xiaomi Mi A2 4gb De Ram 64gb Cámara Dual 4g Lte', '<section class=\"ui-view-more vip-section-specs main-section \" style=\"margin: 0px; padding: 44px 32px; border: 0px; outline: 0px; vertical-align: baseline; font-size: 14px; color: rgb(51, 51, 51); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\"><h2 class=\"main-section__title\" style=\"margin-right: 0px; margin-bottom: 32px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-size: 24px; font-weight: 600; line-height: 1;\">Características</h2><div class=\"specs-wrapper\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><section class=\"specs-container  specs-primary-specs specs-layout-default u-clearfix\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><ul class=\"specs-list specs-list-primary specs-structure-medium\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; display: flex; flex-wrap: wrap;\"><li class=\"specs-item specs-item-primary\" style=\"margin: 0px 0px 15px; padding: 0px 16px 0px 0px; border: 0px; outline: 0px; vertical-align: baseline; font-size: 16px; float: left; width: 353.594px; clear: left;\"><span style=\"margin: 0px 0px 2px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; color: rgb(153, 153, 153); line-height: 1; display: block;\">Marca</span><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-size: 20px; word-break: break-word;\">Xiaomi</span></li></ul><span style=\"font-size: 16px; margin: 0px 0px 2px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; color: rgb(153, 153, 153); line-height: 1;\">Modelo</span></section><section class=\"specs-container  specs-primary-specs specs-layout-default u-clearfix\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-size: 20px; word-break: break-word;\">A2</span><br></section></div></section><section class=\"main-section item-description \" style=\"margin: 0px; padding: 0px 32px 44px; border: 0px; outline: 0px; vertical-align: baseline; overflow: hidden;\"><h2 class=\"main-section__title item-description__title\" style=\"font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; margin-right: 0px; margin-bottom: 32px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-weight: 600; line-height: 1;\"><span style=\"font-size: large; color: rgb(0, 0, 0);\">Descripción:</span></h2><div id=\"description-includes\" class=\"item-description__content \" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><div class=\"item-description__text\" style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold; font-size: large; color: rgb(0, 0, 0);\">Xiaomi Mi A2&nbsp;</span><span style=\"color: rgb(102, 102, 102); font-size: small;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: small;\"><br></span></p><table class=\"table\" align=\"left\" border=\"1\" cellspacing=\"1\" cellpadding=\"1\" style=\"width: 400px;\"><tbody><tr><td>&nbsp;Pantalla</td><td>&nbsp;5.9 Pulgadas<span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: small;\">&nbsp;</span></td></tr><tr><td>&nbsp;Procesador</td><td>&nbsp;Snapdragon 660 Octa-core</td></tr><tr><td>&nbsp;Android</td><td>&nbsp;One 8.1 (Oreo)<span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: small;\">&nbsp;</span></td></tr><tr><td>&nbsp;Memoria</td><td>&nbsp;&nbsp;Interna 64Gb<span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: small;\">&nbsp;</span></td></tr><tr><td>&nbsp;Memoria</td><td>&nbsp;Ram 4Gb</td></tr><tr><td>&nbsp;Cámara Principal</td><td>&nbsp;12 mpx + 20 mpx Con Flash</td></tr><tr><td>&nbsp;Cámara&nbsp; Frontal</td><td>&nbsp;&nbsp;20 mpx<span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: small;\">&nbsp;</span></td></tr><tr><td>&nbsp;Batería</td><td>&nbsp;&nbsp;3000</td></tr><tr><td>&nbsp;Carga Rápida</td><td>&nbsp;Si<span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: small;\">&nbsp;</span></td></tr><tr><td>&nbsp;Sensores</td><td>&nbsp;Huella digital (montado en la parte posterior), acelerómetro, giroscopio, proximidad, brújula</td></tr></tbody></table><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><br><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\"><br></span></p><table class=\"table\" border=\"1\" cellspacing=\"1\" cellpadding=\"1\" style=\"width: 400px;\"><tbody><tr><td>&nbsp;Bluetooth&nbsp;</td><td>&nbsp;Si<span style=\"font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; color: rgb(102, 102, 102); font-size: small;\">&nbsp;</span></td></tr><tr><td>&nbsp;</td><td>&nbsp;</td></tr></tbody></table><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline;\"><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\">FORMAS DE ENTREGA</span><br><br><span style=\"color: rgb(102, 102, 102); font-size: small;\"><span style=\"font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\">Bogotá</span><br><br><span style=\"font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\">Puedes retirar tu equipo en nuestras oficinas después de dar clic en comprar y dar la opción \"retiro en domicilio del vendedor\"</span><br><span style=\"font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\">Nuestro horario de atención es de lunes a sábado de 9:00 Am a 7:00 Pm. Te esperamos</span><br><br><span style=\"font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\">Domicilios Bogotá.</span><br><br><span style=\"font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;\">Obtén tu producto el mismo día en la puerta de tu casa u oficina por tan solo diez mil pesos. después de dar clic en comprar y dar la opción \"retiro en domicilio del vendedor\"</span></span><br><br><span style=\"color: rgb(102, 102, 102); font-size: 20px; font-family: &quot;Proxima Nova&quot;, -apple-system, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-weight: bold;\">OTRAS CIUDADES</span><br><br><span style=\"color: rgb(102, 102, 102); font-family: arial, helvetica, sans-serif; font-size: small;\">Envíos gratis a todo el país&nbsp;<br><br>Recibe tu producto a través de mercado envios dando clic en comprar y dar la opcion \"envio a mi domicilio\"<br><br>Cualquier inquietud, no dudes en usar la sección de preguntas, te responderemos en el menor tiempo posible.</span></p></div></div></section>', 'celular-xiaomi.png', '589900.00', 1, 'Tipo de promoción %, tiene un descuento de 10', '530910.00', NULL, 'Negros'),
(7, 7, 'UT1051', 'Nulla hic earum sit.', 'Officiis quo facere nihil aut. Est incidunt eligendi vel autem ea sint molestiae. Saepe explicabo eum ipsam dolores.', 'https://lorempixel.com/200/200/?31582', '20000.00', 1, 'Tipo de promoción 2x1, tiene un descuento de 0', '20000.00', '28', 'verdes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE `envios` (
  `id` int(10) UNSIGNED NOT NULL,
  `envio_metodo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `envios`
--

INSERT INTO `envios` (`id`, `envio_metodo`, `fecha_creado`, `fecha_actualizado`) VALUES
(1, 'Domicilio', '2019-05-28 20:59:44', '2019-05-28 20:59:44'),
(2, 'Tienda fisica', '2019-05-28 20:59:44', '2019-05-28 20:59:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(10) UNSIGNED NOT NULL,
  `producto_id` int(10) UNSIGNED NOT NULL,
  `imagen_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `producto_id`, `imagen_url`) VALUES
(1, 2, '1561476804_lily y yo.jpg'),
(2, 2, '1561476804_logo josue sin fondo.png'),
(3, 2, '1561476805_regalo3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_03_22_145109_create_roles_table', 1),
(2, '2019_03_22_151218_create_secciones_table', 1),
(3, '2019_03_22_151323_create_users_table', 1),
(4, '2019_03_22_154646_create_password_resets_table', 1),
(5, '2019_03_22_154842_create_categorias_table', 1),
(6, '2019_03_22_155019_create_promociones_table', 1),
(7, '2019_03_22_155150_create_envios_table', 1),
(8, '2019_03_22_155155_create_transacciones_table', 1),
(9, '2019_03_22_155159_create_pedidos_table', 1),
(10, '2019_03_22_155725_create_productos_table', 1),
(11, '2019_03_22_160120_create_detalle_pedidos_table', 1),
(12, '2019_03_22_160249_create_imagenes_table', 1),
(13, '2019_05_28_151116_create_videos_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `pedido_dir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pedido_ref_venta` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promocion_id` int(10) UNSIGNED DEFAULT NULL,
  `envio_id` int(10) UNSIGNED NOT NULL,
  `pedido_tipo_dispositivo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pedido_ip_dispositivo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaccion_id` int(10) UNSIGNED DEFAULT NULL,
  `fecha_creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `user_id`, `pedido_dir`, `pedido_ref_venta`, `promocion_id`, `envio_id`, `pedido_tipo_dispositivo`, `pedido_ip_dispositivo`, `transaccion_id`, `fecha_creado`, `fecha_actualizado`) VALUES
(1, 1, 'Cll 6b # 41-36, La Nevada - Valledupar, Colombia', 'En espera', 2, 1, 'Escritorio Windows 10, navegador Chrome', '127.0.0.1', 1, '2019-05-29 04:47:02', '2019-05-29 04:47:02'),
(2, 1, 'Cll 6b # 41-36, La Nevada - Valledupar, Colombia', 'En espera', 2, 1, 'Escritorio Windows 10, navegador Chrome', '127.0.0.1', 3, '2019-05-30 04:44:27', '2019-05-30 04:44:27'),
(3, 3, 'En algún lado de este Bello mundo, La Nevada - Valledupar, Colombia', 'En espera', NULL, 2, 'Escritorio Windows 10, navegador Chrome', '127.0.0.1', 4, '2019-05-30 18:09:12', '2019-05-30 18:09:12'),
(4, 1, 'Cll 6b # 41-36, La Nevada - Valledupar, Colombia', 'INNOVA1559243618', NULL, 1, 'Escritorio Windows 10, navegador Chrome', '127.0.0.1', 5, '2019-05-30 19:13:44', '2019-05-30 19:13:44'),
(5, 1, 'Cll 6b # 41-36, La Nevada - Valledupar, Colombia', 'INNOVA1559287041', NULL, 1, 'Movil o tableta AndroidOS 6, navegador Chrome', '127.0.0.1', 6, '2019-05-31 07:17:55', '2019-05-31 07:17:55'),
(6, 1, 'Cll 6b # 41-36, La Nevada - Valledupar, Colombia', 'INNOVA1559579053', NULL, 2, 'Escritorio Windows 10, navegador Chrome', '127.0.0.1', 7, '2019-06-03 16:27:09', '2019-06-03 16:27:09'),
(7, 1, 'Cll 6b # 41-36, La Nevada - Valledupar, Colombia', 'INNOVA1559598342', NULL, 1, 'Escritorio Windows 10, navegador Chrome', '127.0.0.1', 8, '2019-06-03 21:45:51', '2019-06-03 21:45:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `categoria_id` int(10) UNSIGNED NOT NULL,
  `producto_nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `producto_descripcion` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `producto_tags` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `producto_ref` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `producto_imagen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `producto_precio` decimal(10,2) NOT NULL,
  `promocion_id` int(10) UNSIGNED DEFAULT NULL,
  `producto_tallas` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `producto_colores` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `producto_tieneImgDescripcion` tinyint(1) DEFAULT NULL,
  `producto_cant` int(11) NOT NULL,
  `producto_estado` tinyint(1) NOT NULL,
  `fecha_creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `categoria_id`, `producto_nombre`, `producto_descripcion`, `producto_tags`, `producto_ref`, `producto_imagen`, `producto_precio`, `promocion_id`, `producto_tallas`, `producto_colores`, `producto_tieneImgDescripcion`, `producto_cant`, `producto_estado`, `fecha_creado`, `fecha_actualizado`) VALUES
(1, 5, 'Producto 2', 'SDFSDFASDFASDFS', 'Celular, movil, tecnologia', 'PRODUCTO2', '1561475921_573136488795.jpg', '400000.00', NULL, NULL, NULL, 0, 10, 1, '2019-06-25 15:18:41', '2019-06-25 15:18:41'),
(2, 16, 'Producto 3', 'sds&lt;a sd sadfcsdvcs&lt;dc', 'Celular, movil, tecnologia', 'PRODUCTO3', '1561476804_573136488795.jpg', '300000.00', 2, '25cmx30cm', 'Dorado', 1, 4, 1, '2019-06-25 15:33:24', '2019-06-25 15:33:24'),
(3, 5, 'Producto de prueba', '&lt;vsdvdfvsdfbdfsbsdfbdsb fdsbsdf bdf', 'Celular, movil, tecnologia', 'FGDFSGFD', '1561482173_lily y yo (2).jpg', '500000.00', NULL, NULL, NULL, 0, 4, 1, '2019-06-25 17:02:53', '2019-06-25 17:02:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `id` int(10) UNSIGNED NOT NULL,
  `promo_nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promo_tipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promo_costo` int(11) NOT NULL,
  `promo_publicidad` tinyint(1) NOT NULL,
  `promo_banner_publicidad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promo_inicio` datetime NOT NULL,
  `promo_final` datetime NOT NULL,
  `promo_numero_canjeo` int(11) NOT NULL,
  `promo_minimo_pedido` int(11) DEFAULT NULL,
  `categoria_id` int(10) UNSIGNED DEFAULT NULL,
  `fecha_creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `promociones`
--

INSERT INTO `promociones` (`id`, `promo_nombre`, `promo_tipo`, `promo_costo`, `promo_publicidad`, `promo_banner_publicidad`, `promo_inicio`, `promo_final`, `promo_numero_canjeo`, `promo_minimo_pedido`, `categoria_id`, `fecha_creado`, `fecha_actualizado`) VALUES
(1, 'D1', '%', 10, 1, 'https://lorempixel.com/200/200/cats/?92232', '2019-01-01 01:00:00', '2019-12-31 00:00:00', 2, 20000, NULL, '2019-05-28 20:59:44', '2019-05-28 20:59:44'),
(2, 'D2', '$', 15000, 0, 'https://lorempixel.com/200/200/cats/?38669', '2019-01-01 01:00:00', '2019-09-30 00:00:00', 2, 200000, 2, '2019-05-28 20:59:44', '2019-05-28 20:59:44'),
(3, 'D3', '2x1', 0, 1, 'https://lorempixel.com/200/200/cats/?28997', '2019-01-01 01:00:00', '2019-12-31 00:00:00', 5, 20000, NULL, '2019-05-28 20:59:44', '2019-05-28 20:59:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `rol_nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol_nombre`, `fecha_creado`) VALUES
(1, 'Admin', '2019-05-28 20:59:39'),
(2, 'Visitante', '2019-05-28 20:59:39'),
(3, 'Cliente', '2019-05-28 20:59:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `seccion_nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seccion_descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seccion_imagen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id`, `seccion_nombre`, `seccion_descripcion`, `seccion_imagen`, `fecha_creado`) VALUES
(1, 'tecnologias', 'Sección de articulos tecnologicos', 'celular.svg', '2019-05-28 20:59:39'),
(2, 'zapatos', 'Sección de venta de calzado', 'zapatos.svg', '2019-05-28 20:59:39'),
(3, 'joyas', 'Sección de venta de joyas', 'joyas.svg', '2019-05-28 20:59:39'),
(4, 'Ruedas', 'Todos los productos que tengan ruedas', '', '2019-05-30 00:39:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE `transacciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `mensaje_respuesta` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_respuesta` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion_transaccion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_transaccion` decimal(10,2) DEFAULT NULL,
  `metodo_pago_tipo` int(11) DEFAULT NULL,
  `metodo_pago_nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metodo_pago_id` int(11) DEFAULT NULL,
  `id_transaccion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referencia_venta_payu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_moneda_transaccion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_cuotas_pago` int(11) DEFAULT NULL,
  `ip_transaccion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pse_cus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pse_bank` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pse_references` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_transaccion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `transacciones`
--

INSERT INTO `transacciones` (`id`, `estado`, `mensaje_respuesta`, `codigo_respuesta`, `descripcion_transaccion`, `valor_transaccion`, `metodo_pago_tipo`, `metodo_pago_nombre`, `metodo_pago_id`, `id_transaccion`, `referencia_venta_payu`, `tipo_moneda_transaccion`, `numero_cuotas_pago`, `ip_transaccion`, `pse_cus`, `pse_bank`, `pse_references`, `fecha_transaccion`, `fecha_creado`, `fecha_actualizado`) VALUES
(1, 0, 'En espera', 'En espera', 'En espera', '0.00', 0, 'En espera', 0, 'En espera', 'En espera', 'En espera', 0, 'En espera', 'En espera', 'En espera', 'En espera', '2019-05-29 04:47:00', '2019-05-29 04:47:00', '2019-05-29 04:47:00'),
(2, 0, 'En espera', 'En espera', 'En espera', '0.00', 0, 'En espera', 0, 'En espera', 'En espera', 'En espera', 0, 'En espera', 'En espera', 'En espera', 'En espera', '2019-05-29 04:50:22', '2019-05-29 04:50:22', '2019-05-29 04:50:22'),
(3, 0, 'En espera', 'En espera', 'En espera', '0.00', 0, 'En espera', 0, 'En espera', 'En espera', 'En espera', 0, 'En espera', 'En espera', 'En espera', 'En espera', '2019-05-30 04:44:26', '2019-05-30 04:44:26', '2019-05-30 04:44:26'),
(4, 0, 'En espera', 'En espera', 'En espera', '0.00', 0, 'En espera', 0, 'En espera', 'En espera', 'En espera', 0, 'En espera', 'En espera', 'En espera', 'En espera', '2019-05-30 18:09:12', '2019-05-30 18:09:12', '2019-05-30 18:09:12'),
(5, 0, 'En espera', 'En espera', 'En espera', '0.00', 0, 'En espera', 0, 'En espera', 'En espera', 'En espera', 0, 'En espera', 'En espera', 'En espera', 'En espera', '2019-05-30 19:13:44', '2019-05-30 19:13:44', '2019-05-30 19:13:44'),
(6, 0, 'En espera', 'En espera', 'En espera', '0.00', 0, 'En espera', 0, 'En espera', 'En espera', 'En espera', 0, 'En espera', 'En espera', 'En espera', 'En espera', '2019-05-31 07:17:54', '2019-05-31 07:17:54', '2019-05-31 07:17:54'),
(7, 0, 'En espera', 'En espera', 'En espera', '0.00', 0, 'En espera', 0, 'En espera', 'En espera', 'En espera', 0, 'En espera', 'En espera', 'En espera', 'En espera', '2019-06-03 16:27:08', '2019-06-03 16:27:08', '2019-06-03 16:27:08'),
(8, 0, 'En espera', 'En espera', 'En espera', '0.00', 0, 'En espera', 0, 'En espera', 'En espera', 'En espera', 0, 'En espera', 'En espera', 'En espera', 'En espera', '2019-06-03 21:45:49', '2019-06-03 21:45:49', '2019-06-03 21:45:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `rol_id` int(10) UNSIGNED NOT NULL,
  `usuario_nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_apellido` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_cedula` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuario_sexo` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuario_avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `usuario_telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_pais` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuario_ciudad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuario_barrio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuario_direccion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_estado` tinyint(1) NOT NULL,
  `fecha_creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `rol_id`, `usuario_nombre`, `usuario_apellido`, `usuario_cedula`, `usuario_sexo`, `usuario_avatar`, `usuario_telefono`, `email`, `usuario_pais`, `usuario_ciudad`, `usuario_barrio`, `usuario_direccion`, `password`, `usuario_estado`, `fecha_creado`, `fecha_actualizado`, `remember_token`) VALUES
(1, 1, 'Odannys', 'De La Cruz Calvo', '1065825573', 'm', 'odannys.jpg', '3107484079', 'el_odanis321@hotmail.com', 'Colombia', 'Valledupar', 'La Nevada', 'Cll 6b # 41-36', '$2y$10$GteWX4rn2pA.AUt72h6cSuv0FaA1tb3d1nfILxD2rckTDe7.swxve', 1, '2019-05-28 20:59:41', '2019-05-28 20:59:41', 'IaFQbnHIB2VQXF5bKJACKDYL0Bvh1rzX8sN4kDarrwwLSObvuhF4Vid2nAsD'),
(2, 1, 'Jose', 'Meriño', '7582574', 'm', 'avatar.png', '3046124657', 'jl562@hotmail.com', 'Colombia', 'Valledupar', 'Confacesar', 'En algún lado de este Bello mundo', '$2y$10$oy7jA2pLMGDFYoQraWrgCO3k0.R3beQyWhVeq3JxPtI2FQNtu3PXa', 1, '2019-05-28 20:59:41', '2019-05-28 20:59:41', NULL),
(3, 2, 'Eduardo', 'Lodico', '1065825574', 'm', 'avatar.png', '3043275975', 'eduardolodico@gmail.com', 'Colombia', 'Valledupar', 'La Nevada', 'En algún lado de este Bello mundo', '$2y$10$AtYCak79A3xoV7smsZxPXOc8MJX63JJuYir3RLITN/WNEsLV1dnkm', 1, '2019-05-28 20:59:41', '2019-05-28 20:59:41', '1t3oQYj8vl25z2FaWyHBDodXadTvHQgXdiSg0H09HSlV9Wzuocx9Pgt0CJG1'),
(4, 3, 'Ezra', 'Huel', '212045384', NULL, 'avatar.png', '(945) 674-9266 x245', 'usuario434@gmail.com', 'Haiti', 'Lake Moses', 'Beryl Fords', '65154 Satterfield Vista Suite 501\nEast Amberborough, SC 88740', '$2y$10$lCe/DRzgvbGcoi9u/ugFf.8K.RXkxACedXZ6XCWsLqjqvUeig3COa', 1, '2019-05-28 20:59:43', '2019-05-28 20:59:43', NULL),
(5, 3, 'Patsy', 'Tromp', '200940912', NULL, 'avatar.png', '(468) 460-2727', 'usuario354@gmail.com', 'Tuvalu', 'Heleneton', 'Kattie Forest', '47409 Huel Fork\nLake Winnifredtown, NE 38489', '$2y$10$M3RwbYch51Y1fRnCdwJRyufUMfg0xsdhIQuerb8WRSSC9DzVijiSa', 0, '2019-05-28 20:59:43', '2019-05-28 20:59:43', NULL),
(6, 3, 'Amiya', 'Ritchie', '34153552', NULL, 'avatar.png', '1-245-481-5055', 'usuario640@gmail.com', 'Mongolia', 'Lake Janice', 'Georgiana Overpass', '5377 Araceli Shore Suite 986\nElodyview, MN 22131-8221', '$2y$10$EFJF7hfzjhoPBZmawpXVhepyX5.HYaqKYT/odt7larM/5z83o6r1O', 0, '2019-05-28 20:59:43', '2019-05-28 20:59:43', NULL),
(7, 2, 'Lily', 'Perez', '1065806321', NULL, 'avatar.png', '30065505575', 'ltperez12@misena.edu.co', 'Vacio', 'Vacio', 'Vacio', 'Vacio', '$2y$10$KW5S65PdHcWCXOxqhOSC9el23BdOuhfLUT1BdLU84pCw2aZkEWE.S', 1, '2019-05-30 20:32:29', '2019-05-30 20:32:29', 'qThbl81Zz3Ngo1XLjw8wrkkFVMq2BOxAUvwHyDLfFmuCR9LAmppJPPfmpiSv'),
(8, 2, 'Lily', 'De La Cruz', '46464', NULL, 'avatar.png', NULL, 'g64436g@misena.edu.co', 'Colombia', 'Vacio', 'La Nevada', 'Cll 6b #41 - 36', '$2y$10$B7q.S9Sb.Yg4CApyt2wSpO4luKG1gqE2YDZwPkZWvz2peuFCwIa/y', 1, '2019-05-30 22:46:07', '2019-05-30 22:46:07', 'LoLv4hYOaTFpyW33cZ1uMo8mgFWO3jUssn6Q3SZmX1i9oWD1tz03PxVyWKHf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `producto_id` int(10) UNSIGNED DEFAULT NULL,
  `video_url` mediumtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categorias_categoria_nombre_unique` (`categoria_nombre`),
  ADD KEY `categorias_seccion_id_foreign` (`seccion_id`);

--
-- Indices de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalle_pedidos_pedido_id_foreign` (`pedido_id`);

--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imagenes_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidos_user_id_foreign` (`user_id`),
  ADD KEY `pedidos_promocion_id_foreign` (`promocion_id`),
  ADD KEY `pedidos_envio_id_foreign` (`envio_id`),
  ADD KEY `pedidos_transaccion_id_foreign` (`transaccion_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `productos_producto_nombre_unique` (`producto_nombre`),
  ADD UNIQUE KEY `productos_producto_ref_unique` (`producto_ref`),
  ADD KEY `productos_categoria_id_foreign` (`categoria_id`),
  ADD KEY `productos_promocion_id_foreign` (`promocion_id`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `promociones_promo_nombre_unique` (`promo_nombre`),
  ADD KEY `promociones_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `secciones_seccion_nombre_unique` (`seccion_nombre`);

--
-- Indices de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_usuario_cedula_unique` (`usuario_cedula`),
  ADD KEY `users_rol_id_foreign` (`rol_id`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videos_producto_id_foreign` (`producto_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `envios`
--
ALTER TABLE `envios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `categorias_seccion_id_foreign` FOREIGN KEY (`seccion_id`) REFERENCES `secciones` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD CONSTRAINT `detalle_pedidos_pedido_id_foreign` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_envio_id_foreign` FOREIGN KEY (`envio_id`) REFERENCES `envios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pedidos_promocion_id_foreign` FOREIGN KEY (`promocion_id`) REFERENCES `promociones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pedidos_transaccion_id_foreign` FOREIGN KEY (`transaccion_id`) REFERENCES `transacciones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pedidos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `productos_promocion_id_foreign` FOREIGN KEY (`promocion_id`) REFERENCES `promociones` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD CONSTRAINT `promociones_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
