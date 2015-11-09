<?php
$link = new mysqli_connect("ksrmp1db.cuoze5th0opw.us-east-1.rds.amazonaws.com","krupavat","Admin123","ksrmp1db") or die("Error " . mysqli_error($link));
$result=$link->query("CREATE TABLE KSRMP1(
ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
uname VARCHAR(20),
email VARCHAR(20),
phone VARCHAR(20),
RawS3URL VARCHAR(256),
FinishedS3URL VARCHAR(256),
jpgFileName VARCHAR(256),
state TINYINT(3) CHECK (state IN (0,1,2)),
DateTime TIMESTAMP)");
shell_exec("chmod 600 setup.php");
?>




