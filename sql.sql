CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `time` varchar(10) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`ID`, `username`, `email`, `password`, `ip_address`, `time`, `date`) VALUES
(1, 'John', 'john@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', '127.0.0.1', '16:53:07', '2020-01-01');

ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;
