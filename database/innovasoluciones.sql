-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2019 a las 23:46:00
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
  `fecha_creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_actualizado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `seccion_id`, `categoria_nombre`, `categoria_descripcion`, `fecha_creado`, `fecha_actualizado`) VALUES
(1, 3, 'est', 'Et ut quidem odio quo.', '2019-05-08 17:24:17', NULL),
(2, 1, 'et', 'Mollitia aspernatur nemo quibusdam.', '2019-05-08 17:24:17', NULL),
(3, 3, 'praesentium', 'Velit eligendi eum dolor aut nihil.', '2019-05-08 17:24:17', NULL),
(4, 2, 'aliquid', 'Sequi atque dolor quidem nulla.', '2019-05-08 17:24:17', NULL),
(5, 2, 'exercitationem', 'Vero ipsam cupiditate aut tempore.', '2019-05-08 17:24:17', NULL),
(6, 1, 'quia', 'Accusantium qui debitis numquam.', '2019-05-08 17:24:17', NULL),
(7, 2, 'nihil', 'Totam deserunt eaque repellat.', '2019-05-08 17:24:17', NULL),
(8, 1, 'cumque', 'Mollitia et qui ut vel nulla explicabo.', '2019-05-08 17:24:17', NULL),
(9, 3, 'similique', 'Error esse rerum consequatur sint amet.', '2019-05-08 17:24:17', NULL),
(10, 1, 'molestiae', 'Libero omnis et repudiandae dicta ipsa fugit.', '2019-05-08 17:24:17', NULL),
(11, 3, 'veritatis', 'Ut voluptas alias rerum sint.', '2019-05-08 17:24:17', NULL),
(12, 2, 'corrupti', 'Velit fuga dolorem et ea mollitia.', '2019-05-08 17:24:17', NULL),
(13, 1, 'voluptatem', 'Nulla similique assumenda nihil.', '2019-05-08 17:24:17', NULL),
(14, 2, 'eos', 'Iste sapiente id optio.', '2019-05-08 17:24:17', NULL),
(15, 2, 'qui', 'Vel velit in et et.', '2019-05-08 17:24:17', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedidos`
--

