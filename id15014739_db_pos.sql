-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 25, 2021 at 10:50 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id15014739_db_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kode_barcode` varchar(50) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kategori` enum('Perabotan Rumah Tangga','Barang Unik') NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `profit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kode_barcode`, `nama_barang`, `kategori`, `satuan`, `stok`, `harga_beli`, `harga_jual`, `profit`) VALUES
('123', 'bagor', 'Barang Unik', 'PCS', 52, 20000, 23000, 3000),
('56', 'ciki', 'Perabotan Rumah Tangga', 'PCS', 6, 10000, 13000, 3000),
('ALTCKR55', 'ALAT CUKUR', 'Barang Unik', 'PCS', 29, 50000, 55000, 5000),
('ALTKBN25', 'ALAT KEBUN', 'Perabotan Rumah Tangga', 'PCS', 25, 18000, 25000, 7000),
('BAL45', 'BALMUT (BANTAL SELIMUT)', 'Barang Unik', 'PCS', 2, 40000, 45000, 5000),
('BANDDK22', 'BANTAL DUDUK', 'Perabotan Rumah Tangga', 'PCS', 18, 18000, 22000, 4000),
('BASK005', 'BASKOM PLASTIK', 'Perabotan Rumah Tangga', 'PCS', 30, 3500, 5000, 1500),
('BKMBU12', 'BASKOM BUNGA PLASTIK', 'Barang Unik', 'PCS', 53, 10000, 12000, 2000),
('BLENDAG90', 'BLENDER DAGING', 'Perabotan Rumah Tangga', 'PCS', 8, 84000, 90000, 6000),
('BLND83', 'BLENDER KAPSUL', 'Perabotan Rumah Tangga', 'PCS', 26, 73000, 83000, 10000),
('BLNDR52', 'BLENDER PORTABLE', 'Barang Unik', 'PCS', 34, 47000, 52000, 5000),
('BLNDTRK27', 'BLENDER TARIK MANUAL', 'Barang Unik', 'PCS', 4, 22000, 27000, 5000),
('BNG15', 'BUNGA HIAS KECIL', 'Barang Unik', 'PCS', 29, 12000, 15000, 3000),
('BNG35', 'BUNGA HIAS BESAR', 'Barang Unik', 'PCS', 19, 28000, 35000, 7000),
('BNGK40', 'BANGKU TAIWAN', 'Perabotan Rumah Tangga', 'PCS', 50, 36000, 40000, 4000),
('BNT25', 'BANTAL SQUISHY', 'Perabotan Rumah Tangga', 'PCS', 10, 23000, 25000, 2000),
('BNT30', 'BANTAL SILICON', 'Perabotan Rumah Tangga', 'PCS', 8, 27000, 30000, 3000),
('BOXOTA22', 'BOX OTARU SERBAGUNA', 'Perabotan Rumah Tangga', 'PCS', 24, 18000, 22000, 4000),
('BTL127', 'BOTOL MINUM 1 LITER', 'Barang Unik', 'PCS', 68, 22000, 27000, 5000),
('BTL233', 'BOTOL MINUM 2 LITER', 'Barang Unik', 'PCS', 65, 27000, 33000, 6000),
('BTLDOT15', 'BOTOL ANAK DOT', 'Barang Unik', 'PCS', 9, 12000, 15000, 3000),
('BTR5', 'BATRE', 'Barang Unik', 'PCS', 95, 3000, 5000, 2000),
('CAMBU32', 'BUBBLE CAMERA', 'Barang Unik', 'PCS', 31, 28500, 32000, 3500),
('CAPBS005', 'CAPITAN BESAR', 'Perabotan Rumah Tangga', 'PCS', 8, 3000, 5000, 2000),
('CEL7', 'CELENGAN ', 'Barang Unik', 'PCS', 24, 5000, 7000, 2000),
('CENAJB10', 'CENTONG AJAIB', 'Barang Unik', 'PCS', 44, 9000, 10000, 1000),
('CETAG005', 'CETAKAN AGER PLASTIK KECIL', 'Barang Unik', 'PCS', 32, 3000, 5000, 2000),
('CETAG010', 'CETAKAN AGER BERUANG', 'Barang Unik', 'PCS', 5, 7000, 10000, 3000),
('CETBMW15', 'CETAKAN KUE BMW ALUMUNIUM', 'Perabotan Rumah Tangga', 'PCS', 30, 145000, 150000, 5000),
('CETHC100', 'CETAKAN KUE HAPPY CALL', 'Perabotan Rumah Tangga', '', 20, 72000, 100000, 28000),
('COKTAIL195', 'MANGKOK COOKTAIL SET GOLDEN DRAGON', 'Barang Unik', 'PCS', 0, 185000, 195000, 10000),
('DAILY145', 'DAILY FRESH', 'Perabotan Rumah Tangga', 'PCS', 1, 135000, 145000, 10000),
('DISP145', 'DISPENSER BERAS ', 'Barang Unik', 'PCS', 10, 135000, 145000, 10000),
('DISP25', 'DISPENSER SABUN CAIR', 'Barang Unik', 'PCS', 10, 19000, 25000, 6000),
('DUCK27', 'MASKER DUCKBIL', 'Perabotan Rumah Tangga', 'PACK', 16, 20500, 27000, 6500),
('ENMGGNG37', 'WAJAN ENAMEL GAGANG', 'Perabotan Rumah Tangga', 'PCS', 0, 31000, 37000, 6000),
('ENMKUP37', 'WAJAN ENAMEL KUPING ', 'Perabotan Rumah Tangga', 'PCS', 0, 31000, 37000, 6000),
('EZY27', 'EZY BOX CB 10', 'Barang Unik', 'PCS', 19, 22000, 27000, 5000),
('FDC110', 'FOOD COVER WARNA 4 SUSUN', 'Barang Unik', 'PCS', 27, 97000, 110000, 13000),
('FDC95', 'FOOD COVER PUTIH 4 SUSUN', 'Barang Unik', 'PCS', 27, 87000, 95000, 8000),
('FOOD130', 'FOOD COVER 5 SUSUN', 'Barang Unik', 'PCS', 9, 120000, 130000, 10000),
('GILGM115', 'GILINGAN MIE/PASTA MAKER', 'Barang Unik', 'PCS', 4, 110000, 115000, 5000),
('GLSIKN43', 'GELAS IKAN GOLDEN SUNKIST', 'Barang Unik', 'PCS', 16, 41000, 43000, 2000),
('GOSPU15', 'GOSOKAN PUNGGUNG', 'Barang Unik', 'PCS', 2, 10000, 15000, 5000),
('GUL25', 'GULING SQUISHY', 'Barang Unik', 'PCS', 2, 23000, 25000, 2000),
('GUL30', 'GULING SILICON', 'Perabotan Rumah Tangga', 'PCS', 20, 27000, 30000, 3000),
('HAPBRD110', 'PANCI SET HAPPY BIRD', 'Perabotan Rumah Tangga', 'PCS', 0, 100000, 110000, 10000),
('HDMIX70', 'HAND MIXER SCARLETT', 'Perabotan Rumah Tangga', 'PCS', 2, 65000, 70000, 5000),
('HPCL165', 'HAPPY CALL DOUBLE PAN', 'Perabotan Rumah Tangga', 'PCS', 19, 157000, 165000, 8000),
('JASTEB7', 'JAS HUJAN PLASTIK TEBU', 'Barang Unik', 'PCS', 33, 6000, 7000, 1000),
('JBL50', 'SPEAKER BLUTOOTH JBL', 'Barang Unik', 'PCS', 4, 42000, 50000, 8000),
('JEMHDK55', 'JEMURAN HANDUK', 'Perabotan Rumah Tangga', 'PCS', 7, 50000, 55000, 5000),
('JEP17', 'JEPITAN BAJU', 'Barang Unik', 'PCS', 69, 15000, 17000, 2000),
('JM30', 'JAM TANGAN COUPLE', 'Perabotan Rumah Tangga', 'PCS', 10, 25000, 30000, 5000),
('JMALT23', 'JAM + ALAT TULIS', 'Barang Unik', 'PCS', 39, 18000, 23000, 5000),
('JMCK30', 'JAM CK BULAT', 'Barang Unik', 'PCS', 22, 25000, 30000, 5000),
('JMCRY25', 'JAM TANGAN CRYSTAL', 'Barang Unik', 'PCS', 15, 20000, 25000, 5000),
('JMSG50', 'JAM CK SEGI4', 'Barang Unik', 'PCS', 15, 40000, 45000, 5000),
('JMTBK33', 'JAM TANGAN TEMBAKAN', 'Barang Unik', 'PCS', 20, 26000, 33000, 7000),
('JMTG15', 'JAM TANGAN DIGITAL', 'Barang Unik', 'PCS', 36, 10000, 15000, 5000),
('KARPT85', 'KARPET RASFUR BULU', 'Barang Unik', 'PCS', 3, 75000, 85000, 10000),
('KINO7', 'KINOKI', 'Perabotan Rumah Tangga', 'PCS', 43, 5000, 7000, 2000),
('KIPS28', 'KIPAS MINI PORTABLE', 'Barang Unik', 'PCS', 42, 20000, 28000, 8000),
('KOMP245', 'KOMPOR INDUKSI/LISTRIK', 'Barang Unik', 'PCS', 11, 235000, 245000, 10000),
('KOMPR600', 'KOMPOR TANAM NEXIA', 'Perabotan Rumah Tangga', 'PCS', 5, 545000, 600000, 55000),
('KRJBJ30', 'KERANJANG BAJU', 'Barang Unik', 'PCS', 15, 26000, 30000, 4000),
('KRJBLT12', 'MANGKOK BUAH GOLDEN SUNKIST', 'Perabotan Rumah Tangga', 'PCS', 91, 10000, 12000, 2000),
('KRJBS008', 'KERANJANG PENSIL HAWAI BESAR', 'Barang Unik', 'PCS', 39, 6000, 8000, 2000),
('KRJBTK10', 'KERANJANG PENSIL HAWAI BATIK', 'Barang Unik', 'PCS', 36, 7000, 10000, 3000),
('KRJKC007', 'KERANJANG PENSIL HAWAI KECIL', 'Barang Unik', 'PCS', 32, 5000, 7000, 2000),
('KRJTG65', 'TAS KRAJINAN TANGAN', 'Barang Unik', 'PCS', 5, 50000, 65000, 15000),
('KRPT17', 'KARPET PLSTIK KECIL', 'Barang Unik', 'PCS', 10, 12000, 17000, 5000),
('LAMP20', 'LAMPU EMERGENCY', 'Barang Unik', 'PCS', 49, 15000, 20000, 5000),
('LAMPBLT45', 'LAMPU BLUTOOTH', 'Barang Unik', 'PCS', 7, 37000, 45000, 8000),
('LAMPNY35', 'LAMPU ANTI NYAMUK', 'Barang Unik', 'PCS', 15, 30000, 35000, 5000),
('LAP151', 'LAP GANTUNG PITA', 'Perabotan Rumah Tangga', 'PCS', 25, 12000, 15000, 3000),
('LAP152', 'LAP GANTUNG HANDUK', 'Perabotan Rumah Tangga', 'PCS', 14, 5000, 7500, 2500),
('lmptmb17', 'LAMPU TUMBLR', 'Barang Unik', 'PCS', 50, 14000, 17000, 3000),
('LUNCH55', 'LUNCH BOX', 'Barang Unik', 'PCS', 6, 50000, 55000, 5000),
('MANG35', 'MANGKOK PLASTIK AYAM JAGO', 'Perabotan Rumah Tangga', 'LUSIN', 15, 33000, 35000, 2000),
('MANGK37', 'MANGKOK PLASTIK WARNA', 'Perabotan Rumah Tangga', 'PCS', 15, 34000, 37000, 3000),
('MASK12', 'MASKER KUPING', 'Perabotan Rumah Tangga', 'PACK', 47, 10500, 12000, 1500),
('MASK17', 'MASKER DUCKBIL ANAK', 'Perabotan Rumah Tangga', 'PCS', 17, 13000, 17000, 4000),
('MASKHJ25', 'MASKER HIJAB', 'Perabotan Rumah Tangga', 'PACK', 20, 18000, 25000, 7000),
('MAW20', 'PEWANGI MAWAR LOUNDRY', 'Perabotan Rumah Tangga', 'PCS', -2, 18500, 20000, 1500),
('MEJKAY25', 'MEJA KARAKTER BIASA', 'Barang Unik', 'PCS', 15, 20000, 25000, 5000),
('MEJKR60', 'MEJA LAPTOP KARAKTER', 'Barang Unik', 'PCS', 40, 54000, 60000, 6000),
('MGC140', 'MAGIC COM VOTRE 1.2L', 'Perabotan Rumah Tangga', 'PCS', 10, 130000, 140000, 10000),
('MGC175', 'MAGIC COM ADVANCE 1.8L', 'Perabotan Rumah Tangga', 'PCS', 4, 165000, 175000, 10000),
('MLKPOT65', 'MILK POT SET 3 PCS', 'Perabotan Rumah Tangga', 'PCS', 12, 55000, 65000, 10000),
('MSNJ105', 'MESIN JAHIT PORTABLE', 'Barang Unik', 'PCS', 8, 95000, 105000, 10000),
('MUGLST50', 'MUG LISTRIK Q2', 'Barang Unik', 'PCS', 4, 45000, 50000, 5000),
('MYBT7', 'MY BOTTLE', 'Perabotan Rumah Tangga', 'PCS', 30, 4000, 7000, 3000),
('NAMWRN15', 'NAMPAN WARNA', 'Perabotan Rumah Tangga', 'PCS', 7, 12500, 15000, 2500),
('OGAJMB37', 'JAM DINDING OGANA JUMBO', 'Barang Unik', 'PCS', 11, 32000, 37000, 5000),
('OGAKC22', 'JAM DINDING OGANA BIASA', 'Barang Unik', 'PCS', 48, 18500, 22000, 3500),
('OILP25', 'OILPOT CLARIS', 'Perabotan Rumah Tangga', 'PCS', 27, 22000, 25000, 3000),
('ORCH90', 'ORCHID', 'Perabotan Rumah Tangga', 'PCS', 8, 87000, 90000, 3000),
('PAJDDG18', 'PANJANGAN DINDING ', 'Barang Unik', 'PCS', 7, 15000, 18000, 3000),
('pal12', 'PALMOLIVE', 'Barang Unik', 'PCS', 37, 9000, 12000, 3000),
('PANKTG85', 'PENGGORENGAN KENTANG', 'Perabotan Rumah Tangga', 'PCS', 5, 79000, 85000, 6000),
('PANLST80', 'PANCI LISTRIK FASHION', 'Barang Unik', 'PCS', 12, 70000, 80000, 10000),
('PANS13', 'PANCI SET 13 PCS', 'Perabotan Rumah Tangga', 'PCS', 16, 105000, 125000, 20000),
('PARTKLP245', 'PARUTAN KELAPA LISTRIK', 'Barang Unik', 'PCS', 2, 220000, 245000, 25000),
('PEL22', 'PEL PELAN DRAGON', 'Perabotan Rumah Tangga', 'PCS', 8, 19000, 22000, 3000),
('PHNBS145', 'POHON BESAR', 'Barang Unik', 'PCS', 5, 100000, 145000, 45000),
('PIR35', 'PIRING PLASTIK AYAM JAGO', 'Perabotan Rumah Tangga', 'LUSIN', 15, 33000, 35000, 2000),
('PIR37', 'PIRING PLASTIK WARNA', 'Perabotan Rumah Tangga', 'LUSIN', 10, 34000, 37000, 3000),
('PISGAC25', 'PISAU GACOR', 'Perabotan Rumah Tangga', 'PCS', 25, 20000, 25000, 5000),
('PMP30', 'POMPA ELEKTRIK ', 'Barang Unik', 'PCS', 96, 24000, 30000, 6000),
('PNC20', 'PANCI SUSU 16cm', 'Perabotan Rumah Tangga', 'PCS', 34, 18000, 20000, 2000),
('PREST165', 'PANCI PRESTO 8L', 'Perabotan Rumah Tangga', 'PCS', 5, 155000, 165000, 10000),
('PRS15', 'PERASAN JERUK', 'Barang Unik', 'PCS', 68, 11000, 15000, 4000),
('PRT25', 'PARUTAN SET PISAU', 'Barang Unik', 'PCS', 10, 20000, 25000, 5000),
('PYG1628', 'PAYUNG 16  JARI', 'Barang Unik', 'PCS', 23, 23000, 28000, 5000),
('RAK90', 'RAK 3 SUSUN ROTAN', 'Barang Unik', 'PCS', 5, 75000, 90000, 15000),
('RAKBH45', 'RAK BUAH LIPAT', 'Barang Unik', 'PCS', 11, 40000, 45000, 5000),
('RAKBTS72', 'RAK RS BTS 4 SUSUN', 'Perabotan Rumah Tangga', 'PCS', 11, 68000, 72500, 4500),
('REF10', 'REFILL BUBBLE CAMERA', 'Barang Unik', 'PCS', 11, 5000, 10000, 5000),
('REGU55', 'REGULATOR', 'Perabotan Rumah Tangga', 'PCS', 10, 50000, 55000, 5000),
('ROEKR34', 'PANGGANGAN PORTABLE ', 'Barang Unik', 'PCS', 40, 31000, 34000, 3000),
('SAMKR7', 'SAMBUNGAN KRAN', 'Barang Unik', 'PCS', 10, 5000, 7000, 2000),
('SAR20', 'TEMPAT SARINGAN BUAH', 'Barang Unik', 'PCS', 15, 16000, 20000, 4000),
('SKTSY15', 'SIKAT MANDI SYLICON', 'Barang Unik', 'PCS', 20, 10000, 15000, 5000),
('SMASTRG125', 'SMART STORAGE', 'Perabotan Rumah Tangga', 'PCS', 10, 115000, 125000, 10000),
('SMOKL50', 'SMOKELESS PANGGANGAN BULAT', 'Perabotan Rumah Tangga', 'PCS', 27, 44000, 50000, 6000),
('SNDK17', 'SENDOK TRAVEL', 'Barang Unik', 'PCS', 25, 15000, 17000, 2000),
('SPTL30', 'SPATULA TEXANIA', 'Perabotan Rumah Tangga', 'PACK', 50, 24000, 30000, 6000),
('SPU22', 'SAPU DRAGON', 'Perabotan Rumah Tangga', 'PCS', 7, 19000, 22000, 3000),
('SQ37', 'SQUARE GRILL PAN', 'Barang Unik', 'PCS', 3, 33000, 37000, 4000),
('STRKA70', 'SETRIKA NIKO', 'Perabotan Rumah Tangga', 'PCS', 6, 65000, 70000, 5000),
('SURP250', 'SURPET ', 'Barang Unik', 'PCS', 5, 195000, 250000, 55000),
('TALPLAS7', 'TALENAN PLASTIK ', 'Perabotan Rumah Tangga', 'PCS', 61, 5000, 7000, 2000),
('TAPBIAS15', 'TAPLAK MEJA', 'Perabotan Rumah Tangga', 'PCS', 48, 10000, 15000, 5000),
('TAPTGH35', 'TAPLAK MEJA TENGAH', 'Perabotan Rumah Tangga', 'PCS', 71, 28000, 35000, 7000),
('TDGAF12', 'TUDUNG SAJI ALUMUNIUM FOIL', 'Perabotan Rumah Tangga', 'PCS', 10, 10000, 12000, 2000),
('TEANON25', 'TEAPOT SARING NON GELAS', 'Perabotan Rumah Tangga', 'PCS', 20, 24000, 25000, 1000),
('TEAP28', 'TEAPOT SARING', 'Perabotan Rumah Tangga', 'PACK', 19, 22000, 28000, 6000),
('TEFSET45', 'TEFLON SET 2 PCS', 'Perabotan Rumah Tangga', 'PCS', 29, 38000, 45000, 7000),
('TEKANT50', 'TEKO MELAMIN ANTI PECAH', 'Perabotan Rumah Tangga', 'PCS', 13, 45000, 50000, 5000),
('TEKIKN40', 'TEKO IKAN GOLDEN SUNKIST', 'Barang Unik', 'PCS', 17, 37000, 40000, 3000),
('TEMBMB25', 'TEMPAT BUMBU HAWAI', 'Perabotan Rumah Tangga', 'PCS', 8, 20000, 25000, 5000),
('TEMMK30', 'TEMPAT MAKAN WARNA', 'Barang Unik', 'PCS', 15, 25000, 30000, 5000),
('TEMMK33', 'LUNCH BOX WARNA', 'Barang Unik', 'PCS', 25, 25000, 33000, 8000),
('TEMMKN17', 'TEMPAT MAKAN GOLDEN SUNKIST', 'Perabotan Rumah Tangga', 'PCS', 99, 14000, 17000, 3000),
('TEMSAM25', 'TEMPAT SAMPAH PINGUIN', 'Barang Unik', 'PCS', 5, 20000, 25000, 5000),
('TEMSDK25', 'TEMPAT SENDOK NAGATA', 'Perabotan Rumah Tangga', 'PCS', 4, 20000, 25000, 5000),
('TEMSEN12', 'TEMPAT SENDOK KOTAK GOLDEN SUNKIST', 'Perabotan Rumah Tangga', 'PCS', 6, 10000, 12000, 2000),
('TEMSEN15', 'TEMPAT SENDOK BULAT GOLDEN SUNKIST', 'Perabotan Rumah Tangga', 'PCS', 40, 12000, 15000, 3000),
('TEMSEN22', 'TEMPAT SENDOK TUTUP GOLDEN SUNKIST', 'Perabotan Rumah Tangga', 'PCS', 30, 18000, 22000, 4000),
('TEMSKT17', 'TEMPAT SIKAT GIGI HAWAI', 'Perabotan Rumah Tangga', 'PCS', 10, 15000, 17000, 2000),
('TEMSKT30', 'TEMPAT SIKAT GIGI GREEN LEAF', 'Perabotan Rumah Tangga', 'PCS', 5, 25000, 30000, 5000),
('TEMSKT35', 'TEMPAT SIKAT GIGI LION STAR', 'Barang Unik', 'PCS', 3, 30000, 35000, 5000),
('TEMTEL20', 'TEMPAT TELUR GOLDEN SUNKIST', 'Perabotan Rumah Tangga', 'PCS', 29, 15000, 20000, 5000),
('TEMTIS10', 'TEMPAT TISU', 'Perabotan Rumah Tangga', 'PCS', 14, 7000, 10000, 3000),
('TEMTL20', 'TEMPAT TELUR 15 LUBANG', 'Barang Unik', 'PCS', 22, 20000, 22000, 2000),
('TER25', 'TERMOS WARNA 500ML', 'Barang Unik', 'PCS', 20, 19000, 25000, 6000),
('TER35', 'TERMOS TRAVEL WARNA', 'Barang Unik', 'PCS', 15, 29000, 35000, 6000),
('TERM1LT', 'TERMOS STAINLESS 1 LITER', 'Barang Unik', 'PCS', 21, 71000, 85000, 14000),
('TIM30', 'TIMBANGAN KUE DIGITAL', 'Perabotan Rumah Tangga', 'PCS', 25, 27000, 35000, 8000),
('TIM35', 'TIMBANGAN KUE MANGKOK', 'Barang Unik', 'PCS', 12, 30000, 35000, 5000),
('TKTRM35', 'TEKO TERMOS', 'Barang Unik', 'PCS', 35, 30000, 35000, 5000),
('TMPJM5', 'TEMPAT JAM', 'Barang Unik', 'PCS', 35, 3000, 5000, 2000),
('TMPT85', 'TEMPAT SAMPAH ROTAN', 'Barang Unik', 'PCS', 10, 75000, 85000, 10000),
('TOPBR20', 'TOPLES BERANAK 3 PCS', 'Barang Unik', 'PCS', 28, 15000, 20000, 5000),
('TOPBUN85', 'TOPLES SNACK BUNGA', 'Barang Unik', 'PCS', 15, 75000, 85000, 10000),
('TOPPUT90', 'TOPLES CANDY PUTAR', 'Barang Unik', 'PCS', 9, 85000, 90000, 5000),
('TOPSET57', 'TOPLES SET 3 PCS GOLDEN SUNKIST', 'Perabotan Rumah Tangga', 'PCS', 15, 52000, 57000, 5000),
('TPLDR30', 'TOPLES CANDY DRAGON', 'Perabotan Rumah Tangga', 'PCS', 7, 25000, 30000, 5000),
('TS50', 'TAS IMPORT', 'Perabotan Rumah Tangga', 'PCS', 5, 45000, 50000, 5000),
('TS55', 'TAS MOTIF', 'Perabotan Rumah Tangga', 'PCS', 19, 50000, 55000, 5000),
('TSRJ20', 'TAS RAJUT KECIL', 'Barang Unik', 'PCS', 28, 15000, 20000, 5000),
('TSRJ53', 'TAS RAJUT', 'Barang Unik', 'PCS', 6, 49000, 53000, 4000),
('VIENN177', 'PANCI SET VIENNA', 'Perabotan Rumah Tangga', 'PCS', 2, 165000, 177000, 12000),
('WDHBSO22', 'WADAH BASO', 'Barang Unik', 'PCS', 5, 20000, 22000, 2000),
('WNDRM95', 'WONDER MOP', 'Barang Unik', 'PCS', 10, 85000, 95000, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `kode_pelanggan` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`kode_pelanggan`, `nama`, `alamat`, `telepon`, `email`) VALUES
('001', 'ADING JATAKE', '-\r\n\r\n\r\n\r\n\r\n\r\n', '-', '-'),
('002', 'AIDA', '-', '-', '-'),
('003', 'ANGGUN 1', '-', '-', '-'),
('004', 'ANISA', '-', '-', '-'),
('005', 'APRILIANI', '-', '-', '-'),
('006', 'ASKA', '-', '-', '-'),
('007', 'ASRI BUMI INDAH', '-', '-', '-'),
('008', 'ASRI TAMAN BUAH', '-\r\n', '-', '-'),
('009', 'ATIN', '-', '-', '-'),
('010', 'AYU', '-', '-', '-'),
('011', 'BIDAN ELIS', '-', '-', '-'),
('012', 'BU ANI', '-', '-', '-'),
('013', 'BU DEWI ZALFA', '-', '-', '-'),
('014', 'BU DIAN AYAM BAKAR', '-', '-', '-'),
('015', 'BU EKO', '-', '-', '-'),
('016', 'BU ELI', '-', '-', '-'),
('017', 'BU ERNAH', '-', '-', '-'),
('018', 'BU EVA', '-', '-', '-'),
('019', 'BU FAIZ', '-', '-', '-'),
('020', 'BU FENI', '-', '-', '-'),
('021', 'BU FITRI', '-', '-', '-'),
('022', 'BU GINA', '-', '-', '-'),
('023', 'BU IMAH', '-', '-', '-'),
('024', 'BU IRMA', '-', '-', '-'),
('025', 'BU ITA KARAWACI', '-', '-', '-'),
('026', 'BU JUJU 1', '-', '-', '-'),
('027', 'BU JUJU', '-', '-', '-'),
('028', 'BU KENI', '-', '-', '-'),
('029', 'BU KHOLIFAH', '-\r\n', '-', '-'),
('030', 'BU LIA', '-', '-', '-'),
('031', 'BU LINA GELAM JAYA', '-', '-', '-'),
('032', 'BU MARNI', '-', '-', '-'),
('033', 'BU MAS RIANI', '-', '-', '-'),
('034', 'CUSTOMER', '-', '-', '-'),
('035', 'BU MILKA', '-', '-', '-'),
('036', 'BU MUJI', '-', '-', '-'),
('037', 'BU MURNI', '-', '-', '-'),
('038', 'BU NENG', '-', '-', '-'),
('039', 'BU ONCE', '-', '-', '-'),
('040', 'BU PUJI', '-', '-', '-'),
('041', 'BU PUTRA', '-', '-', '-'),
('042', 'BU PUTRI 2', '-', '-', '-'),
('043', 'BU RAFA', '-', '-', '-'),
('044', 'BU RAFI', '-', '-', '-'),
('045', 'BU RENI', '-\r\n', '-', '-'),
('046', 'BU RENI CIKUPA', '-', '-', '-'),
('047', 'BU RINI BUMI ASRI', '-', '-', '-'),
('048', 'BU SARAH', '-', '-', '-'),
('050', 'BU SRI PERUM', '-', '-', '-'),
('051', 'BU SULASTRI', '-', '-', '-'),
('052', 'BU TRI LEGOK', '-', '-', '-'),
('053', 'BU VERON', '-', '-', '-'),
('054', 'BU WAHYU', '-', '-', '-'),
('055', 'BU YANTI', '-', '-', '-'),
('056', 'BUNDA ADIT', '-', '-', '-'),
('057', 'BUNDA ARVA', '-', '-', '-'),
('058', 'BUNDA AUFAR', '-', '-', '-'),
('059', 'BUNDA AUREL', '-\r\n', '-', '-'),
('060', 'BUNDA DESI', '-', '-', '-'),
('061', 'BUNDA DAFA', '-', '-', '-'),
('062', 'BUNDA DIMAS', '-', '-', '-'),
('063', 'BUNDA ENIK', '-', '-', '-'),
('064', 'BUNDA FADHIL', '-', '-', '-'),
('065', 'BUNDA IIM', '-', '-', '-'),
('066', 'BUNDA IZATI', '-', '-', '-'),
('067', 'BUNDA JANE', '-', '-', '-'),
('068', 'BUNDA LIA', '-', '-', '-'),
('070', 'BUNDA LILLAH', '-', '-', '-'),
('071', 'BUNDA LINDA', '-', '-', '-'),
('072', 'BUNDA MAUDY', '-', '-', '-'),
('073', 'RESELLER', '-', '-', '-'),
('UKN65', 'UNKNOWN', 'BUMI ASRI', '08568005310', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id` int(11) NOT NULL,
  `kode_pembelian` varchar(50) NOT NULL,
  `kode_barcode` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `kode_supplier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`id`, `kode_pembelian`, `kode_barcode`, `jumlah`, `total`, `tgl_pembelian`, `kode_supplier`) VALUES
