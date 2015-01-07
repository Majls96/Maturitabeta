-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vygenerováno: Stř 07. led 2015, 08:02
-- Verze serveru: 5.6.11
-- Verze PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `mydb`
--
CREATE DATABASE IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mydb`;

-- --------------------------------------------------------

--
-- Struktura tabulky `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `ID` int(11) NOT NULL,
  `Uzivatel_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Cart_Uzivatel1_idx` (`Uzivatel_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabulky `cart-product`
--

CREATE TABLE IF NOT EXISTS `cart-product` (
  `Cart_ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  PRIMARY KEY (`Cart_ID`,`Product_ID`),
  KEY `fk_Cart_has_Product_Product1_idx` (`Product_ID`),
  KEY `fk_Cart_has_Product_Cart1_idx` (`Cart_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabulky `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `ID` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabulky `coment`
--

CREATE TABLE IF NOT EXISTS `coment` (
  `ID` int(11) NOT NULL,
  `Coment` text,
  `Uzivatel_ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Coment_Uzivatel1_idx` (`Uzivatel_ID`),
  KEY `fk_Coment_Product1_idx` (`Product_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabulky `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nazev` varchar(45) DEFAULT NULL,
  `Info` varchar(45) DEFAULT NULL,
  `Points` int(11) DEFAULT NULL,
  `Price` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Vypisuji data pro tabulku `course`
--

INSERT INTO `course` (`ID`, `Nazev`, `Info`, `Points`, `Price`) VALUES
(1, 'Posilovani', 'v tomto kuryu se budeme yamerovat na blablba', 100, '100'),
(2, 'Joga', 'joga se yameruje na blablalbal', 200, '150');

-- --------------------------------------------------------

--
-- Struktura tabulky `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `ID` int(11) NOT NULL,
  `Cart_ID` int(11) NOT NULL,
  `Adress` varchar(45) DEFAULT NULL,
  `City` varchar(45) DEFAULT NULL,
  `PSC` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`,`Cart_ID`),
  KEY `fk_Order_Cart1_idx` (`Cart_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabulky `picture`
--

CREATE TABLE IF NOT EXISTS `picture` (
  `ID` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabulky `pro-cate`
--

CREATE TABLE IF NOT EXISTS `pro-cate` (
  `Product_ID` int(11) NOT NULL,
  `Category_ID` int(11) NOT NULL,
  PRIMARY KEY (`Product_ID`,`Category_ID`),
  KEY `fk_Product_has_Category_Category1_idx` (`Category_ID`),
  KEY `fk_Product_has_Category_Product1_idx` (`Product_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabulky `produc-picture`
--

CREATE TABLE IF NOT EXISTS `produc-picture` (
  `Product_ID` int(11) NOT NULL,
  `Picture_ID` int(11) NOT NULL,
  PRIMARY KEY (`Product_ID`,`Picture_ID`),
  KEY `fk_Product_has_Picture_Picture1_idx` (`Picture_ID`),
  KEY `fk_Product_has_Picture_Product1_idx` (`Product_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabulky `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) DEFAULT NULL,
  `Category` varchar(255) NOT NULL,
  `Price` int(11) DEFAULT NULL,
  `Info` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Vypisuji data pro tabulku `product`
--

INSERT INTO `product` (`ID`, `Name`, `Category`, `Price`, `Info`) VALUES
(1, 'Jacket', 'Jackets', 200, 'asdasdfasdf'),
(2, 'Nike', 'Hoodies', 5000, 'asdasdkasd'),
(3, 'Bunda adidas', 'Jackets', 2000, 'asdjasdkjsd'),
(4, 'nike', 'asd', 1, 'adas'),
(5, 'Adidas Bunda', 'Jackets', 2800, 'Tato bunda'),
(6, 'Bunda Puma', 'Jackets', 1200, 'Bunda puma'),
(7, 'Tricko Nike', 'tshirts', 1000, 'Triko nike je ');

-- --------------------------------------------------------

--
-- Struktura tabulky `uzi-cou`
--

CREATE TABLE IF NOT EXISTS `uzi-cou` (
  `Uzivatel_ID` int(11) NOT NULL,
  `Course_ID` int(11) NOT NULL,
  PRIMARY KEY (`Uzivatel_ID`,`Course_ID`),
  KEY `fk_Uzivatel_has_Course_Course1_idx` (`Course_ID`),
  KEY `fk_Uzivatel_has_Course_Uzivatel_idx` (`Uzivatel_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabulky `uzivatel`
--

CREATE TABLE IF NOT EXISTS `uzivatel` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Jmeno` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `Email` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `Aktivace` varchar(255) NOT NULL,
  `Img` varchar(45) DEFAULT NULL,
  `Trener` tinyint(1) DEFAULT NULL,
  `Adress` varchar(45) DEFAULT NULL,
  `City` varchar(45) DEFAULT NULL,
  `PSC` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Vypisuji data pro tabulku `uzivatel`
--

INSERT INTO `uzivatel` (`ID`, `Jmeno`, `Email`, `Password`, `Aktivace`, `Img`, `Trener`, `Adress`, `City`, `PSC`) VALUES
(1, 'Admin Pepa', 'adminpepa@seznam.cz', 'cc9dd6cc04c992e130f3ddbc0dd028dc7ed25ef5', 'YGgOoIkoxvJAsgVUNtbn', NULL, NULL, NULL, NULL, NULL),
(7, 'Matìj Vanèura', 'matej.vancura@seznam.cz', '5e8fc0698b80930c006ab74376b975e4308fc260', 'mBLQGxJIJOOefrSuDRBv', NULL, NULL, 'Za hristem', 'Dolni Brezany', 25241),
(8, 'Majls96', 'ma@se.cz', '060ab0ecc14afab5eed0897a8a3c433281a92416', 'WFwOUxzBbrDwLwBpJYym', NULL, NULL, NULL, NULL, NULL),
(10, 'Honza Le', 'honza.le@seznam.cz', 'c855a98797bca9b1219f1017b2d98195153fac64', 'EpLAjRpkovvkSbTDdohB', NULL, NULL, 'k mostu', 'Praha', 252),
(11, 'Matej Vancura', 'matej.vancura@seznam.c', 'c855a98797bca9b1219f1017b2d98195153fac64', 'ZaygpTzXyUMmVYYjbjOS', NULL, NULL, 'Za hristem', 'Dolni brezany', 25241),
(13, 'Jan Vancura', 'jan.vancura@seznam.cz', 'c855a98797bca9b1219f1017b2d98195153fac64', 'JTvRIndCpQqBouIaWthJ', NULL, NULL, NULL, NULL, NULL),
(15, 'Daniela Peskova', 'daniela.peskova@seznma.cz', 'c855a98797bca9b1219f1017b2d98195153fac64', 'WudrZAItiPyIRRZnaaTv', NULL, NULL, NULL, NULL, NULL),
(16, 'Michal Vancura', 'michal.vancura@seznam.cz', '2d6414d06e0fcc2c4f6552f6ed9077c8a2b1168e', 'xjZmtnelurYrAZIcehyn', NULL, NULL, 'Za Hristem', 'Dolní Bøežany', 25241);

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_Cart_Uzivatel1` FOREIGN KEY (`Uzivatel_ID`) REFERENCES `uzivatel` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `cart-product`
--
ALTER TABLE `cart-product`
  ADD CONSTRAINT `fk_Cart_has_Product_Cart1` FOREIGN KEY (`Cart_ID`) REFERENCES `cart` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cart_has_Product_Product1` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `coment`
--
ALTER TABLE `coment`
  ADD CONSTRAINT `fk_Coment_Product1` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Coment_Uzivatel1` FOREIGN KEY (`Uzivatel_ID`) REFERENCES `uzivatel` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_Order_Cart1` FOREIGN KEY (`Cart_ID`) REFERENCES `cart` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `pro-cate`
--
ALTER TABLE `pro-cate`
  ADD CONSTRAINT `fk_Product_has_Category_Category1` FOREIGN KEY (`Category_ID`) REFERENCES `category` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Product_has_Category_Product1` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `produc-picture`
--
ALTER TABLE `produc-picture`
  ADD CONSTRAINT `fk_Product_has_Picture_Picture1` FOREIGN KEY (`Picture_ID`) REFERENCES `picture` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Product_has_Picture_Product1` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `uzi-cou`
--
ALTER TABLE `uzi-cou`
  ADD CONSTRAINT `fk_Uzivatel_has_Course_Course1` FOREIGN KEY (`Course_ID`) REFERENCES `course` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Uzivatel_has_Course_Uzivatel` FOREIGN KEY (`Uzivatel_ID`) REFERENCES `uzivatel` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
