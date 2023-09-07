-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-09-2023 a las 07:36:10
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
-- Base de datos: `proyecto_final`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_ad` int(11) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `contrasena` varchar(300) NOT NULL,
  `nombres` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_ad`, `correo`, `contrasena`, `nombres`) VALUES
(1, 'admin@admin', '123123', 'miluska');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id_estudiante` int(11) NOT NULL,
  `nombres` varchar(150) NOT NULL,
  `apellido` varchar(150) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `contrasena` varchar(200) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `matricula` varchar(300) NOT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_estudiante`, `nombres`, `apellido`, `correo`, `contrasena`, `direccion`, `matricula`, `fecha_nacimiento`) VALUES
(1, 'milu', ' urgos', 'milu@milu', '123123', 'av canada', '1002244325', '2002-03-17'),
(3, 'Emanuel jorge', 'qqqqqqq', 'kelmithmm@gmail.com', '123123', 'Av. Los Cedros', 'matematica', '2023-09-06'),
(4, 'milurrrr', 'jose', 'pedro@gmail.com', '123123', 'ate', 'comunicacion', '2023-09-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `astronomia`
--

CREATE TABLE `astronomia` (
  `id_curso` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `alumno_nombres` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `nombre_cursos` varchar(100) NOT NULL,
  `periodo` varchar(100) NOT NULL,
  `maestro_asignado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `nombre_cursos`, `periodo`, `maestro_asignado`) VALUES
(1, 'guarani', '1 años', '1'),
(2, 'astronomia', '5 años', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guarani`
--

CREATE TABLE `guarani` (
  `id_curso` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `alumno_nombres` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idioma`
--

CREATE TABLE `idioma` (
  `id_curso` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `alumno_nombres` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE `maestros` (
  `id_maestro` int(11) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `contrasena` varchar(150) NOT NULL,
  `nombres` varchar(150) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `fecha_naci` varchar(50) NOT NULL,
  `clase_asignada` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`id_maestro`, `correo`, `contrasena`, `nombres`, `apellidos`, `direccion`, `fecha_naci`, `clase_asignada`) VALUES
(1, 'gerencia@gmail.com', '1234', 'Emanuel jorgerrrr', 'perez', 'lima', '2023-09-26', '2'),
(2, 'gerencia@gmail.com', '123123', 'Emanuel jorgeHHHHH', 'perez', 'Av. Los Cedros', '2023-09-06', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matematica`
--

CREATE TABLE `matematica` (
  `id_curso` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `alumno_nombres` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `name` varchar(150) NOT NULL,
  `contra` varchar(150) NOT NULL,
  `cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_ad`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_estudiante`);

--
-- Indices de la tabla `astronomia`
--
ALTER TABLE `astronomia`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `guarani`
--
ALTER TABLE `guarani`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `idioma`
--
ALTER TABLE `idioma`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`id_maestro`);

--
-- Indices de la tabla `matematica`
--
ALTER TABLE `matematica`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_ad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `astronomia`
--
ALTER TABLE `astronomia`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `guarani`
--
ALTER TABLE `guarani`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `idioma`
--
ALTER TABLE `idioma`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `maestros`
--
ALTER TABLE `maestros`
  MODIFY `id_maestro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `matematica`
--
ALTER TABLE `matematica`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `astronomia`
--
ALTER TABLE `astronomia`
  ADD CONSTRAINT `fk_astro_curso` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id`);

--
-- Filtros para la tabla `guarani`
--
ALTER TABLE `guarani`
  ADD CONSTRAINT `fk_guarani_curso` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id`);

--
-- Filtros para la tabla `idioma`
--
ALTER TABLE `idioma`
  ADD CONSTRAINT `fk_idioma_curso` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id`);

--
-- Filtros para la tabla `matematica`
--
ALTER TABLE `matematica`
  ADD CONSTRAINT `fk_matematica_curso` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