(1, 'BL-0353393730', 'ALTKBN25', 1, 18000, '2021-05-23', NULL),
(2, 'BL-0353393730', 'BANDDK22', 1, 18000, '2021-05-23', NULL);

--
-- Triggers `tb_pembelian`
--
DELIMITER $$
CREATE TRIGGER `beli` AFTER INSERT ON `tb_pembelian` FOR EACH ROW BEGIN
UPDATE tb_barang
SET stok=stok+ NEW.jumlah
WHERE
kode_barcode = NEW.kode_barcode;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian_detail`
--

CREATE TABLE `tb_pembelian_detail` (
  `kode_pembelian` varchar(50) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL,
  `diskon` float NOT NULL,
  `potongan` int(11) NOT NULL,
  `total_b` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` varchar(25) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id`, `username`, `password`, `nama`, `level`, `photo`) VALUES
(1, '181011401732', '401732', 'Arnold Agusti Pratama', 'admin', 'user.png'),
(2, '181011400220', '400220', 'Dandi Ramdani', 'admin', 'undraw_profile.svg'),
(3, '181011402236', '402236', 'Aenun Nisa', 'admin', 'undraw_profile_3.svg'),
(4, '181011401608', '2911', 'NOVEBILA', 'admin', 'png-clipart-computer-icons-female-woman-avatar-person-hand-people.png'),
(5, '181011401445', '401445', 'DAVIT', 'kasir', 'gentleman_icon-icons.com_55044.png'),
(6, '181011401521', '401521', 'IKA', 'kasir', 'png-clipart-computer-icons-female-woman-avatar-person-hand-people.png'),
(7, '181011401231', '401231', 'DIKI', 'kasir', 'gentleman_icon-icons.com_55044.png'),
(8, '181011401456', '401456', 'PUTRI', 'kasir', 'png-clipart-computer-icons-female-woman-avatar-person-hand-people.png'),
(9, '181011401890', '401890', 'HERI', 'kasir', 'gentleman_icon-icons.com_55044.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id` int(11) NOT NULL,
  `kode_penjualan` varchar(50) NOT NULL,
  `kode_barcode` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `kode_pelanggan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id`, `kode_penjualan`, `kode_barcode`, `jumlah`, `total`, `tgl_penjualan`, `kode_pelanggan`) VALUES
