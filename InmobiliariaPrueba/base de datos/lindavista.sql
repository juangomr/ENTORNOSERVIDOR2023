-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2023 a las 20:18:40
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lindavista`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viviendas`
--

CREATE TABLE `viviendas` (
  `id_vivienda` smallint(10) UNSIGNED NOT NULL,
  `tipo` enum('Piso','Adosado','Chalet','Casa') NOT NULL,
  `zona` enum('Centro','Nervion','Triana','Aljarafe','Macarena') NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `num_dormitorios` enum('1','2','3','4','5') NOT NULL DEFAULT '3',
  `precio` decimal(9,2) NOT NULL,
  `tamano` decimal(6,2) NOT NULL,
  `extras` varchar(100) NOT NULL DEFAULT 'Ninguno',
  `foto` varchar(200) DEFAULT NULL,
  `observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `viviendas`
--

INSERT INTO `viviendas` (`id_vivienda`, `tipo`, `zona`, `direccion`, `num_dormitorios`, `precio`, `tamano`, `extras`, `foto`, `observaciones`) VALUES
(36, 'Piso', 'Nervion', 'Clavel', '2', 25.00, 87.00, 'Garage', '<a href=http://localhost/entornoServidor/InmobiliariaPrueba/imagenes/casa.png target=_blank>casa.png</a>', 'Tiene una puerta rota'),
(37, 'Adosado', 'Centro', 'Cruces', '3', 95.00, 125.00, 'Jardin, Garage', '<a href=http://localhost/entornoServidor/InmobiliariaPrueba/imagenes/casa.png target=_blank>casa.png</a>', 'Amplio jardín'),
(38, 'Chalet', 'Triana', 'Rosales', '3', 36.00, 99.00, 'Piscina', '<a href=http://localhost/entornoServidor/InmobiliariaPrueba/imagenes/casa.png target=_blank>casa.png</a>', 'Necesita reforma.'),
(39, 'Casa', 'Aljarafe', 'Violeta', '5', 150.00, 60.00, 'Ninguno', '<a href=http://localhost/entornoServidor/InmobiliariaPrueba/imagenes/casa.png target=_blank>casa.png</a>', 'Barrio conflictivo.'),
(40, 'Piso', 'Aljarafe', 'Margarita', '5', 195.00, 114.00, 'Piscina, Garage', '<a href=http://localhost/entornoServidor/InmobiliariaPrueba/imagenes/casa.png target=_blank>casa.png</a>', 'Centro ciudad.'),
(41, 'Adosado', 'Macarena', 'Malagueñas', '1', 10.00, 55.00, 'Ninguno', '<a href=http://localhost/entornoServidor/InmobiliariaPrueba/imagenes/casa.png target=_blank>casa.png</a>', 'Ocupada.'),
(42, 'Chalet', 'Nervion', 'Torneo', '5', 220.00, 198.00, 'Piscina, Jardin, Garage', '<a href=http://localhost/entornoServidor/InmobiliariaPrueba/imagenes/casa.png target=_blank>casa.png</a>', 'Amplia y acogedora.'),
(43, 'Casa', 'Triana', 'Alegría', '3', 60.00, 90.00, 'Garage', '<a href=http://localhost/entornoServidor/InmobiliariaPrueba/imagenes/casa.png target=_blank>casa.png</a>', 'Vecinos conflictivos.'),
(44, 'Piso', 'Nervion', 'Andalucía', '4', 88.00, 95.00, 'Garage', '<a href=http://localhost/entornoServidor/InmobiliariaPrueba/imagenes/casa.png target=_blank>casa.png</a>', 'No procede.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `viviendas`
--
ALTER TABLE `viviendas`
  ADD PRIMARY KEY (`id_vivienda`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `viviendas`
--
ALTER TABLE `viviendas`
  MODIFY `id_vivienda` smallint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
