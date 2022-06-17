#USE demoapp;

SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `id` int(8) NOT NULL,
  `iso` char(2) DEFAULT NULL,
  `label` varchar(80) DEFAULT NULL COMMENT '{"fields":{"setDisplayField":"label"}}',
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;



DROP TABLE IF EXISTS `person`;
CREATE TABLE `person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reports_to_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `record_status_id` int(5) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `time_zone_id` int(8) DEFAULT NULL,
  `profile_picture_id` int(10) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `login_cookie` text DEFAULT NULL,
  `login_ip` varchar(255) DEFAULT NULL,
  `login_time` datetime DEFAULT NULL,
  `login_duration_minutes` int(8) DEFAULT NULL,
  `login_agent` varchar(255) DEFAULT NULL,
  `activation_code` text DEFAULT NULL,
  `reset_password_code` text DEFAULT NULL,
  `reset_password_time` datetime DEFAULT NULL,
  `requires_login_device_approval` int(8) DEFAULT NULL,
  `modulet` text DEFAULT NULL,
  `person_type_id` int(8) DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `work_location` varchar(255) DEFAULT NULL,
  `time_restricted_login_start_time` time DEFAULT NULL,
  `time_restricted_login_end_time` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `demoapp_lafperson_username_uq_idx` (`username`),
  KEY `demoapp_lafperson_created_by_id_fk` (`created_by`),
  KEY `demoapp_lafperson_updated_by_id_fk` (`updated_by`),
  KEY `demoapp_lafperson_reports_to_id_fk` (`reports_to_id`),
  KEY `demoapp_lafperson_record_status_id_fk` (`record_status_id`),
  KEY `demoapp_lafperson_address_id_fk` (`address_id`),
  KEY `demoapp_lafperson_p_type_id_fk` (`person_type_id`),
  KEY `demoapp_lafperson_requires_login_device_approval_fk` (`requires_login_device_approval`),
  KEY `demoapp_lafperson_tz_id_fk` (`time_zone_id`),
  KEY `demoapp_lafperson_profile_pic_id_fk` (`profile_picture_id`),
  CONSTRAINT `demoapp_lafperson_created_by_id_fk` FOREIGN KEY (`created_by`) REFERENCES `person` (`id`),
  CONSTRAINT `demoapp_lafperson_p_type_id_fk` FOREIGN KEY (`person_type_id`) REFERENCES `person_type` (`id`),
  CONSTRAINT `demoapp_lafperson_profile_pic_id_fk` FOREIGN KEY (`profile_picture_id`) REFERENCES `document` (`id`),
  CONSTRAINT `demoapp_lafperson_record_address_id_fk` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`),
  CONSTRAINT `demoapp_lafperson_record_status_id_fk` FOREIGN KEY (`record_status_id`) REFERENCES `record_status` (`id`),
  CONSTRAINT `demoapp_lafperson_reports_to_id_fk` FOREIGN KEY (`reports_to_id`) REFERENCES `person` (`id`),
  CONSTRAINT `demoapp_lafperson_requires_login_device_approval_fk` FOREIGN KEY (`requires_login_device_approval`) REFERENCES `yes_or_no` (`id`),
  CONSTRAINT `demoapp_lafperson_tz_id_fk` FOREIGN KEY (`time_zone_id`) REFERENCES `time_zone` (`id`),
  CONSTRAINT `demoapp_lafperson_updated_by_id_fk` FOREIGN KEY (`updated_by`) REFERENCES `person` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;



DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state_province` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `attention` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `address_country_fk` (`country_id`),
  CONSTRAINT `address_country_fk` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `app_configuration`;
CREATE TABLE `app_configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `var_name` varchar(255) DEFAULT NULL,
  `var_value` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_config_var_name_uq_ix3` (`var_name`),
  KEY `app_config_created_fk1` (`created_by`),
  KEY `app_config_updated_fk1` (`updated_by`),
  CONSTRAINT `app_config_created_fk1` FOREIGN KEY (`created_by`) REFERENCES `person` (`id`),
  CONSTRAINT `app_config_updated_fk1` FOREIGN KEY (`updated_by`) REFERENCES `person` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `backups_daily`;
CREATE TABLE `backups_daily` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS `backups_hourly`;
CREATE TABLE `backups_hourly` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `change_log`;
CREATE TABLE `change_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `laf_schema_object` int(11) DEFAULT NULL,
  `field_name` varchar(255) DEFAULT NULL,
  `old_value` text DEFAULT NULL,
  `new_value` text DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `demoapp_lafchange_log_person_fd_idx` (`created_by`),
  CONSTRAINT `demoapp_lafchange_log_person_fd_idx` FOREIGN KEY (`created_by`) REFERENCES `person` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `currency`;
CREATE TABLE `currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Code` char(3) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `IsFund` tinyint(4) DEFAULT NULL,
  `IsComplimentary` tinyint(4) DEFAULT NULL,
  `IsMetal` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `document`;
