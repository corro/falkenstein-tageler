DROP TABLE IF EXISTS `#__tageler`;

CREATE TABLE `#__tageler` (
  `einheit` varchar(20) NOT NULL,
  `datum` date NOT NULL,
  `titel` varchar(50) NOT NULL,
  `beginn` varchar(50) NOT NULL,
  `schluss` varchar(50) NOT NULL,
  `mitbringen` varchar(50) NOT NULL,
  `tenue` varchar(50) NOT NULL,
  PRIMARY KEY  (`einheit`)
);

CREATE TABLE `#__tagelerfelder` (
  `id` int NOT NULL AUTO_INCREMENT,
  `einheit` varchar(20) NOT NULL,
  `titel` varchar(50) NOT NULL,
  `inhalt` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`einheit`) REFERENCES tageler(einheit) ON DELETE CASCADE
);

INSERT INTO `#__tageler` (einheit, datum, titel, beginn, schluss, mitbringen, tenue) 
VALUES ('akela', '2010-05-17', 'Test',
        '14:00 Weiermattheim', '17:00 Weiermattheim',
        'Nicht vergessen ...', 'Wetter angepasste Kleidung');

INSERT INTO `#__tageler` (einheit, datum, titel, beginn, schluss, mitbringen, tenue) 
VALUES ('pitry', '2010-05-17', 'Test',
        '14:00 Weiermattheim', '17:00 Weiermattheim',
        'Nicht vergessen ...', 'Wetter angepasste Kleidung');

INSERT INTO `#__tageler` (einheit, datum, titel, beginn, schluss, mitbringen, tenue) 
VALUES ('komodo', '2010-05-17', 'Test',
        '14:00 Weiermattheim', '17:00 Weiermattheim',
        'Nicht vergessen ...', 'Wetter angepasste Kleidung');

INSERT INTO `#__tagelerfelder` (einheit, titel, inhalt)
VALUES ('akela', 'Gruss', 'Liebe Grüsse vom Leitungsteam');

INSERT INTO `#__tagelerfelder` (einheit, titel, inhalt)
VALUES ('pitry', 'Gruss', 'Liebe Grüsse vom Leitungsteam');

INSERT INTO `#__tagelerfelder` (einheit, titel, inhalt)
VALUES ('komodo', 'Gruss', 'Liebe Grüsse vom Leitungsteam');