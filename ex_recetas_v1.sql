-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-03-2024 a las 21:35:04
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ex_recetas_v1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `usuario` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `nombre`, `usuario`, `password`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colaboradores`
--

CREATE TABLE `colaboradores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `usuario` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `cuenta` varchar(50) NOT NULL,
  `saldo` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `colaboradores`
--

INSERT INTO `colaboradores` (`id`, `nombre`, `usuario`, `password`, `cuenta`, `saldo`) VALUES
(1, 'Ferran Adriá', 'col1', 'col1', 'paypal', '370.00'),
(2, 'Arguiñano', 'col2', 'col2', 'paypal', '110.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config`
--

CREATE TABLE `config` (
  `id` varchar(45) NOT NULL,
  `beneficios` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `config`
--

INSERT INTO `config` (`id`, `beneficios`) VALUES
('1', '10000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `perfil` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`perfil`) VALUES
('Administrador'),
('Colaborador'),
('Suscriptor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE `recetas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `ingredientes` mediumtext NOT NULL,
  `elaboracion` mediumtext NOT NULL,
  `etiquetas` varchar(250) DEFAULT NULL,
  `publica` tinyint(4) DEFAULT NULL,
  `imagen` varchar(250) DEFAULT NULL,
  `valoracion_media` int(11) DEFAULT NULL,
  `idColaborador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `recetas`
--

INSERT INTO `recetas` (`id`, `titulo`, `ingredientes`, `elaboracion`, `etiquetas`, `publica`, `imagen`, `valoracion_media`, `idColaborador`) VALUES
(1, 'Pollo al horno', '    Pollo limpio, entero 1\r\n    Limón 1\r\n    Aceite de oliva virgen extra\r\n    Pimienta negra molida\r\n    Sal\r\n    Cebolleta 2\r\n    Manzana tipo reineta o similares 2\r\n    Patata grandes 2\r\n    Diente de ajo 8\r\n    Romero fresco\r\n    Tomillo fresco (opcional)\r\n    Vino blanco o caldo (opcional)\r\n    Perejil fresco (opcional)\r\n', 'Precalentar el horno a 180ºC con calor arriba y abajo. Terminar de limpiar el pollo, dejando que se atempere un poco antes fuera de la nevera, retirando posibles restos de plumas, vísceras o exceso de grasa.\r\n\r\nEmulsionar en un cuenco o bote con tapa el zumo del limón -no hace falta colarlo, solo evitar los huesos- con dos cucharadas de aceite, una cucharadita de sal y una cucharadita de pimienta negra. Embadurnar bien el pollo con esta mezcla, reservando lo que sobre.\r\n\r\nLavar y pelar las patatas y las manzanas. Retirar la parte fea que puedan tener las cebolletas y las capas más externas y secas de los ajos. Cortar las cebolletas en juliana y las patatas y manzanas -sin corazón- en rodajas o medias lunas de 1 cm de grosor.', 'pollo, aves, horno, facil', NULL, 'img_1.jpg', 0, 2),
(2, 'Budín de arroz con leche', '    125 g. de arroz redondo SOS\r\n    200 ml. de nata líquida o crema de leche 35% M.G.\r\n    800 ml. de leche entera\r\n    100 g. de azúcar blanquilla\r\n    La piel de limón\r\n    3 huevos M\r\n    1 palito de canela\r\n    Una pizca de sal (2 gramos)\r\n', 'El arroz es de esos productos que podemos llamar estrella. Sirve tanto para un plato de esos rapiditos, de juntar 4 cosas y listo, de igual modo que es perfecto para elaboraciones más complejas con resultados más sofisticados. En cualquier caso el arroz es siempre una opción de acierto asegurado.\r\n\r\nCuando hablamos de dulces con arroz, lo primero que se nos viene a la cabeza, será seguramente el tradicional y delicioso arroz con leche. Pero podemos ir más allá del clásico arroz con leche si queremos disfrutar de su sabor y textura. Ya en el blog publiqué hace tiempo esta tarta de arroz con leche que tanto éxito ha tenido, pero el pastel de arroz no se queda corto. Creo que con nuestro budín de arroz os pasará lo mismo, si os gusta el arroz con leche, este budín os flipará.', 'postre, arroz, canela, leche', NULL, 'img_2.jpg', 0, 1),
(15, 'salsa barbacoa', '\r\n    Para la salsa barbacoa casera (para medio litro aproximadamente)\r\n    250 g. de cebolleta o cebolla blanca\r\n    100 ml, de aceite de oliva virgen extra\r\n    3 cucharadas de salsa Perrins o Worcestershire\r\n    2 cucharadas de salsa de soja\r\n    4 cucharaditas de vinagre de uva o manzana\r\n    3 cucharadas de kétchup\r\n    1 cucharadita de mostaza en grano (en este caso Dijon)\r\n    2 cucharadas colmadas de miel\r\n    1 cucharadita de pimentón de la Vera (la mitad de dulce y la mitad de picante, puedes poner también salsa picante)\r\n    250 ml, de salsa de tomate frito\r\n    1/2 cucharadita de orégano seco\r\n    50 a 100 ml. de agua (opcional, dependiendo de como queramos el espesor de la salsa)\r\n    Sal (si fuese ahumada sería perfecta) y pimienta negra recién molida (al gusto)\r\n', 'La salsa barbacoa o salsa BBQ es una de mis salsas preferidas, por su sabor, textura y usos en la cocina. La mayoría de la gente la suele comprar pensando que es muy difícil de preparar en casa, pero la verdad es que es muy fácil y con pocos ingredientes. Además de poder hacerla a tu gusto y con el toque especial que la diferencie del resto.\r\n\r\nEn nuestro caso os presentamos una salsa barbacoa casera básica, equilibrada, sencilla y con un sabor que te a conquistar. Seguro que la elaborarás más de una vez, la primera de prueba y luego ya jugando con tus gustos. Una salsa que combina genial con la carne, lo mismo unas costillas a la barbacoa, un pollo asado o nuestras famosas alitas de pollo. Aunque es un complemento perfecto para una hamburguesa o unas patatas o verduras asadas. Ya veis, una salsa polivalente llena de sabor que sirve de acompañamiento no solo a carnes sino también a pescados, verduras, patatas o incluso platos de pasta.', 'salsa, dulce, hamburguesa', NULL, 'img_3.jpg\r\n', NULL, 2),
(16, 'Alitas de pollo', '\r\n    1,5 kg. de alitas de pollo\r\n    Para la salsa barbacoa casera:\r\n    1 cucharada de mantequilla\r\n    3 cucharadas colmadas de aceite de oliva virgen extra\r\n    1 cucharada de mostaza (Antigua o Dijon)\r\n    3 cucharadas de salsa inglesa (Perrins o worcester)\r\n    1 cucharada de salsa de soja\r\n    1 cucharada colmada de miel gallega\r\n    100 ml de ketchup\r\n    200 ml de salsa de tomate casera\r\n    200 ml de agua\r\n    1 cebolla\r\n    2 dientes de ajo\r\n    Sal y pimienta negra recién molida (al gusto de cada casa)\r\n', 'Cómo preparar alitas de pollo a la barbacoa. Muchas veces me preguntáis alguna comida o cena, que sean recetas sencillas y baratas, pues esta es una de ellas. Una receta de pollo por la que tenemos debilidad en casa, las alitas de pollo. \r\n\r\nNos parecen una delicatessen al alcance de cualquiera que no está lo suficiente valorada. Además aceptan muchas preparaciones, yo las suelo cocinar fritas, maceradas en alguna especia y con vino blanco para darles un toque delicioso. ', 'pollo, alitas, barbacoa', NULL, 'img_4.jpg', NULL, 2),
(17, 'Pudin de chocolate', '\r\n    1 barra de pan pequeña\r\n    150 g. de azúcar\r\n    6 huevos camperos\r\n    1/2 litro de leche entera\r\n    1 cucharada de ralladura de una naranja\r\n    1 cucharada de postre de esencia de vainilla\r\n    150 g. de una tableta de vuestro chocolate para postres preferido (70%)\r\n    1 cucharada de cacao en polvo\r\n    150 ml. de caramelo líquido especial postres\r\n', 'Cómo preparar un pudin de chocolate. ¿Te gusta el pudin? ¿Y el chocolate? Hoy os propongo una gran combinación, un postre rápido y muy sencillo de preparar.\r\n\r\nMe he decidido por una receta de postre que se suele preparar en el Reino Unido y Irlanda. Un budín o pudin que está entre el flan de huevo y las natillas de chocolate que se preparan en EEUU. Esta versión es un pastel horneado, cocido al vapor como si fuese un flan que tiene un potente sabor a chocolate, perfecto para los que adoran su sabor, muy similar al Christmas Pudding.', 'postre, chocolate, puding', NULL, 'img_5.jpg', 3, 2),
(18, 'Tarta de queso', '\r\n    200 g. de galletas “María” de vuestra marca preferida\r\n    125 g. de mantequilla artesana\r\n    600 g. de queso crema de vuestra marca preferida\r\n    180 g. de azúcar de caña ecológico\r\n    400 g. de nata para montar 35% grasa\r\n    50 g. de queso de cabra cremoso\r\n    6 huevos camperos y ecológicos\r\n    3 g. de sal fina\r\n    Molde redondo desmontable, de 24-26 cm. de diámetro\r\n', 'De las tartas finalistas, la elegida como vencedora fue la de Fernando Alcalá, Jefe de Cocina del restaurante Kava Marbella. Un magnífico chef, que ya conocidos en Madrid Fusión 2019, al hacerse con el premio a Mejor Cocinero Revelación. El jurado estuvo formado por profesionales de renombre como Paco Torreblanca, Susi Díaz o José Carlos Capel.\r\n\r\nHemos probado muchas tartas de queso y también las hemos cocinado para el blog, y tengo que reconocer que esta receta está sin duda en mi top 3. Cremosa, suave, nada empalagosa y con un toque especial que le da el punto de cuajado. En definitiva, os recomiendo este postre que no debéis dejar de preparar en casa y tener la oportunidad de sorprender a vuestros comensales.\r\n\r\nComo os decía, en el blog tenemos muchas recetas de tartas de queso, con diferentes estilos e ingredientes. Una de mis preferidas es la Tarta de queso de La Viña, un local de la parte vieja de San Sebastián, y muy conocida a nivel nacional. Otras opciones muy conocidas son la tradicional CheeseCake americana, la tarta de queso y membrillo, y para los/as menos avezados/as en cocina, la que yo llamo “la tarta de queso más fácil del mundo”. Espero que os animéis a preparar esta tarta de queso, que a mí me ha conquistado y por supuesto repetiré más veces en casa.', 'tarta, queso, postre', NULL, 'img_6.jpg', 3, 2),
(19, 'Prueba', 'Prueba', 'Prueba', 'Prueba', NULL, NULL, 3, 1),
(20, 'Prueba2', 'Prueba2', 'Prueba2', 'Prueba2', NULL, NULL, 0, 1),
(21, '', '', '', '', NULL, NULL, 0, 1),
(22, 'dasfkldasfadsfds', 'asdfasfsafs', 'asdfasfdsafsa', '', NULL, NULL, 0, 1),
(23, 'Pan', 'Pan', 'Pan', 'Pan', NULL, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_suscriptores_recetas_votacion`
--

CREATE TABLE `r_suscriptores_recetas_votacion` (
  `id` int(11) NOT NULL,
  `suscriptores_id` int(11) NOT NULL,
  `recetas_id` int(11) NOT NULL,
  `puntuacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscriptores`
--

CREATE TABLE `suscriptores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `usuario` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `suscriptores`
--

INSERT INTO `suscriptores` (`id`, `nombre`, `usuario`, `password`) VALUES
(111, 'suscriptor1', 'suscriptor1', 'suscriptor1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario_UNIQUE` (`usuario`);

--
-- Indices de la tabla `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`perfil`);

--
-- Indices de la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_recetas_colaboradores1_idx` (`idColaborador`);

--
-- Indices de la tabla `r_suscriptores_recetas_votacion`
--
ALTER TABLE `r_suscriptores_recetas_votacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuarios_has_recetas_recetas2_idx` (`recetas_id`),
  ADD KEY `fk_usuarios_has_recetas_usuarios1_idx` (`suscriptores_id`);

--
-- Indices de la tabla `suscriptores`
--
ALTER TABLE `suscriptores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario_UNIQUE` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `colaboradores`
--
ALTER TABLE `colaboradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `recetas`
--
ALTER TABLE `recetas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `r_suscriptores_recetas_votacion`
--
ALTER TABLE `r_suscriptores_recetas_votacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `suscriptores`
--
ALTER TABLE `suscriptores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD CONSTRAINT `fk_rec_col` FOREIGN KEY (`idColaborador`) REFERENCES `colaboradores` (`id`);

--
-- Filtros para la tabla `r_suscriptores_recetas_votacion`
--
ALTER TABLE `r_suscriptores_recetas_votacion`
  ADD CONSTRAINT `fk_usuarios_has_recetas_recetas2` FOREIGN KEY (`recetas_id`) REFERENCES `recetas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_has_recetas_usuarios1` FOREIGN KEY (`suscriptores_id`) REFERENCES `suscriptores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
