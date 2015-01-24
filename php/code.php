<?php

/* 
    Functions
*/
function check_page($page)
{
    // Check and Return True if the current page = the $page;
    return TRUE ? basename($_SERVER['PHP_SELF']) == $page : FALSE;
}
/* 
    DataBase Connection code
*/
define('host','localhost');     // Host Server
define('db_name','todolist');   // DataBase Name
define('db_user','root');       // DataBase User Name 
define('db_password','smile');  // DataBase Password

$conn = new PDO('mysql:host='.host.';dbname='.db_name,db_user,db_password);
/* 
    Check From Page Name
*/
/* 
    If Page is new.php 
*/
if (check_page('new.php')){
    $title = 'Create New Task'; // Change Page Title
    if(isset($_POST['save'])){
        $task_name = $_POST['task_name']; // GET Input Task Name  Value
        if(empty($task_name)) {
            $error = "Task Name Field is Required";
        } elseif (strlen($task_name) < 3) {
            $error = "Task Name must be unless 3 char";
        } else {
        $sql = "Insert INTO `tasks` (`task_name`) VALUES (?)"; // ? is a placeholder
        $stmt = $conn->prepare($sql);
        $stmt->BindValue(1,$task_name,PDO::PARAM_STR); // Set Placeholder Value
        $stmt->execute(); // Save Data
        header('location:index.php');
        }
    }
} elseif (check_page('delete.php')){
/*
    If Page is delete.php
*/
    $title = "Delete Task";
    $id = $_GET['id'];
    $sql = "Select * From `tasks` where id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(1,$id,PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_OBJ);

    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        $sql = "Delete FROM `tasks` where id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->BindValue(1,$id,PDO::PARAM_INT);
        $stmt->execute();
        header('location: index.php');
    }
} elseif (check_page('edit.php')){
/* 
    if Page is edit.php
*/
        session_start();
    $title = "Edit Task";
    $id = $_GET['id'];
    $sql = "Select * From `tasks` where id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(1,$id,PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_OBJ);

    if(isset($_POST['edit'])){
        $id = $_POST['id'];
        $task_name = $_POST['task_name']; // GET Input Task Name  Value
        if(empty($task_name)) {
            $error = "Task Name Field is Required";
            $_SESSION['error'] = $error;
            header('location: edit.php?id='.$id);
        } elseif (strlen($task_name) < 3) {
            $error = "Task Name must be unless 3 char";
            $_SESSION['error'] = $error;
            header('location: edit.php?id='.$id);
        }
        else {
        $sql = "UPDATE `tasks` SET task_name = ? Where id = ?"; // ? is a placeholder
        $stmt = $conn->prepare($sql);
        $stmt->BindValue(1,$task_name,PDO::PARAM_STR); // Set Placeholder Value
        $stmt->BindValue(2,$id,PDO::PARAM_INT);
        $stmt->execute(); // Save Data
        header('location:index.php');
    }
}
}
/*
    if page is index.php
*/
else {

$sql = "Select * From `tasks` ORDER BY id desc";
$stmt = $conn->prepare($sql);
$stmt->execute();

if(isset($_GET['mark']) && isset($_GET['mark']) == "done"){
    $id = $_GET['id'];
    echo $id;
    $sql = "UPDATE tasks SET state = 1 WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->BindValue(1,$id,PDO::PARAM_INT);
    $stmt->execute();
    header('location: index.php');
}
    
    

}