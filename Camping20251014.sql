CREATE DATABASE  IF NOT EXISTS `camping` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `camping`;
-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: localhost    Database: camping
-- ------------------------------------------------------
-- Server version	8.4.5

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categorieNom` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES (1,'Chalet'),(2,'Yourte'),(3,'Emplacement de camping'),(4,'Prêt-à-camper');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dateReservation` date NOT NULL DEFAULT (curdate()),
  `dateArrivee` date NOT NULL,
  `dateDepart` date NOT NULL,
  `nbrDePersonnes` int NOT NULL,
  `utilisateurId` int NOT NULL,
  `siteId` int NOT NULL,
  `statutId` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_utilisateurId` (`utilisateurId`),
  KEY `fk_siteId` (`siteId`),
  KEY `fk_statutId` (`statutId`),
  CONSTRAINT `fk_siteId` FOREIGN KEY (`siteId`) REFERENCES `site` (`id`),
  CONSTRAINT `fk_statutId` FOREIGN KEY (`statutId`) REFERENCES `statut` (`id`),
  CONSTRAINT `fk_utilisateurId` FOREIGN KEY (`utilisateurId`) REFERENCES `utilisateur` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
INSERT INTO `reservation` VALUES (1,'2025-10-14','2025-06-10','2025-06-15',4,1,1,1),(2,'2025-10-14','2025-07-01','2025-07-05',2,1,5,2),(3,'2025-10-14','2025-08-12','2025-08-18',6,1,9,1),(5,'2025-10-14','2025-07-10','2025-07-15',10,2,6,1),(6,'2025-10-14','2025-08-05','2025-08-10',4,2,10,2),(7,'2025-10-14','2025-06-15','2025-06-20',5,3,3,1),(8,'2025-10-14','2025-07-20','2025-07-25',2,3,7,1),(9,'2025-10-14','2025-08-15','2025-08-20',3,3,11,3),(10,'2025-10-14','2025-06-12','2025-06-16',2,4,4,2),(11,'2025-10-14','2025-07-05','2025-07-09',3,4,8,1),(12,'2025-10-14','2025-08-18','2025-08-23',6,4,12,1),(13,'2025-10-14','2025-06-18','2025-06-22',4,5,13,1),(14,'2025-10-14','2025-07-08','2025-07-12',2,5,14,2),(15,'2025-10-14','2025-08-10','2025-08-15',3,5,15,3),(16,'2025-10-14','2025-10-16','2025-10-24',12,2,7,1),(17,'2025-10-14','2025-11-08','2025-11-15',9,2,1,1),(18,'2025-10-14','2025-10-15','2025-10-15',123,6,14,1);
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site`
--

DROP TABLE IF EXISTS `site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `site` (
  `id` int NOT NULL AUTO_INCREMENT,
  `siteNom` text,
  `siteDescription` text,
  `capacite` int DEFAULT NULL,
  `prix` double NOT NULL,
  `urlImage` text,
  `categorieId` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categorieId` (`categorieId`),
  CONSTRAINT `fk_categorieId` FOREIGN KEY (`categorieId`) REFERENCES `categorie` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site`
--

LOCK TABLES `site` WRITE;
/*!40000 ALTER TABLE `site` DISABLE KEYS */;
INSERT INTO `site` VALUES (1,'Chalet du Lac','Chalet rustique au bord du lac, idéal pour les familles.',6,180,'img/chalets/chalet1.jpeg',1),(2,'Chalet Montagne','Chalet chaleureux avec vue sur la montagne.',5,160,'img/chalets/chalet2.jpeg',1),(3,'Chalet Érable','Chalet moderne entouré d’érables, parfait pour un séjour tranquille.',4,150,'img/chalets/chalet3.jpeg',1),(4,'Chalet Nordik','Chalet scandinave avec spa privé.',8,220,'img/chalets/chalet4.jpeg',1),(5,'Yourte Sauvage','Yourte traditionnelle dans un cadre naturel.',4,120,'img/yourtes/yourte1.jpg',2),(6,'Yourte du Soleil','Yourte lumineuse et confortable pour deux personnes.',2,100,'img/yourtes/yourte2.jpg',2),(7,'Yourte des Pins','Yourte spacieuse entourée de pins.',5,130,'img/yourtes/yourte3.jpg',2),(8,'Yourte Familiale','Yourte avec coin cuisine et chauffage au bois.',6,140,'img/yourtes/yourte4.jpg',2),(9,'Emplacement Rivière','Terrain plat près de la rivière.',6,45,'img/camping/camp1.jpg',3),(10,'Emplacement Forêt','Emplacement ombragé dans la forêt.',4,40,'img/camping/camp2.jpg',3),(11,'Emplacement Vue Montagne','Emplacement dégagé avec vue sur la montagne.',6,50,'img/camping/camp3.jpg',3),(12,'Emplacement Prairie','Emplacement vaste et ensoleillé.',8,55,'img/camping/camp4.jpg',3),(13,'Tente Safari','Grande tente prête à camper avec lits et terrasse.',4,90,'img/pret-a-camper/pac1.jpg',4),(14,'Cabane du Bois','Petite cabane confortable, idéale pour deux.',2,85,'img/pret-a-camper/pac2.jpg',4),(15,'Mini-Chalet Zen','Petit chalet minimaliste tout équipé.',3,95,'img/pret-a-camper/pac3.jpeg',4),(16,'Pod Nature','Pod écologique au cœur de la nature.',2,100,'img/pret-a-camper/pac4.jpeg',4);
/*!40000 ALTER TABLE `site` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statut`
--

DROP TABLE IF EXISTS `statut`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `statut` (
  `id` int NOT NULL AUTO_INCREMENT,
  `statutDescription` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statut`
--

LOCK TABLES `statut` WRITE;
/*!40000 ALTER TABLE `statut` DISABLE KEYS */;
INSERT INTO `statut` VALUES (1,'Confirmée'),(2,'En attente'),(3,'En cours'),(4,'Annulée'),(5,'Terminée');
/*!40000 ALTER TABLE `statut` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `adresse` varchar(45) NOT NULL,
  `codePostal` varchar(10) NOT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `courriel` varchar(45) NOT NULL,
  `motDePasse` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` VALUES (1,'Charpentier','Julien','12 rue du Lac Bleu Montreal','G1A 2B3','5141234567','julien@gmail.com','123'),(2,'Techer','Yanis','45 avenue des Pins Laval','H3A 1K3','4382345679','yanis@gmail.com','123'),(3,'Antoine','Marc','78 chemin du Bois Laval','J2K 3L4','4183456789','marc@gmail.com','123'),(4,'Gagnon','Dominique','23 boulevard des Laurentides Montreal','H4N 2P5','5144567890','dominique@gmail.com','123'),(5,'Dubois','Amélie','9 rue de la Montagne Montreal','J1C 5M6','4505678901','amelie@gmail.com','123'),(6,'Petit','Martin','1265 rue Sherbrook ouest Montreal','H1K 8L6','5141234567','imane@gmail.com','123');
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-10-14 19:03:07
