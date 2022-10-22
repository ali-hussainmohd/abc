-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2022 at 09:52 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kon_gaythan_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_book`
--

CREATE TABLE `add_book` (
  `book_num` int(50) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `std_id` int(10) NOT NULL,
  `vol_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `add_comment`
--

CREATE TABLE `add_comment` (
  `com_num` int(10) NOT NULL,
  `com_script` text NOT NULL,
  `std_id` int(10) NOT NULL,
  `vol_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `add_request`
--

CREATE TABLE `add_request` (
  `req_num` int(10) NOT NULL,
  `req_type` text NOT NULL,
  `req_date` date NOT NULL,
  `req_name` varchar(50) NOT NULL,
  `std_id` int(10) NOT NULL,
  `vol_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(50) NOT NULL,
  `book_name` text NOT NULL,
  `book_description` text NOT NULL,
  `book_image` text NOT NULL,
  `book_price` int(11) NOT NULL,
  `vol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_name`, `book_description`, `book_image`, `book_price`, `vol_id`) VALUES
(1, 'SEO 2020 Learn search engine optimization with smart internet marketing strategies', 'The author knows what he is talking about and gives many handy tips. He could improve the book by tackling the problem that maybe SEO is never going to work for your kind of Website because Google\'s algorithm is determined to downgrade it, so you would do well to look in other directions. ', 'SEO 2020 Learn search engine optimization with smart internet marketing strategies.jpg', 50, 2020100),
(3, 'Domain Names For Dummies', 'Your guide through the domain name maze These days, every business or organization needs a Web presence. But how do you find and register a memorable Web address? In this easy-to-follow guide, a preeminent domain name services firm walks you through the ins and outs of the domain name game, from registering and trademarking a new name to buying or selling an existing site.\r\n', 'Domain Names For Dummies.jpg', 100, 2020100),
(7, 'Java Concurrency in Practice', 'I was fortunate indeed to have worked with a fantastic team on the design and implementation of the concurrency features added to the Java platform in Java 5.0 and Java 6. Now this same team provides the best explanation yet of these new features, and of concurrency in general. Concurrency is no longer a subject for advanced users only. Every Java developer should read this book.\"\r\n--Martin Buchholz', 'Java Concurrency in Practice.jpg', 62, 2020100);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `com_num` int(10) NOT NULL,
  `com_script` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `req_num` int(10) NOT NULL,
  `req_type` text NOT NULL,
  `req_date` date NOT NULL,
  `req_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role_table`
--

CREATE TABLE `role_table` (
  `role_id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_table`
--

INSERT INTO `role_table` (`role_id`, `role`) VALUES
(1, 'student'),
(2, 'voluntary');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `st_id` int(10) NOT NULL,
  `uni_id` int(11) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `college` varchar(50) NOT NULL,
  `major` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`st_id`, `uni_id`, `pass`, `college`, `major`, `email`) VALUES
