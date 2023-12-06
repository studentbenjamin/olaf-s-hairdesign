<?php
	header("Access-Control-Allow-Origin: *");
	header('Access-Control-Allow-Methods: POST'); 

    require ("./dbconnect.php");
    date_default_timezone_set('Europe/Amsterdam');
//<=============================================================================================================>
    if (isset($_POST['ShowData']))
    {
        $json = $_POST['ShowData'];
        $json = json_decode($json, true);

        $sql = "SELECT id, name, phone, gender, time, note  FROM persinfo";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result !== false && $result -> num_rows > 0)
        {    
            echo "<table>";
                echo "<tr >
                    <th>Naam</th><th>Phone</th><th>Gender</th><th>Time</th><th>Notitie</th><th>Verwijder</th>
                </tr>";
                while($row = $result->fetch_assoc())
                {
                    echo "<tr>
                        <td>".$row['name']."</td>    
                        <td>".$row['phone']."</td> 
                        <td>".$row['gender']."</td>   
                        <td>".$row['time']."</td>
                        <td>".$row['note']."</td>
                        <td>
                            <a href='infolijst.php?id=".$row['id']."' class='btn'>Verwijder</a>
                        </td>
                        
                    </tr>";
                }
            echo "</table>";
        } 
        $conn->close();
    }
    if (isset($_GET['id'])) {

        $id=$_GET['id'];
        $sql = "DELETE FROM persinfo WHERE id='$id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        //$delete=mysqli("DELETE FROM 'persinfo' WHERE 'id'='$id'");

        header("Location: infolijst.html", true, 301);  
        exit(); 

    };
//