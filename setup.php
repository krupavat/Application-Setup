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
$link = mysqli_connect($endpoint,"krupavat","Admin123","KSRDB","3306") or die("Error " . mysqli_error($link)); 
//echo "Here is the result: " . $link;

$create_table = 'CREATE TABLE IF NOT EXISTS userInfo 
(
 id INT NOT NULL AUTO_INCREMENT,
 uname VARCHAR(200) NOT NULL,
 email VARCHAR(200) NOT NULL,
 phone VARCHAR(20) NOT NULL,
 s3rawurl VARCHAR(255) NOT NULL,
 s3finishedurl VARCHAR(255) NOT NULL,   
 jpgfilename VARCHAR(255) NOT NULL,   
 status INT NOT NULL,
 createdat DATETIME DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY(id)
)';

  
 if (mysqli_query($link, $create_table) === TRUE) {
    printf("Table userInfo successfully created.\n");
  }

?>
