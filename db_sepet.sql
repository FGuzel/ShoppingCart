-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 05 Haz 2020, 11:11:02
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `db_sepet`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `urun_id` int(11) NOT NULL,
  `urun_adi` varchar(255) NOT NULL,
  `urun_detay` varchar(500) NOT NULL,
  `urun_fiyat` float NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `img_alt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`urun_id`, `urun_adi`, `urun_detay`, `urun_fiyat`, `img_url`, `img_alt`) VALUES
(1, 'Kombinli Siyah Kadın Kol Saati', 'Kombinli Siyah Kadın Kol Saati', 100, 'urun1.jpg', 'urun1 alt açıklaması'),
(3, 'Kombinli Kırmızı Kadın Kol Saati', 'Kombinli Kırmızı Kadın Kol Saati', 50, 'urun2.jpg', 'urun2 alt açıklaması'),
(4, 'Kombinli Lacivert Kadın Kol Saati', 'Kombinli Lacivert Kadın Kol Saati', 10, 'urun3.jpg', 'urun3 alt açıklaması'),
(5, 'Kombinli Yeşil Kadın Kol Saati', 'Kombinli Yeşil Kadın Kol Saati', 20, 'urun4.jpg', 'urun4 alt açıklaması');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`urun_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
