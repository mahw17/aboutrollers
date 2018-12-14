--
-- Create database ramverk.
-- By mahw17 for course "Ramverk1 -v2".
-- 2018-12-11
-- Setup for the article:
-- https://dbwebb.se/kunskap/kom-igang-med-php-pdo-och-mysql
--

-- Skapa ny databas om ingen existerar
CREATE DATABASE IF NOT EXISTS ramverk;

-- Välj vilken databas du vill använda
USE ramverk;

-- Skapa användaren "user" med
-- lösenordet "pass" och ge
-- fulla rättigheter till databasen "eshop"
-- när användaren loggar in oavsett från vilken plats
GRANT ALL ON ramverk.* TO user@'%' IDENTIFIED BY 'pass';

-- Ensure UTF8 as chacrter encoding within connection.
SET NAMES utf8;


--
-- Table Book
--
DROP TABLE IF EXISTS Book;
CREATE TABLE Book (
    `id` INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `title` VARCHAR(256) NOT NULL,
    `author` VARCHAR(256) NOT NULL,
    `image` VARCHAR(256) NOT NULL,
) ENGINE INNODB CHARACTER SET utf8 COLLATE utf8_swedish_ci;

-- Table users
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci
