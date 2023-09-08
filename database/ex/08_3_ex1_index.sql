-- INDEX
-- 데이터베이스 테이블에 대한 검색 성능의 속도를 높여주는 기능
-- 인덱스 생성 시 데이터를 오름차순으로 정렬
-- 일반적으로 DB에서는 "B+ Tree index" 방식을 사용


SHOW INDEX FROM employees;

-- INDEX 생성
-- create index 인덱스명 ON 테이블(컬럼);
-- create index 인덱스명 ON 테이블 (컬럼1, 컬럼2...);
CREATE INDEX idx_employees_last_name ON employees(last_name);

-- 7.index 제거
-- DROP INDEX 인덱스명 ON 테이블;
DROP INDEX idx_employees_last_name ON employees;
