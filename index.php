<?php
$lifetime= 60 * 60 * 24 * 14;
session_set_cookie_params($lifetime,'/');
session_start();

require('model/database.php');
require('model/vehicle_db.php');
require('model/make_db.php');
require('model/class_db.php');
require('model/type_db.php');

$firstname=filter_input(INPUT_POST, 'firstname',FILTER_SANITIZE_STRING);
if(!$firstname){
    //echo 'in makes get';
    $firstname = filter_input(INPUT_GET, 'firstname',FILTER_SANITIZE_STRING);
}

$make_id=filter_input(INPUT_POST, 'make_id',FILTER_VALIDATE_INT);
if(!$make_id){
    //echo 'in makes get';
    $make_id = filter_input(INPUT_GET, 'make_id',FILTER_VALIDATE_INT);
}
$type_id=filter_input(INPUT_POST, 'type_id',FILTER_VALIDATE_INT);
if(!$type_id){
    //echo 'in type get';
    $type_id = filter_input(INPUT_GET, 'type_id',FILTER_VALIDATE_INT);
}
$class_id=filter_input(INPUT_POST, 'class_id',FILTER_VALIDATE_INT);
if(!$class_id){
    //echo 'in class get';
    $class_id = filter_input(INPUT_GET, 'class_id',FILTER_VALIDATE_INT);
    //echo $class_id;
}
$sort= filter_input(INPUT_POST, 'sort',FILTER_SANITIZE_STRING);
if(!$sort){
    $sort=filter_input(INPUT_GET, 'sort',FILTER_SANITIZE_STRING);
}


//show all items
$action = filter_input(INPUT_POST, 'action',FILTER_SANITIZE_STRING);
if(!$action){
    $action=filter_input(INPUT_GET,'action',FILTER_SANITIZE_STRING);
    if(!$action){
        $action='show_vehicle_list';
    }
}
if($firstname){
    $_SESSION["userid"]=$firstname;
    $userid = $_SESSION["userid"];
}else{
    $firstname = false;
}


if($action == 'show_vehicle_list'){
    //echo 'begin';
    //echo 'after get vehicles';
    $userid = $_SESSION["userid"];
    if($type_id){
      
        $vehicles=VehicleDB::get_vehicles_by_type($type_id,$sort);
       
    }
    else if($make_id){
        //echo 'entered make index';
        
        $vehicles=VehicleDB::get_vehicles_by_make($make_id,$sort); 
        
    }
    else if($class_id){
        //echo 'in class index';
        $vehicles=VehicleDB::get_vehicles_by_class($class_id,$sort); 
    }
    else{
       
        $vehicles=VehicleDB::get_all_vehicles($sort); 
    }

    
    $types=TypeDB::get_types();
    $makes= MakeDB::get_makes();
    $classes=ClassDB::get_classes();
    include('view/vehicle_list.php');
}
else if($action=='register'){
   include('view/register.php');
    
}
else if($action =='logout'){
    $userid = $_SESSION["userid"];
    include('view/logout.php');
}