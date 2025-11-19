<?php

$serverName = "newdb1.database.windows.net";
$connectionOptions = array(
    "Database" => "new",
    "Uid" => "habib",
    "PWD" => "paki.123",
    "Encrypt" => true

);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

$name  = $_POST['name'];
$email = $_POST['email'];

$sql = "INSERT INTO getztable (name, email) VALUES (?, ?)";
$params = array($name, $email);

$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt) {
    echo "Record inserted successfully!<br>";
    echo "<a href='form.html'>Back to form</a>";
} else {
    die(print_r(sqlsrv_errors(), true));
}


sqlsrv_close($conn);
?>
