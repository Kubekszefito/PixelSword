-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Mar 2023, 21:20
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
-- Struktura tabeli dla tabeli `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(40) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `image` varchar(40) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `price` int(11) NOT NULL,
  `extras` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(40) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(40) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `inteligejcna` int(11) NOT NULL,
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

INSERT INTO `users` (`id`, `login`, `password`, `inteligejcna`, `wytrzymalosc`, `sila`, `szczescie`, `level`, `levelpoints`, `klasa`, `PU`, `coin`) VALUES
(1, '123', '123', 0, 0, 0, 0, 1, 0, 2, 0, 420);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `character`
--
ALTER TABLE `character`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `character`
--
ALTER TABLE `character`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
