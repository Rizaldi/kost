CREATE TABLE tb_master_jabatan (
id int(2) auto_increment,
nama varchar(50) NOT NULL,
PRIMARY KEY(id)
);

CREATE TABLE tb_users (
username varchar(50) NOT NULL,
password varchar(100) NOT NULL,
hak_akses varchar(50) NOT NULL,
PRIMARY KEY(username)
);

CREATE TABLE tb_menu (
id int(3) auto_increment,
nama varchar(50) NOT NULL,
hak_akses varchar(50) NOT NULL,
link varchar(50),
PRIMARY KEY(id)
);

CREATE TABLE tb_jabatan (
user varchar(50) NOT NULL,
jabatan_id int(2) NOT NULL,
aktif enum('Y','N') DEFAULT 'Y',
FOREIGN KEY(user) REFERENCES tb_users(username) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY(jabatan_id) REFERENCES tb_master_jabatan(id) ON DELETE RESTRICT ON UPDATE CASCADE
);
