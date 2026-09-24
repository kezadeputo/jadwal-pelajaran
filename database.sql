CREATE DATABASE IF NOT EXISTS jadwal_siswa;

USE jadwal_siswa;

DROP TABLE IF EXISTS jadwal;

CREATE TABLE jadwal (
    id INT AUTO_INCREMENT PRIMARY KEY,
    hari VARCHAR(20) NOT NULL,
    jp_mulai INT NOT NULL,
    jp_selesai INT NOT NULL,
    mata_pelajaran VARCHAR(150) NOT NULL,
    guru VARCHAR(100) DEFAULT NULL
);

INSERT INTO jadwal
(hari, jp_mulai, jp_selesai, mata_pelajaran, guru)
VALUES

-- SENIN
('Senin', 1, 1, 'Upacara', NULL),
('Senin', 2, 5, 'Informatika', NULL),
('Senin', 6, 9, 'Bahasa Inggris', NULL),

-- SELASA
('Selasa', 1, 2, 'Pendidikan Pancasila dan Kewarganegaraan', NULL),
('Selasa', 3, 6, 'Bahasa Indonesia', NULL),
('Selasa', 7, 9, 'Dasar-Dasar Pengembangan Perangkat Lunak dan Gim', NULL),

-- RABU
('Rabu', 1, 3, 'Pendidikan Jasmani, Olahraga dan Kesehatan', NULL),
('Rabu', 4, 6, 'Dasar-Dasar Pengembangan Perangkat Lunak dan Gim', NULL),
('Rabu', 7, 9, 'Projek Ilmu Pengetahuan Alam Dan Sosial', NULL),

-- KAMIS
('Kamis', 1, 2, 'Dasar-Dasar Pengembangan Perangkat Lunak dan Gim', NULL),
('Kamis', 3, 6, 'Matematika', NULL),
('Kamis', 7, 9, 'Pendidikan Agama Dan Budi Pekerti', NULL),

-- JUMAT
('Jumat', 1, 2, 'Dasar-Dasar Pengembangan Perangkat Lunak dan Gim', NULL),
('Jumat', 3, 4, 'Seni', NULL),

-- SABTU
('Sabtu', 1, 3, 'Projek Ilmu Pengetahuan Alam Dan Sosial', NULL),
('Sabtu', 4, 5, 'Dasar-Dasar Pengembangan Perangkat Lunak dan Gim', NULL),
('Sabtu', 6, 7, 'Sejarah', NULL);