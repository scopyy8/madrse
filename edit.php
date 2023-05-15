<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>edit</title>
    <link  rel="stylesheet" href="css/style.css"/>
</head>
<body>
<?php session_start(); ob_start();
include "connection.php";
if (isset($_GET['id']) && isset($_GET['page']) ) {
    $id = $_GET['id'];
    $page = $_GET['page'];
    switch ($page) {
        case 1:
            include "connection.php";
            $query = "SELECT * FROM class WHERE class_id=" . $id;
            $result = $db->prepare($query);
            $result->execute();
            $row = $result->fetch(PDO::FETCH_ASSOC);
            if (isset($_POST['submit1'])) {

                $class_name = $_POST['txt_class'];
                $class_id = $_POST['txt_class1'];
                $query = "UPDATE class SET class_name='" . $class_name . "', class_id='" . $class_id . "' WHERE class_id=" . $id;
                $del = $db->prepare($query);
                $del->execute();
                header("location:index.php");
            }
            echo ' <div id="row1_col1">
<form action="" method="post">
<fieldest>
<legend>Class</legend>
<lable>class name</lable>
<input type="text" name="txt_class" value="' . $row['class_name'] . '"/>
<lable>class id</lable>
<input type="text" name="txt_class1" value="' . $row['class_id'] . '"/>
<input type="submit" name="submit1" value="edit-class"/>
</fieldest>
</form>
</div>';
