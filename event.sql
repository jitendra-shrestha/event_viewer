-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2019 at 10:31 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booked_details`
--

CREATE TABLE `tbl_booked_details` (
  `id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `event_id` int(10) NOT NULL,
  `ticketno` varchar(255) NOT NULL,
  `price` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_booked_details`
--

INSERT INTO `tbl_booked_details` (`id`, `customer_id`, `event_id`, `ticketno`, `price`, `date`) VALUES
(124, 23, 12, '5ceb938b5524b', '500', '2019-05-27'),
(125, 23, 12, '5ceb938b6637f', '500', '2019-05-27'),
(126, 23, 20, '5ceb93916922f', '1000', '2019-05-27'),
(127, 23, 15, '5ceb939b878fc', '100', '2019-05-27'),
(128, 15, 12, '5ceb9409a6a53', '500', '2019-05-27'),
(129, 15, 20, '5ceb940ed245c', '1000', '2019-05-27'),
(130, 15, 14, '5ceb941827723', '200', '2019-05-27'),
(131, 20, 12, '5ceb943a781e8', '500', '2019-05-27'),
(132, 20, 12, '5ceb943a914c7', '500', '2019-05-27'),
(133, 20, 12, '5ceb943aa92a4', '500', '2019-05-27'),
(134, 20, 12, '5ceb943ab4898', '500', '2019-05-27'),
(135, 20, 12, '5ceb943abc2f0', '500', '2019-05-27'),
(136, 20, 20, '5ceb943f8a027', '1000', '2019-05-27'),
(137, 20, 20, '5ceb943f9205f', '1000', '2019-05-27'),
(138, 16, 12, '5ceb94506f655', '500', '2019-05-27'),
(139, 16, 12, '5ceb94507edad', '500', '2019-05-27'),
(140, 16, 20, '5ceb9454af49a', '1000', '2019-05-27'),
(141, 16, 20, '5ceb9454b6003', '1000', '2019-05-27'),
(142, 19, 12, '5ceb94763aeb7', '500', '2019-05-27'),
(143, 19, 12, '5ceb9476569d0', '500', '2019-05-27'),
(144, 19, 20, '5ceb947a665e5', '1000', '2019-05-27'),
(145, 19, 20, '5ceb947a787e2', '1000', '2019-05-27'),
(146, 17, 12, '5ceb9494220e7', '500', '2019-05-27'),
(147, 17, 12, '5ceb94942eb29', '500', '2019-05-27'),
(148, 18, 12, '5ceb94a7e60a0', '500', '2019-05-27'),
(149, 18, 12, '5ceb94a80f5d3', '500', '2019-05-27'),
(150, 18, 12, '5ceb94a82a8a3', '500', '2019-05-27'),
(151, 18, 12, '5ceb94a8324fc', '500', '2019-05-27'),
(152, 18, 12, '5ceb94a83accf', '500', '2019-05-27'),
(153, 18, 17, '5ceb94b0eb6e0', '200', '2019-05-27'),
(154, 18, 17, '5ceb94b1098de', '200', '2019-05-27'),
(155, 18, 16, '5ceb94bb326af', 'free', '2019-05-27'),
(156, 21, 12, '5ceb94d58ea2f', '500', '2019-05-27'),
(157, 21, 12, '5ceb94d5a540b', '500', '2019-05-27'),
(158, 22, 20, '5ceb94eb8bcd3', '1000', '2019-05-27'),
(159, 22, 20, '5ceb94eb9596b', '1000', '2019-05-27'),
(160, 22, 20, '5ceb94eb9d569', '1000', '2019-05-27'),
(161, 22, 20, '5ceb94ebc3bac', '1000', '2019-05-27'),
(162, 22, 20, '5ceb94ebcbafc', '1000', '2019-05-27'),
(171, 24, 12, '5ceb9507cf885', '500', '2019-05-27'),
(176, 24, 12, '5ceb950803d76', '500', '2019-05-27'),
(182, 24, 12, '5ceb9508374f4', '500', '2019-05-27'),
(183, 24, 20, '5ceb95743fed5', '1000', '2019-05-27'),
(184, 24, 20, '5ceb957456ab5', '1000', '2019-05-27'),
(185, 15, 13, '5ceb96168c2bd', 'free', '2019-05-27'),
(186, 15, 13, '5ceb9616a3701', 'free', '2019-05-27'),
(187, 15, 13, '5ceb9616ab573', 'free', '2019-05-27'),
(188, 15, 13, '5ceb9616b3b00', 'free', '2019-05-27'),
(189, 15, 13, '5ceb9616bb995', 'free', '2019-05-27'),
(190, 18, 13, '5ceb963639116', 'free', '2019-05-27'),
(191, 18, 13, '5ceb963654d10', 'free', '2019-05-27'),
(192, 18, 13, '5ceb963664f64', 'free', '2019-05-27'),
(193, 18, 13, '5ceb96368ab18', 'free', '2019-05-27'),
(194, 18, 13, '5ceb96369b21b', 'free', '2019-05-27'),
(195, 24, 13, '5ceb9649f092b', 'free', '2019-05-27'),
(196, 24, 13, '5ceb964a0789a', 'free', '2019-05-27'),
(197, 24, 13, '5ceb964a0f727', 'free', '2019-05-27'),
(198, 24, 13, '5ceb964a17ca8', 'free', '2019-05-27'),
(199, 24, 13, '5ceb964a22899', 'free', '2019-05-27'),
(200, 19, 13, '5ceb9660d0891', 'free', '2019-05-27'),
(201, 19, 13, '5ceb9660db4aa', 'free', '2019-05-27'),
(202, 19, 13, '5ceb9660e34cf', 'free', '2019-05-27'),
(203, 19, 13, '5ceb9660f0f89', 'free', '2019-05-27'),
(204, 19, 13, '5ceb96610d2dc', 'free', '2019-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `id` int(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`id`, `firstname`, `lastname`, `address`, `password`, `email`, `phone`, `status`) VALUES
(15, 'Anusha', 'Bhandari', 'dillibazar', '6c970e9acc1e5bc3fe7d22db703ac1cc', 'anushabhandariab@gmail.com', '9843696639', 1),
(16, 'Samita', 'Awale', 'patan', 'ac17e36f011345bc4f4387306017cf34', 'samita@gmail.com', '9811111111', 1),
(17, 'ujjal', 'pyakurel', 'Ringroad', '47eaf547a93155a106be160446b2df56', 'ujjalpyaku@gmail.com', '9788888888', 1),
(18, 'Anit', 'Shrestha', 'Nayabazar', '85ba13f529811b4e3178bc3b23b46dfc', 'anit@gmail.com', '9844444444', 1),
(19, 'Bikash', 'Tamang', 'balkhu', 'c07c9d98ada18fb549c8fcf1fcc44755', 'bikash@gmail.com', '9855555555', 1),
(20, 'Ajay', 'prajapati', 'Bhaktapur', '29e457082db729fa1059d4294ede3909', 'ajay@gmail.com', '9845645622', 1),
(21, 'Angel', 'Maden', 'Putalisadak', 'f4f068e71e0d87bf0ad51e6214ab84e9', 'angel@gmail.com', '9808870086', 1),
(22, 'anush', 'Bhandari', 'Maitidevi', 'e50e379a06990a84578348176326ce98', 'anush@gmail.com', '9812122345', 1),
(23, 'Surendra', 'Shrestha', 'Bungmati', '9219f8ef5bc02c14d377e91f69121a76', 'surendra@gmail.com', '9849806558', 1),
(24, 'Sacheena', 'Karki', 'Maitidevi', '2684f8f888a24f500e16745de6c0f5ac', 'sacheena@gmail.com', '9855665566', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` varchar(10) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `start_time` varchar(10) NOT NULL,
  `end_time` varchar(10) NOT NULL,
  `days` int(5) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `price` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `attendes` int(10) NOT NULL,
  `description` text NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`id`, `name`, `date`, `venue`, `start_time`, `end_time`, `days`, `duration`, `price`, `image`, `attendes`, `description`, `added_by`, `status`, `deleted`) VALUES
