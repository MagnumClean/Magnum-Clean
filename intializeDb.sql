SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE accounts (
  id int(11) NOT NULL,
  firstName varchar(50) NOT NULL,
  lastName varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  mobile varchar(30) NOT NULL,
  password varchar(50) NOT NULL,
  activationState varchar(50) NOT NULL,
  reservationNumber int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE accounts
  ADD PRIMARY KEY (id);

ALTER TABLE accounts
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;





CREATE TABLE admin (
  id int(11) NOT NULL,
  username varchar(50),
  password varchar(50)
);

INSERT INTO admin (id, username, password) VALUES
(1, 'admin@gmail.com', '12345');

CREATE TABLE reservations (
  id int(11) NOT NULL,
  email char(50) NOT NULL,
  serviceType varchar(50) NOT NULL,
  environmentType char(50) NOT NULL,
  spaceToClean varchar(50) NOT NULL,
  floorNumber varchar(50) NOT NULL,
  cleaningDate varchar(50) NOT NULL,
  contactPhoneNumber bigint(20) NOT NULL,
  reservation_date DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE reservations
  ADD PRIMARY KEY (id);

ALTER TABLE reservations
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;