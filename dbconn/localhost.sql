-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 15, 2018 at 12:41 PM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `checking`
--
CREATE DATABASE IF NOT EXISTS `checking` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `checking`;

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE `Categories` (
  `Id` int(11) NOT NULL,
  `Category` text NOT NULL,
  `ParentCategory` text,
  `Used` text,
  `Type` text NOT NULL,
  `Description` text NOT NULL,
  `CatGroup` text NOT NULL,
  `Tax_Line_Item` text,
  `Hide` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` (`Id`, `Category`, `ParentCategory`, `Used`, `Type`, `Description`, `CatGroup`, `Tax_Line_Item`, `Hide`) VALUES
(1, '[ABN AMRO]', '', '1', 'Transfer', '', '', '', 0),
(2, 'Ads', '', '3', 'Expense', 'Advertising', 'Income', 'Schedule C:Advertising T', 0),
(3, 'Auto', '', '7', 'Expense', 'Automobile Expenses', 'Personal Expenses', '', 0),
(4, 'Auto:Fuel', '', '1235', 'Expense', 'Auto Fuel', 'Personal Expenses', '', 0),
(5, 'Auto:Insurance', '', '140', 'Expense', 'Auto Insurance', 'Personal Expenses', '', 0),
(6, 'Auto:Loan', '', '25', 'Expense', '', 'Personal Expenses', '', 0),
(7, 'Auto:Registration', '', '78', 'Expense', 'Auto Registration', 'Personal Expenses', 'Schedule A:Personal property taxes T', 0),
(8, 'Auto:Service', '', '189', 'Expense', 'Auto Service', 'Personal Expenses', '', 0),
(9, 'Baby', '', '119', 'Expense', '', 'Personal Expenses', '', 0),
(10, 'Babysitting', '', '1', 'Expense', '', 'Personal Expenses', '', 0),
(11, 'Bad Debt', '', '47', 'Expense', 'Bad Debt Expense', 'Income', 'Schedule C:Bad debts from sales/services T', 0),
(12, 'Bank Charge', '', '93', 'Expense', 'Bank Charge', 'Personal Expenses', '', 0),
(13, 'Blow', '', '1', 'Expense', '', 'Personal Expenses', '', 0),
(14, 'Bonus', '', '18', 'Income', 'Bonus Income', 'Income', 'W-2:Salary or wages, self T', 0),
(15, 'Car', '', '29', 'Expense', 'Car & Truck', 'Business Expenses', 'Schedule C:Car and truck expenses T', 0),
(16, '[Carolann Rivera]', '', '1', 'Transfer', '', '', '', 0),
(17, 'Cash', '', '604', 'Expense', 'Misc Cash', 'Personal Expenses', '', 0),
(18, 'Charity', '', '940', 'Expense', 'Charitable Donations - Cash', 'Personal Expenses', 'Schedule A:Cash charity contributions T', 0),
(19, 'Child Care', '', '8', 'Expense', '', 'Personal Expenses', '', 0),
(20, 'Church Service', '', '1', 'Expense', '', 'Personal Expenses', ' T', 0),
(21, '[CitiBank]', '', '1', 'Transfer', '', '', '', 0),
(22, 'Clothing', '', '154', 'Expense', 'Clothing', 'Personal Expenses', '', 0),
(23, 'Clothing:Shoes', '', '53', 'Expense', '', 'Personal Expenses', '', 0),
(24, 'Commission', '', '0', 'Expense', 'Commissions', 'Business Expenses', 'Schedule C:Commissions and fees T', 0),
(25, 'Computer', '', '74', 'Expense', '', 'Personal Expenses', '', 0),
(26, 'Consulting', '', '0', 'Income', 'Consulting Income', 'Business Income', 'Schedule C:Gross receipts or sales T', 0),
(27, 'Credit Card', '', '259', 'Expense', 'Payment', 'Personal Expenses', '', 0),
(28, 'Credit Transfer', '', '1', 'Income', '', 'Personal Income', '', 0),
(29, 'Dining', '', '2854', 'Expense', 'Dining Out', 'Personal Expenses', '', 0),
(30, 'Dining:Pit Stop', '', '90', 'Expense', '', 'Personal Expenses', '', 0),
(31, 'Discounts', '', '0', 'Expense', 'Discount Expense', 'Income', 'Schedule C:Returns and allowances T', 0),
(32, 'Div Income', '', '11', 'Income', 'Dividend Income', 'Income', 'Schedule B:Dividend income T', 0),
(33, 'Dues and Licensures', '', '14', 'Expense', '', 'Personal Expenses', '', 0),
(34, 'Dues and Subscriptions', '', '160', 'Expense', 'Dues and Subscription Expense', 'Personal Expenses', 'Schedule C:Other business expenses T', 0),
(35, 'Education', '', '323', 'Expense', 'Education', 'Personal Expenses', '', 0),
(36, 'Education:Homeschool Supplies', '', '84', 'Expense', '', 'Personal Expenses', '', 0),
(37, 'Employee Benefit, Business', '', '3', 'Expense', 'Employee Benefit Programs', 'Business Expenses', 'Schedule C:Employee benefit programs T', 0),
(38, 'Employee Benefit- Entertainment', '', '1', 'Expense', 'Movie Tickets', 'Personal Expenses', '', 0),
(39, 'Entertainment', '', '307', 'Expense', 'Entertainment', 'Personal Expenses', '', 0),
(40, 'Error Reconciliation', '', '1', 'Expense', '', 'Personal Expenses', '', 0),
(41, 'Finance Charge', '', '6', 'Income', 'Finance Charge Income', 'Personal Income', 'Schedule C:Other business income T', 0),
(42, 'Fines and Tickets', '', '2', 'Expense', '', 'Personal Expenses', '', 0),
(43, 'Furniture', '', '1', 'Expense', '', 'Personal Expenses', '', 0),
(44, 'Gift Received', '', '48', 'Income', 'Gift Received', 'Income', '', 0),
(45, 'Gifts Given', '', '261', 'Expense', 'Gift Expenses', 'Personal Expenses', '', 0),
(46, 'Gr Sales', '', '1', 'Income', 'Gross Sales', 'Income', 'Schedule C:Gross receipts or sales T', 0),
(47, 'Groceries', '', '4261', 'Expense', 'Groceries', 'Personal Expenses', '', 0),
(48, 'Home Equity', '', '2', 'Income', '', 'Personal Income', '', 0),
(49, '[House]', '', '1', 'Transfer', '', '', '', 0),
(50, 'Household', '', '180', 'Expense', 'Household Misc. Exp', 'Personal Expenses', '', 0),
(51, 'Household:Home Improvement', '', '182', 'Expense', '', 'Personal Expenses', '', 0),
(52, 'Household:Items', '', '601', 'Expense', '', 'Personal Expenses', '', 0),
(53, 'Household:Repairs', '', '109', 'Expense', '', 'Personal Expenses', '', 0),
(54, 'Insurance', '', '263', 'Expense', 'Insurance', 'Personal Expenses', '', 0),
(55, 'Insurance:Home Owners Insurance', '', '1', 'Expense', '', 'Personal Expenses', '', 0),
(56, 'Insurance:Life Insurance', '', '48', 'Expense', '', 'Personal Expenses', 'Schedule B:Interest income', 0),
(57, 'Insurance, Bus', '', '0', 'Expense', 'Insurance (not health)', 'Personal Expenses', 'Schedule C:Insurance, other than health T', 0),
(58, 'Int Paid', '', '0', 'Expense', 'Interest Paid', 'Business Expenses', 'Schedule C:Interest expense, other T', 0),
(59, 'Interest Exp', '', '31', 'Expense', 'Interest Expense', 'Personal Expenses', '', 0),
(60, 'Interest Inc', '', '101', 'Income', 'Interest Income', 'Income', 'Schedule B:Interest income T', 0),
(61, 'Invest Inc', '', '57', 'Income', 'Investment Income', 'Personal Income', ' T', 0),
(62, '[Investment at Vanguard Group]', '', '0', 'Transfer', '', '', 'Out: 1099-R:Total IRA gross distrib. T', 0),
(63, 'IRA Contrib', '', '0', 'Expense', 'IRA Contribution', 'Personal Expenses', 'Form 1040:IRA contribution, self T', 0),
(64, 'Late Fees', '', '1', 'Expense', 'Late Payment Fees', 'Business Expenses', 'Schedule C:Other business expenses T', 0),
(65, 'Legal-Prof Fees', '', '1', 'Expense', 'Legal & Prof. Fees', 'Personal Expenses', 'Schedule C:Legal and professional fees T', 0),
(66, 'Licenses and Permits', '', '17', 'Expense', 'License and Permits Expense', 'Personal Expenses', 'Schedule C:Taxes and licenses T', 0),
(67, 'Loan Payment', '', '5', 'Expense', '', 'Personal Expenses', '', 0),
(68, 'Loan Payment:Interest', '', '0', 'Expense', 'Loan Interest', 'Personal Expenses', ' T', 0),
(69, 'Loan Payment:Principal', '', '0', 'Expense', 'Loan Principal', 'Personal Expenses', '', 0),
(70, 'Meals & Entertn', '', '4', 'Expense', 'Meals & Entertainment', 'Business Expenses', 'Schedule C:Meals and entertainment T', 0),
(71, 'Medical', '', '17', 'Expense', 'Medical Expense', 'Personal Expenses', 'Schedule A:Medicine and drugs T', 0),
(72, 'Medical:Doctor', '', '651', 'Expense', 'Doctors, Dentists, & Hospitals', 'Personal Expenses', 'Schedule A:Doctors, dentists, hospitals T', 0),
(73, 'Medical:Equipment', '', '50', 'Expense', 'Medical Equipment', 'Personal Expenses', '', 0),
(74, 'Medical:Insurance', '', '0', 'Expense', 'Medical Insurance', 'Personal Expenses', 'Schedule A:Medicine and drugs T', 0),
(75, 'Medical:Medicine', '', '430', 'Expense', 'Prescriptions', 'Personal Expenses', 'Schedule A:Medicine and drugs T', 0),
(76, 'Misc', '', '839', 'Expense', 'Miscellaneous', 'Personal Expenses', '', 0),
(77, 'Miscellaneous, Bus', '', '2', 'Expense', 'Misc. Business Expense', 'Income', 'Schedule C:Other business expenses T', 0),
(78, 'Mortgage', '', '296', 'Expense', '', 'Personal Expenses', ' T', 0),
(79, 'Mortgage Escrow Overpayment', '', '2', 'Expense', '', 'Personal Expenses', '', 0),
(80, 'Office', '', '6', 'Expense', 'Office Expenses', 'Business Expenses', 'Schedule C:Office expenses T', 0),
(81, 'Other Inc', '', '53', 'Income', 'Other Income', 'Income', 'Form 1040:Other income, misc. T', 0),
(82, 'Other Inc, Bus', '', '15', 'Income', 'Other Business Income', 'Income', 'Schedule C:Other business income T', 0),
(83, 'Pension and Profit-Sharing, Business', '', '0', 'Expense', 'Pension and Profit-Sharing Plans', 'Business Expenses', 'Schedule C:Pension/profit sharing plans T', 0),
(84, 'Personal', '', '4', 'Expense', '', 'Personal Expenses', '', 0),
(85, 'Personal Care', '', '1', 'Expense', '', 'Personal Expenses', '', 0),
(86, 'Personal Loan Repayment', '', '2', 'Expense', '', 'Personal Expenses', '', 0),
(87, 'Postage and Delivery', '', '97', 'Expense', 'Postage and Delivery Expense', 'Personal Expenses', 'Schedule C:Other business expenses T', 0),
(88, 'Printing and Reproduction', '', '0', 'Expense', 'Printing and Repro. Expense', 'Income', 'Schedule C:Other business expenses T', 0),
(89, 'Recreation', '', '139', 'Expense', 'Recreation Expense', 'Personal Expenses', '', 0),
(90, 'Reimbursement', '', '278', 'Income', 'Reimbursement', 'Income', '', 0),
(91, 'Rent', '', '16', 'Income', '', 'Personal Income', '', 0),
(92, 'Rent on Equip', '', '3', 'Expense', 'Rent-Vehicle,mach,equip', 'Business Expenses', 'Schedule C:Rent/lease vehicles, equip. T', 0),
(93, 'Rent Paid', '', '10', 'Expense', 'Rent Paid', 'Personal Expenses', 'Schedule C:Rent/lease other bus. prop. T', 0),
(94, 'Repairs', '', '1', 'Expense', 'Repairs', 'Personal Expenses', 'Schedule C:Repairs and maintenance T', 0),
(95, 'Returns', '', '1', 'Expense', 'Returns & Allowances', 'Personal Expenses', 'Schedule C:Returns and allowances T', 0),
(96, '[Rivera Checking]', '', '17', 'Transfer', '', '', '', 0),
(97, 'Salary', '', '832', 'Income', 'Salary Income', 'Income', 'W-2:Salary or wages, self T', 0),
(98, 'Savings', '', '104', 'Expense', '', 'Personal Expenses', '', 0),
(99, '[Savings at Regions Bank]', '', '1', 'Transfer', '', '', '', 0),
(100, 'Services', '', '1', 'Income', 'Service Income', 'Business Income', 'Schedule C:Gross receipts or sales T', 0),
(101, 'Subscriptions', '', '40', 'Expense', 'Subscriptions', 'Personal Expenses', '', 0),
(102, 'Supplies, Bus', '', '15', 'Expense', 'Supplies', 'Business Expenses', 'Schedule C:Supplies (not from COGS) T', 0),
(103, 'Swiffer', '', '64', 'Expense', '', 'Personal Expenses', '', 0),
(104, 'Tax', '', '1', 'Expense', 'Taxes', 'Personal Expenses', ' T', 0),
(105, 'Tax:Fed', '', '5', 'Expense', 'Federal Tax', 'Personal Expenses', 'W-2:Federal tax withheld, self T', 0),
(106, 'Tax:Medicare', '', '', 'Expense', 'Medicare Tax', 'Personal Expenses', 'W-2:Medicare tax withheld, self T', 0),
(107, 'Tax:Other', '', '0', 'Expense', 'Misc. Taxes', 'Personal Expenses', ' T', 0),
(108, 'Tax:Property', '', '0', 'Expense', 'Property Tax', 'Personal Expenses', 'Schedule A:Real estate taxes T', 0),
(109, 'Tax:Soc Sec', '', '0', 'Expense', 'Soc Sec Tax', 'Personal Expenses', 'W-2:Soc. Sec. tax withheld, self T', 0),
(110, 'Tax:State', '', '0', 'Expense', 'State Tax', 'Personal Expenses', 'W-2:State tax withheld, self T', 0),
(111, 'Tax Prep', '', '6', 'Expense', '', 'Personal Expenses', '', 0),
(112, 'Tax Refund', '', '16', 'Income', 'State/Local Tax Refund', 'Income', '1099-G:State and local tax refunds T', 0),
(113, 'Tax, Business', '', '0', 'Expense', 'Taxes & Licenses', 'Business Expenses', 'Schedule C:Taxes and licenses T', 0),
(114, 'Tax, Business:Fed', '', '0', 'Expense', 'Federal Tax', 'Business Expenses', 'Schedule C:Taxes and licenses T', 0),
(115, 'Tax, Business:Local', '', '0', 'Expense', 'Local Tax', 'Business Expenses', 'Schedule C:Taxes and licenses T', 0),
(116, 'Tax, Business:Property', '', '0', 'Expense', 'Property Tax', 'Business Expenses', 'Schedule C:Taxes and licenses T', 0),
(117, 'Tax, Business:State', '', '0', 'Expense', 'State Tax', 'Business Expenses', 'Schedule C:Taxes and licenses T', 0),
(118, 'Tithe', '', '355', 'Expense', 'Tithe', 'Personal Expenses', 'Schedule A:Cash charity contributions T', 0),
(119, 'Transfer', '', '14', 'Expense', '', 'Personal Expenses', '', 0),
(120, 'Transfer:New Checking', '', '0', 'Expense', '', 'Personal Expenses', '', 0),
(121, 'Travel', '', '7', 'Expense', '', 'Personal Expenses', '', 0),
(122, 'Travel:Parking', '', '3', 'Expense', '', 'Personal Expenses', '', 0),
(123, 'Travel, Bus', '', '1', 'Expense', 'Business Travel Expense', 'Personal Expenses', 'Schedule C:Travel T', 0),
(124, 'Unemployment Inc', '', '0', 'Income', 'Unemployment Compensation', 'Personal Income', '1099-G:Unemployment compensation T', 0),
(125, 'Utilities', '', '108', 'Expense', 'Water, Gas, Electric', 'Personal Expenses', '', 0),
(126, 'Utilities:Cable TV', '', '134', 'Expense', 'Cable TV', 'Personal Expenses', '', 0),
(127, 'Utilities:Garbage Collection', '', '87', 'Expense', '', 'Personal Expenses', '1099-G:Unemployment compensation', 0),
(128, 'Utilities:Gas & Electric', '', '333', 'Expense', 'Gas and Electricity', 'Personal Expenses', '', 0),
(129, 'Utilities:Misc. Utlilities', '', '0', 'Expense', 'Other', 'Personal Expenses', '', 0),
(130, 'Utilities:Satelite TV', '', '8', 'Expense', '', 'Personal Expenses', '', 0),
(131, 'Utilities:Telephone', '', '416', 'Expense', 'Telephone Expense', 'Personal Expenses', '', 0),
(132, 'Utilities:Water', '', '183', 'Expense', 'Water', 'Personal Expenses', '', 0),
(133, 'Utilities, Bus', '', '0', 'Expense', 'Water, Gas, Electric', 'Business Expenses', 'Schedule C:Utilities T', 0),
(134, 'Utilities, Bus:Telephone, Bus', '', '0', 'Expense', 'Telephone Expense', 'Personal Expenses', 'Schedule C:Utilities T', 0),
(135, 'Vacation', '', '18', 'Expense', 'Vacation expenses', 'Personal Expenses', '', 0),
(136, 'Vacation:Lodging', '', '1', 'Expense', 'Motel/Hotel Costs', 'Personal Expenses', '', 0),
(137, 'Vacation:Travel', '', '33', 'Expense', 'Transportation exp', 'Personal Expenses', '', 0),
(138, 'Void', '', '14', 'Expense', '', 'Personal Expenses', '', 0),
(139, 'Wages', '', '1', 'Expense', 'Wages & Job Credits', 'Income', 'Schedule C:Wages paid T', 0),
(140, 'Wedding Expense', '', '55', 'Expense', '', 'Personal Expenses', '', 0),
(141, 'Work Supplies', '', '5', 'Expense', '', 'Personal Expenses', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Future`
--

CREATE TABLE `Future` (
  `Id` int(11) NOT NULL,
  `Account` varchar(255) NOT NULL,
  `TDate` date NOT NULL,
  `PDate` date DEFAULT NULL,
  `CkNo` varchar(255) DEFAULT NULL,
  `tD` varchar(255) NOT NULL,
  `Debit` decimal(10,2) DEFAULT NULL,
  `Credit` decimal(10,2) DEFAULT NULL,
  `Color` varchar(20) DEFAULT NULL,
  `Category` varchar(255) DEFAULT NULL,
  `RecurID` int(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Register`
--

CREATE TABLE `Register` (
  `Id` int(11) NOT NULL,
  `Account` varchar(255) NOT NULL,
  `TDate` date NOT NULL,
  `PDate` date DEFAULT NULL,
  `CkNo` varchar(255) DEFAULT NULL,
  `tD` varchar(255) NOT NULL,
  `Debit` decimal(10,2) DEFAULT NULL,
  `Credit` decimal(10,2) DEFAULT NULL,
  `Color` varchar(20) DEFAULT NULL,
  `Category` varchar(255) DEFAULT NULL,
  `RecurID` int(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Register`
--

INSERT INTO `Register` (`Id`, `Account`, `TDate`, `PDate`, `CkNo`, `tD`, `Debit`, `Credit`, `Color`, `Category`, `RecurID`) VALUES
(1, 'Damien\'s Checking * 7128', '2018-06-01', '2018-06-01', '', 'Opening Balance', '0.00', '2677.42', NULL, '[ABN AMRO]', NULL),
(2, 'Damien\'s Checking * 7128', '2018-06-04', '2018-06-04', '', 'DYNASTY SUPER B 1099', '-41.84', '0.00', 'Red', 'Dining', NULL),
(3, 'Damien\'s Checking * 7128', '2018-06-04', '2018-06-04', '', 'HICKORY DISCOUN  1099', '-29.46', '0.00', 'Blue', 'Meals & Entertn', NULL),
(4, 'Damien\'s Checking * 7128', '2018-06-04', '2018-06-04', '', 'STARBUCKS STORE  8585', '-6.28', '0.00', 'brown', 'Dining', NULL),
(5, 'Damien\'s Checking * 7128', '2018-06-04', '2018-06-04', '', 'TMOBILE*AAL TEL  1099', '-4.36', '0.00', 'Blue', 'Utilities:Telephone', NULL),
(16, 'Damien\'s Checking * 7128', '2018-06-04', '2018-06-04', '', 'DAILY BURN INC 8585', '-19.95', '0.00', 'Green', 'Subscriptions', NULL),
(17, 'Damien\'s Checking * 7128', '2018-06-04', '2018-06-04', '', 'SUDDEN SERVICE   1099', '-11.26', '0.00', NULL, 'Dining:Pit Stop', NULL),
(18, 'Damien\'s Checking * 7128', '2018-06-04', '2018-06-04', '', 'LOWE S #2725     8585', '-22.92', '0.00', NULL, 'Household:Home Improvement', NULL),
(19, 'Damien\'s Checking * 7128', '2018-06-04', '2018-06-04', '', 'WM SUPERC Wal-   8585', '-13.35', '0.00', NULL, 'Groceries', NULL),
(20, 'Damien\'s Checking * 7128', '2018-06-04', '2018-06-04', '', 'PUBLIX SUPER M   8585', '-8.49', '0.00', 'Purple', 'Groceries', NULL),
(21, 'Damien\'s Checking * 7128', '2018-06-04', '2018-06-04', '', 'NEWK S BRENTWOO  1099', '-46.34', '0.00', NULL, 'Dining', NULL),
(22, 'Damien\'s Checking * 7128', '2018-06-04', '2018-06-04', '', 'COMMUNITY BIBLE  CONTRIBUTN', '-50.00', '0.00', NULL, 'Tithe', NULL),
(23, 'Damien\'s Checking * 7128', '2018-06-04', '2018-06-04', '', 'ATT              Payment', '-70.00', '0.00', NULL, 'Utilities:Cable TV', NULL),
(24, 'Damien\'s Checking * 7128', '2018-06-04', '2018-06-04', '', '5/3 MORTGAGE LN  PAYMENT', '-1532.08', '0.00', NULL, 'Mortgage', NULL),
(855, 'Damien\'s Checking * 7128', '2018-06-05', '2018-06-05', '2975', 'CHECK #2975', '-150.00', '0.00', NULL, NULL, NULL),
(856, 'Damien\'s Checking * 7128', '2018-06-05', '2018-06-05', '', 'AVANGATE*SKETCH  8585', '-29.99', '0.00', NULL, 'Subscriptions', NULL),
(857, 'Damien\'s Checking * 7128', '2018-06-05', '2018-06-05', '', '5 STAR MARKETS   1099', '-6.44', '0.00', NULL, 'Dining:Pit Stop', NULL),
(858, 'Damien\'s Checking * 7128', '2018-06-05', '2018-06-05', '', 'PAYPAL           INST XFER', '-24.99', '0.00', NULL, NULL, NULL),
(859, 'Damien\'s Checking * 7128', '2018-06-05', '2018-06-05', '', 'CHASE CREDIT CRD EPAY', '-100.00', '0.00', NULL, 'Credit Card', NULL),
(860, 'Damien\'s Checking * 7128', '2018-06-05', '2018-06-05', '', 'PUBLIX SUPER M   8585', '-43.52', '0.00', NULL, 'Groceries', NULL),
(861, 'Damien\'s Checking * 7128', '2018-06-05', '2018-06-05', '', 'INTERNATIONAL SERVICE', '-0.90', '0.00', NULL, NULL, NULL),
(862, 'Damien\'s Checking * 7128', '2018-06-06', '2018-06-06', '', '5 STAR MARKETS   1099', '-6.44', '0.00', NULL, 'Dining:Pit Stop', NULL),
(863, 'Damien\'s Checking * 7128', '2018-06-06', '2018-06-06', '', '5 STAR MARKETS   1099', '-3.44', '0.00', NULL, 'Dining:Pit Stop', NULL),
(864, 'Damien\'s Checking * 7128', '2018-06-07', '2018-06-07', '', 'THORNTONS #0602  5541', '0.00', '35.40', NULL, 'Auto:Fuel', NULL),
(865, 'Damien\'s Checking * 7128', '2018-06-07', '2018-06-07', '', 'L2G*METRO WATER  8585', '-73.78', '0.00', NULL, 'Utilities:Water', NULL),
(866, 'Damien\'s Checking * 7128', '2018-06-07', '2018-06-07', '', 'THORNTONS #0602  1099', '-44.57', '0.00', NULL, 'Auto:Fuel', NULL),
(867, 'Damien\'s Checking * 7128', '2018-06-07', '2018-06-07', '', 'HICKORY DISCOUN  1099', '-22.93', '0.00', NULL, 'Meals & Entertn', NULL),
(868, 'Damien\'s Checking * 7128', '2018-06-07', '2018-06-07', '', 'CHEDDAR S 02021  8585', '-25.54', '0.00', NULL, 'Dining', NULL),
(869, 'Damien\'s Checking * 7128', '2018-06-07', '2018-06-07', '', 'PAYPAL *TOPHATT  1099', '-12.00', '0.00', NULL, NULL, NULL),
(870, 'Damien\'s Checking * 7128', '2018-06-07', '2018-06-07', '', 'USA*SALUDABLE V  8585', '-1.80', '0.00', NULL, NULL, NULL),
(871, 'Damien\'s Checking * 7128', '2018-06-07', '2018-06-07', '', 'SUDDEN SERVICE   8585', '-45.39', '0.00', NULL, 'Auto:Fuel', NULL),
(872, 'Damien\'s Checking * 7128', '2018-06-07', '2018-06-07', '', 'TIGERMARKET #2   8585', '-0.86', '0.00', NULL, 'Dining:Pit Stop', NULL),
(873, 'Damien\'s Checking * 7128', '2018-06-08', '2018-06-08', '', 'DEPOSIT', '0.00', '430.00', NULL, 'Cash', NULL),
(874, 'Damien\'s Checking * 7128', '2018-06-08', '2018-06-08', '', 'PIEDMONT NATURA  8585', '-38.58', '0.00', NULL, 'Utilities:Gas & Electric', NULL),
(875, 'Damien\'s Checking * 7128', '2018-06-08', '2018-06-08', '', 'HLU*Hulu 676620  1099', '-11.99', '0.00', NULL, 'Subscriptions', NULL),
(876, 'Damien\'s Checking * 7128', '2018-06-08', '2018-06-08', '', 'Regions         MILL CREEK', '-60.00', '0.00', NULL, 'Cash', NULL),
(877, 'Damien\'s Checking * 7128', '2018-06-08', '2018-06-08', '', 'KROGER #5 6690   8585', '-23.76', '0.00', NULL, 'Groceries', NULL),
(878, 'Damien\'s Checking * 7128', '2018-06-08', '2018-06-08', '', 'Wal-Mart Super   8585', '-38.63', '0.00', NULL, 'Groceries', NULL),
(879, 'Damien\'s Checking * 7128', '2018-06-08', '2018-06-08', '', 'PEPBOYS STORE    1099', '-16.14', '0.00', NULL, 'Auto:Service', NULL),
(880, 'Damien\'s Checking * 7128', '2018-06-11', '2018-06-11', '', 'DEPOSIT', '0.00', '400.00', NULL, 'Cash', NULL),
(881, 'Damien\'s Checking * 7128', '2018-06-11', '2018-06-11', '', 'SUBWAY        0  8585', '-5.34', '0.00', NULL, 'Dining', NULL),
(882, 'Damien\'s Checking * 7128', '2018-06-11', '2018-06-11', '', 'TACO BELL #0344  8585', '-18.78', '0.00', NULL, 'Dining', NULL),
(883, 'Damien\'s Checking * 7128', '2018-06-11', '2018-06-11', '', 'NETFLIX.COM      1099', '-12.03', '0.00', NULL, 'Subscriptions', NULL),
(884, 'Damien\'s Checking * 7128', '2018-06-11', '2018-06-11', '', 'CITGO QUEST ST   1099', '-16.34', '0.00', NULL, 'Dining:Pit Stop', NULL),
(885, 'Damien\'s Checking * 7128', '2018-06-11', '2018-06-11', '', 'BURGER KING #71  8585', '-6.97', '0.00', NULL, 'Dining', NULL),
(886, 'Damien\'s Checking * 7128', '2018-06-11', '2018-06-11', '', 'SUDDEN SERVICE   1099', '-3.19', '0.00', NULL, 'Dining:Pit Stop', NULL),
(887, 'Damien\'s Checking * 7128', '2018-06-11', '2018-06-11', '', 'CHINA KING       1099', '-21.72', '0.00', NULL, 'Dining', NULL),
(888, 'Damien\'s Checking * 7128', '2018-06-11', '2018-06-11', '', 'ALDI 70051       8585', '-56.31', '0.00', NULL, 'Groceries', NULL),
(889, 'Damien\'s Checking * 7128', '2018-06-12', '2018-06-12', '', 'DEPOSIT', '0.00', '240.00', NULL, 'Cash', NULL),
(890, 'Damien\'s Checking * 7128', '2018-06-12', '2018-06-12', '', '5 STAR MARKETS   1099', '-6.44', '0.00', NULL, 'Dining:Pit Stop', NULL),
(891, 'Damien\'s Checking * 7128', '2018-06-12', '2018-06-12', '', '5 STAR MARKETS   1099', '-8.17', '0.00', NULL, 'Dining:Pit Stop', NULL),
(892, 'Damien\'s Checking * 7128', '2018-06-12', '2018-06-12', '', 'KROGER #5 6690   8585', '-20.35', '0.00', NULL, 'Groceries', NULL),
(893, 'Damien\'s Checking * 7128', '2018-06-12', '2018-06-12', '', 'PUBLIX SUPER M   8585', '-41.38', '0.00', NULL, 'Groceries', NULL),
(894, 'Damien\'s Checking * 7128', '2018-06-13', '2018-06-13', '', 'AMAZON MKTPLACE  1099', '-5.99', '0.00', NULL, NULL, NULL),
(895, 'Damien\'s Checking * 7128', '2018-06-13', '2018-06-13', '', 'PAYPAL           INST XFER', '-3.36', '0.00', NULL, NULL, NULL),
(896, 'Damien\'s Checking * 7128', '2018-06-13', '2018-06-13', '', 'Thorntons #611   1099', '-10.11', '0.00', NULL, 'Dining:Pit Stop', NULL),
(897, 'Damien\'s Checking * 7128', '2018-06-14', '2018-06-14', '', '5 STAR MARKETS   1099', '-3.28', '0.00', NULL, 'Dining:Pit Stop', NULL),
(898, 'Damien\'s Checking * 7128', '2018-06-14', '2018-06-14', '', 'SONIC DRIVE IN   1099', '-9.32', '0.00', NULL, 'Dining', NULL),
(899, 'Damien\'s Checking * 7128', '2018-06-14', '2018-06-14', '', 'PANERA BREAD #6  8585', '-12.21', '0.00', NULL, 'Dining', NULL),
(900, 'Damien\'s Checking * 7128', '2018-06-14', '2018-06-14', '', 'PAYPAL           INST XFER', '-240.00', '0.00', NULL, 'Education:Homeschool Supplies', NULL),
(901, 'Damien\'s Checking * 7128', '2018-06-14', '2018-06-14', '', 'TRAVELERS INSUR  INSURANCE', '-578.00', '0.00', NULL, 'Auto:Insurance', NULL),
(902, 'Damien\'s Checking * 7128', '2018-06-14', '2018-06-14', '', 'TIGERMARKET #2   8585', '-0.86', '0.00', NULL, 'Dining:Pit Stop', NULL),
(903, 'Damien\'s Checking * 7128', '2018-06-15', '2018-06-15', '', 'PAYPAL           TRANSFER', '0.00', '413.00', NULL, 'Rent Paid', NULL),
(904, 'Damien\'s Checking * 7128', '2018-06-15', '2018-06-15', '', 'TriStar          PR PAYMENT', '0.00', '980.71', NULL, 'Salary', NULL),
(905, 'Damien\'s Checking * 7128', '2018-06-15', '2018-06-15', '', 'CHANGE HEALTHCAR PAYROLL', '0.00', '2205.60', NULL, 'Salary', NULL),
(906, 'Damien\'s Checking * 7128', '2018-06-15', '2018-06-15', '', 'SOUTHERN HILLS   8585', '-3.85', '0.00', NULL, 'Dining', NULL),
(907, 'Damien\'s Checking * 7128', '2018-06-15', '2018-06-15', '', 'CICIS PIZZA 326  1099', '-24.34', '0.00', NULL, 'Dining', NULL),
(908, 'Damien\'s Checking * 7128', '2018-06-15', '2018-06-15', '', 'THE GUARDIAN     INSUR PREM', '-27.04', '0.00', NULL, 'Insurance:Life Insurance', NULL),
(909, 'Damien\'s Checking * 7128', '2018-06-15', '2018-06-15', '', 'Regions         MILL CREEK', '-640.00', '0.00', NULL, 'Cash', NULL),
(910, 'Damien\'s Checking * 7128', '2018-06-15', '2018-06-15', '', 'KROGER #5 6690   8585', '-35.97', '0.00', NULL, 'Groceries', NULL),
(911, 'Damien\'s Checking * 7128', '2018-06-15', '2018-06-15', '', 'LOWE S #2725     8585', '-14.16', '0.00', NULL, 'Household:Home Improvement', NULL),
(912, 'Damien\'s Checking * 7128', '2018-06-15', '2018-06-15', '', 'NORTH 1ST STOP   8585', '-27.07', '0.00', NULL, NULL, NULL),
(913, 'Damien\'s Checking * 7128', '2018-06-15', '2018-06-15', '', 'PUBLIX SUPER M   8585', '-34.59', '0.00', NULL, 'Groceries', NULL),
(914, 'Damien\'s Checking * 7128', '2018-06-18', '2018-06-18', '', '5 STAR MARKETS   1099', '-11.67', '0.00', NULL, 'Dining:Pit Stop', NULL),
(915, 'Damien\'s Checking * 7128', '2018-06-18', '2018-06-18', '', 'MCDONALD S F343  8585', '-26.56', '0.00', NULL, 'Dining', NULL),
(916, 'Damien\'s Checking * 7128', '2018-06-18', '2018-06-18', '', 'SONIC DRIVE IN   8585', '-3.21', '0.00', NULL, 'Dining', NULL),
(917, 'Damien\'s Checking * 7128', '2018-06-18', '2018-06-18', '', 'THORNTONS #0611  1099', '-43.00', '0.00', NULL, 'Auto:Fuel', NULL),
(918, 'Damien\'s Checking * 7128', '2018-06-18', '2018-06-18', '', 'WAL-MART #0688   8585', '-69.84', '0.00', NULL, 'Groceries', NULL),
(919, 'Damien\'s Checking * 7128', '2018-06-18', '2018-06-18', '', 'DEALS     5700   8585', '-7.47', '0.00', NULL, 'Misc', NULL),
(920, 'Damien\'s Checking * 7128', '2018-06-18', '2018-06-18', '', 'TARGET T- 780    8585', '-2.01', '0.00', NULL, 'Household:Items', NULL),
(921, 'Damien\'s Checking * 7128', '2018-06-18', '2018-06-18', '', 'TARGET T- 780    8585', '-76.45', '0.00', NULL, 'Household:Items', NULL),
(922, 'Damien\'s Checking * 7128', '2018-06-18', '2018-06-18', '', 'BSA NASHVILLE    1099', '-21.84', '0.00', NULL, 'Dues and Subscriptions', NULL),
(923, 'Damien\'s Checking * 7128', '2018-06-18', '2018-06-18', '', 'TIGERMARKET #2   1099', '-13.72', '0.00', NULL, 'Dining:Pit Stop', NULL),
(924, 'Damien\'s Checking * 7128', '2018-06-18', '2018-06-18', '', 'MOXIE PEST CONT  1099', '-119.00', '0.00', NULL, 'Services', NULL),
(925, 'Damien\'s Checking * 7128', '2018-06-18', '2018-06-18', '', 'LIBRARY GARAGE   1099', '-2.00', '0.00', NULL, 'Travel:Parking', NULL),
(926, 'Damien\'s Checking * 7128', '2018-06-18', '2018-06-18', '', 'BURGER REPUBLIC  8585', '-66.74', '0.00', NULL, 'Dining', NULL),
(927, 'Damien\'s Checking * 7128', '2018-06-18', '2018-06-18', '', 'Wal-Mart Super   8585', '-24.68', '0.00', NULL, 'Groceries', NULL),
(928, 'Damien\'s Checking * 7128', '2018-06-18', '2018-06-18', '', 'TIGERMARKET #2   8585', '-0.86', '0.00', NULL, 'Dining:Pit Stop', NULL),
(929, 'Damien\'s Checking * 7128', '2018-06-18', '2018-06-18', '', 'CITGO QUEST ST   1099', '-9.61', '0.00', NULL, 'Dining:Pit Stop', NULL),
(930, 'Damien\'s Checking * 7128', '2018-06-18', '2018-06-18', '', 'TIGERMARKET #2   1099', '-9.65', '0.00', NULL, 'Dining:Pit Stop', NULL),
(931, 'Damien\'s Checking * 7128', '2018-06-18', '2018-06-18', '', 'Spotify USA      1099', '-16.38', '0.00', NULL, 'Subscriptions', NULL),
(932, 'Damien\'s Checking * 7128', '2018-06-18', '2018-06-18', '', 'COMMUNITY BIBLE  CONTRIBUTN', '-100.00', '0.00', NULL, 'Tithe', NULL),
(933, 'Damien\'s Checking * 7128', '2018-06-18', '2018-06-18', '', 'NES POWER        UTILITY', '-313.27', '0.00', NULL, 'Utilities:Gas & Electric', NULL),
(934, 'Damien\'s Checking * 7128', '2018-06-18', '2018-06-18', '', 'CITI CARD ONLINE PAYMENT', '-400.00', '0.00', NULL, 'Credit Card', NULL),
(935, 'Damien\'s Checking * 7128', '2018-06-18', '2018-06-18', '', 'ALDI 70051       8585', '-102.42', '0.00', NULL, 'Groceries', NULL),
(936, 'Damien\'s Checking * 7128', '2018-06-18', '2018-06-18', '', 'Thornton # 602   8585', '-45.66', '0.00', NULL, 'Auto:Fuel', NULL),
(937, 'Damien\'s Checking * 7128', '2018-06-18', '2018-06-18', '', 'PUBLIX SUPER M   8585', '-71.55', '0.00', NULL, 'Groceries', NULL),
(938, 'Damien\'s Checking * 7128', '2018-06-19', '2018-06-19', '', 'DYNASTY SUPER B  1099', '-34.20', '0.00', NULL, 'Dining', NULL),
(939, 'Damien\'s Checking * 7128', '2018-06-19', '2018-06-19', '', 'CHR*CHRISTIANBO  8585', '-340.10', '0.00', NULL, 'Education:Homeschool Supplies', NULL),
(940, 'Damien\'s Checking * 7128', '2018-06-19', '2018-06-19', '', '5 STAR MARKETS   1099', '-6.44', '0.00', NULL, 'Dining:Pit Stop', NULL),
(941, 'Damien\'s Checking * 7128', '2018-06-19', '2018-06-19', '', '5 STAR MARKETS   1099', '-1.86', '0.00', NULL, 'Dining:Pit Stop', NULL),
(942, 'Damien\'s Checking * 7128', '2018-06-19', '2018-06-19', '', 'SONIC DRIVE IN   8585', '-18.93', '0.00', NULL, 'Dining', NULL),
(943, 'Damien\'s Checking * 7128', '2018-06-19', '2018-06-19', '', 'PAYPAL           INST XFER', '-1.80', '0.00', NULL, NULL, NULL),
(944, 'Damien\'s Checking * 7128', '2018-06-19', '2018-06-19', '', 'KROGER #5 6690   8585', '-61.68', '0.00', NULL, 'Groceries', NULL),
(945, 'Damien\'s Checking * 7128', '2018-06-20', '2018-06-20', '', '5 STAR MARKETS   1099', '-8.39', '0.00', NULL, 'Dining:Pit Stop', NULL),
(946, 'Damien\'s Checking * 7128', '2018-06-20', '2018-06-20', '', '5 STAR MARKETS   1099', '-3.16', '0.00', NULL, 'Dining:Pit Stop', NULL),
(947, 'Damien\'s Checking * 7128', '2018-06-21', '2018-06-21', '', '5 STAR MARKETS   1099', '-6.44', '0.00', NULL, 'Dining:Pit Stop', NULL),
(948, 'Damien\'s Checking * 7128', '2018-06-21', '2018-06-21', '', 'TMOBILE POSTPAI  8585', '-130.27', '0.00', NULL, 'Utilities:Telephone', NULL),
(949, 'Damien\'s Checking * 7128', '2018-06-21', '2018-06-21', '', 'PUBLIX SUPER M   8585', '-31.19', '0.00', NULL, 'Groceries', NULL),
(950, 'Damien\'s Checking * 7128', '2018-06-21', '2018-06-21', '', 'TIGERMARKET #2   8585', '-0.86', '0.00', NULL, 'Dining:Pit Stop', NULL),
(951, 'Damien\'s Checking * 7128', '2018-06-21', '2018-06-21', '', 'CITGO QUEST ST   1099', '-6.99', '0.00', NULL, 'Dining:Pit Stop', NULL),
(952, 'Damien\'s Checking * 7128', '2018-06-22', '2018-06-22', '', 'WENDY S #0408    1099', '-10.20', '0.00', NULL, 'Dining', NULL),
(953, 'Damien\'s Checking * 7128', '2018-06-22', '2018-06-22', '', 'GOOGLE *Minecra  1099', '-7.99', '0.00', NULL, 'Entertainment', NULL),
(982, 'Damien\'s Checking * 7128', '2018-06-25', '2018-06-25', '', '5 STAR MARKETS   1099', '-6.44', '0.00', NULL, 'Dining:Pit Stop', NULL),
(983, 'Damien\'s Checking * 7128', '2018-06-25', '2018-06-25', '', 'KOI              1099', '-11.82', '0.00', NULL, 'Dining', NULL),
(984, 'Damien\'s Checking * 7128', '2018-06-25', '2018-06-25', '', 'THORNTONS #0611  1099', '-41.50', '0.00', NULL, 'Auto:Fuel', NULL),
(985, 'Damien\'s Checking * 7128', '2018-06-25', '2018-06-25', '', 'CHINA KING       1099', '-26.00', '0.00', NULL, 'Dining', NULL),
(986, 'Damien\'s Checking * 7128', '2018-06-25', '2018-06-25', '', 'TACO BELL #0344  8585', '-13.08', '0.00', NULL, 'Dining', NULL),
(987, 'Damien\'s Checking * 7128', '2018-06-25', '2018-06-25', '', 'TIGERMARKET #2   8585', '-0.86', '0.00', NULL, 'Dining:Pit Stop', NULL),
(988, 'Damien\'s Checking * 7128', '2018-06-25', '2018-06-25', '', 'WM SUPERC Wal-   1099', '-26.11', '0.00', NULL, 'Groceries', NULL),
(989, 'Damien\'s Checking * 7128', '2018-06-25', '2018-06-25', '', 'KROGER #8 5771   1099', '-6.35', '0.00', NULL, 'Groceries', NULL),
(990, 'Damien\'s Checking * 7128', '2018-06-25', '2018-06-25', '', 'CITGO QUEST ST   1099', '-10.27', '0.00', NULL, 'Dining:Pit Stop', NULL),
(991, 'Damien\'s Checking * 7128', '2018-06-25', '2018-06-25', '', 'PUBLIX SUPER M   8585', '-52.51', '0.00', NULL, 'Groceries', NULL),
(992, 'Damien\'s Checking * 7128', '2018-06-25', '2018-06-25', '', 'KROGER #5 6690   8585', '-57.35', '0.00', NULL, 'Groceries', NULL),
(993, 'Damien\'s Checking * 7128', '2018-06-25', '2018-06-25', '', 'KROGER #5 6690   8585', '-46.36', '0.00', NULL, 'Groceries', NULL),
(994, 'Damien\'s Checking * 7128', '2018-06-25', '2018-06-25', '', 'PUBLIX SUPER M   8585', '-41.37', '0.00', NULL, 'Groceries', NULL),
(995, 'Damien\'s Checking * 7128', '2018-06-26', '2018-06-26', '', '5 STAR MARKETS   1099', '-3.86', '0.00', NULL, 'Dining:Pit Stop', NULL),
(996, 'Damien\'s Checking * 7128', '2018-06-26', '2018-06-26', '', 'PAYPAL           INST XFER', '-1.40', '0.00', NULL, NULL, NULL),
(997, 'Damien\'s Checking * 7128', '2018-06-27', '2018-06-27', '', 'DEPOSIT', '0.00', '120.00', NULL, 'Cash', NULL),
(998, 'Damien\'s Checking * 7128', '2018-06-27', '2018-06-27', '', 'DEPOSIT', '0.00', '120.00', NULL, 'Cash', NULL),
(999, 'Damien\'s Checking * 7128', '2018-06-27', '2018-06-27', '', '5 STAR MARKETS   1099', '-5.92', '0.00', NULL, 'Dining:Pit Stop', NULL),
(1000, 'Damien\'s Checking * 7128', '2018-06-27', '2018-06-27', '', 'WM SUPERC Wal-   8585', '-46.91', '0.00', NULL, 'Groceries', NULL),
(1001, 'Damien\'s Checking * 7128', '2018-06-27', '2018-06-27', '', 'PUBLIX SUPER M   8585', '-16.19', '0.00', NULL, 'Groceries', NULL),
(1006, 'Damien\'s Checking * 7128', '2018-06-28', '2018-06-28', '', 'CLASSICAL CONVE  8585', '-93.56', '0.00', NULL, 'Education:Homeschool Supplies', NULL),
(1007, 'Damien\'s Checking * 7128', '2018-06-28', '2018-06-28', '', 'MCDONALD S F283  1099', '-12.93', '0.00', NULL, 'Dining', NULL),
(1008, 'Damien\'s Checking * 7128', '2018-06-28', '2018-06-28', '', 'TIGERMARKET #2   8585', '-0.86', '0.00', NULL, 'Dining:Pit Stop', NULL),
(1014, 'Damien\'s Checking * 7128', '2018-06-29', '2018-06-29', '', 'TriStar          PR PAYMENT', '0.00', '1298.88', NULL, 'Salary', NULL),
(1015, 'Damien\'s Checking * 7128', '2018-06-29', '2018-06-29', '', 'CHANGE HEALTHCAR PAYROLL', '0.00', '2434.52', NULL, 'Salary', NULL),
(1016, 'Damien\'s Checking * 7128', '2018-06-29', '2018-06-29', '', 'PAYPAL           INST XFER', '-240.00', '0.00', NULL, 'Education:Homeschool Supplies', NULL),
(1017, 'Damien\'s Checking * 7128', '2018-06-29', '2018-06-29', '', 'TARGET T- 780    8585', '-38.95', '0.00', NULL, 'Household:Items', NULL),
(1018, 'Damien\'s Checking * 7128', '2018-06-29', '2018-06-29', '', 'KROGER #5 6690   8585', '-33.36', '0.00', NULL, 'Groceries', NULL),
(1019, 'Damien\'s Checking * 7128', '2018-06-29', '2018-06-29', '', 'Regions         MILL CREEK', '-440.00', '0.00', NULL, 'Cash', NULL),
(1054, 'Damien\'s Checking * 7128', '2018-07-02', '2018-07-02', '', 'BAPTIST LAB PLU  8585', '-105.03', '0.00', NULL, 'Medical', NULL),
(1055, 'Damien\'s Checking * 7128', '2018-07-02', '2018-07-02', '', 'PATH GROUP LABS  8585', '-143.16', '0.00', NULL, 'Medical', NULL),
(1056, 'Damien\'s Checking * 7128', '2018-07-02', '2018-07-02', '', 'PHR*NephrologyA  8585', '-222.74', '0.00', NULL, 'Medical', NULL),
(1057, 'Damien\'s Checking * 7128', '2018-07-02', '2018-07-02', '', 'ASSOCIATED PATH  8585', '-2.55', '0.00', NULL, 'Medical', NULL),
(1058, 'Damien\'s Checking * 7128', '2018-07-02', '2018-07-02', '', '5 STAR MARKETS   1099', '-6.44', '0.00', NULL, 'Dining:Pit Stop', NULL),
(1059, 'Damien\'s Checking * 7128', '2018-07-02', '2018-07-02', '', 'DUNKIN DONUTS M  8585', '-15.00', '0.00', NULL, 'Dining', NULL),
(1060, 'Damien\'s Checking * 7128', '2018-07-02', '2018-07-02', '', 'SONICDRIVEINSTO  8585', '-20.00', '0.00', NULL, 'Dining', NULL),
(1061, 'Damien\'s Checking * 7128', '2018-07-02', '2018-07-02', '', 'MCDONALD S F231  8585', '-32.44', '0.00', NULL, 'Dining', NULL),
(1062, 'Damien\'s Checking * 7128', '2018-07-02', '2018-07-02', '', 'KOI              1099', '-11.82', '0.00', NULL, 'Dining', NULL),
(1063, 'Damien\'s Checking * 7128', '2018-07-02', '2018-07-02', '', '5 STAR MARKETS   1099', '-3.16', '0.00', NULL, 'Dining:Pit Stop', NULL),
(1064, 'Damien\'s Checking * 7128', '2018-07-02', '2018-07-02', '', 'THORNTONS #0602  1099', '-12.08', '0.00', NULL, 'Dining:Pit Stop', NULL),
(1065, 'Damien\'s Checking * 7128', '2018-07-02', '2018-07-02', '', 'Thorntons #607   1099', '-6.56', '0.00', NULL, 'Dining:Pit Stop', NULL),
(1066, 'Damien\'s Checking * 7128', '2018-07-02', '2018-07-02', '', 'KROGER #5 6690   8585', '-101.18', '0.00', NULL, 'Groceries', NULL),
(1067, 'Damien\'s Checking * 7128', '2018-07-02', '2018-07-02', '', 'PANERA BREAD #6  8585', '-14.39', '0.00', NULL, 'Dining', NULL),
(1068, 'Damien\'s Checking * 7128', '2018-07-02', '2018-07-02', '', 'A BEKA BOOK      8585', '-8.09', '0.00', NULL, 'Education:Homeschool Supplies', NULL),
(1069, 'Damien\'s Checking * 7128', '2018-07-02', '2018-07-02', '', 'Thorntons #607   1099', '-18.23', '0.00', NULL, 'Dining:Pit Stop', NULL),
(1070, 'Damien\'s Checking * 7128', '2018-07-02', '2018-07-02', '', 'LOWE S #2725     1099', '-65.55', '0.00', NULL, 'Household:Home Improvement', NULL),
(1071, 'Damien\'s Checking * 7128', '2018-07-02', '2018-07-02', '', 'PUBLIX SUPER M   8585', '-75.38', '0.00', NULL, 'Groceries', NULL),
(1072, 'Damien\'s Checking * 7128', '2018-07-02', '2018-07-02', '', 'DEALS     5700   8585', '-8.19', '0.00', NULL, 'Misc', NULL),
(1073, 'Damien\'s Checking * 7128', '2018-07-02', '2018-07-02', '', 'TIGERMARKET #2   8585', '-0.86', '0.00', NULL, 'Dining:Pit Stop', NULL),
(1074, 'Damien\'s Checking * 7128', '2018-07-02', '2018-07-02', '', 'CITGO QUEST ST   1099', '-10.27', '0.00', NULL, 'Dining:Pit Stop', NULL),
(1075, 'Damien\'s Checking * 7128', '2018-07-02', '2018-07-02', '', 'KROGER FUEL #9   8585', '-36.61', '0.00', NULL, 'Auto:Fuel', NULL),
(1076, 'Damien\'s Checking * 7128', '2018-07-02', '2018-07-02', '', '5/3 MORTGAGE LN  PAYMENT', '-1532.08', '0.00', NULL, 'Mortgage', NULL),
(1077, 'Damien\'s Checking * 7128', '2018-07-02', '2018-07-02', '', 'Thornton # 602   1099', '-10.59', '0.00', NULL, 'Dining:Pit Stop', NULL),
(1085, 'Damien\'s Checking * 7128', '2018-07-03', '2018-07-03', '', 'Cashback         Rewards', '0.00', '0.31', NULL, 'Interest Inc', NULL),
(1086, 'Damien\'s Checking * 7128', '2018-07-03', '2018-07-03', '', 'PHR*NephrologyA  8011', '0.00', '222.74', NULL, 'Medical', NULL),
(1087, 'Damien\'s Checking * 7128', '2018-07-03', '2018-07-03', '', 'DYNASTY SUPER B  1099', '-21.07', '0.00', NULL, 'Dining', NULL),
(1088, 'Damien\'s Checking * 7128', '2018-07-03', '2018-07-03', '', 'DAILY BURN INC  8585', '-19.95', '0.00', NULL, 'Subscriptions', NULL),
(1089, 'Damien\'s Checking * 7128', '2018-07-03', '2018-07-03', '', '5 STAR MARKETS   1099', '-6.44', '0.00', NULL, 'Dining:Pit Stop', NULL),
(1090, 'Damien\'s Checking * 7128', '2018-07-03', '2018-07-03', '', 'ATT              Payment', '-70.00', '0.00', NULL, 'Utilities', NULL),
(1091, 'Damien\'s Checking * 7128', '2018-07-03', '2018-07-03', '', 'WM SUPERC Wal-   8585', '-110.66', '0.00', NULL, 'Groceries', NULL),
(1092, 'Damien\'s Checking * 7128', '2018-07-05', '2018-07-05', '2976', 'Troop 621', '-52.00', '0.00', NULL, 'Misc', NULL),
(1093, 'Damien\'s Checking * 7128', '2018-07-05', '2018-07-05', '', '5 STAR MARKETS   1099', '-4.86', '0.00', NULL, 'Dining:Pit Stop', NULL),
(1094, 'Damien\'s Checking * 7128', '2018-07-05', '2018-07-05', '', 'L2G*METRO WATER  8585', '-81.71', '0.00', NULL, 'Utilities:Water', NULL),
(1095, 'Damien\'s Checking * 7128', '2018-07-05', '2018-07-05', '', 'TIGERMARKET #2   8585', '-0.86', '0.00', NULL, 'Dining:Pit Stop', NULL),
(1096, 'Damien\'s Checking * 7128', '2018-07-05', '2018-07-05', '', 'SOUTHERN HILLS   8585', '-1.85', '0.00', NULL, 'Dining', NULL),
(1097, 'Damien\'s Checking * 7128', '2018-07-05', '2018-07-05', '', 'CHASE CREDIT CRD EPAY', '-100.00', '0.00', NULL, 'Credit Card', NULL),
(1098, 'Damien\'s Checking * 7128', '2018-07-05', '2018-07-05', '', 'KROGER #5 6690   8585', '-61.17', '0.00', NULL, 'Groceries', NULL),
(1099, 'Damien\'s Checking * 7128', '2018-07-06', '2018-07-06', '', 'PIEDMONT NATURA  8585', '-27.79', '0.00', NULL, 'Utilities:Gas & Electric', NULL),
(1100, 'Damien\'s Checking * 7128', '2018-07-06', '2018-07-06', '', 'KROGER #5 6690   8585', '-46.77', '0.00', NULL, 'Groceries', NULL),
(1101, 'Damien\'s Checking * 7128', '2018-07-06', '2018-07-06', '', 'PUBLIX SUPER M   8585', '-68.06', '0.00', NULL, 'Groceries', NULL),
(1102, 'Damien\'s Checking * 7128', '2018-07-06', '2018-07-06', '', 'PUBLIX SUPER M   8585', '-25.98', '0.00', NULL, 'Groceries', NULL),
(1103, 'Damien\'s Checking * 7128', '2018-07-06', '2018-07-06', '', 'Thornton # 603   1099', '-39.00', '0.00', NULL, 'Auto:Fuel', NULL),
(1112, 'Damien\'s Checking * 7128', '2018-07-09', '2018-07-09', '', 'DEPOSIT', '0.00', '100.00', NULL, 'Cash', NULL),
(1113, 'Damien\'s Checking * 7128', '2018-07-09', '2018-07-09', '', '5 STAR MARKETS   1099', '-6.44', '0.00', NULL, 'Dining:Pit Stop', NULL),
(1114, 'Damien\'s Checking * 7128', '2018-07-09', '2018-07-09', '', 'KOI              1099', '-11.82', '0.00', NULL, 'Dining', NULL),
(1115, 'Damien\'s Checking * 7128', '2018-07-09', '2018-07-09', '', '5 STAR MARKETS   1099', '-3.16', '0.00', NULL, 'Dining:Pit Stop', NULL),
(1116, 'Damien\'s Checking * 7128', '2018-07-09', '2018-07-09', '', 'HLU*Hulu 676620  1099', '-13.08', '0.00', NULL, 'Subscriptions', NULL),
(1117, 'Damien\'s Checking * 7128', '2018-07-09', '2018-07-09', '', 'TIGERMARKET #2   8585', '-0.86', '0.00', NULL, 'Dining:Pit Stop', NULL),
(1118, 'Damien\'s Checking * 7128', '2018-07-09', '2018-07-09', '', 'GULF OIL 920515  1099', '-22.03', '0.00', NULL, 'Auto:Fuel', NULL),
(1119, 'Damien\'s Checking * 7128', '2018-07-09', '2018-07-09', '', 'SOUTHERN HILLS   8585', '-0.96', '0.00', NULL, 'Dining:Pit Stop', NULL),
(1120, 'Damien\'s Checking * 7128', '2018-07-09', '2018-07-09', '', 'TIGERMARKET #2   1099', '-6.66', '0.00', NULL, 'Dining:Pit Stop', NULL),
(1121, 'Damien\'s Checking * 7128', '2018-07-09', '2018-07-09', '', 'CICIS PIZZA 326  1099', '-24.34', '0.00', NULL, 'Dining', NULL),
(1122, 'Damien\'s Checking * 7128', '2018-07-09', '2018-07-09', '', 'KROGER #5 5713   1099', '-27.97', '0.00', NULL, 'Groceries', NULL),
(1123, 'Damien\'s Checking * 7128', '2018-07-09', '2018-07-09', '', 'TRASHBILLING.COM 70231 0', '-51.40', '0.00', NULL, 'Utilities:Garbage Collection', NULL),
(1124, 'Damien\'s Checking * 7128', '2018-07-09', '2018-07-09', '', 'Wal-Mart Super   8585', '-40.50', '0.00', NULL, 'Groceries', NULL),
(1125, 'Damien\'s Checking * 7128', '2018-07-09', '2018-07-09', '', 'PUBLIX SUPER M   1099', '-16.83', '0.00', NULL, 'Groceries', NULL),
(1129, 'Damien\'s Checking * 7128', '2018-07-10', '2018-07-10', '', 'DYNASTY SUPER B  1099', '-52.97', '0.00', NULL, 'Dining', NULL),
(1130, 'Damien\'s Checking * 7128', '2018-07-10', '2018-07-10', '', 'NETFLIX.COM      1099', '-12.03', '0.00', NULL, 'Subscriptions', NULL),
(1131, 'Damien\'s Checking * 7128', '2018-07-10', '2018-07-10', '', '5 STAR MARKETS   1099', '-3.16', '0.00', NULL, 'Dining:Pit Stop', NULL),
(1132, 'Damien\'s Checking * 7128', '2018-07-10', '2018-07-10', '', '5 STAR MARKETS   1099', '-3.16', '0.00', NULL, 'Dining:Pit Stop', NULL),
(1133, 'Damien\'s Checking * 7128', '2018-07-10', '2018-07-10', '', 'PUBLIX SUPER M   1099', '-12.10', '0.00', NULL, 'Groceries', NULL),
(1134, 'Damien\'s Checking * 7128', '2018-07-10', '2018-07-10', '', 'PUBLIX SUPER M   1099', '-16.83', '0.00', NULL, 'Groceries', NULL),
(1140, 'Damien\'s Checking * 7128', '2018-07-11', '2018-07-11', '', '5 STAR MARKETS   1099', '-1.58', '0.00', NULL, 'Dining:Pit Stop', NULL),
(1141, 'Damien\'s Checking * 7128', '2018-07-11', '2018-07-11', '', 'TIGERMARKET #2   1099', '-6.66', '0.00', NULL, 'Dining:Pit Stop', NULL),
(1142, 'Damien\'s Checking * 7128', '2018-07-11', '2018-07-11', '', 'Thornton # 602   1099', '-10.59', '0.00', NULL, 'Dining', NULL),
(1143, 'Damien\'s Checking * 7128', '2018-07-12', '2018-07-12', '', 'SONICDRIVEINSTO  8585', '-10.00', '0.00', NULL, 'Dining', NULL),
(1144, 'Damien\'s Checking * 7128', '2018-07-12', '2018-07-12', '', 'TIGERMARKET #2   8585', '-0.86', '0.00', NULL, 'Dining:Pit Stop', NULL),
(1145, 'Damien\'s Checking * 7128', '2018-07-13', '2018-07-13', '', 'TriStar          PR PAYMENT', '0.00', '1223.31', NULL, 'Salary', NULL),
(1146, 'Damien\'s Checking * 7128', '2018-07-13', '2018-07-13', '', 'CHANGE HEALTHCAR PAYROLL', '0.00', '2166.37', NULL, 'Salary', NULL),
(1147, 'Damien\'s Checking * 7128', '2018-07-13', '2018-07-13', '', 'PAYPAL           TRANSFER', '0.00', '412.75', NULL, 'Rent Paid', NULL),
(1148, 'Damien\'s Checking * 7128', '2018-07-13', '2018-07-13', '', 'Fellowship Scho', '-10.00', '0.00', NULL, 'Education:Homeschool Supplies', NULL),
(1149, 'Damien\'s Checking * 7128', '2018-07-13', '2018-07-13', '', 'Fellowship Scho', '-40.00', '0.00', NULL, 'Education:Homeschool Supplies', NULL),
(1150, 'Damien\'s Checking * 7128', '2018-07-13', '2018-07-13', '', 'SOUTHERN HILLS', '-3.63', '0.00', NULL, 'Dining', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Trash`
--

CREATE TABLE `Trash` (
  `Id` int(11) NOT NULL,
  `Account` varchar(255) NOT NULL,
  `TDate` date NOT NULL,
  `PDate` date DEFAULT NULL,
  `CkNo` varchar(255) DEFAULT NULL,
  `tD` varchar(255) NOT NULL,
  `Debit` decimal(10,2) DEFAULT NULL,
  `Credit` decimal(10,2) DEFAULT NULL,
  `Color` varchar(20) DEFAULT NULL,
  `Category` varchar(255) DEFAULT NULL,
  `RecurID` int(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Upload`
--

CREATE TABLE `Upload` (
  `Id` int(11) NOT NULL,
  `Account` varchar(255) NOT NULL,
  `TDate` date NOT NULL,
  `PDate` date DEFAULT NULL,
  `CkNo` varchar(255) DEFAULT NULL,
  `Description` varchar(255) NOT NULL,
  `Debit` decimal(10,2) DEFAULT NULL,
  `Credit` decimal(10,2) DEFAULT NULL,
  `Color` varchar(20) DEFAULT NULL,
  `Category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Upload`
--

INSERT INTO `Upload` (`Id`, `Account`, `TDate`, `PDate`, `CkNo`, `Description`, `Debit`, `Credit`, `Color`, `Category`) VALUES
(1, 'Damien\'s Checking * 7128', '2018-06-25', '2018-06-25', '', '5 STAR MARKETS   1099', '-6.44', '0.00', NULL, NULL),
(2, 'Damien\'s Checking * 7128', '2018-06-25', '2018-06-25', '', 'KOI              1099', '-11.82', '0.00', NULL, NULL),
(3, 'Damien\'s Checking * 7128', '2018-06-25', '2018-06-25', '', 'THORNTONS #0611  1099', '-41.50', '0.00', NULL, NULL),
(4, 'Damien\'s Checking * 7128', '2018-06-25', '2018-06-25', '', 'CHINA KING       1099', '-26.00', '0.00', NULL, NULL),
(5, 'Damien\'s Checking * 7128', '2018-06-25', '2018-06-25', '', 'TACO BELL #0344  8585', '-13.08', '0.00', NULL, NULL),
(6, 'Damien\'s Checking * 7128', '2018-06-25', '2018-06-25', '', 'TIGERMARKET #2   8585', '-0.86', '0.00', NULL, NULL),
(7, 'Damien\'s Checking * 7128', '2018-06-25', '2018-06-25', '', 'WM SUPERC Wal-   1099', '-26.11', '0.00', NULL, NULL),
(8, 'Damien\'s Checking * 7128', '2018-06-25', '2018-06-25', '', 'KROGER #8 5771   1099', '-6.35', '0.00', NULL, NULL),
(9, 'Damien\'s Checking * 7128', '2018-06-25', '2018-06-25', '', 'CITGO QUEST ST   1099', '-10.27', '0.00', NULL, NULL),
(10, 'Damien\'s Checking * 7128', '2018-06-25', '2018-06-25', '', 'PUBLIX SUPER M   8585', '-52.51', '0.00', NULL, NULL),
(11, 'Damien\'s Checking * 7128', '2018-06-25', '2018-06-25', '', 'KROGER #5 6690   8585', '-57.35', '0.00', NULL, NULL),
(12, 'Damien\'s Checking * 7128', '2018-06-25', '2018-06-25', '', 'KROGER #5 6690   8585', '-46.36', '0.00', NULL, NULL),
(13, 'Damien\'s Checking * 7128', '2018-06-25', '2018-06-25', '', 'PUBLIX SUPER M   8585', '-41.37', '0.00', NULL, NULL),
(14, 'Damien\'s Checking * 7128', '2018-06-26', '2018-06-26', '', '5 STAR MARKETS   1099', '-3.86', '0.00', NULL, NULL),
(15, 'Damien\'s Checking * 7128', '2018-06-26', '2018-06-26', '', 'PAYPAL           INST XFER', '-1.40', '0.00', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Future`
--
ALTER TABLE `Future`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Register`
--
ALTER TABLE `Register`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Trash`
--
ALTER TABLE `Trash`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Upload`
--
ALTER TABLE `Upload`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Categories`
--
ALTER TABLE `Categories`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
--
-- AUTO_INCREMENT for table `Future`
--
ALTER TABLE `Future`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Register`
--
ALTER TABLE `Register`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1151;
--
-- AUTO_INCREMENT for table `Trash`
--
ALTER TABLE `Trash`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Upload`
--
ALTER TABLE `Upload`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
