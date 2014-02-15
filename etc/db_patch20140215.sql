CREATE TABLE `portfolio_image_folders` (
    `id` bigint(20) NOT NULL AUTO_INCREMENT,
    `name` varchar(100) DEFAULT NULL,
    `portfolio_id` bigint(20) DEFAULT NULL,
    PRIMARY KEY (`id`)
);

ALTER TABLE portfolio_images
  ADD COLUMN folder_id bigint AFTER portfolio_id;