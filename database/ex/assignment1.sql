-- SELECT emp.birth_date,emp.emp_no,sal.salary
-- FROM employees AS emp
-- 	INNER JOIN salaries AS sal
-- 	ON sal.emp_no=emp.emp_no
-- 	AND (emp.emp_no = 10001 OR emp.emp_no =10004)
-- 	and sal.to_date >= NOW();
-- 	
-- INSERT INTO departments (
-- 	dept_no
-- 	,dept_name
-- )
-- VALUES (
-- 	'd010'
-- 	,'php-504'
-- );
-- 

-- SELECT * FROM departments;
FLUSH PRIVILEGES;
-- 
-- DELETE FROM departments

1. 

INSERT INTO employees(
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
	,20230915
	);
	
	
2.
UPDATE employees
SET 
	first_name = 'dooly'
	,last_name = 'hoy'
WHERE emp_no = 500010;

3. 
SELECT *
	FROM employees
	WHERE emp_no = 500010;

4. DELETE FROM employees
WHERE emp_no = 500010;