ALTER TABLE `users` DROP `travel_by_email_count`;

ALTER TABLE `users` ADD `date_last_created_request` DATETIME NULL AFTER `travel_count`;
UPDATE `users` SET `date_last_created_request` = (SELECT travels.created FROM travels WHERE user_id = users.id order by travels.created DESC LIMIT 1);

ALTER TABLE `travels` CHANGE `origin` `origin_text` VARCHAR(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;
ALTER TABLE `travels` CHANGE `destination` `destination_text` VARCHAR(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;

ALTER TABLE `conversations` CHANGE `due_date` `due_date` DATE NOT NULL;