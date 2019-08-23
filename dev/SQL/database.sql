use c9;

DROP TABLE IF EXISTS `accounts`;

CREATE TABLE `accounts` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255),
    `gmail` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `img` VARCHAR(255),
    `img_type` VARCHAR(255),
    `registration_date` TIMESTAMP
) DEFAULT CHARACTER SET utf8mb4 ENGINE=InnoDB
