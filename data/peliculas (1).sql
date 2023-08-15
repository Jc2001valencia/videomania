-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2023 a las 23:14:43
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
-- Base de datos: `peliculas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id_pelicula` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `year` year(4) NOT NULL,
  `director` varchar(50) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `portada` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id_pelicula`, `titulo`, `descripcion`, `year`, `director`, `genero`, `portada`) VALUES
(6, 'Titanic', 'Un romance épico en el trágico viaje inaugural del RMS Titanic.', '1997', 'James Cameron', 'Romance y Drama', '../portadas/titanic.jpg'),
(7, 'El Padrino', 'La historia de una familia mafiosa en Estados Unidos.', '1972', 'Francis Ford Coppola', 'Crimen, Drama', '../portadas/elpadrino.jpeg'),
(8, 'El Señor de los Anillos: La Comunidad del Anillo', 'La primera entrega de la trilogía basada en la obra de J.R.R. Tolkien.', '2001', 'Peter Jackson', 'Fantasía, Aventura', '../portadas/anillos.jpg'),
(9, 'Jurassic Park', 'Un parque temático de dinosaurios se convierte en una pesadilla.', '1993', 'Steven Spielberg', 'Ciencia ficción, Aventura', '../portadas/jurassic.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reproduccion`
--

CREATE TABLE `reproduccion` (
  `id_reproduccion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_pelicula` int(11) NOT NULL,
  `fecha_reproduccion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reproduccion`
--

INSERT INTO `reproduccion` (`id_reproduccion`, `id_usuario`, `id_pelicula`, `fecha_reproduccion`) VALUES
(17, 7, 7, '2023-05-27'),
(19, 21, 9, '2023-05-27'),
(22, 21, 6, '2023-05-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio`
--

CREATE TABLE `socio` (
  `id_socio` int(11) NOT NULL,
  `id_suscripcion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `socio`
--

INSERT INTO `socio` (`id_socio`, `id_suscripcion`, `id_usuario`, `fecha_ini`, `fecha_fin`) VALUES
(1, 1, 1, '2023-01-01', '2023-12-31'),
(2, 2, 2, '2023-03-15', '2023-06-15'),
(3, 1, 3, '2023-04-01', '2023-09-30'),
(7, 2, 22, '2023-05-27', '0000-00-00'),
(8, 2, 23, '2023-05-28', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripcion`
--

CREATE TABLE `suscripcion` (
  `id_suscripcion` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `suscripcion`
--

INSERT INTO `suscripcion` (`id_suscripcion`, `titulo`, `descripcion`, `precio`) VALUES
(1, 'Básica', 'Descripción de la suscripción básica', 9.99),
(2, 'Premium', 'Descripción de la suscripción premium', 19.99),
(3, ' VIP', 'Descripción de la suscripción VIP', 29.99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `fecha_registro` date NOT NULL,
  `verification_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nombre`, `apellido`, `email`, `password`, `telefono`, `fecha_registro`, `verification_code`) VALUES
(1, 'juan', 'pascuas', 'correo@ejemplo.com', 'JgNNr9bg', '666', '2023-01-01', 0),
(2, 'Nombre2', 'Apellido2', 'correo2@example.com', 'SnMykqhH', '987654321', '2023-02-15', 935721),
(3, 'Nombre3', 'Apellido3', 'correo3@example.com', 'contraseña3', '555555555', '2023-04-01', 606230),
(4, 'Juan Camilo', 'Valencia', 'juan@example.com', 'tyXLTGFl', '3218666530', '2023-04-01', 0),
(5, 'camilo', 'Valencia', 'j@j.com', '7c222fb2927d828af22f592134e8932480637c0d', '5555', '2023-05-22', 0),
(6, 'peter', 'pascuas', 'pascuas@example.com', '7c222fb2927d828af22f592134e8932480637c0d', '5555', '2023-05-22', 811602),
(7, 'Cristian', ' Mosquera', 'cristian@example.com', '7c222fb2927d828af22f592134e8932480637c0d', '5555', '2023-05-27', 157273),
(21, 'Pamela ', 'Estrella', 'pamela@example.com', '7c222fb2927d828af22f592134e8932480637c0d', '5555', '2023-05-27', 401065),
(22, 'juan', 'Estrella', '123@example.com', '7c222fb2927d828af22f592134e8932480637c0d', '5555', '2023-05-27', 0),
(23, 'nombre', 'apellidos', 'nombre@correo.com', '7c222fb2927d828af22f592134e8932480637c0d', '5555', '2023-05-28', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id_pelicula`);

--
-- Indices de la tabla `reproduccion`
--
ALTER TABLE `reproduccion`
  ADD PRIMARY KEY (`id_reproduccion`),
  ADD KEY `id_usuario` (`id_usuario`,`id_pelicula`),
  ADD KEY `id_pelicula` (`id_pelicula`);

--
-- Indices de la tabla `socio`
--
ALTER TABLE `socio`
  ADD PRIMARY KEY (`id_socio`),
  ADD KEY `id_suscripcion` (`id_suscripcion`,`id_usuario`),
  ADD KEY `socio_ibfk_1` (`id_usuario`);

--
-- Indices de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  ADD PRIMARY KEY (`id_suscripcion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id_pelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `reproduccion`
--
ALTER TABLE `reproduccion`
  MODIFY `id_reproduccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `socio`
--
ALTER TABLE `socio`
  MODIFY `id_socio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  MODIFY `id_suscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reproduccion`
--
ALTER TABLE `reproduccion`
  ADD CONSTRAINT `reproduccion_ibfk_1` FOREIGN KEY (`id_pelicula`) REFERENCES `pelicula` (`id_pelicula`),
  ADD CONSTRAINT `reproduccion_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuarios`);

--
-- Filtros para la tabla `socio`
--
ALTER TABLE `socio`
  ADD CONSTRAINT `socio_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `socio_ibfk_2` FOREIGN KEY (`id_suscripcion`) REFERENCES `suscripcion` (`id_suscripcion`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
