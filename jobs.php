<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs</title>
</head>
<body>
    
<?php include('header.php')?>
<?php include('connect.php')?>

<?php

if(isset($_SESSION['roletype'])){
    header('Location: login.php');
}
?>

<div class="container">
 <div class="row">

    <div class="col-lg-4">
 <div class="login-content">
    <form action="jobs.php" method= "POST">
                        <div class="section-title">
                            <h3>Jobs</h3>
                        </div>   
                        <div class="textbox-wrap">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-user"></i></span>
                                <input type="hidden" name="jobid" value="">
                                <input type="text" required="required" value="" name="Name" class="form-control" placeholder="Name">
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-user"></i></span>
                              <textarea name="description" id="" class="form-control" placeholder="Description"></textarea>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-user"></i></span>
                                <input type="text" required="required" value="" name="skill" class="form-control" placeholder="Skill">
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-user"></i></span>
                                <input type="text" required="required" value="" name="timing" class="form-control" placeholder="Timing">
                            </div>


                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-user"></i></span>
                                <input type="text" required="required" value="" name="salary" class="form-control" placeholder="Salary">
                            </div>


                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-user"></i></span>
                              <textarea name="location" id="" class="form-control" placeholder="Location"></textarea>
                            </div>


                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-user"></i></span>
                               <select name="catid" id="" class= "form-control">
                                    <?php
                                    $sql = "select * from categories";
                                    $data = mysqli_query($con,$sql);
                                    if(mysqli_num_rows($data) > 0){
                                        while($row = mysqli_fetch_array($data)){
                                            ?><option value="<?= $rows['catid']?>"><?= $row['name'] ?> </option><?php
                                        }
                                    }
                                    else{
                                        ?><option>Category Not Added</option><?php
                                    }
                                    ?>

                               </select>
                            </div>

                            
                        </div>
                        <div class="login-btn">
                            <input type="submit" name="addjob" value="Add Jobs">
                            <input type="submit" name="updatecat" value="Update"> 
                        </div>
                     </form>
                     	  
				        </div> 
              </div>
    </div>


    <div class="col-lg-8">
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Categories</th>
                <th>Skill</th>
                <th>Desc</th>
                <th>Salary</th>
                <th>Timing</th>
                <th>Date</th>
            </tr>
            <?php
            $sql = "select jobs.jobid,jobs.name, categories.name as 'catname',
            jobs.description,jobs.date,jobs.salary,jobs.skill,jobs.timing,
            jobs.location
            FROM jobs
            INNER JOIN categories on categories.catid * jobs.catid";
            $rs = mysqli_query($con,$sql);
            while($data = mysqli_fetch_array($rs)){
                ?>

               <tr>
                <td><?=$jobdata['jobid']?></td>
                <td><?=$jobdata['name']?></td>
                <td><?=$jobdata['catname']?></td>
                <td><?=$jobdata['skill']?></td>
                <td><?=$jobdata['description']?></td>
                <td><?=$jobdata['salary']?></td>
                <td><?=$jobdata['timing']?></td>
                <td><?=$jobdata['date']?></td>
                

               </tr>
                <?php
               }
            ?>

        </table>
        
     </div>
 </div>

</div>

<?php include('footer.php')?>


<?php
 if(isset($_POST['addjob'])){
    $name= $_POST['name'];
    $catid= $_POST['catid'];
    $description= $_POST['description'];
    $skill= $_POST['skill'];
    $date= date('d/m/y');
    $timing= $_POST['timing'];
    $location= $_POST['location'];
    $salary= $_POST['salary'];
 
      // print_r($_POST);
       
      if(mysqli_query($con,"INSERT INTO `jobs`(`name`, `description`, `skill`, `timing`, `date`, `salary`, `location`, `catid`) VALUES ('$name','$description','$skill','$timing','$date','$salary','$location','$catid')")){
      echo"<script>alert('record added')</script>";
      }
      else{
      echo"<script>alert('record not added')</script>";
      }
     }

?>

</body>
</html>