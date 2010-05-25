DROP TABLE IF EXISTS `#__tageler`;
DROP TABLE IF EXISTS `#__tagelerfelder`;

CREATE TABLE `#__tageler` (
  `einheit` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `datum` date NULL,
  `titel` varchar(50) NULL,
  `beginn` varchar(50) NULL,
  `schluss` varchar(50) NULL,
  `mitbringen` text NULL,
  `tenue` text NULL,
  PRIMARY KEY  (`einheit`)
);

CREATE TABLE `#__tagelerfelder` (
  `id` int NOT NULL AUTO_INCREMENT,
  `einheit` varchar(20) NOT NULL,
  `titel` varchar(50) NULL,
  `inhalt` text NULL,
  `idx` int NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`einheit`) REFERENCES tageler(einheit) ON DELETE CASCADE
);

INSERT INTO `#__tageler` (einheit, name, datum, titel, beginn, schluss, mitbringen, tenue) 
VALUES ('bib', 'Biber', '2010-05-17', 'Test',
        '14:00 Weiermattheim', '17:00 Weiermattheim',
        'Nicht vergessen ...', 'Wetter angepasste Kleidung');

INSERT INTO `#__tageler` (einheit, name, datum, titel, beginn, schluss, mitbringen, tenue) 
VALUES ('bab', 'Bachbienli', '2010-05-17', 'Test',
        '14:00 Weiermattheim', '17:00 Weiermattheim',
        'Nicht vergessen ...', 'Wetter angepasste Kleidung');

INSERT INTO `#__tageler` (einheit, name, datum, titel, beginn, schluss, mitbringen, tenue) 
VALUES ('ake', 'Akela', '2010-05-17', 'Test',
        '14:00 Weiermattheim', '17:00 Weiermattheim',
        'Nicht vergessen ...', 'Wetter angepasste Kleidung');

INSERT INTO `#__tageler` (einheit, name, datum, titel, beginn, schluss, mitbringen, tenue) 
VALUES ('pit', 'Pitry', '2010-05-17', 'Test',
        '14:00 Weiermattheim', '17:00 Weiermattheim',
        'Nicht vergessen ...', 'Wetter angepasste Kleidung');

INSERT INTO `#__tageler` (einheit, name, datum, titel, beginn, schluss, mitbringen, tenue) 
VALUES ('fla', 'Flammetrupp', '2010-05-17', 'Test',
        '14:00 Weiermattheim', '17:00 Weiermattheim',
        'Nicht vergessen ...', 'Wetter angepasste Kleidung');

INSERT INTO `#__tageler` (einheit, name, datum, titel, beginn, schluss, mitbringen, tenue) 
VALUES ('st', 'Schlosstrupp', '2010-05-17', 'Test',
        '14:00 Weiermattheim', '17:00 Weiermattheim',
        'Nicht vergessen ...', 'Wetter angepasste Kleidung');

INSERT INTO `#__tageler` (einheit, name, datum, titel, beginn, schluss, mitbringen, tenue) 
VALUES ('kom', 'Komodo', '2010-05-17', 'Test',
        '14:00 Weiermattheim', '17:00 Weiermattheim',
        'Nicht vergessen ...', 'Wetter angepasste Kleidung');

INSERT INTO `#__tageler` (einheit, name, datum, titel, beginn, schluss, mitbringen, tenue) 
VALUES ('loe', 'Löwenburg', '2010-05-17', 'Test',
        '14:00 Weiermattheim', '17:00 Weiermattheim',
        'Nicht vergessen ...', 'Wetter angepasste Kleidung');

INSERT INTO `#__tageler` (einheit, name, datum, titel, beginn, schluss, mitbringen, tenue) 
VALUES ('cora', "CoRa's", '2010-05-17', 'Test',
        '14:00 Weiermattheim', '17:00 Weiermattheim',
        'Nicht vergessen ...', 'Wetter angepasste Kleidung');

INSERT INTO `#__tagelerfelder` (einheit, titel, inhalt, idx)
VALUES ('bib', '', 'Liebe Grüsse vom Leitungsteam', 99);

INSERT INTO `#__tagelerfelder` (einheit, titel, inhalt, idx)
VALUES ('bab', '', 'Liebe Grüsse vom Leitungsteam', 99);

INSERT INTO `#__tagelerfelder` (einheit, titel, inhalt, idx)
VALUES ('ake', '', 'Liebe Grüsse vom Leitungsteam', 99);

INSERT INTO `#__tagelerfelder` (einheit, titel, inhalt, idx)
VALUES ('pit', '', 'Liebe Grüsse vom Leitungsteam', 99);

INSERT INTO `#__tagelerfelder` (einheit, titel, inhalt, idx)
VALUES ('fla', '', 'Liebe Grüsse vom Leitungsteam', 99);

INSERT INTO `#__tagelerfelder` (einheit, titel, inhalt, idx)
VALUES ('st', '', 'Liebe Grüsse vom Leitungsteam', 99);

INSERT INTO `#__tagelerfelder` (einheit, titel, inhalt, idx)
VALUES ('kom', '', 'Liebe Grüsse vom Leitungsteam', 99);

INSERT INTO `#__tagelerfelder` (einheit, titel, inhalt, idx)
VALUES ('loe', '', 'Liebe Grüsse vom Leitungsteam', 99);

INSERT INTO `#__tagelerfelder` (einheit, titel, inhalt, idx)
VALUES ('cora', '', 'Liebe Grüsse vom Leitungsteam', 99);