--
-- Dumping data for table `User`
--

INSERT INTO `User` VALUES (1,'mahw17@student.bth.se','mahw17','$2y$10$NYVSvt26dUwyptfM07liGOny33V4uUWAj/32QtWxwH8nEDUXghv7K',5,'https://www.gravatar.com/avatar/7b52853740e742b680b771c5aadc632e?d=robohash','2018-12-26 05:32:24'),(2,'marcus@mejl.se','Marcus','$2y$10$H9WdfzGysLIuGdcjcvzAdetPFXYqI2OeItRzTHMfQCfTxsUtGO0r.',8,'https://www.gravatar.com/avatar/85e7ab8b1154e5daca6bcbfca84a98ec?d=robohash','2018-12-26 05:51:08'),(3,'macke@epost.com','Macke','$2y$10$WlAB1ORi4YEG7MkGcLepe.ngUAgAllhxYDLNddWj933THqfIzEy1a',10,'https://www.gravatar.com/avatar/28fb009ca2234bde3a1072afac834f2d?d=robohash','2018-12-26 05:56:56');


--
-- Dumping data for table `Question`
--

INSERT INTO `Question` VALUES (1,'Hur mycket v&auml;ger en v&auml;lt?','<p>Hur mycket v&auml;ger till exempel Dynapacs CC6200?</p>\n','MASKINVIKT;DYNAPAC',1,'2018-12-26 05:33:47',0),(2,'Varianter av v&auml;ltar?','<p>Vilka olika typer av v&auml;ltar har Dynapac?</p>\n','DYNAPAC;MASKINVARIANTER',1,'2018-12-26 05:36:40',0),(3,'Vilken packningsteknik?','<p>Vilka olika typer av packningstekniker finns det?</p>\n','PACKNINGSTEKNIK',2,'2018-12-26 05:54:17',0),(4,'Kostnad','<p>Vad kostar en Dynapac v&auml;lt?</p>\n','DYNAPAC;PRIS',2,'2018-12-26 05:55:59',0),(5,'Vad &auml;r Dyn@lyzer?','<p>Jag har h&ouml;rt talas om Dyn@lyzer men vet inte vad det &auml;r eller vad det anv&auml;nds till, n&aring;gon som vet?</p>\n','DYNAPAC;DYN@LYZER;PACKNINGSTEKNIK',3,'2018-12-26 06:00:01',0);


--
-- Dumping data for table `Answer`
--

INSERT INTO `Answer` VALUES (1,'SV: Varianter av v&amp;auml;ltar?','<p>Man brukar tala om tv&aring; olika typer. Dels jordpackningsv&auml;ltarna med en stor vals och en traktorbakram samt asfaltsv&auml;ltar med tv&aring; valsar.</p>\n',2,3,'2018-12-26 06:04:10',0),(2,'SV: Kostnad','<p>Det beror ju ju delvis i vilken del av v&auml;rlden du handlar men cirka 80.000 SEK f&ouml;r den minsta v&auml;lten CC800 och en fullutrustad CC6200 kan nog g&aring; p&aring; cirka 1.500.000SEK.</p>\n',4,3,'2018-12-26 06:06:01',0);


--
-- Dumping data for table `Comment`
--

INSERT INTO `Comment` VALUES (1,'<p>Vilken SI-enhet?</p>\n','q',1,3,'2018-12-26 06:01:12',0),(2,'<p>Vilken typ och storlek?</p>\n','q',4,3,'2018-12-26 06:02:18',0),(3,'<p>Alla sorter!</p>\n','q',4,2,'2018-12-26 06:08:10',0),(4,'<p>Tack f&ouml;r det svaret!</p>\n','a',2,2,'2018-12-26 06:08:46',0),(5,'<p>Asfaltsv&auml;ltarna kan ocks&aring; ha en gummif&ouml;rsedd vals f&ouml;r att f&aring; ett &auml;nnu finare ytskick p&aring; asfalten.</p>\n','a',1,2,'2018-12-26 06:10:30',0),(6,'<p>Menar du inte Dyn@link?</p>\n','q',5,2,'2018-12-26 06:11:11',0),(7,'<p>Jaa.. vad tror du sj&auml;lv? Kilogram alternativt ton t&auml;nkte jag nog.</p>\n','q',1,1,'2018-12-26 06:14:26',0);


--
-- Dumping data for table `Tag`
--

INSERT INTO `Tag` VALUES (1,'MASKINVIKT',1),(2,'DYNAPAC',1),(3,'DYNAPAC',2),(4,'MASKINVARIANTER',2),(5,'PACKNINGSTEKNIK',3),(6,'DYNAPAC',4),(7,'PRIS',4),(8,'DYNAPAC',5),(9,'DYN@LYZER',5),(10,'PACKNINGSTEKNIK',5);
