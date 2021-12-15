-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 15/12/2021 às 14:35
-- Versão do servidor: 10.4.18-MariaDB
-- Versão do PHP: 7.4.18

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
-- Estrutura para tabela `reviews`
--

CREATE TABLE `reviews` (
  `id_reviews` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_work` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `service`
--

CREATE TABLE `service` (
  `id_service` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_work` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `token` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `telefone`, `password`, `token`) VALUES
(12, 'Ana', 'itaj@discente.ifpe.edu.br', '81975483412', '$2y$10$HqA4UK1A6zfPGeWL2tPDxO8e4wrhX2fJGOfia1CZrnHS8aLT5svy.', '45956b14c6f4d7e40c14c8f758dbcc21f44e22f0223bd776fccbc36c8e439d7ae2573b5aacbaf30ee3f2d896523d6a236f34'),
(13, 'Maria', 'mari@gmil.com', '81975483412', '$2y$10$wUcizmx1XraaNF3PQ6seAOrzqwY0CEFErGkzljIqLELSb8Db1Xx5O', 'f24ad2e3b410409003ed3189db34440ad124271d0b232078a739f50a8d410d98ccedf023d338fc3e3234a0422458f9c86c1e'),
(14, 'Ana', 'user2@teste.com.br', NULL, '$2y$10$GMsQGMA79qq/Qi7WbmbaiuydhBAOTX6phxdRL4naKDcZ/joXPs.kW', 'a621a59a09534d08bb1d331f0423154ef11da45938a269014ee1315ec263fff3b42658a126d7abaf133f6c19dcd9f9441cfa'),
(15, 'Felipe', 'felipe@gmail.com', '99999999', '$2y$10$UYRWk5TpfN9ZjsaEEQHdxuseVc9Xazl2wnip/4lmzUmOqBwp3Mxe2', '93b8432be2378e5e83dbe660ad40e87968d1ea2789644c5428ceda4030e8bc700204a4e662331605a780f2586a895486f787'),
(16, 'ivan', 'ivan@teste.com.br', '777777777', '$2y$10$5aVXot6gQkcIbEhPuQLiZOwUH8U/IhCkBxGMa71PxIG.JQuDJdNzq', '661450ed418e7fac4596837783021e68f6b85445f71e9b4cc61f0a2556ec12f4afe82886bda75bbb4065698faab281dac705'),
(17, 'Ana', 'teste@gmail.com', '99999999', '$2y$10$nnqmjNbNQv.hkXv.Wl/kyuFaJzJfNi0GVtfJONnAscqiZZ5uOc16C', '7afa147e782bbf9322c068c99c9e50f2f7672fea8e32ead3f25e4de1e1b8dc781f9033a2fd7b14229ba1ae2bc665a0d7c30f'),
(18, 'Paulo', 'p@gmail.com', '222222222', '$2y$10$7DR6uPGXO6F1Imma5vs5mewdoDTWWEqDDABcIfkNUs2fMAj6C2pTK', 'a2888431fc8a1c035b1fcc2b62be7bde88c9a12bf0c52a670de57e6fd20e589096ab60301f17533d08bbf354214f1b83f1f9'),
(19, 'José', 'jose@teste.com.br', '99999999', '$2y$10$SUwqfCrbCdILaKlgAZIu2.mOtwYsO.pJGOAEbqyPMPs.PFzIdVCLS', '4d14bcffc1771b383072e040bb1ddca823d4b13967b9f4683e71a078e544b6a8a6b06765a91543a7ffd564fae67736f7d818'),
(20, 'Joao', 'joao@teste.com.br', '884757374', '$2y$10$pgG7k58XGwCwaZl716xHnO7ATj5Abrv.7JA.xi38yLbKpcODlqxKm', '4bdacb803eb2d4ea595865b476bdb5c7a989d4b174ef40fbcee457e2f0569cdbbc8d6932ff1aebb132cf6bc29d4f6c3c4fa6'),
(21, 'Pedro', 'pedro@gmail.com', '4444444', '$2y$10$LMs2PaB.57G/kcunqUwV3OMx/1OP7QftHPq5cjPbymJwavi4zG/Lm', '3b34893424a7f67cf9fa7e07f3573d69f33fd7a0ce5ef3d94f0346227e01652073d776236bff79170cbb1f6614514fac2109'),
(22, 'Maria', 'junioracioli@outlook.com', '99999999', '$2y$10$3jBorzzzZ1jB4zE8EEzgJuGoeqlSh/RgNFmON7bV4ZzAx5UKjQHkS', '416e608b8d78185810ca2e79b8b7784337433b83ef5364eba1cc450b6d58ca2242ff8b0922b8277963e978b7daf7a31cfc89'),
(23, 'Tina', 'tina@gmail.com', '9157658685', '$2y$10$xLLRDGWu92FkWR8EyeYR0.HEeh2hq2KyZ./ZHUYaK3HCrraDz6Key', 'b316e4a08c57459a106f7e55580a105605ce214dbc57dc779b09d6bd3aa3c72e51d40ed85fa0d6eaa7bb998f5dbe3280ae8a'),
(24, 'Joao', 'email123@teste.com', '99999999', '$2y$10$Okdd7Oj4Qp0zpiTi4UPlV.bAFB8XteSCcPmVd0Wyf3h.epiK/Wcf.', '149ae376868620947c7aaa5b17b60d3afdac9159ff68698b1dd79a9cf4cd740a81eb306ecc3783a77a0f1cae3d65ae0d71be'),
(25, 'Marta', 'm@gmail.com', '12345678', '$2y$10$bKWNMxdNoUKUSUoeMylfAePxm7LLNfyql67TMWuAyMCpDAT6wcg9i', 'f759a4c7e3c91d925d36e410949fbfbe573bba961fe22d9e82b5fc855b131fe8604394a5ecbf77d5e6ebe62da725c8364df5'),
(26, 'Leandro Pereira', 'qwe@gmail.com', '222222222', '$2y$10$o4a3w3cFUCTLU8xjTcRxd.bhe6eYYDxy1CDVHA/nyq69WgPwWq61u', 'd5d544e9b65f6a47203a71b21e18f7aed997abf98b89376f3abb7b00294f49592b862656c2a643fdab403b1fdea4f208a720');

