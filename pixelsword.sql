-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 07 Mar 2023, 01:39
-- Wersja serwera: 10.4.18-MariaDB
-- Wersja PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `pixelsword`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `character`
--

CREATE TABLE `character` (
  `id` int(11) NOT NULL,
  `title` varchar(40) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `image` varchar(40) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `character`
--

INSERT INTO `character` (`id`, `title`, `image`) VALUES
(1, 'Wojownik', 'wojownik.png'),
(2, 'Łucznik', 'lucznik.png'),
(3, 'Mag', 'mag.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ekwipunek`
--

CREATE TABLE `ekwipunek` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `ekwipunek`
--

INSERT INTO `ekwipunek` (`id`, `id_user`, `id_item`) VALUES
(30, 1, 4),
(31, 1, 2),
(32, 1, 5),
(33, 1, 3),
(34, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(40) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `image` varchar(40) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `price` int(11) NOT NULL,
  `extras` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `items`
--

INSERT INTO `items` (`id`, `name`, `image`, `price`, `extras`) VALUES
(1, 'Złoty łańcuch', 'zlotylancuch.png', 750, '15% Golda'),
(2, 'Różdżka maga', 'rozdzka.png', 1400, '+11 Inteligencja'),
(3, 'Niebiański klejnot', 'klejnot.png', 1700, '15 % XP'),
(4, 'Czapka konfidenta', 'czapka.png', 2137, '+40 Szczęścia'),
(5, 'Trojański hełm', 'helm.png', 1337, '+15 Wytrzymałość'),
(6, 'Tajemnicze okulary', 'okulary.png', 9999, '?????');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lvlcfg`
--

CREATE TABLE `lvlcfg` (
  `id` int(11) NOT NULL,
  `lvl` int(11) NOT NULL,
  `lvlpoint` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `lvlcfg`
--

INSERT INTO `lvlcfg` (`id`, `lvl`, `lvlpoint`) VALUES
(1, 1, 400),
(2, 2, 500),
(3, 3, 600),
(4, 4, 700),
(5, 5, 800),
(6, 6, 900),
(7, 7, 950),
(8, 8, 1025),
(9, 9, 1075),
(10, 10, 1111),
(11, 11, 1175),
(12, 12, 1250),
(13, 13, 1300),
(14, 14, 1350),
(15, 15, 1400),
(16, 16, 1450),
(17, 17, 1500),
(18, 18, 1550),
(19, 19, 1800),
(20, 20, 2137);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `title` varchar(40) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `boss` varchar(40) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `discription` varchar(250) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `coin` int(11) NOT NULL,
  `xp` int(11) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `task`
--

INSERT INTO `task` (`id`, `title`, `boss`, `discription`, `coin`, `xp`, `time`) VALUES
(1, 'Świerkowy las', 'Lesny stary druid', 'Las w ktorym rosna swierki i czasem deby latwe miejsce do eksploracji.                                      Majacy 171cm wzrostu druid dzieki swoim miksturą staje sie silny i zly', 20, 150, '00:01:25'),
(2, 'Grzybowa jaskinia', 'Wielki zly grzyb', 'Wielki grzyby porastajace ta jaskinie wydzielaja swiatlo które pozwala na widzenie. Ten grzyb nie lubi dzieci.', 32, 100, '00:02:00'),
(3, 'Wioska wilkolakow', 'Wilk w ludzkiej skorze', 'Wioska w ktorej mieszkaja wilko-ludzie o poteznej mocy krwiopotencji. RAHHH jest to czlowiek przebrany za wilka wydajacy dziwne dzwieki i gesty ciala.', 22, 85, '00:01:10'),
(4, 'Pole pradawnych', 'Mini tytan', 'Tytan ale jakis niski. Jest to obszar o ktory setki lat temu walczyli tytani aktualnie zwykle ściernisko.', 50, 120, '00:02:30'),
(5, 'Kryjowka kultystow', 'Kosmiczny kultysta', 'Miejsce w ktorym kultysci mysla i pija GBS. Przez picie mocnej kawy dziennie zyskał 6 zmysł i może latać', 37, 90, '00:01:00'),
(6, '?????', 'Jan Patek 12', '????????! Tworca zegarkow prestiżowych i wielki podroznik.', 42, 69, '00:01:50');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `taskcfg`
--

CREATE TABLE `taskcfg` (
  `id` int(11) NOT NULL,
  `lvl` int(11) NOT NULL,
  `goldmax` int(11) NOT NULL,
  `goldmin` int(11) NOT NULL,
  `xpmax` int(11) NOT NULL,
  `xpmin` int(11) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `taskcfg`
--

INSERT INTO `taskcfg` (`id`, `lvl`, `goldmax`, `goldmin`, `xpmax`, `xpmin`, `time`) VALUES
(1, 1, 50, 20, 100, 50, '00:01:00'),
(2, 2, 50, 30, 120, 70, '00:01:00'),
(3, 3, 60, 30, 120, 80, '00:01:00'),
(4, 4, 65, 40, 130, 80, '00:01:00'),
(5, 5, 70, 45, 135, 85, '00:01:00'),
(6, 6, 80, 50, 140, 90, '00:01:00'),
(7, 7, 90, 60, 140, 90, '00:01:00'),
(8, 8, 95, 70, 145, 100, '00:01:00'),
(9, 9, 100, 80, 145, 110, '00:01:00'),
(10, 10, 100, 90, 150, 115, '00:01:00'),
(11, 11, 140, 100, 150, 115, '00:01:00'),
(12, 12, 150, 110, 150, 115, '00:01:00'),
(13, 13, 160, 120, 150, 115, '00:01:00'),
(14, 14, 175, 130, 160, 125, '00:01:00'),
(15, 15, 180, 140, 160, 125, '00:01:00'),
(16, 16, 190, 150, 160, 125, '00:01:00'),
(17, 17, 205, 175, 170, 135, '00:01:00'),
(18, 18, 215, 180, 170, 135, '00:01:00'),
(19, 19, 225, 190, 240, 180, '00:01:00'),
(20, 20, 400, 350, 400, 350, '00:01:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(40) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(40) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `inteligencja` int(11) NOT NULL,
  `wytrzymalosc` int(11) NOT NULL,
  `sila` int(11) NOT NULL,
  `szczescie` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `levelpoints` int(11) NOT NULL,
  `klasa` int(11) NOT NULL,
  `PU` int(11) NOT NULL,
  `coin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `inteligencja`, `wytrzymalosc`, `sila`, `szczescie`, `level`, `levelpoints`, `klasa`, `PU`, `coin`) VALUES
(1, '123', '123', 22, 30, 0, 80, 2, 109, 1, 9999983, 942);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `character`
--
ALTER TABLE `character`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `ekwipunek`
--
ALTER TABLE `ekwipunek`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `lvlcfg`
--
ALTER TABLE `lvlcfg`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `taskcfg`
--
ALTER TABLE `taskcfg`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `klasa` (`klasa`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `character`
--
ALTER TABLE `character`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `ekwipunek`
--
ALTER TABLE `ekwipunek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT dla tabeli `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `lvlcfg`
--
ALTER TABLE `lvlcfg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT dla tabeli `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `taskcfg`
--
ALTER TABLE `taskcfg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
