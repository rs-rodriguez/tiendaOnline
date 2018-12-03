-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2018 a las 19:52:08
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `shopping_clothes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `ID_CLIENTE` int(11) NOT NULL,
  `NOMBRE` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `APELLIDO` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DIRECCION` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `TELEFONO` double DEFAULT NULL,
  `EDAD` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`ID_CLIENTE`, `NOMBRE`, `APELLIDO`, `DIRECCION`, `TELEFONO`, `EDAD`) VALUES
(1, 'LUIS', 'MARQUEZ', 'RES SAN LUIS', 72334455, 29),
(2, 'PAULA', 'MARMAR', 'COLONIA MIRALVALLE', 79988822, 19),
(3, 'DALIA', 'CAMPOS', 'COLONIA BERNAL', 72331122, 22),
(17, 'Samuel', 'Guardado', 'SIVAR', 75757575, 25),
(18, 'Jose Manuel', 'Menjivar Peres', '4566456456', 0, 34),
(19, 'Jose Manuel', 'Menjivar Peres', '4566456456', 0, 34),
(20, 'Samuel David', 'Guardado', 'Las vueltas', 78708593, 23),
(26, 'David', 'Rodriguez', 'Las vueltas', 78788593, 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `ID_FACTURA` int(11) NOT NULL,
  `ID_CLIENTE` int(11) NOT NULL,
  `FECHA` date DEFAULT NULL,
  `ID_FORMA_DE_PAGO` int(11) DEFAULT NULL,
  `CANTIDAD` double NOT NULL,
  `PRECIO` double DEFAULT NULL,
  `ID_PRODUCTO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_de_pago`
--

CREATE TABLE `forma_de_pago` (
  `ID_FORMA_DE_PAGO` int(11) NOT NULL,
  `DESCRIPCION` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `forma_de_pago`
--

INSERT INTO `forma_de_pago` (`ID_FORMA_DE_PAGO`, `DESCRIPCION`) VALUES
(1, 'EFECTIVO'),
(2, 'TARJETA_CREDITO'),
(3, 'PAYPAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `ID_PRODUCTO` int(11) NOT NULL,
  `CANTIDAD` double NOT NULL,
  `UBICACION` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`ID_PRODUCTO`, `CANTIDAD`, `UBICACION`) VALUES
(1, 3, 'BODEGA_1'),
(2, 5, 'BODEGA_2'),
(3, 4, 'BODEGA_3'),
(4, 2, 'BODEGA_3'),
(5, 9, 'BODEGA_2'),
(6, 10, 'BODEGA_1'),
(7, 14, 'BODEGA_2'),
(8, 1, 'BODEGA_3'),
(9, 2, 'BODEGA_2'),
(10, 23, 'BODEGA_1'),
(11, 7, 'BODEGA_1'),
(12, 8, 'BODEGA_2'),
(13, 2, 'BODEGA_3'),
(14, 1, 'BODEGA_1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID_PRODUCTO` int(11) NOT NULL,
  `SKU` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DESCRIPCION` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `COLOR` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `MARCA` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DEPARTAMENTO` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `TALLA` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `PRECIO` double DEFAULT NULL,
  `ID_TIPO_DE_PRECIO` int(11) DEFAULT NULL,
  `img` longblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID_PRODUCTO`, `SKU`, `DESCRIPCION`, `COLOR`, `MARCA`, `DEPARTAMENTO`, `TALLA`, `PRECIO`, `ID_TIPO_DE_PRECIO`, `img`) VALUES
(1, 'Nike', 'Nike', 'Nike', 'Nike', 'Nike', 'Ni', 56, 2, NULL),
(9, 'Tasmiras98', 'Tasmiras', 'Tasmiras', 'Tasmiras', 'Tasmiras', 'Ta', 1592, 2, NULL),
(10, 'Tasmiras2', 'Tasmiras2', 'Tasmiras', 'Tasmiras', 'Tasmiras', 'Ta', 89, 2, NULL),
(11, 'Tasmiras3', 'Tasmiras2', 'Tasmiras', 'Tasmiras', 'Tasmiras', 'Ta', 89, 2, NULL),
(12, 'Adidas', 'Adidas', 'Adidas', 'Adidas', 'Adidas', 'Ad', 67, 1, NULL),
(13, 'test', 'test', 'test', 'test', 'test', 'te', 234, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recurso`
--

CREATE TABLE `recurso` (
  `id_recurso` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `url` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_recurso`
--

CREATE TABLE `rol_recurso` (
  `id_rol_recurso` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_recurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_usuario`
--

CREATE TABLE `rol_usuario` (
  `id_rol_usuario` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_de_precio`
--

CREATE TABLE `tipo_de_precio` (
  `ID_TIPO_DE_PRECIO` int(11) NOT NULL,
  `DESCRIPCION` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_de_precio`
--

INSERT INTO `tipo_de_precio` (`ID_TIPO_DE_PRECIO`, `DESCRIPCION`) VALUES
(1, 'REGULAR'),
(2, 'PROMOCION'),
(3, 'LIQUIDACION');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_USUARIO` int(11) NOT NULL,
  `NOMBREU` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `contrasena` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` bit(1) DEFAULT NULL,
  `ID_CLIENTE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_USUARIO`, `NOMBREU`, `correo`, `contrasena`, `estado`, `ID_CLIENTE`) VALUES
(8, 'PREUBA1', 'saguro@test.com', 'PREUBA1', b'1', 17),
(11, 'Manuel324', 'guardadosamuel@gmail.com', 'Manuel32', b'1', 26);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID_CLIENTE`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`ID_FACTURA`),
  ADD KEY `FACTURA_IF_FORMA_DE_PAGO` (`ID_FORMA_DE_PAGO`),
  ADD KEY `fk_cliente_idx` (`ID_CLIENTE`),
  ADD KEY `fk_factura_producto1_idx` (`ID_PRODUCTO`);

--
-- Indices de la tabla `forma_de_pago`
--
ALTER TABLE `forma_de_pago`
  ADD PRIMARY KEY (`ID_FORMA_DE_PAGO`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID_PRODUCTO`),
  ADD KEY `PRODUCTO_TIPO_DE_PRECIO_FK` (`ID_TIPO_DE_PRECIO`);

--
-- Indices de la tabla `recurso`
--
ALTER TABLE `recurso`
  ADD PRIMARY KEY (`id_recurso`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `rol_recurso`
--
ALTER TABLE `rol_recurso`
  ADD PRIMARY KEY (`id_rol_recurso`),
  ADD KEY `fk_rol_idx` (`id_rol`),
  ADD KEY `fk_perfil_idx` (`id_recurso`);

--
-- Indices de la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  ADD PRIMARY KEY (`id_rol_usuario`),
  ADD KEY `fk_usuario_idx` (`id_usuario`),
  ADD KEY `fk_rol_idx` (`id_rol`);

--
-- Indices de la tabla `tipo_de_precio`
--
ALTER TABLE `tipo_de_precio`
  ADD PRIMARY KEY (`ID_TIPO_DE_PRECIO`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USUARIO`),
  ADD KEY `fk_cliente_usuario_idx` (`ID_CLIENTE`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID_CLIENTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `recurso`
--
ALTER TABLE `recurso`
  MODIFY `id_recurso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol_recurso`
--
ALTER TABLE `rol_recurso`
  MODIFY `id_rol_recurso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  MODIFY `id_rol_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `FACTURA_IF_FORMA_DE_PAGO` FOREIGN KEY (`ID_FORMA_DE_PAGO`) REFERENCES `forma_de_pago` (`ID_FORMA_DE_PAGO`),
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `cliente` (`ID_CLIENTE`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_factura_producto1` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `PRODUCTO_TIPO_DE_PRECIO_FK` FOREIGN KEY (`ID_TIPO_DE_PRECIO`) REFERENCES `tipo_de_precio` (`ID_TIPO_DE_PRECIO`);

--
-- Filtros para la tabla `rol_recurso`
--
ALTER TABLE `rol_recurso`
  ADD CONSTRAINT `fk_perfil` FOREIGN KEY (`id_recurso`) REFERENCES `recurso` (`id_recurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  ADD CONSTRAINT `fk_rol_usuario` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`ID_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_cliente_usuario` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `cliente` (`ID_CLIENTE`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
