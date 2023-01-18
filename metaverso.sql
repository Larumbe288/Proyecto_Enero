-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-01-2023 a las 17:46:00
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `metaverso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `Id_Categoria` int(11) NOT NULL,
  `Nombre` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Descripcion` varchar(535) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Imagen` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`Id_Categoria`, `Nombre`, `Descripcion`, `Imagen`) VALUES
(1, 'Trigo', 'Trigales', 'hola.png'),
(2, 'Exito', 'sfsdfsdf', 'sdfdf.png'),
(3, 'Amigos', 'sfsdfsdf', 'sdfdf.png'),
(4, 'Brit', 'maestro', 'http://dummyimage.com/187x100.png/ff4444/ffffff'),
(5, 'Ky', 'jcb', 'http://dummyimage.com/174x100.png/dddddd/000000'),
(6, 'Frankie', 'jcb', 'http://dummyimage.com/188x100.png/cc0000/ffffff'),
(8, 'Martie', 'jcb', 'http://dummyimage.com/125x100.png/dddddd/000000'),
(9, 'Elyssa', 'jcb', 'http://dummyimage.com/142x100.png/5fa2dd/ffffff'),
(10, 'Desirae', 'mastercard', 'http://dummyimage.com/218x100.png/dddddd/000000'),
(24, 'Jamil', 'diners-club-international', 'http://dummyimage.com/244x100.png/5fa2dd/ffffff'),
(25, 'Adoree', 'jcb', 'http://dummyimage.com/188x100.png/5fa2dd/ffffff'),
(26, 'Shirleen', 'maestro', 'http://dummyimage.com/158x100.png/5fa2dd/ffffff'),
(27, 'Estrella', 'jcb', 'http://dummyimage.com/133x100.png/cc0000/ffffff'),
(28, 'Ewan', 'jcb', 'http://dummyimage.com/205x100.png/cc0000/ffffff'),
(29, 'Christoforo', 'jcb', 'http://dummyimage.com/198x100.png/ff4444/ffffff'),
(30, 'Rodolph', 'jcb', 'http://dummyimage.com/174x100.png/dddddd/000000'),
(31, 'Adrien', 'maestro', 'http://dummyimage.com/102x100.png/5fa2dd/ffffff'),
(32, 'Malissia', 'jcb', 'http://dummyimage.com/122x100.png/5fa2dd/ffffff'),
(33, 'Carmela', 'maestro', 'http://dummyimage.com/200x100.png/5fa2dd/ffffff'),
(34, 'Rhona', 'bankcard', 'http://dummyimage.com/173x100.png/dddddd/000000'),
(35, 'Berti', 'jcb', 'http://dummyimage.com/190x100.png/dddddd/000000'),
(36, 'Louella', 'jcb', 'http://dummyimage.com/174x100.png/cc0000/ffffff'),
(37, 'Ramsey', 'switch', 'http://dummyimage.com/146x100.png/5fa2dd/ffffff'),
(38, 'Candi', 'visa-electron', 'http://dummyimage.com/240x100.png/cc0000/ffffff'),
(39, 'Richard', 'jcb', 'http://dummyimage.com/159x100.png/dddddd/000000'),
(40, 'Annemarie', 'jcb', 'http://dummyimage.com/211x100.png/ff4444/ffffff'),
(41, 'Ulla', 'china-unionpay', 'http://dummyimage.com/240x100.png/cc0000/ffffff'),
(42, 'Falkner', 'americanexpress', 'http://dummyimage.com/226x100.png/cc0000/ffffff'),
(43, 'Malcolm', 'jcb', 'http://dummyimage.com/150x100.png/5fa2dd/ffffff'),
(44, 'Eirena', 'jcb', 'http://dummyimage.com/129x100.png/ff4444/ffffff'),
(45, 'Vanna', 'jcb', 'http://dummyimage.com/173x100.png/dddddd/000000'),
(46, 'Gracia', 'jcb', 'http://dummyimage.com/244x100.png/5fa2dd/ffffff'),
(47, 'Kessia', 'bankcard', 'http://dummyimage.com/244x100.png/5fa2dd/ffffff'),
(48, 'Lynn', 'mastercard', 'http://dummyimage.com/105x100.png/5fa2dd/ffffff'),
(49, 'Rodina', 'jcb', 'http://dummyimage.com/115x100.png/dddddd/000000'),
(50, 'Nesta', 'jcb', 'http://dummyimage.com/116x100.png/cc0000/ffffff'),
(51, 'Clyde', 'jcb', 'http://dummyimage.com/203x100.png/cc0000/ffffff'),
(52, 'Ber', 'jcb', 'http://dummyimage.com/116x100.png/cc0000/ffffff'),
(53, 'Leesa', 'jcb', 'http://dummyimage.com/185x100.png/5fa2dd/ffffff'),
(54, 'Ulrich', 'maestro', 'http://dummyimage.com/137x100.png/5fa2dd/ffffff'),
(55, 'Caty', 'china-unionpay', 'http://dummyimage.com/193x100.png/ff4444/ffffff'),
(56, 'Guenna', 'jcb', 'http://dummyimage.com/156x100.png/dddddd/000000'),
(57, 'Marta', 'maestro', 'http://dummyimage.com/136x100.png/cc0000/ffffff'),
(58, 'Pen', 'americanexpress', 'http://dummyimage.com/156x100.png/ff4444/ffffff'),
(59, 'Debi', 'jcb', 'http://dummyimage.com/118x100.png/dddddd/000000'),
(60, 'Adam', 'maestro', 'http://dummyimage.com/250x100.png/5fa2dd/ffffff'),
(61, 'Cindi', 'diners-club-carte-blanche', 'http://dummyimage.com/222x100.png/ff4444/ffffff'),
(62, 'Shena', 'mastercard', 'http://dummyimage.com/141x100.png/ff4444/ffffff'),
(63, 'Farley', 'jcb', 'http://dummyimage.com/120x100.png/ff4444/ffffff'),
(64, 'Isis', 'visa', 'http://dummyimage.com/120x100.png/ff4444/ffffff'),
(65, 'Fair', 'visa-electron', 'http://dummyimage.com/246x100.png/dddddd/000000'),
(66, 'Chance', 'maestro', 'http://dummyimage.com/229x100.png/ff4444/ffffff'),
(67, 'Paddie', 'switch', 'http://dummyimage.com/116x100.png/dddddd/000000'),
(68, 'Sapphire', 'maestro', 'http://dummyimage.com/213x100.png/cc0000/ffffff'),
(69, 'Wendi', 'jcb', 'http://dummyimage.com/250x100.png/5fa2dd/ffffff'),
(70, 'Tandy', 'jcb', 'http://dummyimage.com/119x100.png/5fa2dd/ffffff'),
(71, 'Coletta', 'americanexpress', 'http://dummyimage.com/172x100.png/cc0000/ffffff'),
(72, 'Sari', 'jcb', 'http://dummyimage.com/236x100.png/5fa2dd/ffffff'),
(73, 'Kalle', 'americanexpress', 'http://dummyimage.com/202x100.png/ff4444/ffffff'),
(74, 'Lawry', 'jcb', 'http://dummyimage.com/195x100.png/5fa2dd/ffffff'),
(75, 'Bartlett', 'jcb', 'http://dummyimage.com/228x100.png/cc0000/ffffff');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `Id_Comentario` int(11) NOT NULL,
  `Texto` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Id_Objeto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `Id_Compra` int(11) NOT NULL,
  `Id_Usuario` int(11) DEFAULT NULL,
  `Id_Producto` int(11) DEFAULT NULL,
  `Cantidad` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objeto`
