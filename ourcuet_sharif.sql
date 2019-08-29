-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2019 at 05:38 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ourcuet_sharif`
--

-- --------------------------------------------------------

--
-- Table structure for table `groupmember`
--

CREATE TABLE `groupmember` (
  `GID` int(11) NOT NULL,
  `MemID` int(11) NOT NULL,
  `position` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groupmember`
--

INSERT INTO `groupmember` (`GID`, `MemID`, `position`) VALUES
(1, 1, 'Creator'),
(1, 2, 'Member'),
(2, 1, 'Member'),
(2, 9, 'Member'),
(3, 9, 'Creator'),
(3, 1, 'Member'),
(4, 2, 'Creator'),
(4, 9, 'Member'),
(4, 1, 'Member'),
(4, 10, 'Member'),
(1, 9, 'Member'),
(3, 8, 'Member'),
(3, 2, 'Member'),
(1, 11, 'Member'),
(4, 11, 'Member'),
(3, 10, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Category` varchar(30) NOT NULL,
  `Member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`ID`, `Name`, `Category`, `Member`) VALUES
(1, 'Operating Systems', 'CSE', 3),
(2, 'Interstellar', 'Sci-Fi', 3),
(3, 'Cryptography', 'CSE', 5),
(4, 'Web Security', 'CSE', 5);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `User_ID` int(20) NOT NULL,
  `Username` varchar(30) DEFAULT NULL,
  `Password` varchar(129) DEFAULT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`User_ID`, `Username`, `Password`, `email`) VALUES
(1, 'Labib', '3C9909AFEC25354D551DAE21590BB26E38D53F2173B8D3DC3EEE4C047E7AB1C1EB8B85103E3BE7BA613B31BB5C9C36214DC9F14A42FD7A2FDB84856BCA5C44C2', 'labib@gmail.com'),
(2, 'Sharif', '3043AA4A83B0934982956A90828140CB834869135B5F294938865DE12E036DE440A330E1E8529BEC15DDD59F18D1161A97BFEC110D2622680F2C714A737D7061', 'sharif@gmail.com'),
(8, 'test', 'EE26B0DD4AF7E749AA1A8EE3C10AE9923F618980772E473F8819A5D4940E0DB27AC185F8A0E1D5F84F88BC887FD67B143732C304CC5FA9AD8E6F57F50028A8FF', 'test@test.com'),
(9, 'Mr. Robot', 'FA585D89C851DD338A70DCF535AA2A92FEE7836DD6AFF1226583E88E0996293F16BC009C652826E0FC5C706695A03CDDCE372F139EFF4D13959DA6F1F5D3EABE', 'robot@robot.com'),
(10, 'Khayer', '3627909A29C31381A071EC27F7C9CA97726182AED29A7DDD2E54353322CFB30ABB9E3A6DF2AC2C20FE23436311D678564D0C8D305930575F60E2D3D048184D79', 'khayer@gmail.com'),
(11, 'ProHacker', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'prohacker@pro.com');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `question_user_id` int(11) NOT NULL,
  `question_group_id` varchar(20) NOT NULL,
  `question_text` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `question_user_id`, `question_group_id`, `question_text`) VALUES
(1, 1, '1', 'What is FIFO algorithm?'),
(2, 1, '2', 'What is inside the black hole?'),
(4, 9, '2', 'How accurate is the ring around the black hole as shown in Interstellar? '),
(8, 9, '3', 'Hi, what is cryptography? Give me some examples.'),
(9, 2, '4', 'What is SQL injection?'),
(10, 9, '1', 'What is deadlock?'),
(11, 11, '4', 'What is proxychain?'),
(12, 1, '3', 'What is the difference between hashing and encrypting?');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire`
--

CREATE TABLE `questionnaire` (
  `QID` int(11) NOT NULL,
  `subject` varchar(40) NOT NULL,
  `question` text NOT NULL,
  `op_1` varchar(200) NOT NULL,
  `val_1` int(11) NOT NULL,
  `op_2` varchar(200) NOT NULL,
  `val_2` int(11) NOT NULL,
  `op_3` varchar(200) NOT NULL,
  `val_3` int(11) NOT NULL,
  `op_4` varchar(200) NOT NULL,
  `val_4` int(11) NOT NULL,
  `correct` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionnaire`
