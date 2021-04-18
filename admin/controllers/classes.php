<?php

switch($action) {
    case 'delete_class' :
        //this is the try/catch for the foreign key
        if ($class_id) {
            try {
                ClassDB::delete_class($classID);
            } catch (PDOException $e) {
                $error = "You cannot delete a class if vehicles are assigned to the class ID.";
                include('view/error.php');
                exit();
            }
        }
        header("Location: .?action=list_classes");
        break;
    
    case 'add_class' :
        ClassDB::add_class($className);
        header("Location: .?action=list_classes");
        break;
    
    case 'list_classes' :
        //$classes = get_all_classes();
        include('./view/classes_list.php');
}