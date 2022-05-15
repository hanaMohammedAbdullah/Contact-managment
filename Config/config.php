<?php
$host =  "localhost"; // define("host", "localhost");
$dbname ="han"; // define("dbnm", "example_system_db");
$user = "root"; // define("user", "root");
$pass = ""; // define("pass", "password");
$DB = null;
// $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$user, $pass);
try {
$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass,
[ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ]);
} catch (PDOException $e) {
echo "Error!: " . $e->getMessage() . "<br/>";
}
