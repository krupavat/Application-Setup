<?php
// Start the session^M
require 'vendor/autoload.php';
$rds = new Aws\Rds\RdsClient([
    'version' => 'latest',
    'region'  => 'us-east-1'
]);
// Create a table 
$result = $rds->describeDBInstances([
    'DBInstanceIdentifier' => 'ksrmp1db',
]);
$endpoint = $result['DBInstances'][0]['Endpoint']['Address'];
print "============\n". $endpoint . "================\n";
$link = mysqli_connect($endpoint,"krupavat","Admin123","3306") or die("Error " . mysqli_error($link)); 
echo "Here is the result: " . $link;
$sql = "CREATE TABLE KSRMP1 
(
ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
uname VARCHAR(20),
email VARCHAR(20),
phone VARCHAR(20),
RawS3URL VARCHAR(256),
FinishedS3URL VARCHAR(256),
jpgFileName VARCHAR(256),
state TINYINT(3) CHECK (state IN (0,1,2)),
DateTime TIMESTAMP)";
$con->query($sql);
?>