--

INSERT INTO `questionnaire` (`QID`, `subject`, `question`, `op_1`, `val_1`, `op_2`, `val_2`, `op_3`, `val_3`, `op_4`, `val_4`, `correct`) VALUES
(1, 'math', 'What does 3+5 equal?', '3', 1, '23', 2, '8', 3, 'Unknown', 4, '8'),
(2, 'math', 'What is the value of 2 multiplied by 3?', '6', 1, '2', 2, '5', 3, 'None of the above', 4, '6'),
(3, 'math', 'What is the value of 0! ?', '0', 1, '1', 2, '10', 3, 'Undefined', 4, '1'),
(4, 'math', 'What is the value of PI?', '3.1415915465168568', 1, '3.1415926535897932', 2, '3.1415915465123852', 3, '3.1415915465169568', 4, '3.1415926535897932'),
(5, 'math', 'Which of the following is an equation of a straight line?', 'x^2 + y^2 = z^2', 1, 'y = ax^2 + bx + c', 2, 'x^2 - y^2 = c', 3, 'y = mx + c', 4, 'y = mx + c'),
(6, 'math', 'What is the value of x + x(x^x) when x = 2?', '36', 1, '18', 2, '10', 3, '16', 4, '10'),
(7, 'math', 'tan(90)=?', 'Undefined', 1, '0', 2, '1', 0, 'Indeterminate', 0, 'Undefined'),
(8, 'math', 'What is the value of x + x(x^x) when x = 2?', '36', 1, '18', 2, '10', 3, '16', 4, '10'),
(9, 'math', 'What is the differentiation of e^x?', 'e^x', 1, 'log(x)', 2, 'log(e^x)', 3, 'Not Possible', 4, 'e^x'),
(10, 'math', 'Which of the following equation is correct?', 'x^(mn) = x^m + x + c', 1, 'x^(mn) = x^(m + n)', 2, 'x^(mn) = x^m + x^n', 3, 'x^mn = x^m - x^n', 4, 'x^(mn) = x^m + x^n'),
(13, 'English', 'How many alphabets are there in English?', '26', 1, '16', 2, '59', 3, '11', 4, '26'),
(14, 'English', 'You must work according ____ the plan.', 'on', 1, 'to', 2, 'onto', 3, 'into', 4, 'to'),
(15, 'English', 'Which of the following is misspelled?', 'repository', 1, 'instanteneous', 2, 'punctuation', 3, 'eradicated', 4, 'instanteneous'),
(16, 'English', 'What is the past form of seek?', 'seeken', 1, 'sook', 2, 'seeked', 3, 'sought', 4, 'sought'),
(17, 'English', 'What is the passive form of - You had a cow. ?', 'A cow was had by me.', 1, 'You had been a cow.', 2, '-no passive form-', 3, 'A cow was had by you.', 4, '-no passive form-'),
(18, 'physics', 'What is the velocity of light?', '3x10^8 m/s', 1, '3x10^9 m/s', 2, '2x10^8 m/s', 3, '3.1416 m/s', 4, '3x10^8 m/s'),
(19, 'physics', 'What is the value of acceleration due to gravity at the center of the earth?', '9.8 m/s^2', 1, '10 m/s^2', 2, '0 m/s^2', 3, 'infinity', 4, '0 m/s^2'),
(20, 'physics', 'What is the SI unit of acceleration?', 'm/s', 1, 'kgm/s', 2, 'm/s^2', 3, 'kg/m^2', 4, 'm/s^2'),
(21, 'physics', 'Which of the following is an example of insulator?', 'Chromium', 1, 'Graphaite', 2, 'Iron', 3, 'Diamond', 4, 'Diamond'),
(22, 'physics', 'How many electrons constitutes a 1 coulomb charge?', '6x10^18', 1, '6x2^18', 2, '9.8x10^8', 3, '9.8x10^18', 4, '6x10^18'),
(23, 'physics', 'Which of the following element has an isotope named as Tritium?', 'Helium', 1, 'Hydrogen', 2, 'Carbon', 3, 'Titanium', 4, 'Hydrogen'),
(24, 'physics', 'What is the SI unit of radioactivity?', 'Candela', 1, 'Henry', 2, 'Becqerel', 3, 'Curie', 4, 'Becqerel'),
(25, 'physics', 'What is the orbital velocity of geo stationary satellite?', '4.15 km/s', 1, '2.78 km/s', 2, '3.08 km/s', 3, '6.66 km/s', 4, '3.08 km/s'),
(26, 'physics', 'What is the magnetic field at any point in the open space inside the toroid?', 'zero', 1, 'one', 2, 'Depends on the current in the turns', 3, 'Depends on the number of turns', 4, 'zero'),
(27, 'physics', 'What is the S.I. unit of magnetic dipole moment?', 'joule/metre', 1, 'tesla/metre', 2, 'Newton/metre', 3, 'joule/tesla', 4, 'joule/tesla');

