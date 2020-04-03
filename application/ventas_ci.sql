-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-12-2018 a las 18:15:31
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ventas_ci`
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

--
-- Volcado de datos para la tabla `abastecimientos`
--

INSERT INTO `abastecimientos` (`id_abas`, `fecha_abas`, `total_abas`, `estado_abas`, `id_caja`) VALUES
(23, '2018-12-21 01:30:20', '2000.00', '', NULL),
(24, '1970-01-01 01:00:00', '2000.00', '', NULL),
(25, '2018-12-21 01:31:33', '2099.00', '', NULL),
(26, '2018-12-20 06:33:14', '2000.00', '', NULL),
(27, '2018-12-20 12:33:56', '100.00', '', NULL),
(28, '2018-12-20 12:35:03', '20.00', '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajas`
--

CREATE TABLE `cajas` (
  `id_caja` int(11) NOT NULL,
  `total_caja` varchar(45) NOT NULL,
  `fechas` datetime NOT NULL,
  `id_usu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cajas`
--

INSERT INTO `cajas` (`id_caja`, `total_caja`, `fechas`, `id_usu`) VALUES
(1, '200', '2018-11-28 00:00:00', 1);

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
(5, 'Bebidasxx', 'Bebidas de diferentes marcas.', 1),
(6, 'Galletas', 'Galletas de diferentes marcas.', 0),
(7, 'aaaaa', '', 1);

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
  `id_caja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuentos`
--

CREATE TABLE `descuentos` (
  `id_desc` int(11) NOT NULL,
  `fecha_desc` date NOT NULL,
  `motivo_desc` varchar(200) NOT NULL,
  `monto_desc` varchar(200) NOT NULL,
  `estado_desc` varchar(111) NOT NULL,
  `id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `descuentos`
--

INSERT INTO `descuentos` (`id_desc`, `fecha_desc`, `motivo_desc`, `monto_desc`, `estado_desc`, `id_usu`) VALUES
(1, '2018-11-25', 'Urgencia Médica', '150', '1', 1);

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

--
-- Volcado de datos para la tabla `detalle_abastecimiento`
--

INSERT INTO `detalle_abastecimiento` (`id`, `id_prod`, `id_abas`, `precio`, `cantidad`, `importe`) VALUES
(24, 4, 23, '2', '1000', '2000.00'),
(25, 4, 24, '2', '1000', '2000.00'),
(26, 4, 25, '2', '1000', '2000.00'),
(27, 1, 25, '1', '99', '99.00'),
(28, 4, 26, '2', '1000', '2000.00'),
(29, 4, 27, '2', '50', '100.00'),
(30, 4, 28, '2', '10', '20.00');

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
(15, 4, 92, '2.5', '100', '250.00'),
(16, 4, 93, '2.5', '100', '250.00'),
(17, 4, 94, '1', '100', '100.00'),
(18, 4, 95, '2.5', '1', '2.5'),
(19, 1, 95, '2', '100', '200.00'),
(20, 2, 95, '123', '1000', '123000.00'),
(21, 4, 96, '2.5', '1', '2.5'),
(22, 1, 96, '2', '1', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `id_men` int(11) NOT NULL,
  `nombre_men` varchar(45) DEFAULT NULL,
  `link_men` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `stock_prod` int(11) DEFAULT NULL,
  `inventary_min` int(11) DEFAULT '10',
  `estado_prod` tinyint(1) DEFAULT NULL,
  `id_cat` int(11) DEFAULT NULL,
  `id_prov` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_prod`, `nombre_prod`, `descripcion_prod`, `precio_prod_in`, `precio_prod_out`, `stock_prod`, `inventary_min`, `estado_prod`, `id_cat`, `id_prov`) VALUES
(1, 'perrocalato1', '2', '1', '2', 4000, 10, 1, 5, 1),
(2, 'PERRO', '123', '123', '123', 4001, 123, 1, 5, 1),
(3, '123', '123', '123', '123', 5000, 123, 1, 5, 1),
(4, 'Coca-Cola', 'Negra', '2', '2.5', 8105, 10, 1, 5, 1),
(5, 'sdf', 'sdf', '1.5', '1.5', 5000, 123, 1, 5, 1),
(6, 'Gaseosa', 'KR', '0.7', '1.2', 5000, 10, 1, 5, 1);

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
(1, 'manito', '12334', 1);

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
(2, 'admin', NULL);

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
(1, 'Steam', 1);

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
(1, 'vic', 'gal', '123', 'vic', 'vic', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_vent` int(11) NOT NULL,
  `fecha_vent` date DEFAULT NULL,
  `total_vent` varchar(45) DEFAULT NULL,
  `estado_vent` varchar(20) NOT NULL,
  `id_caja` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_vent`, `fecha_vent`, `total_vent`, `estado_vent`, `id_caja`) VALUES
(92, '2018-12-18', '250.00', '', NULL),
(93, '2018-12-18', '250.00', '', NULL),
(94, '2018-12-18', '100.00', '', NULL),
(95, '2018-12-19', '123202.50', '', NULL),
(96, '2018-12-20', '4.50', '', NULL);

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
  ADD KEY `fk_usuario_descuento` (`id_usu`);

--
-- Indices de la tabla `detalle_abastecimiento`
--
ALTER TABLE `detalle_abastecimiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_det_proda` (`id_prod`),
  ADD KEY `fk_abas_deta` (`id_abas`);

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
  ADD KEY `fk_rol_oer` (`id_rol`);

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
  ADD KEY `fk_usu_rol` (`id_rol`);

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
  MODIFY `id_abas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `cajas`
--
ALTER TABLE `cajas`
  MODIFY `id_caja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `codigos`
--
ALTER TABLE `codigos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  MODIFY `id_desc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle_abastecimiento`
--
ALTER TABLE `detalle_abastecimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `id_men` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_per` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_prov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_codigo`
--
ALTER TABLE `tipo_codigo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_vent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `abastecimientos`
--
ALTER TABLE `abastecimientos`
  ADD CONSTRAINT `fk_c_a` FOREIGN KEY (`id_caja`) REFERENCES `cajas` (`id_caja`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_usuario_descuento` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_cat_prod` FOREIGN KEY (`id_cat`) REFERENCES `categorias` (`id_cat`),
  ADD CONSTRAINT `fk_prov_prod` FOREIGN KEY (`id_prov`) REFERENCES `proveedores` (`id_prov`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usu_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fk_c_v` FOREIGN KEY (`id_caja`) REFERENCES `cajas` (`id_caja`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
