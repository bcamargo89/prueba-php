-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-07-2023 a las 01:12:03
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
-- Base de datos: `prueba-php`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userrepository`
--

CREATE TABLE `userrepository` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `stat` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `fullname`, `stat`, `created_at`, `updated_at`) VALUES
(1, 'Camargo', 'camaro@email.com', '$2y$10$9/BmnZAgXSsoVcffjtMvXOPm3RK4RO4uAMds/arZsg7', 'limber camargo', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Camargo', 'camaro@email.com', '$2y$10$9/BmnZAgXSsoVcffjtMvXOPm3RK4RO4uAMds/arZsg7', 'limber camargo', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Camargo', 'camaro@email.com', 'secreto123', 'carolina montes lopez', 0, '0000-00-00 00:00:00', '2023-07-21 19:01:14'),
(4, 'Camargo', 'camaro@email.com', '$2y$10$lz1vYQ6FmpWhq1td0ysv4Oru./AvKodDwjqQhJ80WO/', 'limber camargo', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'bsanchez', 'correo@email.com', '$2y$10$JuFfkewVeLrYMAbrvyNMlert9aTZ/CNGPfSw.mtZXzJ', 'daniel sanchez camargo', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'bsanchez', 'correo@email.com', '$2y$10$JuFfkewVeLrYMAbrvyNMlert9aTZ/CNGPfSw.mtZXzJ', 'daniel sanchez camargo', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'bsanchez', 'correo@email.com', '$2y$10$epebREHlCMZ1GF3knWl29u9Lh1Vox73KlmNfBxWpD1A', 'daniel sanchez camargo', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'bsanchez', 'correo@email.com', '$2y$10$epebREHlCMZ1GF3knWl29u9Lh1Vox73KlmNfBxWpD1A', 'daniel sanchez camargo', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `userrepository`
--
ALTER TABLE `userrepository`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `userrepository`
--
ALTER TABLE `userrepository`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
