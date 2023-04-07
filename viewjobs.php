<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Jobs</title>
</head>
<body>
    <?php include('header.php') ?>
    <?php include('connect.php') ?>
    

    <div class="container" style="height:700px; width:1519px;background-color: rgb(222,220,224);">
       
       	<div class="row">

           <h3>All Jobs Are Here</h3>

           <?php
            $sql = "select * from job";
            $rs = mysqli_query($con,$sql);
            while($jobdata = mysqli_fetch_array($rs)){
                ?>

       	<div class="col-sm-12 myborder">

				<tr>
                    <td class="col-md-6">
                       Company Name: <?php  echo $jobdata['name']?><br>
                        Designation:<?php  echo $jobdata['deg']?><br>
                        Description:<?php  echo $jobdata['description']?><br>
                        Eligibility:<?php  echo $jobdata['elgy']?><br>
                        Location:<?php  echo $jobdata['location']?><br>
                        <input type="submit" value="Apply" name="btnapply">


                    </td>
                </tr>
                

                </div>
                <?php } ?>

        
    </div>
    </div>
 
    <?php include('footer.php')?>
</body>
</html>