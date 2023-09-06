CREATE TABLE members (
	mem_no INT PRIMARY KEY AUTO_INCREMENT
	, id VARCHAR(30) UNIQUE NOT NULL 
	,mem_name VARCHAR(30) NOT null
	,addr VARCHAR(100) NOT null
);

CREATE TABLE points (
	mem_no INT PRIMARY KEY
	,pts INT NOT NULL DEFAULT (0)
	,CONSTRAINT  fk_points_mem_no FOREIGN KEY (mem_no)
		REFERENCES members(mem_no) ON DELETE CASCADE 	 
);


CREATE TABLE products(
	product_no INT PRIMARY KEY
	,product_name VARCHAR(50) NOT null
	,product_price int NOT NULL
);

CREATE TABLE orders (
	order_no INT PRIMARY KEY
	,mem_no INT NOT null
	,product_no INT NOT null
	,quantity INT NOT NULL
	,purchase_price INT NOT NULL
	, CONSTRAINT fk_orders_mem_no FOREIGN KEY (mem_no) REFERENCES members(mem_no) ON DELETE NO ACTION 
	,CONSTRAINT fk_orders_product_no FOREIGN KEY (product_no) REFERENCES products(product_no) ON DELETE NO ACTION 
);

INSERT INTO members (id, mem_name,addr)
VALUES ('admin','meerkat','korea daegu');
INSERT INTO points (mem_no)
VALUES (1);

CREATE DATABASE mem;
USE MEMBER;

ALTER TABLE members ADD COLUMN age INT NOT NULL;
ALTER TABLE members modify COLUMN mem_name VARCHAR(50) NOT null;
-- modify : 컬럼 변경
ALTER TABLE members DROP COLUMN age;
-- drop : 삭제
TRUNCATE TABLE members;


