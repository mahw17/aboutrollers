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

