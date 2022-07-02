<?php require_once('connection.php');

if(isset($_POST['delete'])){

$cid = $_POST['cid']; // get id through query string

$query = "DELETE FROM cart WHERE cart_id = '$cid'";
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