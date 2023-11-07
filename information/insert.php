<?php
include 'dbconn.php';

if(isset($_POST['submit'])){
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

      $infor = "INSERT INTO info(first_name, last_name, email, gender)
                VALUES ('$first_name','$last_name','$email','$gender')";

        $mysqliquery = mysqli_query($conn, $infor);

    if($infor){
        ?>
    <script>
        window.location.replace("index.php");
    </script>

<?php 
    }else{
        echo 'Not Inserted';
    }
}
