<?php
$username='FIFAPPS';
$password='devrpt1';
$db=    '(DESCRIPTION=
            (ADDRESS=
            (PROTOCOL=TCP)
            (HOST=10.10.12.28)
            (PORT=1521))
            (CONNECT_DATA=
            (SERVICE_NAME=devrpt1))
        )';
$conn = oci_connect($username, $password, $db);
oci_close($conn);
?>
