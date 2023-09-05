-- 1
SELECT emp.emp_no, 
CONCAT(emp.first_name,' ',last_name) full_name,
t.title
FROM employees emp
	INNER JOIN titles t
	ON emp.emp_no = t.emp_no;

-- 2
SELECT emp.emp_no, 
emp.gender,
sal.salary
FROM employees emp
	INNER JOIN salaries sal
	ON emp.emp_no = sal.emp_no
	AND to_date >= NOW();
	
-- 3
SELECT CONCAT(emp.first_name,' ',emp.last_name) full_name,
sal.salary
FROM employees emp
	INNER JOIN salaries sal
	ON emp.emp_no = sal.emp_no
	AND sal.emp_no = 10001;
-- 4
SELECT CONCAT(emp.first_name,' ',emp.last_name) full_name,
emp.emp_no,
dept.dept_no,
depts.dept_name
FROM employees emp
	INNER JOIN dept_emp dept
	ON emp.emp_no = dept.emp_no
	JOIN departments depts
	ON dept.dept_no = depts.dept_no
WHERE to_date >= NOW();
-- 5
SELECT emp.emp_no,
CONCAT(first_name,' ',last_name) full_name,
sal.salary
FROM employees emp
	INNER JOIN salaries sal
	ON emp.emp_no = sal.emp_no
	AND to_date >= NOW()
	ORDER BY salary DESC
	LIMIT 10;
-- 6
SELECT emp.hire_date,
CONCAT(first_name,' ',last_name) full_name,
depts.dept_name
FROM employees emp
	INNER join dept_manager dept_m
	ON emp.emp_no = dept_m.emp_no
	JOIN departments depts
	ON depts.dept_no = dept_m.dept_no
	AND dept_m.to_date >= NOW();
-- 7
SELECT 
AVG(sal.salary) avg_sal,
t.title
FROM employees emp
	INNER JOIN salaries sal
	ON emp.emp_no = sal.emp_no
	JOIN titles t
	ON t.emp_no = sal.emp_no
	AND t.to_date >= NOW()
	AND sal.to_date >= NOW()
	AND t.title = 'staff'
	GROUP BY title;
-- 8
SELECT emp.emp_no,
CONCAT(first_name,' ',last_name) full_name,
emp.hire_date,
dept_m.dept_no
FROM employees emp
	INNER JOIN dept_manager dept_m
	ON emp.emp_no = dept_m.emp_no;
-- 9
SELECT floor(AVG(sal.salary)),
t.title
FROM employees emp 
	INNER JOIN titles t
	ON emp.emp_no = t.emp_no
	AND t.to_date >= NOW()
	JOIN salaries sal
	ON sal.emp_no = t.emp_no
	AND sal.to_date >= NOW()
	GROUP BY title
	HAVING AVG(sal.salary) >= 60000
	ORDER BY AVG(sal.salary) desc;
-- 10
SELECT emp.gender, 
t.title,
COUNT(*) current_
FROM employees emp
	INNER JOIN titles t 
	ON emp.emp_no = t.emp_no
	AND emp.gender = 'F'
	AND to_date >= NOW()
	GROUP BY title;
-- 11
SELECT emp.gender, COUNT(*)
FROM employees emp
	INNER JOIN (
	SELECT emp_no
	FROM titles t
	GROUP BY t.emp_no HAVING MAX(to_date) !=99990101
	) tit
	ON emp.emp_no = tit.emp_no
GROUP BY emp.gender;



