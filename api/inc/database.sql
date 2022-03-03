-- Adminer 4.8.1 MySQL 8.0.16 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `gloify_book_db` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `gloify_book_db`;

DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `google_id` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `author` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `store_id` int(12) NOT NULL,
  `copies` int(11) DEFAULT '0',
  `isbn` varchar(50) DEFAULT NULL,
  `year` varchar(15) DEFAULT NULL,
  `thumbnail` varchar(200) DEFAULT NULL,
  `description` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `books` (`id`, `title`, `google_id`, `author`, `store_id`, `copies`, `isbn`, `year`, `thumbnail`, `description`) VALUES
(1,	'Title Examination Standards of the Missouri Bar',	'Bc5QAQAAMAAJ',	'Missouri Bar',	2,	45,	NULL,	'1953-10-12',	'http://books.google.com/books/content?id=Bc5QAQAAMAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api',	''),
(2,	'The Great Gatsby',	'ZGAMEAAAQBAJ',	'F. Scott Fitzgerald',	1,	23,	NULL,	'2021-01-13',	'http://books.google.com/books/content?id=ZGAMEAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api',	'This tale of money, love, and the pursuit of the American dream constitutes the quintessential portrait of Jazz Age America. Fitzgerald\'s luminous prose depicts both the era\'s glamour and its seedy underside.'),
(3,	'Early English Books, 1641-1700: Title index, Extraordinary-Plaine',	'HJgmAQAAIAAJ',	'University Microfilms International',	7,	10,	NULL,	'1990-04-08',	'http://books.google.com/books/content?id=HJgmAQAAIAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api',	''),
(4,	'Book Title Tweet Book01: 140 Bite-Sized Ideas for Compelling Article, Book, and Event Titles',	'fDZ6N8BACJkC',	'Roger C. Parker',	3,	18,	'1616990279',	'2010-06',	'http://books.google.com/books/content?id=fDZ6N8BACJkC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api',	'Never underestimate the power of a book title! Titles spell the difference between messages that are read and absorbed, and those that go unnoticed. \'#BOOK TITLE tweet Book01\' stimulates a new way of thinking about titles and outlines a process for choosing perfect titles and subject lines. Concise and to the point, this book helps business professionals reap maximum value for the time and money they invest in creating and distributing their message. Its tested process for effective title selection is invaluable for business professionals who know that writing can build their brand and position them as thought leaders. If you are an author, an entrepreneur, or an information marketer, you will find that this gem of a book sparks your creativity and provides new directions for effective writing. \'#BOOK TITLE tweet Book01\' gets you to rethink the importance of titles and see the central value of the title in all your written projects. It demonstrates the importance of market research and early feedback in title selection. By focusing on the power of a title, it gives you a head start on a broad range of writing projects and helps you to examine them in the context of the needs and interests of your readers. Roger C. Parker is a \\\"32 Million Dollar Author,\\\" book coach, and online writing resource. His 38 books have sold 1.6 million copies in 35 languages around the world. In this book he shows you how to take a fresh look at titles and re-examine their effectiveness. The hundreds of examples he provides will inspire you to recognize good titles when you see them, and apply their lessons to your own projects. \'#BOOK TITLE tweet Book01\' coaches you to welcome writing projects, and optimize your written communication to maximize the value of your time, your money, and your brand. \'#BOOK TITLE tweet Book01\' is part of the THINKaha series whose 100-page books contain 140 well-thought-out quotes (tweets/ahas).'),
(5,	'Guaranteeing Marketability of Titles to Real Estate',	'wKQ1AAAAIAAJ',	'Harold Leslie Reeve',	1,	146,	'',	'1951',	'http://books.google.com/books/content?id=wKQ1AAAAIAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api',	''),
(10,	'Supper with the King',	'KRTYH777766677',	'James Bond',	3,	355,	'324-8678-8767356',	'2016',	'https://linktoimage.com/image.png',	'This book is a very nice one from a wonderful author'),
(11,	'3322Supper with the King',	'3322KRTYH777766677',	'3322James Bond',	3,	3322355,	'3322324-8678-8767356',	'33222016',	'3322https://linktoimage.com/image.png',	'3322This book is a very nice one from a wonderful author');

DROP TABLE IF EXISTS `stores`;
CREATE TABLE `stores` (
  `store_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_name` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `store_location` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `owner_id` int(12) DEFAULT NULL,
  PRIMARY KEY (`store_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `stores` (`store_id`, `store_name`, `store_location`, `owner_id`) VALUES
(1,	'South West Book Store',	'New York',	1),
(2,	'Spring Hills',	'London',	3),
(3,	'Easy Books Super Store',	'Nigeria',	2),
(4,	'Best Brain',	'India',	2),
(5,	'Mega Book Store',	'South Whales',	3),
(6,	'Apha Book Store',	'India',	2),
(7,	'Super Store',	'Ireland',	1),
(8,	'Kira Books',	'Sydney',	3);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(22) NOT NULL,
  `email` varchar(35) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`user_id`, `username`, `password`, `email`) VALUES
(1,	'andy',	'andy123',	'andy@gmail.com'),
(2,	'jack',	'jack125',	'jack125@gmail.com'),
(3,	'winnie',	'winnie142',	'winnie@gmail.com');

-- 2022-03-02 23:56:03
