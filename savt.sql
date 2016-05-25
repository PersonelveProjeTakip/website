-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 25 May 2016, 16:59:39
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
(4, 'Rusça'),
(7, 'İspanyolca'),
(8, 'İtalyanca'),
(9, 'Japonca'),
(10, 'Arapça'),
(12, 'Çince'),
(13, 'Urduca');

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

--
-- Tablo döküm verisi `employee`
--

INSERT INTO `employee` (`id`, `fname`, `lname`, `bdate`, `sex`, `tc`, `medeni_hal`, `point`, `maas`) VALUES
(46, 'Halil İbrahim', 'UÇUN', '1983-04-04', 'Bay', '15478423540', 'Evli', 4600, 5000),
(43, 'Hilal', 'KOÇ', '1988-01-25', 'Bayan', '12548795141', 'Bekar', 2400, 3000),
(44, 'Ahmet', 'İNAN', '1978-06-18', 'Bay', '45654854131', 'Evli', 7250, 8150),
(45, 'Furkan', 'SERDAROĞLU', '1976-08-17', 'Bay', '68212145621', 'Evli', 6450, 6810),
(47, 'Muhammet Emin', 'KAYA', '1967-06-25', 'Bay', '45121541243', 'Evli', 7500, 9000),
(48, 'Sinem', 'YILDIZ', '1991-02-01', 'Bayan', '35462119054', 'Bekar', 3000, 3200),
(49, 'Musa', 'SÜSLÜ', '1985-02-13', 'Bay', '54545121454', 'Evli', 2600, 2700),
(50, 'Kasım', 'DEMİR', '1993-12-31', 'Bay', '15457875544', 'Bekar', 1650, 2000),
(51, 'Fatih', 'ÖZCAN', '1978-01-15', 'Bay', '32125654454', 'Evli', 5700, 6000),
(52, 'Recep', 'AKYURT', '1975-04-30', 'Bay', '23545484547', 'Evli', 4500, 5000),
(53, 'Derya', 'YÜKSEK', '1986-02-28', 'Bayan', '12354556152', 'Bekar', 2700, 2870),
(54, 'Harun', 'YILMAZ', '1982-05-12', 'Bay', '32564152159', 'Evli', 4350, 4590),
(55, 'Beyza', 'KORKMAZ', '1987-03-14', 'Bayan', '32154541251', 'Evli', 3000, 3300),
(56, 'Ebru', 'AKÇAY', '1980-04-16', 'Bayan', '51545452124', 'Evli', 3950, 4340),
(57, 'Yusuf', 'GÜNDAY', '1990-12-25', 'Bay', '56645256256', 'Bekar', 1500, 1750),
(58, 'Tuğba', 'GÜNEŞ', '1972-11-30', 'Bayan', '54487455151', 'Evli', 5000, 5250),
(59, 'Salih', 'DEMİREL', '1986-09-10', 'Bay', '14545415152', 'Evli', 2400, 2750),
(60, 'Yasin', 'ÇAYIROĞLU', '1989-04-05', 'Bay', '23156982147', 'Evli', 4500, 5000),
(61, 'Ayşe', 'BULUT', '1980-04-16', 'Bayan', '24545487787', 'Evli', 3600, 4000),
(62, 'Seda', 'KURT', '1990-07-11', 'Bayan', '25687451236', 'Bekar', 3500, 3750);

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

--
-- Tablo döküm verisi `employee_com`
--

