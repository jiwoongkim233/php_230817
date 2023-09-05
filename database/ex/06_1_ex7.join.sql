-- 0. JOIN
-- 두개 이상의 테이블을 묶어서 하나의 결과 집합으로 출력.

-- 1. INNER JOIN의 구조
-- SELECT 컬럼1, 컬럼2
-- FROM 테이블1 INNER JOIN 테이블2
-- 	ON 조인 조건
-- 	[WHERE 검색조건]

SELECT emp.emp_no, 
		emp.first_name, 
		emp.last_name,
		dp.dept_no 
FROM employees AS emp
	INNER JOIN dept_emp AS dp
		ON emp.emp_no = dp.emp_no
		AND dp.to_date >=NOW();

-- 2. OUTER JOIN : 
-- 기준이 되는 테이블의 레코드는 JOIN의 조건에 만족되지 않아도 출력
-- SELECT 컬럼1, 컬럼2....
-- FROM 테이블1
-- [LEFT] [RIGHT] OUTER JOIN 테이블2
-- ON JOIN 조건
-- WHERE 검색조건;

SELECT emp.emp_no,
	emp.first_name,
	dm.dept_no
FROM employees emp
	LEFT OUTER JOIN dept_manager dm
		ON emp.emp_no = dm.emp_no
		AND dm.to_date >= NOW()
WHERE emp.emp_no >= 110000;

-- 3. UNION / UNION ALL :
-- 두 쿼리의 결과를 합칩니다.
-- UNION은 중복 값을 제거하고 출력하고, UNION ALL은 중복 값도 출력합니다.
-- SELECT...FROM...
--  UNION

-- 4. SELF JOIN : 자기 자신을 JOIN
-- SELECT 컬럼1, 컬럼2...
-- FROM 테이블1
-- 	INNER JOIN 테이블1
-- WHERE 검색조건;

SELECT emp1.*
FROM employees emp1
	INNER JOIN employees emp2
		ON emp1.sup_no = emp2.emp_no;

ALTER TABLE employees ADD COLUMN sup_no INT(11);
COMMIT;



	 



