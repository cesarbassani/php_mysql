<?php

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

//$sql = "SELECT * FROM USER";

//if ($query = $mysqli->query($sql)) {

    /*
    $user = $query->fetch_all(MYSQLI_ASSOC);
    //var_dump($user);

    //echo "Name: " . $user[0]["name"];

    foreach ($user as $value) {
        echo "Name: " . $value["name"] . "<br/>";
    }
    */

    //  $user = $query->fetch_array(MYSQLI_ASSOC);
    //var_dump($user);
    //echo "Name: " . $user["name"] . "<br/>";

    //while ($user = $query->fetch_array(MYSQLI_NUM)) {
      //  echo "Email: " . $user[2] . "<br/>";
    //}

    //$user = $query->fetch_object();
    //var_dump($user);
    //echo "Nome: " . $user->name . "<br/>";

    /*
    while ($user = $query->fetch_object()) {
        $row[] = $user;
    }

    foreach ($row as $value) {
        echo "Name: " . $value->name . "<br/>";
    }
    */
//}

$stmt = $mysqli->stmt_init();
$stmt->prepare("SELECT name, email FROM USER WHERE id = ? AND name = ?");
$stmt->bind_param("is", $_GET["id"], $_GET['name']);
$stmt->execute();
$stmt->bind_result($name, $email);
$stmt->fetch();

echo "Nome: " . $name . "<br/>";
echo "E-mail: " . $email . "<br/>";

/*
foreach ($query = $mysqli->query($sql) as $user) {
    echo "Name: " . $user["name"] . "<br/>";
}
*/


//$query =  $mysqli->query($sql);
/*
while ($data = $query->fetch_assoc()) {
    echo "Id: " . $data['id']. "<br>";
    echo "Name: " . $data['name'] . "<br>";
    echo "Email: " . $data['email'] . "<br><hr>";
}
*/

