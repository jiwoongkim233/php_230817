INSERT INTO employees
VALUES (
700002
,20000101
,'firsttt'
,'lasttt'
,'M'
,20230919
,null
);
COMMIT;


-- SELECT *
-- FROM employees emp
-- WHERE emp.emp_no NOT IN (SELECT emp_no FROM titles t);
-- 

FLUSH PRIVILEGES;