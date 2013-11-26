CREATE TABLE IF NOT EXISTS `#__openconnect_patients` (
`patient_id` int(11) NOT NULL AUTO_INCREMENT,
`openvpms_patient_id` BIGINT(19) NOT NULL
`user_id` int(11) DEFAULT NULL,
`name` varchar(100) DEFAULT NULL,
`description` text DEFAULT NULL,
`dob` datetime DEFAULT NULL,
`image` varchar(255) DEFAULT NULL,
`created` datetime NOT NULL,
`modified` datetime NOT NULL,
`published` tinyint(2) DEFAULT 0,
PRIMARY KEY (`book_id`)
);
