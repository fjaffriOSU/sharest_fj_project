<?php
//Author: Cole Hutson
//sql information
$server = '';
$userName = '<username>';
$password = '<password>';
$dbName = '';

$mysqlDB = new mysqli($server, $userName, $password, $dbName);

$json = file_get_contents('php://input');
$data = json_decode($json);
$query = 'INSERT INTO users VALUES ("' . $data->uuid . '", "' . $data->firstName. '", "' . $data->lastName . '", "' . $data->emailAddress . '", " "' .')';
echo $query;
if($result = $mysqlDB->query($query)) {
    echo 'Success';
}	
else {
    echo "Invalid Query";
}
echo "Full Name: " . $data->firstName . " " . $data->lastName;
?>
