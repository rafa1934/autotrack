-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/06/2026 às 19:08
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `autotrack`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `ordens_servico`
--

CREATE TABLE `ordens_servico` (
  `id` int(11) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `defeito` text NOT NULL,
  `valor_pecas` decimal(10,2) NOT NULL,
  `valor_mao_obra` decimal(10,2) NOT NULL,
  `status` enum('Pendente','Aprovada','Reprovada') DEFAULT 'Pendente',
  `usuario_id` int(11) DEFAULT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `observacao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ordens_servico`
--

INSERT INTO `ordens_servico` (`id`, `placa`, `defeito`, `valor_pecas`, `valor_mao_obra`, `status`, `usuario_id`, `data_criacao`, `observacao`) VALUES
(1, 'ixp1234', 'troca de embreagem', 850.00, 400.00, 'Aprovada', 2, '2026-06-13 00:54:14', NULL),
(2, 'abc1234', 'troca dos amortecedores', 650.00, 200.00, 'Aprovada', 1, '2026-06-13 01:03:25', NULL),
(3, 'abc1234', 'troca dos amortecedores', 650.00, 200.00, 'Aprovada', 1, '2026-06-13 01:03:38', NULL),
(4, 'xbf3497', 'Troca dos freios dianteiros', 750.00, 290.00, 'Aprovada', 1, '2026-06-13 01:36:02', 'Aprovada parcialmente. Mão de obra ajustada para R$ 290,00      '),
(5, 'TEP-6A89', 'Troca do coletor de admissão', 508.00, 250.00, 'Aprovada', 1, '2026-06-13 03:18:42', 'Serviço dentro dos valores de mercado. Alterado valor da peça          '),
(6, 'efg-7681', 'Troca das velas', 120.00, 50.00, 'Reprovada', 1, '2026-06-13 03:32:41', '        '),
(7, 'FET-8L84', 'Troca dos 4 pneus', 1850.00, 400.00, 'Pendente', 1, '2026-06-13 03:55:24', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` enum('oficina','gestor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `tipo`) VALUES
(1, 'Oficina Teste', 'oficina@email.com', '123456', 'oficina'),
(2, 'Gestor Teste', 'gestor@email.com', '123456', 'gestor');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `ordens_servico`
--
ALTER TABLE `ordens_servico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `ordens_servico`
--
ALTER TABLE `ordens_servico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `ordens_servico`
--
ALTER TABLE `ordens_servico`
  ADD CONSTRAINT `ordens_servico_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
