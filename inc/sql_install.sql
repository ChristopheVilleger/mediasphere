
CREATE TABLE IF NOT EXISTS `wp_mediasphere` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(72) DEFAULT NULL,
  `release_date` datetime DEFAULT NULL,
  `category` varchar(72) DEFAULT NULL,
  `youtube_link` varchar(72) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

INSERT INTO `wp_mediasphere` (`id`, `title`, `release_date`, `category`, `youtube_link`) VALUES
(3, 'Guild wars test', '1991-12-20 00:00:00', 'Guild Wars', 'https://www.youtube.com/watch?v=mvu5n31lwSo'),
(4, 'Guild wars 2 mois aprÃ¨s', '1991-12-20 00:00:00', 'Guild Wars', 'https://www.youtube.com/watch?v=HkKceoHPEcU'),
(5, 'Guild wars 2 review', '1991-12-20 00:00:00', 'Guild Wars', 'https://www.youtube.com/watch?v=Ax-_06Acj8Y'),
(6, 'Guild wars is Dying', '1991-12-20 00:00:00', 'Guild Wars', 'https://www.youtube.com/watch?v=xHt8JrDQeuM'),
(7, 'Guild wars truc & astuce', '1998-07-12 00:00:00', 'Guild Wars', 'https://www.youtube.com/watch?v=LtbaqDyShbw'),
(8, 'Guild Wars 2 - PC Preview Gameplay ', '1998-07-12 00:00:00', 'Guild Wars', 'https://www.youtube.com/watch?v=kVdihizq4XE');

CREATE TABLE IF NOT EXISTS `wp_mediasphere_settings` (
  `id` int(11) NOT NULL,
  `home_widgets_order` varchar(100) NOT NULL,
  `home_last_videos` int(10) NOT NULL,
  `home_socials` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `wp_mediasphere_settings` (`id`, `home_widgets_order`, `home_last_videos`, `home_socials`) VALUES
(0, '"0,1,2,3,4"', 0, '{"fb":{"link":"","text":""},"tw":{"link":"","text":""},"ln":{"link":"","text":""},"pi":{"link":"","text":""},"gg":{"link":"","text":""},"yt":{"link":"","text":""}}');
