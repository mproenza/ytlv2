RENAME TABLE `driver_traveler_conversations` TO `conversation_messages`;
RENAME TABLE `drivers_travels` TO `conversations`;
RENAME TABLE `travels_conversations_meta` TO `conversations_meta`;

DROP TABLE `drivers_travels_by_email`;
DROP TABLE `drivers_profiles_resources`;


ALTER TABLE `drivers` ADD `name` VARCHAR(250) NULL AFTER `password`;
UPDATE `drivers` SET `name`=CAST(id AS CHAR(250));
ALTER TABLE `drivers` CHANGE `name` `name` VARCHAR(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;



ALTER TABLE `conversations_meta` DROP `received_confirmation_type`;
ALTER TABLE `conversations_meta` DROP `testimonial_id`;
