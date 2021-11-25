-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 25/11/2021 às 15:58
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
(24, 'Joao', 'email123@teste.com', '99999999', '$2y$10$Okdd7Oj4Qp0zpiTi4UPlV.bAFB8XteSCcPmVd0Wyf3h.epiK/Wcf.', '149ae376868620947c7aaa5b17b60d3afdac9159ff68698b1dd79a9cf4cd740a81eb306ecc3783a77a0f1cae3d65ae0d71be');

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
  `token` varchar(200) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `service` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `worker`
--

INSERT INTO `worker` (`id_work`, `name`, `email`, `telefone`, `password`, `token`, `cidade`, `service`, `description`, `image`) VALUES
(1, 'Pedro', 'pedro@gmail.com', '', '$2y$10$fg8EE5VkZP9Wav9ajSf1rez9xu8rfQzBkQjWt/663n0vPixkEAi0.', '70d5236c3446bea13ce6a189b682af87d13a70b2099464de27aa920c52809f876a5e2c46c6854c1649d1f26fe22edcd7adf8', 'Igarassu', 'Geceiro', NULL, NULL),
(2, 'Maria', 'junioracioli@outlook.com', '99999999', '$2y$10$ZQCOBIatAI6pn2M3ERWjr.IM/JjT637x/IXmTWZkaMS13etnn9Soi', '385c0ef3f6b04398b28832b67297d7232b4c6454d08c16b310ea1ed46528e824d1f3c4705d0193f9d0165847b9fc0f0cd320', 'Abreu e Lima', 'Mecanico', NULL, NULL),
(3, 'Flavio Ribeiro', 'flavio@outlook.com', '9157658685', '$2y$10$9Mz1wUCb768IBgInkoYPV.oViT.8wSiDpR09C/NnnQnOfQCsC.kiy', '4c26db2c2d53db079b3fe423a365545f04b6f9ea24d5e29279f32536b6080e949d9e8d0840d59c6757728bc63ad0f3bbc12c', 'Itamaraca', 'eletrecista', NULL, NULL),
(4, 'Maria', 'maria@gmail.com', '9157658685', '$2y$10$gzb3FdyAE6A3m.wT5HvaV.YSZ2fBqJcdWzum5GnnyIC44bwTeb9jq', 'ed50ad19463a43ae3b713db85acf78180088536c696fcb26ff1cc7f81e95e33f46057f6bda11469725fd94f814503d3e053d', 'Recife', 'Pintor', NULL, NULL),
(5, 'Cristiane Almeida', 'cris@teste.com.br', '21456789', '$2y$10$1thsjsoUCBI/ViiX5vcWhOyeyq0gyyWSh4vdgfb6.qPqlOlGANIFO', '060f7cd455aae8db4e9e7cf04fdf01017cc6280955ac86bec868deb330a8f88abc1b4baa1f24df958c86ede6705c9eba5ac4', 'Abreu e Lima', 'Mecanico', NULL, NULL),
(6, 'Jack', 'j@gmail.com', '21456789', '$2y$10$G8ZdFsom545Kn/gzwBe5DOfDia1cCHwr13JRB84uX7XfH9Y3DPrzy', 'b89eb06b31421f9be5bea9d88ed368da5fd472199428b6cd0934bd5eae7cec80bece9fca7738a5ec0895784bba44caec272a', 'Abreu e Lima', 'Geceiro', NULL, NULL),
(7, 'Saira', 'sa@gmail.com', '123456789', '$2y$10$bPabYjK3QtKbH43qkJdZVOlL3N5XUgRf7H0azgVsLSy0Tmw9J/RgW', 'fc8d65bd216942a29676cb36b70b47a0a54a7888feaff208fb4ae2b5ae3cef9bef83fcaacd5ed91fd1f1e2ad87c1fa7b4691', 'Abreu e Lima', 'Mecanico', NULL, NULL),
(8, 'Mercelo Perereira', 'marcelo@gmail.com', '9157658685', '$2y$10$GdDMvIUlF9WIKHworoocg.o.jPmH7Vdndzi2XkaO1wdBHn/e9z0Wy', 'eeca8f2d302fd83ef0d6ae463fbcb92349d437f1fa5311ea97b802d66b92cb7f9b2e0b4a692912dcfd9217316ec46daf1d9b', 'Igarassu', 'Mecanico', NULL, NULL),
(9, 'Carla', 'carla@gmail.com', '12345678', '$2y$10$N2wlVnEnimJOm8fo7RPKdu4jVTB5iMGuHPhUWK3p8T3ielVJL8Bq2', 'fe098ddb3d2a23492be9741605969510f768e6edeeae72917552d490834e2fc0f61d8f694c738ecdd1e734e640c6413a1511', 'Igarassu', 'Geceiro', NULL, NULL),
(10, 'Almeida', 'a@gmail.com', '123356778', '$2y$10$ZYKbTjRCMXVlJJZTKZboN.Ec9CxPxEKOVJ0ZFs/64YLqbnc8k5ope', '68501a775d271017163e193d183974428afaca9817f0db7996227b33fab7f1a244e9ae3a7ba0f0ac525ab8411bbd57e97c5f', 'Abreu e Lima', 'Pintor', NULL, NULL),
(11, 'Daniel', 'daniel@teste.com', '9157658685', '$2y$10$AWeDvQi1I7e.JQeaA5HdAOdJiUcMe89a/UOOBEo3./.SWE36r2Qaq', '5d26cb60016ae029bb1d348c50a5e7453ef25724e756c6ce60076b97aada4dd5bf0425d59724bfec654734372ace336bef62', 'Igarassu', 'Pedreiro', NULL, NULL),
(12, 'Julia', 'julia@gmail.com', '9157658685', '$2y$10$.CKO831koBiHeD4ucZGK/OmvWLXIhuy7vTaoVkw8YJIZYoDiqRd9y', 'ed1e7903c6bf85aca264a42ffebece17439bdfa5245da114e8ea4a6f9d8500de077b28c1753b1b767a7cc69d63d618498cbc', 'Abreu e Lima', 'Mecanico', NULL, NULL),
(13, 'Teste', 'email@teste.com', '9157658685', '$2y$10$llc1DmcDAuvjvE2SOMHQJu2FApTKbz19sKr8mW6Am2/GrkIpsQc0q', '94ff71dffa84f27f540e00a2fd91ac85f285b9d4ed1240440fde6b90d8ffcce7f6bf892189b96044544ed50b49d63f3352a2', 'Igarassu', 'eletrecista', NULL, NULL);

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
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `worker`
--
ALTER TABLE `worker`
  MODIFY `id_work` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
