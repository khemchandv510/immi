<?php

require_once("../conn.php");



$a = $_GET['category'];


// $oo = array_search('Travel',$a);
// if($oo !== false){
//     echo "echokfjskdjhf";
// }
 

  $where = " where";
    if(isset($_GET['category']) &&  (!empty($_GET['category']))){

     $category = join("','",$_GET['category']);
       $where .= " category.name IN ('".$category."') and";
    }
    else{
        $category = "";
    }
    
    if(isset($_GET['vendor_type']) &&  (!empty($_GET['vendor_type']))){

     $vendor_type =$_GET['vendor_type'];
       $where .= " vendor_offer.vendor_type_text = '$vendor_type' and";
    }
    else{
        $vendor_type = "";
    }
    
    
    if(isset($_GET['user_licensee']) &&  (!empty($_GET['user_licensee']))){

     $user_licensee = $_GET['user_licensee'];
       $where .= " vendor_offer.no_of_user = '$user_licensee' and ";
    }
    else{
        $user_licensee = "";
    }
    
    
    
     
    if(isset($_GET['second_level']) &&  (!empty($_GET['second_level']))){

     $second_level = join("','",$_GET['second_level']);
       $where .= " vendor_offer.sub_category_id IN ('".$second_level."') and ";
    }
    else{
        $second_level = "";
    }
    
    

$array1 = array('Travel','Property','Event Planner');
if (count(array_intersect($array1, $a)) !== 0) {


 $query = "SELECT vendor_offer.monthly_subscription, vendor_offer.discount   FROM vendor_offer INNER JOIN category ON vendor_offer.category_id = category.id   $where  status = 1";
$result = mysqli_query($conn,$query);
 $data = mysqli_fetch_assoc($result);
 $add = 0;
foreach($result as $r){
    $add =  $add+$r['monthly_subscription'];
}

 echo $add/100*(100-$data['discount']);
 
}

else{

if(isset($_GET['second_level']) &&  (!empty($_GET['second_level']))){
    
    $query = "SELECT vendor_offer.monthly_subscription, vendor_offer.discount   FROM vendor_offer INNER JOIN category ON vendor_offer.category_id = category.id   $where  status = 1";
$result = mysqli_query($conn,$query);
 $data = mysqli_fetch_assoc($result);
 $add = 0;
foreach($result as $r){
    $add =  $add+$r['monthly_subscription'];
}
 echo $add/100*(100-$data['discount']);
}
}
?>