-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 27 Bulan Mei 2019 pada 12.02
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fais_gis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempat`
--

CREATE TABLE `tempat` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `longtitude` double NOT NULL,
  `langtitude` double NOT NULL,
  `url` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tempat`
--

INSERT INTO `tempat` (`id`, `nama`, `deskripsi`, `longtitude`, `langtitude`, `url`, `gambar`) VALUES
(31, 'united futsal stadium', 'kjlksjdklxzlcjlzkjclkjz', 110.8414366, -6.7823043, 'https://www.google.com/maps/place/6%C2%B046\'55.9%22S+110%C2%B050\'32.8%22E/@-6.7823043,110.8414366,18.08z/data=!4m5!3m4!1s0x0:0x0!8m2!3d-6.7821824!4d110.8424467?hl=en', 'WhatsApp Image 2019-05-26 at 7.53.14 AM.jpeg'),
(32, 'quatrik futsal', 'akljkdljlsf0000', 110.8441352, -6.8140214, 'https://www.google.com/maps/place/Quatrick+Futsal+Stadium/@-6.8140214,110.8441352,17z/data=!3m1!4b1!4m5!3m4!1s0x2e70c4e78d9d0a5b:0x6e7994e4618aba5e!8m2!3d-6.8140214!4d110.8463239', 'WhatsApp Image 2019-05-25 at 10.56.16 AM.jpeg'),
(33, 'merdeka futsal', 'akjlkdjslkdj', 110.8248219, -6.8035427, 'https://www.google.com/maps/place/6%C2%B048\'12.9%22S+110%C2%B049\'33.8%22E/@-6.8035427,110.8248219,17.75z/data=!4m5!3m4!1s0x0:0x0!8m2!3d-6.8035696!4d110.8260483?hl=en', 'WhatsApp Image 2019-05-25 at 10.56.00 AM.jpeg'),
(34, 'centro fitnes', 'ls;djs;djslkdjlskd', 110.8416679, -6.8094718, 'https://www.google.com/maps/place/Centro+Billiard/@-6.8094718,110.8416679,20.71z/data=!4m13!1m7!3m6!1s0x0:0x0!2zNsKwNDgnMzQuMyJTIDExMMKwNTAnMzAuMyJF!3b1!8m2!3d-6.8095169!4d110.8417595!3m4!1s0x0:0xecba9a00ca66b3fe!8m2!3d-6.8094006!4d110.8418322?hl=en', 'WhatsApp Image 2019-05-25 at 10.56.27 AM.jpeg'),
(35, 'rumah biliard [sumber agung]', 'ksjdlsjfkldjfkljdf', 110.8449087, -6.8128466, 'https://www.google.com/maps/place/6%C2%B048\'46.0%22S+110%C2%B050\'46.2%22E/@-6.8128466,110.8449087,18.04z/data=!4m5!3m4!1s0x0:0x0!8m2!3d-6.8127672!4d110.8461648?hl=en', 'WhatsApp Image 2019-05-25 at 10.55.56 AM.jpeg'),
(36, 'markas stadium', 'alskalkslaks', 110.8416271, -6.8172159, 'https://www.google.com/maps/place/6%C2%B049\'02.1%22S+110%C2%B050\'30.7%22E/@-6.8172159,110.8416271,20.25z/data=!4m5!3m4!1s0x0:0x0!8m2!3d-6.8172572!4d110.8418523?hl=en', '1558878711_WhatsApp Image 2019-05-25 at 10.56.10 AM.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tempat`
--
ALTER TABLE `tempat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tempat`
--
ALTER TABLE `tempat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
