-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2018 at 06:17 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `global_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `dot_tracker_emailtemp`
--

CREATE TABLE `dot_tracker_emailtemp` (
  `id` int(255) NOT NULL,
  `emaildata` text NOT NULL,
  `created_by` text NOT NULL,
  `creationdate_time` text NOT NULL,
  `type` text NOT NULL,
  `from_email` text NOT NULL,
  `from_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dot_tracker_emailtemp`
--

INSERT INTO `dot_tracker_emailtemp` (`id`, `emaildata`, `created_by`, `creationdate_time`, `type`, `from_email`, `from_name`) VALUES
(1, '<p style=\"color: #222222; font-family: arial, sans-serif; font-size: 12.8px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\">Dear [fname] [lname],</p>\r\n<p style=\"color: #222222; font-family: arial, sans-serif; font-size: 12.8px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\">Thank you for your interest in shipping your vehicle with Global Auto Transportation:&nbsp;<strong><em>\"Door to Door delivery is standard!\".</em></strong></p>\r\n<p style=\"color: #222222; font-family: arial, sans-serif; font-size: 12.8px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\">The price to ship your vehicle [vehicle_info] on [s_via] carrier from [p_city], [p_state] to [d_city], [d_state] is&nbsp;<strong>$</strong><span style=\"font-size: 14px;\"><strong>[extra5].</strong></span>&nbsp;Global Auto Transportation rates are all inclusive rates, which include door-to-door pick-up &amp; delivery, full insurance, freight charges, fuel costs as well as taxes.</p>\r\n<p style=\"color: #222222; font-family: arial, sans-serif; font-size: 12.8px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\">There is&nbsp;<strong>NO COST</strong>&nbsp;to get your reservation started.</p>\r\n<p style=\"color: #222222; font-family: arial, sans-serif; font-size: 12.8px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\">Your quote ID # is [id].</p>\r\n<p style=\"color: #222222; font-family: arial, sans-serif; font-size: 12.8px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\">Please click this link to review your quote: [auth_link].</p>\r\n<p style=\"color: #222222; font-family: arial, sans-serif; font-size: 12.8px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\">Watch our video below!</p>\r\n<p style=\"color: #222222; font-family: arial, sans-serif; font-size: 12.8px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"font-size: 18px;\"><strong><a style=\"color: #1155cc;\" href=\"https://www.youtube.com/watch?v=3wk0mXrG9vo&amp;t=4s\" target=\"_blank\" data-saferedirecturl=\"https://www.google.com/url?hl=en&amp;q=https://u1214497.ct.sendgrid.net/wf/click?upn%3D9soLYxHHM-2FikxPL8rmEqie8bh2ToDATnu2o0z7YNQCeCm7vfktsOGX1kuGaEhgkx_9dQIGu0nEDin-2FXGz5C9ZTC-2FHMcXwgZPEKFThXDhpkHsVT5Jt6c9g-2B-2FPYbBE7-2Bf3-2Fw6R7Kv-2FPJm6LlvuYD0MffhGVcyz7W4MZc9h1aqf3PWFEXKHUDx5qX4QTWzZV9kjQz3-2BRU-2BzEEaE9dqDyy1Iymw0CO0icWgqClSaAsR6VgHRqCjN1UzSBqv91nBGprFLbcNQwRpg6YClroejXa6c3IWKuzp4WMTBjGWonCPTeffA-3D&amp;source=gmail&amp;ust=1527032494968000&amp;usg=AFQjCNHci1bCCtkWc_aaZZvz1Dn9sn2gXA\">Global Auto Transportation Process</a></strong></span></p>\r\n<p style=\"color: #222222; font-family: arial, sans-serif; font-size: 12.8px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\">Global Auto Transportation is an \"A\" rated business with the Better Business Bureau and we look forward to servicing all of your needs. Our regular business hours are Monday through Friday from&nbsp;<span class=\"aBn\" style=\"border-bottom: 1px dashed #cccccc; position: relative; top: -2px; z-index: 0;\" tabindex=\"0\" data-term=\"goog_622345646\"><span class=\"aQJ\" style=\"position: relative; top: 2px; z-index: -1;\">8AM&nbsp;to 5PM</span></span>&nbsp;and Saturday from&nbsp;<span class=\"aBn\" style=\"border-bottom: 1px dashed #cccccc; position: relative; top: -2px; z-index: 0;\" tabindex=\"0\" data-term=\"goog_622345647\"><span class=\"aQJ\" style=\"position: relative; top: 2px; z-index: -1;\">9AM to 12PM PST</span></span>.</p>\r\n<p style=\"color: #222222; font-family: arial, sans-serif; font-size: 12.8px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\">Sincerely,</p>\r\n<p style=\"color: #222222; font-family: arial, sans-serif; font-size: 12.8px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\"><br />Global Auto Transportation<br />[agent_phone] DIRECT<br />(818) 476-5005 LOCAL<br />(877) 241-2676 TOLL FREE<br /><a href=\"http://www.globalautotransportation.com/\">http://www.globalautotransportation.com/</a>&nbsp;</p>\r\n<p><br style=\"color: #222222; font-family: arial, sans-serif; font-size: 12.8px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\" /><span style=\"color: #222222; font-size: 12.8px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; font-family: arial;\">You are receiving this message because you have requested a quote for your move. To stop receiving messages from Global Auto Transportation [unsubscribe_link].</span></p>', 'tonygreg', '2018-05-02 02:29:10', 'Quote Confirmation Email Template', 'info@globalautotransport.com', 'Global Auto Transport'),
(2, '<p>Dear [fname] [lname]. Thank you for your interest in&nbsp;Global Auto Transportation.&nbsp;Your quote ID is [id]. The price to ship your vehicle [vehicle_info] on [s_via] carrier from [p_city], [p_state] to [d_city], [d_state] is&nbsp;<strong>$</strong><strong>[extra5].</strong>&nbsp;Feel free to call us if you should have any questions. Direct line: [agent_phone]. Click here to unsubscribe [unsubscribe_link].</p>', 'tonygreg', '2018-07-24 12:20:32', 'SMS-QUOTE', 'GLOBAL AUTO TRANSPORT', 'info@globalautotransportation.com'),
(3, '<p>Dear [fname] [lname],<br /><br />The attached file contains your order form for shipping your [vehicle_info] from [p_city], [p_state] to [d_city], [d_state] is&nbsp;<strong>$</strong><span style=\"font-size: 14px;\"><strong>[extra5]</strong></span>. To avoid delays with your shipment, please fax the completed form to 747-477-1186 at your earliest convenience.</p>\r\n<p>[auth_link]</p>\r\n<p>[notes_shipper]<br /><br />Please review the information carefully. If any of the information is in error, please contact us immediately at 818-956-5666, so we may correctly process your order.<br /><br />Sincerely,<br /><br /><br />[agent_name]<br />Global Auto Transportation<br />[agent_phone] DIRECT<br />(818) 476-5005 LOCAL<br />(877) 241-2676 TOLL FREE<br /><a href=\"http://www.globalautotransportation.com/\">http://www.globalautotransportation.com/</a>&nbsp;</p>', 'tonygreg', '2018-08-01 12:56:20', 'Order Authorization Email Template', 'info@globalautotransportation.com', 'Global Auto Transportation'),
(4, '<p>Dear [fname] [lname]. The attached file contains your order form for shipping your [vehicle_info] from [p_city], [p_state] to [d_city], [d_state] is&nbsp;<strong>$</strong><span style=\"font-size: 14px;\"><strong>[extra5]</strong></span>. To avoid delays with the shipment, please&nbsp;sign the form and click Submit [auth_link]. If any of the information is incorrect, please contact us at (818) 476-5005, so we may correctly process your order. Thanks!</p>', 'tonygreg', '2018-08-01 13:25:09', 'SMS-ORDER (Order-quote) ', 'info@globalautotransportation.com', 'Global Auto Transportation');

-- --------------------------------------------------------

--
-- Table structure for table `dot_tracker_login`
--

CREATE TABLE `dot_tracker_login` (
  `id` int(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `ip` text NOT NULL,
  `creationdatetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dot_tracker_login`
--

INSERT INTO `dot_tracker_login` (`id`, `user_id`, `ip`, `creationdatetime`) VALUES
(1, 'tonygreg', '::1', '2018-03-17 01:31:52'),
(2, 'kunalnimje', '::1', '2018-03-17 01:33:15'),
(3, 'sadasda', '::1', '2018-03-17 02:25:58'),
(4, 'sadasda', '::1', '2018-03-17 02:26:10'),
(5, 'tonygreg', '::1', '2018-03-17 23:38:32'),
(6, 'tonygreg', '::1', '2018-03-19 22:55:15'),
(7, 'tonygreg', '::1', '2018-03-23 12:25:53'),
(8, 'tonygreg', '::1', '2018-03-25 20:30:50'),
(9, 'tonygreg', '::1', '2018-03-25 20:49:25'),
(10, 'tonygreg', '::1', '2018-03-25 22:13:04'),
(11, 'tonygreg', '::1', '2018-03-25 22:35:20'),
(12, 'tonygreg', '::1', '2018-03-26 18:05:58'),
(13, 'tonygreg', '::1', '2018-03-30 08:05:49'),
(14, 'tonygreg', '::1', '2018-04-01 01:45:10'),
(15, 'tonygreg', '::1', '2018-04-03 23:24:23'),
(16, 'tonygreg', '::1', '2018-04-04 17:48:57'),
(17, 'tonygreg', '::1', '2018-04-11 23:24:43'),
(18, 'tonygreg', '::1', '2018-04-12 22:42:14'),
(19, 'tonygreg', '::1', '2018-04-13 12:40:15'),
(20, 'tonygreg', '::1', '2018-04-13 15:32:18'),
(21, 'tonygreg', '::1', '2018-04-15 00:35:52'),
(22, 'tonygreg', '::1', '2018-04-17 01:02:13'),
(23, 'tonygreg', '::1', '2018-04-18 01:25:55'),
(24, 'tonygreg', '::1', '2018-04-18 01:30:25'),
(25, 'tonygreg', '::1', '2018-04-18 01:46:41'),
(26, 'kunalnimje', '::1', '2018-04-18 23:17:09'),
(27, 'tonygreg', '::1', '2018-04-19 00:18:53'),
(28, 'kunalnimje', '::1', '2018-04-19 00:20:02'),
(29, 'tonygreg', '::1', '2018-04-20 02:07:10'),
(30, 'tonygreg', '::1', '2018-04-20 02:29:21'),
(31, 'tonygreg', '::1', '2018-04-21 20:15:56'),
(32, 'tonygreg', '::1', '2018-04-23 23:15:13'),
(33, 'tonygreg', '::1', '2018-04-25 22:59:48'),
(34, 'tonygreg', '::1', '2018-04-27 23:40:48'),
(35, 'tonygreg', '::1', '2018-04-28 05:50:58'),
(36, 'tonygreg', '::1', '2018-04-29 10:13:45'),
(37, 'tonygreg', '::1', '2018-04-30 00:49:02'),
(38, 'tonygreg', '::1', '2018-04-30 22:10:57'),
(39, 'tonygreg', '::1', '2018-05-01 01:52:50'),
(40, 'tonygreg', '::1', '2018-05-03 02:04:22'),
(41, 'tonygreg', '::1', '2018-05-04 01:01:53'),
(42, 'tonygreg', '::1', '2018-05-04 02:58:45'),
(43, 'tonygreg', '::1', '2018-05-08 19:07:17'),
(44, 'tonygreg', '::1', '2018-05-10 01:19:05'),
(45, 'tonygreg', '::1', '2018-05-11 00:30:39'),
(46, 'tonygreg', '::1', '2018-05-12 04:27:33'),
(47, 'tonygreg', '::1', '2018-05-17 01:20:42'),
(48, 'tonygreg', '::1', '2018-05-19 10:58:09');

-- --------------------------------------------------------

--
-- Table structure for table `dot_tracker_notes`
--

CREATE TABLE `dot_tracker_notes` (
  `id` int(255) NOT NULL,
  `quote_id` int(255) NOT NULL,
  `date` text NOT NULL,
  `note` text NOT NULL,
  `created_by` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dot_tracker_notes`
--

INSERT INTO `dot_tracker_notes` (`id`, `quote_id`, `date`, `note`, `created_by`) VALUES
(63, 1, '2018-07-25 12:03:25', '2313', 'tonygreg'),
(64, 1, '2018-07-25 12:04:28 pm', '123123123', 'tonygreg'),
(65, 1, '2018/07/25 12:46:53 pm', '11321', 'tonygreg'),
(66, 1, '07/25/2018 12:47:16 pm', '21312312322312312312312312', 'tonygreg'),
(67, 1, '07/25/2018 12:51:18 pm', 'asdassaf', 'tonygreg'),
(68, 6, '08/03/2018 13:56:56 pm', 'saaaaaaaaaa', 'tonygreg'),
(69, 7, '08/03/2018 13:58:49 pm', 'saaaaaaaaaa', 'tonygreg'),
(70, 6, '08/06/2018 10:11:32 am', '456456456', 'tonygreg'),
(71, 6, '08/06/2018 10:30:49 am', 'test1', 'tonygreg'),
(72, 6, '08/06/2018 11:05:12 am', 'test2', 'tonygreg'),
(73, 6, '08/06/2018 11:13:18 am', 'test', 'tonygreg'),
(74, 6, '08/06/2018 11:16:35 am', 'test', 'tonygreg'),
(75, 6, '08/06/2018 11:19:24 am', 'test', 'tonygreg'),
(76, 6, '08/06/2018 11:27:02 am', 'test', 'tonygreg'),
(77, 6, '08/06/2018 11:30:06 am', 'test', 'tonygreg'),
(78, 6, '08/06/2018 11:34:33 am', 'test', 'tonygreg'),
(79, 6, '08/06/2018 11:39:08 am', 'Test', 'tonygreg'),
(80, 6, '08/06/2018 11:42:21 am', 'test', 'tonygreg'),
(81, 6, '08/06/2018 11:43:10 am', 'test', 'tonygreg'),
(82, 6, '08/06/2018 11:44:23 am', 'Test', 'tonygreg'),
(83, 6, '08/06/2018 11:51:40 am', 'test', 'tonygreg'),
(84, 6, '08/06/2018 12:01:19 pm', 'test', 'tonygreg'),
(85, 6, '08/06/2018 12:01:39 pm', 'test', 'tonygreg'),
(86, 6, '08/06/2018 12:02:42 pm', 'test', 'tonygreg'),
(87, 6, '08/06/2018 12:03:13 pm', 'test', 'tonygreg'),
(88, 6, '08/06/2018 12:04:35 pm', 'test', 'tonygreg');

-- --------------------------------------------------------

--
-- Table structure for table `dot_tracker_order_history`
--