--

CREATE TABLE `objeto` (
  `ID_Producto` int(11) NOT NULL,
  `Nombre` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Precio` decimal(65,4) NOT NULL,
  `Imagen_1` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Latitud` decimal(20,20) NOT NULL,
  `Imagen_2` varchar(255) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `Imagen_3` varchar(255) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `Longitud` decimal(20,20) NOT NULL,
  `Id_Categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `objeto`
--

INSERT INTO `objeto` (`ID_Producto`, `Nombre`, `Precio`, `Imagen_1`, `Latitud`, `Imagen_2`, `Imagen_3`, `Longitud`, `Id_Categoria`) VALUES
(1, 'Panas', '125.1245', 'holasas.png', '0.24570000000000000000', 'quetal.png', 'adios.png', '0.14980000000000000000', 2),
(2, 'Zoolab', '0.0000', 'http://dummyimage.com/101x100.png/ff4444/ffffff', '0.49908380000000000000', NULL, NULL, '0.00000000000000000000', 1),
(3, 'Matsoft', '0.0000', 'http://dummyimage.com/185x100.png/5fa2dd/ffffff', '0.82697950000000000000', 'http://dummyimage.com/133x100.png/5fa2dd/ffffff', 'http://dummyimage.com/131x100.png/cc0000/ffffff', '0.00000000000000000000', 1),
(4, 'Veribet', '0.0000', 'http://dummyimage.com/179x100.png/5fa2dd/ffffff', '0.10789920000000000000', 'http://dummyimage.com/250x100.png/dddddd/000000', 'http://dummyimage.com/207x100.png/dddddd/000000', '0.99999999999999999999', 1),
(5, 'Otcom', '0.0000', 'http://dummyimage.com/228x100.png/ff4444/ffffff', '0.57600770000000000000', 'http://dummyimage.com/101x100.png/5fa2dd/ffffff', 'http://dummyimage.com/230x100.png/dddddd/000000', '0.99999999999999999999', 1),
(6, 'Cardify', '0.0000', 'http://dummyimage.com/223x100.png/cc0000/ffffff', '0.55611720000000000000', 'http://dummyimage.com/118x100.png/5fa2dd/ffffff', 'http://dummyimage.com/185x100.png/ff4444/ffffff', '0.99999999999999999999', 1),
(7, 'It', '0.0000', 'http://dummyimage.com/227x100.png/ff4444/ffffff', '0.81271860000000000000', 'http://dummyimage.com/198x100.png/dddddd/000000', 'http://dummyimage.com/225x100.png/cc0000/ffffff', '0.99999999999999999999', 1),
(8, 'Redhold', '0.0000', 'http://dummyimage.com/171x100.png/cc0000/ffffff', '0.96641870000000000000', 'http://dummyimage.com/213x100.png/ff4444/ffffff', 'http://dummyimage.com/112x100.png/5fa2dd/ffffff', '0.99999999999999999999', 1),
(9, 'Alpha', '0.0000', 'http://dummyimage.com/177x100.png/dddddd/000000', '0.09303960000000000000', 'http://dummyimage.com/191x100.png/ff4444/ffffff', 'http://dummyimage.com/227x100.png/5fa2dd/ffffff', '0.00000000000000000000', 1),
(10, 'Bamity', '0.0000', 'http://dummyimage.com/116x100.png/cc0000/ffffff', '0.17086090000000000000', 'http://dummyimage.com/238x100.png/5fa2dd/ffffff', 'http://dummyimage.com/151x100.png/ff4444/ffffff', '0.00000000000000000000', 1),
(11, 'Sonair', '0.0000', 'http://dummyimage.com/159x100.png/5fa2dd/ffffff', '0.39274720000000000000', 'http://dummyimage.com/125x100.png/5fa2dd/ffffff', 'http://dummyimage.com/184x100.png/ff4444/ffffff', '0.00000000000000000000', 1),
(12, 'Quo Lux', '0.0000', 'http://dummyimage.com/236x100.png/dddddd/000000', '0.51264020000000000000', 'http://dummyimage.com/114x100.png/5fa2dd/ffffff', 'http://dummyimage.com/219x100.png/cc0000/ffffff', '0.00000000000000000000', 1),
(13, 'Otcom', '0.0000', 'http://dummyimage.com/139x100.png/5fa2dd/ffffff', '0.16540170000000000000', 'http://dummyimage.com/232x100.png/ff4444/ffffff', 'http://dummyimage.com/101x100.png/5fa2dd/ffffff', '0.99999999999999999999', 1),
(14, 'Zoolab', '0.0000', 'http://dummyimage.com/141x100.png/cc0000/ffffff', '0.18374700000000000000', 'http://dummyimage.com/137x100.png/5fa2dd/ffffff', 'http://dummyimage.com/132x100.png/cc0000/ffffff', '0.00000000000000000000', 3),
(15, 'Bitwolf', '0.0000', 'http://dummyimage.com/127x100.png/cc0000/ffffff', '0.14686840000000000000', 'http://dummyimage.com/145x100.png/dddddd/000000', 'http://dummyimage.com/125x100.png/dddddd/000000', '0.99999999999999999999', 1),
(16, 'It', '0.0000', 'http://dummyimage.com/244x100.png/dddddd/000000', '0.39342020000000000000', 'http://dummyimage.com/160x100.png/ff4444/ffffff', 'http://dummyimage.com/212x100.png/5fa2dd/ffffff', '0.00000000000000000000', 1),
(17, 'Mat Lam Tam', '0.0000', 'http://dummyimage.com/196x100.png/ff4444/ffffff', '0.05292320000000000000', 'http://dummyimage.com/116x100.png/ff4444/ffffff', 'http://dummyimage.com/147x100.png/cc0000/ffffff', '0.00000000000000000000', 1),
(18, 'Home Ing', '0.0000', 'http://dummyimage.com/188x100.png/cc0000/ffffff', '0.30964250000000000000', 'http://dummyimage.com/214x100.png/cc0000/ffffff', 'http://dummyimage.com/101x100.png/ff4444/ffffff', '0.99999999999999999999', 1),
(19, 'Flowdesk', '0.0000', 'http://dummyimage.com/198x100.png/5fa2dd/ffffff', '0.82703910000000000000', 'http://dummyimage.com/241x100.png/ff4444/ffffff', 'http://dummyimage.com/167x100.png/ff4444/ffffff', '0.00000000000000000000', 1),
(20, 'Zathin', '0.0000', 'http://dummyimage.com/173x100.png/cc0000/ffffff', '0.80215490000000000000', 'http://dummyimage.com/171x100.png/dddddd/000000', 'http://dummyimage.com/185x100.png/cc0000/ffffff', '0.99999999999999999999', 1),
(21, 'Opela', '0.0000', 'http://dummyimage.com/226x100.png/5fa2dd/ffffff', '0.85056200000000000000', 'http://dummyimage.com/225x100.png/5fa2dd/ffffff', 'http://dummyimage.com/121x100.png/ff4444/ffffff', '0.00000000000000000000', 1),
(22, 'Alpha', '0.0000', 'http://dummyimage.com/234x100.png/dddddd/000000', '0.44138300000000000000', 'http://dummyimage.com/176x100.png/dddddd/000000', 'http://dummyimage.com/106x100.png/cc0000/ffffff', '0.99999999999999999999', 1),
(23, 'Stringtough', '0.0000', 'http://dummyimage.com/134x100.png/5fa2dd/ffffff', '0.54469690000000000000', 'http://dummyimage.com/204x100.png/5fa2dd/ffffff', 'http://dummyimage.com/121x100.png/ff4444/ffffff', '0.00000000000000000000', 1),
(24, 'Veribet', '0.0000', 'http://dummyimage.com/220x100.png/cc0000/ffffff', '0.87134230000000000000', 'http://dummyimage.com/242x100.png/ff4444/ffffff', 'http://dummyimage.com/123x100.png/5fa2dd/ffffff', '0.99999999999999999999', 1),
(25, 'Trippledex', '0.0000', 'http://dummyimage.com/133x100.png/5fa2dd/ffffff', '0.95092160000000000000', 'http://dummyimage.com/201x100.png/ff4444/ffffff', 'http://dummyimage.com/164x100.png/dddddd/000000', '0.00000000000000000000', 1),
(26, 'Hatity', '0.0000', 'http://dummyimage.com/206x100.png/cc0000/ffffff', '0.88964880000000000000', 'http://dummyimage.com/199x100.png/5fa2dd/ffffff', 'http://dummyimage.com/115x100.png/ff4444/ffffff', '0.00000000000000000000', 1),
(27, 'Hatity', '0.0000', 'http://dummyimage.com/130x100.png/5fa2dd/ffffff', '0.96629260000000000000', 'http://dummyimage.com/197x100.png/ff4444/ffffff', 'http://dummyimage.com/155x100.png/ff4444/ffffff', '0.00000000000000000000', 1),
(28, 'Konklux', '0.0000', 'http://dummyimage.com/185x100.png/5fa2dd/ffffff', '0.48585540000000000000', 'http://dummyimage.com/225x100.png/dddddd/000000', 'http://dummyimage.com/107x100.png/5fa2dd/ffffff', '0.00000000000000000000', 1),
(29, 'Bytecard', '0.0000', 'http://dummyimage.com/211x100.png/dddddd/000000', '0.65897300000000000000', 'http://dummyimage.com/189x100.png/5fa2dd/ffffff', 'http://dummyimage.com/197x100.png/ff4444/ffffff', '0.00000000000000000000', 1),
(30, 'Opela', '0.0000', 'http://dummyimage.com/120x100.png/5fa2dd/ffffff', '0.05385120000000000000', 'http://dummyimage.com/176x100.png/cc0000/ffffff', 'http://dummyimage.com/173x100.png/5fa2dd/ffffff', '0.00000000000000000000', 1),
(31, 'Tres-Zap', '0.0000', 'http://dummyimage.com/111x100.png/cc0000/ffffff', '0.44873160000000000000', 'http://dummyimage.com/204x100.png/5fa2dd/ffffff', 'http://dummyimage.com/129x100.png/dddddd/000000', '0.99999999999999999999', 1),
(32, 'Zoolab', '0.0000', 'http://dummyimage.com/137x100.png/cc0000/ffffff', '0.46414400000000000000', 'http://dummyimage.com/121x100.png/dddddd/000000', 'http://dummyimage.com/192x100.png/5fa2dd/ffffff', '0.99999999999999999999', 1),
(33, 'Konklux', '0.0000', 'http://dummyimage.com/152x100.png/dddddd/000000', '0.35222760000000000000', 'http://dummyimage.com/151x100.png/5fa2dd/ffffff', 'http://dummyimage.com/198x100.png/cc0000/ffffff', '0.00000000000000000000', 1),
(34, 'Viva', '0.0000', 'http://dummyimage.com/212x100.png/ff4444/ffffff', '0.59889330000000000000', 'http://dummyimage.com/122x100.png/dddddd/000000', 'http://dummyimage.com/120x100.png/cc0000/ffffff', '0.00000000000000000000', 1),
(35, 'Vagram', '0.0000', 'http://dummyimage.com/183x100.png/dddddd/000000', '0.96414690000000000000', 'http://dummyimage.com/232x100.png/5fa2dd/ffffff', 'http://dummyimage.com/167x100.png/dddddd/000000', '0.00000000000000000000', 1),
(36, 'Flowdesk', '0.0000', 'http://dummyimage.com/103x100.png/cc0000/ffffff', '0.91694250000000000000', 'http://dummyimage.com/135x100.png/ff4444/ffffff', 'http://dummyimage.com/152x100.png/5fa2dd/ffffff', '0.99999999999999999999', 1),
(37, 'Namfix', '0.0000', 'http://dummyimage.com/134x100.png/5fa2dd/ffffff', '0.24854490000000000000', 'http://dummyimage.com/201x100.png/cc0000/ffffff', 'http://dummyimage.com/114x100.png/ff4444/ffffff', '0.99999999999999999999', 1),
(38, 'Mat Lam Tam', '0.0000', 'http://dummyimage.com/143x100.png/cc0000/ffffff', '0.13282600000000000000', 'http://dummyimage.com/135x100.png/dddddd/000000', 'http://dummyimage.com/160x100.png/ff4444/ffffff', '0.00000000000000000000', 1),
(39, 'Vagram', '0.0000', 'http://dummyimage.com/156x100.png/cc0000/ffffff', '0.62856930000000000000', 'http://dummyimage.com/131x100.png/ff4444/ffffff', 'http://dummyimage.com/223x100.png/ff4444/ffffff', '0.99999999999999999999', 1),
(40, 'Alphazap', '0.0000', 'http://dummyimage.com/121x100.png/cc0000/ffffff', '0.63466850000000000000', 'http://dummyimage.com/206x100.png/ff4444/ffffff', 'http://dummyimage.com/147x100.png/5fa2dd/ffffff', '0.00000000000000000000', 1),
(41, 'Namfix', '0.0000', 'http://dummyimage.com/130x100.png/ff4444/ffffff', '0.69877700000000000000', 'http://dummyimage.com/177x100.png/dddddd/000000', 'http://dummyimage.com/196x100.png/5fa2dd/ffffff', '0.00000000000000000000', 1),
(42, 'Cookley', '0.0000', 'http://dummyimage.com/125x100.png/5fa2dd/ffffff', '0.59048240000000000000', 'http://dummyimage.com/245x100.png/ff4444/ffffff', 'http://dummyimage.com/179x100.png/ff4444/ffffff', '0.99999999999999999999', 1),
(43, 'Lotstring', '0.0000', 'http://dummyimage.com/200x100.png/cc0000/ffffff', '0.00153250000000000000', 'http://dummyimage.com/178x100.png/5fa2dd/ffffff', 'http://dummyimage.com/154x100.png/dddddd/000000', '0.99999999999999999999', 1),
(44, 'Fix San', '0.0000', 'http://dummyimage.com/119x100.png/dddddd/000000', '0.26221040000000000000', 'http://dummyimage.com/107x100.png/5fa2dd/ffffff', 'http://dummyimage.com/243x100.png/dddddd/000000', '0.99999999999999999999', 1),
(45, 'Voltsillam', '0.0000', 'http://dummyimage.com/136x100.png/ff4444/ffffff', '0.22369930000000000000', 'http://dummyimage.com/106x100.png/dddddd/000000', 'http://dummyimage.com/143x100.png/ff4444/ffffff', '0.00000000000000000000', 1),
(46, 'Konklab', '0.0000', 'http://dummyimage.com/123x100.png/5fa2dd/ffffff', '0.61931840000000000000', 'http://dummyimage.com/172x100.png/cc0000/ffffff', 'http://dummyimage.com/188x100.png/ff4444/ffffff', '0.00000000000000000000', 1),
(47, 'Flowdesk', '0.0000', 'http://dummyimage.com/238x100.png/5fa2dd/ffffff', '0.85051190000000000000', 'http://dummyimage.com/155x100.png/dddddd/000000', 'http://dummyimage.com/124x100.png/5fa2dd/ffffff', '0.00000000000000000000', 1),
(48, 'Stringtough', '0.0000', 'http://dummyimage.com/118x100.png/5fa2dd/ffffff', '0.26913940000000000000', 'http://dummyimage.com/188x100.png/dddddd/000000', 'http://dummyimage.com/188x100.png/ff4444/ffffff', '0.99999999999999999999', 1),
(49, 'Tin', '0.0000', 'http://dummyimage.com/122x100.png/cc0000/ffffff', '0.20730830000000000000', 'http://dummyimage.com/161x100.png/5fa2dd/ffffff', 'http://dummyimage.com/216x100.png/5fa2dd/ffffff', '0.00000000000000000000', 1),
(50, 'Zoolab', '0.0000', 'http://dummyimage.com/204x100.png/dddddd/000000', '0.60930800000000000000', 'http://dummyimage.com/233x100.png/5fa2dd/ffffff', 'http://dummyimage.com/187x100.png/5fa2dd/ffffff', '0.99999999999999999999', 1),
(51, 'Pan', '548.2014', 'sfdd.png', '0.64180000000000000000', NULL, NULL, '0.21651000000000000000', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id_Usuario` int(11) NOT NULL,
  `Correo` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Nombre` varchar(150) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Christokens` decimal(65,4) NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Rol` enum('admin','usuario') COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_Usuario`, `Correo`, `Nombre`, `Telefono`, `Christokens`, `Password`, `Rol`) VALUES
