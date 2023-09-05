-- SELECT [컬럼명] FROM [테이블명];
SELECT * FROM employees;
SELECT * FROM dept_emp;
-- 
SELECT FIRST_name, last_name FROM employees;
SELECT emp_no, title FROM titles;
--
SELECT * FROM employees;
 
-- SELECT [컬럼명] FROM [테이블명] where [쿼리 조건];
-- [쿼리 조건]: 컬럼명 [기호] 조건값
SELECT * FROM employees WHERE emp_no > 10009;
SELECT * FROM employees WHERE first_name= 'Mary';
SELECT * FROM employees WHERE birth_date >= 19500101 AND birth_date >=19650101;
SELECT * FROM employees WHERE first_name = 'Mary' AND last_name = 'piazza';
SELECT * FROM employees WHERE emp_no BETWEEN 10005 AND 10010;
SELECT * FROM employees WHERE emp_no=10005 OR emp_no=10010;
 
-- 
SELECT * FROM employees WHERE first_name LIKE('___ge');
SELECT * FROM titles WHERE titles LIKE ('%staff%');
 
SELECT * FROM employees ORDER BY birth_date ASC;
SELECT * FROM employees ORDER BY birth_date, first_name;
 
--
SELECT * FROM employees ORDER BY last_name DESC, first_name ASC, birth_date ASC;
 
--
SELECT DISTINCT emp_no, salary 
FROM salaries;
 
-- 집계 함수
SELECT SUM(salary) FROM salaries;
 
-- 현재 받고있는 급여만 조회
 
SELECT * FROM salaries WHERE to_date>=20230101; 
SELECT SUM(salary) FROM salaries WHERE to_date >=20230101;
SELECT MAX(salary) FROM salaries WHERE to_date >=20230101;
SELECT min(salary) FROM salaries WHERE to_date >=20230101;
SELECT avg(salary) FROM salaries WHERE to_date >=20230101;
--
SELECT COUNT(*) FROM employees WHERE first_name='Mary'; 
 
--
SELECT title, COUNT(title)
FROM titles 
WHERE to_date >=20230901 GROUP BY title; 
 
SELECT COUNT(*) 
FROM titles 
WHERE title = 'assistant engineer';
 
SELECT title, COUNT(title)
FROM titles 
WHERE to_date >=20230901 GROUP BY title LIKE ('%staff%'); 
-- allias(as)=otherwise, CONCAT() concatenate : 문자열을 합쳐 주는 함수
SELECT CONCAT (first_name,'',last_name) AS full_name
FROM employees;
--
SELECT emp_no,birth_date,concat(first_name,'',last_name  ) AS full_name 
FROM employees 
WHERE gender='F' 
ORDER BY full_name ASC;
 
SELECT * 
FROM employees 
ORDER BY emp_no
LIMIT 10 OFFSET 10;
 
-- limit in offset : n번째 부터 n개만큼 출력
SELECT *
FROM salaries 
WHERE to_date >= 20230901 
ORDER BY salary desc
LIMIT 5;
 
-- sub-query: 쿼리 안에 또다른 쿼리가 있는 형태
 
-- d002 부서의 현재 매니저의 정보를 가져오고 싶다.
 
SELECT *
FROM employees
WHERE emp_no=(
SELECT emp_no
FROM dept_manager 
WHERE to_date >=20230901 
	AND dept_no='d002');
--
 
SELECT emp_no, CONCAT(first_name,' ',last_name) AS full_name
FROM employees
WHERE emp_no = (
SELECT emp_no 
FROM salaries
WHERE to_date >= 20230901
ORDER BY salary DESC
LIMIT 1
);
 
SELECT * 
FROM salaries
WHERE to_date >= 20230901
ORDER BY salary DESC
LIMIT 1;
 
-- 서브 쿼리의 결과가 복수일때 사용 방법
 
SELECT emp_no, CONCAT(first_name,' ',last_name) AS full_name
FROM employees
WHERE emp_no IN (
SELECT emp_no
FROM dept_manager
WHERE dept_no ='d001');

-- 현재 직책이 시니어 엔지니어인 사원의 사번과 생일을 출력
 
SELECT emp_no, birth_date
FROM employees
WHERE emp_no IN (
SELECT emp_no
FROM titles
WHERE title='Senior Engineer' and to_date >=20230901);
	
 
SELECT emp_no, birth_date
FROM employees
WHERE emp_no IN (10001, 10003);
 
-- 다중열 서브쿼리
 
SELECT *
FROM dept_emp
WHERE (dept_no, emp_no) IN(
SELECT dept_no, emp_no
FROM dept_manager
WHERE to_date >=20230901
);
 
-- select절에 사용하는 서브쿼리
-- 사원의 현재 급여, 현재  급여를 받기 시작한 일자,풀네임 출력
 
SELECT 
sal.salary
 , FROM_date
 ,(
 	SELECT CONCAT(emp.first_name,' ',emp.last_name)
 	FROM employees AS emp
 	WHERE sal.emp_no=emp.emp_no
 ) AS full_name
FROM salaries AS sal
WHERE to_date >=NOW();
 
-- FROM절에 오는 서브쿼리
SELECT emp. *  
FROM (
SELECT * 
FROM employees
WHERE gender='M'
) AS emp;





--
SELECT * 
FROM titles;
 
1 --
SELECT emp_no
FROM salaries;

2 --
SELECT DISTINCT emp_no
FROM salaries
WHERE salary<=60000;

3 --
SELECT *
FROM salaries 
WHERE salary BETWEEN 60000
AND 70000;

4 --
SELECT * 
FROM employees
WHERE emp_no = 10001 or emp_no=10005;

5 --
SELECT *
FROM titles 
WHERE title LIKE ('%Engineer%');

6 --
SELECT first_name, last_name
FROM employees
ORDER BY first_name, last_name ASC;

7 --
SELECT emp_no, AVG(salary)
FROM salaries
GROUP BY emp_no;


8 --
SELECT emp_no, AVG(salary) 
FROM salaries
GROUP BY emp_no
HAVING AVG(salary) between 30000 AND 50000;


9 --
SELECT emp.emp_no, emp.first_name, emp.last_name, emp.gender
FROM employees emp
WHERE emp_no IN (
	SELECT sal.emp_no
	FROM salaries sal
	GROUP BY sal.emp_no
		HAVING AVG(salary) >=70000 
);

10 --
SELECT emp.emp_no,emp.last_name
FROM employees emp
WHERE emp.emp_no IN (
	SELECT tit.emp_no
	FROM titles tit
	WHERE tit.title = 'Senior Engineer' AND to_date>=NOW()
);

