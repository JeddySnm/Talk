-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2024 a las 02:02:14
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
-- Base de datos: `chat`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(7, 440971576, 1472298766, 'Hola'),
(8, 1472298766, 1476189112, 'Hola Hijo'),
(9, 1476189112, 1472298766, 'TE AMO MAMI'),
(10, 1476189112, 857727946, 'Hola Marucha'),
(11, 857727946, 712587785, 'Tengo hambre'),
(12, 712587785, 857727946, 'anda a dormir'),
(13, 1051094131, 895383243, 'Hola Ana '),
(14, 1051094131, 895383243, 'Cómo estas?'),
(15, 895383243, 1051094131, 'Muy bien freddy y tu?'),
(16, 1051094131, 895383243, 'Holaaa'),
(17, 1051094131, 895383243, 'Tú eres como rarito '),
(18, 895383243, 1051094131, 'fea'),
(19, 895383243, 1051094131, 'fea'),
(20, 895383243, 1051094131, 'feae'),
(21, 895383243, 1051094131, 'faef'),
(22, 1051094131, 895383243, 'Jdjsjsjjs'),
(23, 895383243, 1051094131, 'eye'),
(24, 895383243, 1051094131, 'yety'),
(25, 895383243, 1051094131, 'yety'),
(26, 895383243, 1051094131, 'yety'),
(27, 1051094131, 698673279, 'Pato'),
(28, 698673279, 1051094131, 'grerger'),
(29, 698673279, 1051094131, '<script>alert(\'Hola\');</script>'),
(30, 698673279, 1051094131, 'alert(\'Hola\');'),
(31, 698673279, 1051094131, '&lt;script&gt;alert(\'Hola\');&lt;/script&gt;'),
(32, 698673279, 1051094131, '&lt;h1&gt;hola&lt;/h1&gt;'),
(33, 698673279, 1051094131, '&lt;script&gt;alert(\'Hola\');&lt;/script&gt;'),
(34, 698673279, 1051094131, 'increible'),
(36, 698673279, 1051094131, 'h'),
(37, 1531324351, 116889784, 'hola'),
(38, 116889784, 332342639, 'hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `security_question` varchar(300) NOT NULL,
  `security_answer` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`, `security_question`, `security_answer`) VALUES
(6, 857727946, 'Josue', 'Davila', 'josue@gmail.com', '25d55ad283aa400af464c76d713c07ad', '17036821952021_03_06_19_24_07.jpg', 'Disponible', 'nont', '1'),
(8, 445091057, 'David', 'Gonzalez', 'davidgonzalez@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '17045260242021_03_29_06_14_49.jpg', 'Offline now', 'nont', '1'),
(9, 676589154, 'Maria', 'Artiere', 'mariaartiere@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '17045266722021_02_27_19_11_19.jpg', 'Offline now', 'nont', '1'),
(10, 1051094131, 'freddy', 'sanchez', 'crosles0.1@gmail.com', '25f9e794323b453885f5181f1b624d0b', '1705425521_4bae9845-717e-460b-aea3-425888ca708a.jpg', 'Disponible', 'nont', '1'),
(11, 895383243, 'Ana', 'Sánchez ', 'jeddy.s.nm@gmail.com', '25d55ad283aa400af464c76d713c07ad', '1705427714Screenshot_2023-11-30-15-09-30-915_com.facebook.lite.jpg', 'Offline now', 'nont', '1'),
(12, 698673279, 'Luis', 'Guanipa ', 'Luisca.guanipa@gmail.com', '6ebe76c9fb411be97b3b0d48b791a7c9', '170569170920240119_131637.jpg', 'Disponible', 'nont', '1'),
(13, 1531324351, 'lucas', 'peres', 'lucasperes@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1706141168_bf9cb7cf-1412-4b44-bd1d-620fc064b358.jpg', 'Offline now', '1234', '81dc9bdb52d04dc20036dbd8313ed055'),
(14, 116889784, 'Javi', 'Art', 'correo@gmail.com', '01cfcd4f6b8770febfb40cb906715822', '65b45f91924e9-Default_valorant_character_portrait_blue_and_grey_3_9cc57fd8-481c-4796-bc91-922b9fa883c1_1.jpg', 'Disponible', 'que', 'b6b4ce6df035dcfaa26f3bc32fb89e6a'),
(15, 332342639, 'Carlos', 'Agusto', 'freddy@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '673bd29d8ef50-jennifer connely.png', 'Disponible', 'hola', '4d186321c1a7f0f354b297e8914ab240');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
