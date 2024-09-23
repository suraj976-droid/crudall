<?php
    include 'conn.php';

    $id = $_GET['id'];

    $sql ="DELETE FROM `Student` Where id=$id";
    mysqli_query($conn, $sql);

    header("location:list.php");
    ?>