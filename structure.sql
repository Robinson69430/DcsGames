-- Création de la base de données
CREATE DATABASE IF NOT EXISTS `campus_it` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `campus_it`;

-- Création des tables
CREATE TABLE IF NOT EXISTS `application` (
  `app_id` INT NOT NULL,
  `nom` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`app_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `ressource` (
  `res_id` INT NOT NULL,
  `nom` VARCHAR(255) NOT NULL,
  `unite` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`res_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `consommation` (
  `conso_id` INT NOT NULL,
  `app_id` INT NOT NULL,
  `res_id` INT NOT NULL,
  `mois` DATE NOT NULL,
  `volume` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`conso_id`),
  FOREIGN KEY (`app_id`) REFERENCES `application`(`app_id`) ON DELETE CASCADE,
  FOREIGN KEY (`res_id`) REFERENCES `ressource`(`res_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;