(12, 'Holi', '2019-05-29', 'Basantapur', '12:00', '15:00', 1, '2', '500', 'Holi_events_update_12_pic.jpg', 50, '<p>Holi&nbsp;is the festival of love or colors that signifies the victory of superior over immoral.&nbsp;</p>\r\n\r\n<p><strong>The memories of this day will stay on! Gauranteed.</strong></p>\r\n\r\n<p>Come participate in this event, play with colors, get a bit wet, and mingle with the local&rsquo;est of local traditions in the Kathmandu valley, playing holi. This makes for an excellent day out.</p>\r\n', 'admin', 1, 0),
(13, 'Hiking', '2019-04-29', 'Champadevi', '06:00', '16:00', 1, '2', 'free', 'Hiking_events_update_13_pic.jpg', 20, '<p>Hiking is consider as good for healthy life.</p>\r\n\r\n<p>For enjoying and making new friends join us for hiking team.</p>\r\n\r\n<p>Necesary items:</p>\r\n\r\n<p>*Comfortable shoes</p>\r\n\r\n<p>*Drinking water as per required</p>\r\n\r\n<p>*Hiking stick</p>\r\n\r\n<p>*Some energy drinks</p>\r\n', 'nitesh', 0, 0),
(14, 'Everest Base Camp', '2019-06-02', 'Solukhumbu', '06:00', '18:00', 2, '12', '200', 'Everest Base Camp_events_14_pic.jpg', 40, '<p>Come and join us&nbsp;</p>\r\n', 'nitesh', 1, 0),
(15, 'Comdey Show', '2019-06-01', 'Bhrikutimandap', '18:00', '20:00', 1, '2', '100', 'Comdey Show_events_15_pic.jpg', 40, '<p>Stand-up comedy&nbsp;is a comic style in which a comedian performs in front of a live audience, usually speaking directly to them.</p>\r\n\r\n<p>We are coming with big comedians:</p>\r\n\r\n<p>*&nbsp; Lekhman Trital</p>\r\n\r\n<p>*&nbsp; Doresh Katiwada</p>\r\n', 'admin', 1, 0),
(16, 'EDU FAIR', '2019-06-11', 'Lazimpat ', '12:00', '16:00', 1, '4', 'free', 'EDU FAIR_events_update_16_pic.jpg', 200, '<p>Come and select your universities for your abroad studies</p>\r\n', 'admin', 1, 0),
(17, 'Walk for cancer', '2019-06-08', 'Chandragiri', '04:00', '16:00', 1, '12', '200', 'Walk for cancer_events_update_17_pic.jpg', 60, '<p>Walk for cancer is for raising&nbsp;awareness about reducing&nbsp;cancer&nbsp;risk, and raise money to bring hope to&nbsp;<strong>cancer</strong>&nbsp;patients.&nbsp;Walk&nbsp;with our community and to help free the world from&nbsp;cancer.</p>\r\n', 'ram', 1, 0),
(18, 'Rafting', '2019-06-14', 'Trishuli', '06:00', '18:00', 1, '12', '4000', 'Rafting_events_update_18_pic.jpg', 25, '<p>Enjoy rafting</p>\r\n', 'root', 0, 0),
(19, 'Mustang Tour', '2019-06-18', 'kalanki', '08:00', '16:00', 5, '8', '10000', 'Mustang Tour_events_19_pic.jpg', 20, '<p>MUSTANG TOUR</p>\r\n', 'admin', 0, 0),
(20, 'PUBG TOURNAMENT', '2019-05-30', 'Star mall', '12:00', '14:00', 1, '2', '1000', 'PUBG TOURNAMENT_events_20_pic.jpg', 80, '<p>PUBG TOURNAMENT</p>\r\n\r\n<p>Match will be solo</p>\r\n\r\n<p>Winner will get 100000</p>\r\n\r\n<p>Emulator players are not allowed.</p>\r\n\r\n<p>Hacking,Cheating is strictly prohibited and if seen disqualified at same time.</p>\r\n', 'dipesh', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mail`
--

CREATE TABLE `tbl_mail` (
  `id` int(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phoneno` varchar(10) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mail`
--

INSERT INTO `tbl_mail` (`id`, `firstname`, `lastname`, `address`, `phoneno`, `message`) VALUES
(5, 'jitendra', 'Shrestha', 'Bungmati', '9843359842', 'I wanted to be organizer'),
(6, 'Anusha', 'Bhandari', 'dillibazar', '9843696639', 'Happy with your events');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneno` varchar(10) NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'organizer',
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `firstname`, `lastname`, `address`, `email`, `phoneno`, `type`, `username`, `password`, `status`) VALUES
(6, 'admin', 'admin', 'bungmati', 'tjiten123@gmail.com', '9843359842', 'manager', 'admin', '02ef428c4cade90c0abe7a614e4163d3', 1),
(7, 'root', 'toor', 'khokhana', 'aa@gmail.com', '9812345678', 'organizer', 'root', '63a9f0ea7bb98050796b649e85481845', 1),
(14, 'Nitesh', 'KC', 'Kapan', 'nitesh@gmail.com', '9845612322', 'organizer', 'nitesh', '388c6df5ce99c934d9c5f0bf29d758e4', 1),
(15, 'Dipesh', 'Limbu', 'KCC', 'dipesh@gmail.com', '9855555555', 'organizer', 'dipesh', '1c1d15237b2433f18f588d8bf6984751', 1),
(16, 'Ramshwor', 'Yadav', 'Biratnagar', 'rameshwor@gmail.com', '9812546789', 'organizer', 'ram', '4641999a7679fcaef2df0e26d11e3c72', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_booked_details`
--
ALTER TABLE `tbl_booked_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticketno` (`ticketno`),
  ADD KEY `tbl_booked_details_ibfk_1` (`event_id`),
  ADD KEY `tbl_booked_details_ibfk_2` (`customer_id`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mail`
--
ALTER TABLE `tbl_mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_booked_details`
--
ALTER TABLE `tbl_booked_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_mail`
--
ALTER TABLE `tbl_mail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_booked_details`
--
ALTER TABLE `tbl_booked_details`
  ADD CONSTRAINT `tbl_booked_details_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `tbl_events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_booked_details_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