INSERT INTO `employee_com` (`id`, `e_id`, `com_id`, `value`) VALUES
(91, 45, 1, '5362262079'),
(92, 46, 1, '5425309917'),
(86, 43, 1, '5324119656'),
(87, 43, 2, 'hilalkoc@hotmail.com'),
(88, 44, 1, '5423615111'),
(89, 44, 2, 'ahmetinan@gmail.com'),
(90, 45, 2, 'furkanserdaroglu@gmail.com'),
(93, 46, 2, 'halilibrahim@gmail.com'),
(94, 47, 1, '5312154515'),
(95, 47, 2, 'eminkaya@gmail.com'),
(96, 48, 1, '5568166958'),
(97, 48, 2, 'sinemyildiz@gmail.com'),
(98, 49, 2, 'musasuslu@gmail.com'),
(99, 49, 1, '5062358454'),
(100, 50, 1, '5416548415'),
(101, 50, 2, 'kasimdemir@gmail.com'),
(102, 51, 1, '5442154544'),
(103, 51, 2, 'fatihozcan@gmail.com'),
(104, 52, 1, '5314554747'),
(105, 52, 2, 'recepakyurt@gmail.com'),
(106, 53, 1, '5415641262'),
(107, 53, 2, 'deryayuksek@yandex.com'),
(108, 54, 1, '5313265521'),
(109, 54, 2, 'harunyilmaz@hotmail.com'),
(110, 55, 1, '5334515413'),
(111, 55, 2, 'beyzakorkmaz@gmail.com'),
(112, 56, 1, '5075645441'),
(113, 56, 2, 'ebruakcay@gmail.com'),
(114, 57, 2, 'yusuf@yandex.com'),
(115, 57, 1, '5362584515'),
(116, 58, 1, '5324541232'),
(117, 58, 2, 'tugbagunes@yandex.com'),
(118, 59, 1, '5321545154'),
(119, 59, 2, 'salih@gmail.com'),
(120, 60, 1, '5462114961'),
(121, 60, 2, 'yasin.cayiroglu@gmail.com'),
(122, 61, 1, '5321412511'),
(123, 61, 2, 'aysebulut@gmail.com'),
(124, 62, 1, '5056714568'),
(125, 62, 2, 'sedakurt@gmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `employee_dil`
--

CREATE TABLE `employee_dil` (
  `id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `dil_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `employee_dil`
--

INSERT INTO `employee_dil` (`id`, `e_id`, `dil_id`) VALUES
(215, 47, 10),
(211, 46, 3),
(210, 46, 2),
(202, 43, 4),
(206, 44, 7),
(205, 44, 3),
(209, 46, 1),
(208, 45, 4),
(207, 45, 1),
(204, 44, 2),
(203, 44, 1),
(201, 43, 1),
(214, 47, 4),
(213, 47, 2),
(212, 47, 1),
(217, 48, 3),
(216, 48, 1),
(221, 49, 10),
(220, 49, 9),
(219, 49, 3),
(218, 49, 1),
(223, 50, 3),
(222, 50, 1),
(228, 51, 12),
(227, 51, 9),
(226, 51, 4),
(225, 51, 3),
(224, 51, 1),
(232, 52, 8),
(231, 52, 3),
(230, 52, 2),
(229, 52, 1),
(234, 53, 9),
(233, 53, 1),
(238, 54, 10),
(237, 54, 8),
(236, 54, 7),
(235, 54, 1),
(241, 55, 3),
(240, 55, 2),
(239, 55, 1),
(245, 56, 12),
(244, 56, 9),
(243, 56, 4),
(242, 56, 1),
(260, 57, 2),
(259, 57, 1),
(250, 58, 8),
(249, 58, 7),
(248, 58, 1),
(253, 59, 9),
(252, 59, 4),
(251, 59, 1),
(254, 60, 1),
(257, 61, 7),
(256, 61, 2),
(255, 61, 1),
(258, 62, 1),
(261, 57, 13);

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
(41, 'Ömer Faruk', 'AKTAŞ', '1994-06-30', 'Bay', '78454548745', 'Evli', 1750, 0),
(47, 'Onur', 'ACAR', '1991-10-15', 'Bay', '62154515145', 'Bekar', 1800, 0),
(48, 'İsmail', 'LALELİ', '1995-05-06', 'Bay', '15454548789', 'Bekar', 1400, 0),
(52, 'Fatma', 'AYDIN', '1992-01-30', 'Bayan', '54548745126', 'Bekar', 1300, 0),
(59, 'Ali', 'AKYÜREK', '1989-05-07', 'Bay', '25671463254', 'Evli', 2250, 0),
(60, 'Metehan', 'GENÇ', '1984-09-29', 'Bay', '25612849682', 'Bekar', 2300, 0),
(79, 'ibrahim', 'HEYİK', '1991-05-01', 'Bay', '65495585565', 'Bekar', 3250, 0),
(69, 'Ubeydullah', 'ERDEMİR', '1997-01-12', 'Bay', '45844545454', 'Bekar', 1400, 2120),
(71, 'Elif', 'YALÇIN', '1994-11-30', 'Bayan', '17174815154', 'Bekar', 1300, 0),
(72, 'Mehmet ikbal', 'KARACA', '1996-03-20', 'Bay', '21545451548', 'Bekar', 1150, 0),
(73, 'Lale', 'YILDIRIM', '1989-11-25', 'Bayan', '44665487848', 'Bekar', 2400, 0);

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
(80, 41, 2, 'omer_23@hotmail.com'),
(79, 41, 1, '5384884547'),
(91, 47, 1, '5057314651'),
(92, 47, 2, 'onuracar@gmail.com'),
(93, 48, 2, 'ismaillaleli@gmail.com'),
(94, 48, 1, '5301445478'),
(101, 52, 1, '5335451221'),
(102, 52, 2, 'fatmaaydin@gmail.com'),
(115, 59, 1, '5336415112'),
(116, 59, 2, 'a.akyurek34@gmail.com'),
(117, 60, 1, '5317400826'),
(118, 60, 2, 'gmetehan@yandex.com'),
(155, 79, 2, 'ibrahim_hyk@hotmail.com'),
(156, 79, 1, '5418798955'),
(135, 69, 2, 'u.erdemir@gmail.com'),
(136, 69, 1, '5385448654'),
(139, 71, 1, '5334584587'),
(140, 71, 2, 'elifyalcin@hotmail.com'),
(141, 72, 1, '5546458784'),
(142, 72, 2, 'mehmetkaraca@gmail.com'),
(143, 73, 1, '5457412154'),
(144, 73, 2, 'laleyildirim@hotmail.com');

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
(108, 41, 7),
(107, 41, 3),
(106, 41, 1),
(231, 79, 1),
(230, 79, 3),
(123, 47, 1),
(124, 47, 3),
(151, 48, 7),
(150, 48, 3),
(149, 48, 1),
(144, 52, 1),
(145, 52, 3),
(177, 59, 10),
(176, 59, 3),
(175, 59, 1),
(179, 60, 2),
(178, 60, 1),
(229, 79, 10),
(200, 69, 10),
(201, 69, 3),
(202, 69, 1),
(205, 71, 1),
(206, 72, 1),
(207, 72, 3),
(208, 72, 10),
(209, 73, 1),
(210, 73, 2),
(211, 73, 7);

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
(96, 41, 6),
(95, 41, 2),
(97, 41, 7),
(131, 47, 1),
(132, 47, 5),
(133, 47, 13),
(134, 47, 15),
(190, 48, 20),
(189, 48, 19),
(188, 48, 14),
(187, 48, 4),
(186, 48, 2),
(176, 52, 8),
(177, 52, 9),
(178, 52, 10),
(179, 52, 11),
(255, 59, 15),
(254, 59, 11),
(253, 59, 10),
(252, 59, 9),
(251, 59, 4),
(250, 59, 1),
(259, 60, 19),
(258, 60, 14),
(257, 60, 7),
(256, 60, 6),
(353, 79, 1),
(352, 79, 5),
(351, 79, 19),
(350, 79, 20),
(299, 69, 19),
(300, 69, 6),
(301, 69, 1),
(307, 71, 1),
(308, 71, 9),
(309, 71, 10),
(310, 71, 11),
(311, 71, 13),
(312, 71, 15),
(313, 72, 2),
(314, 72, 6),
(315, 72, 19),
(316, 73, 4),
(317, 73, 5),
(318, 73, 15),
(319, 73, 18),
(320, 73, 20);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `employee_yetenek`
--

CREATE TABLE `employee_yetenek` (
  `id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `y_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `employee_yetenek`
--

INSERT INTO `employee_yetenek` (`id`, `e_id`, `y_id`) VALUES
(306, 44, 18),
(305, 44, 15),
(304, 44, 11),
(316, 46, 7),
(315, 46, 6),
(310, 45, 7),
(309, 45, 6),
(308, 45, 2),
(307, 45, 1),
(303, 44, 10),
(302, 44, 9),
(301, 44, 8),
(300, 44, 6),
(299, 43, 15),
(298, 43, 14),
(297, 43, 13),
(296, 43, 11),
(295, 43, 10),
(294, 43, 9),
(293, 43, 8),
(292, 43, 6),
(291, 43, 5),
(314, 46, 5),
(313, 46, 4),
(312, 46, 2),
(311, 46, 1),
(328, 47, 19),
(327, 47, 18),
(326, 47, 15),
(325, 47, 13),
(324, 47, 11),
(323, 47, 10),
(322, 47, 9),
(321, 47, 7),
(320, 47, 6),
(319, 47, 5),
(318, 47, 2),
(317, 47, 1),
(334, 48, 18),
(333, 48, 15),
(332, 48, 11),
(331, 48, 6),
(330, 48, 4),
(329, 48, 1),
(340, 49, 20),
(339, 49, 19),
(338, 49, 15),
(337, 49, 6),
(336, 49, 5),
(335, 49, 4),
(348, 50, 19),
(347, 50, 15),
(346, 50, 11),
(345, 50, 10),
(344, 50, 9),
(356, 51, 19),
(355, 51, 18),
(354, 51, 15),
(353, 51, 7),
(352, 51, 6),
(351, 51, 5),
(350, 51, 2),
(349, 51, 1),
(364, 52, 19),
(363, 52, 15),
(362, 52, 13),
(361, 52, 11),
(360, 52, 7),
(359, 52, 6),
(358, 52, 2),
(357, 52, 1),
(373, 53, 18),
(372, 53, 15),
(371, 53, 14),
(370, 53, 13),
(369, 53, 11),
(368, 53, 10),
(367, 53, 9),
(366, 53, 8),
(365, 53, 5),
(383, 54, 19),
(382, 54, 18),
(381, 54, 15),
(380, 54, 14),
(379, 54, 13),
(378, 54, 11),
(377, 54, 10),
(376, 54, 9),
(375, 54, 8),
(374, 54, 5),
(389, 55, 20),
(388, 55, 19),
(387, 55, 18),
(386, 55, 15),
(385, 55, 11),
(384, 55, 4),
(396, 56, 15),
(395, 56, 14),
(394, 56, 13),
(393, 56, 11),
(392, 56, 10),
(391, 56, 9),
(390, 56, 8),
(431, 57, 11),
(430, 57, 10),
(429, 57, 9),
(428, 57, 8),
(427, 57, 6),
(407, 58, 19),
(406, 58, 18),
(405, 58, 15),
(404, 58, 7),
(403, 58, 6),
(402, 58, 2),
(413, 59, 20),
(412, 59, 13),
(411, 59, 5),
(410, 59, 4),
(409, 59, 2),
(408, 59, 1),
(416, 60, 20),
(415, 60, 7),
(414, 60, 6),
(420, 61, 19),
(419, 61, 13),
(418, 61, 2),
(417, 61, 1),
(426, 62, 18),
(425, 62, 15),
(424, 62, 11),
(423, 62, 7),
(422, 62, 6),
(421, 62, 2),
(343, 50, 8),
(342, 50, 5),
(341, 50, 4);

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

--
-- Tablo döküm verisi `proje`
--

INSERT INTO `proje` (`id`, `isim`, `start_date`, `finish_date`, `puan`) VALUES
(19, 'Veri Tabanı Verilerini Yedekleme ve Güncelleme', '2016-05-08', '2016-05-15', 3000),
(20, 'Web Sitesinin Tasarımın Yenilenmesi', '2016-05-16', '2016-05-23', 1500),
(21, 'SmartCity Projesi', '2016-05-30', '2017-05-30', 5500),
(22, 'Araç Takip Cihazlarındaki Sensörlerin Yazılım Güncellemeleri', '2016-05-12', '2016-06-12', 2200),
(23, 'Araç Takip Mobil Uygulaması İyileştirmeleri', '2016-05-17', '2016-06-25', 2400),
(24, 'Navigasyon Sisteminin Arayüz Tasarımı', '2016-05-24', '2016-06-06', 2000);

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

--
-- Tablo döküm verisi `proje_bitmis`
--

INSERT INTO `proje_bitmis` (`id`, `isim`, `start_date`, `finish_date`, `puan`) VALUES
(7, 'Web Sitesi Eklentilerindeki Sorunların Giderilmesi', '2016-06-15', '2016-07-15', 2000);

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

--
-- Tablo döküm verisi `proje_bitmis_to_employee`
--

INSERT INTO `proje_bitmis_to_employee` (`id`, `p_id`, `name`, `surname`, `point`) VALUES
(11, 7, 'Ebru', 'AKÇAY', 150),
(10, 7, 'Harun', 'YILMAZ', 150),
(9, 7, 'Derya', 'YÜKSEK', 200),
(8, 7, 'Ahmet', 'İNAN', 250);

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
(22, 'Bireysel Araç Takip Projesi', '2016-05-20', '2016-10-20', 5000),
(20, 'GIS Uygulamaların Web Sitesinde Güncellenmesi', '2016-06-20', '2016-07-30', 2500),
(24, 'GPS Tabanlı Gözlem', '2016-05-31', '2016-07-31', 3500);

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
(33, 4, 11),
(128, 19, 58),
(127, 19, 55),
(126, 19, 54),
(125, 19, 51),
(129, 19, 62),
(123, 22, 61),
(117, 20, 57),
(124, 19, 48),
(116, 20, 53),
(115, 20, 50),
(114, 20, 43),
(96, 21, 44),
(97, 21, 45),
(98, 21, 47),
(99, 21, 51),
(101, 23, 46),
(102, 23, 49),
(103, 23, 59),
(104, 23, 60),
(122, 22, 56),
(121, 22, 55),
(120, 22, 52),
(119, 22, 49),
(118, 22, 46),
(110, 24, 45),
(111, 24, 52),
(112, 24, 58),
(113, 24, 60);

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
(1, 'JAVA'),
(2, 'C#'),
(4, 'ANDROID'),
(5, 'PYHTON'),
(6, 'C'),
(7, 'C++'),
(8, 'PHP'),
(9, 'HTML'),
(10, 'CSS'),
(11, 'JAVASCRIPT'),
(13, 'JSF'),
(14, 'RUBY'),
(15, 'MySQL'),
(18, 'POSTGRESQL'),
(19, 'MATLAB'),
(20, 'SWIFT');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Tablo için AUTO_INCREMENT değeri `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- Tablo için AUTO_INCREMENT değeri `employee_com`
--
ALTER TABLE `employee_com`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
--
-- Tablo için AUTO_INCREMENT değeri `employee_dil`
--
ALTER TABLE `employee_dil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;
--
-- Tablo için AUTO_INCREMENT değeri `employee_pool`
--
ALTER TABLE `employee_pool`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- Tablo için AUTO_INCREMENT değeri `employee_pool_com`
--
ALTER TABLE `employee_pool_com`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;
--
-- Tablo için AUTO_INCREMENT değeri `employee_pool_dil`
--
ALTER TABLE `employee_pool_dil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;
--
-- Tablo için AUTO_INCREMENT değeri `employee_pool_yetenek`
--
ALTER TABLE `employee_pool_yetenek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=360;
--
-- Tablo için AUTO_INCREMENT değeri `employee_yetenek`
--
ALTER TABLE `employee_yetenek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=452;
--
-- Tablo için AUTO_INCREMENT değeri `proje`
--
ALTER TABLE `proje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Tablo için AUTO_INCREMENT değeri `proje_bitmis`
--
ALTER TABLE `proje_bitmis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Tablo için AUTO_INCREMENT değeri `proje_bitmis_to_employee`
--
ALTER TABLE `proje_bitmis_to_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Tablo için AUTO_INCREMENT değeri `proje_pool`
--
ALTER TABLE `proje_pool`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- Tablo için AUTO_INCREMENT değeri `proje_to_employee`
--
ALTER TABLE `proje_to_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
--
-- Tablo için AUTO_INCREMENT değeri `yetenek`
--
ALTER TABLE `yetenek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
