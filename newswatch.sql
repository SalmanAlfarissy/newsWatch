-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Sep 2022 pada 13.43
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newswatch`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL,
  `foto` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `id_kategori`, `users_id`, `judul`, `content`, `foto`, `tanggal`) VALUES
(16, 6, 4, 'Hasil Indonesia Vs Curacao 2-1: Witan \"Menari\", Garuda Menang berkat Gol Dendy', '<p><strong>NewsWatch.com</strong> &ndash; Timnas Indonesia dipastikan berhasil meraih kemenangan 2-1 atas Curacao dalam FIFA Matchday. Laga timnas Indonesia vs Curacao dalam jadwal FIFA Matchday 2022 diselenggarakan di Stadion Pakansari, Cibinong, Bogor, pada Selasa (27/9/2022).</p>\r\n<p>Pertandingan ini berlangsung dengan tensi tinggi. Bahkan, wasit sempat mengeluarkan satu kartu merah dari kantongnya buat pemain Curacao, Juninho Bacuna. Terlepas dari itu, timnas Indonesia berhasil memenangi pertandingan 2-1 atas Curacao setelah Dimas Drajad dan Dendy Sulistyawan mencatatkan namanya di papan skor.</p>\r\n<p>Di lain sisi, Curacao menyarangkan satu gol ke gawang timnas Indonesia melalui aksi Jeremy Antonisse.</p>\r\n<p>Timnas Indonesia langsung memberikan kejutan. Ya, skuad Garuda mampu membobol gawang Curacao melalui Dimas Drajad pada menit ke-3. Semuanya bermula dari tembakan keras Witan Sulaeman dari luar kotak penalti yang tak mampu ditepis secara sempurna oleh kiper Curacao, Tyrick Bodak. Dimas Drajad berada di posisi yang tepat setelah bola tepisan Tyrick Bodak bergerak liar. Ia pun berhasil menceploskan bola ke gawang Curacao guna membuat Indonesia unggul 1-0.</p>\r\n<p>&nbsp;</p>', '2022-09-28-722036797.jpeg', '2022-09-28 09:22:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(2, 'Gaya Hidup'),
(4, 'Makanan'),
(5, 'Kriminal'),
(6, 'Olahraga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(11) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `level`, `foto`) VALUES
(4, 'admin', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 0, '2022-08-19-1294782439.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `users_id` (`users_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
