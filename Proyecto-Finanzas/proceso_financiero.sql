-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2022 a las 23:53:30
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proceso_financiero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `nroCuenta` int(11) NOT NULL,
  `saldo` int(11) NOT NULL,
  `idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`nroCuenta`, `saldo`, `idPersona`) VALUES
(1, 1112, 1),
(2, 323, 1),
(3, 1000, 2),
(4, 2000, 2),
(5, 3000, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flujo`
--

CREATE TABLE `flujo` (
  `id` int(11) NOT NULL,
  `flujo` varchar(10) NOT NULL,
  `proceso` varchar(10) NOT NULL,
  `procesoSig` varchar(11) DEFAULT NULL,
  `tipo` varchar(10) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `pantalla` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `flujo`
--

INSERT INTO `flujo` (`id`, `flujo`, `proceso`, `procesoSig`, `tipo`, `rol`, `pantalla`) VALUES
(1, 'F1', 'P1', 'P2', 'I', 'cliente', 'datos.php'),
(2, 'F1', 'P2', 'P3', 'P', 'cliente', 'cuenta.php'),
(3, 'F1', 'P3', NULL, 'P', 'cliente', 'procesos.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `rol` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombre`, `password`, `rol`) VALUES
(1, 'Walter', 'cliente', 'cliente'),
(2, 'Laura', 'cliente', 'cajero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso_deposito`
--

CREATE TABLE `proceso_deposito` (
  `id` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `razon` varchar(20) NOT NULL,
  `monto` varchar(100) NOT NULL,
  `nroCuenta` int(11) NOT NULL,
  `fechaIni` datetime NOT NULL,
  `accion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proceso_deposito`
--

INSERT INTO `proceso_deposito` (`id`, `id_persona`, `razon`, `monto`, `nroCuenta`, `fechaIni`, `accion`) VALUES
(1, 1, 'aaa', '120', 1, '2022-12-10 00:56:49', 'Deposito'),
(2, 1, 'www', '8', 1, '2022-12-10 01:00:11', 'Retiro'),
(3, 1, 'xgsf', '523', 2, '2022-12-10 01:09:47', 'Deposito'),
(4, 1, 'Compra laptop', '100', 2, '2022-12-10 03:04:17', 'Retiro'),
(5, 1, 'Pago Sueldo Diciembr', '1000', 1, '2022-12-11 23:46:13', 'Deposito'),
(6, 1, 'Compra zapatos', '100', 2, '2022-12-11 23:46:46', 'Retiro');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`nroCuenta`),
  ADD KEY `idPersona` (`idPersona`);

--
-- Indices de la tabla `flujo`
--
ALTER TABLE `flujo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proceso_deposito`
--
ALTER TABLE `proceso_deposito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_persona` (`id_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `nroCuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `flujo`
--
ALTER TABLE `flujo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proceso_deposito`
--
ALTER TABLE `proceso_deposito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD CONSTRAINT `cuenta_ibfk_1` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `proceso_deposito`
--
ALTER TABLE `proceso_deposito`
  ADD CONSTRAINT `proceso_deposito_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
