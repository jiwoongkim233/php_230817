-- update의 기본구조
-- update 테이블명
-- set (칼럼1 = 값1, 칼럼2 = 값2)
-- where 조건
-- ** 추가설명 : 조건을 적지않을 경우 모든 레코드가 수정됩니다.
-- 			실수를 방지하기위해 where절을 먼저 작성하고 set절을 작성하는 것.

UPDATE titles 
SET 
	title = 'CEO'	
	
WHERE emp_no = 500000;

SELECT *
FROM titles
WHERE emp_no = 500000;

COMMIT;

--

UPDATE titles
SET 
	title = 'staff'
WHERE emp_no = 500000;

UPDATE salaries
SET 
	salary = 25000
WHERE emp_no = 500000;

SELECT *
FROM salaries
WHERE emp_no = 500000;

UPDATE departments
SET 
	dept_name = 'Accounting'
WHERE dept_no = 'd010'

SELECT * 
FROM departments 
WHERE dept_no = 'd010';

UPDATE employees 
