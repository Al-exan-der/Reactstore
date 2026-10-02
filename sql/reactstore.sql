-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2026 a las 02:45:04
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
-- Base de datos: `reactstore`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_user`
--

CREATE TABLE `login_user` (
  `nom_usu` text NOT NULL,
  `ape_usu` text NOT NULL,
  `nac_usu` date NOT NULL,
  `num_usu` varchar(50) NOT NULL,
  `cor_usu` varchar(50) NOT NULL,
  `pas_usu1` varchar(50) NOT NULL,
  `pas_usu2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `login_user`
--

INSERT INTO `login_user` (`nom_usu`, `ape_usu`, `nac_usu`, `num_usu`, `cor_usu`, `pas_usu1`, `pas_usu2`) VALUES
('ewrew', 'erwre', '2026-06-27', '1321324', 'ewreewrw@gmail.com', '123#', '123#'),
('alex', '', '0000-00-00', '', '', '', ''),
('alex', 'gomez', '2026-06-09', '123489', 'ewreewrw@gmail.com', '123', '154'),
('ewrew', 'gomez', '2026-06-09', '123432', 'ewreewrw@gmail.com', '123', '123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
