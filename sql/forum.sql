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

-- Notes:
-- foreign keys are made without FOREIGN KEY constraint
-- foreign key in 1:1 or 1:n relationships is always named same as relationship name
-- additional tables for n:n relationships are always named same as relationship name
-- foreign keys in additional tables are always named same as parent table's primary key


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
    ikona BLOB,
    zabezpeceni_profilu BOOL NOT NULL, # 0 -> private, 1 -> public
    zabezpeceni_obsahu BOOL NOT NULL, # 0 -> private, 1 -> public

    -- foreign keys --
    spravce VARCHAR(254) NOT NULL,

    -- checks --
    CONSTRAINT nazev_longer_than_two_characters CHECK ( length(nazev) > 2 )
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_czech_ci;

--
-- Table "vlakno" structure
--

CREATE TABLE vlakno (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nazev VARCHAR(255) NOT NULL COLLATE utf8_czech_ci,
    popis VARCHAR(10000) COLLATE utf8_czech_ci,
    stav BOOL NOT NULL, # 0 -> unsolved, 1 -> solved

    -- foreign keys --
    soucast VARCHAR(255) NOT NULL COLLATE utf8_czech_ci,
    pripnute_vlakno BOOL NOT NULL, # not FG, 0 -> unpinned, 1 -> pinned
    zakladatel VARCHAR(254) NOT NULL,

    -- checks --
    CONSTRAINT nazev_longer_than_two_characters CHECK ( length(nazev) > 2 )
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_czech_ci;

--
-- Table "prispevek" structure
--

CREATE TABLE prispevek (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    karma INT NOT NULL,
    text VARCHAR(10000) NOT NULL COLLATE utf8_czech_ci,

    -- foreign keys --
    soucast INT UNSIGNED NOT NULL,
    odpoved INT UNSIGNED,
    ma_odpovede BOOL NOT NULL, # not FG, 0 -> without, 1 -> with
    prispevatel VARCHAR(254) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_czech_ci;

--
-- Table "zadost" structure
--

CREATE TABLE zadost (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    typ TINYINT(1) UNSIGNED NOT NULL, # BOOLEAN
    text VARCHAR(2000) COLLATE utf8_czech_ci,
    stav TINYINT(2) UNSIGNED NOT NULL, # awaiting approval / approved / not approved

    -- foreign keys --
    od VARCHAR(254) NOT NULL,
    do VARCHAR(255) NOT NULL COLLATE utf8_czech_ci
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_czech_ci;

--
-- Table "moderator" structure for moderator relationship
--

CREATE TABLE moderator (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,

    -- foreign keys --
    email VARCHAR(254) NOT NULL,
    nazev VARCHAR(255) NOT NULL COLLATE utf8_czech_ci
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_czech_ci;

--
-- Table "clen" structure for clen relationship
--

CREATE TABLE clen (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,

    -- foreign keys --
    email VARCHAR(254) NOT NULL,
    nazev VARCHAR(255) NOT NULL COLLATE utf8_czech_ci
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_czech_ci;

--
-- Table "hodnotil" structure for hodnotil relationship
-- Without primary key
--

CREATE TABLE hodnotil (
    hodnotil BOOL NOT NULL, # 0 -> dislike, 1 -> like

    -- foreign keys --
    email VARCHAR(254) NOT NULL,
    id INT UNSIGNED NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;