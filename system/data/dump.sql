SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
--
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(96) NOT NULL,
  `message` mediumtext NOT NULL,
  `site` varchar(64) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL
)



CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `name` varchar (255) NOT NULL,
  `content` mediumtext NOT NULL,


)

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role` enum('administrator','moderator','user') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(96) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

-- INSERT INTO `user` (`id`, `role`, `username`, `password`, `email`, `ip`, `date_added`) VALUES
-- (1, 'administrator', 'Administrator', '$2y$10$PQhHWiqGlputsPABr3Rxe.STfI0COmoDHsff9QV6P0rqQZeY6o0nO', 'administrator@admin.com', '::1', '2018-03-18 00:00:00'),
-- (2, 'moderator', 'Moderator', '$2y$10$PQhHWiqGlputsPABr3Rxe.STfI0COmoDHsff9QV6P0rqQZeY6o0nO', 'moderator@admin.com', '::1', '2018-03-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_online`
--

-- CREATE TABLE `user_online` (
--   `ip` varchar(40) NOT NULL,
--   `user_id` int(11) NOT NULL,
--   `url` text NOT NULL,
--   `referer` text NOT NULL,
--   `date_added` datetime NOT NULL
-- ) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `user_online`
--
ALTER TABLE `user_online`
  ADD PRIMARY KEY (`ip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
