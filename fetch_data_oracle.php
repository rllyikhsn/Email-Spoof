<?php
include 'config_oracle.php';

$conn = oci_connect($username, $password, $db);

$query = "Select DISTINCT employee.empl_code, employee.empl_name, empl_status,
REPLACE(CONCAT(REGEXP_SUBSTR(employee.EMPL_NAME , '[^ ]+' , 1 , 1),
CONCAT('.', CONCAT(REGEXP_SUBSTR(employee.EMPL_NAME , '[^ ]+' , 1 , 2), '@csf.co.id' ))),' ','')
AS Email
from fifapps.fs_mst_employees employee
where employee.empl_status != 'RS' and rownum <= 2 AND REGEXP_INSTR(empl_name,' ') != 0
ORDER BY email asc ";

$queryselect = "select * from fifapps.fs_mst_employees where empl_status != 'RS'";
$select = oci_parse($conn, $query);
$execute = oci_execute($select);

?>
