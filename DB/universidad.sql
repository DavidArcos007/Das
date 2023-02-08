-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-02-2023 a las 00:47:01
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `universidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `CED_EST` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `NOM_EST` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `APE_EST` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `DIR_EST` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `TEL_EST` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `SEX_EST` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`CED_EST`, `NOM_EST`, `APE_EST`, `DIR_EST`, `TEL_EST`, `SEX_EST`) VALUES
('1801', 'David', 'Arcos', 'QUITO', '0979189949', 'MASCULINO'),
('1802', 'Marcelo', 'Cardenas', 'QUITO', '098415632', 'MASCULINO'),
('1803', 'John', 'Zamora', 'AMBATO', '0984125631', 'MASCULINO'),
('1804', 'Diego', 'Perez', 'LOJA', '09874125', 'MASCULINO'),
('1806', 'Daniel', 'Albornoz', 'RIOBAMBA', '097415632', 'MASCULINO'),
('1809', 'x', 'x', 'x', 'x', 'MASCULINO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `CED_USU` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `NOM_USU` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `APE_USU` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `CLA_USU` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `PER_USU` varchar(13) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`CED_USU`, `NOM_USU`, `APE_USU`, `CLA_USU`, `PER_USU`) VALUES
('1805284997', 'DAVID', 'ARCOS', '1234', 'ADMINISTRADOR');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`CED_EST`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`CED_USU`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
