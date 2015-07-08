CREATE TABLE IF NOT EXISTS `lf_forms` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `author` int(5) NOT NULL,
  `title` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `email` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `lf_formdata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form_id` int(11) NOT NULL,
  `data` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
