-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Fev-2021 às 20:24
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sitedsw`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `area_conhecimento`
--

CREATE TABLE `area_conhecimento` (
  `nome` varchar(40) COLLATE utf8_bin NOT NULL,
  `idADM_cadastrou` int(20) NOT NULL,
  `idADM_removeu` int(20) DEFAULT NULL,
  `dataCriacao` date NOT NULL,
  `dataRemocao` date DEFAULT NULL,
  `idArea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `artigo`
--

CREATE TABLE `artigo` (
  `id_user` int(11) NOT NULL,
  `id_artigo` int(11) NOT NULL,
  `title` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `DOI` varchar(50) COLLATE utf8_bin NOT NULL,
  `data_publicacao` date NOT NULL,
  `avaliacoes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `autores`
--

CREATE TABLE `autores` (
  `id_artigo` int(11) NOT NULL,
  `autor` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `forum`
--

CREATE TABLE `forum` (
  `id_forum` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `email_reg` int(11) NOT NULL,
  `titulo` varchar(50) COLLATE utf8_bin NOT NULL,
  `criador` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `positivas` int(11) NOT NULL,
  `negativas` int(11) NOT NULL,
  `motivoRemocao` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `dataRemocao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem_artigo`
--

CREATE TABLE `mensagem_artigo` (
  `id_artigo` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `conteudo` text COLLATE utf8_bin DEFAULT NULL,
  `avaliacoes` int(11) DEFAULT NULL,
  `datahora_publicacao` datetime NOT NULL,
  `motivoRemocao` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `dataRemocao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem_forum`
--

CREATE TABLE `mensagem_forum` (
  `id_forum` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `datahora_publicacao` datetime NOT NULL,
  `avaliacoes` int(11) DEFAULT NULL,
  `conteudo` text COLLATE utf8_bin DEFAULT NULL,
  `motivoRemocao` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `dataRemocao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `registrado`
--

CREATE TABLE `registrado` (
  `id_user` int(11) NOT NULL,
  `data_cadastro` date NOT NULL,
  `ultimo_acesso` date NOT NULL,
  `comentarios` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `pastas` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(40) COLLATE utf8_bin NOT NULL,
  `historico` varchar(100) COLLATE utf8_bin NOT NULL,
  `nickname` varchar(20) COLLATE utf8_bin NOT NULL,
  `senha` varchar(40) COLLATE utf8_bin NOT NULL,
  `prof_pic` varchar(50) COLLATE utf8_bin NOT NULL,
  `nivel` int(11) NOT NULL,
  `is_adm` binary(1) NOT NULL,
  `data_adm` date DEFAULT NULL,
  `data_nasc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `area_conhecimento`
--
ALTER TABLE `area_conhecimento`
  ADD PRIMARY KEY (`idArea`),
  ADD KEY `idADM_cadastrou` (`idADM_cadastrou`),
  ADD KEY `idADM_removeu` (`idADM_removeu`);

--
-- Índices para tabela `artigo`
--
ALTER TABLE `artigo`
  ADD PRIMARY KEY (`id_artigo`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices para tabela `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id_artigo`,`autor`),
  ADD KEY `id_artigo` (`id_artigo`);

--
-- Índices para tabela `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id_forum`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices para tabela `mensagem_artigo`
--
ALTER TABLE `mensagem_artigo`
  ADD PRIMARY KEY (`id_artigo`,`id_user`,`datahora_publicacao`) USING BTREE,
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_artigo` (`id_artigo`);

--
-- Índices para tabela `mensagem_forum`
--
ALTER TABLE `mensagem_forum`
  ADD PRIMARY KEY (`id_forum`,`id_user`,`datahora_publicacao`) USING BTREE,
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_forum` (`id_forum`);

--
-- Índices para tabela `registrado`
--
ALTER TABLE `registrado`
  ADD PRIMARY KEY (`id_user`) USING BTREE;

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `area_conhecimento`
--
ALTER TABLE `area_conhecimento`
  MODIFY `idArea` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `artigo`
--
ALTER TABLE `artigo`
  MODIFY `id_artigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `forum`
--
ALTER TABLE `forum`
  MODIFY `id_forum` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `registrado`
--
ALTER TABLE `registrado`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `area_conhecimento`
--
ALTER TABLE `area_conhecimento`
  ADD CONSTRAINT `area_conhecimento_ibfk_1` FOREIGN KEY (`idADM_cadastrou`) REFERENCES `registrado` (`id_user`),
  ADD CONSTRAINT `area_conhecimento_ibfk_2` FOREIGN KEY (`idADM_removeu`) REFERENCES `registrado` (`id_user`);

--
-- Limitadores para a tabela `artigo`
--
ALTER TABLE `artigo`
  ADD CONSTRAINT `artigo_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `registrado` (`id_user`);

--
-- Limitadores para a tabela `autores`
--
ALTER TABLE `autores`
  ADD CONSTRAINT `autores_ibfk_1` FOREIGN KEY (`id_artigo`) REFERENCES `artigo` (`id_artigo`);

--
-- Limitadores para a tabela `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `forum_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `registrado` (`id_user`);

--
-- Limitadores para a tabela `mensagem_artigo`
--
ALTER TABLE `mensagem_artigo`
  ADD CONSTRAINT `mensagem_artigo_ibfk_1` FOREIGN KEY (`id_artigo`) REFERENCES `artigo` (`id_artigo`),
  ADD CONSTRAINT `mensagem_artigo_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `registrado` (`id_user`);

--
-- Limitadores para a tabela `mensagem_forum`
--
ALTER TABLE `mensagem_forum`
  ADD CONSTRAINT `mensagem_forum_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `registrado` (`id_user`),
  ADD CONSTRAINT `mensagem_forum_ibfk_2` FOREIGN KEY (`id_forum`) REFERENCES `forum` (`id_forum`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
