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

