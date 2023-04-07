<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<?php include('header.php')?>
<?php include('connect.php')?>

<div class="container" style="height:700px;width:1519px;background-color: rgb(222,220,224);>

<div class="row">

    <div class="col-lg-4">

    <div class="login-content">
                <form action="login.php" method= "post">
                    <div class="section-title">
                        <h3 style="margin-top:20px">Login Here</h3>
                    </div>   
                    <div class="textbox-wrap" style="height:250px;width: 500px;background-color:#fff; display: flex;
    align-items: center;
    justify-content: center;">
                        <div class="input-group">
                           
                            <input type="email"  required="required" value="" name="email" class= "form-control" placeholder="Enter Email">
                            <input type="password" required="required" value="" name="password" class="form-control" placeholder="Enter Password">
                            <div class="login-btn">
                        <input type="submit" name="login" value="Login" style="margin-left:100px;">
                    </div>
                        </div>
                    </div>
                    
                </form>
        </div>
    </div>
</div>

<?php include('footer.php')?>

</body>
</html>

<?php


if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "select * from user where email='$email' and password='$password'";
    $rs = mysqli_query($con,$sql);

    if(mysqli_num_rows($rs)>0){

        $data = mysqli_fetch_array($rs);

        $name = $data['name'];
       $email = $data['email'];
       $password = $data['password'];
       $mobile=$data['contact'];
        $city=$data['city'];
          $edu=$data['education'];
          $roletype=$data['roletype'];


        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['contact'] = $mobile;
        $_SESSION['city'] = $city;
        $_SESSION['education'] = $edu;
        $_SESSION['roletype'] = $roletype;




        if($roletype == 1){
            echo"<script>alert('Admin login successfully!!!')</script>";

            echo"<script> window.location.href='index.php'</script>";

        }elseif($roletype == 2){
            echo"<script>alert('User login successfully!!!')</script>";
            echo"<script> window.location.href='index.php'</script>";

        }
        
    } else{
            echo"<script>alert('Invalid username or password')</script>";
        }
  
    }
   
?>