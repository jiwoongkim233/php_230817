-- 1
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500010
	,19961203
	,'jiwoong'
	,'kim'
	,'M'
	,20001010
);
-- 2
INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES(
	500010
	,20000
	,20200215
	,99990101
);

INSERT INTO titles(
	emp_no
	,title
	,from_date
	,to_date
)
VALUES(
	500010
	,'staff'
	,20200215
	,99990101
);

INSERT INTO dept_emp(
	 emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES(
500010
,'d009'
,20200215
,99990101
);

-- 3
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date	
)
VALUES(
	500011
	,20011206
	,'mingyeong'
	,'kim'
	,'F'
	,20001010
);

INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES(
	500011
	,800
	,20001010
	,20200215
);

INSERT INTO titles(
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	500011
	,'staff'
	,20001010
	,20200215
);

INSERT INTO dept_emp(
	 emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES(
	500011
	,'d008'
	,20001010
	,20200215
);


-- 4
UPDATE dept_emp
SET dept_no = 'd009'
WHERE emp_no IN (500010,500011);

SELECT emp_no
, dept_no
FROM dept_emp
WHERE emp_no IN (500010, 500011);
--5
DELETE FROM employees 
WHERE emp_no = 500011;

DELETE FROM salaries
WHERE emp_no = 500011;

DELETE FROM dept_emp
WHERE emp_no = 500011 AND dept_no = 'd009';

DELETE FROM titles
WHERE emp_no = 500011
AND ;

-- 6
UPDATE dept_manager
SET to_date = 20230907
WHERE emp_no = 111939;

INSERT INTO dept_manager(
	dept_no
	,emp_no
	,from_date
	,to_date
)
VALUES(
	'd009'
	,500011
	,20230907
	,99990101
);
-- 7
UPDATE titles
SET from_date = 20230907
WHERE emp_no = 500010;

UPDATE titles
SET title = 'Senior Engineer'
WHERE emp_no = 500010;

SELECT *
FROM titles
WHERE emp_no = 500010;

-- 8
SELECT emp.emp_no
,emp.first_name
,emp.last_name
,sal.salary
FROM employees emp
JOIN salaries sal
	ON emp.emp_no = sal.emp_no
WHERE salary = 
(SELECT MAX(sal.salary)
FROM salaries sal)
OR 
salary = (SELECT MIN(sal.salary)
FROM salaries sal);



-- 9

SELECT AVG(salary)avg_sal
FROM salaries 
WHERE to_date >= NOW();

-- 10
SELECT AVG(salary)
FROM salaries
WHERE emp_no = 499975;
	
