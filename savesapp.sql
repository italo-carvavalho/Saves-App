-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Jan-2022 às 21:07
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `savesapp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `reviews`
--

CREATE TABLE `reviews` (
  `id_reviews` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `schedule`
--

CREATE TABLE `schedule` (
  `id_schedule` int(11) NOT NULL,
  `date_hour` datetime NOT NULL DEFAULT current_timestamp(),
  `situation` varchar(50) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_services` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `services`
--

CREATE TABLE `services` (
  `id_services` int(11) NOT NULL,
  `name_services` varchar(100) NOT NULL,
  `description` int(11) DEFAULT NULL,
  `fk_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `type_user` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `phone`, `password`, `city`, `type_user`) VALUES
(12, 'Ana', 'itaj@discente.ifpe.edu.br', '81975483412', '$2y$10$HqA4UK1A6zfPGeWL2tPDxO8e4wrhX2fJGOfia1CZrnHS8aLT5svy.', NULL, ''),
(13, 'Maria', 'mari@gmil.com', '81975483412', '$2y$10$wUcizmx1XraaNF3PQ6seAOrzqwY0CEFErGkzljIqLELSb8Db1Xx5O', NULL, ''),
(14, 'Ana', 'user2@teste.com.br', NULL, '$2y$10$GMsQGMA79qq/Qi7WbmbaiuydhBAOTX6phxdRL4naKDcZ/joXPs.kW', NULL, ''),
(15, 'Felipe', 'felipe@gmail.com', '99999999', '$2y$10$UYRWk5TpfN9ZjsaEEQHdxuseVc9Xazl2wnip/4lmzUmOqBwp3Mxe2', NULL, ''),
(16, 'ivan', 'ivan@teste.com.br', '777777777', '$2y$10$5aVXot6gQkcIbEhPuQLiZOwUH8U/IhCkBxGMa71PxIG.JQuDJdNzq', NULL, ''),
(17, 'Ana', 'teste@gmail.com', '99999999', '$2y$10$nnqmjNbNQv.hkXv.Wl/kyuFaJzJfNi0GVtfJONnAscqiZZ5uOc16C', NULL, ''),
(18, 'Paulo', 'p@gmail.com', '222222222', '$2y$10$7DR6uPGXO6F1Imma5vs5mewdoDTWWEqDDABcIfkNUs2fMAj6C2pTK', NULL, ''),
(19, 'José', 'jose@teste.com.br', '99999999', '$2y$10$SUwqfCrbCdILaKlgAZIu2.mOtwYsO.pJGOAEbqyPMPs.PFzIdVCLS', NULL, ''),
(20, 'Joao', 'joao@teste.com.br', '884757374', '$2y$10$pgG7k58XGwCwaZl716xHnO7ATj5Abrv.7JA.xi38yLbKpcODlqxKm', NULL, ''),
(21, 'Pedro', 'pedro@gmail.com', '4444444', '$2y$10$LMs2PaB.57G/kcunqUwV3OMx/1OP7QftHPq5cjPbymJwavi4zG/Lm', NULL, ''),
(22, 'Maria', 'junioracioli@outlook.com', '99999999', '$2y$10$3jBorzzzZ1jB4zE8EEzgJuGoeqlSh/RgNFmON7bV4ZzAx5UKjQHkS', NULL, ''),
(23, 'Tina', 'tina@gmail.com', '9157658685', '$2y$10$xLLRDGWu92FkWR8EyeYR0.HEeh2hq2KyZ./ZHUYaK3HCrraDz6Key', NULL, ''),
(24, 'Joao', 'email123@teste.com', '99999999', '$2y$10$Okdd7Oj4Qp0zpiTi4UPlV.bAFB8XteSCcPmVd0Wyf3h.epiK/Wcf.', NULL, ''),
(25, 'Marta', 'm@gmail.com', '12345678', '$2y$10$bKWNMxdNoUKUSUoeMylfAePxm7LLNfyql67TMWuAyMCpDAT6wcg9i', NULL, ''),
(26, 'Leandro', 'qwe@gmail.com', '222222222', '123', NULL, '0'),
(27, 'Ivan', 'junioracioli321@outlook.com', '123456', '123', NULL, '1');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id_reviews`),
  ADD KEY `user_review` (`id_user`);

--
-- Índices para tabela `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id_schedule`),
  ADD KEY `user_service` (`id_client`),
  ADD KEY `agenda_servico` (`id_services`);

--
-- Índices para tabela `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id_services`),
  ADD KEY `user_servico` (`fk_id_user`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id_reviews` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id_schedule` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `services`
--
ALTER TABLE `services`
  MODIFY `id_services` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `user_review` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Limitadores para a tabela `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `agenda_servico` FOREIGN KEY (`id_services`) REFERENCES `services` (`id_services`),
  ADD CONSTRAINT `user_service` FOREIGN KEY (`id_client`) REFERENCES `users` (`id_user`);

--
-- Limitadores para a tabela `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `user_servico` FOREIGN KEY (`fk_id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
