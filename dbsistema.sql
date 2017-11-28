-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2017 at 05:55 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsistema`
--

-- --------------------------------------------------------

--
-- Table structure for table `asignatura`
--

CREATE TABLE `asignatura` (
  `idasignatura` int(11) NOT NULL,
  `nombre_asignatura` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `condicion` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `asignatura`
--

INSERT INTO `asignatura` (`idasignatura`, `nombre_asignatura`, `tipo`, `condicion`) VALUES
(2, 'Química Orgánica II', '', 1),
(3, 'Sociología', '', 1),
(4, 'Biología General', '', 1),
(5, 'Técnicas de Redacción', '', 1),
(6, 'Química Analítica Cuantitativa', '', 1),
(7, 'Matemática II', '', 1),
(8, 'Estadística', '', 1),
(9, 'Análisis Bromatológico', 'Teórico', 1),
(10, 'Farmacia Hospitalaria II', '', 1),
(11, 'Anatomía', '', 1),
(12, 'CENIUES', '', 1),
(13, 'Pre-Laboratorio de Biología General', '', 1),
(14, 'Microbiología Aplicada IV', '', 1),
(15, 'Análisis instrumental', 'Teórico', 1);

-- --------------------------------------------------------

--
-- Table structure for table `discusion`
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
-- Dumping data for table `discusion`
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
-- Table structure for table `local`
--

CREATE TABLE `local` (
  `idlocal` int(11) NOT NULL,
  `lugar` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `capacidad` int(11) NOT NULL,
  `condicion` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `local`
--

INSERT INTO `local` (`idlocal`, `lugar`, `capacidad`, `condicion`) VALUES
(8, 'AULA 201', 100, 1),
(9, 'AULA 202', 100, 1),
(10, 'AULA 205', 100, 1),
(11, 'AULA 206', 100, 1),
(12, 'AULA 207', 100, 1),
(13, 'AULA 208', 100, 1),
(14, 'AULA 209', 100, 1),
(15, 'AULA 210', 100, 1),
(16, 'AUDITORIUM N°1', 200, 1),
(17, 'AUDITORIUM N°2', 200, 1),
(18, 'AULA N°6', 100, 1),
(19, 'AULA DE FARMACOLOGÍA', 100, 1),
(20, 'AULA TECNOLOGÍA', 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2014_10_18_000000_create_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reserva`
--

CREATE TABLE `reserva` (
  `idreserva` int(11) NOT NULL,
  `idlocal` int(11) NOT NULL,
  `dia` varchar(105) COLLATE utf8_unicode_ci NOT NULL,
  `hora` time(6) DEFAULT NULL,
  `idasignatura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reserva`
--

INSERT INTO `reserva` (`idreserva`, `idlocal`, `dia`, `hora`, `idasignatura`) VALUES
(3, 14, 'Martes', '07:00:00.000000', 8),
(4, 8, 'Lunes', '05:23:00.000000', 3),
(5, 8, 'Lunes', '04:08:00.000000', 9),
(6, 16, 'Miercoles', '05:06:00.000000', 9);

-- --------------------------------------------------------

--
-- Table structure for table `reserva_discu`
--

CREATE TABLE `reserva_discu` (
  `idreserva` int(11) NOT NULL,
  `idlocal` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time(6) NOT NULL,
  `idasignatura` int(11) NOT NULL,
  `iddiscusion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reserva_discu`
--

INSERT INTO `reserva_discu` (`idreserva`, `idlocal`, `fecha`, `hora`, `idasignatura`, `iddiscusion`) VALUES
(2, 19, '2017-11-04', '04:34:00.000000', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'yese', 'yeseliz', 'yeseliz@gmail.com', '$2y$10$KIdB8wa6MTkmwPNQrjuPRe1UlleO2WKsf9uH1pFXI7l6MW0y.AX8C', 'MLLWW8NUUSU1ZorTWggGOEOeDl1Q2HyvUduAOx5lysgVN97xLuiEJCzLBwBx', NULL, NULL),
(2, 'usuario', 'user', 'user@gmail.com', '$2y$10$KIdB8wa6MTkmwPNQrjuPRe1UlleO2WKsf9uH1pFXI7l6MW0y.AX8C', '38apoCWVJz5wMmxVYKbBOy7uJyoLFY1rGVhzRHq5PHuKab3JbKhpm7XWjkNk', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`idasignatura`);

--
-- Indexes for table `discusion`
--
ALTER TABLE `discusion`
  ADD PRIMARY KEY (`iddiscusion`);

--
-- Indexes for table `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`idlocal`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`idreserva`),
  ADD KEY `fk_local_reserva_idx` (`idlocal`),
  ADD KEY `fk_asignatura_reserva_idx` (`idasignatura`);

--
-- Indexes for table `reserva_discu`
--
ALTER TABLE `reserva_discu`
  ADD PRIMARY KEY (`idreserva`),
  ADD KEY `fk_local_reserva_discu_idx` (`idlocal`),
  ADD KEY `fk_asignatura_reserva_discu_idx` (`idasignatura`),
  ADD KEY `fk_discusion_reserva_discu_idx` (`iddiscusion`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `idasignatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `discusion`
--
ALTER TABLE `discusion`
  MODIFY `iddiscusion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `local`
--
ALTER TABLE `local`
  MODIFY `idlocal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `reserva`
--
ALTER TABLE `reserva`
  MODIFY `idreserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `reserva_discu`
--
ALTER TABLE `reserva_discu`
  MODIFY `idreserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_asignatura_reserva` FOREIGN KEY (`idasignatura`) REFERENCES `asignatura` (`idasignatura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_local_reserva` FOREIGN KEY (`idlocal`) REFERENCES `local` (`idlocal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reserva_discu`
--
ALTER TABLE `reserva_discu`
  ADD CONSTRAINT `fk_asignatura_reserva_discu` FOREIGN KEY (`idasignatura`) REFERENCES `asignatura` (`idasignatura`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_discusion_reserva_discu` FOREIGN KEY (`iddiscusion`) REFERENCES `discusion` (`iddiscusion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_local_reserva_discu` FOREIGN KEY (`idlocal`) REFERENCES `local` (`idlocal`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
