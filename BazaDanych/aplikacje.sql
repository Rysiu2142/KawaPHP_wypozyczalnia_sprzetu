-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Cze 2020, 10:02
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `aplikacje`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klient`
--

CREATE TABLE `klient` (
  `id_klient` int(11) NOT NULL,
  `imie` varchar(255) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `nazwisko` varchar(255) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `haslo` varchar(255) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `nr_telefonu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `klient`
--

INSERT INTO `klient` (`id_klient`, `imie`, `nazwisko`, `email`, `haslo`, `nr_telefonu`) VALUES
(4, 'Oskar', 'Oskaron', 'oskar@oskar.com', '4c799140a3aa3ea2f499ce191a285c0d', 123),
(5, 'Adrian', 'Adrianon', 'adrian@oskar.com', 'e46ed3b8475407cc23b0a8a57c2ec419', 321);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

CREATE TABLE `pracownicy` (
  `id_pracownik` int(11) NOT NULL,
  `imie` varchar(255) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `nazwisko` varchar(255) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `haslo` varchar(255) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `nr_telefonu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `pracownicy`
--

INSERT INTO `pracownicy` (`id_pracownik`, `imie`, `nazwisko`, `email`, `haslo`, `nr_telefonu`) VALUES
(1, 'Przemysław', 'Kawa', 'kawa@kawa.com', '4c799140a3aa3ea2f499ce191a285c0d', 678678678);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sprzet`
--

CREATE TABLE `sprzet` (
  `id_sprzet` int(11) NOT NULL,
  `marka` varchar(255) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `typ_sprzetu` varchar(255) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `cena` int(11) DEFAULT NULL,
  `kaucja` int(11) DEFAULT NULL,
  `zdjecie` varchar(15) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `sprzet`
--

INSERT INTO `sprzet` (`id_sprzet`, `marka`, `model`, `typ_sprzetu`, `cena`, `kaucja`, `zdjecie`) VALUES
(1, 'Volvo', 'BL61 61', 'Koparko-ładowarki', 3000, 20000, '1'),
(2, 'Volvo', 'EW140B', 'Inne koparki', 4000, 40000, '2'),
(3, 'Cat', '300.9D', 'Minikoparka', 500, 20000, '3'),
(4, 'Cat', '301.5', 'Minikoparka', 500, 20000, '4'),
(6, 'Cat', '336 GC', 'Duże koparki', 2000, 60000, '6'),
(7, 'Cat', '311F L RR', 'Duże koparki', 2000, 60000, '7');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wypozyczenia`
--

CREATE TABLE `wypozyczenia` (
  `id_wypozyczenia` int(11) NOT NULL,
  `id_sprzet` int(11) DEFAULT NULL,
  `id_klient` int(11) DEFAULT NULL,
  `id_pracownik` int(11) DEFAULT NULL,
  `data_odb` date DEFAULT NULL,
  `data_zwr` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `wypozyczenia`
--

INSERT INTO `wypozyczenia` (`id_wypozyczenia`, `id_sprzet`, `id_klient`, `id_pracownik`, `data_odb`, `data_zwr`, `status`) VALUES
(3, 4, 5, NULL, '2020-06-10', '2020-06-11', 'Oddany'),
(4, 4, 4, NULL, '2020-06-10', '2020-06-13', 'Wypożyczony'),
(5, 3, 4, NULL, '2020-06-10', '2020-06-12', 'Oddany');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`id_klient`);

--
-- Indeksy dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`id_pracownik`);

--
-- Indeksy dla tabeli `sprzet`
--
ALTER TABLE `sprzet`
  ADD PRIMARY KEY (`id_sprzet`);

--
-- Indeksy dla tabeli `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  ADD PRIMARY KEY (`id_wypozyczenia`),
  ADD KEY `id_sprzet` (`id_sprzet`),
  ADD KEY `id_klient` (`id_klient`),
  ADD KEY `id_pracownik` (`id_pracownik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `klient`
--
ALTER TABLE `klient`
  MODIFY `id_klient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  MODIFY `id_pracownik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `sprzet`
--
ALTER TABLE `sprzet`
  MODIFY `id_sprzet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  MODIFY `id_wypozyczenia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  ADD CONSTRAINT `wypozyczenia_ibfk_1` FOREIGN KEY (`id_sprzet`) REFERENCES `sprzet` (`id_sprzet`),
  ADD CONSTRAINT `wypozyczenia_ibfk_2` FOREIGN KEY (`id_klient`) REFERENCES `klient` (`id_klient`),
  ADD CONSTRAINT `wypozyczenia_ibfk_3` FOREIGN KEY (`id_pracownik`) REFERENCES `pracownicy` (`id_pracownik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
