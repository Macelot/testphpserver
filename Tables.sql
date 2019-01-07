CREATE TABLE `tblUser` (
  `tblUser_id` int(11) NOT NULL,
  `tblUser_name` varchar(30) DEFAULT NULL,
  `tblUser_email` varchar(50) DEFAULT NULL,
  `tblUser_fone` varchar(55) DEFAULT NULL,
  `tblUser_password` varchar(10) DEFAULT NULL,
  `tblUser_salary` float(10,2) DEFAULT NULL,
  `tblUser_picture` longblob,
  `tblUser_idManager_tblUser` int(11) DEFAULT NULL,
  `tblUser_IdRole_tblRole` int(11) DEFAULT NULL,
  `tblUser_notes` text,
  `tblUser_sex` varchar(10) DEFAULT NULL,
  `tblUser_day` varchar(51) DEFAULT NULL,
  `tblUser_breed` varchar(15) DEFAULT NULL,
  `tblUser_version` int(11) NOT NULL DEFAULT '1',
  `tblUser_registerDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tblUser_registerUser` int(11) DEFAULT NULL,
  `tblUser_updateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tblUser_updateUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `tblUser`
  ADD PRIMARY KEY (`tblUser_id`),
  ADD KEY `tblUser_id` (`tblUser_id`);

ALTER TABLE `tblUser`
  MODIFY `tblUser_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

CREATE TABLE `tblRole` (
  `tblRole_id` int(11) NOT NULL,
  `tblRole_description` varchar(45) DEFAULT NULL,
  `tblRole_user` int(11) NOT NULL,
  `tblRole_version` int(11) NOT NULL DEFAULT '1',
  `tblRole_registerDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tblRole_registerUser` int(11) DEFAULT NULL,
  `tblRole_updateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tblRole_updateUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `tblRole`
  ADD PRIMARY KEY (`tblRole_id`);

ALTER TABLE `tblRole`
  MODIFY `tblRole_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