(1, 'alvaro@larumbe.es', 'Juanillo', 4787498, '487.2145', '6ca2dd6e7fdac06ee2218ee7460e0099170ab527', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`Id_Categoria`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`Id_Comentario`),
  ADD KEY `Id_Objeto` (`Id_Objeto`),
  ADD KEY `Id_Usuario` (`Id_Usuario`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`Id_Compra`),
  ADD UNIQUE KEY `Id_Producto` (`Id_Producto`),
  ADD UNIQUE KEY `Id_Usuario` (`Id_Usuario`);

--
-- Indices de la tabla `objeto`
--
ALTER TABLE `objeto`
  ADD PRIMARY KEY (`ID_Producto`),
  ADD KEY `objeto_ibfk_1` (`Id_Categoria`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_Usuario`),
  ADD UNIQUE KEY `Correo` (`Correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `Id_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `Id_Comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `objeto`
--
ALTER TABLE `objeto`
  MODIFY `ID_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`Id_Objeto`) REFERENCES `objeto` (`ID_Producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`Id_Producto`) REFERENCES `objeto` (`ID_Producto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `objeto`
--
ALTER TABLE `objeto`
  ADD CONSTRAINT `objeto_ibfk_1` FOREIGN KEY (`Id_Categoria`) REFERENCES `categoria` (`Id_Categoria`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
