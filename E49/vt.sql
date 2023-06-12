-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 12 Haz 2023, 13:42:42
-- Sunucu sürümü: 8.0.31
-- PHP Sürümü: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `vt`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kayit`
--

DROP TABLE IF EXISTS `kayit`;
CREATE TABLE IF NOT EXISTS `kayit` (
  `NUMARA` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `AD` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `ADRES` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `BÖLÜM` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `MAAŞ` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kayit`
--

INSERT INTO `kayit` (`NUMARA`, `AD`, `ADRES`, `BÖLÜM`, `MAAŞ`) VALUES
('10', 'AYŞE', 'TEKİRDAĞ', 'BİLGİSAYAR', '2500'),
('11', 'MERT', 'İSTANBUL', 'ELEKTRONİK', '3000'),
('12', 'GİRAY', 'EDİRNE', 'ELEKTRİK', '3000'),
('13', 'BELGİN', 'EDİRNE', 'BİLGİSAYAR', '2700'),
('14', 'ÖMER', 'MALATYA', 'MAKİNE', '3100');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kayit2`
--

DROP TABLE IF EXISTS `kayit2`;
CREATE TABLE IF NOT EXISTS `kayit2` (
  `NUMARA` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `AD` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `ADRES` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `BÖLÜM` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kayit2`
--

INSERT INTO `kayit2` (`NUMARA`, `AD`, `ADRES`, `BÖLÜM`) VALUES
('12', 'AHMET', 'TEKİRDAĞ', 'BİLGİSAYAR'),
('13', 'AYŞE', 'EDİRNE', 'GIDA'),
('21', 'GİRAY', 'TEKİRDAĞ', 'ELEKTRONİK'),
('23', 'MERT', 'ANKARA', 'ELEKTRONİK'),
('26', 'BELGİN', 'EDİRNE', 'BİLGİSAYAR'),
('27', 'HAKAN', 'ANKARA', 'OTOMOTİV');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kayit3`
--

DROP TABLE IF EXISTS `kayit3`;
CREATE TABLE IF NOT EXISTS `kayit3` (
  `NUMARA` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `AD` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `ADRES` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `MAAŞ` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kayit3`
--

INSERT INTO `kayit3` (`NUMARA`, `AD`, `ADRES`, `MAAŞ`) VALUES
('10', 'AYŞE', 'TEKİRDAĞ', '6000'),
('11', 'MERT', 'İSTANBUL', '5500'),
('12', 'GİRAY', 'EDİRNE', '6500'),
('13', 'BELGİN', 'EDİRNE', '5000'),
('14', 'BERAT', 'TEKİRDAĞ', '9999'),
('20', 'CAN', 'ANTALYA', '9000');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kayit4`
--

DROP TABLE IF EXISTS `kayit4`;
CREATE TABLE IF NOT EXISTS `kayit4` (
  `NUMARA` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `AD` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ARASINAV` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `FİNAL` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kayit4`
--

INSERT INTO `kayit4` (`NUMARA`, `AD`, `ARASINAV`, `FİNAL`) VALUES
('2221', 'AYŞE', '70', '80'),
('3232', 'MERT', '50', '40'),
('5332', 'GİRAY', '90', '80'),
('3121', 'BELGİN', '30', '70'),
('7443', 'ÖMER', '40', '90'),
('9643', 'KADİR', '90', '100');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

DROP TABLE IF EXISTS `kullanici`;
CREATE TABLE IF NOT EXISTS `kullanici` (
  `KULLANICI` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `SIFRE` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`KULLANICI`, `SIFRE`) VALUES
('admin', '123');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

DROP TABLE IF EXISTS `kullanicilar`;
CREATE TABLE IF NOT EXISTS `kullanicilar` (
  `KA` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `SIFRE` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`KA`, `SIFRE`) VALUES
('admin', '202cb962ac59075b964b07152d234b70');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
