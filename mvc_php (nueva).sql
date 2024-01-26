-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2023 a las 04:58:18
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
-- Base de datos: `mvc_php`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion_resena`
--

CREATE TABLE `calificacion_resena` (
  `Calificacion_id` int(10) NOT NULL,
  `Calificacion_id_usuario` int(10) NOT NULL,
  `Calificacion_id_paquete` int(10) NOT NULL,
  `Calificacion` int(11) NOT NULL,
  `Calificacion_resena` text DEFAULT NULL,
  `Calificacion_fecha_creacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `Categoria_id` int(10) NOT NULL,
  `Categoria_nombre` varchar(200) NOT NULL,
  `Categoria_descripcion` varchar(400) NOT NULL,
  `Categoria_interes` int(10) NOT NULL,
  `Categoria_estado` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`Categoria_id`, `Categoria_nombre`, `Categoria_descripcion`, `Categoria_interes`, `Categoria_estado`) VALUES
(1, 'parque urbano pequeño', 'parque urbano pequeño en la ciudad de La Paz', 1, 1),
(2, 'Bares', 'Bares', 3, 0),
(3, 'Pubs', 'Pubs', 3, 1),
(4, 'Cines', 'Cines', 0, 1),
(5, 'Restaurantes', 'Restaurantes', 2, 1),
(6, 'Cafe', 'Cafe', 2, 1),
(7, 'Teatros', 'Teatros', 0, 1),
(8, 'Museos', 'Museos', 0, 1),
(9, 'Arquitectura', 'Arquitectura', 0, 1),
(10, 'Eventos Temporada', 'Eventos Temporada', 0, 1),
(11, 'Parque Grande', 'Parque Grande', 0, 1),
(12, 'Lugares Coloniales', 'Lugares Coloniales', 0, 1),
(13, 'Restaurantes Barrio', 'Restaurantes Barrio', 0, 1),
(14, 'Centros Comerciales ', 'Centros Comerciales ', 0, 1),
(15, 'Centros de Barrio', 'Centros de Barrio', 0, 1),
(16, 'Discotecas', 'Discotecas', 0, 1),
(17, 'Nigth Club', 'Nigth Club', 0, 1),
(18, 'Karaoke', 'Karaoke', 0, 1),
(19, 'Rock Cafe', 'Rock Cafe', 2, 1),
(20, 'Rock Bar', 'Rock Bar', 0, 1),
(21, 'Rock Pub', 'Rock Pub', 0, 1),
(22, 'Rock Concert', 'Rock Concert', 0, 1),
(23, 'Centro Cultural', 'Centro Cultural', 0, 1),
(24, 'Restaurante Tematico', 'Restaurante Tematico', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `Cliente_Id` int(10) NOT NULL,
  `Cliente_Nombres` varchar(200) NOT NULL,
  `Cliente_Apellidos` varchar(200) NOT NULL,
  `Cliente_Pais` varchar(100) NOT NULL,
  `Cliente_Edad` tinyint(2) NOT NULL,
  `Cliente_Celular` int(11) NOT NULL,
  `Cliente_Sexo` tinyint(3) NOT NULL,
  `Cliente_Email` varchar(200) NOT NULL,
  `Cliente_Password` varchar(800) NOT NULL,
  `Cliente_Compania` int(10) NOT NULL,
  `Cliente_FechaCreacion` date DEFAULT current_timestamp(),
  `Cliente_Estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Cliente_Id`, `Cliente_Nombres`, `Cliente_Apellidos`, `Cliente_Pais`, `Cliente_Edad`, `Cliente_Celular`, `Cliente_Sexo`, `Cliente_Email`, `Cliente_Password`, `Cliente_Compania`, `Cliente_FechaCreacion`, `Cliente_Estado`) VALUES
