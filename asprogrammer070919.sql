-- MySQL dump 10.13  Distrib 5.7.26, for Linux (x86_64)
--
-- Host: localhost    Database: test
-- ------------------------------------------------------
-- Server version	5.7.26-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `about_translations`
--

DROP TABLE IF EXISTS `about_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `about_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `about_id` bigint(20) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `about_translations_about_id_locale_unique` (`about_id`,`locale`),
  KEY `about_translations_locale_index` (`locale`),
  CONSTRAINT `about_translations_about_id_foreign` FOREIGN KEY (`about_id`) REFERENCES `abouts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `about_translations`
--

LOCK TABLES `about_translations` WRITE;
/*!40000 ALTER TABLE `about_translations` DISABLE KEYS */;
INSERT INTO `about_translations` VALUES (1,1,'en','About Me','You have to write somrthing awesome here','Test description',NULL,NULL),(2,1,'ru','Обо мне','Вы должны здесь написать что-то потрясающее','Тестовое описание',NULL,NULL),(4,3,'en','It\'s me','<h3>Test production case</h3><p><img src=\"http://test.ru/dim/images/summernote/summernote-809085.jpg\"><br></p>','Test',NULL,NULL);
/*!40000 ALTER TABLE `about_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `abouts`
--

DROP TABLE IF EXISTS `abouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `abouts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_extension` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abouts`
--

