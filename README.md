<h1 align="center">
  <br>
  Memory Game
  <br>
</h1>
<p align="center"> Made with HTML, CSS, JS and PHP </p>

<p align="center">
  <a href="#how-to-use">How To Use</a> •
  <a href="#authors">Authors</a> •
  <a href="#license">License</a>
</p>

<p align="center">
  <img src="https://github.com/brendajuliane/MemoryGame/assets/106698124/77bcf8e4-a75e-4927-a76d-546c84b3ba18">
</p>


## How To Use

You'll need Git and a Web server (Apache or WampServer...) that allows you to create web applications with PHP and MySQL database

```bash
# Clone this repository
$ git clone https://github.com/brendajuliane/MemoryGame.git
```
After cloning, create a MySQL database named "jogomemoria" and run the follow queries:

```bash
# Tables and view creation
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Tempo de geração: 06-Dez-2022 às 10:57
-- Versão do servidor: 10.6.5-MariaDB
-- versão do PHP: 7.4.26
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
--
-- Banco de dados: `jogomemoria`
--
-- --------------------------------------------------------
--
-- Estrutura da tabela `usuario`
--
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
`cpf` char(11) NOT NULL,
`nome` varchar(40) NOT NULL,
`username` varchar(16) NOT NULL,
`dtnasc` date NOT NULL,
`telefone` char(11) NOT NULL,
`email` varchar(40) NOT NULL,
`senha` varchar(32) NOT NULL,
PRIMARY KEY (`username`) USING BTREE,
UNIQUE KEY `cpf` (`cpf`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
--
-- Estrutura da tabela `partida`
--
DROP TABLE IF EXISTS `partida`;
CREATE TABLE IF NOT EXISTS `partida` (
`codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
`modo` tinyint(1) NOT NULL,
`dimensao` char(3) NOT NULL,
`tempo` time NOT NULL,
`resultado` tinyint(1) NOT NULL,
`dataHora` datetime NOT NULL DEFAULT current_timestamp(),
`jogadas` int(10) UNSIGNED NOT NULL,
`username` varchar(16) NOT NULL,
PRIMARY KEY (`codigo`),
KEY `partida_ibfk_1` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb3;
-- --------------------------------------------------------
--
-- Limitadores para a tabela `partida`
--
ALTER TABLE `partida`
ADD CONSTRAINT `partida_ibfk_1` FOREIGN KEY (`username`) REFERENCES
`usuario` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;
--
-- View para visualizacao do ranking de usuarios
--
CREATE VIEW ranking
AS
SELECT u.username, dimensao, jogadas, modo, tempo
FROM usuario u inner join partida p
ON u.username = p.username and p.resultado = 1
ORDER BY dimensao DESC, jogadas ASC, tempo ASC
```

Now, change the information of the database in “db_infos.php”
*$sname = IP:Port
*$uname = User
*$pwd = Password


## Authors
* https://github.com/brendajuliane
* https://github.com/SantanaCosta
* https://github.com/flp-cmd
* https://github.com/BaiaGui




## License

MIT

---



