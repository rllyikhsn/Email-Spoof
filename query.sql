Select DISTINCT employee.empl_code, employee.empl_name, empl_status,
REPLACE(CONCAT(REGEXP_SUBSTR(employee.EMPL_NAME , '[^ ]+' , 1 , 1),
CONCAT('.', CONCAT(REGEXP_SUBSTR(employee.EMPL_NAME , '[^ ]+' , 1 , 2), '@csf.co.id' ))),' ','')
AS Email
from fifapps.fs_mst_employees employee
where employee.empl_status != 'RS' AND email_address is null
AND REGEXP_INSTR(empl_name,' ') != 0
ORDER BY email asc;

Select employee.empl_name,
CONCAT((REPLACE(REGEXP_SUBSTR(employee.EMPL_NAME , '[^ ]+' , 1 , 1),' ','')), '@csf.co.id' )
AS Email, REGEXP_INSTR(empl_name,' ')
from fifapps.fs_mst_employees employee
where employee.empl_status != 'RS'AND REGEXP_INSTR(empl_name,' ') = 0 AND email_address is null;
