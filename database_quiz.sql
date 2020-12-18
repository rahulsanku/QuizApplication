-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
CREATE DATABASE QUIZ;
USE QUIZ;
DELIMITER ;;

DROP PROCEDURE IF EXISTS `checkFail`;;
CREATE PROCEDURE `checkFail`()
BEGIN 
  SELECT name, percentage FROM quiz_attempt, student
  WHERE quiz_attempt.percentage < 40 AND student.student_id = quiz_attempt.student_id;
END;;

DELIMITER ;

DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `question_id` int(10) NOT NULL AUTO_INCREMENT,
  `question` varchar(3072) DEFAULT NULL,
  `answer` int(2) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `questions` (`question_id`, `question`, `answer`) VALUES
(1,	'Which SQL statement is used to extract data from a database?',	4),
(2,	'Which SQL statement is used to insert new data in a database?',	1),
(3,	'With SQL, how do you select all the records from a table named “Persons” where the value of the column “FirstName” is “Peter”?',	2);

DROP TABLE IF EXISTS `question_options`;
CREATE TABLE `question_options` (
  `question_id` int(10) NOT NULL,
  `option_number` int(2) NOT NULL,
  `option` varchar(1000) NOT NULL,
  KEY `question_id` (`question_id`),
  CONSTRAINT `question_options_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `question_options` (`question_id`, `option_number`, `option`) VALUES
(1,	1,	'OPEN'),
(1,	2,	'EXTRACT'),
(1,	3,	'GET'),
(1,	4,	'SELECT'),
(2,	1,	'INSERT INTO'),
(2,	2,	'ADD RECORD'),
(2,	3,	'ADD NEW'),
(2,	4,	'INSERT INTO'),
(3,	1,	'SELECT [all]  FROM Persons WHERE FirstName = \"Peter\"'),
(3,	2,	'SELECT * FROM Persons WHERE FirstName = \"Peter\"'),
(3,	3,	'SELECT [all] FROM Persons WHERE FirstName LIKE \"Peter\"'),
(3,	4,	'SELECT * FROM Persons WHERE FirstName <>\"Peter\"');

DROP TABLE IF EXISTS `quiz`;
CREATE TABLE `quiz` (
  `quiz_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `available` char(1) NOT NULL,
  `duration` int(10) NOT NULL,
  PRIMARY KEY (`quiz_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `quiz` (`quiz_id`, `name`, `author`, `available`, `duration`) VALUES
(34,	'SQL',	'Peter Parker',	'Y',	60);

DELIMITER ;;

CREATE TRIGGER `QuizDeletesLogs` BEFORE DELETE ON `quiz` FOR EACH ROW
BEGIN
  INSERT INTO quiz_delete_logs
  SET staff_id= staff_id,
      quiz_id= OLD.quiz_id,
	    time_of_deletion= NOW();
END;;

DELIMITER ;

DROP TABLE IF EXISTS `quiz_attempt`;
CREATE TABLE `quiz_attempt` (
  `student_id` int(10) NOT NULL,
  `quiz_id` int(10) NOT NULL,
  `date_of_attempt` varchar(100) NOT NULL,
  `percentage` int(10) NOT NULL,
  KEY `quiz_id` (`quiz_id`),
  KEY `student_id` (`student_id`),
  CONSTRAINT `quiz_attempt_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`),
  CONSTRAINT `quiz_attempt_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `quiz_delete_logs`;
CREATE TABLE `quiz_delete_logs` (
  `staff_id` int(10) NOT NULL,
  `quiz_id` int(10) NOT NULL,
  `time_of_deletion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `quiz_questions`;
CREATE TABLE `quiz_questions` (
  `quiz_id` int(10) NOT NULL,
  `question_id` int(10) NOT NULL,
  KEY `quiz_id` (`quiz_id`),
  KEY `question_id` (`question_id`),
  CONSTRAINT `quiz_questions_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`),
  CONSTRAINT `quiz_questions_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `quiz_questions` (`quiz_id`, `question_id`) VALUES
(34,	1),
(34,	2),
(34,	3);

DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `staff_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `staff` (`staff_id`, `name`, `email`, `password`) VALUES
(1,	'Staff A',	'staff@email.com',	'staff');

DROP TABLE IF EXISTS `staff_quiz_attempt`;
CREATE TABLE `staff_quiz_attempt` (
  `staff_id` int(10) NOT NULL,
  `quiz_id` int(10) NOT NULL,
  `date_of_attempt` varchar(100) NOT NULL,
  `percentage` int(10) NOT NULL,
  KEY `quiz_id` (`quiz_id`),
  KEY `staff_id` (`staff_id`),
  CONSTRAINT `staff_quiz_attempt_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`),
  CONSTRAINT `staff_quiz_attempt_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `student_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `student` (`student_id`, `name`, `email`, `password`) VALUES
(1,	'Student A',	'student@email.com',	'student');

-- 2020-12-11 22:47:51