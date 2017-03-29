<?php

require_once("User.php");
require_once("ServiceUser.php");

$server = "localhost";
$user = "root";
$pass = "root";
$database = "test";

//Connect Mysql
@$mysqli = new mysqli($server, $user, $pass, $database);

//Error
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno .") " . $mysqli->connect_error;
    exit;
}

$user = new User();

$user->setName("Cesar Bassani ")
    ->setEmail("cesar.bassani@before.com");

$serviceUser = new ServiceUser($mysqli, $user);

//echo $serviceUser->insert();
//$serviceUser->update();
//$serviceUser->delete(1);

//$res = $serviceUser->find(2);
//echo "Id: " . $res['id'] . "<br/>";
//echo "Nome: " . $res['name'] . "<br/>";
//echo "E-mail: " . $res['email'] . "<br/><hr>";

$res = $serviceUser->list();
foreach ($res as $value) {
    echo "Id: " . $value['id'] . "<br/>";
    echo "Nome: " . $value['name'] . "<br/>";
    echo "E-mail: " . $value['email'] . "<br/><hr>";
}