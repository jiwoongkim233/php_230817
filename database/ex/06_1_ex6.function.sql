--  1. 데이터 타입 변환 함수 
-- ** 둘다 같은 기능 **
-- CAST(값 AS 데이터형식 )
-- CONVERT (값, 데이터형식 )

SELECT CAST(1234 AS CHAR(4));
SELECT CONVERT (1234, CHAR(4));

-- 2. 제어 흐름 함수
-- IF (수식, 참일 때, 거짓일 때) : 수식이 참 또는 거짓에 따라 결과를 분기한다

SELECT IF (0 = 1, '참','거짓');

SELECT e.emp_no, if(e.gender = 'M', '남자', '여자') AS gender
FROM employees e;

-- IFNULL (수식1, 수식2) : 수식1이 NULL이면 수식2를 출력하고, NULL이 아니면 수식2를 반환
-- 								수식1이 NULL이 아니면 수식1을 반환

SELECT IFNULL('11', '수식2');

UPDATE titles SET to_date = NULL WHERE emp_no = 500000;

SELECT emp_no
	,title
	,IFNULL(to_date, DATE(NOW())) AS to_date
FROM titles
ORDER BY emp_no DESC;

SELECT *
FROM titles
WHERE emp_no=500000;

-- NULLIF (수식1, 수식2) : 수식1과 2가 같으면 NULL을 반환하고, 다르면 수식1을 반환한다.

SELECT NULLIF(1, 1);
SELECT NULLIF(1,2);

SELECT emp_no
	,title
	,to_date
	,NULLIF(to_date,99990101)
FROM titles
ORDER BY emp_no DESC;

SELECT *
FROM titles 
ORDER BY emp_no DESC;

-- 직책 테이블의 모든 정보를 출력해 주세요.
-- to_date가  null || 9999-01-01인 경우는 '현재직책'
-- 그 외는 '지금은 아님'

SELECT * 
,case DATE (IFNULL(to_date,99990101))
	when 99990101 then '현재직책'
	ELSE '지금은아님'
	END AS ko_to_date
FROM titles
ORDER BY emp_no DESC;

SELECT *
FROM titles 
WHERE to_date IS not NULL;

-- 3. 문자열 함수

SELECT CONCAT_WS('/','a','b','c','d');

SELECT FORMAT (123456,0);

SELECT LEFT ('123456','2');
-- 문자열을 왼쪽부터 길이만큼 잘라 반환합니다.
SELECT RIGHT ('123456','2');
-- 문자열을 오른쪽부터 길이만큼 잘라 반환합니다.
SELECT UPPER ('abcd');
-- 소문자를 대문자로 변경
SELECT LOWER ('ABCD ');
-- 대문자를 소문자로 변경
SELECT LPAD ('1',10,0);
-- 문자열을 포함해 길이만큼 채울 문자열을 왼쪽에 넣습니다
SELECT RPAD ('1',10,0);
-- 문자열을 포함해 길이만큼 채울 문자열을 오른쪽에 넣습니다
SELECT ' 1234 ',TRIM(' 1234 ');
-- 좌우공백 제거
SELECT ' 1234 ',LTRIM(' 1234 ');
-- 좌측공백 제거
SELECT ' 1234 ',RTRIM(' 1234 ');
-- 우측공백 제거
-- TRIM(방향 문자열1 FROM 문자열2) : 방향을 지정해 문자열2에서 문자열1을 제거합니다
SELECT TRIM (LEADING 'cde' FROM 'abcdefg');
-- SUBSTRING(문자열, 시작위치,길이) : 문자열을 시작위치에서 길이만큼 잘라서 반환합니다
SELECT SUBSTRING ('abcdefg',3,2);
-- SUBSTRING_INDEX (문자열, 구분자, 횟수) : 왼쪽부터 구분자가 n번째가 나오면
SELECT SUBSTRING_INDEX ('지웅_html_css.html','.',1);

-- 4.수학 함수
SELECT CEILING (1.4);
-- CEILING : 올림합니다.
SELECT FLOOR(1.9);
-- FLOOR: 내림합니다
SELECT ROUND (1.4);
-- ROUND: 반올림
SELECT TRUNCATE
 (1.11,1);
-- TRUNCATE (숫자, 정수): 소수점 기준으로 정수위치 까지 구하고 나머지는 버립니다. 

-- 5.날짜 및 시간 함수
-- NOW() : 현재 날짜/시간을 구합니다. (YYYY-MM-DD HH:MM:SS)
SELECT NOW (), DATE (NOW()), DATE(99990101);
-- ADDDATE(날짜1,INTERVAL 날짜2) : 날짜1에서 날짜2를 더한 날짜를 구합니다.
SELECT ADDDATE(99990101, INTERVAL -1 DAY)
-- SUBDATE (날짜1, INTERVAL 날짜2): 날짜1에서 날짜2를 뺀 날짜를 구함니다.
SELECT SUBDATE(99990101, INTERVAL 1 DAY);
-- ADDTIME : 날짜/시간에서 시간을 더한 날짜/시간을 구합니다
SELECT ADDTIME(20230101000000,'-01:00:00');
-- SUBTIME : 날짜/시간에서 시간을 뺀 날짜를 구합니다.
SELECT ADDDATE(NOW(),INTERVAL -1 YEAR);

-- 6.순위함수
-- rank()over (order by 속성명 DESC/ASC) : 순위를 매깁니다
SELECT emp_no, salary, RANK()OVER(ORDER BY salary DESC) AS sal_rank
FROM salaries
LIMIT 10;
 
-- row_number() over (order by 속성명 DESC/ASC) : 레코드에 순위를 매깁니다. 
SELECT emp_no, salary, ROW_NUMBER()OVER(ORDER BY salary DESC) AS row_#
FROM salaries
LIMIT 10;

-- CASE ~ WHEN ~ ELSE ~ END : 다중 분기를 위해 사용
-- 	예) WHEN 분기수식1 THEN 결과1
--        WHEN 분기수식2 THEN 결과2
-- 		 WHEN 분기수식3 THEN 결과3
-- 		 ELSE 결과4
-- 		END

SELECT e.emp_no 
	,e.gender
	,case e.gender 
		when 'M' then '남자'
		ELSE '여자'
	END AS ko_gender  
FROM employees AS e;