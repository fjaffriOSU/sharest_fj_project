<?php
//Author: Cole Hutson
//sql information
$server = '';
$userName = '<username>';
$password = '<password>';
$dbName = '';

$mysqlDB = new mysqli($server, $userName, $password, $dbName);

$request = explode("/", trim($_SERVER["PATH_INFO"],"/"));
$userID = array_shift($request);

$query = 'SELECT * FROM listings WHERE uuid = "' . $userID  . '" ORDER BY datePosted DESC';

if($result = $mysqlDB->query($query))
{
    $listings = array();
    while($listing = $result->fetch_assoc())
    {
        $listings[] = $listing;
    }

    header('Content-Type: application/json');

	echo json_encode($listings);
}
else {
    echo "Invalid Query";
}
?>
