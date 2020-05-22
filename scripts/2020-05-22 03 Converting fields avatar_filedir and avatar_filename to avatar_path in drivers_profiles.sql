ALTER TABLE `drivers_profiles` CHANGE `avatar_filename` `avatar_path` VARCHAR(250) CHARACTER SET latin1 COLLATE latin1_bin NULL DEFAULT NULL;
ALTER TABLE `drivers_profiles` DROP `avatar_filedir`;