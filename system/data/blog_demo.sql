-- -----------------------------------------------------
-- Table `user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(20) NOT NULL,
  `password` VARCHAR(40) NOT NULL,
  `email` VARCHAR(96) NOT NULL,
  `image` VARCHAR(255) NOT NULL,
  `ip` VARCHAR(40) NOT NULL,
  `date_added` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `post`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `post` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `content` TEXT NOT NULL,
  `viewed` INT(5) NOT NULL DEFAULT '0',
  `commented` INT(5) NOT NULL DEFAULT '0',
  `date_added` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `comment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `comment` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `post_id` INT(11) NOT NULL,
  `user_id` INT(11) NOT NULL,
  `author` VARCHAR(64) NOT NULL,
  `text` TEXT NOT NULL,
  `data_added` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
