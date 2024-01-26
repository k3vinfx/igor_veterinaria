-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-01-2024 a las 06:25:59
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
-- Base de datos: `mvc_vet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotadatos`
--

CREATE TABLE `mascotadatos` (
  `idMascota` int(11) NOT NULL,
  `nombreMascota` varchar(100) NOT NULL,
  `especieMascota` varchar(100) NOT NULL,
  `razaMascota` varchar(20) NOT NULL,
  `fechaNaciemientoMasctoa` varchar(15) NOT NULL,
  `sexoMascota` varchar(2) NOT NULL,
  `colorMascota` varchar(15) NOT NULL,
  `TamanoMascota` varchar(30) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mascotadatos`
--

INSERT INTO `mascotadatos` (`idMascota`, `nombreMascota`, `especieMascota`, `razaMascota`, `fechaNaciemientoMasctoa`, `sexoMascota`, `colorMascota`, `TamanoMascota`, `estado`) VALUES
(1, 'Igorcita', 'perro', 'chiguagua', '05/05/2015', 'M', 'NEGRITO', '50CM', 0),
(2, 'putita', 'asdasd', 'asdasd', '2024-01-05', 'M', 'asdasd', '50', 1),
(3, 'locas', 'zorris', 'veliziraptor tipo ad', '0500-01-05', 'F', 'caca', '20', 1),
(4, 'asdasd', 'asdasd', 'asdasd', '2024-01-05', 'M', 'asdasd', '123', 1),
(5, 'asdasd', 'asdasd', 'asdasd', '2024-01-05', 'M', 'asdasd', '123', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `User_Id` int(11) NOT NULL,
  `User_Email` varchar(200) NOT NULL,
  `User_Nombres` varchar(200) NOT NULL,
  `User_Apellidos` varchar(200) NOT NULL,
  `User_Pass` varchar(200) NOT NULL,
  `Usuario_Tipo` tinyint(1) NOT NULL,
  `Usuario_Enable` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`User_Id`, `User_Email`, `User_Nombres`, `User_Apellidos`, `User_Pass`, `Usuario_Tipo`, `Usuario_Enable`) VALUES
(1, 'k3vinfx@gmail.com', 'Kevin ', 'Carrillo', '12345', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mascotadatos`
--
ALTER TABLE `mascotadatos`
  ADD PRIMARY KEY (`idMascota`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mascotadatos`
--
ALTER TABLE `mascotadatos`
  MODIFY `idMascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
