-- cursor
-- 행의 집합을 한 행씩 처리하기 위한 방식

-- 커서의 구조
-- delimiter $$
-- begin
-- declare sal int;
-- declare sum_sal int;
-- declare cur_sal int;
-- declare end_row boolean default false;

-- 커서 선언
DECLARE cur_sal CURSOR FOR
	SELECT salary FROM salaries WHERE emp_no =10001;
-- 행이 끝이면 end_row에 true 대입
DECLARE CONTINUE handler FOR NOT FOUND 
	SET end_row = TRUE;
	
