-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-01-2023 a las 13:56:11
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
(1, 'Ryann', 'Pana', 'http://localhost/web/backend/view/imgCategories/1/lives.PNG'),
(2, 'Exito', 'sfsdfsd', 'sdfsdf'),
(3, 'Amigos', 'sfsdfsd', 'sdfsdf'),
(4, 'Brit', 'maestro', 'http://dummyimage.com/187x100.png/ff4444/ffffff'),
(5, 'Ky', 'jcb', 'http://dummyimage.com/174x100.png/dddddd/000000'),
(6, 'Frankie', 'jcb', 'http://localhost/web/backend/view/imgCategories/6/Foto_Carnet_Alvaro_Larumbe.jpeg'),
(8, 'Martina', 'jcb', 'http://localhost/web/backend/view/imgCategories/8/Captura git1.PNG'),
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
(75, 'Bartlett', 'jcb', 'http://dummyimage.com/228x100.png/cc0000/ffffff'),
(76, ' desarrollador ', 'Tiene hambre', 'http://localhost/web/backend/view/imgCategories/76/css.PNG'),
(77, 'Basket', 'Baloncesto', 'http://localhost/web/backend/view/imgCategories/77/respons.PNG'),
(78, 'Jose Antonio', 'Tiene hambre', 'http://localhost/web/backend/view/imgCategories/78/css.PNG'),
(79, 'Matemáticas', 'mates', 'http://localhost/web/backend/view/imgCategories/79/gradient.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `Id_Comentario` int(11) NOT NULL,
  `Texto` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Id_Objeto` int(11) NOT NULL,
  `Fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`Id_Comentario`, `Texto`, `Id_Usuario`, `Id_Objeto`, `Fecha`) VALUES
