-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Agu 2022 pada 12.18
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
  `content` text NOT NULL,
  `foto` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `id_kategori`, `users_id`, `judul`, `content`, `foto`, `tanggal`) VALUES
(2, 5, 2, 'Suasana Rumah Irjen Ferdy Sambo Pascapenetapan Tersangka Istrinya', '<p>Jakarta - Istri Irjen Ferdy Sambo, Putri Candrawathi (PC), ditetapkan sebagai tersangka terkait kasus pembunuhan berencana Brigadir Nopriansyah Yosua Hutabarat atau Brigadir J. Pascapenetapan tersangka, rumahnya terlihat sepi.<br>Pantauan detikcom di lokasi, Jumat (19/8/2022) pukul 19.25 WIB, tak tampak aktivitas di rumah pribadi Irjen Ferdy Sambo dan Putri Candrawathi di Jalan Saguling III, Duren Tiga, Jakarta Selatan (Jaksel). Tidak terlihat juga penjagaan dari aparat kepolisian sejak penetapan Putri sebagai tersangka sedari pukul 14.15 WIB.</p>\r\n<p>Hanya terlihat seorang petugas satpam di kediaman Irjen Ferdy Sambo dan Putri. Petugas satpam itu berjaga di depan rumah.</p>', '2022-08-19-566079408.jpeg', '2022-08-20 04:58:50'),
(3, 1, 2, 'Ini Alasan Casemiro Menerima Tawaran Manchester United', '<p><strong>Jakarta</strong> - Manchester United kembali akan kedatangan pemain baru yang mengisi lini tengah. Salah satu pemain paling berpengalaman di Real Madrid, Casemiro, dikabarkan sudah menerima tawaran Manchester United.&nbsp;</p>\r\n<p>Di sisi lain, Real Madrid tidak keberatan untuk memanfaatkan momen ini dengan melepas gelandang berusia 30 tahun tersebut. Los Merengues meraih berbagai trofi bersama Casemiro. Sebaliknya, Real Madrid pula yang membesarkan karier atau nama pemain asal Brasil tersebut.<br>Kini, Real Madrid akan menerima keuntungan dari penjualan Carlos Casemiro. Nilai transfernya diprediksi antara 60 juta euro hingga 70 juta euro. Jika harga kemungkinan sudah diketahui dengan kisaran tersebut namun soal motif yang membuat Casemiro bersedia menerima tawaran dari Manchester United belum banyak terungkap.&nbsp;</p>\r\n<p>Seperti diketahui, Manchester United saat ini dalam situasi krisis internal menyusul kekalahan dua kali beruntun di awal Liga Inggris 2022-2023 ini. Ruang ganti Manchester United diyakini kembali tidak kondusif karena hasil tersebut. Ditambah dengan sikap fans yang menuntut pengunduran diri pemilik klub.</p>\r\n<p>Semua itu sangat bertolak belakang dengan situasi yang ada di Real Madrid. Apalagi, Casemiro bergabung dengan klub yang justru tidak bermain di Liga Champions melainkan di Liga Europa.&nbsp;</p>\r\n<p>Oleh sebab itu, tidak sedikit pihak yang terkejut dengan keputusan Casemiro yang mau keluar dari klub sebesar Real Madrid. Meski demikian, nama besar Manchester United tetaplah menjadi pertimbangan lain dari alasan keputusan Casemiro.</p>\r\n<p>Lalu, ada tiga faktor utama yang tampaknya dapat jadi alasan mengapa Casemiro meninggalkan Real Madrid dan memilih bergabung ke Manchester United.</p>\r\n<p>1. Kariernya di Real Madrid sudah Selesai</p>\r\n<p>Alasan pertama adalah Casemiro sudah pasti berpikir bahwa waktunya di Real Madrid sudah selesai. Pasalnya, ia sudah memenangkan hampir semua gelar dengan jumlah yang mengesankan. Lebih dari 15 gelar besar diraih Casemiro sejak bergabung ke Real Madrid pada 2015.</p>\r\n<p>Termasuk tentu saja lima trofi Liga Champions yang telah diraihnya bersama Real Madrid. Carlos Casemiro memerankan peran penting dari semua pencapaian Real Madrid meraih gelar bersama dirinya.<br>2. Tantangan Baru</p>\r\n<p>Pelatih Real Madrid, Carlo Ancelotti, pada Jumat, 19 Agustus 2022 telah mengonfirmasi bahwa kepergian Casemiro ke Manchester United karena ingin tantangan baru. Alasan tantangan baru ini sebenarnya telah menjawab pertanyaan mengapa dirinya mau bermain di klub yang tidak tampil di Liga Champions.</p>\r\n<p>Soal gelar Liga Champions, Casemiro seperti yang dijelaskan di atas telah meraihnya. Casemiro salah satu gelandang terbaik yang pernah bermain di Real Madrid di ajang Liga Champions.</p>\r\n<p>Kini, bermain di Liga Europa, ia bakal merasa tanpa beban. Sebaliknya, dengan menerima tawaran Manchester United, ini menjadi tantangan bagi Casemiro untuk membantu klub raksasa Liga Inggris ini bangkit kembali.</p>\r\n<p>3. Gaji yang Besar</p>\r\n<p>Terakhir atau faktor gaji. Besarnya gaji yang ditawarkan Manchester United kepada Casemiro dikabarkan melebihi yang diterima dari Real Madrid. Menurut The Sun, Manchester United akan memberikan gaji dua kali lebih besar dari yang diterima Casemiro di Real Madrid.</p>\r\n<p>Bintang asal Brasil ini, disebut-sebut akan menerima 18,2 juta pounds per tahun (sekitar Rp 316,585 miliar) atau 350 ribu pounds (sekitar Rp 6,154 miliar) per pekannya. Jumlah tersebut menempatkannya di posisi ketiga pemain Manchester United dengan gaji terbesar.</p>', '2022-08-20-1861974906.jpg', '2022-08-20 05:01:00');

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
(1, 'Olahraga'),
(2, 'Gaya Hidup'),
(4, 'Makanan'),
(5, 'Kriminal');

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
(2, 'Salman Alfarissy', 'salman', '827ccb0eea8a706c4c34a16891f84e7b', 0, '2022-08-19-755062346.png'),
(4, 'admin', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 0, '2022-08-19-1294782439.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
