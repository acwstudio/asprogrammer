-- MySQL dump 10.13  Distrib 5.7.26, for Linux (x86_64)
--
-- Host: localhost    Database: asprogrammer
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
-- Current Database: `asprogrammer`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `asprogrammer` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `asprogrammer`;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `about_translations`
--

LOCK TABLES `about_translations` WRITE;
/*!40000 ALTER TABLE `about_translations` DISABLE KEYS */;
INSERT INTO `about_translations` VALUES (1,1,'en','About Me','<h3>Hello, everyone!</h3><p>My name is Andrey Voskresenskiy. I\'m from Saint-Petersburg, Russia. Now I\'ll tell you a little about myself. </p><p>I graduated from three educational institutions.</p><table class=\"table table-bordered\"><tbody><tr><td>Leningrad Shipbuilding College</td><td>Faculty of Marine Devices</td></tr><tr><td>Northwest Polytechnic Institute</td><td>Faculty of Radio-electronics</td></tr><tr><td>Academy of Management Methods and Engineering at the St. Petersburg National Research University of Information Technologies, Mechanics and Optics</td><td>Financial and administranive manager</td></tr></tbody></table><p>For 10 years I worked as an engineer at the Research Institute, that is engage in research and development of airborne radar systems to control the objects on each they are installed. This is very valuable experience that taught me, already having a higher technical education to find and acquire new knowledge on my own. It was then that I learned a lot of what is now called Computer Science.</p><p>In 2011 I began self study of WEB technologies and now I have good skills, that you find on the&nbsp;<a href=\"/en/#work\" target=\"_blank\">WORK</a>&nbsp;page. When I am working on a project, I am guided by a systematic approach to make the web application as perfect as possible. By system approach, I mean developing parts of an application based on its overall context, making it as compatible as possible and minimally dependent.&nbsp; The experience of previous developers is formulated in architectural solutions, OOP principles, and well-known design patterns. It is very important to follow them in the development process in order to avoid problems with performance, difficulties with support and development of the application,</p><p>The level of my English allows me to read technical texts, but I need a talking practice.</p><p>I like to share knowledge with colleagues and learn something new from them. I am always ready to listen to the opposite opinion on any issue and objectively argue if there is anything to say. The difference in age, and belonging to a particular gender or nationality does not give advantages and does not require special treatment. I like calm, equal business relations. I do not go beyond my competence and recognize the right of the leader to direct me to follow his decisions. In turn, I expect the leader to be ready to listen and discuss different opinions before making a serious decision.</p><p>When I was young, I played football. Now I am calm fan. I like travelling by my own car. I travel a lot around Finland. I visited almost everywhere, up to the most remote corners of Lapland. Once visited Nord Cap the northernmost point of Europe.</p><p>If you are interested to hire me to work or want to ask me additional information, please use the feedback form for the first contact. I will be glad to answer you.</p>','Feedback form <a href=\"/en#contact\" target=\"_blank\">Contacts</a>',NULL,NULL),(2,1,'ru','Обо мне','<h3>Всем привет!</h3><p>Меня зовут Андрей Воскресенский, я web разработчик, живущий в Санкт-Петербурге, Россия. Сейчас я вам расскажу немного о себе. </p><p>В разное время, я закончил три учебных заведения&nbsp;</p><table class=\"table table-bordered\"><tbody><tr><td>Ленинградский Судостроительный техникум</td><td>факультет судовые приборы и аппараты</td></tr><tr><td>Северо-Западный заочный Политехнический институт</td><td>факультет радиоэлектроники</td></tr><tr><td>Академия методов и техники управления \"ЛИМТУ\" при Санкт-Петербургском национальном&nbsp; исследовательском университете информационных технологий, механики и оптики.</td><td>менеджер финансовых и административных подразделений</td></tr></tbody></table><p>В течение 10 лет я работал инженером в НИИ, который занимался исследованием и разработкой бортовых радиолокационных систем для управления объектами на которых они установлены. Это очень ценный опыт, который научил меня, уже имея высшее техническое образование, находить и получать новые знания самостоятельно. Именно тогда я изучил многое из того, что сейчас называется Computer Science.</p><p>В 2011 году я начал самостоятельное изучение WEB технологий и в настоящее время обладаю хорошими навыками, с которыми вы можете ознакомиться на странице&nbsp;<a href=\"/ru/#work\" target=\"_blank\">РАБОТА</a>.&nbsp;В работе над проектами я руководствуюсь системным подходом, чтобы сделать web приложение максимально совершенным. Под системным подходом я понимаю разработку отдельных частей приложения с учетом его общего контекста,&nbsp; добиваясь максимальной совместимости и минимальной зависимости. Опыт предыдущих разработчиков сформулирован в архитектурных решениях, принципах ООП и известных паттернах проектирования. Очень важно следовать им в процессе разработки, чтобы избежать проблем с производительностью, трудностями с поддержкой и развитием приложения.</p><p>Уровень знания английского языка позволяет мне читать техническую литературу, разговорный требует постоянной практики, но, для обычного общения, тоже на неплохом уровне.</p><p>Я люблю делиться знаниями с коллегами и учиться чему-то новому у них.&nbsp; Всегда готов выслушать противоположное мнение по любому вопросу&nbsp; и аргументированно возразить если есть что сказать Разница в возрасте и принадлежность к тому или иному полу или национальности не дает преимуществ и не требует особого отношения. Люблю спокойные равноправные деловые отношения. Не выхожу за рамки своей компетенции и признаю право руководителя на указания мне следовать его решениям. В свою очередь, я жду от руководителя готовность выслушать и обсудить разные мнения до принятия серьезного решения.</p><p>В юности играл в футбол на любительском уровне, сейчас спокойный болельщик. Люблю путешествия на собственном автомобиле, очень много езжу по Финляндии, побывал практически везде, вплоть до самых удаленных уголков Лапландии. Однажды посетил мыс Норд Кап, самую северную точку Европы.</p>','Форма обратной связи <a href=\"/ru#contact\" target=\"_blank\">Контакты</a>',NULL,NULL),(4,3,'en','It\'s me','<h3>Test production case</h3><p><img src=\"http://test.ru/dim/images/summernote/summernote-809085.jpg\"><br></p>','Feedback form <a href=\"/en#contact\" target=\"_blank\">Contacts</a>',NULL,NULL),(5,3,'ru','Обо мне','<p>Статья не написана</p>','Форма обратной связи <a href=\"/ru#contact\" target=\"_blank\">Контакты</a>',NULL,NULL);
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
INSERT INTO `abouts` VALUES (1,'YfeJOwvICI','about_1','jpg',NULL,'2020-03-19 12:25:40'),(3,'jahIKfPVoT','about_3','jpg','2019-08-30 08:32:46','2019-09-16 12:27:18');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `intro_translations`
--

