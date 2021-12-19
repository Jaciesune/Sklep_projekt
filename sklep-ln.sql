-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 20 Gru 2021, 00:55
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
-- Baza danych: `sklep-ln`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `adressess`
--

CREATE TABLE `adressess` (
  `adress_id` int(11) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `wojewodztwo` text NOT NULL,
  `city_name` text NOT NULL,
  `street_number` text NOT NULL,
  `house_number` text NOT NULL,
  `apartment_number` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `adressess`
--

INSERT INTO `adressess` (`adress_id`, `phone_number`, `wojewodztwo`, `city_name`, `street_number`, `house_number`, `apartment_number`) VALUES
(1, 123456789, 'świętokrzyskie', 'Limanowa', '', '903', ''),
(2, 123456789, 'pomorskie', 'łoszington', '', '1234', ''),
(3, 132456789, 'dolnośląskie', 'Krk', '', '123', '123'),
(4, 123456789, 'dolnośląskie', 'Limanowa', '', '123', '123'),
(5, 987654321, 'zachodniopomorskie', 'łoszington', '', '1', '123'),
(6, 102938475, 'dolnośląskie', 'Warszawa', '', '90', ''),
(7, 112233445, 'warmińsko-mazurskie', 'limanowa', '', '67', '2'),
(8, 123456789, 'wielkopolskie', 'Limanowa', '', '2', '5'),
(9, 123123123, 'wielkopolskie', 'lim', '', '5', '1'),
(10, 999777555, 'podkarpackie', 'Stara Wieś', '5', '67', '90'),
(11, 111333555, 'opolskie', 'krk', '6', '1', '2'),
(12, 333444555, 'śląskie', 'krk', '6', '777', '543'),
(13, 333444666, 'małopolskie', 'krk', '5', '67', '9');

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
-- Struktura tabeli dla tabeli `delivery_types`
--

CREATE TABLE `delivery_types` (
  `delv_type_id` int(11) NOT NULL,
  `delv_type_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `delivery_type` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `order_price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `order_list`
--

CREATE TABLE `order_list` (
  `order_list_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `order_status`
--

CREATE TABLE `order_status` (
  `status_id` int(11) NOT NULL,
  `status` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `payment_methods`
--

CREATE TABLE `payment_methods` (
  `payment_method_id` int(11) NOT NULL,
  `payment_method` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `picture_path` varchar(200) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `quantity`, `category_id`, `picture_path`, `description`) VALUES
(1, 'Sok <span style=\"text-decoration: line-through\">pomidorowy</span> pomarańczowy 0.5L', '2.99', 63, 13, './visualization/sok-pomidorowy.png', 'No generalnie to jest mem'),
(5, 'Dell Vostro 3888 MT i5-10400/8GB/256/Win10P', '2699.00', 15, 1, './visualization/komp_1.jpg', ''),
(6, 'Acer Nitro 50 i5-11400F/16GB/512/W10 RTX3060', '5599.00', 6, 1, './visualization/komp_1.jpg', ''),
(7, 'G4M3R 500 i5-10400F/16GB/1TB/RTX3060/W10X\r\n', '6650.00', 2, 1, './visualization/komp_1.jpg', ''),
(8, 'Dell Alienware Aurora R7-5800/16GB/512+1TB/W10 RTX3090', '14999.00', 4, 1, './visualization/komp_1.jpg', ''),
(9, 'Dell Vostro 3681 SFF i5-10400/8GB/512/Win10P', '2888.00', 45, 1, './visualization/komp_1.jpg', ''),
(10, 'Xiaomi POCO X3 PRO NFC 8/256GB Phantom Black 120Hz', '1247.00', 60, 2, './visualization/komp_1.jpg', ''),
(11, 'Xiaomi Redmi 9C NFC 3/64GB Midnight Grey', '626.00', 57, 2, './visualization/komp_1.jpg', ''),
(12, 'Samsung Galaxy S20 FE 5G Fan Edition Niebieski', '2899.00', 46, 2, './visualization/komp_1.jpg', ''),
(13, 'Xiaomi Redmi Note 10 Pro 6/128GB Glacier Blue 120Hz', '1499.00', 38, 2, './visualization/komp_1.jpg', ''),
(14, 'Samsung Galaxy S21 G991B 8/128 Dual SIM Grey 5G', '3899.00', 35, 2, './visualization/komp_1.jpg', ''),
(15, 'Motorola Moto G30 6/128GB Dark Pearl 90Hz', '899.00', 23, 2, './visualization/komp_1.jpg', ''),
(16, 'Gigabyte GeForce RTX 3060 Ti GAMING OC LHR 8GB GDDR6', '3999.00', 10, 9, './visualization/komp_1.jpg', ''),
(17, 'Gigabyte GeForce RTX 3070 GAMING OC LHR 8GB GDDR6', '4699.00', 7, 9, './visualization/komp_1.jpg', ''),
(18, 'Intel Core i9-12900K', '3199.00', 15, 9, './visualization/komp_1.jpg', ''),
(19, 'AMD Ryzen 7 3700X', '1310.00', 25, 9, './visualization/komp_1.jpg', ''),
(20, 'ASUS TUF GAMING B550-PLUS', '589.00', 16, 9, './visualization/komp_1.jpg', ''),
(21, 'GOODRAM 16GB (1x16GB) 3200MHz CL22', '298.00', 40, 9, './visualization/komp_1.jpg', ''),
(22, 'ASUS VP299CL', '1500.00', 14, 10, './visualization/komp_1.jpg', ''),
(23, 'LG 29WP500-B', '900.00', 32, 10, './visualization/komp_1.jpg', ''),
(24, 'SPC Gear GK650K Omnis (Kailh Brown)', '320.00', 27, 10, './visualization/komp_1.jpg', ''),
(25, 'SteelSeries Apex 5', '566.00', 23, 10, './visualization/komp_1.jpg', ''),
(26, 'HyperX Cloud Alpha', '340.00', 21, 10, './visualization/komp_1.jpg', ''),
(27, 'A4Tech XGame X7-200MP (antypoślizgowa, dla graczy)', '10.00', 24, 10, './visualization/komp_1.jpg', ''),
(28, 'Redragon Stentor', '60.00', 15, 11, './visualization/komp_1.jpg', ''),
(29, 'Edifier 2.0 R1600TIII', '400.00', 21, 11, './visualization/komp_1.jpg', ''),
(30, 'Creative 2.0 Pebble (czarny)', '220.00', 5, 11, './visualization/komp_1.jpg', ''),
(31, 'Mozos MKIT-900PRO', '169.00', 3, 11, './visualization/komp_1.jpg', ''),
(32, 'Google Chromecast 3.0 czarny OEM', '130.00', 65, 11, './visualization/komp_1.jpg', ''),
(33, 'Mozos Xtreme One', '430.00', 14, 11, './visualization/komp_1.jpg', ''),
(34, 'Unitek Adapter USB-C - USB 3.1 (OTG)', '24.00', 30, 12, './visualization/komp_1.jpg', ''),
(35, 'Silver Monkey Adapter HDMI - DVI', '21.00', 20, 12, './visualization/komp_1.jpg', ''),
(36, 'Targus Classic 15-16\"', '63.00', 14, 12, './visualization/komp_1.jpg', ''),
(37, 'Green Cell Uniwersalny USB-C 65W', '119.00', 4, 12, './visualization/komp_1.jpg', ''),
(38, 'Kingston MobileLite Plus (SD) USB 3.2 gen.1', '42.00', 7, 12, './visualization/komp_1.jpg', ''),
(39, 'Kingston 64GB microSDXC Canvas Select Plus 100MB/s', '43.00', 9, 12, './visualization/komp_1.jpg', ''),
(40, 'Lenovo IdeaCentre Gaming 5 i5/16GB/512/Win10 GTX1660S', '4500.00', 13, 1, './visualization/komp_1.jpg', ''),
(41, 'Pizza 4 sery - Duża', '32.00', 5, 13, 'visualization/140d3ea2b0c7a720b8fcc236deedd04f.jpg', ''),
(42, 'Hamburger - MC Donlands', '12.00', 50, 13, './visualization/hamburger.jpg', ''),
(43, 'Plakat \"Satisfactory Update 5\"', '1.00', 99900, 13, './visualization/poster-sati.webp', ''),
(44, 'Kubek Satisfactory', '1.00', 999897, 13, './visualization/Cup.png', ''),
(54, 'test5', '45.00', 13, 13, 'visualization/e9a6d673403ba95a00750defa58203ec.jpg', 'piesek do testów, źle to brzmi ale prawdopodobnie działa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `name` text NOT NULL,
  `family_name` text NOT NULL,
  `password` varchar(256) NOT NULL,
  `e-mail` varchar(120) NOT NULL,
  `adress` int(11) NOT NULL,
  `data` varchar(10000) NOT NULL,
  `role` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`user_id`, `username`, `name`, `family_name`, `password`, `e-mail`, `adress`, `data`, `role`) VALUES
(10, 'admin', 'John', 'Cena', '$2y$10$Ppb/1p/VYAzE2GnLUix4U.ZG9wmtki0lxyofZYBfCbOtYdvtzRCEW', 'who.knows@gmail.com', 1, '[]', 1),
(12, 'łosoś', 'Katarzyna', 'Public', '$2y$10$TuKDqGQ9taGteo8GoHHs7euITcXS.QesfcBa7vJBItuZht0r0mOHa', 'test@a.com', 5, '[]', 0),
(17, 'akow', 'Anna', 'Kowalska', '$2y$10$fj4.WPcDbhpRXvK/YfihZO6KRp2FX7SE4615/9TNqKWpf0B0wM6cC', 'example@gmail.com', 10, '{\"Cart\":{\"42\":1,\"44\":\"3\",\"41\":\"5\",\"43\":\"2\"}}', 0),
(20, 'login', 'test', 'testowy', '$2y$10$8IOMPsUstqeToJNl4dd3M.ZAsIg1NeSxPN5pa5lP0O560nnw8OP8G', 'example@gmail.com', 13, '{\"Cart\":{\"41\":1,\"5\":1,\"44\":\"3\"}}', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `adressess`
--
ALTER TABLE `adressess`
  ADD PRIMARY KEY (`adress_id`);

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeksy dla tabeli `delivery_types`
--
ALTER TABLE `delivery_types`
  ADD PRIMARY KEY (`delv_type_id`);

--
-- Indeksy dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeksy dla tabeli `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`order_list_id`);

--
-- Indeksy dla tabeli `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indeksy dla tabeli `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`payment_method_id`);

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `kategoria_id` (`category_id`) USING BTREE;

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `adress` (`adress`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `adressess`
--
ALTER TABLE `adressess`
  MODIFY `adress_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT dla tabeli `delivery_types`
--
ALTER TABLE `delivery_types`
  MODIFY `delv_type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `order_list`
--
ALTER TABLE `order_list`
  MODIFY `order_list_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `order_status`
--
ALTER TABLE `order_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `payment_method_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`adress`) REFERENCES `adressess` (`adress_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
