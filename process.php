<?php

session_start();    
include("config.php");

//INSERTING TASK DATA

if(isset($_POST["addTask"])){

    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $due_date = $_POST['due_date'];
    
    if($title == ''){
        $_SESSION['status'] = "Title is empty";
        $_SESSION['status_code'] = "error";
        header("Location: create_task.php");
        exit();
    }

    if($description == ''){
        $_SESSION['status'] = "Description is empty";
        $_SESSION['status_code'] = "error";
        header("Location: create_task.php");
        exit();
    }

    if($due_date == ''){
        $_SESSION['status'] = "Due date is empty";
        $_SESSION['status_code'] = "error";
        header("Location: create_task.php");
        exit();
    }
    

    $query = "INSERT INTO `tasks`(`title`, `description`, `priority`, `due_date`) VALUES ('$title', '$description', '$priority', '$due_date')";

    $query_result = mysqli_query( $con, $query );

    if($query_result){
        $_SESSION['status'] = "Task added succesfully!";
        $_SESSION['status_code'] = "success";
        header("Location: view_task.php");
        exit();
    }
}

//UDPATING TASK DATA

if(isset($_POST["updateBtn"])){

    $id = $_POST['id'];
    $new_title = $_POST['new_title'];
    $new_description = $_POST['new_description'];
    $new_priority = $_POST['new_priority'];
    $new_due_date = $_POST['new_due'];

    if($new_title == ''){
        $_SESSION['status'] = "Title is empty";
        $_SESSION['status_code'] = "error";
        header("Location: edit_task.php");
        exit();
    }

    if($new_due_date== ''){
        $_SESSION['status'] = "Due date is empty";
        $_SESSION['status_code'] = "error";
        header("Location: edit_task.php");
        exit();
    }

    $query = "UPDATE `tasks` SET `title`='$new_title',`description`='$new_description',`priority`='$new_priority',`due_date`='$new_due_date' WHERE `id` = '$id'";

    $query_result = mysqli_query( $con, $query );

    if($query_result){
        $_SESSION['status'] = "Task updated successfully!";
        $_SESSION['status_code'] = "success";
        header("Location: view_task.php");
        exit();
    }
}