LOCK TABLES `intro_translations` WRITE;
/*!40000 ALTER TABLE `intro_translations` DISABLE KEYS */;
INSERT INTO `intro_translations` VALUES (1,1,'en','Intro','<h3>What can I offer?</h3><p>There are two groups of employers.&nbsp;The first group is just customers. They looking for a developer to create a web application. Other group is IT companies. They looking for an employee, for example, a PHP programmer.&nbsp;Next, I will talk more about that I can offer each of the groups. This difference is explained by the fact, that customers have no idea about web development.&nbsp;Therefore, in this section I will try to describe this area in a more understandable language. If you are a specialist from company developer, I suggest immediately referring to the&nbsp;<a href=\"http://test.ru/ru#work\">WORK</a>&nbsp;section. I will describe in more detail my skills and technologies used there.</p><h3>For potential customers</h3><p>I am creating web applications. A site is a web application too.&nbsp;Any web application consists of two parts: front-end and back-end.&nbsp;The front-end is the code that is executed in your browser and its task is to visually present information and ensure interaction between the user and the application.&nbsp;A back-end is code that is executed on a remote server and its task is to extract the requested information from the database, process and transfer it to your browser. The front-end and the back-end are both on the remote server. A part of front-end is transferred to your browser along with requested data.&nbsp;The request, most often, is a simple click on the link or button.</p><p>The back-end and front-end are completely different technologies. I am mostly the back-end developer. But, sometimes, if the front-end is not sophisticated,&nbsp;I can be a full stack developer. My skills let me to fix front-end issues, to write a small Javascript snippets, to change CSS and HTML code.&nbsp;If the front-end is large and complex, it makes sense to invite the front-end of the developer to help.</p><p>If an application is very large, it is divided into smaller parts and development is carried out in parallel by several programmers, maybe even using various technologies inside the back-end or front-end. Then the question arises of defining the general architecture of the application, consisting of these smaller parts and the organization of interaction between programmers. I am ready to take part in the development team. In certain circumstances, I can take up architectural decisions and create a team, but this requires a detailed discussion.</p><h3>What is a framework and what does it differ from CMS</h3><p><b>Firstly about CMS&nbsp;</b>&nbsp;CMS is Content Management System. Well known systems are WordPress, Drupal, Shop-Script.&nbsp;CMS is a ready-made application. You already have an admin panel and a database. You can immediately fill the application with content and manage it. But there is no such CMS that meets all the requirements of the user. It is clear that the typical version does not suit anyone, so each CMS has the ability to expand its functionality by connecting modules or plugins. In any case, the programming here is reduced to almost zero and the main goal is to speed up and reduce the cost of creating an application.</p><p>Attempts to anticipate any customer wishes lead to incredible code redundancy, confusing architecture and low database performance. A large amount of code was written not for the customer, but for the developer, so that he controlled the settings of the CMS and plug-ins through the admin panel, and did not write the code. The benefits of relational databases are almost nil. If the application grows and begins to require a change in architecture, then this monolith is not subject to any separation.</p><p><b>Framework</b>&nbsp; The framework is just the skeleton of the future application. It has well-structured file system and a set of libraries that solve repetitive low-level tasks. For example, a connection to a database. This is a completely abstract task that has nothing to do with what tasks your application solves. All libraries are written in such a way that you can build your further code based on them, adding functions specific to your application. This is called OOP (Object Oriented Programming). You have optimal architecture and database, You have just a problem: you need to find a good developer. The unskilled developer will create his own bad architecture and database.</p>','Feedback form <a href=\"/en#contact\" target=\"_blank\">Contacts</a>',NULL,NULL),(2,1,'ru','Интро','<p></p><h3>Что я могу предложить?</h3><p>Существует две группы работодателей. Одна группа это просто заказчики, которые ищут исполнителя и другая компании, специализирующиеся на разработке web приложений, которым нужен сотрудник на вакансию PHP программист. Далее, я подробнее расскажу о том, что я могу предложить каждой из групп. Такое разделение обусловлено прежде всего тем, что заказчик, в отличие от компании разработчика, чаще всего имеет очень смутное представление о web разработке. Поэтому в этом разделе я постараюсь описать эту область более понятным языком. Для компаний разработчиков, я предлагаю сразу обратиться к разделу&nbsp;<a href=\"http://test.ru/ru#work\">РАБОТА</a>&nbsp;, где я подробнее опишу свои навыки и используемые технологии.</p><h3>Потенциальным заказчикам</h3><p>Я разрабатываю web приложения. Сайты это тоже web приложение. Любое web приложение состоит из двух частей: фронтенд и бэкенд.&nbsp; Фронтенд это код, который исполняется в вашем браузере и его задачей является визуальное представление информации и обеспечение взаимодействия между пользователем и приложением. Бэкенд это код, который исполняется на удаленном сервере и его задачей является извлечение запрошенной информации из базы данных, обработка и передача ее в ваш браузер. Код фронтенда, так же находится на удаленном сервере и так же передается в ваш браузер по запросу. Запрос, это чаще всего, простой клик мышкой по ссылке или кнопке.</p><p>Бэкенд и фронтенд это абсолютно разные технологии. Моя специализация это разработка бэкенда web приложений с применением фреймворка Laravel. О том, что это такое расскажу чуть ниже. Но тем не менее, эти две технологии почти всегда идут рука об руку, и любой бэкенд разработчик в той или иной степени владеет и фронтендом. Мои навыки позволяют мне, в некоторых случаях, вести полную разработку. Это могут быть web приложения до определенного уровня сложности фронтенда, после которого целесообразно пригласить в помощь специалиста. </p><p>При разработке большого приложения, оно разбивается на меньшие части и разработка ведется параллельно несколькими программистами, может даже с использованием различных технологий внутри бэкенда или фронтенда. Тогда встает вопрос определения общей архитектуры приложения, состоящей из этих меньших частей и организации взаимодействия между программистами. Готов принять участие в команде разработчиков. При определенных обстоятельствах могу заняться архитектурными решениями и созданием команды, но это требует подробного обсуждения.</p><h3>Что такое фреймворк и чем он отличается от CMS</h3><p><b>Начнем с CMS.</b> CMS это английская аббревиатура, которая переводится как Система управления контентом. Наиболее известны WordPress, 1C-Битрикс, Shop-Script. Из названия CMS понятно, что некий коробочный вариант уже разработан и уже существует админка для управления контентом. Понятно, что типовой вариант никого не устраивает, поэтому каждая CMS имеет возможности для расширения своего функционала с помощью подключения модулей или плагинов. В любом случае, программирование здесь сведено почти к нулю и главная цель это ускорить и удешевить создание приложения. </p><p>Попытки предвосхитить любые пожелания заказчика, приводят к невероятной избыточности кода, запутанной архитектуре и низкой эффективности работы базы данных. Большое количество кода написано не для заказчика, а для разработчика, чтобы он управлял настройками CMS и плагинов через админ панель, а не писал код. Преимущества реляционных баз данных сведены практически к нулю. Если приложение растет и начинает требовать изменения архитектуры, то это монолит не подлежащий никакому разделению.</p><p><b>Фреймворк</b>, как это следует из названия, всего лишь каркас будущего приложения с набором библиотек с кодом, решающим некоторые повторяющиеся низкоуровневые задачи. Например, соединение с базой данных. Это совершенно абстрактная задача никак не связанная с тем какие задачи решает ваше приложение. Все библиотеки написаны таким образом, что вы можете на их основе строить свой дальнейший код, добавляя специфические для вашего приложения функции. Это называется ООП (Объектно-ориентированное программирование). Создаете оптимальную схему базы данных и архитектуру. Но если, в CMS плохие архитектура и схема базы данных уже существуют и про них все известно, то ничто не мешает плохому программисту написать на фреймворке свои уникальные, никому неизвестные плохие архитектуру и схему базы данных, что так же приводит к плачевному итогу и полной переработки приложения.</p>','Форма обратной связи <a href=\"/ru#contact\" target=\"_blank\">Контакты</a>',NULL,NULL),(3,2,'ru','Интро','<h3>Презентация услуг</h3><p>Мои услуги относятся к области web разработки. Область web разработки включает огромное число технологий и языков программирования. Одному человеку невозможно охватить ее всю целиком. Я являюсь PHP программистом и разрабатываю серверную часть web приложений. Тем не менее, моих знаний и навыков в таких традиционно смежных с PHP технологиях, как HTML, CSS и Javascript достаточно, чтобы в отдельных случаях разработать приложение целиком в одиночку. Такими приложениями могут быть традиционные web сайты, фронтенд которых не несет в себе сложной логики обработки данных, задач роутинга и запросов к базе данных без перезагрузки страницы.</p><ul><li>Лендинги</li><li>Персональные сайты</li><li>Корпоративные сайты</li><li>Электронная коммерция</li></ul><p>В своей работе я использую фреймворк Laravel и не использую CMS. Это избавляет от большой кучи мертвого кода, что позволяет в дальнейшем без проблем поддерживать сайт в рабочем состоянии и планомерно развивать его в случае необходимости. Схема базы данных создается оптимальной для конкретного сайта и обеспечивает максимальную производительность. Такой подход рассчитан, прежде всего на тех, кому сайт нужен на длительный период с серьезными целями, с возможностью периодического рестайлинга и добавления функционала.</p><p>В отличие от web сайтов, которые я описал ранее, существует большое количество сложных приложений, работающих с применением разных технологий. Например, последнее время, получили большое распространение одностраничные приложения (SPA), где фронтенд, вместе с представлением, берет на себя задачи роутинга и логику обработки данных. В таких случаях серверная часть является микросервисом с API, для обслуживания запросов одностраничного приложения. С развитием мобильных устройств, появилось большое количество мобильных приложений, которые так же взаимодействуют с API серверной части. Здесь я могу выступать непосредственно в роли PHP разработчика.&nbsp;</p><ul><li>Написание бекэнда для приложения</li><li>Создание микросервиса REST API для распределенной архитектуры.</li></ul><p>Если вы заинтересованы в сотрудничестве или хотите получить дополнительную информацию, используйте, пожалуйста,&nbsp; для первого контакта форму обратной связи. Буду рад любому контакту.</p>','Форма обратной связи <a href=\"/ru#contact\" target=\"_blank\">Контакты</a>',NULL,NULL),(4,2,'en','Intro','<h3>Service Presentation</h3><p>nnnnn</p>','Feedback form <a href=\"/en#contact\" target=\"_blank\">Contacts</a>',NULL,NULL),(5,3,'ru','Интро','<h3>Чем я могу быть полезен</h3><p><img src=\"http://test.ru/dim/images/summernote/summernote-17159.jpg\" style=\"width: 25%;\"><br></p>','Форма обратной связи <a href=\"http://test.ru/ru#contact\" target=\"_blank\">Контакты</a>',NULL,NULL),(6,4,'ru','Интро','<h3>Спектр предоставляемых услуг</h3><p>Я PHP программист с широким диапазоном навыков, о которых вы можете подробнее узнать, перейдя по ссылке в меню&nbsp;<a href=\"/ru#work\" target=\"_blank\">РАБОТА</a>. Я предлагаю вам следующие услуги:</p><ul><li>создание любого типа сайта (персональный, корпоративный, электронная коммерция, лендинг)</li><li>исправление ошибок, доработка и переписывание сайта с CMS на фреймворке Laravel</li><li>участие в разработке web приложений в качестве PHP разработчика</li><li>разработка микросервисов для распределенной архитектуры</li><li>разделение монолитного приложения на микросервисы</li><li>работа в офисе и удаленно</li><li>работа проектная и постоянная</li></ul><p>Если вы заинтересованы в сотрудничестве или хотите получить любую дополнительную информацию, используйте, пожалуйста, для первого контакта форму обратной связи. Буду рад ответить на все ваши вопросы.</p>','Форма обратной связи <a href=\"/ru#contact\" target=\"_blank\">Контакты</a>',NULL,NULL),(7,4,'en','Intro','<h3>Range of services</h3><p>I\'m a PHP programmer. I have a lot of developer\'s skills. You can learn more about it by clicking on the&nbsp;<a href=\"/ru#work\" target=\"_blank\">WORK</a>&nbsp;link. I can offer you these services:</p><ul><li>website development of any type (personal, corporate, e-commerce, landing page)</li><li>troubleshooting, adding new features, re-creation your website using Laravel</li><li>become a PHP programmer in the team of developers of a large project</li><li>development of microservices for a distributed architecture application</li><li>breakdown of a monolithic application into microservices</li><li>office and remote job</li><li>permanent or project employment</li></ul><p>If you are interested to hire me to work or want to ask me additional information, please use the feedback form for the first contact. I will be glad to answer you.</p>','Feedback form <a href=\"/en#contact\" target=\"_blank\">Contacts</a>',NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `intros`
--

LOCK TABLES `intros` WRITE;
/*!40000 ALTER TABLE `intros` DISABLE KEYS */;
INSERT INTO `intros` VALUES (1,'ETIPY7yb64','intro_1','jpg',NULL,'2019-09-15 04:08:57'),(2,'5dH8wtUxu9','intro_2','jpg','2019-09-13 03:25:00','2019-09-15 04:08:42'),(4,'5WFLanBYgZ','intro_4','jpg','2019-09-15 04:02:57','2019-09-15 15:26:43');
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
INSERT INTO `sites` VALUES (1,1,4,1,1,NULL,'2019-09-16 12:29:01');
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
INSERT INTO `users` VALUES (1,'Andrey','admin@admin.loc',NULL,'$2y$10$CcuDrDMAKIpgxGKmOUwA0uO3MCclMpLAVZiUE5r./4KIKbrtIko4y','KrytQ0WLfpL1Ccy6qNCkUncu2yoUDNUhfK06m2i73x7JS91hDarbE6iZDyUs',NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `work_translations`
--

LOCK TABLES `work_translations` WRITE;
/*!40000 ALTER TABLE `work_translations` DISABLE KEYS */;
INSERT INTO `work_translations` VALUES (1,1,'en','Work','<h3>Technology stack</h3><table class=\"table table-bordered\"><tbody><tr><td><p><img src=\"http://as-programmer.ru/dim/images/summernote/summernote-754373.jpg\"><br></p></td><td>PHP 7 is a scripting language for developing web applications. Object-Oriented Programming, design patterns.</td></tr><tr><td><p><img src=\"http://as-programmer.ru/dim/images/summernote/summernote-350785.png\"><br></p></td><td>Laravel is a modern PHP framework built from components. This approach allows you to add, remove and replace any of its components.</td></tr><tr><td><p><img src=\"http://as-programmer.ru/dim/images/summernote/summernote-419720.jpg\"><br></p></td><td>MySQL is a relational database. Creating a database schema, tables and relationships between them, building queries.</td></tr><tr><td><p><img src=\"http://as-programmer.ru/dim/images/summernote/summernote-345002.jpg\"><br></p></td><td>Composer is a package manager for dependency management in PHP applications. Installing Laravel, removing and adding components is done using Composer.</td></tr><tr><td><p><img src=\"http://as-programmer.ru/dim/images/summernote/summernote-181480.png\"><br></p></td><td>Git is a distributed version control system. It keeps the history of changes made in the process of development and bug fixes.</td></tr><tr><td><p><img src=\"http://as-programmer.ru/dim/images/summernote/summernote-319404.jpg\"><br></p></td><td>OS Linux is the most commonly used operating system for servers. An administration by command line interface, deployment and configuration of LAMP and LEMP stacks.</td></tr><tr><td><p><img src=\"http://as-programmer.ru/dim/images/summernote/summernote-58313.jpg\"><br></p></td><td>Docker The fastest way to securely build, share and run modern applications on a single platform.</td></tr></tbody></table><h3>Related Technologies</h3><p>My skills in related technologies are sufficient to understand the code of a ready front-end application, modify and supplement it, to use libraries, to understand the structure of the framework.</p><table class=\"table table-bordered\"><tbody><tr><td><p><img src=\"http://as-programmer.ru/dim/images/summernote/summernote-485952.jpg\"><br></p></td><td>HTML5 is language for structuring and presenting content</td></tr><tr><td><p><img src=\"http://as-programmer.ru/dim/images/summernote/summernote-572391.png\"><br></p></td><td>CSS3 is Cascading Style Sheets. It is formal language for describing the appearence of a page written by HTML.</td></tr><tr><td><p><img src=\"http://as-programmer.ru/dim/images/summernote/summernote-102264.png\"><br></p></td><td>Bootstrap is the world\'s most popular front-end library of interface components for creating adaptive, interactive and mobile web applications.</td></tr><tr><td><p><img src=\"http://as-programmer.ru/dim/images/summernote/summernote-783075.png\"><br></p></td><td>JavaScript is a programming language for managing the application in a browser on the client side.</td></tr><tr><td><p><img src=\"http://as-programmer.ru/dim/images/summernote/summernote-37537.jpg\"><br></p></td><td>jQuery is a JavaScript library aimed at the interaction of JavaScript and HTML. It helps to easily access and manipulate any element, its attributes and contents.</td></tr><tr><td><p><img src=\"http://as-programmer.ru/dim/images/summernote/summernote-34383.jpg\"><br></p></td><td>AJAX is a technology accessing the server without reloading the page. The jQuery library provides a very convenient API for working with this technology.</td></tr><tr><td><p><img src=\"http://as-programmer.ru/dim/images/summernote/summernote-801222.jpg\"><br></p></td><td>Now there is a rapid growth of front-end technologies and almost every day araise the new JavaScript frameworks. Laravel almost always works in conjunction with them and can\'t be outside this trend. Laravel offers the <b>Laravel Mix</b> a special wrapper to cimplify working with front-end tools. So the developer gets everything necessary to work with modern technologies, including the Vue.js framework.</td></tr></tbody></table><p>If you are interested to hire me to work or want to ask me additional information, please use the feedback form for the first contact. I will be glad to answer you.</p>','Feedback form <a href=\"/en#contact\" target=\"_blank\">Contacts</a>',NULL,NULL),(2,1,'ru','Работа','<h3>Стек технологий</h3><table class=\"table table-bordered\"><tbody><tr><td><p><img src=\"http://as-programmer.ru/dim/images/summernote/summernote-696395.jpg\"><br></p></td><td>PHP 7 Скриптовый язык для разработки web приложений. Объектно-ориентированное программирование, паттерны проектирования.</td></tr><tr><td><img src=\"http://as-programmer.ru/dim/images/summernote/summernote-941725.png\"></td><td>Laravel современный PHP фреймворк, собранный из компонентов. Этот подход позволяет добавлять, удалять и заменять любой из его компонентов.</td></tr><tr><td><p><img src=\"http://as-programmer.ru/dim/images/summernote/summernote-692706.jpg\"><br></p></td><td>MySQL реляционная база данных. Создание схемы базы данных, таблиц и отношений между ними, построение запросов.</td></tr><tr><td><p><img src=\"http://as-programmer.ru/dim/images/summernote/summernote-282696.jpg\"><br></p></td><td>Composer пакетный менеджер для управления зависимостями в PHP приложениях. Установка Laravel, удаление и добавление компонентов производится с помощью Composer.</td></tr><tr><td><p><img src=\"http://as-programmer.ru/dim/images/summernote/summernote-76458.png\"><br></p></td><td>Git распределенная система управления версиями. Хранит всю историю изменений сделанных в процессе разработки и исправления багов.</td></tr><tr><td><p><img src=\"http://as-programmer.ru/dim/images/summernote/summernote-225311.jpg\"><br></p></td><td>OS Linux Наиболее часто применяемая для серверов операционная система. Имею навыки администрирования посредством командной строки, развертывание и настройка LAMP и LEMP стеков, деплой.</td></tr><tr><td><p><img src=\"http://as-programmer.ru/dim/images/summernote/summernote-248355.jpg\"><br></p></td><td>Docker. программное обеспечение для автоматизации развёртывания и управления приложениями в средах с поддержкой контейнеризации</td></tr></tbody></table><h3>Смежные технологии</h3><p>Мои навыки в смежных технологиях достаточны, чтобы разбираться в коде готового фронтенд приложения, дорабатывать и дополнять его, пользоваться библиотеками, понимать устройство фреймворка.&nbsp;</p><table class=\"table table-bordered\"><tbody><tr><td><p><img src=\"http://as-programmer.ru/dim/images/summernote/summernote-198731.jpg\"><br></p></td><td>HTML5 язык для структурирования и представления контента.&nbsp;</td></tr><tr><td><p><img src=\"http://as-programmer.ru/dim/images/summernote/summernote-254308.png\"><br></p></td><td>CSS3 Каскадные таблицы стилей. Формальный язык описания внешнего вида страницы, написанной с помощью языка HTML</td></tr><tr><td><p><img src=\"http://as-programmer.ru/dim/images/summernote/summernote-621474.png\"><br></p></td><td>Bootstrap самая популярная в мире фронтенд библиотека компонентов интерфейса для создания адаптивных, интерактивных и мобильных web приложений</td></tr><tr><td><p><img src=\"http://as-programmer.ru/dim/images/summernote/summernote-227883.png\"><br></p></td><td>JavaScript язык программирования для управления работой приложения в браузере на стороне клиента.</td></tr><tr><td><p><img src=\"http://as-programmer.ru/dim/images/summernote/summernote-464261.jpg\"><br></p></td><td>jQuery библиотека JavaScript, направленная на взаимодействие JavaScript и HTML. Помогает легко получить доступ к любому элементу, к его атрибутам и содержимому, манипулировать ими.</td></tr><tr><td><p><img src=\"http://as-programmer.ru/dim/images/summernote/summernote-242292.jpg\"><br></p></td><td>AJAX технология обращения к серверу без перезагрузки страницы. Библиотека jQuery предоставляет очень удобный API для работы с этой технологией.</td></tr><tr><td><p><img src=\"http://as-programmer.ru/dim/images/summernote/summernote-201164.jpg\"><br></p></td><td><p>В настоящее время идет бурный рост технологий в области фронтенда и чуть ли не каждый день появляются новые версии JavaScript фреймворков. Laravel почти всегда работает в связке с фронтендом и не может находится вне этого тренда. Laravel предлагает <b>Laravel Mix</b> специальную обертку для упрощения работы с инструментами фронтенда с помощью которой разработчик получает все необходимое для работы с современными технологиями, в том числе и с фреймворком Vue.js</p></td></tr></tbody></table><p><span style=\"font-size: 0.9rem;\">Если вы заинтересованы в сотрудничестве или хотите получить дополнительную информацию, используйте, пожалуйста,&nbsp; для первого контакта форму обратной связи. Буду рад ответить на все ваши вопросы.</span><br></p>','Форма обратной связи <a href=\"/ru#contact\" target=\"_blank\">Контакты</a>',NULL,NULL),(3,2,'ru','ccccc','<p>ccccc</p>','xxxxxx',NULL,NULL),(4,3,'ru','aaaaaaa','<p>aaaaaaaaa</p>','aaaaaaa',NULL,NULL);
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
INSERT INTO `works` VALUES (1,'2cCrLAhGAW','work_1','jpg',NULL,'2020-03-11 15:58:33');
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

-- Dump completed on 2020-04-17 13:03:05
