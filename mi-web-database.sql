-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2025 a las 05:49:40
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mi-web-database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cesta`
--

CREATE TABLE IF NOT EXISTS `cesta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 1,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `codigopostal` varchar(10) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `estado` enum('pendiente','pagado','cancelado') NOT NULL DEFAULT 'pendiente',
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `usuario_id`, `total`, `direccion`, `ciudad`, `codigopostal`, `telefono`, `estado`, `fecha`) VALUES
(2, 1, 372.40, 'asdasdasd', 'asdasdasd', '12345', '123456789', 'pagado', '2025-12-16 21:02:51'),
(3, 1, 638.58, 'asdas', 'asd', '12345', '123123', 'pagado', '2025-12-16 21:07:27'),
(4, 1, 152.15, 'asddas', 'asdz', '12345', '12233456', 'pendiente', '2025-12-16 21:09:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `categoria` enum('percusion','viento','accesorios') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `imagen`, `categoria`) VALUES
(1, 'Tambor-Honsuy', 'Tambor cofrade Honsuy.\r\nMedidas: 35,5 Ø x 25 cm.\r\n– Casco y aros de madera.\r\n– Acabado en Wenge.\r\n– 8 tensores independientes en cromo.\r\n– Sistema bordonero automático.\r\n– Bordones entorchados.\r\n– Parches de plástico.\r\n\r\n', 372.40, 'tambor1.jpg', 'percusion'),
(2, 'Bombo-Honsuy', 'Bombo de Marcha Honsuy\r\nMedidas: 45,5 Ø x 18 cm.\r\n– Casco de madera forrado de celuloide.\r\n– Aros madera maciza, con cinta celuloide.\r\n– Tensión independiente.\r\n– 8 Tensores por parche.\r\n– Parches de plástico.\r\n– Cromado brillante.\r\n', 340.20, 'bombo2.jpg', 'percusion'),
(3, 'campana-tubular-do', 'campana tubular cromada de semana santa afinada en DO_5.\r\nIncluye:\r\n-  Campana Tubular semana santa.\r\n-  Afinacion Do5.\r\n-  Tubo de latón acabado en cromo.\r\n-  Medida largo de tubo 1605 mm \r\n-  Diametro tubo 38 mm \r\n-  Grueso del tubo 2 mm\r\n-  Peso Aprox.\r\n-  Cable de acero incluido.\r\n-  Ideal para agrupaciones y bandas de pasacalle.', 276.58, 'campana-tubular3.jpeg', 'percusion'),
(4, 'Lira GONALCA', 'Lira de Marcha GONALCA con 27 notas.\r\nMedidas: 62x47x6,5cm.\r\nPeso: 2,10Kg', 152.15, 'lira4.jpg', 'percusion'),
(5, 'Corneta Tizona II Plus', 'Corneta Tizona II Plus.\r\nMarca Honorato.\r\nTonalidad DO/REb\r\nLacado: Plata', 362.00, 'TizonaDOREb-5.jpg', 'viento'),
(6, 'Trompeta Yamaha', 'TROMPETA YAMAHA YTR-2330 L LACADA \r\nAcabado: YTR-2330.\r\nAcabado: Lacado.\r\nCampana: 123 mm.\r\nTubería: ML 11,65 mm.\r\nPistones de aleación de Monel.\r\nAfinador 1ª bomba tirador y 3ª por anillo ajustable.\r\nIncluye: boquilla 11B4, funda y accesorios de limpieza.', 545.00, 'Trompeta6.jpg', 'viento'),
(7, 'Atril de Orquesta', 'Color: negro\r\nMaterial: metal\r\nPlegable\r\nBandeja solida (metal), desmontable, unión de tubos\r\nUnión en ABS, fijación por pinza en ABS\r\nDimensiones bandeja: 48,5 x 34 cm\r\nAltura (ajustable): 67 - 120 cm\r\nPeso: 3,8 kg', 27.35, 'atril7.jpg', 'accesorios'),
(8, 'Boquilla Honsuy H1', 'Boquilla Honsuy H1. Útil para la inciación de los nuevos cornetas además de para los cornetas más experimentados.\r\nColor: Dorado.', 22.00, 'boquilla-corneta8.jpg', 'accesorios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `email`, `password`, `fecha_registro`) VALUES
(1, 'borjamoron', 'borja@prueba.com', '$2y$10$tq8on0xCDO9UKq.NYlGMnur.2xPAjbPc2S/PDmQiyqmyG2byhuBK.', '2025-11-29 12:18:34');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