CREATE TABLE `document` (
  `id` int(14) NOT NULL AUTO_INCREMENT,
  `file_name_original` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_extension` varchar(10) DEFAULT NULL,
  `file_size` int(10) DEFAULT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL,
  `parent_id` int(14) DEFAULT NULL,
  `thumbnail_name` varchar(255) DEFAULT NULL,
  `encrypt_key` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `demoapp_lafdocument_created_by_fk` (`created_by`),
  KEY `demoapp_lafdocument_parent_id_fk` (`parent_id`),
  KEY `demoapp_lafdocument_updated_by_fk` (`updated_by`),
  CONSTRAINT `demoapp_lafdocument_created_by_fk` FOREIGN KEY (`created_by`) REFERENCES `person` (`id`),
  CONSTRAINT `demoapp_lafdocument_parent_id_fk` FOREIGN KEY (`parent_id`) REFERENCES `document` (`id`),
  CONSTRAINT `demoapp_lafdocument_updated_by_fk` FOREIGN KEY (`updated_by`) REFERENCES `person` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `dummy_table`;
CREATE TABLE `dummy_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `varchar_field45` varchar(45) DEFAULT NULL,
  `text_field` text DEFAULT NULL,
  `integer_field` int(11) DEFAULT NULL,
  `decimal_field` decimal(8,2) DEFAULT NULL,
  `date_field` date DEFAULT NULL,
  `datetime_field` datetime DEFAULT NULL,
  `time_field` time DEFAULT NULL,
  `float_field` float DEFAULT NULL,
  `json_field` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_field`)),
  `null_field` text DEFAULT NULL,
  `empty_field` text DEFAULT NULL,
  `unique_field` text DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `demoapp_lafdt_unique_field_UNIQUE` (`unique_field`(255)),
  KEY `demoapp_lafdt_parent_id_fk` (`parent_id`),
  CONSTRAINT `demoapp_lafdt_parent_id_fk` FOREIGN KEY (`parent_id`) REFERENCES `dummy_table` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `email`;
CREATE TABLE `email` (
  `id` int(14) NOT NULL AUTO_INCREMENT,
  `email_from` text DEFAULT NULL,
  `email_to` text DEFAULT NULL,
  `email_cc` text DEFAULT NULL,
  `email_bcc` text DEFAULT NULL,
  `subject` text DEFAULT NULL,
  `body` text DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `sent_on` datetime DEFAULT NULL,
  `ref_hash` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `demoapp_lafemail_creator_fk_idx` (`created_by`),
  CONSTRAINT `demoapp_lafemail_creator_fk_idx` FOREIGN KEY (`created_by`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `email_attachment`;
CREATE TABLE `email_attachment` (
  `email_id` int(14) NOT NULL,
  `document_id` int(14) NOT NULL,
  PRIMARY KEY (`email_id`,`document_id`),
  KEY `email_attachment_fk1` (`document_id`),
  CONSTRAINT `email_attachment_fk1` FOREIGN KEY (`document_id`) REFERENCES `document` (`id`),
  CONSTRAINT `email_attachment_fk2` FOREIGN KEY (`email_id`) REFERENCES `email` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `group`;
CREATE TABLE `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `description` text NOT NULL,
  `record_status_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `group_record_status_id_fk_idx` (`record_status_id`),
  CONSTRAINT `group_record_status_id_fk` FOREIGN KEY (`record_status_id`) REFERENCES `record_status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `group_role`;
CREATE TABLE `group_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group_role_role_id_fk` (`role_id`),
  KEY `group_role_group_id_fk` (`group_id`),
  CONSTRAINT `group_role_group_id_fk` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`),
  CONSTRAINT `group_role_role_id_fk` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `group_routing_table`;
CREATE TABLE `group_routing_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `routing_table_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group_routing_table_routing_table_id_fk` (`routing_table_id`),
  KEY `group_routing_table_group_id_fk` (`group_id`),
  CONSTRAINT `group_routing_table_group_id_fk` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`),
  CONSTRAINT `group_routing_table_routing_table_id_fk` FOREIGN KEY (`routing_table_id`) REFERENCES `routing_table` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `laf_schema_object`;
CREATE TABLE `laf_schema_object` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `demoapp_laflaf_schema_object_email_uq_idx` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `description` varchar(51) DEFAULT NULL,
  `native` varchar(57) DEFAULT NULL,
  `iso6391` varchar(2) DEFAULT NULL,
  `iso6392T` varchar(3) DEFAULT NULL,
  `iso6392b` varchar(3) DEFAULT NULL,
  `iso6393` varchar(5) DEFAULT NULL,
  `iso6396` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `note`;
CREATE TABLE `note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) DEFAULT NULL,
  `row_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `BODY` text DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `note_object_id_fk1` (`object_id`),
  KEY `note_creator_fk2` (`created_by`),
  KEY `note_updator_fk3` (`updated_by`),
  CONSTRAINT `note_creator_fk2` FOREIGN KEY (`created_by`) REFERENCES `person` (`id`),
  CONSTRAINT `note_object_id_fk1` FOREIGN KEY (`object_id`) REFERENCES `object_list` (`id`),
  CONSTRAINT `note_updator_fk3` FOREIGN KEY (`updated_by`) REFERENCES `person` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `object_list`;
CREATE TABLE `object_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) DEFAULT NULL,
  `object_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `person_group`;
CREATE TABLE `person_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `person_group_person_id_fk` (`person_id`),
  KEY `person_group_group_id_fk` (`group_id`),
  CONSTRAINT `person_group_group_id_fk` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`),
  CONSTRAINT `person_group_person_id_fk` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `person_login_device`;
CREATE TABLE `person_login_device` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(8) DEFAULT NULL,
  `ip_address` varchar(100) DEFAULT NULL,
  `cookie` varchar(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `device_name` text DEFAULT NULL,
  `approved_by` int(8) DEFAULT NULL,
  `approved_on` datetime DEFAULT NULL,
  `expires_on` datetime DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `record_status_id` int(11) DEFAULT 2,
  `is_mobile_device` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `demoapp_lafperson_login_device_person_id_fk` (`person_id`),
  KEY `demoapp_lafperson_login_device_approved_by_fk` (`approved_by`),
  KEY `person_login_device_status_fk` (`record_status_id`),
  KEY `person_login_device_is_mobile_fk` (`is_mobile_device`),
  CONSTRAINT `demoapp_lafperson_login_device_approved_by_fk` FOREIGN KEY (`approved_by`) REFERENCES `person` (`id`),
  CONSTRAINT `demoapp_lafperson_login_device_person_id_fk` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`),
  CONSTRAINT `person_login_device_is_mobile_fk` FOREIGN KEY (`is_mobile_device`) REFERENCES `yes_or_no` (`id`),
  CONSTRAINT `person_login_device_status_fk` FOREIGN KEY (`record_status_id`) REFERENCES `record_status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `person_login_log`;
CREATE TABLE `person_login_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(14) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `device_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `demoapp_lafperson_login_log_fk1` (`person_id`),
  KEY `person_login_log_device_fk` (`device_id`),
  CONSTRAINT `demoapp_lafperson_login_log_fk1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`),
  CONSTRAINT `person_login_log_device_fk` FOREIGN KEY (`device_id`) REFERENCES `person_login_device` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='login history for users';

DROP TABLE IF EXISTS `person_password_history`;


CREATE TABLE `person_password_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(14) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `demoapp_lafperson_pass_history_login_log_fk1` (`person_id`),
  CONSTRAINT `demoapp_lafperson_pass_history_login_log_fk1` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Password history for users';


