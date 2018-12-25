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

