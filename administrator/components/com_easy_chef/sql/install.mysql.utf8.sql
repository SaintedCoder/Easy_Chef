CREATE TABLE IF NOT EXISTS `#__easychefrecipewebsite_recipes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `catid` INT(11) NOT NULL,
  `cuisine_id` INT(11) NOT NULL,
  `created_by` INT(11) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `alias` VARCHAR(255) NOT NULL,
  `instructions` TEXT NOT NULL,
  `nutrition` TEXT,
  `prep_time` INT(11) DEFAULT 0,
  `cook_time` INT(11) DEFAULT 0,
  `rest_time` INT(11) DEFAULT 0,
  `serving_qty` INT(11) DEFAULT 1,
  `serving_type_id` INT(11) NOT NULL,
  `created` DATETIME NOT NULL,
  `modified` DATETIME DEFAULT NULL,
  `picture` VARCHAR(255),
  `published` TINYINT(1) DEFAULT 0,
  `tags` VARCHAR(255),
  PRIMARY KEY (`id`),
  KEY `idx_catid` (`catid`),
  KEY `idx_created_by` (`created_by`),
  KEY `idx_cuisine_id` (`cuisine_id`),
  KEY `idx_serving_type_id` (`serving_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `#__easychefrecipewebsite_categories` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `asset_id` INT(11) NOT NULL,
  `parent_id` INT(11) DEFAULT 0,
  `title` VARCHAR(255) NOT NULL,
  `alias` VARCHAR(255) NOT NULL,
  `description` TEXT,
  `published` TINYINT(1) DEFAULT 1,
  `created_by` INT(11) NOT NULL,
  `created` DATETIME NOT NULL,
  `modified` DATETIME DEFAULT NULL,
  `params` TEXT,
  PRIMARY KEY (`id`),
  KEY `idx_parent_id` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `#__easychefrecipewebsite_ingredients` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `recipe_id` INT(11) NOT NULL,
  `ingredients_group_id` INT(11) NOT NULL,
  `ordering` INT(11) DEFAULT 0,
  `qty` FLOAT,
  `unit` VARCHAR(100),
  `name` VARCHAR(255) NOT NULL,
  `comment` TEXT,
  PRIMARY KEY (`id`),
  KEY `idx_recipe_id` (`recipe_id`),
  KEY `idx_ingredients_group_id` (`ingredients_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `#__easychefrecipewebsite_ingredientsgroups` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `recipe_id` INT(11) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `ordering` INT(11) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `idx_recipe_id` (`recipe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `#__easychefrecipewebsite_cuisines` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `ordering` INT(11) DEFAULT 0,
  `published` TINYINT(1) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;