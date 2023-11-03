CREATE DATABASE multi_mini_board;
USE multi_mini_board;

CREATE TABLE user(
	id INT PRIMARY KEY AUTO_INCREMENT
	,u_id VARCHAR(20) NOT NULL 
	,u_pw VARCHAR(256) NOT NULL 
	,u_name VARCHAR(50) NOT NULL 
	,created_at DATETIME NOT NULL	DEFAULT CURRENT_TIMESTAMP()
	,updated_at DATETIME NOT NULL	DEFAULT CURRENT_TIMESTAMP()
	,deleted_at DATETIME 
);

CREATE TABLE boards(
	b_id INT PRIMARY KEY auto_increment
	,u_pk INT NOT NULL 
	,b_type CHAR(1) NOT null
	,b_title VARCHAR(30) NOT null
	,b_content VARCHAR(1000) NOT NULL 
	,b_img VARCHAR(50) 
	,created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,deleted_at DATETIME 
);

CREATE TABLE boardname (
	id INT PRIMARY KEY auto_increment
	,b_type CHAR(1) NOT null
	,b_name VARCHAR(20) NOT null
);