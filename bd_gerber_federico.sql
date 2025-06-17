-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2025 a las 05:35:31
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_gerber_federico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda_servicio`
--

CREATE TABLE `agenda_servicio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `servicio` varchar(100) NOT NULL,
  `comentario` text DEFAULT NULL,
  `fecha` date NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` varchar(20) NOT NULL DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `agenda_servicio`
--

INSERT INTO `agenda_servicio` (`id`, `nombre`, `apellido`, `email`, `servicio`, `comentario`, `fecha`, `fecha_registro`, `estado`) VALUES
(1, 'Federico Augusto', 'Gerber', 'fede@outlook.es', 'Mantenimiento', 'cambio de filtros y aceite', '2025-06-20', '2025-06-03 04:08:32', 'cancelado'),
(2, 'prueba6', 'prueba', 'prueba@outlook.es', 'Aire Acondicionado', 'Sale agua por la salida de aire ', '2025-06-12', '2025-06-04 21:50:22', 'atendido'),
(3, 'federico', 'gerber90', '12345@outlook.es', 'Aire Acondicionado', '', '2025-06-21', '2025-06-11 21:59:01', 'cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita_clientes`
--

CREATE TABLE `cita_clientes` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `vehiculo_id` int(11) DEFAULT NULL,
  `horario` enum('mañana','tarde','noche') NOT NULL,
  `metodo_contacto` enum('email','llamada','whatsapp') NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `estado` enum('pendiente','confirmada','completada','cancelada') DEFAULT 'pendiente',
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `nombre_cliente` varchar(100) DEFAULT NULL,
  `email_cliente` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `cita_clientes`
--

