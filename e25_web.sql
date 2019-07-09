-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-07-2019 a las 20:16:02
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
  `cover` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `e25_category`
--

INSERT INTO `e25_category` (`id_category`, `name`, `description`, `cover`) VALUES
(1, 'Obra publica', 'Lorem ipsum dolor sit amet et shrevit me estoucas inventidostin la descriptsionï¿½.', -1),
(2, 'Obra privada', 'Lorem ipsum dolor sit amet et shrevit me estoucas inventidostin la descriptsionï¿½.', 0),
(3, 'Renta e instalaciÃ³n de andamios', 'SÃ³lo quiero ver si la descripciÃ³n cambia correctamente. Ã‰sta es una descripciÃ³n de prueba para los andamios.', 93),
(4, 'Estructuras de acero', 'Lorem ipsum dolor sit amet et shrevit me estoucas inventidostin la hola', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `e25_images`
--

CREATE TABLE `e25_images` (
  `project_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `e25_images`
--

INSERT INTO `e25_images` (`project_id`, `name`) VALUES
(93, 'Andamios Jesus maria 1'),
(93, 'Andamios Jesus maria 2'),
(93, 'Andamios Jesus maria 3'),
(93, 'Andamios Jesus maria 4'),
(94, 'Andamios musa interior 1'),
(94, 'Andamios musa interior 2'),
(94, 'Andamios musa interior 3'),
(94, 'Andamios musa interior 4'),
(96, 'Andamios Palacio 1'),
(96, 'Andamios Palacio 2'),
(96, 'Andamios Palacio 3'),
(96, 'Andamios Palacio 4'),
(96, 'Andamios Palacio 5'),
(95, 'Andamios musa exterior 1'),
(95, 'Andamios musa exterior 2'),
(95, 'Andamios musa exterior 3'),
(95, 'Andamios musa exterior 4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `e25_project`
--

CREATE TABLE `e25_project` (
  `id_project` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `img` varchar(40) CHARACTER SET utf8 NOT NULL,
  `category` int(11) NOT NULL,
  `ord` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `e25_project`
--

INSERT INTO `e25_project` (`id_project`, `name`, `description`, `img`, `category`, `ord`) VALUES
(93, 'Andamios JesÃºs MarÃ­a', 'InstalaciÃ³n de andamios a una altura de 14mts para la restauraciÃ³n de la pintura en la cÃºpula. Se coloco un tapanco de madera en la corniza superior para facilitar los trabajos a los restauradores. <br>La renta del andamios proporciono seguridad a los trabajadores gracias a la instalaciÃ³n de escaleras y barandales para el facil acceso.', 'Andamios Jesus maria 3', 3, 0),
(94, 'Andamios musa interior', 'IntalaciÃ³n de andamios y tapanco de madera a una altura de 16mts para la restauraciÃ³n del mural de JosÃ© Clemente Orozco. El tapanco cubrio un diametro de 10.70mts el cual sirvio como apoyo para la colocaciÃ³n de andamios en la parte superior para facilitar los trabajos a los resturadores. Se colocaron siete torres de 8 modulos cada una con escaleras para el ingreso, asi como torres en la parte frontal del escenario.', 'portada_andamios_musa', 3, 1),
(95, 'Andamios musa exterior', 'InstalaciÃ³n de andamios en azotea para la restauraciÃ³n de la cupÃºla, el proyecto consistia en brindar seguridad y soporte a los restauradores para realizar el cambio de azulejos por medio de una estructura de acero que no debia de tocar la misma para evitar daÃ±os estructurales. Se colocaron torres de andamios alrededor de la cupÃºla asi como dos aros sujetados de marcos riguidos para elevar la estructura.', 'portada_musa_exterior', 3, 2),
(96, 'Palacio de Gobierno', 'InstalaciÃ³n de andamios en el antiguo recinto para la restauraciÃ³n del mural hecho por JosÃ© Clemente Orozco donde se construyo un tapanco para facilitar los trabajos asegurandonos de proporcionar un perfecto alcance para los usuarios.\nTambien se colocarion andamios en las escaleras del recinto donde permanece otro mural en el cual se nivelaron los modulos para proporcionar una superficie recta de trabajo.', 'portada_palacio', 3, 4);

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
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
