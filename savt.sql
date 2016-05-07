-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 07 May 2016, 22:11:02
-- Sunucu sürümü: 5.7.11
-- PHP Sürümü: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `savt`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `communication`
--

CREATE TABLE `communication` (
  `id` int(11) NOT NULL,
  `value` varchar(32) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `communication`
--

INSERT INTO `communication` (`id`, `value`) VALUES
(1, 'mobil'),
(2, 'mail');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dil`
--

CREATE TABLE `dil` (
  `id` int(11) NOT NULL,
  `value` varchar(32) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `dil`
--

INSERT INTO `dil` (`id`, `value`) VALUES
(1, 'İngilizce'),
(2, 'Fransızca'),
(3, 'Almanca'),
(4, 'Rusça');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `fname` varchar(32) COLLATE utf8_turkish_ci NOT NULL,
  `lname` varchar(32) COLLATE utf8_turkish_ci NOT NULL,
  `bdate` date NOT NULL,
  `sex` varchar(5) COLLATE utf8_turkish_ci NOT NULL,
  `tc` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `medeni_hal` varchar(32) COLLATE utf8_turkish_ci NOT NULL,
  `point` double NOT NULL,
  `maas` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `employee_com`
--

CREATE TABLE `employee_com` (
  `id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `com_id` int(11) NOT NULL,
  `value` varchar(32) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `employee_dil`
--

CREATE TABLE `employee_dil` (
  `id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `dil_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `employee_pool`
--

CREATE TABLE `employee_pool` (
  `id` int(11) NOT NULL,
  `fname` varchar(32) COLLATE utf8_turkish_ci NOT NULL,
  `lname` varchar(32) COLLATE utf8_turkish_ci NOT NULL,
  `bdate` date NOT NULL,
  `sex` varchar(5) COLLATE utf8_turkish_ci NOT NULL,
  `tc` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `medeni_hal` varchar(32) COLLATE utf8_turkish_ci NOT NULL,
  `point` double NOT NULL,
  `maas` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `employee_pool`
--

INSERT INTO `employee_pool` (`id`, `fname`, `lname`, `bdate`, `sex`, `tc`, `medeni_hal`, `point`, `maas`) VALUES
(32, 'Ferhat Fikri', 'Minder', '1995-03-04', 'Bay', '12345678900', 'Evli', 2500, 0),
(33, 'Selim Sirac', 'Güler', '1995-05-05', 'Bay', '12345678900', 'Evli', 2500, 0),
(34, 'Cemal', 'Taşkıran', '1996-02-01', 'Bay', '12345678900', 'Bekar', 2500, 0),
(35, 'Burak', 'İdi', '1995-05-05', 'Bay', '12345678900', 'Bekar', 2500, 0),
(36, 'Burak', 'Öztürk', '1996-07-02', 'Bay', '12345678900', 'Bekar', 2000, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `employee_pool_com`
--

CREATE TABLE `employee_pool_com` (
  `id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `com_id` int(11) NOT NULL,
  `value` varchar(32) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `employee_pool_com`
--

INSERT INTO `employee_pool_com` (`id`, `e_id`, `com_id`, `value`) VALUES
(61, 32, 2, 'ferhatmndr@gmail.com'),
(67, 35, 2, 'idiburak60@gmail.com'),
(66, 34, 2, 'cemaltaskiran@gmail.com'),
(65, 34, 1, '5327414185'),
(64, 33, 2, 'selimsirac@gmail.com'),
(63, 33, 1, '5414161995'),
(62, 32, 1, '5428145777'),
(68, 35, 1, '5434360499'),
(69, 36, 2, 'bozturk96@gmail.com'),
(70, 36, 1, '5359812332');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `employee_pool_dil`
--

CREATE TABLE `employee_pool_dil` (
  `id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `dil_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `employee_pool_dil`
--

INSERT INTO `employee_pool_dil` (`id`, `e_id`, `dil_id`) VALUES
(87, 36, 4),
(77, 32, 1),
(79, 33, 2),
(78, 33, 1),
(76, 32, 2),
(75, 32, 3),
(86, 36, 3),
(85, 36, 1),
(84, 35, 3),
(83, 35, 1),
(82, 34, 1),
(81, 33, 4),
(80, 33, 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `employee_pool_yetenek`
--

CREATE TABLE `employee_pool_yetenek` (
  `id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `y_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `employee_pool_yetenek`
--

INSERT INTO `employee_pool_yetenek` (`id`, `e_id`, `y_id`) VALUES
(80, 35, 4),
(82, 36, 3),
(81, 36, 1),
(73, 32, 3),
(72, 32, 2),
(75, 33, 2),
(74, 33, 1),
(79, 35, 1),
(78, 34, 1),
(77, 33, 4),
(76, 33, 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `employee_yetenek`
--

CREATE TABLE `employee_yetenek` (
  `id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `y_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `proje`
--

CREATE TABLE `proje` (
  `id` int(11) NOT NULL,
  `isim` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  `start_date` date NOT NULL,
  `finish_date` date NOT NULL,
  `puan` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `proje_bitmis`
--

CREATE TABLE `proje_bitmis` (
  `id` int(11) NOT NULL,
  `isim` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  `start_date` date NOT NULL,
  `finish_date` date NOT NULL,
  `puan` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `proje_bitmis_to_employee`
--

CREATE TABLE `proje_bitmis_to_employee` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8_turkish_ci NOT NULL,
  `surname` varchar(32) COLLATE utf8_turkish_ci NOT NULL,
  `point` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `proje_pool`
--

CREATE TABLE `proje_pool` (
  `id` int(11) NOT NULL,
  `isim` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  `start_date` date NOT NULL,
  `finish_date` date NOT NULL,
  `puan` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `proje_pool`
--

INSERT INTO `proje_pool` (`id`, `isim`, `start_date`, `finish_date`, `puan`) VALUES
(9, 'Sistem Analizi', '2016-03-01', '2016-05-12', 3000),
(10, 'Nesneye Dayalı Programlama', '2016-05-14', '2016-05-30', 1500),
(11, 'Elektronik Devreler', '2016-04-15', '2016-05-24', 1500),
(12, 'Veri Yapıları ve Algoritmalar', '2016-02-15', '2016-05-24', 2500),
(13, 'Hesaplama Kuramı', '2016-02-15', '2016-05-24', 10),
(14, 'Selimin Ödevi', '2016-05-06', '2016-06-06', 7500);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `proje_to_employee`
--

CREATE TABLE `proje_to_employee` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `proje_to_employee`
--

INSERT INTO `proje_to_employee` (`id`, `p_id`, `e_id`) VALUES
(35, 4, 5),
(12, 2, 2),
(11, 2, 8),
(34, 4, 9),
(33, 4, 11);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yetenek`
--

CREATE TABLE `yetenek` (
  `id` int(11) NOT NULL,
  `value` varchar(32) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yetenek`
--

INSERT INTO `yetenek` (`id`, `value`) VALUES
(1, 'Java'),
(2, 'C#'),
(3, 'iOS'),
(4, 'Android');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `communication`
--
ALTER TABLE `communication`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `dil`
--
ALTER TABLE `dil`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `employee_com`
--
ALTER TABLE `employee_com`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `employee_dil`
--
ALTER TABLE `employee_dil`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `employee_pool`
--
ALTER TABLE `employee_pool`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `employee_pool_com`
--
ALTER TABLE `employee_pool_com`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `employee_pool_dil`
--
ALTER TABLE `employee_pool_dil`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `employee_pool_yetenek`
--
ALTER TABLE `employee_pool_yetenek`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `employee_yetenek`
--
ALTER TABLE `employee_yetenek`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `proje`
--
ALTER TABLE `proje`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `proje_bitmis`
--
ALTER TABLE `proje_bitmis`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `proje_bitmis_to_employee`
--
ALTER TABLE `proje_bitmis_to_employee`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `proje_pool`
--
ALTER TABLE `proje_pool`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `proje_to_employee`
--
ALTER TABLE `proje_to_employee`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yetenek`
--
ALTER TABLE `yetenek`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `communication`
--
ALTER TABLE `communication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `dil`
--
ALTER TABLE `dil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Tablo için AUTO_INCREMENT değeri `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- Tablo için AUTO_INCREMENT değeri `employee_com`
--
ALTER TABLE `employee_com`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- Tablo için AUTO_INCREMENT değeri `employee_dil`
--
ALTER TABLE `employee_dil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- Tablo için AUTO_INCREMENT değeri `employee_pool`
--
ALTER TABLE `employee_pool`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- Tablo için AUTO_INCREMENT değeri `employee_pool_com`
--
ALTER TABLE `employee_pool_com`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- Tablo için AUTO_INCREMENT değeri `employee_pool_dil`
--
ALTER TABLE `employee_pool_dil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- Tablo için AUTO_INCREMENT değeri `employee_pool_yetenek`
--
ALTER TABLE `employee_pool_yetenek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- Tablo için AUTO_INCREMENT değeri `employee_yetenek`
--
ALTER TABLE `employee_yetenek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- Tablo için AUTO_INCREMENT değeri `proje`
--
ALTER TABLE `proje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Tablo için AUTO_INCREMENT değeri `proje_bitmis`
--
ALTER TABLE `proje_bitmis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `proje_bitmis_to_employee`
--
ALTER TABLE `proje_bitmis_to_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `proje_pool`
--
ALTER TABLE `proje_pool`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Tablo için AUTO_INCREMENT değeri `proje_to_employee`
--
ALTER TABLE `proje_to_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- Tablo için AUTO_INCREMENT değeri `yetenek`
--
ALTER TABLE `yetenek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
