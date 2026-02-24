-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2026. Feb 24. 12:50
-- Kiszolgáló verziója: 10.4.24-MariaDB
-- PHP verzió: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `bank`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `account_number` int(10) NOT NULL,
  `balance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `accounts`
--

INSERT INTO `accounts` (`id`, `user_id`, `account_number`, `balance`) VALUES
(1, 1, 2147483647, 50000),
(2, 2, 2147483647, 50000),
(3, 3, 2147483647, 50000),
(4, 4, 2147483647, 50000),
(5, 5, 2147483647, 50000);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `bankarok`
--

CREATE TABLE `bankarok` (
  `id` int(11) NOT NULL,
  `username` varchar(200) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `bankarok`
--

INSERT INTO `bankarok` (`id`, `username`, `password`) VALUES
(1, 'admin1', '$2y$10$pSxzxVgkosJrcXNTQsPNl.Kb65jMr.7nDdcnUcdpQcHJyTClllIKC'),
(2, 'Catdolf_Tittler', '$2y$10$IjrDUNaAVfrlQ5zEBGm44O.Me5cdne9HZ5cxnJ60K2DhZ1c855rzq');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `card_number` int(16) NOT NULL,
  `expiry` date NOT NULL,
  `cvv` int(4) NOT NULL,
  `pin` int(6) NOT NULL,
  `type` varchar(200) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `cards`
--

INSERT INTO `cards` (`id`, `account_id`, `card_number`, `expiry`, `cvv`, `pin`, `type`, `status`) VALUES
(1, 1, 2147483647, '2036-02-24', 143, 1234, 'VISA', 1),
(2, 2, 2147483647, '2036-02-24', 416, 1234, 'MasterCard', 1),
(3, 3, 2147483647, '2036-02-24', 609, 1234, 'VISA', 1),
(4, 4, 2147483647, '2036-02-24', 295, 1234, 'MasterCard', 1),
(5, 5, 2147483647, '2036-02-24', 270, 1234, 'VISA', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `amount` int(255) NOT NULL,
  `type` varchar(200) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `target_account` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'Hujber Balázs', '$2y$10$eNVOLU2JeWbFpgMzJ1KkOOH461xgTYlACNEUwfPbJLMmkHNv8fu/.'),
(2, 'Har Mónika', '$2y$10$pOMxd5duKMjEVJLTh.vU1OO8aF47tZSVYo47Q7ugfQnLpHsZLnZiu'),
(3, 'Myke ox Long', '$2y$10$WHXVWoA.xAGzB2CwBrpw0u5QfRrZ7Pof5nVAb6jyUBsPrf1QDb5.e'),
(4, 'Ni Geri', '$2y$10$4I/.w2nT/n0BdcevFn3uuOrALFpcgDTzkfEbvUe9MwQIVk983A66i'),
(5, 'humbi pont hu', '$2y$10$BUdnNar5S/qCtzfo7puS7.CLa02wm6kzWZ9S4NVlsm2.TxO0TswpC');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `bankarok`
--
ALTER TABLE `bankarok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `bankarok`
--
ALTER TABLE `bankarok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
