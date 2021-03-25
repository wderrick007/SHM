<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="docs/4.0/examples/tooltip-viewport/tooltip-viewport.css">
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2 class="pull-left">PUPUL Details</h2>
                        <a href="student.php" class="btn btn-success pull-right">Add pupil</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM pupil";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Name</th>";
                                          echo "<th>email</th>";
                                            echo "<th>contact</th>";
                                        echo "<th>Address</th>";
                                      
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['pid'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                          echo "<td>" . $row['email'] . "</td>";
                                            echo "<td>" . $row['contact'] . "</td>";
                                        echo "<td>" . $row['address'] . "</td>";
                                       
                                        echo "<td>";
                                            echo "<a href='read.php?pid=". $row['pid'] ."' title='View Record'>View Record</a>";
                                            echo "<a href='update.php?pid=". $row['pid'] ."' title='Update Record'>Update Record</a>";
                                            echo "<a href='delete.php?pid=". $row['pid'] ."' title='Delete Record'>Delete Record</a>";
                                              echo "<a href='add_marks.php?pid=". $row['pid'] ."' title='add Record'>ADD marks Record</a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>