CREATE TABLE `detalle_pedidos` (
  `id` int(10) UNSIGNED NOT NULL,
  `pedido_id` int(10) UNSIGNED NOT NULL,
  `detalle_producto_ref` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detalle_descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `detalle_pedidos` (`id`, `pedido_id`, `detalle_producto_ref`, `detalle_descripcion`, `detalle_imagen`, `detalle_precio`, `detalle_cantidad`, `detalle_promo_info`, `detalle_precio_final`, `detalle_talla`, `detalle_color`) VALUES
(1, 1, 'Referencia del producto', 'Descripcion de ejemplo', 'https://lorempixel.com/200/200/?17624', '30000.00', 1, 'promo_tipo - promo_costo', '40000.00', '20x20', 'negro'),
(2, 3, 'Referencia del producto', 'Descripcion de ejemplo', 'https://lorempixel.com/200/200/?25546', '30000.00', 1, 'promo_tipo - promo_costo', '40000.00', '20x20', 'negro'),
(3, 7, 'Referencia del producto', 'Descripcion de ejemplo', 'https://lorempixel.com/200/200/?87906', '30000.00', 1, 'promo_tipo - promo_costo', '40000.00', '20x20', 'negro'),
(4, 3, 'Referencia del producto', 'Descripcion de ejemplo', 'https://lorempixel.com/200/200/?95053', '30000.00', 1, 'promo_tipo - promo_costo', '40000.00', '20x20', 'negro'),
(5, 2, 'Referencia del producto', 'Descripcion de ejemplo', 'https://lorempixel.com/200/200/?60091', '30000.00', 1, 'promo_tipo - promo_costo', '40000.00', '20x20', 'negro'),
(6, 10, 'Referencia del producto', 'Descripcion de ejemplo', 'https://lorempixel.com/200/200/?22681', '30000.00', 1, 'promo_tipo - promo_costo', '40000.00', '20x20', 'negro'),
(7, 9, 'Referencia del producto', 'Descripcion de ejemplo', 'https://lorempixel.com/200/200/?57855', '30000.00', 1, 'promo_tipo - promo_costo', '40000.00', '20x20', 'negro'),
(8, 8, 'Referencia del producto', 'Descripcion de ejemplo', 'https://lorempixel.com/200/200/?39906', '30000.00', 1, 'promo_tipo - promo_costo', '40000.00', '20x20', 'negro'),
(9, 9, 'Referencia del producto', 'Descripcion de ejemplo', 'https://lorempixel.com/200/200/?93287', '30000.00', 1, 'promo_tipo - promo_costo', '40000.00', '20x20', 'negro'),
(10, 7, 'Referencia del producto', 'Descripcion de ejemplo', 'https://lorempixel.com/200/200/?45109', '30000.00', 1, 'promo_tipo - promo_costo', '40000.00', '20x20', 'negro'),
(11, 11, 'TENETUR2679', 'Aspernatur officia aliquid illo omnis non.', 'https://lorempixel.com/200/200/?61184', '50000.00', 2, 'Tipo de promoción descuento%, tiene un descuento de 10', '90000.00', '28', 'verdes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE `envios` (
  `id` int(10) UNSIGNED NOT NULL,
  `envio_metodo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_actualizado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `envios`
--

INSERT INTO `envios` (`id`, `envio_metodo`, `fecha_creado`, `fecha_actualizado`) VALUES
(1, 'Domicilio', '2019-05-08 17:24:17', NULL),
(2, 'Tienda fisica', '2019-05-08 17:24:18', NULL);

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
(1, 45, 'https://lorempixel.com/200/200/cats/?68376'),
(2, 32, 'https://lorempixel.com/200/200/cats/?41797'),
(3, 18, 'https://lorempixel.com/200/200/cats/?50323'),
(4, 6, 'https://lorempixel.com/200/200/cats/?25903'),
(5, 42, 'https://lorempixel.com/200/200/cats/?63427'),
(6, 49, 'https://lorempixel.com/200/200/cats/?82190'),
(7, 34, 'https://lorempixel.com/200/200/cats/?46482'),
(8, 33, 'https://lorempixel.com/200/200/cats/?48101'),
(9, 14, 'https://lorempixel.com/200/200/cats/?82094'),
(10, 37, 'https://lorempixel.com/200/200/cats/?61855'),
(11, 23, 'https://lorempixel.com/200/200/cats/?64799'),
(12, 44, 'https://lorempixel.com/200/200/cats/?67841'),
(13, 32, 'https://lorempixel.com/200/200/cats/?88470'),
(14, 40, 'https://lorempixel.com/200/200/cats/?99389'),
(15, 44, 'https://lorempixel.com/200/200/cats/?69664'),
(16, 8, 'https://lorempixel.com/200/200/cats/?82991'),
(17, 14, 'https://lorempixel.com/200/200/cats/?15030'),
(18, 38, 'https://lorempixel.com/200/200/cats/?86336'),
(19, 42, 'https://lorempixel.com/200/200/cats/?69500'),
(20, 39, 'https://lorempixel.com/200/200/cats/?39821'),
(21, 3, 'https://lorempixel.com/200/200/cats/?95412'),
(22, 8, 'https://lorempixel.com/200/200/cats/?26472'),
(23, 37, 'https://lorempixel.com/200/200/cats/?97535'),
(24, 2, 'https://lorempixel.com/200/200/cats/?93154'),
(25, 40, 'https://lorempixel.com/200/200/cats/?89040'),
(26, 47, 'https://lorempixel.com/200/200/cats/?44596'),
(27, 46, 'https://lorempixel.com/200/200/cats/?85420'),
(28, 5, 'https://lorempixel.com/200/200/cats/?24238'),
(29, 9, 'https://lorempixel.com/200/200/cats/?43685'),
(30, 50, 'https://lorempixel.com/200/200/cats/?49851'),
(31, 41, 'https://lorempixel.com/200/200/cats/?14931'),
(32, 36, 'https://lorempixel.com/200/200/cats/?86932'),
(33, 5, 'https://lorempixel.com/200/200/cats/?49555'),
(34, 28, 'https://lorempixel.com/200/200/cats/?36088'),
(35, 43, 'https://lorempixel.com/200/200/cats/?76086'),
(36, 38, 'https://lorempixel.com/200/200/cats/?61226'),
(37, 5, 'https://lorempixel.com/200/200/cats/?85413'),
(38, 31, 'https://lorempixel.com/200/200/cats/?65732'),
(39, 12, 'https://lorempixel.com/200/200/cats/?64415'),
(40, 19, 'https://lorempixel.com/200/200/cats/?17368'),
(41, 31, 'https://lorempixel.com/200/200/cats/?69015'),
(42, 20, 'https://lorempixel.com/200/200/cats/?80850'),
(43, 48, 'https://lorempixel.com/200/200/cats/?69941'),
(44, 47, 'https://lorempixel.com/200/200/cats/?14495'),
(45, 27, 'https://lorempixel.com/200/200/cats/?34525'),
(46, 9, 'https://lorempixel.com/200/200/cats/?72285'),
(47, 40, 'https://lorempixel.com/200/200/cats/?18631'),
(48, 6, 'https://lorempixel.com/200/200/cats/?17447'),
(49, 11, 'https://lorempixel.com/200/200/cats/?23854'),
(50, 45, 'https://lorempixel.com/200/200/cats/?21358'),
(51, 17, 'https://lorempixel.com/200/200/cats/?51249'),
(52, 9, 'https://lorempixel.com/200/200/cats/?63016'),
(53, 41, 'https://lorempixel.com/200/200/cats/?24568'),
(54, 18, 'https://lorempixel.com/200/200/cats/?61798'),
(55, 49, 'https://lorempixel.com/200/200/cats/?27004'),
(56, 50, 'https://lorempixel.com/200/200/cats/?62144'),
(57, 50, 'https://lorempixel.com/200/200/cats/?63840'),
(58, 35, 'https://lorempixel.com/200/200/cats/?38340'),
(59, 9, 'https://lorempixel.com/200/200/cats/?22641'),
(60, 23, 'https://lorempixel.com/200/200/cats/?63980'),
(61, 34, 'https://lorempixel.com/200/200/cats/?95617'),
(62, 10, 'https://lorempixel.com/200/200/cats/?48430'),
(63, 30, 'https://lorempixel.com/200/200/cats/?58125'),
(64, 16, 'https://lorempixel.com/200/200/cats/?31439'),
(65, 36, 'https://lorempixel.com/200/200/cats/?73065'),
(66, 18, 'https://lorempixel.com/200/200/cats/?60538'),
(67, 19, 'https://lorempixel.com/200/200/cats/?27551'),
(68, 13, 'https://lorempixel.com/200/200/cats/?97948'),
(69, 15, 'https://lorempixel.com/200/200/cats/?33982'),
(70, 21, 'https://lorempixel.com/200/200/cats/?36740'),
(71, 38, 'https://lorempixel.com/200/200/cats/?74208'),
(72, 13, 'https://lorempixel.com/200/200/cats/?58609'),
(73, 50, 'https://lorempixel.com/200/200/cats/?98963'),
(74, 17, 'https://lorempixel.com/200/200/cats/?89862'),
(75, 32, 'https://lorempixel.com/200/200/cats/?19439'),
(76, 25, 'https://lorempixel.com/200/200/cats/?57340'),
(77, 40, 'https://lorempixel.com/200/200/cats/?76274'),
(78, 44, 'https://lorempixel.com/200/200/cats/?89161'),
(79, 25, 'https://lorempixel.com/200/200/cats/?96045'),
(80, 17, 'https://lorempixel.com/200/200/cats/?38200'),
(81, 46, 'https://lorempixel.com/200/200/cats/?75959'),
(82, 38, 'https://lorempixel.com/200/200/cats/?23924'),
(83, 2, 'https://lorempixel.com/200/200/cats/?34199'),
(84, 33, 'https://lorempixel.com/200/200/cats/?49007'),
(85, 20, 'https://lorempixel.com/200/200/cats/?85007'),
(86, 46, 'https://lorempixel.com/200/200/cats/?97475'),
(87, 45, 'https://lorempixel.com/200/200/cats/?99723'),
(88, 25, 'https://lorempixel.com/200/200/cats/?94208'),
(89, 14, 'https://lorempixel.com/200/200/cats/?96310'),
(90, 46, 'https://lorempixel.com/200/200/cats/?51046'),
(91, 15, 'https://lorempixel.com/200/200/cats/?59681'),
(92, 41, 'https://lorempixel.com/200/200/cats/?26207'),
(93, 31, 'https://lorempixel.com/200/200/cats/?27659'),
(94, 43, 'https://lorempixel.com/200/200/cats/?20806'),
(95, 46, 'https://lorempixel.com/200/200/cats/?59086'),
(96, 15, 'https://lorempixel.com/200/200/cats/?41291'),
(97, 50, 'https://lorempixel.com/200/200/cats/?31857'),
(98, 3, 'https://lorempixel.com/200/200/cats/?96867'),
(99, 27, 'https://lorempixel.com/200/200/cats/?34801'),
(100, 50, 'https://lorempixel.com/200/200/cats/?30576');

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
(210, '2019_03_22_145109_create_roles_table', 1),
(211, '2019_03_22_151218_create_secciones_table', 1),
(212, '2019_03_22_151323_create_users_table', 1),
(213, '2019_03_22_154646_create_password_resets_table', 1),
(214, '2019_03_22_154842_create_categorias_table', 1),
(215, '2019_03_22_155019_create_promociones_table', 1),
(216, '2019_03_22_155150_create_envios_table', 1),
(217, '2019_03_22_155159_create_pedidos_table', 1),
(218, '2019_03_22_155725_create_productos_table', 1),
(219, '2019_03_22_160120_create_detalle_pedidos_table', 1),
(220, '2019_03_22_160249_create_imagenes_table', 1);

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
  `pedido_nombre_metodo_pago` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pedido_metodo_pago` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pedido_estado` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pedido_transaccion_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pedido_moneda_pago` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_actualizado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `user_id`, `pedido_dir`, `pedido_ref_venta`, `promocion_id`, `envio_id`, `pedido_nombre_metodo_pago`, `pedido_metodo_pago`, `pedido_estado`, `pedido_transaccion_id`, `pedido_moneda_pago`, `fecha_creado`, `fecha_actualizado`) VALUES
(1, 4, '519 Samson Station Apt. 343\nDiamondside, TN 44761-2461', '', 3, 2, '', '', '', '', '', '2019-05-08 17:24:18', NULL),
(2, 2, 'Cll 6b # 41-36', '', 3, 1, '', '', '', '', '', '2019-05-08 17:24:18', NULL),
(3, 3, '705 Kub Garden Suite 816\nJoannymouth, AR 70301-2020', '', 1, 2, '', '', '', '', '', '2019-05-08 17:24:18', NULL),
(4, 2, 'Cll 6b # 41-36', '', 1, 1, '', '', '', '', '', '2019-05-08 17:24:18', NULL),
(5, 3, '705 Kub Garden Suite 816\nJoannymouth, AR 70301-2020', '', 3, 2, '', '', '', '', '', '2019-05-08 17:24:18', NULL),
(6, 2, 'Cll 6b # 41-36', '', 3, 1, '', '', '', '', '', '2019-05-08 17:24:18', NULL),
(7, 6, '288 Kyla Highway\nEast Violachester, MA 61506', '', 3, 1, '', '', '', '', '', '2019-05-08 17:24:18', NULL),
(8, 5, '11579 Ruth Cape\nWalshfurt, VT 13168', '', 1, 2, '', '', '', '', '', '2019-05-08 17:24:18', NULL),
(9, 5, '11579 Ruth Cape\nWalshfurt, VT 13168', '', 1, 1, '', '', '', '', '', '2019-05-08 17:24:18', NULL),
(10, 4, '519 Samson Station Apt. 343\nDiamondside, TN 44761-2461', '', 2, 1, '', '', '', '', '', '2019-05-08 17:24:18', NULL),
(11, 1, 'Cll 6b # 41-36 La Nevada, Valledupar, Colombia', 'en espera', 2, 1, 'en espera', 'en espera', 'en espera', 'en espera', 'en espera', '2019-05-08 19:16:56', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `categoria_id` int(10) UNSIGNED NOT NULL,
  `producto_descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `fecha_creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_actualizado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `categoria_id`, `producto_descripcion`, `producto_tags`, `producto_ref`, `producto_imagen`, `producto_precio`, `promocion_id`, `producto_tallas`, `producto_colores`, `producto_tieneImgDescripcion`, `producto_cant`, `producto_estado`, `fecha_creado`, `fecha_actualizado`) VALUES
(1, 10, 'Nostrum non omnis eaque inventore qui cum.', 'televisor,cel,tablets,tablets,reloj', 'CUM3003', 'https://lorempixel.com/200/200/?93962', '40000.00', 2, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 1, 2, 1, '2019-05-08 17:24:18', NULL),
(2, 3, 'Iusto neque quas dolores.', 'ruedas,plasma,cargador,tennis,cel', 'QUIS4157', 'https://lorempixel.com/200/200/?36988', '50000.00', 3, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 1, 8, 1, '2019-05-08 17:24:18', NULL),
(3, 14, 'Qui maxime aperiam dolores non.', 'celular,cel,celular,celular,phone', 'EUM385', 'https://lorempixel.com/200/200/?91108', '50000.00', 2, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 0, 9, 1, '2019-05-08 17:24:18', NULL),
(4, 3, 'Ut molestiae dolores et illum qui aut voluptatem.', 'plasma,phone,cargador,ruedas,perlas', 'ET2690', 'https://lorempixel.com/200/200/?65567', '20000.00', 3, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 0, 0, 0, '2019-05-08 17:24:18', NULL),
(5, 12, 'Cum facere quo consequatur excepturi porro.', 'cel,joyas,perlas,reloj,ruedas', 'AUTEM982', 'https://lorempixel.com/200/200/?64056', '20000.00', 2, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 0, 5, 1, '2019-05-08 17:24:18', NULL),
(6, 11, 'Id commodi et nam.', 'reloj,pc,tennis,zapatos,reloj', 'QUIS5857', 'https://lorempixel.com/200/200/?62725', '40000.00', 3, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 0, 6, 1, '2019-05-08 17:24:18', NULL),
(7, 15, 'Eius vero atque eveniet a.', 'cel,cargador,perlas,plasma,plasma', 'QUIA5946', 'https://lorempixel.com/200/200/?28280', '30000.00', 3, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 0, 0, 0, '2019-05-08 17:24:18', NULL),
(8, 2, 'Dolore fuga ex dicta sed.', 'computadores,mause,smartphones,celular,zapatos', 'BEATAE3986', 'https://lorempixel.com/200/200/?51810', '30000.00', 1, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 0, 10, 1, '2019-05-08 17:24:18', NULL),
(9, 1, 'Aspernatur officia aliquid illo omnis non.', 'pc,perlas,portatiles,cargador,tennis', 'TENETUR2679', 'https://lorempixel.com/200/200/?61184', '50000.00', 1, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 0, 8, 1, '2019-05-08 17:24:19', NULL),
(10, 8, 'Rerum ea ducimus ut perferendis qui.', 'mause,televisor,televisor,ruedas,tablets', 'AUT1892', 'https://lorempixel.com/200/200/?28680', '20000.00', 3, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 1, 10, 1, '2019-05-08 17:24:19', NULL),
(11, 14, 'Nam ratione tenetur saepe quam a.', 'cargador,tennis,zapatos,cargador,portatiles', 'ASSUMENDA671', 'https://lorempixel.com/200/200/?82510', '40000.00', 1, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 0, 6, 1, '2019-05-08 17:24:19', NULL),
(12, 5, 'Et dicta et ea dolorem ut repellat ea.', 'tablets,plasma,phone,pc,plasma', 'DOLOREM3297', 'https://lorempixel.com/200/200/?30185', '30000.00', 2, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 1, 2, 1, '2019-05-08 17:24:19', NULL),
(13, 2, 'Repellendus vitae consequatur et.', 'tv,phone,cel,celular,phone', 'NEQUE875', 'https://lorempixel.com/200/200/?55536', '10000.00', 1, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 1, 6, 1, '2019-05-08 17:24:19', NULL),
(14, 13, 'Possimus quis dolor voluptate ducimus et.', 'tv,tv,tablets,cel,phone', 'QUIBUSDAM5394', 'https://lorempixel.com/200/200/?84995', '10000.00', 2, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 1, 5, 1, '2019-05-08 17:24:19', NULL),
(15, 8, 'Explicabo impedit incidunt velit veniam dolore.', 'televisor,cadenas,joyas,mause,tennis', 'NIHIL5560', 'https://lorempixel.com/200/200/?70682', '50000.00', 1, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 0, 7, 1, '2019-05-08 17:24:19', NULL),
(16, 12, 'Et officia minus ab debitis.', 'computadores,computadores,computadores,televisor,televisor', 'QUIS1563', 'https://lorempixel.com/200/200/?96000', '30000.00', 3, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 0, 8, 1, '2019-05-08 17:24:19', NULL),
(17, 1, 'Quaerat et sed sint dolore.', 'tablets,cadenas,plasma,plasma,pc', 'QUAS4193', 'https://lorempixel.com/200/200/?29332', '50000.00', 2, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 0, 3, 1, '2019-05-08 17:24:19', NULL),
(18, 9, 'Est praesentium est inventore laudantium.', 'computadores,plasma,reloj,cel,cadenas', 'CUPIDITATE6320', 'https://lorempixel.com/200/200/?55901', '30000.00', 2, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 0, 3, 1, '2019-05-08 17:24:19', NULL),
(19, 15, 'Quibusdam incidunt est praesentium libero et.', 'televisor,ruedas,pc,plasma,phone', 'NOSTRUM4700', 'https://lorempixel.com/200/200/?14132', '30000.00', 1, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 0, 10, 1, '2019-05-08 17:24:19', NULL),
(20, 4, 'Id ut sequi minima molestias pariatur qui dolore.', 'tennis,ruedas,computadores,cadenas,pc', 'DISTINCTIO4927', 'https://lorempixel.com/200/200/?29990', '40000.00', 1, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 0, 7, 1, '2019-05-08 17:24:19', NULL),
(21, 3, 'Ut sed optio ea veniam tempore officiis.', 'tablets,mause,cel,phone,smartphones', 'ESSE9224', 'https://lorempixel.com/200/200/?75021', '50000.00', 3, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 1, 9, 1, '2019-05-08 17:24:19', NULL),
(22, 11, 'At nostrum soluta nihil atque sit fugit.', 'mause,cadenas,cel,perlas,perlas', 'VELIT1047', 'https://lorempixel.com/200/200/?12185', '40000.00', 1, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 0, 4, 1, '2019-05-08 17:24:19', NULL),
(23, 14, 'Est deserunt atque molestias delectus.', 'ruedas,cargador,celular,zapatos,joyas', 'OFFICIA370', 'https://lorempixel.com/200/200/?86363', '30000.00', 3, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 1, 2, 1, '2019-05-08 17:24:19', NULL),
(24, 12, 'Illo eveniet repellat quam. Aut et fugit eius et.', 'plasma,zapatos,phone,smartphones,perlas', 'DICTA933', 'https://lorempixel.com/200/200/?18762', '50000.00', 3, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 1, 10, 1, '2019-05-08 17:24:19', NULL),
(25, 10, 'Ad voluptas suscipit aut ut aut non.', 'computadores,celular,celular,plasma,smartphones', 'HARUM1591', 'https://lorempixel.com/200/200/?19020', '10000.00', 2, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 1, 7, 1, '2019-05-08 17:24:19', NULL),
(26, 5, 'Et maiores enim ea alias molestias voluptatem ea.', 'computadores,celular,tennis,ruedas,phone', 'QUIA3424', 'https://lorempixel.com/200/200/?56678', '30000.00', 1, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 0, 2, 1, '2019-05-08 17:24:19', NULL),
(27, 13, 'Voluptatem libero esse neque magni doloribus.', 'tv,tv,smartphones,tablets,perlas', 'FUGIAT8098', 'https://lorempixel.com/200/200/?22755', '40000.00', 2, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 0, 6, 1, '2019-05-08 17:24:19', NULL),
(28, 10, 'Fugit est ipsam voluptates libero repellat.', 'portatiles,plasma,tv,portatiles,zapatos', 'ARCHITECTO4182', 'https://lorempixel.com/200/200/?55919', '40000.00', 1, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 1, 9, 1, '2019-05-08 17:24:19', NULL),
(29, 13, 'Porro enim laborum eligendi.', 'zapatos,perlas,tablets,joyas,televisor', 'DOLORES1401', 'https://lorempixel.com/200/200/?60352', '10000.00', 1, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 0, 8, 1, '2019-05-08 17:24:19', NULL),
(30, 10, 'Incidunt voluptas est et deleniti.', 'celular,portatiles,celular,zapatos,computadores', 'DOLOR718', 'https://lorempixel.com/200/200/?42597', '50000.00', 3, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 1, 9, 1, '2019-05-08 17:24:19', NULL),
(31, 10, 'Dicta dolore minima labore et aut iste id.', 'phone,tv,smartphones,cadenas,tablets', 'BEATAE5259', 'https://lorempixel.com/200/200/?33216', '10000.00', 3, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 1, 0, 0, '2019-05-08 17:24:19', NULL),
(32, 2, 'Repellendus quidem et quaerat ea distinctio.', 'phone,ruedas,cel,televisor,plasma', 'NESCIUNT1445', 'https://lorempixel.com/200/200/?23082', '10000.00', 3, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 0, 7, 1, '2019-05-08 17:24:19', NULL),
(33, 6, 'Nobis veritatis ut voluptas.', 'mause,televisor,plasma,plasma,cargador', 'EST6537', 'https://lorempixel.com/200/200/?56032', '40000.00', 1, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 1, 6, 1, '2019-05-08 17:24:19', NULL),
(34, 14, 'Rerum ea voluptatum eum dolores qui.', 'cel,tablets,computadores,celular,portatiles', 'VOLUPTATUM1953', 'https://lorempixel.com/200/200/?43217', '40000.00', 2, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 0, 5, 1, '2019-05-08 17:24:19', NULL),
(35, 13, 'Et hic et quidem pariatur iste.', 'joyas,joyas,mause,perlas,cargador', 'DOLORE4834', 'https://lorempixel.com/200/200/?73894', '50000.00', 3, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 1, 5, 1, '2019-05-08 17:24:19', NULL),
(36, 6, 'Earum fugit ad necessitatibus provident aliquid.', 'tablets,tennis,cadenas,tablets,cadenas', 'INVENTORE3374', 'https://lorempixel.com/200/200/?90142', '40000.00', 1, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 0, 2, 1, '2019-05-08 17:24:19', NULL),
(37, 13, 'Maxime quaerat quaerat neque qui porro itaque.', 'zapatos,reloj,tv,celular,tennis', 'ALIAS4863', 'https://lorempixel.com/200/200/?25766', '10000.00', 2, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 0, 10, 1, '2019-05-08 17:24:19', NULL),
(38, 8, 'Mollitia vitae delectus quod quia quia.', 'tablets,joyas,joyas,tablets,perlas', 'TENETUR1766', 'https://lorempixel.com/200/200/?24986', '20000.00', 2, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 1, 4, 1, '2019-05-08 17:24:19', NULL),
(39, 7, 'Officia quo ea ab ut.', 'tv,zapatos,zapatos,perlas,pc', 'DOLOREM3557', 'https://lorempixel.com/200/200/?25397', '10000.00', 2, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 1, 1, 1, '2019-05-08 17:24:19', NULL),
(40, 2, 'Beatae porro eos quo ut rerum.', 'cadenas,perlas,celular,cadenas,cargador', 'DESERUNT3987', 'https://lorempixel.com/200/200/?24231', '40000.00', 3, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 0, 3, 1, '2019-05-08 17:24:19', NULL),
(41, 15, 'Sit porro molestiae magni in.', 'cadenas,tennis,plasma,cargador,cel', 'QUI1210', 'https://lorempixel.com/200/200/?36167', '40000.00', 3, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 0, 10, 1, '2019-05-08 17:24:19', NULL),
(42, 1, 'Deserunt error aperiam sit aliquid.', 'phone,phone,plasma,cadenas,cargador', 'NEQUE4141', 'https://lorempixel.com/200/200/?39240', '40000.00', 2, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 0, 1, 1, '2019-05-08 17:24:19', NULL),
(43, 8, 'Aliquid totam et commodi quia dolorem qui vel.', 'plasma,cadenas,mause,phone,smartphones', 'VEL755', 'https://lorempixel.com/200/200/?40222', '20000.00', 2, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 0, 5, 1, '2019-05-08 17:24:19', NULL),
(44, 9, 'Eum aut hic est quod nemo impedit.', 'cadenas,tv,mause,smartphones,tablets', 'SAPIENTE9178', 'https://lorempixel.com/200/200/?40203', '30000.00', 3, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 1, 1, 1, '2019-05-08 17:24:19', NULL),
(45, 15, 'Et veritatis cum consequatur et.', 'cadenas,cargador,tennis,portatiles,plasma', 'CUPIDITATE928', 'https://lorempixel.com/200/200/?66831', '40000.00', 3, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 1, 9, 1, '2019-05-08 17:24:19', NULL),
(46, 3, 'Laborum repellendus esse molestiae id.', 'computadores,ruedas,phone,plasma,cargador', 'QUOD1252', 'https://lorempixel.com/200/200/?37418', '40000.00', 3, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 1, 1, 1, '2019-05-08 17:24:20', NULL),
(47, 1, 'Vero officiis nulla eos tempora voluptatem.', 'cargador,computadores,cadenas,tennis,cargador', 'FUGIAT1016', 'https://lorempixel.com/200/200/?44228', '30000.00', 1, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 1, 7, 1, '2019-05-08 17:24:20', NULL),
(48, 14, 'Neque doloremque sed asperiores.', 'ruedas,tennis,celular,cadenas,pc', 'TOTAM9861', 'https://lorempixel.com/200/200/?21883', '30000.00', 2, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 0, 7, 1, '2019-05-08 17:24:20', NULL),
(49, 3, 'Voluptas molestiae nihil deleniti est.', 'televisor,portatiles,televisor,tennis,reloj', 'QUO8450', 'https://lorempixel.com/200/200/?20704', '30000.00', 3, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 1, 3, 1, '2019-05-08 17:24:20', NULL),
(50, 1, 'Voluptatem consequatur corrupti eius sed est.', 'smartphones,smartphones,mause,tv,ruedas', 'IURE2763', 'https://lorempixel.com/200/200/?38004', '30000.00', 3, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 0, 3, 1, '2019-05-08 17:24:20', NULL);

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
  `fecha_creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_actualizado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `promociones`
--

INSERT INTO `promociones` (`id`, `promo_nombre`, `promo_tipo`, `promo_costo`, `promo_publicidad`, `promo_banner_publicidad`, `promo_inicio`, `promo_final`, `promo_numero_canjeo`, `promo_minimo_pedido`, `categoria_id`, `fecha_creado`, `fecha_actualizado`) VALUES
(1, 'Descuento # 1', 'descuento%', 10, 1, 'https://lorempixel.com/200/200/cats/?39226', '2019-01-01 01:00:00', '2019-12-31 00:00:00', 3, 50000, NULL, '2019-05-08 17:24:17', NULL),
(2, 'Descuento # 2', 'peso', 10000, 0, 'https://lorempixel.com/200/200/cats/?10580', '2019-01-01 01:00:00', '2019-12-31 00:00:00', 3, 50000, NULL, '2019-05-08 17:24:17', NULL),
(3, 'Descuento # 3', '2x1', 0, 1, 'https://lorempixel.com/200/200/cats/?78279', '2019-01-01 01:00:00', '2019-12-31 00:00:00', 3, 50000, NULL, '2019-05-08 17:24:17', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `rol_nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol_nombre`, `fecha_creado`) VALUES
(1, 'Admin', '2019-05-08 17:24:14'),
(2, 'Cliente', '2019-05-08 17:24:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `seccion_nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seccion_descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seccion_imagen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id`, `seccion_nombre`, `seccion_descripcion`, `seccion_imagen`, `fecha_creado`) VALUES
(1, 'tecnologias', 'Sección de articulos tecnologicos', 'celular.svg', '2019-05-08 17:24:14'),
(2, 'zapatos', 'Sección de venta de calzado', 'zapatos.svg', '2019-05-08 17:24:14'),
(3, 'joyas', 'Sección de venta de joyas', 'joyas.svg', '2019-05-08 17:24:14');

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
  `usuario_telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_pais` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuario_ciudad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuario_barrio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuario_direccion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_estado` tinyint(1) NOT NULL,
  `fecha_creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_actualizado` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `rol_id`, `usuario_nombre`, `usuario_apellido`, `usuario_cedula`, `usuario_telefono`, `email`, `usuario_pais`, `usuario_ciudad`, `usuario_barrio`, `usuario_direccion`, `password`, `usuario_estado`, `fecha_creado`, `fecha_actualizado`, `remember_token`) VALUES
