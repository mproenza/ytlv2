CREATE TABLE `drivers_unapproved` ( 
`id` SERIAL NOT NULL , 
`username` TEXT NOT NULL , 
`full_name` TEXT NOT NULL , 
`province_id` BIGINT UNSIGNED NOT NULL , 
`car_model` TEXT NOT NULL , 
`max_people_count` INT NOT NULL , 
`has_classic_car` BOOLEAN NOT NULL , 
`has_air_conditioner` BOOLEAN NOT NULL , 
`speaks_english` BOOLEAN NOT NULL , 
`has_modern_car` BOOLEAN NOT NULL , 
`about` TEXT NOT NULL , 
`featured_img_url` TEXT NOT NULL , 
`avatar_path` TEXT NOT NULL , 
`profile_img_url` TEXT NOT NULL ) 
ENGINE = InnoDB;

ALTER TABLE `drivers_unapproved` ADD `min_people_count` INT NOT NULL AFTER `car_model`;

ALTER TABLE `drivers_unapproved` ADD INDEX(`province_id`);
ALTER TABLE `drivers_unapproved` ADD CONSTRAINT `unapproved_fk1` FOREIGN KEY (`province_id`) REFERENCES `provinces`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;