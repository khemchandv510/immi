<?php

$where = " where";

    if(isset($_REQUEST['tour_name']) && !empty($_REQUEST['tour_name'])){
        $tour_name = $_REQUEST['tour_name'];
        $where .= " (project.name LIKE '%".$tour_name."%' OR project.destination_covered LIKE '%".$tour_name."%') and";
    }
    else {
        $tour_name = "";
    }
   
    if(isset($_REQUEST['location']) && !empty($_REQUEST['location']) && $_REQUEST['location'] != ""){
        $location = $_REQUEST['location'];
        $where .= " project.destination_covered LIKE '%".$location."%' and";
    }
    else {
        $location = "";
     
    }

    if(isset($_REQUEST['days']) && !empty($_REQUEST['days']) && $_REQUEST['days'] != ""){
        $days = $_REQUEST['days'];
        $where .= " project.days=".$days." and";
    }
    else {
        $days = "";
     
    }

    if(isset($_REQUEST['nights']) && !empty($_REQUEST['nights']) && $_REQUEST['nights'] != ""){
        $nights = $_REQUEST['nights'];
        $where .= " project.nights=".$nights." and";
    }
    else {
        $nights = "";
     
    }


$where .= " project.status=1 and images.status=1 and images.banner=1 LIMIT 12";
$getgoldentourr = "select images.image as image, project.id as id, project.name as name, project.days as days, project.nights as nights, project.destination_covered as destination_covered, project.trip_highlight as trip_highlight, project.overview as overview from project INNER JOIN images on images.project_id = project.id";
$queryadd = $getgoldentourr.$where;
$getgoldentour = mysqli_query($conn, $queryadd);