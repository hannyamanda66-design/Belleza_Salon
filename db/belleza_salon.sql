-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Okt 2026 pada 16.57
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belleza_salon`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `appointment`
--

CREATE TABLE `appointment` (
  `AppointmentID` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `StylistID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `appointment`
--

INSERT INTO `appointment` (`AppointmentID`, `Date`, `Time`, `Status`, `CustomerID`, `StylistID`) VALUES
(1, '2026-05-10', '10:00:00', 'Confirmed', 1, 2),
(2, '2026-05-20', '14:00:00', 'Pending', 1, 1),
(3, '2026-05-11', '11:00:00', 'Confirmed', 2, 3),
(4, '2026-05-12', '09:00:00', 'Completed', 3, 2),
(5, '2026-05-13', '15:00:00', 'Cancelled', 4, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `appointment_service`
--

CREATE TABLE `appointment_service` (
  `AppointmentID` int(11) NOT NULL,
  `ServiceID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `appointment_service`
--

INSERT INTO `appointment_service` (`AppointmentID`, `ServiceID`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 1),
(5, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`CustomerID`, `Name`, `Phone`, `Email`) VALUES
(1, 'Alice Johnson', '0812345678', 'alice@email.com'),
(2, 'Bob Smith', '0812998877', 'bob@email.com'),
(3, 'Clara Davis', '0855443322', 'clara@email.com'),
(4, 'David Wilson', '0877665544', 'david@email.com'),
(5, 'Eva Green', '0811223344', 'eva@email.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment`
--

CREATE TABLE `payment` (
  `PaymentID` int(11) NOT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  `Method` varchar(50) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `PaymentDate` date DEFAULT NULL,
  `AppointmentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `payment`
--

INSERT INTO `payment` (`PaymentID`, `Amount`, `Method`, `Status`, `PaymentDate`, `AppointmentID`) VALUES
(1, 150000.00, 'Credit Card', 'Success', '2026-05-10', 1),
(2, 850000.00, 'Cash', 'Pending', '2026-05-20', 2),
(3, 300000.00, 'E-Wallet', 'Success', '2026-05-11', 3),
(4, 150000.00, 'Credit Card', 'Success', '2026-05-12', 4),
(5, 0.00, 'None', 'Void', '2026-05-13', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `service`
--

CREATE TABLE `service` (
  `ServiceID` int(11) NOT NULL,
  `ServiceName` varchar(100) NOT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Duration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `service`
--

INSERT INTO `service` (`ServiceID`, `ServiceName`, `Price`, `Duration`) VALUES
(1, 'Basic Haircut', 150000.00, 45),
(2, 'Balayage Coloring', 850000.00, 180),
(3, 'Facial Treatment', 300000.00, 60),
(4, 'Manicure', 120000.00, 40),
(5, 'Bridal Makeup', 1500000.00, 120);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stylist`
--

CREATE TABLE `stylist` (
  `StylistID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Specialty` varchar(50) DEFAULT NULL,
  `YearsExperience` int(11) DEFAULT NULL,
  `Rating` decimal(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `stylist`
--

INSERT INTO `stylist` (`StylistID`, `Name`, `Specialty`, `YearsExperience`, `Rating`) VALUES
(1, 'Hanny', 'Hair Coloring', 5, 4.8),
(2, 'Neilil', 'Haircut & Styling', 4, 4.9),
(3, 'Amanda', 'Skincare', 3, 4.7),
(4, 'Isalmi', 'Nail Art', 6, 4.5),
(5, 'Alia', 'Makeup', 2, 4.6);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`AppointmentID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `StylistID` (`StylistID`);

--
-- Indeks untuk tabel `appointment_service`
--
ALTER TABLE `appointment_service`
  ADD PRIMARY KEY (`AppointmentID`,`ServiceID`),
  ADD KEY `ServiceID` (`ServiceID`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indeks untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `AppointmentID` (`AppointmentID`);

--
-- Indeks untuk tabel `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`ServiceID`);

--
-- Indeks untuk tabel `stylist`
--
ALTER TABLE `stylist`
  ADD PRIMARY KEY (`StylistID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `appointment`
--
ALTER TABLE `appointment`
  MODIFY `AppointmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `payment`
--
ALTER TABLE `payment`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `service`
--
ALTER TABLE `service`
  MODIFY `ServiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `stylist`
--
ALTER TABLE `stylist`
  MODIFY `StylistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`StylistID`) REFERENCES `stylist` (`StylistID`);

--
-- Ketidakleluasaan untuk tabel `appointment_service`
--
ALTER TABLE `appointment_service`
  ADD CONSTRAINT `appointment_service_ibfk_1` FOREIGN KEY (`AppointmentID`) REFERENCES `appointment` (`AppointmentID`),
  ADD CONSTRAINT `appointment_service_ibfk_2` FOREIGN KEY (`ServiceID`) REFERENCES `service` (`ServiceID`);

--
-- Ketidakleluasaan untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`AppointmentID`) REFERENCES `appointment` (`AppointmentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
