<?php require_once('connection.php');

if(isset($_POST['delete'])){

$reid = $_POST['reid']; // get id through query string

$query = "DELETE FROM repair WHERE re_id = '$reid'";
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