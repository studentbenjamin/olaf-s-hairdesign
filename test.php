<?php
    include "dbconnect.php";


    if (isset($_GET['id'])) {

        $id=$_GET['id'];
        $sql = "DELETE FROM persinfo WHERE id='$id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        //$delete=mysqli("DELETE FROM 'persinfo' WHERE 'id'='$id'");
    };
?>