DROP TABLE IF EXISTS `person_type`;
CREATE TABLE `person_type` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `record_status`;
CREATE TABLE `record_status` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `record_status_id` int(11) DEFAULT NULL,
  `unique_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `role_uq_fld_ix2` (`unique_name`),
  KEY `role_record_status_id_fk_idx` (`record_status_id`),
  CONSTRAINT `role_record_status_id_fk_idx` FOREIGN KEY (`record_status_id`) REFERENCES `record_status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `routing_table`;
CREATE TABLE `routing_table` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `parent_id` int(8) DEFAULT NULL,
  `unique_name` varchar(55) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `page_file` varchar(150) DEFAULT NULL,
  `is_default` int(1) DEFAULT NULL,
  `is_visible` int(1) DEFAULT NULL,
  `ordinal` int(4) DEFAULT NULL,
  `is_standalone` int(1) DEFAULT NULL,
  `requires_login` int(1) DEFAULT NULL,
  `actions` text DEFAULT NULL,
  `viewable_for_all` int(11) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `demoapp_lafrt_email_uq_idx` (`unique_name`),
  KEY `demoapp_lafrouting_table_parent_id_fk1` (`parent_id`),
  KEY `demoapp_lafrouting_table_visible_ix2` (`is_visible`),
  KEY `demoapp_lafrouting_table_is_default_fk1_idx1` (`is_default`),
  KEY `routingtable_viewable_fk4` (`viewable_for_all`),
  CONSTRAINT `demoapp_lafrouting_table_is_default_fk1_idx1` FOREIGN KEY (`is_visible`) REFERENCES `yes_or_no` (`id`),
  CONSTRAINT `demoapp_lafrouting_table_parent_id_fk1` FOREIGN KEY (`parent_id`) REFERENCES `routing_table` (`id`),
  CONSTRAINT `demoapp_lafrouting_table_visible_ix2` FOREIGN KEY (`is_visible`) REFERENCES `yes_or_no` (`id`),
  CONSTRAINT `demoapp_lafroutingtable_viewable_fk4` FOREIGN KEY (`viewable_for_all`) REFERENCES `yes_or_no` (`id`),
  CONSTRAINT `demoapp_lafroutingtable_is_default_fk4` FOREIGN KEY (`is_default`) REFERENCES `yes_or_no` (`id`),
  CONSTRAINT `demoapp_lafroutingtable_is_standalone_fk4` FOREIGN KEY (`is_standalone`) REFERENCES `yes_or_no` (`id`),
  CONSTRAINT `demoapp_lafroutingtable_requires_login_fk4` FOREIGN KEY (`requires_login`) REFERENCES `yes_or_no` (`id`),
  CONSTRAINT `demoapp_lafroutingtable_updated_by_fk4` FOREIGN KEY (`updated_by`) REFERENCES `person` (`id`),
  CONSTRAINT `demoapp_lafroutingtable_created_by_fk4` FOREIGN KEY (`created_by`) REFERENCES `person` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `sql_error`;
