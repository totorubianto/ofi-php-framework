-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2020 at 04:03 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lks`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `judul`, `slug`, `isi`) VALUES
(2, 'Artikel lainnya Dari Kami', 'artikel-lainnya-dari-kami', '                    Curabitur porttitor arcu velit, non scelerisque dolor scelerisque at. Curabitur sollicitudin posuere ornare. Pellentesque hendrerit maximus mi, in accumsan leo malesuada id. Vestibulum vehicula eros eu erat fringilla fermentum. Donec sit amet rutrum est, vulputate ultricies est. Ut auctor nisl in feugiat lacinia. Duis porttitor, justo vel ultrices ullamcorper, metus libero pellentesque libero, a imperdiet leo odio vitae lorem. Fusce hendrerit, ipsum ut rhoncus rhoncus, justo libero scelerisque sem, sit amet pretium justo enim ut augue. Suspendisse bibendum ante sit amet tempus vulputate. Cras enim odio, auctor vitae rutrum ac, posuere ac ante. Pellentesque viverra arcu eu lorem elementum, ut vehicula nisi pharetra.                '),
(6, 'Banyumas Gawat Corona', 'banyumas-gawat-corona', 'Donec euismod massa tristique faucibus laoreet. Etiam interdum mollis justo, ac blandit eros. Donec ut ex et orci maximus vulputate. Praesent euismod, nibh eget sodales pharetra, dui diam ornare augue, ac laoreet odio purus euismod lorem. Sed ac elit ac eros malesuada ultricies finibus sed eros. Ut nec lacus iaculis, aliquam turpis at, varius libero. Nullam a imperdiet leo. Cras porta et ligula eu porttitor.'),
(9, 'Berita Corona 2', 'berita-corona-2', 'Donec euismod massa tristique faucibus laoreet. Etiam interdum mollis justo, ac blandit eros. Donec ut ex et orci maximus vulputate. Praesent euismod, nibh eget sodales pharetra, dui diam ornare augue, ac laoreet odio purus euismod lorem. Sed ac elit ac eros malesuada ultricies finibus sed eros. Ut nec lacus iaculis, aliquam turpis at, varius libero. Nullam a imperdiet leo. Cras porta et ligula eu porttitor.\r\n                                                ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
