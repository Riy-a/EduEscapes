<?php
$insert=false;
if(isset($_POST['name'])){
    
$server ="localhost";
$username="root";
$password="";
 
$connection = mysqli_connect($server,$username,$password);
if(!$connection){
    die("connection failed " . mysqli_connect_error());

}
//echo "Connected to the database succesfully";
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];

$sql=" INSERT INTO `trip`.`students` (`name`, `age`, `gender`, `email`, `phone`, `desc`, `Date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";


if($connection->query($sql)==true){
//echo "successfully inserted";
$insert=true;
}
else{
    echo "error $sql <br> $connection->error";
}
$connection->close();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Trippy </title> 
    <link rel="stylesheet" href="style.css">
   </head>
<body>
  <div class="wrapper">
    <h2>Welcome to Birla Institute of Technology US Trip form :&#41;</h2>
    <?php
        if($insert == true){
        echo "<p class='submitmsg'>Thanks for submitting your form.</p>";
        }
    ?>
    <form action="index.php" method="post">
      <div class="input-box">
        <input type="text" name="name" placeholder="Enter your name" required>
      </div>
      <div class="input-box">
        <input type="text" name="age" id="age" placeholder="Enter your Age">
      </div>
      <div class="input-box">
        <input type="text" name="gender" id="gender" placeholder="Enter your gender">
      </div>
      <div class="input-box">
        <input type="email" name="email" id="email" placeholder="Enter your email">
      </div>
      <div class="input-box">
        <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
      </div>
      <div class="input-box">
        <textarea name="desc" id="desc" cols="52" rows="2" placeholder="Any additional Information"></textarea>
      </div>
      
      <div class="input-box button">
        <input type="Submit" value="Submit">
      </div>
      
    </form>
  </div>
</body>
</html>