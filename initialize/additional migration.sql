CREATE TABLE `calendar_event` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `title` varchar(45) NOT NULL,
      `details` text DEFAULT NULL,
      `is_active` int(11) DEFAULT NULL,
      `is_recurring` int(11) DEFAULT NULL,
      `start_date` date NOT NULL,
      `start_time` time NOT NULL,
      `created_on` datetime DEFAULT NULL,
      `created_by` int(11) DEFAULT NULL,
      `priority` int(11) NOT NULL,
      `country` int(11) DEFAULT NULL,
      `time_zone` int(11) DEFAULT NULL,
      PRIMARY KEY (`id`),
      KEY `is_active_fk_idx` (`is_active`),
      KEY `is_recurring_idx` (`is_recurring`),
      KEY `created_by_idx` (`created_by`),
      KEY `country_fk_idx` (`country`),
      KEY `time_zone_fk_idx` (`time_zone`),
      CONSTRAINT `country_fk` FOREIGN KEY (`country`) REFERENCES `country` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
      CONSTRAINT `created_by_fk` FOREIGN KEY (`created_by`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
      CONSTRAINT `is_active_fk` FOREIGN KEY (`is_active`) REFERENCES `yes_or_no` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
      CONSTRAINT `is_recurring_fk` FOREIGN KEY (`is_recurring`) REFERENCES `yes_or_no` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
                                  CONSTRAINT `time_zone_fk` FOREIGN KEY (`time_zone`) REFERENCES `time_zone` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4;




INSERT INTO routing_table (id, unique_name, label, page_file, is_default, is_visible, ordinal, requires_login) VALUES
(18, 'calendar_event', 'Calendar event', 'calendar_event.page', null, 1, 9, 1);