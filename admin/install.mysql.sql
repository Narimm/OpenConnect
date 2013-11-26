CREATE TABLE IF NOT EXISTS `#__openconnect_patients` (
`patient_id` int(11) NOT NULL AUTO_INCREMENT,
`openvpms_patient_id` BIGINT(19) NOT NULL,
`user_id` int(11) DEFAULT NULL,
`name` varchar(100) DEFAULT NULL,
`description` text DEFAULT NULL,
`dob` datetime DEFAULT NULL,
`image` varchar(255) DEFAULT NULL,
`created_date` datetime NOT NULL,
`modified_date` datetime NOT NULL,
`published` tinyint(2) DEFAULT 0,
`customer_id` BIGINT(19) NOT NULL,
PRIMARY KEY (`patient_id`)
);

CREATE TABLE IF NOT EXISTS `#__openconnect_customers`(
`customer_id` int(11) NOT NULL AUTO INCREMENT,
`user_id` int(11) DEFAULT NULL,
`openvpms_patient_id` BIGINT(19) NOT NULL,
`LastName` varchar(100) DEFAULT NULL,
`FirstName` varchar(100) DEFAULT NULL,
`Prefix` varchar(20) DEFAULT NULL,
PRIMARY KEY (`customer_id`)
);

CREATE TABLE IF NOT EXISTS `#__openconnect_preminder`(
`reminder_id` int(11) NOT NULL AUTO INCREMENT,
`patient_id` int(11) DEFAULT NULL,
`createdDate` datetime not null,
`dueDate` datetime DEFAULT NULL,
`reminder_name` varchar(50) DEFAULT NULL,
PRIMARY KEY (`reminder_id`)
);

CREATE TABLE IF NOT EXISTS `#__openconnect_cids`(
`cid_id` INT(11) NOT NULL AUTO INCREMENT,
`OPENVPMS_identity_id` BIGINT(19) NOT NULL,
`address1` VARCHAR(100) DEFAULT NULL,
`address2` VARCHAR(100) DEFAULT NULL,
`State` VARCHAR(100) DEFAULT NULL,
`PostCode` INT(4) DEFAULT NULL,
PRIMARY KEY('cid_id')
}

