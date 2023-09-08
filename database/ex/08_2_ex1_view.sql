-- 1. view
-- 가상의 테이블로, 보안과 함께 사용자의 편의성을 높이기 위해 사용합니다. 
-- 여러테이블을 조인 할 시에 view를 생성하여, 
-- 복잡한 SQL을 편리하게 할 수 있는 장점이 있습니다. 
-- 단점 : INDEX를 사용할 수 없어 속도가 느림.

-- view 생성
-- create [or replace] view 뷰명
-- AS
-- SELECT 문
-- ;
-- ** [or replace] : 기존의 뷰가 있을 경우 덮어쓰기를 합니다. **

CREATE VIEW view_employed_emp
AS 
	SELECT emp.*
	,t.to_date
	,t.title 
FROM employees emp
	INNER JOIN titles t
	ON emp.emp_no = t.emp_no
	AND t.to_date >= NOW();
	
SELECT * FROM view_employed_emp WHERE emp_no <=10005;