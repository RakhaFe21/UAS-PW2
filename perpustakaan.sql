CREATE TABLE IF NOT EXISTS buku (
  id int(11) NOT NULL AUTO_INCREMENT,
  judul varchar(255) NOT NULL,
  pengarang varchar(255) NOT NULL,
  	ahun_terbit int(4) NOT NULL,
  deskripsi text NOT NULL,
  file_buku varchar(255) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS users (
  id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(50) NOT NULL,
  password varchar(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`username`, `password`) VALUES ('admin', '$2y$10$wH8QwQw6Qw6Qw6Qw6Qw6QeQw6Qw6Qw6Qw6Qw6Qw6Qw6Qw6Qw6Qw6Qw6');

