<?php

  include "../common/config.php";

  if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = $_POST["username"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    $check = "SELECT * FROM register WHERE email = '$email'";
    $result = mysqli_query($conn, $check);

    if(mysqli_num_rows($result) > 0){
      echo "<script>alert('Email already exists!');
            window.location.href = '../index.php';</script>";
    }else{
      $sql =  "INSERT INTO register (username, email, password, number, role)
              VALUES ('$username', '$email', '$password', '$number', '$role')";

      if($conn->query($sql) === TRUE){
        echo "<script>alert('register successfull!');
            window.location.href = '../index.php';</script>";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
  }

?>