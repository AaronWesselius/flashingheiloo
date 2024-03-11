-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Nov 30, 2021 at 02:48 PM
-- Server version: 10.6.4-MariaDB-1:10.6.4+maria~focal
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `developmentdb`
CREATE TABLE clubniews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kop VARCHAR(20),
    date DATE,
    text VARCHAR(300)
);
INSERT INTO clubniews (kop, date, text)
VALUES ('ExampleKop1', '2024-03-08', 'This is the first example text.'),
       ('ExampleKop2', '2024-03-09', 'This is the second example text.'),
       ('ExampleKop3', '2024-03-10', 'This is the third example text.');

CREATE TABLE wedstrijd (
    id INT AUTO_INCREMENT PRIMARY KEY,
    team1 VARCHAR(255),
    team2 VARCHAR(255),
    schijdsrechter1 INT,
    schijdsrechter2 INT,
    tafel1 INT,
    tafel2 INT,
    datum DATETIME
);

CREATE TABLE speler (
    id INT AUTO_INCREMENT PRIMARY KEY,
    voornaam VARCHAR(255),
    achternaam VARCHAR(255),
    geboortedatum DATE,
    team VARCHAR(255)
);

INSERT INTO speler1 (voornaam, achternaam, geboortedatum, team)
VALUES ('Voornaam1', 'Achternaam1', '1990-01-01', 'Team1'),
       ('Voornaam2', 'Achternaam2', '1991-02-02', 'Team2');

