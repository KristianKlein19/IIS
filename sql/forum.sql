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
    nick VARCHAR(32) PRIMARY KEY,
    email VARCHAR(320) NOT NULL UNIQUE,
    heslo BINARY(32) NOT NULL,
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
    spravce VARCHAR(32) NOT NULL,

    -- foreign keys --
    FOREIGN KEY (spravce) REFERENCES uzivatel(nick),

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
    soucast VARCHAR(255) NOT NULL COLLATE utf8_czech_ci,
    pripnute_vlakno BOOL NOT NULL, # not FG, 0 -> unpinned, 1 -> pinned
    zakladatel VARCHAR(32) NOT NULL,

    -- foreign keys --
    FOREIGN KEY (soucast) REFERENCES skupina(nazev),
    FOREIGN KEY (zakladatel) REFERENCES uzivatel(nick),

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
    soucast INT UNSIGNED NOT NULL,
    odpoved INT UNSIGNED,
    prispevatel VARCHAR(32) NOT NULL,

    -- foreign keys --
    FOREIGN KEY (soucast) REFERENCES vlakno(id),
    FOREIGN KEY (odpoved) REFERENCES prispevek(id),
    FOREIGN KEY (prispevatel) REFERENCES uzivatel(nick)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_czech_ci;

--
-- Table "zadost" structure
--

CREATE TABLE zadost (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    typ TINYINT(1) UNSIGNED NOT NULL, # BOOLEAN
    text VARCHAR(2000) COLLATE utf8_czech_ci,
    stav TINYINT(2) UNSIGNED NOT NULL, # awaiting approval / approved / not approved
    od VARCHAR(32) NOT NULL,
    do VARCHAR(255) NOT NULL COLLATE utf8_czech_ci,

    -- foreign keys --
    FOREIGN KEY (od) REFERENCES uzivatel(nick),
    FOREIGN KEY (do) REFERENCES skupina(nazev)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_czech_ci;

--
-- Table "moderator" structure for moderator relationship
--

CREATE TABLE moderator (
    nick VARCHAR(32) NOT NULL,
    nazev VARCHAR(255) NOT NULL COLLATE utf8_czech_ci,
    FOREIGN KEY (nick) REFERENCES uzivatel(nick),
    FOREIGN KEY (nazev) REFERENCES skupina(nazev),
    PRIMARY KEY (nick, nazev)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_czech_ci;

--
-- Table "clen" structure for clen relationship
--

CREATE TABLE clen (
    nick VARCHAR(32) NOT NULL,
    nazev VARCHAR(255) NOT NULL COLLATE utf8_czech_ci,
    FOREIGN KEY (nick) REFERENCES uzivatel(nick),
    FOREIGN KEY (nazev) REFERENCES skupina(nazev),
    PRIMARY KEY (nick, nazev)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_czech_ci;

--
-- Table "hodnotil" structure for hodnotil relationship
-- Without primary key
--

CREATE TABLE hodnotil (
    nick VARCHAR(32) NOT NULL,
    id INT UNSIGNED NOT NULL,
    hodnotil BOOL NOT NULL, # 0 -> dislike, 1 -> like
    FOREIGN KEY (nick) REFERENCES uzivatel(nick),
    FOREIGN KEY (id) REFERENCES prispevek(id),
    PRIMARY KEY (nick, id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_czech_ci;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;