<?php
include "../config.php";
include "header.php";
?>
<div class="container">
    <h1 class="alert alert-success">Signup For For registration:</h1>
    <form method="post"  enctype="multipart/form-data">
     <input type="text" placeholder="Enter Your Name:" name="username" class="form-control">
     <input type="email" placeholder="Enter Your Email:" name="email" class="form-control">
     <input type="text" placeholder="Enter Your Phone Number:" name="phone" class="form-control">
     <input type="text" placeholder="Enter Your Addresss:" name="address" class="form-control">
     <input type="password" placeholder="Enter Your password:" name="password" class="form-control">
     <input type="date" placeholder="Enter Your Dob:" name="dob" class="form-control">
     <input type="file" name="file" placeholder="Select Product Image" class="form-control">
     <label for="gender">Select Gender:</label>
     <input type="radio" name="gender" value="Female">
     <label for="">Female:</label>
     <input type="radio" name="gender" value="Male">
     <label for="">Male:</label>
     <br>
     <input type="submit" value="Signup" name="btn_signup" class="btn btn-success">
    </form>
</div>
<?php
include "footer.php";
?>
<?php 
if(isset($_POST['btn_signup']))
{
  $username =  $_POST['username'];
  $email =  $_POST['email'];
  $password =  $_POST['password'];
  $phone =  $_POST['phone'];
  $address =  $_POST['address'];
  $dob =  $_POST['dob'];
  $gender =  $_POST['gender'];
  $file = $_FILES['file'];
  $filename = $_FILES['file']['name'];
  $temp_name = $file['tmp_name'];

  move_uploaded_file($temp_name,"User/$filename");

  $insert = "INSERT INTO signup(username, email, phone, address, gender, password, dob , file) VALUES ('$username','$email','$phone','$address','$gender','$password','$dob' , '$filename')";
  $result = mysqli_query($conn,$insert);
  if($result)
  { 
    echo "<script> alert('value inserted successfully') </script>";
    header("location:login.php");
  }
}
?>