(1, 1, 'Odannys', 'De La Cruz Calvo', '1065825573', '3107484079', 'el_odanis321@hotmail.com', 'Colombia', 'Valledupar', 'La Nevada', 'Cll 6b # 41-36', '$2y$10$3QK6y6.Ux7p7rzOQhrXibOFcejGtAG61VEh4ohDUZAu1VkdFANoSG', 1, '2019-05-08 17:24:14', NULL, NULL),
(2, 2, 'Carlos', 'De La Cruz Calvo', '1065825574', '3107484079', 'carlos321@hotmail.com', 'Colombia', 'Valledupar', 'La Nevada', 'Cll 6b # 41-36', '$2y$10$oPN8t3YKcSokDv.Gy4scPOCu9DDHW05YrJHZR8lY2YGbo/74WTgze', 1, '2019-05-08 17:24:15', NULL, NULL),
(3, 2, 'Pinkie', 'Von', '703483557', '436-550-5933 x195', 'frunolfsson@example.org', 'Armenia', 'New Ernestine', 'Domenico Estates', '705 Kub Garden Suite 816\nJoannymouth, AR 70301-2020', '$2y$10$Mh7D.dWE3O4r8Zvb1RjJRuxwvRLyilb8g14lLIsA5e32.JQAfY4wS', 1, '2019-05-08 17:26:33', NULL, 'xyIOq2zy6ghan1qo5JJkCRUDj05bBKhtC8GKufHN4eFS33inDZmx1cVdQQY8'),
(4, 2, 'Willa', 'Stiedemann', '866379683', '440.971.4307 x76680', 'schmidt.jean@example.org', 'Marshall Islands', 'South Jimmystad', 'Wisozk Streets', '519 Samson Station Apt. 343\nDiamondside, TN 44761-2461', '$2y$10$WwBAVos19Lop0Wggner2HuUyyLOIZZVAgGXt7Bqw2sWCiJHqIVef6', 0, '2019-05-08 17:24:16', NULL, NULL),
(5, 2, 'Alycia', 'Langworth', '260387379', '787.727.6679', 'stephanie35@example.com', 'United States of America', 'Lakinhaven', 'Zieme Village', '11579 Ruth Cape\nWalshfurt, VT 13168', '$2y$10$k4jLA3gY6iglDesxZ7/hmuF.0zu52jorYNM14.fBz0tIni6MYkg0y', 0, '2019-05-08 17:24:16', NULL, NULL),
(6, 2, 'Hans', 'Hilpert', '657966568', '(294) 545-0117 x48829', 'ubraun@example.net', 'Falkland Islands (Malvinas)', 'Miabury', 'Volkman Manors', '288 Kyla Highway\nEast Violachester, MA 61506', '$2y$10$MVoj4atE1GuB9JEXapwp8umNRllsJfBqzoLeVYdIOIFZcTNuvQ9JG', 1, '2019-05-08 17:24:17', NULL, NULL),
(7, 2, 'Stefanie', 'Green', '235622617', '+15364333910', 'skylar.trantow@example.org', 'Mexico', 'Bartonland', 'Dalton Burg', '48996 Hand Forge Suite 687\nPort Rickyside, IA 98557', '$2y$10$6.ue6lHyp7ovfvNDah28F.ztn73U0ddNMknv2VXVgYAykQ5BtRhPm', 0, '2019-05-08 17:24:17', NULL, NULL),
(10, 2, 'Jhon', 'Perez', '1065825321', '324325532', 'jhon@hotmail.com', 'Vacio', 'Vacio', 'Vacio', 'Vacio', '$2y$10$Va16zglMyfpyuXnJltQLT.ON3szBxevQrILFCrguP37xvCT4qJv8q', 1, '2019-05-08 18:37:36', NULL, 'Zl4V2iEHgL5oG1gi9Xz2SnOrwE1XUaszwYlmHQcDtke09vkIOKfNWNHdqxiI');

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
  ADD KEY `pedidos_envio_id_foreign` (`envio_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `productos_producto_descripcion_unique` (`producto_descripcion`),
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
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_usuario_cedula_unique` (`usuario_cedula`),
  ADD KEY `users_rol_id_foreign` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `envios`
--
ALTER TABLE `envios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
