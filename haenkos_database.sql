-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 31, 2022 at 11:36 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `haenkos_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `orderDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ID`, `UserID`, `orderDate`) VALUES
(1, 5, '2022-01-17 00:00:00'),
(2, 5, '2022-01-17 00:00:00'),
(3, 5, '2022-01-17 00:00:00'),
(4, 5, '2022-01-17 00:00:00'),
(5, 5, '2022-01-17 00:00:00'),
(6, 5, '2022-01-17 00:00:00'),
(7, 5, '2022-01-17 00:00:00'),
(8, 5, '2022-01-17 00:00:00'),
(9, 5, '2022-01-31 00:00:00'),
(10, 5, '2022-01-31 00:00:00'),
(11, 5, '2022-01-31 00:00:00'),
(12, 5, '2022-01-31 00:00:00'),
(13, 5, '2022-01-31 00:00:00'),
(14, 5, '2022-01-31 00:00:00'),
(15, 5, '2022-01-31 00:00:00'),
(16, 5, '2022-01-31 00:00:00'),
(17, 5, '2022-01-31 00:00:00'),
(18, 5, '2022-01-31 00:00:00'),
(19, 5, '2022-01-31 00:00:00'),
(20, 5, '2022-01-31 00:00:00'),
(21, 5, '2022-01-31 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ordersproducts`
--

