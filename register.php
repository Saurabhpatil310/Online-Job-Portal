<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Job</title>
</head>
<body>

<?php include('header.php')?>
<?php include('connect.php')?>
<div class="container" style="height:700px;width:1519px; background-color: rgb(222,220,224);>

<div class="row">

    <div class="col-lg-4">

    <div class="login-content">
                <form action="register.php" method= "post">
                    <div class="section-title">
                        <h3>Register</h3>
                    </div>   
                    <div class="textbox-wrap">
                        <div class="input-group">
                            <div class="input-group">
                            Full Name<input type="text"  required="required" value="" name="name" class= "form-control" placeholder="Full Name"><br>
                            Email<input type="email"  required="required" value="" name="email" class= "form-control" placeholder="Email"><br>
                            Password<input type="password" required="required" value="" name="password" class="form-control" placeholder="Password"><br>
                            Mobile<input type="text" required="required" value="" name="contact" class="form-control" placeholder="Contact No"><br>
                            Current City<br><select style="height:30px;width: 400px;" name="city">
                <option disabled selected hidden>Select City</option>
                <option>Kolhapur</option>
                <option>Pune</option>
                <option>Sangali</option>
                <option>Mumbai</option>
                <option>Kanpur</option>
                <option>Tasgav</option>
             </select><br>
             Qualification
             <br><select style="height:30px;width: 400px;overflow: hidden;" name="education">
                <option disabled selected hidden>Select Course</option>
                <option>B.E</option>
                <option>B.Tech</option>
                <option>MCA</option>
                <option>MBA</option>
                <option>MS</option>
                <option>MSc</option>
             </select>
                        </div>


                    </div>
                    <div class="login-btn">
                        <input type="submit" name="register" value="Register Now" style="margin-left:100px;width:200px;">
                    </div>
                </form>
        </div>
</div>
</div>
</div>

<?php include('footer.php')?>

</body>
</html>

<?php
if(isset($_POST['register'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile=$_POST['contact'];
    $city=$_POST['city'];
    $edu=$_POST['education'];
   // print_r($_POST);

   if(mysqli_query($con,"INSERT INTO `user`(`name`, `email`, `password`, `contact`,`city`,`education`,`roletype`) VALUES ('$name','$email','$password','$mobile','$city','$edu','1')")){
    echo"<script>alert('register successfully!!')</script>";
   }else{
    echo"<script>alert('Not registerd')</script>";

   }

}

?>