ALTER TABLE `drivers` ADD `personal_code` VARCHAR(10) NULL AFTER `name`;

ALTER TABLE `drivers` CHANGE `personal_code` `personal_code` VARCHAR(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'NOCODE';

UPDATE `drivers` SET `personal_code`=(SELECT driver_code FROM drivers_profiles WHERE drivers_profiles.driver_id = drivers.id);

ALTER TABLE `drivers_profiles` DROP `driver_code`;