CREATE TABLE `ordersproducts` (
  `ID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ordersproducts`
--

INSERT INTO `ordersproducts` (`ID`, `orderID`, `productID`, `amount`) VALUES
(1, 3, 3, 1),
(2, 3, 6, 3),
(3, 4, 2, 1),
(4, 4, 3, 2),
(5, 6, 6, 3),
(6, 7, 5, 1),
(7, 8, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageID` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productColour` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ProductMaterial` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productPrice` int(11) NOT NULL,
  `productCopy` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productName`, `imageID`, `productColour`, `ProductMaterial`, `productPrice`, `productCopy`) VALUES
(1, 'Sleutelbosring Goud', 'goud', 'goud', 'goud', 1000, '`Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mattis, dolor quis dignissim elementum, enim leo fringilla purus, a feugiat nunc mi nec leo. Maecenas sed fringilla risus, ut tempus velit. Etiam venenatis eros ac ipsum pretium accumsan. Fusce eu condimentum eros. Curabitur vestibulum nec enim efficitur consequat. Nulla facilisi. Curabitur id finibus mauris. Suspendisse ultricies ex tortor, non condimentum tortor condimentum in. Praesent volutpat elit quis vulputate dapibus. Sed ligula elit, blandit sit amet sodales eget, dignissim non elit. Curabitur tempus, augue vitae molestie viverra, est ante vestibulum velit, quis ullamcorper augue velit mollis sem. Praesent tincidunt nulla vel magna cursus vulputate. Maecenas vel tempor libero. Suspendisse cursus magna mauris, non posuere elit euismod congue. '),
(2, 'Sleutelbosring Hart', 'hart', 'Grijs', 'RVS', 20, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mattis, dolor quis dignissim elementum, enim leo fringilla purus, a feugiat nunc mi nec leo. Maecenas sed fringilla risus, ut tempus velit. Etiam venenatis eros ac ipsum pretium accumsan. Fusce eu condimentum eros. Curabitur vestibulum nec enim efficitur consequat. Nulla facilisi. Curabitur id finibus mauris. Suspendisse ultricies ex tortor, non condimentum tortor condimentum in. Praesent volutpat elit quis vulputate dapibus. Sed ligula elit, blandit sit amet sodales eget, dignissim non elit. Curabitur tempus, augue vitae molestie viverra, est ante vestibulum velit, quis ullamcorper augue velit mollis sem. Praesent tincidunt nulla vel magna cursus vulputate. Maecenas vel tempor libero. Suspendisse cursus magna mauris, non posuere elit euismod congue. '),
(3, 'Sleutelbosring Messing', 'messing', 'Messing', 'Messing', 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mattis, dolor quis dignissim elementum, enim leo fringilla purus, a feugiat nunc mi nec leo. Maecenas sed fringilla risus, ut tempus velit. Etiam venenatis eros ac ipsum pretium accumsan. Fusce eu condimentum eros. Curabitur vestibulum nec enim efficitur consequat. Nulla facilisi. Curabitur id finibus mauris. Suspendisse ultricies ex tortor, non condimentum tortor condimentum in. Praesent volutpat elit quis vulputate dapibus. Sed ligula elit, blandit sit amet sodales eget, dignissim non elit. Curabitur tempus, augue vitae molestie viverra, est ante vestibulum velit, quis ullamcorper augue velit mollis sem. Praesent tincidunt nulla vel magna cursus vulputate. Maecenas vel tempor libero. Suspendisse cursus magna mauris, non posuere elit euismod congue. '),
(4, 'Sleutelbosring Staal', 'staal', 'Grijs', 'Staal', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mattis, dolor quis dignissim elementum, enim leo fringilla purus, a feugiat nunc mi nec leo. Maecenas sed fringilla risus, ut tempus velit. Etiam venenatis eros ac ipsum pretium accumsan. Fusce eu condimentum eros. Curabitur vestibulum nec enim efficitur consequat. Nulla facilisi. Curabitur id finibus mauris. Suspendisse ultricies ex tortor, non condimentum tortor condimentum in. Praesent volutpat elit quis vulputate dapibus. Sed ligula elit, blandit sit amet sodales eget, dignissim non elit. Curabitur tempus, augue vitae molestie viverra, est ante vestibulum velit, quis ullamcorper augue velit mollis sem. Praesent tincidunt nulla vel magna cursus vulputate. Maecenas vel tempor libero. Suspendisse cursus magna mauris, non posuere elit euismod congue. '),
(5, 'Sleutelbosring Zwart', 'zwart', 'Zwart', 'RVS', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mattis, dolor quis dignissim elementum, enim leo fringilla purus, a feugiat nunc mi nec leo. Maecenas sed fringilla risus, ut tempus velit. Etiam venenatis eros ac ipsum pretium accumsan. Fusce eu condimentum eros. Curabitur vestibulum nec enim efficitur consequat. Nulla facilisi. Curabitur id finibus mauris. Suspendisse ultricies ex tortor, non condimentum tortor condimentum in. Praesent volutpat elit quis vulputate dapibus. Sed ligula elit, blandit sit amet sodales eget, dignissim non elit. Curabitur tempus, augue vitae molestie viverra, est ante vestibulum velit, quis ullamcorper augue velit mollis sem. Praesent tincidunt nulla vel magna cursus vulputate. Maecenas vel tempor libero. Suspendisse cursus magna mauris, non posuere elit euismod congue. '),
(6, 'Sleutelbosring RVS', 'rvs', 'Grijs', 'RVS', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mattis, dolor quis dignissim elementum, enim leo fringilla purus, a feugiat nunc mi nec leo. Maecenas sed fringilla risus, ut tempus velit. Etiam venenatis eros ac ipsum pretium accumsan. Fusce eu condimentum eros. Curabitur vestibulum nec enim efficitur consequat. Nulla facilisi. Curabitur id finibus mauris. Suspendisse ultricies ex tortor, non condimentum tortor condimentum in. Praesent volutpat elit quis vulputate dapibus. Sed ligula elit, blandit sit amet sodales eget, dignissim non elit. Curabitur tempus, augue vitae molestie viverra, est ante vestibulum velit, quis ullamcorper augue velit mollis sem. Praesent tincidunt nulla vel magna cursus vulputate. Maecenas vel tempor libero. Suspendisse cursus magna mauris, non posuere elit euismod congue. ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(100) NOT NULL,
  `userName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userEmail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userPassword` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `userEmail`, `userPassword`) VALUES
(1, 'Fred', 'durst@bizkit.limp', 'keeprollin'),
(2, 'Cicero', 'rome@empire.spqr', 'rethoric'),
(3, 'henk', 'henk@henk.nl', 'henkhenkhenk'),
(5, 'frits', 'frits@thuis.nl', 'fritsfritsfrits'),
(6, 'geit', 'geit@distelwei.nl', 'disteldistel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ordersproducts`
--
ALTER TABLE `ordersproducts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ordersproducts`
--
ALTER TABLE `ordersproducts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
