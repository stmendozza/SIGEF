-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-04-2019 a las 21:50:15
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_sigef`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_acceso_modulos_x_usuario`
--

CREATE TABLE `tb_acceso_modulos_x_usuario` (
  `cod_acceso` int(11) NOT NULL,
  `activado` tinyint(1) NOT NULL DEFAULT '0',
  `cod_mod_usu` int(11) NOT NULL,
  `cod_usuario_acceso_mod` int(11) NOT NULL,
  `fecha_acceso_mod` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_categorias_productos`
--

CREATE TABLE `tb_categorias_productos` (
  `cod_categ` int(11) NOT NULL,
  `nom_categ` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_categorias_productos`
--

INSERT INTO `tb_categorias_productos` (`cod_categ`, `nom_categ`) VALUES
(1, 'dolor'),
(2, 'aseo personal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `cod_clie` int(11) NOT NULL,
  `cod_usuario_clie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_clientes`
--

INSERT INTO `tb_clientes` (`cod_clie`, `cod_usuario_clie`) VALUES
(3, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_compras`
--

CREATE TABLE `tb_compras` (
  `cod_compra` int(11) NOT NULL,
  `cod_provee_comp` int(11) NOT NULL,
  `cod_emple_comp` int(11) NOT NULL,
  `cod_factura_comp` varchar(20) NOT NULL,
  `fecha_registro_compra` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_detalles_compras`
--

CREATE TABLE `tb_detalles_compras` (
  `cod_comp_detalles` int(11) NOT NULL,
  `cod_prod_detalles` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `cantidad_compra` int(11) NOT NULL,
  `costo_unitario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_detalles_facturas`
--

CREATE TABLE `tb_detalles_facturas` (
  `cod_factu_detalles` int(11) NOT NULL,
  `cod_prod_detalles_factu` int(11) NOT NULL,
  `cantidad_detalles_factu` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `ganancia_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_detalles_promos`
--

CREATE TABLE `tb_detalles_promos` (
  `cod_promo_detalles` int(11) NOT NULL,
  `cod_prod_detalles` int(11) NOT NULL,
  `cantidad_detalles_promo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_empleados`
--

CREATE TABLE `tb_empleados` (
  `cod_emple` int(11) NOT NULL,
  `cod_usuario_emple` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_facturas`
--

CREATE TABLE `tb_facturas` (
  `cod_factu` int(11) NOT NULL,
  `iva` int(2) NOT NULL,
  `total_ganancia` int(11) NOT NULL,
  `total_factu` int(15) NOT NULL,
  `descuento` int(11) NOT NULL,
  `subtotal` int(15) NOT NULL,
  `forma_pago` varchar(20) NOT NULL,
  `cod_clie_factu` int(11) NOT NULL,
  `cod_emple_factu` int(11) NOT NULL,
  `fecha_registro_factura` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_formas_pago`
--

CREATE TABLE `tb_formas_pago` (
  `forma_pago` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_forma_pago_x_factura`
--

CREATE TABLE `tb_forma_pago_x_factura` (
  `forma_pago_factu` varchar(15) NOT NULL,
  `cod_factu_forma_pago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_kardex`
--

CREATE TABLE `tb_kardex` (
  `cod_kardex` int(11) NOT NULL,
  `descripcion` varchar(140) NOT NULL,
  `unidad` varchar(11) NOT NULL,
  `valor_unitario` int(11) NOT NULL,
  `cantidad_ingreso` int(11) NOT NULL,
  `valor_ingreso` int(15) NOT NULL,
  `cantidad_salida` int(11) NOT NULL,
  `valor_salida` int(15) NOT NULL,
  `cantidad_saldo` int(11) NOT NULL,
  `valor_saldo` int(15) NOT NULL,
  `nom_tipo_kardex` varchar(6) NOT NULL,
  `saldo_comprobacion` int(15) NOT NULL,
  `cod_prod_kardex` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_modulos`
--

CREATE TABLE `tb_modulos` (
  `cod_mod` int(11) NOT NULL,
  `nom_mod` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_movientos_kardex`
--

CREATE TABLE `tb_movientos_kardex` (
  `cod_movimiento_kardex` int(11) NOT NULL,
  `cod_kardex_movi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_movimientos`
--

CREATE TABLE `tb_movimientos` (
  `cod_movimiento` int(11) NOT NULL,
  `descripcion` varchar(140) NOT NULL,
  `tipo_movimiento` varchar(20) NOT NULL,
  `fecha_registro_movimiento` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_notificaciones`
--

CREATE TABLE `tb_notificaciones` (
  `cod_notifi` int(5) NOT NULL,
  `nom_notifi` varchar(30) NOT NULL,
  `mensaje_notifi` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_notificacion_x_usuario`
--

CREATE TABLE `tb_notificacion_x_usuario` (
  `cod_notifi_usu` int(5) NOT NULL,
  `cod_usuario_notifi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_novedades_x_compra`
--

CREATE TABLE `tb_novedades_x_compra` (
  `cod_nove_compra` int(11) NOT NULL,
  `descripcion` varchar(140) NOT NULL,
  `cod_prod_nove_comp` int(11) NOT NULL,
  `cod_emple_nove_comp` int(11) NOT NULL,
  `cod_compra_nove` int(11) NOT NULL,
  `fecha_registro_nove_comp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_novedades_x_venta`
--

CREATE TABLE `tb_novedades_x_venta` (
  `cod_nove_venta` int(11) NOT NULL,
  `descripcion` varchar(140) NOT NULL,
  `cod_prod_nove_venta` int(11) NOT NULL,
  `cod_emple_nove_venta` int(11) NOT NULL,
  `cod_factu_nove_venta` int(11) NOT NULL,
  `fecha_registro_nove_venta` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_productos`
--

CREATE TABLE `tb_productos` (
  `cod_prod` int(11) NOT NULL,
  `descripcion` varchar(140) NOT NULL,
  `precio_costo` int(11) NOT NULL,
  `precio_venta` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estado` varchar(15) NOT NULL,
  `cantidad_min` int(11) NOT NULL,
  `cantidad_max` int(11) NOT NULL,
  `lote` varchar(20) NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `requiere_formula` int(11) NOT NULL,
  `cod_categ_prod` int(11) NOT NULL,
  `cod_tipo_prod` int(11) NOT NULL,
  `fecha_registro_prod` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_productos`
--

INSERT INTO `tb_productos` (`cod_prod`, `descripcion`, `precio_costo`, `precio_venta`, `cantidad`, `estado`, `cantidad_min`, `cantidad_max`, `lote`, `fecha_vencimiento`, `requiere_formula`, `cod_categ_prod`, `cod_tipo_prod`, `fecha_registro_prod`) VALUES
(1206124, 'acetaminofen 1000', 800, 1000, 40, 'agotandose', 10, 100, '1636', '2022-12-31', 1, 1, 1, '2019-04-19'),
(1206125, 'gaza rollo', 800, 1000, 40, 'disponible', 10, 100, '1636', '2022-12-31', 1, 1, 2, '2019-04-19'),
(1206126, 'cocacola 500', 800, 1000, 40, 'disponible', 10, 100, '1636', '2022-12-31', 1, 1, 2, '2019-04-19'),
(1206127, 'pañales etapa 3', 800, 1000, 40, 'agotado', 10, 100, '1636', '2022-12-31', 1, 1, 2, '2019-04-19'),
(1206128, 'citratricure 200gr', 800, 1000, 40, 'en cuarentena', 10, 100, '1636', '2022-12-31', 1, 1, 1, '2019-04-19'),
(1206129, 'papel higienico', 800, 1000, 40, 'disponible', 10, 100, '1636', '2022-12-31', 1, 1, 1, '2019-04-19'),
(1206132, 'ibuprofemo 1000', 800, 1000, 40, 'disponible', 10, 100, '1636', '2022-12-31', 1, 1, 1, '2019-04-19'),
(11220612, 'ibuprofeno 500', 800, 1000, 40, 'disponible', 10, 100, '1636', '2022-12-31', 1, 1, 1, '2019-04-19'),
(12000612, 'naproxeno 250', 800, 1000, 40, 'disponible', 10, 100, '1636', '2022-12-31', 1, 1, 1, '2019-04-19'),
(12009612, 'desodoreante', 1500, 2500, 4, 'disponible', 5, 10, '3233', '2019-04-24', 0, 2, 2, '2019-04-23'),
(12046122, 'cinta aislante', 800, 1000, 40, 'disponible', 10, 100, '1636', '2022-12-31', 1, 1, 1, '2019-04-19'),
(12061212, 'acetaminofen 500', 800, 1000, 40, 'disponible', 10, 100, '1636', '2022-12-31', 1, 1, 1, '2019-04-19'),
(120619982, 'rolon stick', 800, 1000, 40, 'disponible', 10, 100, '1636', '2022-12-31', 1, 1, 1, '2019-04-19'),
(120688912, 'sprite', 800, 1000, 40, 'disponible', 10, 100, '1636', '2022-12-31', 1, 1, 1, '2019-04-19'),
(1206120012, 'acetaminofen 500', 800, 1000, 40, 'disponible', 10, 100, '1636', '2022-12-31', 1, 1, 1, '2019-04-19'),
(1206616762, 'culb colomi', 800, 1000, 40, 'agotandose', 10, 100, '1636', '2022-12-31', 1, 1, 1, '2019-04-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_promociones`
--

CREATE TABLE `tb_promociones` (
  `cod_promo` int(11) NOT NULL,
  `descripcion_promo` varchar(100) NOT NULL,
  `fecha_registro_promo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_promociones`
--

INSERT INTO `tb_promociones` (`cod_promo`, `descripcion_promo`, `fecha_registro_promo`) VALUES
(1, '3x1', '2019-04-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_provedores`
--

CREATE TABLE `tb_provedores` (
  `cod_prove` int(11) NOT NULL,
  `cod_usuario_prove` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_provedores`
--

INSERT INTO `tb_provedores` (`cod_prove`, `cod_usuario_prove`) VALUES
(2, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_reportes`
--

CREATE TABLE `tb_reportes` (
  `cod_reporte` int(11) NOT NULL,
  `nom_reporte` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_reportes_x_empleado`
--

CREATE TABLE `tb_reportes_x_empleado` (
  `cod_reporte_emple` int(11) NOT NULL,
  `cod_emple_reporte` int(11) NOT NULL,
  `documento` date NOT NULL,
  `fecha_reporte` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_roles`
--

CREATE TABLE `tb_roles` (
  `cod_rol` int(11) NOT NULL,
  `nom_rol` varchar(20) NOT NULL,
  `responsabilidades` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_roles`
--

INSERT INTO `tb_roles` (`cod_rol`, `nom_rol`, `responsabilidades`) VALUES
(1, 'cliente', 'comprar maricaditas'),
(2, 'desarrollador', 'analisis, diseño, desarrollo, implementacion y mantenimiento del software'),
(3, 'vendedor', 'facturar los pedidos de los clientes '),
(4, 'administrador', 'gestionar la parte administrativa de la farcamacia'),
(5, 'provedor', 'abastecer la farmacia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipos_kardex`
--

CREATE TABLE `tb_tipos_kardex` (
  `nom_tipo_kardex` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipos_productos`
--

CREATE TABLE `tb_tipos_productos` (
  `cod_tipo` int(11) NOT NULL,
  `nom_tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_tipos_productos`
--

INSERT INTO `tb_tipos_productos` (`cod_tipo`, `nom_tipo`) VALUES
(1, 'rollon'),
(2, 'medicamentos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `cod_usuario` int(11) NOT NULL,
  `cod_rol_usu` int(11) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `nom_usu` varchar(40) NOT NULL,
  `telefono_usu` varchar(10) NOT NULL,
  `direccion_usu` varchar(300) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pass` varchar(130) NOT NULL,
  `token` varchar(40) NOT NULL,
  `token_contra` varchar(100) NOT NULL,
  `activado` int(11) NOT NULL DEFAULT '0',
  `solicitud_contra` int(11) NOT NULL DEFAULT '0',
  `ultima_sesion` datetime NOT NULL,
  `fecha_registro_usu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`cod_usuario`, `cod_rol_usu`, `usuario`, `nom_usu`, `telefono_usu`, `direccion_usu`, `email`, `pass`, `token`, `token_contra`, `activado`, `solicitud_contra`, `ultima_sesion`, `fecha_registro_usu`) VALUES
(9, 2, 'stmendozza', 'Cristhian Mendoza', '3145793722', 'Diagonal 49g SUR #6-33 tercer piso', 'stmendozza@gmail.com', '$2y$10$bc3oQ.Jf3AXXnkkPgVngLuVi7e5hQwfpAe1bipdHZfp3I52WGTDZu', 'db1bee2ecb13edba3a7da4d7435d89b8', '', 1, 1, '2019-04-29 14:49:51', '2019-04-29 13:17:06'),
(10, 1, 'elpatron', 'Danilo Escobar', '3133957636', 'la 40', 'cristhiancm-1@hotmail.com', '$2y$10$gVCCQOk0PZI/ALaefFoEKenF49LhaRlKuuV5rJFRylSJX67e9m6qq', 'cf03eeec0e2431e172dddefc2d31b619', '', 1, 1, '2019-04-29 14:01:18', '2019-04-29 14:00:14'),
(11, 4, 'geffam', 'Gestor de Farmacia', '5840633', 'San Jose del Guaviare', 'pruebasgeffam@gmail.com', '$2y$10$130aR2ppsWQ3BqWW174Rwuv6Cjhmli.A3wOtPH3r.uiKzuICkCvwW', '9655af6456513f141c59c838e7d0baff', '', 1, 1, '2019-04-29 14:09:21', '2019-04-29 14:04:00'),
(12, 5, 'fernanflow', 'Fernando Anzola', '3134135887', 'Av. dorada 34-12', 'fernandoanzola910@gmail.com', '$2y$10$b8.USNxCWeg6rvHetcXmGO2Bpy/lizslGN0W5aKJxnrAyIhwdc4d2', '8ad37ce4af157a58fe15fab6aa06d30d', '', 1, 1, '2019-04-29 14:17:50', '2019-04-29 14:16:19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_acceso_modulos_x_usuario`
--
ALTER TABLE `tb_acceso_modulos_x_usuario`
  ADD PRIMARY KEY (`cod_acceso`),
  ADD KEY `cod_mod_usu` (`cod_mod_usu`),
  ADD KEY `cod_usuario_acceso_mod` (`cod_usuario_acceso_mod`);

--
-- Indices de la tabla `tb_categorias_productos`
--
ALTER TABLE `tb_categorias_productos`
  ADD PRIMARY KEY (`cod_categ`);

--
-- Indices de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`cod_clie`),
  ADD KEY `cod_usuario_clie` (`cod_usuario_clie`);

--
-- Indices de la tabla `tb_compras`
--
ALTER TABLE `tb_compras`
  ADD PRIMARY KEY (`cod_compra`),
  ADD KEY `cod_provee_comp` (`cod_provee_comp`),
  ADD KEY `cod_emple_comp` (`cod_emple_comp`);

--
-- Indices de la tabla `tb_detalles_compras`
--
ALTER TABLE `tb_detalles_compras`
  ADD KEY `cod_comp_detalles` (`cod_comp_detalles`),
  ADD KEY `cod_prod_detalles` (`cod_prod_detalles`);

--
-- Indices de la tabla `tb_detalles_facturas`
--
ALTER TABLE `tb_detalles_facturas`
  ADD KEY `cod_factu_detalles` (`cod_factu_detalles`),
  ADD KEY `cod_prod_detalles_factu` (`cod_prod_detalles_factu`);

--
-- Indices de la tabla `tb_detalles_promos`
--
ALTER TABLE `tb_detalles_promos`
  ADD KEY `cod_promo_detalles` (`cod_promo_detalles`),
  ADD KEY `cod_prod_detalles` (`cod_prod_detalles`);

--
-- Indices de la tabla `tb_empleados`
--
ALTER TABLE `tb_empleados`
  ADD PRIMARY KEY (`cod_emple`),
  ADD KEY `cod_usuario_emple` (`cod_usuario_emple`);

--
-- Indices de la tabla `tb_facturas`
--
ALTER TABLE `tb_facturas`
  ADD PRIMARY KEY (`cod_factu`),
  ADD KEY `cod_emple_factu` (`cod_emple_factu`),
  ADD KEY `cod_clie_factu` (`cod_clie_factu`),
  ADD KEY `forma_pago` (`forma_pago`);

--
-- Indices de la tabla `tb_formas_pago`
--
ALTER TABLE `tb_formas_pago`
  ADD PRIMARY KEY (`forma_pago`);

--
-- Indices de la tabla `tb_forma_pago_x_factura`
--
ALTER TABLE `tb_forma_pago_x_factura`
  ADD KEY `forma_pago_factu` (`forma_pago_factu`),
  ADD KEY `cod_factu_forma_pago` (`cod_factu_forma_pago`);

--
-- Indices de la tabla `tb_kardex`
--
ALTER TABLE `tb_kardex`
  ADD PRIMARY KEY (`cod_kardex`),
  ADD KEY `cod_prod_kardex` (`cod_prod_kardex`),
  ADD KEY `nom_tipo_kardex` (`nom_tipo_kardex`);

--
-- Indices de la tabla `tb_modulos`
--
ALTER TABLE `tb_modulos`
  ADD PRIMARY KEY (`cod_mod`);

--
-- Indices de la tabla `tb_movientos_kardex`
--
ALTER TABLE `tb_movientos_kardex`
  ADD KEY `cod_movimiento_kardex` (`cod_movimiento_kardex`),
  ADD KEY `cod_kardex_movi` (`cod_kardex_movi`);

--
-- Indices de la tabla `tb_movimientos`
--
ALTER TABLE `tb_movimientos`
  ADD PRIMARY KEY (`cod_movimiento`);

--
-- Indices de la tabla `tb_notificaciones`
--
ALTER TABLE `tb_notificaciones`
  ADD PRIMARY KEY (`cod_notifi`);

--
-- Indices de la tabla `tb_notificacion_x_usuario`
--
ALTER TABLE `tb_notificacion_x_usuario`
  ADD KEY `cod_notifi_usu` (`cod_notifi_usu`),
  ADD KEY `cod_usuario_notifi` (`cod_usuario_notifi`);

--
-- Indices de la tabla `tb_novedades_x_compra`
--
ALTER TABLE `tb_novedades_x_compra`
  ADD PRIMARY KEY (`cod_nove_compra`),
  ADD KEY `cod_prod_nove_comp` (`cod_prod_nove_comp`),
  ADD KEY `cod_emple_nove_comp` (`cod_emple_nove_comp`),
  ADD KEY `cod_compra_nove` (`cod_compra_nove`);

--
-- Indices de la tabla `tb_novedades_x_venta`
--
ALTER TABLE `tb_novedades_x_venta`
  ADD PRIMARY KEY (`cod_nove_venta`),
  ADD KEY `cod_prod_nove_venta` (`cod_prod_nove_venta`),
  ADD KEY `cod_emple_nove_venta` (`cod_emple_nove_venta`),
  ADD KEY `cod_factu_nove_venta` (`cod_factu_nove_venta`);

--
-- Indices de la tabla `tb_productos`
--
ALTER TABLE `tb_productos`
  ADD PRIMARY KEY (`cod_prod`),
  ADD KEY `cod_categ_prod` (`cod_categ_prod`),
  ADD KEY `cod_tipo_prod` (`cod_tipo_prod`);

--
-- Indices de la tabla `tb_promociones`
--
ALTER TABLE `tb_promociones`
  ADD PRIMARY KEY (`cod_promo`);

--
-- Indices de la tabla `tb_provedores`
--
ALTER TABLE `tb_provedores`
  ADD PRIMARY KEY (`cod_prove`),
  ADD KEY `cod_usuario_prove` (`cod_usuario_prove`);

--
-- Indices de la tabla `tb_reportes`
--
ALTER TABLE `tb_reportes`
  ADD PRIMARY KEY (`cod_reporte`);

--
-- Indices de la tabla `tb_reportes_x_empleado`
--
ALTER TABLE `tb_reportes_x_empleado`
  ADD KEY `cod_reporte_emple` (`cod_reporte_emple`),
  ADD KEY `cod_emple_reporte` (`cod_emple_reporte`);

--
-- Indices de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
  ADD PRIMARY KEY (`cod_rol`);

--
-- Indices de la tabla `tb_tipos_kardex`
--
ALTER TABLE `tb_tipos_kardex`
  ADD PRIMARY KEY (`nom_tipo_kardex`);

--
-- Indices de la tabla `tb_tipos_productos`
--
ALTER TABLE `tb_tipos_productos`
  ADD PRIMARY KEY (`cod_tipo`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`cod_usuario`),
  ADD KEY `cod_rol_usu` (`cod_rol_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_acceso_modulos_x_usuario`
--
ALTER TABLE `tb_acceso_modulos_x_usuario`
  MODIFY `cod_acceso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_categorias_productos`
--
ALTER TABLE `tb_categorias_productos`
  MODIFY `cod_categ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  MODIFY `cod_clie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_compras`
--
ALTER TABLE `tb_compras`
  MODIFY `cod_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_empleados`
--
ALTER TABLE `tb_empleados`
  MODIFY `cod_emple` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_facturas`
--
ALTER TABLE `tb_facturas`
  MODIFY `cod_factu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_kardex`
--
ALTER TABLE `tb_kardex`
  MODIFY `cod_kardex` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_modulos`
--
ALTER TABLE `tb_modulos`
  MODIFY `cod_mod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_movimientos`
--
ALTER TABLE `tb_movimientos`
  MODIFY `cod_movimiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_notificaciones`
--
ALTER TABLE `tb_notificaciones`
  MODIFY `cod_notifi` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_novedades_x_compra`
--
ALTER TABLE `tb_novedades_x_compra`
  MODIFY `cod_nove_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_novedades_x_venta`
--
ALTER TABLE `tb_novedades_x_venta`
  MODIFY `cod_nove_venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_promociones`
--
ALTER TABLE `tb_promociones`
  MODIFY `cod_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_provedores`
--
ALTER TABLE `tb_provedores`
  MODIFY `cod_prove` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tb_reportes`
--
ALTER TABLE `tb_reportes`
  MODIFY `cod_reporte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
  MODIFY `cod_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tb_tipos_productos`
--
ALTER TABLE `tb_tipos_productos`
  MODIFY `cod_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_acceso_modulos_x_usuario`
--
ALTER TABLE `tb_acceso_modulos_x_usuario`
  ADD CONSTRAINT `tb_acceso_modulos_x_usuario_ibfk_1` FOREIGN KEY (`cod_mod_usu`) REFERENCES `tb_modulos` (`cod_mod`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_acceso_modulos_x_usuario_ibfk_2` FOREIGN KEY (`cod_usuario_acceso_mod`) REFERENCES `tb_usuarios` (`cod_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD CONSTRAINT `tb_clientes_ibfk_1` FOREIGN KEY (`cod_usuario_clie`) REFERENCES `tb_usuarios` (`cod_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_compras`
--
ALTER TABLE `tb_compras`
  ADD CONSTRAINT `tb_compras_ibfk_1` FOREIGN KEY (`cod_provee_comp`) REFERENCES `tb_provedores` (`cod_prove`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_compras_ibfk_2` FOREIGN KEY (`cod_emple_comp`) REFERENCES `tb_empleados` (`cod_emple`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_detalles_compras`
--
ALTER TABLE `tb_detalles_compras`
  ADD CONSTRAINT `tb_detalles_compras_ibfk_1` FOREIGN KEY (`cod_comp_detalles`) REFERENCES `tb_compras` (`cod_compra`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detalles_compras_ibfk_2` FOREIGN KEY (`cod_prod_detalles`) REFERENCES `tb_productos` (`cod_prod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_detalles_facturas`
--
ALTER TABLE `tb_detalles_facturas`
  ADD CONSTRAINT `tb_detalles_facturas_ibfk_1` FOREIGN KEY (`cod_factu_detalles`) REFERENCES `tb_facturas` (`cod_factu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detalles_facturas_ibfk_2` FOREIGN KEY (`cod_prod_detalles_factu`) REFERENCES `tb_productos` (`cod_prod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_detalles_promos`
--
ALTER TABLE `tb_detalles_promos`
  ADD CONSTRAINT `tb_detalles_promos_ibfk_1` FOREIGN KEY (`cod_promo_detalles`) REFERENCES `tb_promociones` (`cod_promo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detalles_promos_ibfk_2` FOREIGN KEY (`cod_prod_detalles`) REFERENCES `tb_productos` (`cod_prod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_empleados`
--
ALTER TABLE `tb_empleados`
  ADD CONSTRAINT `tb_empleados_ibfk_1` FOREIGN KEY (`cod_usuario_emple`) REFERENCES `tb_usuarios` (`cod_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_facturas`
--
ALTER TABLE `tb_facturas`
  ADD CONSTRAINT `tb_facturas_ibfk_1` FOREIGN KEY (`cod_emple_factu`) REFERENCES `tb_empleados` (`cod_emple`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_facturas_ibfk_2` FOREIGN KEY (`cod_clie_factu`) REFERENCES `tb_clientes` (`cod_clie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_facturas_ibfk_3` FOREIGN KEY (`forma_pago`) REFERENCES `tb_formas_pago` (`forma_pago`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_forma_pago_x_factura`
--
ALTER TABLE `tb_forma_pago_x_factura`
  ADD CONSTRAINT `tb_forma_pago_x_factura_ibfk_1` FOREIGN KEY (`forma_pago_factu`) REFERENCES `tb_formas_pago` (`forma_pago`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_forma_pago_x_factura_ibfk_2` FOREIGN KEY (`cod_factu_forma_pago`) REFERENCES `tb_facturas` (`cod_factu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_kardex`
--
ALTER TABLE `tb_kardex`
  ADD CONSTRAINT `tb_kardex_ibfk_1` FOREIGN KEY (`cod_prod_kardex`) REFERENCES `tb_productos` (`cod_prod`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_kardex_ibfk_2` FOREIGN KEY (`nom_tipo_kardex`) REFERENCES `tb_tipos_kardex` (`nom_tipo_kardex`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_movientos_kardex`
--
ALTER TABLE `tb_movientos_kardex`
  ADD CONSTRAINT `tb_movientos_kardex_ibfk_1` FOREIGN KEY (`cod_movimiento_kardex`) REFERENCES `tb_movimientos` (`cod_movimiento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_movientos_kardex_ibfk_2` FOREIGN KEY (`cod_kardex_movi`) REFERENCES `tb_kardex` (`cod_kardex`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_notificacion_x_usuario`
--
ALTER TABLE `tb_notificacion_x_usuario`
  ADD CONSTRAINT `tb_notificacion_x_usuario_ibfk_1` FOREIGN KEY (`cod_notifi_usu`) REFERENCES `tb_notificaciones` (`cod_notifi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_notificacion_x_usuario_ibfk_2` FOREIGN KEY (`cod_usuario_notifi`) REFERENCES `tb_usuarios` (`cod_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_novedades_x_compra`
--
ALTER TABLE `tb_novedades_x_compra`
  ADD CONSTRAINT `tb_novedades_x_compra_ibfk_1` FOREIGN KEY (`cod_prod_nove_comp`) REFERENCES `tb_productos` (`cod_prod`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_novedades_x_compra_ibfk_2` FOREIGN KEY (`cod_emple_nove_comp`) REFERENCES `tb_empleados` (`cod_emple`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_novedades_x_compra_ibfk_3` FOREIGN KEY (`cod_compra_nove`) REFERENCES `tb_compras` (`cod_compra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_novedades_x_venta`
--
ALTER TABLE `tb_novedades_x_venta`
  ADD CONSTRAINT `tb_novedades_x_venta_ibfk_1` FOREIGN KEY (`cod_prod_nove_venta`) REFERENCES `tb_productos` (`cod_prod`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_novedades_x_venta_ibfk_2` FOREIGN KEY (`cod_emple_nove_venta`) REFERENCES `tb_empleados` (`cod_emple`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_novedades_x_venta_ibfk_3` FOREIGN KEY (`cod_factu_nove_venta`) REFERENCES `tb_facturas` (`cod_factu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_productos`
--
ALTER TABLE `tb_productos`
  ADD CONSTRAINT `tb_productos_ibfk_1` FOREIGN KEY (`cod_categ_prod`) REFERENCES `tb_categorias_productos` (`cod_categ`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_productos_ibfk_2` FOREIGN KEY (`cod_tipo_prod`) REFERENCES `tb_tipos_productos` (`cod_tipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_provedores`
--
ALTER TABLE `tb_provedores`
  ADD CONSTRAINT `tb_provedores_ibfk_1` FOREIGN KEY (`cod_usuario_prove`) REFERENCES `tb_usuarios` (`cod_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_reportes_x_empleado`
--
ALTER TABLE `tb_reportes_x_empleado`
  ADD CONSTRAINT `tb_reportes_x_empleado_ibfk_1` FOREIGN KEY (`cod_reporte_emple`) REFERENCES `tb_reportes` (`cod_reporte`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_reportes_x_empleado_ibfk_2` FOREIGN KEY (`cod_emple_reporte`) REFERENCES `tb_empleados` (`cod_emple`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD CONSTRAINT `tb_usuarios_ibfk_1` FOREIGN KEY (`cod_rol_usu`) REFERENCES `tb_roles` (`cod_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
