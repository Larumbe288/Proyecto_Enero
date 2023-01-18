-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-01-2023 a las 17:47:10
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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`Id_Categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `Id_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
