--
-- Table Tag
--
DROP TABLE IF EXISTS Tag;
CREATE TABLE Tag (
	`id` int(11) NOT NULL AUTO_INCREMENT,
    `tag` varchar(120) COLLATE utf8_swedish_ci NOT NULL,
    `questionid` int(11) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE INNODB CHARACTER SET utf8 COLLATE utf8_swedish_ci;
