<?php

include_once("config.php");

function getCategoryName($id){
    global $con;
    $query = "SELECT * FROM category WHERE id = '$id'";
    $result = mysqli_query($con, $query);
    if(!$result){
	    echo "Connection failed". mysqli_query($result);
    }
    while($row = mysqli_fetch_array($result)){
        $categoryName = $row['categoryName'];
        return $categoryName; 
    }
}

function getCategoryDesc($id){
    global $con;
    $query = "SELECT * FROM category WHERE id = '$id'";
    $result = mysqli_query($con, $query);
    if(!$result){
	    echo "Connection failed". mysqli_query($result);
    }
    while($row = mysqli_fetch_array($result)){
        $categoryDescription = $row['categoryDescription'];
        return $categoryDescription; 
    }
}

function getProductName($id){
    global $con;
    $query = "SELECT * FROM products WHERE id = '$id'";
    $result = mysqli_query($con, $query);
    if(!$result){
	    echo "Connection failed". mysqli_query($result);
    }
    while($row = mysqli_fetch_array($result)){
        $productName = $row['productName'];
        return $productName; 
    }
}


?>