-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-08-2019 a las 23:31:56
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
(1, 1, 'vitae', 'Occaecati asperiores libero nesciunt aut.', '2019-08-15 21:26:34', '2019-08-15 21:26:34'),
(2, 2, 'rem', 'Quidem qui sunt et.', '2019-08-15 21:26:34', '2019-08-15 21:26:34'),
(3, 1, 'quod', 'Rerum quis eum possimus voluptas.', '2019-08-15 21:26:34', '2019-08-15 21:26:34'),
(4, 1, 'quaerat', 'Quia necessitatibus ex sit est.', '2019-08-15 21:26:34', '2019-08-15 21:26:34'),
(5, 2, 'nihil', 'Ducimus ullam deleniti suscipit aut.', '2019-08-15 21:26:34', '2019-08-15 21:26:34'),
(6, 1, 'modi', 'Officiis sit repudiandae excepturi eius aut est.', '2019-08-15 21:26:34', '2019-08-15 21:26:34'),
(7, 3, 'magni', 'Enim laboriosam neque optio iure hic ratione.', '2019-08-15 21:26:34', '2019-08-15 21:26:34'),
(8, 1, 'non', 'Officiis voluptatibus fuga quia nihil maxime.', '2019-08-15 21:26:34', '2019-08-15 21:26:34'),
(9, 2, 'error', 'Voluptate optio ratione et accusamus sunt quis.', '2019-08-15 21:26:34', '2019-08-15 21:26:34'),
(10, 2, 'enim', 'Aut rem ex inventore ut quod consequuntur enim.', '2019-08-15 21:26:34', '2019-08-15 21:26:34'),
(11, 3, 'vero', 'Dicta nostrum nostrum distinctio.', '2019-08-15 21:26:34', '2019-08-15 21:26:34'),
(12, 2, 'in', 'Tempore sapiente adipisci libero atque.', '2019-08-15 21:26:34', '2019-08-15 21:26:34'),
(13, 2, 'fugit', 'Molestiae in ratione iste aut.', '2019-08-15 21:26:35', '2019-08-15 21:26:35'),
(14, 3, 'asperiores', 'Et sed sed consequatur dolor.', '2019-08-15 21:26:35', '2019-08-15 21:26:35'),
(15, 3, 'id', 'Nostrum quia nostrum aut voluptate.', '2019-08-15 21:26:35', '2019-08-15 21:26:35');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `nombre_completo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pais` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_postal` int(11) DEFAULT NULL,
  `defecto` tinyint(1) NOT NULL,
  `fecha_creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`id`, `user_id`, `nombre_completo`, `pais`, `estado`, `ciudad`, `direccion`, `telefono`, `codigo_postal`, `defecto`, `fecha_creado`, `fecha_actualizado`) VALUES
