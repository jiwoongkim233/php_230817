-- Delete의 기본구조
-- Delete form 테이블명
-- Where 조건
-- ** 추가설명 : 조건을  적지않을 경우 모든 레코드가 삭제됩니다.
-- 						실수를 방지하기위해 where절을 먼저 작성하고 delete form절을 작성합니다.

DELETE FROM departments
WHERE dept_no = 'd010';

SELECT * 
FROM departments
WHERE dept_no = 'd010';

DELETE FROM employees
WHERE emp_no >= 500001;

SELECT * 
FROM employees
WHERE emp_no
ORDER BY emp_no DESC
LIMIT 5;

COMMIT;



