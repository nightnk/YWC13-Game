-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.9-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table ywc13_game.choice
CREATE TABLE IF NOT EXISTS `choice` (
  `choiceId` varchar(20) NOT NULL,
  `questionId` int(4) NOT NULL,
  `text` text NOT NULL,
  `point` int(4) NOT NULL,
  PRIMARY KEY (`choiceId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ywc13_game.choice: ~19 rows (approximately)
/*!40000 ALTER TABLE `choice` DISABLE KEYS */;
INSERT INTO `choice` (`choiceId`, `questionId`, `text`, `point`) VALUES
	('q1_1', 1, 'เดิน', 0),
	('q1_2', 1, 'บิน', 2),
	('q1_3', 1, 'ประตูมิติ', 5),
	('q1_4', 1, 'อื่นๆๆ', 3),
	('q2_1', 2, 'DELL', 4),
	('q2_2', 2, 'MSI', 3),
	('q2_3', 2, 'Android', 2),
	('q2_4', 2, 'OSX', 5),
	('q3_1', 3, '5555', 0),
	('q3_2', 3, 'AAAA', 2),
	('q3_3', 3, 'web', 5),
	('q4_1', 4, '1111', 0),
	('q4_2', 4, '33333', 5),
	('q4_3', 4, 'aaaaa', 2),
	('q4_4', 3, 'xml', 4),
	('q5_1', 5, 'เงิน', 3),
	('q5_2', 5, 'เงินๆๆ', 4),
	('q5_3', 5, 'ทอง', 0),
	('q5_4', 5, 'ทองๆๆ', 1);
/*!40000 ALTER TABLE `choice` ENABLE KEYS */;


-- Dumping structure for table ywc13_game.group_log
CREATE TABLE IF NOT EXISTS `group_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupId` varchar(10) NOT NULL DEFAULT '0',
  `stationId` int(4) NOT NULL DEFAULT '0',
  `answer` varchar(10) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '1 ตอบถูก  , -1 ตอบผิด ,0 ตอบไม่ทันเวลา',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Dumping data for table ywc13_game.group_log: ~2 rows (approximately)
/*!40000 ALTER TABLE `group_log` DISABLE KEYS */;
INSERT INTO `group_log` (`id`, `groupId`, `stationId`, `answer`, `status`, `timestamp`) VALUES
	(12, '1', 1, 'q2_1', -1, '2016-01-03 20:15:14'),
	(13, '1', 2, 'q4_1', -1, '2016-01-05 00:08:05');
/*!40000 ALTER TABLE `group_log` ENABLE KEYS */;


-- Dumping structure for table ywc13_game.point
CREATE TABLE IF NOT EXISTS `point` (
  `groupId` varchar(10) NOT NULL,
  `point` int(11) NOT NULL,
  PRIMARY KEY (`groupId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ywc13_game.point: ~11 rows (approximately)
/*!40000 ALTER TABLE `point` DISABLE KEYS */;
INSERT INTO `point` (`groupId`, `point`) VALUES
	('1', 19),
	('10', 0),
	('11', 0),
	('2', 0),
	('3', 0),
	('4', 0),
	('5', 0),
	('6', 0),
	('7', 0),
	('8', 0),
	('9', 0);
/*!40000 ALTER TABLE `point` ENABLE KEYS */;


-- Dumping structure for table ywc13_game.question
CREATE TABLE IF NOT EXISTS `question` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `stationId` int(4) NOT NULL,
  `text` text NOT NULL,
  `correctChoiceId` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table ywc13_game.question: ~5 rows (approximately)
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` (`id`, `stationId`, `text`, `correctChoiceId`) VALUES
	(1, 1, 'การเดินทางทางไหนเร็วสุดดด', 'q1_3'),
	(2, 1, 'Notebook อะไรๆๆๆ', 'q2_4'),
	(3, 1, 'งานการไม่ทำ', 'q3_2'),
	(4, 2, 'ข้อมูลอะไรเยอะ สุด', 'q4_2'),
	(5, 2, 'อะไร มีมากที่สุด', 'q5_1');
/*!40000 ALTER TABLE `question` ENABLE KEYS */;


-- Dumping structure for table ywc13_game.station
CREATE TABLE IF NOT EXISTS `station` (
  `id` int(4) NOT NULL,
  `status` int(4) NOT NULL COMMENT '0 ว่าง  1 ไม่ว่าง',
  `lastActivity` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ywc13_game.station: ~15 rows (approximately)
/*!40000 ALTER TABLE `station` DISABLE KEYS */;
INSERT INTO `station` (`id`, `status`, `lastActivity`) VALUES
	(1, 0, '1451826912'),
	(2, 0, '1451927078'),
	(3, 0, '0'),
	(4, 0, '0'),
	(5, 0, '0'),
	(6, 0, '0'),
	(7, 0, '0'),
	(8, 0, '0'),
	(9, 0, '0'),
	(10, 0, '0'),
	(11, 0, '0'),
	(12, 0, '0'),
	(13, 0, '0'),
	(14, 0, '0'),
	(15, 0, '0');
/*!40000 ALTER TABLE `station` ENABLE KEYS */;


-- Dumping structure for table ywc13_game.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `group` varchar(10) NOT NULL,
  `keypass` varchar(64) NOT NULL,
  `lastSessionId` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`keypass`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table ywc13_game.users: ~5 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `group`, `keypass`, `lastSessionId`) VALUES
	(1, '1', '1234', 'c20af474491e058472f7b5e2d312da3c4e709cf5'),
	(2, '2', '2345', NULL),
	(3, '3', '3456', NULL),
	(4, '4', '5678', NULL),
	(5, '5', '6789', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
