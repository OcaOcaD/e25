-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-07-2019 a las 06:33:49
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `e25_web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `e25_category`
--

CREATE TABLE `e25_category` (
  `id_category` int(11) NOT NULL,
  `name` varchar(40) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cover` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `e25_category`
--

INSERT INTO `e25_category` (`id_category`, `name`, `description`, `cover`) VALUES
(1, 'Obra publica', 'Lorem ipsum dolor sit amet et shrevit me estoucas inventidostin la descriptsionè.', 'project1'),
(2, 'Obra privada', 'Lorem ipsum dolor sit amet et shrevit me estoucas inventidostin la descriptsionè.', 'project2'),
(3, 'Renta e instalación de andamios', 'Lorem ipsum dolor sit amet et shrevit me estoucas inventidostin la descriptsionè.', 'project4'),
(4, 'Estructuras de acero', 'Lorem ipsum dolor sit amet et shrevit me estoucas inventidostin la descriptsionè.', 'project3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `e25_project`
--

CREATE TABLE `e25_project` (
  `id_project` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `img` varchar(40) CHARACTER SET utf8 NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `e25_project`
--

INSERT INTO `e25_project` (`id_project`, `name`, `description`, `img`, `category`) VALUES
(73, 'Project 0', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae esse ullam at. Eligendi sunt pariatur ratione voluptatum aperiam natus quae maiores mollitia tempora.', 'project0', 0),
(74, 'Project 1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae esse ullam at. Eligendi sunt pariatur ratione voluptatum aperiam natus quae maiores mollitia tempora.', 'project1', 1),
(75, 'Project 2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae esse ullam at. Eligendi sunt pariatur ratione voluptatum aperiam natus quae maiores mollitia tempora.', 'project2', 2),
(76, 'Project 3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae esse ullam at. Eligendi sunt pariatur ratione voluptatum aperiam natus quae maiores mollitia tempora.', 'project3', 3),
(77, 'Project 4', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae esse ullam at. Eligendi sunt pariatur ratione voluptatum aperiam natus quae maiores mollitia tempora.', 'project4', 4),
(78, 'Project 5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae esse ullam at. Eligendi sunt pariatur ratione voluptatum aperiam natus quae maiores mollitia tempora.', 'project5', 0),
(79, 'Project 6', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae esse ullam at. Eligendi sunt pariatur ratione voluptatum aperiam natus quae maiores mollitia tempora.', 'project6', 1),
(80, 'Project 7', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae esse ullam at. Eligendi sunt pariatur ratione voluptatum aperiam natus quae maiores mollitia tempora.', 'project7', 2),
(81, 'Project 8', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae esse ullam at. Eligendi sunt pariatur ratione voluptatum aperiam natus quae maiores mollitia tempora.', 'project8', 3),
(82, 'Project 9', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae esse ullam at. Eligendi sunt pariatur ratione voluptatum aperiam natus quae maiores mollitia tempora.', 'project9', 4),
(83, 'Project 10', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae esse ullam at. Eligendi sunt pariatur ratione voluptatum aperiam natus quae maiores mollitia tempora.', 'project10', 0),
(84, 'Project 11', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae esse ullam at. Eligendi sunt pariatur ratione voluptatum aperiam natus quae maiores mollitia tempora.', 'project11', 1),
(85, 'Project 12', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae esse ullam at. Eligendi sunt pariatur ratione voluptatum aperiam natus quae maiores mollitia tempora.', 'project12', 2),
(86, 'Project 13', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae esse ullam at. Eligendi sunt pariatur ratione voluptatum aperiam natus quae maiores mollitia tempora.', 'project13', 3),
(87, 'Project 14', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae esse ullam at. Eligendi sunt pariatur ratione voluptatum aperiam natus quae maiores mollitia tempora.', 'project14', 4),
(88, 'Project 15', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae esse ullam at. Eligendi sunt pariatur ratione voluptatum aperiam natus quae maiores mollitia tempora.', 'project15', 0),
(89, 'Project 16', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae esse ullam at. Eligendi sunt pariatur ratione voluptatum aperiam natus quae maiores mollitia tempora.', 'project16', 1),
(90, 'Project 17', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae esse ullam at. Eligendi sunt pariatur ratione voluptatum aperiam natus quae maiores mollitia tempora.', 'project17', 2),
(91, 'Project 18', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae esse ullam at. Eligendi sunt pariatur ratione voluptatum aperiam natus quae maiores mollitia tempora.', 'project18', 3),
(92, 'Project 19', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae esse ullam at. Eligendi sunt pariatur ratione voluptatum aperiam natus quae maiores mollitia tempora.', 'project19', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `e25_category`
--
ALTER TABLE `e25_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indices de la tabla `e25_project`
--
ALTER TABLE `e25_project`
  ADD PRIMARY KEY (`id_project`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `e25_category`
--
ALTER TABLE `e25_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `e25_project`
--
ALTER TABLE `e25_project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
