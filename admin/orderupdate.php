<?php
include('./ajaxpost.php');
    // Include and create instance of DB class
    require_once '../connection/connect.php';
    $db = new DB();

    // Get images id and generate ids array 
    $myArray = json_decode($_POST['ids']);
    // $idArray = explode(",", $_POST['ids']);
    print_r (myArray);
     
    // Update images order 
    $db->updateOrder($myArray);

?>