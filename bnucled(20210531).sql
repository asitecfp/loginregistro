-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 31-05-2021 a las 05:55:15
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bnucled`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catcon07`
--

DROP TABLE IF EXISTS `catcon07`;
CREATE TABLE IF NOT EXISTS `catcon07` (
  `idecat07` int(3) NOT NULL AUTO_INCREMENT COMMENT 'ID Categoría',
  `nomcat07` varchar(20) NOT NULL COMMENT 'Nombre Categoría',
  `usucat07` varchar(20) NOT NULL COMMENT 'Usuario Registro',
  `feccat07` date NOT NULL COMMENT 'Fecha Registro',
  PRIMARY KEY (`idecat07`),
  KEY `idecat07` (`idecat07`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catcon07`
--

INSERT INTO `catcon07` (`idecat07`, `nomcat07`, `usucat07`, `feccat07`) VALUES
(1, 'Mas Vistas', 'admin', '2020-12-26'),
(2, 'Accion', 'admin', '2020-12-26'),
(3, 'Comedia', 'admin', '2020-12-26'),
(4, 'Terror', 'admin', '2020-12-26'),
(5, 'Animadas', 'admin', '2020-01-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clacon06`
--

DROP TABLE IF EXISTS `clacon06`;
CREATE TABLE IF NOT EXISTS `clacon06` (
  `Idecla06` int(3) NOT NULL COMMENT 'ID Clasificación',
  `nomcla06` varchar(20) NOT NULL COMMENT 'Nombre Clasificación',
  `usucla06` varchar(20) NOT NULL COMMENT 'Usuario Registro',
  `feccla06` date NOT NULL COMMENT 'Fecha Registro'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maecon04`
--

DROP TABLE IF EXISTS `maecon04`;
CREATE TABLE IF NOT EXISTS `maecon04` (
  `idecon04` int(5) NOT NULL AUTO_INCREMENT COMMENT 'ID Contenido',
  `nomcon04` varchar(50) NOT NULL COMMENT 'Nombre Contenido',
  `nomco204` varchar(30) NOT NULL COMMENT 'Nombre 2 Contenido',
  `tipcon04` varchar(20) NOT NULL COMMENT 'Tipo de Contenido',
  `clacon04` varchar(20) NOT NULL COMMENT 'Clasificación Contenido',
  `durcon04` time NOT NULL COMMENT 'Duración Contenido',
  `fecpro04` date NOT NULL COMMENT 'Fecha de Producción',
  `feclan04` date NOT NULL COMMENT 'Fecha de Lanzamiento',
  `catcon04` varchar(20) NOT NULL COMMENT 'Categoría Contenido',
  `procon04` varchar(20) NOT NULL COMMENT 'Productor Contenido',
  `vistas04` int(8) NOT NULL COMMENT 'Vistas',
  `aprcon04` int(8) NOT NULL COMMENT 'Aprobaciones',
  `descon04` int(8) NOT NULL COMMENT 'Desaprobaciones',
  `arccon04` varchar(50) NOT NULL COMMENT 'Archivo del Contenido',
  `dircon04` varchar(50) NOT NULL COMMENT 'Dirección Contenido',
  `forcon04` varchar(7) NOT NULL COMMENT 'Exención archivo',
  `calcon04` varchar(10) NOT NULL COMMENT 'Calidad Contenido',
  `covcon04` varchar(90) NOT NULL COMMENT 'Cover Contenido',
  `precon04` varchar(90) NOT NULL COMMENT 'Img Principal Contenid',
  `sincon04` varchar(200) NOT NULL COMMENT 'Sinopsis Contenido',
  `conpri04` int(1) NOT NULL COMMENT 'Contenido Principal',
  PRIMARY KEY (`idecon04`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `maecon04`
--

INSERT INTO `maecon04` (`idecon04`, `nomcon04`, `nomco204`, `tipcon04`, `clacon04`, `durcon04`, `fecpro04`, `feclan04`, `catcon04`, `procon04`, `vistas04`, `aprcon04`, `descon04`, `arccon04`, `dircon04`, `forcon04`, `calcon04`, `covcon04`, `precon04`, `sincon04`, `conpri04`) VALUES
(1, 'Spider Man Un Nuevo Universo', 'Un Nuevo Universo', 'Pelicula', 'General', '02:00:00', '2020-12-01', '2020-12-29', 'Mas vistas', 'marvel', 0, 0, 0, 'Spider Man Un Nuevo Universo (2018)', 'C:\\wamp64\\www\\loginregistro\\assets\\video\\Generos\\A', '.mp4', '1080 hd', 'Spider Man Un Nuevo UniversoCover', 'Spider Man Un Nuevo UniversoPrin', 'En un universo paralelo donde Peter Parker ha muerto, un joven de secundaria        llamado Miles Morales es el nuevo Spider-Man.', 0),
(2, 'un gran dinosaurio', 'Pelicula2', 'Pelicula', 'General', '02:00:00', '2020-12-01', '2020-12-29', 'Accion', 'netflix', 0, 0, 0, 'un gran dinosaurio', 'C:\\wamp64\\www\\loginregistro\\assets\\video\\Generos\\A', '.mp4', '1080 hd', 'un gran dinosaurioCover', 'un gran dinosaurioPrin', 'descripcion sinopsis historia resumen de la peliucula', 0),
(3, 'como entrenar a tu dragon 2', 'Pelicula3', 'Pelicula', 'General', '02:00:00', '2020-12-01', '2020-12-29', 'Mas Vistas', 'Fox', 0, 0, 0, 'como entrenar a tu dragon 2', 'C:\\wamp64\\www\\loginregistro\\assets\\video\\Generos\\A', '.mp4', '1080 hd', 'como entrenar a tu dragon 2Cover', 'como entrenar a tu dragon 2Prin', 'descripcion sinopsis historia resumen de la peliucula', 0),
(4, 'atrapa la bandera', 'Pelicula4', 'Pelicula', 'General', '02:00:00', '2020-12-01', '2020-12-29', 'Mas Vistas', 'Fox', 0, 0, 0, 'atrapa la bandera', 'C:\\wamp64\\www\\loginregistro\\assets\\video\\Generos\\A', '.mp4', '1080 hd', 'atrapa la banderaCover', 'atrapa la banderaPrin', 'descripcion sinopsis historia resumen de la peliucula', 0),
(5, 'batman-the-killing-joke', 'Pelicula5', 'Pelicula', 'General', '02:00:00', '2020-12-01', '2020-12-29', 'Mas vistas', 'Fox', 0, 0, 0, 'batman-the-killing-joke', 'C:\\wamp64\\www\\loginregistro\\assets\\video\\Generos\\A', '.mp4', '1080 hd', 'batman-the-killing-jokeCover', 'batman-the-killing-jokePrin', ' descripcion sinopsis historia resumen de la peliucula', 0),
(6, 'loco por las nueces 2', 'Pelicula6', 'Pelicula', 'General', '02:00:00', '2020-12-01', '2020-12-29', 'Mas vistas', 'Fox', 0, 0, 0, 'loco por las nueces 2', 'C:\\wamp64\\www\\loginregistro\\assets\\video\\Generos\\A', '.mp4', '1080 hd', 'loco por las nueces 2Cover', 'loco por las nueces 2Prin', ' descripcion sinopsis historia resumen de la peliucula', 0),
(7, 'mi villano favorito 2', 'Pelicula7', 'Pelicula', 'General', '02:00:00', '2020-12-01', '2020-12-29', 'Mas vistas', 'Fox', 0, 0, 0, 'loco por las nueces 2', 'C:\\wamp64\\www\\loginregistro\\assets\\video\\Generos\\A', '.mp4', '1080 hd', 'mi villano favorito 2Cover', 'mi villano favorito 2Prin', ' descripcion sinopsis historia resumen de la peliucula', 0),
(8, 'peabody and sherman', 'Pelicula8', 'Pelicula', 'General', '02:00:00', '2020-12-01', '2020-12-29', 'Mas vistas', 'Fox', 0, 0, 0, 'peabody and sherman', 'C:\\wamp64\\www\\loginregistro\\assets\\video\\Generos\\A', '.mp4', '1080 hd', 'peabody and shermanCover', 'peabody and shermanPrin', 'descripcion sinopsis historia resumen de la peliucula', 0),
(9, 'mulan', 'Pelicula9', 'Pelicula', 'General', '02:00:00', '2020-01-11', '2021-01-11', 'Mas Vistas', 'disney', 0, 0, 0, 'mulan', 'C:\\wamp64\\www\\loginregistro\\assets\\video\\Generos\\A', '.mp4', '1080 hd', 'mulanCover', 'mulanprin', 'El emperador chino emite un decreto que exige que cada hogar debe reclutar a un varón para luchar con el ejército imperial en la guerra contra los Hunos.', 1),
(10, 'abominable', 'Pelicula10', 'Pelicula', 'General', '02:00:00', '2020-01-11', '2021-01-11', 'Mas Vistas', 'dreamworks-logo', 0, 0, 0, 'abominable', 'C:\\wamp64\\www\\loginregistro\\assets\\video\\Generos\\A', '.mp4', '1080 hd', 'abominableCover', 'abominablePrin', 'El emperador chino emite un decreto que exige que cada hogar debe reclutar a un varón para luchar con el ejército imperial en la guerra contra los Hunos.', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procon08`
--

DROP TABLE IF EXISTS `procon08`;
CREATE TABLE IF NOT EXISTS `procon08` (
  `idepro08` int(3) NOT NULL AUTO_INCREMENT COMMENT 'ID Productora',
  `nompro08` varchar(20) NOT NULL COMMENT 'Nombre Productora',
  `usupro08` varchar(20) NOT NULL COMMENT 'Usuario Registro',
  `fecpro08` date NOT NULL COMMENT 'Fecha Registro',
  PRIMARY KEY (`idepro08`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipcon05`
--

DROP TABLE IF EXISTS `tipcon05`;
CREATE TABLE IF NOT EXISTS `tipcon05` (
  `idecon05` int(3) NOT NULL COMMENT 'ID Tipo Contenido',
  `nomtip05` varchar(20) NOT NULL COMMENT 'Nombre Tipo Contenido',
  `usutip05` varchar(20) NOT NULL COMMENT 'Usuario Registro',
  `fectip05` date NOT NULL COMMENT 'Fecha Tipo Contenido'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipcue02`
--

DROP TABLE IF EXISTS `tipcue02`;
CREATE TABLE IF NOT EXISTS `tipcue02` (
  `id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `nomtip02` varchar(20) NOT NULL COMMENT 'Nombre Tipo Cuenta',
  `usutip02` varchar(20) NOT NULL COMMENT 'Usuario Registro',
  `Fecha` date NOT NULL COMMENT 'Fecha Registro',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipsus03`
--

DROP TABLE IF EXISTS `tipsus03`;
CREATE TABLE IF NOT EXISTS `tipsus03` (
  `sIdesuc03` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Id Tipo de Suscriptor',
  `nomsus03` varchar(20) NOT NULL COMMENT 'Nombre Tipo de Suscriptor',
  `ususus03` varchar(20) NOT NULL COMMENT 'Usuario Registro',
  `fecsus03` date NOT NULL COMMENT 'Fecha Registro',
  PRIMARY KEY (`sIdesuc03`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `ideusu01` int(5) NOT NULL AUTO_INCREMENT,
  `nomusu01` varchar(50) NOT NULL,
  `corusu01` varchar(50) NOT NULL,
  `aliusu01` varchar(50) NOT NULL,
  `conusu01` varchar(50) NOT NULL,
  `pinful01` int(4) NOT NULL COMMENT 'Pin Full Perfil',
  `pinfam01` int(4) NOT NULL COMMENT 'Pin Familiar',
  `pininf01` int(4) NOT NULL COMMENT 'Pin Infantil',
  `apeusu01` varchar(40) NOT NULL,
  `cedusu01` varchar(15) NOT NULL,
  `stausu01` varchar(20) NOT NULL COMMENT 'Apellido',
  `telusu01` varchar(10) NOT NULL COMMENT 'Teléfono',
  `dirusu01` varchar(90) NOT NULL COMMENT 'Dirección',
  `ciuusu01` varchar(3) NOT NULL COMMENT 'Ciudad',
  `edousu01` varchar(3) NOT NULL COMMENT 'Estado',
  `paisusu01` varchar(3) NOT NULL COMMENT 'Pais',
  `nacusu01` date NOT NULL COMMENT 'Fecha Nacimiento',
  `imgusu01` varchar(30) NOT NULL COMMENT 'Imagen Perfil',
  `ingusu01` date NOT NULL COMMENT 'Fecha Ingreso',
  `tipcue01` varchar(30) NOT NULL COMMENT 'Tipo de Cuenta',
  `tipsus01` varchar(30) NOT NULL COMMENT 'Tipo de Suscriptor',
  `stacue01` varchar(20) NOT NULL COMMENT 'Estado Cuenta',
  PRIMARY KEY (`ideusu01`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ideusu01`, `nomusu01`, `corusu01`, `aliusu01`, `conusu01`, `pinful01`, `pinfam01`, `pininf01`, `apeusu01`, `cedusu01`, `stausu01`, `telusu01`, `dirusu01`, `ciuusu01`, `edousu01`, `paisusu01`, `nacusu01`, `imgusu01`, `ingusu01`, `tipcue01`, `tipsus01`, `stacue01`) VALUES
(19, 'antonio0155', 'antoniomorenovillamizar@gmail.com', 'rootG5012', '123', 3333, 2222, 1111, 'vv0123', '0122333555', 'dd3G', 'd3G', 'calianzG', 'CAL', 'CBB', 'ven', '0000-00-00', 'imagen/perfil.jpg', '2018-02-03', 'd3G', 'dG', 'dG'),
(22, 'yeymmyvlu@gmail.com', '123456789', 'root', '12345678', 0, 0, 0, '', '', '', '', '', 'CAL', 'CBB', 'ven', '0000-00-00', '', '0000-00-00', '', '', ''),
(23, 'JEYMYS VILCHEZ', 'YEYMMYVLU@GMAIL.COM', 'root', '12345678', 0, 0, 0, '', '', '', '', '', 'CAL', 'CBB', 'ven', '0000-00-00', '', '0000-00-00', '', '', ''),
(26, 'jose g almarza m', '5disdesweb@gmail.com', '5disdesweb', '4723', 0, 0, 0, '', '', '0', '155-r1ent3', 'cafetal', 'NAG', 'CBB', 'ven', '2021-03-30', '', '2021-03-30', '', '', ''),
(31, 'jose g almarza m', 'disdesweb@gmail.com', 'disdesweb', '4723', 0, 0, 0, '', '1430', '', '', '', 'NAG', 'CBB', 'ven', '2021-03-30', '', '2021-03-30', '', '', ''),
(68, 'Jose G', 'josegam@fff.gg', 'josegam', '123456', 0, 0, 0, 'Almarza M', '168268', '', '555-r1ent3', 'El Cafetal', 'mcb', 'zul', 'ven', '2009-11-05', 'foto/68.jpeg', '2021-05-05', '', 'ss', 'regi'),
(69, 'ggg', 'gsadgsad', 'ghghgh', 'fff', 3333, 2222, 1111, 'gghgh', '', '', '', '', '', '', '', '0000-00-00', '', '2021-05-26', '', '', 'regi'),
(70, 'bbnghnf', 'rtrtrtrtturtu', 'fgjfgyultg', '111111', 3333, 0, 1111, 'fgjfgjfgjf', '', '', '', '', '2', '2', 'ven', '2009-11-05', 'foto/70.jpeg', '2021-05-26', '', '', 'regi');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
