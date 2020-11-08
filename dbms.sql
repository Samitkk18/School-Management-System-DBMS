-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 08, 2020 at 10:43 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `assignment_id` int(11) NOT NULL,
  `a_title` varchar(256) NOT NULL,
  `a_description` varchar(256) NOT NULL,
  `a_course` int(11) NOT NULL,
  `a_year` int(11) NOT NULL,
  `a_subject` int(11) NOT NULL,
  `a_date_of_sub` varchar(256) NOT NULL,
  `added_by` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` varchar(256) NOT NULL COMMENT 'Active/Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assignment_id`, `a_title`, `a_description`, `a_course`, `a_year`, `a_subject`, `a_date_of_sub`, `added_by`, `added_on`, `Status`) VALUES
(1, 'DBMS Exp1', 'test1', 1, 3, 1, '2020-11-09', 1, '2020-11-05 19:41:49', 'Active'),
(2, 'DBMS Exp 2', 'test2', 1, 3, 1, '2020-11-09', 1, '2020-11-06 01:12:47', 'Active'),
(3, 'DBMS Exp 3', 'Check for bugs in mini-project', 1, 3, 1, '2020-11-09', 1, '2020-11-07 19:03:21', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_student`
--

CREATE TABLE `assignment_student` (
  `ass_student_id` int(11) NOT NULL,
  `ass_assignment_id` int(11) NOT NULL,
  `file` varchar(256) NOT NULL,
  `Status` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment_student`
--

INSERT INTO `assignment_student` (`ass_student_id`, `ass_assignment_id`, `file`, `Status`) VALUES
(1, 1, 'None', 'Pending'),
(2, 2, '60004180093_CG.pdf', 'Submitted'),
(3, 3, 'None', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `student_sapid` bigint(20) NOT NULL,
  `added_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `log_id`, `course_id`, `year`, `teacher_id`, `subject_id`, `student_sapid`, `added_on`) VALUES
(1, 1, 1, 3, 1, 1, 60004180001, '2020-11-05'),
(2, 1, 1, 3, 1, 1, 60004180002, '2020-11-05'),
(3, 1, 1, 3, 1, 1, 60004180003, '2020-11-05'),
(4, 2, 5, 1, 3, 7, 60004180004, '2020-11-05'),
(5, 2, 5, 1, 3, 7, 60004180005, '2020-11-05'),
(6, 3, 1, 3, 2, 2, 60004180001, '2020-11-05'),
(7, 3, 1, 3, 2, 2, 60004180002, '2020-11-05'),
(8, 3, 1, 3, 2, 2, 60004180003, '2020-11-05'),
(9, 4, 1, 3, 2, 4, 60004180001, '2020-11-05'),
(10, 4, 1, 3, 2, 4, 60004180002, '2020-11-05'),
(11, 4, 1, 3, 2, 4, 60004180003, '2020-11-05'),
(12, 5, 5, 1, 1, 7, 60004180004, '2020-11-05'),
(13, 5, 5, 1, 1, 7, 60004180005, '2020-11-05'),
(18, 7, 1, 3, 2, 4, 60004180001, '2020-11-07'),
(19, 7, 1, 3, 2, 4, 60004180002, '2020-11-07'),
(20, 7, 1, 3, 2, 4, 60004180003, '2020-11-07'),
(21, 8, 1, 3, 6, 6, 60004180001, '2020-11-07'),
(22, 8, 1, 3, 6, 6, 60004180002, '2020-11-07'),
(23, 8, 1, 3, 6, 6, 60004180003, '2020-11-07');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_logs`
--

CREATE TABLE `attendance_logs` (
  `l_log_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `log_added_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance_logs`
--

INSERT INTO `attendance_logs` (`l_log_id`, `course_id`, `year`, `teacher_id`, `subject_id`, `log_added_on`) VALUES
(1, 1, 3, 1, 1, '2020-11-03'),
(2, 5, 1, 3, 7, '2020-11-04'),
(3, 1, 3, 2, 2, '2020-11-06'),
(4, 1, 3, 2, 4, '2020-11-07'),
(5, 5, 1, 1, 7, '2020-11-08'),
(7, 1, 3, 2, 4, '2020-11-07'),
(8, 1, 3, 6, 6, '2020-11-07');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `event_id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`event_id`, `title`, `start_event`, `end_event`) VALUES
(5, 'test', '2020-11-07 07:00:00', '2020-11-07 10:30:00'),
(6, 'DBMS B1 B2 Practicals', '2020-11-09 08:00:00', '2020-11-09 10:00:00'),
(7, 'Study for GRE', '2020-11-10 08:00:00', '2020-11-10 13:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(256) NOT NULL,
  `Status` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `Status`) VALUES
(1, 'Computer Engineering', 'Active'),
(2, 'Information Technology Engineering', 'Active'),
(3, 'Electronics and Tele-Communication Engineering', 'Active'),
(4, 'Electrical Engineering', 'Active'),
(5, 'Mechanical Engineering', 'Active'),
(6, 'Chemical Engineering', 'Active'),
(8, 'Biomedical Engineering', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `book_id` int(11) NOT NULL,
  `isbn_number` bigint(20) NOT NULL,
  `book_title` varchar(256) NOT NULL,
  `book_author` varchar(256) NOT NULL,
  `book_category` varchar(256) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `book_status` varchar(256) NOT NULL,
  `book_lent_to` varchar(256) NOT NULL,
  `book_lent_by` varchar(256) NOT NULL,
  `book_lent_on` date NOT NULL,
  `book_return_on` date NOT NULL,
  `added_by` tinyint(4) NOT NULL,
  `book_added_on` date NOT NULL,
  `book_availability` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`book_id`, `isbn_number`, `book_title`, `book_author`, `book_category`, `description`, `book_status`, `book_lent_to`, `book_lent_by`, `book_lent_on`, `book_return_on`, `added_by`, `book_added_on`, `book_availability`) VALUES
(1, 9781982134488, 'Think like a monk: train your mind for peace and purpose every day', 'Jay Shetty', 'Self-Development', 'The Sunday Times Number One Bestseller Jay Shetty, social media superstar and host of the #1 podcast ‘On Purpose’, distils the timeless wisdom he learned as a practising monk into practical steps anyone can take every day to live a less anxious, more meaningful life', 'Available', 'None', 'None', '0000-00-00', '0000-00-00', 1, '2020-11-03', 'Active'),
(4, 9780062641540, 'The Subtle Art Of Not Giving A F*ck', 'Mark Manson', 'Self-Development', 'A Counterintuitive Approach To Living A Good Life, former dating coach Mark Manson offers advice that\'s both punchy and profane. The book is a good guide to figuring out what you want in life and at work, and how to achieve it.', 'Available', 'None', 'None', '0000-00-00', '0000-00-00', 1, '2020-11-03', 'Active'),
(5, 9781982134489, 'Ferrai-Beast of Beasts', 'Samit Kapadia', 'Formula 1', 'Ferrari the greatest of all time', 'Available', 'None', 'None', '0000-00-00', '0000-00-00', 1, '2020-11-07', 'Active');

--
-- Triggers `library`
--
DELIMITER $$
CREATE TRIGGER `DeleteLog` BEFORE DELETE ON `library` FOR EACH ROW INSERT INTO logs VALUES(null, OLD.book_id, 'Deleted', NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `InsertLog` AFTER INSERT ON `library` FOR EACH ROW INSERT INTO logs VALUES(null, NEW.book_id, 'Inserted', NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `UpdateLog` AFTER UPDATE ON `library` FOR EACH ROW INSERT INTO logs VALUES(null, NEW.book_id, 'Updated', NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `action` varchar(256) NOT NULL,
  `cdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `book_id`, `action`, `cdate`) VALUES
(1, 6, 'Inserted', '2020-11-08 09:30:09'),
(2, 6, 'Updated', '2020-11-08 09:32:51'),
(3, 6, 'Deleted', '2020-11-08 09:36:06');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `parent_id` int(11) NOT NULL,
  `parent_sapid` bigint(20) NOT NULL,
  `p_f_name` varchar(256) NOT NULL,
  `p_l_name` varchar(256) NOT NULL,
  `p_occupation` varchar(256) NOT NULL,
  `p_email` varchar(256) NOT NULL,
  `p_mobile` text NOT NULL,
  `p_work` varchar(256) NOT NULL,
  `p_student_name` varchar(256) NOT NULL,
  `p_student_id` bigint(20) NOT NULL,
  `p_dob` date NOT NULL,
  `gender` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `city` varchar(256) NOT NULL,
  `pincode` int(11) NOT NULL,
  `state` varchar(256) NOT NULL,
  `country` varchar(256) NOT NULL,
  `added_by` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` varchar(256) NOT NULL COMMENT 'Active/Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`parent_id`, `parent_sapid`, `p_f_name`, `p_l_name`, `p_occupation`, `p_email`, `p_mobile`, `p_work`, `p_student_name`, `p_student_id`, `p_dob`, `gender`, `address`, `city`, `pincode`, `state`, `country`, `added_by`, `added_on`, `Status`) VALUES
(1, 70004180001, 'Avni', 'Kapadia', 'Housewife', 'avni@gmail.com', '9876543210', '2345678901', 'Samit Kapadia', 60004180001, '2000-09-20', 'Female', 'Gamdevi', 'Mumbai', 400007, 'Maharashtra', 'India', 1, '2020-11-03 12:12:04', 'Active'),
(3, 70004180002, 'Ketan', 'Kapadia', 'Senior Merchant', 'ketan@gmail.com', '09820752404', '2345678901', 'Samit Kapadia', 60004180001, '2020-04-04', 'Female', 'Gamdevi', 'Mumbai', 400007, 'Maharashtra', 'India', 1, '2020-11-03 12:10:43', 'Active'),
(4, 70004180003, 'Lewis', 'Hamilton', 'F1 Driver', 'lewis.mercedes@gmail.com', '44987654321', '4412345678', 'Charles Leclerc', 60004180003, '2020-11-04', 'Female', 'Gamdevi', 'Mumbai', 400007, 'Maharashtra', 'India', 1, '2020-11-04 18:34:28', 'Active'),
(5, 70004180004, 'Test', 'Parent', 'Housewife', 'samit.kapadia@nwdco.com', '09820752404', '2345678901', 'Samit Kapadia', 60004180001, '2020-12-31', 'Female', 'Gamdevi', 'Mumbai', 400007, 'Maharashtra', 'India', 1, '2020-11-07 19:00:44', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `idRoles` int(11) NOT NULL,
  `role_name` varchar(256) NOT NULL,
  `role_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`idRoles`, `role_name`, `role_status`) VALUES
(1, 'Developer', 0),
(2, 'Admin', 1),
(3, 'Teacher', 2),
(4, 'Student', 3),
(5, 'Parent', 4),
(6, 'Librarian', 5);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `student_sapid` bigint(20) NOT NULL,
  `s_f_name` varchar(256) NOT NULL,
  `s_l_name` varchar(256) NOT NULL,
  `s_email` varchar(256) NOT NULL,
  `s_mobile` text NOT NULL,
  `s_emergency` varchar(256) NOT NULL,
  `s_emergency_mobile` text NOT NULL,
  `s_dob` date NOT NULL,
  `gender` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `city` varchar(256) NOT NULL,
  `pincode` int(11) NOT NULL,
  `state` varchar(256) NOT NULL,
  `country` varchar(256) NOT NULL,
  `allergy` varchar(256) NOT NULL,
  `bloodgroup` varchar(256) NOT NULL,
  `p_medicines` varchar(256) NOT NULL,
  `prev_school` varchar(256) NOT NULL,
  `course` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `s_mother_name` varchar(256) NOT NULL,
  `s_father_name` varchar(256) NOT NULL,
  `s_mother_email` varchar(256) NOT NULL,
  `s_father_email` varchar(256) NOT NULL,
  `s_mother_mobile` text NOT NULL,
  `s_father_mobile` text NOT NULL,
  `s_mother_occupation` varchar(256) NOT NULL,
  `s_father_occupation` varchar(256) NOT NULL,
  `added_by` int(11) NOT NULL COMMENT 'User role_status',
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` varchar(256) NOT NULL COMMENT 'Active/Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_sapid`, `s_f_name`, `s_l_name`, `s_email`, `s_mobile`, `s_emergency`, `s_emergency_mobile`, `s_dob`, `gender`, `address`, `city`, `pincode`, `state`, `country`, `allergy`, `bloodgroup`, `p_medicines`, `prev_school`, `course`, `year`, `s_mother_name`, `s_father_name`, `s_mother_email`, `s_father_email`, `s_mother_mobile`, `s_father_mobile`, `s_mother_occupation`, `s_father_occupation`, `added_by`, `added_on`, `Status`) VALUES
(1, 60004180001, 'Samit', 'Kapadia', 'samit.kapadia@nwdco.com', '09820752404', 'Avni Kapadia', '9876543210', '1999-11-18', 'Female', 'Gamdevi', 'Mumbai', 400007, 'Maharashtra', 'India', 'Dust', 'A+ve', 'None', 'None', 1, 3, 'Avni Kapadia', 'Ketan Kapadia', 'samit.kapadia@nwdco.com', 'samit.kapadia@nwdco.com', '09820752404', '09820752404', 'House Wife', 'Senior Merchant', 1, '2020-11-04 17:20:40', 'Active'),
(2, 60004180002, 'Aashna', 'Kapadia', 'samit.kapadia@nwdco.com', '09820752404', 'Avni Kapadia', '9876543210', '1994-01-03', 'Male', 'Gamdevi', 'Mumbai', 400007, 'Maharashtra', 'India', 'None', 'A+ve', 'None', 'None', 1, 3, 'Avni Kapadia', 'Ketan Kapadia', 'samit.kapadia@nwdco.com', 'samit.kapadia@nwdco.com', '09820752404', '09820752404', 'House Wife', 'Senior Merchant', 1, '2020-11-04 17:20:43', 'Active'),
(3, 60004180003, 'Charles', 'Leclerc', 'samit.kapadia@nwdco.com', '09820752404', 'Avni Kapadia', '9876543210', '2020-04-04', 'Male', 'Gamdevi', 'Mumbai', 400007, 'Maharashtra', 'India', 'Dust', 'A+ve', 'None', 'None', 1, 3, 'Avni Kapadia', 'Ketan Kapadia', 'samit.kapadia@nwdco.com', 'samit.kapadia@nwdco.com', '09820752404', '09820752404', 'House Wife', 'Senior Merchant', 1, '2020-11-04 17:20:48', 'Active'),
(4, 60004180004, 'Daniel', 'Ricciardo', 'samit.kapadia@nwdco.com', '09820752404', 'Avni Kapadia', '9876543210', '2020-04-04', 'Male', 'Gamdevi', 'Mumbai', 400007, 'Maharashtra', 'India', 'Dust', 'A+ve', 'None', 'None', 5, 1, 'Avni Kapadia', 'Ketan Kapadia', 'samit.kapadia@nwdco.com', 'samit.kapadia@nwdco.com', '09820752404', '09820752404', 'House Wife', 'Senior Merchant', 1, '2020-11-04 18:33:46', 'Active'),
(5, 60004180005, 'Lando', 'Norris', 'samit.mclaren@gmail.com', '1234567898', 'Carlos', '5598765432', '1999-11-13', 'Male', 'Gamdevi', 'Mumbai', 400007, 'Maharashtra', 'India', 'Dust', 'O+ve', 'None', 'None', 5, 1, 'Avni Kapadia', 'Ketan Kapadia', 'samit.kapadia@nwdco.com', 'samit.kapadia@nwdco.com', '09820752404', '09820752404', 'House Wife', 'Senior Merchant', 1, '2020-11-04 18:33:54', 'Active'),
(6, 60004180006, 'Test', 'Student', 'samit.kapadia@nwdco.com', '09820752404', 'Avni Kapadia', '9876543210', '2020-12-31', 'Male', 'Gamdevi', 'Mumbai', 400007, 'Maharashtra', 'India', 'Dust', 'A+ve', 'None', 'None', 1, 2, 'Avni Kapadia', 'Ketan Kapadia', 'samit.kapadia@nwdco.com', 'samit.kapadia@nwdco.com', '09820752404', '09820752404', 'House Wife', 'Senior Merchant', 1, '2020-11-07 18:55:17', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(256) NOT NULL,
  `subject_code` varchar(256) NOT NULL,
  `course_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `Status` varchar(256) DEFAULT NULL COMMENT 'Active/Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`, `subject_code`, `course_id`, `year`, `Status`) VALUES
(1, 'Database Management System', 'CS501', 1, 3, 'Active'),
(2, 'Advance Algorithms', 'CS502', 1, 3, 'Active'),
(3, 'Web Technology', 'CS503', 1, 3, 'Active'),
(4, 'Microprocessors', 'CS504', 1, 3, 'Active'),
(5, 'Theory of Computer Science', 'CS505', 1, 3, 'Active'),
(6, 'Computer Networks', 'CS506', 1, 3, 'Active'),
(7, 'AutoCAD', 'M201', 5, 1, 'Active'),
(8, 'Test Subject', 'CS401', 1, 2, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `idUsers` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `priority` varchar(256) NOT NULL,
  `Status` varchar(256) NOT NULL COMMENT 'Active/Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `idUsers`, `title`, `priority`, `Status`) VALUES
(1, 1, 'Write Code for Todo List', 'High', 'Inactive'),
(2, 1, 'Write Code for Calendar Integration', 'Medium', 'Active'),
(3, 1, 'Give students more assignments', 'Urgent', 'Active'),
(4, 1, 'Think like a monk: train your mind for peace and purpose every day', 'Medium', 'Active'),
(5, 1, 'Ferrai-Beast of Beasts', 'Urgent', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `teacher_sapid` bigint(20) NOT NULL,
  `t_f_name` varchar(256) NOT NULL,
  `t_l_name` varchar(256) NOT NULL,
  `t_email` varchar(256) NOT NULL,
  `t_mobile` text NOT NULL,
  `t_emergency` varchar(256) NOT NULL,
  `t_emergency_mobile` text NOT NULL,
  `salary` varchar(256) NOT NULL,
  `department` int(11) NOT NULL,
  `t_dob` date NOT NULL,
  `gender` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `city` varchar(256) NOT NULL,
  `pincode` int(11) NOT NULL,
  `state` varchar(256) NOT NULL,
  `country` varchar(256) NOT NULL,
  `allergy` varchar(256) NOT NULL,
  `bloodgroup` varchar(256) NOT NULL,
  `p_medicines` varchar(256) NOT NULL,
  `prev_job` varchar(256) NOT NULL,
  `added_by` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` varchar(256) NOT NULL COMMENT 'Active/Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `teacher_sapid`, `t_f_name`, `t_l_name`, `t_email`, `t_mobile`, `t_emergency`, `t_emergency_mobile`, `salary`, `department`, `t_dob`, `gender`, `address`, `city`, `pincode`, `state`, `country`, `allergy`, `bloodgroup`, `p_medicines`, `prev_job`, `added_by`, `added_on`, `Status`) VALUES
(1, 50004180001, 'Toto', 'Wolf', 'samit.mercedes@gmail.com', '09820752404', 'James', '9876543210', '3000000 p.a', 1, '2000-11-11', 'Male', 'Gamdevi', 'Mumbai', 400007, 'Maharashtra', 'India', 'None', 'B+ve', 'None', 'None', 1, '2020-11-04 18:27:16', 'Active'),
(2, 50004180002, 'Mattia', 'Binotto', 'sbinalla.ferrari@gmail.com', '09820752404', 'Seboostian Vettel', '9876543210', '3000000 p.a', 5, '2020-04-04', 'Female', 'Gamdevi', 'Mumbai', 400007, 'Maharashtra', 'India', 'None', 'O+ve', 'None', 'Red Bull', 1, '2020-11-04 18:28:13', 'Active'),
(3, 50004180003, 'Christian', 'Horner', 'samit.redbull@gmail.com', '9876543210', 'Max', '3398765432', '4000000 p.a', 4, '1997-09-30', 'Male', 'Gamdevi', 'Mumbai', 400007, 'Maharashtra', 'India', 'Dust', 'A+ve', 'None', 'Toro Rosso', 1, '2020-11-04 18:29:50', 'Active'),
(6, 50004180004, 'Test', 'Teacher', 'samit.kapadia@nwdco.com', '09820752404', 'Avni Kapadia', '9876543210', '3000000 p.a', 5, '2020-11-03', 'Female', 'Gamdevi', 'Mumbai', 400007, 'Maharashtra', 'India', 'Dust', 'A+ve', 'None', 'None', 1, '2020-11-07 19:00:24', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `todolist`
--

CREATE TABLE `todolist` (
  `todo_id` int(11) NOT NULL,
  `idUsers` int(11) NOT NULL,
  `content` varchar(256) NOT NULL,
  `Status` varchar(256) NOT NULL COMMENT 'Active/Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `todolist`
--

INSERT INTO `todolist` (`todo_id`, `idUsers`, `content`, `Status`) VALUES
(1, 1, 'First', 'Active'),
(2, 1, 'Second', 'Active'),
(3, 1, 'Third', 'Inactive'),
(4, 1, 'Third', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `uidUsers` varchar(20) NOT NULL,
  `emailUsers` varchar(256) NOT NULL,
  `pwdUsers` varchar(256) NOT NULL,
  `role_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `uidUsers`, `emailUsers`, `pwdUsers`, `role_status`) VALUES
(1, 'Samitkk18', 'samitkk18@gmail.com', '$2y$10$YxngSKAF5dqcULXf2IzP2.tjaBXlJJglP8.y7Xm/V97c7X3NzrlW2', 0),
(2, 'admin', 'samitkk18@gmail.com', '$2y$10$C/pqb1QgzE5Ekrsg0dpUYu/6E5jWr41Wp2AtnXg3VM4PwzrYEnq1i', 1),
(3, 'teacher', 'samitkk18@gmail.com', '$2y$10$dh0Y9fnZxECVMNUvob8Sp.F3RmYKGPW3UrJM5YmHKY0TGbrLeOXXK', 2),
(4, 'student', 'samitkk18@gmail.com', '$2y$10$FmDn3zljji5CnXoPsXFFO.qVTXXjbiPwamaaAbpK4Lb/7vPEiZeGK', 3),
(5, 'parent', 'samitkk18@gmail.com', '$2y$10$W.J.0KWYJnOcDIDt0juJL.nQU7/y6ph1SUfe59GZ2VO3FnbfimpIG', 4),
(6, '60004180001', 'samit.kapadia@nwdco.com', '$2y$10$FmDn3zljji5CnXoPsXFFO.qVTXXjbiPwamaaAbpK4Lb/7vPEiZeGK', 3),
(7, '60004180002', 'samit.kapadia@nwdco.com', '$2y$10$FmDn3zljji5CnXoPsXFFO.qVTXXjbiPwamaaAbpK4Lb/7vPEiZeGK', 3),
(8, '60004180003', 'samit.kapadia@nwdco.com', '$2y$10.qVTXXjbiPwamaaAbpK4Lb/7vPEiZeGK', 3),
(9, '60004180004', 'samit.kapadia@nwdco.com', '$2y$10.qVTXXjbiPwamaaAbpK4Lb/7vPEiZeGK', 3),
(12, '50004180001', 'samit.mercedes@gmail.com', '$2y$10$dh0Y9fnZxECVMNUvob8Sp.F3RmYKGPW3UrJM5YmHKY0TGbrLeOXXK', 2),
(16, '50004180002', 'samit.ferrari@gmail.com', '$2y$10$dh0Y9fnZxECVMNUvob8Sp.F3RmYKGPW3UrJM5YmHKY0TGbrLeOXXK', 2),
(19, '70004180001', 'avni@gmail.com', '$2y$10$W.J.0KWYJnOcDIDt0juJL.nQU7/y6ph1SUfe59GZ2VO3FnbfimpIG', 4),
(21, '70004180002', 'ketan@gmail.com', '$2y$10$W.J.0KWYJnOcDIDt0juJL.nQU7/y6ph1SUfe59GZ2VO3FnbfimpIG', 4),
(22, 'Librarian', 'samitkk18@gmail.com', '$2y$10$1gLhkYF/USgCGgWBgdATWuaix7QmCC6iT4Iid3e9LSjMoRo6WH/1W', 5),
(23, '60004180005', 'samit.mclaren@gmail.com', '$2y$10$FmDn3zljji5CnXoPsXFFO.qVTXXjbiPwamaaAbpK4Lb/7vPEiZeGK', 3),
(24, '50004180003', 'samit.redbull@gmail.com', '$2y$10$dh0Y9fnZxECVMNUvob8Sp.F3RmYKGPW3UrJM5YmHKY0TGbrLeOXXK', 2),
(25, '70004180003', 'lewis.mercedes@gmail.com', '$2y$10$W.J.0KWYJnOcDIDt0juJL.nQU7/y6ph1SUfe59GZ2VO3FnbfimpIG', 4),
(26, '60004180006', 'samit.kapadia@nwdco.com', '$2y$10$FmDn3zljji5CnXoPsXFFO.qVTXXjbiPwamaaAbpK4Lb/7vPEiZeGK', 3),
(30, '50004180004', 'samit.kapadia@nwdco.com', '$2y$10$dh0Y9fnZxECVMNUvob8Sp.F3RmYKGPW3UrJM5YmHKY0TGbrLeOXXK', 2),
(31, '70004180004', 'samit.kapadia@nwdco.com', '$2y$10$W.J.0KWYJnOcDIDt0juJL.nQU7/y6ph1SUfe59GZ2VO3FnbfimpIG', 4);

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `year_id` int(11) NOT NULL,
  `year_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`year_id`, `year_name`) VALUES
(1, 'FE'),
(2, 'SE'),
(3, 'TE'),
(4, 'BE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `a_course` (`a_course`),
  ADD KEY `a_year` (`a_year`),
  ADD KEY `added_by` (`added_by`),
  ADD KEY `a_subject` (`a_subject`);

--
-- Indexes for table `assignment_student`
--
ALTER TABLE `assignment_student`
  ADD PRIMARY KEY (`ass_student_id`),
  ADD KEY `assignment_id` (`ass_assignment_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `log_id` (`log_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `year` (`year`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `attendance_logs`
--
ALTER TABLE `attendance_logs`
  ADD PRIMARY KEY (`l_log_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `year` (`year`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`parent_id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRoles`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `course` (`course`),
  ADD KEY `year` (`year`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `course_name` (`course_id`),
  ADD KEY `year` (`year`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `idUsers` (`idUsers`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `department` (`department`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `todolist`
--
ALTER TABLE `todolist`
  ADD PRIMARY KEY (`todo_id`),
  ADD KEY `idUsers` (`idUsers`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`year_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assignment_student`
--
ALTER TABLE `assignment_student`
  MODIFY `ass_student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `attendance_logs`
--
ALTER TABLE `attendance_logs`
  MODIFY `l_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `idRoles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `todolist`
--
ALTER TABLE `todolist`
  MODIFY `todo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `ass_added_by` FOREIGN KEY (`added_by`) REFERENCES `users` (`idUsers`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ass_course` FOREIGN KEY (`a_course`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ass_subject` FOREIGN KEY (`a_subject`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ass_year` FOREIGN KEY (`a_year`) REFERENCES `years` (`year_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `att_course` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `att_logs` FOREIGN KEY (`log_id`) REFERENCES `attendance_logs` (`l_log_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `att_subject` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `att_teacher` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `att_year` FOREIGN KEY (`year`) REFERENCES `years` (`year_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attendance_logs`
--
ALTER TABLE `attendance_logs`
  ADD CONSTRAINT `log_course` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `log_subject` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `log_teacher` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `log_year` FOREIGN KEY (`year`) REFERENCES `years` (`year_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parents`
--
ALTER TABLE `parents`
  ADD CONSTRAINT `parent_user` FOREIGN KEY (`added_by`) REFERENCES `users` (`idUsers`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `student_course` FOREIGN KEY (`course`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_user` FOREIGN KEY (`added_by`) REFERENCES `users` (`idUsers`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_year` FOREIGN KEY (`year`) REFERENCES `years` (`year_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_course` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_year` FOREIGN KEY (`year`) REFERENCES `years` (`year_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `task_user` FOREIGN KEY (`idUsers`) REFERENCES `users` (`idUsers`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teacher_course` FOREIGN KEY (`department`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_user` FOREIGN KEY (`added_by`) REFERENCES `users` (`idUsers`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `todolist`
--
ALTER TABLE `todolist`
  ADD CONSTRAINT `todo_user` FOREIGN KEY (`idUsers`) REFERENCES `users` (`idUsers`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
