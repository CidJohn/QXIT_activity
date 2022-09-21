<?php
    include 'db_conn.php';

    $delete_id = $_GET['delete'];

    $sql = "DELETE FROM applicant_table WHERE id = $delete_id";
    mysqli_query($conn, $sql);
    header('location: index.php')
    
    ?>