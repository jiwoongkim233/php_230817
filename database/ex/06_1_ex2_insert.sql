-- insert의 기본구조
-- insert into 테이블명 [(속성1, 속성2)]
-- values (속성값1,속성값2)

--500000 신규회원
INSERT INTO employees (
	emp_no,
	birth_date,
	first_name,
	last_name,
	gender,
	hire_date
)
VALUES (
	500000
	, 19961203
	,'Meerkat'
	,'green'
	,'M'
	,20230904
);

SELECT *
FROM employees
WHERE emp_no = 500000;


INSERT INTO salaries(
	emp_no,
	salary,
	from_date,
	to_date
)
VALUES (
	500000,
	20000,
	20100901,
	20230903
);

SELECT *
FROM salaries
WHERE emp_no = 500000;

INSERT INTO dept_emp(
	emp_no,
	dept_no,
	from_date,
	to_date
)
VALUES (
	500000,
	'd005',
	19961203,
	20230904
);

SELECT * 
FROM dept_emp
WHERE emp_no = 500000;

INSERT INTO titles (
	emp_no,
	title,
	from_date,
	to_date
)
VALUES(
	500000,
	'Engineer',
	19961203,
	99990101
);

SELECT * 
FROM titles
WHERE emp_no = 500000;

INSERT INTO departments (
	
)

