<?php
require 'dbcon.php';

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> View Student Details
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                    // checking is the student is in the database
                    if(isset($_GET['id'])){
                        $student_id = mysqli_real_escape_string($con, $_GET['id']);
                        $query = "SELECT * FROM students WHERE id ='$student_id'";
                        $query_run = mysqli_query($con, $query);
                            // this now fetches the student records when student is available in the database
                        if(mysqli_num_rows($query_run) > 0){
                            $student = mysqli_fetch_array($query_run);
                            ?>
                        <form action="code.php" method="POST">
                            <input type="hidden" name="student_id" value="<?=$student['id'];?>">
                            <div class="mb-3">
                                <label>Student Name</label>
                               <p class="form-control">
                                <?=$student['name'];?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Student Email</label>
                                <p class="form-control">
                                <?=$student['email'];?>
                                </p>
                            </div>
                            <div class=" mb-3">
                                <label>Student Phone</label>
                                <p class="form-control">
                                <?=$student['phone'];?>
                                </p>
                            </div>
                            <div class=" mb-3">
                                <label>Student Course</label>
                                  <p class="form-control">
                                <?=$student['course'];?>
                                </p>
                            </div>
                        </form>

                        <?php

                        }
                        else{
                            echo"<h4>Student not found</h4>";
                        }
                    }
                    ?>

                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>