INSERT INTO `cita_clientes` (`id`, `usuario_id`, `vehiculo_id`, `horario`, `metodo_contacto`, `telefono`, `estado`, `fecha_creacion`, `nombre_cliente`, `email_cliente`) VALUES
(10, 0, 2, 'mañana', 'email', '3794304050', 'completada', '2025-05-28 02:20:51', 'raul mendoza nose', '2beta@outlook.es'),
(11, 0, 2, 'tarde', 'llamada', '3794506070', 'cancelada', '2025-05-28 02:24:21', 'eustakio', '123@outlook.es'),
(12, 0, 2, 'mañana', 'whatsapp', '3794102030', 'completada', '2025-05-28 02:25:05', 'roberto torres ', 'torres@outlook.es'),
(13, 0, 3, 'tarde', 'llamada', '3794396841', 'pendiente', '2025-05-28 03:00:00', 'Gerber Federico ', 'federicoaugutogerber27@outlook.es'),
(14, 0, 2, 'mañana', 'llamada', '3794505050', 'pendiente', '2025-05-28 03:00:00', 'adolfo mendez', 'adolfo@outlook.es'),
(15, 0, 4, 'mañana', 'email', '3794505050', 'pendiente', '2025-05-28 03:00:00', 'adolfo mendez romano', 'adolforomero@outlook.es'),
(16, 0, 2, 'mañana', 'llamada', '03794102030', 'pendiente', '2025-06-03 03:00:00', 'prueba', 'prueba@outlook.es'),
(17, 0, 2, 'mañana', 'whatsapp', '03794102039', 'pendiente', '2025-06-03 03:00:00', 'prueba4', 'prueba4@outlook.es'),
(18, 0, 4, 'tarde', 'llamada', '3794396841', 'pendiente', '2025-06-07 03:00:00', 'federico', '12345@outlook.es'),
(19, 0, 2, 'tarde', 'email', '3794396841', 'pendiente', '2025-06-11 03:00:00', 'federico', '145@outlook.es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `consulta` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `atendida` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id`, `nombre_usuario`, `correo`, `consulta`, `fecha`, `atendida`) VALUES
(1, 'gerber federico augusto', 'federico@outlook.es', 'Hola, estoy interesado en el Fiat Cronos, ¿podrían confirmarme si lo tienen disponible para prueba de manejo y cuáles serían las opciones de financiación?\r\n', '2025-05-30 23:14:38', 1),
(5, 'Prueba de campo', 'prueba@outlook.es', 'Buenos días, estoy evaluando cambiar mi auto actual. ¿Podrían orientarme sobre las opciones de toma de usado y qué modelos nuevos tienen disponibles que se ajusten a un presupuesto de $50.000.000?\r\n', '2025-06-02 05:14:51', 0),
(6, 'prueba 2', 'prueba2@outlook.es', 'Hola, estoy entre el Fiat Cornos 2025 y el Ferrari Roma . ¿Podrían indicarme las diferencias principales en cuanto a equipamiento, consumo y garantía? También me interesa saber el costo de mantenimiento estimado.\r\n', '2025-06-03 18:01:51', 0),
(7, 'Federico Augusto', 'Gerber@outlook.es', 'Hola, estoy interesado en comprar un vehículo y quisiera saber más sobre las opciones de financiamiento que ofrecen. ¿Cuáles son los requisitos para acceder a un crédito y qué tasas de interés manejan? También me gustaría conocer si tienen alguna promoción vigente o beneficios adicionales para clientes nuevos.\r\n', '2025-06-11 21:50:41', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia_usuarios`
--

CREATE TABLE `experiencia_usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `comentario` text NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `fecha_subida` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `experiencia_usuarios`
--

INSERT INTO `experiencia_usuarios` (`id`, `usuario`, `comentario`, `imagen`, `fecha_subida`) VALUES
(18, 'Federico Augusto Gerber', 'La mejor compra de mi vida. Gracias Automotors', '1749665931_927b7d41ccb5f2eea8a5.jpg', '2025-06-11 18:18:51'),
(20, 'Federico Augusto Gerber', 'Posdata: Quiero agradecerte por hacer posible este nuevo capítulo en mi vida. La compra de este auto no es solo un vehículo, sino la puerta a nuevas aventuras, experiencias y caminos por recorrer. Valoro profundamente la atención, el servicio y la confianza que hicieron de este proceso algo especial. Con cada kilómetro, recordaré este momento con gratitud. ¡Gracias por todo!.', NULL, '2025-06-11 18:22:04'),
(23, 'prueba 00002', 'lo mejor ', '1749668862_294cbfd7c014583597cf.jpg', '2025-06-11 19:07:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1 COMMENT '1=activo, 0=inactivo',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`, `logo`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Fiat', '1749231319_c84fe5c29207f71d9bcd.jpg', 'Marca italiana, reconocida por sus vehículos urbanos compactos, económicos y de diseño práctico.', 1, '2025-06-05 00:18:05', '2025-06-06 17:35:19'),
(2, 'Renault', '1749231586_a7b310304a0c93b96963.jpg', 'Marca francesa, conocida por sus diseños innovadores, vehículos compactos y presencia en el automovilismo.\r\n', 1, '2025-06-05 00:18:05', '2025-06-06 17:39:46'),
(3, 'Ford', '1749231343_582465c28edd55da4cf9.jpg', 'Marca estadounidense, destaca por sus pickups robustas, SUVs versátiles y vehículos deportivos icónicos.', 1, '2025-06-05 00:18:05', '2025-06-06 17:35:43'),
(4, 'Chevrolet', '1749231268_61d49e706867d4f8c429.jpg', 'Marca estadounidense, ofrece una amplia gama de vehículos, desde sedanes y SUVs hasta potentes pickups.', 1, '2025-06-05 00:18:05', '2025-06-06 17:34:28'),
(5, 'Volkswagen', '1749231705_446de2e4f0c054babb38.jpg', 'Marca alemana, famosa por su ingeniería precisa, calidad de construcción y vehículos populares como el Golf y la Amarok.', 0, '2025-06-05 00:18:05', '2025-06-07 14:29:01'),
(6, 'Toyota', '1749231620_cc8e0c4def98b59de475.jpg', 'Marca japonesa, sinónimo de fiabilidad, durabilidad, eficiencia y pionera en tecnología híbrida.', 1, '2025-06-05 00:18:05', '2025-06-06 17:40:20'),
(7, 'Honda', '1749231728_a9f1242db230b2861525.jpg', 'Marca japonesa, sinónimo de confiabilidad, eficiencia y durabilidad, siendo uno de los mejores del mercado.', 1, '2025-06-05 00:18:05', '2025-06-11 17:49:06'),
(8, 'Hyundai', '1749231472_6fdfd3147413a8d8d419.jpg', 'Marca surcoreana, se destaca por su crecimiento, diseño moderno, tecnología y buena relación calidad-precio.', 0, '2025-06-05 00:18:05', '2025-06-07 14:28:44'),
(9, 'Ferrari', '1749231301_25157fcd4879bdfd5975.jpg', 'Marca italiana de superdeportivos de lujo, sinónimo de velocidad, exclusividad y un legado legendario en competición.', 1, '2025-06-05 02:22:13', '2025-06-06 17:35:01'),
(11, 'Audi', '1749231234_6590e054d5774b1ce7e8.jpg', 'Marca alemana de lujo, conocida por su sofisticado diseño, alta tecnología y sistemas de tracción avanzada.', 0, '2025-06-05 22:06:18', '2025-06-14 13:24:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `marca_id` int(11) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `kilometros` int(11) DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `motor` varchar(50) DEFAULT NULL,
  `potencia` varchar(50) DEFAULT NULL,
  `transmision` varchar(100) DEFAULT NULL,
  `consumo` varchar(50) DEFAULT NULL,
  `tanque` varchar(50) DEFAULT NULL,
  `velocidad_maxima` varchar(50) DEFAULT NULL,
  `pantalla_tactil` varchar(50) DEFAULT NULL,
  `diseno_exterior` text DEFAULT NULL,
  `diseno_interior` text DEFAULT NULL,
  `tamano_baul` text DEFAULT NULL,
  `motor_info` text DEFAULT NULL,
  `neumaticos` text DEFAULT NULL,
  `accesorios` text DEFAULT NULL,
  `caracteristicas_adicionales` text DEFAULT NULL,
  `precio_base` decimal(12,2) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `img_principal` varchar(255) DEFAULT NULL,
  `img_exterior` varchar(255) DEFAULT NULL,
  `img_interior1` varchar(255) DEFAULT NULL,
  `img_interior2` varchar(255) DEFAULT NULL,
  `img_baul` varchar(255) DEFAULT NULL,
  `img_motor` varchar(255) DEFAULT NULL,
  `img_neumaticos` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `marca_id`, `descripcion`, `kilometros`, `anio`, `motor`, `potencia`, `transmision`, `consumo`, `tanque`, `velocidad_maxima`, `pantalla_tactil`, `diseno_exterior`, `diseno_interior`, `tamano_baul`, `motor_info`, `neumaticos`, `accesorios`, `caracteristicas_adicionales`, `precio_base`, `stock`, `img_principal`, `img_exterior`, `img_interior1`, `img_interior2`, `img_baul`, `img_motor`, `img_neumaticos`, `estado`) VALUES
(2, 'Kwid ICE', 2, 'Vehículo urbano económico con diseño moderno y tecnología avanzada', 0, 2025, '1.0L 12V', '66 CV', 'Manual de 5 marchas', '6.2L/100km', '38L', '150 km/h', '7 pulgadas', 'El Renault Kwid ICE es la versión con motor a combustión interna del popular Kwid. Esto quiere decir que, a diferencia de una versión eléctrica o híbrida, el Kwid ICE incorpora un motor de 1.0 SCe de 3 cilindros, que ofrece un buen desempeño en entornos urbanos y un consumo combinado de 6.2 L/100 km. Su diseño se orienta hacia la ciudad, combinando un estilo robusto y moderno con faros LED DRL y una parrilla frontal renovada, lo que le confiere una presencia llamativa y a la vez práctica para sortear obstáculos urbanos, especialmente teniendo una altura libre al suelo de 180 mm.', 'En el interior, destaca por su amplitud y tecnología: una pantalla multimedia de 7 pulgadas y un panel de instrumentos digital que facilitan la interacción de manera intuitiva. Además, la conectividad con Android Auto y Apple CarPlay permite disfrutar de una experiencia conectada y moderna al volante.', 'El espacio de carga es uno de los aspectos funcionales del Kwid ICE. Con una capacidad de 290 litros, el baúl ofrece un volumen adecuado para transportar equipajes, compras o cualquier tipo de carga que se requiera en la vida diaria urbana. Su diseño inteligente permite aprovechar el espacio de manera óptima y, en muchas versiones, los asientos traseros pueden abatirse para expandir la capacidad de carga cuando se necesite mayor versatilidad. Esto lo convierte en una opción muy práctica para quienes buscan un vehículo compacto sin sacrificar funcionalidad en el uso cotidiano.', 'El Kwid ICE se apoya en un motor 1.0 SCe de tres cilindros, diseñado para el uso urbano mediante un balance inteligente entre eficiencia y desempeño. Este motor naftero utiliza una arquitectura de cuatro válvulas por cilindro que permite una combustión óptima, consiguiendo entregar 66 CV (48 kW) a 5,500 rpm y un torque máximo de 93 Nm a 4,250 rpm. Esta configuración no solo asegura una respuesta ágil y adecuada para el entorno citadino, sino que también contribuye a un consumo moderado estimado de 6.2 L/100 km en condiciones combinadas. La transmisión se encuentra acoplada a una caja de cambios manual de cinco velocidades, lo que favorece una conducción directa y económica en el tráfico urbano y trayectos diarios\r\n', 'En cuanto a la configuración de los neumáticos, el Kwid ICE viene equipado con llantas de acero de 14 pulgadas, lo que demuestra un enfoque práctico y resistente, ideal para el uso cotidiano y para facilitar el mantenimiento. Los neumáticos son del tamaño 165/70 R14:\r\n- 165: Representa el ancho del neumático en milímetros.\r\n- 70: Corresponde a la relación entre la altura del flanco y el ancho (70% de 165 mm), lo que contribuye a una buena absorción de irregularidades del pavimento.\r\n- R14: Indica que están montados en llantas de 14 pulgadas de diámetro.\r\nAdemás, se integra un sistema de monitoreo de presión de neumáticos (TPMS), que vigila en tiempo real la presión en cada rueda para garantizar una correcta adherencia, una conducción más segura y una mayor eficiencia en el consumo de combustible.\r\n', 'Par de barreros, Kit Sport, Deflectores de lluvia, Soporte para smartphone con carga inalámbrica, Solera de puertas delanteras, Cargador inalámbrico para smartphone, Bandeja de baúl termoformada, Alarma volumétrica con módulos Bluetooth y RFID, Tornillos antirrobo, Kit de seguridad Renault 5 en 1, Cubre alfombras textil, Protector de cárter, Módulo Tilt Down, Alarma volumétrica', '- Pantalla táctil flotante de 10.1\" con reconocimiento de gestos\r\n- Sistema de frenado automático de emergencia con detección de peatones\r\n- Asientos delanteros con calefacción, ventilación y memoria eléctrica\r\n- Motor turbo 2.0L de 250HP con transmisión automática de 8 velocidades\r\n- Llantas de aleación 19\" con diseño exclusivo Black Edition\r\n- Actualizaciones over-the-air (OTA) para sistemas del vehículo', 25000000.00, 20, '1748301734_9fdf055258f2e53ab839.jpg', '1748301734_14571ae4844978958e3f.jpg', '1748301734_29080e59c0ac7c1a706d.jpg', '1748301734_8cc4a3382df7890bedd2.jpg', '1748301734_af3dabb0147c0c5642bf.jpg', '1748301734_0ecc1637ddd5122340d7.jpg', '1748301734_34e6a418adf091768b7c.jpg', 1),
(3, 'Cronos Like', 1, 'El Fiat Cronos 2025 se destaca por su diseño moderno y equilibrado, con líneas aerodinámicas que le otorgan un aspecto deportivo.', 0, 2025, '1.3 Turbo', '99 CV', 'Automática CVT de siete velocidades', '9.1/100k', '48L', '173.5 km/h', '7 pulgadas', 'En su exterior, el Fiat Cronos 2025 luce una parrilla delantera cromada con un diseño hexagonal y el emblemático logo Fiat en el centro, flanqueada por modernos faros LED con tecnología de iluminación diurna (DRL) que no solo mejoran la visibilidad sino que le otorgan una firma lumínica distintiva. Las líneas laterales dinámicas y el perfil aerodinámico crean un efecto visual deportivo, mientras que las llantas de aleación de 16\" con diseño de doble tono (negro y plateado) aportan un toque de sofisticación y robustez. En la parte trasera, las luces LED en forma de \"C\" se integran armoniosamente con el portón, que incluye un spoiler integrado para mejorar la aerodinámica, y un difusor posterior que complementa el aspecto urbano-deportivo del vehículo. Los detalles en negro brillante en los espejos retrovisores y los molduras laterales terminan de pulir un diseño exterior que combina elegancia y modernidad en cada ángulo.', 'El interior sorprende con un enfoque tecnológico y confortable: una pantalla táctil flotante de 10.1\" con conectividad Android Auto y Apple CarPlay, un tablero digital de 7\" y un volante multifunción en cuero perforado. Los asientos, revestidos en tela y microfibra, ofrecen soporte lumbar ajustable, mientras que la ambientación LED y el techo panorámico eléctrico añaden un toque premium.', 'El Cronos 2025 sorprende con un maletero de 525 litros de capacidad (uno de los más amplios en su categoría), ideal para equipaje familiar o viajes largos. Su apertura es amplia y baja, facilitando la carga de bultos pesados, y cuenta con un umbral plano (sin bordes elevados) para mayor practicidad.', 'Bajo el capó, el motor 1.3 Turbo demuestra su eficiencia con 99 CV de potencia, superando a rivales con motores aspirados gracias a su tecnología MultiAir y turbo de baja inercia, que garantizan mejor respuesta y menor consumo (9.1 L/100 km). Además, su transmisión CVT de siete velocidades asegura cambios suaves y un manejo ágil.', 'El Fiat Cronos 2025 equipa neumáticos 195/55 R16 de alta gama, diseñados para ofrecer un equilibrio perfecto entre rendimiento, confort y durabilidad. La versión de equipamiento alto incluye cubiertas Pirelli Cinturato P7, reconocidas por su excelente agarre en superficies mojadas y secas, baja resistencia a la rodadura (para mayor eficiencia de combustible) y bajo nivel de ruido. Su banda de rodamiento optimizada garantiza tracción estable en curvas y frenados más precisos. Como opcional, se ofrece la tecnología Run Flat, que permite continuar la marcha (hasta 80 km a 80 km/h) incluso con un pinchazo, aumentando la seguridad en ruta. Las llantas de aleación de 16\" (diseño en doble tono) no solo mejoran la estética, sino que también contribuyen a una mejor disipación del calor en frenadas prolongadas.', 'Cámaras de retroceso, Sensor de estacionamiento, Kit de tapizados premium, Alfombrillas personalizadas, Barras de techo, Protector de cajuela, Tunning deportivo (alerón, difusor), Toldo parasol para ventanas, Cargador inalámbrico, Sistema de sonido premium.', '- Pantalla táctil flotante de 10.1\" con reconocimiento de gestos\r\n- Sistema de frenado automático de emergencia con detección de peatones\r\n- Asientos delanteros con calefacción, ventilación y memoria eléctrica\r\n- Motor turbo 2.0L de 250HP con transmisión automática de 8 velocidades\r\n- Llantas de aleación 19\" con diseño exclusivo Black Edition\r\n- Actualizaciones over-the-air (OTA) para sistemas del vehículo', 27000000.00, 17, '1748433037_4114cb7d9372f47ef28d.jpg', '1748433037_dd22691a001ca36a28b3.jpg', '1748433037_987c263f1acad237d380.jpg', '1748433037_6d97cee1aa786e76cf88.jpg', '1748433037_184919d3971d1d8952f8.jpg', '1748433037_6e7a583b7129d8e9644e.jpg', '1749239114_7291a09602862901f7ea.jpeg', 1),
(4, 'Hilux 4x4', 6, 'La Toyota Hilux 4x4 sigue siendo la referencia en pickups por su resistencia, tecnología y capacidad off-road. Su motor 2.8L Turbo Diesel garantiza potencia y eficiencia, mientras que su diseño interior y exterior equilibra robustez con comodidad. Ideal para trabajo pesado, aventura o uso familiar.', 0, 2025, '2.8L Turbo Diesel (1GD-FTV)', '204 CV @ 3,400 rpm', 'Automática de 6 velocidades', '9.5–10.5 L/100 km', '80 litros (opcional 150L con tanque auxiliar)', '180 km/h', '8\" ', 'La Toyota Hilux 4x4 presenta un diseño robusto y musculoso, con líneas agresivas que reflejan su carácter todoterreno. La parrilla delantera negra hexagonal, con el emblemático logo Toyota en relieve, domina el frente, acompañada de faros LED con luces diurnas (DRL) que mejoran la visibilidad y le dan un aspecto moderno. Las defensas metálicas integradas, tanto delanteras como traseras, no solo protegen el vehículo en terrenos difíciles, sino que también añaden un toque de ruggedness. Los pasos de rueda ampliados y las molduras laterales anti-raspones protegen la carrocería, mientras que las llantas de aleación de 18\" (en versiones urbanas) o 17\" (en versiones off-road) completan su apariencia imponente. La barra de techo integrada y los estribos laterales facilitan el acceso y aumentan su utilidad, mientras que la caja de carga, revestida en plástico anti-abrasivo, está diseñada para resistir el uso intensivo.', 'Al subir a la cabina, la Hilux 4x4 sorprende con un interior que combina funcionalidad y confort. El volante multifunción, revestido en cuero, incluye controles para el sistema de audio, el crucero adaptativo y la pantalla de información. La pantalla táctil central, de 8\" o 9\" según la versión, es compatible con Apple CarPlay y Android Auto, ofreciendo conectividad total. Los asientos, tapizados en cuero en las versiones altas, son ergonómicos y en algunos casos incluyen calefacción y ajuste eléctrico para el conductor. La climatización dual automática asegura un ambiente agradable en cualquier condición, mientras que el aislamiento acústico mejorado reduce el ruido del motor y la carretera. Detalles como la carga inalámbrica, los puertos USB-C y el Wi-Fi integrado reflejan su adaptación a las necesidades modernas.', 'La plataforma de carga de la Hilux 4x4 es una de las más versátiles de su segmento, con una capacidad de hasta 1,200 kg y dimensiones generosas (1.52m de ancho x 1.54m de largo). El revestimiento anti-abrasivo protege la superficie de golpes y corrosión, mientras que el sistema de anclajes \"C-channel\" permite asegurar cargas de manera eficiente. Incluye una toma de corriente 12V/120W para herramientas o dispositivos, y opcionalmente puede equiparse con una cubierta dura con cerradura o una lona impermeable. La altura de carga es accesible, y la resistencia de los materiales asegura que soporte condiciones extremas sin deteriorarse.', 'Bajo el capó, la Hilux 4x4 monta un potente motor 2.8L Turbo Diesel (1GD-FTV) que entrega 204 CV y un impresionante torque de 500 Nm, disponible desde 1,600 rpm. Este bloque destaca por su eficiencia y durabilidad, gracias a la tecnología Common Rail de inyección directa y al filtro de partículas diésel (DPF) que cumple con las normativas de emisiones. Comparado con rivales como la Ford Ranger o la Mitsubishi Triton, ofrece mayor torque y un rendimiento más refinado, ideal tanto para el trabajo pesado como para el off-road. La transmisión automática de 6 velocidades (o manual, según preferencia) y la tracción 4x4 con reductora y bloqueo del diferencial trasero garantizan un desempeño excepcional en cualquier terreno.', 'La Hilux 4x4 puede equipar neumáticos 265/60 R18 en versiones urbanas o 265/70 R17 en configuraciones off-road, con opciones de banda mixta (HT) o todo terreno (AT). Marcas como Bridgestone, Toyo o Michelin ofrecen modelos específicos para esta pickup, equilibrando durabilidad, agarre y confort. En terrenos extremos, la tecnología Run Flat (opcional) permite continuar la marcha incluso con un pinchazo, aumentando la seguridad en zonas remotas. Su diseño y composición están pensados para resistir el uso intensivo, tanto en carretera como en caminos irregulares.', 'Cubre asientos de tela o vinilo, alfombrillas de goma o tela personalizadas, tapa de caja (lona rígida o blanda), cargador USB adicional, organizador de consola central, protector de parrilla delantera (rejilla metálica o plástico).', '- Pantalla táctil flotante de 10.1\" con reconocimiento de gestos\r\n- Sistema de frenado automático de emergencia con detección de peatones\r\n- Asientos delanteros con calefacción, ventilación y memoria eléctrica\r\n- Motor turbo 2.0L de 250HP con transmisión automática de 8 velocidades\r\n- Llantas de aleación 19\" con diseño exclusivo Black Edition\r\n- Actualizaciones over-the-air (OTA) para sistemas del vehículo', 30000000.00, 20, '1748457914_09dac3720b193da002e0.png', '1748457914_822687d89643cc0d181c.jpg', '1748457914_3ed8111c081ffead0592.jpg', '1748457914_3777273c54937f976450.jpg', '1748457914_e6d98d5ee6ad72fb28f5.jpeg', '1748457914_6ae3ac55e41ffb71916d.jpg', '1748457914_414d116882df114124b3.jpg', 1),
(5, 'Equinox', 4, 'SUV versátil con diseño moderno, tecnología avanzada y gran confort para viajes largos.', 0, 2025, '1.5 Turbo', '172 CV @ 5600 rpm', 'Automática de 6 velocidades', '13.5 L/100 km', '56.4 L (FWD) / 59 L (AWD)', '180 km/h', NULL, 'El Chevrolet Equinox presenta un diseño aerodinámico que mejora la eficiencia y estabilidad en carretera. Su parrilla frontal con detalles cromados y faros LED aportan un aspecto moderno y sofisticado. La línea de carrocería fluida mejora la estética y la aerodinámica, mientras que las llantas de aleación de hasta 19 pulgadas le brindan una presencia imponente en cualquier terreno. Además, cuenta con rieles de techo que facilitan el transporte de carga adicional.\r\n', 'El interior está diseñado para maximizar el confort, con asientos tapizados en cuero y ajuste eléctrico en las versiones superiores. Incorpora el sistema de sonido Bose Premium, ofreciendo una experiencia acústica envolvente. Su tablero con tecnología digital y detalles en aluminio aporta un toque elegante, mientras que el sistema de conectividad avanzada incluye pantalla táctil de 7 u 8 pulgadas, compatible con Android Auto y Apple CarPlay.\r\n', 'El Chevrolet Equinox ofrece una capacidad de carga de 468 litros, ideal para el uso diario. Si se requiere más espacio, los asientos traseros pueden abatirse en una configuración 60/40, ampliando la capacidad a 1627 litros, suficiente para transportar equipaje voluminoso o equipo recreativo.\r\n', 'El motor 1.5 Turbo proporciona potencia de 172 CV y un torque de 275 Nm, permitiendo una aceleración eficiente sin comprometer el consumo de combustible. Su tecnología Start/Stop optimiza el rendimiento en ciudad, reduciendo el gasto de combustible cuando el vehículo está detenido. Además, la respuesta del motor es ágil gracias a la transmisión automática de 6 velocidades.\r\n', 'El Equinox incorpora neumáticos 225/65R17 en la versión FWD y 235/50R19 en la versión AWD, ofreciendo mejor agarre y estabilidad en distintas superficies. Su suspensión optimizada mejora la experiencia de conducción, proporcionando un manejo cómodo en carretera y terreno irregular.\r\n', 'El Chevrolet Equinox está equipado con una amplia gama de accesorios de tecnología y seguridad, como el sistema OnStar, que ofrece asistencia en caso de emergencia y conectividad remota. Además, cuenta con Wi-Fi nativo, permitiendo conexión a internet hasta para siete dispositivos. Sus sensores de estacionamiento y cámara de reversa facilitan maniobras en espacios reducidos, mientras que el encendido remoto permite activar el vehículo a distancia para climatizar el habitáculo antes de ingresar.\r\n', 'El Chevrolet Equinox es un SUV versátil con diseño aerodinámico, tecnología avanzada y seguridad de última generación. Su motor 1.5 Turbo entrega 172 CV, con transmisión automática de 6 velocidades y tracción FWD o AWD. Destaca por su Wi-Fi nativo, pantalla táctil MyLink, sistema OnStar, frenado autónomo de emergencia y Easy Park para estacionamiento asistido. Su baúl ofrece 468 L, expandible a 1627 L con asientos abatidos.\r\n', 35000000.00, 20, '1749233325_9ee1002d258a99070285.jpg', '1749233988_e6fdfb2b8e5ac0745fb5.jpg', '1749233988_a320d69bddb87e265058.jpg', '1749234066_f1f67a2d81233b903184.jpg', '1749233988_d0f87eb51ae3025252ae.jpg', '1749233988_5794a26b8433563ee10b.jpg', '1749233988_b1a526da832540c0e93f.jpg', 1),
(6, 'Roma', 9, 'Coupé deportivo de lujo con diseño elegante, tecnología avanzada y un potente motor V8 biturbo.', 0, 2025, '3.9L V8 Twin-Turbo', '620 CV @ 7500 rpm', 'Automática de doble embrague con 8 velocidades', '11.2 L en ciclo combinado', '80L', '320 km/h', NULL, 'El Ferrari Roma 2025 es una obra maestra de la aerodinámica y la elegancia. Inspirado en los clásicos Ferrari de los años 50 y 60, su diseño minimalista resalta con una parrilla frontal refinada y faros LED estilizados que le otorgan una presencia imponente. Su carrocería fluida y esculpida mejora la aerodinámica, reduciendo la resistencia al viento y optimizando el rendimiento. La parte trasera incorpora un difusor aerodinámico y un alerón activo que se despliega automáticamente según la velocidad, mejorando la estabilidad a altas velocidades.', 'El interior del Roma 2025 es una combinación de lujo y tecnología. Los asientos están tapizados en cuero premium, con costuras artesanales que reflejan la atención al detalle de Ferrari. El cuadro de instrumentos digital de 16 pulgadas proporciona información clara y precisa, mientras que los mandos táctiles en el volante permiten un control intuitivo de las funciones del vehículo. La consola central alberga una pantalla táctil Full HD de 8.4 pulgadas, desde donde se gestionan el sistema de navegación, climatización y entretenimiento.', 'A pesar de su enfoque deportivo, el Ferrari Roma 2025 ofrece un espacio de carga suficiente para el equipaje de dos personas, ideal para escapadas de fin de semana. Su diseño optimizado permite un acceso fácil y una distribución eficiente del espacio.', 'El motor delantero central del Roma es un V8 Twin-Turbo de 3.9L, capaz de generar 620 CV y un torque de 760 Nm. Gracias a su transmisión automática de doble embrague con 8 velocidades, el vehículo logra una aceleración de 0-100 km/h en solo 3.4 segundos, con una velocidad máxima de 320 km/h. Su sistema de escape deportivo mejora la acústica del motor, ofreciendo un sonido característico de Ferrari.', 'El Roma 2025 está equipado con neumáticos de alto rendimiento diseñados para maximizar la adherencia y estabilidad en carretera. Su configuración específica varía según la versión, pero generalmente incorpora neumáticos de perfil bajo que optimizan la respuesta en curvas y la tracción en distintas superficies.', '- Sistema de asistencia OnStar, que proporciona seguridad y conectividad en tiempo real.\r\n- Conectividad Wi-Fi, permitiendo acceso a internet dentro del vehículo.\r\n- Sensores de estacionamiento con cámara de reversa para maniobras precisas.\r\n- Techo panorámico, que mejora la sensación de amplitud y luminosidad en el habitáculo.', '- irección asistida: Electrónica\r\n- Bluetooth: Sí\r\n- Airbags frontales: Sí\r\n- ABS con EBD: Sí\r\n- Cámara de reversa: Sí\r\n- Pantalla táctil: 8.4 pulgadas Full HD\r\n', 57000000.00, 20, '1749241835_40cbc342c3524798ba8d.jpg', '1749241835_aa13c668bf95613aa048.jpg', '1749241835_4ab413d36368d8507843.jpg', '1749241835_756d82e89d1b8975efd1.jpg', '1749241835_a33130673ffac1115f2d.jpg', '1749302397_0720b108a5ca6a099160.jpg', '1749241835_71525c332058665f7ead.jpg', 1),
(7, 'Honda HR-V', 7, 'El Honda HR-V 2025 es un SUV moderno y versátil, diseñado para ofrecer comodidad, tecnología y seguridad. Con un motor turbo eficiente, una transmisión CVT suave y un diseño aerodinámico con detalles premium, es perfecto tanto para la ciudad como para aventuras en carretera. Su interior espacioso incluye una pantalla táctil de 10.1\", conectividad Bluetooth y múltiples sistemas de asistencia al conductor, garantizando una experiencia de manejo segura y placentera. \r\n', 0, 2025, '1.5L Turbo, 4 cilindros', '190 HP', 'Automática CVT de siete velocidades', '6.5 L/100 km', '50L', '190km/h', NULL, 'El Honda HR-V 2025 presenta un diseño aerodinámico con líneas suaves y modernas que no solo mejoran la estética, sino también la eficiencia del vehículo. Su parrilla cromada integrada con los faros LED le da una presencia imponente en la carretera, mientras que los detalles deportivos en los costados realzan su carácter dinámico. Además, cuenta con un techo ligeramente inclinado hacia la parte trasera, proporcionando un estilo coupé que maximiza su atractivo.', 'El interior del HR-V 2025 está diseñado para brindar comodidad y sofisticación. Los materiales de alta calidad, como los asientos de cuero y los detalles en aluminio pulido, elevan la experiencia de conducción. La disposición ergonómica de los controles y el volante multifunción facilitan la interacción con la tecnología del vehículo. La climatización dual permite que conductor y pasajeros disfruten de temperaturas personalizadas, mientras que el amplio espacio en la cabina brinda una sensación de libertad en cada viaje.', 'Con una capacidad de 430 litros, el baúl del Honda HR-V es ideal para quienes buscan funcionalidad sin comprometer el diseño. Su apertura amplia y de fácil acceso permite cargar objetos voluminosos sin dificultad, mientras que los asientos traseros abatibles amplían aún más el espacio de almacenamiento, ofreciendo versatilidad para transportar equipaje, equipos deportivos o compras grandes.\r\n', 'El HR-V 2025 está equipado con un motor turbo de 1.5L, que ofrece una excelente combinación de potencia y eficiencia. Genera 190 HP, lo que le permite un desempeño ágil tanto en ciudad como en carretera. Su tecnología de inyección directa optimiza el consumo de combustible, manteniendo un promedio de 6.5 L/100 km. Gracias a su transmisión automática CVT, las transiciones de marcha son suaves, brindando una conducción confortable y eficiente.\r\nNeumáticos\r\nLas llantas de aleación de 18 pulgadas han sido diseñadas para proporcionar el mejor agarre en diversos tipos de terrenos. Su tecnología mejora la estabilidad y la tracción, garantizando una conducción segura en condiciones adversas, como lluvia o caminos irregulares. Además, su diseño estilizado complementa la apariencia elegante del vehículo, realzando su carácter moderno y sofisticado.\r\nAccesorios\r\nEl Honda HR-V 2025 viene equipado con una variedad de accesorios que elevan la experiencia de manejo:\r\n- Cámaras de retroceso, que facilitan las maniobras en espacios reducidos y mejoran la seguridad al estacionar.\r\n- Kit de tapizados premium, con materiales resistentes y suaves al tacto que aportan confort y durabilidad.\r\n- Alfombrillas personalizadas, diseñadas para adaptarse perfectamente al interior del vehículo y brindar protección extra contra suciedad y desgaste.\r\nEste modelo está diseñado para quienes buscan un equilibrio perfecto entre elegancia, tecnología y rendimiento. ¡Déjame saber si quieres agregar más detalles! ?✨\r\n', 'Las llantas de aleación de 18 pulgadas han sido diseñadas para proporcionar el mejor agarre en diversos tipos de terrenos. Su tecnología mejora la estabilidad y la tracción, garantizando una conducción segura en condiciones adversas, como lluvia o caminos irregulares. Además, su diseño estilizado complementa la apariencia elegante del vehículo, realzando su carácter moderno y sofisticado.\r\nAccesorios\r\nEl Honda HR-V 2025 viene equipado con una variedad de accesorios que elevan la experiencia de manejo:\r\n- Cámaras de retroceso, que facilitan las maniobras en espacios reducidos y mejoran la seguridad al estacionar.\r\n- Kit de tapizados premium, con materiales resistentes y suaves al tacto que aportan confort y durabilidad.\r\n- Alfombrillas personalizadas, diseñadas para adaptarse perfectamente al interior del vehículo y brindar protección extra contra suciedad y desgaste.\r\nEste modelo está diseñado para quienes buscan un equilibrio perfecto entre elegancia, tecnología y rendimiento. ¡Déjame saber si quieres agregar más detalles! ?✨\r\n', 'Cámaras de retroceso, Kit de tapizados premium, Alfombrillas personalizadas, Sensores de estacionamiento, Techo panorámico, Cargador inalámbrico, Faros antiniebla LED, Control de crucero adaptativo, Volante multifunción, Espejos laterales eléctricos, Sistema de sonido premium, Climatización automática, Asientos calefaccionados, Portón trasero eléctrico, Llantas deportivas de aleación.\r\n', '- Sistema de dirección asistida eléctrica\r\n- Bluetooth integrado con manos libres\r\n- 6 airbags frontales y laterales\r\n- Frenos ABS con distribución electrónica de fuerza (EBD)\r\n- Cámara de reversa con guías dinámicas\r\n- Pantalla táctil de 10.1\"\r\n', 26000000.00, 19, '1749664603_a1079718cdd6d9303e4b.jpg', '1749664603_662f0ee9aa7922b75298.jpg', '1749664603_67904ed68b4f32a9fb9b.jpg', '1749664603_10c0cd13c495298c3973.jpg', '1749664603_ba913a7ff82581998a3b.jpg', '1749664603_c34032b951535c80279e.jpg', '1749664603_e5069b3d53bde73a4822.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabaja_con_nosotros`
--

CREATE TABLE `trabaja_con_nosotros` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `area_interes` varchar(100) NOT NULL,
  `curriculum` varchar(255) DEFAULT NULL,
  `fecha_postulacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `trabaja_con_nosotros`
--

INSERT INTO `trabaja_con_nosotros` (`id`, `nombre`, `apellido`, `email`, `telefono`, `area_interes`, `curriculum`, `fecha_postulacion`) VALUES
(3, 'Federico', 'Gerber', 'federicoaugustogerber27@gmail.com', '03794396841', 'Atención', '1749991475_4cb8bcfe9f9c3e28824f.pdf', '2025-06-15 15:44:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones_detalle`
--

CREATE TABLE `transacciones_detalle` (
  `id` int(11) NOT NULL,
  `transaccion_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(12,2) NOT NULL,
  `subtotal` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `transacciones_detalle`
--

INSERT INTO `transacciones_detalle` (`id`, `transaccion_id`, `producto_id`, `cantidad`, `precio_unitario`, `subtotal`) VALUES
(1, 23, 4, 3, 30000000.00, 90000000.00),
(2, 24, 6, 1, 57000000.00, 57000000.00),
(3, 24, 2, 1, 25000000.00, 25000000.00),
(4, 25, 2, 3, 25000000.00, 75000000.00),
(5, 26, 3, 3, 27000000.00, 81000000.00),
(6, 26, 7, 1, 26000000.00, 26000000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones_maestro`
--

CREATE TABLE `transacciones_maestro` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha en zona horaria Argentina',
  `estado` enum('pendiente','completada','cancelada') NOT NULL DEFAULT 'pendiente',
  `total` decimal(12,2) NOT NULL,
  `metodo_pago` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `transacciones_maestro`
--

INSERT INTO `transacciones_maestro` (`id`, `usuario_id`, `fecha_creacion`, `estado`, `total`, `metodo_pago`) VALUES
(23, 14, '2025-06-11 11:30:43', 'completada', 90000000.00, NULL),
(24, 15, '2025-06-11 18:09:40', 'completada', 82000000.00, NULL),
(25, 14, '2025-06-11 19:06:34', 'completada', 75000000.00, NULL),
(26, 22, '2025-06-17 03:33:16', 'completada', 107000000.00, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `identificador` int(2) NOT NULL,
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `dni` varchar(20) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` tinyint(1) DEFAULT 1,
  `oficio` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`identificador`, `id`, `nombre`, `apellido`, `email`, `telefono`, `dni`, `fecha_nacimiento`, `password`, `created_at`, `updated_at`, `estado`, `oficio`) VALUES
(0, 1, 'Raúl', 'Gómez', 'alfa@hotmail.com', '1145678901', '30123456', '1980-05-15', '$2y$10$cf2.a09FrwNv/TfAw87/Q.7okToPBk69pES6HLWYZo/Claz4rQY8m', '2025-05-14 19:30:20', '2025-06-17 00:25:35', 1, NULL),
(0, 3, 'Carlos', 'Pérez', 'che@outlook.es', '1156789012', '28456789', '1985-08-22', '$2y$10$MSxFnv/A3kPAS1NztLCkYOGvkuby3Z/jYCPZUh4QtsfIPe.IGus1a', '2025-05-16 21:03:59', '2025-06-17 00:25:35', 1, 'tecnico nautico'),
(0, 4, 'Ana', 'Rodríguez', 'cronos@hotmail.com', '1167890123', '32567890', '1990-03-10', '$2y$10$MTEuH1y4bFCOGvkyxg1q8.eB9bUubYFmWFG6pM/w79BiauAvhq3e.', '2025-05-16 21:04:40', '2025-06-17 00:25:35', 1, NULL),
(0, 13, 'Federico', 'Gerber', 'federicoaugustogerber27@gmail.com', '1178901234', '40123456', '1995-11-27', '$2y$10$gbe8dk581E.ykFHefaIvpO0mqKd.eNnXLOG2SdcppvIFF0W5mDiVO', '2025-05-23 17:57:35', '2025-06-17 00:25:35', 1, NULL),
(1, 14, 'Lautaro', 'Larroza', '12345@outlook.es', '1189012345', '37456789', '1988-07-14', '$2y$10$wwOo0fownndhL1DBldc.dutatC6v8G55qpSpMCS2dDCDWioJ8JBnW', '2025-05-23 17:59:59', '2025-06-17 00:26:45', 1, 'Técnico en epidemiologia naval'),
(0, 15, 'Natalia', 'Vallejos', '145@outlook.es', '1190123456', '36567890', '1992-09-19', '$2y$10$LWWqWDIW7XZ4whl8rg0ffOSLXyXkqh63W6eNy1iTcMLExDLD26wmS', '2025-05-23 18:51:16', '2025-06-17 00:25:35', 1, 'consultor tecnico nuclear '),
(1, 16, 'Juan', 'García', 'yo@outlook.es', '1101234567', '41123456', '1983-12-05', '$2y$10$jI1.XrpLDF2mG7kUwIYM/e9OPcFFguCmrE85rl6Ltipy9f0PsEWlS', '2025-06-03 12:49:57', '2025-06-17 00:25:35', 1, NULL),
(0, 17, 'Lucía', 'Fernández', 'prueba@outlook.es', '1112345678', '39456789', '1998-04-30', '$2y$10$LXwmFew.GJJzacW9TFdwX.vZyPR/1ReOB9Ir0BzaTXwy5ZTCd9Tum', '2025-06-04 18:51:21', '2025-06-17 00:25:35', 1, NULL),
(0, 19, 'Martín', 'Díaz', 'prueba1234@outlook.es', '1123456789', '40567890', '1987-01-25', '$2y$10$0xaRQQJaeEkCpXE6UxgxU.eNhGoAP9KxKUaCog7iS8/nZmo9HDzH2', '2025-06-04 18:56:07', '2025-06-17 00:25:35', 1, NULL),
(0, 20, 'Roberto', 'López', 'lopez@outlook.es', '1134567890', '42123456', '1993-06-18', '$2y$10$avrosE/xoPt6CjxS16LZDuuhqzI0SX1s7MwfG2lx443YrG24.Mle6', '2025-06-04 18:58:56', '2025-06-17 00:25:35', 1, NULL),
(0, 21, 'Diego', 'López', 'lopez55@outlook.es', '1145678901', '43456789', '1996-02-11', '$2y$10$janqbzYFlPHztbav4lhkRez2ZrjCF/v8iiHCwwzwnt0TBCW27D4HK', '2025-06-04 19:07:13', '2025-06-17 00:25:35', 1, NULL),
(0, 22, 'Federico Augusto', 'Gerber', 'gerber@outlook.es', '1156789012', '41807754', '1999-05-03', '$2y$10$dx4yireOVGih95v6NBoEKulAvoLGuYIUwcfDdfEIURZGczf8Ai7MC', '2025-06-11 18:14:37', '2025-06-17 00:30:01', 1, 'Mecanico Nucleologo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agenda_servicio`
--
ALTER TABLE `agenda_servicio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cita_clientes`
--
ALTER TABLE `cita_clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `vehiculo_id` (`vehiculo_id`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `experiencia_usuarios`
--
ALTER TABLE `experiencia_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_productos_marcas` (`marca_id`);

--
-- Indices de la tabla `trabaja_con_nosotros`
--
ALTER TABLE `trabaja_con_nosotros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `transacciones_detalle`
--
ALTER TABLE `transacciones_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaccion_id` (`transaccion_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `transacciones_maestro`
--
ALTER TABLE `transacciones_maestro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agenda_servicio`
--
ALTER TABLE `agenda_servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cita_clientes`
--
ALTER TABLE `cita_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `experiencia_usuarios`
--
ALTER TABLE `experiencia_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `trabaja_con_nosotros`
--
ALTER TABLE `trabaja_con_nosotros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `transacciones_detalle`
--
ALTER TABLE `transacciones_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `transacciones_maestro`
--
ALTER TABLE `transacciones_maestro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_marcas` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`);

--
-- Filtros para la tabla `transacciones_detalle`
--
ALTER TABLE `transacciones_detalle`
  ADD CONSTRAINT `transacciones_detalle_ibfk_1` FOREIGN KEY (`transaccion_id`) REFERENCES `transacciones_maestro` (`id`),
  ADD CONSTRAINT `transacciones_detalle_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
