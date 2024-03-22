-- PHP
-- MYSQL || XAMPP
-- BOOTSTRAP 
-- HTML
-- CSS 


-- Database: `kap_db` 
--
-- -------------------------------------------------------- 
--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
