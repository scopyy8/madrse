<?php
<!doctype html>
<html>
<head>
    <meta charest="utf-8">
    <title>School Database Sample</title>
    <link href="css/style.css" rel="stylesheet"/>
</head>

<body>
<?php
include "connection.php";
if (isset($_POST['submit1'])){
    $classid=$_POST['txt_classid'];
    $classname=$_POST['txt_class'];
    $ins_sql=" INSERT INTO class(class_id,class_name)  VALUES ('$classid','$classname')";
    $ins_sql_pre=$db->prepare($ins_sql);
    $ins_sql_pre->execute();
}
if (isset($_POST['submit2'])) {
    $classid = $_POST['classid'];
    $stud_id = $_POST['studid'];
    $stud_name = $_POST['stud_name'];
    $stud_family = $_POST['stud_family'];
    $stud_ave = $_POST['stud_ave'];
    $ins_sql = "INSERT INTO student(stud_id,class_id,name,family,ave)  VALUES ($stud_id,'$classid','$stud_name','$stud_family','$stud_ave')";
    $ins_sql_pre = $db->prepare($ins_sql);
    $ins_sql_pre->execute();