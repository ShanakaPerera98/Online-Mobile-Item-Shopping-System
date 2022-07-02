<?php require_once('connection.php');

if(isset($_POST['delete'])){

$wid = $_POST['wid']; // get id through query string

$query = "DELETE FROM wishlist WHERE w_id = '$wid'";
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