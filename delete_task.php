<?php
session_start();    
include("config.php");


if(isset($_POST["deleteBtn"])){
    
    $id = $_POST['id'];

    $query = "DELETE FROM `tasks` WHERE `id` = '$id'";

    $query_result = mysqli_query( $con, $query );

    if($query_result){
        $_SESSION['status'] = "Task deleted!";
        $_SESSION['status_code'] = "success";
        header("Location: view_task.php");
        exit();
        }

}

?>
