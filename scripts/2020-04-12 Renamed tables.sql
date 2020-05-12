RENAME TABLE `driver_traveler_conversations` TO `conversation_messages`;
RENAME TABLE `drivers_travels` TO `conversations`;
RENAME TABLE `travels_conversations_meta` TO `conversations_meta`;
RENAME TABLE `email_attachments` TO `conversation_message_attachments`;

DROP TABLE `drivers_travels_by_email`;
DROP TABLE `drivers_profiles_resources`;


ALTER TABLE `drivers` ADD `name` VARCHAR(250) NULL AFTER `password`;
UPDATE `drivers` SET `name`=(select driver_name from `drivers_profiles` where `drivers_profiles`.driver_id = `drivers`.id );
ALTER TABLE `drivers` CHANGE `name` `name` VARCHAR(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;



ALTER TABLE `conversations_meta` DROP `received_confirmation_type`;
ALTER TABLE `conversations_meta` DROP `testimonial_id`;


ALTER TABLE `conversation_message_attachments` ADD `filesize` INT NULL AFTER `relfilepath`;

ALTER TABLE `drivers_profiles` CHANGE `avatar_filepath` `avatar_filedir` VARCHAR(250) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL;
ALTER TABLE `drivers_profiles` ADD `avatar_filename` VARCHAR(250) NULL AFTER `driver_name`;

ALTER TABLE `conversations` CHANGE `travel_date` `due_date` DATE NULL DEFAULT NULL;
ALTER TABLE `conversations` CHANGE `original_date` `original_due_date` DATE NULL DEFAULT NULL;
