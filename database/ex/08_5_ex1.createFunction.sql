delimiter $$
CREATE FUNCTION my_sum(num1 INT, num2 INT)
	RETURNS int
BEGIN 
	RETURN num1+num2;
END $$

SHOW CREATE FUNCTION my_sum;

SELECT my_sum(1,2);

DROP FUNCTION my_sum;