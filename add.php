<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="css/job.css" rel='stylesheet' type='text/css' />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Job</title>
</head>
<body>

<?php include('header.php')?>
<?php include('connect.php')?>



<body>
    <div class="job1">
        
        <div class="job2">
        <form action="add.php" method="post">
            <h3>Add/Remove Jobs</h3>
            <label> Company Name</label>&nbsp;&nbsp;&nbsp;
            <input type="text" name="ComName" placeholder="Enter Company Name" size="20" required /><br>

            <label>Designation</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" name="Des" placeholder="Enter Designation" size="20" required /><br>

            <label>Description</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" name="Desc" placeholder="Enter Description" size="20" required /><br>


            <label> Eligibility</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" name="Egl" placeholder="Enter Eligibility" size="20" required /><br><br>

            <label> Location
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <select name="Loc"  style="width:300px">
                <option value="Location">Select Job Location</option>
                <option value="Pune">Pune</option>
                <option value="Mumbai">Mumbai</option>
                <option value="Banglore">Banglore</option>
                <option value="Kolhapur">Kolhapur</option>
                <option value="Hydrabad">Hydrabad</option>
                <option value="Hydrabad">Jaipur</option>
                <option value="Other">Other</option>
            </select>
        </label>
        <br>

<input type="submit" class="addbtn" value="Add Job" name="add">
<input type="submit" name="updatecat" value="Update"> 
            
        </form>
    </div>
    </div>
    <?php include('footer.php')?>
    </body>

</html>

    
    <?php
if(isset($_POST['add'])){

    $name = $_POST['ComName'];
    $deg= $_POST['Des'];
    $desc= $_POST['Desc'];
    $elgy=$_POST['Egl'];
    $loc=$_POST['Loc'];
   
   // print_r($_POST);

   if(mysqli_query($con,"INSERT INTO `job`(`name`, `deg`, `description`, `elgy`,`location`) VALUES ('$name','$deg','$desc','$elgy','$loc')")){
    echo"<script>alert('Job Added successfully!!')</script>";
   }else{
    echo"<script>alert('Job Not Added')</script>";

   }

}

?>