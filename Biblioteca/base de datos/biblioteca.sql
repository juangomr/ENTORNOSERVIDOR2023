-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-02-2024 a las 18:28:02
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
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fechaPedido` date NOT NULL,
  `cantidad` int(9) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `idLibro` int(6) NOT NULL,
  `autor` varchar(200) NOT NULL,
  `editorial` varchar(200) NOT NULL,
  `genero` varchar(200) NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `precio` decimal(9,2) NOT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `descripcion` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`idLibro`, `autor`, `editorial`, `genero`, `fecha_publicacion`, `precio`, `imagen`, `descripcion`) VALUES
(363, 'Gabriel García Márquez', 'Alfaguara', 'Realismo mágico', '2022-01-02', 19.99, 'A1lNJP8sC6L._AC_UF894,1000_QL80_.jpg', 'Cien años de soledad'),
(364, 'George Orwell', 'Anagrama', 'Distopía', '2020-01-02', 16.99, '81StSOpmkjL._AC_UF1000,1000_QL80_.jpg', '1984'),
(365, 'Jane Austen', 'Ariel', 'Novela romántica', '2022-01-01', 13.99, 'orgullo_y_prejuicio.jpg', 'Orgullo y prejuicio'),
(366, 'J.R.R. Tolkien', 'Austral', 'Fantasía épica', '1992-01-02', 7.99, '_visd_0000JPG02Q3B.jpg', 'El señor de los anillos'),
(367, 'Harper Lee', 'Ediciones B', 'Ficción clásica', '1999-01-02', 9.99, '30919655837.jpg', 'Matar a un ruiseñor'),
(368, 'Jack Kerouac', 'Blackie Books', 'Generación Beat', '1988-01-02', 8.99, '814DLfqk2hL._AC_UF1000,1000_QL80_.jpg', 'En el camino'),
(369, 'Gabriel García Márquez', 'Siruela', 'Ficción latinoamericana', '1995-01-01', 19.99, '71q9eAPZnIL._AC_UF894,1000_QL80_.jpg', 'Crónica de una muerte '),
(370, 'J.K. Rowling', 'Ediciones Luminar', 'Fantasía juvenil', '1995-01-01', 19.99, '91R1AixEiLL._AC_UF894,1000_QL80_.jpg', 'Harry Potter y la piedra '),
(371, 'Miguel de Cervantes', 'Editorial Nova Letra', 'Novela satírica', '1995-01-01', 6.99, '16367420047732-removebg-preview.png', 'Don Quijote de la Mancha'),
(372, 'Julio Cortázar', 'Libros del Horizonte', 'Experimental', '1995-01-01', 15.99, '51rfw1t2F4L._SL500_.jpg', 'Rayuela'),
(373, 'F. Scott Fitzgerald', 'Páginas Doradas', 'Ficción modernista', '1995-01-01', 5.55, '61zzb6XgKKL._AC_UF1000_1000_QL80_-removebg-preview.png', 'El Gran Gatsby'),
(374, 'Fyodor Dostoevsky', 'Editorial Épica', 'Novela psicológica', '1995-01-01', 4.99, '61zzb6XgKKL._AC_UF1000_1000_QL80_-removebg-preview.png', 'Crimen y castigo'),
(375, 'Oscar Wilde', 'Letras Esmeralda', 'Novela gótica', '1995-01-01', 17.99, '42464-hypp15nz-libro-el-corazon-helado-almudena-grandes-5-removebg-preview.png', 'El retrato de Dorian Gray'),
(376, 'Leo Tolstoy', 'HarperCollins', 'Realismo', '1995-01-01', 16.99, '42464-hypp15nz-libro-el-corazon-helado-almudena-grandes-5-removebg-preview.png', 'Anna Karenina'),
(377, 'Suzanne Collins', 'Wiley', 'Ciencia ficción', '1995-01-01', 19.99, '81StSOpmkjL._AC_UF1000,1000_QL80_.jpg', 'Los juegos del hambre'),
(378, 'Dan Brown', 'Pearson', 'Thriller', '1995-01-01', 19.99, '81StSOpmkjL._AC_UF1000,1000_QL80_.jpg', 'El código Da Vinci'),
(379, 'Carlos Ruiz Zafón', 'Springer', 'Novela histórica', '1995-01-01', 5.99, '81StSOpmkjL._AC_UF1000,1000_QL80_.jpg', 'La sombra del viento'),
(380, 'Paulo Coelho', 'Routledge', 'Ficción filosófica', '1995-01-01', 8.99, '81StSOpmkjL._AC_UF1000,1000_QL80_.jpg', 'El alquimista'),
(381, 'Nawal El Saadawi', 'Elsevier', 'Feminismo', '1995-01-01', 7.99, '81StSOpmkjL._AC_UF1000,1000_QL80_.jpg', 'Mujer en punto cero'),
(382, 'Yuval Noah Harari', 'MIT Press', 'Divulgación histórica', '1995-01-01', 6.99, '81StSOpmkjL._AC_UF1000,1000_QL80_.jpg', 'Sapiens: De animales a dioses'),
(383, 'Umberto Eco', 'Palgrave Macmillan', 'Novela histórica', '1995-01-01', 12.99, '81StSOpmkjL._AC_UF1000,1000_QL80_.jpg', 'El nombre de la rosa'),
(384, 'Mary Shelley', 'Planeta', 'Novela gótica', '1995-01-01', 11.99, '81StSOpmkjL._AC_UF1000,1000_QL80_.jpg', 'Frankenstein'),
(385, 'Antoine de Saint-Exupéry', 'Espasa', 'Literatura infantil', '1995-01-01', 6.99, '81StSOpmkjL._AC_UF1000,1000_QL80_.jpg', 'El principito'),
(386, 'Aldous Huxley', 'Salamandra', 'Ciencia ficción distópica', '1995-01-01', 7.99, '81StSOpmkjL._AC_UF1000,1000_QL80_.jpg', 'Un mundo feliz'),
(387, 'Kurt Vonnegut', 'Salamandra', 'Ciencia ficción satírica', '1995-01-01', 19.99, '81StSOpmkjL._AC_UF1000,1000_QL80_.jpg', 'Matadero cinco'),
(388, 'J.R.R. Tolkien', 'Salamandra', 'Fantasía juvenil', '1995-01-01', 19.99, '81StSOpmkjL._AC_UF1000,1000_QL80_.jpg', 'El hobbit'),
(389, 'Doris Lessing', 'Editorial Juventud', 'Novela feminista', '1995-01-01', 19.99, '81StSOpmkjL._AC_UF1000,1000_QL80_.jpg', 'El cuaderno dorado'),
(390, 'José Saramago', 'Editorial Juventud', 'Ficción distópica', '1995-01-01', 7.99, '_visd_0000JPG02Q3B.jpg', 'Ensayo sobre la ceguera'),
(391, 'Patrick Süskind', 'Editorial Juventud', 'Novela histórica', '1995-01-01', 19.99, '_visd_0000JPG02Q3B.jpg', 'El perfume'),
(392, 'Margaret Atwood', 'Editorial Ariel', 'Ficción especulativa', '1995-01-01', 19.99, '_visd_0000JPG02Q3B.jpg', 'El cuento de la criada'),
(393, 'Homero', 'Editorial Ariel', 'Epopeya', '1995-01-01', 7.99, '_visd_0000JPG02Q3B.jpg', 'La Odisea'),
(394, 'Hermann Hesse', 'Editorial Ariel', 'Novela psicológica', '1995-01-01', 8.99, '_visd_0000JPG02Q3B.jpg', 'El lobo estepario'),
(395, 'Milan Kundera', 'Editorial Ariel', 'Ficción filosófica', '1995-01-01', 6.99, '_visd_0000JPG02Q3B.jpg', 'La insoportable levedad '),
(396, 'Erich Fromm', 'Editorial Ariel', 'Ensayo', '1995-01-01', 13.99, '_visd_0000JPG02Q3B.jpg', 'El arte de amar'),
(397, 'Anthony Burgess', 'Ediciones Grijalbo', 'Ficción distópica', '1995-01-01', 14.99, '_visd_0000JPG02Q3B.jpg', 'La naranja mecánica'),
(398, 'Mario Vargas Llosa', 'Ediciones Grijalbo', 'Novela militar', '1995-01-01', 15.99, '_visd_0000JPG02Q3B.jpg', 'La ciudad y los perros'),
(399, 'Thomas Harris', 'Ediciones Grijalbo', 'Thriller psicológico', '1995-01-01', 16.99, '_visd_0000JPG02Q3B.jpg', 'El silencio de los corderos'),
(400, 'Ernest Hemingway', 'Ediciones Grijalbo', 'Novela marina', '1995-01-01', 19.99, '_visd_0000JPG02Q3B.jpg', 'El viejo y el mar'),
(401, 'Franz Kafka', 'Editorial Milenio', 'Novela corta', '1995-01-01', 7.99, '_visd_0000JPG02Q3B.jpg', 'La metamorfosis'),
(402, 'Pablo Neruda', 'Editorial Milenio', '8', '1995-01-01', 8.00, '_visd_0000JPG02Q3B.jpg', 'Cien sonetos de amor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombreUsuario` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(25) NOT NULL,
  `fechaReg` date NOT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `idUsuario` int(6) NOT NULL,
  `tipoUsuario` set('Usuario','Admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombreUsuario`, `correo`, `password`, `fechaReg`, `direccion`, `idUsuario`, `tipoUsuario`) VALUES
('Juan', 'juangomr@gmail.com', 'c4c688ad65096da11d3ef7711', '2024-01-29', 'C/ clavel nº21', 25, 'Usuario'),
('anama', 'anamadelgado@gmail.com', 'c4ca4238a0b923820dcc509a6', '2024-01-29', 'clave', 26, 'Admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`idLibro`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `idLibro` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=403;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
