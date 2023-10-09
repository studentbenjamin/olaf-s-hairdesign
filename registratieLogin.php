<?php
	header("Access-Control-Allow-Origin: *");
	header('Access-Control-Allow-Methods: POST'); 
 
    require ("./dbconnect.php");
 	date_default_timezone_set('Europe/Amsterdam');

if (isset($_POST['GetData']))
{
    $json = $_POST['GetData'];
    $json = json_decode($json, true);
    $naam = $json['Username'];
    $pwd = $json['Password'];

    $sql = "SELECT name, password FROM registratie WHERE name = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $naam, $pwd);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result !== false && $result -> num_rows > 0)
    {
        echo "1";
    }
    else 
    {
        echo "0";
    }
}
?>
