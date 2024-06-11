-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2024 a las 23:45:52
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lamesacuadrada`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juego`
--

CREATE TABLE `juego` (
  `id_juego` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `enlace` varchar(100) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `minJugadores` int(11) NOT NULL,
  `maxJugadores` int(11) NOT NULL,
  `tutorial` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `juego`
--

INSERT INTO `juego` (`id_juego`, `nombre`, `enlace`, `imagen`, `descripcion`, `minJugadores`, `maxJugadores`, `tutorial`) VALUES
(1, 'Tuki Tuki', 'tuki', 'tuki_card.png', 'Texto descriptivo para Tuki.', 2, 6, '<iframe class=\"mx-auto d-block\" width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/eVjyV8ZUfxQ?si=T27GyPoZwqD6m-iW\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>'),
(2, 'Scattergories', 'scattergories', 'scattergories_card.jpg', 'Texto descriptivo para Scattergories.', 3, 8, ''),
(4, 'Carcassone', 'carcasone', 'carcassonne_card.jpg', 'Texto descriptivo para Carcassone.', 2, 10, ''),
(21, 'Bang', 'bang', 'bang.jpg', 'Un texto cualquiera', 2, 10, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombreUsuario` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombreUsuario`, `email`, `password`, `estado`) VALUES
(3, 'prueba', 'prueba.com', '1234', 'Activo'),
(5, 'Adrián', 'adrianarjonabravo@gmail.com', '1234', 'Activo'),
(17, 'Máximo', 'prueba@correo.co', 'Pepito1!', 'Activo'),
(19, 'Sarasa', 'adrianarjonabravo@hotmail.es', 'Pepito1!', 'Activo'),
(20, 'Juan', 'juan@gmail.com', 'Pepito1!', 'Activo'),
(21, 'UsUario', 'antonio@gmail.com', 'Pepito1!', 'Activo'),
(22, 'Ellina', 'elina@asdf.com', 'Pepito1!', 'Activo'),
(23, 'Artemisa', 'artemisa@correo.com', 'Pepito1!', 'Activo'),
(24, 'Sara', 'asdfa@sdfa.com', 'Pepito1!', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_token`
--

CREATE TABLE `usuarios_token` (
  `id_token` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `token` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios_token`
--

INSERT INTO `usuarios_token` (`id_token`, `id_usuario`, `token`, `estado`, `fecha`) VALUES
(1, 1, '1fd38511c43ae0b95bffcdcf26b7121e', 'Activo', '2024-06-01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `juego`
--
ALTER TABLE `juego`
  ADD PRIMARY KEY (`id_juego`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `usuarios_token`
--
ALTER TABLE `usuarios_token`
  ADD PRIMARY KEY (`id_token`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `juego`
--
ALTER TABLE `juego`
  MODIFY `id_juego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `usuarios_token`
--
ALTER TABLE `usuarios_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