(1, 1, 'Odannys De La Cruz', 'Colombia', 'Cesar', 'Valledupar', 'Calle 6b # 41 - 36 La Nevada', '3043614864', 200001, 1, '2019-08-15 21:26:32', '2019-08-15 21:26:32'),
(2, 2, 'Ruben Gonzales', 'Colombia', 'Cesar', 'Valledupar', 'Calle 6b # 41 - 36 La Nevada', '3172660830', 200001, 1, '2019-08-15 21:26:32', '2019-08-15 21:26:32'),
(3, 3, 'Jose Meriño', 'Colombia', 'Cesar', 'Valledupar', 'Mz 15 casa 6b -  La Castellana', '3172660830', 200001, 1, '2019-08-15 21:26:32', '2019-08-15 21:26:32'),
(4, 4, 'Eduardo Lodico', 'Venezuela', 'Algún Lugar', 'Ni idea loco', 'Si no me se la ciudad, la dirección menos.', '3172660830', 20005, 1, '2019-08-15 21:26:33', '2019-08-15 21:26:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion_pedido`
--

CREATE TABLE `direccion_pedido` (
  `id` int(10) UNSIGNED NOT NULL,
  `pedido_id` int(10) UNSIGNED NOT NULL,
  `nombre_completo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pais` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telenofo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_postal` int(11) NOT NULL,
  `fecha_creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Domicilio', '2019-08-15 21:26:35', '2019-08-15 21:26:35'),
(2, 'Tienda fisica', '2019-08-15 21:26:35', '2019-08-15 21:26:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(10) UNSIGNED NOT NULL,
  `pais_id` int(10) UNSIGNED NOT NULL,
  `estado_nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `pais_id`, `estado_nombre`) VALUES
(1, 51, 'Ahuachapán'),
(2, 51, 'Cuscatlán'),
(3, 51, 'La Libertad'),
(4, 51, 'La Paz'),
(5, 51, 'San Miguel'),
(6, 51, 'San Salvador'),
(7, 51, 'Santa Ana'),
(8, 51, 'Sonsonate'),
(9, 137, 'Tegucigalpa'),
(10, 138, 'Santo Domingo'),
(11, 64, 'Ain'),
(12, 64, 'Haute-Savoie'),
(13, 64, 'Aisne'),
(14, 64, 'Allier'),
(15, 64, 'Alpes-de-Haute-Provence'),
(16, 64, 'Hautes-Alpes'),
(17, 64, 'Alpes-Maritimes'),
(18, 64, 'Ardèche'),
(19, 64, 'Ardennes'),
(20, 64, 'Ariège'),
(21, 64, 'Aube'),
(22, 64, 'Aude'),
(23, 64, 'Aveyron'),
(24, 64, 'Bouches-du-Rhône'),
(25, 64, 'Calvados'),
(26, 64, 'Cantal'),
(27, 64, 'Charente'),
(28, 64, 'Charente Maritime'),
(29, 64, 'Cher'),
(30, 64, 'Corrèze'),
(31, 64, 'Dordogne'),
(32, 64, 'Corse'),
(33, 64, 'Côte dOr'),
(34, 64, 'Saône et Loire'),
(35, 64, 'Côtes dArmor'),
(36, 64, 'Creuse'),
(37, 64, 'Doubs'),
(38, 64, 'Drôme'),
(39, 64, 'Eure'),
(40, 64, 'Eure-et-Loire'),
(41, 64, 'Finistère'),
(42, 64, 'Gard'),
(43, 64, 'Haute-Garonne'),
(44, 64, 'Gers'),
(45, 64, 'Gironde'),
(46, 64, 'Hérault'),
(47, 64, 'Ille et Vilaine'),
(48, 64, 'Indre'),
(49, 64, 'Indre-et-Loire'),
(50, 64, 'Isère'),
(51, 64, 'Jura'),
(52, 64, 'Landes'),
(53, 64, 'Loir-et-Cher'),
(54, 64, 'Loire'),
(55, 64, 'Rhône'),
(56, 64, 'Haute-Loire'),
(57, 64, 'Loire Atlantique'),
(58, 64, 'Loiret'),
(59, 64, 'Lot'),
(60, 64, 'Lot-et-Garonne'),
(61, 64, 'Lozère'),
(62, 64, 'Maine et Loire'),
(63, 64, 'Manche'),
(64, 64, 'Marne'),
(65, 64, 'Haute-Marne'),
(66, 64, 'Mayenne'),
(67, 64, 'Meurthe-et-Moselle'),
(68, 64, 'Meuse'),
(69, 64, 'Morbihan'),
(70, 64, 'Moselle'),
(71, 64, 'Nièvre'),
(72, 64, 'Nord'),
(73, 64, 'Oise'),
(74, 64, 'Orne'),
(75, 64, 'Pas-de-Calais'),
(76, 64, 'Puy-de-Dôme'),
(77, 64, 'Pyrénées-Atlantiques'),
(78, 64, 'Hautes-Pyrénées'),
(79, 64, 'Pyrénées-Orientales'),
(80, 64, 'Bas Rhin'),
(81, 64, 'Haut Rhin'),
(82, 64, 'Haute-Saône'),
(83, 64, 'Sarthe'),
(84, 64, 'Savoie'),
(85, 64, 'Paris'),
(86, 64, 'Seine-Maritime'),
(87, 64, 'Seine-et-Marne'),
(88, 64, 'Yvelines'),
(89, 64, 'Deux-Sèvres'),
(90, 64, 'Somme'),
(91, 64, 'Tarn'),
(92, 64, 'Tarn-et-Garonne'),
(93, 64, 'Var'),
(94, 64, 'Vaucluse'),
(95, 64, 'Vendée'),
(96, 64, 'Vienne'),
(97, 64, 'Haute-Vienne'),
(98, 64, 'Vosges'),
(99, 64, 'Yonne'),
(100, 64, 'Territoire de Belfort'),
(101, 64, 'Essonne'),
(102, 64, 'Hauts-de-Seine'),
(103, 64, 'Seine-Saint-Denis'),
(104, 64, 'Val-de-Marne'),
(105, 64, 'Val-dOise'),
(106, 28, 'Las Palmas'),
(107, 28, 'Soria'),
(108, 28, 'Palencia'),
(109, 28, 'Zamora'),
(110, 28, 'Cádiz'),
(111, 28, 'Navarra'),
(112, 28, 'Ourense'),
(113, 28, 'Segovia'),
(114, 28, 'Guipúzcoa'),
(115, 28, 'Ciudad Real'),
(116, 28, 'Vizcaya'),
(117, 28, 'Álava'),
(118, 28, 'A Coruña'),
(119, 28, 'Cantabria'),
(120, 28, 'Almería'),
(121, 28, 'Zaragoza'),
(122, 28, 'Santa Cruz de Tenerife'),
(123, 28, 'Cáceres'),
(124, 28, 'Guadalajara'),
(125, 28, 'Ávila'),
(126, 28, 'Toledo'),
(127, 28, 'Castellón'),
(128, 28, 'Tarragona'),
(129, 28, 'Lugo'),
(130, 28, 'La Rioja'),
(131, 28, 'Ceuta'),
(132, 28, 'Murcia'),
(133, 28, 'Salamanca'),
(134, 28, 'Valladolid'),
(135, 28, 'Jaén'),
(136, 28, 'Girona'),
(137, 28, 'Granada'),
(138, 28, 'Alacant'),
(139, 28, 'Córdoba'),
(140, 28, 'Albacete'),
(141, 28, 'Cuenca'),
(142, 28, 'Pontevedra'),
(143, 28, 'Teruel'),
(144, 28, 'Melilla'),
(145, 28, 'Barcelona'),
(146, 28, 'Badajoz'),
(147, 28, 'Madrid'),
(148, 28, 'Sevilla'),
(149, 28, 'València'),
(150, 28, 'Huelva'),
(151, 28, 'Lleida'),
(152, 28, 'León'),
(153, 28, 'Illes Balears'),
(154, 28, 'Burgos'),
(155, 28, 'Huesca'),
(156, 28, 'Asturias'),
(157, 28, 'Málaga'),
(158, 48, 'Aveiro'),
(159, 48, 'Beja'),
(160, 48, 'Braga'),
(161, 48, 'Braganca'),
(162, 48, 'Castelo Branco'),
(163, 48, 'Coimbra'),
(164, 48, 'Evora'),
(165, 48, 'Faro'),
(166, 48, 'Madeira'),
(167, 48, 'Guarda'),
(168, 48, 'Leiria'),
(169, 48, 'Lisboa'),
(170, 48, 'Portalegre'),
(171, 48, 'Porto'),
(172, 48, 'Santarem'),
(173, 48, 'Setubal'),
(174, 48, 'Viana do Castelo'),
(175, 48, 'Vila Real'),
(176, 48, 'Viseu'),
(177, 48, 'Azores'),
(178, 55, 'Armed Forces Americas'),
(179, 55, 'Armed Forces Europe'),
(180, 55, 'Alaska'),
(181, 55, 'Alabama'),
(182, 55, 'Armed Forces Pacific'),
(183, 55, 'Arkansas'),
(184, 55, 'American Samoa'),
(185, 55, 'Arizona'),
(186, 55, 'California'),
(187, 55, 'Colorado'),
(188, 55, 'Connecticut'),
(189, 55, 'District of Columbia'),
(190, 55, 'Delaware'),
(191, 55, 'Florida'),
(192, 55, 'Federated Estadoss of Micronesia'),
(193, 55, 'Georgia'),
(194, 55, 'Hawaii'),
(195, 55, 'Iowa'),
(196, 55, 'Idaho'),
(197, 55, 'Illinois'),
(198, 55, 'Indiana'),
(199, 55, 'Kansas'),
(200, 55, 'Kentucky'),
(201, 55, 'Louisiana'),
(202, 55, 'Massachusetts'),
(203, 55, 'Maryland'),
(204, 55, 'Maine'),
(205, 55, 'Marshall Islands'),
(206, 55, 'Michigan'),
(207, 55, 'Minnesota'),
(208, 55, 'Missouri'),
(209, 55, 'Northern Mariana Islands'),
(210, 55, 'Mississippi'),
(211, 55, 'Montana'),
(212, 55, 'North Carolina'),
(213, 55, 'North Dakota'),
(214, 55, 'Nebraska'),
(215, 55, 'New Hampshire'),
(216, 55, 'New Jersey'),
(217, 55, 'New Mexico'),
(218, 55, 'Nevada'),
(219, 55, 'New York'),
(220, 55, 'Ohio'),
(221, 55, 'Oklahoma'),
(222, 55, 'Oregon'),
(223, 55, 'Pennsylvania'),
(224, 246, 'Puerto Rico'),
(225, 55, 'Palau'),
(226, 55, 'Rhode Island'),
(227, 55, 'South Carolina'),
(228, 55, 'South Dakota'),
(229, 55, 'Tennessee'),
(230, 55, 'Texas'),
(231, 55, 'Utah'),
(232, 55, 'Virginia'),
(233, 55, 'Virgin Islands'),
(234, 55, 'Vermont'),
(235, 55, 'Washington'),
(236, 55, 'West Virginia'),
(237, 55, 'Wisconsin'),
(238, 55, 'Wyoming'),
(239, 89, 'Amazonas'),
(240, 89, 'Ancash'),
(241, 89, 'Apurímac'),
(242, 89, 'Arequipa'),
(243, 89, 'Ayacucho'),
(244, 89, 'Cajamarca'),
(245, 89, 'Callao'),
(246, 89, 'Cusco'),
(247, 89, 'Huancavelica'),
(248, 89, 'Huánuco'),
(249, 89, 'Ica'),
(250, 89, 'Junín'),
(251, 89, 'La Libertad'),
(252, 89, 'Lambayeque'),
(253, 89, 'Lima'),
(254, 89, 'Loreto'),
(255, 89, 'Madre de Dios'),
(256, 89, 'Moquegua'),
(257, 89, 'Pasco'),
(258, 89, 'Piura'),
(259, 89, 'Puno'),
(260, 89, 'San Martín'),
(261, 89, 'Tacna'),
(262, 89, 'Tumbes'),
(263, 89, 'Ucayali'),
(264, 110, 'Alto Paraná'),
(265, 110, 'Amambay'),
(266, 110, 'Boquerón'),
(267, 110, 'Caaguazú'),
(268, 110, 'Caazapá'),
(269, 110, 'Central'),
(270, 110, 'Concepción'),
(271, 110, 'Cordillera'),
(272, 110, 'Guairá'),
(273, 110, 'Itapúa'),
(274, 110, 'Misiones'),
(275, 110, 'Neembucú'),
(276, 110, 'Paraguarí'),
(277, 110, 'Presidente Hayes'),
(278, 110, 'San Pedro'),
(279, 110, 'Alto Paraguay'),
(280, 110, 'Canindeyú'),
(281, 110, 'Chaco'),
(282, 111, 'Artigas'),
(283, 111, 'Canelones'),
(284, 111, 'Cerro Largo'),
(285, 111, 'Colonia'),
(286, 111, 'Durazno'),
(287, 111, 'Flores'),
(288, 111, 'Florida'),
(289, 111, 'Lavalleja'),
(290, 111, 'Maldonado'),
(291, 111, 'Montevideo'),
(292, 111, 'Paysandú'),
(293, 111, 'Río Negro'),
(294, 111, 'Rivera'),
(295, 111, 'Rocha'),
(296, 111, 'Salto'),
(297, 111, 'San José'),
(298, 111, 'Soriano'),
(299, 111, 'Tacuarembó'),
(300, 111, 'Treinta y Tres'),
(301, 81, 'Valparaíso'),
(302, 81, 'Aisén del General Carlos Ibánez del Campo'),
(303, 81, 'Antofagasta'),
(304, 81, 'Araucanía'),
(305, 81, 'Atacama'),
(306, 81, 'Bío-Bío'),
(307, 81, 'Coquimbo'),
(308, 81, 'Libertador General Bernardo OHiggins'),
(309, 81, 'Los Lagos'),
(310, 81, 'Magallanes y de la Antártica Chilena'),
(311, 81, 'Maule'),
(312, 81, 'Region Metropolitana'),
(313, 81, 'Tarapacá'),
(314, 185, 'Alta Verapaz'),
(315, 185, 'Baja Verapaz'),
(316, 185, 'Chimaltenango'),
(317, 185, 'Chiquimula'),
(318, 185, 'El Progreso'),
(319, 185, 'Escuintla'),
(320, 185, 'Guatemala'),
(321, 185, 'Huehuetenango'),
(322, 185, 'Izabal'),
(323, 185, 'Jalapa'),
(324, 185, 'Jutiapa'),
(325, 185, 'Petén'),
(326, 185, 'Quetzaltenango'),
(327, 185, 'Quiché'),
(328, 185, 'Retalhuleu'),
(329, 185, 'Sacatepéquez'),
(330, 185, 'San Marcos'),
(331, 185, 'Santa Rosa'),
(332, 185, 'Sololá'),
(333, 185, 'Suchitepequez'),
(334, 185, 'Totonicapán'),
(335, 185, 'Zacapa'),
(336, 82, 'Amazonas'),
(337, 82, 'Antioquia'),
(338, 82, 'Arauca'),
(339, 82, 'Atlántico'),
(340, 82, 'Caquetá'),
(341, 82, 'Cauca'),
(342, 82, 'César'),
(343, 82, 'Chocó'),
(344, 82, 'Córdoba'),
(345, 82, 'Guaviare'),
(346, 82, 'Guainía'),
(347, 82, 'Huila'),
(348, 82, 'La Guajira'),
(349, 82, 'Meta'),
(350, 82, 'Narino'),
(351, 82, 'Norte de Santander'),
(352, 82, 'Putumayo'),
(353, 82, 'Quindío'),
(354, 82, 'Risaralda'),
(355, 82, 'San Andrés y Providencia'),
(356, 82, 'Santander'),
(357, 82, 'Sucre'),
(358, 82, 'Tolima'),
(359, 82, 'Valle del Cauca'),
(360, 82, 'Vaupés'),
(361, 82, 'Vichada'),
(362, 82, 'Casanare'),
(363, 82, 'Cundinamarca'),
(364, 82, 'Bogotá'),
(365, 82, 'Caldas'),
(366, 82, 'Magdalena'),
(367, 42, 'Aguascalientes'),
(368, 42, 'Baja California'),
(369, 42, 'Baja California Sur'),
(370, 42, 'Campeche'),
(371, 42, 'Chiapas'),
(372, 42, 'Chihuahua'),
(373, 42, 'Coahuila de Zaragoza'),
(374, 42, 'Colima'),
(375, 42, 'Distrito Federal'),
(376, 42, 'Durango'),
(377, 42, 'Guanajuato'),
(378, 42, 'Guerrero'),
(379, 42, 'Hidalgo'),
(380, 42, 'Jalisco'),
(381, 42, 'México'),
(382, 42, 'Michoacán de Ocampo'),
(383, 42, 'Morelos'),
(384, 42, 'Nayarit'),
(385, 42, 'Nuevo León'),
(386, 42, 'Oaxaca'),
(387, 42, 'Puebla'),
(388, 42, 'Querétaro de Arteaga'),
(389, 42, 'Quintana Roo'),
(390, 42, 'San Luis Potosí'),
(391, 42, 'Sinaloa'),
(392, 42, 'Sonora'),
(393, 42, 'Tabasco'),
(394, 42, 'Tamaulipas'),
(395, 42, 'Tlaxcala'),
(396, 42, 'Veracruz-Llave'),
(397, 42, 'Yucatán'),
(398, 42, 'Zacatecas'),
(399, 124, 'Bocas del Toro'),
(400, 124, 'Chiriquí'),
(401, 124, 'Coclé'),
(402, 124, 'Colón'),
(403, 124, 'Darién'),
(404, 124, 'Herrera'),
(405, 124, 'Los Santos'),
(406, 124, 'Panamá'),
(407, 124, 'San Blas'),
(408, 124, 'Veraguas'),
(409, 123, 'Chuquisaca'),
(410, 123, 'Cochabamba'),
(411, 123, 'El Beni'),
(412, 123, 'La Paz'),
(413, 123, 'Oruro'),
(414, 123, 'Pando'),
(415, 123, 'Potosí'),
(416, 123, 'Santa Cruz'),
(417, 123, 'Tarija'),
(418, 36, 'Alajuela'),
(419, 36, 'Cartago'),
(420, 36, 'Guanacaste'),
(421, 36, 'Heredia'),
(422, 36, 'Limón'),
(423, 36, 'Puntarenas'),
(424, 36, 'San José'),
(425, 103, 'Galápagos'),
(426, 103, 'Azuay'),
(427, 103, 'Bolívar'),
(428, 103, 'Canar'),
(429, 103, 'Carchi'),
(430, 103, 'Chimborazo'),
(431, 103, 'Cotopaxi'),
(432, 103, 'El Oro'),
(433, 103, 'Esmeraldas'),
(434, 103, 'Guayas'),
(435, 103, 'Imbabura'),
(436, 103, 'Loja'),
(437, 103, 'Los Ríos'),
(438, 103, 'Manabí'),
(439, 103, 'Morona-Santiago'),
(440, 103, 'Pastaza'),
(441, 103, 'Pichincha'),
(442, 103, 'Tungurahua'),
(443, 103, 'Zamora-Chinchipe'),
(444, 103, 'Sucumbíos'),
(445, 103, 'Napo'),
(446, 103, 'Orellana'),
(447, 5, 'Buenos Aires'),
(448, 5, 'Catamarca'),
(449, 5, 'Chaco'),
(450, 5, 'Chubut'),
(451, 5, 'Córdoba'),
(452, 5, 'Corrientes'),
(453, 5, 'Distrito Federal'),
(454, 5, 'Entre Ríos'),
(455, 5, 'Formosa'),
(456, 5, 'Jujuy'),
(457, 5, 'La Pampa'),
(458, 5, 'La Rioja'),
(459, 5, 'Mendoza'),
(460, 5, 'Misiones'),
(461, 5, 'Neuquén'),
(462, 5, 'Río Negro'),
(463, 5, 'Salta'),
(464, 5, 'San Juan'),
(465, 5, 'San Luis'),
(466, 5, 'Santa Cruz'),
(467, 5, 'Santa Fe'),
(468, 5, 'Santiago del Estero'),
(469, 5, 'Tierra del Fuego'),
(470, 5, 'Tucumán'),
(471, 95, 'Amazonas'),
(472, 95, 'Anzoategui'),
(473, 95, 'Apure'),
(474, 95, 'Aragua'),
(475, 95, 'Barinas'),
(476, 95, 'Bolívar'),
(477, 95, 'Carabobo'),
(478, 95, 'Cojedes'),
(479, 95, 'Delta Amacuro'),
(480, 95, 'Falcón'),
(481, 95, 'Guárico'),
(482, 95, 'Lara'),
(483, 95, 'Mérida'),
(484, 95, 'Miranda'),
(485, 95, 'Monagas'),
(486, 95, 'Nueva Esparta'),
(487, 95, 'Portuguesa'),
(488, 95, 'Sucre'),
(489, 95, 'Táchira'),
(490, 95, 'Trujillo'),
(491, 95, 'Yaracuy'),
(492, 95, 'Zulia'),
(493, 95, 'Dependencias Federales'),
(494, 95, 'Distrito Federal'),
(495, 95, 'Vargas'),
(496, 209, 'Boaco'),
(497, 209, 'Carazo'),
(498, 209, 'Chinandega'),
(499, 209, 'Chontales'),
(500, 209, 'Estelí'),
(501, 209, 'Granada'),
(502, 209, 'Jinotega'),
(503, 209, 'León'),
(504, 209, 'Madriz'),
(505, 209, 'Managua'),
(506, 209, 'Masaya'),
(507, 209, 'Matagalpa'),
(508, 209, 'Nueva Segovia'),
(509, 209, 'Rio San Juan'),
(510, 209, 'Rivas'),
(511, 209, 'Zelaya'),
(512, 113, 'Pinar del Rio'),
(513, 113, 'Ciudad de la Habana'),
(514, 113, 'Matanzas'),
(515, 113, 'Isla de la Juventud'),
(516, 113, 'Camaguey'),
(517, 113, 'Ciego de Avila'),
(518, 113, 'Cienfuegos'),
(519, 113, 'Granma'),
(520, 113, 'Guantanamo'),
(521, 113, 'La Habana'),
(522, 113, 'Holguin'),
(523, 113, 'Las Tunas'),
(524, 113, 'Sancti Spiritus'),
(525, 113, 'Santiago de Cuba'),
(526, 113, 'Villa Clara'),
(527, 12, 'Acre'),
(528, 12, 'Alagoas'),
(529, 12, 'Amapa'),
(530, 12, 'Amazonas'),
(531, 12, 'Bahia'),
(532, 12, 'Ceara'),
(533, 12, 'Distrito Federal'),
(534, 12, 'Espirito Santo'),
(535, 12, 'Mato Grosso do Sul'),
(536, 12, 'Maranhao'),
(537, 12, 'Mato Grosso'),
(538, 12, 'Minas Gerais'),
(539, 12, 'Para'),
(540, 12, 'Paraiba'),
(541, 12, 'Parana'),
(542, 12, 'Piaui'),
(543, 12, 'Rio de Janeiro'),
(544, 12, 'Rio Grande do Norte'),
(545, 12, 'Rio Grande do Sul'),
(546, 12, 'Rondonia'),
(547, 12, 'Roraima'),
(548, 12, 'Santa Catarina'),
(549, 12, 'Sao Paulo'),
(550, 12, 'Sergipe'),
(551, 12, 'Goias'),
(552, 12, 'Pernambuco'),
(553, 12, 'Tocantins'),
(554, 35, 'Anhui'),
(555, 35, 'Zhejiang'),
(556, 35, 'Jiangxi'),
(557, 35, 'Jiangsu'),
(558, 35, 'Jilin'),
(559, 35, 'Qinghai'),
(560, 35, 'Fujian'),
(561, 35, 'Heilongjiang'),
(562, 35, 'Henan'),
(563, 35, 'Hebei'),
(564, 35, 'Hunan'),
(565, 35, 'Hubei'),
(566, 35, 'Xinjiang'),
(567, 35, 'Xizang'),
(568, 35, 'Gansu'),
(569, 35, 'Guangxi'),
(570, 35, 'Guizhou'),
(571, 35, 'Liaoning'),
(572, 35, 'Nei Mongol'),
(573, 35, 'Ningxia'),
(574, 35, 'Beijing'),
(575, 35, 'Shanghai'),
(576, 35, 'Shanxi'),
(577, 35, 'Shandong'),
(578, 35, 'Shaanxi'),
(579, 35, 'Sichuan'),
(580, 35, 'Tianjin'),
(581, 35, 'Yunnan'),
(582, 35, 'Guangdong'),
(583, 35, 'Hainan'),
(584, 35, 'Chongqing'),
(585, 32, 'Newfoundland'),
(586, 32, 'Nova Scotia'),
(587, 32, 'Prince Edward Island'),
(588, 32, 'New Brunswick'),
(589, 32, 'Quebec'),
(590, 32, 'Ontario'),
(591, 32, 'Manitoba'),
(592, 32, 'Saskatchewan'),
(593, 32, 'Alberta'),
(594, 32, 'British Columbia'),
(595, 32, 'Nunavut'),
(596, 32, 'Northwest Territories'),
(597, 32, 'Yukon Territory'),
(598, 138, 'Duarte'),
(599, 138, 'Puerto Plata'),
(600, 138, 'Valverde'),
(601, 138, 'María Trinidad Sánchez'),
(602, 138, 'Azua'),
(603, 138, 'Santiago'),
(604, 138, 'San Cristóbal'),
(605, 138, 'Peravia'),
(606, 138, 'Elías Piña'),
(607, 138, 'Barahona'),
(608, 138, 'Monte Plata'),
(609, 138, 'Salcedo'),
(610, 138, 'La Altagracia'),
(611, 138, 'San Juan'),
(612, 138, 'Monseñor Nouel'),
(613, 138, 'Monte Cristi'),
(614, 138, 'Espaillat'),
(615, 138, 'Sánchez Ramírez'),
(616, 138, 'La Vega'),
(617, 138, 'San Pedro de Macorís'),
(618, 138, 'Independencia'),
(619, 138, 'Dajabón'),
(620, 138, 'Baoruco'),
(621, 138, 'El Seibo'),
(622, 138, 'Hato Mayor'),
(623, 138, 'La Romana'),
(624, 138, 'Pedernales'),
(625, 138, 'Samaná'),
(626, 138, 'Santiago Rodríguez'),
(627, 138, 'San José de Ocoa'),
(628, 35, 'Schanghai'),
(629, 35, 'Hongkong'),
(630, 35, 'Neimenggu'),
(631, 35, 'Aomen'),
(632, 82, 'Bolivar'),
(633, 82, 'Boyacá');

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
(1, 5, '1562990851_03 p Mi band 3 1.jpg'),
(2, 9, '1562990851_03 p Mi band 3 1.jpg'),
(3, 4, '1562990851_03 p Mi band 3 1.jpg'),
(4, 2, '1562990851_03 p Mi band 3 1.jpg'),
(5, 7, '1562990851_03 p Mi band 3 1.jpg'),
(6, 4, '1562990851_03 p Mi band 3 1.jpg'),
(7, 10, '1562990851_03 p Mi band 3 1.jpg'),
(8, 2, '1562990851_03 p Mi band 3 1.jpg'),
(9, 5, '1562990851_03 p Mi band 3 1.jpg'),
(10, 9, '1562990851_03 p Mi band 3 1.jpg'),
(11, 9, '1562990851_03 p Mi band 3 1.jpg'),
(12, 4, '1562990851_03 p Mi band 3 1.jpg'),
(13, 1, '1562990851_03 p Mi band 3 1.jpg'),
(14, 10, '1562990851_03 p Mi band 3 1.jpg'),
(15, 7, '1562990851_03 p Mi band 3 1.jpg'),
(16, 2, '1562990851_03 p Mi band 3 1.jpg'),
(17, 8, '1562990851_03 p Mi band 3 1.jpg'),
(18, 7, '1562990851_03 p Mi band 3 1.jpg'),
(19, 4, '1562990851_03 p Mi band 3 1.jpg'),
(20, 7, '1562990851_03 p Mi band 3 1.jpg'),
(21, 10, '1562990851_03 p Mi band 3 1.jpg'),
(22, 6, '1562990851_03 p Mi band 3 1.jpg'),
(23, 7, '1562990851_03 p Mi band 3 1.jpg'),
(24, 4, '1562990851_03 p Mi band 3 1.jpg'),
(25, 3, '1562990851_03 p Mi band 3 1.jpg'),
(26, 1, '1562990851_03 p Mi band 3 1.jpg'),
(27, 8, '1562990851_03 p Mi band 3 1.jpg'),
(28, 9, '1562990851_03 p Mi band 3 1.jpg'),
(29, 7, '1562990851_03 p Mi band 3 1.jpg'),
(30, 7, '1562990851_03 p Mi band 3 1.jpg'),
(31, 5, '1562990851_03 p Mi band 3 1.jpg'),
(32, 3, '1562990851_03 p Mi band 3 1.jpg'),
(33, 9, '1562990851_03 p Mi band 3 1.jpg'),
(34, 6, '1562990851_03 p Mi band 3 1.jpg'),
(35, 10, '1562990851_03 p Mi band 3 1.jpg'),
(36, 1, '1562990851_03 p Mi band 3 1.jpg'),
(37, 5, '1562990851_03 p Mi band 3 1.jpg'),
(38, 8, '1562990851_03 p Mi band 3 1.jpg'),
(39, 1, '1562990851_03 p Mi band 3 1.jpg'),
(40, 3, '1562990851_03 p Mi band 3 1.jpg'),
(41, 7, '1562990851_03 p Mi band 3 1.jpg'),
(42, 2, '1562990851_03 p Mi band 3 1.jpg'),
(43, 7, '1562990851_03 p Mi band 3 1.jpg'),
(44, 7, '1562990851_03 p Mi band 3 1.jpg'),
(45, 2, '1562990851_03 p Mi band 3 1.jpg'),
(46, 6, '1562990851_03 p Mi band 3 1.jpg'),
(47, 2, '1562990851_03 p Mi band 3 1.jpg'),
(48, 4, '1562990851_03 p Mi band 3 1.jpg'),
(49, 10, '1562990851_03 p Mi band 3 1.jpg'),
(50, 4, '1562990851_03 p Mi band 3 1.jpg'),
(51, 1, '1562990851_03 p Mi band 3 1.jpg'),
(52, 5, '1562990851_03 p Mi band 3 1.jpg'),
(53, 3, '1562990851_03 p Mi band 3 1.jpg'),
(54, 1, '1562990851_03 p Mi band 3 1.jpg'),
(55, 3, '1562990851_03 p Mi band 3 1.jpg'),
(56, 8, '1562990851_03 p Mi band 3 1.jpg'),
(57, 2, '1562990851_03 p Mi band 3 1.jpg'),
(58, 2, '1562990851_03 p Mi band 3 1.jpg'),
(59, 6, '1562990851_03 p Mi band 3 1.jpg'),
(60, 4, '1562990851_03 p Mi band 3 1.jpg'),
(61, 9, '1562990851_03 p Mi band 3 1.jpg'),
(62, 6, '1562990851_03 p Mi band 3 1.jpg'),
(63, 2, '1562990851_03 p Mi band 3 1.jpg'),
(64, 4, '1562990851_03 p Mi band 3 1.jpg'),
(65, 5, '1562990851_03 p Mi band 3 1.jpg'),
(66, 9, '1562990851_03 p Mi band 3 1.jpg'),
(67, 5, '1562990851_03 p Mi band 3 1.jpg'),
(68, 8, '1562990851_03 p Mi band 3 1.jpg'),
(69, 9, '1562990851_03 p Mi band 3 1.jpg'),
(70, 1, '1562990851_03 p Mi band 3 1.jpg'),
(71, 7, '1562990851_03 p Mi band 3 1.jpg'),
(72, 8, '1562990851_03 p Mi band 3 1.jpg'),
(73, 7, '1562990851_03 p Mi band 3 1.jpg'),
(74, 4, '1562990851_03 p Mi band 3 1.jpg'),
(75, 9, '1562990851_03 p Mi band 3 1.jpg'),
(76, 5, '1562990851_03 p Mi band 3 1.jpg'),
(77, 3, '1562990851_03 p Mi band 3 1.jpg'),
(78, 9, '1562990851_03 p Mi band 3 1.jpg'),
(79, 8, '1562990851_03 p Mi band 3 1.jpg'),
(80, 9, '1562990851_03 p Mi band 3 1.jpg'),
(81, 7, '1562990851_03 p Mi band 3 1.jpg'),
(82, 9, '1562990851_03 p Mi band 3 1.jpg'),
(83, 6, '1562990851_03 p Mi band 3 1.jpg'),
(84, 10, '1562990851_03 p Mi band 3 1.jpg'),
(85, 8, '1562990851_03 p Mi band 3 1.jpg'),
(86, 1, '1562990851_03 p Mi band 3 1.jpg'),
(87, 6, '1562990851_03 p Mi band 3 1.jpg'),
(88, 6, '1562990851_03 p Mi band 3 1.jpg'),
(89, 2, '1562990851_03 p Mi band 3 1.jpg'),
(90, 3, '1562990851_03 p Mi band 3 1.jpg'),
(91, 4, '1562990851_03 p Mi band 3 1.jpg'),
(92, 1, '1562990851_03 p Mi band 3 1.jpg'),
(93, 6, '1562990851_03 p Mi band 3 1.jpg'),
(94, 6, '1562990851_03 p Mi band 3 1.jpg'),
(95, 8, '1562990851_03 p Mi band 3 1.jpg'),
(96, 3, '1562990851_03 p Mi band 3 1.jpg'),
(97, 7, '1562990851_03 p Mi band 3 1.jpg'),
(98, 9, '1562990851_03 p Mi band 3 1.jpg'),
(99, 6, '1562990851_03 p Mi band 3 1.jpg'),
(100, 6, '1562990851_03 p Mi band 3 1.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(10) UNSIGNED NOT NULL,
  `marca_nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca_descripcion` mediumtext COLLATE utf8mb4_unicode_ci,
  `marca_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `marca_nombre`, `marca_descripcion`, `marca_logo`, `fecha_creado`, `fecha_actualizado`) VALUES
(1, 'Marca_477', 'Qui rerum id deleniti.', 'marca.jpg', '2019-08-15 21:26:36', '2019-08-15 21:26:36'),
(2, 'Marca_968', 'Nulla quibusdam velit incidunt voluptas.', 'marca.jpg', '2019-08-15 21:26:36', '2019-08-15 21:26:36'),
(3, 'Marca_511', 'Facilis consequuntur aut voluptas eveniet.', 'marca.jpg', '2019-08-15 21:26:36', '2019-08-15 21:26:36'),
(4, 'Marca_913', 'Ab nam molestias dolores itaque.', 'marca.jpg', '2019-08-15 21:26:36', '2019-08-15 21:26:36'),
(5, 'Marca_679', 'Eum sunt minima non cupiditate quo possimus.', 'marca.jpg', '2019-08-15 21:26:36', '2019-08-15 21:26:36'),
(6, 'Marca_230', 'Asperiores rerum et odio.', 'marca.jpg', '2019-08-15 21:26:36', '2019-08-15 21:26:36'),
(7, 'Marca_407', 'Quis sed tempore quo maiores aut sint provident.', 'marca.jpg', '2019-08-15 21:26:36', '2019-08-15 21:26:36'),
(8, 'Marca_263', 'Repudiandae rem unde eligendi sunt ipsam sunt.', 'marca.jpg', '2019-08-15 21:26:36', '2019-08-15 21:26:36'),
(9, 'Marca_466', 'Pariatur aut laudantium qui omnis ut qui quia.', 'marca.jpg', '2019-08-15 21:26:36', '2019-08-15 21:26:36'),
(10, 'Marca_139', 'Dolorum autem ducimus deleniti.', 'marca.jpg', '2019-08-15 21:26:36', '2019-08-15 21:26:36');

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
(4, '2019_03_22_151535_create_direcciones_table', 1),
(5, '2019_03_22_154646_create_password_resets_table', 1),
(6, '2019_03_22_154842_create_categorias_table', 1),
(7, '2019_03_22_155019_create_promociones_table', 1),
(8, '2019_03_22_155150_create_envios_table', 1),
(9, '2019_03_22_155155_create_transacciones_table', 1),
(10, '2019_03_22_155159_create_pedidos_table', 1),
(11, '2019_03_22_155255_create_proveedores_table', 1),
(12, '2019_03_22_155300_create_marcas_table', 1),
(13, '2019_03_22_155725_create_productos_table', 1),
(14, '2019_03_22_160120_create_detalle_pedidos_table', 1),
(15, '2019_03_22_160249_create_imagenes_table', 1),
(16, '2019_05_28_151116_create_videos_table', 1),
(17, '2019_07_11_163248_create_direccion_pedido_table', 1),
(18, '2019_07_26_135555_create_paises_table', 1),
(19, '2019_07_26_160215_create_estados_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id` int(10) UNSIGNED NOT NULL,
  `pais_nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `pais_nombre`) VALUES
(5, 'Argentina'),
(12, 'Brasil'),
(17, 'Guadalupe'),
(28, 'España'),
(32, 'Canadá'),
(35, 'China'),
(36, 'Costa Rica'),
(42, 'México'),
(48, 'Portugal'),
(51, 'El Salvador'),
(55, 'Estados Unidos'),
(64, 'Francia'),
(81, 'Chile'),
(82, 'Colombia'),
(89, 'Perú'),
(95, 'Venezuela'),
(103, 'Ecuador'),
(110, 'Paraguay'),
(111, 'Uruguay'),
(113, 'Cuba'),
(123, 'Bolivia'),
(124, 'Panamá'),
(137, 'Honduras'),
(138, 'República Dominicana'),
(185, 'Guatemala'),
(209, 'Nicaragua'),
(246, 'Puerto Rico');

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
  `pedido_ref_venta` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promocion_id` int(10) UNSIGNED DEFAULT NULL,
  `envio_id` int(10) UNSIGNED NOT NULL,
  `pedido_tipo_dispositivo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pedido_ip_dispositivo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaccion_id` int(10) UNSIGNED DEFAULT NULL,
  `fecha_creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `categoria_id` int(10) UNSIGNED NOT NULL,
  `proveedor_id` int(10) UNSIGNED DEFAULT NULL,
  `marca_id` int(10) UNSIGNED NOT NULL,
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

INSERT INTO `productos` (`id`, `categoria_id`, `proveedor_id`, `marca_id`, `producto_nombre`, `producto_descripcion`, `producto_tags`, `producto_ref`, `producto_imagen`, `producto_precio`, `promocion_id`, `producto_tallas`, `producto_colores`, `producto_tieneImgDescripcion`, `producto_cant`, `producto_estado`, `fecha_creado`, `fecha_actualizado`) VALUES
(1, 10, 3, 9, 'Commodi qui et.', 'Unde eius nulla reiciendis voluptatem. Aut quia voluptatem impedit aut minima et. Et hic inventore culpa ut veritatis fugiat qui illo.', 'cel,ruedas,cel,tennis,cel', 'AUT1162', '1562990443_05 p Moonbeam.jpg', '30000.00', 3, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 0, 0, 0, '2019-08-15 21:26:36', '2019-08-15 21:26:36'),
(2, 7, 2, 2, 'Dicta.', 'Recusandae nisi animi et cumque asperiores. Qui quam voluptatem rerum distinctio perspiciatis quis aut. Fuga officia et laudantium facere nihil.', 'pc,portatiles,computadores,portatiles,cargador', 'CORRUPTI2256', '1562990443_05 p Moonbeam.jpg', '40000.00', 3, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 1, 4, 1, '2019-08-15 21:26:36', '2019-08-15 21:26:36'),
(3, 5, 3, 7, 'Deleniti hic ab.', 'Aperiam est et rerum esse esse qui natus. Iure animi alias laborum nihil voluptas dicta. Illum minima adipisci aut quia id in commodi.', 'smartphones,celular,cadenas,reloj,computadores', 'FACERE3522', '1562990443_05 p Moonbeam.jpg', '50000.00', 2, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 1, 9, 1, '2019-08-15 21:26:36', '2019-08-15 21:26:36'),
(4, 8, 3, 10, 'Ipsa assumenda.', 'Optio ut culpa quas dolores. In et qui cupiditate odio. A reiciendis officiis ullam cumque possimus. Et assumenda nam amet in.', 'ruedas,portatiles,ruedas,zapatos,televisor', 'ILLUM1158', '1562990443_05 p Moonbeam.jpg', '20000.00', 2, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 1, 10, 1, '2019-08-15 21:26:37', '2019-08-15 21:26:37'),
(5, 15, 1, 2, 'Accusamus et nam.', 'Itaque voluptatibus neque deleniti quibusdam. Iusto aut commodi numquam omnis ducimus. Atque nesciunt ut est ut blanditiis minus et.', 'cargador,phone,celular,tennis,zapatos', 'DELENITI924', '1562990443_05 p Moonbeam.jpg', '40000.00', 1, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 1, 8, 1, '2019-08-15 21:26:37', '2019-08-15 21:26:37'),
(6, 3, 4, 4, 'Totam recusandae.', 'Recusandae asperiores omnis sint dolorem ex non. Eaque optio vel est rem et. Cum voluptas ipsa sit delectus sint.', 'cel,cargador,tablets,cargador,pc', 'AUT1804', '1562990443_05 p Moonbeam.jpg', '20000.00', 2, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 0, 9, 1, '2019-08-15 21:26:37', '2019-08-15 21:26:37'),
(7, 6, 3, 1, 'Ea est accusantium.', 'Quae maxime omnis excepturi fugiat nobis blanditiis. Enim non eius sunt enim deleniti est maxime.', 'tablets,cel,tennis,mause,tablets', 'UT1995', '1562990443_05 p Moonbeam.jpg', '30000.00', 1, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 0, 2, 1, '2019-08-15 21:26:37', '2019-08-15 21:26:37'),
(8, 12, 5, 9, 'Dolorum et cumque.', 'Minima eveniet suscipit voluptates veritatis vel. Enim similique est voluptas nihil. Rerum ratione quia quis et suscipit.', 'celular,ruedas,ruedas,cadenas,perlas', 'CUM9170', '1562990443_05 p Moonbeam.jpg', '10000.00', 1, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 1, 3, 1, '2019-08-15 21:26:37', '2019-08-15 21:26:37'),
(9, 13, 3, 2, 'Architecto ea.', 'Omnis nostrum illo placeat. Fugiat explicabo aliquam sit ea occaecati. Voluptates facilis adipisci nam culpa. Est consequuntur ut nesciunt est vero.', 'tennis,cel,joyas,zapatos,celular', 'IUSTO7658', '1562990443_05 p Moonbeam.jpg', '30000.00', 2, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 0, 1, 1, '2019-08-15 21:26:37', '2019-08-15 21:26:37'),
(10, 7, 1, 5, 'Sit iusto ratione.', 'Eveniet perferendis in est delectus consequatur. Dolorem et aliquid et qui id. Aspernatur eum et voluptatum id praesentium rem.', 'portatiles,plasma,cadenas,computadores,computadores', 'RATIONE1314', '1562990443_05 p Moonbeam.jpg', '20000.00', 1, '28, 30, 32, 50X20, 160X100', 'verdes, rojos, negros, azules', 1, 7, 1, '2019-08-15 21:26:37', '2019-08-15 21:26:37');

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
(1, 'Descuento # 1', '%', 10, 1, 'https://lorempixel.com/200/200/cats/?89502', '2019-01-01 01:00:00', '2019-12-31 00:00:00', 3, 50000, NULL, '2019-08-15 21:26:35', '2019-08-15 21:26:35'),
(2, 'Descuento # 2', '$', 10000, 0, 'https://lorempixel.com/200/200/cats/?41519', '2019-01-01 01:00:00', '2019-12-31 00:00:00', 3, 50000, NULL, '2019-08-15 21:26:35', '2019-08-15 21:26:35'),
(3, 'Descuento # 3', '2x1', 0, 1, 'https://lorempixel.com/200/200/cats/?30957', '2019-01-01 01:00:00', '2019-12-31 00:00:00', 3, 50000, NULL, '2019-08-15 21:26:35', '2019-08-15 21:26:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(10) UNSIGNED NOT NULL,
  `proveedor_razon_social` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proveedor_representante` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proveedor_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `proveedor_razon_social`, `proveedor_representante`, `proveedor_email`, `fecha_creado`, `fecha_actualizado`) VALUES
(1, 'Proveedor_2975', 'Alene Abbott', 'proveedor979@gmail.com', '2019-08-15 21:26:35', '2019-08-15 21:26:35'),
(2, 'Proveedor_50324', 'Mortimer Schaden', 'proveedor109@gmail.com', '2019-08-15 21:26:35', '2019-08-15 21:26:35'),
(3, 'Proveedor_68855', 'Andreanne Nikolaus', 'proveedor623@gmail.com', '2019-08-15 21:26:35', '2019-08-15 21:26:35'),
(4, 'Proveedor_7452', 'Kelsie Paucek', 'proveedor440@gmail.com', '2019-08-15 21:26:35', '2019-08-15 21:26:35'),
(5, 'Proveedor_23982', 'Francesco Orn', 'proveedor139@gmail.com', '2019-08-15 21:26:35', '2019-08-15 21:26:35');

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
(1, 'Admin', '2019-08-15 21:26:31'),
(2, 'Visitante', '2019-08-15 21:26:31'),
(3, 'Cliente', '2019-08-15 21:26:31');

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
(1, 'tecnologias', 'Sección de articulos tecnologicos', 'celular.svg', '2019-08-15 21:26:31'),
(2, 'zapatos', 'Sección de venta de calzado', 'zapatos.svg', '2019-08-15 21:26:31'),
(3, 'joyas', 'Sección de venta de joyas', 'joyas.svg', '2019-08-15 21:26:31');

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
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_estado` tinyint(1) NOT NULL,
  `fecha_creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_actualizado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `rol_id`, `usuario_nombre`, `usuario_apellido`, `usuario_cedula`, `usuario_sexo`, `usuario_avatar`, `usuario_telefono`, `email`, `password`, `usuario_estado`, `fecha_creado`, `fecha_actualizado`, `remember_token`) VALUES
(1, 1, 'Odannys', 'De La Cruz Calvo', '1065825573', 'm', 'avatar.png', '3107484079', 'el_odanis321@hotmail.com', '$2y$10$7aa5uWY9XYHSSzNQruo4teow059cIL0Mzdh79Q0oi6Dr7IZMF/eVq', 1, '2019-08-15 21:26:32', '2019-08-15 21:26:32', NULL),
(2, 1, 'Ruben', 'Gonzales', '1065640192', 'm', 'avatar.png', '3172660830', 'rubensistenas@gmail.com', '$2y$10$VT2IdTpOcRPG9iKEx.Qdt.JfgdKUFEvTZD2x7yKzLhwAcZzPjtr4S', 1, '2019-08-15 21:26:32', '2019-08-15 21:26:32', NULL),
(3, 1, 'Jose', 'Meriño', '432423423', 'm', 'avatar.png', '3172660830', 'jl@gmail.com', '$2y$10$jnFl/kccSWvOXw/xuke61.WsGRPr6uX05DqYpFAkkgtBi2h1WYkN6', 1, '2019-08-15 21:26:32', '2019-08-15 21:26:32', NULL),
(4, 1, 'Eduardo', 'Lodico', '55555555', 'm', 'avatar.png', '3172660830', 'lodico@gmail.com', '$2y$10$yHSFTABnAcN83vRBQ2ll/OP7XOuEgU/266OZYSHckA2.xoIZblnQq', 1, '2019-08-15 21:26:33', '2019-08-15 21:26:33', NULL),
(5, 2, 'August', 'Windler', '941494510', NULL, 'avatar.png', '535-472-0724 x3994', 'usuario312@gmail.com', '$2y$10$bkxNtu6hoCZ1hWqBzB8e2ulxl9ZvZ.Ik.os3T0H7gP5uPqIzU.246', 0, '2019-08-15 21:26:34', '2019-08-15 21:26:34', NULL),
(6, 2, 'Skye', 'Legros', '873482288', NULL, 'avatar.png', '+1 (247) 993-2199', 'usuario878@gmail.com', '$2y$10$NH/yxjr1utZzk0rU2w7.8e6l8WbSQwG1./2cy0bDzBZupd/UM1Xai', 0, '2019-08-15 21:26:34', '2019-08-15 21:26:34', NULL),
(7, 2, 'Adelia', 'Runolfsdottir', '934670497', NULL, 'avatar.png', '874-434-3584 x3277', 'usuario6@gmail.com', '$2y$10$GUK1PloKSnpcXzthI8fEDOvQR1MdocnNnVJzR.W26yck7oEWadQ9u', 0, '2019-08-15 21:26:34', '2019-08-15 21:26:34', NULL);

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
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `direcciones_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `direccion_pedido`
--
ALTER TABLE `direccion_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `direccion_pedido_pedido_id_foreign` (`pedido_id`);

--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estados_pais_id_foreign` (`pais_id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imagenes_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `marcas_marca_nombre_unique` (`marca_nombre`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
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
  ADD KEY `productos_proveedor_id_foreign` (`proveedor_id`),
  ADD KEY `productos_marca_id_foreign` (`marca_id`),
  ADD KEY `productos_promocion_id_foreign` (`promocion_id`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `promociones_promo_nombre_unique` (`promo_nombre`),
  ADD KEY `promociones_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `proveedores_proveedor_razon_social_unique` (`proveedor_razon_social`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `direccion_pedido`
--
ALTER TABLE `direccion_pedido`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `envios`
--
ALTER TABLE `envios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=634;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
-- Filtros para la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD CONSTRAINT `direcciones_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `direccion_pedido`
--
ALTER TABLE `direccion_pedido`
  ADD CONSTRAINT `direccion_pedido_pedido_id_foreign` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `estados`
--
ALTER TABLE `estados`
  ADD CONSTRAINT `estados_pais_id_foreign` FOREIGN KEY (`pais_id`) REFERENCES `paises` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `productos_marca_id_foreign` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `productos_promocion_id_foreign` FOREIGN KEY (`promocion_id`) REFERENCES `promociones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `productos_proveedor_id_foreign` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedores` (`id`) ON DELETE CASCADE;

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