(1, 'PJ-7746093034', 'BLND83', 1, 83000, '2021-05-25', '073'),
(2, 'PJ-3428659318', 'HPCL165', 1, 165000, '2021-05-25', '034');

--
-- Triggers `tb_penjualan`
--
DELIMITER $$
CREATE TRIGGER `jual` AFTER INSERT ON `tb_penjualan` FOR EACH ROW BEGIN 
UPDATE tb_barang 
SET stok = stok-NEW.jumlah
WHERE kode_barcode = NEW.kode_barcode;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan_detail`
--

CREATE TABLE `tb_penjualan_detail` (
  `kode_penjualan` varchar(50) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL,
  `diskon` float NOT NULL,
  `potongan` int(11) NOT NULL,
  `total_b` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penjualan_detail`
--

INSERT INTO `tb_penjualan_detail` (`kode_penjualan`, `bayar`, `kembali`, `diskon`, `potongan`, `total_b`, `id_pengguna`) VALUES
('PJ-3428659318', 200000, 35000, 0, 0, 165000, 4),
('PJ-7746093034', 100000, 17000, 0, 0, 83000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `kode_supplier` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kode_barcode`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`kode_pelanggan`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_barcode` (`kode_barcode`),
  ADD KEY `kode_pembelian` (`kode_pembelian`),
  ADD KEY `kode_supplier` (`kode_supplier`);

--
-- Indexes for table `tb_pembelian_detail`
--
ALTER TABLE `tb_pembelian_detail`
  ADD PRIMARY KEY (`kode_pembelian`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_penjualan` (`kode_penjualan`),
  ADD KEY `kode_pelanggan` (`kode_pelanggan`),
  ADD KEY `kode_penjualan_2` (`kode_penjualan`),
  ADD KEY `kode_barcode` (`kode_barcode`);

--
-- Indexes for table `tb_penjualan_detail`
--
ALTER TABLE `tb_penjualan_detail`
  ADD PRIMARY KEY (`kode_penjualan`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `kode_supplier` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
