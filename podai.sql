-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/10/2026 às 13:14
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `podai`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `pontuacao` int(11) DEFAULT NULL,
  `classificacao_risco` varchar(30) DEFAULT NULL,
  `sintomas` text DEFAULT NULL,
  `observacoes` text DEFAULT NULL,
  `data_consulta` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `id_pergunta` int(11) NOT NULL,
  `texto_antes` varchar(255) DEFAULT NULL,
  `texto_depois` varchar(255) DEFAULT NULL,
  `resposta_correta` varchar(255) DEFAULT NULL,
  `dica` varchar(255) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `perguntas`
--

INSERT INTO `perguntas` (`id_pergunta`, `texto_antes`, `texto_depois`, `resposta_correta`, `dica`, `categoria`) VALUES
(1, 'O sistema de recompensa do cérebro libera', ', que gera uma sensação de prazer imediato.', 'dopamina', 'É o neurotransmissor do prazer.', 'dq'),
(2, 'A', 'acontece quando o corpo precisa de doses maiores para sentir o mesmo efeito.', 'tolerancia', 'Começa com a letra T.', 'dq'),
(3, 'Quando o usuário interrompe o uso, ele pode sofrer crises de', '.', 'abstinencia', 'Sintomas físicos e mentais pela falta da droga.', 'dq'),
(4, 'O uso constante de substâncias altera a comunicação entre os', 'no cérebro.', 'neuronios', 'São as células do sistema nervoso.', 'dq'),
(5, 'A', 'é uma lesão pulmonar grave causada pelas substâncias químicas dos vapes.', 'evali', 'Sigla em inglês para doença do vape.', 'pr'),
(6, 'A falta de fôlego ao fazer esforço físico é um sinal de que a capacidade', 'está reduzida.', 'pulmonar', 'Relativo aos pulmões', 'pr'),
(7, 'Além do pulmão, a fumaça do cigarro causa inflamação na', ', gerando rouquidão.', 'garganta', 'Fica logo acima da traqueia.', 'pr'),
(8, 'O termo correto para o que sai do cigarro eletrônico não é vapor, mas sim um', 'que contém metais pesados.', 'aerossol', 'É o mesmo formato de dispersão de um desodorante spray e começa com A', 'ce'),
(9, 'Alguns modelos de quarta geração (PODs) entregam uma carga de', 'muito mais alta e rápida do que o cigarro comum.', 'nicotina', 'É a substância química que \"engana\" o cérebro e causa a dependência.', 'ce'),
(10, 'O componente que dá o cheirinho doce e atrai jovens são os', 'que escondem os perigos químicos.', 'aromatizantes', 'Também chamados de essências ou sabores.', 'ce');

-- --------------------------------------------------------

--
-- Estrutura para tabela `respostas_chatbot`
--

CREATE TABLE `respostas_chatbot` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `pergunta` text DEFAULT NULL,
  `resposta` text DEFAULT NULL,
  `pontos` int(11) DEFAULT NULL,
  `data_resposta` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `resultado`
--

CREATE TABLE `resultado` (
  `id_resultado` int(11) NOT NULL,
  `id_pergunta` int(11) NOT NULL,
  `resposta_usuario` varchar(255) DEFAULT NULL,
  `acertou` tinyint(1) DEFAULT 0,
  `data_hora` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `resultado`
--

INSERT INTO `resultado` (`id_resultado`, `id_pergunta`, `resposta_usuario`, `acertou`, `data_hora`) VALUES
(1, 8, 'aerossol', 1, NULL),
(2, 9, 'nicotina', 1, NULL),
(3, 10, 'aromatizantes', 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `tipo_usuario` enum('paciente','profissional') NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `cpf`, `nome`, `email`, `senha`, `telefone`, `cidade`, `estado`, `data_nascimento`, `tipo_usuario`, `data_cadastro`) VALUES
(1, '12345678900', 'Gabriel Oliveira', 'teste@teste.com', '123456', NULL, NULL, NULL, NULL, 'profissional', '2026-06-11 12:52:35'),
(2, '568.203.278-03', 'Gabriel Nascimento De Oliveira', 'gabrielndo242@gmail.com', '$2y$10$8FTVaUG.S5oETUuPtKrjlui0vwz2vU8LooShEuV6agVjnKPvCYAGW', '19992216360', 'Campinas', 'SP', '2008-09-10', 'paciente', '2026-06-11 13:16:21'),
(4, '651.684.789.23', 'Mirella Maria Rosa', 'mirozas@gmail.com', '$2y$10$cddltqR.OlVKmNm9g7NCs.1OqVW7WSNr6LOeIZV5galx0FB2cIR4q', '19665517832', 'Campinas', 'SP', '2008-12-11', 'profissional', '2026-06-11 13:26:59'),
(5, '222.222.222.22', 'Carlos Vitor', 'carlos@gmail.com', '$2y$10$Gw1Rwn8OXcWkfAHSevCgE.Q9z8A5PjbOYSSTLz8foqsFfpIKLF8gK', '19997456398', 'Campinas', 'SP', '2003-02-12', 'paciente', '2026-06-11 13:44:59');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`id_pergunta`);

--
-- Índices de tabela `respostas_chatbot`
--
ALTER TABLE `respostas_chatbot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `resultado`
--
ALTER TABLE `resultado`
  ADD PRIMARY KEY (`id_resultado`);

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
-- AUTO_INCREMENT de tabela `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `id_pergunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `respostas_chatbot`
--
ALTER TABLE `respostas_chatbot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `resultado`
--
ALTER TABLE `resultado`
  MODIFY `id_resultado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `consultas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `respostas_chatbot`
--
ALTER TABLE `respostas_chatbot`
  ADD CONSTRAINT `respostas_chatbot_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
