-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-11-2017 a las 09:24:39
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbsistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `idasignatura` int(11) NOT NULL,
  `nombre_asignatura` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `condicion` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`idasignatura`, `nombre_asignatura`, `tipo`, `condicion`) VALUES
(2, 'Química Orgánica II', 'Teórico', 1),
(3, 'Sociología', 'Teórico', 1),
(4, 'Biología General', 'Teórico', 1),
(5, 'Técnicas de Redacción', 'Discusión', 1),
(6, 'Química Analítica Cuantitativa', 'Teórico', 1),
(7, 'Matemática II', 'Teórico', 1),
(8, 'Estadística', 'Teórico', 1),
(9, 'Análisis Bromatológico', 'Discusión', 1),
(10, 'Farmacia Hospitalaria II', 'Teórico', 1),
(11, 'Anatomía', 'Teórico', 1),
(12, 'CENIUES', 'Teórico', 1),
(13, 'Biología General', 'Pre-Laboratorio', 1),
(14, 'Microbiología Aplicada IV', 'Teórico', 1),
(15, 'Análisis instrumental', 'Teórico', 1),
(16, 'Matemática II', 'Discusión', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discusion`
--

CREATE TABLE `discusion` (
  `iddiscusion` int(11) NOT NULL,
  `actividad` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `semana` int(11) NOT NULL,
  `condicion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `discusion`
--

INSERT INTO `discusion` (`iddiscusion`, `actividad`, `fecha`, `fecha_fin`, `semana`, `condicion`) VALUES
(2, 'Propiedades coligativas', '2017-09-28', '2017-09-01', 4, 1),
(3, 'Termoquímica', '2017-09-11', '2017-09-15', 6, 1),
(4, 'Cinética', '2017-09-25', '2017-11-29', 8, 1),
(5, 'Equilibrio', '2017-10-09', '2017-10-13', 10, 1),
(6, 'Ácidos-bases', '2017-10-06', '2017-10-10', 14, 1),
(7, 'Redox', '2017-11-20', '2017-11-24', 16, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `local`
--

CREATE TABLE `local` (
  `idlocal` int(11) NOT NULL,
  `lugar` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `capacidad` int(11) NOT NULL,
  `condicion` tinyint(1) DEFAULT NULL,
  `disponibilidad` tinyint(1) NOT NULL DEFAULT '1',
  `cantidad_prestamos` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `local`
--

INSERT INTO `local` (`idlocal`, `lugar`, `capacidad`, `condicion`, `disponibilidad`, `cantidad_prestamos`) VALUES
(21, 'AULA 201', 100, 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2017_10_18_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `idreserva` int(11) NOT NULL,
  `idlocal` int(11) NOT NULL,
  `hora_prestamo` time(6) DEFAULT NULL,
  `idasignatura` int(11) NOT NULL,
  `fecha_solicitud` date NOT NULL DEFAULT '2001-01-01',
  `fecha_asignacion` date NOT NULL DEFAULT '2001-01-01',
  `hora_inicio` time NOT NULL DEFAULT '00:00:00',
  `hora_fin` time NOT NULL DEFAULT '00:00:00',
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`idreserva`, `idlocal`, `hora_prestamo`, `idasignatura`, `fecha_solicitud`, `fecha_asignacion`, `hora_inicio`, `hora_fin`, `estado`) VALUES
(3, 15, '19:57:39.000000', 3, '2017-11-29', '2017-11-29', '14:30:00', '23:40:00', 0),
(4, 17, '12:39:28.000000', 3, '2017-11-29', '2017-11-29', '14:30:00', '14:35:00', 0),
(5, 14, '04:08:00.000000', 5, '2017-11-28', '2017-11-29', '14:50:00', '20:00:00', 0),
(6, 8, '14:33:40.000000', 6, '2017-11-29', '2017-11-29', '14:30:00', '14:34:00', 0),
(7, 17, '10:00:00.000000', 3, '2001-01-01', '2017-11-29', '14:35:00', '14:40:00', 0),
(8, 20, '08:32:00.000000', 3, '2001-01-01', '2017-11-29', '14:30:00', '14:35:00', 0),
(10, 10, '10:53:32.000000', 10, '2017-11-29', '2017-11-29', '14:30:00', '14:35:00', 0),
(11, 14, '11:01:23.000000', 2, '2017-11-29', '2017-11-29', '14:35:00', '14:40:00', 0),
(12, 10, '11:47:58.000000', 3, '2017-11-29', '2020-12-24', '14:35:00', '14:40:00', 0),
(13, 10, '14:30:42.000000', 4, '2017-11-29', '2017-11-29', '14:40:00', '14:44:00', 0),
(14, 13, '00:19:04.000000', 4, '2017-11-30', '2017-11-30', '00:20:00', '00:25:00', 0),
(15, 21, '02:16:34.000000', 2, '2017-11-30', '2017-11-03', '06:07:00', '07:08:00', 1),
(16, 21, '02:22:00.000000', 2, '2017-11-30', '2017-11-04', '06:07:00', '06:08:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_discu`
--

CREATE TABLE `reserva_discu` (
  `idreserva` int(11) NOT NULL,
  `idlocal` int(11) NOT NULL,
  `idasignatura` int(11) NOT NULL,
  `iddiscusion` int(11) NOT NULL,
  `hora_prestamo_disc` time NOT NULL DEFAULT '00:00:00',
  `fecha_solicitud_disc` date NOT NULL DEFAULT '2017-12-30',
  `fecha_asignacion_disc` date NOT NULL DEFAULT '2017-12-30',
  `hora_inicio_disc` time NOT NULL DEFAULT '00:00:00',
  `hora_fin_disc` time NOT NULL DEFAULT '00:00:00',
  `estado_disc` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reserva_discu`
--

INSERT INTO `reserva_discu` (`idreserva`, `idlocal`, `idasignatura`, `iddiscusion`, `hora_prestamo_disc`, `fecha_solicitud_disc`, `fecha_asignacion_disc`, `hora_inicio_disc`, `hora_fin_disc`, `estado_disc`) VALUES
(2, 19, 3, 4, '00:00:00', '2017-10-24', '2020-12-24', '23:00:00', '23:40:00', 1),
(3, 8, 2, 2, '22:58:14', '2017-11-29', '2017-11-29', '23:30:00', '23:45:00', 0),
(4, 20, 2, 3, '23:04:03', '2017-11-29', '2017-11-29', '23:00:00', '23:45:00', 0),
(5, 17, 3, 4, '00:16:30', '2017-11-30', '2017-11-30', '00:17:00', '00:25:00', 0),
(6, 21, 2, 2, '02:23:45', '2017-11-30', '2018-11-04', '05:06:00', '07:08:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idrol` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `idrol`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ad', 'admin', 'admin@hotmail.com', '$2y$10$KIdB8wa6MTkmwPNQrjuPRe1UlleO2WKsf9uH1pFXI7l6MW0y.AX8C', 1, 'OGxGvl93YTp4v9EdarWtKrhl0QrLJctgdnMCrXn3hLOERVzjo1Hsc4nzvOjT', NULL, NULL),
(2, 'Yeseliz', 'yeseliz', 'yese@gmail.com', '$2y$10$KIdB8wa6MTkmwPNQrjuPRe1UlleO2WKsf9uH1pFXI7l6MW0y.AX8C', 2, NULL, NULL, NULL),
(3, 'user', 'user', 'user@gmail.com', '$2y$10$KIdB8wa6MTkmwPNQrjuPRe1UlleO2WKsf9uH1pFXI7l6MW0y.AX8C', 3, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`idasignatura`);

--
-- Indices de la tabla `discusion`
--
ALTER TABLE `discusion`
  ADD PRIMARY KEY (`iddiscusion`);

--
-- Indices de la tabla `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`idlocal`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`idreserva`),
  ADD KEY `fk_local_reserva_idx` (`idlocal`),
  ADD KEY `fk_asignatura_reserva_idx` (`idasignatura`);

--
-- Indices de la tabla `reserva_discu`
--
ALTER TABLE `reserva_discu`
  ADD PRIMARY KEY (`idreserva`),
  ADD KEY `fk_local_reserva_discu_idx` (`idlocal`),
  ADD KEY `fk_asignatura_reserva_discu_idx` (`idasignatura`),
  ADD KEY `fk_discusion_reserva_discu_idx` (`iddiscusion`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `idasignatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `discusion`
--
ALTER TABLE `discusion`
  MODIFY `iddiscusion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `local`
--
ALTER TABLE `local`
  MODIFY `idlocal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `idreserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `reserva_discu`
--
ALTER TABLE `reserva_discu`
  MODIFY `idreserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
