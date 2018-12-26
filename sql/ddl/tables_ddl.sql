--
-- Table User
--
DROP TABLE IF EXISTS User;
CREATE TABLE User (
    `id` INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `acronym` VARCHAR(80) UNIQUE NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `rank` INTEGER DEFAULT 0,
    `gravatar` VARCHAR(255),
    `created` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE INNODB CHARACTER SET utf8 COLLATE utf8_swedish_ci;



--
-- Table Question
--
DROP TABLE IF EXISTS Question;
CREATE TABLE Question (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `title` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
    `body` varchar(1000) COLLATE utf8_swedish_ci NOT NULL,
    `tags` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
    `userid` int(11) NOT NULL,
    `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `status` int(1) DEFAULT 0,
    PRIMARY KEY (`id`)
) ENGINE INNODB CHARACTER SET utf8 COLLATE utf8_swedish_ci;



--
-- Table Answer
--
DROP TABLE IF EXISTS Answer;
CREATE TABLE Answer (
    `id` int(11) NOT NULL AUTO_INCREMENT,
	`title` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
    `body` varchar(1000) COLLATE utf8_swedish_ci NOT NULL,
    `questionid` int(11) NOT NULL,
    `userid` int(11) NOT NULL,
    `created` datetime DEFAULT CURRENT_TIMESTAMP,
    `status` int(1) DEFAULT 0,
    PRIMARY KEY (`id`)
) ENGINE INNODB CHARACTER SET utf8 COLLATE utf8_swedish_ci;


--
-- Table Comments
--
DROP TABLE IF EXISTS Comment;
CREATE TABLE Comment (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `body` varchar(1000) COLLATE utf8_swedish_ci NOT NULL,
    `source` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
    `sourceid` int(11) NOT NULL,
    `userid` int(11) NOT NULL,
    `created` datetime DEFAULT CURRENT_TIMESTAMP,
    `status` int(1) DEFAULT 0,
    PRIMARY KEY (`id`)
) ENGINE INNODB CHARACTER SET utf8 COLLATE utf8_swedish_ci;



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
