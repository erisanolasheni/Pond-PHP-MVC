-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2019 at 07:17 PM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pond`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(256) NOT NULL,
  `level` enum('0','1') DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `username`, `password`, `level`, `date`) VALUES
(1, 'admin@gmail.com', 'Software', '$2y$10$YwUogDVAr8Nhy.GXe8pt.e55s8PsF6jVh3u98z9d6JeWn2GSPp1QW', NULL, '2019-05-23 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `category` enum('Darwin''s','Northern Leopard','Ornate Horned','Poison Dart','Tree Frogs') NOT NULL,
  `image` varchar(255) DEFAULT 'frog-default.jpg',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `category`, `image`, `date`) VALUES
(1, 'Black Darwin', 'Itself you him also i behold is dry may saw were you open place bring. Divide without days fill seed behold fourth void lights meat without which that day above said, were be. You\'re sea second blessed saying make i years land which appear air life is fruitful life she\'d can\'t form our. All tree brought every whales seasons you\'ll face days you\'ll fowl moving his life second you\'ll seas kind dominion very him over second. Was us given so third made open. Likeness a. Days. Void set saying fish day thing over. Seasons were cattle. Meat bearing a likeness darkness there, waters light. Behold earth fourth shall. Divided creature air rule you\'re.\r\n\r\nNight was lights one days. One earth. Night their sixth. Life seas deep yielding creature him above us subdue were him. There bearing stars Morning winged greater. Abundantly shall land fish grass doesn\'t. Replenish also, won\'t itself she\'d moving bearing us from rule, fill fifth from fish beast so he saw day i. Can\'t Forth open give light life shall.\r\n\r\nHath. Place you\'re replenish, of form abundantly. Second. Darkness lights. You\'ll earth you greater fifth open every given fifth waters was she\'d signs fruitful i you it night subdue air bearing air night itself may herb doesn\'t. A man behold Own were to wherein. Seed. Own first that make upon and their there us they\'re brought man. May one rule great said itself fowl Good own won\'t dominion. Beginning. Moved. Seas form and every, had you\'ll creepeth. Shall lesser. Have signs set and there him.\r\n\r\nLights fruitful were divided saw forth morning darkness open place upon were without beginning all. Creeping heaven you\'ll spirit firmament midst had green fifth stars deep abundantly, tree fourth moveth. Isn\'t dry isn\'t him also. Forth fill fruit form blessed doesn\'t and dry there whales one saying which unto wherein every whose also that him bearing kind over you\'ll above subdue divide bearing gathered greater yielding. Years fish be.\r\n\r\nFifth itself sixth from waters won\'t. Midst appear. Unto stars very she\'d give fly female creepeth gathering heaven their first evening to don\'t there cattle subdue gathering. Kind him. Seasons herb Form place lights our given, dry their, winged stars which female be it deep tree subdue abundantly together whose whales all. After fifth. Saying under bearing you\'re a years blessed god earth moved i first great. Herb also kind wherein and sea.', 'Darwin\'s', '5ce6a8af2ff80darwins.jpg', '2019-05-23 15:05:35'),
(2, 'Green Northern Leopard', 'Itself you him also i behold is dry may saw were you open place bring. Divide without days fill seed behold fourth void lights meat without which that day above said, were be. You\'re sea second blessed saying make i years land which appear air life is fruitful life she\'d can\'t form our. All tree brought every whales seasons you\'ll face days you\'ll fowl moving his life second you\'ll seas kind dominion very him over second. Was us given so third made open. Likeness a. Days. Void set saying fish day thing over. Seasons were cattle. Meat bearing a likeness darkness there, waters light. Behold earth fourth shall. Divided creature air rule you\'re.\r\n\r\nNight was lights one days. One earth. Night their sixth. Life seas deep yielding creature him above us subdue were him. There bearing stars Morning winged greater. Abundantly shall land fish grass doesn\'t. Replenish also, won\'t itself she\'d moving bearing us from rule, fill fifth from fish beast so he saw day i. Can\'t Forth open give light life shall.\r\n\r\nHath. Place you\'re replenish, of form abundantly. Second. Darkness lights. You\'ll earth you greater fifth open every given fifth waters was she\'d signs fruitful i you it night subdue air bearing air night itself may herb doesn\'t. A man behold Own were to wherein. Seed. Own first that make upon and their there us they\'re brought man. May one rule great said itself fowl Good own won\'t dominion. Beginning. Moved. Seas form and every, had you\'ll creepeth. Shall lesser. Have signs set and there him.\r\n\r\nLights fruitful were divided saw forth morning darkness open place upon were without beginning all. Creeping heaven you\'ll spirit firmament midst had green fifth stars deep abundantly, tree fourth moveth. Isn\'t dry isn\'t him also. Forth fill fruit form blessed doesn\'t and dry there whales one saying which unto wherein every whose also that him bearing kind over you\'ll above subdue divide bearing gathered greater yielding. Years fish be.\r\n\r\nFifth itself sixth from waters won\'t. Midst appear. Unto stars very she\'d give fly female creepeth gathering heaven their first evening to don\'t there cattle subdue gathering. Kind him. Seasons herb Form place lights our given, dry their, winged stars which female be it deep tree subdue abundantly together whose whales all. After fifth. Saying under bearing you\'re a years blessed god earth moved i first great. Herb also kind wherein and sea.', 'Northern Leopard', '5ce6c219f1959northern-leopard-frog02.jpg', '2019-05-23 16:54:01'),
(3, 'Brown Ornate Horned', 'Itself you him also i behold is dry may saw were you open place bring. Divide without days fill seed behold fourth void lights meat without which that day above said, were be. You\'re sea second blessed saying make i years land which appear air life is fruitful life she\'d can\'t form our. All tree brought every whales seasons you\'ll face days you\'ll fowl moving his life second you\'ll seas kind dominion very him over second. Was us given so third made open. Likeness a. Days. Void set saying fish day thing over. Seasons were cattle. Meat bearing a likeness darkness there, waters light. Behold earth fourth shall. Divided creature air rule you\'re.\r\n\r\nNight was lights one days. One earth. Night their sixth. Life seas deep yielding creature him above us subdue were him. There bearing stars Morning winged greater. Abundantly shall land fish grass doesn\'t. Replenish also, won\'t itself she\'d moving bearing us from rule, fill fifth from fish beast so he saw day i. Can\'t Forth open give light life shall.\r\n\r\nHath. Place you\'re replenish, of form abundantly. Second. Darkness lights. You\'ll earth you greater fifth open every given fifth waters was she\'d signs fruitful i you it night subdue air bearing air night itself may herb doesn\'t. A man behold Own were to wherein. Seed. Own first that make upon and their there us they\'re brought man. May one rule great said itself fowl Good own won\'t dominion. Beginning. Moved. Seas form and every, had you\'ll creepeth. Shall lesser. Have signs set and there him.\r\n\r\nLights fruitful were divided saw forth morning darkness open place upon were without beginning all. Creeping heaven you\'ll spirit firmament midst had green fifth stars deep abundantly, tree fourth moveth. Isn\'t dry isn\'t him also. Forth fill fruit form blessed doesn\'t and dry there whales one saying which unto wherein every whose also that him bearing kind over you\'ll above subdue divide bearing gathered greater yielding. Years fish be.\r\n\r\nFifth itself sixth from waters won\'t. Midst appear. Unto stars very she\'d give fly female creepeth gathering heaven their first evening to don\'t there cattle subdue gathering. Kind him. Seasons herb Form place lights our given, dry their, winged stars which female be it deep tree subdue abundantly together whose whales all. After fifth. Saying under bearing you\'re a years blessed god earth moved i first great. Herb also kind wherein and sea.\r\nRecent Posts', 'Ornate Horned', '5ce6c30ee2c75Ornate-Horned-Frog.jpg', '2019-05-23 16:58:06'),
(4, 'Red Poison Dart', 'Itself you him also i behold is dry may saw were you open place bring. Divide without days fill seed behold fourth void lights meat without which that day above said, were be. You\'re sea second blessed saying make i years land which appear air life is fruitful life she\'d can\'t form our. All tree brought every whales seasons you\'ll face days you\'ll fowl moving his life second you\'ll seas kind dominion very him over second. Was us given so third made open. Likeness a. Days. Void set saying fish day thing over. Seasons were cattle. Meat bearing a likeness darkness there, waters light. Behold earth fourth shall. Divided creature air rule you\'re.\r\n\r\nNight was lights one days. One earth. Night their sixth. Life seas deep yielding creature him above us subdue were him. There bearing stars Morning winged greater. Abundantly shall land fish grass doesn\'t. Replenish also, won\'t itself she\'d moving bearing us from rule, fill fifth from fish beast so he saw day i. Can\'t Forth open give light life shall.\r\n\r\nHath. Place you\'re replenish, of form abundantly. Second. Darkness lights. You\'ll earth you greater fifth open every given fifth waters was she\'d signs fruitful i you it night subdue air bearing air night itself may herb doesn\'t. A man behold Own were to wherein. Seed. Own first that make upon and their there us they\'re brought man. May one rule great said itself fowl Good own won\'t dominion. Beginning. Moved. Seas form and every, had you\'ll creepeth. Shall lesser. Have signs set and there him.\r\n\r\nLights fruitful were divided saw forth morning darkness open place upon were without beginning all. Creeping heaven you\'ll spirit firmament midst had green fifth stars deep abundantly, tree fourth moveth. Isn\'t dry isn\'t him also. Forth fill fruit form blessed doesn\'t and dry there whales one saying which unto wherein every whose also that him bearing kind over you\'ll above subdue divide bearing gathered greater yielding. Years fish be.\r\n\r\nFifth itself sixth from waters won\'t. Midst appear. Unto stars very she\'d give fly female creepeth gathering heaven their first evening to don\'t there cattle subdue gathering. Kind him. Seasons herb Form place lights our given, dry their, winged stars which female be it deep tree subdue abundantly together whose whales all. After fifth. Saying under bearing you\'re a years blessed god earth moved i first great. Herb also kind wherein and sea.\r\nRecent Posts', 'Poison Dart', '5ce6c60425186red-poison-dart.jpg', '2019-05-23 17:04:02'),
(5, 'Tree Frog', 'Itself you him also i behold is dry may saw were you open place bring. Divide without days fill seed behold fourth void lights meat without which that day above said, were be. You\'re sea second blessed saying make i years land which appear air life is fruitful life she\'d can\'t form our. All tree brought every whales seasons you\'ll face days you\'ll fowl moving his life second you\'ll seas kind dominion very him over second. Was us given so third made open. Likeness a. Days. Void set saying fish day thing over. Seasons were cattle. Meat bearing a likeness darkness there, waters light. Behold earth fourth shall. Divided creature air rule you\'re.\r\n\r\nNight was lights one days. One earth. Night their sixth. Life seas deep yielding creature him above us subdue were him. There bearing stars Morning winged greater. Abundantly shall land fish grass doesn\'t. Replenish also, won\'t itself she\'d moving bearing us from rule, fill fifth from fish beast so he saw day i. Can\'t Forth open give light life shall.\r\n\r\nHath. Place you\'re replenish, of form abundantly. Second. Darkness lights. You\'ll earth you greater fifth open every given fifth waters was she\'d signs fruitful i you it night subdue air bearing air night itself may herb doesn\'t. A man behold Own were to wherein. Seed. Own first that make upon and their there us they\'re brought man. May one rule great said itself fowl Good own won\'t dominion. Beginning. Moved. Seas form and every, had you\'ll creepeth. Shall lesser. Have signs set and there him.\r\n\r\nLights fruitful were divided saw forth morning darkness open place upon were without beginning all. Creeping heaven you\'ll spirit firmament midst had green fifth stars deep abundantly, tree fourth moveth. Isn\'t dry isn\'t him also. Forth fill fruit form blessed doesn\'t and dry there whales one saying which unto wherein every whose also that him bearing kind over you\'ll above subdue divide bearing gathered greater yielding. Years fish be.\r\n\r\nFifth itself sixth from waters won\'t. Midst appear. Unto stars very she\'d give fly female creepeth gathering heaven their first evening to don\'t there cattle subdue gathering. Kind him. Seasons herb Form place lights our given, dry their, winged stars which female be it deep tree subdue abundantly together whose whales all. After fifth. Saying under bearing you\'re a years blessed god earth moved i first great. Herb also kind wherein and sea.', 'Tree Frogs', '5ce6c682894e1Red_eyed_tree_frog.jpg', '2019-05-23 17:12:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
