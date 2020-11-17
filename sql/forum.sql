/*
*  Author: Andrej Pavlovič <xpavlo14@vutbr.cz>
*
*  phpMyAdmin SQL Dump
*  version 5.0.4
*  https://www.phpmyadmin.net/
*
*  Computer: localhost:3306
*  Server version: 10.4.16-MariaDB
*  PHP version: 7.4.12
*/

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table "uzivatel" structure
--

CREATE TABLE uzivatel (
    email VARCHAR(254) PRIMARY KEY,
    heslo VARCHAR(255) NOT NULL,
    bio VARCHAR(5000)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_czech_ci;

--
-- Table "skupina" structure
--

CREATE TABLE skupina (
    nazev VARCHAR(255) PRIMARY KEY COLLATE utf8_czech_ci,
    popis VARCHAR(10000) COLLATE utf8_czech_ci,
    ikona BLOB
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_czech_ci;

--
-- Table "vlakno" structure
--

CREATE TABLE vlakno (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nazev VARCHAR(255) NOT NULL COLLATE utf8_czech_ci,
    popis VARCHAR(10000) COLLATE utf8_czech_ci,
    stav BOOL NOT NULL # vyrizeno / nevyrizeno
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_czech_ci;

--
-- Table "prispevek" structure
--

CREATE TABLE prispevek (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    karma INT NOT NULL,
    text VARCHAR(10000) NOT NULL COLLATE utf8_czech_ci
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_czech_ci;

--
-- Table "zadost" structure
--

CREATE TABLE zadost (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    typ TINYINT(1) UNSIGNED NOT NULL, # BOOLEAN
    text VARCHAR(2000) COLLATE utf8_czech_ci,
    stav TINYINT(1) UNSIGNED NOT NULL # BOOLEAN
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_czech_ci;

/*
--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
*/

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
