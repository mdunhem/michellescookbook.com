SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


INSERT INTO `directions` (`id`, `step`, `step_number`, `for`, `recipe_id`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1, 'For Something', 1),
(2, '[Test]fsdfs', 1, '', 2),
(3, '[for]blah', 1, '', 3),
(4, '[for]fafafa', 1, '', 4),
(7, '[4]lfdsjioj', 1, '', 6),
(8, '', 0, '', 6),
(9, '[3]fasdfasd', 1, '[3]', 7),
(10, '[fssss]fwfwf', 1, '[fssss]', 8),
(11, '[ffs]wwfwfw', 1, 'ffs', 9),
(12, '[testing]fsfsf', 1, 'testing', 10),
(13, '[e2e2]fafaf', 1, 'e2e2', 11),
(14, 'fsfds', 1, 'testing', 12),
(15, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 2, '', 1),
(16, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 3, '', 1);

INSERT INTO `ingredients` (`id`, `name`, `for`, `measure`, `measure_amount`, `recipe_id`) VALUES
(1, 'Test', 'Crust', NULL, NULL, 1),
(2, 'vdsv', '', NULL, NULL, 2),
(3, 'osmvpv', '', NULL, NULL, 3),
(4, 'fwfwfw', '', NULL, NULL, 4),
(6, 'vsvs', '', NULL, NULL, 6),
(7, 'bdbfdb', '', NULL, NULL, 7),
(8, 'avvav', '', NULL, NULL, 8),
(9, 'vsvs', '', NULL, NULL, 9),
(10, 'svsv', '', NULL, NULL, 10),
(11, 'vsvs', '', NULL, NULL, 11),
(12, 'vvs', '', NULL, NULL, 12),
(13, '1/3 cup sugar', 'Filling', NULL, NULL, 1),
(14, '2 teaspoons sugar', 'Whipped Cream', NULL, NULL, 1),
(15, 'blah blah blah', 'Whipped Cream', NULL, NULL, 1),
(17, '3 cups sugar', 'Pie', NULL, NULL, 1);

INSERT INTO `recipes` (`id`, `name`, `description`, `category`, `prep_time`, `cook_time`, `servings`, `notes`) VALUES
(1, 'Test', '"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', '', 30, 25, '6-8', 'To skin hazelnuts, spread them on a rimmed baking sheet. Bake in a 350 degree oven for 10-15 minutes, until the skins have cracked. While the nuts are still quite hot, transfer to a dish towel; fold or close over the towel and rub vigorously to dislodge the skins. (This will make a mess.)'),
(2, 'ffewfvsd', '', '', NULL, NULL, '0', ''),
(3, 'noinoin', '', '', NULL, NULL, '0', ''),
(4, 'dlfkmvd', '', '', NULL, NULL, '0', ''),
(6, 'fwfwf', '', '', NULL, NULL, '0', ''),
(7, 'sbvsvsv', '', '', NULL, NULL, '0', ''),
(8, 'wfwf', '', '', NULL, NULL, '0', ''),
(9, 'fwfw', '', '', NULL, NULL, '0', ''),
(10, 'fwfwv', '', '', NULL, NULL, '0', ''),
(11, 'dqdq', '', '', NULL, NULL, '0', ''),
(12, 'fsfwe', '', '', NULL, NULL, '0', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;