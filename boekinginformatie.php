<?php

	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: POST'); 

    require ("dbconnect.php");
 	date_default_timezone_set('Europe/Amsterdam');

    if (isset($_POST['SendData']))
    {
        $json = $_POST['SendData'];
        $json = json_decode($json, true);
        $naam = $json['Name'];
        $phone = $json['Phone'];
        $gender = $json['Gender'];
        $time = $json['Time'];
        $note = $json['Note'];
    
        $sql = "SELECT name, phone, gender, time, note FROM persinfo WHERE name = ? AND phone = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $naam, $phone);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result !== false && $result -> num_rows > 0)
        {
            $sql = "INSERT INTO persinfo (name,phone,gender,time,note)
            VALUES (?,?,?,?,?);";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sisss", $naam, $phone, $gender, $time, $note);
            $stmt->execute();
        }
        else 
        {
            $sql = "INSERT INTO persinfo (name,phone,gender,time,note)
            VALUES (?,?,?,?,?);";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sisss", $naam, $phone, $gender, $time, $note);
            $stmt->execute();
        }
    }

?>