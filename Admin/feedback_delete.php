<?php require_once('connection.php');

if(isset($_POST['delete'])){

$fid = $_POST['fid']; // get id through query string

$query = "DELETE FROM feedback WHERE f_id = '$fid'";
$run = mysqli_query($connection, $query);

    if($run){ 
        // echo "Deleted Successfully";
        echo '<script>alert("Deleted Successfully")</script>';

        

    }else{
        // echo "Error";
        echo '<script>alert("Error")</script>';
    }
}
?>