-- --------------------------------------------------------

--
-- Estrutura para tabela `worker`
--

CREATE TABLE `worker` (
  `id_work` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `service` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `worker`
--

INSERT INTO `worker` (`id_work`, `name`, `email`, `telefone`, `password`, `cidade`, `service`, `description`, `image`) VALUES
(15, 'Carlos', 'ca@gmail.com', '99999999', '$2y$10$CQIaxFgWWA5cwzhkN5hnAenenyP/3BjCxx26X6RXGy9lmkzbzvHYq', 'Igarassu', 'Mecanico', NULL, NULL),
(16, 'Bruna', 'bruna@gmail.com', '9157658685', '$2y$10$wzzit/7seRXMS5LeCt6fO.YnfpzA8jFFoxoltV0NJakBpBA3HaRlW', 'Recife', 'Pedreiro', NULL, NULL),
(25, 'sfgh', 'as@gmail.com', '9157658685', '$2y$10$1fYxn71I4CyLHmTnmkJqSe0d10ZEdWGFbWMQYRzIRo5jUxZAv38Dy', 'Igarassu', 'Mecanico', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', NULL),
(26, 'ssss', 's@gmail.com', '99999999', '$2y$10$OBL0YZNj5hM23G7jvvFWSeqE.onNNP0hU880fhHqPW2nPV05UAEoK', NULL, NULL, NULL, NULL),
(27, 'tfvd', 'qwe@gmail.com', '9157658685', '$2y$10$9ym4A8pw5y/V2nFjdmZL3.Z9VhR6CQMEhzYDAZBcJZ4NkxWqYoPgm', '', '', NULL, 'eb42708af6a7294f2927653a0034bceff119a9bf286ac2236593d0b02720d5704fe1bf057502fbd4a4b1aa97e5dc1779ed8852fe7ad003ddb319c26f2e6a7067'),
(29, 'Lucia', 'lucia@gmail.com', '81954863848', '123', 'Itamaraca', 'Pintor', 'ssssssssssssssssssssssssssssssssssssssssssss', NULL),
(30, 'Fulalo de tal', 'asd@gmail.com', '9157658685', '123', NULL, NULL, NULL, NULL),
(31, 'Julia', 'junioracioli@outlook.com', '9157658685', '123', NULL, NULL, NULL, NULL),
(32, 'Carlos', 'asdf@gmail.com', '9157658685', '123', NULL, NULL, NULL, NULL),
(33, 'Carlos', 'asdfe@gmail.com', '9157658685', '123', NULL, NULL, NULL, NULL),
(34, 'Ana Maria', 'ana@gmail.com', '99999999', '123', NULL, NULL, NULL, NULL),
(35, 'Lucas', 'lucas@gmail.com', '9157658685', '123', NULL, NULL, NULL, NULL),
(36, 'Paulo', 'p@gmail.com', '9157658685', '123', NULL, NULL, NULL, NULL),
(37, 'Mateus', 'ma@gmail.com', '9157658685', '123', NULL, NULL, NULL, NULL),
(38, 'juju', 'juju@gmail.com', '9157658685', '123', NULL, NULL, NULL, NULL),
(39, 'Ivan', 'user@teste.com.br', '9157658685', '123', NULL, NULL, NULL, NULL),
(40, 'asfrg', 'itaj@discente.ifpe.edu.br', '9157658685', '123', NULL, NULL, NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id_reviews`),
  ADD KEY `userev_fk` (`id_user`),
  ADD KEY `workrev_fk` (`id_work`);

--
-- Índices de tabela `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`),
  ADD KEY `user_fk` (`id_user`),
  ADD KEY `worker_fk` (`id_work`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Índices de tabela `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`id_work`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id_reviews` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `service`
--
ALTER TABLE `service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `worker`
--
ALTER TABLE `worker`
  MODIFY `id_work` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `userev_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `workrev_fk` FOREIGN KEY (`id_work`) REFERENCES `worker` (`id_work`);

--
-- Restrições para tabelas `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `worker_fk` FOREIGN KEY (`id_work`) REFERENCES `worker` (`id_work`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
