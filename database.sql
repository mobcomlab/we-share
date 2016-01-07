-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 22, 2015 at 02:10 AM
-- Server version: 5.5.41
-- PHP Version: 5.5.23-1+deb.sury.org~precise+2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `image_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `thumbnail_url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `standard_url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `count_comment` int(11) NOT NULL,
  `count_likes` int(11) NOT NULL,
  `posted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `author_image_url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `author_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `author_link_url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `source_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_id`, `thumbnail_url`, `standard_url`, `count_comment`, `count_likes`, `posted_at`, `link_url`, `author_image_url`, `author_name`, `author_link_url`, `username`, `source_id`, `location_id`, `created_at`, `updated_at`) VALUES
(1, 'https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/s150x150/e15/11241520_1120023324680919_2051933509_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/e15/11241520_1120023324680919_2051933509_n.jpg', 1, 18, '2015-05-05 22:23:09', 'https://instagram.com/p/2UYuUtrXE3/', 'https://igcdn-photos-b-a.akamaihd.net/hphotos-ak-xta1/t51.2885-19/11191576_1599467050324657_1532150311_a.jpg', 'น้องกล้วยเป็นคนตลก ', 'http://instagram.com/_gluayysh94', '_gluayysh94', 1, 2, '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(2, 'https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/s150x150/e15/11240407_1485085168448201_28971806_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/e15/11240407_1485085168448201_28971806_n.jpg', 0, 8, '2015-05-05 12:52:03', 'https://instagram.com/p/2TXXZknAAk/', 'https://igcdn-photos-c-a.akamaihd.net/hphotos-ak-xtf1/t51.2885-19/10665961_674475772647986_1109450603_a.jpg', 'Sine', 'http://instagram.com/azelora_siney', 'azelora_siney', 1, 2, '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(3, 'https://scontent.cdninstagram.com/hphotos-xta1/t51.2885-15/s150x150/e15/11191534_1441281569500066_1009410139_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xta1/t51.2885-15/e15/11191534_1441281569500066_1009410139_n.jpg', 0, 5, '2015-05-05 12:48:28', 'https://instagram.com/p/2TW9N-HAP-/', 'https://igcdn-photos-c-a.akamaihd.net/hphotos-ak-xtf1/t51.2885-19/10665961_674475772647986_1109450603_a.jpg', 'Sine', 'http://instagram.com/azelora_siney', 'azelora_siney', 1, 2, '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(4, 'https://scontent.cdninstagram.com/hphotos-xfp1/t51.2885-15/s150x150/e15/11193073_454588094704237_243927774_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xfp1/t51.2885-15/e15/11193073_454588094704237_243927774_n.jpg', 0, 4, '2015-05-05 12:46:16', 'https://instagram.com/p/2TWtDenAPm/', 'https://igcdn-photos-c-a.akamaihd.net/hphotos-ak-xtf1/t51.2885-19/10665961_674475772647986_1109450603_a.jpg', 'Sine', 'http://instagram.com/azelora_siney', 'azelora_siney', 1, 2, '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(5, 'https://scontent.cdninstagram.com/hphotos-xap1/t51.2885-15/s150x150/e15/11205675_1444870915810545_2028719296_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xap1/t51.2885-15/e15/11205675_1444870915810545_2028719296_n.jpg', 0, 8, '2015-05-05 11:07:02', 'https://instagram.com/p/2TLWOTRnPn/', 'https://igcdn-photos-d-a.akamaihd.net/hphotos-ak-xfp1/t51.2885-19/929221_1498044780437803_530806550_a.jpg', '', 'http://instagram.com/s.mattika', 's.mattika', 1, 2, '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(6, 'https://scontent.cdninstagram.com/hphotos-xfa1/t51.2885-15/s150x150/e15/11192864_1653949291506755_923670591_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xfa1/t51.2885-15/e15/11192864_1653949291506755_923670591_n.jpg', 0, 32, '2015-05-05 07:47:56', 'https://instagram.com/p/2S0j_mMrbO/', 'https://igcdn-photos-f-a.akamaihd.net/hphotos-ak-xta1/t51.2885-19/11192902_1424431894540285_1619901174_a.jpg', 'Pha Wiphachat', 'http://instagram.com/wiphachat', 'wiphachat', 1, 3, '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(7, 'https://scontent.cdninstagram.com/hphotos-xpf1/t51.2885-15/s150x150/e15/11189795_976123525754558_331924559_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xpf1/t51.2885-15/e15/11189795_976123525754558_331924559_n.jpg', 0, 13, '2015-05-05 07:01:31', 'https://instagram.com/p/2SvQCGRnPg/', 'https://igcdn-photos-d-a.akamaihd.net/hphotos-ak-xfp1/t51.2885-19/929221_1498044780437803_530806550_a.jpg', '', 'http://instagram.com/s.mattika', 's.mattika', 1, 4, '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(8, 'https://scontent.cdninstagram.com/hphotos-xtp1/t51.2885-15/s150x150/e15/11191525_853317248074039_98473198_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xtp1/t51.2885-15/e15/11191525_853317248074039_98473198_n.jpg', 0, 12, '2015-05-05 05:55:07', 'https://instagram.com/p/2SnpvylCJD/', 'https://igcdn-photos-h-a.akamaihd.net/hphotos-ak-xaf1/t51.2885-19/10549740_432110750296519_995307860_a.jpg', 'Natrada Mahawana', 'http://instagram.com/mommy_natrada', 'mommy_natrada', 1, 1, '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(9, 'https://scontent.cdninstagram.com/hphotos-xap1/t51.2885-15/s150x150/e15/11205645_1638983309666666_667049354_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xap1/t51.2885-15/e15/11205645_1638983309666666_667049354_n.jpg', 0, 10, '2015-05-05 05:51:04', 'https://instagram.com/p/2SnMCDlCIo/', 'https://igcdn-photos-h-a.akamaihd.net/hphotos-ak-xaf1/t51.2885-19/10549740_432110750296519_995307860_a.jpg', 'Natrada Mahawana', 'http://instagram.com/mommy_natrada', 'mommy_natrada', 1, 1, '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(10, 'https://scontent.cdninstagram.com/hphotos-xtp1/t51.2885-15/s150x150/e15/11191453_833293063423779_725392851_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xtp1/t51.2885-15/e15/11191453_833293063423779_725392851_n.jpg', 0, 11, '2015-05-05 05:48:15', 'https://instagram.com/p/2Sm3bsFCIS/', 'https://igcdn-photos-h-a.akamaihd.net/hphotos-ak-xaf1/t51.2885-19/10549740_432110750296519_995307860_a.jpg', 'Natrada Mahawana', 'http://instagram.com/mommy_natrada', 'mommy_natrada', 1, 1, '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(11, 'https://scontent.cdninstagram.com/hphotos-xat1/t51.2885-15/s150x150/e15/11192760_673576572747266_1601246764_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xat1/t51.2885-15/e15/11192760_673576572747266_1601246764_n.jpg', 0, 4, '2015-05-05 01:46:53', 'https://instagram.com/p/2SLPnIHAFY/', 'https://igcdn-photos-c-a.akamaihd.net/hphotos-ak-xtf1/t51.2885-19/10665961_674475772647986_1109450603_a.jpg', 'Sine', 'http://instagram.com/azelora_siney', 'azelora_siney', 1, 1, '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(12, 'https://scontent.cdninstagram.com/hphotos-xpf1/t51.2885-15/s150x150/e15/11195765_885923401465499_1352538584_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xpf1/t51.2885-15/e15/11195765_885923401465499_1352538584_n.jpg', 0, 2, '2015-05-05 01:00:05', 'https://instagram.com/p/2SF4z9nALx/', 'https://igcdn-photos-c-a.akamaihd.net/hphotos-ak-xtf1/t51.2885-19/10665961_674475772647986_1109450603_a.jpg', 'Sine', 'http://instagram.com/azelora_siney', 'azelora_siney', 1, 1, '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(13, 'https://scontent.cdninstagram.com/hphotos-xpf1/t51.2885-15/s150x150/e15/11189987_760530177376149_1762369762_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xpf1/t51.2885-15/e15/11189987_760530177376149_1762369762_n.jpg', 0, 4, '2015-05-04 11:55:18', 'https://instagram.com/p/2QsE47Bfio/', 'https://igcdn-photos-g-a.akamaihd.net/hphotos-ak-xpa1/t51.2885-19/11137940_1390707257918822_2230405_a.jpg', 'พี่แบงค์ น้องแบงค์', 'http://instagram.com/oxigen_bank', 'oxigen_bank', 1, 1, '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(14, 'https://scontent.cdninstagram.com/hphotos-xfa1/t51.2885-15/s150x150/e15/11226872_420701948107062_1686992498_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xfa1/t51.2885-15/e15/11226872_420701948107062_1686992498_n.jpg', 0, 5, '2015-05-04 10:53:26', 'https://instagram.com/p/2Qk_u7hfoC/', 'https://igcdn-photos-g-a.akamaihd.net/hphotos-ak-xpa1/t51.2885-19/11137940_1390707257918822_2230405_a.jpg', 'พี่แบงค์ น้องแบงค์', 'http://instagram.com/oxigen_bank', 'oxigen_bank', 1, 1, '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(15, 'https://scontent.cdninstagram.com/hphotos-xtp1/t51.2885-15/s150x150/e15/11193121_458957797601883_25417502_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xtp1/t51.2885-15/e15/11193121_458957797601883_25417502_n.jpg', 0, 4, '2015-05-04 10:34:20', 'https://instagram.com/p/2Qiz8gBfkh/', 'https://igcdn-photos-g-a.akamaihd.net/hphotos-ak-xpa1/t51.2885-19/11137940_1390707257918822_2230405_a.jpg', 'พี่แบงค์ น้องแบงค์', 'http://instagram.com/oxigen_bank', 'oxigen_bank', 1, 1, '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(16, 'https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/s150x150/e15/11226817_1655759594643842_1049156876_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/e15/11226817_1655759594643842_1049156876_n.jpg', 0, 12, '2015-05-04 10:30:50', 'https://instagram.com/p/2QiaTahfj5/', 'https://igcdn-photos-g-a.akamaihd.net/hphotos-ak-xpa1/t51.2885-19/11137940_1390707257918822_2230405_a.jpg', 'พี่แบงค์ น้องแบงค์', 'http://instagram.com/oxigen_bank', 'oxigen_bank', 1, 1, '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(17, 'https://scontent.cdninstagram.com/hphotos-xap1/t51.2885-15/s150x150/e15/11192590_982163421834531_1305257670_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xap1/t51.2885-15/e15/11192590_982163421834531_1305257670_n.jpg', 3, 23, '2015-05-04 09:19:28', 'https://instagram.com/p/2QaPlBsrVN/', 'https://igcdn-photos-f-a.akamaihd.net/hphotos-ak-xta1/t51.2885-19/11192902_1424431894540285_1619901174_a.jpg', 'Pha Wiphachat', 'http://instagram.com/wiphachat', 'wiphachat', 1, 5, '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(18, 'https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/s150x150/e15/11226847_978881548802556_129774763_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/e15/11226847_978881548802556_129774763_n.jpg', 0, 12, '2015-05-04 06:28:00', 'https://instagram.com/p/2QGnqQqyPt/', 'https://igcdn-photos-a-a.akamaihd.net/hphotos-ak-xap1/t51.2885-19/11208600_1435932063388256_1824370737_a.jpg', 'Vachiravit E. Saelee', 'http://instagram.com/e.earthhvachiravit', 'e.earthhvachiravit', 1, 6, '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(19, 'https://scontent.cdninstagram.com/hphotos-xtp1/t51.2885-15/s150x150/e15/11191573_822268424525271_1285349130_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xtp1/t51.2885-15/e15/11191573_822268424525271_1285349130_n.jpg', 0, 52, '2015-05-04 06:15:05', 'https://instagram.com/p/2QFJC8kQGg/', 'https://igcdn-photos-e-a.akamaihd.net/hphotos-ak-xaf1/t51.2885-19/11195862_1590437084538580_2095787681_a.jpg', 'plaiphun❤️', 'http://instagram.com/plaiphun', 'plaiphun', 1, 6, '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(20, 'https://scontent.cdninstagram.com/hphotos-xpa1/t51.2885-15/s150x150/e15/11187098_1005042826180860_1040629576_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xpa1/t51.2885-15/e15/11187098_1005042826180860_1040629576_n.jpg', 2, 11, '2015-05-04 05:50:53', 'https://instagram.com/p/2QCX3jnnIY/', 'https://igcdn-photos-g-a.akamaihd.net/hphotos-ak-xap1/t51.2885-19/11190165_532946533510166_110273559_a.jpg', 'Proud Phu Fah', 'http://instagram.com/jinnie_proud', 'jinnie_proud', 1, 6, '2015-05-06 08:30:39', '2015-05-06 08:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `imagetag`
--

CREATE TABLE IF NOT EXISTS `imagetag` (
  `imagetag_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`imagetag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=50 ;

--
-- Dumping data for table `imagetag`
--

INSERT INTO `imagetag` (`imagetag_id`, `tag_id`, `image_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 5, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 6, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 1, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 2, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 7, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 1, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 17, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 8, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 1, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 2, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 1, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 1, 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 9, 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 1, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 9, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 14, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 10, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 1, 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 11, 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 1, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 12, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 13, 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 1, 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 7, 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 1, 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 7, 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 14, 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 1, 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 7, 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 15, 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 14, 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 1, 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 7, 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 16, 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 1, 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 17, 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 1, 18, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 7, 18, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 18, 18, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 1, 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 7, 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 19, 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 1, 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 7, 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `location_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `longitude` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `name`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, ' ', ' ', ' ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'เพทาย สบายโฮม รีสอร์ท @เขาค้อ', '16.779710285', '101.006578657', '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(3, 'Pino Latte at วิววัดผาซ่อนแก้ว เขาค้อ', '16.79486661', '101.041894354', '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(4, 'Pino Latte Resort & Cafe', '16.60812', '100.97982', '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(5, 'The Blue Sky Resort Khao Kho', '16.779330666', '101.019849449', '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(6, 'วัดพระธาตุผาซ่อนแก้ว จังหวัดเพชรบูรณ์', '16.78941262', '101.050737781', '2015-05-06 08:30:39', '2015-05-06 08:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_01_27_061915_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mintag`
--

