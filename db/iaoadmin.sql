-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2019 at 10:50 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iaoadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `sign_up_date` datetime NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `folder` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `firstname`, `lastname`, `email`, `phone`, `password`, `hash`, `ip_address`, `sign_up_date`, `profile_pic`, `folder`, `active`) VALUES
(1, 'crosby', 'caleb', 'crosby adainoo', 'calcronoo@gmail.com', '+233571357788', '$2y$10$zGFdBVXfWjd2LeiMUF68H.ZLmp2CP0bgsd4WRo/A6abxaZKaivwoO', 'eda80a3d5b344bc40f3bc04f65b7a357', '::1', '2018-06-25 15:18:08', '', '', 0),
(2, 'Gyedu Francis', 'Francis', 'Gyedu', 'gyedukynes816@gmail.com', '0206712827/ 05514004', '$2y$10$iwyLZj1XLSsXaC3F.1.NPeSOgj.6MbkPO1PubPfhh35hZhaQkeIMG', 'b1eec33c726a60554bc78518d5f9b32c', '192.168.43.107', '2018-07-04 15:23:08', '', '', 0),
(7, 'korg', 'Kanyo', 'ICGC', 'kanyo@gmail.com', '0571357788', '$2y$10$98lIvzSno56Xvi/gJ8dI.esZqJ8RWfNfKMXUy31V25QiLXheHs4mO', '07871915a8107172b3b5dc15a6574ad3', '::1', '2018-10-06 12:59:40', '', 'users/Kanyo', 0);

-- --------------------------------------------------------

--
-- Table structure for table `app_logs`
--

