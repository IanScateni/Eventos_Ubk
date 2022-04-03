-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 24-03-2022 a las 07:44:31
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ubk`
--
CREATE DATABASE IF NOT EXISTS `ubk` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ubk`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `cover` varchar(255) DEFAULT NULL,
  `description` longtext NOT NULL,
  `video` varchar(255) NOT NULL,
  `shortdescription` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `event`
--

INSERT INTO `event` (`id`, `name`, `cover`, `description`, `video`, `shortdescription`) VALUES
(1, 'Bodas y matrimonios\r\n', 'Bodas y matrimonios cover.jpg', 'Toda novia tienes miles de ideas de cómo desearía su boda, por eso <strong>UBK Eventos</strong> presenta en tus manos su servicio de <strong>Asesoría y Organización</strong>&nbsp; para llevar a realidad todo lo que pase por tu mente de forma alineada para que vivas el sueño de ese día tan anhelado. Tienen planes de bodas basado en la cantidad de invitados que desees, desde 20 hasta 500 invitados, e incluye <strong>servicio de catering, Pastel de boda, coctelería, personal para atender invitados, menaje, mobiliario, manteles, decoración floral, decoración temática y sonido.</strong><br>Disfruta tranquilamente de ese día tan importantes que los expertos se encargan de cada detalle para hacer tu sueño realidad. <strong>La pasión, responsabilidad y elegancia es lo que te brinda UBK Eventos</strong>.', 'afaSc1Ok7kM', 'Se puede decir que todas soñamos con este gran día. ¿A quién le darás la responsabilidad de celebrarlo? Estamos para acompañarte en cada duda que tengas.'),
(2, 'Bautismo\r\n', 'bautismo.jpg', 'La celebración del Bautizo es un evento íntimo y tierno para toda la familia. En UBK Eventos queremos ayudarte a preparar este día y hacerlo inolvidable. Cuéntanos cómo te lo imaginas y haremos nuestra magia.<br>Te aconsejaremos y elegiremos contigo el espacio donde se celebrará el evento, el menú y el catering para disfrutar de este momento familiar y, por supuesto, la decoración que haga más festiva y entrañable este maravilloso día para que tu bebé se sienta a gusto y los invitados disfruten el día. Cuidaremos con mimo de cada detalle.', '5QSa6o2FwK4', 'Lorem Ipsum is simply dummy text of the printing and .typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(3, 'Primera Comunión\r\n', 'Primera Comunión.jpg', 'Celebraremos todos juntos este sacramento de Dios, y vamos a invitar a toda la familia, ya que son ellos los que acompañan y comparten la vida de nuestro hijo(a) Organizar una primera comunión temática está muy de moda. Cualquier tema es susceptible: un equipo de fútbol, un personaje, una película, etc. Esta tendencia ha crecido tanto en los últimos años que incluso ha incursionado en celebraciones religiosas como la primera comunión, convirtiéndose en una de las principales protagonistas de este tipo de festejos.', 'nX-tMzAvx7M', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(4, 'Quince años\r\n', 'Quince años.jpg', 'Tus 15 años soñados serán una realidad, Nuestros paquetes personalizados estarán a la altura de tus expectativas y planearemos cada paso para hacer de tu evento, una noche mágica', 't1djHjxnTNc', '¡Vive una experiencia diferente, vive una experiencia con glamour ! Dejarás a todos impresionados. Serás el alma de la fiesta en una celebración que nadie olvidará.'),
(5, 'Cumpleaños\r\n', 'Cumpleaños.jpg', 'Los aniversarios son fechas señaladas que solemos celebrar con la familia y con nuestros amigos más íntimos. Da igual la edad, los cumpleaños son para disfrutarlos de una forma diferente y única para que todo el mundo lo pase estupendamente.<br>Desde la experiencia podemos ofrecerte ese toque especial y mágico que lo diferenciará de los demás.<br>¡Dejarás a todos impresionados con tu fiesta!', 'r1uu31bySdc', 'Celebra tu cumpleaños de una forma original y divertida A tu medida, como tu prefieras'),
(6, 'Baby Shower', 'Baby Shower.jpg', 'Te ofrecemos nuestros servicios adaptados a los protocolos y normatividad de bioseguridad, además de personal y equipos profesionales, contaras con todo lo necesario para que tú evento sea una fecha mágica y extraordinaria en compañía de tus seres amados.<br>Actividades baby shower: Competencia de teteros, competencia de gateo, competencia quien viste mas rápido el bebe, competencia de rompecabezas, actividad de arte, competencia de balbuceo, competencia de convertirse adulto a bebe, competencia de compota, competencia de ganchos, competencia de no es fácil atarse los zapatos, tendedero creativo, apertura de regalos. Podrás quitar, cambiar o agregar la actividad que desees.', '-2xpy3x4jIs', 'Te ofrecemos nuestros servicios adaptados a los protocolos y normatividad de bioseguridad, además de personal y equipos profesionales, contaras con todo lo necesario para que tú evento sea una fecha mágica y extraordinaria en compañía de tus seres amados.'),
(7, 'Fiesta de fin de año\r\n', 'Fiesta de fin de año.jpg', 'Generalmente cuando hablamos de la celebración de fin de año, encontramos tres tipos de personas.  Primero tenemos a los que salen de vacaciones para esas fechas, luego están aquellos que prefieren algo tranquilo, estar en casa o en un restáurate, en familia.  Por ultimo están los que disfrutan de estas fechas por medio de una fiesta, por ellos y para ellos es que nacen las fiestas de fin de año Bogotá.', '6lR4zca9RP8', 'En definitiva, al terminar cada año nos damos cuenta de los retos que nos trajo y como logramos aprender de ellos y verlos como oportunidades.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeryevents`
--

CREATE TABLE `galeryevents` (
  `id` int(11) NOT NULL,
  `idEvent` int(11) NOT NULL,
  `src` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `galeryevents`
--

INSERT INTO `galeryevents` (`id`, `idEvent`, `src`) VALUES
(1, 1, 'matrimonio.jpg'),
(2, 1, 'matrimonio 2.jpg'),
(3, 1, 'matrimonio 3.jpg'),
(4, 1, 'matrimonio 4.jpg'),
(5, 1, 'matrimonio 5.jpg'),
(6, 1, 'matrimonio 6.jpg'),
(7, 2, 'bautizo.jpg'),
(8, 2, 'bautizo 2.jpg'),
(9, 2, 'bautizo 3.jpg'),
(10, 2, 'bautizo 4.jpg'),
(11, 2, 'bautizo 5.jpg'),
(12, 2, 'bautizo 6.jpg'),
(13, 3, 'PrimeraComunion.jpg'),
(14, 3, 'PrimeraComunion 2.jpg'),
(15, 3, 'PrimeraComunion 3.jpg'),
(16, 3, 'PrimeraComunion 4.jpg'),
(17, 3, 'PrimeraComunion 5.jpg'),
(18, 3, 'PrimeraComunion 6.jpg'),
(19, 4, 'Quince.jpg '),
(20, 4, 'Quince 2.jpg '),
(21, 4, 'Quince 3.jpg '),
(22, 4, 'Quince 4.jpg '),
(23, 4, 'Quince 5.jpg '),
(24, 4, 'Quince 6.jpg '),
(25, 5, 'Cumpleaños0.jpg'),
(26, 5, 'Cumpleaños 2.jpg'),
(27, 5, 'Cumpleaños 3.jpg'),
(28, 5, 'Cumpleaños 4.jpg'),
(29, 5, 'Cumpleaños 5.jpg'),
(30, 5, 'Cumpleaños 6.jpg'),
(31, 6, 'Baby Shower0.jpg'),
(32, 6, 'Baby Shower 2.jpg\r\n'),
(33, 6, 'Baby Shower 3.jpg'),
(34, 6, 'Baby Shower 4.jpg'),
(35, 6, 'Baby Shower 5.jpg'),
(36, 6, 'Baby Shower 6.jpg'),
(37, 7, 'fin.jpg'),
(38, 7, 'fin 2.jpg'),
(39, 7, 'fin 3.jpg'),
(40, 7, 'fin 4.jpg'),
(41, 7, 'fin 5.jpg'),
(42, 7, 'fin 6.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `Category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `name`, `price`, `Category`) VALUES
(1, 'Carne de res en salsa al vino', 0, 'Carne'),
(2, 'Carne de res en salsa a las finas hiervas', 0, 'Carne'),
(3, 'Carne de res en salsa a la pimienta', 0, 'Carne'),
(4, 'Carne de res en salsa de champiñones', 0, 'Carne'),
(5, 'Carne de res en salsa borracha', 0, 'Carne'),
(6, 'Carne de res en salsa de tocineta con champiñones ', 0, 'Carne'),
(7, 'Carne de res en salsa de espárragos', 0, 'Carne'),
(8, 'Carne de res en salsa a la mostaza con estragón', 0, 'Carne'),
(9, 'Lomo de cerdo en salsa de ciruela ', 0, 'Carne'),
(10, 'Lomo de cerdo en salsa de fresa', 0, 'Carne'),
(11, 'Lomo de cerdo en salsa de uchuvas', 0, 'Carne'),
(12, 'Lomo de cerdo en salsa de manzanas', 0, 'Carne'),
(13, 'Lomo de cerdo en salsa de piña', 0, 'Carne'),
(14, 'Lomo de cerdo en salsa de maracuyá ', 0, 'Carne'),
(15, 'Lomo de cerdo en salsa al agras', 0, 'Carne'),
(16, 'Lomo de cerdo en salsa de frutos confitados', 0, 'Carne'),
(17, 'Lomo de cerdo en salsa de tamarindo', 0, 'Carne'),
(18, 'Lomo de cerdo en salsa de kiwi', 0, 'Carne'),
(20, 'pechuga rellena con vegetales', 0, 'Pollo y pescado'),
(21, 'pechuga rellena con queso', 0, 'Pollo y pescado'),
(22, 'pechuga rellena de champiñones', 0, 'Pollo y pescado'),
(23, 'pechuga a la cordon blue (jamón y queso)', 0, 'Pollo y pescado'),
(24, 'pechuga a la florentina (jamón, queso, espinaca, pimentón)', 0, 'Pollo y pescado'),
(25, 'pechuga rellena con peras y manzanas', 0, 'Pollo y pescado'),
(26, 'Pechuga en salsa al vino', 0, 'Pollo y pescado'),
(27, 'Pechuga en salsa de champiñones', 0, 'Pollo y pescado'),
(28, 'Pechuga en salsa a la jardinera', 0, 'Pollo y pescado'),
(29, 'Pechuga en salsa al curry', 0, 'Pollo y pescado'),
(30, 'Pechuga en salsa al brandy', 0, 'Pollo y pescado'),
(31, 'Pechuga en salsa de maracuyá', 0, 'Pollo y pescado'),
(32, 'Pechuga en salsa úngara (cebolla, pimenton, tocineta, tomate, paprika)', 0, 'Pollo y pescado'),
(33, 'Pechuga en salsa al queso', 0, 'Pollo y pescado'),
(34, 'Pechuga en salsa Aurora', 0, 'Pollo y pescado'),
(35, 'Pechuga en salsa a la criolla', 0, 'Pollo y pescado'),
(36, 'Pechuga en salsa al kiwi', 0, 'Pollo y pescado'),
(37, 'Pechuga en salsa frutos secos', 0, 'Pollo y pescado'),
(38, 'Pechuga en salsa miel mostaza', 0, 'Pollo y pescado'),
(39, 'arroz blanco', 0, 'Arroz'),
(40, 'arroz verde', 0, 'Arroz'),
(41, 'arroz con zanahoria y pasas', 0, 'Arroz'),
(42, 'arroz bicolor (apio - Zanahoria / remolacha - espinaca)', 0, 'Arroz'),
(43, 'arroz almendrado', 0, 'Arroz'),
(44, 'arroz de coco', 0, 'Arroz'),
(45, 'arroz playero (champiñones, piña, leche de coco)', 0, 'Arroz'),
(46, 'arroz rojo', 0, 'Arroz'),
(47, 'arroz con especias y frutos secos', 0, 'Arroz'),
(48, 'arroz con verdura y azafrán', 0, 'Arroz'),
(49, 'arroz con coca-cola y pasas', 0, 'Arroz'),
(50, 'arroz ajonjoli', 0, 'Arroz'),
(51, 'arroz primavera', 0, 'Arroz'),
(52, 'arroz al pimentón ', 0, 'Arroz'),
(53, 'papas al ajillo', 0, 'papa'),
(54, 'papas al perejil', 0, 'papa'),
(55, 'papas a la parmesana', 0, 'papa'),
(56, 'papa al vapor', 0, 'papa'),
(57, 'papa pipián', 0, 'papa'),
(58, 'papa souté (jamón, cebolla, pimenton, perejil, crema de leche)', 0, 'papa'),
(59, 'papa a la crema', 0, 'papa'),
(60, 'puré amarillo', 0, 'papa'),
(61, 'torta de papa', 0, 'papa'),
(62, 'croquetas de papa', 0, 'papa'),
(63, 'Roll / tortilla de vegetales (lechuga, queso, zuquini, pimentón, mango, aderezo/vinagreta enrollados en tortilla)', 0, 'Ensalada'),
(64, 'ensalada césar (espinaca, queso, tocineta, pan en cuadritos) ', 0, 'Ensalada'),
(65, 'ensalada de la casa (habichuela, arveja, zanahoria, tomate, lechuaga, huevos de codorniz)', 0, 'Ensalada'),
(66, 'ensalada del jardin (variedad de lechugas, maíz tierno, queso, uvas pasas, mango, coco deshidratado, piña)', 0, 'Ensalada'),
(67, 'ensalada manor (cebollitas caramelizadas, lechuga lisa, alvaca, carambolo, queso campesino)', 0, 'Ensalada'),
(68, 'ensalada rusa (papa en cuadros, arveja, julianas de habichuela, zanahoria, mayonesa a las finas hiervas)', 0, 'Ensalada'),
(69, 'ensalada waldorf (lechuga romana, uvas pasas, queso mozarela, manzana verde, apio y aderezo)', 0, 'Ensalada'),
(70, 'ensalada primaveral (repollo, uvas pasas, piña, zanahoria, crema de leche y aderezo)', 0, 'Ensalada'),
(71, 'ensalada tenessi (lechuga, champiñones, queso paipa, aderezo de mostaza dijon)', 0, 'Ensalada'),
(72, 'ensalada verduras calientes (habichuela, zanahoria, arvejas, calabacin, cebollitas, salsa)', 0, 'Ensalada'),
(73, 'Mixtura de verduras y frutas (espinaca, apio, lechuga, melón, zanahoria, mango, queso parmesano, coco, aderezo)', 0, 'Ensalada'),
(74, 'Cuajada con melao', 0, 'Postre'),
(75, 'Brevas con arequipe', 0, 'Postre'),
(76, 'mus de Mango', 0, 'Postre'),
(77, 'mus de Mora', 0, 'Postre'),
(78, 'mus de Fresa', 0, 'Postre'),
(79, 'mus de Maracuyá', 0, 'Postre'),
(80, 'mus de Guanábana', 0, 'Postre'),
(81, 'Queso con dulce de papayuela', 0, 'Postre'),
(82, 'Bananas a la naranja', 0, 'Postre'),
(83, 'Pechuga a la plancha y nuggets, Chips de papa y Copa de gelatina', 0, 'Infantil'),
(84, 'Hamburguesa o perro caliente, Chips de papa  y  Copa de gelatina', 0, 'Infantil'),
(85, 'Lasagna de pollo, carne o mixta, Tajadas de pan y Copa de fruta gelatina', 0, 'Infantil'),
(86, 'Pan kooc de pollo, Ensalada del jardin y Copa de gelatina', 0, 'Infantil'),
(87, 'Empanaditas cocteleras de carne y pollo', 1100, 'Pasabocas'),
(88, 'Colombinas de pollo a la BBQ ', 2500, 'Pasabocas'),
(89, 'Huevos de codorniz con salsa rosada x 3', 1300, 'Pasabocas'),
(90, 'Pinchitos de papa y salchicha', 1800, 'Pasabocas'),
(91, 'Pinchitos de cerdo y piña', 2000, 'Pasabocas'),
(92, 'Pinchitos de pollo y res', 2000, 'Pasabocas'),
(93, 'Pinchos de ciruela y tocineta', 2500, 'Pasabocas'),
(94, 'Antipasto con galletas de ajonjolí', 1500, 'Pasabocas'),
(95, 'Albondigas a la diabla', 2300, 'Pasabocas'),
(96, 'Alitas de pollo en salsa Golf', 2500, 'Pasabocas'),
(97, 'Patacón carne desmechada', 2500, 'Pasabocas'),
(98, 'Fileticos de pollo grillé', 2600, 'Pasabocas'),
(99, 'Patacón con ceviche de Camarón', 3500, 'Pasabocas'),
(100, 'Tapas de Salmón Rosado', 3800, 'Pasabocas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menucategory`
--

CREATE TABLE `menucategory` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menucategory`
--

INSERT INTO `menucategory` (`id`, `title`, `cover`) VALUES
(1, 'Carne', 'menu-carne.jpg'),
(2, 'Pollo y pescado', 'menu-pollo-pescado.jpg'),
(4, 'Arroz', 'menu-arroz.jpg'),
(5, 'Papa', 'menu-papas.jpg'),
(6, 'Ensalada', 'menu-ensalada.jpg'),
(7, 'Postre', 'menu-postre.jpg'),
(8, 'Infantil', 'menu-infantil.jpg'),
(9, 'Pasabocas', 'menu-pasabocas.jpg'),
(10, 'Especial', 'menu-especial.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `evento` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `personas` varchar(255) DEFAULT NULL,
  `servicios` mediumtext NOT NULL,
  `menu` mediumtext,
  `registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `hour` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservation`
--

INSERT INTO `reservation` (`id`, `evento`, `nombre`, `email`, `telefono`, `fecha`, `personas`, `servicios`, `menu`, `registro`, `status`, `type`, `hour`) VALUES
(6, 'Bodas y matrimonios', 'Ian Scateni', 'Ianscateni@hotmail.com', '3162706248', '2022-04-08', '500', '{\"Menu00fa\":\"on\",\"Ponque\":\"on\",\"Bar\":\"on\",\"Sonido\":\"on\",\"siteEventTitle\":\"Hotel Campestre Las Palmeras - La Estrella\"}', '[\"2\",\"23\",\"44\",\"57\",\"69\",\"77\"]', '2022-03-24 02:11:59', 'Pending', 0, '14:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `type`) VALUES
(1, 'Administrador'),
(2, 'Cliente'),
(3, 'Proveedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `idEvent` varchar(255) DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `standar` double DEFAULT NULL,
  `medium` double DEFAULT NULL,
  `gold` double DEFAULT NULL,
  `unitStandar` varchar(255) DEFAULT NULL,
  `unitMedium` varchar(255) DEFAULT NULL,
  `unitGold` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `service`
--

INSERT INTO `service` (`id`, `title`, `description`, `idEvent`, `cover`, `standar`, `medium`, `gold`, `unitStandar`, `unitMedium`, `unitGold`) VALUES
(1, 'Menú', 'Conozca nuestro menú dando click <a href=\"/servicios/menuCard\" target=\"_blank\">Aquí</a><br><small>Ejemplo menú:</small><br><strong>Entrada: </strong> Ensalada o crema<br><strong>Fuerte: </strong>Carne de res o cerdo<br> Pechuga de pollo <br>Arroz o vegetales<br>Acompañamiento (papa) o ensalada<br><strong>Postre: </strong> Mus a escoger <br><strong>Bebida: </strong>Gaseosa<br><h6>Detalles del servicio</h6><hr>Seleccione  su  menú de nuestra <a href=\"/servicios/menuCard\" target=\"_blank\">“Carta  Menú”</a><br>Los alimentos son servidos a la mesa.<br>UBK Eventos  asume  la  alimentación  de todo su personal logístico.<br>', '1,2,3,4,5,6,7', 'menu.jpg', 15000, 0, 0, 'Por invitado', '', ''),
(2, 'Ponque', 'En pastillaje o crema Suave(sabor y diseño a escoger)<br><h6>Detalles del servicio</h6><hr>Seleccione envinado masa blanca o negra, tres leches, brownie, amaretto, semillas de amapola o milky way.<br>Sí usted no requiere el servicio de ponqué, descuente $1.500 por invitado.<br><strong>Champaña</strong><br>Brindis con champaña Katich ® Cada del rin blanca o rosada.<br><strong>Detalles del servicio</strong><br>la champaña katich tiene certificación Icontec, gracias a su sabor y calidad.<br>Sin champañan descuente $700 por invitado.', '1,2,3,4,5,6,7', 'ponque.jpg', 1500, 0, 0, 'Por invitado', '', ''),
(3, 'Bar', '<strong>Bebidas ilimitadas</strong><br>Gaseosas postobon y Coca-Cola<br>Jugo de naranja<br>Agua mineral<br>Hielo para todo el evento<br>Cocteles con Vodka y zumo de naranja<br><h6>Detalles del servicio</h6><hr>Para otra clase de cocteles por favor consultar con un asesor.<br>El cliente provee el whisky u otro licor de su gusto, eventos  UBK  brindará  el  servicio  de vasos  cortos  y  el  hielo  necesario  sin  costo adicional.', '1,2,3,4,5,6,7', 'bar.jpg', 150000, 250000, 500000, 'Personas', 'Personas', 'Personas'),
(4, 'Personal', '<strong>Personal de servicio</strong><br><strong>1 </strong>Coordinador de evento<br>\n<strong>8 </strong>Meseros y <strong>1</strong> cantinero por cada 100 personas<br><strong>1 </strong>Chef y/o auxiliar de alimentos<br><strong>1 </strong>Dj - sujeto a contratación de sonido<br><h6>Detalles del servicio</h6><hr>Se realiza el evento con personal debidamente capacitado, supervisados por un coordinador de evento.', '1,2,3,4,5,6,7', 'personal.jpg', 125000, 250000, 500000, 'Personas', 'Personas', 'Personas'),
(5, 'Menaje', 'Vajilla cuadrada(entrada, fuerte, postre y ponqué)<br>Cubiertos (Cuchillo, tenedor, cucharita dulcera y tenedor ponqué).<br>Cristalería (vasos largos y cortos, copas champaña, agua y/o vino).<br>Bandejas, jarras, hieleras, samovares, pala y sierra para ponqué<br>Incluye todo el menaje necesario para el óptimo desarrollo del evento.<br><h6>Detalles del servicio</h6><hr>\nUBK Eventos empleara todo el menaje necesario para el optimo desarrollo del evento.<br>El  montaje  de  “plato  base”  tendrá  un  costo adicional de $500 cada uno.<br>Cubertería de lujo tendrá un valor adicional de $500 por pieza.<br>En caso de requerir copa de vino (no tiene costo), favor informar al asesor.<br>Otro tipo de menaje debe ser sometido a previa cotización. ', '1,2,3,4,5,6,7', 'menaje.jpg', 1000, 0, 0, 'c/u', '', ''),
(6, 'Mobiliario', '<strong>Mesas y sillas</strong><br>Mesas redondas o rectangulares para invitados - 10 puestos c/u.<br>Mesa redonda para ubicar el ponqué.<br>Mesa redonda pequeña para ubicar el cofre (lluvia de \nsobres).<br>Mesas para montaje de alimentos y/o bar (bebidas).<br>Sillas Rimax sin brazos.<br><h6>Detalles del servicio</h6><hr>No se genera descuento sí el salón de su evento ya tiene mesas o sillas.<br><h6>Servicio opcional</h6><hr><small>Sujetos a disponibilidad</small><br>Con sillas tiffany color ocre o plateada (sin Rimax) a $ 4.500 c/u más transporte sí es necesario.<br>Salas  lounge  10  puestos  y  mesa  de  centro  a $160.000 más transporte sí es necesario.<br>Barra bar con luz $100.000 más transporte sí es necesario.', '1,2,3,4,5,6,7', 'mobiliario.jpg', 800, 2000, 0, 'c/u', 'c/u', ''),
(7, 'Manteles', 'Manteles  redondos  o  rectangulares  para  mesas  de invitados (blancos).<br>Mantel  redondo  para  mesa  de  ponqué  (color  a escoger).<br>Mantel redondo para mesa de cofre (blanco).<br>Tapas  o  caminos  para  mesas  de  invitados  (color  a escoger).<br>Tapa de lujo para mesa de ponqué (velo blanco).<br>Forros para sillas (multiusos blancos).<br>Fajón / cinta (color a escoger).<br>Servilletas en tela (color a escoger).<br><h6>Sercivios opcionales</h6><hr>Puede seleccionar mantel base de color para mesa redonda,  consulte  un  asesor  los  colores disponibles.<br>Tapas en velo o de lujo generan costo adicional, consulte un asesor.<br>Muselinas  blancas  (velos  largos  para  sillas)  $ 1.100 c/u.<br>Fajón adicional sencillo $ 700 c/u.', '1,2,3,4,5,6,7', 'manteles.jpg', 1200, 0, 0, 'c/u', '', ''),
(8, 'Flores', '<strong>Decoración</strong><br>Centros de mesa en flores y rosas o cilindros de cristal decorados<br>\nArreglo floral para mesa de ponqué.<br>Decoración de cofre, pala y sierra (ponqué).<br>Entrada decorada con antorchas, velas en cristales y pétalos.<br><h6>Servicio opcionales para bodas (no incluidos)</h6><hr>Servicio de decoración de iglesia, arreglo de carro para  la  novia,  azahares,  bouquet  de  la  novia, desde $250.000, consulte un asesor para mayor información.<br><h6>Servicio opcionales para 15 años (incluidos)</h6><hr>Para  quince  años  el  plan  incluye  sin  costo  el candelabro, rosas para el vals, puf para cambio de zapatilla (si es necesario).<br><h6>Servicio adicionales</h6><hr>Apliques  para  servilletas  desde  $300  y decoración para columnas y escaleras. <br>Luz led “par 64\" para dar ambiente de colores, desde 30.000 c/u.', '1,2,3,4,5,6,7', 'flores.jpg', 3000, 0, 0, 'c/u', '', ''),
(9, 'Tematicas', '<strong>Opcional (no incluida)</strong><br>Disponemos de decoración temática (vintage, oeste, casino,  carnaval,  hawai,  artica,  candy,  parisina, shabby chic, neon, tomorrow, etc), para determinar el valor total del plan con temática consulte un asesor.<br><h6>Servicios adicionales</h6><hr>Además  puede  alquilar  con  nosostros; salas lounge o vintage, barra bar, estructura de luces  tipo  concierto,  sonido  con  karaoke  y  los stand  temáticos  para  fotografía.... son  útiles  y cambian la decoración de su evento.', '4,5,7', 'tematica.jpg', 50000, 150000, 300000, 'Personas', 'Personas', 'Personas'),
(10, 'Sonido', '<strong>2</strong> Cabinas de sonido con amplificación<br><strong>1</strong> Micrófono inalámbrico<br><strong>4</strong> Luces audio-ritmicas y laser<br><strong>1</strong> Camara de humo<br><strong>1</strong> Dj - música variada a escoger <br>Presentación protocolaria (maestría)<br><h6>Detalles del servicio</h6><hr>La  musica  es  variada  (todos  los  generos),  y/o seleccionada por el cliente.<br>El sonido ofrecido es sólo para dj, sonido digital y no soporta  guitarras, teclados, bajos etc.<br>Recuerde  que  cada  agrupación  musical  en  su evento debe llevar su propio sonido.<br>El servicio de accesorios “kit carnaval” tiene un costo de $160.000, incluye 30 kit de: Sombrero y antifax,  pito,  collar  en  tela  y  manilla  neón, ademas  2  explosiones  de  papel.  por  favor consulte un asesor. <br>Servicio  de  estructura  tipo  concierto  desde $350.000, consulte un asesor.<br>Si no requiere sonido, descuente $130.000.', '1,2,3,4,5,6,7', 'sonido.jpg', 130000, 250000, 400000, 'Personas', 'Personas', 'Personas'),
(11, 'Mariachis', 'Mariachis alta calidad musical, Tenemos un amplio repertorio de canciones mexicanas. Algunas fusionadas con géneros como la salsa, reguetón, merengue, y por si fuera poco, también tenemos variedad de shows coreográficos. shows de zapateo, y homenaje de rodillas cuando la serenata es para las damas. Nuestro objetivo es hacer de tus eventos algo diferente e inolvidable. y por eso nuestros Mariachis también cuentan con un sistema de amplificación para cada instrumento, así tu serenatas se escuchara mucho mejor.<h6>Paquete 1</h6><hr><ul><li>Serenata de 10 Canciones</li><li>6 Integrantes</li><li>Show de coreografía y zapateo</li><li>Ramo de rosas (de mano)</li><li>Filmacion en DVD</li></ul><h6>Paquete 2</h6><hr><ul><li>Serenata de 15 Canciones</li><li>6 Integrantes</li><li>Show de coreografía y zapateo</li><li>Ramo de rosas (de mano) y chocolates</li><li>Filmacion en DVD</li></ul><h6>Paquete 3</h6><hr><ul> <li>Serenata de 15 Canciones</li><li>Show de coreografía y zapateo</li><li>Ramo de rosas (de mano) y chocolates</li><li>Filmacion en DVD</li></ul>', '', 'mariachis.jpg', 100000, 150000, 200000, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sites`
--

CREATE TABLE `sites` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `cover` varchar(255) NOT NULL,
  `capacity` double NOT NULL,
  `value` double NOT NULL,
  `idEvent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sites`
--

INSERT INTO `sites` (`id`, `title`, `description`, `cover`, `capacity`, `value`, `idEvent`) VALUES
(1, 'Hotel Campestre Las Palmeras - La Estrella', 'Las Palmeras es un increíble Hotel campestre ideal para la realización de cualquier tipo de eventos sociales y empresariales. Con amplios espacios para banquetes, terrazas, lugar para ceremonias y excelentes opciones para hospedaje, es el lugar perfecto para bodas, primeras comuniones, banquetes y cualquier tipo de reunión social o empresarial. Dispone de amplios parqueaderos, zona húmeda, restaurante, bar y todo lo necesario para vivir momentos inolvidables con el mejor servicio de UBK Eventos.', '1-hotel-campestre-las-palmeras-la-estrella.jpg', 500, 2500000, '1,2,3,4,5,6,7'),
(2, 'Finca Hotel Amazonas', 'Se enfoca en que los eventos sean memorables, poniendo empeño en cada uno de los detalles y exigencias. En UBK Eventos pone a disposición además de un equipo de profesionales, dos espacios rodeados de naturaleza en donde los  invitados podrán disfrutar del aire puro, fauna y flora característica de la región.', '2-finca-hotel-amazonas_1.jpg', 500, 2200000, '1,2,3,4,5,6,7'),
(3, 'Salón Van Goth – Laureles', 'Ubicado en el exclusivo sector de Laureles, Salón Van Goth es el espacio ideal para celebraciones más íntimas y especiales. Con todo lo necesario para la realización de cualquier tipo de evento social y empresarial. Es un lugar ideal para decoraciones temáticas, llenas de estilo y creatividad.', '3-salon-van-goth-laureles.jpg', 100, 300000, '1,2,3,4,5,7'),
(4, 'Salón Vivaldi – Laureles', 'Salón Vivaldi es un salón fantástico para celebraciones sociales y empresariales. Ubicado en el exclusivo sector de Laureles, cuenta con todo lo necesario para la realización de celebraciones con decoraciones temáticas, llenas de estilo y creatividad. También es un espacio perfecto para fiestas llenas de diversión. Fácil acceso y el mejor servicio de UBK.', '4-salon-vivaldi-laureles.jpg', 100, 350000, '1,2,3,4,5,6,7'),
(5, 'Centro de convenciones El Castillo', 'Un lugar tradicional de la cultura antioqueña, Centro de Convenciones El Castillo ofrece los mejores espacios para la realización de toda clase de eventos sociales y empresariales. Este espacio lleno de historia y de arquitectura y realiza las celebraciones más exclusivas de la mano del profesionalismo y la experiencia de UBK.', '5-centro-de-convenciones-el-castillo_1.jpg', 160, 483000, '1,2,3,4,5,7'),
(6, 'Finca Forest', 'Hermosos senderos, amplios espacios, elegancia y confort hacen parte de las características de Finca Forest en Envigado. Ideal para realizar fiestas y celebraciones llenas de magia y diversión.', '6-finca-forest_1.jpg', 160, 500000, '1,2,3,4,5,6,7'),
(7, 'Casa Tejada', 'Un hermoso lugar para celebrar eventos al aire libre. Este incomparable lugar situado a las afueras de Medellín, otorgará el escenario perfecto para ese gran día y enmarcará con gran estilo las fotografías del evento.', '7-casa-tejada_1.jpg', 340, 1200000, '1,2,3,4,5,6,7'),
(8, 'Gran Salón', 'El Gran Salón o Shalon es un espacio ideal para organizar cualquier tipo de evento social o empresarial. Con una capacidad para 340 invitados y un parqueadero para 60 vehículos, amplias zonas verdes y todas las comodidades necesarias para garantizar el éxito de los eventos.', '8-gran-salon-el-poblado-medellin_1.jpg', 340, 1500000, '1,2,3,4,5,6,7'),
(9, 'La Casa de Sabaneta', 'Un espacio tradicional con todo el encanto del campo a pocos minutos del casco urbano. Apropiado para realizar celebraciones sociales y empresariales, cuenta con todas las comodidades necesarias para la preparación de eventos inolvidables.', '9-la-casa-de-sabaneta_1.jpg', 160, 734000, '1,2,3,4,5,6,7'),
(10, 'Hacienda La Ananda', 'Un lugar para disfrutar las comodidades con todo el servicio y el profesionalismo de San Agustín en una hacienda exclusiva. Ideal para celebrar toda clase de eventos sociales y empresariales en un lugar campestre con los mejores espacios pensados para disfrutar y pasar momentos inolvidables.', '10-hacienda-la-ananda_1.jpg', 100, 600000, '1,2,3,4,5,6,7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `document` varchar(50) DEFAULT NULL,
  `documenttype` varchar(2) DEFAULT NULL,
  `firstname` varchar(250) DEFAULT NULL,
  `lastname` varchar(250) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `idrol` int(11) DEFAULT NULL,
  `register` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de perfiles de usuarios del aplicativo';

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `document`, `documenttype`, `firstname`, `lastname`, `address`, `email`, `phone`, `password`, `idrol`, `register`) VALUES
(1, '1082888075', 'CC', 'Ian', 'Scateni', 'Cra 23 N° 12 - 65 ', 'Ianscateni@hotmail.com', '311-3456543', '54f606f4c27d8deb30429f7a00debe90c3e919144b15317bc73b7b8c9d1e5d11c5acef34146301ff67c6481d0024a2db5882254a6864ff45ddd525b98fcc5fbb', 2, '2021-05-22 18:41:10'),
(11, '1082846464', 'CC', 'Ian', 'Scateni', 'carrrera 45 bb 546', 'ianscateni@gmail.com', '3162706248', '54f606f4c27d8deb30429f7a00debe90c3e919144b15317bc73b7b8c9d1e5d11c5acef34146301ff67c6481d0024a2db5882254a6864ff45ddd525b98fcc5fbb', 1, '2021-09-23 02:09:27'),
(12, '123456789', 'CC', 'Pruebas', 'Pruebas', 'pruebas', 'prueba@prueba.com', '1234567890', '47a71713a4a93f2ecb3c4c3d37a97706911133d3ec3cdb85ce11b9582ef6dbb6831b0cd51081a5693757d2a334f1cf25b32491849c35ad267af679f2585ffc41', 2, '2021-10-16 06:10:03'),
(13, '1234567890', 'CC', 'admin', 'admin', 'admin', 'admin@admin.com', '1234567890', '47a71713a4a93f2ecb3c4c3d37a97706911133d3ec3cdb85ce11b9582ef6dbb6831b0cd51081a5693757d2a334f1cf25b32491849c35ad267af679f2585ffc41', 1, '2021-10-16 06:10:29');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `galeryevents`
--
ALTER TABLE `galeryevents`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menucategory`
--
ALTER TABLE `menucategory`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idrol` (`idrol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `galeryevents`
--
ALTER TABLE `galeryevents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `menucategory`
--
ALTER TABLE `menucategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `sites`
--
ALTER TABLE `sites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