CREATE TABLE `sql_error` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `error_message` text DEFAULT NULL,
  `sql_query` text DEFAULT NULL,
  `exception_trace` text DEFAULT NULL,
  `page_file` varchar(255) DEFAULT NULL,
  `line_number` int(11) DEFAULT NULL,
  `person_id` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `syslog`;
CREATE TABLE `syslog` (
  `syslogid` int(14) NOT NULL AUTO_INCREMENT,
  `grupi` varchar(50) DEFAULT NULL,
  `nengrupi` varchar(50) DEFAULT NULL,
  `useri` int(14) NOT NULL,
  `data` int(14) NOT NULL,
  `veprimi` varchar(255) NOT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `browser` text DEFAULT NULL,
  PRIMARY KEY (`syslogid`),
  KEY `grupi` (`grupi`),
  KEY `nengrupi` (`nengrupi`),
  KEY `nengrupi_2` (`nengrupi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `ticket`;
CREATE TABLE `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` text DEFAULT NULL,
  `ticket_group_id` int(11) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `approved_on` datetime DEFAULT NULL,
  `resolution` text DEFAULT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `ticket_status_id` int(11) DEFAULT NULL,
  `ticket_category_id` int(11) DEFAULT NULL,
  `requested_by` int(11) DEFAULT NULL,
  `ticket_priority_id` int(11) DEFAULT NULL,
  `expected_completion_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ticket_created_by_fk1` (`created_by`),
  KEY `ticket_updated_by_fk2` (`updated_by`),
  KEY `ticket_approved_by_fk3` (`approved_by`),
  KEY `ticket_assigned_to_fk4` (`assigned_to`),
  KEY `ticket_ticket_status_fk5` (`ticket_status_id`),
  KEY `ticket_ticket_category_fk6` (`ticket_category_id`),
  KEY `ticket_requested_by_fk1_idx` (`approved_on`),
  KEY `ticket_requested_by_fk1` (`requested_by`),
  KEY `ticket_t_priority_id_fk` (`ticket_priority_id`),
  KEY `ticket_ticket_group_fk9` (`ticket_group_id`),
  CONSTRAINT `ticket_approved_by_fk3` FOREIGN KEY (`approved_by`) REFERENCES `person` (`id`),
  CONSTRAINT `ticket_assigned_to_fk4` FOREIGN KEY (`assigned_to`) REFERENCES `person` (`id`),
  CONSTRAINT `ticket_created_by_fk1` FOREIGN KEY (`created_by`) REFERENCES `person` (`id`),
  CONSTRAINT `ticket_requested_by_fk1` FOREIGN KEY (`requested_by`) REFERENCES `person` (`id`),
  CONSTRAINT `ticket_t_priority_id_fk` FOREIGN KEY (`ticket_priority_id`) REFERENCES `ticket_priority` (`id`),
  CONSTRAINT `ticket_ticket_category_fk6` FOREIGN KEY (`ticket_category_id`) REFERENCES `ticket_category` (`id`),
  CONSTRAINT `ticket_ticket_group_fk9` FOREIGN KEY (`ticket_group_id`) REFERENCES `ticket_group` (`id`),
  CONSTRAINT `ticket_ticket_status_fk5` FOREIGN KEY (`ticket_status_id`) REFERENCES `ticket_status` (`id`),
  CONSTRAINT `ticket_updated_by_fk2` FOREIGN KEY (`updated_by`) REFERENCES `person` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `ticket_category`;
CREATE TABLE `ticket_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `ticket_group`;
CREATE TABLE `ticket_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` text DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ticketgroup_created_by_fk1` (`created_by`),
  CONSTRAINT `ticketgroup_created_by_fk1` FOREIGN KEY (`created_by`) REFERENCES `person` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `ticket_priority`;
CREATE TABLE `ticket_priority` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `ticket_status`;
CREATE TABLE `ticket_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `time_zone`;
CREATE TABLE `time_zone` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

DROP TABLE IF EXISTS `yes_or_no`;
CREATE TABLE `yes_or_no` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `label` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;







SET FOREIGN_KEY_CHECKS=1;