<?php

@include 'config.php';

session_start();

$student_id = $_SESSION['student_id'];
$pilot_id = $_SESSION['pilot_id'];

if(!isset($student_id)){
   header('location:login.php');
}
if(!isset($pilot_id)){
    header('location:login.php');
 }





?>