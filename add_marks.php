
 <?php


 $a=$a4=$a1=$a2=$a3=$sum=$grade=$matgr= $sstgr=$scigr=$avg= $engra="";
if(isset($_POST['s']))////checking whether the input element is set or not
{
    //$a=$_POST['t1']; //accessing value from 1st text box
    $a1=$_POST['maths']; //accessing value from 2nd text field
    $a2=$_POST['eng']; //accessing value from 3rd text field
    $a3=$_POST['sci']; //accessing value from 4th text field
    $a4=$_POST['sst']; 
     $sum=$a1+$a2+$a3+$a4; //total marks
    $avg=$sum/4;
    if($avg>=0&&$avg<=50)
        $grade="Fail";
    if($avg>50&&$avg<=70)
        $grade="C";
    if($avg>70&&$avg<=80)
        $grade="B";
    if($avg>80&&$avg<=90)
        $grade="A";
    if($avg>90)
        $grade="E";

    //maths grade

    if($a1>=0&&$a1<=50)
        $matgr="F";
    if($a1>50&&$a1<=70)
        $matgr="C";
    if($a1>70&&$a1<=80)
        $matgr="B";
    if($a1>80&&$a1<=90)
        $matgr="A";
    if($a1>90)
        $matgr="E";
 
//english grade
 if($a2>=0&&$a2<=50)
        $engra="F";
    if($a2>50&&$a2<=70)
        $engra="C";
    if($a2>70&&$a2<=80)
        $engra="B";
    if($a2>80&&$a2<=90)
        $engra="A";
    if($a2>90)
        $engra="E";
 
//science grade
 if($a3>=0&&$a3<=50)
        $scigr="F";
    if($a3>50&&$a3<=70)
        $scigr="C";
    if($a3>70&&$a3<=80)
        $scigr="B";
    if($a3>80&&$a3<=90)
        $scigr="A";
    if($a3>90)
        $scigr="E";
 

 //sst grade

 if($a4>=0&&$a4<=50)
        $sstgr="F";
    if($a4>50&&$a4<=70)
        $sstgr="C";
    if($a4>70&&$a1<=80)
        $sstgr="B";
    if($a4>80&&$a4<=90)
        $sstgr="A";
    if($a4>90)
        $sstgr="E";
 

 
}
            ?>

<?php




// Check existence of id parameter before processing further
if(isset($_GET["pid"]) && !empty(trim($_GET["pid"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM pupil WHERE pid = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["pid"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $name = $row["name"];
                $id=$row['pid'];
               
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?> 
<?php
 
        // Prepare an insert statement
         $sql = "INSERT INTO results (pid,maths, eng,sci,sst,total, average,grade_maths,grade_eng, grade_sci,grade_sst) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssssss", $param_pid, $param_maths, $param_eng, $param_sci, $param_sst, $param_total, $param_average, $param_grade_maths,$param_grade_eng,$param_grade_sci
        ,$param_grade_sst);
            
            // Set parameters
            $param_pid = $pid;
          
            $param_maths = $a1;
            $param_eng = $a2;
          
            $param_sci = $a3;
            $param_sst = $a4;
          
            $param_total = $sum;
            $param_average = $average;
          
            $param_grade_maths = $matgr;
            $param_grade_eng = $engra;
          
            $param_grade_sci = $scigr;
              $param_grade_sst = $sstgr;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: index.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    
    
    // Close connection
    mysqli_close($link);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ADD RESULT</title>
     <link rel="stylesheet" href="css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>add pupil marks</h1>
                    </div>
                    <div class="form-group">
                        <label><b>ID</b></label>
                        <p class="form-control-static"><?php echo $row["pid"]; ?></p>
                    </div>
                    <div class="form-group">

                        <label><b>NAME</b></label>
                        <p class="form-control-static"><?php echo $row["name"]; ?></p>
                    </div>
                           
        <form action="" method="post">
                        <div class="form-group" >
                            <label>mathematics</label>
                            <input type="text" name="maths" class="form-control">
                        </div>
                        
                     <div class="form-group" >
                            <label>english</label>
                            <input type="text" name="eng" class="form-control" >
                        </div>

                        <div class="form-group" >
                            <label>science</label>
                            <input type="text" name="sci" class="form-control">
                        </div>
                    <div class="form-group" >
                            <label>sst</label>
                            <input type="text" name="sst" class="form-control">
                        </div>
                     
                       
                        <input type=submit name="s" value="Result">

        </form>   
                  
                </div>
<div>
  
           <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

           <table border=0>
                    <tr>
                        <td>
                            Student Name
                        </td>
                        <td>
                            <?php echo $row["name"]; ?>
                        </td>

                        
                         <td>
                          GRADE
                        </td>
                                                 <td>
                          TOTAL
                        </td>
                                                 <td>
                          AVERAGE
                        </td>

                    </tr>
                    <tr>
                        <td>
                    mathematics
                        </td>
                        
                         <td>
                            <input type=text  value="<?php echo $a1 ;?>">
                        </td>
                         <td>
                            <input type=text value="<?php echo $matgr ;?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                        english
                        </td>
                        
                         <td>
                         <?php echo $a2 ?>
                        </td>
                         <td>
                            <input type=text value="<?php echo $engra ;?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                        science
                        </td>
                       
                         <td>
                            <input type=text  value="<?php echo $a3 ;?>">
                        </td>
                         <td>
                            <input type=text value="<?php echo $scigr ;?>">
                        </td>
                    </tr>
                     <tr>
                        <td>
                    sst
                        </td>
                       
                         <td>
                            <input type=text  value="<?php echo $a4 ;?>">
                        </td>
                         <td>
                            <input type=text value="<?php echo $sstgr ;?>">
                        </td>
                    </tr>
                    <tr>
                        <td>total</td>
                        <td><?php echo $sum ;?></td>
                        <td>average</td>
                        <td><?php echo $avg ;?></td>
                        <td>final grade</td>
                        <td><?php echo $grade ;?></td>
                        
                        
                    </tr>
                   
                </table>
                  
                      <input type="submit" class="btn btn-primary" value="save results">
               </form>
          
  <p><a href="view_per.php" class="btn btn-primary">Back</a></p>



</div>

            </div>        
        </div>
    </div>
</body>
</html>


  

