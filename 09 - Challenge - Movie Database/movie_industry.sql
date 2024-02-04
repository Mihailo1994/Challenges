CREATE DATABASE  IF NOT EXISTS `movie_industry` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `movie_industry`;
-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: movie_industry
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `actor_critics`
--

DROP TABLE IF EXISTS `actor_critics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `actor_critics` (
  `id` int NOT NULL AUTO_INCREMENT,
  `actor_films_id` int DEFAULT NULL,
  `critic_id` int DEFAULT NULL,
  `acting_grade` int DEFAULT NULL,
  `naturalness_grade` int DEFAULT NULL,
  `expresion_grade` int DEFAULT NULL,
  `devotion_grade` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `actor_films_id` (`actor_films_id`),
  KEY `critic_id` (`critic_id`),
  CONSTRAINT `actor_critics_ibfk_1` FOREIGN KEY (`actor_films_id`) REFERENCES `actor_films` (`id`),
  CONSTRAINT `actor_critics_ibfk_2` FOREIGN KEY (`critic_id`) REFERENCES `critics` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actor_critics`
--

LOCK TABLES `actor_critics` WRITE;
/*!40000 ALTER TABLE `actor_critics` DISABLE KEYS */;
INSERT INTO `actor_critics` VALUES (1,2,3,6,7,9,7),(2,4,2,9,8,7,9),(3,6,1,5,7,10,9),(4,10,2,5,6,5,9),(5,2,4,10,9,7,9),(6,8,4,9,5,8,6),(7,12,3,7,8,7,6),(8,15,3,8,7,8,5),(9,13,5,7,10,8,10),(10,3,1,8,6,8,9);
/*!40000 ALTER TABLE `actor_critics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `actor_films`
--

DROP TABLE IF EXISTS `actor_films`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `actor_films` (
  `id` int NOT NULL AUTO_INCREMENT,
  `actor_id` int DEFAULT NULL,
  `film_id` int DEFAULT NULL,
  `salary` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `actor_id` (`actor_id`),
  KEY `film_id` (`film_id`),
  CONSTRAINT `actor_films_ibfk_1` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`),
  CONSTRAINT `actor_films_ibfk_2` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actor_films`
--

LOCK TABLES `actor_films` WRITE;
/*!40000 ALTER TABLE `actor_films` DISABLE KEYS */;
INSERT INTO `actor_films` VALUES (1,5,3,276000),(2,4,5,364000),(3,8,8,243000),(4,6,10,392000),(5,7,2,187000),(6,10,1,199000),(7,4,3,429000),(8,4,4,421000),(9,1,10,391000),(10,8,2,447000),(11,4,3,310000),(12,3,7,423000),(13,6,6,202000),(14,3,7,155000),(15,10,8,362000),(16,5,9,366000),(17,4,9,463000);
/*!40000 ALTER TABLE `actor_films` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `actor_tv_series`
--

DROP TABLE IF EXISTS `actor_tv_series`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `actor_tv_series` (
  `id` int NOT NULL AUTO_INCREMENT,
  `actor_id` int DEFAULT NULL,
  `tv_series_id` int DEFAULT NULL,
  `salary` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `actor_id` (`actor_id`),
  KEY `tv_series_id` (`tv_series_id`),
  CONSTRAINT `actor_tv_series_ibfk_1` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`),
  CONSTRAINT `actor_tv_series_ibfk_2` FOREIGN KEY (`tv_series_id`) REFERENCES `tv_series` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actor_tv_series`
--

LOCK TABLES `actor_tv_series` WRITE;
/*!40000 ALTER TABLE `actor_tv_series` DISABLE KEYS */;
INSERT INTO `actor_tv_series` VALUES (1,9,3,159000),(2,5,4,419000),(3,5,6,356000),(4,7,2,378000),(5,7,1,181000),(6,9,10,170000),(7,4,7,380000),(8,2,5,410000),(9,6,4,335000),(10,10,5,325000),(11,9,8,447000),(12,2,2,428000),(13,10,5,301000),(14,2,9,247000),(15,5,2,172000);
/*!40000 ALTER TABLE `actor_tv_series` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `actors`
--

DROP TABLE IF EXISTS `actors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `actors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `nickname` varchar(32) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `agent_code` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actors`
--

LOCK TABLES `actors` WRITE;
/*!40000 ALTER TABLE `actors` DISABLE KEYS */;
INSERT INTO `actors` VALUES (1,'Morgan','Freeman','Morgan','1937-06-01',1),(2,'Robin','Williams','Robin','1951-07-21',2),(3,'Denzel','Washington','Denzel','1954-12-28',3),(4,'Keanu','Reeves','Keanu','1964-09-02',4),(5,'Tom','Hanks','Tom','1956-07-09',3),(6,'Harrison','Ford','Harry','1942-07-13',2),(7,'Julia','Roberts','Julia','1967-10-28',5),(8,'Anthony','Hopkins','Toni','1937-12-31',1),(9,'Jack','Nicholson','Jack','1937-04-22',2),(10,'Dwayne','Johnson','The Rock','1972-05-02',3);
/*!40000 ALTER TABLE `actors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `critics`
--

DROP TABLE IF EXISTS `critics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `critics` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `username` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `critics`
--

LOCK TABLES `critics` WRITE;
/*!40000 ALTER TABLE `critics` DISABLE KEYS */;
INSERT INTO `critics` VALUES (1,'Maya','Patel','Xn8#pK6s@!m','mayapatel94'),(2,'Liam','Johnson','qW3$eR9tY2u','liamjohnson21'),(3,'Emily','Lee','Ht2#sR6g@iJ','emilylee87'),(4,'Lucas','Brown','Lp5!oK8b$eF','lucasbrown72'),(5,'Ava','Nguyen','Zm4@xN7c#fT','avanguyen63');
/*!40000 ALTER TABLE `critics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `directors`
--

DROP TABLE IF EXISTS `directors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `directors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `genre` varchar(16) DEFAULT NULL,
  `expertise` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `directors`
--

LOCK TABLES `directors` WRITE;
/*!40000 ALTER TABLE `directors` DISABLE KEYS */;
INSERT INTO `directors` VALUES (1,'Tim','Burton','Drama','Originality'),(2,'Christopher','Nolan','Crime','Taking Initiative'),(3,'Steven','Spielberg','Drama','Leadership'),(4,'Quentin','Tarantino','Action','Criminal Movies'),(5,'David','Fincher','Sci-fi','Ambition');
/*!40000 ALTER TABLE `directors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `film_critique`
--

DROP TABLE IF EXISTS `film_critique`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `film_critique` (
  `id` int NOT NULL AUTO_INCREMENT,
  `film_id` int DEFAULT NULL,
  `critic_id` int DEFAULT NULL,
  `rating` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `film_id` (`film_id`),
  KEY `critic_id` (`critic_id`),
  CONSTRAINT `film_critique_ibfk_1` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`),
  CONSTRAINT `film_critique_ibfk_2` FOREIGN KEY (`critic_id`) REFERENCES `critics` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `film_critique`
--

LOCK TABLES `film_critique` WRITE;
/*!40000 ALTER TABLE `film_critique` DISABLE KEYS */;
INSERT INTO `film_critique` VALUES (1,2,1,7),(2,7,1,8),(3,4,2,7),(4,5,3,7),(5,10,1,8),(6,1,5,9),(7,9,4,7),(8,6,2,8),(9,8,5,9),(10,3,1,9);
/*!40000 ALTER TABLE `film_critique` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `film_sequels`
--

DROP TABLE IF EXISTS `film_sequels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `film_sequels` (
  `id` int NOT NULL AUTO_INCREMENT,
  `film_id` int DEFAULT NULL,
  `sequel_film_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `film_id` (`film_id`),
  KEY `sequel_film_id` (`sequel_film_id`),
  CONSTRAINT `film_sequels_ibfk_1` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`),
  CONSTRAINT `film_sequels_ibfk_2` FOREIGN KEY (`sequel_film_id`) REFERENCES `films` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `film_sequels`
--

LOCK TABLES `film_sequels` WRITE;
/*!40000 ALTER TABLE `film_sequels` DISABLE KEYS */;
INSERT INTO `film_sequels` VALUES (1,2,4),(2,7,5),(3,7,3),(4,5,3),(5,8,9);
/*!40000 ALTER TABLE `film_sequels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `films`
--

DROP TABLE IF EXISTS `films`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `films` (
  `id` int NOT NULL AUTO_INCREMENT,
  `movie_id` int DEFAULT NULL,
  `director_id` int DEFAULT NULL,
  `director_income` int DEFAULT NULL,
  `city_premiere` varchar(32) DEFAULT NULL,
  `first_week_income` int DEFAULT NULL,
  `premiere_format` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `movie_id` (`movie_id`),
  KEY `director_id` (`director_id`),
  CONSTRAINT `films_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`),
  CONSTRAINT `films_ibfk_2` FOREIGN KEY (`director_id`) REFERENCES `directors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `films`
--

LOCK TABLES `films` WRITE;
/*!40000 ALTER TABLE `films` DISABLE KEYS */;
INSERT INTO `films` VALUES (1,1,1,20000,'Los Angeles',540000,'2D'),(2,2,2,25000,'Berlin',870000,'2D'),(3,3,2,45000,'Skopje',458000,'2D'),(4,4,3,50000,'Las Vegas',604000,'3D'),(5,5,4,15000,'New York',580000,'3D'),(6,6,5,32500,'Boston',445000,'2D'),(7,7,5,45200,'Belgrade',354000,'2D'),(8,8,4,47200,'New York',748000,'3D'),(9,9,1,25000,'Rome',555000,'3D'),(10,10,2,31500,'Milan',490000,'2D');
/*!40000 ALTER TABLE `films` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `movies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `movie_name` varchar(100) DEFAULT NULL,
  `premiere` int DEFAULT NULL,
  `genre` varchar(16) DEFAULT NULL,
  `country_of_origin` varchar(64) DEFAULT NULL,
  `production_name` varchar(64) DEFAULT NULL,
  `movie_type` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movies`
--

LOCK TABLES `movies` WRITE;
/*!40000 ALTER TABLE `movies` DISABLE KEYS */;
INSERT INTO `movies` VALUES (1,'The Shawshank Redemption',1994,'Drama','USA','Castle Rock Entertainment','film'),(2,'The Godfather',1972,'Crime','Italy','Universal Pictures','film'),(3,'The Dark Knight',2008,'Crime','USA','Warner Bros','film'),(4,'The Godfather Part II',1974,'Drama','Italy','Universal Pictures','film'),(5,'The Lord of the Rings: The Two Towers',2002,'Adventure','USA','Marvel Studios','film'),(6,'Pulp Fiction',1994,'Crime','USA','Paramount Pictures','film'),(7,'The Lord of the Rings: The Fellowship of the Ring',2001,'Adventure','USA','Columbia Pictures','film'),(8,'Forrest Gump',1994,'Romance','Germany','Warner Bros','film'),(9,'Fight Club',1994,'Drama','USA','Marvel Studios','film'),(10,'Top Gun: Maverick',2022,'War','USA','Universal Pictures','film'),(11,'Breaking Bad',2008,'Thriller','USA','Marvel Studios','tv-series'),(12,'Chernobyl',2019,'History','Ukraine','Paramount Pictures','tv-series'),(13,'The Wire',2002,'Crime','USA','Columbia Pictures','tv-series'),(14,'The Soppranos',1999,'Crime','USA','Warner Bros','tv-series'),(15,'Game of Thrones',2011,'Adventure','USA','Marvel Studios','tv-series'),(16,'The Last of Us',2023,'Sci-Fi','USA','Universal Pictures','tv-series'),(17,'Sherlock',2010,'Mystery','USA','Universal Pictures','tv-series'),(18,'The Office',2005,'Comedy','USA','Warner Bros','tv-series'),(19,'Dark',2017,'Sci-Fi','Germany','Universal Pictures','tv-series'),(20,'The Mandalorian',2019,'Sci-Fi','USA','Warner Bros','tv-series');
/*!40000 ALTER TABLE `movies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oscar_winners`
--

DROP TABLE IF EXISTS `oscar_winners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oscar_winners` (
  `id` int NOT NULL AUTO_INCREMENT,
  `actor_films_id` int DEFAULT NULL,
  `year_of_award` int DEFAULT NULL,
  `actor_role` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `actor_films_id` (`actor_films_id`),
  CONSTRAINT `oscar_winners_ibfk_1` FOREIGN KEY (`actor_films_id`) REFERENCES `actor_films` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oscar_winners`
--

LOCK TABLES `oscar_winners` WRITE;
/*!40000 ALTER TABLE `oscar_winners` DISABLE KEYS */;
INSERT INTO `oscar_winners` VALUES (1,2,2018,'Best Actor'),(2,3,2019,'Best Supporting Role'),(3,12,2020,'Best Actor'),(4,8,2021,'Best Lead Role'),(5,9,2022,'Best Actor');
/*!40000 ALTER TABLE `oscar_winners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tv_series`
--

DROP TABLE IF EXISTS `tv_series`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tv_series` (
  `id` int NOT NULL AUTO_INCREMENT,
  `movie_id` int DEFAULT NULL,
  `aired_channel` varchar(32) DEFAULT NULL,
  `number_of_episodes` int DEFAULT NULL,
  `number_of_expected_seasons` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `movie_id` (`movie_id`),
  CONSTRAINT `tv_series_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tv_series`
--

LOCK TABLES `tv_series` WRITE;
/*!40000 ALTER TABLE `tv_series` DISABLE KEYS */;
INSERT INTO `tv_series` VALUES (1,11,'HBO',24,4),(2,12,'SHOWTIME',12,6),(3,13,'STARZ',10,4),(4,14,'CINEMAX',8,4),(5,15,'STARZ',18,12),(6,16,'TMC',6,10),(7,17,'CINEMAX',12,8),(8,18,'TMC',6,5),(9,19,'SHOWTIME',10,5),(10,20,'MGM',8,8);
/*!40000 ALTER TABLE `tv_series` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-03 21:39:23
