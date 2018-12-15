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
-- Table User
--
DROP TABLE IF EXISTS User;
CREATE TABLE User (
    `id` INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `acronym` VARCHAR(80) UNIQUE NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `rank` INTEGER,
    `gravatar` VARCHAR(255) NOT NULL
) ENGINE INNODB CHARACTER SET utf8 COLLATE utf8_swedish_ci;
