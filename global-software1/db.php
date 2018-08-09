-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 31, 2018 at 01:13 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `global_tracker`
--

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
`country` text,
`sel_contact` text,
`sel_location` text,
`p_address1` text,
`p_address2` text,
`p_city` text NOT NULL,
`p_state` text NOT NULL,
`p_zip` text NOT NULL,
`p_country` text NOT NULL,
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
`carrier_pay` text,
`bal_paid_by` text NOT NULL,
`pickup_terminal_fee` text,
`delivery_terminal_fee` text,
`referred_by` text,
`p_phone3` text,
`extra` text,
`extra2` text,
`extra3` text,
`extra4` text,
`extra5` text,
`extra6` text,
`created_by` text NOT NULL,
`creationdatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
`d_address` text,
`d_city` text NOT NULL,
`d_state` text NOT NULL,
`d_zip` text NOT NULL,
`d_contact_name` text,
`d_company_name` text,
`d_country` text,
`d_phone1` text,
`d_phone2` text,
`d_phone3` text,
`d_mobile` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `global_tracker_quote`
--

INSERT INTO `global_tracker_quote` (`id`, `shipper_name`, `fname`, `lname`, `company`, `email`, `phone1`, `phone2`, `mobile`, `fax`, `address1`, `address2`, `city`, `state`, `zip`, `country`, `sel_contact`, `sel_location`, `p_address1`, `p_address2`, `p_city`, `p_state`, `p_zip`, `p_country`, `p_contactname`, `p_companyname`, `p_buyernumber`, `p_phone1`, `p_phone2`, `p_mobile`, `s_date`, `s_vrun`, `s_via`, `info_forShipper`, `notes_shipper`, `vehicle_info`, `carrier_pay`, `bal_paid_by`, `pickup_terminal_fee`, `delivery_terminal_fee`, `referred_by`, `p_phone3`, `extra`, `extra2`, `extra3`, `extra4`, `extra5`, `extra6`, `created_by`, `creationdatetime`, `d_address`, `d_city`, `d_state`, `d_zip`, `d_contact_name`, `d_company_name`, `d_country`, `d_phone1`, `d_phone2`, `d_phone3`, `d_mobile`) VALUES
(3, NULL, 'Prasa', 'Chak', 'pccc', 'prasanjeet.chakraborty@gmail.com', '', '', '23123121123', 'vghg', 'njkbhvg', NULL, 'fsd', 'vhgb', 'vfdsfs', 'United States', NULL, NULL, 'jhjv', NULL, 'm', 'hvgj', 'nb', 'United States', 'bvjh', 'gjh', 'jhkb', 'kbvj', 'bkhv', 'gvjb', '05/24/2018', '1', '3', '', 'This is to check if nnotes are working', '{\"Vehicle_tariff1\":\"1221\",\"Vehicle_deposit1\":\"231\",\"Vehicle_year1\":\"2012\",\"Vehicle_make1\":\"Maruti\",\"Vehicle_model1\":\"Swift\",\"Vehicle_color1\":\"\",\"Vehicle_plate1\":\"\",\"Vehicle_vin1\":\"\",\"Vehicle_lot1\":\"\",\"Vehicle_tariff2\":\"1222\",\"Vehicle_deposit2\":\"11\",\"Vehicle_year2\":\"2018\",\"Vehicle_make2\":\"Maruti\",\"Vehicle_model2\":\"Baleno\",\"Vehicle_color2\":\"Green\",\"Vehicle_plate2\":\"HJ-3-FH\",\"Vehicle_vin2\":\"8675764\",\"Vehicle_lot2\":\"#u87\",\"Vehicle_tariff3\":\"\",\"Vehicle_deposit3\":\"\",\"Vehicle_year3\":\"\",\"Vehicle_make3\":\"\",\"Vehicle_model3\":\"\",\"Vehicle_color3\":\"\",\"Vehicle_plate3\":\"\",\"Vehicle_vin3\":\"\",\"Vehicle_lot3\":\"\",\"Vehicle_tariff4\":\"\",\"Vehicle_deposit4\":\"\",\"Vehicle_year4\":\"\",\"Vehicle_make4\":\"\",\"Vehicle_model4\":\"\",\"Vehicle_color4\":\"\",\"Vehicle_plate4\":\"\",\"Vehicle_vin4\":\"\",\"Vehicle_lot4\":\"\",\"Vehicle_tariff5\":\"\",\"Vehicle_deposit5\":\"\",\"Vehicle_year5\":\"\",\"Vehicle_make5\":\"\",\"Vehicle_color5\":\"\",\"Vehicle_plate5\":\"\",\"Vehicle_vin5\":\"\",\"Vehicle_lot5\":\"\",\"Vehicle_type1\":\"14\",\"Vehicle_deliveryState1\":\"\",\"Vehicle_type2\":\"13\",\"Vehicle_deliveryState2\":\"CT\",\"Vehicle_type3\":\"\",\"Vehicle_deliveryState3\":\"\",\"Vehicle_type4\":\"\",\"Vehicle_deliveryState4\":\"\",\"Vehicle_type5\":\"\",\"Vehicle_deliveryState5\":\"\"}', '12', '3', '213', '213', '10', 'hb', '', '2018-05-28 09:16:23pm', NULL, NULL, '2443', '242', 'tonygreg', '2018-05-22 04:04:33', 'asdsa', 'Pune', 'MH', '411014', 'dasdas', 'sadasd', 'United States', '121213123213', '12321321123', '12123123213', '134242'),
(4, NULL, 'Prasanjeet', 'Chakraborty', 'PCInfotech', 'prasanjeet.chakraborty@gmail.com', '8237357638', '7209999456', '8129322929', '1231213', 'Lane No 3', NULL, NULL, 'MH', '411014', 'United States', NULL, NULL, 'Lane Nu 3, Flat 4', NULL, 'Pune', 'JH', '411032', 'United States', 'Prasanjeet Chakraborty', 'PC Info', 'BUUY435876', '34297823423', '8237357638', '45376832564', '05/24/2018', '1', '3', 'No Major Changes, Small Dents', 'Do it ASAP ', '{\"Vehicle_tariff1\":\"213.00\",\"Vehicle_deposit1\":\"100.20\",\"Vehicle_year1\":\"2016\",\"Vehicle_make1\":\"Camry\",\"Vehicle_model1\":\"A8\",\"Vehicle_color1\":\"Red\",\"Vehicle_plate1\":\"US4563\",\"Vehicle_vin1\":\"VIN23234\",\"Vehicle_lot1\":\"IN657\",\"Vehicle_tariff2\":\"100.80\",\"Vehicle_deposit2\":\"324.89\",\"Vehicle_year2\":\"2010\",\"Vehicle_make2\":\"Mercedes\",\"Vehicle_model2\":\"BE\",\"Vehicle_color2\":\"Black\",\"Vehicle_plate2\":\"US987645\",\"Vehicle_vin2\":\"VIN3242\",\"Vehicle_lot2\":\"JKFG43\",\"Vehicle_tariff3\":\"\",\"Vehicle_deposit3\":\"\",\"Vehicle_year3\":\"\",\"Vehicle_make3\":\"\",\"Vehicle_model3\":\"\",\"Vehicle_color3\":\"\",\"Vehicle_plate3\":\"\",\"Vehicle_vin3\":\"\",\"Vehicle_lot3\":\"\",\"Vehicle_tariff4\":\"\",\"Vehicle_deposit4\":\"\",\"Vehicle_year4\":\"\",\"Vehicle_make4\":\"\",\"Vehicle_model4\":\"\",\"Vehicle_color4\":\"\",\"Vehicle_plate4\":\"\",\"Vehicle_vin4\":\"\",\"Vehicle_lot4\":\"\",\"Vehicle_tariff5\":\"\",\"Vehicle_deposit5\":\"\",\"Vehicle_year5\":\"\",\"Vehicle_make5\":\"\",\"Vehicle_color5\":\"\",\"Vehicle_plate5\":\"\",\"Vehicle_vin5\":\"\",\"Vehicle_lot5\":\"\",\"Vehicle_type1\":\"14\",\"Vehicle_deliveryState1\":\"AK\",\"Vehicle_type2\":\"2\",\"Vehicle_deliveryState2\":\"IN\",\"Vehicle_type3\":\"\",\"Vehicle_deliveryState3\":\"\",\"Vehicle_type4\":\"\",\"Vehicle_deliveryState4\":\"\",\"Vehicle_type5\":\"\",\"Vehicle_deliveryState5\":\"\"}', '233', '2', '11', '123', '2', '354326546', '', '2018-05-22 09:08:34pm', NULL, NULL, '313.8', '425.09', 'tonygreg', '2018-05-22 23:18:41', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `global_tracker_quote`
--
ALTER TABLE `global_tracker_quote`
ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `global_tracker_quote`
--
ALTER TABLE `global_tracker_quote`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;