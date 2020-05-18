<?php
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$address = $_POST["address"];
$city = $_POST["city"];
$state = $_POST["state"];
$zip = $_POST["zip"];


if(!empty($firstname) || !empty($lastname) || !empty($email) || !empty($address) || !empty($city) || !empty($state) || !empty($zip)){
  $host = "localhost";
  $dbUsername = "root";
  $dbPassword = "root";
  $dbname = "Fraud";

  //Creating connection
  $conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);

  if(mysqli_connect_error())
  {
    die('Connection Error('.mysqli_connect_error().')'. mysqli_connect_error());
  }else{
    $SELECT = "SELECT email From Billing Where email = ? Limit 1";
    $INSERT = "INSERT Into Billing(firstname,lastname,email,address,city,state,zip) values(?,?,?,?,?,?,?)";

    #Statement
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;


    if ($rnum==0) {
     $stmt->close();
     $stmt = $conn->prepare($INSERT);
     $stmt->bind_param("ssssssi", $firstname,$lastname,$email,$address,$city,$state,$zip);
     $stmt->execute();
     echo "New record inserted sucessfully";
    } else {
     echo "Someone already register using this email";
    }
    $stmt->close();
    $conn->close();

  }

}else{
  echo "Type in every entry";
  die();
}
 ?>
