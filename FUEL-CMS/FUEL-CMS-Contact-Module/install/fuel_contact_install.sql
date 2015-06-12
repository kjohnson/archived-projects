#
# Table structure for table `fuel_contact_contacts`
#

CREATE TABLE IF NOT EXISTS `fuel_contact_contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `display_name` varchar(50) NOT NULL,
  `website` varchar(100) NULL,
  `email` varchar(255) NULL,
  `blurb` text NULL,
  `avatar_image` varchar(255) NULL,
  `twitter` varchar(255) NULL,
  `facebook` varchar(255) NULL,
  `linkedin` varchar(255) NULL,
  `google` varchar(255) NULL,
  `precedence` int(11) NOT NULL DEFAULT '0',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` enum('yes','no') NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;
INSERT INTO `fuel_contact_contacts` (`id`, `display_name`, `blurb`)
VALUES
  (1, 'Admin', 'The Website Administrator');


# --------------------------------------------------------

#
# Table structure for table `fuel_contact_messages`
#

CREATE TABLE IF NOT EXISTS `fuel_contact_messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `submitted` datetime NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `read` enum('no','yes') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;