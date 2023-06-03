-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 19, 2022 at 12:25 AM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u782091411_project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `shift` char(1) NOT NULL,
  `nipUser` varchar(10) NOT NULL,
  `namaUser` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nipAtasan` varchar(10) NOT NULL,
  `namaAtasan` varchar(30) NOT NULL,
  `ttdUser` varchar(50) NOT NULL,
  `ttdAtasan` varchar(50) NOT NULL,
  `fotoUser` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `shift`, `nipUser`, `namaUser`, `email`, `nipAtasan`, `namaAtasan`, `ttdUser`, `ttdAtasan`, `fotoUser`, `password`) VALUES
(15, 'irfan', 'D', '9617075fby', 'muhammad irfan', 'muhammadirfan187@outlook.com', '9218616zy', 'yoga fajar nugroho', '615c0ccdd8cb9.jpg', '60f988734ed65.jpg', '60fa422f893b2.jpg', '$2y$10$QcJmsQi9pk/jplJ77hwmKeDy3wnS0sTHsVH.vOG6W7KMMneBcemIy'),
(22, 'saprol', 'D', '9312035fy', 'supriyanto rante', '', '9218616zy', 'yoga fajar nugroho', '', '', '', '$2y$10$q8AFnb8UbOEnEMCRRQgmDuEOMiwwDcHzJVKMtGkLQaGktmxcj96Uq'),
(23, 'wahdi', 'D', '9011007fy', 'muhammad wahdi', '', '9218616zy', 'yoga fajar nugroho', '', '', '', '$2y$10$BBGvUvoIPdrB1oRFl0ngB.xexJ2.ueNwRnSpsWJCfpdHLk7LL6cui'),
(24, 'rizal.bangsawan', 'D', '9112098fy', 'andi rizal bangsawan', '', '9218616zy', 'yoga fajar nugroho', '', '', '', '$2y$10$jOWEwZnP.VGghuaGZ8.C1ukrdQpYAoSSUj/xrsJ9ersn/Ip0Z6e1C'),
(25, 'mayong', 'C', '9717094fby', 'yoyong herawan', '', '94171286zy', 'dwi aji saputro', '', '', '', '$2y$10$5UmbNOCTzgEOc2YxCGCr9OE5uDm1CpjuwCTTsXtfnI0UplFSA7HQe'),
(27, 'bakri wahid 98', 'D', '9817028fby', 'bakri wahid', 'bakriwahid98@gmail.com', '9218616zy', 'yoga fajar nugroho', '', '', '', '$2y$10$lpREh35dJHuLLGiv5YOfve/L0YeNwXoeA7JBK04I.D4zzCrhkah9u'),
(28, 'randa', 'C', '9211037fy', 'randa', '', '94171286zy', 'dwi aji saputro', '', '', '', '$2y$10$4BSrUVgj8THU9EJVsoR5fOdiuzKjjFOVY39S49gTJSVF47CKqiyT2'),
(29, 'akil', 'C', '9211036fy', 'akil', 'nurakil92@gmail.com', '94171286zy', 'dwi aji saputro', '', '', '', '$2y$10$H99uPSLa4ISGDaVTd28zTeUluPDxt4UTpDRq/HqrYPrt3EVzHlCUq'),
(30, '9212036fy', 'D', '9212036fy', 'm. syukur al munandar', '', '9218616zy', 'yoga fajar nugroho', '', '', '', '$2y$10$MGm1WKbMrWduP3T0Hf6y1OE6nnx4cwh/PtyJln8np7MqTqAiW4ZJW'),
(31, 'amr092', 'C', '9212047fy', 'andi muh. risman an.', '', '94171286zy', 'dwi aji saputro', '', '', '', '$2y$10$f2DTy7BDSA/jD.ZtA0mpN.7CcM4hs.56Az1TsjIVNZr5Nv4Bomp/u'),
(32, 'eldo', 'B', '9717035fby', 'eldo lubaya tomo', '', '8810035f', 'muhamad imam ismail', '', '', '', '$2y$10$gTX3o0lXEI1Npn1jXc8MTucHrUA9RStzv4bQOKvdCnQGApLZzrR8e'),
(33, 'iwan_novianto', 'B', '9617051fby', 'iwan novianto', '', '8810035f', 'muhamad imam ismail', '', '', '', '$2y$10$y36d/m4tSoZXewRKaCqe1eeDAEO0vCv8D8TNa/66k1v4tlWIHf.Mu'),
(34, 'muhlis', 'C', '9717080fby', 'muhlis', '', '94171286zy', 'dwi aji saputro', '', '', '', '$2y$10$bhc7ni1as6yWPcmNttkK2.PiPb4fWyyQOqYukJQu49Um8/JOoIlSm'),
(35, 'ardiansyah nugraha m', 'D', '9718083fby', 'ardiansyah nugraha m', '', '9218616zy', 'yoga fajar nugroho', '', '', '', '$2y$10$zZKzIMOpuS/iDRynbD6xKuu59qs2g/d0Cenx.jRwJUWRs87u/29D6'),
(36, 'ihsan.r', 'D', '9010034f', 'm. ihsan ramli', 'iqbalramli1998@gmail.com', '9218616zy', 'yoga fajar nugroho', '', '', '', '$2y$10$2TQ87zvwO7pLb.x.Tz0MXuZnywYBqrJ.CYpOrisRFF5KqDt5OyD3m'),
(37, 'adijn05', 'D', '9618001fby', 'asriadi janide', '', '9218616zy', 'yoga fajar nugroho', '', '', '', '$2y$10$JVKqbIIiq8x5hkikqG/teO/r98.drqSJStV3t/BMjOIZyVfqS4b6G'),
(38, 'renop', '', 'operasi', 'renop', '', '', '', '', '', '', '$2y$10$CxjZma07CWU9yJ4Rwh9EzOLB/c.xg0skMJDif2e210OEe7inYPPdO'),
(39, 'andre', 'C', '9718092fby', 'andreas hayr', '', '94171286zy', 'dwi aji saputro', '', '', '', '$2y$10$64LO8YD7m3k1AGcbHTYfVebmg6xecsAFOz3wNjlNBCVQ7ttNNXzd2'),
(40, 'hasrun044', 'C', '9817044fby', 'hasrun', '', '94171286zy', 'dwi aji saputro', '', '', '', '$2y$10$t/LSG7ESm/4hh1zM4JalDOqnvUo0v0.NZPzVhBR/I0Zw0x0r3QP7G'),
(41, 'pusat\nabawi', 'C', '9011011fy', 'nabawi', '', '94171286zy', 'dwi aji saputro', '', '', '', '$2y$10$8efGUOawSGVveaU4NEGp8ONqOtzMlIwtvSellJuQIbhflBdGp/6WG'),
(44, 'mansyur', 'D', '9312099fy', 'mansyur', '', '9218616zy', 'yoga fajar nugroho', '', '', '', '$2y$10$bPJBzEMwWULizS5YKOZ.puXsmMaTLuq3IAzF93Cczn2TxfH/w3/bC'),
(45, 'hery idswanto', 'C', '9617055fby', 'm hery idswanto setiawan', '', '94171286zy', 'dwi aji saputro', '', '', '', '$2y$10$BOzkQAIVt.OSsp2FXFGFNe9np7kDTIJqxLeYYVKcUrGotWQ.arF9K'),
(47, 'andi aswar', 'C', '9312038fy', 'andi aswar kasman', '', '94171286zy', 'dwi aji saputro', '', '', '', '$2y$10$Q//0PHO22QI.788uQX0xD.43MDT2tBI4loy5V28NE7zqCMMhXPjYW'),
(48, 'isra.affandi', 'C', '9617077fby', 'isra.affandi', '', '94171286zy', 'dwi aji saputro', '', '', '', '$2y$10$5H34KdGFXF1qWLnOQQS2tu9Dd5JnWOEOUjf78S7d32LFAHPvu5XH6'),
(49, 'sca', 'C', '9212050fy', 'syamsurya catur aprian', '', '94171286zy', 'dwi aji saputro', '', '', '', '$2y$10$cIngYb.lEy9TFq.rChOx0.8E6cZOhetIKGGpAZhIBfOi6QslxNS6W'),
(50, 'leman', 'C', '9817054fby', 'leman dwiyulianto laode', '', '94171286zy', 'dwi aji saputro', '', '', '', '$2y$10$PaQqzlU5oc.2n1rnNnlf9ezLDeOarE9YHIAlZzuRVTBcd4vyDmQku'),
(51, 'muhfahmiabin', 'C', '9618030fby', 'muh.fahmi abin', '', '94171286zy', 'dwi aji saputro', '', '', '', '$2y$10$5Mz4Sk7UtF07C3D3E9S6yufSgZpql/N/R/khjBx9V/wN0pNVxOJZu'),
(52, 'irwan.burhan', 'C', '9312034fy', 'irwan burhan', '', '94171286zy', 'dwi aji saputro', '', '', '', '$2y$10$ofxB/6Q0JZKONUQRgH8Gz.gaTOFKzDOw1gdA/l7ZfXhROeF4qvPTW'),
(53, 'aswar08', 'C', '9312038fy', 'andi aswar kasman', '', '94171286zy', 'dwi aji saputro', '', '', '', '$2y$10$jbkASsHj9BcD2.L/ppbMa.OAtj6.qWPId5ny8btsE2FTcQcLLCD8O'),
(54, 'nursan', 'A', '9718075fby', 'nursan', 'nursaner7@gmail.com', '94171285zy', 'asharri rizal', '619c8aad8c1f4.jpg', '', '', '$2y$10$54j2Fle9zxOkAop04TEEkeMRDOEZMaq.DGbEiJBhhYSK7ZR6cO4Ke'),
(55, 'ryanratta', 'A', '9111015fy', 'ryan aditya ratta', '', '94171285zy', 'asharri rizal', '', '', '', '$2y$10$ogcKyxiXQRZ0jtTD7SKkeubcxg7RIZZCAvtaly8e4idcs9ViEEGCq'),
(56, 'asriadi.abdurrahman', 'A', '9211027fy', 'asriadi', '', '94171285zy', 'asharri rizal', '', '', '', '$2y$10$f1HUT/NDbVm59bJc76k0yuGycRn.DCpJLL5GyFGRk2B8VWePp9xmS'),
(57, 'syahrul.julianto', 'A', '9718073fby', 'muh syahrul julianto sugiman', '', '94171285zy', 'asharri rizal', '', '', '', '$2y$10$YchpzQ9rAOWPQ98CWljAdOQx9Og9nDyPJ5BS.BJ37fYpK6DkXiHvi'),
(58, 'acr', 'A', '9111016fy', 'alim hambali', '', '94171285zy', 'asharri rizal', '', '', '', '$2y$10$IrURsUVgbCrwjkvopcL2B.1ev8532j/ogZqH3Ph/xogA9GqYNzCg2'),
(59, 'adhiim.maarif', 'A', '9817003fby', 'abd adhiim maarif', '', '94171285zy', 'asharri rizal', '', '', '', '$2y$10$/hv.eQNjM9OulrmErwHeEubhCy9a6SPuvpR/zvhZ9wMo6C2mf3d3O'),
(60, 'eko', 'A', '9717034fby', 'putra', '', '94171285zy', 'asharri rizal', '', '', '', '$2y$10$1CW8kix1MEZqX.WBUo2AJ.ZfC8ODPhfZKxc5giA.imT0pKuLGnpOO'),
(61, 'taslim', 'A', '9112025fy', 'Taslim', '', '94171285zy', 'asharri rizal', '', '', '6115bb6e9c70b.jpg', '$2y$10$dKlZ/yffxxbGLns6n1HQteFQDT1udHQSb01s5kwW7BkFClYSktTbW'),
(62, 'muhammad asrul', 'A', '9110053f', 'la ode muhammad asrul', '', '94171285zy', 'asharri rizal', '', '', '', '$2y$10$HaEu9Ual1m5VoF7fBcv.cOCnXceaW0hz8sMUGsu/InoSnNv2U0zEi'),
(63, 'mardin taridala', 'D', '9011009fy', 'mardin taridala', '', '9218616zy', 'yoga fajar nugroho', '', '', '', '$2y$10$tYg0j.fy45ZUULiZNDSVMe6Ww/s5wiZh4w3zA5OaIA5pEdGXsfyuC'),
(64, 'arif1992', 'D', '9111018fy', 'muhammad arif', '', '9218616zy', 'yoga fajar nugroho', '', '', '', '$2y$10$6aE.A1og9L8WUNj9CrBNYOwgCSmQg87iPH8S4nGWzPPuSWbvEsdWa'),
(65, 'muhammadfarhankurniawan', 'D', '9718068fby', 'muhammad farhan kurniawan i.', 'muhammadfarhankurniawan48@gmail.com', '9218616zy', 'yoga fajar nugroho', '611ba3a89e46a.jpeg', '', '', '$2y$10$xcD/2doAjf7KnsTf2xqwUOsm6mhhHn80Jse6rH8u6wBK3wTDExjVq'),
(66, 'andar', 'D', '9212036fy', 'm. syukur al munandar', 'andarmajene@gmail.com', '9218616zy', 'yoga fajar nugroho', '618b401597a60.jpg', '', '', '$2y$10$G5xo58n/R1ovoFGaqZYRB.1uHYa7XOaWr4unK/J5ia5ZcpgInGYCi'),
(67, 'muhammad.wahdi', 'D', '9011007fy', 'muhammad wahdi', 'muhammadwahdi22@gmail.com', '9218616zy', 'yoga fajar nugroho', '611bb01a0a236.jpeg', '611bb01a0a3f2.jpeg', '', '$2y$10$3w9i1dFpXQape6CNS4o.2OF25A1R.u/x/e42v5JKkUekmE5MTC7x.'),
(68, 'shandy02', 'D', '9111022fy', 'shandy sugih wibowo', '', '9218616zy', 'yoga fajar nugroho', '', '', '', '$2y$10$A26Fu2ZUmFwWgdXayZIhsO.VMC8CGlEnj5KVzhhUORZGpNqFdsfgq'),
(69, 'supriyanto.rante', 'D', '9312035fy', 'supriyanto rante', '', '9218616zy', 'yoga fajar nugroho', '', '', '', '$2y$10$aKNW1JQDLfwkc.o6dC1mBurQG2fz9/l9TEJb0cGX.VjcWdPjPZyFO'),
(70, 'iccank01', 'D', '9010034f', 'm. ihsan ramli', '', '9218616zy', 'yoga fajar nugroho', '61aadc24a66c9.jpeg', '', '', '$2y$10$93q92vCD18dAe.1G0N2s5u6zF3sA2at21/QdBCHDog/1/KKUKe92S'),
(71, 'harryfristian', 'D', '9312100fy', 'harry fristian', 'harryfristian@gmail.com', '9218616zy', 'yoga fajar nugroho', '', '', '', '$2y$10$3WamwPrIg5KoiG.FgsHQkOEAJ4L5aw1Gld2i9672PQnjYGKydZu4S'),
(72, 'muhammad_aswin', 'B', '9618044fby', 'muhammad aswin', '', '8810035f', 'muhamad imam ismail', '61c84fe7b8e7c.jpg', '', '', '$2y$10$OTfEpLePtmdz9a6QSpxAj.Wm0Z4TXLtmeto4wI1Yl52Ys0xG1l3.u'),
(73, 'muhjorvan', 'B', '9817070fby', 'muhamad jorvan', '', '8810035f', 'muhamad imam ismail', '', '', '', '$2y$10$eI6pVxb1p7IOs41ZZGxOMeItzsJvjOAA1LoHmiXrQhUq5rWShGBDy'),
(74, 'riswan', 'B', '9212103fy', 'riswan ismail', '', '8810035f', 'muhamad imam ismail', '', '', '', '$2y$10$ZFA92S8zSzCt/VArRHptoeO73j3feZbLcnFNXCgwJIGHwD2PfHBGq'),
(75, 'iwan', 'B', '9617051fby', 'iwan novianto', 'iwanwann20@gmail.com', '8810035f', 'muhamad imam ismail', '61248f81c6b5b.png', '61248f81c6c14.png', '61248f81c68d7.jpg', '$2y$10$diCVfkkGXCbi6ziNULEUxO0JkaXS/jXYu/0n4B9p93KzDts.Rn.na'),
(76, 'akbar210', 'B', '9111014fy', 'muhammad akbar asmadi', '', '8810035f', 'muhamad imam ismail', '', '', '', '$2y$10$RUSna3Cvy67XbtcIsDj8s.dqG.5ThChEb8JGiF/PmPdCVad6t1Qde'),
(77, 'zulfais', 'B', '9212101fy', 'zulfais', '', '8810035f', 'muhamad imam ismail', '', '', '', '$2y$10$8ZnBemIhHMf4.3sL81reLOMN7PTm1/iggB8m1vHrw5QbDXQ4dE0WG'),
(78, 'alfinsa_atmajaya', 'B', '9718072fby', 'alfinsa atmajaya', '', '8810035f', 'muhamad imam ismail', '', '', '', '$2y$10$AUS5OpO5qM5lf4FO6lF1ouLOtDasHHzWEa/lbfKKgqT.JNn3ZbIoS'),
(79, 'laode.budiman', 'B', '911124fy', 'laode m arief budiman husein', '', '8810035f', 'muhamad imam ismail', '', '', '', '$2y$10$YeiQfVnvrju364Tg2rnx6e2KPsSdpIcKdghbht/nDN1adlYaDa/fq'),
(80, 'akhnal', 'D', '9011005fy', 'akhnal murtham ', '', '9218616zy', 'yoga fajar nugroho', '', '', '', '$2y$10$.ydV39WbAA3smwteiLCPgu/13hyZB2MNFj7tJxyu3E75TBYv5DcRG'),
(81, 'brocil', 'C', '9210036f', 'rezki anugrah', '', '94171286zy', 'dwi aji saputro', '', '', '', '$2y$10$IQ39WRAusJI8Za6Hxk5GNuBO9h1hbri/7jmqoHMSZkBxZPWZpv2n6'),
(82, 'andi.aswar', 'C', '9312038fy', 'andi aswar kasman', 'aswar18893@gmail.com', '94171286zy', 'dwi aji saputro', '', '', '', '$2y$10$H0MHOVSLtWwEvsxiXllqmuQrplTOTuDrm5.CoG/We1dgS44E5KImS'),
(83, 'alwi', 'A', '9011010fy ', 'muh. alwi aries', 'alwijr32@gmail.com', '94171285zy', 'asharri rizal', '', '', '', '$2y$10$nh17XRWRJzCUUr4eHNlwuud2wJOiI.a4.WS6Bcd8HXWhBr2/W/Q0y'),
(84, 'mitra', 'B', '9618024fby', 'mitra', 'mitraspeed8@gmail.com', '8810035f', 'muhamad imam ismail', '', '', '', '$2y$10$IUonBQJGRVji8x7PT6.uKOdVZhoDnXqkSJ2BBImJn7zBx/ABDN6Mm'),
(85, 'bahar', 'B', '9112037-fy', 'baharuddin s', 'baharuddins@pln.co.id', '8810035f', 'muhamad imam ismail', '', '', '', '$2y$10$CNys/ZQHhlyXnECs5g5zlOxo0zcHNL21kgGvVBBdY0wEGOgSJCGUi'),
(86, 'eldo lubaya tomo', 'B', '9717035fby', 'eldo lubaya tomo', 'eldolubaya97@gmail.com', '8810035f', 'muhamad imam ismail', '', '', '', '$2y$10$.g15ynpcSX6x2rLGbHaPCuXHIKVZ9tKSy8BKEb7KzI1DCDHZCpSxC'),
(87, 'wandhy08', 'B', '9212097fy', 'muhammad wandi winarta', 'wandi.winarta@pln.co.id', '8810035f', 'muhamad imam ismail', '', '', '', '$2y$10$nRi1lhD1ziX8OVISIrhmN.4snJEIvCS2g1gBOoMoBsXRqhVfSPo3y'),
(88, 'bahar y', 'B', '9212049fy', 'baharuddin yasin', 'baharuddin.yasin@pln.co.id', '8810035f', 'muhamad imam ismail', '', '', '', '$2y$10$f6jxAJHOV0kmb23EWQG3IeJUj9M8sFFD.ZC2npT5NAU5L1dM/N1D6'),
(89, 'jovapratama26', 'A', '9718060fby', 'jova pratama taubarania', 'jovajie46@gmail.com', '94171285zy', 'asharri rizal', '', '', '', '$2y$10$xetvsf/Nj/h52NTPt/lALe28qMP.8rMwi28NNSP/RyCb2i6LIDNEW'),
(90, 'alim hambali', 'A', '9111016fy', 'alim hambali', 'hambali.alim28@gmail.com', '94171285zy', 'asharri rizal', '', '', '', '$2y$10$SzAaGcZ6HdOZL7prwlDvrurnGMN48ZACqoKM2ofzeJ1TdMunksL/e'),
(91, 'lianto d nugroho', 'B', '9212042fy', 'lianto dian nugroho', 'liannugroho92@yahoo.com', '8810035f', 'muhamad imam ismail', '', '', '', '$2y$10$7KNT19PKQL9lM7CYyXQQHOkcToCtun0XTS9J8yeCTWH6upS8cFp1W'),
(92, 'adi yusri ombe', 'B', '9212052fy', 'adi yusri ombe', 'adi.yusri@pln.co.id', '8810035f', 'muhamad imam ismail', '', '', '', '$2y$10$HsNVxAnZasUs8PBzRLxXAemCALmtANbPPd.e/I1pQJlwnoXwhmGe6'),
(93, 'asharri rizal', 'A', '94171285zy', 'asharri rizal', 'ashari.rizal25@gmail.com', '94171285zy', 'asharri rizal', '', '', '', '$2y$10$z33A3Z2Ioo7fhpe3GV4dmuz9IV2yeeUv6aPrefvR89qO5223Rq3lC'),
(94, '9211037fy', 'C', '9211037fy', 'randa r', 'akr.randa022@gmail.com', '94171286zy', 'dwi aji saputro', '', '', '', '$2y$10$mBNbIYKECMLNzvrAC.jaTuiEuhJ4OAVFTY4W3kyu12NTcAme2vnXS'),
(95, 'arif.alam', 'A', '9112041fy', 'muh arif alam. s', 'muharifalam@gmail.com', '94171285zy', 'asharri rizal', '', '', '', '$2y$10$UYSPtCPQ.6kdulCPs0fK4.WZP6FKunopoGlPj2m7PDirXSkajhHHa'),
(96, 'muh', 'A', '9110053f', 'asrul', 'asrul1101@gmail.com', '94171285zy', 'asharri rizal', '', '', '', '$2y$10$Vs4xpDNxC4N5UeI/TqrD4e41rDU2zRWlEc95mptKzGzGCJ5y67tVS'),
(97, 'muh.asrul', 'A', '9110053f', 'la ode muhammad asrul', 'asrul1101@gmail.com', '94171285zy', 'asharri rizal', '', '', '', '$2y$10$28EPhgtEC0elVL/6NIKJ0eD87q1Fcd7pXtyNpIaJ.RpEggQsaUHyi'),
(98, 'aswandi', 'D', '9112106fy', 'aswandi', 'aswandi.al@gmail.com', '9218616zy', 'yoga fajar nugroho', '', '', '', '$2y$10$0nKK9ESVUa9nDedYCvMmzOmSVD8PMRf.6FTYyPJtB8pPqaK6ge2ja'),
(99, 'mirad.maranu', 'A', '9717056fby', 'mirad maranu', 'mirad.maranu1997@gmail.com', '94171285zy', 'asharri rizal', '', '', '', '$2y$10$V1YQ5JrmFlmlhuSvTUExiOJ2CJ5R8LAmr4cM8P7fu/KBHacbVqpj.'),
(100, 'fahmi', 'C', '9618030fby', 'muh.fahmi abin', 'muh.fahmi@pln.co.id', '94171286zy', 'dwi aji saputro', '', '', '', '$2y$10$SUiZEG3yJ6YseLhkxw3kduam6/qd/PhKDOCiUR1JzxnQ8XULwC6hu'),
(101, 'syahruljuliant0', 'A', '9718073fby', 'muh syahrul julianto', 'muhsyahruljulianto@gmail.com', '94171285zy', 'asharri rizal', '', '', '', '$2y$10$l.M57Q3PBeM1M9X3LPoq8.n6TQbWLUMbFLITvdQVYYohlhbbdyxF.'),
(102, 'ihsan.ramli', 'D', '9010034f', 'm. ihsan ramli', 'iqbalramli1998@gmail.com', '9218616zy', 'yoga fajar nugroho', '', '', '', '$2y$10$tdhwqIB9AjTrNuZxDpKiyuxo.u0xZJm0BXhG5odOhq5rUj/Ozj/3u'),
(103, 'arif91', 'D', '9111018fy', 'muhammad arif', 'ariefkamaluddin76@gmail.com', '9218616zy', 'yoga fajar nugroho', '', '', '', '$2y$10$SC4rRXygEqUZtuZOxpRoFellM8unMVNPAqPgBqKh/ZWm7CCV9w6ym'),
(104, 'bachruldj', 'A', '9011001fy', 'bachrul ulum dj', 'bachrul.ulum@pln.co.id', '94171285zy', 'asharri rizal', '', '', '', '$2y$10$AiqdxHd2zrBR3g9j15CrYOAPLYQEFrGXD1Zy1WWj9QUqp1mvz6prO'),
(105, 'alwi aries', 'A', '9011010fy', 'muh. alwi aries ', 'alwijr32@gmail.com', '94171285zy', 'asharri rizal', '', '', '', '$2y$10$W8GZ6ILJaJvopeqDJ7XQi.F193olcItEk4oLvhtESniUcvIcn9cmS'),
(106, 'mansal', 'B', '9818146fby', 'mansal', 'mansalmansal17@gmail.com', '8810035f', 'muhamad imam ismail', '', '', '', '$2y$10$f33PLXQaqgyYreldVzCMY.HfxN0VtmcIY9AnZFhW195sxoBaW9kc6'),
(107, 'awal', 'A', '9112043fy', 'awaluddin', 'awaluddin.pln@pln.co.id', '94171285zy', 'asharri rizal', '', '', '', '$2y$10$xPtrrO4a4DjSQ8gaxwJafuB4RPsJwE2zEm4yA9u1iJpkd.HDi9TLS'),
(108, 'muhfajar', 'A', '9618011fby', 'muh fajar abdullah ', 'muh.fajar@pln.co.id', '94171285zy', 'asharri rizal', '', '', '', '$2y$10$8eh4vbpvGusr8apVimhJgupEE3mxTvhtSIcIQEpu4aEuyuaE1hcYG'),
(109, 'azizul', 'A', '9312048fy', 'muhammad azizul gafur', 'azizul.gafur@pln.co.id', '94171285zy', 'asharri rizal', '', '', '', '$2y$10$AWIRim6jl5cYWuzO1ZXuG.3O0DFWX8UJzx0hTR4Vz9zrJxY45HVIK'),
(110, 'wal', 'A', '9112043fy', 'awaluddin', 'awaljr0124@gmail.com', '94171285zy', 'asharri rizal', '', '', '', '$2y$10$.iHynog33YKXWh9c8TUgauz.nfs5SQ65wiLdYaav.bjw.KTU6OQVm'),
(111, 'jaya', 'A', '1122334455', 'jaya', 'bakuhantamcrew@gmail.com', '94171285zy', 'asharri rizal', '', '', '', '$2y$10$NmFY//XX6EQOWNpOAEBZEuqwszWuC3QBwJOe3xIKq.ZdNNuHTUgMq'),
(112, 'muh.syahrul', 'A', '9718073fby', 'muh syahrul julianto sugiman', 'muhsyahruljulianto@gmail.com', '94171285zy', 'asharri rizal', '', '', '', '$2y$10$eJ3gG3yCAOPV4fv0hszIYuuq3OPIxb14aselv26C1aknKHTcOyam2'),
(113, 'ihsan-ramli', 'D', '9010034f', 'm. ihsan ramli', '', '9218616zy', 'yoga fajar nugroho', '', '', '', '$2y$10$TgjjYqpdA.kntMv6Bjgxy.mLtKFc1uYeuoSdnvNCK6C8qfDq.li6e'),
(114, 'ardimangada', 'B', '9212051fy', 'ardi mangada', 'mangadaardi.am@gmail.com', '8810035f', 'muhamad imam ismail', '', '', '', '$2y$10$xVf4nOJA6J9AI/FHc6USpuBiSfqsTqZQXR./fkkfKoZ3Hh9XhkTDC'),
(115, 'mitra24', 'B', '9618024fby', 'mitra', 'mitraspeed8@gmail.com', '8810035f', 'muhamad imam ismail', '', '', '', '$2y$10$R1eBq3pvd9TbZXiiYus6C.pNArDDu3OnYqv1USE7AB92YW5QRMNHi'),
(116, 'mansalaja', 'B', '9818146fby', 'mansal', 'mansalmansal17@gmail.com', '8810035f', 'muhamad imam ismail', '', '', '', '$2y$10$nfqFkbBnQEOHDI76buBuKOmCtuNA16mIfDY5vwjZBERajb9h0.A7W'),
(117, 'azizul.gafur', 'A', '9312048fy', 'muhammad azizul gafur', 'toto.ogel@gmail.com', '94171285zy', 'asharri rizal', '', '', '', '$2y$10$FM7rMAiQvgr26Ov5fwY6/eI/dW5YIF2WeKWckkizFYyL6L7N7mEPy'),
(118, 'anggasetiawan082', 'A', '9110052f', 'angga setiawan', 'anggasetiawan082@gmail.com', '94171285zy', 'asharri rizal', '', '', '', '$2y$10$KXt/jgDV8mwNF1vC24elDOJlZfDuyPI.zFXgUuhLqACBpn1JVgIkq'),
(119, 'akbar', 'B', '9111014fy', 'muhammad akbar asmadi', 'muhammadakbarpltu@gmail.com', '8810035f', 'muhamad imam ismail', '', '', '', '$2y$10$6vE1juye7wRRyHqaldeMAuUj/5Gd7lAS63FrSCPU84jOyZWpojHNG'),
(120, 'akbar jr', 'B', '9111014', 'muhammad akbar asmadi', 'muhammadakbar.asmadi21@gmail.com', '8810035f', 'muhamad imam ismail', '', '', '', '$2y$10$5yUAitwPh1KVsFlGQyGrUOh0ZapUprUcoiCj8CmBAFPExNiyF4QyW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