-- --------------------------------------------------------

--
-- Table structure for table `question_1`
--

CREATE TABLE `question_1` (
  `AnsID` int(11) NOT NULL,
  `Answer` text NOT NULL,
  `AnswererID` int(11) NOT NULL,
  `upvotenum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_1`
--

INSERT INTO `question_1` (`AnsID`, `Answer`, `AnswererID`, `upvotenum`) VALUES
(1, 'FIFO means first in first out.', 1, 1),
(2, 'FIFO is implemented with queue.', 2, 3),
(3, 'FIFO is used in page replacement algorithm.', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `question_2`
--

CREATE TABLE `question_2` (
  `AnsID` int(11) NOT NULL,
  `Answer` text NOT NULL,
  `AnswererID` int(11) NOT NULL,
  `upvotenum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_2`
--

INSERT INTO `question_2` (`AnsID`, `Answer`, `AnswererID`, `upvotenum`) VALUES
(1, 'Although black holes themselves canâ€™t be seen, scientists knew they were there because of the way other objects such as stars act around them; these objects in the safe zone donâ€™t get pulled in but are still affected by its force. On the other hand, matter that goes past the point of no return, called the event horizon, canâ€™t escape the black holeâ€”picture it like going over a waterfall into an abyss.\r\n\r\nBut scientists are still trying to figure out what happens after the matter goes in; basically, what is inside a black hole. â€œOnce the hydrogen [from the collapsed star] went in, the theory of gravity tells us it got squeezed into a â€˜singularityâ€™ at the center, and nobody knows what itâ€™s really like thereâ€”although itâ€™s certainly not hydrogen anymore,â€ Monreal says. So the interior of a black hole probably doesnâ€™t look like youâ€™d think it would from the movies. â€œBetween the event horizon and the singularity thereâ€™s nothing but empty space, subjected to tremendously strong gravitational fields,â€ Monreal says.\r\n\r\nWhat happens to the stuff that goes into the black hole is still up for debate. The phrase â€œblack holes have no hairâ€ describes the theory that the information thrown into black holes basically disappears to outside observers and canâ€™t be measured. Famous physicist Stephen Hawking threw a wrench into this, suggesting that some mass could actually â€œleakâ€ back out or be released by the black hole as it slowly diesâ€”which may actually contradict the prevailing theory of gravity. Hawking was working on this idea up until his death last March, with his final paper on the topic published by his colleagues in December 2018.', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `question_4`
--

CREATE TABLE `question_4` (
  `AnsID` int(11) NOT NULL,
  `Answer` text NOT NULL,
  `AnswererID` int(11) NOT NULL,
  `upvotenum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_4`
--

INSERT INTO `question_4` (`AnsID`, `Answer`, `AnswererID`, `upvotenum`) VALUES
(1, 'It\'s actually quite accurate. Usually when creating a 3D model for a movie, the first step is creating a concept art. But in this case, a mathematician was hired to do all the calculations for the black hole which was then fed to a render engine to run a simulation. What we see in the movies is some adjustment from what they found from the result.\r\nThey also got two research papers out of this.', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `question_8`
--

CREATE TABLE `question_8` (
  `AnsID` int(11) NOT NULL,
  `Answer` text NOT NULL,
  `AnswererID` int(11) NOT NULL,
  `upvotenum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_8`
--

INSERT INTO `question_8` (`AnsID`, `Answer`, `AnswererID`, `upvotenum`) VALUES
(1, 'Cryptography is associated with the process of converting ordinary plain text into unintelligible text and vice-versa. It is a method of storing and transmitting data in a particular form so that only those for whom it is intended can read and process it. Cryptography not only protects data from theft or alteration, but can also be used for user authentication.', 8, 2),
(2, '\r\nCryptography or cryptology (from Ancient Greek: ÎºÏÏ…Ï€Ï„ÏŒÏ‚, romanized: kryptÃ³s \"hidden, secret\"; and Î³ÏÎ¬Ï†ÎµÎ¹Î½ graphein, \"to write\", or -Î»Î¿Î³Î¯Î± -logia, \"study\", respectively) is the practice and study of techniques for secure communication in the presence of third parties called adversaries. More generally, cryptography is about constructing and analyzing protocols that prevent third parties or the public from reading private messages; various aspects in information security such as data confidentiality, data integrity, authentication, and non-repudiation are central to modern cryptography. Modern cryptography exists at the intersection of the disciplines of mathematics, computer science, electrical engineering, communication science, and physics. Applications of cryptography include electronic commerce, chip-based payment cards, digital currencies, computer passwords, and military communications.', 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `question_9`
--

CREATE TABLE `question_9` (
  `AnsID` int(11) NOT NULL,
  `Answer` text NOT NULL,
  `AnswererID` int(11) NOT NULL,
  `upvotenum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_9`
--

INSERT INTO `question_9` (`AnsID`, `Answer`, `AnswererID`, `upvotenum`) VALUES
(1, 'SQL Injection (SQLi) is a type of an injection attack that makes it possible to execute malicious SQL statements. These statements control a database server behind a web application. Attackers can use SQL Injection vulnerabilities to bypass application security measures. They can go around authentication and authorization of a web page or web application and retrieve the content of the entire SQL database. They can also use SQL Injection to add, modify, and delete records in the database.', 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `question_10`
--

CREATE TABLE `question_10` (
  `AnsID` int(11) NOT NULL,
  `Answer` text NOT NULL,
  `AnswererID` int(11) NOT NULL,
  `upvotenum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_10`
--

INSERT INTO `question_10` (`AnsID`, `Answer`, `AnswererID`, `upvotenum`) VALUES
(1, 'A deadlock is a situation in which two computer programs sharing the same resource are effectively preventing each other from accessing the resource, resulting in both programs ceasing to function.', 2, 0),
(2, 'According to Wikipedia, in concurrent computing, a deadlock is a state in which each member of a group is waiting for another member, including itself, to take action, such as sending a message or more commonly releasing a lock. Deadlock is a common problem in multiprocessing systems, parallel computing, and distributed systems, where software and hardware locks are used to arbitrate shared resources and implement process synchronization.\r\n', 11, 0);

-- --------------------------------------------------------

--
-- Table structure for table `question_11`
--

CREATE TABLE `question_11` (
  `AnsID` int(11) NOT NULL,
  `Answer` text NOT NULL,
  `AnswererID` int(11) NOT NULL,
  `upvotenum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_11`
--

INSERT INTO `question_11` (`AnsID`, `Answer`, `AnswererID`, `upvotenum`) VALUES
(1, 'Go to this site to know more. <a href=\"https://linuxhint.com/proxychains-tutorial/\">click here</a>', 11, 1),
(2, 'In computer networks, a proxy server is a server (a computer system or an application) that acts as an intermediary for requests from clients seeking resources from other servers.', 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `question_12`
--

CREATE TABLE `question_12` (
  `AnsID` int(11) NOT NULL,
  `Answer` text NOT NULL,
  `AnswererID` int(11) NOT NULL,
  `upvotenum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_12`
--

INSERT INTO `question_12` (`AnsID`, `Answer`, `AnswererID`, `upvotenum`) VALUES
(1, '\r\nA hash is a string or number generated from a string of text. The resulting string or number is a fixed length, and will vary widely with small variations in input. The best hashing algorithms are designed so that it\'s impossible to turn a hash back into its original string.\r\nEncryption turns data into a series of unreadable characters, that aren\'t of a fixed length. The key difference between encryption and hashing is that encrypted strings can be reversed back into their original decrypted form if you have the right key.', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `testno` int(11) NOT NULL,
  `baal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`testno`, `baal`) VALUES
(1, 'labib ahmed\' aabab \'   \'\'   sharif sharif\''),
(2, 'labib ahmed\' aabab \'   \'\'   sharif sharif\'');

-- --------------------------------------------------------

--
-- Table structure for table `upvotestatus`
--

CREATE TABLE `upvotestatus` (
  `QueID` int(11) NOT NULL,
  `AnsID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `upstat` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upvotestatus`
--

INSERT INTO `upvotestatus` (`QueID`, `AnsID`, `UserID`, `upstat`) VALUES
(1, 1, 2, 'Upvoted'),
(1, 2, 1, 'Upvoted'),
(1, 3, 1, 'Upvoted'),
(1, 2, 9, 'Upvoted'),
(1, 3, 9, 'Upvoted'),
(1, 2, 2, 'Upvoted'),
(1, 3, 2, 'Upvoted'),
(3, 1, 9, 'Upvoted'),
(4, 1, 9, 'Upvoted'),
(9, 1, 9, 'Upvoted'),
(2, 1, 1, 'Upvoted'),
(8, 1, 2, 'Upvoted'),
(8, 1, 9, 'Upvoted'),
(11, 1, 9, 'Upvoted'),
(9, 1, 10, 'Upvoted');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`QID`);

--
-- Indexes for table `question_1`
--
ALTER TABLE `question_1`
  ADD PRIMARY KEY (`AnsID`);

--
-- Indexes for table `question_2`
--
ALTER TABLE `question_2`
  ADD PRIMARY KEY (`AnsID`);

--
-- Indexes for table `question_4`
--
ALTER TABLE `question_4`
  ADD PRIMARY KEY (`AnsID`);

--
-- Indexes for table `question_8`
--
ALTER TABLE `question_8`
  ADD PRIMARY KEY (`AnsID`);

--
-- Indexes for table `question_9`
--
ALTER TABLE `question_9`
  ADD PRIMARY KEY (`AnsID`);

--
-- Indexes for table `question_10`
--
ALTER TABLE `question_10`
  ADD PRIMARY KEY (`AnsID`);

--
-- Indexes for table `question_11`
--
ALTER TABLE `question_11`
  ADD PRIMARY KEY (`AnsID`);

--
-- Indexes for table `question_12`
--
ALTER TABLE `question_12`
  ADD PRIMARY KEY (`AnsID`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`testno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `User_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `QID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `question_1`
--
ALTER TABLE `question_1`
  MODIFY `AnsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `question_2`
--
ALTER TABLE `question_2`
  MODIFY `AnsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question_4`
--
ALTER TABLE `question_4`
  MODIFY `AnsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question_8`
--
ALTER TABLE `question_8`
  MODIFY `AnsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `question_9`
--
ALTER TABLE `question_9`
  MODIFY `AnsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question_10`
--
ALTER TABLE `question_10`
  MODIFY `AnsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `question_11`
--
ALTER TABLE `question_11`
  MODIFY `AnsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `question_12`
--
ALTER TABLE `question_12`
  MODIFY `AnsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `testno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