(2, 'Kevin', 'Carrillo', 'Bolivia', 20, 70658129, 1, 'k3vinfx@gmail.com', '$2y$10$wxKqRgk/WNEI4f.SZ6BBre5m6WJVVoMdc1QzJ4LEUJEtDSxV6Tfc6', 1, '2023-10-08', 1),
(3, 'Kevin', 'Carrillo', 'Angola', 25, 70558123, 1, 'kmz45@gmail.com', '$2y$10$ktLBks8A0xBejt1iQotvbOTUb1S4OjU2SPbxiO058ptDwgDil..ty', 1, '2023-10-30', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

CREATE TABLE `entrada` (
  `Entrada_Id` int(10) NOT NULL,
  `Entrada_Nombre` varchar(200) NOT NULL,
  `Entrada_Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entrada`
--

INSERT INTO `entrada` (`Entrada_Id`, `Entrada_Nombre`, `Entrada_Estado`) VALUES
(1, 'Solitario', 1),
(2, 'Pareja', 1),
(3, 'Familia Con Hijos Menores', 1),
(4, 'Familia Con Hijos Mayores', 1),
(5, 'Grupo Amigos', 1),
(6, 'Sexo', 1),
(7, 'Horario', 1),
(8, 'Edad', 1),
(9, 'Categoria', 1),
(10, 'Costo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interes_atracciones`
--

CREATE TABLE `interes_atracciones` (
  `id_interes` int(10) NOT NULL,
  `nombre_interes` varchar(200) NOT NULL,
  `id_categoria` tinyint(4) NOT NULL,
  `id_estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `interes_atracciones`
--

INSERT INTO `interes_atracciones` (`id_interes`, `nombre_interes`, `id_categoria`, `id_estado`) VALUES
(1, 'Gastronomia Tipica y local', 2, 0),
(2, 'Gastronomia Internacional al estilo PACEÑO', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interes_cliente`
--

CREATE TABLE `interes_cliente` (
  `id_InteresCliente` int(10) NOT NULL,
  `id_interes_atracciones` int(10) NOT NULL,
  `id_cliente` int(10) NOT NULL,
  `id_interes_estado` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `interes_cliente`
--

INSERT INTO `interes_cliente` (`id_InteresCliente`, `id_interes_atracciones`, `id_cliente`, `id_interes_estado`) VALUES
(1, 1, 2, 0),
(2, 3, 2, 0),
(3, 4, 2, 0),
(7, 3, 3, 0),
(8, 4, 3, 0),
(9, 5, 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itinerario_cliente`
--

CREATE TABLE `itinerario_cliente` (
  `Itinerario_Id` int(10) NOT NULL,
  `Itinerario_fk_cliente` int(10) NOT NULL,
  `Itinerario_fk_recom` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `itinerario_cliente`
--

INSERT INTO `itinerario_cliente` (`Itinerario_Id`, `Itinerario_fk_cliente`, `Itinerario_fk_recom`) VALUES
(1, 28, 2),
(2, 27, 2),
(3, 28, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_reservas`
--

CREATE TABLE `lista_reservas` (
  `Reserva_id` int(30) NOT NULL,
  `Reserva_id_usuario` int(30) NOT NULL,
  `Reserva_id_recomendacion` int(30) NOT NULL,
  `Reserva_estado` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=pendiente,1=confirmado, 2=cancelado',
  `Reserva_fecha_programada` date DEFAULT NULL,
  `Reserva_fecha_creacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `neurona`
--

CREATE TABLE `neurona` (
  `Neurona_Id` int(10) NOT NULL,
  `Neurona_Id_Recomendacion_FK` int(10) NOT NULL,
  `Neurona_Nombre` varchar(100) NOT NULL,
  `Neurona_Entrada_1_FK` int(10) NOT NULL,
  `Neurona_Entrada_2_FK` int(10) NOT NULL,
  `Neurona_Entrada_3_FK` int(10) DEFAULT NULL,
  `Neurona_Entrada_4_FK` int(10) DEFAULT NULL,
  `Neurona_Entrada_5_FK` int(10) DEFAULT NULL,
  `Neurona_Entrada_6_FK` int(10) DEFAULT NULL,
  `Neurona_Salida_1` varchar(100) DEFAULT NULL,
  `Neurona_Entrenada` varchar(100) DEFAULT '0',
  `Neurona_Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `neurona`
--

INSERT INTO `neurona` (`Neurona_Id`, `Neurona_Id_Recomendacion_FK`, `Neurona_Nombre`, `Neurona_Entrada_1_FK`, `Neurona_Entrada_2_FK`, `Neurona_Entrada_3_FK`, `Neurona_Entrada_4_FK`, `Neurona_Entrada_5_FK`, `Neurona_Entrada_6_FK`, `Neurona_Salida_1`, `Neurona_Entrenada`, `Neurona_Estado`) VALUES
(7, 1, '', 2, 1, 2, 1, 2, 1, NULL, NULL, 1),
(8, 5, '/CAT:Cines/ALT:MultiCine/PER:2/S:M/H:9:00 - 12:00/E:18 - 21/P:0$ - 50$', 1, 2, 1, 2, 1, 1, NULL, NULL, 1),
(9, 1, '/CAT:parque urbano pequeño/ALT:San Francisco/PER:2/S:M/H:9:00 - 12:00/E:22 - 25/P:50$ - 150$', 1, 2, 1, 2, NULL, 2, NULL, '0', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `Pagos_Id` int(10) NOT NULL,
  `Pagos_IdCliente` int(10) NOT NULL,
  `Pagos_Comprobante` blob NOT NULL,
  `Pagos_Fecha_Inicio` date NOT NULL,
  `Pagos_Fecha_Corte` date NOT NULL,
  `Pagos_Estado` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_servicio`
--

CREATE TABLE `pagos_servicio` (
  `Pago_id` int(10) NOT NULL,
  `Pago_Cliente_Id` int(11) NOT NULL,
  `Pago_Meses` tinyint(2) DEFAULT NULL,
  `Pago_Incio` varchar(15) DEFAULT NULL,
  `Pago_Fin` varchar(15) DEFAULT NULL,
  `Pago_comprobante` varchar(900) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagos_servicio`
--

INSERT INTO `pagos_servicio` (`Pago_id`, `Pago_Cliente_Id`, `Pago_Meses`, `Pago_Incio`, `Pago_Fin`, `Pago_comprobante`, `estado`) VALUES
(15, 2, 2, '14-10-2023', '14-01-2024', 'img/Botones Mi Identidad-02 (x).png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pesos`
--

CREATE TABLE `pesos` (
  `Pesos_id` int(10) NOT NULL,
  `Pesos_Fk_Neurona` int(10) NOT NULL,
  `Peso_01` varchar(5) NOT NULL,
  `Peso_02` varchar(5) NOT NULL,
  `Peso_03` varchar(4) DEFAULT NULL,
  `Peso_04` varchar(4) DEFAULT NULL,
  `Peso_05` varchar(4) DEFAULT NULL,
  `Peso_06` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pesos`
--

INSERT INTO `pesos` (`Pesos_id`, `Pesos_Fk_Neurona`, `Peso_01`, `Peso_02`, `Peso_03`, `Peso_04`, `Peso_05`, `Peso_06`) VALUES
(1, 1, '5.00', '2.00', NULL, NULL, NULL, NULL),
(2, 1, '5', '2', NULL, NULL, NULL, NULL),
(3, 1, '5', '2', NULL, NULL, NULL, NULL),
(4, 1, '0.51', '0.71', NULL, NULL, NULL, NULL),
(5, 7, '0.95', '0.55', '0.45', '0.60', '0.60', '0.85'),
(6, 7, '0.95', '0.55', '0.45', '0.60', '0.60', '0.85'),
(7, 7, '0.95', '0.55', '0.45', '0.60', '0.60', '0.85'),
(8, 7, '0.95', '0.25', '0.50', '0.50', '0.60', '0.90'),
(9, 7, '0.95', '0.35', '0', '0', '0', '0'),
(10, 7, '0.95', '0.30', '0', '0', '0', '0'),
(11, 7, '0.95', '0.30', '0', '0', '0', '0'),
(24, 8, '0.95', '0.95', '0.35', '0.45', '0.35', '0.50'),
(25, 9, '0.95', '0.90', '0.90', '0.90', '0.90', '0.45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recomendacion`
--

CREATE TABLE `recomendacion` (
  `Recomendacion_id` int(10) NOT NULL,
  `Recomendacion_titulo` text DEFAULT NULL,
  `Recomendacion_ubicacion_tour` text DEFAULT NULL,
  `Recomendacion_categoria` int(10) NOT NULL,
  `Recomendacion_costo` double NOT NULL,
  `Recomendacion_descripcion` text DEFAULT NULL,
  `Recomendacion_latlong` varchar(200) NOT NULL,
  `Recomendacion_estado` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=activo, 2=inactivo',
  `Recomendacion_fecha_creacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recomendacion`
--

INSERT INTO `recomendacion` (`Recomendacion_id`, `Recomendacion_titulo`, `Recomendacion_ubicacion_tour`, `Recomendacion_categoria`, `Recomendacion_costo`, `Recomendacion_descripcion`, `Recomendacion_latlong`, `Recomendacion_estado`, `Recomendacion_fecha_creacion`) VALUES
(1, 'San Francisco', 'el centrozW', 1, 0, 'CCC', '', 0, '2023-09-25 01:07:01'),
(2, 'Dubliner', 'a', 5, 50, 'a', '', 0, '2023-09-25 01:07:42'),
(3, 'La Manzana', 'd', 20, 5, 'ss', '', 0, '2023-09-25 01:58:26'),
(4, 'Equinoxio', 'd', 21, 5, 'ss', '', 0, '2023-09-25 02:01:01'),
(5, 'MultiCine', 'sdd', 4, 5, 'ss', '', 0, '2023-09-25 02:04:21'),
(6, 'Monje campero', 'sdd', 4, 5, 'ss', '', 0, '2023-09-25 02:06:00'),
(7, 'Cafe Alexander', 'sdf', 6, 5, 'ss', '', 1, '2023-09-25 02:06:57'),
(8, 'PLAZA AVAROA', 'Calle Pedro Villamil, Villa Copacabana, Nuestra Señora de La Paz', 1, 10, 'PLAZA AVAROA', '-16.491213,-68.118458', 1, '2023-11-02 18:55:01'),
(9, 'PLAZA AVAROA', 'Calle Pedro Villamil, Villa Copacabana, Nuestra Señora de La Paz', 1, 10, 'PLAZA AVAROA', '-16.491213,-68.118458', 1, '2023-11-02 18:56:07'),
(10, 'PLAZA AVAROA', 'Calle Pedro Villamil, Villa Copacabana, Nuestra Señora de La Paz', 1, 10, 'PLAZA AVAROA', '-16.491213,-68.118458', 1, '2023-11-02 18:57:00'),
(11, 'PLAZA AVAROA', 'Calle Pedro Villamil, Villa Copacabana, Nuestra Señora de La Paz', 1, 10, 'PLAZA AVAROA', '-16.491213,-68.118458', 1, '2023-11-02 18:58:58'),
(12, 'PLAZA AVAROA', 'Pasaje Canadá, Miraflores, Nuestra Señora de La Paz', 1, 10, 'ASDASD', '-16.486749,-68.123839', 1, '2023-11-02 18:59:48'),
(13, 'PLAZA AVAROA', 'Pasaje Canadá, Miraflores, Nuestra Señora de La Paz', 1, 10, 'ASDASD', '-16.486749,-68.123839', 1, '2023-11-02 19:10:02'),
(14, 'PLAZA AVAROA', 'Pasaje Canadá, Miraflores, Nuestra Señora de La Paz', 1, 10, 'ASDASD', '-16.486749,-68.123839', 1, '2023-11-02 19:10:31'),
(15, 'PLAZA AVAROA', 'Pasaje Canadá, Miraflores, Nuestra Señora de La Paz', 1, 10, 'ASDASD', '-16.486749,-68.123839', 1, '2023-11-02 19:10:59'),
(16, 'planza pando', 'Calle Haití, Miraflores, Nuestra Señora de La Paz', 1, 10, 'planza pando', '-16.491121,-68.124735', 1, '2023-11-02 20:41:22'),
(17, 'plaza gil', 'Calle 8, Barrio Petrolero, Nuestra Señora de La Paz', 1, 10, 'plaza gil', '-16.480103,-68.118544', 1, '2023-11-02 20:43:04'),
(18, 'PLZA_PEDRO', 'Callejón 1, Miraflores, Nuestra Señora de La Paz', 1, 10, 'PLZA_PEDRO', '-16.485802,-68.120277', 1, '2023-11-02 21:45:48'),
(19, 'zona', 'Avenida German Busch, Miraflores, Nuestra Señora de La Paz', 1, 10, 'zona', '-16.487839,-68.121275', 1, '2023-11-02 22:05:05'),
(20, 'gg', 'Calle Velasco, Villa Copacabana, Nuestra Señora de La Paz', 1, 30, 'gg', '-16.491337,-68.118142', 1, '2023-11-02 22:20:51'),
(21, 'PILA Z', 'Iglesia Católica', 2, 10, 'pila z1', '-16.48592,-68.122377', 0, '2023-11-05 22:38:59'),
(22, 'ZZ', 'Calle Inca Sebastían Acosta, Villa Copacabana, Nuestra Señora de La Paz', 1, 10, 'AAA', '-16.486854,-68.117031', 1, '2023-11-06 00:43:52'),
(23, 'ZZZZ', 'Pasaje Emiliano Cortez, Miraflores, Nuestra Señora de La Paz', 1, 10, 'ZZ', '-16.488253,-68.124538', 1, '2023-11-06 00:45:19'),
(24, 'Plaza Triangular', 'Calle Nicaragua, Miraflores Bajo, Nuestra Señora de La Paz', 1, 10, 'Planza en forma triangular donde existe una estacion de teleferico Blanco', '-16.504253,-68.120951', 1, '2023-11-06 20:45:20'),
(25, 'zyz', 'Calle Ernesto Gutierrez, Miraflores, Nuestra Señora de La Paz', 1, 10, 'zxyz', '-16.487909,-68.120555', 1, '2023-11-07 22:58:37'),
(26, 'ghaha', 'Avenida Abel Iturralde, Miraflores, Nuestra Señora de La Paz', 1, 10, 'ewqe', '-16.488362,-68.124157', 1, '2023-11-07 23:04:29'),
(27, 'prueba1', 'Mayor de San Genaro', 1, 10, 'prueba 1', '-16.488291,-68.120746', 1, '2023-11-08 20:25:16'),
(28, 'puerba2', 'Calle 3, Alto Miraflores, Nuestra Señora de La Paz', 1, 10, 'puerba2 puerba2 puerba2 puerba2 puerba2 puerba2 puerba2 puerba2 puerba2 puerba2 puerba2', '-16.481275,-68.126188', 1, '2023-11-09 21:08:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recomendacion_img`
--

CREATE TABLE `recomendacion_img` (
  `Recomdacion_Img_Id` int(10) NOT NULL,
  `Recomendacion_FK` int(10) NOT NULL,
  `Recomendacion_Img1` varchar(200) NOT NULL,
  `Recomendacion_Img2` varchar(200) NOT NULL,
  `Recomendacion_Img3` varchar(200) NOT NULL,
  `Recomendacion_Img4` varchar(200) NOT NULL,
  `Recomendacion_Img5` varchar(200) NOT NULL,
  `Recomendacion_estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recomendacion_img`
--

INSERT INTO `recomendacion_img` (`Recomdacion_Img_Id`, `Recomendacion_FK`, `Recomendacion_Img1`, `Recomendacion_Img2`, `Recomendacion_Img3`, `Recomendacion_Img4`, `Recomendacion_Img5`, `Recomendacion_estado`) VALUES
(1, 15, 'img/Botones Mi Identidad-02 (x).png', 'img/Botones Mi Identidad-02 (x).png', 'img/Botones Mi Identidad-02 (x).png', 'img/Botones Mi Identidad-02 (x).png', 'img/Botones Mi Identidad-02 (x).png', 1),
(2, 16, 'img/lugares.png', 'img/lugares.jpg', 'img/lugares.jpg', 'img/lugares.jpg', 'img/lugares.jpg', 1),
(3, 17, 'img/bg2.jpg', 'img/bg2.jpg', 'img/bg2.jpg', 'img/bg2.jpg', 'img/bg2.jpg', 1),
(4, 18, 'img/bg2.jpg', 'img/bg2.jpg', 'img/bg2.jpg', 'img/bg2.jpg', 'img/bg2.jpg', 1),
(5, 19, 'img/23_01_1699245919.jpg', 'img/descarga2_1698977105.jpg', 'img/descarga2_1698977105.jpg', 'img/descarga2_1698977105.jpg', 'img/descarga2_1698977105.jpg', 1),
(6, 20, 'img/23_01_1699245919.jpg', 'img/20_1698978051.jpg', 'img/20_1698978051.jpg', 'img/20_1698978051.jpg', 'img/20_1698978051.jpg', 1),
(7, 21, 'img/21_01_1699238339.jpg', 'img_destinos/21_02_1699238339.jpg', 'img_destinos/21_03_1699238339.jpg', 'img_destinos/21_04_1699238339.jpg', 'img_destinos/21_05_1699238339.jpg', 1),
(8, 23, 'img/23_01_1699245919.jpg', 'BETA/img/23_02_1699245919.jpg', 'BETA/img/23_03_1699245919.jpg', 'BETA/img/23_04_1699245919.jpg', 'BETA/img/23_05_1699245919.png', 1),
(9, 24, 'img/24_01_1699317920.jpg', 'img/24_02_1699317920.jpg', 'img/24_03_1699317920.jpg', 'img/24_04_1699317920.jpg', 'img/24_05_1699317920.png', 1),
(10, 25, 'beta/img/25_01_1699412317.jpg', 'beta/img/25_02_1699412317.jpg', 'beta/img/25_03_1699412317.jpg', 'beta/img/25_04_1699412317.jpg', 'beta/img/25_05_1699412317.jpg', 1),
(11, 26, 'img/26_01_1699412669.jpg', 'img/26_02_1699412669.jpg', 'img/26_03_1699412669.jpg', 'img/26_04_1699412669.jpg', 'img/26_05_1699412669.jpg', 1),
(12, 27, 'img/27_01_1699489516.jpg', 'img/27_02_1699489516.jpg', 'img/27_03_1699489516.jpg', 'img/27_04_1699489516.jpg', 'img/27_05_1699489516.jpg', 1),
(13, 28, 'img/28_01_1699578519.jpg', 'img/28_02_1699578519.jpg', 'img/28_03_1699578519.jpg', 'img/28_04_1699578519.jpg', 'img/28_05_1699578519.jpg', 1);

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
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`Categoria_id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Cliente_Id`);

--
-- Indices de la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`Entrada_Id`);

--
-- Indices de la tabla `interes_cliente`
--
ALTER TABLE `interes_cliente`
  ADD PRIMARY KEY (`id_InteresCliente`);

--
-- Indices de la tabla `itinerario_cliente`
--
ALTER TABLE `itinerario_cliente`
  ADD PRIMARY KEY (`Itinerario_Id`);

--
-- Indices de la tabla `neurona`
--
ALTER TABLE `neurona`
  ADD PRIMARY KEY (`Neurona_Id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`Pagos_Id`);

--
-- Indices de la tabla `pagos_servicio`
--
ALTER TABLE `pagos_servicio`
  ADD PRIMARY KEY (`Pago_id`);

--
-- Indices de la tabla `pesos`
--
ALTER TABLE `pesos`
  ADD PRIMARY KEY (`Pesos_id`);

--
-- Indices de la tabla `recomendacion`
--
ALTER TABLE `recomendacion`
  ADD PRIMARY KEY (`Recomendacion_id`);

--
-- Indices de la tabla `recomendacion_img`
--
ALTER TABLE `recomendacion_img`
  ADD PRIMARY KEY (`Recomdacion_Img_Id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`User_Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `Categoria_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `Cliente_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `entrada`
--
ALTER TABLE `entrada`
  MODIFY `Entrada_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `interes_cliente`
--
ALTER TABLE `interes_cliente`
  MODIFY `id_InteresCliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `itinerario_cliente`
--
ALTER TABLE `itinerario_cliente`
  MODIFY `Itinerario_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `neurona`
--
ALTER TABLE `neurona`
  MODIFY `Neurona_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `Pagos_Id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos_servicio`
--
ALTER TABLE `pagos_servicio`
  MODIFY `Pago_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `pesos`
--
ALTER TABLE `pesos`
  MODIFY `Pesos_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `recomendacion`
--
ALTER TABLE `recomendacion`
  MODIFY `Recomendacion_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `recomendacion_img`
--
ALTER TABLE `recomendacion_img`
  MODIFY `Recomdacion_Img_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