CREATE TABLE IF NOT EXISTS `mintag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `min_tag_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mintag`
--

INSERT INTO `mintag` (`id`, `min_tag_id`, `created_at`, `updated_at`) VALUES
(1, '978646733932765751', '2015-05-06 08:30:40', '2015-05-06 08:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `source`
--

CREATE TABLE IF NOT EXISTS `source` (
  `source_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`source_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `source`
--

INSERT INTO `source` (`source_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Instagram', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Facebook', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `tag_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pull_from_ig` tinyint(1) NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`tag_id`, `tag`, `pull_from_ig`, `status`, `created_at`, `updated_at`) VALUES
(1, 'khaokho', 1, 'Use', '0000-00-00 00:00:00', '2015-05-09 11:02:25'),
(2, 'phetchabun', 1, 'Use', '0000-00-00 00:00:00', '2015-05-09 11:04:05'),
(3, 'route12', 1, 'Use', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'vscocam', 1, 'Use', '2015-05-06 08:30:39', '2015-05-09 15:13:08'),
(5, 'slowlife', 1, 'Not', '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(6, 'fasinated', 1, 'Not', '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(7, 'thailand', 1, 'Not', '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(8, 'throwbackthursday', 1, 'Not', '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(9, 'theblueskyresort', 1, 'Not', '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(10, 'thebluesky', 1, 'Not', '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(11, 'beforesunset', 1, 'Not', '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(12, 'siditwaterfall', 1, 'Not', '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(13, 'strom', 1, 'Not', '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(14, 'petchabun', 1, 'Not', '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(15, 'เขาค', 1, 'Not', '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(16, 'rain', 1, 'Not', '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(17, 'wiphachataroundtheworld', 1, 'Not', '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(18, 'buddha', 1, 'Not', '2015-05-06 08:30:39', '2015-05-06 08:30:39'),
(19, 'moai', 1, 'Not', '2015-05-06 08:30:39', '2015-05-06 08:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(320) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(6, 'Admin', 'admin', 'admin@admin.com', '$2y$10$QxY4m9KqS7ifHkzNO1MAmOFC5Y6qKaowBaoQ2r8RIJD7Z8VAuSr5W', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
