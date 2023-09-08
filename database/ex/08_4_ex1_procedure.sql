-- 1. Stored procedure
-- 	일련의 쿼리를 모아 마치 하나의 함수처럼 실행하기 위한 쿼리의 집합.

-- 2. stored prodcedure 장점
-- 하나의 요청으로 여러 SQL문을 실행하여, 네트워크에 대한 부하 감소
-- 미리 구문 분석 및 내부 중간 코드로 변화을 끝내야 하므로 처리 시간이 감소
-- 데이터베이스 트리거와 결합하여 복잡한 규칙에 의한 데이터의 참조무결성 유지가 가능. 

-- 3. stored procedure 단점
-- 사양 변경 시 외부 응용 프로그램과 함꼐 프로시저의 정의 변경이 필요
-- 코드 자산으로서의 재사용성이 매우 비효율적

delimiter $$
CREATE PROCEDURE test()
BEGIN
	SELECT emp.*,
	t.title
	FROM employees emp
		inner JOIN titles t
		ON emp.emp_no = t.emp_no
		AND t.to_date >= NOW();

	END $$	
delimiter;

SHOW PROCEDURE STATUS;
CALL test();
DROP PROCEDURE test;
