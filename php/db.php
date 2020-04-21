<?php

function Createdb(){
    $serverName= "localhost";
    $userName="root";
    $password="";
    $dbName="bookstore";
    //Create Connection
    $con=mysqli_connect($serverName,$userName,$password);
//Check Connection
    if(!$con){
        die("Connection Failed:".mysqli_connect_error());
    }

    //Create Database
    $sql= "CREATE DATABASE IF NOT EXISTS $dbName";
    if(mysqli_query($con,$sql)){
        $con=mysqli_connect($serverName,$userName,$password,$dbName);
        $sql=" 
        CREATE TABLE IF NOT EXISTS books(
        book_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        book_name VARCHAR(50) NOT NULL,
        book_author VARCHAR(100),
        book_given_to VARCHAR(100),
        book_publisher VARCHAR(100),
        book_price FLOAT 
        );
        ";
       if(mysqli_query($con,$sql)){
           return $con;
       }else{
           echo "Cannot Create Table".mysqli_connect_error();
       }
    }else{
        echo "Error creating database".mysqli_connect_error();
    }
}
