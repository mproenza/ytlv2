CREATE TABLE `drivers_unapproved` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` text NOT NULL,
  `full_name` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `car_model` text NOT NULL,
  `max_people_count` int(11) NOT NULL,
  `has_air_conditioner` tinyint(1) NOT NULL,
  `speaks_english` tinyint(1) NOT NULL,
  `about` text NOT NULL,
  `image1_path` text NOT NULL,
  `image2_path` text NOT NULL,
  `image3_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `drivers_unapproved`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `province_id` (`province_id`);
  
ALTER TABLE `drivers_unapproved`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  
ALTER TABLE `drivers_unapproved`
  ADD CONSTRAINT `unapproved_fk1` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;