CREATE TABLE `app_logs` (
  `id` int(11) NOT NULL,
  `userfirstname` varchar(255) NOT NULL,
  `useraction` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `caldesc` text NOT NULL,
  `startdate` varchar(20) NOT NULL,
  `enddate` varchar(20) NOT NULL,
  `notifydate` varchar(255) NOT NULL,
  `calsch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `caldesc`, `startdate`, `enddate`, `notifydate`, `calsch`) VALUES
(50, 'Hello bro', '01/12/2019', '', '01/11/2019', 'Institutional Affiliation Office'),
(51, 'Mapped trip', '01/14/2019', '', '01/13/2019', 'Institutional Affiliation Office'),
(52, 'Craded', '01/12/2019', '', '01/11/2019', 'Institutional Affiliation Office');

-- --------------------------------------------------------

--
-- Table structure for table `filelist`
--

CREATE TABLE `filelist` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `fileshorthand` varchar(255) NOT NULL,
  `filerefno` varchar(255) NOT NULL,
  `fileno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filelist`
--

INSERT INTO `filelist` (`id`, `filename`, `fileshorthand`, `filerefno`, `fileno`) VALUES
(1, 'IAO General', 'General', 'UCC/IAO/GEN/30/Vol.25/', '30'),
(2, 'IAO Account', 'Account File', 'UCC/IAO/AC/29/Vol.25/', '29'),
(3, 'Special Advancement', 'Special Advance', 'UCC/IAO/SA/Vol.1/65/', '65'),
(4, 'Payment General', 'Payment', 'UCC/IAO/PG/Vol.4/44/', '44'),
(5, 'Training Workshop', 'Workshop File', 'UCC/IAO/TRW/74/Vol.1/', '74'),
(6, 'Payment Plan', 'Payment Plan', 'UCC/IAO/PP/67/Vol.1/', '67'),
(7, 'Imprest', 'Imprest File', 'UCC/IAO/IMP/Vol.1/66/', '66'),
(8, 'Graduations', 'Graduation File', 'UCC/IAO/GD/71/Vol.1/', '71'),
(9, 'Notice', 'Notice File', 'UCC/IAO/NOTICE/77/Vol.1/', '77'),
(10, 'Memo', 'Memo File', 'UCC/IAO/MEMO/80/Vol.1/', '80'),
(11, 'Budget', 'Budget File', 'UCC/IAO/BUDGET/81/Vol.1/', '81'),
(12, 'Non Admitted Students', 'Non Admitted Students', 'UCC/IAO/NAS/2/Vol.1/', '2'),
(13, 'Report on Monitoring', 'Monitoring File', 'UCC/IAO/MONITORING/64/Vol.1/', '64');

-- --------------------------------------------------------

--
-- Table structure for table `letters`
--

CREATE TABLE `letters` (
  `id` int(11) NOT NULL,
  `scanned_letter` varchar(255) NOT NULL,
  `letter_title` varchar(255) NOT NULL,
  `letter_refno` varchar(255) NOT NULL,
  `letter_deadline` varchar(255) NOT NULL,
  `letter_date` varchar(255) NOT NULL,
  `letter_school` varchar(255) NOT NULL,
  `schlogo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `letters`
--

INSERT INTO `letters` (`id`, `scanned_letter`, `letter_title`, `letter_refno`, `letter_deadline`, `letter_date`, `letter_school`, `schlogo`) VALUES
(8, 'letters/5b60569533ff1_SOA_KUMASI.jpg', 'Pre and Post Examination Moderation Exercises: School of Anaesthesia, Kumasi', 'UCC/IAO/SOA/116/Vol.1/08', '13/08/2018', '31/07/2018', 'School of Anaesthesia, Kumasi', 'schools/5b3cd55b51fbf_optics.jpg'),
(9, 'letters/5b6ec8fac05cf_Screenshot_20180811-092747.png', 'Beauty', 'UCC', '12/08/2018', '11/08/2018', 'St. Margaret College', 'schools/5b4c6f2b8500a_st_margaret.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `moderators`
--

CREATE TABLE `moderators` (
  `id` int(11) NOT NULL,
  `mName` varchar(255) NOT NULL,
  `mNumber` varchar(25) NOT NULL,
  `mDepartment` varchar(255) NOT NULL,
  `mEmail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moderators`
--

INSERT INTO `moderators` (`id`, `mName`, `mNumber`, `mDepartment`, `mEmail`) VALUES
(1, 'Dr. George K. Aggrey', '0203005004', 'Computer Sci. & Info. Tech.', 'ggeorgeey@hotmail.com'),
(2, 'Dr. Welborn A. Marful', '0268608170', 'Computer Sci. & Info. Tech.', 'wmarful@ucc.edu.gh'),
(3, 'Mr. Elliot Attipoe', '0243879458', 'Computer Sci. & Info. Tech.', 'eattipoe@ucc.edu.gh'),
(4, 'Dr. Edem Bakah', '0207049403', 'French', 'unknown@test.com'),
(5, 'Dr. M. K. Kodah', '0244879794', 'French', 'mkodah@ucc.edu.gh'),
(6, 'Mr. Alexander Kwame', '0242344259', 'French', 'unknown@test.com'),
(7, 'Dr. Felix Kwame Opoku', '0244974205', 'Human Resource Management', 'unknown@test.com'),
(8, 'Dr. Aborampah Mensah', '0208633658', 'Management', 'unknown@test.com'),
(9, 'Mrs. Elizabeth Annan-Prah', '0244660242', 'Human Resource Management', 'unknown@test.com'),
(10, 'Mrs. Edna Okorley', '0208181244', 'Human Resource Management', 'unknown@test.com'),
(11, 'Mr. Kofi Akotoye', '0249220273', 'Computer Sci. & Info. Tech.', 'fokotoye@ucc.edu.gh'),
(12, 'Dr. Samuel Kweku Agyei', '0277655161', 'Finance', 'sagyei@ucc.edu.gh'),
(13, '**Salomey Ofori Appiah', '0244936753', 'Human Resource Management', 'salomey.ofori@ucc.edu.gh'),
(14, 'Dr. Martin Anokye', '0249523517', 'Mathematics & Statistics', 'martin.anokye@ucc.edu.gh'),
(15, 'Sandra Freda Wood', '0244895182', 'Communication Studies', 'sandra.wood@ucc.edu.gh'),
(16, 'Dr. Eugene Milledzi', '0206723189', 'Education & Psychology', 'emilledzi@ucc.edu.gh'),
(17, 'Dr. Clement Lamboi Arthur', '0242637977', 'Accounting', 'carthur@ucc.edu.gh'),
(18, 'Dr. Mark Armah', '0207066734', 'Economics', 'marmah@ucc.edu.gh'),
(19, 'Isaac Kwadwo Anim', '0504141957', 'Accounting', 'ianim@ucc.edu.gh'),
(20, 'Dr. Andrews Yalley', '0265549416', 'Marketing & Supply Chain Management', 'unknown@test.com'),
(21, 'Dr. Alex Yaw Adom', '0509540215', 'Management', 'alex.adom@ucc.edu.gh'),
(22, 'Isaac Tetteh Kwao', '0243011907', 'Human Resource Management', 'lordgentle09@yahoo.com'),
(23, 'Dr. Isaac Buabeng', '0501042479', 'Basic Education', 'ibuabeng@ucc.edu.gh'),
(24, 'Gertrude Afiba Torto', '0244983443', 'Basic Education', 'gertrude.torto@ucc.edu.gh'),
(25, 'Prof. Clement Agezo', '0244974793', 'Basic Education', 'cagezo@ucc.edu.gh'),
(26, 'Lebbaeus Asamaisi', '0242122281', 'Education & Psychology', 'lebbaeusa@gmail.com'),
(27, 'Rev. Prof. Seth Asare-Danso', '0244573688', 'Arts Education', 'sasaredanso@ucc.edu.gh'),
(28, 'Dr. Eric Koka', '0243374637', 'Sociology & Anthropology', 'ekoka@ucc.edu.gh'),
(29, 'Alex Darteh Afrifa', '0208181339', 'Hospital', 'alex.afrifa@ucc.edu.gh'),
(30, 'Mr. Anthony Adu-Asare Idun', '0543818894', 'Finance', 'aidun@ucc.edu.gh'),
(31, 'Mr. Samuel Assabil', '0207223885', 'Mathematics & Statistics', 'samuel.assabil@ucc.edu.gh'),
(32, 'Anukware Togh-Tchimavor', '0264489450', 'French', 'unknown@test.com'),
(33, 'Stephen Kwame Owusu-Amoh', '0244608653', 'Communication Studies', 'stephen.owusu-amoah@ucc.edu.gh'),
(34, 'Franklin Kome Amoo', '0204939339', 'Computer Sci. & Info. Tech.', 'amoo.franklin@ucc.edu.gh'),
(35, 'Dr. Edmond Yeboah Nyamah', '0541909787', 'Marketing & Supply Chain Management', 'edmund.nyamah@ucc.edu.gh'),
(36, 'Isaac Armah-Mensah', '0266238196', 'Computer Sci. & Info. Tech.', 'iamensah@ucc.edu.gh'),
(37, 'Stephen Asante', '0244475648', 'Accounting', 'sasante@ucc.edu.gh'),
(38, 'Dr. Issahaku Adam', '0209027416', 'Hospitality & Tourism Management', 'issahaku.adam@ucc.edu.gh'),
(39, 'Kassimu Issau ', '0243588260', 'Marketing & Supply Chain Management', 'kissau@ucc.edu.gh'),
(40, 'Dr. N. Osei Owusu', '0502560234', 'Management', 'nowusu@ucc.edu.gh'),
(41, 'Dr. Alex Yaw Adom', '0509540215', 'Management', 'alex.adom@ucc.edu.gh'),
(42, 'Daniel Okyere Darko', '0244763015', 'English', 'dan.okyere-darko@ucc.edu.gh'),
(43, 'Dr. Stephen E. Hiamey', '0201288650', 'Hospitality & Tourism Management', 'stephen.hiamey@ucc.edu.gh'),
(44, 'Dominic Owusu', '0208405853', 'Marketing & Supply Chain Management', 'dowusu@ucc.edu.gh'),
(45, 'Dr. Nana Yaw Oppong', '0248188393', 'Human Resource Management', 'noppong@ucc.edu.gh'),
(46, 'Dr. Francis Kwaw Andoh', '0248999779', 'Economics', 'fandoh@ucc.edu.gh'),
(47, 'Emmanuel Yaw Arhin', '0242209828', 'Accounting', 'earhin@ucc.edu.gh'),
(48, 'S. H. M. Aikins', '0244245944', 'Agricultural Engineering', 'stevenaikins@yahoo.com'),
(49, 'Prof. Daniel Okae-Anti', '0244721136', 'Soil Science', 'dokae-anti@ucc.edu.gh'),
(50, 'Dr. Emmanuel Afutu', '0545166242', 'Crop Science', 'emmanuel.afutu@ucc.edu.gh'),
(51, 'Dr. Samuel K. N. Dadzie', '0546994879', 'Agricultural Economics & Extension', 'sdadzie@ucc.edu.gh'),
(52, 'Frank Kuckucher Ackah', '0242652706', 'Crop Science', 'frank.ackah@ucc.edu.gh'),
(53, 'Dr. R. S. Amoah', '0502020751', 'Agricultural Engineering', 'ramoah@ucc.edu.gh'),
(54, 'Dr. Wincharles Coker', '0554690869', 'Communication Studies', 'wcoker@ucc.edu.gh'),
(55, 'Dr. Alexander T. K. Nuer', '0269784902', 'Agricultural Economics & Extension', 'alexander.nuer@ucc.edu.gh'),
(56, 'Mr. Moses Kwadzo', '0208480015', 'Agricultural Economics & Extension', 'moses.kwadzo@ucc.edu.gh'),
(57, 'Dr. Edward A. Ampofo', '0540399336', 'Soil Science', 'akwasi.ampofo@ucc.edu.gh'),
(58, 'Dr. Josiah W. Tachie-Menson', '0244512825', 'Crop Science', 'jtachie-menson@ucc.edu.gh'),
(59, 'Ebenezer Gyamera', '0246606130', 'Animal Science', 'ebenezer.gyamera1@ucc.edu.gh'),
(60, 'Dr. Julius Kofi Hagan', '0243253220', 'Animal Science', 'jhagan1@ucc.edu.gh'),
(61, 'Dr. Moses Teye', '0204335500', 'Animal Science', 'moses.teye@ucc.edu.gh'),
(62, 'Dr. Kingsley J. Taah', '0265170207', 'Crop Science', 'ktaah@ucc.edu.gh'),
(63, 'Samuel Akuamoah-Boateng', '0208165878', 'Agricultural Economics & Extension', 'sakuamoah.boateng@ucc.edu.gh'),
(64, 'Marcelinus Dery', '0204544617', 'Communication Studies', 'marcelinus.dery@ucc.edu.gh'),
(65, 'Dr. Albert Obeng Mensah', '0244804621', 'Agricultural Economics & Extension', 'aobeng.mensah@ucc.edu.gh'),
(66, 'Dr. Jerry Paul Ninnoni', '0554028222', 'Nursing & Midwifery', 'jerry.ninnoni@ucc.edu.gh'),
(67, 'Dr. Prince Amoah Barnie', '0244479476', 'Biomedical Science', 'pamoah-barnie@ucc.edu.gh'),
(68, 'Obed U. Lasim', '0242539351', 'Health Information Management', 'olasim@ucc.edu.gh'),
(69, 'Dr. Ernest Teye', '0243170302', 'Agricultural Engineering', 'ernest.teye@ucc.edu.gh'),
(70, 'Dr. Grace C. Van der Puije', '0249874915', 'Crop Science', 'gvanderpuije@ucc.edu.gh'),
(71, 'Prof. Ernest Ekow Abano', '50542404334', 'Agricultural Engineering', 'eabano@ucc.edu.gh'),
(72, 'Dr. Owusu Boampong', '0244882852', 'Institue for Development Studies', 'owusu.boampong@ucc.edu.gh'),
(73, 'Innocent S. K. Acquah', '0249539547', 'Marketing & Supply Chain Management', 'iacquah@ucc.edu.gh'),
(74, 'Dr. Otuo Serebour Agyemang', '0205383442', 'Finance', 'unknown@test.com'),
(75, 'Dr. Edward Amartefio', '0244980052', 'C. E. S. E. D.', 'eamarteifio@ucc.edu.gh'),
(76, 'Dr. Edmond Yeboah Nyamah', '0541909787', 'Marketing & Supply Chain Management', 'edmond.nyamah@ucc.edu.gh'),
(77, 'Prof. John Gatsi', '0246435952', 'Finance', 'jgatsi@ucc.edu.gh'),
(78, 'Dr. Bernard Wiafe Akaadom', '0202341500', 'MAthematics & I.C.T. Education', 'bernard.akaadom@ucc.edu.gh'),
(79, 'Dr. Samuel Essien-Baidoo', '0507408825', 'Medical Laboratory Science', 'sessien-baidoo@ucc.edu.gh'),
(80, 'Yaa Boahemaa Gyasi', '0242582175', 'Nursing & Midwifery', 'yaa.gyasi@ucc.edu.gh'),
(81, 'Dr. Nancy Ebu Enyan', '0541145193', 'Nursing & Midwifery', 'nebu@ucc.edu.gh'),
(82, 'Mrs. Dorothy E. Addo-Mensah', '0209082050', 'Nursing & Midwifery', 'dorothy.oddo-menson@ucc.edu.gh'),
(83, 'Mrs. Christiana Okantey', '0208152433', 'Nursing & Midwifery', 'christiana.okantey@ucc.edu.gh'),
(84, 'Evelyn Asamoah Ampofo', '0208131658', 'Nursing & Midwifery', 'evelyn.ampofo@ucc.edu.gh'),
(85, 'Dr. Andrews Adjei Druye', '0503187902', 'Nursing & Midwifery', 'adjeidruye@yahoo.com'),
(86, 'Matthew Alidza', '0244897884', 'Center for African & International Studies', 'malidza@ucc.edu.gh'),
(87, 'Owusu Xornam Atta', '0208281110', 'Theatre & Film Studies', 'xornam.owusu@ucc.edu.gh'),
(88, 'Dr. Eric Opoku-Mensah', '0243604199', 'Communication Studies', 'eric.opokumensah@ucc.edu.gh'),
(89, 'Rev. Dr. Philip Arthur Gborsong', '0244987308', 'Communication Studies', 'pgborsong@ug.edu.com'),
(90, 'Mr. Richard T. Torto', '0208164021', 'Communication Studies', 'rtorto@ucc.edu.gh'),
(91, 'Mr. William Kudom Gyasi', '0243374729', 'Communication Studies', 'william.ghasi@ucc.edu.gh'),
(92, 'Mr. Theophilus Attram Nartey', '0244380055', 'Communication Studies', 'tnartey@ucc.edu.gh'),
(93, 'Mrs. Rita Akele Twumasi', '0241144498', 'Communication Studies', 'rakeletwumasi@ucc.edu.gh'),
(94, 'Mr. Martin Kabang-Fu Segtub', '0208992629', 'Communication Studies', 'msegtub@ucc.edu.gh'),
(95, 'Mr. Marcelinus Dery', '0242625587', 'Communication Studies', 'marcelinus.dery@ucc.edu.gh'),
(96, 'Mr. Michael Yao Wodui Serwornou', '0244949841', 'Communication Studies', 'michael.serwornoo@ucc.edu.gh'),
(97, 'Ms. Josephine Brew â€“ Daniels', '0574276204', 'Communication Studies', 'josehine.daniels@ucc.edu.gh'),
(98, 'Mrs. Eunice Ashun Annan', '0285229611', 'Communication Studies', 'eunice.eshun@ucc.edu.gh'),
(99, 'Ms. Christina Araba Baiden', '0243221964', 'Communication Studies', 'christina.baiden@ucc.edu.gh'),
(100, 'Mrs. Judith Owusu Peprah', '0243525603', 'Communication Studies', 'judith.peprah@ucc.edu.gh'),
(101, 'Mr. Osei Yaw Akoto', '0243405089', 'Communication Studies', 'oseiyaw.akoto@ucc.edu.gh'),
(102, 'Mr. Stephen Jantuah Boakye', '0264200977', 'Communication Studies', 'stephen.jantuah@ucc.edu.gh'),
(103, 'Mr. Samuel Cudjoe', '0246541286', 'Communication Studies', 'samuel.cudjoe@ucc.edu.gh'),
(104, 'Mrs. Araba Tawiah Duku-Coleman', '0205414444', 'Communication Studies', 'aduku-coleman@ucc.edu.gh');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `noti_text` varchar(255) NOT NULL,
  `schlogo` varchar(255) NOT NULL,
  `letter_image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `subject`, `noti_text`, `schlogo`, `letter_image`, `status`) VALUES
(16, 'IAO Notification Platform', 'Notify Dzifa', '4th October, 2018', '', 0),
(17, 'IAO Notification Platform', 'Test two', '4th October, 2018', '', 0),
(18, 'IAO Notification Platform', 'Hello bro', '12th January, 2019', '', 0),
(19, 'IAO Notification Platform', 'Craded', '12th January, 2019', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `schlogo` varchar(255) NOT NULL,
  `schname` varchar(255) NOT NULL,
  `schpobox` varchar(255) NOT NULL,
  `schloc` varchar(255) NOT NULL,
  `schshorthand` varchar(255) NOT NULL,
  `schmail` varchar(255) NOT NULL,
  `schtel` varchar(255) NOT NULL,
  `schrefno` varchar(255) NOT NULL,
  `schfileno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `schlogo`, `schname`, `schpobox`, `schloc`, `schshorthand`, `schmail`, `schtel`, `schrefno`, `schfileno`) VALUES
(1, 'schools/5b3296f446716_csir.jpg', 'CSIR College of Science and Technology', 'P. O. Box M 32', 'Accra, Ghana', 'CSIR', 'efoli@hotmail.com', '+233(0)302777651-4, 774772', 'UCC/IAO/CSIR/40/Vol.2/', '40'),
(2, 'schools/5b35508304373_anglican.PNG', 'Anglican University College of Techology', 'P. O. Box TN 1167', 'Nungua - Teshie<br>Accra - Ghana', 'Anglican', 'ask@angutech.edu.gh', '', 'UCC/IAO/AUCT/57/Vol.1/', '57'),
(3, 'schools/5b36686d1bff5_nurse-14-300x213.jpg', 'Ophthalmic Nursing School', 'P. O. Box KB 1015', 'Korle-Bu, Accra', 'Ophthalmic', 'ebeneze.ae@gmail.com', '+233(0)302661869', 'UCC/IAO/OPNS/118/Vol.1/', '118P'),
(4, 'schools/5b3b45e6622c4_epuc.PNG', 'Evangelical Presbyterian University College', 'P. O. Box HP 678', 'Ho-Volta Region', 'EPUC', 'info@epuc.edu.gh', '+233362026498', 'UCC/IAO/EPUC/11/Vol.4/', '11'),
(5, 'schools/5b3b469fc70ae_perez.PNG', 'Perez University College', 'P. O. Box 323', 'Winneba', 'Perez', 'info@perez.edu.gh', '+233(0)332091007;  +233(0)332094906', 'UCC/IAO/PEREZ/14/Vol.3/', '14'),
(6, 'schools/5b3b4783ec9bf_dominion.jpg', 'Dominion University College', 'P. O. Box PMB 69', 'Cantoment, Accra', 'Dominion', 'ra.atunwey@duc.edu.gh', '+2333029677559', 'UCC/IAO/DUC/7/Vol.3/', '7'),
(7, 'schools/5b3b48ccc5df1_all_nations.png', 'All Nations University College', 'P. O. Box KF 1908', 'Koforidua, E/R Ghana', 'All Nations', 'registrar@anuc.edu.gh', '+233(0)201742690', 'UCC/IAO/ANU/136/Vol.1/', '136P'),
(8, 'schools/5b3b49c0ecc39_academic_city.png', 'Academic City College', 'Abena Ateaa Towers <br> Ring Road Central<br>P. O. Box AD 421', 'Adabraka - Accra', 'Academic City', 'info@accghana.com', '+233263011389, +233302253630', 'UCC/IAO/ACC/46/Vol.2/', '46'),
(9, 'schools/5b3b4e4fcf87c_Pentecost-Univeristy-College.png', 'Pentecost University College', 'P. O. Box KN 1739', 'Kaneshie, Accra-Ghana', 'Pentecost', 'info@pentvars.edu.gh', '', 'UCC/IAO/PUC/73/Vol.1/', '73'),
(10, 'schools/5b3b70a206d47_bimarks.jpg', 'Bimarks College of Business And Health Sciences', 'P. O. Box SW 834', 'Agona Swedru, Central Region', 'Bimarks', 'demakintosh@yahoo.com', '+233(0)332095776', 'UCC/IAO/BCBH/32/Vol.2/', '32'),
(11, 'schools/5b3ca7a6d7c2b_nmtck.jpg', 'Nursing and Midwifery Training Council - Koforidua', 'P. O. Box KF 142', 'Koforidua', 'Nursing Training Koforidua', 'nmtck@outlook.com', '', 'UCC/IAO/NMTCK/85/Vol.1/', '85'),
(12, 'schools/5b3cb1e13d705_marshals.jpg', 'Marshalls University College', 'P. O. Box KB 781', 'Korle-Bu, Accra', 'Marshalls', 'brimpong@marshalls.edu.gh', '+233242561005; +233575161055', 'UCC/IAO/MSHC/24/Vol.2/', '24'),
(13, 'schools/5b3cb330c2188_regent.jpg', 'Regent University College of Science and Technology', 'P. O. Box DS 1636', 'Dansoman - Accra', 'Regent File', 'registrar@regent.edu.gh', '+233(0)303939900; +233(0)266839961', 'UCC/IAO/RUCST/79/Vol.1/', '79'),
(14, 'schools/logo.jpg', 'Community College', 'P. O. Box AX 763', 'Takoradi', 'Community', 'info@cuctakoradi.edu.gh', '+233(0)312026016', 'UCC/IAO/IAO/CUCT/19/Vol.3/', '19'),
(15, 'schools/5b3cd55b51fbf_optics.jpg', 'School of Dispensing Optics, Oyoko', 'P. O. Box 139', 'Effiduase-Ashanti Region', 'Oyoko', 'gabfaraday74@gmail.com', '+233(0)322492862; +233(0)322492875', 'UCC/IAO/SDO/105/Vol.1/', '105P'),
(16, 'schools/joyce.PNG', 'Joyce Ababio College of Creative Design', 'P. O. Box CT 1097', 'Cantoment, Accra', 'Joyce Ababio', 'registrar@jaccd.edu.gh', '+233(0)235682600 / (0)302797471', 'UCC/IAO/JACCD/25/Vol.1/', '25'),
(17, 'schools/5b3cd896e0b82_christian_service.jpg', 'Christian Service University College', 'P. O. Box 3110', 'Kumasi', 'Christian Service', 'fsakina@csuc.edu.gh', '+233(0)32202878,  +233(0)244244953', 'UCC/IAO/CSUC/49/Vol.1/', '49'),
(18, 'schools/5b3ce0484ecd1_community.png', 'Public Health Nursing School', 'P. O. Box KB 84', 'Korle-Bu, Accra', 'Public Health', 'phnskorlebu@yahoo.com', '+233(0)302660966; +233(0)208156463', 'UCC/IAO/PHNS/112/Vol.1/', '112P'),
(19, 'schools/yendi.jpg', 'Yendi College of Health Sciences', 'P. O. Box 137', 'Yendi', 'Yendi', 'joegboglu@yahoo.com', '+233(0)2444585668', 'UCC/IAO/YCHS/96/P/Vol.1/', '96P'),
(20, 'schools/ear_nose.png', 'Ear, Nose and Throat Nursing School', 'P. O. Box KS 511', 'Adum-Kumasi', 'Ear, Nose and Throat', 'ent.school@yahoo.com', '+233(0)322045017', 'UCC/IAO/ENT/108/Vol.1/', '108P'),
(21, 'schools/5b3f31d5eaf73_pantang.png', 'Nurses Training College - Pantang', 'P. O. Box 1236', 'Legon - Accra', 'Pantang', 'fnsatimba@yahoo.com', '+233(0)244922843; +233(0)202011860', 'UCC/IAO/NTCP/107/Vol.1/', '107P'),
(22, 'schools/5b3f70930c95d_ashesi.png', 'Ashesi University', '1 University Avenue', 'Berekuso - Eastern Region', 'Ashesi', 'jsquaye@ashesi.edu.gh', '+233(0)302610330/1', 'UCC/IAO/ASUC/4/Vol.5/', '4'),
(23, 'schools/5b439ac25a0dd_modal.PNG', 'Modal College Sogakope', 'P. O. Box SK 172', 'Sogakope - Volta Region', 'Modal', 'admin@modalcollege.com', '+233(0)552482220', 'UCC/IAO/MCS/82/Vol.1/', '82'),
(24, 'schools/shiv_india.png', 'Shiv-India Institute of Management and Technology', 'P. O. Box CT 7066', 'Cantoment, Accra', 'Shiv India', 'sraju1977@gmail.com', '+233(0)570801624', 'UCC/IAO/68/SIIMT/Vol.1/', '68'),
(25, 'schools/Mountview.jpg', 'Mountview College', 'P. O. Box 224', 'Dunkwa - Offin, Central Region', 'Mountview', 'info@mountview.edu.gh', '+233(0)208893859; +233(0)240616354', 'UCC/IAO/MVC/75/Vol.1/', '75'),
(26, 'schools/5b4c667de65b7_moh.jpg', 'Ministry of Health Schools', 'MSF Belgique ASBL <br>Medical Academy, Ghana <br> Rue de L&#39;Ardre', 'IOSO Brussels, B&#39;enit, 46, Belgium', 'Health Schools', 'findout', '', 'UCC/IAO/MHS/Vol.1/72/', '72'),
(27, 'schools/5b4c6baea9b3a_community.png', 'Nana Afia Kobi Nursing Training College', 'P. O. Box 17480', 'Kumasi', 'Nana Afia Kobi', 'findout', '+233(0)322045164; +233(0)249833730', 'UCC/IAO/NAKNTC/78/Vol.1/', '78'),
(28, 'schools/5b4c6cad0cd4f_community.png', 'Institute of Development and Tehnology Management', 'P. O. Box AD 494', 'Adisadel, Cape Coast', 'IDT', 'jaamicah@yahoo.com', '+233(0)208123530', 'UCC/IAO/IDTM/132/P/Vol.1/', '132P'),
(29, 'schools/5b4c6e5e08d0c_nmc.png', 'Nursing and Midwifery Training Council of Ghana', 'P. O. Box MB 44', 'Accra - Ghana', 'NMC File', 'info@nmcgh.org', '+233(0)302522909/10', 'UCC/IAO/NMC/83/Vol.1/', '83'),
(30, 'schools/5b4c6f2b8500a_st_margaret.jpg', 'St. Margaret College', 'P. O. Box KS 5903', 'Feyiase - Kumasi', 'St. Margaret', 'registrar@smuc.edu.gh', '+233(0)322392584', 'UCC/IAO/SMC/76/Vol.1/', '76'),
(31, 'schools/5b4c70466fd58_nduom.PNG', 'Nduom School of Business and Technology', 'P. O. Box EL 33', 'Elmina', 'Nduom', 'deroy.andrew@gngnana.edu.gh', '+233(0)501545002; +233(0)501481243', 'UCC/IAO/NSBT/69/Vol.1/', '69'),
(32, 'schools/5b4c71a08a1a7_st_nic.jpg', 'St. Nicholas Seminary', 'P. O. Box AD 162', 'John Mensah Sabah Road, Cape Coast', 'St. Nicholas', 'info@snsanglican.org', '', 'UCC/IAO/SNS/001/Vol.2/', '1'),
(33, 'schools/5b4ccc8a58698_kwadaso.PNG', 'Kwadaso Agricultural College', 'Private Post Bag <br>Academy Post Office', 'Kwadaso - Kumasi', 'Kwadaso', 'externalaffairskac@yahoo.com', '+23303220501034', 'UCC/IAO/KWAC/5/Vol.1/', '5'),
(34, 'schools/5b4ccdcbe7373_maranatha.png', 'Maranatha University College', 'P. O. Box AN 10320', 'Accra North, Ghana', 'Maranatha', 'admin@muc.edu.gh', '+23321417581', 'UCC/IAO/MAUC/6/Vol.2/', '6'),
(35, 'schools/5b50519abc31f_ho.PNG', 'Ho Technical University', 'P. O. Box HP 217', 'Ho-Volta Region, Ghana', 'Ho Poly', 'registrar@htu.edu.gh', '+233362027421', 'UCC/IAO/HTU/12/Vol.2/', '12'),
(36, 'schools/5b50526b199be_zenith.PNG', 'Zenith University College', 'P. O. Box TF511', 'Trade Fair, La <br>Accra-Ghana', 'Zenith', 'mails@zenithcollegeghana.org', '+2330302784849', 'UCC/IAO/ZUC/13/Vol.4/', '13'),
(37, 'schools/5b505b84875db_christ_apostilic.PNG', 'Christ Apostolic University College', 'P. O. Box KS 15113', 'Kumasi, Ghana', 'Christ Apostolic', 'info@csuc.edu.gh', '+233506444464', 'UCC/IAO/CAUC/15/Vol.3/', '15'),
(38, 'schools/5b508e4433295_eti.PNG', 'Entrepreneurship Training Institute', 'P. O. Box AN 10476', 'Accra', 'ETI', 'infoeti2005@yahoo.com', '+233(0)244136384', 'UCC/IAO/ETI/10/Vol.2/', '10'),
(39, 'schools/5b509f13b3d4c_gbuc.jpg', 'Ghana Baptist University College', 'Private Mail Bag', 'Kumasi - Ghana', 'Ghana Baptist', 'gbuc2006@yahoo.com', '+233(0)322080195; +233(0)322044011', 'UCC/IAO/GBUC/9/Vol.5/', '9'),
(40, 'schools/5b50a055cfcee_baldwin.PNG', 'Baldwin College', 'P. O. Box 19872', 'Accra, North', 'Baldwin', 'domowusu82@yahoo.com', '+233265968229', 'UCC/IAO/BC/60/Vol.1/', '60'),
(41, 'schools/5b50aea313ea5_od.jpg', 'Organisation Development Institute', 'P. O. Box WY 1718', 'Kwabenya, Accra', 'OD Institute', 'noble.odinstitute@gmail.com', '+233(0)24313997; +233(0)30294583', 'UCC/IAO/OD/21/Vol.2/', '21'),
(42, 'schools/5b50afc06559b_kings.jpg', 'Kings University College', 'P. O. Box CT 10010', 'Cantoment, Accra', 'Kings File', 'enquiries@kuc.edu.gh', '+233(0)302917672-3; +233(0)201651924', 'UCC/IAO/KUC/20/Vol.3/', '20'),
(43, 'schools/5b50bda1112be_community.png', 'Ministry of Food & Agriculture Institutions', 'P. O. Box MB 37', 'Accra', 'MOFA', 'mofahrdmd@gmail.com', '+233(0)302665598 / 687229', 'UCC/IAO/MFA/42/Vol.2/', '42'),
(44, 'schools/mucg.png', 'Methodist University College Ghana', 'P. O. Box DC 940', 'Dansoman - Accra', 'MUCG', 'yvonnemintah@yahoo.com', '+233(0)307021268; +233(0)557674758', 'UCC/IAO/MUCG/33/Vol.2/', '33'),
(45, 'schools/5b50c0ea0f067_cucg.png', 'Catholic University College of Ghana, Fiapre', 'P. O. Box 363', 'Sunyani, Brong Ahafo Region', 'Catholic', 'emmanuel_kaba@yahoo.com', '+233(0)352094657 / 91559 / 94658', 'UCC/IAO/CUCG/17/Vol.5/', '17'),
(46, 'schools/5b574cfca398f_community.png', 'SS Peter and Paul Pastorial and Social Institute', 'P. O. Box 52', 'Wa, Upper West Region', 'SS Peter and Paul', 'registrar.psiwa@gmail.com', '+233(0)392022596', 'UCC/IAO/SSPP/8/Vol.2/', '8'),
(47, 'schools/5b5845d7472d0_Wisconsin_logo_small_-_PNG.png', 'Wisconsin International University College, Ghana', 'P. O. Box LG751', 'Legon, Accra - Ghana', 'Wisconsin', 'info@wiuc-ghana.edu.gh', '+233(0)302504391; +233(0)302504399', 'UCC/IAO/WIUC/3/Vol.3/', '3'),
(48, 'schools/ranselliot.jpg', 'Rans-Elliot School of Nursing', 'P. O. Box KF 451', 'Koforidua', 'Rans Elliot', 'ranselliot.edu@gmail.com', '+233(0)247749078', 'UCC/IAO/RESN/73/Vol.1/', '73P'),
(49, 'schools/potters.PNG', 'Potters International College', 'P. O. Box TD 530', 'Takoradi, Ghana', 'Potters', 'potters.col@gmail.com', '+233(0)244998608; +233(0)234262220', 'UCC/IAO/PCSN/138/P/Vol.1/', '138P'),
(50, 'schools/5b60577b6856b_community.png', 'School of Anaesthesia, Kumasi', 'P.  O. Box 17621', 'Kumasi', 'KATH', 'richabundant@gmail.com', '+233(0)322021556', 'UCC/IAO/SOA/116/Vol.1/', '116P'),
(51, 'schools/5b6058d0741f4_community.png', 'School of Anaesthesia, Ridge', 'P O Box 473', 'GPO Accra, Ghana', 'Ridge', 'evans.narh@gmail.com', '+233 303 228315', 'UCC/IAO/SOA/110/Vol.1/', '110P');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `notifymail` varchar(255) NOT NULL,
  `ccnotifymail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `notifymail`, `ccnotifymail`) VALUES
(1, 'ifcia@ucc.edu.gh', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_logs`
--
ALTER TABLE `app_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filelist`
--
ALTER TABLE `filelist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `letters`
--
ALTER TABLE `letters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moderators`
--
ALTER TABLE `moderators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `app_logs`
--
ALTER TABLE `app_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `filelist`
--
ALTER TABLE `filelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `letters`
--
ALTER TABLE `letters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `moderators`
--
ALTER TABLE `moderators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
