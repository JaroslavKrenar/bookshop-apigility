CREATE TABLE IF NOT EXISTS `book` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `isbn` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rating` decimal(8,2) DEFAULT NULL,
  `release_date` date NOT NULL
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `book` (`id`, `isbn`, `author`, `title`, `rating`, `release_date`, `created_at`, `updated_at`) VALUES
	(1, '9791035336684', 'Prof. Troy Waters', 'Last came a little pattering of footsteps in the.', 7.26, '1974-05-30', '2016-07-05 20:29:25', '2016-07-05 20:29:25'),
	(2, '9787249529240', 'Hoyt Kris', 'FIT you,\' said the Duck. \'Found IT,\' the Mouse.', 19.31, '1988-07-21');