(3, 2020100, 'e10adc3949ba59abbe56e057f20f883e', 'it', 'ce', 'marwa@gmail.com'),
(4, 2020200, 'e10adc3949ba59abbe56e057f20f883e', 'it', 'ce', 'marwa2@gmail.com'),
(5, 2020300, 'e10adc3949ba59abbe56e057f20f883e', 'it', 'ce', 'marwa3@gmail.com'),
(6, 2020400, 'e10adc3949ba59abbe56e057f20f883e', 'it', 'ce', 'marwa4@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `image_url` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `vol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `image_url`, `title`, `description`, `vol_id`) VALUES
(7, 'featured1.png', 'Fundamental of UX for Application design 1', 'The automated process all your website tasks. Discover tools and techniques to engage effectively with vulnerable children and young people.', 0),
(8, 'featured2.png', 'Fundamental of UX for Application design 2', 'The automated process all your website tasks. Discover tools and techniques to engage effectively with vulnerable children and young people.', 0),
(9, 'featured3.png', 'Fundamental of UX for Application design 3', 'The automated process all your website tasks. Discover tools and techniques to engage effectively with vulnerable children and young people.', 0),
(12, 'DNS For Dummies.jpg', 'Fundamental of UX for Application design 4', 'The automated process all your website tasks. Discover tools and techniques to engage effectively with vulnerable children and young people.', 0),
(13, 'how to win customer_.jpg', 'how to win customer ', 'Potential customers for your business are ready and waiting on social media but avoid the temptation to join every available platform and post the same information.\r\n\r\nSocial media can be time-consuming, so decide which platforms â€“ such as Facebook or Instagram â€“ are used by your customers and concentrate only on these.\r\n\r\nDirect sales messages can work, but you should spend time engaging your audience with interesting, educational or humorous content. You donâ€™t need big design budgets, either. Free services such as Canva and Unsplash can help you create professional-looking graphics.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(255) NOT NULL,
  `university_id` int(11) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `collage` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  `user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `university_id`, `user_email`, `user_password`, `collage`, `major`, `user_role`) VALUES
(1, NULL, 'marwa@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'it', 'cs', 1),
(2, NULL, 'moudhi@gmail.com', 'e35cf7b66449df565f93c607d5a81d09', 'it', 'cs', 2),
(3, NULL, 'an@gmail.com', 'c33367701511b4f6020ec61ded352059', 'it', 'cs', 1),
(4, NULL, 'sara2@gmail.com', '6c44e5cd17f0019c64b042e4a745412a', 'it', 'ce', 2),
(5, NULL, 'maryam@gmail.com', 'fb62579e990da4e2a8f15c3d1e123438', 'it', 'cs', 1),
(6, NULL, 'marwa-voluntary@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'it', 'cs', 2);

-- --------------------------------------------------------

--
-- Table structure for table `voulnteer`
--

CREATE TABLE `voulnteer` (
  `vol_id` int(10) NOT NULL,
  `uni_id` int(11) NOT NULL,
  `vol_name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `college` varchar(50) NOT NULL,
  `yearOFcollage` varchar(255) NOT NULL,
  `major` varchar(50) NOT NULL,
  `subject` text NOT NULL,
  `Timing` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voulnteer`
--

INSERT INTO `voulnteer` (`vol_id`, `uni_id`, `vol_name`, `pass`, `Email`, `college`, `yearOFcollage`, `major`, `subject`, `Timing`) VALUES
(1, 2020100, 'Marwa Moh\'d', 'e10adc3949ba59abbe56e057f20f883e', 'marwa@gmail.com', 'Information Technology', 'Sophomore', 'Computer Science', 'Java, math', '4pm to 6pm'),
(2, 2020200, 'reem Khalad', 'e10adc3949ba59abbe56e057f20f883e', 'reem@gmail.com', 'Information Technology', 'Junior', 'Computer Science', 'web design, PHP ', '12pm to 2pm'),
(3, 2020300, 'Shada waleed', 'e10adc3949ba59abbe56e057f20f883e', 'Shada@gmail.com', 'Information Technology', 'Junior', 'Computer Science', 'English', '1pm to 3pm'),
(4, 2020400, 'sara Ali', 'e10adc3949ba59abbe56e057f20f883e', 'sara@gmail.com', 'Information Technology', 'Senior', 'Computer Science', 'math algebra, calculus', '8am to 10am'),
(5, 2020121, 'Noora Ahmed', 'e10adc3949ba59abbe56e057f20f883e', 'Noora@gmail.com', 'Information Technology', 'Sophomore', 'Computer Science', 'Python, English', '10am to 12am'),
(6, 2021125, 'maryam sameer Ahmed', '14e1b600b1fd579f47433b88e8d85291', 'maryam_25@gmail.com', 'Information Technology', 'junior', 'Computer Science', 'Arabic , English ', '6pm to 8pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_book`
--
ALTER TABLE `add_book`
  ADD PRIMARY KEY (`book_num`),
  ADD KEY `std_id` (`std_id`,`vol_id`);

--
-- Indexes for table `add_comment`
--
ALTER TABLE `add_comment`
  ADD PRIMARY KEY (`com_num`),
  ADD KEY `std_id` (`std_id`,`vol_id`);

--
-- Indexes for table `add_request`
--
ALTER TABLE `add_request`
  ADD PRIMARY KEY (`req_num`),
  ADD KEY `std_id` (`std_id`),
  ADD KEY `vol_id` (`vol_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `voluntary_link` (`vol_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`com_num`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`req_num`);

--
-- Indexes for table `role_table`
--
ALTER TABLE `role_table`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role` (`role`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`st_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `uni_id` (`uni_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD KEY `link_role` (`user_role`);

--
-- Indexes for table `voulnteer`
--
ALTER TABLE `voulnteer`
  ADD PRIMARY KEY (`vol_id`),
  ADD UNIQUE KEY `uni_id` (`uni_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_book`
--
ALTER TABLE `add_book`
  MODIFY `book_num` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `add_comment`
--
ALTER TABLE `add_comment`
  MODIFY `com_num` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `add_request`
--
ALTER TABLE `add_request`
  MODIFY `req_num` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `com_num` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `req_num` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_table`
--
ALTER TABLE `role_table`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `st_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `voulnteer`
--
ALTER TABLE `voulnteer`
  MODIFY `vol_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `voluntary_link` FOREIGN KEY (`vol_id`) REFERENCES `voulnteer` (`uni_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `link_role` FOREIGN KEY (`user_role`) REFERENCES `role_table` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
