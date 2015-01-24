<?php require_once "code.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php if(isset($title)){echo $title;}else{echo'Simple To Do List';}?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-1.7.2.min.js"></script>
    <script src="js/code.js"></script>
</head>
<body>
            <div class="container">
                <div class="content">