(5, 'Martinica', 1, 1, '2023-01-22'),
(9, 'Relapsing fever NOS', 1, 1, '2023-01-22'),
(11, 'Relapsing fever NOS', 1, 1, '2023-01-22'),
(12, 'Acc poison-methadone', 3, 3, '2023-01-22'),
(14, 'Antineoplastic chemo enc', 5, 5, '2023-01-22'),
(15, 'TB of bone NEC-oth test', 6, 6, '2023-01-22'),
(16, 'TB pleurisy-no exam', 7, 7, '2023-01-22'),
(17, 'Bact arthritis-forearm', 8, 8, '2023-01-22'),
(18, 'Late sympt syphilis NOS', 11, 11, '2023-01-22'),
(19, 'Monofixation syndrome', 14, 14, '2023-01-22'),
(20, 'Appendix injury-closed', 15, 15, '2023-01-22'),
(21, 'Late eff inj periph vess', 16, 16, '2023-01-22'),
(22, 'Mv coll w ped-anim rid', 17, 17, '2023-01-22'),
(23, 'Blood asp w resp sympt', 18, 18, '2023-01-22'),
(24, 'Fracture of pubis-open', 19, 19, '2023-01-22'),
(25, 'NB cutaneous hemorrhage', 20, 20, '2023-01-22'),
(26, 'Preg w poor obs hx NEC', 21, 21, '2023-01-22'),
(27, 'Tobacco use disord-unsp', 22, 22, '2023-01-22'),
(28, 'Ben neo nasal cav/sinus', 23, 23, '2023-01-22'),
(29, 'Norml pressure hydroceph', 24, 24, '2023-01-22'),
(30, 'Cleft lip NOS', 25, 25, '2023-01-22'),
(31, 'Renal dis NOS-antepartum', 26, 26, '2023-01-22'),
(32, 'Lactation fail-unspec', 27, 27, '2023-01-22'),
(33, 'Opn skl base fx-coma NOS', 28, 28, '2023-01-22'),
(34, 'Ocl art NOS wo infrct', 29, 29, '2023-01-22'),
(35, 'Complic labor NEC-deliv', 30, 30, '2023-01-22'),
(36, 'Dis mineral metabol NEC', 31, 31, '2023-01-22'),
(37, 'Kaschin-beck dis NEC', 32, 32, '2023-01-22'),
(38, 'Pulmon TB NOS-cult dx', 33, 33, '2023-01-22'),
(39, 'Ankylosis-hand', 34, 34, '2023-01-22'),
(40, 'Pathol dislocat-pelvis', 35, 35, '2023-01-22'),
(41, 'Ocl vrtb art w infrct', 36, 36, '2023-01-22'),
(42, 'Atrophy mandible-severe', 37, 37, '2023-01-22'),
(43, 'Malignant neo anus NOS', 38, 38, '2023-01-22'),
(44, 'Disloc midtarsal-open', 39, 39, '2023-01-22'),
(45, 'Pseudopterygium', 40, 40, '2023-01-22'),
(46, 'Carbuncle of foot', 41, 41, '2023-01-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `Id_Compra` int(11) NOT NULL,
  `Id_Usuario` int(11) DEFAULT NULL,
  `Id_Producto` int(11) DEFAULT NULL,
  `Cantidad` tinyint(4) NOT NULL,
  `Fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`Id_Compra`, `Id_Usuario`, `Id_Producto`, `Cantidad`, `Fecha`) VALUES
(1, 14, 14, 77, '2023-01-22'),
(3, 15, 15, 83, '2023-01-22'),
(4, 16, 16, 50, '2023-01-22'),
(5, 17, 17, 26, '2023-01-22'),
(6, 18, 18, 85, '2023-01-22'),
(7, 19, 19, 4, '2023-01-22'),
(8, 20, 20, 54, '2023-01-22'),
(9, 21, 21, 27, '2023-01-22'),
(10, 22, 22, 49, '2023-01-22'),
(11, 23, 23, 70, '2023-01-22'),
(12, 24, 24, 35, '2023-01-22'),
(13, 25, 25, 23, '2023-01-22'),
(14, 26, 26, 45, '2023-01-22'),
(15, 27, 27, 13, '2023-01-22'),
(16, 28, 28, 94, '2023-01-22'),
(17, 29, 29, 72, '2023-01-22'),
(18, 30, 30, 3, '2023-01-22'),
(19, 31, 31, 15, '2023-01-22'),
(20, 32, 32, 45, '2023-01-22'),
(21, 33, 33, 67, '2023-01-22'),
(22, 34, 34, 46, '2023-01-22'),
(23, 35, 35, 77, '2023-01-22'),
(24, 36, 36, 88, '2023-01-22'),
(25, 37, 37, 92, '2023-01-22'),
(26, 38, 38, 93, '2023-01-22'),
(27, 39, 39, 64, '2023-01-22'),
(28, 40, 40, 36, '2023-01-22'),
(29, 41, 41, 90, '2023-01-22'),
(30, 42, 42, 4, '2023-01-22'),
(31, 43, 43, 89, '2023-01-22'),
(32, 44, 44, 38, '2023-01-22'),
(33, 45, 45, 96, '2023-01-22'),
(34, 46, 46, 90, '2023-01-22'),
(35, 47, 47, 97, '2023-01-22'),
(36, 48, 48, 59, '2023-01-22'),
(37, 49, 49, 37, '2023-01-22'),
(38, 50, 50, 95, '2023-01-22'),
(39, 51, 51, 86, '2023-01-22'),
(40, 52, 52, 99, '2023-01-22'),
(41, 53, 53, 96, '2023-01-22'),
(42, 54, 54, 10, '2023-01-22'),
(43, 55, 55, 29, '2023-01-22'),
(44, 56, 56, 87, '2023-01-22'),
(45, 57, 57, 55, '2023-01-22'),
(46, 58, 58, 19, '2023-01-22'),
(47, 59, 59, 23, '2023-01-22'),
(48, 60, 60, 20, '2023-01-22'),
(49, 61, 61, 32, '2023-01-22'),
(50, 62, 62, 97, '2023-01-22'),
(51, 63, 63, 98, '2023-01-22'),
(52, 64, 64, 92, '2023-01-22'),
(103, 65, 65, 79, '2023-01-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objeto`
--

CREATE TABLE `objeto` (
  `ID_Producto` int(11) NOT NULL,
  `Nombre` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Precio` decimal(65,4) NOT NULL,
  `Imagen_1` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Imagen_2` varchar(255) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `Imagen_3` varchar(255) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `Latitud` decimal(20,20) NOT NULL,
  `Longitud` decimal(20,20) NOT NULL,
  `Id_Categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `objeto`
--

INSERT INTO `objeto` (`ID_Producto`, `Nombre`, `Precio`, `Imagen_1`, `Imagen_2`, `Imagen_3`, `Latitud`, `Longitud`, `Id_Categoria`) VALUES
(1, 'Yo', '894.0000', 'http://localhost/web/backend/view/imgProducts/1/Foto_Carnet_Alvaro_Larumbe.jpeg', 'http://localhost/web/backend/view/imgProducts/1/', 'http://localhost/web/backend/view/imgProducts/1/', '0.08640000000000000000', '0.45083000000000000000', 3),
(2, 'Ailene', '0.0000', 'http://dummyimage.com/226x100.png/ff4444/ffffff', 'http://dummyimage.com/161x100.png/dddddd/000000', 'http://dummyimage.com/214x100.png/dddddd/000000', '0.80873000000000000000', '0.43681000000000000000', 3),
(3, 'Arty', '0.0000', 'http://localhost/proyectointegrador/backend/view/imgProducts/3/css.PNG', 'http://localhost/proyectointegrador/backend/view/imgProducts/3/html.PNG', 'http://localhost/proyectointegrador/backend/view/imgProducts/3/lives.PNG', '0.73441000000000000000', '0.92181000000000000000', 3),
(4, 'Nicolina', '0.0000', 'http://dummyimage.com/211x100.png/dddddd/000000', 'http://dummyimage.com/106x100.png/dddddd/000000', 'http://dummyimage.com/250x100.png/dddddd/000000', '0.66365000000000000000', '0.94319000000000000000', 1),
(5, 'Drusilla', '0.0000', 'http://dummyimage.com/114x100.png/cc0000/ffffff', 'http://dummyimage.com/122x100.png/cc0000/ffffff', 'http://dummyimage.com/111x100.png/5fa2dd/ffffff', '0.33027000000000000000', '0.83109000000000000000', 1),
(6, 'Karina', '0.0000', 'http://dummyimage.com/170x100.png/dddddd/000000', 'http://dummyimage.com/198x100.png/cc0000/ffffff', 'http://dummyimage.com/113x100.png/cc0000/ffffff', '0.67985000000000000000', '0.84794000000000000000', 1),
(7, 'Pren', '0.0000', 'http://dummyimage.com/116x100.png/ff4444/ffffff', 'http://dummyimage.com/220x100.png/cc0000/ffffff', 'http://dummyimage.com/141x100.png/5fa2dd/ffffff', '0.55238000000000000000', '0.66910000000000000000', 3),
(8, 'Ryann', '0.0000', 'http://localhost/php/proyectointegrador/backend/view/imgProducts/8/gradient.png', 'http://localhost/php/proyectointegrador/backend/view/imgProducts/8/', 'http://localhost/php/proyectointegrador/backend/view/imgProducts/8/', '0.99999999999999999999', '0.99999999999999999999', 1),
(11, 'Alice', '0.0000', 'http://dummyimage.com/156x100.png/dddddd/000000', 'http://dummyimage.com/131x100.png/cc0000/ffffff', 'http://dummyimage.com/189x100.png/dddddd/000000', '0.01952000000000000000', '0.92123000000000000000', 3),
(14, 'Leo', '0.0000', 'http://dummyimage.com/148x100.png/cc0000/ffffff', 'http://dummyimage.com/249x100.png/5fa2dd/ffffff', 'http://dummyimage.com/121x100.png/5fa2dd/ffffff', '0.77218000000000000000', '0.37380000000000000000', 2),
(15, 'Andonis', '0.0000', 'http://dummyimage.com/110x100.png/5fa2dd/ffffff', 'http://dummyimage.com/142x100.png/5fa2dd/ffffff', 'http://dummyimage.com/155x100.png/ff4444/ffffff', '0.63381000000000000000', '0.80631000000000000000', 3),
(16, 'Emily', '0.0000', 'http://dummyimage.com/170x100.png/cc0000/ffffff', 'http://dummyimage.com/145x100.png/cc0000/ffffff', 'http://dummyimage.com/197x100.png/ff4444/ffffff', '0.88631000000000000000', '0.04821000000000000000', 2),
(17, 'Vladamir', '0.0000', 'http://dummyimage.com/188x100.png/5fa2dd/ffffff', 'http://dummyimage.com/246x100.png/ff4444/ffffff', 'http://dummyimage.com/171x100.png/cc0000/ffffff', '0.64580000000000000000', '0.91201000000000000000', 2),
(18, 'Analise', '0.0000', 'http://dummyimage.com/154x100.png/ff4444/ffffff', 'http://dummyimage.com/144x100.png/cc0000/ffffff', 'http://dummyimage.com/242x100.png/5fa2dd/ffffff', '0.31254000000000000000', '0.77354000000000000000', 1),
(19, 'Kassandra', '0.0000', 'http://dummyimage.com/217x100.png/cc0000/ffffff', 'http://dummyimage.com/184x100.png/dddddd/000000', 'http://dummyimage.com/143x100.png/dddddd/000000', '0.15463000000000000000', '0.54518000000000000000', 3),
(20, 'Judon', '0.0000', 'http://dummyimage.com/205x100.png/dddddd/000000', 'http://dummyimage.com/147x100.png/cc0000/ffffff', 'http://dummyimage.com/168x100.png/dddddd/000000', '0.33009000000000000000', '0.59538000000000000000', 2),
(21, 'Giovanni', '0.0000', 'http://dummyimage.com/153x100.png/cc0000/ffffff', 'http://dummyimage.com/112x100.png/ff4444/ffffff', 'http://dummyimage.com/207x100.png/5fa2dd/ffffff', '0.83393000000000000000', '0.60866000000000000000', 2),
(22, 'Modestine', '0.0000', 'http://dummyimage.com/160x100.png/5fa2dd/ffffff', 'http://dummyimage.com/164x100.png/ff4444/ffffff', 'http://dummyimage.com/222x100.png/ff4444/ffffff', '0.47364000000000000000', '0.06122000000000000000', 3),
(23, 'Pall', '0.0000', 'http://dummyimage.com/179x100.png/dddddd/000000', 'http://dummyimage.com/104x100.png/ff4444/ffffff', 'http://dummyimage.com/128x100.png/5fa2dd/ffffff', '0.21099000000000000000', '0.70346000000000000000', 1),
(24, 'Elissa', '0.0000', 'http://dummyimage.com/109x100.png/5fa2dd/ffffff', 'http://dummyimage.com/207x100.png/dddddd/000000', 'http://dummyimage.com/114x100.png/cc0000/ffffff', '0.70933000000000000000', '0.54417000000000000000', 3),
(25, 'Lind', '0.0000', 'http://localhost/php/proyectointegrador/backend/view/imgProducts/25/base_convert.PNG', 'http://localhost/php/proyectointegrador/backend/view/imgProducts/25/', 'http://localhost/php/proyectointegrador/backend/view/imgProducts/25/', '0.99999999999999999999', '0.99999999999999999999', 3),
(26, 'Simmonds', '0.0000', 'http://dummyimage.com/169x100.png/ff4444/ffffff', 'http://dummyimage.com/201x100.png/dddddd/000000', 'http://dummyimage.com/222x100.png/cc0000/ffffff', '0.95299000000000000000', '0.12879000000000000000', 2),
(27, 'Brien', '0.0000', 'http://dummyimage.com/195x100.png/cc0000/ffffff', 'http://dummyimage.com/155x100.png/dddddd/000000', 'http://dummyimage.com/123x100.png/5fa2dd/ffffff', '0.49163000000000000000', '0.89751000000000000000', 2),
(28, 'Lorna', '0.0000', 'http://dummyimage.com/103x100.png/dddddd/000000', 'http://dummyimage.com/181x100.png/5fa2dd/ffffff', 'http://dummyimage.com/113x100.png/cc0000/ffffff', '0.23257000000000000000', '0.22198000000000000000', 3),
(29, 'Faulkner', '0.0000', 'http://dummyimage.com/104x100.png/cc0000/ffffff', 'http://dummyimage.com/130x100.png/dddddd/000000', 'http://dummyimage.com/226x100.png/5fa2dd/ffffff', '0.62123000000000000000', '0.03629000000000000000', 2),
(30, 'Leda', '0.0000', 'http://dummyimage.com/130x100.png/5fa2dd/ffffff', 'http://dummyimage.com/123x100.png/ff4444/ffffff', 'http://dummyimage.com/111x100.png/dddddd/000000', '0.23983000000000000000', '0.53195000000000000000', 3),
(31, 'Jerrilyn', '0.0000', 'http://dummyimage.com/152x100.png/ff4444/ffffff', 'http://dummyimage.com/227x100.png/cc0000/ffffff', 'http://dummyimage.com/248x100.png/5fa2dd/ffffff', '0.07430000000000000000', '0.29621000000000000000', 1),
(32, 'Ike', '0.0000', 'http://dummyimage.com/240x100.png/cc0000/ffffff', 'http://dummyimage.com/214x100.png/dddddd/000000', 'http://dummyimage.com/165x100.png/dddddd/000000', '0.85292000000000000000', '0.27408000000000000000', 1),
(33, 'Angelia', '0.0000', 'http://dummyimage.com/208x100.png/cc0000/ffffff', 'http://dummyimage.com/150x100.png/dddddd/000000', 'http://dummyimage.com/169x100.png/cc0000/ffffff', '0.74563000000000000000', '0.16989000000000000000', 1),
(34, 'Alain', '0.0000', 'http://dummyimage.com/139x100.png/dddddd/000000', 'http://dummyimage.com/164x100.png/dddddd/000000', 'http://dummyimage.com/144x100.png/dddddd/000000', '0.61871000000000000000', '0.04623000000000000000', 1),
(35, 'Ferguson', '0.0000', 'http://dummyimage.com/232x100.png/5fa2dd/ffffff', 'http://dummyimage.com/191x100.png/dddddd/000000', 'http://dummyimage.com/181x100.png/cc0000/ffffff', '0.61331000000000000000', '0.24751000000000000000', 2),
(36, 'Cecilio', '0.0000', 'http://dummyimage.com/110x100.png/ff4444/ffffff', 'http://dummyimage.com/124x100.png/5fa2dd/ffffff', 'http://dummyimage.com/155x100.png/cc0000/ffffff', '0.29542000000000000000', '0.69453000000000000000', 2),
(37, 'Guglielma', '0.0000', 'http://dummyimage.com/158x100.png/dddddd/000000', 'http://dummyimage.com/115x100.png/cc0000/ffffff', 'http://dummyimage.com/117x100.png/cc0000/ffffff', '0.75350000000000000000', '0.70105000000000000000', 1),
(38, 'Ginger', '0.0000', 'http://dummyimage.com/211x100.png/5fa2dd/ffffff', 'http://dummyimage.com/169x100.png/5fa2dd/ffffff', 'http://dummyimage.com/196x100.png/dddddd/000000', '0.35656000000000000000', '0.15640000000000000000', 2),
(39, 'Jody', '0.0000', 'http://dummyimage.com/220x100.png/ff4444/ffffff', 'http://dummyimage.com/222x100.png/cc0000/ffffff', 'http://dummyimage.com/104x100.png/5fa2dd/ffffff', '0.16928000000000000000', '0.74466000000000000000', 2),
(40, 'Mohandis', '0.0000', 'http://dummyimage.com/108x100.png/dddddd/000000', 'http://dummyimage.com/116x100.png/ff4444/ffffff', 'http://dummyimage.com/144x100.png/dddddd/000000', '0.53792000000000000000', '0.13793000000000000000', 1),
(41, 'Catherin', '0.0000', 'http://dummyimage.com/167x100.png/cc0000/ffffff', 'http://dummyimage.com/120x100.png/cc0000/ffffff', 'http://dummyimage.com/194x100.png/ff4444/ffffff', '0.04493000000000000000', '0.95478000000000000000', 1),
(42, 'Alice', '0.0000', 'http://dummyimage.com/211x100.png/ff4444/ffffff', 'http://dummyimage.com/162x100.png/5fa2dd/ffffff', 'http://dummyimage.com/189x100.png/ff4444/ffffff', '0.84700000000000000000', '0.86703000000000000000', 3),
(43, 'Cherish', '0.0000', 'http://dummyimage.com/117x100.png/ff4444/ffffff', 'http://dummyimage.com/203x100.png/dddddd/000000', 'http://dummyimage.com/131x100.png/ff4444/ffffff', '0.43851000000000000000', '0.58103000000000000000', 3),
(44, 'Cob', '0.0000', 'http://dummyimage.com/109x100.png/ff4444/ffffff', 'http://dummyimage.com/187x100.png/cc0000/ffffff', 'http://dummyimage.com/249x100.png/ff4444/ffffff', '0.64848000000000000000', '0.20288000000000000000', 3),
(45, 'Neely', '0.0000', 'http://dummyimage.com/226x100.png/5fa2dd/ffffff', 'http://dummyimage.com/143x100.png/cc0000/ffffff', 'http://dummyimage.com/194x100.png/cc0000/ffffff', '0.34441000000000000000', '0.37342000000000000000', 3),
(46, 'Bell', '0.0000', 'http://dummyimage.com/218x100.png/cc0000/ffffff', 'http://dummyimage.com/118x100.png/dddddd/000000', 'http://dummyimage.com/179x100.png/ff4444/ffffff', '0.60709000000000000000', '0.79690000000000000000', 3),
(47, 'Khalil', '0.0000', 'http://dummyimage.com/173x100.png/5fa2dd/ffffff', 'http://dummyimage.com/147x100.png/dddddd/000000', 'http://dummyimage.com/200x100.png/ff4444/ffffff', '0.12984000000000000000', '0.63043000000000000000', 1),
(48, 'Junina', '0.0000', 'http://dummyimage.com/215x100.png/ff4444/ffffff', 'http://dummyimage.com/188x100.png/5fa2dd/ffffff', 'http://dummyimage.com/182x100.png/dddddd/000000', '0.84562000000000000000', '0.16823000000000000000', 2),
(49, 'Delores', '0.0000', 'http://dummyimage.com/195x100.png/cc0000/ffffff', 'http://dummyimage.com/101x100.png/dddddd/000000', 'http://dummyimage.com/152x100.png/dddddd/000000', '0.15726000000000000000', '0.92070000000000000000', 1),
(50, 'Lila', '0.0000', 'http://dummyimage.com/127x100.png/cc0000/ffffff', 'http://dummyimage.com/179x100.png/ff4444/ffffff', 'http://dummyimage.com/164x100.png/cc0000/ffffff', '0.45784000000000000000', '0.90289000000000000000', 2),
(51, 'Brooks', '0.0000', 'http://dummyimage.com/200x100.png/ff4444/ffffff', 'http://dummyimage.com/175x100.png/dddddd/000000', 'http://dummyimage.com/212x100.png/5fa2dd/ffffff', '0.90775000000000000000', '0.08067000000000000000', 2),
(52, 'Adolpho', '0.0000', 'http://dummyimage.com/215x100.png/ff4444/ffffff', 'http://dummyimage.com/215x100.png/cc0000/ffffff', 'http://dummyimage.com/203x100.png/cc0000/ffffff', '0.22912000000000000000', '0.19095000000000000000', 3),
(53, 'Ernaline', '0.0000', 'http://dummyimage.com/223x100.png/5fa2dd/ffffff', 'http://dummyimage.com/108x100.png/cc0000/ffffff', 'http://dummyimage.com/214x100.png/cc0000/ffffff', '0.61172000000000000000', '0.37949000000000000000', 3),
(54, 'Chen', '0.0000', 'http://dummyimage.com/121x100.png/cc0000/ffffff', 'http://dummyimage.com/219x100.png/ff4444/ffffff', 'http://dummyimage.com/226x100.png/cc0000/ffffff', '0.75153000000000000000', '0.31272000000000000000', 3),
(55, 'Roseline', '0.0000', 'http://dummyimage.com/171x100.png/5fa2dd/ffffff', 'http://dummyimage.com/245x100.png/ff4444/ffffff', 'http://dummyimage.com/192x100.png/cc0000/ffffff', '0.91718000000000000000', '0.68432000000000000000', 3),
(56, 'Isabelita', '0.0000', 'http://dummyimage.com/189x100.png/dddddd/000000', 'http://dummyimage.com/216x100.png/cc0000/ffffff', 'http://dummyimage.com/169x100.png/ff4444/ffffff', '0.02402000000000000000', '0.48886000000000000000', 2),
(57, 'Aggi', '0.0000', 'http://dummyimage.com/233x100.png/dddddd/000000', 'http://dummyimage.com/237x100.png/ff4444/ffffff', 'http://dummyimage.com/194x100.png/cc0000/ffffff', '0.03685000000000000000', '0.01595000000000000000', 3),
(58, 'Killy', '0.0000', 'http://dummyimage.com/110x100.png/dddddd/000000', 'http://dummyimage.com/173x100.png/ff4444/ffffff', 'http://dummyimage.com/195x100.png/dddddd/000000', '0.45254000000000000000', '0.08371000000000000000', 2),
(59, 'Edwina', '0.0000', 'http://dummyimage.com/241x100.png/dddddd/000000', 'http://dummyimage.com/207x100.png/cc0000/ffffff', 'http://dummyimage.com/199x100.png/dddddd/000000', '0.07324000000000000000', '0.36550000000000000000', 1),
(60, 'Adella', '0.0000', 'http://dummyimage.com/139x100.png/dddddd/000000', 'http://dummyimage.com/192x100.png/dddddd/000000', 'http://dummyimage.com/146x100.png/ff4444/ffffff', '0.81696000000000000000', '0.55104000000000000000', 2),
(61, 'Orbadiah', '0.0000', 'http://dummyimage.com/227x100.png/ff4444/ffffff', 'http://dummyimage.com/176x100.png/5fa2dd/ffffff', 'http://dummyimage.com/165x100.png/ff4444/ffffff', '0.97931000000000000000', '0.35036000000000000000', 3),
(62, 'Sawyer', '0.0000', 'http://dummyimage.com/175x100.png/cc0000/ffffff', 'http://dummyimage.com/211x100.png/ff4444/ffffff', 'http://dummyimage.com/250x100.png/5fa2dd/ffffff', '0.20489000000000000000', '0.71258000000000000000', 1),
(63, 'Rikki', '0.0000', 'http://dummyimage.com/113x100.png/cc0000/ffffff', 'http://dummyimage.com/179x100.png/ff4444/ffffff', 'http://dummyimage.com/204x100.png/dddddd/000000', '0.84118000000000000000', '0.47761000000000000000', 3),
(64, 'Ivan', '0.0000', 'http://dummyimage.com/122x100.png/dddddd/000000', 'http://dummyimage.com/107x100.png/5fa2dd/ffffff', 'http://dummyimage.com/223x100.png/ff4444/ffffff', '0.70644000000000000000', '0.79938000000000000000', 1),
(65, 'Zorina', '0.0000', 'http://dummyimage.com/193x100.png/dddddd/000000', 'http://dummyimage.com/106x100.png/ff4444/ffffff', 'http://dummyimage.com/145x100.png/5fa2dd/ffffff', '0.16781000000000000000', '0.62438000000000000000', 2),
(66, 'Bartholemy', '0.0000', 'http://dummyimage.com/231x100.png/cc0000/ffffff', 'http://dummyimage.com/202x100.png/dddddd/000000', 'http://dummyimage.com/138x100.png/cc0000/ffffff', '0.92693000000000000000', '0.44104000000000000000', 3),
(67, 'Barbey', '0.0000', 'http://dummyimage.com/150x100.png/5fa2dd/ffffff', 'http://dummyimage.com/184x100.png/dddddd/000000', 'http://dummyimage.com/194x100.png/cc0000/ffffff', '0.97973000000000000000', '0.25170000000000000000', 3),
(68, 'Carine', '0.0000', 'http://dummyimage.com/250x100.png/dddddd/000000', 'http://dummyimage.com/104x100.png/cc0000/ffffff', 'http://dummyimage.com/185x100.png/ff4444/ffffff', '0.04420000000000000000', '0.52690000000000000000', 3),
(69, 'Maurizio', '0.0000', 'http://dummyimage.com/187x100.png/5fa2dd/ffffff', 'http://dummyimage.com/182x100.png/dddddd/000000', 'http://dummyimage.com/155x100.png/ff4444/ffffff', '0.57155000000000000000', '0.56561000000000000000', 2),
(70, 'Teena', '0.0000', 'http://dummyimage.com/212x100.png/5fa2dd/ffffff', 'http://dummyimage.com/104x100.png/5fa2dd/ffffff', 'http://dummyimage.com/106x100.png/dddddd/000000', '0.10475000000000000000', '0.10915000000000000000', 1),
(71, 'Esteban', '0.0000', 'http://dummyimage.com/185x100.png/cc0000/ffffff', 'http://dummyimage.com/237x100.png/dddddd/000000', 'http://dummyimage.com/183x100.png/cc0000/ffffff', '0.33483000000000000000', '0.49014000000000000000', 3),
(72, 'Nil', '0.0000', 'http://dummyimage.com/203x100.png/ff4444/ffffff', 'http://dummyimage.com/249x100.png/5fa2dd/ffffff', 'http://dummyimage.com/249x100.png/5fa2dd/ffffff', '0.50945000000000000000', '0.81654000000000000000', 2),
(73, 'Fairlie', '0.0000', 'http://dummyimage.com/182x100.png/5fa2dd/ffffff', 'http://dummyimage.com/134x100.png/cc0000/ffffff', 'http://dummyimage.com/202x100.png/dddddd/000000', '0.79852000000000000000', '0.98772000000000000000', 1),
(74, 'Lamar', '0.0000', 'http://dummyimage.com/209x100.png/ff4444/ffffff', 'http://dummyimage.com/215x100.png/ff4444/ffffff', 'http://dummyimage.com/146x100.png/ff4444/ffffff', '0.01789000000000000000', '0.22208000000000000000', 3),
(75, 'Gerhardine', '0.0000', 'http://dummyimage.com/182x100.png/5fa2dd/ffffff', 'http://dummyimage.com/141x100.png/dddddd/000000', 'http://dummyimage.com/129x100.png/dddddd/000000', '0.23192000000000000000', '0.75284000000000000000', 3),
(76, 'Bette-ann', '0.0000', 'http://dummyimage.com/149x100.png/dddddd/000000', 'http://dummyimage.com/235x100.png/ff4444/ffffff', 'http://dummyimage.com/111x100.png/ff4444/ffffff', '0.79048000000000000000', '0.33036000000000000000', 3),
(77, 'Ambros', '0.0000', 'http://dummyimage.com/248x100.png/dddddd/000000', 'http://dummyimage.com/161x100.png/5fa2dd/ffffff', 'http://dummyimage.com/173x100.png/cc0000/ffffff', '0.76613000000000000000', '0.87304000000000000000', 3),
(78, 'Carrol', '0.0000', 'http://dummyimage.com/121x100.png/5fa2dd/ffffff', 'http://dummyimage.com/233x100.png/ff4444/ffffff', 'http://dummyimage.com/101x100.png/dddddd/000000', '0.73271000000000000000', '0.34398000000000000000', 2),
(79, 'Keslie', '0.0000', 'http://dummyimage.com/102x100.png/cc0000/ffffff', 'http://dummyimage.com/234x100.png/cc0000/ffffff', 'http://dummyimage.com/138x100.png/cc0000/ffffff', '0.85837000000000000000', '0.23089000000000000000', 1),
(80, 'Whitney', '0.0000', 'http://dummyimage.com/138x100.png/dddddd/000000', 'http://dummyimage.com/230x100.png/dddddd/000000', 'http://dummyimage.com/224x100.png/dddddd/000000', '0.47226000000000000000', '0.22402000000000000000', 2),
(81, 'Nissie', '0.0000', 'http://dummyimage.com/227x100.png/dddddd/000000', 'http://dummyimage.com/189x100.png/ff4444/ffffff', 'http://dummyimage.com/227x100.png/5fa2dd/ffffff', '0.87411000000000000000', '0.15092000000000000000', 1),
(82, 'Levon', '0.0000', 'http://dummyimage.com/238x100.png/cc0000/ffffff', 'http://dummyimage.com/131x100.png/ff4444/ffffff', 'http://dummyimage.com/202x100.png/ff4444/ffffff', '0.83388000000000000000', '0.72504000000000000000', 2),
(83, 'Stuart', '0.0000', 'http://dummyimage.com/238x100.png/5fa2dd/ffffff', 'http://dummyimage.com/119x100.png/ff4444/ffffff', 'http://dummyimage.com/189x100.png/cc0000/ffffff', '0.94261000000000000000', '0.32862000000000000000', 1),
(84, 'Josefina', '0.0000', 'http://dummyimage.com/159x100.png/5fa2dd/ffffff', 'http://dummyimage.com/152x100.png/5fa2dd/ffffff', 'http://dummyimage.com/227x100.png/ff4444/ffffff', '0.90762000000000000000', '0.11162000000000000000', 2),
(85, 'Arlie', '0.0000', 'http://dummyimage.com/174x100.png/5fa2dd/ffffff', 'http://dummyimage.com/217x100.png/ff4444/ffffff', 'http://dummyimage.com/242x100.png/dddddd/000000', '0.95262000000000000000', '0.72628000000000000000', 2),
(86, 'Randy', '0.0000', 'http://dummyimage.com/210x100.png/5fa2dd/ffffff', 'http://dummyimage.com/162x100.png/ff4444/ffffff', 'http://dummyimage.com/131x100.png/dddddd/000000', '0.42844000000000000000', '0.29990000000000000000', 1),
(87, 'Hamel', '0.0000', 'http://dummyimage.com/215x100.png/cc0000/ffffff', 'http://dummyimage.com/180x100.png/ff4444/ffffff', 'http://dummyimage.com/220x100.png/ff4444/ffffff', '0.09666000000000000000', '0.81738000000000000000', 2),
(88, 'Klara', '0.0000', 'http://dummyimage.com/223x100.png/ff4444/ffffff', 'http://dummyimage.com/130x100.png/ff4444/ffffff', 'http://dummyimage.com/165x100.png/ff4444/ffffff', '0.69457000000000000000', '0.97792000000000000000', 1),
(89, 'Dal', '0.0000', 'http://dummyimage.com/168x100.png/dddddd/000000', 'http://dummyimage.com/119x100.png/dddddd/000000', 'http://dummyimage.com/137x100.png/ff4444/ffffff', '0.91334000000000000000', '0.51907000000000000000', 2),
(90, 'Mitchel', '0.0000', 'http://dummyimage.com/126x100.png/cc0000/ffffff', 'http://dummyimage.com/212x100.png/ff4444/ffffff', 'http://dummyimage.com/238x100.png/cc0000/ffffff', '0.51307000000000000000', '0.44444000000000000000', 3),
(91, 'Claudia', '0.0000', 'http://dummyimage.com/209x100.png/cc0000/ffffff', 'http://dummyimage.com/192x100.png/5fa2dd/ffffff', 'http://dummyimage.com/132x100.png/dddddd/000000', '0.53111000000000000000', '0.40967000000000000000', 1),
(92, 'Agnese', '0.0000', 'http://dummyimage.com/248x100.png/ff4444/ffffff', 'http://dummyimage.com/143x100.png/ff4444/ffffff', 'http://dummyimage.com/192x100.png/cc0000/ffffff', '0.64504000000000000000', '0.24019000000000000000', 1),
(93, 'Nealy', '0.0000', 'http://dummyimage.com/246x100.png/cc0000/ffffff', 'http://dummyimage.com/129x100.png/5fa2dd/ffffff', 'http://dummyimage.com/151x100.png/5fa2dd/ffffff', '0.00224000000000000000', '0.38274000000000000000', 2),
(94, 'Felix', '0.0000', 'http://dummyimage.com/134x100.png/ff4444/ffffff', 'http://dummyimage.com/220x100.png/cc0000/ffffff', 'http://dummyimage.com/152x100.png/ff4444/ffffff', '0.68238000000000000000', '0.65052000000000000000', 1),
(95, 'Aguistin', '0.0000', 'http://dummyimage.com/248x100.png/ff4444/ffffff', 'http://dummyimage.com/162x100.png/dddddd/000000', 'http://dummyimage.com/191x100.png/5fa2dd/ffffff', '0.05326000000000000000', '0.94468000000000000000', 2),
(96, 'Gail', '0.0000', 'http://dummyimage.com/148x100.png/dddddd/000000', 'http://dummyimage.com/236x100.png/cc0000/ffffff', 'http://dummyimage.com/223x100.png/cc0000/ffffff', '0.20228000000000000000', '0.62243000000000000000', 3),
(97, 'Jeanette', '0.0000', 'http://dummyimage.com/242x100.png/ff4444/ffffff', 'http://dummyimage.com/203x100.png/5fa2dd/ffffff', 'http://dummyimage.com/160x100.png/cc0000/ffffff', '0.70643000000000000000', '0.24060000000000000000', 3),
(98, 'Alberik', '0.0000', 'http://dummyimage.com/250x100.png/ff4444/ffffff', 'http://dummyimage.com/227x100.png/dddddd/000000', 'http://dummyimage.com/238x100.png/dddddd/000000', '0.05871000000000000000', '0.78136000000000000000', 3),
(99, 'Tabby', '0.0000', 'http://dummyimage.com/232x100.png/ff4444/ffffff', 'http://dummyimage.com/209x100.png/5fa2dd/ffffff', 'http://dummyimage.com/136x100.png/5fa2dd/ffffff', '0.01173000000000000000', '0.32914000000000000000', 1),
(100, 'Denise', '0.0000', 'http://dummyimage.com/128x100.png/cc0000/ffffff', 'http://dummyimage.com/154x100.png/ff4444/ffffff', 'http://dummyimage.com/104x100.png/cc0000/ffffff', '0.78240000000000000000', '0.60861000000000000000', 1),
(101, 'Cirstoforo', '0.5900', 'http://dummyimage.com/152x100.png/cc0000/ffffff', 'http://dummyimage.com/139x100.png/cc0000/ffffff', 'http://dummyimage.com/240x100.png/ff4444/ffffff', '0.22157000000000000000', '0.15435000000000000000', 3),
(102, 'Pan', '1.0234', '', '', '', '0.00000000000000000000', '0.00000000000000000000', 10),
(103, 'Alvaro', '159.2645', 'http://localhost/web/backend/view/imgProducts/103/', 'http://localhost/web/backend/view/imgProducts/103/', 'http://localhost/web/backend/view/imgProducts/103/', '0.00000000000000000000', '0.00000000000000000000', 31),
(104, 'Trigo', '1.0235', 'http://localhost/web/backend/view/imgProducts/104/Foto_Carnet_Alvaro_Larumbe.jpeg', 'http://localhost/web/backend/view/imgProducts/104/', 'http://localhost/web/backend/view/imgProducts/104/', '0.00000000000000000000', '0.00000000000000000000', 32),
(105, 'Mazacote', '11.0000', 'http://localhost/web/backend/view/imgProducts/105/Foto_Carnet_Alvaro_Larumbe.jpeg', '', '', '0.00000000000000000000', '0.00000000000000000000', 79);

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
(1, 'alvaro@larumbe.es', 'Álvaro', 4787498, '487.2145', '6ca2dd6e7fdac06ee2218ee7460e0099170ab527', 'admin'),
(3, 'gatkins0@histats.com', 'Gary', 624, '25.2548', '63200g2CQiWV', 'usuario'),
(5, 'lbogaert2@arizona.edu', 'Lanny', 989, '0.0000', '877lTUz4CT', 'usuario'),
(6, 'ggethins3@unesco.org', 'Gisela', 556, '0.0000', 'T1lfkzQfFQ0', 'usuario'),
(7, 'acess4@census.gov', 'Angus', 780, '0.0000', 'EJvC7P5O', 'usuario'),
(8, 'wphalip5@nih.gov', 'Wilbert', 520, '0.0000', 'on3Wu0daAu', 'usuario'),
(9, 'ltafani6@flickr.com', 'Laurice', 591, '0.0000', 'vwbxwwq1', 'usuario'),
(10, 'ccouves7@reuters.com', 'Claiborne', 414, '0.0000', 'cQb67voS', 'usuario'),
(11, 'mrowbottom8@istockphoto.com', 'Mattie', 402, '0.0000', '42MSWCSble', 'usuario'),
(13, 'jwyldesa@comcast.net', 'Jeri', 115, '0.0000', 'JPxRYQwMW', 'usuario'),
(14, 'kgiovanib@slashdot.org', 'Kennan', 481, '0.0000', 'WajSTgvK84vw', 'usuario'),
(15, 'astoggellc@naver.com', 'Anni', 272, '0.0000', 'XlRvGRizs', 'usuario'),
(16, 'flawilled@pbs.org', 'Fielding', 572, '0.0000', 'm2EP56XaM0Px', 'usuario'),
(17, 'bhazemane@example.com', 'Brooke', 604, '0.0000', 'DSjUBobw', 'usuario'),
(18, 'gchantrellf@biglobe.ne.jp', 'Gustav', 378, '0.0000', 'zr6Jv4ot', 'usuario'),
(19, 'wleatg@senate.gov', 'Wyndham', 314, '0.0000', '0rN06olMPA', 'usuario'),
(20, 'mvaleh@1und1.de', 'Myrtia', 334, '0.0000', '2xeMKF0asXqa', 'usuario'),
(21, 'ashrimplingi@blogger.com', 'Ashton', 330, '0.0000', 'lLhCzxW', 'usuario'),
(22, 'mcoolicanj@msn.com', 'Merrie', 841, '0.0000', 'rEOJBH7I7gUb', 'usuario'),
(23, 'mkingwellk@twitpic.com', 'Mauricio', 435, '0.0000', 'nhfvCa9', 'usuario'),
(24, 'pgogginl@yale.edu', 'Pren', 668, '0.0000', 'Wahqbe', 'usuario'),
(25, 'fstopherm@163.com', 'Farley', 962, '0.0000', 'DB3WF78BG', 'usuario'),
(26, 'grealphn@imdb.com', 'Gabbie', 651, '0.0000', 'V6t0YZ1QVzf7', 'usuario'),
(27, 'rlillegardo@issuu.com', 'Reiko', 594, '0.0000', 'jQERKp', 'usuario'),
(28, 'mmalsterp@liveinternet.ru', 'Marie-jeanne', 801, '0.0000', 'XYt4jjdtX5b', 'usuario'),
(29, 'ipimmeq@weebly.com', 'Israel', 124, '0.0000', 'fBkpaa', 'usuario'),
(30, 'ikaner@arizona.edu', 'Ileana', 301, '0.0000', 'JJMKzc', 'usuario'),
(31, 'rcoupes@infoseek.co.jp', 'Reinaldos', 833, '0.0000', 'gucvkqpOAOGK', 'usuario'),
(32, 'kgerretst@google.co.jp', 'Kennedy', 196, '0.0000', 'h8zsnsOkS97U', 'usuario'),
(33, 'abennincku@thetimes.co.uk', 'Arlin', 842, '0.0000', 'AlZVKHS', 'usuario'),
(34, 'mchoppinv@w3.org', 'Mace', 367, '0.0000', 'ZFsQhwKJEW7C', 'usuario'),
(35, 'gsturdyw@nifty.com', 'Gerry', 773, '0.0000', 'PsvWa4', 'usuario'),
(36, 'amillardx@pbs.org', 'Alice', 358, '0.0000', 'bDjr8bFyj9Ir', 'usuario'),
(37, 'eriehmy@washingtonpost.com', 'Estel', 928, '0.0000', 'nUmLZQdY', 'usuario'),
(38, 'bbothiez@noaa.gov', 'Birdie', 662, '0.0000', 'BuRYpTmI', 'usuario'),
(39, 'wcopestake10@mozilla.org', 'Winna', 683, '0.0000', 'qxNlsd', 'usuario'),
(40, 'dcahill11@xing.com', 'Dalton', 246, '0.0000', '0r9rQRaRiy', 'usuario'),
(41, 'gmosedall12@stanford.edu', 'Gardener', 682, '0.0000', 'xAIGIR3q6f2t', 'usuario'),
(42, 'htunuy13@mtv.com', 'Humfrey', 217, '0.0000', '9OLDyJVfHJPo', 'usuario'),
(43, 'hdunaway14@guardian.co.uk', 'Herschel', 602, '0.0000', 'PzvheoO', 'usuario'),
(44, 'owindous15@bbb.org', 'Olimpia', 962, '0.0000', 'axN9bMywIRg', 'usuario'),
(45, 'mworks16@aol.com', 'Marcelle', 933, '0.0000', 'DGrI4WZpa', 'usuario'),
(46, 'fcurthoys17@whitehouse.gov', 'Ferdie', 892, '0.0000', 'uhnkOvwsLE', 'usuario'),
(47, 'arothert18@dmoz.org', 'Alis', 739, '0.0000', 'kjKuhBihXQfO', 'usuario'),
(48, 'fdumbelton19@jugem.jp', 'Fabiano', 947, '0.0000', 'VJ75SWfRds', 'usuario'),
(49, 'baitken1a@huffingtonpost.com', 'Bayard', 221, '0.0000', 'stMw0ahdlB', 'usuario'),
(50, 'cpollendine1b@seesaa.net', 'Carrol', 675, '0.0000', '2qkS1nr', 'usuario'),
(51, 'mgarvie1c@csmonitor.com', 'Merrily', 490, '0.0000', 'CZyi1a', 'usuario'),
(52, 'yhadingham1d@earthlink.net', 'Yance', 524, '0.0000', 'pkFpnEi1', 'usuario'),
(53, 'kcarren1e@bandcamp.com', 'Krystle', 469, '0.0000', 'ZY4rOUe', 'usuario'),
(54, 'wstreetley1f@google.ru', 'Willy', 512, '0.0000', 'byEpWxKDGn', 'usuario'),
(55, 'abatham1g@dagondesign.com', 'Alikee', 763, '0.0000', 'KsrXFbENAHs', 'usuario'),
(56, 'cmacgaughy1h@yahoo.com', 'Connie', 142, '0.0000', 'VYW4RQHD8', 'usuario'),
(57, 'rtomadoni1i@dion.ne.jp', 'Roddy', 963, '0.0000', 'M7Q5vKCMFA', 'usuario'),
(58, 'dsquibbes1j@nps.gov', 'Donnie', 719, '0.0000', 'YibGXhT', 'usuario'),
(59, 'fgready1k@nps.gov', 'Fredek', 315, '0.0000', 'btZZsi', 'usuario'),
(60, 'pflicker1l@paginegialle.it', 'Phillie', 422, '0.0000', 'f7Yh2WR92', 'usuario'),
(61, 'tallenby1m@feedburner.com', 'Tab', 907, '0.0000', '81bWdJ2', 'usuario'),
(62, 'bdaunay1n@jigsy.com', 'Bernadine', 402, '0.0000', 'fccnGVEoaeM', 'usuario'),
(63, 'lmcaulay1o@smh.com.au', 'Lida', 137, '0.0000', 'QIZJFEv3', 'usuario'),
(64, 'rpogue1p@paypal.com', 'Robby', 246, '0.0000', 'XR2iVxJiiZt', 'usuario'),
(65, 'dblaszczak1q@sogou.com', 'Dex', 874, '0.0000', 'X88gOx4m', 'usuario'),
(66, 'lvidgeon1r@ehow.com', 'Linn', 525, '0.0000', '9m53WpXd', 'usuario'),
(67, 'bamorts1s@addtoany.com', 'Boyd', 717, '0.0000', 'ktBMt51', 'usuario'),
(68, 'mmcgilmartin1t@gmpg.org', 'Melvin', 782, '0.0000', '855fpO5rsHz', 'usuario'),
(69, 'jglasheen1u@github.com', 'Justin', 126, '0.0000', '6I4BBPjrL', 'usuario'),
(70, 'htaggett1v@feedburner.com', 'Hedi', 903, '0.0000', 'KfbcMj', 'usuario'),
(71, 'twanell1w@google.com.br', 'Tarra', 991, '0.0000', 'sjD44a', 'usuario'),
(72, 'gburrill1x@examiner.com', 'Gino', 719, '0.0000', 'xDGAtv', 'usuario'),
(73, 'mmagrannell1y@craigslist.org', 'Marcy', 755, '0.0000', 'UKRBUzb0D3', 'usuario'),
(74, 'gvelde1z@ehow.com', 'Glenna', 798, '0.0000', '6w1iyQlnH', 'usuario'),
(75, 'rkirley20@admin.ch', 'Rasia', 944, '0.0000', 'epODu1R4', 'usuario'),
(76, 'vlargan21@house.gov', 'Vinny', 120, '0.0000', 'HEmAhHetrbTb', 'usuario'),
(77, 'isunter22@cocolog-nifty.com', 'Isa', 258, '0.0000', '40PrRmpqhu', 'usuario'),
(78, 'ewoolley23@google.pl', 'Edlin', 172, '0.0000', 'NqVN0lWcO', 'usuario'),
(79, 'kdowgill24@nyu.edu', 'Kean', 975, '0.0000', 'Hj0JJQs9FaE', 'usuario'),
(80, 'ehillaby25@narod.ru', 'Eva', 478, '0.0000', 'GUqSd5QxVktW', 'usuario'),
(81, 'kthirsk26@arizona.edu', 'Kennie', 535, '0.0000', 'W2dJbwYqK', 'usuario'),
(82, 'ksummergill27@com.com', 'Kippar', 276, '0.0000', 'KxCrN7k', 'usuario'),
(83, 'lmcaw28@privacy.gov.au', 'Leopold', 628, '0.0000', 'rJ531IZW', 'usuario'),
(84, 'rfrobisher29@wiley.com', 'Rubi', 326, '0.0000', 'ihghwBNyK', 'usuario'),
(85, 'cdenisyuk2a@ucla.edu', 'Candra', 758, '0.0000', 'ISnzNn', 'usuario'),
(86, 'bfrail2b@bigcartel.com', 'Brinn', 925, '0.0000', 'LwCyg20DLp', 'usuario'),
(87, 'agritten2c@phpbb.com', 'Agnesse', 327, '0.0000', 'RB0kL7d', 'usuario'),
(88, 'fsteel2d@webmd.com', 'Fannie', 183, '0.0000', 'mccJR2wHab', 'usuario'),
(89, 'flambertson2e@imageshack.us', 'Filmer', 838, '0.0000', 'Vi3r5J', 'usuario'),
(90, 'pcawsey2f@creativecommons.org', 'Phaidra', 619, '0.0000', 'FWSCO5k13u8', 'usuario'),
(91, 'twillmetts2g@ft.com', 'Trista', 718, '0.0000', '1LmQGzNifHh9', 'usuario'),
(92, 'dhulmes2h@tinypic.com', 'Darsey', 765, '0.0000', 'YQkklwck9a', 'usuario'),
(93, 'jsyer2i@icio.us', 'Jaquelyn', 238, '0.0000', 'anL78Zt9', 'usuario'),
(94, 'chullett2j@posterous.com', 'Candie', 770, '0.0000', '5oLwDaj8mnT', 'usuario'),
(95, 'shazelton2k@sitemeter.com', 'Salomon', 252, '0.0000', 'ISNLg66SBU', 'usuario'),
(96, 'bredgrave2l@timesonline.co.uk', 'Bambie', 371, '0.0000', 'ZpQQ0AJ15z', 'usuario'),
(97, 'wdurbann2m@fastcompany.com', 'Willey', 633, '0.0000', 'sXaVehB9eXo', 'usuario'),
(98, 'rbrimicombe2n@dell.com', 'Raff', 406, '0.0000', 'hGC45Xj', 'usuario'),
(99, 'ipennick2o@answers.com', 'Izzy', 553, '0.0000', 'TRsC213NBN', 'usuario'),
(100, 'kmcettrick2p@youtu.be', 'Katusha', 212, '0.0000', 'lq7BzGk6ZO5X', 'usuario'),
(101, 'szavattero2q@ycombinator.com', 'Saleem', 229, '0.0000', 'Z8FVTzP', 'usuario'),
(102, 'cglison2r@google.ru', 'Carin', 419, '0.0000', 'jI2Gm0byFOFF', 'usuario'),
(103, 'kulo56534@gmail.com', 'Alvaro', 8564856, '1561.0000', '', 'usuario'),
(106, 'monica@larumbe.es', 'Alvaro', 8564856, '16.0000', '6ca2dd6e7fdac06ee2218ee7460e0099170ab527', 'usuario'),
(107, 'kulo56534@gmail.es', 'Alvaro', 654654564, '5418564.0000', '5b3cbbe2f7af9087a3116cf872ed66f551f129fc', 'usuario');

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
  MODIFY `Id_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `Id_Comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `Id_Compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de la tabla `objeto`
--
ALTER TABLE `objeto`
  MODIFY `ID_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

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
