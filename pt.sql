-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 22-05-2023 a las 14:39:12
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pt`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ropa`
--

DROP TABLE IF EXISTS `ropa`;
CREATE TABLE IF NOT EXISTS `ropa` (
  `id_producto` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `n_modelo` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `p_compra` int UNSIGNED NOT NULL,
  `p_venta` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ropa`
--

INSERT INTO `ropa` (`id_producto`, `nombre`, `n_modelo`, `p_compra`, `p_venta`) VALUES
(0000000001, 'Camisa azul', 'CA001', 100, 200),
(0000000002, 'Pantalón Azul', 'PA010', 120, 150),
(0000000003, 'Camisa rosa', 'CR001', 50, 100),
(0000000004, 'Pantalón rosa', 'PR010', 220, 250),
(0000000005, 'falda verde', 'fv001', 25, 50),
(0000000006, 'camisa verde', 'cv001', 70, 140),
(0000000007, 'pantalon verde', 'pv001', 50, 150),
(0000000008, 'Blusa marron', 'bm001', 50, 160),
(0000000009, 'Pantalon marron', 'pm001', 60, 120),
(0000000010, 'probando', 'probando', 2, 4),
(0000000011, 'probando', 'probando', 2, 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
