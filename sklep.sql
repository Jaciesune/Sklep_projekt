-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 14 Lis 2021, 21:02
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sklep`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Komputery'),
(2, 'Telefony'),
(9, 'Podzespoły'),
(10, 'Urządzenia peryferyjne'),
(11, 'Audio'),
(12, 'Akcesoria'),
(13, 'Inne');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `picture_path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `quantity`, `category_id`, `picture_path`) VALUES
(1, 'Sok pomidorowy 0.5L', '2.99', 69, 13, ''),
(5, 'Dell Vostro 3888 MT i5-10400/8GB/256/Win10P', '2699.00', 15, 1, ''),
(6, 'Acer Nitro 50 i5-11400F/16GB/512/W10 RTX3060', '5599.00', 6, 1, ''),
(7, 'G4M3R 500 i5-10400F/16GB/1TB/RTX3060/W10X\r\n', '6650.00', 2, 1, ''),
(8, 'Dell Alienware Aurora R7-5800/16GB/512+1TB/W10 RTX3090', '14999.00', 4, 1, ''),
(9, 'Dell Vostro 3681 SFF i5-10400/8GB/512/Win10P', '2888.00', 45, 1, ''),
(10, 'Xiaomi POCO X3 PRO NFC 8/256GB Phantom Black 120Hz', '1247.00', 60, 2, ''),
(11, 'Xiaomi Redmi 9C NFC 3/64GB Midnight Grey', '626.00', 57, 2, ''),
(12, 'Samsung Galaxy S20 FE 5G Fan Edition Niebieski', '2899.00', 46, 2, ''),
(13, 'Xiaomi Redmi Note 10 Pro 6/128GB Glacier Blue 120Hz', '1499.00', 38, 2, ''),
(14, 'Samsung Galaxy S21 G991B 8/128 Dual SIM Grey 5G', '3899.00', 35, 2, ''),
(15, 'Motorola Moto G30 6/128GB Dark Pearl 90Hz', '899.00', 23, 2, ''),
(16, 'Gigabyte GeForce RTX 3060 Ti GAMING OC LHR 8GB GDDR6', '3999.00', 10, 9, ''),
(17, 'Gigabyte GeForce RTX 3070 GAMING OC LHR 8GB GDDR6', '4699.00', 7, 9, ''),
(18, 'Intel Core i9-12900K', '3199.00', 15, 9, ''),
(19, 'AMD Ryzen 7 3700X', '1310.00', 25, 9, ''),
(20, 'ASUS TUF GAMING B550-PLUS', '589.00', 16, 9, ''),
(21, 'GOODRAM 16GB (1x16GB) 3200MHz CL22', '298.00', 40, 9, ''),
(22, 'ASUS VP299CL', '1500.00', 14, 10, ''),
(23, 'LG 29WP500-B', '900.00', 32, 10, ''),
(24, 'SPC Gear GK650K Omnis (Kailh Brown)', '320.00', 27, 10, ''),
(25, 'SteelSeries Apex 5', '566.00', 23, 10, ''),
(26, 'HyperX Cloud Alpha', '340.00', 21, 10, ''),
(27, 'A4Tech XGame X7-200MP (antypoślizgowa, dla graczy)', '10.00', 24, 10, ''),
(28, 'Redragon Stentor', '60.00', 15, 11, ''),
(29, 'Edifier 2.0 R1600TIII', '400.00', 21, 11, ''),
(30, 'Creative 2.0 Pebble (czarny)', '220.00', 5, 11, ''),
(31, 'Mozos MKIT-900PRO', '169.00', 3, 11, ''),
(32, 'Google Chromecast 3.0 czarny OEM', '130.00', 65, 11, ''),
(33, 'Mozos Xtreme One', '430.00', 14, 11, ''),
(34, 'Unitek Adapter USB-C - USB 3.1 (OTG)', '24.00', 30, 12, ''),
(35, 'Silver Monkey Adapter HDMI - DVI', '21.00', 20, 12, ''),
(36, 'Targus Classic 15-16\"', '63.00', 14, 12, ''),
(37, 'Green Cell Uniwersalny USB-C 65W', '119.00', 4, 12, ''),
(38, 'Kingston MobileLite Plus (SD) USB 3.2 gen.1', '42.00', 7, 12, ''),
(39, 'Kingston 64GB microSDXC Canvas Select Plus 100MB/s', '43.00', 9, 12, ''),
(40, 'Lenovo IdeaCentre Gaming 5 i5/16GB/512/Win10 GTX1660S', '4500.00', 13, 1, ''),
(41, 'Pizza 4 sery - Duża', '32.00', 11, 13, ''),
(42, 'Hamburger - MC Donlands', '12.00', 60, 13, ''),
(43, 'Plakat \"Satisfactory Update 5\"', '1.00', 99999, 13, ''),
(44, 'Kubek Satisfactory', '1.00', 999999, 13, '');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `kategoria_id` (`category_id`) USING BTREE;

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
