-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Maio-2022 às 00:52
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gamerspace`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(4, 'Mario'),
(6, 'Star Wars'),
(7, 'Harry Potter'),
(8, 'Mortal Kombat X'),
(9, 'Kimetsu no Yaiba');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoriaproduto`
--

CREATE TABLE `categoriaproduto` (
  `id` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoriaproduto`
--

INSERT INTO `categoriaproduto` (`id`, `categoria`, `produto`) VALUES
(28, 4, 25),
(30, 7, 27),
(33, 8, 28),
(34, 6, 29),
(35, 6, 30),
(39, 9, 32),
(44, 9, 31),
(45, 9, 37),
(46, 6, 26);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `tipo` varchar(250) NOT NULL,
  `sistema` varchar(250) DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` float NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `descricao`, `tipo`, `sistema`, `quantidade`, `preco`, `url`) VALUES
(25, 'Mochila do Mario', 'Mochila do Mario', 'Mochila', '', 5, 100, 'https://m.media-amazon.com/images/I/71iduL2aRxL._AC_SL1200_.jpg'),
(26, 'Chaveiro do Darth Vader', 'Chaveiro do Darth Vader', 'Chaveiro', '', 6, 30, 'https://cf.shopee.com.br/file/a6c9b43c41c3459bf03e80987d7da411'),
(27, 'Funko Pop Harry Potter', 'Funko Pop Harry Potter', 'Funko Pop', '', 20, 120, 'https://m.media-amazon.com/images/I/71uB+MdyXIL._AC_SL1140_.jpg'),
(28, 'Mortal Kombat X', 'Mortal Kombat X', 'Jogo', 'PC', 12, 71.5, 'https://images.kabum.com.br/produtos/fotos/140571/mortal-kombat-x_1611085744790_g.jpg'),
(29, 'Lego Star Wars: The Skywalker Saga', 'Lego Star Wars: The Skywalker Saga', 'Jogo', 'XBOX', 13, 179.34, 'https://cdn1.epicgames.com/offer/9c59efaabb6a48f19b3485d5d9416032/EGS_LEGOStarWarsTheSkywalkerSaga_TTGames_S2_1200x1600-fba27b1ae598e355c3ad42d04d9025ba'),
(30, 'Almofada do Yoda', 'Almofada do Yoda', 'Almofada', '', 40, 68.9, 'https://m.media-amazon.com/images/I/517f-QmaSiL._AC_SL1024_.jpg'),
(31, 'Kimetsu no Yaiba Manga 1', 'Kimetsu no Yaiba Manga 1', 'Mangá', '', 18, 27.3, 'https://images-na.ssl-images-amazon.com/images/I/51W6wPKu6JL._SX337_BO1,204,203,200_.jpg'),
(32, 'Kimetsu no Yaiba Manga 2', 'Kimetsu no Yaiba Manga 2', 'Mangá', '', 14, 27.3, 'https://sucodemanga.com.br/wp-content/uploads/2021/02/demon-slayer-coloring-book-1.jpg'),
(37, 'Kimetsu no Yaiba Manga 3', 'Kimetsu no Yaiba Manga 3', 'Mangá', '', 10, 28, 'https://www.animesxis.com.br/wp-content/uploads/2020/02/Demon-Slayer-Kimetsu-No-Yaiba-capa.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `cpf` bigint(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `nome` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cpf`, `email`, `nome`) VALUES
(123456789, 'adriele@adriele', 'Adriele Colossi'),
(789456123, 'sabrina.rf2003@gmail.com', 'Sabrina Ramos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarioproduto`
--

CREATE TABLE `usuarioproduto` (
  `usuario` bigint(11) NOT NULL,
  `produto` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarioproduto`
--

INSERT INTO `usuarioproduto` (`usuario`, `produto`, `id`) VALUES
(123456789, 26, 43),
(123456789, 26, 44),
(123456789, 26, 45),
(123456789, 29, 55);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `categoriaproduto`
--
ALTER TABLE `categoriaproduto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria` (`categoria`),
  ADD KEY `produto` (`produto`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices para tabela `usuarioproduto`
--
ALTER TABLE `usuarioproduto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produto` (`produto`),
  ADD KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `categoriaproduto`
--
ALTER TABLE `categoriaproduto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `usuarioproduto`
--
ALTER TABLE `usuarioproduto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `categoriaproduto`
--
ALTER TABLE `categoriaproduto`
  ADD CONSTRAINT `categoriaproduto_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `categoriaproduto_ibfk_2` FOREIGN KEY (`produto`) REFERENCES `produto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
