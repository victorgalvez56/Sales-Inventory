-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-04-2019 a las 01:13:36
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ventas_ci2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abastecimientos`
--

CREATE TABLE `abastecimientos` (
  `id_abas` int(11) NOT NULL,
  `fecha_abas` datetime NOT NULL,
  `total_abas` varchar(150) NOT NULL,
  `estado_abas` varchar(150) NOT NULL,
  `id_caja` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquileres`
--

CREATE TABLE `alquileres` (
  `id_alq` int(11) NOT NULL,
  `estado_alq` varchar(10) NOT NULL,
  `id_caja` int(11) DEFAULT NULL,
  `cuentas` int(11) DEFAULT '0',
  `equipos` int(11) DEFAULT '0',
  `total` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alquileres`
--

INSERT INTO `alquileres` (`id_alq`, `estado_alq`, `id_caja`, `cuentas`, `equipos`, `total`) VALUES
(1, '0', 1, 0, 0, ''),
(2, '1', 2, 217, 0, '217'),
(3, '1', 3, 310, 0, '309.6'),
(4, '1', 4, 234, 0, '234.2'),
(5, '1', 5, 303, 0, '302.6'),
(6, '1', 6, 299, 0, '298.8'),
(7, '1', 7, 217, 0, '217.1'),
(8, '1', 8, 264, 0, '264.4'),
(9, '1', 9, 241, 0, '241.2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajas`
--

CREATE TABLE `cajas` (
  `id_caja` int(11) NOT NULL,
  `total1_caja` varchar(45) NOT NULL,
  `total2_caja` varchar(45) NOT NULL,
  `total3_caja` varchar(45) NOT NULL DEFAULT '0',
  `total_caja` varchar(45) NOT NULL,
  `fecha_abertura` datetime NOT NULL,
  `fecha_cierre` datetime DEFAULT NULL,
  `estado_caja` varchar(11) NOT NULL,
  `caja_abierta` int(11) NOT NULL,
  `responsable` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cajas`
--

INSERT INTO `cajas` (`id_caja`, `total1_caja`, `total2_caja`, `total3_caja`, `total_caja`, `fecha_abertura`, `fecha_cierre`, `estado_caja`, `caja_abierta`, `responsable`) VALUES
(1, '', '', '', '', '2019-04-15 13:00:00', '2019-04-15 00:00:00', '0', 0, NULL),
(2, '217', '33.6', '2', '248.6', '2019-04-16 15:21:51', '2019-04-16 21:34:12', '1', 0, 'Kato'),
(3, '309.6', '14.8', '105.5', '221.4', '2019-04-17 11:26:24', '2019-04-17 13:48:09', '1', 0, 'Zerito'),
(4, '234.2', '37.8', '2.5', '269.5', '2019-04-17 15:00:56', '2019-04-17 21:31:00', '1', 0, 'Kato'),
(5, '302.6', '23.2', '30', '295.8', '2019-04-18 11:15:17', '2019-04-18 13:48:22', '1', 0, 'Zerito'),
(6, '298.8', '25.6', '0', '324.4', '2019-04-18 20:44:32', '2019-04-18 21:57:35', '1', 0, 'Kato'),
(7, '217.1', '25.1', '60', '182.2', '2019-04-19 13:30:25', '2019-04-19 14:12:28', '1', 0, 'Zerito'),
(8, '264.4', '28.8', '', '293.2', '2019-04-19 21:05:44', '2019-04-19 21:22:42', '1', 0, 'Zerito'),
(9, '241.2', '16.8', '3.3', '254.7', '2019-04-20 13:32:53', '2019-04-20 13:47:15', '1', 0, 'Zerito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_cat` int(11) NOT NULL,
  `nombre_cat` varchar(45) DEFAULT NULL,
  `descripcion_cat` varchar(100) DEFAULT NULL,
  `estado_cat` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_cat`, `nombre_cat`, `descripcion_cat`, `estado_cat`) VALUES
(1, 'Galletas', '', 1),
(2, 'Bebidas', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigos`
--

CREATE TABLE `codigos` (
  `id` int(11) NOT NULL,
  `fecha_codigo` datetime DEFAULT NULL,
  `codigo_codigo` varchar(100) NOT NULL,
  `precio_codigo` varchar(100) NOT NULL,
  `estado_codigo` varchar(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `responsable` varchar(50) NOT NULL,
  `id_caja` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuentos`
--

CREATE TABLE `descuentos` (
  `id_desc` int(11) NOT NULL,
  `fecha_desc` datetime NOT NULL,
  `motivo_desc` varchar(200) NOT NULL,
  `monto_desc` varchar(200) NOT NULL,
  `estado_desc` varchar(111) NOT NULL,
  `id_caja` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `descuentos`
--

INSERT INTO `descuentos` (`id_desc`, `fecha_desc`, `motivo_desc`, `monto_desc`, `estado_desc`, `id_caja`) VALUES
(1, '2019-04-16 18:45:46', 'Cargar basura  Recargue a ferzerker = muso y lalitopunk', '2.00', '1', 2),
(2, '2019-04-17 14:45:12', 'Elvis  ventas  4t0  ---> 100    piso        - Sistema victor  3h --->3', '103', '1', 3),
(3, '2019-04-17 19:01:49', 'Compre corrector para los pads que se roban', '2.5', '1', 3),
(4, '2019-04-17 22:26:35', 'Compre corrector para los pads que se roban', '2.5', '1', 4),
(5, '2019-04-18 14:45:04', 'Elvis feriado  30', '30', '1', 5),
(6, '2019-04-19 15:10:27', 'Feriado:yo, victor, deeksito. ', '30', '1', 7),
(7, '2019-04-19 15:10:56', 'Pago Victor feriado arriba y abajo 30', '30', '1', 7),
(8, '2019-04-20 14:46:25', 'Elvis galleta  =0.8     kato- actualización = 1.5     devolución =1', '3.3', '1', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_abastecimiento`
--

CREATE TABLE `detalle_abastecimiento` (
  `id` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `id_abas` int(11) NOT NULL,
  `precio` varchar(150) NOT NULL,
  `cantidad` varchar(150) NOT NULL,
  `importe` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id` int(11) NOT NULL,
  `id_prod` int(11) DEFAULT NULL,
  `id_vent` int(11) DEFAULT NULL,
  `precio` varchar(45) DEFAULT NULL,
  `cantidad` varchar(45) DEFAULT NULL,
  `importe` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id`, `id_prod`, `id_vent`, `precio`, `cantidad`, `importe`) VALUES
(1, 10, 2, '0.8', '1', '0.8'),
(2, 1, 2, '1.2', '1', '1.2'),
(3, 1, 2, '1.2', '1', '1.2'),
(4, 3, 2, '0.8', '1', '0.8'),
(5, 1, 2, '1.2', '4', '4.80'),
(6, 1, 2, '1.2', '1', '1.20'),
(7, 1, 2, '1.2', '1', '1.2'),
(8, 1, 2, '1.2', '4', '4.80'),
(9, 9, 2, '0.8', '2', '1.60'),
(10, 1, 2, '1.2', '2', '2.40'),
(11, 3, 2, '0.8', '1', '0.8'),
(12, 1, 2, '1.2', '1', '1.2'),
(13, 1, 2, '1.2', '3', '3.60'),
(14, 4, 2, '0.8', '1', '0.8'),
(15, 1, 2, '1.2', '1', '1.2'),
(16, 1, 2, '1.2', '1', '1.2'),
(17, 11, 2, '2', '1', '2'),
(18, 9, 2, '0.8', '1', '0.8'),
(19, 7, 2, '0.8', '1', '0.8'),
(20, 6, 2, '0.8', '1', '0.8'),
(21, 1, 2, '1.2', '1', '1.2'),
(22, 1, 2, '1.2', '1', '1.2'),
(23, 2, 2, '1.5', '1', '1.5'),
(24, 2, 2, '1.5', '1', '1.50'),
(25, 2, 2, '1.5', '1', '1.5'),
(26, 8, 3, '0.8', '1', '0.8'),
(27, 1, 3, '1.2', '11', '13.20'),
(28, 7, 3, '0.8', '1', '0.8'),
(29, 1, 4, '1.2', '21', '25.20'),
(30, 11, 5, '2', '2', '4.00'),
(31, 2, 5, '1.5', '2', '3.00'),
(32, 3, 6, '0.8', '1', '0.8'),
(33, 4, 6, '0.8', '3', '2.40'),
(34, 5, 6, '0.8', '1', '0.8'),
(35, 7, 6, '0.8', '1', '0.8'),
(36, 9, 6, '0.8', '1', '0.8'),
(37, 2, 7, '1.5', '4', '6.00'),
(38, 7, 7, '0.8', '1', '0.8'),
(39, 8, 7, '0.8', '1', '0.8'),
(40, 1, 7, '1.2', '13', '15.60'),
(41, 1, 8, '1.2', '11', '13.20'),
(42, 2, 8, '1.5', '4', '6.00'),
(43, 3, 8, '0.8', '3', '2.40'),
(44, 4, 8, '0.8', '1', '0.80'),
(45, 5, 8, '0.8', '1', '0.80'),
(46, 6, 8, '0.8', '2', '1.60'),
(47, 8, 8, '0.8', '1', '0.8'),
(48, 1, 9, '1.2', '10', '12.00'),
(49, 2, 9, '1.5', '5', '7.50'),
(50, 3, 9, '0.8', '4', '3.20'),
(51, 4, 9, '0.8', '1', '0.8'),
(52, 9, 9, '0.8', '2', '1.60'),
(53, 1, 10, '1.2', '11', '13.20'),
(54, 2, 10, '1.5', '4', '6.00'),
(55, 3, 10, '0.8', '2', '1.60'),
(56, 9, 10, '0.8', '2', '1.60'),
(57, 4, 10, '0.8', '5', '4.00'),
(58, 8, 10, '0.8', '1', '0.8'),
(59, 5, 10, '0.8', '2', '1.60'),
(60, 1, 11, '1.2', '8', '9.60'),
(61, 5, 11, '0.8', '1', '0.8'),
(62, 7, 11, '0.8', '4', '3.20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `id_men` int(11) NOT NULL,
  `nombre_men` varchar(45) DEFAULT NULL,
  `link_men` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id_men`, `nombre_men`, `link_men`) VALUES
(1, 'Inicio', 'dashboard'),
(2, 'Categorias', 'mantenimiento/categorias'),
(3, 'Proveedores', 'mantenimiento/proveedores'),
(4, 'Productos', 'mantenimiento/productos'),
(5, 'Cajas', 'movimientos/cajas'),
(6, 'Registrar Cajas', 'movimientos/cajas/add'),
(7, 'Reporte Cajas', 'reportes/cajas'),
(8, 'Ventas', 'movimientos/ventas'),
(9, 'Vender', 'movimientos/ventas/add'),
(10, 'Reporte Ventas', 'reportes/ventas'),
(11, 'Abastecimientos', 'movimientos/abastecimientos'),
(12, 'Abastecer', 'movimientos/abastecimientos/add'),
(13, 'Reporte Abastecimientos', 'reportes/abastecimientos'),
(14, 'Códigos', 'movimientos/codigos'),
(15, 'Tipos de Códigos', 'mantenimiento/tipos'),
(16, 'Usuarios', 'administrador/usuarios'),
(17, 'Permisos', 'administrador/permisos'),
(18, 'Descuentos', 'administrador/descuentos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_per` int(11) NOT NULL,
  `read` int(11) DEFAULT NULL,
  `insert` int(11) DEFAULT NULL,
  `update` int(11) DEFAULT NULL,
  `delete` int(11) DEFAULT NULL,
  `id_men` int(11) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_per`, `read`, `insert`, `update`, `delete`, `id_men`, `id_rol`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 1, 1, 1, 1, 2, 1),
(3, 1, 1, 1, 1, 3, 1),
(4, 1, 1, 1, 1, 4, 1),
(5, 1, 1, 0, 1, 5, 1),
(6, 1, 1, 1, 1, 6, 1),
(7, 1, 1, 1, 1, 7, 1),
(8, 1, 1, 1, 1, 8, 1),
(9, 1, 1, 1, 1, 9, 1),
(10, 1, 1, 1, 1, 10, 1),
(11, 1, 1, 1, 1, 11, 1),
(12, 1, 1, 1, 1, 12, 1),
(13, 1, 1, 1, 1, 13, 1),
(14, 1, 1, 1, 1, 14, 1),
(15, 1, 1, 1, 1, 15, 1),
(16, 1, 1, 1, 1, 16, 1),
(17, 1, 1, 1, 1, 17, 1),
(18, 1, 1, 1, 1, 18, 1),
(19, 1, 1, 1, 1, 1, 3),
(20, 1, 0, 0, 0, 4, 3),
(21, 1, 1, 1, 0, 5, 3),
(22, 1, 1, 1, 1, 6, 3),
(23, 1, 1, 1, 1, 9, 3),
(24, 0, 0, 0, 0, 12, 3),
(25, 1, 0, 0, 0, 14, 3),
(26, 1, 1, 0, 0, 18, 3),
(27, 1, 1, 0, 0, 8, 3),
(28, 1, 1, 0, 0, 11, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_prod` int(11) NOT NULL,
  `nombre_prod` varchar(45) DEFAULT NULL,
  `descripcion_prod` varchar(100) DEFAULT NULL,
  `precio_prod_in` varchar(45) DEFAULT NULL,
  `precio_prod_out` varchar(45) DEFAULT NULL,
  `stock_prod` int(11) DEFAULT '0',
  `inventary_min` int(11) DEFAULT '50',
  `estado_prod` tinyint(1) DEFAULT NULL,
  `id_cat` int(11) DEFAULT NULL,
  `id_prov` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_prod`, `nombre_prod`, `descripcion_prod`, `precio_prod_in`, `precio_prod_out`, `stock_prod`, `inventary_min`, `estado_prod`, `id_cat`, `id_prov`) VALUES
(1, 'Gaseosa KR', NULL, '0.75555', '1.2', 664, 100, 1, 2, 1),
(2, 'Galletas Grandes', NULL, '0.91666', '1.5', 11, 10, 1, 1, 2),
(3, 'Galletas Casino', NULL, '0.5', '0.8', 7, 5, 1, 1, 2),
(4, 'Galletas Tentación', NULL, '0.45833', '0.8', 4, 5, 1, 1, 2),
(5, 'Galletas Pícaras', NULL, '0.625', '0.8', 8, 5, 1, 1, 2),
(6, 'Galletas Glacitas', NULL, '0.5', '0.8', 14, 5, 1, 1, 2),
(7, 'Galletas Charadas', NULL, '0.54166', '0.8', 0, 5, 1, 1, 2),
(8, 'Galletas Donuts', NULL, '0.5', '0.8', 16, 5, 1, 1, 2),
(9, 'Chocman', NULL, '0.4', '0.8', 71, 20, 1, 1, 2),
(10, 'Galletas Oreo', NULL, '0.5', '0.8', 0, 10, 1, 1, 2),
(11, 'Powerade', NULL, '1.6', '2', 72, 25, 1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_prov` int(11) NOT NULL,
  `nombre_prov` varchar(45) DEFAULT NULL,
  `descripcion_prov` varchar(100) DEFAULT NULL,
  `estado_prov` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_prov`, `nombre_prov`, `descripcion_prov`, `estado_prov`) VALUES
(1, 'Kr Sac', '', 1),
(2, 'Golosinas Altiplano', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(45) DEFAULT NULL,
  `descripcion_rol` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`, `descripcion_rol`) VALUES
(1, 'superadmin', NULL),
(2, 'admin', NULL),
(3, 'cajero', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_codigo`
--

CREATE TABLE `tipo_codigo` (
  `id_tipo` int(11) NOT NULL,
  `nombre_tipo` varchar(100) NOT NULL,
  `estado_tipo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_codigo`
--

INSERT INTO `tipo_codigo` (`id_tipo`, `nombre_tipo`, `estado_tipo`) VALUES
(1, 'PUGB', 1),
(2, 'DOTA2', 1),
(3, 'FORNITE', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usu` int(11) NOT NULL,
  `nombres_usu` varchar(100) DEFAULT NULL,
  `apellidos_usu` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `estado_usu` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `nombres_usu`, `apellidos_usu`, `telefono`, `email`, `username`, `password`, `id_rol`, `estado_usu`) VALUES
(1, 'Elvis', 'Apaza', '', '', 'turbo', '123', 1, 1),
(2, 'Zerito', 'Rosales', '983304363', 'zer0_su_tk@hotmail.com', 'zerito', 'fjdoi204', 3, 1),
(3, 'Deek', 'Calderon', NULL, NULL, 'deek', '123', 3, 1),
(4, 'Kato', NULL, NULL, NULL, 'kato', '123', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_vent` int(11) NOT NULL,
  `fecha_vent` datetime DEFAULT NULL,
  `total_vent` varchar(45) NOT NULL,
  `estado_vent` varchar(20) NOT NULL,
  `id_caja` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_vent`, `fecha_vent`, `total_vent`, `estado_vent`, `id_caja`) VALUES
(1, '2019-04-15 13:01:00', '', '0', 1),
(2, '2019-04-16 14:54:10', '33.6', '1', 2),
(3, '2019-04-17 13:42:35', '14.80', '1', 3),
(4, '2019-04-17 21:01:43', '25.20', '1', 4),
(5, '2019-04-17 21:03:43', '7.00', '1', 4),
(6, '2019-04-17 21:06:23', '5.60', '1', 4),
(7, '2019-04-18 13:41:32', '23.20', '1', 5),
(8, '2019-04-18 21:51:52', '25.60', '1', 6),
(9, '2019-04-19 14:08:02', '25.10', '1', 7),
(10, '2019-04-19 21:18:52', '28.80', '1', 8),
(11, '2019-04-20 13:41:05', '16.80', '1', 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abastecimientos`
--
ALTER TABLE `abastecimientos`
  ADD PRIMARY KEY (`id_abas`),
  ADD KEY `fk_c_a` (`id_caja`);

--
-- Indices de la tabla `alquileres`
--
ALTER TABLE `alquileres`
  ADD PRIMARY KEY (`id_alq`),
  ADD KEY `fk_c_alqu` (`id_caja`);

--
-- Indices de la tabla `cajas`
--
ALTER TABLE `cajas`
  ADD PRIMARY KEY (`id_caja`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indices de la tabla `codigos`
--
ALTER TABLE `codigos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_c_s` (`id_caja`),
  ADD KEY `fk_c_t` (`id_tipo`);

--
-- Indices de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  ADD PRIMARY KEY (`id_desc`),
  ADD KEY `fk_ds_cj` (`id_caja`);

--
-- Indices de la tabla `detalle_abastecimiento`
--
ALTER TABLE `detalle_abastecimiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_abas_deta` (`id_abas`),
  ADD KEY `fk_det_proda` (`id_prod`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_det_prod` (`id_prod`),
  ADD KEY `fk_vent_deta` (`id_vent`);

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id_men`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_per`),
  ADD KEY `fk_men_per` (`id_men`),
  ADD KEY `fk_rol_per` (`id_rol`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_prod`),
  ADD KEY `fk_cat_prod` (`id_cat`),
  ADD KEY `fk_prov_prod` (`id_prov`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_prov`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tipo_codigo`
--
ALTER TABLE `tipo_codigo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usu`),
  ADD KEY `fk_role_usuarios` (`id_rol`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_vent`),
  ADD KEY `fk_c_v` (`id_caja`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abastecimientos`
--
ALTER TABLE `abastecimientos`
  MODIFY `id_abas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `alquileres`
--
ALTER TABLE `alquileres`
  MODIFY `id_alq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `cajas`
--
ALTER TABLE `cajas`
  MODIFY `id_caja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `codigos`
--
ALTER TABLE `codigos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  MODIFY `id_desc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `detalle_abastecimiento`
--
ALTER TABLE `detalle_abastecimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `id_men` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_per` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_prov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_codigo`
--
ALTER TABLE `tipo_codigo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_vent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `abastecimientos`
--
ALTER TABLE `abastecimientos`
  ADD CONSTRAINT `fk_c_a` FOREIGN KEY (`id_caja`) REFERENCES `cajas` (`id_caja`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `alquileres`
--
ALTER TABLE `alquileres`
  ADD CONSTRAINT `fk_c_alqu` FOREIGN KEY (`id_caja`) REFERENCES `cajas` (`id_caja`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `codigos`
--
ALTER TABLE `codigos`
  ADD CONSTRAINT `fk_c_s` FOREIGN KEY (`id_caja`) REFERENCES `cajas` (`id_caja`),
  ADD CONSTRAINT `fk_c_t` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_codigo` (`id_tipo`);

--
-- Filtros para la tabla `descuentos`
--
ALTER TABLE `descuentos`
  ADD CONSTRAINT `fk_ds_cj` FOREIGN KEY (`id_caja`) REFERENCES `cajas` (`id_caja`);

--
-- Filtros para la tabla `detalle_abastecimiento`
--
ALTER TABLE `detalle_abastecimiento`
  ADD CONSTRAINT `fk_abas_deta` FOREIGN KEY (`id_abas`) REFERENCES `abastecimientos` (`id_abas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_det_proda` FOREIGN KEY (`id_prod`) REFERENCES `productos` (`id_prod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `fk_det_prod` FOREIGN KEY (`id_prod`) REFERENCES `productos` (`id_prod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vent_deta` FOREIGN KEY (`id_vent`) REFERENCES `ventas` (`id_vent`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `fk_men_per` FOREIGN KEY (`id_men`) REFERENCES `menus` (`id_men`),
  ADD CONSTRAINT `fk_rol_per` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_cat_prod` FOREIGN KEY (`id_cat`) REFERENCES `categorias` (`id_cat`),
  ADD CONSTRAINT `fk_prov_prod` FOREIGN KEY (`id_prov`) REFERENCES `proveedores` (`id_prov`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_role_usuarios` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fk_c_v` FOREIGN KEY (`id_caja`) REFERENCES `cajas` (`id_caja`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