LOCK TABLES `abouts` WRITE;
/*!40000 ALTER TABLE `abouts` DISABLE KEYS */;
INSERT INTO `abouts` VALUES (1,'qvsO539O7G','about_1','jpg',NULL,'2019-08-29 20:16:26'),(3,'7N8F4etjHb','about_3','jpg','2019-08-30 08:32:46','2019-08-30 21:39:44');
/*!40000 ALTER TABLE `abouts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `header_translations`
--

DROP TABLE IF EXISTS `header_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `header_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `header_id` bigint(20) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `header_translations_header_id_locale_unique` (`header_id`,`locale`),
  KEY `header_translations_locale_index` (`locale`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `header_translations`
--

LOCK TABLES `header_translations` WRITE;
/*!40000 ALTER TABLE `header_translations` DISABLE KEYS */;
INSERT INTO `header_translations` VALUES (1,1,'en','Modern Apps','Web applications created from scratch. No CMS WordPress and other programming simulations','Test description',NULL,NULL),(2,1,'ru','Современный WEB','Приложения, написанные с нуля. Никаких CMS WORDPRESS и прочей профанации web разработки!','Тестовое описание',NULL,NULL);
/*!40000 ALTER TABLE `header_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `headers`
--

DROP TABLE IF EXISTS `headers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `headers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `headers`
--

LOCK TABLES `headers` WRITE;
/*!40000 ALTER TABLE `headers` DISABLE KEYS */;
INSERT INTO `headers` VALUES (1,'WOM2U5ZMVf','fa-gem',NULL,'2019-09-01 19:41:56');
/*!40000 ALTER TABLE `headers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `intro_translations`
--

DROP TABLE IF EXISTS `intro_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `intro_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `intro_id` bigint(20) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `intro_translations_intro_id_locale_unique` (`intro_id`,`locale`),
  KEY `intro_translations_locale_index` (`locale`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `intro_translations`
--

LOCK TABLES `intro_translations` WRITE;
/*!40000 ALTER TABLE `intro_translations` DISABLE KEYS */;
INSERT INTO `intro_translations` VALUES (1,1,'en','Intro','<h3>What can I offer?</h3><p>There are two groups of employers.&nbsp;The first group is just customers. They looking for a developer to create a web application. Other group is IT companies. They looking for an employee, for example, a PHP programmer.&nbsp;Next, I will talk more about that I can offer each of the groups. This difference is explained by the fact, that customers have no idea about web development.&nbsp;Therefore, in this section I will try to describe this area in a more understandable language. If you are a specialist from company developer, I suggest immediately referring to the&nbsp;<a href=\"http://test.ru/ru#work\">WORK</a>&nbsp;section. I will describe in more detail my skills and technologies used there.</p><h3>For potential customers</h3><p>I am creating web applications. A site is a web application too.&nbsp;Any web application consists of two parts: front-end and back-end.&nbsp;The front-end is the code that is executed in your browser and its task is to visually present information and ensure interaction between the user and the application.&nbsp;A back-end is code that is executed on a remote server and its task is to extract the requested information from the database, process and transfer it to your browser. The front-end and the back-end are both on the remote server. A part of front-end is transferred to your browser along with requested data.&nbsp;The request, most often, is a simple click on the link or button.</p><p>The back-end and front-end are completely different technologies. I am mostly the back-end developer. But, sometimes, if the front-end is not sophisticated,&nbsp;I can be a full stack developer. My skills let me to fix front-end issues, to write a small Javascript snippets, to change CSS and HTML code.&nbsp;If the front-end is large and complex, it makes sense to invite the front-end of the developer to help.</p><p>If an application is very large, it is divided into smaller parts and development is carried out in parallel by several programmers, maybe even using various technologies inside the back-end or front-end. Then the question arises of defining the general architecture of the application, consisting of these smaller parts and the organization of interaction between programmers. I am ready to take part in the development team. In certain circumstances, I can take up architectural decisions and create a team, but this requires a detailed discussion.</p><h3>What is a framework and what does it differ from CMS</h3><p><b>Firstly about CMS&nbsp;</b>&nbsp;CMS is Content Management System. Well known systems are WordPress, Drupal, Shop-Script.&nbsp;CMS is a ready-made application. You already have an admin panel and a database. You can immediately fill the application with content and manage it. But there is no such CMS that meets all the requirements of the user. It is clear that the typical version does not suit anyone, so each CMS has the ability to expand its functionality by connecting modules or plugins. In any case, the programming here is reduced to almost zero and the main goal is to speed up and reduce the cost of creating an application.</p><p>Attempts to anticipate any customer wishes lead to incredible code redundancy, confusing architecture and low database performance. A large amount of code was written not for the customer, but for the developer, so that he controlled the settings of the CMS and plug-ins through the admin panel, and did not write the code. The benefits of relational databases are almost nil. If the application grows and begins to require a change in architecture, then this monolith is not subject to any separation.</p><p><b>Framework</b>&nbsp; The framework is just the skeleton of the future application. It has well-structured file system and a set of libraries that solve repetitive low-level tasks. For example, a connection to a database. This is a completely abstract task that has nothing to do with what tasks your application solves. All libraries are written in such a way that you can build your further code based on them, adding functions specific to your application. This is called OOP (Object Oriented Programming). You have optimal architecture and database, You have just a problem: you need to find a good developer. The unskilled developer will create his own bad architecture and database.</p>','Test description',NULL,NULL),(2,1,'ru','Интро','<p></p><h3>Что я могу предложить?</h3><p>Существует две группы работодателей. Одна группа это просто заказчики, которые ищут исполнителя и другая компании, специализирующиеся на разработке web приложений, которым нужен сотрудник на вакансию PHP программист. Далее, я подробнее расскажу о том, что я могу предложить каждой из групп. Такое разделение обусловлено прежде всего тем, что заказчик, в отличие от компании разработчика, чаще всего имеет очень смутное представление о web разработке. Поэтому в этом разделе я постараюсь описать эту область более понятным языком. Для компаний разработчиков, я предлагаю сразу обратиться к разделу&nbsp;<a href=\"http://test.ru/ru#work\">РАБОТА</a>&nbsp;, где я подробнее опишу свои навыки и используемые технологии.</p><h3>Потенциальным заказчикам</h3><p>Я разрабатываю web приложения. Сайты это тоже web приложение. Любое web приложение состоит из двух частей: фронтенд и бэкенд.&nbsp; Фронтенд это код, который исполняется в вашем браузере и его задачей является визуальное представление информации и обеспечение взаимодействия между пользователем и приложением. Бэкенд это код, который исполняется на удаленном сервере и его задачей является извлечение запрошенной информации из базы данных, обработка и передача ее в ваш браузер. Код фронтенда, так же находится на удаленном сервере и так же передается в ваш браузер по запросу. Запрос, это чаще всего, простой клик мышкой по ссылке или кнопке.</p><p>Бэкенд и фронтенд это абсолютно разные технологии. Моя специализация это разработка бэкенда web приложений с применением фреймворка Laravel. О том, что это такое расскажу чуть ниже. Но тем не менее, эти две технологии почти всегда идут рука об руку, и любой бэкенд разработчик в той или иной степени владеет и фронтендом. Мои навыки позволяют мне, в некоторых случаях, вести полную разработку. Это могут быть web приложения до определенного уровня сложности фронтенда, после которого целесообразно пригласить в помощь специалиста. </p><p>При разработке большого приложения, оно разбивается на меньшие части и разработка ведется параллельно несколькими программистами, может даже с использованием различных технологий внутри бэкенда или фронтенда. Тогда встает вопрос определения общей архитектуры приложения, состоящей из этих меньших частей и организации взаимодействия между программистами. Готов принять участие в команде разработчиков. При определенных обстоятельствах могу заняться архитектурными решениями и созданием команды, но это требует подробного обсуждения.</p><h3>Что такое фреймворк и чем он отличается от CMS</h3><p><b>Начнем с CMS.</b> CMS это английская аббревиатура, которая переводится как Система управления контентом. Наиболее известны WordPress, 1C-Битрикс, Shop-Script. Из названия CMS понятно, что некий коробочный вариант уже разработан и уже существует админка для управления контентом. Понятно, что типовой вариант никого не устраивает, поэтому каждая CMS имеет возможности для расширения своего функционала с помощью подключения модулей или плагинов. В любом случае, программирование здесь сведено почти к нулю и главная цель это ускорить и удешевить создание приложения. </p><p>Попытки предвосхитить любые пожелания заказчика, приводят к невероятной избыточности кода, запутанной архитектуре и низкой эффективности работы базы данных. Большое количество кода написано не для заказчика, а для разработчика, чтобы он управлял настройками CMS и плагинов через админ панель, а не писал код. Преимущества реляционных баз данных сведены практически к нулю. Если приложение растет и начинает требовать изменения архитектуры, то это монолит не подлежащий никакому разделению.</p><p><b>Фреймворк</b>, как это следует из названия, всего лишь каркас будущего приложения с набором библиотек с кодом, решающим некоторые повторяющиеся низкоуровневые задачи. Например, соединение с базой данных. Это совершенно абстрактная задача никак не связанная с тем какие задачи решает ваше приложение. Все библиотеки написаны таким образом, что вы можете на их основе строить свой дальнейший код, добавляя специфические для вашего приложения функции. Это называется ООП (Объектно-ориентированное программирование). Создаете оптимальную схему базы данных и архитектуру. Но если, в CMS плохие архитектура и схема базы данных уже существуют и про них все известно, то ничто не мешает плохому программисту написать на фреймворке свои уникальные, никому неизвестные плохие архитектуру и схему базы данных, что так же приводит к плачевному итогу и полной переработки приложения.</p>','Тестовое описание',NULL,NULL);
/*!40000 ALTER TABLE `intro_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `intros`
--

DROP TABLE IF EXISTS `intros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `intros` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_extension` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `intros`
--

LOCK TABLES `intros` WRITE;
/*!40000 ALTER TABLE `intros` DISABLE KEYS */;
INSERT INTO `intros` VALUES (1,'KekkJVbwDi','intro_1','jpg',NULL,'2019-09-07 04:29:10');
/*!40000 ALTER TABLE `intros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (34,'2014_10_12_000000_create_users_table',1),(35,'2014_10_12_100000_create_password_resets_table',1),(36,'2019_08_18_170733_create_intros_table',1),(37,'2019_08_18_170838_create_abouts_table',1),(38,'2019_08_18_171006_create_works_table',1),(39,'2019_08_18_171957_create_sites_table',1),(40,'2019_08_18_183104_create_intro_translations_table',1),(41,'2019_08_18_183158_create_work_translations_table',1),(42,'2019_08_18_183258_create_about_translations_table',1),(43,'2019_08_18_213511_create_headers_table',1),(44,'2019_08_18_213615_create_header_translations_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sites`
--

DROP TABLE IF EXISTS `sites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sites` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `header_id` bigint(20) unsigned NOT NULL,
  `intro_id` bigint(20) unsigned NOT NULL,
  `about_id` bigint(20) unsigned NOT NULL,
  `work_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sites`
--

LOCK TABLES `sites` WRITE;
/*!40000 ALTER TABLE `sites` DISABLE KEYS */;
INSERT INTO `sites` VALUES (1,1,1,1,1,NULL,'2019-08-31 22:54:33');
/*!40000 ALTER TABLE `sites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Andrey','admin@admin.loc',NULL,'$2y$10$CcuDrDMAKIpgxGKmOUwA0uO3MCclMpLAVZiUE5r./4KIKbrtIko4y','HAlV5P2CbM',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `work_translations`
--

DROP TABLE IF EXISTS `work_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `work_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `work_id` bigint(20) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `work_translations_work_id_locale_unique` (`work_id`,`locale`),
  KEY `work_translations_locale_index` (`locale`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `work_translations`
--

LOCK TABLES `work_translations` WRITE;
/*!40000 ALTER TABLE `work_translations` DISABLE KEYS */;
INSERT INTO `work_translations` VALUES (1,1,'en','Work','You have to write somrthing awesome here','Test description',NULL,NULL),(2,1,'ru','Работа','Вы должны здесь написать что-то потрясающее','Тестовое описание',NULL,NULL);
/*!40000 ALTER TABLE `work_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `works`
--

DROP TABLE IF EXISTS `works`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `works` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_extension` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works`
--

LOCK TABLES `works` WRITE;
/*!40000 ALTER TABLE `works` DISABLE KEYS */;
INSERT INTO `works` VALUES (1,'quod','pic02','jpg',NULL,NULL);
/*!40000 ALTER TABLE `works` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-07 16:46:33
