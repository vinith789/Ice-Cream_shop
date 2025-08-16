<?php
session_start();
include "../common/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM register WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);

    if($row){
      if($password == $row["password"]){
        $_SESSION["user_id"] = $row["id"];
        $_SESSION["user_name"] = $row["username"];
        $_SESSION["user_email"] = $row["email"];
        $_SESSION["role"] = $row["role"];

        if($row["role"] == "seller"){
           echo"<script>alert('Login Successfull!');
             window.location.href = '../pages/seller/index.php';</script>";
        }
        elseif($row["role"] == "admin"){
          echo"<script>alert('admin Login Successfull!');
             window.location.href = '../pages/admin/addproduct.php';</script>";
        }
        else{
           echo"<script>alert('Login Successfull!');
             window.location.href = '../pages/user/index.php';</script>";
        }

      }else{
        echo "<script>alert('wrong password!');
        window.location.href = '../index.php';</script>";
      }
    }
    else{
      echo "<script>alert('Email id not found!');
       window.location.href = '../index.php';</script>";

    }
}


?>