CREATE TABLE `dot_tracker_order_history` (
  `id` int(11) NOT NULL,
  `order_id` text NOT NULL,
  `field` text NOT NULL,
  `old_value` text NOT NULL,
  `new_value` text NOT NULL,
  `created_time` text NOT NULL,
  `created_by` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dot_tracker_order_history`
--

INSERT INTO `dot_tracker_order_history` (`id`, `order_id`, `field`, `old_value`, `new_value`, `created_time`, `created_by`) VALUES
(660, '57', 'extra', 'none', '2018-07-17', '2018-07-20 10:07:24', 'tonygreg'),
(661, '57', 'extra1', 'none', '2018-07-24', '2018-07-20 10:07:24', 'tonygreg'),
(662, '57', 'carrier_name', 'none', 'Global Transportation', '2018-07-20 10:07:24', 'tonygreg'),
(663, '57', 'extra2', 'none', '5 business days', '2018-07-20 10:07:24', 'tonygreg'),
(664, '57', 'extra3', 'none', 'receiving a signed Bill of Lading', '2018-07-20 10:07:24', 'tonygreg'),
(665, '57', 'extra4', 'none', 'Company Check', '2018-07-20 10:07:24', 'tonygreg'),
(666, '57', 'dispatch_contact', 'none', 'Tony, Laura', '2018-07-20 10:07:24', 'tonygreg'),
(667, '57', 'dispatch_email', 'none', 'Info@AmPmautotransport.Com', '2018-07-20 10:07:24', 'tonygreg'),
(668, '57', 'dispatch_phone', 'none', '818-956-6686', '2018-07-20 10:07:24', 'tonygreg'),
(669, '57', 'dispatch_fax', 'none', '747-477-1186', '2018-07-20 10:07:24', 'tonygreg'),
(670, '57', 'dispatched_time', '0000-00-00 00:00:00', '2018-07-20 10:07:24', '2018-07-20 10:07:24', 'tonygreg'),
(671, '57', 'Status', '6', '1', '2018-07-20 10:20:11', 'tonygreg'),
(672, '57', 'Status', 'Order', 'On Hold', '2018-07-20 10:26:07', 'tonygreg'),
(673, '57', 'Status', 'On Hold', 'Dispatched', '2018-07-20 10:32:13', 'tonygreg'),
(674, '57', 'extra', 'none', '2018-07-20', '2018-07-20 10:32:22', 'tonygreg'),
(675, '57', 'extra1', 'none', '2018-07-28', '2018-07-20 10:32:22', 'tonygreg'),
(676, '57', 'carrier_name', 'none', 'Global Transportation', '2018-07-20 10:32:22', 'tonygreg'),
(677, '57', 'extra2', 'none', '5 business days', '2018-07-20 10:32:22', 'tonygreg'),
(678, '57', 'extra3', 'none', 'receiving a signed Bill of Lading', '2018-07-20 10:32:22', 'tonygreg'),
(679, '57', 'extra4', 'none', 'Company Check', '2018-07-20 10:32:22', 'tonygreg'),
(680, '57', 'dispatch_contact', 'none', 'Tony, Laura', '2018-07-20 10:32:22', 'tonygreg'),
(681, '57', 'dispatch_email', 'none', 'Info@AmPmautotransport.Com', '2018-07-20 10:32:22', 'tonygreg'),
(682, '57', 'dispatch_phone', 'none', '818-956-6686', '2018-07-20 10:32:22', 'tonygreg'),
(683, '57', 'dispatch_fax', 'none', '747-477-1186', '2018-07-20 10:32:22', 'tonygreg'),
(684, '57', 'dispatched_time', '0000-00-00 00:00:00', '2018-07-20 10:32:23', '2018-07-20 10:32:22', 'tonygreg'),
(685, '57', 'Status', 'Dispatched', 'Order', '2018-07-20 10:32:53', 'tonygreg'),
(686, '57', 'Load Date', '2018-07-20', 'none', '2018-07-20 10:32:53', 'tonygreg'),
(687, '57', 'Delivery Date', '2018-07-28', 'none', '2018-07-20 10:32:53', 'tonygreg'),
(688, '57', 'Status', 'Global Transportation', 'none', '2018-07-20 10:32:53', 'tonygreg'),
(689, '57', 'Status', '5 business days', 'none', '2018-07-20 10:32:53', 'tonygreg'),
(690, '57', 'Status', 'receiving a signed Bill of Lading', 'none', '2018-07-20 10:32:53', 'tonygreg'),
(691, '57', 'Status', 'Company Check', 'none', '2018-07-20 10:32:53', 'tonygreg'),
(692, '57', 'Status', 'Tony, Laura', 'none', '2018-07-20 10:32:53', 'tonygreg'),
(693, '57', 'Status', 'Info@AmPmautotransport.Com', 'none', '2018-07-20 10:32:53', 'tonygreg'),
(694, '57', 'Status', '818-956-6686', 'none', '2018-07-20 10:32:53', 'tonygreg'),
(695, '57', 'Status', '747-477-1186', 'none', '2018-07-20 10:32:53', 'tonygreg'),
(696, '57', 'Status', '2018-07-20 10:32:22', 'none', '2018-07-20 10:32:53', 'tonygreg'),
(697, '57', 'Status', 'Order', 'Not Signed', '2018-07-20 10:34:57', 'tonygreg'),
(698, '57', 'Status', 'Not Signed', 'Order', '2018-07-20 10:39:52', 'tonygreg'),
(699, '57', 'Status', '0000-00-00 00:00:00', 'none', '2018-07-20 10:39:52', 'tonygreg'),
(700, '57', 'Status', 'Order', 'Dispatched', '2018-07-20 10:39:58', 'tonygreg'),
(701, '57', 'carrier_name', 'none', 'Global Transportation', '2018-07-20 10:40:01', 'tonygreg'),
(702, '57', 'extra2', 'none', '5 business days', '2018-07-20 10:40:01', 'tonygreg'),
(703, '57', 'extra3', 'none', 'receiving a signed Bill of Lading', '2018-07-20 10:40:01', 'tonygreg'),
(704, '57', 'extra4', 'none', 'Company Check', '2018-07-20 10:40:01', 'tonygreg'),
(705, '57', 'dispatch_contact', 'none', 'Tony, Laura', '2018-07-20 10:40:01', 'tonygreg'),
(706, '57', 'dispatch_email', 'none', 'Info@AmPmautotransport.Com', '2018-07-20 10:40:01', 'tonygreg'),
(707, '57', 'dispatch_phone', 'none', '818-956-6686', '2018-07-20 10:40:01', 'tonygreg'),
(708, '57', 'dispatch_fax', 'none', '747-477-1186', '2018-07-20 10:40:01', 'tonygreg'),
(709, '57', 'dispatched_time', '0000-00-00 00:00:00', '2018-07-20 10:40:01', '2018-07-20 10:40:01', 'tonygreg'),
(710, '57', 'Status', 'Dispatched', 'Order', '2018-07-20 10:49:32', 'tonygreg'),
(711, '57', 'Status', 'Global Transportation', 'none', '2018-07-20 10:49:33', 'tonygreg'),
(712, '57', 'Status', '5 business days', 'none', '2018-07-20 10:49:33', 'tonygreg'),
(713, '57', 'Status', 'receiving a signed Bill of Lading', 'none', '2018-07-20 10:49:33', 'tonygreg'),
(714, '57', 'Status', 'Company Check', 'none', '2018-07-20 10:49:33', 'tonygreg'),
(715, '57', 'Status', 'Tony, Laura', 'none', '2018-07-20 10:49:33', 'tonygreg'),
(716, '57', 'Status', 'Info@AmPmautotransport.Com', 'none', '2018-07-20 10:49:33', 'tonygreg'),
(717, '57', 'Status', '818-956-6686', 'none', '2018-07-20 10:49:33', 'tonygreg'),
(718, '57', 'Status', '747-477-1186', 'none', '2018-07-20 10:49:33', 'tonygreg'),
(719, '57', 'Status', '2018-07-20 10:40:01', 'none', '2018-07-20 10:49:33', 'tonygreg'),
(720, '57', 'Status', 'Order', 'Dispatched', '2018-07-20 10:49:39', 'tonygreg'),
(721, '57', 'carrier_name', 'none', 'Global Transportation', '2018-07-20 10:49:42', 'tonygreg'),
(722, '57', 'extra2', 'none', '5 business days', '2018-07-20 10:49:42', 'tonygreg'),
(723, '57', 'extra3', 'none', 'receiving a signed Bill of Lading', '2018-07-20 10:49:42', 'tonygreg'),
(724, '57', 'extra4', 'none', 'Company Check', '2018-07-20 10:49:42', 'tonygreg'),
(725, '57', 'dispatch_contact', 'none', 'Tony, Laura', '2018-07-20 10:49:42', 'tonygreg'),
(726, '57', 'dispatch_email', 'none', 'Info@AmPmautotransport.Com', '2018-07-20 10:49:42', 'tonygreg'),
(727, '57', 'dispatch_phone', 'none', '818-956-6686', '2018-07-20 10:49:42', 'tonygreg'),
(728, '57', 'dispatch_fax', 'none', '747-477-1186', '2018-07-20 10:49:42', 'tonygreg'),
(729, '57', 'dispatched_time', '0000-00-00 00:00:00', '2018-07-20 10:49:42', '2018-07-20 10:49:42', 'tonygreg'),
(730, '57', 'Status', 'Dispatched', 'Order', '2018-07-20 10:51:41', 'tonygreg'),
(731, '57', 'Status', 'Global Transportation', 'none', '2018-07-20 10:51:41', 'tonygreg'),
(732, '57', 'Status', '5 business days', 'none', '2018-07-20 10:51:41', 'tonygreg'),
(733, '57', 'Status', 'receiving a signed Bill of Lading', 'none', '2018-07-20 10:51:41', 'tonygreg'),
(734, '57', 'Status', 'Company Check', 'none', '2018-07-20 10:51:41', 'tonygreg'),
(735, '57', 'Status', 'Tony, Laura', 'none', '2018-07-20 10:51:41', 'tonygreg'),
(736, '57', 'Status', 'Info@AmPmautotransport.Com', 'none', '2018-07-20 10:51:41', 'tonygreg'),
(737, '57', 'Status', '818-956-6686', 'none', '2018-07-20 10:51:41', 'tonygreg'),
(738, '57', 'Status', '747-477-1186', 'none', '2018-07-20 10:51:41', 'tonygreg'),
(739, '57', 'Status', '2018-07-20 10:49:42', 'none', '2018-07-20 10:51:41', 'tonygreg'),
(740, '57', 'Status', 'Order', 'Dispatched', '2018-07-20 10:51:46', 'tonygreg'),
(741, '57', 'extra2', 'none', '5 business days', '2018-07-20 10:51:55', 'tonygreg'),
(742, '57', 'extra3', 'none', 'receiving a signed Bill of Lading', '2018-07-20 10:51:55', 'tonygreg'),
(743, '57', 'extra4', 'none', 'Company Check', '2018-07-20 10:51:55', 'tonygreg'),
(744, '57', 'dispatched_time', '0000-00-00 00:00:00', '2018-07-20 10:51:55', '2018-07-20 10:51:55', 'tonygreg'),
(745, '57', 'Status', 'Dispatched', 'Order', '2018-07-20 10:52:50', 'tonygreg'),
(746, '57', 'Status', '5 business days', 'none', '2018-07-20 10:52:50', 'tonygreg'),
(747, '57', 'Status', 'receiving a signed Bill of Lading', 'none', '2018-07-20 10:52:50', 'tonygreg'),
(748, '57', 'Status', 'Company Check', 'none', '2018-07-20 10:52:51', 'tonygreg'),
(749, '57', 'Status', '2018-07-20 10:51:55', 'none', '2018-07-20 10:52:51', 'tonygreg'),
(750, '57', 'Status', 'Dispatched', 'Order', '2018-07-20 10:53:05', 'tonygreg'),
(751, '57', 'Status', '5 business days', 'none', '2018-07-20 10:53:05', 'tonygreg'),
(752, '57', 'Status', 'receiving a signed Bill of Lading', 'none', '2018-07-20 10:53:05', 'tonygreg'),
(753, '57', 'Status', 'Company Check', 'none', '2018-07-20 10:53:05', 'tonygreg'),
(754, '57', 'Status', '2018-07-20 10:51:55', 'none', '2018-07-20 10:53:06', 'tonygreg'),
(755, '57', 'Status', 'Dispatched', 'Order', '2018-07-20 10:53:18', 'tonygreg'),
(756, '57', 'Status', '5 business days', 'none', '2018-07-20 10:53:18', 'tonygreg'),
(757, '57', 'Status', 'receiving a signed Bill of Lading', 'none', '2018-07-20 10:53:18', 'tonygreg'),
(758, '57', 'Status', 'Company Check', 'none', '2018-07-20 10:53:18', 'tonygreg'),
(759, '57', 'Status', '2018-07-20 10:51:55', 'none', '2018-07-20 10:53:18', 'tonygreg'),
(760, '57', 'Status', 'Order', 'Dispatched', '2018-07-20 10:57:18', 'tonygreg'),
(761, '57', 'extra2', 'none', '5 business days', '2018-07-20 10:57:21', 'tonygreg'),
(762, '57', 'extra3', 'none', 'receiving a signed Bill of Lading', '2018-07-20 10:57:21', 'tonygreg'),
(763, '57', 'extra4', 'none', 'Company Check', '2018-07-20 10:57:21', 'tonygreg'),
(764, '57', 'dispatched_time', '0000-00-00 00:00:00', '2018-07-20 10:57:21', '2018-07-20 10:57:21', 'tonygreg'),
(765, '57', 'Status', 'Dispatched', 'Order', '2018-07-20 10:58:26', 'tonygreg'),
(766, '57', 'Status', '5 business days', 'none', '2018-07-20 10:58:26', 'tonygreg'),
(767, '57', 'Status', 'receiving a signed Bill of Lading', 'none', '2018-07-20 10:58:26', 'tonygreg'),
(768, '57', 'Status', 'Company Check', 'none', '2018-07-20 10:58:26', 'tonygreg'),
(769, '57', 'Status', '2018-07-20 10:57:21', 'none', '2018-07-20 10:58:26', 'tonygreg'),
(770, '57', 'Status', 'Order', 'Dispatched', '2018-07-20 10:58:34', 'tonygreg'),
(771, '57', 'dispatched_time', '0000-00-00 00:00:00', '2018-07-20 10:58:43', '2018-07-20 10:58:43', 'tonygreg'),
(772, '57', 'Status', 'Dispatched', 'Order', '2018-07-20 11:01:18', 'tonygreg'),
(773, '57', 'Status', '2018-07-20 10:58:43', 'none', '2018-07-20 11:01:18', 'tonygreg'),
(774, '57', 'Status', 'Order', 'Not Signed', '2018-07-20 11:01:23', 'tonygreg'),
(775, '57', 'Status', 'Not Signed', 'On Hold', '2018-07-20 11:04:44', 'tonygreg'),
(776, '57', 'Status', '0000-00-00 00:00:00', 'none', '2018-07-20 11:04:44', 'tonygreg'),
(777, '57', 'Status', 'On Hold', 'Order', '2018-07-20 11:04:47', 'tonygreg'),
(778, '57', 'Status', 'Order', 'Not Signed', '2018-07-20 11:04:49', 'tonygreg'),
(779, '57', 'dispatched_time', '0000-00-00 00:00:00', '2018-07-20 11:05:01', '2018-07-20 11:05:01', 'tonygreg'),
(780, '57', 'Status', 'Not Signed', 'Order', '2018-07-20 12:44:17', 'tonygreg'),
(781, '57', 'Status', '2018-07-20 11:05:01', 'none', '2018-07-20 12:44:17', 'tonygreg'),
(782, '57', 'Status', 'Order', 'Dispatched', '2018-07-20 12:44:26', 'tonygreg'),
(783, '57', 'extra2', 'none', '5 business days', '2018-07-20 12:44:39', 'tonygreg'),
(784, '57', 'extra3', 'none', 'receiving a signed Bill of Lading', '2018-07-20 12:44:39', 'tonygreg'),
(785, '57', 'extra4', 'none', 'Company Check', '2018-07-20 12:44:39', 'tonygreg'),
(786, '57', 'dispatched_time', '0000-00-00 00:00:00', '2018-07-20 12:44:39', '2018-07-20 12:44:39', 'tonygreg'),
(787, '57', 'Status', 'Dispatched', 'Order', '2018-07-20 12:45:50', 'tonygreg'),
(788, '57', 'Status', '5 business days', 'none', '2018-07-20 12:45:50', 'tonygreg'),
(789, '57', 'Status', 'receiving a signed Bill of Lading', 'none', '2018-07-20 12:45:50', 'tonygreg'),
(790, '57', 'Status', 'Company Check', 'none', '2018-07-20 12:45:50', 'tonygreg'),
(791, '57', 'Status', '2018-07-20 12:44:39', 'none', '2018-07-20 12:45:50', 'tonygreg'),
(792, '57', 'Status', 'Order', 'Dispatched', '2018-07-20 12:45:56', 'tonygreg'),
(793, '57', 'extra', 'none', '2018-07-20', '2018-07-20 12:46:04', 'tonygreg'),
(794, '57', 'extra1', 'none', '2018-07-28', '2018-07-20 12:46:04', 'tonygreg'),
(795, '57', 'carrier_name', 'none', 'Global Transportation', '2018-07-20 12:46:04', 'tonygreg'),
(796, '57', 'extra2', 'none', '5 business days', '2018-07-20 12:46:04', 'tonygreg'),
(797, '57', 'extra3', 'none', 'receiving a signed Bill of Lading', '2018-07-20 12:46:04', 'tonygreg'),
(798, '57', 'extra4', 'none', 'Company Check', '2018-07-20 12:46:04', 'tonygreg'),
(799, '57', 'dispatch_contact', 'none', 'Tony, Laura', '2018-07-20 12:46:04', 'tonygreg'),
(800, '57', 'dispatch_email', 'none', 'Info@AmPmautotransport.Com', '2018-07-20 12:46:04', 'tonygreg'),
(801, '57', 'dispatch_phone', 'none', '818-956-6686', '2018-07-20 12:46:04', 'tonygreg'),
(802, '57', 'dispatch_fax', 'none', '747-477-1186', '2018-07-20 12:46:04', 'tonygreg'),
(803, '57', 'dispatched_time', '0000-00-00 00:00:00', '2018-07-20 12:46:05', '2018-07-20 12:46:04', 'tonygreg'),
(804, '57', 'Status', 'Dispatched', 'Order', '2018-07-20 13:27:26', 'tonygreg'),
(805, '57', 'Load Date', '2018-07-20', 'none', '2018-07-20 13:27:26', 'tonygreg'),
(806, '57', 'Delivery Date', '2018-07-28', 'none', '2018-07-20 13:27:26', 'tonygreg'),
(807, '57', 'Status', 'Global Transportation', 'none', '2018-07-20 13:27:26', 'tonygreg'),
(808, '57', 'Status', '5 business days', 'none', '2018-07-20 13:27:26', 'tonygreg'),
(809, '57', 'Status', 'receiving a signed Bill of Lading', 'none', '2018-07-20 13:27:26', 'tonygreg'),
(810, '57', 'Status', 'Company Check', 'none', '2018-07-20 13:27:26', 'tonygreg'),
(811, '57', 'Status', 'Tony, Laura', 'none', '2018-07-20 13:27:26', 'tonygreg'),
(812, '57', 'Status', 'Info@AmPmautotransport.Com', 'none', '2018-07-20 13:27:26', 'tonygreg'),
(813, '57', 'Status', '818-956-6686', 'none', '2018-07-20 13:27:26', 'tonygreg'),
(814, '57', 'Status', '747-477-1186', 'none', '2018-07-20 13:27:26', 'tonygreg'),
(815, '57', 'Status', '2018-07-20 12:46:04', 'none', '2018-07-20 13:27:26', 'tonygreg'),
(816, '57', 'Status', 'Order', 'Dispatched', '2018-07-20 13:27:30', 'tonygreg'),
(817, '57', 'carrier_name', 'none', 'Global Transportation', '2018-07-20 13:31:46', 'tonygreg'),
(818, '57', 'extra2', 'none', '5 business days', '2018-07-20 13:31:46', 'tonygreg'),
(819, '57', 'extra3', 'none', 'receiving a signed Bill of Lading', '2018-07-20 13:31:46', 'tonygreg'),
(820, '57', 'extra4', 'none', 'Company Check', '2018-07-20 13:31:46', 'tonygreg'),
(821, '57', 'dispatch_contact', 'none', 'Tony, Laura', '2018-07-20 13:31:46', 'tonygreg'),
(822, '57', 'dispatch_email', 'none', 'yxw165730@gmail.com', '2018-07-20 13:31:46', 'tonygreg'),
(823, '57', 'dispatch_phone', 'none', '818-956-6686', '2018-07-20 13:31:46', 'tonygreg'),
(824, '57', 'dispatch_fax', 'none', '747-477-1186', '2018-07-20 13:31:46', 'tonygreg'),
(825, '57', 'dispatched_time', '0000-00-00 00:00:00', '2018-07-20 13:31:46', '2018-07-20 13:31:46', 'tonygreg'),
(826, '57', 'd_phone1', 'none', '4699105086', '2018-07-20 13:31:46', 'tonygreg'),
(827, '57', 's_vrun', '0', '1', '2018-07-20 14:13:44', 'tonygreg'),
(828, '57', 'Status', 'Dispatched', 'Order', '2018-07-20 14:14:07', 'tonygreg'),
(829, '57', 'Status', 'Global Transportation', 'none', '2018-07-20 14:14:07', 'tonygreg'),
(830, '57', 'Status', '5 business days', 'none', '2018-07-20 14:14:07', 'tonygreg'),
(831, '57', 'Status', 'receiving a signed Bill of Lading', 'none', '2018-07-20 14:14:07', 'tonygreg'),
(832, '57', 'Status', 'Company Check', 'none', '2018-07-20 14:14:07', 'tonygreg'),
(833, '57', 'Status', 'Tony, Laura', 'none', '2018-07-20 14:14:07', 'tonygreg'),
(834, '57', 'Status', 'yxw165730@gmail.com', 'none', '2018-07-20 14:14:07', 'tonygreg'),
(835, '57', 'Status', '818-956-6686', 'none', '2018-07-20 14:14:07', 'tonygreg'),
(836, '57', 'Status', '747-477-1186', 'none', '2018-07-20 14:14:07', 'tonygreg'),
(837, '57', 'Status', '2018-07-20 13:31:46', 'none', '2018-07-20 14:14:07', 'tonygreg'),
(838, '57', 'Status', 'Order', 'Dispatched', '2018-07-20 14:14:10', 'tonygreg'),
(839, '57', 'extra', 'none', '2018-07-20', '2018-07-20 14:14:19', 'tonygreg'),
(840, '57', 'extra1', 'none', '2018-07-17', '2018-07-20 14:14:19', 'tonygreg'),
(841, '57', 'carrier_name', 'none', 'Global Transportation', '2018-07-20 14:14:19', 'tonygreg'),
(842, '57', 'extra2', 'none', '5 business days', '2018-07-20 14:14:19', 'tonygreg'),
(843, '57', 'extra3', 'none', 'receiving a signed Bill of Lading', '2018-07-20 14:14:19', 'tonygreg'),
(844, '57', 'extra4', 'none', 'Company Check', '2018-07-20 14:14:19', 'tonygreg'),
(845, '57', 'dispatch_contact', 'none', 'Tony, Laura', '2018-07-20 14:14:19', 'tonygreg'),
(846, '57', 'dispatch_email', 'none', 'Info@AmPmautotransport.Com', '2018-07-20 14:14:19', 'tonygreg'),
(847, '57', 'dispatch_phone', 'none', '818-956-6686', '2018-07-20 14:14:19', 'tonygreg'),
(848, '57', 'dispatch_fax', 'none', '747-477-1186', '2018-07-20 14:14:19', 'tonygreg'),
(849, '57', 'dispatched_time', '0000-00-00 00:00:00', '2018-07-20 14:14:19', '2018-07-20 14:14:19', 'tonygreg'),
(850, '57', 'Status', 'Dispatched', 'Order', '2018-07-20 16:26:45', 'tonygreg'),
(851, '57', 'Load Date', '2018-07-20', 'none', '2018-07-20 16:26:45', 'tonygreg'),
(852, '57', 'Delivery Date', '2018-07-17', 'none', '2018-07-20 16:26:45', 'tonygreg'),
(853, '57', 'Status', 'Global Transportation', 'none', '2018-07-20 16:26:45', 'tonygreg'),
(854, '57', 'Status', '5 business days', 'none', '2018-07-20 16:26:45', 'tonygreg'),
(855, '57', 'Status', 'receiving a signed Bill of Lading', 'none', '2018-07-20 16:26:45', 'tonygreg'),
(856, '57', 'Status', 'Company Check', 'none', '2018-07-20 16:26:45', 'tonygreg'),
(857, '57', 'Status', 'Tony, Laura', 'none', '2018-07-20 16:26:45', 'tonygreg'),
(858, '57', 'Status', 'Info@AmPmautotransport.Com', 'none', '2018-07-20 16:26:45', 'tonygreg'),
(859, '57', 'Status', '818-956-6686', 'none', '2018-07-20 16:26:45', 'tonygreg'),
(860, '57', 'Status', '747-477-1186', 'none', '2018-07-20 16:26:45', 'tonygreg'),
(861, '57', 'Status', '2018-07-20 14:14:19', 'none', '2018-07-20 16:26:45', 'tonygreg'),
(862, '57', 'Status', 'Order', 'Dispatched', '2018-07-20 16:26:49', 'tonygreg'),
(863, '57', 'extra', 'none', '2018-07-20', '2018-07-20 16:26:58', 'tonygreg'),
(864, '57', 'extra1', 'none', '2018-07-31', '2018-07-20 16:26:58', 'tonygreg'),
(865, '57', 'carrier_name', 'none', 'Global Transportation', '2018-07-20 16:26:58', 'tonygreg'),
(866, '57', 'extra2', 'none', '5 business days', '2018-07-20 16:26:58', 'tonygreg'),
(867, '57', 'extra3', 'none', 'receiving a signed Bill of Lading', '2018-07-20 16:26:58', 'tonygreg'),
(868, '57', 'extra4', 'none', 'Company Check', '2018-07-20 16:26:58', 'tonygreg'),
(869, '57', 'dispatch_contact', 'none', 'Tony, Laura', '2018-07-20 16:26:58', 'tonygreg'),
(870, '57', 'dispatch_email', 'none', 'Info@AmPmautotransport.Com', '2018-07-20 16:26:58', 'tonygreg'),
(871, '57', 'dispatch_phone', 'none', '818-956-6686', '2018-07-20 16:26:58', 'tonygreg'),
(872, '57', 'dispatch_fax', 'none', '747-477-1186', '2018-07-20 16:26:58', 'tonygreg'),
(873, '57', 'dispatched_time', '0000-00-00 00:00:00', '2018-07-20 16:26:58', '2018-07-20 16:26:58', 'tonygreg'),
(874, '57', 'Status', 'Dispatched', 'Order', '2018-07-23 12:23:15', 'tonygreg'),
(875, '57', 'Load Date', '2018-07-20', 'none', '2018-07-23 12:23:15', 'tonygreg'),
(876, '57', 'Delivery Date', '2018-07-31', 'none', '2018-07-23 12:23:15', 'tonygreg'),
(877, '57', 'Status', 'Global Transportation', 'none', '2018-07-23 12:23:15', 'tonygreg'),
(878, '57', 'Status', '5 business days', 'none', '2018-07-23 12:23:15', 'tonygreg'),
(879, '57', 'Status', 'receiving a signed Bill of Lading', 'none', '2018-07-23 12:23:16', 'tonygreg'),
(880, '57', 'Status', 'Company Check', 'none', '2018-07-23 12:23:16', 'tonygreg'),
(881, '57', 'Status', 'Tony, Laura', 'none', '2018-07-23 12:23:16', 'tonygreg'),
(882, '57', 'Status', 'Info@AmPmautotransport.Com', 'none', '2018-07-23 12:23:16', 'tonygreg'),
(883, '57', 'Status', '818-956-6686', 'none', '2018-07-23 12:23:16', 'tonygreg'),
(884, '57', 'Status', '747-477-1186', 'none', '2018-07-23 12:23:16', 'tonygreg'),
(885, '57', 'Status', '2018-07-20 16:26:58', 'none', '2018-07-23 12:23:16', 'tonygreg'),
(886, '57', 'Status', 'Order', 'Dispatched', '2018-07-23 12:25:55', 'tonygreg'),
(887, '57', 'extra', 'none', '2018-07-04', '2018-07-23 12:26:03', 'tonygreg'),
(888, '57', 'extra1', 'none', '2018-07-13', '2018-07-23 12:26:03', 'tonygreg'),
(889, '57', 'carrier_name', 'none', 'Global Transportation', '2018-07-23 12:26:03', 'tonygreg'),
(890, '57', 'extra2', 'none', '5 business days', '2018-07-23 12:26:03', 'tonygreg'),
(891, '57', 'extra3', 'none', 'receiving a signed Bill of Lading', '2018-07-23 12:26:03', 'tonygreg'),
(892, '57', 'extra4', 'none', 'Company Check', '2018-07-23 12:26:03', 'tonygreg'),
(893, '57', 'dispatch_contact', 'none', 'Tony, Laura', '2018-07-23 12:26:03', 'tonygreg'),
(894, '57', 'dispatch_email', 'none', 'Info@AmPmautotransport.Com', '2018-07-23 12:26:03', 'tonygreg'),
(895, '57', 'dispatch_phone', 'none', '818-956-6686', '2018-07-23 12:26:03', 'tonygreg'),
(896, '57', 'dispatch_fax', 'none', '747-477-1186', '2018-07-23 12:26:03', 'tonygreg'),
(897, '57', 'dispatched_time', 'none', '2018-07-23 12:26:03', '2018-07-23 12:26:03', 'tonygreg'),
(898, '57', 'Status', 'Dispatched', 'Order', '2018-07-23 12:26:28', 'tonygreg'),
(899, '57', 'Load Date', '2018-07-04', 'none', '2018-07-23 12:26:28', 'tonygreg'),
(900, '57', 'Delivery Date', '2018-07-13', 'none', '2018-07-23 12:26:28', 'tonygreg'),
(901, '57', 'Status', 'Global Transportation', 'none', '2018-07-23 12:26:28', 'tonygreg'),
(902, '57', 'Status', '5 business days', 'none', '2018-07-23 12:26:28', 'tonygreg'),
(903, '57', 'Status', 'receiving a signed Bill of Lading', 'none', '2018-07-23 12:26:28', 'tonygreg'),
(904, '57', 'Status', 'Company Check', 'none', '2018-07-23 12:26:28', 'tonygreg'),
(905, '57', 'Status', 'Tony, Laura', 'none', '2018-07-23 12:26:28', 'tonygreg'),
(906, '57', 'Status', 'Info@AmPmautotransport.Com', 'none', '2018-07-23 12:26:28', 'tonygreg'),
(907, '57', 'Status', '818-956-6686', 'none', '2018-07-23 12:26:28', 'tonygreg'),
(908, '57', 'Status', '747-477-1186', 'none', '2018-07-23 12:26:28', 'tonygreg'),
(909, '57', 'Status', '2018-07-23 12:26:03', 'none', '2018-07-23 12:26:28', 'tonygreg'),
(910, '57', 'Status', 'Order', 'Dispatched', '2018-07-23 12:28:50', 'tonygreg'),
(911, '57', 'extra', 'none', '2018-07-01', '2018-07-23 12:28:59', 'tonygreg'),
(912, '57', 'extra1', 'none', '2018-07-13', '2018-07-23 12:28:59', 'tonygreg'),
(913, '57', 'carrier_name', 'none', 'Global Transportation', '2018-07-23 12:28:59', 'tonygreg'),
(914, '57', 'extra2', 'none', '5 business days', '2018-07-23 12:28:59', 'tonygreg'),
(915, '57', 'extra3', 'none', 'receiving a signed Bill of Lading', '2018-07-23 12:28:59', 'tonygreg'),
(916, '57', 'extra4', 'none', 'Company Check', '2018-07-23 12:28:59', 'tonygreg'),
(917, '57', 'dispatch_contact', 'none', 'Tony, Laura', '2018-07-23 12:28:59', 'tonygreg'),
(918, '57', 'dispatch_email', 'none', 'Info@AmPmautotransport.Com', '2018-07-23 12:28:59', 'tonygreg'),
(919, '57', 'dispatch_phone', 'none', '818-956-6686', '2018-07-23 12:28:59', 'tonygreg'),
(920, '57', 'dispatch_fax', 'none', '747-477-1186', '2018-07-23 12:28:59', 'tonygreg'),
(921, '57', 'dispatched_time', '0000-00-00 00:00:00', '2018-07-23 12:28:59', '2018-07-23 12:28:59', 'tonygreg'),
(922, '57', 'Status', 'Dispatched', 'Order', '2018-07-23 12:32:22', 'tonygreg'),
(923, '57', 'Load Date', '2018-07-01', 'none', '2018-07-23 12:32:22', 'tonygreg'),
(924, '57', 'Delivery Date', '2018-07-13', 'none', '2018-07-23 12:32:22', 'tonygreg'),
(925, '57', 'Status', 'Global Transportation', 'none', '2018-07-23 12:32:22', 'tonygreg'),
(926, '57', 'Status', '5 business days', 'none', '2018-07-23 12:32:22', 'tonygreg'),
(927, '57', 'Status', 'receiving a signed Bill of Lading', 'none', '2018-07-23 12:32:22', 'tonygreg'),
(928, '57', 'Status', 'Company Check', 'none', '2018-07-23 12:32:22', 'tonygreg'),
(929, '57', 'Status', 'Tony, Laura', 'none', '2018-07-23 12:32:23', 'tonygreg'),
(930, '57', 'Status', 'Info@AmPmautotransport.Com', 'none', '2018-07-23 12:32:23', 'tonygreg'),
(931, '57', 'Status', '818-956-6686', 'none', '2018-07-23 12:32:23', 'tonygreg'),
(932, '57', 'Status', '747-477-1186', 'none', '2018-07-23 12:32:23', 'tonygreg'),
(933, '57', 'Status', '2018-07-23 12:28:59', 'none', '2018-07-23 12:32:23', 'tonygreg'),
(934, '57', 'Status', 'Order', 'On Hold', '2018-07-23 12:37:15', 'tonygreg'),
(935, '57', 'Status', 'On Hold', 'Dispatched', '2018-07-23 12:37:27', 'tonygreg'),
(936, '57', 'extra', 'none', '2018-07-05', '2018-07-23 12:37:36', 'tonygreg'),
(937, '57', 'extra1', 'none', '2018-07-13', '2018-07-23 12:37:36', 'tonygreg'),
(938, '57', 'carrier_name', 'none', 'AmPm Transportation', '2018-07-23 12:37:36', 'tonygreg'),
(939, '57', 'extra2', 'none', '5 business days', '2018-07-23 12:37:36', 'tonygreg'),
(940, '57', 'extra3', 'none', 'receiving a signed Bill of Lading', '2018-07-23 12:37:36', 'tonygreg'),
(941, '57', 'extra4', 'none', 'Company Check', '2018-07-23 12:37:36', 'tonygreg'),
(942, '57', 'dispatch_contact', 'none', 'Tony, Laura', '2018-07-23 12:37:36', 'tonygreg'),
(943, '57', 'dispatch_email', 'none', 'Info@AmPmautotransport.Com', '2018-07-23 12:37:36', 'tonygreg'),
(944, '57', 'dispatch_phone', 'none', '818-956-6686', '2018-07-23 12:37:36', 'tonygreg'),
(945, '57', 'dispatch_fax', 'none', '747-477-1186', '2018-07-23 12:37:36', 'tonygreg'),
(946, '57', 'dispatched_time', '0000-00-00 00:00:00', '2018-07-23 12:37:36', '2018-07-23 12:37:36', 'tonygreg'),
(947, '57', 'Status', 'Dispatched', 'Issues', '2018-07-23 12:37:53', 'tonygreg'),
(948, '57', 'Status', 'Issues', 'Dispatched', '2018-07-23 12:38:15', 'tonygreg'),
(949, '57', 'dispatched_time', '2018-07-23 12:37:36', '2018-07-23 12:38:30', '2018-07-23 12:38:30', 'tonygreg'),
(950, '57', 'Status', 'Dispatched', 'Issues', '2018-07-23 12:39:05', 'tonygreg'),
(951, '57', 'Status', 'Issues', 'Dispatched', '2018-07-23 12:46:18', 'tonygreg'),
(952, '57', 'Status', 'Dispatched', 'Order', '2018-07-25 11:07:24', 'tonygreg'),
(953, '57', 'Load Date', '2018-07-05', 'none', '2018-07-25 11:07:24', 'tonygreg'),
(954, '57', 'Delivery Date', '2018-07-13', 'none', '2018-07-25 11:07:24', 'tonygreg'),
(955, '57', 'Status', 'AmPm Transportation', 'none', '2018-07-25 11:07:24', 'tonygreg'),
(956, '57', 'Status', '5 business days', 'none', '2018-07-25 11:07:24', 'tonygreg'),
(957, '57', 'Status', 'receiving a signed Bill of Lading', 'none', '2018-07-25 11:07:24', 'tonygreg'),
(958, '57', 'Status', 'Company Check', 'none', '2018-07-25 11:07:24', 'tonygreg'),
(959, '57', 'Status', 'Tony, Laura', 'none', '2018-07-25 11:07:24', 'tonygreg'),
(960, '57', 'Status', 'Info@AmPmautotransport.Com', 'none', '2018-07-25 11:07:24', 'tonygreg'),
(961, '57', 'Status', '818-956-6686', 'none', '2018-07-25 11:07:24', 'tonygreg'),
(962, '57', 'Status', '747-477-1186', 'none', '2018-07-25 11:07:24', 'tonygreg'),
(963, '57', 'Status', '2018-07-23 12:38:30', 'none', '2018-07-25 11:07:24', 'tonygreg'),
(964, '57', 'Status', 'Order', 'Dispatched', '2018-07-25 11:07:30', 'tonygreg'),
(965, '57', 'Status', 'Dispatched', 'Order', '2018-07-25 12:40:18', 'tonygreg'),
(966, '57', 'Status', '0000-00-00 00:00:00', 'none', '2018-07-25 12:40:18', 'tonygreg'),
(967, '57', 'Status', 'Order', 'Order', '2018-07-25 12:40:26', 'tonygreg'),
(968, '57', 'Status', 'Order', 'Dispatched', '2018-07-25 12:40:29', 'tonygreg'),
(969, '57', 'extra', 'none', '2018-07-25', '2018-07-25 12:40:37', 'tonygreg'),
(970, '57', 'extra1', 'none', '2018-07-26', '2018-07-25 12:40:37', 'tonygreg'),
(971, '57', 'carrier_name', 'none', 'Global Transportation', '2018-07-25 12:40:37', 'tonygreg'),
(972, '57', 'extra2', 'none', '5 business days', '2018-07-25 12:40:37', 'tonygreg'),
(973, '57', 'extra3', 'none', 'receiving a signed Bill of Lading', '2018-07-25 12:40:37', 'tonygreg'),
(974, '57', 'extra4', 'none', 'Company Check', '2018-07-25 12:40:37', 'tonygreg'),
(975, '57', 'dispatch_contact', 'none', 'Tony, Laura', '2018-07-25 12:40:37', 'tonygreg'),
(976, '57', 'dispatch_email', 'none', 'Info@AmPmautotransport.Com', '2018-07-25 12:40:37', 'tonygreg'),
(977, '57', 'dispatch_phone', 'none', '818-956-6686', '2018-07-25 12:40:37', 'tonygreg'),
(978, '57', 'dispatch_fax', 'none', '747-477-1186', '2018-07-25 12:40:37', 'tonygreg'),
(979, '57', 'Status', 'Dispatched', 'Order', '2018-07-25 12:41:37', 'tonygreg'),
(980, '57', 'Load Date', '2018-07-25', 'none', '2018-07-25 12:41:38', 'tonygreg'),
(981, '57', 'Delivery Date', '2018-07-26', 'none', '2018-07-25 12:41:38', 'tonygreg'),
(982, '57', 'Status', 'Global Transportation', 'none', '2018-07-25 12:41:38', 'tonygreg'),
(983, '57', 'Status', '5 business days', 'none', '2018-07-25 12:41:38', 'tonygreg'),
(984, '57', 'Status', 'receiving a signed Bill of Lading', 'none', '2018-07-25 12:41:38', 'tonygreg'),
(985, '57', 'Status', 'Company Check', 'none', '2018-07-25 12:41:38', 'tonygreg'),
(986, '57', 'Status', 'Tony, Laura', 'none', '2018-07-25 12:41:38', 'tonygreg'),
(987, '57', 'Status', 'Info@AmPmautotransport.Com', 'none', '2018-07-25 12:41:38', 'tonygreg'),
(988, '57', 'Status', '818-956-6686', 'none', '2018-07-25 12:41:38', 'tonygreg'),
(989, '57', 'Status', '747-477-1186', 'none', '2018-07-25 12:41:38', 'tonygreg'),
(990, '57', 'Status', '0000-00-00 00:00:00', 'none', '2018-07-25 12:41:38', 'tonygreg'),
(991, '57', 'Status', 'Order', 'Dispatched', '2018-07-25 12:41:41', 'tonygreg'),
(992, '57', 'extra', 'none', '2018-07-07', '2018-07-25 12:41:56', 'tonygreg'),
(993, '57', 'extra1', 'none', '2018-07-05', '2018-07-25 12:41:56', 'tonygreg'),
(994, '57', 'carrier_name', 'none', 'Global Transportation', '2018-07-25 12:41:56', 'tonygreg'),
(995, '57', 'extra2', 'none', '5 business days', '2018-07-25 12:41:56', 'tonygreg'),
(996, '57', 'extra3', 'none', 'receiving a signed Bill of Lading', '2018-07-25 12:41:56', 'tonygreg'),
(997, '57', 'extra4', 'none', 'Company Check', '2018-07-25 12:41:56', 'tonygreg'),
(998, '57', 'dispatch_contact', 'none', 'Tony, Laura', '2018-07-25 12:41:56', 'tonygreg'),
(999, '57', 'dispatch_email', 'none', 'Info@AmPmautotransport.Com', '2018-07-25 12:41:56', 'tonygreg'),
(1000, '57', 'dispatch_phone', 'none', '818-956-6686', '2018-07-25 12:41:56', 'tonygreg'),
(1001, '57', 'dispatch_fax', 'none', '747-477-1186', '2018-07-25 12:41:56', 'tonygreg'),
(1002, '57', 'Status', 'Dispatched', 'Order', '2018-07-25 12:43:44', 'tonygreg'),
(1003, '57', 'Load Date', '2018-07-07', 'none', '2018-07-25 12:43:44', 'tonygreg'),
(1004, '57', 'Delivery Date', '2018-07-05', 'none', '2018-07-25 12:43:44', 'tonygreg'),
(1005, '57', 'Status', 'Global Transportation', 'none', '2018-07-25 12:43:44', 'tonygreg'),
(1006, '57', 'Status', '5 business days', 'none', '2018-07-25 12:43:44', 'tonygreg'),
(1007, '57', 'Status', 'receiving a signed Bill of Lading', 'none', '2018-07-25 12:43:44', 'tonygreg'),
(1008, '57', 'Status', 'Company Check', 'none', '2018-07-25 12:43:44', 'tonygreg'),
(1009, '57', 'Status', 'Tony, Laura', 'none', '2018-07-25 12:43:44', 'tonygreg'),
(1010, '57', 'Status', 'Info@AmPmautotransport.Com', 'none', '2018-07-25 12:43:44', 'tonygreg'),
(1011, '57', 'Status', '818-956-6686', 'none', '2018-07-25 12:43:44', 'tonygreg'),
(1012, '57', 'Status', '747-477-1186', 'none', '2018-07-25 12:43:44', 'tonygreg'),
(1013, '57', 'Status', '0000-00-00 00:00:00', 'none', '2018-07-25 12:43:44', 'tonygreg'),
(1014, '57', 'Status', 'Order', 'Dispatched', '2018-07-25 12:43:48', 'tonygreg'),
(1015, '57', 'extra', 'none', '2018-07-14', '2018-07-25 12:43:54', 'tonygreg'),
(1016, '57', 'extra1', 'none', '2018-07-20', '2018-07-25 12:43:54', 'tonygreg'),
(1017, '57', 'carrier_name', 'none', 'Global Transportation', '2018-07-25 12:43:54', 'tonygreg'),
(1018, '57', 'extra2', 'none', '5 business days', '2018-07-25 12:43:54', 'tonygreg'),
(1019, '57', 'extra3', 'none', 'receiving a signed Bill of Lading', '2018-07-25 12:43:54', 'tonygreg'),
(1020, '57', 'extra4', 'none', 'Company Check', '2018-07-25 12:43:54', 'tonygreg'),
(1021, '57', 'dispatch_contact', 'none', 'Tony, Laura', '2018-07-25 12:43:54', 'tonygreg'),
(1022, '57', 'dispatch_email', 'none', 'Info@AmPmautotransport.Com', '2018-07-25 12:43:54', 'tonygreg'),
(1023, '57', 'dispatch_phone', 'none', '818-956-6686', '2018-07-25 12:43:54', 'tonygreg'),
(1024, '57', 'dispatch_fax', 'none', '747-477-1186', '2018-07-25 12:43:54', 'tonygreg'),
(1025, '4', 'fname', 'asd', 'Yan', '07/25/2018 17:14:41 pm', 'tonygreg'),
(1026, '4', 'lname', 'das', 'Wang', '07/25/2018 17:14:41 pm', 'tonygreg'),
(1027, '4', 'company', '1', 'YYY', '07/25/2018 17:14:41 pm', 'tonygreg'),
(1028, '4', 'p_zip', '11111', '222', '07/25/2018 17:14:41 pm', 'tonygreg'),
(1029, '4', 's_date', '06/20/2018', '07/27/2018', '07/25/2018 17:14:41 pm', 'tonygreg'),
(1030, '4', 's_vrun', 'Yes', 'No', '07/25/2018 17:14:41 pm', 'tonygreg'),
(1031, '4', 's_via', 'Open', 'Enclosed', '07/25/2018 17:14:41 pm', 'tonygreg'),
(1032, '4', 'Vehicle_tariff1', '500', '600', '07/25/2018 17:14:41 pm', 'tonygreg'),
(1033, '4', 'Vehicle_deposit1', '150', '200', '07/25/2018 17:14:41 pm', 'tonygreg'),
(1034, '4', 'Vehicle_year1', '2013', '2014', '07/25/2018 17:14:41 pm', 'tonygreg'),
(1035, '4', 'Vehicle_make1', 'jkbsfdk', 'Ford', '07/25/2018 17:14:41 pm', 'tonygreg'),
(1036, '4', 'Vehicle_model1', 'Baleno', 'Fusion', '07/25/2018 17:14:41 pm', 'tonygreg'),
(1037, '4', 'Vehicle_type1', 'Sedan Small', 'Coupe', '07/25/2018 17:14:41 pm', 'tonygreg'),
(1038, '4', 'extra5', '500.00', '600.00', '07/25/2018 17:14:41 pm', 'tonygreg'),
(1039, '4', 'extra6', '150.00', '200.00', '07/25/2018 17:14:41 pm', 'tonygreg'),
(1040, '4', 'd_zip', '11111', '222', '07/25/2018 17:14:41 pm', 'tonygreg'),
(1041, '4', 'fname', 'Yan', 'Yannnn', '07/26/2018 08:52:06 am', 'tonygreg'),
(1042, '4', 'lname', 'Wang', 'Wanggggg', '07/26/2018 08:52:06 am', 'tonygreg'),
(1043, '58', 'save_as_default', 'none', '0', '07/26/2018 09:33:46 am', 'tonygreg'),
(1044, '59', 'save_as_default', 'none', '0', '07/26/2018 09:34:17 am', 'tonygreg'),
(1045, '59', 'status', 'none', 'Need to Follow Up', '07/26/2018 09:34:17 am', 'tonygreg'),
(1046, '59', 'fname', 'none', 'Yan', '07/26/2018 09:34:17 am', 'tonygreg'),
(1047, '59', 'lname', 'none', 'Wang', '07/26/2018 09:34:17 am', 'tonygreg'),
(1048, '59', 'company', 'none', 'ASDF', '07/26/2018 09:34:17 am', 'tonygreg'),
(1049, '59', 'email', 'none', 'yxw165730@gmail.com', '07/26/2018 09:34:17 am', 'tonygreg'),
(1050, '59', 'phone1', 'none', '4699105086', '07/26/2018 09:34:17 am', 'tonygreg'),
(1051, '59', 'mobile', 'none', '4699105086', '07/26/2018 09:34:17 am', 'tonygreg'),
(1052, '59', 'address1', 'none', '2009 Burbank Blvd', '07/26/2018 09:34:17 am', 'tonygreg'),
(1053, '59', 'city', 'none', 'Burbank', '07/26/2018 09:34:17 am', 'tonygreg'),
(1054, '59', 'state', 'none', 'CA', '07/26/2018 09:34:17 am', 'tonygreg'),
(1055, '59', 'zip', 'none', '90321', '07/26/2018 09:34:17 am', 'tonygreg'),
(1056, '59', 'p_city', 'none', 'Burbank', '07/26/2018 09:34:17 am', 'tonygreg'),
(1057, '59', 'p_state', 'none', 'CA', '07/26/2018 09:34:17 am', 'tonygreg'),
(1058, '59', 'p_zip', 'none', '90321', '07/26/2018 09:34:17 am', 'tonygreg'),
(1059, '59', 's_date', 'none', '07/29/2018', '07/26/2018 09:34:17 am', 'tonygreg'),
(1060, '59', 's_vrun', 'none', 'Yes', '07/26/2018 09:34:17 am', 'tonygreg'),
(1061, '59', 's_via', 'none', 'Open', '07/26/2018 09:34:17 am', 'tonygreg'),
(1062, '59', 'Vehicle_tariff1', 'none', '200', '07/26/2018 09:34:17 am', 'tonygreg'),
(1063, '59', 'Vehicle_deposit1', 'none', '150', '07/26/2018 09:34:17 am', 'tonygreg'),
(1064, '59', 'Vehicle_year1', 'none', '1999', '07/26/2018 09:34:17 am', 'tonygreg'),
(1065, '59', 'Vehicle_make1', 'none', 'sdsad', '07/26/2018 09:34:17 am', 'tonygreg'),
(1066, '59', 'Vehicle_model1', 'none', 'Baleno', '07/26/2018 09:34:17 am', 'tonygreg'),
(1067, '59', 'Vehicle_type1', 'none', 'Van Pop-Top', '07/26/2018 09:34:17 am', 'tonygreg'),
(1068, '59', 'referred_by', 'none', 'Dealership', '07/26/2018 09:34:17 am', 'tonygreg'),
(1069, '59', 'extra5', 'none', '200.00', '07/26/2018 09:34:17 am', 'tonygreg'),
(1070, '59', 'extra6', 'none', '150.00', '07/26/2018 09:34:17 am', 'tonygreg'),
(1071, '59', 'created_by', 'none', 'tonygreg', '07/26/2018 09:34:17 am', 'tonygreg'),
(1072, '59', 'creationdatetime', 'none', '2018-07-26 09:22:18', '07/26/2018 09:34:17 am', 'tonygreg'),
(1073, '59', 'd_city', 'none', 'Burbank', '07/26/2018 09:34:17 am', 'tonygreg'),
(1074, '59', 'd_state', 'none', 'CA', '07/26/2018 09:34:17 am', 'tonygreg'),
(1075, '59', 'd_zip', 'none', '90321', '07/26/2018 09:34:17 am', 'tonygreg'),
(1076, '59', 'quote_id', 'none', '7', '07/26/2018 09:34:17 am', 'tonygreg'),
(1077, '59', 'id', 'none', '59', '07/26/2018 09:34:17 am', 'tonygreg'),
(1078, '60', 'save_as_default', 'none', 'No', '07/26/2018 09:46:00 am', 'tonygreg'),
(1079, '60', 'status', 'none', 'Order', '07/26/2018 09:46:00 am', 'tonygreg'),
(1080, '60', 'fname', 'none', 'Yan', '07/26/2018 09:46:00 am', 'tonygreg'),
(1081, '60', 'lname', 'none', 'Wang', '07/26/2018 09:46:00 am', 'tonygreg'),
(1082, '60', 'company', 'none', 'ASDF', '07/26/2018 09:46:00 am', 'tonygreg'),
(1083, '60', 'email', 'none', 'yxw165730@gmail.com', '07/26/2018 09:46:00 am', 'tonygreg'),
(1084, '60', 'phone1', 'none', '4699105086', '07/26/2018 09:46:00 am', 'tonygreg'),
(1085, '60', 'mobile', 'none', '4699105086', '07/26/2018 09:46:00 am', 'tonygreg'),
(1086, '60', 'address1', 'none', '2009 Burbank Blvd', '07/26/2018 09:46:00 am', 'tonygreg'),
(1087, '60', 'city', 'none', 'Burbank', '07/26/2018 09:46:00 am', 'tonygreg'),
(1088, '60', 'state', 'none', 'CA', '07/26/2018 09:46:00 am', 'tonygreg'),
(1089, '60', 'zip', 'none', '90321', '07/26/2018 09:46:00 am', 'tonygreg'),
(1090, '60', 'p_city', 'none', 'Burbank', '07/26/2018 09:46:00 am', 'tonygreg'),
(1091, '60', 'p_state', 'none', 'CA', '07/26/2018 09:46:00 am', 'tonygreg'),
(1092, '60', 'p_zip', 'none', '90321', '07/26/2018 09:46:00 am', 'tonygreg'),
(1093, '60', 's_date', 'none', '07/29/2018', '07/26/2018 09:46:00 am', 'tonygreg'),
(1094, '60', 's_vrun', 'none', 'Yes', '07/26/2018 09:46:00 am', 'tonygreg'),
(1095, '60', 's_via', 'none', 'Open', '07/26/2018 09:46:00 am', 'tonygreg'),
(1096, '60', 'Vehicle_tariff1', 'none', '200', '07/26/2018 09:46:00 am', 'tonygreg'),
(1097, '60', 'Vehicle_deposit1', 'none', '150', '07/26/2018 09:46:00 am', 'tonygreg'),
(1098, '60', 'Vehicle_year1', 'none', '1999', '07/26/2018 09:46:00 am', 'tonygreg'),
(1099, '60', 'Vehicle_make1', 'none', 'sdsad', '07/26/2018 09:46:00 am', 'tonygreg'),
(1100, '60', 'Vehicle_model1', 'none', 'Baleno', '07/26/2018 09:46:00 am', 'tonygreg'),
(1101, '60', 'Vehicle_type1', 'none', 'Van Pop-Top', '07/26/2018 09:46:00 am', 'tonygreg'),
(1102, '60', 'referred_by', 'none', 'Dealership', '07/26/2018 09:46:00 am', 'tonygreg'),
(1103, '60', 'extra5', 'none', '200.00', '07/26/2018 09:46:00 am', 'tonygreg'),
(1104, '60', 'extra6', 'none', '150.00', '07/26/2018 09:46:00 am', 'tonygreg'),
(1105, '60', 'created_by', 'none', 'tonygreg', '07/26/2018 09:46:00 am', 'tonygreg'),
(1106, '60', 'creationdatetime', 'none', '2018-07-26 09:21:59', '07/26/2018 09:46:00 am', 'tonygreg'),
(1107, '60', 'd_city', 'none', 'Burbank', '07/26/2018 09:46:00 am', 'tonygreg'),
(1108, '60', 'd_state', 'none', 'CA', '07/26/2018 09:46:00 am', 'tonygreg'),
(1109, '60', 'd_zip', 'none', '90321', '07/26/2018 09:46:00 am', 'tonygreg'),
(1110, '60', 'quote_id', 'none', '6', '07/26/2018 09:46:00 am', 'tonygreg'),
(1111, '60', 'id', 'none', '60', '07/26/2018 09:46:00 am', 'tonygreg'),
(1112, '60', 'bal_paid_by', 'none', 'COD to Cariier', '07/26/2018 09:46:10 am', 'tonygreg'),
(1113, '60', 'cod_method', 'none', 'Check', '07/26/2018 09:46:10 am', 'tonygreg'),
(1114, '58', 'fname', 'Yan', 'Yann', '07/26/2018 10:22:15 am', 'tonygreg'),
(1115, '58', 'company', 'ASDF', 'ASDFg', '07/26/2018 10:22:15 am', 'tonygreg'),
(1116, '58', 'bal_paid_by', 'none', 'COD to Cariier', '07/26/2018 10:22:15 am', 'tonygreg'),
(1117, '58', 'cod_method', 'none', 'Check', '07/26/2018 10:22:15 am', 'tonygreg'),
(1118, '58', 'company', 'ASDFg', 'none', '07/26/2018 10:22:37 am', 'tonygreg'),
(1119, '58', 'p_companyname', 'none', '123456', '07/26/2018 10:22:37 am', 'tonygreg'),
(1120, '58', 's_date', '07/29/2018', '07/28/2018', '07/26/2018 10:22:58 am', 'tonygreg'),
(1121, '58', 's_vrun', 'No', 'No', '07/26/2018 10:22:58 am', 'tonygreg'),
(1122, '58', 's_via', 'Enclosed', 'Enclosed', '07/26/2018 10:22:58 am', 'tonygreg'),
(1123, '58', 'Vehicle_make1', 'sdsad', 'Ford', '07/26/2018 10:22:58 am', 'tonygreg'),
(1124, '58', 's_via', 'Open', 'Open', '07/26/2018 10:23:10 am', 'tonygreg'),
(1125, '58', 's_vrun', 'Yes', 'Yes', '07/26/2018 10:24:03 am', 'tonygreg'),
(1126, '58', 's_vrun', 'Yes', 'No', '07/26/2018 10:29:12 am', 'tonygreg'),
(1127, '58', 's_via', 'Open', 'Enclosed', '07/26/2018 10:29:12 am', 'tonygreg'),
(1128, '58', 'Vehicle_tariff1', '200', '300', '07/26/2018 10:31:59 am', 'tonygreg'),
(1129, '58', 'Vehicle_deposit1', '150', '200', '07/26/2018 10:31:59 am', 'tonygreg'),
(1130, '58', 'Vehicle_make1', 'Ford', 'F', '07/26/2018 10:31:59 am', 'tonygreg'),
(1131, '58', 'Vehicle_model1', 'Baleno', 'B', '07/26/2018 10:31:59 am', 'tonygreg'),
(1132, '58', 'Vehicle_type1', 'Sedan Midsize', 'Convertible', '07/26/2018 10:47:18 am', 'tonygreg'),
(1133, '58', 'Vehicle_tariff1', '300', '200', '07/26/2018 10:47:49 am', 'tonygreg'),
(1134, '58', 'Vehicle_deposit1', '200', '150', '07/26/2018 10:47:49 am', 'tonygreg'),
(1135, '58', 'Vehicle_year1', '1999', '2002', '07/26/2018 10:47:49 am', 'tonygreg'),
(1136, '58', 'Vehicle_make1', 'F', 'FF', '07/26/2018 10:47:49 am', 'tonygreg'),
(1137, '58', 'Vehicle_model1', 'B', 'FF', '07/26/2018 10:47:49 am', 'tonygreg'),
(1138, '58', 'Vehicle_type1', 'Convertible', 'SUV Mid-size', '07/26/2018 10:47:49 am', 'tonygreg'),
(1139, '58', 'extra5', '300', '200', '07/26/2018 10:47:49 am', 'tonygreg'),
(1140, '58', 'extra6', '200', '150', '07/26/2018 10:47:49 am', 'tonygreg'),
(1141, '58', 'Vehicle_color1', 'red', 'blue', '07/26/2018 10:50:10 am', 'tonygreg'),
(1142, '58', 'Vehicle_plate1', 'none', '111', '07/26/2018 11:06:12 am', 'tonygreg'),
(1143, '58', 'Vehicle_vin1', '2131245656', 'none', '07/26/2018 11:06:12 am', 'tonygreg'),
(1144, '61', 'save_as_default', 'none', 'No', '07/26/2018 11:09:10 am', 'tonygreg'),
(1145, '61', 'status', 'none', 'Order', '07/26/2018 11:09:10 am', 'tonygreg'),
(1146, '61', 'fname', 'none', 'Yan', '07/26/2018 11:09:10 am', 'tonygreg'),
(1147, '61', 'lname', 'none', 'Wang', '07/26/2018 11:09:10 am', 'tonygreg'),
(1148, '61', 'company', 'none', 'ASDF', '07/26/2018 11:09:10 am', 'tonygreg'),
(1149, '61', 'mobile', 'none', '4699105086', '07/26/2018 11:09:10 am', 'tonygreg'),
(1150, '61', 'address1', 'none', '2009 Burbank Blvd', '07/26/2018 11:09:10 am', 'tonygreg'),
(1151, '61', 'city', 'none', 'Burbank', '07/26/2018 11:09:10 am', 'tonygreg'),
(1152, '61', 'state', 'none', 'CA', '07/26/2018 11:09:10 am', 'tonygreg'),
(1153, '61', 'zip', 'none', '90321', '07/26/2018 11:09:10 am', 'tonygreg'),
(1154, '61', 'p_address1', 'none', '2009 Burbank Blvd', '07/26/2018 11:09:10 am', 'tonygreg'),
(1155, '61', 'p_city', 'none', 'Burbank', '07/26/2018 11:09:10 am', 'tonygreg'),
(1156, '61', 'p_zip', 'none', '90321', '07/26/2018 11:09:10 am', 'tonygreg'),
(1157, '61', 'p_state', 'none', 'CA', '07/26/2018 11:09:10 am', 'tonygreg'),
(1158, '61', 'd_address', 'none', '2009 Burbank Blvd', '07/26/2018 11:09:10 am', 'tonygreg'),
(1159, '61', 'd_city', 'none', 'Burbank', '07/26/2018 11:09:10 am', 'tonygreg'),
(1160, '61', 'd_state', 'none', 'CA', '07/26/2018 11:09:10 am', 'tonygreg'),
(1161, '61', 'd_zip', 'none', '90321', '07/26/2018 11:09:10 am', 'tonygreg'),
(1162, '61', 's_date', 'none', '07/28/2018', '07/26/2018 11:09:10 am', 'tonygreg'),
(1163, '61', 's_vrun', 'none', 'No', '07/26/2018 11:09:10 am', 'tonygreg'),
(1164, '61', 's_via', 'none', 'Enclosed', '07/26/2018 11:09:10 am', 'tonygreg'),
(1165, '61', 'Vehicle_tariff1', 'none', '500', '07/26/2018 11:09:10 am', 'tonygreg'),
(1166, '61', 'Vehicle_deposit1', 'none', '150', '07/26/2018 11:09:10 am', 'tonygreg'),
(1167, '61', 'Vehicle_year1', 'none', '2013', '07/26/2018 11:09:10 am', 'tonygreg'),
(1168, '61', 'Vehicle_make1', 'none', 'jkbsfdk', '07/26/2018 11:09:10 am', 'tonygreg'),
(1169, '61', 'Vehicle_model1', 'none', 'fusion', '07/26/2018 11:09:10 am', 'tonygreg'),
(1170, '61', 'Vehicle_type1', 'none', 'Sedan Midsize', '07/26/2018 11:09:10 am', 'tonygreg'),
(1171, '61', 'Vehicle_color1', 'none', 'red', '07/26/2018 11:09:10 am', 'tonygreg'),
(1172, '61', 'Vehicle_plate1', 'none', '222', '07/26/2018 11:09:10 am', 'tonygreg'),
(1173, '61', 'Vehicle_vin1', 'none', '2131245656', '07/26/2018 11:09:10 am', 'tonygreg'),
(1174, '61', 'Vehicle_lot1', 'none', '111', '07/26/2018 11:09:10 am', 'tonygreg'),
(1175, '61', 'extra5', 'none', '500', '07/26/2018 11:09:10 am', 'tonygreg'),
(1176, '61', 'extra6', 'none', '150', '07/26/2018 11:09:10 am', 'tonygreg'),
(1177, '61', 'carrier_pay', 'none', '350', '07/26/2018 11:09:10 am', 'tonygreg'),
(1178, '61', 'referred_by', 'none', 'Unknown', '07/26/2018 11:09:10 am', 'tonygreg'),
(1179, '61', 'creationdatetime', 'none', '2018-07-26 11:09:11', '07/26/2018 11:09:10 am', 'tonygreg'),
(1180, '61', 'created_by', 'none', 'tonygreg', '07/26/2018 11:09:10 am', 'tonygreg'),
(1181, '61', 'id', 'none', '61', '07/26/2018 11:09:10 am', 'tonygreg'),
(1182, '61', 'Status', 'Order', 'Dispatched', '07/26/2018 11:18:01 am', 'tonygreg'),
(1183, '61', 'bal_paid_by', 'none', 'COD to Cariier', '07/26/2018 11:30:04 am', 'tonygreg'),
(1184, '61', 'cod_method', 'none', 'Check', '07/26/2018 11:30:04 am', 'tonygreg'),
(1185, '61', 'extra', 'none', '2018-07-29', '07/26/2018 11:30:04 am', 'tonygreg'),
(1186, '61', 'extra1', 'none', '2018-07-31', '07/26/2018 11:30:04 am', 'tonygreg'),
(1187, '61', 'carrier_name', 'none', 'AmPm Transportation', '07/26/2018 11:30:04 am', 'tonygreg'),
(1188, '61', 'extra2', 'none', '5 business days', '07/26/2018 11:30:04 am', 'tonygreg'),
(1189, '61', 'extra3', 'none', 'receiving a signed Bill of Lading', '07/26/2018 11:30:04 am', 'tonygreg'),
(1190, '61', 'extra4', 'none', 'Company Check', '07/26/2018 11:30:04 am', 'tonygreg'),
(1191, '61', 'dispatch_contact', 'none', 'Tony, Laura', '07/26/2018 11:30:04 am', 'tonygreg'),
(1192, '61', 'dispatch_email', 'none', 'Info@AmPmautotransport.Com', '07/26/2018 11:30:04 am', 'tonygreg'),
(1193, '61', 'dispatch_phone', 'none', '818-956-6686', '07/26/2018 11:30:04 am', 'tonygreg'),
(1194, '61', 'dispatch_fax', 'none', '747-477-1186', '07/26/2018 11:30:04 am', 'tonygreg'),
(1195, '61', 'dispatched_time', 'none', '07/26/2018 11:30:04 am', '07/26/2018 11:30:04 am', 'tonygreg'),
(1196, '61', 'Status', 'Order', 'Dispatched', '07/26/2018 11:33:31 am', 'tonygreg'),
(1197, '57', 'fname', 'Yan', 'Yann', '07/26/2018 15:48:21 pm', 'tonygreg'),
(1198, '57', 'Status', 'Dispatched', 'Order', '07/27/2018 15:17:45 pm', 'tonygreg'),
(1199, '57', 'Load Date', '2018-07-14', 'none', '07/27/2018 15:17:45 pm', 'tonygreg'),
(1200, '57', 'Delivery Date', '2018-07-20', 'none', '07/27/2018 15:17:45 pm', 'tonygreg'),
(1201, '57', 'carrier Name', 'Global Transportation', 'none', '07/27/2018 15:17:45 pm', 'tonygreg'),
(1202, '57', 'Carrier Pmt Term', '5 business days', 'none', '07/27/2018 15:17:45 pm', 'tonygreg'),
(1203, '57', 'Carrier Pmt Term Begin', 'receiving a signed Bill of Lading', 'none', '07/27/2018 15:17:45 pm', 'tonygreg'),
(1204, '57', 'Carrier Pmt Method', 'Company Check', 'none', '07/27/2018 15:17:45 pm', 'tonygreg'),
(1205, '57', 'Dispatch Contact', 'Tony, Laura', 'none', '07/27/2018 15:17:45 pm', 'tonygreg'),
(1206, '57', 'Dispatch Email', 'Info@AmPmautotransport.Com', 'none', '07/27/2018 15:17:45 pm', 'tonygreg'),
(1207, '57', 'Dispatch Phone', '818-956-6686', 'none', '07/27/2018 15:17:45 pm', 'tonygreg'),
(1208, '57', 'Dispatch Fax', '747-477-1186', 'none', '07/27/2018 15:17:45 pm', 'tonygreg'),
(1209, '57', 'Dispatched Time', '0000-00-00 00:00:00', 'none', '07/27/2018 15:17:45 pm', 'tonygreg'),
(1210, '59', 'bal_paid_by', 'COD to Cariier', 'Additional Shipper Pre-payment', '07/31/2018 11:09:15 am', 'tonygreg'),
(1211, '57', 'Assigned to', 'tonygreg', 'kunalnimje', '07/31/2018 11:34:57 am', 'admin'),
(1212, '58', 'Status', 'Order', 'Dispatched', '07/31/2018 13:25:47 pm', 'tonygreg'),
(1213, '58', 'Status', 'Dispatched', 'Dispatched', '07/31/2018 13:26:04 pm', 'tonygreg'),
(1214, '58', 'Status', 'Dispatched', 'Order', '07/31/2018 15:17:08 pm', 'tonygreg'),
(1215, '61', 'Status', 'Dispatched', 'Order', '07/31/2018 15:17:13 pm', 'tonygreg'),
(1216, '61', 'Load Date', '2018-07-29', 'none', '07/31/2018 15:17:13 pm', 'tonygreg'),
(1217, '61', 'Delivery Date', '2018-07-31', 'none', '07/31/2018 15:17:13 pm', 'tonygreg'),
(1218, '61', 'carrier Name', 'AmPm Transportation', 'none', '07/31/2018 15:17:13 pm', 'tonygreg'),
(1219, '61', 'Carrier Pmt Term', '5 business days', 'none', '07/31/2018 15:17:13 pm', 'tonygreg'),
(1220, '61', 'Carrier Pmt Term Begin', 'receiving a signed Bill of Lading', 'none', '07/31/2018 15:17:13 pm', 'tonygreg'),
(1221, '61', 'Carrier Pmt Method', 'Company Check', 'none', '07/31/2018 15:17:13 pm', 'tonygreg'),
(1222, '61', 'Dispatch Contact', 'Tony, Laura', 'none', '07/31/2018 15:17:13 pm', 'tonygreg'),
(1223, '61', 'Dispatch Email', 'Info@AmPmautotransport.Com', 'none', '07/31/2018 15:17:13 pm', 'tonygreg'),
(1224, '61', 'Dispatch Phone', '818-956-6686', 'none', '07/31/2018 15:17:13 pm', 'tonygreg'),
(1225, '61', 'Dispatch Fax', '747-477-1186', 'none', '07/31/2018 15:17:13 pm', 'tonygreg'),
(1226, '61', 'Dispatched Time', '07/26/2018 11:30:04 am', 'none', '07/31/2018 15:17:13 pm', 'tonygreg'),
(1227, '57', 'extra', 'none', '2018-07-11', '07/31/2018 15:42:17 pm', 'kunalnimje'),
(1228, '57', 'extra1', 'none', '2018-07-20', '07/31/2018 15:42:17 pm', 'kunalnimje'),
(1229, '57', 'carrier_name', 'none', 'AmPm Transportation', '07/31/2018 15:42:17 pm', 'kunalnimje'),
(1230, '57', 'extra2', 'none', '5 business days', '07/31/2018 15:42:17 pm', 'kunalnimje'),
(1231, '57', 'extra3', 'none', 'receiving a signed Bill of Lading', '07/31/2018 15:42:17 pm', 'kunalnimje'),
(1232, '57', 'extra4', 'none', 'Company Check', '07/31/2018 15:42:17 pm', 'kunalnimje'),
(1233, '57', 'dispatch_contact', 'none', 'Tony, Laura', '07/31/2018 15:42:17 pm', 'kunalnimje'),
(1234, '57', 'dispatch_email', 'none', 'Info@AmPmautotransport.Com', '07/31/2018 15:42:17 pm', 'kunalnimje'),
(1235, '57', 'dispatch_phone', 'none', '818-956-6686', '07/31/2018 15:42:17 pm', 'kunalnimje'),
(1236, '57', 'dispatch_fax', 'none', '747-477-1186', '07/31/2018 15:42:17 pm', 'kunalnimje'),
(1237, '57', 'dispatched_time', 'none', '07/31/2018 15:42:17 pm', '07/31/2018 15:42:17 pm', 'kunalnimje'),
(1238, '57', 'status', '1', '5', '07/31/2018 15:42:17 pm', 'kunalnimje'),
(1239, '61', 'Vehicle_lot1', '111', '111', '08/01/2018 11:06:57 am', 'tonygreg');
INSERT INTO `dot_tracker_order_history` (`id`, `order_id`, `field`, `old_value`, `new_value`, `created_time`, `created_by`) VALUES
(1240, '61', 'extra', 'none', '2018-08-25', '08/02/2018 09:41:57 am', 'tonygreg'),
(1241, '61', 'extra1', 'none', '2018-08-29', '08/02/2018 09:41:57 am', 'tonygreg'),
(1242, '61', 'carrier_name', 'none', 'AmPm Transportation', '08/02/2018 09:41:57 am', 'tonygreg'),
(1243, '61', 'extra2', 'none', '5 business days', '08/02/2018 09:41:57 am', 'tonygreg'),
(1244, '61', 'extra3', 'none', 'receiving a signed Bill of Lading', '08/02/2018 09:41:57 am', 'tonygreg'),
(1245, '61', 'extra4', 'none', 'Company Check', '08/02/2018 09:41:57 am', 'tonygreg'),
(1246, '61', 'dispatch_contact', 'none', 'Tony, Laura', '08/02/2018 09:41:57 am', 'tonygreg'),
(1247, '61', 'dispatch_email', 'none', 'Info@AmPmautotransport.Com', '08/02/2018 09:41:57 am', 'tonygreg'),
(1248, '61', 'dispatch_phone', 'none', '818-956-6686', '08/02/2018 09:41:57 am', 'tonygreg'),
(1249, '61', 'dispatch_fax', 'none', '747-477-1186', '08/02/2018 09:41:57 am', 'tonygreg'),
(1250, '61', 'dispatched_time', 'none', '08/02/2018 09:41:57 am', '08/02/2018 09:41:57 am', 'tonygreg'),
(1251, '61', 'status', 'Order', 'Dispatched', '08/02/2018 09:41:57 am', 'tonygreg'),
(1252, '61', 'email', 'none', 'YanWang@gmail.com', '08/09/2018 13:43:10 pm', 'tonygreg'),
(1253, '61', 'Vehicle_lot1', '111', '111', '08/09/2018 13:43:10 pm', 'tonygreg');

-- --------------------------------------------------------

--
-- Table structure for table `dot_tracker_payment1`
--

CREATE TABLE `dot_tracker_payment1` (
  `id` int(11) NOT NULL,
  `order_id` int(255) NOT NULL,
  `date_received` text NOT NULL,
  `payment_from_to` text NOT NULL,
  `amount` text NOT NULL,
  `notes` text,
  `method` text,
  `transaction_id` text,
  `cc` text,
  `credit_card_type` text,
  `other` text,
  `expiration_date` text,
  `authorization_code` text,
  `check_number` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dot_tracker_payment1`
--

INSERT INTO `dot_tracker_payment1` (`id`, `order_id`, `date_received`, `payment_from_to`, `amount`, `notes`, `method`, `transaction_id`, `cc`, `credit_card_type`, `other`, `expiration_date`, `authorization_code`, `check_number`) VALUES
(1, 58, '2018-07-26', 'Company to Carrier', '50', '0000000', 'Other', '22222', NULL, '', '', '', '', ''),
(2, 58, '2018-07-28', 'Company to Carrier', '100', '', 'Comcheck', '123456', '', '', '', '', '', '1111'),
(3, 58, '07/31/2018', 'Carrier to Company', '50', '', 'Personal check', '123456', '', '', '', '', '', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `dot_tracker_payment2`
--

CREATE TABLE `dot_tracker_payment2` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `deposit` text,
  `bal_due` text,
  `other` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dot_tracker_payment2`
--

INSERT INTO `dot_tracker_payment2` (`id`, `order_id`, `deposit`, `bal_due`, `other`) VALUES
(1, 58, '150', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `dot_tracker_quote_history`
--

CREATE TABLE `dot_tracker_quote_history` (
  `id` int(11) NOT NULL,
  `quote_id` text NOT NULL,
  `field` text NOT NULL,
  `old_value` text NOT NULL,
  `new_value` text NOT NULL,
  `created_time` text NOT NULL,
  `created_by` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dot_tracker_quote_history`
--

INSERT INTO `dot_tracker_quote_history` (`id`, `quote_id`, `field`, `old_value`, `new_value`, `created_time`, `created_by`) VALUES
(1, '1', 'status', 'none', '3', '2018-07-24 12:26:18', 'tonygreg'),
(2, '1', 'fname', 'none', 'Yan', '2018-07-24 12:26:18', 'tonygreg'),
(3, '1', 'lname', 'none', 'Wang', '2018-07-24 12:26:18', 'tonygreg'),
(4, '1', 'company', 'none', 'ASDF', '2018-07-24 12:26:18', 'tonygreg'),
(5, '1', 'email', 'none', 'yxw165730@gmail.com', '2018-07-24 12:26:18', 'tonygreg'),
(6, '1', 'phone1', 'none', '4699105086', '2018-07-24 12:26:18', 'tonygreg'),
(7, '1', 'mobile', 'none', '4699105086', '2018-07-24 12:26:18', 'tonygreg'),
(8, '1', 'address1', 'none', '2009 Burbank Blvd', '2018-07-24 12:26:18', 'tonygreg'),
(9, '1', 'city', 'none', 'Burbank', '2018-07-24 12:26:18', 'tonygreg'),
(10, '1', 'state', 'none', 'CA', '2018-07-24 12:26:18', 'tonygreg'),
(11, '1', 'country', 'none', '1', '2018-07-24 12:26:18', 'tonygreg'),
(12, '1', 'zip', 'none', '90321', '2018-07-24 12:26:18', 'tonygreg'),
(13, '1', 'p_city', 'none', 'Burbank', '2018-07-24 12:26:18', 'tonygreg'),
(14, '1', 'p_zip', 'none', '90321', '2018-07-24 12:26:18', 'tonygreg'),
(15, '1', 'p_state', 'none', 'CA', '2018-07-24 12:26:18', 'tonygreg'),
(16, '1', 'p_country', 'none', '1', '2018-07-24 12:26:18', 'tonygreg'),
(17, '1', 'd_city', 'none', 'Burbank', '2018-07-24 12:26:18', 'tonygreg'),
(18, '1', 'd_zip', 'none', '90321', '2018-07-24 12:26:18', 'tonygreg'),
(19, '1', 'd_state', 'none', 'CA', '2018-07-24 12:26:18', 'tonygreg'),
(20, '1', 'd_country', 'none', '1', '2018-07-24 12:26:18', 'tonygreg'),
(21, '1', 's_date', 'none', '2018-07-04', '2018-07-24 12:26:18', 'tonygreg'),
(22, '1', 's_vrun', 'none', '1', '2018-07-24 12:26:18', 'tonygreg'),
(23, '1', 's_via', 'none', '1', '2018-07-24 12:26:18', 'tonygreg'),
(24, '1', 'Vehicle_tariff1', 'none', '200', '2018-07-24 12:26:18', 'tonygreg'),
(25, '1', 'Vehicle_deposit1', 'none', '150', '2018-07-24 12:26:18', 'tonygreg'),
(26, '1', 'Vehicle_year1', 'none', '2013', '2018-07-24 12:26:18', 'tonygreg'),
(27, '1', 'Vehicle_make1', 'none', 'ford', '2018-07-24 12:26:18', 'tonygreg'),
(28, '1', 'Vehicle_model1', 'none', 'fusion', '2018-07-24 12:26:18', 'tonygreg'),
(29, '1', 'Vehicle_type1', 'none', '9', '2018-07-24 12:26:18', 'tonygreg'),
(30, '1', 'extra5', 'none', '200', '2018-07-24 12:26:18', 'tonygreg'),
(31, '1', 'extra6', 'none', '150', '2018-07-24 12:26:18', 'tonygreg'),
(32, '1', 'creationdatetime', 'none', '2018-07-24 12:26:18', '2018-07-24 12:26:18', 'tonygreg'),
(33, '1', 'created_by', 'none', 'tonygreg', '2018-07-24 12:26:18', 'tonygreg'),
(34, '1', 'id', 'none', '1', '2018-07-24 12:26:18', 'tonygreg'),
(35, '1', 'Notes', 'none', 'qwer', '2018-07-24 12:34:41', 'tonygreg'),
(36, '1', 'Notes', 'none', 'www', '2018-07-24 12:35:40', 'tonygreg'),
(37, '1', 'Notes', 'none', 'qqq', '2018-07-24 12:36:55', 'tonygreg'),
(38, '1', 'fname', 'Yan', 'Yannnn', '2018-07-24 12:41:31', 'tonygreg'),
(39, '1', 'Status', 'none', 'dasdsad', '2018-07-24 12:48:53', 'tonygreg'),
(40, '1', 'Status', 'none', 'ewqeqw', '2018-07-24 12:50:47', 'tonygreg'),
(41, '1', 'Status', 'none', 'sadsadsad', '2018-07-24 12:50:55', 'tonygreg'),
(42, '1', 'Status', 'none', '1111', '2018-07-24 12:51:00', 'tonygreg'),
(43, '1', 'Status', 'none', '123', '2018-07-24 13:12:15', 'tonygreg'),
(44, '1', 'email', 'yxw165730@gmail.com', 'ASDADSADASDASDASDASDASDASDASDASDASDASD', '2018-07-24 13:32:35', 'tonygreg'),
(45, '1', 'Vehicle_tariff1', '200', '100', '2018-07-24 15:51:40', 'tonygreg'),
(46, '1', 'extra5', '200.00', '100.00', '2018-07-24 15:51:40', 'tonygreg'),
(47, '1', 'Vehicle_tariff1', '100', '150', '2018-07-24 15:55:05', 'tonygreg'),
(48, '1', 'extra5', '100.00', '150.00', '2018-07-24 15:55:05', 'tonygreg'),
(49, '1', 'Vehicle_tariff1', '150', '500', '2018-07-24 15:57:33', 'tonygreg'),
(50, '1', 'extra5', '150.00', '500.00', '2018-07-24 15:57:33', 'tonygreg'),
(51, '1', 'fname', 'Yannnn', 'Yan', '2018-07-24 16:19:41', 'tonygreg'),
(52, '1', 'email', 'ASDADSADASDASDASDASDASDASDASDASDASDASD', 'yxw165730@gmail.com', '2018-07-24 16:19:41', 'tonygreg'),
(53, '1', 'd_city', 'Burbank', 'Indianaasdsaldjlaskdjaskldjklasdj', '2018-07-24 16:39:40', 'tonygreg'),
(54, '1', 'city', 'Burbank', 'ffffffffffffffffffffffffffffffffffffff', '2018-07-24 16:40:05', 'tonygreg'),
(55, '1', 'p_city', 'Burbank', 'ffffffffffffffffffffffffffffffffffffffffffff', '2018-07-24 16:40:23', 'tonygreg'),
(56, '1', 'city', 'ffffffffffffffffffffffffffffffffffffff', 'Burbank', '2018-07-24 16:42:24', 'tonygreg'),
(57, '1', 'd_city', 'Indianaasdsaldjlaskdjaskldjklasdj', 'Burbank', '2018-07-24 16:42:24', 'tonygreg'),
(58, '1', 'p_city', 'ffffffffffffffffffffffffffffffffffffffffffff', 'ffffffffffffffffffffffffffff', '2018-07-24 16:50:09', 'tonygreg'),
(59, '1', 's_date', '2018-07-04', '2018-07-05', '2018-07-24 17:01:00', 'tonygreg'),
(60, '1', 'Status', 'none', '12313123', '2018-07-25 11:51:07', 'tonygreg'),
(61, '1', 'Status', 'none', '1', '2018-07-25 11:59:02', 'tonygreg'),
(62, '1', 'Status', 'none', '3', '2018-07-25 12:01:01', 'tonygreg'),
(63, '1', 'Status', 'none', '23123', '2018-07-25 12:01:23', 'tonygreg'),
(64, '1', 'Status', 'none', 'sadasd', '2018-07-25 12:02:23', 'tonygreg'),
(65, '1', 'Status', 'none', '2313', '2018-07-25 12:03:25', 'tonygreg'),
(66, '1', 'Status', 'none', '123123123', '2018-07-25 12:04:28', 'tonygreg'),
(67, '1', 'Status', 'none', '11321', '2018-07-25 12:46:53', 'tonygreg'),
(68, '1', 'Status', 'none', '21312312322312312312312312', '2018-07-25 12:47:16', 'tonygreg'),
(69, '1', 'Status', 'none', 'asdassaf', '2018-07-25 12:51:18', 'tonygreg'),
(70, '2', 'status', 'none', '3', '07/25/2018 14:06:14 pm', 'tonygreg'),
(71, '2', 'fname', 'none', 'asd', '07/25/2018 14:06:14 pm', 'tonygreg'),
(72, '2', 'lname', 'none', 'das', '07/25/2018 14:06:14 pm', 'tonygreg'),
(73, '2', 'company', 'none', '1', '07/25/2018 14:06:14 pm', 'tonygreg'),
(74, '2', 'email', 'none', 'yxw165730@gmail.com', '07/25/2018 14:06:14 pm', 'tonygreg'),
(75, '2', 'phone1', 'none', 'sadsad', '07/25/2018 14:06:14 pm', 'tonygreg'),
(76, '2', 'mobile', 'none', '4699105086', '07/25/2018 14:06:14 pm', 'tonygreg'),
(77, '2', 'address1', 'none', 'asdasd', '07/25/2018 14:06:14 pm', 'tonygreg'),
(78, '2', 'city', 'none', 'asdasd', '07/25/2018 14:06:14 pm', 'tonygreg'),
(79, '2', 'state', 'none', 'CA', '07/25/2018 14:06:14 pm', 'tonygreg'),
(80, '2', 'country', 'none', '1', '07/25/2018 14:06:14 pm', 'tonygreg'),
(81, '2', 'zip', 'none', '11111', '07/25/2018 14:06:14 pm', 'tonygreg'),
(82, '2', 'p_city', 'none', 'asdasd', '07/25/2018 14:06:14 pm', 'tonygreg'),
(83, '2', 'p_zip', 'none', '11111', '07/25/2018 14:06:14 pm', 'tonygreg'),
(84, '2', 'p_state', 'none', 'CA', '07/25/2018 14:06:14 pm', 'tonygreg'),
(85, '2', 'p_country', 'none', '1', '07/25/2018 14:06:14 pm', 'tonygreg'),
(86, '2', 'd_city', 'none', 'asdasd', '07/25/2018 14:06:14 pm', 'tonygreg'),
(87, '2', 'd_zip', 'none', '11111', '07/25/2018 14:06:14 pm', 'tonygreg'),
(88, '2', 'd_state', 'none', 'CA', '07/25/2018 14:06:14 pm', 'tonygreg'),
(89, '2', 'd_country', 'none', '1', '07/25/2018 14:06:14 pm', 'tonygreg'),
(90, '2', 's_date', 'none', '07/27/2018', '07/25/2018 14:06:14 pm', 'tonygreg'),
(91, '2', 's_vrun', 'none', '0', '07/25/2018 14:06:14 pm', 'tonygreg'),
(92, '2', 's_via', 'none', '1', '07/25/2018 14:06:14 pm', 'tonygreg'),
(93, '2', 'Vehicle_tariff1', 'none', '500', '07/25/2018 14:06:14 pm', 'tonygreg'),
(94, '2', 'Vehicle_deposit1', 'none', '150', '07/25/2018 14:06:14 pm', 'tonygreg'),
(95, '2', 'Vehicle_year1', 'none', '2013', '07/25/2018 14:06:14 pm', 'tonygreg'),
(96, '2', 'Vehicle_make1', 'none', 'ford', '07/25/2018 14:06:14 pm', 'tonygreg'),
(97, '2', 'Vehicle_model1', 'none', 'Baleno', '07/25/2018 14:06:14 pm', 'tonygreg'),
(98, '2', 'Vehicle_type1', 'none', '13', '07/25/2018 14:06:14 pm', 'tonygreg'),
(99, '2', 'extra5', 'none', '500.00', '07/25/2018 14:06:14 pm', 'tonygreg'),
(100, '2', 'extra6', 'none', '150.00', '07/25/2018 14:06:14 pm', 'tonygreg'),
(101, '2', 'creationdatetime', 'none', '2018-07-25 14:06:15', '07/25/2018 14:06:14 pm', 'tonygreg'),
(102, '2', 'created_by', 'none', 'tonygreg', '07/25/2018 14:06:14 pm', 'tonygreg'),
(103, '2', 'id', 'none', '2', '07/25/2018 14:06:14 pm', 'tonygreg'),
(104, '3', 'status', 'none', '3', '07/25/2018 14:13:26 pm', 'tonygreg'),
(105, '3', 'fname', 'none', 'Yan', '07/25/2018 14:13:26 pm', 'tonygreg'),
(106, '3', 'lname', 'none', 'Wang', '07/25/2018 14:13:26 pm', 'tonygreg'),
(107, '3', 'company', 'none', 'ASDF', '07/25/2018 14:13:26 pm', 'tonygreg'),
(108, '3', 'email', 'none', 'yxw165730@gmail.com', '07/25/2018 14:13:26 pm', 'tonygreg'),
(109, '3', 'phone1', 'none', '4699105086', '07/25/2018 14:13:26 pm', 'tonygreg'),
(110, '3', 'mobile', 'none', '4699105086', '07/25/2018 14:13:26 pm', 'tonygreg'),
(111, '3', 'address1', 'none', '2009 Burbank Blvd', '07/25/2018 14:13:26 pm', 'tonygreg'),
(112, '3', 'city', 'none', 'Burbank', '07/25/2018 14:13:26 pm', 'tonygreg'),
(113, '3', 'state', 'none', 'CA', '07/25/2018 14:13:26 pm', 'tonygreg'),
(114, '3', 'country', 'none', '1', '07/25/2018 14:13:26 pm', 'tonygreg'),
(115, '3', 'zip', 'none', '90321', '07/25/2018 14:13:26 pm', 'tonygreg'),
(116, '3', 'p_city', 'none', 'Burbank', '07/25/2018 14:13:26 pm', 'tonygreg'),
(117, '3', 'p_zip', 'none', '90321', '07/25/2018 14:13:26 pm', 'tonygreg'),
(118, '3', 'p_state', 'none', 'CA', '07/25/2018 14:13:26 pm', 'tonygreg'),
(119, '3', 'p_country', 'none', '1', '07/25/2018 14:13:26 pm', 'tonygreg'),
(120, '3', 'd_city', 'none', 'Burbank', '07/25/2018 14:13:26 pm', 'tonygreg'),
(121, '3', 'd_zip', 'none', '90321', '07/25/2018 14:13:26 pm', 'tonygreg'),
(122, '3', 'd_state', 'none', 'CA', '07/25/2018 14:13:26 pm', 'tonygreg'),
(123, '3', 'd_country', 'none', '1', '07/25/2018 14:13:26 pm', 'tonygreg'),
(124, '3', 's_date', 'none', '07/31/2018', '07/25/2018 14:13:26 pm', 'tonygreg'),
(125, '3', 's_vrun', 'none', '0', '07/25/2018 14:13:26 pm', 'tonygreg'),
(126, '3', 's_via', 'none', '1', '07/25/2018 14:13:26 pm', 'tonygreg'),
(127, '3', 'Vehicle_tariff1', 'none', '500', '07/25/2018 14:13:26 pm', 'tonygreg'),
(128, '3', 'Vehicle_deposit1', 'none', '150', '07/25/2018 14:13:26 pm', 'tonygreg'),
(129, '3', 'Vehicle_year1', 'none', '2013', '07/25/2018 14:13:26 pm', 'tonygreg'),
(130, '3', 'Vehicle_make1', 'none', 'ford', '07/25/2018 14:13:26 pm', 'tonygreg'),
(131, '3', 'Vehicle_model1', 'none', 'Baleno', '07/25/2018 14:13:26 pm', 'tonygreg'),
(132, '3', 'Vehicle_type1', 'none', '22', '07/25/2018 14:13:26 pm', 'tonygreg'),
(133, '3', 'extra5', 'none', '500.00', '07/25/2018 14:13:26 pm', 'tonygreg'),
(134, '3', 'extra6', 'none', '150.00', '07/25/2018 14:13:26 pm', 'tonygreg'),
(135, '3', 'referred_by', 'none', '3', '07/25/2018 14:13:26 pm', 'tonygreg'),
(136, '3', 'creationdatetime', 'none', '2018-07-25 14:13:26', '07/25/2018 14:13:26 pm', 'tonygreg'),
(137, '3', 'created_by', 'none', 'tonygreg', '07/25/2018 14:13:26 pm', 'tonygreg'),
(138, '3', 'id', 'none', '3', '07/25/2018 14:13:26 pm', 'tonygreg'),
(139, '4', 'status', 'none', '3', '07/25/2018 14:16:40 pm', 'tonygreg'),
(140, '4', 'fname', 'none', 'asd', '07/25/2018 14:16:40 pm', 'tonygreg'),
(141, '4', 'lname', 'none', 'das', '07/25/2018 14:16:40 pm', 'tonygreg'),
(142, '4', 'company', 'none', '1', '07/25/2018 14:16:40 pm', 'tonygreg'),
(143, '4', 'email', 'none', 'yxw165730@gmail.com', '07/25/2018 14:16:40 pm', 'tonygreg'),
(144, '4', 'phone1', 'none', 'sadsad', '07/25/2018 14:16:40 pm', 'tonygreg'),
(145, '4', 'mobile', 'none', '4699105086', '07/25/2018 14:16:40 pm', 'tonygreg'),
(146, '4', 'address1', 'none', 'asdasd', '07/25/2018 14:16:40 pm', 'tonygreg'),
(147, '4', 'city', 'none', 'asdasd', '07/25/2018 14:16:40 pm', 'tonygreg'),
(148, '4', 'state', 'none', 'CA', '07/25/2018 14:16:40 pm', 'tonygreg'),
(149, '4', 'country', 'none', '1', '07/25/2018 14:16:40 pm', 'tonygreg'),
(150, '4', 'zip', 'none', '11111', '07/25/2018 14:16:40 pm', 'tonygreg'),
(151, '4', 'p_city', 'none', 'asdasd', '07/25/2018 14:16:40 pm', 'tonygreg'),
(152, '4', 'p_zip', 'none', '11111', '07/25/2018 14:16:40 pm', 'tonygreg'),
(153, '4', 'p_state', 'none', 'CA', '07/25/2018 14:16:40 pm', 'tonygreg'),
(154, '4', 'p_country', 'none', '1', '07/25/2018 14:16:40 pm', 'tonygreg'),
(155, '4', 'd_city', 'none', 'asdasd', '07/25/2018 14:16:40 pm', 'tonygreg'),
(156, '4', 'd_zip', 'none', '11111', '07/25/2018 14:16:40 pm', 'tonygreg'),
(157, '4', 'd_state', 'none', 'CA', '07/25/2018 14:16:40 pm', 'tonygreg'),
(158, '4', 'd_country', 'none', '1', '07/25/2018 14:16:40 pm', 'tonygreg'),
(159, '4', 's_date', 'none', '06/20/2018', '07/25/2018 14:16:40 pm', 'tonygreg'),
(160, '4', 's_vrun', 'none', '0', '07/25/2018 14:16:40 pm', 'tonygreg'),
(161, '4', 's_via', 'none', '2', '07/25/2018 14:16:40 pm', 'tonygreg'),
(162, '4', 'Vehicle_tariff1', 'none', '500', '07/25/2018 14:16:40 pm', 'tonygreg'),
(163, '4', 'Vehicle_deposit1', 'none', '150', '07/25/2018 14:16:40 pm', 'tonygreg'),
(164, '4', 'Vehicle_year1', 'none', '2013', '07/25/2018 14:16:40 pm', 'tonygreg'),
(165, '4', 'Vehicle_make1', 'none', 'jkbsfdk', '07/25/2018 14:16:40 pm', 'tonygreg'),
(166, '4', 'Vehicle_model1', 'none', 'Baleno', '07/25/2018 14:16:40 pm', 'tonygreg'),
(167, '4', 'Vehicle_type1', 'none', '2', '07/25/2018 14:16:40 pm', 'tonygreg'),
(168, '4', 'extra5', 'none', '500.00', '07/25/2018 14:16:40 pm', 'tonygreg'),
(169, '4', 'extra6', 'none', '150.00', '07/25/2018 14:16:40 pm', 'tonygreg'),
(170, '4', 'referred_by', 'none', '3', '07/25/2018 14:16:40 pm', 'tonygreg'),
(171, '4', 'creationdatetime', 'none', '2018-07-25 14:16:40', '07/25/2018 14:16:40 pm', 'tonygreg'),
(172, '4', 'created_by', 'none', 'tonygreg', '07/25/2018 14:16:40 pm', 'tonygreg'),
(173, '4', 'id', 'none', '4', '07/25/2018 14:16:40 pm', 'tonygreg'),
(174, '4', 's_vrun', 'No', 'Yes', '07/25/2018 16:37:20 pm', 'tonygreg'),
(175, '4', 's_via', 'Enclosed', 'Open', '07/25/2018 16:37:20 pm', 'tonygreg'),
(176, '4', 'Vehicle_type1', '2', 'SUV Small', '07/25/2018 16:37:20 pm', 'tonygreg'),
(177, '4', 'referred_by', 'Dealership', 'BBB', '07/25/2018 16:37:20 pm', 'tonygreg'),
(178, '4', 'status', 'Quoted', 'Quoted', '07/25/2018 16:37:20 pm', 'tonygreg'),
(179, '4', 's_vrun', 'Yes', 'No', '07/25/2018 16:43:26 pm', 'tonygreg'),
(180, '4', 's_via', 'Open', 'Enclosed', '07/25/2018 16:43:26 pm', 'tonygreg'),
(181, '4', 'Vehicle_type1', 'Coupe', 'Sedan Small', '07/25/2018 16:43:26 pm', 'tonygreg'),
(182, '4', 'referred_by', 'BBB', 'Junk Yard', '07/25/2018 16:43:26 pm', 'tonygreg'),
(183, '4', 'status', 'Quoted', 'Quoted', '07/25/2018 16:43:26 pm', 'tonygreg'),
(184, '4', 's_vrun', 'No', 'Yes', '07/25/2018 16:46:19 pm', 'tonygreg'),
(185, '4', 's_via', 'Enclosed', 'Open', '07/25/2018 16:46:19 pm', 'tonygreg'),
(186, '4', 'fname', 'Ya', 'Yan', '07/26/2018 08:54:34 am', 'tonygreg'),
(187, '4', 'lname', 'Wang', 'Wan', '07/26/2018 08:54:34 am', 'tonygreg'),
(188, '4', 'p_zip', '222', '111', '07/26/2018 08:54:34 am', 'tonygreg'),
(189, '4', 's_vrun', 'No', 'Yes', '07/26/2018 08:54:34 am', 'tonygreg'),
(190, '4', 's_via', 'Enclosed', 'Open', '07/26/2018 08:54:34 am', 'tonygreg'),
(191, '4', 'Vehicle_tariff1', '600', '700', '07/26/2018 08:54:34 am', 'tonygreg'),
(192, '4', 'Vehicle_deposit1', '200', '300', '07/26/2018 08:54:34 am', 'tonygreg'),
(193, '4', 'referred_by', 'Junk Yard', 'BBB', '07/26/2018 08:54:34 am', 'tonygreg'),
(194, '4', 'extra5', '600.00', '700.00', '07/26/2018 08:54:34 am', 'tonygreg'),
(195, '4', 'extra6', '200.00', '300.00', '07/26/2018 08:54:34 am', 'tonygreg'),
(196, '4', 'd_zip', '222', '111', '07/26/2018 08:54:34 am', 'tonygreg'),
(197, '4', 'fname', 'Yan', 'Yann', '07/26/2018 09:04:39 am', 'tonygreg'),
(198, '4', 'company', 'asd', 'sadf', '07/26/2018 09:10:56 am', 'tonygreg'),
(199, '4', 'company', 'sadf', 'none', '07/26/2018 09:11:03 am', 'tonygreg'),
(200, '4', 'company', 'none', 'asdf', '07/26/2018 09:11:22 am', 'tonygreg'),
(201, '5', 'status', 'none', '3', '07/26/2018 09:13:03 am', 'tonygreg'),
(202, '5', 'fname', 'none', 'Yan', '07/26/2018 09:13:03 am', 'tonygreg'),
(203, '5', 'lname', 'none', 'Wang', '07/26/2018 09:13:03 am', 'tonygreg'),
(204, '5', 'company', 'none', 'ASDF', '07/26/2018 09:13:03 am', 'tonygreg'),
(205, '5', 'email', 'none', 'yxw165730@gmail.com', '07/26/2018 09:13:03 am', 'tonygreg'),
(206, '5', 'phone1', 'none', '4699105086', '07/26/2018 09:13:03 am', 'tonygreg'),
(207, '5', 'mobile', 'none', '4699105086', '07/26/2018 09:13:03 am', 'tonygreg'),
(208, '5', 'address1', 'none', '2009 Burbank Blvd', '07/26/2018 09:13:03 am', 'tonygreg'),
(209, '5', 'city', 'none', 'Burbank', '07/26/2018 09:13:03 am', 'tonygreg'),
(210, '5', 'state', 'none', 'CA', '07/26/2018 09:13:03 am', 'tonygreg'),
(211, '5', 'zip', 'none', '90321', '07/26/2018 09:13:03 am', 'tonygreg'),
(212, '5', 'p_city', 'none', 'Burbank', '07/26/2018 09:13:03 am', 'tonygreg'),
(213, '5', 'p_zip', 'none', '90321', '07/26/2018 09:13:03 am', 'tonygreg'),
(214, '5', 'p_state', 'none', 'CA', '07/26/2018 09:13:03 am', 'tonygreg'),
(215, '5', 'd_city', 'none', 'Burbank', '07/26/2018 09:13:03 am', 'tonygreg'),
(216, '5', 'd_zip', 'none', '90321', '07/26/2018 09:13:03 am', 'tonygreg'),
(217, '5', 'd_state', 'none', 'CA', '07/26/2018 09:13:03 am', 'tonygreg'),
(218, '5', 's_date', 'none', '07/27/2018', '07/26/2018 09:13:03 am', 'tonygreg'),
(219, '5', 's_vrun', 'none', '1', '07/26/2018 09:13:03 am', 'tonygreg'),
(220, '5', 's_via', 'none', '2', '07/26/2018 09:13:03 am', 'tonygreg'),
(221, '5', 'Vehicle_tariff1', 'none', '100', '07/26/2018 09:13:03 am', 'tonygreg'),
(222, '5', 'Vehicle_deposit1', 'none', '150', '07/26/2018 09:13:03 am', 'tonygreg'),
(223, '5', 'Vehicle_year1', 'none', '1999', '07/26/2018 09:13:03 am', 'tonygreg'),
(224, '5', 'Vehicle_make1', 'none', 'sdsad', '07/26/2018 09:13:03 am', 'tonygreg'),
(225, '5', 'Vehicle_model1', 'none', 'Baleno', '07/26/2018 09:13:03 am', 'tonygreg'),
(226, '5', 'Vehicle_type1', 'none', '2', '07/26/2018 09:13:03 am', 'tonygreg'),
(227, '5', 'extra5', 'none', '100.00', '07/26/2018 09:13:03 am', 'tonygreg'),
(228, '5', 'extra6', 'none', '150.00', '07/26/2018 09:13:03 am', 'tonygreg'),
(229, '5', 'referred_by', 'none', '11', '07/26/2018 09:13:03 am', 'tonygreg'),
(230, '5', 'creationdatetime', 'none', '2018-07-26 09:13:03', '07/26/2018 09:13:03 am', 'tonygreg'),
(231, '5', 'created_by', 'none', 'tonygreg', '07/26/2018 09:13:03 am', 'tonygreg'),
(232, '5', 'id', 'none', '5', '07/26/2018 09:13:03 am', 'tonygreg'),
(290, '5', 's_vrun', 'No', 'No', '07/26/2018 10:26:09 am', 'tonygreg'),
(291, '5', 's_via', 'Open', 'Open', '07/26/2018 10:26:09 am', 'tonygreg'),
(292, '5', 's_vrun', 'No', 'Yes', '07/26/2018 10:26:55 am', 'tonygreg'),
(293, '5', 's_via', 'Open', 'Driveaway', '07/26/2018 10:26:55 am', 'tonygreg'),
(294, '6', 'status', 'none', 'Quoted', '07/30/2018 14:55:01 pm', 'tonygreg'),
(295, '6', 'fname', 'none', 'Yan', '07/30/2018 14:55:01 pm', 'tonygreg'),
(296, '6', 'lname', 'none', 'Wang', '07/30/2018 14:55:01 pm', 'tonygreg'),
(297, '6', 'company', 'none', 'ASDF', '07/30/2018 14:55:01 pm', 'tonygreg'),
(298, '6', 'email', 'none', 'yxw165730@gmail.com', '07/30/2018 14:55:01 pm', 'tonygreg'),
(299, '6', 'phone1', 'none', '4699105086', '07/30/2018 14:55:01 pm', 'tonygreg'),
(300, '6', 'mobile', 'none', '4699105086', '07/30/2018 14:55:01 pm', 'tonygreg'),
(301, '6', 'address1', 'none', '2009 Burbank Blvd', '07/30/2018 14:55:01 pm', 'tonygreg'),
(302, '6', 'city', 'none', 'Burbank', '07/30/2018 14:55:01 pm', 'tonygreg'),
(303, '6', 'state', 'none', 'CA', '07/30/2018 14:55:01 pm', 'tonygreg'),
(304, '6', 'zip', 'none', '90321', '07/30/2018 14:55:01 pm', 'tonygreg'),
(305, '6', 'p_city', 'none', 'Burbank', '07/30/2018 14:55:01 pm', 'tonygreg'),
(306, '6', 'p_zip', 'none', '90321', '07/30/2018 14:55:01 pm', 'tonygreg'),
(307, '6', 'p_state', 'none', 'CA', '07/30/2018 14:55:01 pm', 'tonygreg'),
(308, '6', 'd_city', 'none', 'Burbank', '07/30/2018 14:55:01 pm', 'tonygreg'),
(309, '6', 'd_zip', 'none', '90321', '07/30/2018 14:55:01 pm', 'tonygreg'),
(310, '6', 'd_state', 'none', 'CA', '07/30/2018 14:55:01 pm', 'tonygreg'),
(311, '6', 's_date', 'none', '06/23/2018', '07/30/2018 14:55:01 pm', 'tonygreg'),
(312, '6', 's_vrun', 'none', 'No', '07/30/2018 14:55:01 pm', 'tonygreg'),
(313, '6', 's_via', 'none', 'Enclosed', '07/30/2018 14:55:01 pm', 'tonygreg'),
(314, '6', 'Vehicle_tariff1', 'none', '500', '07/30/2018 14:55:01 pm', 'tonygreg'),
(315, '6', 'Vehicle_deposit1', 'none', '150', '07/30/2018 14:55:01 pm', 'tonygreg'),
(316, '6', 'Vehicle_year1', 'none', '2013', '07/30/2018 14:55:01 pm', 'tonygreg'),
(317, '6', 'Vehicle_make1', 'none', 'ford', '07/30/2018 14:55:01 pm', 'tonygreg'),
(318, '6', 'Vehicle_model1', 'none', 'fusion', '07/30/2018 14:55:01 pm', 'tonygreg'),
(319, '6', 'Vehicle_type1', 'none', 'Sedan Midsize', '07/30/2018 14:55:01 pm', 'tonygreg'),
(320, '6', 'Vehicle_deposit2', 'none', '150', '07/30/2018 14:55:01 pm', 'tonygreg'),
(321, '6', 'Vehicle_deposit3', 'none', '150', '07/30/2018 14:55:01 pm', 'tonygreg'),
(322, '6', 'Vehicle_deposit4', 'none', '150', '07/30/2018 14:55:01 pm', 'tonygreg'),
(323, '6', 'Vehicle_deposit5', 'none', '150', '07/30/2018 14:55:01 pm', 'tonygreg'),
(324, '6', 'extra5', 'none', '500.00', '07/30/2018 14:55:01 pm', 'tonygreg'),
(325, '6', 'extra6', 'none', '750.00', '07/30/2018 14:55:01 pm', 'tonygreg'),
(326, '6', 'referred_by', 'none', 'Dealership', '07/30/2018 14:55:01 pm', 'tonygreg'),
(327, '6', 'creationdatetime', 'none', '2018-07-30 14:55:02', '07/30/2018 14:55:01 pm', 'tonygreg'),
(328, '6', 'created_by', 'none', 'tonygreg', '07/30/2018 14:55:01 pm', 'tonygreg'),
(329, '6', 'id', 'none', '6', '07/30/2018 14:55:01 pm', 'tonygreg'),
(330, '5', 'extra5', '500.00', '1166.00', '07/30/2018 15:01:52 pm', 'tonygreg'),
(331, '5', 'extra5', '1166.00', '500.00', '07/30/2018 15:07:22 pm', 'tonygreg'),
(332, '5', 'extra5', '500.00', '1166.00', '07/30/2018 15:08:10 pm', 'tonygreg'),
(333, '5', 'extra6', '150.00', '300.00', '07/30/2018 15:08:10 pm', 'tonygreg'),
(334, '5', 'Vehicle_type2', '- Select One -', 'Coupe', '07/30/2018 15:15:37 pm', 'tonygreg'),
(335, '5', 'Vehicle_tariff4', '666', '500', '07/30/2018 15:15:37 pm', 'tonygreg'),
(336, '5', 'Vehicle_type4', '- Select One -', 'RV', '07/30/2018 15:15:37 pm', 'tonygreg'),
(337, '5', 'extra5', '1166.00', '1500.00', '07/30/2018 15:15:37 pm', 'tonygreg'),
(338, '5', 'extra6', '300.00', '450.00', '07/30/2018 15:15:37 pm', 'tonygreg'),
(339, '5', 'Vehicle_type5', '- Select One -', 'Sedan Midsize', '07/30/2018 15:16:28 pm', 'tonygreg'),
(340, '5', 'extra5', '1500.00', '2000.00', '07/30/2018 15:16:28 pm', 'tonygreg'),
(341, '5', 'extra6', '450.00', '600.00', '07/30/2018 15:16:28 pm', 'tonygreg'),
(342, '7', 'status', 'none', 'Quoted', '07/30/2018 15:29:05 pm', 'tonygreg'),
(343, '7', 'fname', 'none', 'Yan', '07/30/2018 15:29:05 pm', 'tonygreg'),
(344, '7', 'lname', 'none', 'Wang', '07/30/2018 15:29:05 pm', 'tonygreg'),
(345, '7', 'company', 'none', 'ASDF', '07/30/2018 15:29:05 pm', 'tonygreg'),
(346, '7', 'email', 'none', 'yxw165730@gmail.com', '07/30/2018 15:29:05 pm', 'tonygreg'),
(347, '7', 'phone1', 'none', '4699105086', '07/30/2018 15:29:05 pm', 'tonygreg'),
(348, '7', 'mobile', 'none', '4699105086', '07/30/2018 15:29:05 pm', 'tonygreg'),
(349, '7', 'address1', 'none', '2009 Burbank Blvd', '07/30/2018 15:29:05 pm', 'tonygreg'),
(350, '7', 'city', 'none', 'Burbank', '07/30/2018 15:29:05 pm', 'tonygreg'),
(351, '7', 'state', 'none', 'CA', '07/30/2018 15:29:05 pm', 'tonygreg'),
(352, '7', 'zip', 'none', '90321', '07/30/2018 15:29:05 pm', 'tonygreg'),
(353, '7', 'p_city', 'none', 'Burbank', '07/30/2018 15:29:05 pm', 'tonygreg'),
(354, '7', 'p_zip', 'none', '90321', '07/30/2018 15:29:05 pm', 'tonygreg'),
(355, '7', 'p_state', 'none', 'CA', '07/30/2018 15:29:05 pm', 'tonygreg'),
(356, '7', 'd_city', 'none', 'Burbank', '07/30/2018 15:29:05 pm', 'tonygreg'),
(357, '7', 'd_zip', 'none', '90321', '07/30/2018 15:29:05 pm', 'tonygreg'),
(358, '7', 'd_state', 'none', 'CA', '07/30/2018 15:29:05 pm', 'tonygreg'),
(359, '7', 's_date', 'none', '06/27/2018', '07/30/2018 15:29:05 pm', 'tonygreg'),
(360, '7', 's_vrun', 'none', 'No', '07/30/2018 15:29:05 pm', 'tonygreg'),
(361, '7', 's_via', 'none', 'Enclosed', '07/30/2018 15:29:05 pm', 'tonygreg'),
(362, '7', 'Vehicle_tariff1', 'none', '500', '07/30/2018 15:29:05 pm', 'tonygreg'),
(363, '7', 'Vehicle_deposit1', 'none', '150', '07/30/2018 15:29:05 pm', 'tonygreg'),
(364, '7', 'Vehicle_year1', 'none', '2013', '07/30/2018 15:29:05 pm', 'tonygreg'),
(365, '7', 'Vehicle_make1', 'none', 'jkbsfdk', '07/30/2018 15:29:05 pm', 'tonygreg'),
(366, '7', 'Vehicle_model1', 'none', 'Baleno', '07/30/2018 15:29:05 pm', 'tonygreg'),
(367, '7', 'Vehicle_type1', 'none', 'Convertible', '07/30/2018 15:29:05 pm', 'tonygreg'),
(368, '7', 'Vehicle_tariff2', 'none', '666', '07/30/2018 15:29:05 pm', 'tonygreg'),
(369, '7', 'Vehicle_deposit2', 'none', '150', '07/30/2018 15:29:05 pm', 'tonygreg'),
(370, '7', 'Vehicle_year2', 'none', '2013', '07/30/2018 15:29:05 pm', 'tonygreg'),
(371, '7', 'Vehicle_make2', 'none', 'ford', '07/30/2018 15:29:05 pm', 'tonygreg'),
(372, '7', 'Vehicle_model2', 'none', 'kjbjkb', '07/30/2018 15:29:05 pm', 'tonygreg'),
(373, '7', 'Vehicle_type2', 'none', 'Sedan Small', '07/30/2018 15:29:05 pm', 'tonygreg'),
(374, '7', 'extra5', 'none', '1166.00', '07/30/2018 15:29:05 pm', 'tonygreg'),
(375, '7', 'extra6', 'none', '300.00', '07/30/2018 15:29:05 pm', 'tonygreg'),
(376, '7', 'referred_by', 'none', 'BBB', '07/30/2018 15:29:05 pm', 'tonygreg'),
(377, '7', 'creationdatetime', 'none', '2018-07-30 15:29:06', '07/30/2018 15:29:05 pm', 'tonygreg'),
(378, '7', 'created_by', 'none', 'tonygreg', '07/30/2018 15:29:05 pm', 'tonygreg'),
(379, '7', 'id', 'none', '7', '07/30/2018 15:29:05 pm', 'tonygreg'),
(380, '7', 'extra5', '1166.00', '500.00', '07/30/2018 15:29:14 pm', 'tonygreg'),
(381, '7', 'extra6', '300.00', '150.00', '07/30/2018 15:29:14 pm', 'tonygreg'),
(382, '7', 'Vehicle_type3', '- Select One -', 'Coupe', '07/30/2018 15:29:34 pm', 'tonygreg'),
(383, '7', 'extra5', '500.00', '1366.00', '07/30/2018 15:29:34 pm', 'tonygreg'),
(384, '7', 'extra6', '150.00', '450.00', '07/30/2018 15:29:34 pm', 'tonygreg'),
(385, '7', 'extra5', '1366.00', '700.00', '07/30/2018 15:29:43 pm', 'tonygreg'),
(386, '7', 'extra6', '450.00', '300.00', '07/30/2018 15:29:43 pm', 'tonygreg'),
(387, '7', 'Vehicle_make1', 'jkbsfdk', 'BMW', '07/30/2018 15:30:59 pm', 'tonygreg'),
(388, '7', 'extra5', '700.00', '500.00', '07/30/2018 15:30:59 pm', 'tonygreg'),
(389, '7', 'extra6', '300.00', '150.00', '07/30/2018 15:30:59 pm', 'tonygreg'),
(390, '7', 'Assigned to', 'tonygreg', 'kunalnimje', '07/31/2018 11:33:23 am', 'admin'),
(391, '7', 'Assigned to', 'kunalnimje', 'tonygreg', '07/31/2018 11:33:31 am', 'admin'),
(392, '7', 'Assigned to', 'tonygreg', 'kunalnimje', '07/31/2018 11:37:46 am', 'tonygreg'),
(393, '7', 'Assigned to', 'kunalnimje', 'tonygreg', '07/31/2018 11:38:09 am', 'tonygreg'),
(394, '4', 'Assigned to', 'sadasda', 'a123456', '07/31/2018 13:33:11 pm', 'tonygreg'),
(395, '7', 'Vehicle_tariff1', '500', '600', '08/01/2018 11:22:05 am', 'tonygreg'),
(396, '7', 'extra5', '500.00', '600.00', '08/01/2018 11:22:05 am', 'tonygreg'),
(397, '6', 'Status', 'none', 'saaaaaaaaaa', '2018-08-03 13:56:56', 'tonygreg'),
(398, '7', 'Status', 'none', 'saaaaaaaaaa', '2018-08-03 13:58:49', 'tonygreg'),
(399, '6', 'Status', 'none', '456456456', '2018-08-06 10:11:32', 'tonygreg'),
(400, '6', 'Status', 'none', 'test1', '2018-08-06 10:30:49', 'tonygreg'),
(401, '6', 'Status', 'none', 'test2', '2018-08-06 11:05:12', 'tonygreg'),
(402, '6', 'Status', 'none', 'test', '2018-08-06 11:13:18', 'tonygreg'),
(403, '6', 'Status', 'none', 'test', '2018-08-06 11:16:35', 'tonygreg'),
(404, '6', 'Status', 'none', 'test', '2018-08-06 11:19:24', 'tonygreg'),
(405, '6', 'Status', 'none', 'test', '2018-08-06 11:27:02', 'tonygreg'),
(406, '6', 'Status', 'none', 'test', '2018-08-06 11:30:06', 'tonygreg'),
(407, '6', 'Status', 'none', 'test', '2018-08-06 11:34:33', 'tonygreg'),
(408, '6', 'Status', 'none', 'Test', '2018-08-06 11:39:08', 'tonygreg'),
(409, '6', 'Status', 'none', 'test', '2018-08-06 11:42:21', 'tonygreg'),
(410, '6', 'Status', 'none', 'test', '2018-08-06 11:43:10', 'tonygreg'),
(411, '6', 'Status', 'none', 'Test', '2018-08-06 11:44:23', 'tonygreg'),
(412, '6', 'Status', 'none', 'test', '2018-08-06 11:51:40', 'tonygreg'),
(413, '6', 'Status', 'none', 'test', '2018-08-06 12:01:19', 'tonygreg'),
(414, '6', 'Status', 'none', 'test', '2018-08-06 12:01:39', 'tonygreg'),
(415, '6', 'Status', 'none', 'test', '2018-08-06 12:02:42', 'tonygreg'),
(416, '6', 'Status', 'none', 'test', '2018-08-06 12:03:13', 'tonygreg'),
(417, '6', 'Status', 'none', 'test', '2018-08-06 12:04:35', 'tonygreg');

-- --------------------------------------------------------

--
-- Table structure for table `dot_tracker_shipper`
--

CREATE TABLE `dot_tracker_shipper` (
  `id` int(255) NOT NULL,
  `company_name` text NOT NULL,
  `fname` text,
  `lname` text,
  `status` tinyint(1) NOT NULL,
  `type` int(10) NOT NULL,
  `contact1` text,
  `contact2` text,
  `phone1` text,
  `phone2` text,
  `cell_phone` text,
  `fax` text,
  `email` text,
  `address` text,
  `address2` text NOT NULL,
  `city` text,
  `state` text,
  `zip` text,
  `country` text,
  `extra1` text NOT NULL,
  `extra2` text NOT NULL,
  `creation_datetime` text NOT NULL,
  `created_by` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dot_tracker_shipper`
--

INSERT INTO `dot_tracker_shipper` (`id`, `company_name`, `fname`, `lname`, `status`, `type`, `contact1`, `contact2`, `phone1`, `phone2`, `cell_phone`, `fax`, `email`, `address`, `address2`, `city`, `state`, `zip`, `country`, `extra1`, `extra2`, `creation_datetime`, `created_by`) VALUES
(14, '1', 'asd', 'das', 1, 2, 'Jack', '', '1234567890', '', 'asdasd', '', '', 'asdasd', '', 'asdasd', 'CO', '11111', 'United States', 'NA', 'NA', '2018-07-11 12:15:59', 'tonygreg'),
(15, 'ASDF', 'Yan', 'Wang', 1, 2, 'Bob', '', '9876543210', '', '4699105086', '', '', '2009 Burbank Blvd', '', 'Burbank', 'CA', '90321', 'United States', 'NA', 'NA', '2018-07-17 16:44:14', 'tonygreg'),
(16, 'Global Transportation', NULL, NULL, 1, 1, 'Bob Brown', '', '1234567890', '', '1479632580', '', '131564@gmail.com', '2009 Burbank Blvd', '', 'Burbank', 'California', '90321', 'United States', 'NA', 'NA', '2018-07-19 16:04:33', 'tonygreg'),
(17, 'AmPm Transportation', NULL, NULL, 1, 1, 'Lebron James', '', '9876543210', '', '', '', '', 'asdasdsadasd', '', 'Los Angeles', 'California', '90321', 'United States', 'NA', 'NA', '2018-07-19 16:39:25', 'tonygreg');

-- --------------------------------------------------------

--
-- Table structure for table `dot_tracker_sms`
--

CREATE TABLE `dot_tracker_sms` (
  `id` int(255) NOT NULL,
  `phone` text NOT NULL,
  `message` text NOT NULL,
  `creationdatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `global_tracker_accountinfo`
--

CREATE TABLE `global_tracker_accountinfo` (
  `id` int(11) NOT NULL,
  `owner` text NOT NULL,
  `address` text NOT NULL,
  `address1` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zip` text NOT NULL,
  `country` text NOT NULL,
  `timezone` text NOT NULL,
  `phone_local` text NOT NULL,
  `phone_tollfree` text NOT NULL,
  `phone_cell` text NOT NULL,
  `fax` text NOT NULL,
  `email` text NOT NULL,
  `website` text NOT NULL,
  `mc_number` text NOT NULL,
  `company_logo` text NOT NULL,
  `company_description` text CHARACTER SET utf8,
  `sales_phone` text NOT NULL,
  `sales_fax` text NOT NULL,
  `sales_email` text NOT NULL,
  `dispatch_contact` text NOT NULL,
  `dispatch_email` text NOT NULL,
  `dispatch_phone` text NOT NULL,
  `dispatch_fax` text NOT NULL,
  `support_phone` text NOT NULL,
  `support_fax` text NOT NULL,
  `support_email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `global_tracker_accountinfo`
--

INSERT INTO `global_tracker_accountinfo` (`id`, `owner`, `address`, `address1`, `city`, `state`, `zip`, `country`, `timezone`, `phone_local`, `phone_tollfree`, `phone_cell`, `fax`, `email`, `website`, `mc_number`, `company_logo`, `company_description`, `sales_phone`, `sales_fax`, `sales_email`, `dispatch_contact`, `dispatch_email`, `dispatch_phone`, `dispatch_fax`, `support_phone`, `support_fax`, `support_email`) VALUES
(1, 'Elena', '2009 West Burbank Blvd.', '', 'Burbank', 'CA', '91506', '1', '54', '818-956-5666', '877-241-2676', '', '747-477-1186', 'info@ampmautotransport.com', 'www.AmPmAutotransport.com', '722001', 'reneefoundation.png', '<p>AMPM Auto Transport is committed to providing consistent and dependable door-to-door auto transportation solutions in the United States.&nbsp;</p>', '818-956-56661232131312', '747-477-1186', '', 'Tony, Laura', 'Info@AmPmautotransport.Com', '818-956-6686', '747-477-1186', '818-956-5666', '747-477-1186', 'info@AmPmAutoTransport.com');

-- --------------------------------------------------------

--
-- Table structure for table `global_tracker_dispatch`
--

CREATE TABLE `global_tracker_dispatch` (
  `id` int(255) NOT NULL,
  `shipper_name` text,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `company` text,
  `email` text,
  `phone1` text,
  `phone2` text,
  `mobile` text,
  `fax` text,
  `address1` text,
  `address2` text,
  `city` text,
  `state` text,
  `zip` text,
  `sel_contact` text,
  `sel_location` text,
  `p_address1` text,
  `p_address2` text,
  `p_city` text NOT NULL,
  `p_state` text NOT NULL,
  `p_zip` text NOT NULL,
  `p_contactname` text,
  `p_companyname` text,
  `p_buyernumber` text,
  `p_phone1` text,
  `p_phone2` text,
  `p_mobile` text,
  `s_date` text NOT NULL,
  `s_vrun` text NOT NULL,
  `s_via` text NOT NULL,
  `info_forShipper` text,
  `notes_shipper` text,
  `vehicle_info` text NOT NULL,
  `carrier_pay` decimal(10,2) DEFAULT NULL,
  `bal_paid_by` text NOT NULL,
  `cod_method` text NOT NULL,
  `pickup_terminal_fee` decimal(10,2) DEFAULT NULL,
  `delivery_terminal_fee` decimal(10,2) DEFAULT NULL,
  `referred_by` text,
  `p_phone3` text,
  `extra` text NOT NULL,
  `extra1` text NOT NULL,
  `carrier_name` text NOT NULL,
  `extra2` text,
  `extra3` text,
  `extra4` text,
  `extra5` decimal(10,2) DEFAULT NULL,
  `extra6` decimal(10,2) DEFAULT NULL,
  `save_as_default` tinyint(1) NOT NULL DEFAULT '0',
  `dispatch_contact` text NOT NULL,
  `dispatch_email` text NOT NULL,
  `dispatch_phone` text NOT NULL,
  `dispatch_fax` text NOT NULL,
  `driver_fname` text NOT NULL,
  `driver_lname` text NOT NULL,
  `driver_phone` text NOT NULL,
  `driver_instruction` text NOT NULL,
  `created_by` text NOT NULL,
  `creationdatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dispatched_time` text NOT NULL,
  `d_address` text,
  `d_city` text NOT NULL,
  `d_state` text NOT NULL,
  `d_zip` text NOT NULL,
  `d_contact_name` text,
  `d_company_name` text,
  `d_phone1` text,
  `d_phone2` text,
  `d_phone3` text,
  `d_mobile` text,
  `quote_id` int(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `global_tracker_dispatch`
--

INSERT INTO `global_tracker_dispatch` (`id`, `shipper_name`, `fname`, `lname`, `company`, `email`, `phone1`, `phone2`, `mobile`, `fax`, `address1`, `address2`, `city`, `state`, `zip`, `sel_contact`, `sel_location`, `p_address1`, `p_address2`, `p_city`, `p_state`, `p_zip`, `p_contactname`, `p_companyname`, `p_buyernumber`, `p_phone1`, `p_phone2`, `p_mobile`, `s_date`, `s_vrun`, `s_via`, `info_forShipper`, `notes_shipper`, `vehicle_info`, `carrier_pay`, `bal_paid_by`, `cod_method`, `pickup_terminal_fee`, `delivery_terminal_fee`, `referred_by`, `p_phone3`, `extra`, `extra1`, `carrier_name`, `extra2`, `extra3`, `extra4`, `extra5`, `extra6`, `save_as_default`, `dispatch_contact`, `dispatch_email`, `dispatch_phone`, `dispatch_fax`, `driver_fname`, `driver_lname`, `driver_phone`, `driver_instruction`, `created_by`, `creationdatetime`, `dispatched_time`, `d_address`, `d_city`, `d_state`, `d_zip`, `d_contact_name`, `d_company_name`, `d_phone1`, `d_phone2`, `d_phone3`, `d_mobile`, `quote_id`, `status`) VALUES
(57, NULL, 'Yann', 'Wang', 'ASDF', 'yxw165730@gmail.com', '4699105086', '', '4699105086', '', '2009 Burbank Blvd', NULL, 'Burbank', 'CA', '90321', NULL, NULL, '', NULL, 'Burbank', 'CA', '90321', '', '', '', '', '', '', '07/31/2018', '1', '1', '', '', '{\"Vehicle_tariff1\":\"100\",\"Vehicle_deposit1\":\"50\",\"Vehicle_year1\":\"2013\",\"Vehicle_make1\":\"ford\",\"Vehicle_model1\":\"Baleno\",\"Vehicle_color1\":\"\",\"Vehicle_plate1\":\"\",\"Vehicle_vin1\":\"\",\"Vehicle_lot1\":\"\",\"Vehicle_tariff2\":\"\",\"Vehicle_deposit2\":\"\",\"Vehicle_year2\":\"\",\"Vehicle_make2\":\"\",\"Vehicle_model2\":\"\",\"Vehicle_color2\":\"\",\"Vehicle_plate2\":\"\",\"Vehicle_vin2\":\"\",\"Vehicle_lot2\":\"\",\"Vehicle_tariff3\":\"\",\"Vehicle_deposit3\":\"\",\"Vehicle_year3\":\"\",\"Vehicle_make3\":\"\",\"Vehicle_model3\":\"\",\"Vehicle_color3\":\"\",\"Vehicle_plate3\":\"\",\"Vehicle_vin3\":\"\",\"Vehicle_lot3\":\"\",\"Vehicle_tariff4\":\"\",\"Vehicle_deposit4\":\"\",\"Vehicle_year4\":\"\",\"Vehicle_make4\":\"\",\"Vehicle_model4\":\"\",\"Vehicle_color4\":\"\",\"Vehicle_plate4\":\"\",\"Vehicle_vin4\":\"\",\"Vehicle_lot4\":\"\",\"Vehicle_tariff5\":\"\",\"Vehicle_deposit5\":\"\",\"Vehicle_year5\":\"\",\"Vehicle_make5\":\"\",\"Vehicle_model5\":\"\",\"Vehicle_color5\":\"\",\"Vehicle_plate5\":\"\",\"Vehicle_vin5\":\"\",\"Vehicle_lot5\":\"\",\"Vehicle_type1\":\"2\",\"Vehicle_deliveryState1\":\"\",\"Vehicle_type2\":\"\",\"Vehicle_deliveryState2\":\"\",\"Vehicle_type3\":\"\",\"Vehicle_deliveryState3\":\"\",\"Vehicle_type4\":\"\",\"Vehicle_deliveryState4\":\"\",\"Vehicle_type5\":\"\",\"Vehicle_deliveryState5\":\"\"}', '350.00', 'COD to Cariier', 'Check', '0.00', '0.00', '2', '', '2018-07-11', '2018-07-20', 'AmPm Transportation', '5 business days', 'receiving a signed Bill of Lading', 'Company Check', '100.00', '50.00', 0, 'Tony, Laura', 'Info@AmPmautotransport.Com', '818-956-6686', '747-477-1186', '', '', '', '', 'kunalnimje', '2018-07-18 14:45:35', '07/31/2018 15:42:17 pm', '', 'Burbank', 'CA', '90321', '', '', '4699105086', '', '', '', 41, 5),
(61, NULL, 'Yan', 'Wang', 'ASDF', '', '', '', '4699105086', '', '2009 Burbank Blvd', NULL, 'Burbank', 'CA', '90321', NULL, NULL, '2009 Burbank Blvd', NULL, 'Burbank', 'CA', '90321', '', '', '', '', '', '', '07/28/2018', '0', '2', '', '', '{\"Vehicle_tariff1\":\"500\",\"Vehicle_deposit1\":\"150\",\"Vehicle_year1\":\"2013\",\"Vehicle_make1\":\"jkbsfdk\",\"Vehicle_model1\":\"fusion\",\"Vehicle_color1\":\"red\",\"Vehicle_plate1\":\"222\",\"Vehicle_vin1\":\"2131245656\",\"Vehicle_lot1\":\"111\",\"Vehicle_tariff2\":\"\",\"Vehicle_deposit2\":\"\",\"Vehicle_year2\":\"\",\"Vehicle_make2\":\"\",\"Vehicle_model2\":\"\",\"Vehicle_color2\":\"\",\"Vehicle_plate2\":\"\",\"Vehicle_vin2\":\"\",\"Vehicle_lot2\":\"\",\"Vehicle_tariff3\":\"\",\"Vehicle_deposit3\":\"\",\"Vehicle_year3\":\"\",\"Vehicle_make3\":\"\",\"Vehicle_model3\":\"\",\"Vehicle_color3\":\"\",\"Vehicle_plate3\":\"\",\"Vehicle_vin3\":\"\",\"Vehicle_lot3\":\"\",\"Vehicle_tariff4\":\"\",\"Vehicle_deposit4\":\"\",\"Vehicle_year4\":\"\",\"Vehicle_make4\":\"\",\"Vehicle_model4\":\"\",\"Vehicle_color4\":\"\",\"Vehicle_plate4\":\"\",\"Vehicle_vin4\":\"\",\"Vehicle_lot4\":\"\",\"Vehicle_tariff5\":\"\",\"Vehicle_deposit5\":\"\",\"Vehicle_year5\":\"\",\"Vehicle_make5\":\"\",\"Vehicle_model5\":\"\",\"Vehicle_color5\":\"\",\"Vehicle_plate5\":\"\",\"Vehicle_vin5\":\"\",\"Vehicle_lot5\":\"\",\"Vehicle_type1\":\"2\",\"Vehicle_deliveryState1\":\"AK\",\"Vehicle_type2\":\"\",\"Vehicle_deliveryState2\":\"\",\"Vehicle_type3\":\"\",\"Vehicle_deliveryState3\":\"\",\"Vehicle_type4\":\"\",\"Vehicle_deliveryState4\":\"\",\"Vehicle_type5\":\"\",\"Vehicle_deliveryState5\":\"\"}', '350.00', 'COD to Cariier', 'Check', '0.00', '0.00', '10', '', '2018-08-25', '2018-08-29', 'AmPm Transportation', '5 business days', 'receiving a signed Bill of Lading', 'Company Check', '500.00', '150.00', 0, 'Tony, Laura', 'Info@AmPmautotransport.Com', '818-956-6686', '747-477-1186', '', '', '', '', 'tonygreg', '2018-07-26 11:09:10', '08/02/2018 09:41:57 am', '2009 Burbank Blvd', 'Burbank', 'CA', '90321', '', '', '', '', '', '', 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `global_tracker_order`
--

CREATE TABLE `global_tracker_order` (
  `id` int(255) NOT NULL,
  `shipper_name` text,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `company` text,
  `email` text,
  `phone1` text,
  `phone2` text,
  `mobile` text,
  `fax` text,
  `address1` text,
  `address2` text,
  `city` text,
  `state` text,
  `zip` text,
  `sel_contact` text,
  `sel_location` text,
  `p_address1` text,
  `p_address2` text,
  `p_city` text NOT NULL,
  `p_state` text NOT NULL,
  `p_zip` text NOT NULL,
  `p_contactname` text,
  `p_companyname` text,
  `p_buyernumber` text,
  `p_phone1` text,
  `p_phone2` text,
  `p_mobile` text,
  `s_date` text NOT NULL,
  `s_vrun` text NOT NULL,
  `s_via` text NOT NULL,
  `info_forShipper` text,
  `notes_shipper` text,
  `vehicle_info` text NOT NULL,
  `carrier_pay` decimal(10,2) DEFAULT NULL,
  `bal_paid_by` text NOT NULL,
  `cod_method` text NOT NULL,
  `pickup_terminal_fee` decimal(10,2) DEFAULT NULL,
  `delivery_terminal_fee` decimal(10,2) DEFAULT NULL,
  `referred_by` text,
  `p_phone3` text,
  `extra` text NOT NULL,
  `extra1` text NOT NULL,
  `carrier_name` text NOT NULL,
  `extra2` text,
  `extra3` text,
  `extra4` text,
  `extra5` decimal(10,2) DEFAULT NULL,
  `extra6` decimal(10,2) DEFAULT NULL,
  `save_as_default` tinyint(1) NOT NULL DEFAULT '0',
  `dispatch_contact` text NOT NULL,
  `dispatch_email` text NOT NULL,
  `dispatch_phone` text NOT NULL,
  `dispatch_fax` text NOT NULL,
  `driver_fname` text NOT NULL,
  `driver_lname` text NOT NULL,
  `driver_phone` text NOT NULL,
  `driver_instruction` text NOT NULL,
  `created_by` text NOT NULL,
  `creationdatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dispatched_time` text NOT NULL,
  `d_address` text,
  `d_city` text NOT NULL,
  `d_state` text NOT NULL,
  `d_zip` text NOT NULL,
  `d_contact_name` text,
  `d_company_name` text,
  `d_phone1` text,
  `d_phone2` text,
  `d_phone3` text,
  `d_mobile` text,
  `quote_id` int(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `global_tracker_order`
--

INSERT INTO `global_tracker_order` (`id`, `shipper_name`, `fname`, `lname`, `company`, `email`, `phone1`, `phone2`, `mobile`, `fax`, `address1`, `address2`, `city`, `state`, `zip`, `sel_contact`, `sel_location`, `p_address1`, `p_address2`, `p_city`, `p_state`, `p_zip`, `p_contactname`, `p_companyname`, `p_buyernumber`, `p_phone1`, `p_phone2`, `p_mobile`, `s_date`, `s_vrun`, `s_via`, `info_forShipper`, `notes_shipper`, `vehicle_info`, `carrier_pay`, `bal_paid_by`, `cod_method`, `pickup_terminal_fee`, `delivery_terminal_fee`, `referred_by`, `p_phone3`, `extra`, `extra1`, `carrier_name`, `extra2`, `extra3`, `extra4`, `extra5`, `extra6`, `save_as_default`, `dispatch_contact`, `dispatch_email`, `dispatch_phone`, `dispatch_fax`, `driver_fname`, `driver_lname`, `driver_phone`, `driver_instruction`, `created_by`, `creationdatetime`, `dispatched_time`, `d_address`, `d_city`, `d_state`, `d_zip`, `d_contact_name`, `d_company_name`, `d_phone1`, `d_phone2`, `d_phone3`, `d_mobile`, `quote_id`, `status`) VALUES
(57, NULL, 'Yann', 'Wang', 'ASDF', 'yxw165730@gmail.com', '4699105084', '', '4699105085', '', '2009 Burbank Blvd', NULL, 'Burbank', 'CA', '90321', NULL, NULL, '', NULL, 'Burbank', 'CA', '90321', '', '', '', '', '', '', '07/31/2018', '1', '1', '', '', '{\"Vehicle_tariff1\":\"100\",\"Vehicle_deposit1\":\"50\",\"Vehicle_year1\":\"2013\",\"Vehicle_make1\":\"ford\",\"Vehicle_model1\":\"Baleno\",\"Vehicle_color1\":\"\",\"Vehicle_plate1\":\"\",\"Vehicle_vin1\":\"\",\"Vehicle_lot1\":\"\",\"Vehicle_tariff2\":\"\",\"Vehicle_deposit2\":\"\",\"Vehicle_year2\":\"\",\"Vehicle_make2\":\"\",\"Vehicle_model2\":\"\",\"Vehicle_color2\":\"\",\"Vehicle_plate2\":\"\",\"Vehicle_vin2\":\"\",\"Vehicle_lot2\":\"\",\"Vehicle_tariff3\":\"\",\"Vehicle_deposit3\":\"\",\"Vehicle_year3\":\"\",\"Vehicle_make3\":\"\",\"Vehicle_model3\":\"\",\"Vehicle_color3\":\"\",\"Vehicle_plate3\":\"\",\"Vehicle_vin3\":\"\",\"Vehicle_lot3\":\"\",\"Vehicle_tariff4\":\"\",\"Vehicle_deposit4\":\"\",\"Vehicle_year4\":\"\",\"Vehicle_make4\":\"\",\"Vehicle_model4\":\"\",\"Vehicle_color4\":\"\",\"Vehicle_plate4\":\"\",\"Vehicle_vin4\":\"\",\"Vehicle_lot4\":\"\",\"Vehicle_tariff5\":\"\",\"Vehicle_deposit5\":\"\",\"Vehicle_year5\":\"\",\"Vehicle_make5\":\"\",\"Vehicle_model5\":\"\",\"Vehicle_color5\":\"\",\"Vehicle_plate5\":\"\",\"Vehicle_vin5\":\"\",\"Vehicle_lot5\":\"\",\"Vehicle_type1\":\"2\",\"Vehicle_deliveryState1\":\"\",\"Vehicle_type2\":\"\",\"Vehicle_deliveryState2\":\"\",\"Vehicle_type3\":\"\",\"Vehicle_deliveryState3\":\"\",\"Vehicle_type4\":\"\",\"Vehicle_deliveryState4\":\"\",\"Vehicle_type5\":\"\",\"Vehicle_deliveryState5\":\"\"}', '350.00', 'COD to Cariier', 'Check', '0.00', '0.00', '2', '', '2018-07-11', '2018-07-20', 'AmPm Transportation', '5 business days', 'receiving a signed Bill of Lading', 'Company Check', '100.00', '50.00', 0, 'Tony, Laura', 'Info@AmPmautotransport.Com', '818-956-6686', '747-477-1186', '', '', '', '', 'kunalnimje', '2018-07-18 14:45:35', '07/31/2018 15:42:17 pm', '', 'Burbank', 'CA', '90321', '', '', '4699105088', '', '', '', 41, 5),
(58, NULL, 'Yann', 'Wang', '', 'yxw165730@gmail.com', '4699105086', '', '4699105086', '', '2009 Burbank Blvd', NULL, 'Burbank', 'CA', '90321', NULL, NULL, '', '', 'Burbank', 'CA', '90321', '', '123456', '', '', '', '', '07/28/2018', '0', '2', '', '', '{\"Vehicle_tariff1\":\"200\",\"Vehicle_deposit1\":\"150\",\"Vehicle_year1\":\"2002\",\"Vehicle_make1\":\"FF\",\"Vehicle_model1\":\"FF\",\"Vehicle_color1\":\"blue\",\"Vehicle_plate1\":\"111\",\"Vehicle_vin1\":\"\",\"Vehicle_lot1\":\"\",\"Vehicle_tariff2\":\"\",\"Vehicle_deposit2\":\"\",\"Vehicle_year2\":\"\",\"Vehicle_make2\":\"\",\"Vehicle_model2\":\"\",\"Vehicle_color2\":\"\",\"Vehicle_plate2\":\"\",\"Vehicle_vin2\":\"\",\"Vehicle_lot2\":\"\",\"Vehicle_tariff3\":\"\",\"Vehicle_deposit3\":\"\",\"Vehicle_year3\":\"\",\"Vehicle_make3\":\"\",\"Vehicle_model3\":\"\",\"Vehicle_color3\":\"\",\"Vehicle_plate3\":\"\",\"Vehicle_vin3\":\"\",\"Vehicle_lot3\":\"\",\"Vehicle_tariff4\":\"\",\"Vehicle_deposit4\":\"\",\"Vehicle_year4\":\"\",\"Vehicle_make4\":\"\",\"Vehicle_model4\":\"\",\"Vehicle_color4\":\"\",\"Vehicle_plate4\":\"\",\"Vehicle_vin4\":\"\",\"Vehicle_lot4\":\"\",\"Vehicle_tariff5\":\"\",\"Vehicle_deposit5\":\"\",\"Vehicle_year5\":\"\",\"Vehicle_make5\":\"\",\"Vehicle_model5\":\"\",\"Vehicle_color5\":\"\",\"Vehicle_plate5\":\"\",\"Vehicle_vin5\":\"\",\"Vehicle_lot5\":\"\",\"Vehicle_type1\":\"12\",\"Vehicle_deliveryState1\":\"AK\",\"Vehicle_type2\":\"\",\"Vehicle_deliveryState2\":\"\",\"Vehicle_type3\":\"\",\"Vehicle_deliveryState3\":\"\",\"Vehicle_type4\":\"\",\"Vehicle_deliveryState4\":\"\",\"Vehicle_type5\":\"\",\"Vehicle_deliveryState5\":\"\"}', '0.00', 'COD to Cariier', 'Check', '0.00', '0.00', '3', '', '', '', '', '', '', '', '200.00', '150.00', 0, '', '', '', '', '', '', '', '', 'tonygreg', '2018-07-26 09:22:18', '', '', 'Burbank', 'CA', '90321', '', '', '', '', '', '', 4, 1),
(59, NULL, 'Yan', 'Wang', 'ASDF', 'yxw165730@gmail.com', '4699105086', '', '4699105086', '', '2009 Burbank Blvd', NULL, 'Burbank', 'CA', '90321', NULL, NULL, '', '', 'Burbank', 'CA', '90321', '', '', '', '', '', '', '07/29/2018', '1', '1', '', '', '{\"Vehicle_tariff1\":\"200\",\"Vehicle_deposit1\":\"150\",\"Vehicle_year1\":\"1999\",\"Vehicle_make1\":\"sdsad\",\"Vehicle_model1\":\"Baleno\",\"Vehicle_color1\":\"\",\"Vehicle_plate1\":\"\",\"Vehicle_vin1\":\"\",\"Vehicle_lot1\":\"\",\"Vehicle_tariff2\":\"\",\"Vehicle_deposit2\":\"\",\"Vehicle_year2\":\"\",\"Vehicle_make2\":\"\",\"Vehicle_model2\":\"\",\"Vehicle_color2\":\"\",\"Vehicle_plate2\":\"\",\"Vehicle_vin2\":\"\",\"Vehicle_lot2\":\"\",\"Vehicle_tariff3\":\"\",\"Vehicle_deposit3\":\"\",\"Vehicle_year3\":\"\",\"Vehicle_make3\":\"\",\"Vehicle_model3\":\"\",\"Vehicle_color3\":\"\",\"Vehicle_plate3\":\"\",\"Vehicle_vin3\":\"\",\"Vehicle_lot3\":\"\",\"Vehicle_tariff4\":\"\",\"Vehicle_deposit4\":\"\",\"Vehicle_year4\":\"\",\"Vehicle_make4\":\"\",\"Vehicle_model4\":\"\",\"Vehicle_color4\":\"\",\"Vehicle_plate4\":\"\",\"Vehicle_vin4\":\"\",\"Vehicle_lot4\":\"\",\"Vehicle_tariff5\":\"\",\"Vehicle_deposit5\":\"\",\"Vehicle_year5\":\"\",\"Vehicle_make5\":\"\",\"Vehicle_model5\":\"\",\"Vehicle_color5\":\"\",\"Vehicle_plate5\":\"\",\"Vehicle_vin5\":\"\",\"Vehicle_lot5\":\"\",\"Vehicle_type1\":\"18\",\"Vehicle_deliveryState1\":\"\",\"Vehicle_type2\":\"\",\"Vehicle_deliveryState2\":\"\",\"Vehicle_type3\":\"\",\"Vehicle_deliveryState3\":\"\",\"Vehicle_type4\":\"\",\"Vehicle_deliveryState4\":\"\",\"Vehicle_type5\":\"\",\"Vehicle_deliveryState5\":\"\"}', '0.00', 'Additional Shipper Pre-payment', 'Cash/Certified Funds', '0.00', '0.00', '3', '', '', '', '', NULL, NULL, NULL, '200.00', '150.00', 0, '', '', '', '', '', '', '', '', 'tonygreg', '2018-07-26 09:22:18', '', '', 'Burbank', 'CA', '90321', '', '', '', '', '', '', 7, 1),
(60, NULL, 'Yan', 'Wang', 'ASDF', 'yxw165730@gmail.com', '4699105086', '', '4699105086', '', '2009 Burbank Blvd', NULL, 'Burbank', 'CA', '90321', NULL, NULL, '', '', 'Burbank', 'CA', '90321', '', '', '', '', '', '', '07/29/2018', '1', '1', '', '', '{\"Vehicle_tariff1\":\"200\",\"Vehicle_deposit1\":\"150\",\"Vehicle_year1\":\"1999\",\"Vehicle_make1\":\"sdsad\",\"Vehicle_model1\":\"Baleno\",\"Vehicle_color1\":\"\",\"Vehicle_plate1\":\"\",\"Vehicle_vin1\":\"\",\"Vehicle_lot1\":\"\",\"Vehicle_tariff2\":\"\",\"Vehicle_deposit2\":\"\",\"Vehicle_year2\":\"\",\"Vehicle_make2\":\"\",\"Vehicle_model2\":\"\",\"Vehicle_color2\":\"\",\"Vehicle_plate2\":\"\",\"Vehicle_vin2\":\"\",\"Vehicle_lot2\":\"\",\"Vehicle_tariff3\":\"\",\"Vehicle_deposit3\":\"\",\"Vehicle_year3\":\"\",\"Vehicle_make3\":\"\",\"Vehicle_model3\":\"\",\"Vehicle_color3\":\"\",\"Vehicle_plate3\":\"\",\"Vehicle_vin3\":\"\",\"Vehicle_lot3\":\"\",\"Vehicle_tariff4\":\"\",\"Vehicle_deposit4\":\"\",\"Vehicle_year4\":\"\",\"Vehicle_make4\":\"\",\"Vehicle_model4\":\"\",\"Vehicle_color4\":\"\",\"Vehicle_plate4\":\"\",\"Vehicle_vin4\":\"\",\"Vehicle_lot4\":\"\",\"Vehicle_tariff5\":\"\",\"Vehicle_deposit5\":\"\",\"Vehicle_year5\":\"\",\"Vehicle_make5\":\"\",\"Vehicle_model5\":\"\",\"Vehicle_color5\":\"\",\"Vehicle_plate5\":\"\",\"Vehicle_vin5\":\"\",\"Vehicle_lot5\":\"\",\"Vehicle_type1\":\"18\",\"Vehicle_deliveryState1\":\"\",\"Vehicle_type2\":\"\",\"Vehicle_deliveryState2\":\"\",\"Vehicle_type3\":\"\",\"Vehicle_deliveryState3\":\"\",\"Vehicle_type4\":\"\",\"Vehicle_deliveryState4\":\"\",\"Vehicle_type5\":\"\",\"Vehicle_deliveryState5\":\"\"}', '0.00', 'COD to Cariier', 'Check', '0.00', '0.00', '3', '', '', '', '', NULL, NULL, NULL, '200.00', '150.00', 0, '', '', '', '', '', '', '', '', 'tonygreg', '2018-07-26 09:21:59', '', '', 'Burbank', 'CA', '90321', '', '', '', '', '', '', 6, 1),
(61, NULL, 'Yan', 'Wang', 'ASDF', 'YanWang@gmail.com', '', '', '4699105086', '', '2009 Burbank Blvd', NULL, 'Burbank', 'CA', '90321', NULL, NULL, '2009 Burbank Blvd', NULL, 'Burbank', 'CA', '90321', '', '', '', '', '', '', '07/28/2018', '0', '2', '', '', '{\"Vehicle_tariff1\":\"500\",\"Vehicle_deposit1\":\"150\",\"Vehicle_year1\":\"2013\",\"Vehicle_make1\":\"jkbsfdk\",\"Vehicle_model1\":\"fusion\",\"Vehicle_color1\":\"red\",\"Vehicle_plate1\":\"222\",\"Vehicle_vin1\":\"2131245656\",\"Vehicle_lot1\":\"111\",\"Vehicle_tariff2\":\"\",\"Vehicle_deposit2\":\"\",\"Vehicle_year2\":\"\",\"Vehicle_make2\":\"\",\"Vehicle_model2\":\"\",\"Vehicle_color2\":\"\",\"Vehicle_plate2\":\"\",\"Vehicle_vin2\":\"\",\"Vehicle_lot2\":\"\",\"Vehicle_tariff3\":\"\",\"Vehicle_deposit3\":\"\",\"Vehicle_year3\":\"\",\"Vehicle_make3\":\"\",\"Vehicle_model3\":\"\",\"Vehicle_color3\":\"\",\"Vehicle_plate3\":\"\",\"Vehicle_vin3\":\"\",\"Vehicle_lot3\":\"\",\"Vehicle_tariff4\":\"\",\"Vehicle_deposit4\":\"\",\"Vehicle_year4\":\"\",\"Vehicle_make4\":\"\",\"Vehicle_model4\":\"\",\"Vehicle_color4\":\"\",\"Vehicle_plate4\":\"\",\"Vehicle_vin4\":\"\",\"Vehicle_lot4\":\"\",\"Vehicle_tariff5\":\"\",\"Vehicle_deposit5\":\"\",\"Vehicle_year5\":\"\",\"Vehicle_make5\":\"\",\"Vehicle_model5\":\"\",\"Vehicle_color5\":\"\",\"Vehicle_plate5\":\"\",\"Vehicle_vin5\":\"\",\"Vehicle_lot5\":\"\",\"Vehicle_type1\":\"2\",\"Vehicle_deliveryState1\":\"AK\",\"Vehicle_type2\":\"\",\"Vehicle_deliveryState2\":\"\",\"Vehicle_type3\":\"\",\"Vehicle_deliveryState3\":\"\",\"Vehicle_type4\":\"\",\"Vehicle_deliveryState4\":\"\",\"Vehicle_type5\":\"\",\"Vehicle_deliveryState5\":\"\"}', '350.00', 'COD to Cariier', 'Check', '0.00', '0.00', '10', '', '2018-08-25', '2018-08-29', 'AmPm Transportation', '5 business days', 'receiving a signed Bill of Lading', 'Company Check', '500.00', '150.00', 0, 'Tony, Laura', 'Info@AmPmautotransport.Com', '818-956-6686', '747-477-1186', '', '', '', '', 'tonygreg', '2018-07-26 11:09:10', '08/02/2018 09:41:57 am', '2009 Burbank Blvd', 'Burbank', 'CA', '90321', '', '', '', '', '', '', 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `global_tracker_quote`
--

CREATE TABLE `global_tracker_quote` (
  `id` int(255) NOT NULL,
  `shipper_name` text,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `company` text,
  `email` text,
  `phone1` text,
  `phone2` text,
  `mobile` text,
  `fax` text,
  `address1` text,
  `address2` text,
  `city` text,
  `state` text,
  `zip` text,
  `sel_contact` text,
  `sel_location` text,
  `p_address1` text,
  `p_address2` text NOT NULL,
  `p_city` text NOT NULL,
  `p_state` text NOT NULL,
  `p_zip` text NOT NULL,
  `p_contactname` text,
  `p_companyname` text,
  `p_buyernumber` text,
  `p_phone1` text,
  `p_phone2` text,
  `p_mobile` text,
  `s_date` text NOT NULL,
  `s_vrun` text NOT NULL,
  `s_via` text NOT NULL,
  `info_forShipper` text,
  `notes_shipper` text,
  `vehicle_info` text NOT NULL,
  `carrier_pay` decimal(10,2) DEFAULT NULL,
  `bal_paid_by` text NOT NULL,
  `pickup_terminal_fee` decimal(10,2) DEFAULT NULL,
  `delivery_terminal_fee` decimal(10,2) DEFAULT NULL,
  `referred_by` text,
  `p_phone3` text,
  `extra` text,
  `extra2` text,
  `extra3` text,
  `extra4` text,
  `extra5` decimal(10,2) DEFAULT NULL,
  `extra6` decimal(10,2) DEFAULT NULL,
  `created_by` text NOT NULL,
  `creationdatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_address` text,
  `d_city` text NOT NULL,
  `d_state` text NOT NULL,
  `d_zip` text NOT NULL,
  `d_contact_name` text,
  `d_company_name` text,
  `d_phone1` text,
  `d_phone2` text,
  `d_phone3` text,
  `d_mobile` text,
  `status` int(11) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `global_tracker_quote`
--

INSERT INTO `global_tracker_quote` (`id`, `shipper_name`, `fname`, `lname`, `company`, `email`, `phone1`, `phone2`, `mobile`, `fax`, `address1`, `address2`, `city`, `state`, `zip`, `sel_contact`, `sel_location`, `p_address1`, `p_address2`, `p_city`, `p_state`, `p_zip`, `p_contactname`, `p_companyname`, `p_buyernumber`, `p_phone1`, `p_phone2`, `p_mobile`, `s_date`, `s_vrun`, `s_via`, `info_forShipper`, `notes_shipper`, `vehicle_info`, `carrier_pay`, `bal_paid_by`, `pickup_terminal_fee`, `delivery_terminal_fee`, `referred_by`, `p_phone3`, `extra`, `extra2`, `extra3`, `extra4`, `extra5`, `extra6`, `created_by`, `creationdatetime`, `d_address`, `d_city`, `d_state`, `d_zip`, `d_contact_name`, `d_company_name`, `d_phone1`, `d_phone2`, `d_phone3`, `d_mobile`, `status`) VALUES
(4, NULL, 'Yann', 'Wan', 'asdf', 'yxw165730@gmail.com', '123456', '654321', '4699105086', '222222', 'asdasd', NULL, 'Dallas', 'CA', '11111', NULL, NULL, NULL, '', 'asdasd', 'CA', '111', NULL, NULL, NULL, NULL, NULL, NULL, '07/27/2018', '1', '1', '', '', '{\"Vehicle_tariff1\":\"700\",\"Vehicle_deposit1\":\"300\",\"Vehicle_year1\":\"2014\",\"Vehicle_make1\":\"Ford\",\"Vehicle_model1\":\"Fusion\",\"Vehicle_tariff2\":\"\",\"Vehicle_deposit2\":\"\",\"Vehicle_year2\":\"\",\"Vehicle_make2\":\"\",\"Vehicle_model2\":\"\",\"Vehicle_tariff3\":\"\",\"Vehicle_deposit3\":\"\",\"Vehicle_year3\":\"\",\"Vehicle_make3\":\"\",\"Vehicle_model3\":\"\",\"Vehicle_tariff4\":\"\",\"Vehicle_deposit4\":\"\",\"Vehicle_year4\":\"\",\"Vehicle_make4\":\"\",\"Vehicle_model4\":\"\",\"Vehicle_tariff5\":\"\",\"Vehicle_deposit5\":\"\",\"Vehicle_year5\":\"\",\"Vehicle_make5\":\"\",\"Vehicle_model5\":\"\",\"Vehicle_type1\":\"2\",\"Vehicle_type2\":\"\",\"Vehicle_type3\":\"\",\"Vehicle_type4\":\"\",\"Vehicle_type5\":\"\"}', NULL, '', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '700.00', '300.00', 'a123456', '2018-07-25 14:16:40', NULL, 'asdasd', 'CA', '111', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(5, NULL, 'Yan', 'Wang', 'ASDF', 'yxw165730@gmail.com', '4699105086', '', '4699105086', '', '2009 Burbank Blvd', NULL, 'Burbank', 'CA', '90321', NULL, NULL, NULL, '', 'Burbank', 'CA', '90321', NULL, NULL, NULL, NULL, NULL, NULL, '06/23/2018', '0', '2', '', '', '{\"Vehicle_tariff1\":\"500\",\"Vehicle_deposit1\":\"150\",\"Vehicle_year1\":\"2013\",\"Vehicle_make1\":\"ford\",\"Vehicle_model1\":\"fusion\",\"Vehicle_tariff2\":\"500\",\"Vehicle_deposit2\":\"150\",\"Vehicle_year2\":\"2013\",\"Vehicle_make2\":\"ford\",\"Vehicle_model2\":\"fusion\",\"Vehicle_tariff3\":\"\",\"Vehicle_deposit3\":\"\",\"Vehicle_year3\":\"\",\"Vehicle_make3\":\"\",\"Vehicle_model3\":\"\",\"Vehicle_tariff4\":\"500\",\"Vehicle_deposit4\":\"150\",\"Vehicle_year4\":\"2013\",\"Vehicle_make4\":\"ford\",\"Vehicle_model4\":\"Fusion\",\"Vehicle_tariff5\":\"500\",\"Vehicle_deposit5\":\"150\",\"Vehicle_year5\":\"2109\",\"Vehicle_make5\":\"ford\",\"Vehicle_model5\":\"fusion\",\"Vehicle_type1\":\"1\",\"Vehicle_type2\":\"0\",\"Vehicle_type3\":\"\",\"Vehicle_type4\":\"9\",\"Vehicle_type5\":\"2\"}', NULL, '', NULL, NULL, '4', NULL, NULL, NULL, NULL, NULL, '2000.00', '600.00', 'tonygreg', '2018-07-30 14:54:30', NULL, 'Burbank', 'CA', '90321', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(6, NULL, 'Yan', 'Wang', 'ASDF', 'yxw165730@gmail.com', '4699105086', '', '4699105086', '', '2009 Burbank Blvd', NULL, 'Burbank', 'CA', '90321', NULL, NULL, NULL, '', 'Burbank', 'CA', '90321', NULL, NULL, NULL, NULL, NULL, NULL, '06/23/2018', '0', '2', '', '', '{\"Vehicle_tariff1\":\"500\",\"Vehicle_deposit1\":\"150\",\"Vehicle_year1\":\"2013\",\"Vehicle_make1\":\"ford\",\"Vehicle_model1\":\"fusion\",\"Vehicle_tariff2\":\"\",\"Vehicle_deposit2\":\"150\",\"Vehicle_year2\":\"\",\"Vehicle_make2\":\"\",\"Vehicle_model2\":\"\",\"Vehicle_tariff3\":\"\",\"Vehicle_deposit3\":\"150\",\"Vehicle_year3\":\"\",\"Vehicle_make3\":\"\",\"Vehicle_model3\":\"\",\"Vehicle_tariff4\":\"\",\"Vehicle_deposit4\":\"150\",\"Vehicle_year4\":\"\",\"Vehicle_make4\":\"\",\"Vehicle_model4\":\"\",\"Vehicle_tariff5\":\"\",\"Vehicle_deposit5\":\"150\",\"Vehicle_year5\":\"\",\"Vehicle_make5\":\"\",\"Vehicle_model5\":\"\",\"Vehicle_type1\":\"2\",\"Vehicle_type2\":\"\",\"Vehicle_type3\":\"\",\"Vehicle_type4\":\"\",\"Vehicle_type5\":\"\"}', NULL, '', NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, '500.00', '750.00', 'tonygreg', '2018-07-30 14:55:01', NULL, 'Burbank', 'CA', '90321', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(7, NULL, 'Yan', 'Wang', 'ASDF', 'yxw165730@gmail.com', '4699105086', '', '4699105086', '', '2009 Burbank Blvd', NULL, 'Burbank', 'CA', '90321', NULL, NULL, NULL, '', 'Burbank', 'CA', '90321', NULL, NULL, NULL, NULL, NULL, NULL, '06/27/2018', '0', '2', '', '', '{\"Vehicle_tariff1\":\"600\",\"Vehicle_deposit1\":\"150\",\"Vehicle_year1\":\"2013\",\"Vehicle_make1\":\"BMW\",\"Vehicle_model1\":\"Baleno\",\"Vehicle_tariff2\":\"\",\"Vehicle_deposit2\":\"\",\"Vehicle_year2\":\"2013\",\"Vehicle_make2\":\"ford\",\"Vehicle_model2\":\"kjbjkb\",\"Vehicle_tariff3\":\"\",\"Vehicle_deposit3\":\"\",\"Vehicle_year3\":\"2013\",\"Vehicle_make3\":\"jkbsfdk\",\"Vehicle_model3\":\"fusion\",\"Vehicle_tariff4\":\"\",\"Vehicle_deposit4\":\"\",\"Vehicle_year4\":\"\",\"Vehicle_make4\":\"\",\"Vehicle_model4\":\"\",\"Vehicle_tariff5\":\"\",\"Vehicle_deposit5\":\"\",\"Vehicle_year5\":\"\",\"Vehicle_make5\":\"\",\"Vehicle_model5\":\"\",\"Vehicle_type1\":\"4\",\"Vehicle_type2\":\"1\",\"Vehicle_type3\":\"0\",\"Vehicle_type4\":\"\",\"Vehicle_type5\":\"\"}', NULL, '', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, '600.00', '150.00', 'tonygreg', '2018-07-30 15:29:05', NULL, 'Burbank', 'CA', '90321', NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `global_tracker_settings`
--

CREATE TABLE `global_tracker_settings` (
  `id` int(11) NOT NULL,
  `deposit` int(11) NOT NULL,
  `first_followup` int(11) NOT NULL,
  `quote_expired` int(11) NOT NULL,
  `assumed_delivered` int(11) NOT NULL,
  `assign_unverified_to` text NOT NULL,
  `carrier_pmt_term` text NOT NULL,
  `carrier_pmt_term_begin` text NOT NULL,
  `carrier_pmt_method` text NOT NULL,
  `cc_gateway` text NOT NULL,
  `order_term` text NOT NULL,
  `dispatch_term` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `global_tracker_settings`
--

INSERT INTO `global_tracker_settings` (`id`, `deposit`, `first_followup`, `quote_expired`, `assumed_delivered`, `assign_unverified_to`, `carrier_pmt_term`, `carrier_pmt_term_begin`, `carrier_pmt_method`, `cc_gateway`, `order_term`, `dispatch_term`) VALUES
(1, 150, 1, 365, 21, 'Tony', '5 business days', 'receiving a signed Bill of Lading', 'Company Check', '', '', '<p>**VEHICLE MILEAGE MUST BE NOTED ON THE BILL OF LADING!** NO EXCEPTIONS<br /><br /> CARRIERS AGREE TO CALL THE CLIENT UPON RECEIPT OF THE DISPATCH SHEET AND ASSURE THE CLIENT THEIR TRANSPORTATION WILL BE TAKEN CARE OF IN A PROFESSIONAL MANNER WITH EXCELLENT COMMUNICATION.<br /><br /> FAILURE to do this may result in the cancellation of the dispatch by AmPm Auto Transport.<br /><br /> 1. Please call client in advance of pick up and delivery with enough notice so they are informed and know of your arrival. 2. For NON-COD orders, please fax or email the BILL OF LADING upon delivery to fax# 747-477-1186.<br /><br /> 3. For COD orders, AmPm Auto Transport takes no responsibility for stopped or bounced checks by customer. Carrier has the right to require payment in cash or cashier\'s check upon delivery to avoid payment issues. Carrier has the right to refuse delivery of vehicle at any time if COD payment is not presented.<br /><br /> 4. Please post as picked up on central when car is picked up and post as delivered when car is delivered. We will give you a rating on Central Dispatch.<br /><br /> 5. If your truck is going to be late please call client at both pick up and delivery to inform them of delay immediately. Please inform AmPm Auto Transport of any problems or delays.<br /><br /> 6. If you are running 2 or more days late and there is NO COMMUNICATION with AmPm Auto Transport and CLIENTS at both pick up and delivery, AmPm Auto Transport reserves the right to cancel the job.<br /><br /> 7. If you have any questions please call us at anytime. We are glad to help you in any situation.<br /><br /> 8. DETAILED BILL OF LADING MUST BE SIGNED BY THE CUSTOMER AT PICK UP AND DELIVERY. MILEAGE MUST BE NOTED ON PICK UP AND DELIVERY. UNDER NO CIRCUMSTANCES IS THE CUSTOMERS VEHICLE TO BE DRIVEN ANYWHERE.<br /><br /></p>');

-- --------------------------------------------------------

--
-- Table structure for table `global_tracker_user`
--

CREATE TABLE `global_tracker_user` (
  `id` int(255) NOT NULL,
  `fname` text NOT NULL,
  `lname` text,
  `extra` text,
  `phone` text,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `active` int(10) NOT NULL,
  `creationdatetime` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL,
  `password` text NOT NULL,
  `role` int(50) NOT NULL,
  `etime` text,
  `stime` text,
  `pageSize` int(11) NOT NULL DEFAULT '50'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `global_tracker_user`
--

INSERT INTO `global_tracker_user` (`id`, `fname`, `lname`, `extra`, `phone`, `username`, `email`, `active`, `creationdatetime`, `last_updated`, `password`, `role`, `etime`, `stime`, `pageSize`) VALUES
(1, 'Marvin', 'Harootoonyan', '', '8188234694', 'marvinh', 'marvinharootoonyan@gmail.com', 1, '2018-03-15 17:50:05', '2018-04-18 11:11:03', 'password', 2, NULL, NULL, 50),
(2, 'Michael', 'Harootoonyan', '', '8182091548', 'mharoot', 'michaelharootoonyan@gmail.com', 1, '2018-03-15 18:00:58', '2018-04-18 10:06:34', 'password', 1, NULL, NULL, 50),
(3, 'Kunal', 'Nimje', '', '6785698', 'kunalnimje', 'khjvgvjh@dfsf.com', 1, '2018-03-16 06:47:27', '2018-04-18 10:05:41', 'aaa', 2, NULL, NULL, 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dot_tracker_emailtemp`
--
ALTER TABLE `dot_tracker_emailtemp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dot_tracker_login`
--
ALTER TABLE `dot_tracker_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dot_tracker_notes`
--
ALTER TABLE `dot_tracker_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dot_tracker_order_history`
--
ALTER TABLE `dot_tracker_order_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dot_tracker_payment1`
--
ALTER TABLE `dot_tracker_payment1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dot_tracker_payment2`
--
ALTER TABLE `dot_tracker_payment2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dot_tracker_quote_history`
--
ALTER TABLE `dot_tracker_quote_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dot_tracker_shipper`
--
ALTER TABLE `dot_tracker_shipper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dot_tracker_sms`
--
ALTER TABLE `dot_tracker_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `global_tracker_accountinfo`
--
ALTER TABLE `global_tracker_accountinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `global_tracker_dispatch`
--
ALTER TABLE `global_tracker_dispatch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `global_tracker_order`
--
ALTER TABLE `global_tracker_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `global_tracker_quote`
--
ALTER TABLE `global_tracker_quote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `global_tracker_settings`
--
ALTER TABLE `global_tracker_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `global_tracker_user`
--
ALTER TABLE `global_tracker_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dot_tracker_emailtemp`
--
ALTER TABLE `dot_tracker_emailtemp`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dot_tracker_login`
--
ALTER TABLE `dot_tracker_login`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `dot_tracker_notes`
--
ALTER TABLE `dot_tracker_notes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `dot_tracker_order_history`
--
ALTER TABLE `dot_tracker_order_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1254;

--
-- AUTO_INCREMENT for table `dot_tracker_payment1`
--
ALTER TABLE `dot_tracker_payment1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dot_tracker_payment2`
--
ALTER TABLE `dot_tracker_payment2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dot_tracker_quote_history`
--
ALTER TABLE `dot_tracker_quote_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=418;

--
-- AUTO_INCREMENT for table `dot_tracker_shipper`
--
ALTER TABLE `dot_tracker_shipper`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `dot_tracker_sms`
--
ALTER TABLE `dot_tracker_sms`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `global_tracker_accountinfo`
--
ALTER TABLE `global_tracker_accountinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `global_tracker_dispatch`
--
ALTER TABLE `global_tracker_dispatch`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `global_tracker_order`
--
ALTER TABLE `global_tracker_order`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `global_tracker_quote`
--
ALTER TABLE `global_tracker_quote`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `global_tracker_settings`
--
ALTER TABLE `global_tracker_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `global_tracker_user`
--
ALTER TABLE `global_tracker_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `my_event` ON SCHEDULE EVERY 1 DAY STARTS '2018-06-01 00:00:00' ENDS '2018-08-16 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE `global_tracker_quote` SET STATUS='1' WHERE STATUS='3'$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
